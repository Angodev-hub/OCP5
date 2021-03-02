<?php
    require_once ('views/head.php');
?>
    <div class="container-fluid">
        <div class="row loginspace align-items-center">
            <div class="col-lg-6">
                <img class="img-fluid facepic" src="public/assets/pictures/profil.png" alt="Image profil">
            </div>
            <div class="col-lg-6">
                <h4>Déjà un compte ? Authentifiez-vous</h4>
                <form class="login" name="login" method="post" action="index.php?page=login">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adresse mail :</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Votre adresse mail">
                        <small id="emailHelp" class="form-text text-muted">Vos informations sont confidentielles, cryptées et ne seront jamais communiquées</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe :</label>
                        <input type="password" class="form-control" id="Password" name="password" placeholder="Votre mot de passe">
                    </div>
                    <button type="submit" name="login" class="btn btn-dark">Valider</button>
                </form>
                <div class="row">
                    <h4>Envie de participer ? Inscrivez-vous</h4>
                    <form class="signin" name="signin" method="post" action="index.php?page=signin">
                            <div class="form-group">
                                <label for="username">Choisissez votre nom d'utilisateur :</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="JohnDoe">
                            </div>
                            <div class="form-group">
                                <label for="email">Entrez votre adresse mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="john.doe@yahoo.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Définissez votre mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirmez votre mot de passe</label>
                                <input type="password" class="form-control" id="passwordconf" name="passwordconf" placeholder="Votre mot de passe">
                            </div>
                            <button type="submit" name="signin" class="btn btn-dark">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once ('views/foot.php');
?>
