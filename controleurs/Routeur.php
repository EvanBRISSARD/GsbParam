<?php
require_once 'controleurs/ControleurVoirProduits.php';
require_once 'controleurs/ControleurAccueil.php';
require_once 'controleurs/ControleurGererPanier.php';
require_once 'controleurs/ControleurAdmin.php';
/**
 * @class Routeur
 * @brief gère les routes (actions à exécuter en fonction des urls)
 */
class Routeur{
    
    private $ctrlVoirProduits;
    private $ctrlAccueil;
    private $ctrlGererPanier;
    private $ctrlAdmin;
    
    public function __construct(){
        
        $this->ctrlVoirProduits=new ControleurVoirProduits();
        $this->ctrlAccueil=new ControleurAccueil();
        $this->ctrlGererPanier=new ControleurGererPanier();
        $this->ctrlAdmin=new ControleurAdmin();
    }
    /** recupère les paramètres de l'url et active les contrôleurs nécessaires
    */
    public function routerRequete()
    {
    // traitement des paramètres de l'url
    if(isset($_REQUEST['uc']))
    	$uc = $_REQUEST['uc'];
        else $uc='accueil';
    if(isset($_REQUEST['action']))
    	$action = $_REQUEST['action'];
    else $action=null;
    switch($uc)
    {
        case 'accueil':
            $this->ctrlAccueil->accueil();break;
        case 'voirProduits' :
            switch ($action)
            {
                case null :
                case 'nosProduits' : {$this->ctrlVoirProduits->nosProduit();break;}
                case 'voirCategories' : {$this->ctrlVoirProduits->voirCategories();break;}
                case 'voirProduits' : {$this->ctrlVoirProduits->voirProduits($_REQUEST['categorie']);break;}
            }; break;

        case 'gererPanier' :
            switch ($action)
            {
                case null :
                case 'voirPanier' : {$this->ctrlGererPanier->voirPanier();break;}
                case 'ajouterAuPanier' : {$this->ctrlGererPanier->ajouterAuPanier($_REQUEST['produit']);break;}
                case 'supprimerUnProduit' : {$this->ctrlGererPanier->supprimerPanier($_REQUEST['produit']);break;}
                case 'viderPanier' : {$this->ctrlGererPanier->viderPanier();break;}
                case 'passerCommande' : $this->ctrlGererPanier->passerCommande();break;
                case 'confirmerCommande' : $this->ctrlGererPanier->confirmerCommande();break;
                default: {$this->ctrlGererPanier->voirPanier();break;}
            }; break;
        case 'administrer' :  // TODO Créer un contrôleur spécial pour l'administration du site
            switch ($action)
            {
                case null :
                case 'login' : {$this->ctrlAdmin->login();break;}
                case 'loginVerif' : {$this->ctrlAdmin->verifiLoginPass();break;}
                case 'seDeconnecter' : {$this->ctrlAdmin->seDeconnecter();break;}
            }
		break; 
    }
    }
}
