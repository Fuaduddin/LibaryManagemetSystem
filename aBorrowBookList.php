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
    <title>East West University Libary</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div>
    <nav class="navbar navbar-inverse">
<div class="container-fluid">
 <div class="navbar-header">
 <a class="navbar-brand" href="#">East West Libary</a>
 </div>
 <ul class="nav navbar-nav">
 <li><a href="aBorrowBookList.php">Profile</a></li>
 <li><a href="addnewbook.php">Add New Books</a></li>
 <li><a href="abooklist.php">Book List</a></li>
 <li><a href="actable.php">Customer Details</a></li>
 <li><a href="atable.php">Admin Details</a></li>
 
 </ul>
<ul class="nav navbar-nav navbar-right">
 <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Log Out</a></li>
 </ul>
 </div>
 </nav>
</div>
    <div class="container" style="text-align: center;background-image: url(https://images.unsplash.com/photo-1502485019198-a625bd53ceb7?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80);
    background-size: cover;width: 100%;height: 700px;left: 0px;top: 10px; color:white;">
        
        <div style="margin-top:1%;">
        <img src="<?php echo 'imgs/' . $row['ProfilePic'] ?>" width="200" height="220" alt='Profile pic' class="border border-dark img-thumbnail"><br /><br />
        <?php
             echo "<i style='font-size: 20px'><h3> Welcome "."<b> Mr/Mrs ".$row["name"]."</h3></i>"."</b>"."<br />";
             echo "<h4> User Name"."<b> ".$row["name"]."</h4></b>"."<br />";              
        ?>
        <hr>
        <a href="UpdateUser.php?update=<?php echo $row["id"];?>" style="text-align: right; font-family: cursive; margin-bottom: 4%;" class="btn btn-danger">Edit Profile</a>
         </div>

    </div>
    <div class="container">
    <h1 style="text-align:center; margin-bottom:3%;">Borrow  Book Details    </h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Book Image</th>
                    <th>Book Name</th>
                    <th>Book Writer Name</th>
                    <th>Borrow Date</th>
                    <th>Borrow Book Update</th>
                    <th>Returened</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost","root","","ewuproject");
                $sql = "select * from borrow";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0)
                {
                    
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
                                            echo $row["WriterName"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["BorrowDate"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["BorrowUpdate"];
                                       echo "</td>";
                                    echo "<td>";
                                    ?>
                                    <a href="aBorrowBookList.php?del=<?php echo $row["id"];?>" style="text-align: right; font-family: cursive" class="btn btn-success">Returened</a>
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
//session_start();

if(isset($_GET['del'])){
    $id = $_GET['del'];
    $con = mysqli_connect("localhost","root","","ewuproject");
    $sql = mysqli_query($con,"Update borrow SET BorrowUpdate='Complete' where id ='".$id."'");
     if($query){
        echo "<script type='text/javascript'> alert('Your Information havebeen Updated. Thank You')</script>";
        echo '<script>window.location="aBorrowBookList.php"</script>';
    }
    else{
        echo mysqli_error($con);
    }
    
}
?>
</body>
</html>