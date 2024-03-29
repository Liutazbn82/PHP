<?php
// print_r($_POST);
// exit;
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

    $dir = './';
    $back_link = '';
    
    // print_r($_POST);

    if(isset($_GET['dir']) AND $_GET['dir'] != '' ) {
        $dir = $_GET['dir'];
        //print_r($dir);
        //exit;
        $path_array = explode('/', $dir);

        // print_r($path_array);
        // echo $path_array;
        // exit;

        if($dir != './') {
            if(count($path_array) > 1) {
                unset($path_array[count($path_array) -1 ]);
                $back_link = implode('/', $path_array);
            } else {
                $back_link = './';
            }
        }
        // echo $back_link;
    }

    if(isset($_POST['data_type']) AND $_POST['data_type'] === '1') {
        if(isset($_POST['folder_name']) AND $_POST['folder_name'] != '') {
            mkdir($dir . '/' . $_POST['folder_name']); // prijungiame direktorija ir sukuriame folderi
            header('Location: '. $_SERVER['REQUEST_URI']);
        }
    } else {
        if(isset($_POST['file_name']) AND $_POST['file_name'] != '') {
            file_put_contents($dir . '/' . $_POST['file_name'], $_POST['file_contents']);
            header('Location: '. $_SERVER['REQUEST_URI']);
        }
    }

    // echo '<pre>';
    // print_r($_SERVER);
    // exit;

    if( isset($_POST['file_name_edited']) AND $_POST['file_name_edited'] != '') {
        $file_path = explode('/', $_GET['edit']);
        unset($file_path[count($file_path) - 1 ]);
        $file_path[] = $_POST['file_name_edited'];

        $to = implode('/', $file_path);
        rename($_GET['edit'], $to);

        header('Location: ?dir=' . $dir); // direktorijos info redirectas
    }

    if( isset($_GET['delete']) AND $_GET['delete'] != '') { 
        unlink($_GET['delete']);

        header('Location: ?dir=' . $dir); // direktorijos info redirectas
    }

    $data = scandir($dir);

    unset($data[0]); // panaikiname . taska. Pakilimo i aukstesne direktorija nuoroda
    unset($data[1]); // panaikiname .. taskus. Pakilimo i aukstesne direktorija nuoroda

    // if(isset($_GET['edit']) AND $_GET['edit']) {
    //     echo 'forma';
    // }
    
    // if($dir === './') {   // .. rodome tik kazkada kai esame auksciausioje norimoje direktorijoje
    //     unset($data[1]);
    // }
    // print_r($data);
   
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>File Manager</title>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($back_link) { // Back_link nerodoma aukščiausioje parent direktorijoje ?> 
                    <tr>
                        <td colspan="2"><a href="?dir=<?= $back_link ?>">.. Back to parent directory</a></td>
                    </tr>
                <?php } ?>
                <?php foreach($data as $item) { 

                    // $path = $dir === '/'. ? $item : $dir. '/' . $folder; 

                    // ARBA
                    $path = $dir. '/' . $item;
                    
                    if($dir === './') {
                        $path = $item;
                        // $path = './' . $folder; // galima daryti ir taip
                    }

                    $icon = 'folder';

                    $file_formats = [
                        'pdf' => 'file-earmark-pdf', 
                        'txt' => 'filetype-txt',
                        'exe' => 'filetype-exe',
                        'css' => 'filetype-css',
                        'js' => 'filetype-js',
                        'json' => 'filetype-json',
                        'jpg' => 'filetype-jpg',
                        'png' => 'filetype-png',
                        'gif' => 'filetype-gif',
                        'csv' => 'filetype-csv',           
                        'php' => 'filetype-php'           
                    ];

                    if(!is_dir($path)) {
                        $icon = 'file-earmark';
                        
                        // print_r($filename);
                        $filename = explode('.', $item);

                        $filename = $filename[count($filename) -1 ];
                        
                        if(array_key_exists($filename, $file_formats)) {
                            $icon = $file_formats[$filename];
                        }
                    }

                    // ARBA
                    // if($dir === './') {
                    //     $path = $folder;
                    // } else {
                    //     $path = $dir. '/' . $folder;
                    // }

                ?>
                    <tr>
                        <td>
                            <i class="bi bi-<?= $icon ?>"></i> 
                            <?= (is_dir($path)) ? '<a href="?dir=' . $path . '">' . $item . '</a>' : $item ?>
                        </td>
                        <td>
                            <a href="?edit=<?= $path ?> &dir=<?= $dir ?>" class="btn btn-success">Edit</a>
                            <a href="?delete=<?= $path ?> &dir=<?= $dir ?>" class="btn btn-danger">Delete</a>
                        </td>                    
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php if(isset($_GET['edit'])) { ?>

            <h3>Edit file name</h3>

            <form method="POST">
                <!-- Jeigu norime gauti duomenis iš laukelio, tačiau šis 
                neturi būti atvaizduojamas puslapyje, galime panaudoti type="hidden" variacją -->
                <!-- <input type="hidden" name="file_name_original" class="form-control" value="<?= $_GET['edit']?>"/> -->
                
                <div class="mb-3">
                    <label>New File name</label>
                    <input type="text" name="file_name_edited" class="form-control"/>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>

        <?php } else { ?>

        <h3>Create new file or folder</h3>
            <form method="POST">
                <div class="mb-3">
                    <label>Select data type</label>
                    <select name="data_type" class="form-control">
                        <option value="1">Folder</option>
                        <option value="2">File</option>
                    </select>
                </div>
                <div class="folder">           
                    <div class="mb-3">
                        <label>Folder name</label>
                        <input type="text" name="folder_name" class="form-control"/>
                    </div>
                </div>
                <div class="file">
                    <div class="mb-3">
                        <label>File name</label>
                        <input type="text" name="file_name" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label>File contents</label>
                        <textarea name="file_contents" class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>

            <script>
                document.querySelector('.file').style.display = 'none';

                document.querySelector('[name="data_type"]').addEventListener('change', (e) => {
                    console.log(e.target.value);
                    if(e.target.value === '1') {
                        document.querySelector('.file').style.display = 'none';
                        document.querySelector('.folder').style.display = 'block';
                    } else {
                        document.querySelector('.file').style.display = 'block';
                        document.querySelector('.folder').style.display = 'none';
                    }
                });
            </script>
        <?php } ?>
    </div>
    
</body>
</html>
