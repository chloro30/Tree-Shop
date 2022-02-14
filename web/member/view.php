<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 정보</title>
    <style>
        h1 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 800px;
            margin: 0 auto;
        }
        table, td {
            border: 1px solid #ccc;
        }
        td {
            padding: 16px;
        }
        
    </style>
</head>
<body>
    <?php
        //DB연결
        // $conn = mysqli_connect('localhost','root','1234','treeshop');
        // $conn = mysqli_connect('localhost','root','1005','treeshop'); //학원 비번 다름
        $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결
    
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
    <h1>회원 정보</h1>
    <a href="../../index.php">홈으로</a>
    <table border="1">
        <tr>
            <td>번호</td>
            <td><?= $row['no'] ?></td>
        </tr>
        <tr>
            <td>아이디</td>
            <td><?= $row['id'] ?></td>
        </tr>
        <tr>
            <td>이름</td>
            <td><?= $row['name'] ?></td>
        </tr>
        <tr>
            <td>주소</td>
            <td><?= $row['address'] ?></td>
        </tr>
        <tr>
            <td>가입날짜</td>
            <td><?= $row['date'] ?></td>
        </tr>
    </table>
    <form action="edit.php" method="post">
        <input type="hidden" name="no" value="<?=$_POST['no']?>">
        <input type="submit" value="수정하기">
    </form>
    <br><br>
    <form action="../../process/member/delete_process.php" method="post" id="withdrawalForm">
        <input type="hidden" name="no" value="<?=$_POST['no']?>">
        <input type="button" id="withdrawalBtn" value="탈퇴하기">
    </form>
    <script>
        //탈퇴 확인하기
        const withdrawalForm = document.querySelector('#withdrawalForm');
        const withdrawalBtn = document.querySelector('#withdrawalBtn');

        withdrawalBtn.addEventListener('click',function(){
            let yesNo = confirm('정말 탈퇴하시겠습니까?');
            if(yesNo){ //yes
                withdrawalForm.submit();
            }
        });
    </script>
</body>
</html>