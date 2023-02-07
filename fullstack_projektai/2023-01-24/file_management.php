<?php
    if(!is_dir('failai')) { // tikriname ar yra tokia direktorija
        mkdir('failai');    // jeigu nera, sukuriame direktorija
    }

    // tikriname ar nurodytas failas yra direktorija
    // arba ta pati galima padaryti su file_exists() funkcija
    if(is_file('failai/tekstas.txt')) {
        unlink('failai/tekstas.txt'); // istriname faila
    } else {
        file_put_contents('failai/tekstas.txt', 'Sveiki :)'); // sukuriame faila ir irasome turini
    }

    if(!is_dir('html')) {
        mkdir('html'); // sukuriame direktorija
    }

    // duomenu paemimas
    $html = file_get_contents('https://www.delfi.lt/');

    file_put_contents('html/delfi.html', $html );
?>