<?php

    include("config.php");
    session_start();

    $carts = json_encode($_SESSION['cart']);
    //print_r($carts);

    //echo $xy;

    foreach ($_SESSION['cart'] as $key => $value) 
    {
        global $grandtotal;
        $grandtotal += $value['quantity'] * $value['price'];
    }
    
    $sql = "INSERT into orders(`userid`, `cart_data`, `date_time`, `cart_total`, `status`) VALUES('not now', '$carts', NOW(), '$grandtotal', 'PENDING')";
    mysqli_query($connect, $sql);

?>
<html>
    <body>
        <link rel ="stylesheet" href="style.css">
        <h1>Thankyou for shopping with us..!!</h1>

        <?php unset($_SESSION['cart']) ?>

        <div id="foot">
            <nav>
                <br><br><br><a href="product.php" id="shop">Continue Shopping<a>
            </nav>
        </div>
    </body> 
</html>