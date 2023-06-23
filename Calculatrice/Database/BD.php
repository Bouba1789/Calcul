<?php
    class BD {
        private  PDO $pdo ;
        public function __construct(){
           try{
                $attributs = [
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ];
                $this->pdo = new PDO("mysql:host=localhost;dbname=Calculatrice","root","",$attributs);
           }catch(Exception $e){
                echo "Echec de la connexion";
           };
        }

        public   function getConnection(): PDO{
            return $this->pdo;
        }
        
    }