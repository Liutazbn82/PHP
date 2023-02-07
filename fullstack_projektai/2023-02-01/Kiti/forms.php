<?php
    // print_r($_GET);
    // echo implode(',',$_GET);
    // If funkcija patikriname visus laukelius, tai nebūtina bet cia pvz.
    // if(
    //     (isset($_GET['first_name']) AND $_GET['first_name'] !='') AND 
    //     (isset($_GET['last_name']) AND $_GET['last_name'] !='') AND 
    //     (isset($_GET['subject']) AND $_GET['subject'] !='') AND 
    //     (isset($_GET['message']) AND $_GET['message'] !='') 
    // print_r($_POST);
    // print_r($_GET);

    if(isset($_GET['m'])) {
        $message = $_GET['m'];
        $class = $_GET['c'];
    }
    if(
        isset($_POST['first_name']) AND 
        isset($_POST['last_name']) AND
        isset($_POST['subject']) AND
        isset($_POST['message'])
    ) {
        if( 
            $_POST['first_name'] === '' ||
            $_POST['last_name'] === '' ||
            $_POST['subject'] === '' ||
            $_POST['message'] === ''
        ) {
            $message = 'Netinkamai užpildyti formos duomenys!';
            $class = 'alert-danger';
        } else {
            $data = implode(',', $_POST);
            file_put_contents('data.txt', $data);
            $message = 'Duomenys sėkmingai išsaugoti';
            $class = 'alert-success';
            // Peradresavimas
            header('Location: get.php?m=' . $message . '&c=' . $class);

            // kodo kompiliavimo nutraukimui
            // exit;
            // die;
            // exit('klaidos aprasymas');
            // die(); // nurodo kad įvyko klaida
        }
    } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Forms</title>
</head>
<body>
    <div class="container">
        <?php if(isset($message)) { ?>
            <div class="alert <?= $class ?>"><?= $message ?></div>
        <?php } ?>
        <!-- HTML formos turi du galimus duomenu persiuntimo metodus: GET ir POST -->
        <form method="POST">
            <div class="mb-3">
                <label>Jūsų vardas</label>
                <input type="text" name="first_name" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Jūsų pavardė</label>
                <input type="text" name="last_name" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Užklausos tema</label>
                <input type="text" name="subject" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Jūsų žinutė</label>
                <textarea name="message" class="form-control" ></textarea>
            </div>
            <button class="btn btn-success">Siųsti</button>
        </form>
    </div>
</body>
</html>