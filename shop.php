<?php
include("config3.php");


if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE price = '$product_price'");

    if (mysqli_num_rows($select_cart) > 0) {

        $message[] = 'Product Already Added to Cart';
    } else {

        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name,price,image,quantity) 
        VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");

        $message[] = 'Product Added to Cart Successfully';
    }
}
?>
<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '<div class="message"><span>' . $message . '</span><i class="fas fa-times" onclick="this.
    parentElement.style.display = `none`;"></i></div>';
    };
};
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
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);
                ?>
                <li><a href="cart.php" class="cart">My Cart ( <?php echo $row_count ?> )</a></li>
                <li><a href="logout.php" class="button3"><?php echo $_SESSION['username']; ?></a></li>
            </ul>
        </div>
    </section>

    <section id="hero2">
        <h2>#Stay Home Stay Safe</h2>
        <p>Save more with our coupons & upto 50% off!</p>
    </section>

    <section id="product2" class="section-p1">
        <div class="pro-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `admin`");
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>

                    <form action="" method="post">
                        <div class="pro">
                            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" height="250" alt="">
                            <h3><?php echo $fetch_product['name']; ?></h3>
                            <div class="price"><?php echo $fetch_product['price']; ?>/-</div>
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                            <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
                        </div>
                    </form>
            <?php
                };
            };
            ?>
        </div>
        </div>
    </section>

    <?php

    ?>


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
        }, 1700);
    </script>
</body>

</html>