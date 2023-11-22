<?php
$id=$_GET["update"];
$con = mysqli_connect("localhost","root","","ewuproject");
$sql = "select * from register where id='".$id."' limit 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
$name = $row["name"];
$username = $row["username"];
$password = $row["password"];
$ProfilePic = $row["ProfilePic"];
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
        <div class="row main">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">East West Libary Management</h1>
                    <hr />
                </div>
            </div>
            <div class="main-login main-center">
                <form class="form-horizontal" method="post" action="registration.php"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">
                            Your Name
                        </label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fafa-user fa" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control"
                                       name="yourname" id="name" value="<?php echo $name ?>"  placeholder="Enter your Name" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-users fa" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control"
                                   name="username" id="username" value="<?php echo $username ?>"  placeholder="Enter your Username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" value="<?php echo $password ?>"  name="password" id="password" placeholder="Enter your Password" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Confirm Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="confirmpassword" id="password" placeholder="Enter your Password" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <img src="<?php echo 'imgs/' . $ProfilePic ?>" width="100" height="110" alt='Profile pic' class="border border-dark img-thumbnail">
                        <label for="password" class="cols-sm-2 control-label">Profile Pic</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-users fa" aria-hidden="true"></i>
                            </span>
                                <input type="file" alt="pro-pic" name="profilepic" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <button type="submit" name="Update" class="btn btn-primary btn-lg btn-block login-button">
                           Update
                        </button>
                    </div>
                </form>
                 </div>  
        </div>
    </div>
    <?php
if(isset($_POST['Update'])){
    $name = $_POST['yourname'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $confirmpassword = $_POST['confirmpassword']; 
    $date = date("d-m-Y");
    $imagename = $_FILES['profilepic']['name']; //storing file name
    $tempimagename = $_FILES['profilepic']['tmp_name']; //storing temp name
    move_uploaded_file( $tempimagename,"imgs/$imagename");
    $con = mysqli_connect("localhost","root","","ewuproject");
    // if (!$con) {
    //    die("Connection failed: " . mysqli_connect_error());
    //   }
    //     else{
    //    echo "Connected successfully";
    //     }
    if($password==$confirmpassword || $confirmpassword=="" )
    {
        $sql = "UPDATE register SET  username='".$username."' ,name='".$name."',password='".$password."', ProfilePic='".$imagename."' WHERE '".$id."'";
        $query = mysqli_query($con,$sql);
        if($query)
        {
            echo "<script type='text/javascript'> alert('You Scucessfully Updated Your Profile. Thank You')</script>";
            echo '<script>window.location="Index.php"</script>';
            
        }
        else
        {
            die(mysqli_connect_error());
        }
    }
    else
    {
        echo "<script type='text/javascript'> alert('You Password doesnot match.')</script>";
    }
   
    

    
    mysqli_close($con);
}
?>
</body>
</html>