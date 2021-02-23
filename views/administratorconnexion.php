<?php
require_once('views/head.php')
?>

        <div class="row adminconnect align-items-center">
            <div class="col-lg-7 align-items-center">
                <img class="vague_visage img-fluid" src="public/assets/pictures/vague_visage.png" alt="Image vague visage">
            </div>
            <div class="col-lg-5 login_form">
                <h3>Connexion à l'espace administrateur</h3>
                <form method="post" action="controllers/administratorconnexioncontroller.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adresse Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre adresse mail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre mot de passe">
                    </div>
                    <button type="submit" class="btn btn-dark">Me connecter</button>
                </form>
            </div>
        </div>
<?php
require_once('views/foot.php')
?>