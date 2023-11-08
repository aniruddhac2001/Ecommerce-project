<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-garments</title>
    <link rel="icon" type="image" href="img/favicon.ico">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="loader_bg">
        <div class="loader"></div>
    </div>
    <section id="header">
        <a href="#" class="logo">E-<span>Garments</span></a>

        <div>
            <ul id="navbar">
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a class="active" href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php" class="button3"><?php echo $_SESSION['username']; ?></a></li>
            </ul>
        </div>
    </section>

    <section id="hero2" class="about-header">
        <h2>#About Us</h2>
        <p>Describe Our Project and Team Members</p>
    </section>

    <section id="about-head" class="section-p1">
        <img src="img/about/a7.jpg" alt="">
        <div>
            <h2>Who We Are?</h2>
            <p>We are The Final year Student Of Bankura Unnayani Institute of Engineering In BCA Department
                Our Name is Aniruddha Chand and Soumen Mukherjee. We build the E-Garments e-commerce Website with the help of
                HTML, CSS, JS, PHP Scripting language and MySQL Database.</p>

            <br><br>
            <marquee bgcolor="#ccc" loop scrollamount="5" width="100%">Create stunning images with me as much or as little control
                as you like thanks to a choice Basic and cretive modes.</marquee>
        </div>
    </section>

    <section id="about-app" class="section-p1">
        <h1>Download our <span>App</span></h1>
        <div class="video">
            <video autoplay muted loop src="img/about/2.mp4"></video>
        </div>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotion</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Happy Customers</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>Support</h6>
        </div>
    </section>

    <section id="NewsLetter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up for more Information</h4>
            <p>Get E-mail Updates our <span>Latest offers</span>
            </p>
        </div>
        <div class="form">
            <input type="text" placeholder="your e-mail address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer>
        <p><a href="#" class="logo">E-<span>Garments</span></a></p>
        <ul class="social_icon">
            <li><a href="https://www.facebook.com/aniruddha.ani.965/"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="https://wa.me/7063189970"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
            <li><a href="https://www.instagram.com/aniruddha.ani.9659/"><ion-icon name="logo-instagram"></ion-icon></a></li>
        </ul>

        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about normal.html">About</a></li>
            <li><a href="">Services</a></li>
            <li><a href="about normal.html">Team</a></li>
            <li><a href="contact normal.html">Contact</a></li>
        </ul>
        <p>© 2023 BCA Final Year | All rights reserved</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        setTimeout(function() {
            $('.loader_bg').fadeToggle();
        }, 2200);
    </script>
</body>

</html>