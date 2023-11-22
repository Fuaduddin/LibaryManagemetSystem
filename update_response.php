<?php
 $con = mysqli_connect("localhost","root","","ewuproject");
//////////////////////////////////////////////////
$user = $_SESSION['user'];
$name = $_POST["yourname"];
$username = $_POST["username"];
$pass = $_POST["password"];
$date = $user.'-'.date("d-m-Y");
///////////////////////////////////////////////////

$sql = mysqli_query($con,"Update register SET name='$name' where id ='".$_GET['id']."'");
$sql = mysqli_query($con,"Update register SET username='$username' where id ='".$_GET['id']."'");
$sql = mysqli_query($con,"Update register SET password='$pass' where id ='".$_GET['id']."'");
$sql = mysqli_query($con,"Update register SET date='$date' where id ='".$_GET['id']."'");

$con1 = mysqli_connect("localhost","root","","ewuproject");
//////////////////////////////////////////////////
$sql1 = mysqli_query($con1,"SELECT * FROM register where id='".$_GET['id']."'");
$data = mysqli_fetch_array($sql1);

if($data['Role']=="admin")
{
    echo '<script type="text/javascript">window.open("aBorrowBookList.php","_self");</script>';
}
else
{
    echo '<script type="text/javascript">window.open("cbooklist.php","_self");</script>';
}
