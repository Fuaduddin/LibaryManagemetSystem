<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libary Management</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> Libary Management </a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="Login.php" id="login-btn" class="fas fa-user"></a>
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#featured">featured</a>
            <a href="#arrivals">arrivals</a>
            <a href="#reviews">reviews</a>
            <a href="#blogs">blogs</a>
        </nav>
    </div>

</header>

<!-- header section ends -->

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#blogs" class="fas fa-blog"></a>
</nav>
<div class="login-form-container active">


<form class="form-horizontal" method="post" action="registration.php"  enctype="multipart/form-data">
        <h3>sign Up</h3>
        <span> Your Name</span>
        <input type="text" class="box" name="yourname" id="name" placeholder="Enter your Name" />
        
        <span>Username</span>
        <input type="text" class="box"  name="username" id="username" placeholder="Enter your Username" />
        <span> Password</span>
        <input type="password" class="box" name="password" id="password" placeholder="Enter your Password" />
        
        <span>Confirm Password</span>
        <input type="password" class="box" name="confirmpassword" id="password" placeholder="Enter your Password" />
        <span>Profile Pic</span>
        <input type="file" alt="pro-pic" name="profilepic" class="box">
        <span>Your Role</span>
        <select class="form-select form-control box" name="role" aria-label="Default select example">
                                <option selected>Please Select</option>
                               <option value="admin">Admin</option>
                              <option value="customer">Customer</option>
                             </select>
        <input type="submit"  name="submit"  class="btn">
        <p>return <a href="index.php">back</a></p>
    </form>

</div>
<?php
if(isset($_POST['submit'])){
    $name = $_POST['yourname'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $confirmpassword = $_POST['confirmpassword']; 
    $date = date("d-m-Y");
    $imagename = $_FILES['profilepic']['name']; //storing file name
    $tempimagename = $_FILES['profilepic']['tmp_name']; //storing temp name
    move_uploaded_file( $tempimagename,"imgs/$imagename");
    $role = $_POST['role']; 
    $con = mysqli_connect("localhost","root","","ewuproject");
    // if (!$con) {
    //    die("Connection failed: " . mysqli_connect_error());
    //   }
    //     else{
    //    echo "Connected successfully";
    //     }
    if($password==$confirmpassword)
    {
        $sql = "insert into register(`name`,`username`,`password`,`date`,`ProfilePic`,`Role`) values('$name','$username','$password','$date','$imagename','$role')";
        $query = mysqli_query($con,$sql);
        if($query)
        {
            echo "<script type='text/javascript'> alert('You Scucessfully Register. Thank You')</script>";
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
<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>our locations</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> indonesia </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> USA </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> russia </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> france </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> japan </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> africa </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> arrivals </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> reviews </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> blogs </a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> privacy policy </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
            <a href="#"> <i class="fas fa-envelope"></i> hellofreewebsitecode@gmail.com </a>
            <img src="image/worldmap.png" class="map" alt="">
        </div>
        
    </div>

    <div class="share">
        <a href="https://facebook.com/freewebsitecode/" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="credit"> created by <span><a href="https://freewebsitecode.com/">Free Website Code</a></span> | all rights reserved! </div>

</section>

<!-- footer section ends -->















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<style>
    .login-form-container {
    display: flex;
    align-items: center;
    justify-content: center;
     background: unset !important;
    position: unset !important;
    top: unset !important;
    right: unset !important;
    z-index: unset !important;
    height: 100%;
    width: 100%;
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
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

:root{
    --green:#27ae60;
    --dark-color:#219150;
    --black:#444;
    --light-color:#666;
    --border:.1rem solid rgba(0,0,0,.1);
    --border-hover:.1rem solid var(--black);
    --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
}

*{
    font-family: 'Poppins', sans-serif;
    margin:0; padding:0;
    box-sizing: border-box;
    outline: none; border:none;
    text-decoration: none;
    text-transform: capitalize;
    transition:all .2s linear;
    transition:width none;
}

html{
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-padding-top: 5rem;
    scroll-behavior: smooth;
}

html::-webkit-scrollbar{
    width:1rem;
}

html::-webkit-scrollbar-track{
    background:transparent;
}

html::-webkit-scrollbar-thumb{
    background:var(--black);
}

section{
    padding:5rem 9%;
}

.heading{
    text-align: center;
    margin-bottom: 2rem;
    position: relative;
}

.heading::before{
    content: '';
    position: absolute;
    top:50%; left:0;
    transform: translateY(-50%);
    width: 100%;
    height:.01rem;
    background: rgba(0,0,0,.1);
    z-index: -1;
}

.heading span{
    font-size: 3rem;
    padding:.5rem 2rem;
    color:var(--black);
    background: #fff;
    border:var(--border);
}

.btn{
    margin-top: 1rem;
    display:inline-block;
    padding:.9rem 3rem;
    border-radius: .5rem;
    color:#fff;
    background:var(--green);
    font-size: 1.7rem;
    cursor: pointer;
    font-weight: 500;
}

.btn:hover{
    background:var(--dark-color);
}

.header .header-1{
    background:#fff;
    padding:1.5rem 9%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header .header-1 .logo{
    font-size: 2.5rem;
    font-weight: bolder;
    color:var(--black);
}

.header .header-1 .logo i{
    color:var(--green);
}

.header .header-1 .search-form{
    width:50rem;
    height:5rem;
    border:var(--border);
    overflow: hidden;
    background:#fff;
    display:flex;
    align-items: center;
    border-radius: .5rem;
}

.header .header-1 .search-form input{
    font-size: 1.6rem;
    padding:0 1.2rem;
    height:100%;
    width:100%;
    text-transform: none;
    color:var(--black);
}

.header .header-1 .search-form label{
    font-size: 2.5rem;
    padding-right: 1.5rem;
    color:var(--black);
    cursor: pointer;
}

.header .header-1 .search-form label:hover{
    color:var(--green);
}

.header .header-1 .icons div,
.header .header-1 .icons a{
    font-size: 2.5rem;
    margin-left: 1.5rem;
    color:var(--black);
    cursor: pointer;
}

.header .header-1 .icons div:hover,
.header .header-1 .icons a:hover{
    color:var(--green);
}

#search-btn{
    display: none;
}

.header .header-2{
    background:var(--green);
}

.header .header-2 .navbar{
    text-align: center;
}

.header .header-2 .navbar a{
    color:#fff;
    display: inline-block;
    padding:1.2rem;
    font-size: 1.7rem;
}

.header .header-2 .navbar a:hover{
    background:var(--dark-color);
}

.header .header-2.active{
    position:fixed;
    top:0; left:0; right:0;
    z-index: 1000;

}

.bottom-navbar{
    text-align: center;
    background:var(--green);
    position: fixed;
    bottom:0; left:0; right:0;
    z-index: 1000;
    display: none;
}

.bottom-navbar a{
    font-size: 2.5rem;
    padding:2rem;
    color:#fff;
}

.bottom-navbar a:hover{
    background:var(--dark-color);
}

.login-form-container{
    display: flex;
    align-items: center;
    justify-content: center;
    background:rgba(255,255,255,.9);
    position:fixed;
    top:0; right:-105%;
    z-index: 10000;
    height:100%;
    width:100%;
}

.login-form-container.active{
    right:0;
}

.login-form-container form{
    background:#fff;
    border:var(--border);
    width:40rem;
    padding:2rem;
    box-shadow: var(--box-shadow);
    border-radius: .5rem;
    margin:2rem;
}

.login-form-container form h3{
    font-size: 2.5rem;
    text-transform: uppercase;
    color:var(--black);
    text-align: center;
}

.login-form-container form span{
    display: block;
    font-size: 1.5rem;
    padding-top: 1rem;
}

.login-form-container form .box{
    width: 100%;
    margin:.7rem 0;
    font-size: 1.6rem;
    border:var(--border);
    border-radius: .5rem;
    padding:1rem 1.2rem;
    color:var(--black);
    text-transform: none;
}

.login-form-container form .checkbox{
    display:flex;
    align-items: center;
    gap:.5rem;
    padding:1rem 0;
}

.login-form-container form .checkbox label{
    font-size: 1.5rem;
    color:var(--light-color);
    cursor: pointer;
}

.login-form-container form .btn{
    text-align: center;
    width:100%;
    margin:1.5rem 0;
}

.login-form-container form p{
    padding-top: .8rem;
    color:var(--light-color);
    font-size: 1.5rem;
}

.login-form-container form p a{
    color:var(--green);
    text-decoration: underline;
}

.login-form-container #close-login-btn{
    position: absolute;
    top:1.5rem; right:2.5rem;
    font-size: 5rem;
    color:var(--black);
    cursor: pointer;
}

.home{
    background: url(../image/banner-bg.jpg) no-repeat;
    background-size: cover;
    background-position: center;
}

.home .row{
    display:flex;
    align-items: center;
    flex-wrap: wrap;
    gap:1.5rem;
}

.home .row .content{
    flex:1 1 42rem;
}

.home .row .books-slider{
    flex:1 1 42rem;
    text-align: center;
    margin-top: 2rem;
}

.home .row .books-slider a img{
    height: 25rem;
}

.home .row .books-slider a:hover img{
    transform: scale(.9);
}

.home .row .books-slider .stand{
    width:100%;
    margin-top: -2rem;
}

.home .row .content h3{
    color:var(--black);
    font-size: 4.5rem;
}

.home .row .content p{
    color:var(--light-color);
    font-size: 1.4rem;
    line-height: 2;
    padding:1rem 0;
}

.icons-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
    gap:1.5rem;
}

.icons-container .icons{
    display: flex;
    align-items: center;
    gap:1.5rem;
    padding:2rem 0;
}

.icons-container .icons i{
    font-size: 3.5rem;
    color:var(--green);
}

.icons-container .icons h3{
    font-size: 2.2rem;
    color:var(--black);
    padding-bottom: .5rem;
}

.icons-container .icons p{
    font-size: 1.4rem;
    color:var(--light-color);
}

.featured .featured-slider .box{
    margin:2rem 0;
    position: relative;
    overflow: hidden;
    border:var(--border);
    text-align: center;
}

.featured .featured-slider .box:hover{
    border:var(--border-hover);
}

.featured .featured-slider .box .image{
    padding:1rem;
    background: linear-gradient(15deg, #eee 30%, #fff 30.1%);
}

.featured .featured-slider .box:hover .image{
    transform: translateY(6rem);
}

.featured .featured-slider .box .image img{
    height: 25rem;
}

.featured .featured-slider .box .icons{
    border-bottom: var(--border-hover);
    position: absolute;
    top:0; left:0; right: 0;
    background: #fff;
    z-index: 1;
    transform: translateY(-105%);
}

.featured .featured-slider .box:hover .icons{
    transform: translateY(0%);
}

.featured .featured-slider .box .icons a{
    color:var(--black);
    font-size: 2.2rem;
    padding:1.3rem 1.5rem;
}

.featured .featured-slider .box .icons a:hover{
    background:var(--green);
    color:#fff;
}

.featured .featured-slider .box .content{
    background:#eee;
    padding:1.5rem;
}

.featured .featured-slider .box .content h3{
    font-size: 2rem;
    color:var(--black);
}

.featured .featured-slider .box .content .price{
    font-size: 2.2rem;
    color:var(--black);
    padding-top: 1rem;
}

.featured .featured-slider .box .content .price span{
    font-size: 1.5rem;
    color:var(--light-color);
    text-decoration: line-through;
}

.swiper-button-next,
.swiper-button-prev{
    border:var(--border-hover);
    height:4rem;
    width:4rem;
    color:var(--black);
    background: #fff;
}

.swiper-button-next::after,
.swiper-button-prev::after{
    font-size: 2rem;
}

.swiper-button-next:hover,
.swiper-button-prev:hover{
    background: var(--black);
    color:#fff;
}

.newsletter{
    background:url(../image/letter-bg.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.newsletter form{
    max-width: 45rem;
    margin-left: auto;
    text-align: center;
    padding:5rem 0;
}

.newsletter form h3{
    font-size: 2.2rem;
    color:#fff;
    padding-bottom: .7rem;
    font-weight: normal;
}

.newsletter form .box{
    width: 100%;
    margin: .7rem 0;
    padding:1rem 1.2rem;
    font-size: 1.6rem;
    color:var(--black);
    border-radius: .5rem;
    text-transform: none;
}

.arrivals .arrivals-slider .box{
    display: flex;
    align-items:center;
    gap:1.5rem;
    padding:2rem 1rem;
    border:var(--border);
    margin:1rem 0;
}

.arrivals .arrivals-slider .box:hover{
    border:var(--border-hover);
}

.arrivals .arrivals-slider .box .image img{
    height:15rem;
}

.arrivals .arrivals-slider .box .content h3{
    font-size: 2rem;
    color:var(--black);
}

.arrivals .arrivals-slider .box .content .price{
    font-size: 2.2rem;
    color:var(--black);
    padding-bottom: .5rem;
}

.arrivals .arrivals-slider .box .content .price span{
    font-size: 1.5rem;
    color:var(--light-color);
    text-decoration: line-through;
}

.arrivals .arrivals-slider .box .content .stars i{
    font-size: 1.5rem;
    color:var(--green);
}

.deal{
    background:#f3f3f3;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap:1.5rem;
}

.deal .content{
    flex:1 1 42rem;
}

.deal .image{
    flex:1 1 42rem;
}

.deal .image img{
    width: 100%;
}

.deal .content h3{
    color:var(--green);
    font-size: 2.5rem;
    padding-bottom: .5rem;
}

.deal .content h1{
    color:var(--black);
    font-size: 4rem;
}

.deal .content p{
    padding:1rem 0;
    color:var(--light-color);
    font-size: 1.4rem;
    line-height: 2;
}

.reviews .reviews-slider .box{
    border:var(--border);
    padding:2rem;
    text-align: center;
    margin:2rem 0;
}

.reviews .reviews-slider .box:hover{
    border:var(--border-hover);
}

.reviews .reviews-slider .box img{
    height:7rem;
    width:7rem;
    border-radius: 50%;
    object-fit: cover;
}

.reviews .reviews-slider .box h3{
    color:var(--black);
    font-size: 2.2rem;
    padding:.5rem 0;
}

.reviews .reviews-slider .box p{
    color:var(--light-color);
    font-size: 1.4rem;
    padding:1rem 0;
    line-height: 2;
}

.reviews .reviews-slider .box .stars{
    padding-top: .5rem;
}

.reviews .reviews-slider .box .stars i{
    font-size: 1.7rem;
    color:var(--green);
}

.blogs .blogs-slider .box{
    margin:2rem 0;
    border:var(--border);
}

.blogs .blogs-slider .box:hover{
    border:var(--border-hover);
}

.blogs .blogs-slider .box .image{
    height: 25rem;
    width: 100%;
    overflow: hidden;
}

.blogs .blogs-slider .box .image img{
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.blogs .blogs-slider .box:hover .image img{
    transform: scale(1.1);
}

.blogs .blogs-slider .box .content{
    padding:1.5rem;
}

.blogs .blogs-slider .box .content h3{
    font-size: 2.2rem;
    color:var(--black);
}

.blogs .blogs-slider .box .content p{
    font-size: 1.4rem;
    color:var(--light-color);
    padding:1rem 0;
    line-height: 2;
}

.footer .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
    gap:1.5rem;
}

.footer .box-container .box h3{
    font-size: 2.2rem;
    color:var(--black);
    padding:1rem 0;
}

.footer .box-container .box a{
    display: block;
    font-size: 1.4rem;
    color:var(--light-color);
    padding:1rem 0;
}

.footer .box-container .box a i{
    color:var(--green);
    padding-right: .5rem;
}

.footer .box-container .box a:hover i{
    padding-right: 2rem;
}

.footer .box-container .box .map{
    width:100%;
}

.footer .share{
    padding:1rem 0;
    text-align: center;
}

.footer .share a{
    height: 5rem;
    width: 5rem;
    line-height: 5rem;
    font-size: 2rem;
    color:#fff;
    background:var(--green);
    margin:0 .3rem;
    border-radius: 50%; 
}

.footer .share a:hover{
    background:var(--black);
}

.footer .credit{
    border-top: var(--border);
    margin-top: 2rem;
    padding:0 1rem;
    padding-top: 2.5rem;
    font-size: 2rem;
    color:var(--light-color);
    text-align: center;
}

.footer .credit span a{
    color:var(--green);
}

.footer .credit span a:hover{
    color: white;
    background-color: var(--green);
}


.loader-container{
    position: fixed;
    top:0; left: 0;
    height:100%;
    width: 100%;
    z-index: 10000;
    background:#f7f7f7;
    display: flex;
    align-items: center;
    justify-content: center;
}

.loader-container.active{
    display: none;
}

.loader-container img{
    height:10rem;
}










/* media queries  */

@media (max-width:991px){

    html{
        font-size: 55%;
    }

    .header .header-1{
        padding:2rem;
    }

    section{
        padding:3rem 2rem;
    }

}

@media (max-width:768px){

    html{
        scroll-padding-top: 0;
    }

    body{
        padding-bottom: 6rem;
    }

    .header .header-2{
        display:none;
    }

    .bottom-navbar{
        display: block;
    }

    #search-btn{
        display: inline-block;
    }

    .header .header-1{
        box-shadow: var(--box-shadow);
        position: relative;
    }

    .header .header-1 .search-form{
        position:absolute;
        top:-115%; right:2rem;
        width: 90%;
        box-shadow: var(--box-shadow);
    }

    .header .header-1 .search-form.active{
        top:115%;
    }

    .home .row .content{
        text-align: center;
    }

    .home .row .content h3{
        font-size: 3.5rem;
    }

    .newsletter{
        background-position: right;
    }

    .newsletter form{
        margin-left:0;
        max-width: 100%;
    }

}

@media (max-width:450px){

    html{
        font-size: 50%;
    }

}
</style>
</body>
</html>