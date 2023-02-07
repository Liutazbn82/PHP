<?php 
// sesija startuojama viršuje, nes inicijavus žemiau, 
// viršuje esanti informacija nebus pasiekiama dėl kodo skaitymo

session_start(); // inicijuojama sesija, sukuria cookie.

// Naudojantis tokio tipo sintakse, varda galima gauti ir kitame faile.
$_SESSION['vardas'] = 'Mociejus';

// print_r($_SESSION);

?>

<a href="sveikas.php">Sveikinimasis</a>


