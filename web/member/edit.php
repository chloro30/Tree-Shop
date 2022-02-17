<?php include_once '../../include/header.php'; ?>
<?php
    //DB연결
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    $conn = mysqli_connect('localhost','root','1234','treeshop'); //학원 비번 다름
    // $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결

    //쿼리작성
    $sql = "SELECT * FROM member
            WHERE no='{$_POST['no']}';
            ";
    // echo $sql;

    //쿼리전송
    $result = mysqli_query($conn,$sql);

    //select 결과를 연관배열 형태로 변환
    $row = mysqli_fetch_array($result);
?>
    <section id="member-edit">
        <h1>회원 정보 수정</h1>
        <form action="../../process/member/update_process.php" method="post" id="updateForm">
            <input type="hidden" name="no" value="<?=$_GET['no']?>">
            <table border="1">
                <tr>
                    <td>번호</td>
                    <td><?=$row['no']?></td>
                </tr>
                <tr>
                    <td>아이디</td>
                    <td><?=$row['id']?></td>
                </tr>
                <tr>
                    <td>비밀번호</td>
                    <td><input type="password" name="userPw" id="userPw"></td>
                </tr>
                <tr>
                    <td>비밀번호 확인</td>
                    <td><input type="password" name="userPwCheck" id="userPwCheck"></td>
                </tr>
                <tr>
                    <td>이름</td>
                    <td><?=$row['name']?></td>
                </tr>
                <tr>
                    <td>주소</td>
                    <td>
                        <?=$row['address']?><br>
                        <input type="text" name="zipcode" id="zipcode" placeholder="우편번호" readonly>&nbsp;<button type="button" id="zipcodeBtn">우편번호 찾기</button><br>
                        <input type="text" name="roadAddress" id="roadAddress" placeholder="도로명 주소" readonly>&nbsp;
                        <input type="text" name="detailAddress" id="detailAddress" placeholder="상세 주소">
                    </td>
                </tr>
                <tr>
                    <td>가입날짜</td>
                    <td><?=$row['date']?></td>
                </tr>
            </table>
            <input type="button" id="updateBtn" value="수정완료">
        </form>
    </section>
    <script>
        const updateForm = document.querySelector('#updateForm');
        const updateBtn = document.querySelector('#updateBtn');
        const pw = document.querySelector('#userPw');
        const pwCh = document.querySelector('#userPwCheck');
        const zipcode = document.querySelector('#zipcode');
        const roadAddress = document.querySelector('#roadAddress');
        const detailAddress = document.querySelector('#detailAddress');

        updateBtn.addEventListener('click',function(){
            //아이디, 이름, 패스워드, 패스워드 체크의 값이 입력되었는가?
            if((pw.value!="") && (pwCh.value!="")
            && (zipcode.value!="") 
            && (roadAddress.value!="")){

                //비밀번호가 4자리인가?
                if(pw.value.length == 4){
                    //비밀번호와 비밀번호 확인이 같은가?
                    if(pw.value == pwCh.value){
                        updateForm.submit();

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