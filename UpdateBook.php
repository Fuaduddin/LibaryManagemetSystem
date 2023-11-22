<?php  
$id=$_GET["update"];
$con = mysqli_connect("localhost","root","","ewuproject");
$sql = "select * from book where id='".$id."' limit 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
$BookName = $row["BookName"];
$BookDetails = $row["BookDetails"];
$WritterName = $row["WritterName"];
$BookImage = $row["BookImage"];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body, html {
            height: 100%;
            background-repeat: no-repeat;
            background-color: #d3d3d3;
            font-family: 'Oxygen', sans-serif;
        }

        .main {
            margin-top: 70px;
        }

        h1.title {
            font-size: 50px;
            font-family: 'Passion One', cursive;
            font-weight: 400;
        }

        hr {
            width: 10%;
            color: #fff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 15px;
        }

        input,
        input::-webkit-input-placeholder {
            font-size: 11px;
            padding-top: 3px;
        }

        .main-login {
            background-color: #fff;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .main-center {
            margin-top: 30px;
            margin: 0 auto;
            max-width: 330px;
            padding: 40px 40px;
        }

        .login-button {
            margin-top: 5px;
        }

        .login-register {
            font-size: 11px;
            text-align: center;
        }
    </style>
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
 <li><a href="aBorrowBookList.php">Borrow Book List</a></li>
 </ul>
<ul class="nav navbar-nav navbar-right">
 <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Log Out</a></li>
 </ul>
 </div>
 </nav>
</div>
    <div class="container">
        <h2>ADD NEW BOOK</h2>
        <form class="form-horizontal" method="post" action="book_update_response.php?id=<?php echo $_GET['update'];?>" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">
                    Book Name
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bookname" name="bookname" value="<?php echo $BookName ?>" placeholder="Enter Book Name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Book Details:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="bookdetails" value="<?php echo $BookDetails ?>" name="bookdetails" rows="3" placeholder="<?php echo $BookDetails ?>"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">
                    Writter Name
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="writtername" name="writtername" value="<?php echo $WritterName ?>" placeholder="Enter  Writter Name">
                </div>
            </div>
                     
            <div class="form-group">
                 <img src="<?php echo 'imgs/' . $BookImage ?>" width="100" height="110" alt='Profile pic' class="border border-dark img-thumbnail">
                <label class="control-label col-sm-2" for="email">
                    Book Image
                </label>
                <div class="col-sm-10">
                     <input type="file" alt="pro-pic" name="profilepic" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>