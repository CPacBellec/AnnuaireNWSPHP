<?php
require './src/dbConnect.php';

    $database = new Database($connection);

    if(isset($_GET["id"]) ){
        $database->delete($_GET['id']);
        header('Location: ./?page=home&layout=html');
    }