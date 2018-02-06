<?php
session_start();
if (isset($_SESSION['auth']) == true):
    var_dump($_SESSION);
    include '../private/template/header.php';
    include '../private/template/menu.php' ?>
<p>HELLO</p>
<?php include '../private/template/footer.php'; ?>
<?php else: header('location : index_view.php');  endif;?>


