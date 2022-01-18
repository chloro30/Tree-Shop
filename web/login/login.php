<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <style>
        h1 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 400px;
            margin: 0 auto;
            text-align: center;
        }
        table, td {
            border: 1px solid #ccc;
        }
        td {
            padding: 16px;
        }
        #loginBtnDiv {
            background-color: lightblue;
            width: 400px;
            height: 40px;
            margin: 0 auto;
            margin-top: 20px;
        }
        #loginBtnDiv button {
            width: 100%;
            height: 100%;
        }
        #register {
            width: 400px;
            height: 40px;
            margin: 0 auto;
            margin-top: 20px;
        }
        button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="../../index.php">홈으로</a><br>
    <h1><span>로그인</span></h1>
    <table>
        <form action="../../process/login/login_process.php" id="loginForm" method="post">
            <tr>
                <td>아이디</td>
                <td><input type="text" name="userId" id="userId"></td>                
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input type="password" name="userPw" id="userPw"></td>
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