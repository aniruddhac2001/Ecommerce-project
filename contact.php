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
                <li><a href="about.php">About</a></li>
                <li><a class="active" href="contact.php">Contact</a></li>
                <li><a href="logout.php" class="button3"><?php echo $_SESSION['username']; ?></a></li>
            </ul>
        </div>
    </section>

    <section id="hero2" class="about-header">
        <h2>#Contact Us</h2>
        <p>LEAVE A MESSAGE.We love to hear from you!</p>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency location or contact us today.</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p> Bankura, West Bengal</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>mukherjeegopal070@gmail.com</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday: 9:00am to 10:00pm</p>
                </li>
            </div>
            <br>
            <h3>Branch Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p> Kenjakura, West Bengal</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>programmerguy32@gmail.com</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday: 9:00am to 10:00pm</p>
                </li>
            </div>
        </div>

        <div class="map">
            <h3>Head Office</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58662.08840396461!2d87.02802621054052!3d23.229236045623413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f7a58c5fc2b411%3A0xfdbd0b45c0b4aa70!2sBankura%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1674988839400!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h3>Branch Office</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7330.547828677945!2d86.91830732289827!3d23.269494795459924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f7ab6803b81b19%3A0xe964aabeb59f6f79!2sKenjakura%2C%20West%20Bengal%20722139!5e0!3m2!1sen!2sin!4v1674988969567!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section id="form-details">
        <span>LEAVE A MESSAGE</span>
        <form action="https://formspree.io/f/xbjeobvz" method="POST">

            <h2>We Love to hear from you</h2>

            <label for="Name">Name :</label>
            <br />
            <input type="text" name="username" placeholder="Your Name" id="username" required autocomplete="off">

            <label for="E-mail">Email Address :</label>
            <br />
            <input type="email" name="email" placeholder="demo@gmail.com" id="email" autocomplete="off" required>

            <label for="Conatct No.">Conatct No :</label>
            <br />
            <input type="number" name="contact" placeholder="Enter Your number" id="Phone" required autocomplete="off">

            <label for="E-mail">Subject</label>
            <br />
            <input type="subject" name="subject" placeholder="Subject" id="subject" required autocomplete="off">

            <label for="Message">Message :</label>
            <br />
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message"></textarea>

            <button class="normal">Submit</button>

        </form>
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