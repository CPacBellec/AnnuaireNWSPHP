<?php
require_once './configs/bootstrap.php';
ob_start();
if(isset($_GET["page"]) ){
    if(fromPage($_GET['page']) === false){
        header('Location: ./?page=home&layout=html');
    };
}else{
    header('Location: ./?page=home&layout=html');
    exit;
}
$pageContent = [
    "html" => ob_get_clean(),
];
if(isset($_GET["layout"])){
    include "./templates/layouts/". $_GET["layout"] .".layout.php";

}else{
    include "./templates/layouts/html.layout.php";
}