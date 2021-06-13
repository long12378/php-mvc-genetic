<?php
ob_start();
if (isset($_SESSION['id_prode'])) {
    for ($j = 0; $j < count($_SESSION['id_prode']); $j++) {
        echo var_dump($_SESSION['id_prode'][$j]);
        echo var_dump($_SESSION['productname'][$j]);
        echo var_dump($_SESSION['size'][$j]);
        echo var_dump($_SESSION['color'][$j]);
        echo var_dump($_SESSION['quantity'][$j]);
    }
} else {
    echo "khong nhan dc";
}
