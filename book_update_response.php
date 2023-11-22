<?php
 $con = mysqli_connect("localhost","root","","ewuproject");
//////////////////////////////////////////////////
$bookname = $_POST["bookname"];
$bookdetails = $_POST["bookdetails"];
$writtername = $_POST["writtername"];
$imagename = $_FILES['profilepic']['name']; //storing file name
$tempimagename = $_FILES['profilepic']['tmp_name']; //storing temp name
move_uploaded_file( $tempimagename,"imgs/$imagename");
///////////////////////////////////////////////////

$sql = mysqli_query($con,"Update book SET BookName='$bookname' where id ='".$_GET['id']."'");
$sql = mysqli_query($con,"Update book SET BookDetails='$bookdetails' where id ='".$_GET['id']."'");
$sql = mysqli_query($con,"Update book SET WritterName='$writtername' where id ='".$_GET['id']."'");
$sql = mysqli_query($con,"Update book SET BookImage='$imagename' where id ='".$_GET['id']."'");


echo '<script type="text/javascript">window.open("abooklist.php","_self");</script>';