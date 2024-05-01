<?php
    class chainePlus{
        private $chaine=" " ; 
        public function gras(){
            return "<b>{$this->chaine}</b>";        
        }
        public function italique(){
            return "<i>{$this->chaine}</i>"; 
        }
        public function souligne(){
            return "<u>{$this->chaine}</u>";
        }
        public function majuscules(){
            return "<label id='maj'>{$this->chaine}</label>";
        }
        public function __set($att,$val){
            $this->$att=$val ; 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1</title>
    <style>
        #maj{
            text-transform : uppercase ; 
        }
    </style>
</head>
<body>
    <?php
        $objet = new chainePlus() ; 
        $objet->chaine="Salut cest une chaine de caracteres";
        echo "Gras : ".$objet->gras()."<br>";
        echo "Majuscules : ".$objet->majuscules() ."<br>"; 
        echo "Italique : ".$objet->italique()."<br>" ;
        echo "Souligne : ".$objet->souligne() ;
    ?>
</body>
</html>