<?php
$fullName = $_POST['fullName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$file = $_POST['file'];

//formate the bookingDate in 'yyyy-mm-dd' formate
$bookingDateFormatted = date('y-m-d', strtotime($bookingDate));
$eventDateFormatted = date('y-m-d', strtotime($eventDate));

//Database Connection
$conn = new mysqli('localhost', 'root', `''`, 'regs-info');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into info(fullName, phoneNumber, email, password, confirm_password, file)
    value(?,?,?,?,?,?,?)");
    $stmt->bind_param("sissss",$fullName, $phoneNumber, $email ,$password ,$confirm_password ,$file);
    $stmt->execute();
    echo "Booking Successful";
    $stmt->close();
    $conn->close();
}
?>