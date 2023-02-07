<?php

session_start();

// sesijos informacijos pašalinimui
// unset($_SESSION['vardas']);

// sesijos sunaikinimas serveryje
// session_destroy();

// print_r($_SESSION);

?>

<?php if(isset($_SESSION['vardas'])) : ?>
    <div>Sveiki, <?php echo $_SESSION['vardas']; ?> </div>
<?php else: ?>
    <div>Sveiki, Anonimas</div>
<?php endif; ?>

<!-- <a href="index.php">Titulinis</a> -->