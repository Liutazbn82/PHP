<?php
    // print_r(scandir('./'));
    // print_r(scandir('..'));
    // echo '<pre>';
    // print_r($_SERVER);

    // $request_uri = explode('/', $_SERVER['REQUEST_URI']);

    // // print_r($request_uri);

    // // Paskutine masyvo reiksme
    // $file_query = $request_uri[count($request_uri) -1 ];

    // $result = explode('?', $file_query); // skaidome masyva pagal nurodyta simboli

    // $result = implode('?', $result); // masyvo sujungimas i viena stringa pagal simboli

    // print_r($result);

    $dir = './'; // atidarinejame pirmine direktorija, nuo stringo priklausys ka atidarysime

    // print_r($_POST);

    if(isset($_GET['dir'])) {
        $dir = $_GET['dir'];
    }

    if(isset($_POST['file_name']) AND $_POST['file_name'] != '') {
        file_put_contents($dir . '/' . $_POST['file_name'], $_POST['file_contents']);
        header('Location: '. $_SERVER['REQUEST_URI']);
    }

    $data = scandir($dir); // atidarinejame pirmine direktorija

    print_r($data);
   
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>File Manager</title>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $folder) { ?>
                    <tr>
                        <td><?= (is_dir($folder)) ? '<a href="?dir=' . $folder . '">' . $folder . '</a>' : $folder ?></td>
                    
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <h2>Create New File</h2>
        <form method="POST">
            <div class="mb-3">
                <label>File name</label>
                <input type="text" name="file_name" class="form-control"/>
            </div>
            <div class="mb-3">
                <label>File contents</label>
                <textarea name="file_contents" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</body>
</html>
