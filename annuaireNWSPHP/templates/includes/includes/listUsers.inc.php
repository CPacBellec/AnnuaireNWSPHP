<ul>
    <?php 
    require './src/dbConnect.php';
    require './configs/global.php';
    require_once './src/crud.php';
    $data = $connection->query(queryBuilder('r', 'contacts'));
    foreach ( $data as $key => $value) {
        ?>
        <li>
            <h4><?= $value["surname"]?></h4>
            <h5><?= $value["name"]?></h5>
            <h5><?= $value["adress"]?></h5>
            <h5><?= $value["age"]?></h5>
            <h5><?= $value["phone"]?></h5>
            <h5><?= $value["email"]?></h5>
            <h5><?= $value["class"]?></h5>
        </li>
        <div>
            <a href="./?page=update&layout=html">Modifier</a>
        </div>
        <?php
    }
    ?>
</ul>