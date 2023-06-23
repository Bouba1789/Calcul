<?php
    class Operations {
        private $id;
        private $expression;
        private $resultat;
      
        // Constructeur de la classe
        public function __construct(string $id, string $expression, float $resultat) {
          $this->id = $id;
          $this->expression = $expression;
          $this->resultat = $resultat;
        }

        /*Definition des getters et les setters*/

        
        public function getID(): string {
            return $this->id;
        }

        public function setID(string $id) {
          $this->id = $id;
        }
      
        public function getExpression(): string {
            return $this->expression;
        }
        
        public function setExpression(string $expression) {
          $this->expression = $expression;
        }
      
        
        public function getResultat(): float {
            return $this->resultat;
        }

        
        public function setResultat(float $resultat) {
          $this->resultat = $resultat;
        }
      
      }