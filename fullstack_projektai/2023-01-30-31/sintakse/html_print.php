<?php

$suma = 1010;
$vardas = 'Vardas Pavardenis';

$string = "Sveiki, {$vardas}. Jūsų išpirkos suma: {$suma}";

// echo $string;

$html = "<h1><div class='stringas' style='color: blue'><b>{$string}</b></div></h1>";

echo $html;

if($suma > 100) :
    echo 'Suma yra didesnė nei 1000<br/><br/>';
endif;

// printf() funkcija

printf('PRINTF SAKO: Sveiki, %s. Jūsų kaina: %s', $vardas, $suma );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML printinimas</title>
</head>
<body>
    <?= $html ?>

    <?php if($suma > 100) : ?> <!-- Uždarome PHP kodą kad atspausdinti HTML -->
        <div>Suma yra didesnė nei 100</div>

    <?php else : ?>
        <div>Suma yra mažesnė nei 100</div>

    <!-- endif; rašoma kai norima uždaryti php sintakse po if nestinimo su dvitaškiu. -->
    <?php endif; ?> 

        <!-- Užrašome PHP atidarymą ir uždarymą paprastai -->

    <?php for($i = 0; $i < 20; $i++) : ?>
        <div>Ciklas sukasi <?= $i ?> kartą </div>
    <?php endfor; ?>

    <a style="color: red" >Kita sintakse, analogas.</a>

        <!-- Užrašome PHP atidarymą ir uždarymą su dvitaškiu ir endfor; -->

    <?php for($i = 0; $i < 20; $i++) { ?>
        <div>Ciklas sukasi <?= $i ?> kartą </div>
    <?php } ?>

    

    


</body>
</html>
