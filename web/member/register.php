<?php include_once '../../include/header.php'; ?>
    <section id="register-wrap">
        <h1><span>회원가입</span></h1>
        <form action="../../process/member/register_process.php" method="post" id="registerForm">
            <table>
                <tr>
                    <td>이름</td>
                    <td><input type="text" name="userName" id="userName"></td>
                </tr>
                <tr>
                    <td>아이디</td>
                    <td><input type="text" name="userId" id="userId"></td>
                </tr>
                <tr>
                    <td>비밀번호</td>
                    <td><input type="password" name="userPw" id="userPw" placeholder="비밀번호는 4자로 해주세요"></td>
                </tr>
                <tr>
                    <td>비밀번호 확인</td>
                    <td><input type="password" name="userPwCheck" id="userPwCheck" placeholder="비밀번호와 일치하게 해주세요"></td>
                </tr>
                <tr>
                    <td>주소</td>
                    <td>
                        <input type="text" name="zipcode" id="zipcode" placeholder="우편번호" readonly>&nbsp;<button type="button" id="zipcodeBtn">우편번호 찾기</button><br>
                        <input type="text" name="roadAddress" id="roadAddress" placeholder="도로명 주소" readonly>&nbsp;
                        <input type="text" name="detailAddress" id="detailAddress" placeholder="상세 주소">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="button" id="registerBtn">회원가입</button>
                        <button type="reset">취소</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js" defer></script>
    <script src="../../resource/js/zipcode.js"></script>
    <script>
        const joinForm = document.querySelector('#registerForm');
        const joinBtn = document.querySelector('#registerBtn');
        const name = document.querySelector('#userName');
        const id = document.querySelector('#userId');
        const pw = document.querySelector('#userPw');
        const pwCh = document.querySelector('#userPwCheck');
        const zipcode = document.querySelector('#zipcode');
        const roadAddress = document.querySelector('#roadAddress');
        const detailAddress = document.querySelector('#detailAddress');

        joinBtn.addEventListener('click',function(e){
            //아이디, 이름, 패스워드, 패스워드 체크의 값이 입력되었는가?
            if((id.value!="") && (name.value!="") && (pw.value!="") && (pwCh.value!="")
                && (zipcode.value!="") && (roadAddress.value!="")){

                console.log(zipcode.value);

                //비밀번호가 4자리인가?
                if(pw.value.length == 4){
                    //비밀번호와 비밀번호 확인이 같은가?
                    if(pw.value == pwCh.value){
                        joinForm.submit();

                    }else{
                        alert('비밀번호를 확인하세요!');
                    }
                }else{
                    alert('비밀번호는 4자리로 해주세요');
                }
            }else{
                alert('입력칸을 다 채워주세요!');
            }
        });

        //우편번호        
        const zipcodeBtn = document.querySelector('#zipcodeBtn');
        zipcodeBtn.addEventListener('click',DaumZipcode);
    </script>
<?php include_once '../../include/footer.php'; ?>