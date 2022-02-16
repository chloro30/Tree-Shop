<?php include_once '../../include/header.php'; ?>
    <section id="login">
        <h1><span>로그인</span></h1>
        <table>
            <form action="../../process/login/login_process.php" id="loginForm" method="post">
                <tr>
                    <td>아이디</td>
                    <td><input type="text" name="userId" id="userId" required/></td>                
                </tr>
                <tr>
                    <td>비밀번호</td>
                    <td><input type="password" name="userPw" id="userPw" required/></td>
                </tr>            
            </form>
        </table>
        <div id="loginBtnDiv">
            <button type="button" id="loginBtn">로그인</button>
        </div>
        <div id="register">
            <button onclick="location.href='../member/register.php'">회원가입</button>
            <p>관리자 id: admin, pw: 1234</p>
        </div>
    </section>

    <script>
        const loginForm = document.querySelector('#loginForm');
        const loginBtn = document.querySelector('#loginBtn');
        const userId = document.querySelector('#userId');
        const userPw =document.querySelector('#userPw');

        loginBtn.addEventListener('click',function(){
            if(userId.value!="" && userPw.value!=""){
                if(userPw.value.length == 4){
                    loginForm.submit();
                }else{
                    alert('비밀번호는 4자리로 입력해주세요.');
                }
            }else{
                alert('아이디와 비밀번호를 입력해주세요.');
            }
        });

    </script>
</body>
</html>