<?php
if($page == 'bodyhome'){
    ob_start();
    session_start();
include 'block/homeheader.php';
include 'block/' . $page . '.php'; 
}
else{
    include 'block/homeheader.php';
include 'block/' . $page . '.php'; 
}?>
<?php include 'block/homefooter.php'; ?>
