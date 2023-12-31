<?php
require './src/dbConnect.php';

$database = new Database($connection);
$formations = $database->getAllCLass();
?>
<div class="container py-5 ">
    <div class="row">
        <div class="col-mb-4 col-lg-4 bg-light ">
            <form action="#" method="post">
                <div class="col-sm-12">
                    <label for="search" class="form-label">Recherche</label>
                    <input type="text" class="form-control " id="search" name="search" value="<?php echo (!empty($_POST['search']) ? $_POST['search'] : "" ); ?>" placeholder="Nom,prenom..." >
                </div>
                <div class="col-sm-12 py-4">
                    <label for="filter" class="form-label">Formation</label>
                    <select name="filter" id="filter" class="form-select">
                        <option disabled selected hidden>Filtrer selon la formation... </option>
                        <option value="">Toutes les formations</option>
                        <?php
                            foreach ($formations as $formation) {
                                echo "<option value='{$formation['class_id']}' " .
                                ( !empty($_POST['filter']) && $_POST['filter'] == $formation['class_id'] ? 'selected' : ''
                                ) . ">{$formation['class_name']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-sm-12">
                    <label for="sort" class="form-label">Ordre de tri des noms</label>
                    <select name="sort" id="sort" class="form-select">
                        <option value='asc' <?= ( isset($_POST['sort']) && $_POST['sort'] == 'asc' ? 'selected' : '') ?>>Croissant</option>
                        <option value='desc' <?= ( isset($_POST['sort']) && $_POST['sort'] == 'desc' ? 'selected' : '') ?>>Décroissant</option> 
                    </select>
                </div>

                <input type="submit" class="w-100 btn btn-primary btn-lg mr-3 mb-3 mt-3 " name="submit" value="Envoyer">
            </form>
        </div>
        <div class="col-md-8 col-lg-8">
            <table class="table text-center">
            <thead class="thead">
                <tr class="table-primary">
                <th scope="col">Nom Prénom</th>
                <th scope="col">Adresse mail</th>
                <th scope="col">Numéro de Téléphone</th>
                <th scope="col">Formation</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        if(isset($_POST['submit'])){
                            $data = $database->searchFilterSort((isset($_POST['filter'])? $_POST['filter'] : '' ),(isset($_POST['search'])? $_POST['search'] : ''),(isset($_POST['sort'])? $_POST['sort'] : ''));
                        }else{
                            $data = $database->getAll();
                        }
                         
                        $i = 0;
                        foreach ( $data as $key => $value) { 
                           $formation = $database->getByIdClass($value["class_id"]);
                    ?>
                            <tr>
                                <td><?= $value["surname"] .' '.$value["name"] ?></td>
                                <td><?= $value["email"] ?></td>
                                <td><?= $value["phone"] ?></td>
                                <td><?= $formation[0]['class_name'] ?></td>
                                <td><a href="./?page=info&layout=html&id=<?= $value["id"] ?>"><i class="bi bi-eye"></i></a>   <a href="./?page=update&layout=html&id=<?= $value["id"] ?>" ><i class="bi bi-pencil-square"></i></a>   <a href="./?page=delete&layout=html&id=<?= $value["id"] ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                    <?php      
                        }
                    ?>
            </tbody>
            
            </table>
        </div>
    </div>
</div>