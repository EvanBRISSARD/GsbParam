<?php 
/**
 * @file ControleurAdmin.php
 * @author Brissard Evan <brissard.evan@gmail.com>
 * @version    1.0
 * @details contient les fonctions pour administration

 * regroupe les fonctions pour administration
 */
/**
 * @class ControleurAdmin
 * @brief contient les fonctions pour gérer l'administration
 */
class ControleurAdmin{
    private $modeleFront;

     public function __construct()
    {
        $this->modeleFront=new ModeleFront();
    }

    public function login(){
        include("vues/v_login.html");
    }
    
    public function seDeconnecter(){
        
        session_destroy();

        $message = "Déconnexion réussie.";
        include ("vues/v_message.php");
        include("vues/v_login.html");
    }
    
    public function verifiLoginPass(){
        if (!isset($_POST['login'], $_POST['pass']) || trim($_POST['login']) === '' || $_POST['pass'] === ''){
            
            $msgErreurs[]='Veuillez renseigner vos identifiant et mot de passe.';
			include("vues/v_erreurs.php");
            include("vues/v_login.html");
            return;

        } else {
            if ($this->modeleFront->adminVerif($_POST['pass'], $_POST['login'])) {
    
                $_SESSION['adminStatus'] = true;
                $_SESSION['adminLogin'] = $_POST['login'];
    
                $message = "Connexion réussie.";
                include ("vues/v_message.php");
                include("vues/v_accueil.html");

            } else {
                
                $msgErreurs[]='Identifiants de connexion invalides.';
                include("vues/v_erreurs.php");
                include("vues/v_login.html");
            }
        }

    }

    public function modiferProduit($idProduit){
        $produit = $this->modeleFront->getLesProduitsDuTableau(array($idProduit));
        $categories = $this->modeleFront->getLesCategories();
        
        include ("vues/v_modiferProduit.php");
    }
}