<?php
    // var_dump($_FILES);
    // var_dump($_POST);

    //xss공격 예방
    $title = htmlspecialchars($_POST['title']);
    $desc = htmlspecialchars($_POST['desc']);
    $price = htmlspecialchars($_POST['price']);

    //업로드한 파일의 타입 및 확장자 체크
    $file_type_arr = explode('/', $_FILES['file_img']['type']);
    //파일타입
    $file_type = $file_type_arr[0];
    //파일 확장자
    $file_ext = $file_type_arr[1];
    //확장자가 적절한지 검사 - 이미지 확장자 일경우만 true
    $file_check = false;

    //확장자가 png이거나 jpeg이거나 jpg이거나 gif일 떄만 upload하기
    if($file_ext=="png" || $file_ext=="jpeg" || $file_ext=="jpg" || $file_ext=="gif"){
        $file_check = true;
    }
    //이미지 파일이 맞는지 체크
    if($file_type == "image"){
        //허용된 확장자만 업로드(그 외에는 업로드 불가)
        if($file_check){
            //업로드한 파일이 임시로 저장된 경로를 변수에 할당
            $temp_file = $_FILES['file_img']['tmp_name'];
            // echo $temp_file."<br>";

            //이미지 파일을 저장할 경로 지정
            $res_file = "../../resource/img/product/{$_FILES['file_img']['name']}";
            // echo $res_file."<br>";

            //임시파일의 위치에서 저장할 경로로 파일위치 옮기기
            $img_upload = move_uploaded_file($temp_file, $res_file);
            // echo $img_upload."<br>";
            
            if($img_upload){
                echo "파일이 업로드 되었습니다.<br>";
            }else{
                echo "파일이 업로드에 실패했습니다.<br>";
            }
        }
    }

    //DB연결
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    $conn = mysqli_connect('localhost','root','1234','treeshop');
    // $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결
    $sql = "INSERT INTO product (title,description,price,imgsrc,writer,date)
            VALUES ('{$title}','{$desc}',{$price},'resource/img/product/{$_FILES['file_img']['name']}','{$_POST['writer_hidden']}',now());
           ";



    echo $sql;
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "DB에 저장 성공.<br>";
    }else{
        echo "DB에 저장 실패.<br>";
    }

    //리다이렉션
    header('Location: ../../index.php');
?>