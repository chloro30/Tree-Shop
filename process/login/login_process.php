<?php
    //post로 넘어온 값을 변수에 저장
    $userId = $_POST['userId'];
    $userPw = $_POST['userPw'];

    //DB연결
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    // $conn = mysqli_connect('localhost','root','1005','treeshop'); //학원 DB 비번 다름
    $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결

    // 쿼리 작성 - 아이디와 패스워드가 DB에 등록된 정보와 일치하는 레코드 찾기
    $sql = "SELECT * FROM member
             WHERE id='{$userId}' AND pw='{$userPw}';
            ";
    // echo $sql;

    // 쿼리 전송
    $result = mysqli_query($conn, $sql);

    /*
    if($result){
        echo "조회 성공<br>";
    }else{
        echo "조회 실패";
    }
    */
    
    //SELECT 결과를 연관배열 형태로 변환
    $row = mysqli_fetch_array($result);

    if($row){ //해당하는 결과가 있으면..
       //session에 해당 유저 이름 담아서 생성하기.
        session_start();
        $_SESSION['userName'] = $row['name'];
        $_SESSION['userNo'] = $row['no'];
    ?>
    
    <script>
        location.replace("../../index.php");
        // location.href="../../index.php";
    </script>

    <?php
    }else{
    ?>
    
    <script>
        alert('일치하는 정보가 없습니다');
        location.href="../../web/login/login.php";
    </script>
    
    <?php
    }
?>