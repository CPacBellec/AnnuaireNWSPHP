<?php
require './src/dbConnect.php';

$database = new Database($connection);

if(isset($_POST['submit'])){
  if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['birthday']) && !empty($_POST['email']) && !empty($_POST['phone'])){
    $payload = [$_POST['name'],$_POST['surname'],$_POST['birthday'],$_POST["email"],$_POST['phone'],$_POST['address'],$_POST['postalcode'],$_POST['city'],$_POST['class']];
    $database->update($_GET['id'],$payload);
    header('Location: ./?page=home&layout=html');
    exit;
  }
}
?>