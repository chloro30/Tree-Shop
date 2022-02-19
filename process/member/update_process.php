<?php
    //post로 넘어온 값을 변수에 담음
    $pw = htmlspecialchars($_POST['userPw']);

    $zipcode = htmlspecialchars($_POST['zipcode']);
    $roadAddress = htmlspecialchars($_POST['roadAddress']);
    $detailAddress = htmlspecialchars($_POST['detailAddress']);

    $address = "(".$zipcode.") ".$roadAddress." ".$detailAddress;


    // echo $_POST['no'];

    //DB연결
    include '../../config/conn.php';  //DB연결 정보 가져오기
    
    $sql = "UPDATE member
            SET pw='{$pw}',
                address='{$address}'
            WHERE no='{$_POST['no']}';
           ";
    // echo $sql;

    $result = mysqli_query($conn, $sql);
    if($result){
        echo "수정 성공";
    }else{
        echo "수정 실패";
    }

    //POST로 받은 값을 그대로 리다이렉트 해주기 위해서 다음 코드를 추가
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        header('HTTP/1.1 307 Temporary move');
    }
    header('Location: ../../web/member/view.php');
?>