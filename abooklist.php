
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div>
    <nav class="navbar navbar-inverse">
<div class="container-fluid">
 <div class="navbar-header">
 <a class="navbar-brand" href="#">Libary Management</a>
 </div>
 <ul class="nav navbar-nav">
 <li><a href="aBorrowBookList.php">Profile</a></li>
 <li><a href="addnewbook.php">Add New Books</a></li>
 <li><a href="abooklist.php">Book List</a></li>
 <li><a href="actable.php">Customer Details</a></li>
 <li><a href="atable.php">Admin Details</a></li>
 <li><a href="aBorrowBookList.php">Borrow Book List</a></li>
 </ul>
<ul class="nav navbar-nav navbar-right">
 <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Log Out</a></li>
 </ul>
 </div>
 </nav>
</div>
    <div class="container">
    <h1 style="text-align:center; margin-bottom:3%;">  Book Details    </h1>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>Book Image</th>
                    <th>Book Name</th>
                    <th>Book Details</th>
                    <th>Book Writer Name</th>
                    <th>Update</th>
                    <th>Delete</th>
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
                                            <a href="UpdateBook.php?update=<?php echo $row["id"];?>"  style="text-align: right; font-family: cursive" class="btn btn-success">Update</a>
                                            <?php
                                        echo "</td>";
                                        echo "<td>";
                                            ?>
                                            <a href="abooklist.php?del=<?php echo $row["id"];?>" style="text-align: right; font-family: cursive" class="btn btn-danger">Delete</a>
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
    
    $con = mysqli_connect("localhost","root","","ewuproject");
    
    $sql = "Delete from book where id=$id";
    
    $query = mysqli_query($con,$sql);
     if($query){
        echo "<script type='text/javascript'> alert('Your book is removed')</script>";
        echo '<script>window.location="booklist.php"</script>';
    }
    else{
        echo mysqli_error($con);
    }
    
}
?>
</body>
</html>