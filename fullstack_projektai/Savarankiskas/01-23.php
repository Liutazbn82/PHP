<?php
    for($i = 0; $i < 200; $i++) {
        $x = rand(0, 3);
        if ($x === 0) {
            var_dump($array['A']);
          } elseif ($x === 1) {
            echo "B";
          } elseif ($x === 2) {
            echo "C";
          } else {
            echo "D";
          }
    }



?>