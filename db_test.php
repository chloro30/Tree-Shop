<?php
// $db_host = "localhost";
// $db_user = "DB_아이디";
// $db_passwd = "DB_비밀번호";
// $db_name = "DB_명"; 

$db_host = "localhost";
$db_user = "root";
$db_passwd = "1234";
$db_name = "treeshop"; 
$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

if (mysqli_connect_errno($conn)) {
    echo "데이터베이스 연결 실패: " . mysqli_connect_error();
} else {
    echo "데이터베이스 연결 성공";
}
?>