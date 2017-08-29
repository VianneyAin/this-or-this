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
                <ul class="collapsible" data-collapsible="accordion">
                     <li>
                       <div class="collapsible-header"><i class="material-icons">developer_mode</i>0.1</div>
                       <div class="collapsible-body">
                           <ul>
                               <li>
                                   - Formulaire d'inscription
                               </li>
                               <li>
                                   - Formulaire de connexion
                               </li>
                               <li>
                                   - Gestion des sessions
                               </li>
                               <li>
                                   - Page de profil utilisateur
                               </li>
                               <li>
                                   - Formulaire de création de blague
                               </li>
                               <li>
                                   - Page d'accueil avec les 10 dernières blagues
                               </li>
                               <li>
                                   - Page blague seule
                               </li>
                               <li>
                                   - Création de la section d'administration
                               </li>
                           </ul>
                       </div>
                     </li>
                     <li>
                       <div class="collapsible-header"><i class="material-icons">developer_mode</i>0.2</div>
                       <div class="collapsible-body">
                           <ul>
                               <li>
                                   - Section administration : validation des nouvelles blagues
                               </li>
                               <li>
                                   - Possibilité de modifier son mot de passe / son adresse email sur son profil
                               </li>
                               <li>
                                   - Possibilité de modifier son avatar sur son profil
                               </li>
                           </ul>
                       </div>
                     </li>
                     <li>
                       <div class="collapsible-header"><i class="material-icons">developer_mode</i>0.3</div>
                       <div class="collapsible-body"><span>Aucun contenu</span></div>
                     </li>
                   </ul>
            </div>
        </div>
        <?php
    }

  }
?>
