<?php
require_once('views/head.php')
?>
<div class="container tools">
    <div class="row">
        <div class="newpost">
            <div class="head-tool">
                <h3>Créer un nouveau post</h3>
                <p>Pour créer un nouvel article, merci de remplir le formulaire ci-dessous et de cliquer sur le bouton "Soumettre".</p>
            </div>
            <form class="newpost" name="newpost" method="post" action="index.php?page=dashboard">
                <div class="form-group">
                    <label for="title">Titre de l'article :</label>
                    <input type="text" class="form-control" id="title" name="title" required="required">
                </div>
                <div class="form-group">
                    <label for="description">Brève description dcu contenu de l'article :</label>
                    <input type="text" class="form-control" id="description" name="description" required="required">
                </div>
                <div class="form-group">
                    <label for="content">Contenu de l'article :</label>
                    <textarea class="form-control" id="content" rows="5" required="required"></textarea>
                </div>
                <button class="btn btn-dark" type="submit" name="newpost">Soumettre</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="newpost">
            <div class="head-tool">
                <h3>Modifier un post déjà publié</h3>
                <p>Pour modifier un article, merci de sélectionner dans un premier temps l'article désiré :</p>
            </div>
        </div>
    </div>
</div>


<?php
require_once('views/foot.php')
?>