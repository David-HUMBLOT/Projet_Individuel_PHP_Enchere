<?php


include 'functions.php';

$json = 'data.json';
if ('data.json' == []) {
    echo ("<p>c'est vide</p>");
};




  // Définir le nouveau fuseau horaire
  date_default_timezone_set('Europe/Paris');
  $date = date('h:i:s');





/**AJOUT EST EFFECTUER */
if (isset($_POST["ajoutEnchere"])) {
    $data_stock_post =  array(
        'nomProduit' => $_POST['nomProduit'],
        'prixInitial' => $_POST['prixInitial'],
        'PrixClic' => $_POST['PrixClic'],
        'upClic' => $_POST['upClic'],
        'upTime' => $_POST['upTime'],
        'choixImage' => $_POST['choixImage'],
        'id' => md5(uniqid(rand(), true)),
        'duree' => $_POST['time'],
        'date_fin' => mktime(date("H")+ $_POST['time'], date("i"), date("s"), date("m"), date("d"), date("Y")),
        
        //j ai ajouter ici identification avec une fonction que j ai creer

        // sa c 'est tout au debut quand tu déclare ton premier tableau avec ton button ajout d enchere

    );
    var_dump($data_stock_post);




    /**servira à recuperer une enchere particuliere _ AJoUT D UN NOUVELE ELEMENT A JSON SANS ECRASER LA DONN2 EXISTANT _ ouvrir (decode) le fichier dans une var $tab*/

    $data_stock_post_string = file_get_contents('data.json');
    $data_stock_post_array = json_decode($data_stock_post_string, true);
    /**mettre $data_stock_post dans la var $tab __ $data_stock_post_array =  $data_stock_post_string.json_encode($data_stock_post); _ enregistret cette modif dans data.json 
UNE FOIS LES DONN2E ENREGISTRER IN VEUT QUE A CHAQUE SUBMIT ON GENERER L AFFICHAGE DE LA CARD AVEC LES DONN2ES POST EN QUESTION Recuperer sur le json à son bon emplacemnt, ^revoir des id pour chaque element*/
    array_unshift($data_stock_post_array, $data_stock_post);
    file_put_contents("data.json", json_encode($data_stock_post_array));
};

?>


<?php
//il nous manque des id achaque card, on fait la function qui attribue des id et cette fonction est placé a la suite des valeur POST de json pares le isset POST
//Une fois fait il faut récupérer l'id générer quand SI clique sur enchérir afin de modifier  la carte cible dans la listes des enchere.
//POUR CHAQUE element du tableaux json dont la KEYS est identique à ID generer par la fonction Identification()
//On en profit comme pour id pour generer la date de fin lié au temps défini ainsi que le gain engendré par clic
//ne pas oublier de ouvrir json le decode afin d y ajouter les modif apres le encode.
//on décode json pour etre utilisable
if (isset($_POST['encherir'])) { //si le bouttin un des button encherir est cliqué alors faire
    //recupere l'id la carte en question apres clic sur encherir
    $data_stock_post_string = file_get_contents('data.json');
    $data_stock_post_array = json_decode($data_stock_post_string, true);
    //s$identification = $data_stock_post_array->{"$id"}; //pour ciblé un élément du tableaux cad ["id"]
    //pour chaque tableaux de json 
    // var_dump ($data_stock_post_array);
    //$id = $data_stock_post_array[0]['id'];
    //echo "identification=".$id;

    for ($i = 0; $i < count($data_stock_post_array); $i++) {
        if ($data_stock_post_array[$i]['id'] == $_POST['encherir']) {
            $prixEnchere = $data_stock_post_array[$i]['prixInitial'];
            $prixEnchere =   $data_stock_post_array[$i]['prixInitial'] +   $data_stock_post_array[$i]['upClic'];
            //echo $data_stock_post_array[$i]['id'];
            // augmentation du prix initial selon parametre upclic definit
            $data_stock_post_array[$i]['prixInitial'] += $data_stock_post_array[$i]['PrixClic'];


            //gestion date fin. Incrementation du temp sur clique
            $data_stock_post_array[$i]['fin_date'] += $data_stock_post_array[$i]['upTime'];

            //permettre l'affichade au bon fomrat avec mktime

            file_put_contents("data.json", json_encode($data_stock_post_array));
        };

        
    };
};
?>

<!--------------------------------TIMER------------------------------------------------->










<!-----------------------------
//Ici on gere l'ajout du prix à augmenter
    if(isset($_POST['ajoutEnchere'])){
        $id = $_POST['identification']; //
        foreach($_POST['ajoutEnchere'] as $key => $items){
            if($items['id'] == $id){
                $items['prixInitial'] = $items['prixInitial'] + $items['upClic'];
                $items['date_fin'] = $items['date_fin'] + $items['upClic'];
                $items['gain'] = $items['gain'] + $items['PrixClic'];
                $_POST['ajoutEnchere'][$key]['prix_lancement'] =  $items['prix_lancement'];
                $_POST['ajoutEnchere'][$key]['date_fin'] =  $items['date_fin'];
                $_POST['ajoutEnchere'][$key]['gain'] =  $items['gain'];
            }
        }
    }

      foreach ($_POST['encherir'] as $key => $items) {
        print_r('okq');
        $id = $_GET['id'];
        if ($items['id'] == $id) {

            $data_stock_post_enrechir = file_get_contents('data.json');
            $data_stock_post_array_encherir = json_decode($data_stock_post_encherir, true);
            echo $id;

            $_POST['prixInitial'] = $_POST['prixInitial'] + $_POST['upClic'];
            $items['finEnchere'] = $items['finEnchere'] + $items['upTime'];
            $_POST['ajoutEnchere'][$key]['prixInital'] =  $items['prixInitial'];
        }
    }

    array_unshift($data_stock_post_array_enrechir, $_POST);
    file_put_contents("data.json", json_encode($data_stock_post_array_encherir));
};

------------------------------------------------------------------------>