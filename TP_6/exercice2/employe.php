<?php
    class Employe{
        private $matricule ; 
        private $nom ; 
        private $prenom ; 
        private $date_naissance ; 
        private $date_embauche ; 
        private $salaire ; 

        public function __set($att,$val){
            $this->$att = $val ;
        }
        public function __get($att){
            return $att ; 
        }

        public function __construct($mat, $nom, $prenom, $naiss, $embauche, $sal){
            $this->matricule = $mat ; 
            $this->nom = $nom ; 
            $this->prenom = $prenom ; 
            $this->date_naissance = $naiss ; 
            $this->date_embauche = $embauche ; 
            $this->salaire = $sal ; 
        }

        public function age(){
            $current_day = date('d') ; 
            $current_month = date('m') ; 
            $current_year = date('Y') ; 

            $naissance = explode('-',$this->date_naissance) ;  
            $naiss_year = $naissance[2] ; 
            $naiss_month = $naissance[1] ; 
            $year = $current_year-$naiss_year ; 
            return $year." years and ".(abs($current_month-$naiss_month))." months old" ; 
        }

        public function anciennete(){
            $current_year = date('Y') ; 
            $embauche = explode('-',$this->date_embauche) ; 
            $embauche_year = $embauche[2] ; 
            return $current_year-$embauche_year ; 
        }

        public function augmentationDuSalaire(){
            $anciennete = $this->anciennete() ; 
            if($anciennete<5){
                $this->salaire = $this->salaire*1.02 ; 
            }
            else if($anciennete<10){
                $this->salaire = $this->salaire*1.05;
            }
            else{
                $this->salaire = $this->salaire*1.1;
            }
        }

        public function afficherEmploye(){
            echo "<br>- Matricule  $this->matricule <br>" ; 
            echo "- Nom complet <span id='maj'> $this->nom </span> <span id='cap'>$this->prenom</span>  <br>";
            echo "- Age  ".$this->age()."<br>" ;
            echo "- Anciennete  ".$this->anciennete()."<br>" ; 
            echo "- Salaire  ".$this->salaire." , avec augmentation :" ;  
            $this->augmentationDuSalaire() ; 
            echo " $this->salaire" ;
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2 </title>
    <style>
        #maj{
            text-transform : uppercase ;
        }
        #cap{
            text-transform : capitalize ; 
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Entrez votre numero de matricule  </td>
                <td><input type="text" name="matricule"></td>
            </tr>
            <tr>
                <td>Entrez votre nom  </td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td>Entrez votre prenom  </td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>Entrez votre date de naissance</td>
                <td>
                    <input type="number" placeholder="year" name="year_d">
                </td>
                <td>
                    <input type="number" name="month" placeholder="month">
                </td>
                <td>
                    <input type="number" name="day" placeholder="day">
                </td>
            </tr>
            <tr>
                <td>Entrez votre date d'embauche</td>
                <td>
                    <input type="number" placeholder="year" name="year_em">
                </td>
                <td>
                    <input type="number" name="month_em" placeholder="month">
                </td>
                <td>
                    <input type="number" name="day_em" placeholder="day">
                </td>
            </tr>
            <tr>
                <td>Entrez votre salaire </td>
                <td><input type="text" name="salaire" id=""></td>
            </tr>
            <tr>
                <td><button type="submit">Envoyer</button></td>
            </tr>
        </table>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $date_naiss = $_POST['day'].'-'.$_POST['month'].'-'.$_POST['year_d'] ; 
            $date_embauche = $_POST['day_em'].'-'.$_POST['month_em'].'-'.$_POST['year_em'] ; 
            $employe = new Employe($_POST['matricule'],$_POST['nom'],$_POST['prenom'],$date_naiss ,$date_embauche ,$_POST['salaire'] ) ;
            $employe->afficherEmploye() ; 
        }
    ?>
</body>
</html>