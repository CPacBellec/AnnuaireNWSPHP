<?php
require './src/dbConnect.php';

$database = new Database($connection);
$formations = $database->getAllCLass();
?>
<div class="container py-5 ">
    <div class="text-center fw-bold fs-2 text-primary py-5">Liste des étudiants</div>
    <div class="row">
        <div class="col-mb-4 col-lg-4 bg-light">
            <form action="#" method="post">
                <div class="col-sm-12">
                    <label for="search" class="form-label h6">Recherche :</label>
                    <input type="text" class="form-control " id="search" name="search" value="<?php echo (!empty($_POST['search']) ? $_POST['search'] : "" ); ?>" placeholder="Nom,prenom..." >
                </div>
                <div class="col-sm-12 py-4">
                    <label for="filter" class="form-label h6">Formation :</label>
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
                    <label for="sort" class="form-label h6">Ordre de tri des noms :</label>
                    <select name="sort" id="sort" class="form-select">
                        <option value='asc' <?= ( isset($_POST['sort']) && $_POST['sort'] == 'asc' ? 'selected' : '') ?>>Croissant</option>
                        <option value='desc' <?= ( isset($_POST['sort']) && $_POST['sort'] == 'desc' ? 'selected' : '') ?>>Décroissant</option> 
                    </select>
                </div>

                <input type="submit" class="w-100 btn btn-primary btn-lg mr-3 mb-3 mt-3 " name="submit" value="Envoyer">
            </form>
        </div>
        <div class="col-md-8 col-lg-8">
            <table class="table text-center table-bordered ">
            <thead class="thead">
                <tr class="table-primary table-striped ">
                <th scope="col">Nom </th>
                <th scope="col">Prénom</th>
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
                                <td><?= $value["surname"] ?></td>
                                <td><?= $value["name"] ?></td>
                                <td><?= $value["email"] ?></td>
                                <td>0<?= $value["phone"] ?></td>
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