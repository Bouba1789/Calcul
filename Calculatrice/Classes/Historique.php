<?php
    class Historique {
        private $id;
        private $operationID;
        private $dateOperation;
      
        // Constructeur de la classe
        public function __construct(string $id, string $operationID, string $dateOperation) {
          $this->id = $id;
          $this->operationID = $operationID;
          $this->dateOperation = $dateOperation;
        }
      
       // Définition des getters et des setters 
        public function setID(string $id) {
          $this->id = $id;
        }
      
        
        public function getID(): string {
          return $this->id;
        }
      
        
        public function setOperationID(string $operationID){
          $this->operationID = $operationID;
        }
      
        
        public function getOperationID(): string {
          return $this->operationID;
        }
      
    
        public function setDateOperation(string $dateOperation) {
          $this->dateOperation = $dateOperation;
        }
      
        
        public function getDateOperation(): string {
          return $this->dateOperation;
        }
      }