<?php
include('config3.php');
if (isset($_POST['order_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ')';
            $product_price = number_format($product_item['price'] * $product_item['quantity']);
            $price_total += $product_price;
        };
    };

    $total_product = implode(', ', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) 
    VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

    if ($cart_query && $detail_query) {
        echo "

        <div class='order-message-container'>
    <div class='message-container'>
        <h3>Thank You for Shopping</h3>
        <div class='order-detail'>
            <span>" . $total_product . "</span>
            <span class='total'> Total : " . $price_total . " /- </span>
        </div>
        <div class='customer-details'>
            <p> Your Name : <span>" . $name . "</span></p>
            <p> Your Number : <span>" . $number . "</span></p>
            <p> Your E-mail : <span>" . $email . "</span></p>
            <p> Your Address : <span>" . $flat . ", " . $street . ", " . $city . ", " . $state . ", " . $country . "- " . $pin_code . "</span></p>
            <p> Your Payment mode : <span>" . $method . "</span></p>
            <p>(*Pay when Product Arrives*)</p>
        </div>
        <a href='shop normal.php' class='btn2'> Continue Shopping </a>
    </div>
</div>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="icon" type="image" href="img/favicon.ico">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="checkout.css">
</head>

<body>

    <div class="container">
        <section class="checkout-form">
            <h1 class="heading">Complete Your Order</h1>
            <form action="" method="post">

                <div class="display-order">
                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $total = 0;
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                            $grand_total = $total += $total_price;
                    ?>

                            <span><?= $fetch_cart['name']; ?> [ <?= $fetch_cart['quantity']; ?> ]</span>

                    <?php
                        }
                    } else {
                        echo "<div class='display-order'><span>Your Cart is Empty</span><div>";
                    }
                    ?>
                    <span class="grand-total">Grand Total : <?= $grand_total; ?> /- </span>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Your Name :</span>
                        <input type="text" placeholder="Enter Your Name" name="name" id="name" required>
                    </div>

                    <div class="inputBox">
                        <span>Your Number :</span>
                        <input type="number" placeholder="Enter Your Number" name="number" id="number" required>
                    </div>

                    <div class="inputBox">
                        <span>Your E-mail :</span>
                        <input type="email" placeholder="Enter Your E-mail" name="email" id="email" required>
                    </div>

                    <div class="inputBox">
                        <span>Payment Method :</span>
                        <select name="method" id="method">
                            <option value="cash on delivery" selected> Cash on Delivery </option>
                        </select>
                    </div>

                    <div class="inputBox">
                        <span>Address line 1 :</span>
                        <input type="text" placeholder="e.g. flat no." name="flat" id="flat" required>
                    </div>

                    <div class="inputBox">
                        <span>Address line 2 :</span>
                        <input type="text" placeholder="e.g. street name" name="street" id="street" required>
                    </div>

                    <div class="inputBox">
                        <span>City :</span>
                        <input type="text" placeholder="e.g. city" name="city" id="city" required>
                    </div>

                    <div class="inputBox">
                        <span>State : </span>
                        <input type="text" placeholder="e.g. state" name="state" id="state" required>
                    </div>

                    <div class="inputBox">
                        <span>Country</span>
                        <select name="country" id="country">
                            <option value="Afghanistan" selected>Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Australia">Australia</option>
                            <option value="Argentia">Argentia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Costo Rica">Costo Rica</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Egypt">Egypt</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iran">Iran</option>
                            <option value="Italy">Italy</option>
                            <option value="Ireland">Ireland</option>
                            <option value="India">India</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Pin Code :</span>
                        <input type="text" placeholder="e.g. 123456" name="pin_code" id="pin_code" required>
                    </div>
                </div>
                <input type="submit" value="Order now" name="order_btn" class="btn">
                <div id="paypal-button-container"></div>
            </form>
        </section>
    </div>

</body>

</html>
<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=Aes4ckD4qNb0MkJ7gOXnZ4Ya8Zt95Pyjby18AvFzDEuKMH4qddY6WIQWtTuvqgh8viE6vgqPKFgAmnj2&currency=USD"></script>

<script>
    paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder() {
            return fetch("/my-server/create-paypal-order", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    // use the "body" param to optionally pass additional order information
                    // like product skus and quantities
                    body: JSON.stringify({
                        cart: [{
                            sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                            quantity: "YOUR_PRODUCT_QUANTITY",
                        }, ],
                    }),
                })
                .then((response) => response.json())
                .then((order) => order.id);
        },
        // Finalize the transaction on the server after payer approval
        onApprove(data) {
            return fetch("/my-server/capture-paypal-order", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        orderID: data.orderID
                    })
                })
                .then((response) => response.json())
                .then((orderData) => {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  window.location.href = 'thank_you.html';
                });
        }
    }).render('#paypal-button-container');
</script>