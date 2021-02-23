<?php
require_once('views/head.php')
?>

       <div class="container-fluid contact_bloc">
           <div class="row">
               <div class="col-lg-5 bloc_logo_contact d-flex justify-content-center">
                   <img alt="Logo Zèbre" class="logo_zebre_contact" src="public/assets/pictures/logo_zebre_noir.png">
               </div>
               <div class="col-lg-6">
                   <div class="row">
                       <div class="col-lg-4">
                           <p>Par téléphone :</p>
                           <p>Contactez le 06.00.00.00.00</p>
                       </div>
                       <div class="col-lg-4">
                            <p>Par courrier :</p>
                            <p>AG Développement<br/>
                               123 Rue fictive<br/>
                               61100, Flers de l'Orne
                            </p>
                       </div>
                       <div class="col-lg-4">
                            <p>Par courriel :</p>
                            <p>adressefictive@monmail.com</p>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-lg-12">
                           <form action="../controllers/contactcontroller.php" method="post">
                               <fieldset>
                                   <legend>Un commentaire ? Une suggestion ? Un projet ?</legend>
                                   <div class="form-group">
                                       <label for="nom">Entrez votre nom</label>
                                       <input type="text" class="form-control" id="nom" placeholder="John Doe">
                                   </div>

                                   <div class="form-group">
                                       <label for="email">Entrez votre mail</label>
                                       <input type="email" class="form-control" id="email" placeholder="johndoe@yahoo.com">
                                   </div>

                                   <div class="form-group">
                                       <label for="bio">Entrez votre message</label>
                                       <textarea class="form-control" id="bio" rows="10"></textarea>
                                   </div>

                                   <button class="btn btn-dark" type="submit">Envoyer</button>
                               </fieldset>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

<?php
require_once('views/foot.php')
?>