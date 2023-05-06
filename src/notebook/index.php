<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Домашняя работа</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="new.css">
    <link rel="stylesheet" href="underline.css">
</head>
<body>
<header class="header">
    <?php
        require_once "menu.php";
    ?>
</header>
<main class="main">
    <div class="container container__main">
        <div class="php-code">
            <?php
                require_once "User.php";

                switch ($_GET["p"])
                {
                    case 'delete':
                        require_once "delete.php";
                        break;
                    case 'view':
                        require_once "viewer.php";
                        break;
                    case 'add':
                        require_once "add.php";
                        break;
                    case 'edit':
                        require_once "edit.php";
                        break;
                    default:
                        require_once "viewer.php";
                        break;
                }
            ?>
        </div>
    </div>
</main>
<footer class="footer">
    <div class="container container__footer"></div>
</footer>
</body>
</html>