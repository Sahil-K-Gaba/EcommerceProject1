<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="store.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400,700&display=swap" rel="stylesheet" />
    <title>Book Store</title>
</head>
<body>
    <section class="content-section">
        <div class="row">

            <h2>Our Books</h2>

            <div class="books-table-container">
            <//?php
                require('mysqli_connect.php');
                session_start();

                function setVariable($bookId){
                    $_SESSION["BookId"] = $bookId;
                    
                }

                $q1 = "SELECT BookId , BookTitle, Price, ReleaseDate, a.AuthorName, p.PublisherName FROM book b join author a on a.AuthorId = b.AuthorId JOIN publisher p on p.PublisherId = b.PublisherId";
                $r1 = @mysqli_query($dbc,$q1);

                $num = mysqli_num_rows($r1);

                if ($num > 0){

                    echo '<table width="80%" border=1 style="margin:auto;" class="books-table">
                    <thead class="table-heading">
                        <tr>
                            <th align="left">Title</th>
                            <th align="left">Author</th>
                            <th align="left">Publisher</th>
                            <th align="left">Price</th>
                            <th align="left">Release Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">';

                    while ($row = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
                        echo '<tr><td align="left"><a href="#" onclick="setVariable('.$row['BookId'].')">' . $row['BookTitle'] . '</td><td align="left">' . $row['AuthorName'] . '</td><td align="left">' . $row['PublisherName'] . '</td><td align="left">' . $row['Price'] . '</td><td align="left">' .  $row['ReleaseDate'] . '</td></tr>' ;
                    }

                    echo '</tbody></table>'; 

                    mysqli_free_result ($r1);

                } else {

                    echo '<p class="error">No records found.</p>';

                }


            ?>
            </div>
            
        </div>
    </section>
</body>
</html> -->
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
    <title>Store</title>
    <?php
        require('mysqli_connect.php');
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
                <h1>Find and buy books you Love</h1>
            </div>
        </div>
    </header>

    <main>
    <section class="content-section">
        <div class="row">

            <h2>Our Books</h2>

            <div class="books-table-container">
            
            <?php
                function setVariable($bookId){
                    $_SESSION["BookId"] = $bookId;
                    
                }

                $q1 = "SELECT BookId , BookTitle, Price, ReleaseDate, a.AuthorName, p.PublisherName FROM book b join author a on a.AuthorId = b.AuthorId JOIN publisher p on p.PublisherId = b.PublisherId";
                $r1 = @mysqli_query($dbc,$q1);

                $num = mysqli_num_rows($r1);

                if ($num > 0){

                    echo '<table width="80%" border=1 style="margin:auto; class="books-table"">
                    <thead class="table-heading">
                        <tr>
                            <th align="left">Title</th>
                            <th align="left">Author</th>
                            <th align="left">Publisher</th>
                            <th align="left">Price</th>
                            <th align="left">Release Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">';

                    while ($row = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
                        echo '<tr><td align="left"><a href="checkout.php?BookId='.$row['BookId'].'">' . $row['BookTitle'] . '</td><td align="left">' . $row['AuthorName'] . '</td><td align="left">' . $row['PublisherName'] . '</td><td align="left">$' . $row['Price'] . '</td><td align="left">' .  $row['ReleaseDate'] . '</td></tr>' ;
                    }

                    echo '</tbody></table>'; 

                    mysqli_free_result ($r1);

                } else {

                    echo '<p class="error">No records found.</p>';

                }
            ?>
            </div>
            
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