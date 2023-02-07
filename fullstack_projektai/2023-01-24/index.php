<?php
    // Konstantos deklaravimas
    define('VAISIAI',['Obuoliai','Bananai','Abrikosai']); // konstantos pavadinimas []
    define('VARdas','Nerijus'); // konstantos pavadinimas []


    $zinute = 'Labas posaule';
    $black = true;
    $white = null;
    $deepBlue = 'class="deepBlue"';

    $dokumentai = true;
    $kedes = false;
    $rezultatas = 'Nepatikėsi. Sandėlis tuščias!';

    if($dokumentai AND $kedes) {
        $rezultatas = 'Šiuo metu sandėlyje turime ir dokumentų ant kėdžių :)';
    };
    
    // if($dokumentai OR $kedes) {
    //     $rezultatas = 'Šiuo metu sandėlyje turime arba dokumentų arba kėdžių :)';
    // };

    if($dokumentai XOR $kedes) {
        $rezultatas = 'Šiuo metu sandėlyje turime ir dokumentų ant kėdžių :)';
    };

    $list = '<ul>';

    $masyvas = [10,30,22,18,34,15];

    for($i = 0; $i < 10; $i++) {
        $list .= '<li>' . $i . '</li>';
    }

    $list .= '</ul>';

    $masyvas = [10,30,22,18,34,15];
    $didziausiasSkaicius = max(...$masyvas);
    $maziausiasSkaicius = min($masyvas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funkcijos ir operatoriai</title>
    <style>
        .dark {
            background: black;
            color: white;
        }

        .deepBlue {
            background: blue;
            color: yellow;
        }

    </style>
</head> 
<!-- <body <?php echo $black ? 'class="dark"' : '' ?>> -->
    <!-- jeigu mano kintamasis black turi teigiama reiksme, spausdinsim clase, priesingu atveju nespausdinsim nieko -->

<!-- <body <?= $black ? 'class="dark"' : '' ?>> -->

<body <?= $white ?? $deepBlue ?>>

    <!-- <h1><?php echo $zinute; ?></h1> -->

    <h1><?= $zinute ?></h1>

    <p><?= $rezultatas ?><p>

    <?= $list ?>

    <h3>Didžiausias skaičius </h3>
    <?= $didziausiasSkaicius; ?>

    <h3>Mažiausias skaičius </h3>
    <?= $maziausiasSkaicius; ?>

    <h3>Kokia tai reikšmė?</h3>

    <?php

        $kintamasis = true;

        if(is_array($kintamasis)) {
            echo 'Tai yra masyvas';
        }

        if(is_float($kintamasis)) {
            echo 'Tai yra skaičius po kablelio' ;
        }

        if(is_int($kintamasis)) {
            echo 'Tai yra sveikas skaičius' ;
        }

        if(is_bool($kintamasis)) {
            echo 'Tai yra boolean reikšmė' ;
        }
    ?>

    <h3> Duomenų tipas: </h3>
    <?= gettype($kintamasis) ?>

    <h3>Apvalinimas</h3>
    <?php
        $pi = pi(); // skaičiaus pi generavimas
        // echo $pi;

        $digit = 3.5;

        echo round($digit, 0, PHP_ROUND_HALF_UP); // apvaliname iki dvieju skaiciu po kablelio
    ?>

    <h3>Konstantos atvaizdavimas</h3>
    <?php
        echo VARdas; // Konstantos atvaizdavimas

    ?>

    <h4>Ciklai</h4>
    <?php
        // // while ciklas;
        // $i = 0;
        // while($i < 10) {
        //     echo 'Ciklas while sukasi ' . $i .'</br>';
        //     $i++;
        // }

        // // Do while ciklas
        // $i = 0;
        // do {
        //     echo 'Ciklas do while sukasi ' . $i .'</br>';
        //     $i++;
        // } while ($i < 10);

        // // for ciklas
        // for($i = 0; $i < 5; $i++) {
        //     echo 'Ciklas for sukasi ' . $i .'</br>';
        // }

        // count() funkcija gražina masyvo ilgį
        
        // for($i = 0; $i < count(VAISIAI); $i++) {
        //     echo VAISIAI[$i] . '<br/>'; // atvaizduoju masyvą eilutėse
        // }

        // $masyvas= ['bmw', 'audi', 'tojota', 'dodge'];

        // for($i = 0; $i < count($masyvas); $i++) {
        //     echo $masyvas[$i] . '<br/>'; // atvaizduoju masyvą eilutėse
        // }

        //////////////////////////////////////////////////////////////////////
        $masyvas= ['bmw', 'audi', 'tojota', 'dodge'];

        // norint susigrąžinti tik reikšmę
        foreach($masyvas as $reiksme) {
            echo $reiksme . '<br/>';
        }

        // norint susigrąžinti reikšmę ir indeksą
        foreach($masyvas as $indeksas => $reiksme) {
            echo $reiksme . ' - kurio indeksas ' . $indeksas. '<br/>';
        }

    ?>

        <h3>Switch</h3>

    <?php
        // switch
        $reiksme = 6;

        // if($reiksme === 1) {
        //     echo 'Reiksme yra lygi vienetui';
        // } else if($reiksme === 2) {
        //     echo 'Reiksme yra lygi dvejetui';
        // } else if($reiksme === 3) {
        //     echo 'Reiksme yra lygi trejetui';
        // } else if($reiksme === 4) {
        //     echo 'Reiksme yra lygi ketvertui';
        // } else {
        //     echo 'Reiksme neatpažinta';
        // }

        // arba galima dar taip

        switch($reiksme) {
            case 1: 
                echo 'Reiksme yra lygi vienetui';
                break;
            case 2:
                echo 'Reiksme yra lygi dvejetui';
                break;
            case 3:
                echo 'Reiksme yra lygi trejetui';
                break;
            case 4:
                echo 'Reiksme yra lygi ketvertui';
                break;
            default: // kitais standartiniais atvejais (else)
                echo 'Reiksme nepazinta';
        }       
    ?>


</body>
</html>