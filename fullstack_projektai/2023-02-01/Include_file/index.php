<!-- M - Model -->
<!-- V - View -->
<!-- C - Controler -->

<?php 
    // include('neegzistuojantis_failas.php'); // include neradus filo išmeta tik įspėjimą
    // require('neegzistuojantis_failas.php'); // reqiure neradus failo išmeta kritinę klaidą.
    // include_once ('./views/header.php'); // include_once naudojama norint tik vieną kartą rodyti failą.
    // require_once ('./views/header.php'); // require_once naudojama norint tik vieną kartą rodyti failą.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Krautuvė</title>
</head>

<body>
    <?php include './views/header.php'; 
    // <?php include ('./views/header.php'); // galima rašyti be skliaustelių
    ?>

    <main>
        <?php

        // paprasto router'io pavyzdys

            $page = isset($_GET['page']) ? $_GET['page'] : '';
           
            // perrašome if() variantą su case,

            switch($page) {
                case 'blog' :
                    include('./views/blog-items.php');
                    break;
                default:
                    include('./views/new-items.php');
            }

            // if (isset($_GET['page']) and $_GET['page'] === 'blog') {
            //     include('./views/blog-items.php');
            // } else {
            //     include('./views/new-items.php');
            // }


        ?>
    </main>
    <?php include('./views/footer.php') ?>
</body>

</html>