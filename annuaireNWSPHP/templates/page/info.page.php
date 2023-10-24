<?php
    require './src/dbConnect.php';
    $database = new Database($connection);

    if(isset($_GET['id'])){
        $res = $database->getByID($_GET['id']);
        $formation = $database->getByIdCLass($res[0]['class_id']);
    }
?>
<main class="flex-shrink-0 m-5 py-5">
    <div class="container-xl px-4 ">
    <div class="text-center fw-bold fs-2 text-primary pb-4">Profil de l'étudiant</div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header text-center fs-4">Modifier le profil : <a href="./?page=update&layout=html&id=<?= $res[0]["id"] ?>" ><i class="bi bi-pencil-square"></i></a></div>
                    <div class="card-body">
                        <fieldset disabled>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label for="surname" class="form-label h6">Nom :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-person"></i></div>
                                        </div>
                                        <input class="form-control" id="surname" type="text"  value="<?php echo (isset($res[0]['surname']) ? $res[0]['surname']:'')?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label h6">Prénom :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-person"></i></div>
                                        </div>
                                        <input class="form-control" id="name" type="text"  value="<?php echo (isset($res[0]['name']) ? $res[0]['name']:'')?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="birthday" class="form-label h6">Date de naissance :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar4"></i></div>
                                        </div>
                                        <input class="form-control" id="birthday" type="date"  value="<?php echo (isset($res[0]['birthday']) ? $res[0]['birthday']:'')?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1 h6" for="email">Email :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                                        </div>
                                        <input class="form-control" id="email" type="text" value="<?php echo (isset($res[0]['email']) ? $res[0]['email']:'')?>">  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1 h6" for="phone">Numéro de Téléphone :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-telephone"></i>+33</div>
                                        </div>
                                        <input class="form-control" id="phone" type="text" value="<?php echo (isset($res[0]['phone']) ? $res[0]['phone']:'')?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label class="small mb-1 h6" for="address">Adresse :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-house"></i></div>
                                        </div>
                                        <input class="form-control" id="address" type="text"  value="<?php echo (isset($res[0]['address']) ? $res[0]['address']:'')?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="small mb-1 h6" for="postalcode">Code postal :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-mailbox-flag"></i></div>
                                        </div>
                                        <input class="form-control" id="postalcode" type="text"  value="<?php echo (isset($res[0]['postalcode']) ? $res[0]['postalcode']:'')?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="small mb-1 h6" for="city">Ville :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                                        </div>
                                        <input class="form-control" id="city" type="text"  value="<?php echo (isset($res[0]['city']) ? $res[0]['city']:'')?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <label class="small mb-1 h6" for="email">Formation souhaitée :</label>
                            
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-backpack3"></i></div>
                                        </div>
                                        <select name="formation" id="formation" class="form-select ">
                                            <option selected> <?php echo $formation[0]['class_name']; ?> </option>
                                        </select>
                                    </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>