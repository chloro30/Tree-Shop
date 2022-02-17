<?php
    // var_dump($_POST);
    
    //post로 넘어온 값을 변수에 담음
    $name = htmlspecialchars($_POST['userName']);
    $id = htmlspecialchars($_POST['userId']);
    $pw = htmlspecialchars($_POST['userPw']);
    $pwCheck = htmlspecialchars($_POST['userPwCheck']);

    $zipcode = htmlspecialchars($_POST['zipcode']);
    $roadAddress = htmlspecialchars($_POST['roadAddress']);
    $detailAddress = htmlspecialchars($_POST['detailAddress']);

    $address = "(".$zipcode.") ".$roadAddress." ".$detailAddress;

    //DB에 연결
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    $conn = mysqli_connect('localhost','root','1234','treeshop');
    // $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결

    //sql문 작성
    $sql = "INSERT INTO member(id, pw, name, address, date)
            VALUES ('{$id}', '{$pw}', '{$name}', '{$address}', now());
           ";
    // echo $sql;

    //sql 전송
    $result = mysqli_query($conn,$sql);

    //추후에 id를 중복방지 해서 WHERE절에 사용해야 함.
    $sql = "SELECT * FROM member
            WHERE id='{$id}'
            AND   pw='{$pw}'
            AND   name='{$name}'
            AND   address='{$address}'
           ";

    //sql 전송
    $result = mysqli_query($conn,$sql);

    //select 결과를 연관배열 형태로 변환
    $row = mysqli_fetch_array($result);
    // var_dump($row);

    //정상적으로 전송 됐는지 확인
    if($row){
        //세션 생성
        session_start();
        $_SESSION['userName'] = $row['name'];
        $_SESSION['userNo'] = $row['no'];
?>
    <script>
        alert('회원가입을 완료했습니다.');

        // 페이지 이동
        location.href = "../../index.php";
    </script>
<?php
    }else{
        echo "회원가입에 문제가 생겼습니다. 관리자에게 문의해주세요.<br><br>";
        echo mysqli_error($conn);
    }
?>