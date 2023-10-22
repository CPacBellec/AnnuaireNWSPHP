<?php
require './src/dbConnect.php';
require './configs/global.php';
?>
<form action="#" method="post">
  <ul>
    <li>
      <label for="name">Nom&nbsp;:</label>
      <input type="text" id="name" name="name" />
    </li>
    <li>
      <label for="surname">Prenom&nbsp;:</label>
      <input type="text" id="surname" name="surname" />
    </li>
    <li>
      <label for="adress">Adresse&nbsp;:</label>
      <input type="text" id="adress" name="adress" />
    </li>
    <li>
      <label for="age">Age de l'étudiant&nbsp;:</label>
      <input type="number" id="age" name="age" />
    </li>
    <li>
      <label for="phone">Téléphone&nbsp;:</label>
      <input type="text" id="phone" name="phone" />
    </li>
    <li>
      <label for="email">Adresse mail&nbsp;:</label>
      <input type="email" id="email" name="email" />
    </li>
    <li>
      <label for="class">Spécialisation recherché&nbsp;:</label>
      <input type="text" id="class" name="class" />
    </li>
  </ul>    
  <input type="submit" value="Ajouter un étudiant !">
</form>

<?php
if (isset($_POST['name'] )&& isset($_POST['surname'])) {
    $connection->query(queryBuilder('c','contacts', ['name' =>$_POST['name']],['surname' =>$_POST['surname']],['adress' =>$_POST['adress']],['age' =>$_POST['age']],['phone' =>$_POST['phone']],['email' =>$_POST['email']],['class' =>$_POST['class']]));
}