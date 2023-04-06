<?php 
    session_start();

    // print_r($_SESSION);

    try {
        $db = new mysqli('localhost', 'root', '', 'songi5');
    } catch(Exception $error) {
        echo '<h2></h2>';
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>SonGi5 - your best music database!</title>
</head>

<body>
    <div class="container">
        <?php if(isset($_GET['message'])) : ?>
            <div class="mt-3 alert border border-danger alert-<?= $_GET['status'];  ?> ">
                <?= $_GET['message']; ?>
            </div>
        <?php endif; ?>
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : '';

        switch ($page) {
            case 'register';
                include './views/pages/register.php';
                break;
            case 'login';
                include './views/pages/login.php';
                break;
            case 'admin';
                include './views/pages/admin.php';
                break;
            default:
                include ('./views/pages/main.php');
        }
        ?>
    </div>
</body>

</html>