<?php
    //post로 넘어온 값을 변수에 담음
    $pw = htmlspecialchars($_POST['userPw']);

    $zipcode = htmlspecialchars($_POST['zipcode']);
    $roadAddress = htmlspecialchars($_POST['roadAddress']);
    $detailAddress = htmlspecialchars($_POST['detailAddress']);

    $address = "(".$zipcode.") ".$roadAddress." ".$detailAddress;


    //DB연결
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    // $conn = mysqli_connect('localhost','root','1005','treeshop');
    $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결
    
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

    header('Location: ../../web/member/view.php?no='.$_POST['no']);
?>