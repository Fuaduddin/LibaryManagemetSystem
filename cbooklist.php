<?php
     session_start();
     $id = $_SESSION['userid'];
    $con = mysqli_connect("localhost","root","","ewuproject");
            
    $sql = "select * from register where id = $id";
                
    $query = mysqli_query($con,$sql);
            
    $row = mysqli_fetch_assoc($query);           
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libary Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="homepage.css" />
</head>
<body>
<div>

</div>
<nav>
        <div class="menu-icon">
        </div>
        <div class="logo">Libary Management</div>
        <div class="buttons">
        <a href="logout.php" ><button class="joinbtn" href="">LOG OUT</button></a>
           
        </div>

    </nav>

    <div class="background" style="text-align: center;color: white;">
        <div class="page1">
            <img src="<?php echo 'imgs/' . $row['ProfilePic'] ?>" width="400" height="350" alt='Profile pic' class="border border-dark img-thumbnail"><br /><br />
         <?php
             echo "<i style='font-size: 20px'><h3> Welcome "."<b> Mr/Mrs ".$row["name"]."</h3></i>"."</b>"."<br />";
             echo "<h4> User Name"."<b> ".$row["name"]."</h4></b>"."<br />";              
         ?>
          <hr>
          <a href="UpdateUser.php?update=<?php echo $row["id"];?>" style="text-align: right; font-family: cursive; margin-bottom: 4%;" class="btn btn-danger">Edit Profile</a>
            
            <div class="search">
             <a href="BorrowBookList.php" ><button  class="searchbtn" type="submit" value="View Borrow books">View Borrow books</a>
</div>
        </div>
    </div>
    <div class="container">
    <h1 style="text-align:center; margin-bottom:3%;"> Available Book Details   </h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Book Image</th>
                    <th>Book Name</th>
                    <th>Book Details</th>
                    <th>Book Writer Name</th>
                    <th>Borrow</th>
                </tr>
            </thead>
            <tbody>
                <?php
     $con = mysqli_connect("localhost","root","","ewuproject");
     $sql = "select * from book order by addeddate";//ORDER BY id dess
     $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0)
                {
                    $date = date('Y-m-d');
                    $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
                    
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>";
                                    echo "<td>";
                                    ?>
                                        <img src="<?php echo 'imgs/' . $row['BookImage'] ?>" width="100" height="110" alt='Profile pic' class="border border-dark img-thumbnail">
                                    <?php
                                    echo "</td>";
                                        echo "<td>";
                                            echo $row["BookName"];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $row["BookDetails"];
                                        echo "</td>";
                                    echo "<td>";
                                            echo $row["WritterName"];
                                        echo "</td>";
                                        echo "<td>";
                                            ?>
                                            <a href="cbooklist.php?del=<?php echo $row["id"];?>" style="text-align: right; font-family: cursive" class="btn btn-success">Borrow</a>
                                            <?php
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            echo "</table>";
                        echo "</div>";
                    echo "</div>";
                }
                else
                {
                    echo "There is no user yet.";
                }
                mysqli_close($con);
            ?>                                       
            </tbody>
        </table>
        <br>
        </tr>
        </tbody>
        </table>
    </div>
<?php 
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $con1 = mysqli_connect("localhost","root","","ewuproject");
    $sql1 = "select * from book where id = $id";
    $query1 = mysqli_query($con1,$sql1);
    $row1 = mysqli_fetch_assoc($query1);
    $bookname=$row1["BookName"];
    $bookimage=$row1["BookDetails"];
    $writername=$row1["WritterName"];
    echo $bookname;
    echo $writername;
    $con2 = mysqli_connect("localhost","root","","ewuproject");
    $customerid = $_SESSION['userid'];
    $sql2 = "select * from register where id = $customerid";
    $query2 = mysqli_query($con2,$sql2);       
    $row2 = mysqli_fetch_assoc($query2);
    $customername=$row2["username"];
    echo $customername;
    $date = date("d-m-Y");
    $BorrowUpdate="Bowworwed";
    echo $BorrowUpdate;
    $con3 = mysqli_connect("localhost","root","","ewuproject");
    $sql3 = "insert into borrow(`BookName`,`BookImage`,`WriterName`,`CustomerName`,`BorrowUpdate`,`BorrowDate`) values('$bookname','$bookimage','$writername','$customername','$BorrowUpdate','$date')";
    $query3 = mysqli_query($con3,$sql3);
     if($query3){
        echo "<script type='text/javascript'> alert('Your Information havebeen added. Thank You')</script>";
        echo '<script>window.location="cbooklist.php"</script>';
    }
    else{
        echo mysqli_error($con);
    }
    
}
?>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
@import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);
*:focus {
  outline: none;
}

body {
  margin: 0;
  padding: 0;
  background: #ffffff;
  font-size: 16px;
  color: rgb(0, 0, 0);
  font-family: "Roboto", sans-serif;
  font-weight: 300;
}

nav {
  width: 1149px;
  position: absolute;
  height: 85px;
  background: #ffffff;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding: 0 100px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
}

nav form {
  height: 40px;
  width: 42%;
  margin-left: -30px;
}

.input-field {
  border-radius: 40px;
  padding: 14px;
  width: 90%;
  margin-left: -100%;
  border: 1.3px solid black;
}

nav form button {
  padding: 0 15px;
  color: black;
  font-size: 17px;
  cursor: pointer;
  background-color: transparent;
  border-color: transparent;
  margin-left: -11%;
}

nav .joinbtn {
  width: 113px;
  height: 44px;
  background: black;
  border-radius: 4px;
  font-size: 16px;
  font-weight: 520;
  border: none;
  border-radius: 4px;
  color: #fff;
  transition: 0.1s ease;
  cursor: pointer;
  margin-left: 10px;
}

nav .loginbtn {
  color: black;
  background: #ffffff;
  border-radius: 4px;
  font-size: 16px;
  font-weight: 520;
  width: 113px;
  height: 44px;
  border: 1px solid black;
  box-sizing: border-box;
  transition: 0.1s ease;
  cursor: pointer;
  margin-left: 10px;
}

nav .loginbtn a {
  text-decoration: none;
  color: black;
}

nav .loginbtn:hover,
.loginbtn:focus,
.joinbtn:hover,
.joinbtn:focus {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

nav .loginbtn:active,
.joinbtn:active {
  opacity: 0.8;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

nav .buttons {
  margin-left: -68%;
  margin-right: -3%;
}

input[type="submit"] {
  margin-top: 28px;
  width: 120px;
  height: 32px;
  border: none;
  border-radius: 4px;
  color: #fff;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

input[type="submit"]:active {
  opacity: 0.8;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

.background {
  background-image: url(https://images.unsplash.com/photo-1502485019198-a625bd53ceb7?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80);
  background-size: cover;
  width: 100%;
  height: 700px;
  left: 0px;
  top: 50px;
}

.page1 {
  padding-top: 160px;
}

.page1 .hp-text1 {
  position: absolute;
  left: 17%;
  text-align: center;
  font-family: "Roboto", sans-serif;
  font-size: 52px;
  font-weight: 700;
  letter-spacing: 8px;
  line-height: 57px;
  color: #ffffff;
  margin-top: 5%;
}

.input-icons i {
  position: absolute;
}

.input-icons {
  width: 100%;
  margin-bottom: 10px;
  margin-left: 80%;
  margin-top: -5.5%;
}

.page1 .searchbar {
  display: flex;
  padding: 16px;
  margin-top: 13px;
  border: white;
  font-size: 17px;
  width: 35%;
  position: absolute;
  left: 45%;
  transform: translate(-50%, -50%);
}

.searchbar:focus {
  color: black;
}

.page1 .search .searchbtn {
  width: 110%;
  height: 58px;
  background: white;
  border-radius: 6px 6px 6px 6px;
  font-size: 20px;

  color: black;
  font-weight: bold;
  font-family: sans-serif;
}
.page1 .search .searchbtn:hover {
  background: white;
  border-radius: 6px 6px 6px 6px;
  font-size: 18px;
}

#search-opt {
  margin-top: 230px;
}

.page1 .search {
  padding: 22px;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -50%);
}

.popular-courses p {
  color: #ffffff;
  font-size: 20px;
  font-weight: 300;
}
/*
.heading-image-grid {
    padding-left: 6%;
    color: black;
    padding-top: 30%;
}
*/
.web-op {
  color: #fff;
  font-size: 14px;
  font-weight: 400;
  min-width: 142px;
  border: solid #fff 1px;
  border-radius: 50px;
  float: left;
  text-align: center;
  line-height: 35px;
  text-decoration: none;
  margin-left: 1%;
  margin-top: 8px;
}

.web-op:hover,
.web-op:focus {
  background: #ffffff;
  font-weight: 400;
  border-color: #425c5a;
  color: #425c5a;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: all 0.5s;
}

#popular {
  position: absolute;
  padding-left: 22%;
  margin-top: 60px;
}

#popular a {
  margin-left: 12px;
}

#popular p {
  font-size: 26px;
  color: #fff;
  font-weight: 500;
  margin-top: 9px;
  margin-left: 12px;
  display: inline;
  float: left;
}

.tabs {
  margin-top: 60px;
}

.column {
  float: left;
  width: 45%;
  padding: 5px;
}

.c-grid {
  padding: 40px 40px;
  display: flex;
}

.c-grid__item {
  flex-basis: 100%;
  margin: 0 35px;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: flex-end;
  cursor: pointer;
}

.c-grid__content {
  display: flex;
  flex-direction: column;
}

.c-grid__content p {
  font-size: 14px;
  line-height: 1.4;
  margin-bottom: 10px;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

.c-grid__content b {
  font-size: 18px;
}

fieldset,
label {
  margin: 0;
  padding: 0;
}

.rating {
  border: none;
  margin-right: 155.9px;
}

.rating > [id^="star"] {
  display: none;
}

.rating > label:before {
  margin: 2px;
  font-size: 1.45em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before {
  content: "\f089";
  position: absolute;
}

.rating > label {
  color: #ddd;
  float: right;
}

.rating > [id^="star"]:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: #ffd700;
}

.view-details-btn-class {
  padding-top: 12px;
}

.view-details-btn {
  width: 100px;
  height: 40px;
  background: black;
  border-radius: 4px;
  font-size: 14px;
  font-weight: 520;
  border: none;
  border-radius: 4px;
  color: #fff;
  transition: 0.1s ease;
  cursor: pointer;
}

/*media queries*/

/* Extra small devices (phones, 600px and down) */

@media only screen and (max-width: 600px) {
}

/* Small devices (portrait tablets and large phones, 600px and up) */

@media only screen and (min-width: 600px) {
}

/* Medium devices (landscape tablets, 768px and up) */

@media only screen and (min-width: 768px) {
}

/* Large devices (laptops/desktops, 992px and up) */

@media only screen and (min-width: 992px) {
}

/* Extra large devices (large laptops and desktops, 1200px and up) */

@media only screen and (min-width: 1200px) {
}

nav .logo {
  font-size: 40px;
  margin-left: -1000px;
  font-weight: 700;
  color: black;
}



</style>
</body>
</html>