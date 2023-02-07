<?php /* php failas prasideda taip */
    // PHP - Loosely based programming language
    $kintamasis = '<h1>Tai yra kintamojo reikšmė</h1>';
    // print komanda skirta atvaizduoti stringa,
    print $kintamasis;

    $kintamasis = true;
    echo '<p>' . $kintamasis . '</p>';

    // Reikšmės keitimas prilyginimas
    $kintamasis = 10;
    echo '<p>' . $kintamasis . '</p>';

    // Inkrementas
    $kintamasis++;
    echo '<p>' . $kintamasis . '</p>';

    // Sudėtis
    $kintamasis = $kintamasis + 10;
    echo '<p>' . $kintamasis . '</p>';

    // Dekrementas
    $kintamasis--;
    echo '<p>' . $kintamasis . '</p>';

    // Atimtis
    $kintamasis = $kintamasis - 20;
    $kintamasis -= 10;
    echo '<p>' . $kintamasis . '</p>';

    $kintamasis = 10;

    // Daugyba
    $kintamasis = $kintamasis * 10;
    echo '<p>' . $kintamasis . '</p>';
    $kintamasis *= 5;
    echo '<p>' . $kintamasis . '</p>';

    // Dalyba
    $kintamasis = $kintamasis / 20;
    echo '<p>' . 'Dalyba '. $kintamasis . '</p>';

    $kintamasis /= 10;
    echo '<p>' . $kintamasis . '</p>';

    $pirmas = 5;
    $antras = 30;
    $trecias = 2;
    
    echo '<h2>Rezultatas - ' . ($pirmas / $antras) * $trecias . '</h2>';

    // Klasikinis MASYVO APRASYMAS
    $masyvas = array('raktinis_zodis' => 'rakt_zod_reiksme');

    // print_r skirta atvaizduoti masyvus ir objektus.
    print_r($masyvas);

    echo '<br>';  echo '<br>';
    // Arba
    var_dump($masyvas);
    echo '<br>';echo '<br>';

    // Masyvas generuojamas array() funkcijos metodu
    $masyvas = array(10,20,30,45,10.3,true);
    var_dump($masyvas);

    echo '<br>';echo '<br>';

    $masyvas = [10,20,30,45,10.3,true];
    var_dump($masyvas);

    echo '<br>';echo '<br>';

    $masyvas = ['raktas'=>15, 1 => 20, true => 30, 3=> 4.5, 5=>true]; //true=1 todėl perrašo 1 indekso reikšmę
    var_dump($masyvas);
    echo '<br>';echo '<br>';

    // susirandame norimą reikšmę masyve pagal raktą
    echo $masyvas['raktas'];
    echo '<br>';
    echo 'masyvo 1 indekso reiksme = '. $masyvas[1];
    echo '<br>';
    echo '<br>';

    // naikinu pirma masyvo reiksme'raktas'
    unset($masyvas['raktas']);
    var_dump($masyvas);
    echo '<br>';

    // pakeiciu reiksme masyve
    $masyvas[1] = 'pakeista reiksme';
    var_dump($masyvas);
    echo '<br>';

    // priskirsiu key kaip kintamaji
    $key = 3;
    $masyvas[$key] = 'kintamojo pagelba surastas alementas';
    var_dump($masyvas);
    
    echo '<br>';
    echo '<br>';

    // pridedu reiksme i masyva (pridedama masyvo gale)
    $masyvas[] = 'nauja prideta reiksme';
    var_dump($masyvas);
    
    echo '<br>';
    echo '<br>';

    // pridedu reiksme i masyva su raktazodziu (pridedama masyvo gale)
    $masyvas['key_word'] = 'nauja prideta su key_word reiksme';
    var_dump($masyvas);
    
    echo '<br>';
    echo '<br>';

    // pridedu reiksme i masyva (pridedama masyvo gale)
    $masyvas[0] = 'nauja reiksme';
    var_dump($masyvas);

    echo '<br>'; echo '<br>';

    // for ciklas su php
    for($i = 0; $i < 100; $i++) {
        echo $i . ' cikle aprašyta eilutė ir generuotas skaicius: ' . rand(0, 500) . '.<br/>';
    }



?> <!-- baigiasi taip -->