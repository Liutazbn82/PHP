<?php
    $x = 'sveiki visi';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        const hello = '<?= $x ?>';

        console.log(hello);

        fetch('data.php')
        .then(resp => resp.text())
        .then(resp => console.log(resp));

    </script>
</body>
</html>