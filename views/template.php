<?php session_start() ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>CarValue</title>

</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php?route=news">News</a></li>
                <li><a href="index.php?route=buycar">Our Cars</a></li>
                <li><a href="index.php?route=sellcar">Sell your Car</a></li>
                <li><a href="index.php?route=contact">Contact Us</a></li>
               <?php echo !isset($_SESSION['user']) ? '<li><a href="index.php?route=login">Login</a></li>' : '<li><a href="index.php?route=logout">Logout</a></li>'?>
            </ul>
        </nav>
    </header>

    <section id="content">
        <?php
        if (isset($_GET['route'])){
            if (
                $_GET['route'] == "news" ||
                $_GET['route'] == "buycar" ||
                $_GET['route'] == "sellcar" ||
                $_GET['route'] == "contact" ||
                $_GET['route'] == "login" ||
                $_GET['route'] == "logout"
            ){
                include "pages/" . $_GET["route"] . ".php";
            }

            else {
                include "pages/error.php";
            }

        }
        else {
            include "pages/news.php";
        }

        ?>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> CarValue. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="public/js/deletecar.js"></script>
    <script src="public/js/editcar.js"></script>
</body>
</html>