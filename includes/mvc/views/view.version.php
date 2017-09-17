<?php
  class Version_View {

    public function __construct() {

    }

    public function display_version_view(){
        ?>
        <div class="container">
            <div class="section">
                <div class="row">
                    <h2>Listes des versions</h2>
                    <p>Vous trouverez sur cette page la liste des features par version du site, ainsi que les features en prévision.</p>
                </div>
                <div class="row"></div>
                <ul class="collapsible popout" data-collapsible="accordion">
                     <li>
                       <div class="collapsible-header"><i class="material-icons">developer_mode</i>0.1</div>
                       <div class="collapsible-body">
                           <ul>
                               <li class="green-text text-darken-1">
                                   - Formulaire d'inscription
                               </li>
                               <li class="green-text text-darken-1">
                                   - Formulaire de connexion
                               </li>
                               <li class="green-text text-darken-1">
                                   - Gestion des sessions
                               </li>
                               <li class="green-text text-darken-1">
                                   - Page de profil utilisateur
                               </li>
                               <li class="green-text text-darken-1">
                                   - Formulaire de création de blague
                               </li>
                               <li class="green-text text-darken-1">
                                   - Page d'accueil avec les 10 dernières blagues
                               </li>
                               <li class="green-text text-darken-1">
                                   - Page blague seule
                               </li>
                               <li class="green-text text-darken-1">
                                   - Création de la section d'administration
                               </li>
                           </ul>
                       </div>
                     </li>
                     <li>
                       <div class="collapsible-header"><i class="material-icons">developer_mode</i>0.2</div>
                       <div class="collapsible-body">
                           <ul>
                               <li class="green-text text-darken-1">
                                   - Section administration : validation des nouvelles blagues
                               </li>
                               <li class="green-text text-darken-1">
                                   - Possibilité de modifier son mot de passe / son adresse email sur son profil
                               </li>
                               <li class="green-text text-darken-1">
                                   - Possibilité d'ajouter son avatar sur son profil
                               </li>
                               <li class="green-text text-darken-1">
                                   - Possibilité d'ajouter une description sur son profil
                               </li>
                               <li class="green-text text-darken-1">
                                   - Système de notation de blagues
                               </li>
                               <li class="green-text text-darken-1">
                                   - Mise en place des catégories de blagues (Menu, Page catégories)
                               </li>
                               <li class="red-text text-darken-1">
                                   - Possibilité de commenter une blague
                               </li>
                               <li class="red-text text-darken-1">
                                   - Possibilité d'ajouter une blague / un utilisateur à ses favoris
                               </li>
                               <li class="red-text text-darken-1">
                                   - Liste de favoris blagues / utilisateurs
                               </li>
                               <li class="red-text text-darken-1">
                                   - Mot de passe oublié avec Token
                               </li>
                               <li class="red-text text-darken-1">
                                   - Gestion des sessions (durées, remember me...)
                               </li>
                           </ul>
                       </div>
                     </li>
                     <li>
                       <div class="collapsible-header"><i class="material-icons">developer_mode</i>0.3</div>
                       <div class="collapsible-body">
                           <ul>
                               <li class="red-text text-darken-1">
                                   - Système de point de blague (en fonction des notes, des blagues postés)
                               </li>
                               <li class="red-text text-darken-1">
                                   - Système de haut-fait / trophées / niveaux / titres
                               </li>
                               <li class="red-text text-darken-1">
                                   - Fonction de recherche
                               </li>
                               <li class="red-text text-darken-1">
                                   - Blague rapide
                               </li>
                           </ul>
                       </div>
                     </li>
                     <li>
                       <div class="collapsible-header"><i class="material-icons">developer_mode</i>IDEAS</div>
                       <div class="collapsible-body collapse">
                           <ul>
                               <li class="red-text text-darken-1">
                                   - Algorithme de proposition de blague (en fonction des blagues aimées)
                               </li>
                               <li class="red-text text-darken-1">
                                   - Blague version tinder (j'aime / j'aime pas / favoris ) => suivant
                               </li>
                           </ul>
                       </div>
                     </li>
                   </ul>
            </div>
        </div>
        <?php
    }

  }
?>
