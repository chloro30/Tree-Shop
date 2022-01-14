// daum 우편번호 api

//사용하는 곳에서 아래의 <script>를 링크 해줘야 한다.
//<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

// input 태그들
// const zipcode = document.querySelector('#zipcode');
// const roadAddress = document.querySelector('#roadAddress');
// const detailAddress = document.querySelector('#detailAddress');
// const zipcodeBtn = document.querySelector('#zipcodeBtn');


function DaumZipcode() {
    new daum.Postcode({
        oncomplete: function(data) {
            // console.log(data);
            // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
            
            // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
            // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
            var roadAddr = data.roadAddress; // 도로명 주소 변수
            var extraAddr = ''; // 참고 항목 변수

            // 건물명이 있고, 공동주택일 경우 상세주소에 추가한다.
            if(data.buildingName !== '' && data.apartment === 'Y'){
                extraAddr += ((extraAddr !== '') ? (', ' + data.buildingName) : (data.buildingName));
            }

            // 건물명만 있어도 상세주소에 추가한다.
            if(data.buildingName !== ''){
                extraAddr += data.buildingName;
            }

            // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
            if(extraAddr !== ''){
                extraAddr = ' (' + extraAddr + ')';
            }

            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            zipcode.value = data.zonecode;
            roadAddress.value = roadAddr;
            
            // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
            if(roadAddr !== ''){
                roadAddress.value += extraAddr;
            } else {
                roadAddress.value += '';
            }
        }
    }).open();
}