
<?php

require_once "./include/config.php";

class modele_produit {
    public $id; 
    public $nom; 
    public $description;
    public $prix;
    public $qtestock;

    public function __construct($id, $nom, $description, $prix, $qtestock) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->qtestock = $qtestock;
    }

 
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   
            exit();
        } 

        return $mysqli;
    }

 
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, nom, description, prix, qtestock FROM produits ORDER BY id");

        foreach ($resultatRequete as $enregistrement) {
            $tableau[] = new modele_produit($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['prix'],  $enregistrement['qtestock']);
        }

        return $tableau;
    }

    public static function ObtenirUn($id) {
        $mysqli = self::connecter();
    
        if ($requete = $mysqli->prepare("SELECT * FROM produits  WHERE id=?")) {  
            $requete->bind_param("s", $id); 
    
            $requete->execute(); 
            $result = $requete->get_result(); 
            if($enregistrement = $result->fetch_assoc()) { 
                $produits = new modele_produit($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['prix'], $enregistrement['qtestock'],);
            } else {
              
                return null;
            }   
            
            $requete->close(); 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   
            echo $mysqli->error;
            return null;
        }
    
        return $produits;
    }
    

}

?>