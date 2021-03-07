<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="icons/fontIcon/flaticon.css">
    <link rel="icon" href="icons/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="store.css" />
    <title>Checkout</title>
    <?php
        session_start();
        $_SESSION["BookId"] = $_GET["BookId"];
    ?>
</head>
<body>
    <header class="main-header">
        <nav class="main-nav">
            <div class="row nav-wrapper">
                <div class="logo-container">
                    <div class="logo-text">
                        <span class="the">The</span><br><span class="canadian">Book</span><br><span class="coffee">Store</span> 
                    </div>
                </div>
    
                <ul class="nav-links">
                    <li class="nav-link"><a href="index.php">Home</a></li>
                    <li class="nav-link"><a href="store.php">Store</a></li>
                </ul>
            </div>
        </nav>

        <div class="row showcase-container">
            <div class="showcase">
                <p class="showcase-paragraph">Collect Wisdom</p>
                <h1>You are One step away </h1>
            </div>
        </div>
    </header>

    <main>
        
        <section class="checkout-section">
            <div class="row">
                <h2>Checkout</h2>

                <form action="myorder.php" method="POST" class="checkout-form">
                    <p>First Name: <input type="text" name="firstname"></p>
                    <p>Last Name: <input type="text" name="lastname"></p>
                    <p>Address: <input type="textbox" rows="2" name="address"></p>
                    <p>Postal Code: <input type="textbox" rows="2" name="postalcode"></p>
                    <p>Payment Option:
                    <label for="credit">Credit</label>
                    <input type="radio" id="credit" name="paymentoptions" value="credit">
                    <label for="debit">Debit</label>
                    <input type="radio" id="debit" name="paymentoptions" value="debit">
                    </p>
                    <p><input type="submit" value="Submit" class="btn-submit"></p>
                </form>
            </div> 
        </section>
    </main>
    <!------------------------------FOOTER SECTION---------------------------------->

    <footer>
        <div class="row">
            <p class="copyright">Copyright © 2021 All Rights Reserved</p>
        </div>
    </footer>
    
</body>
</html>