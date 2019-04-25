<?php
/**
 * Created by PhpStorm.
 * User: 94010-06-10
 * Date: 14/01/2019
 * Time: 15:04
 */


try{
    $db=new PDO("mysql:host=localhost;dbname=test","root","");
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND
    => 'SET NAMES utf8');
}
catch(PDOException $e){
    echo 'Echec de la connexion:'.$e->getMessage();
}

if (isset($_POST['search']) && !empty($_POST['search'])) {

    $search = $_POST['search'];

    $s = explode(" ", $search);
    $dbb="SELECT * FROM contact";
    $i = 0;
    foreach ($s as $mot) {
        //afficher seulement les mots qui ont plus de 3 lettres
        var_dump($mot);
        if (strlen($mot) > 4) {
            if ($i == 0) {
                $dbb.= " WHERE ";
            } else {
                $dbb.= " OR ";
            }
            $dbb.= " nom LIKE '%$mot%'";
            $i++;
        }
    }
            echo $dbb;

        $req = $db->prepare($dbb);

        //print_r($search);
        $req->execute(array('%' .$search. '%', '%' .$search. '%'));
        $count = $req->rowCount();
        var_dump($count);

        if ($count == 0)

        {
            echo "Aucun document trouvé !";
        }

        else

        {
            echo "$count documents trouvés";

            while ($data = $req->fetch(PDO::FETCH_OBJ))

            {

                echo 'nom '.$data->nom;
            }
        }







    }






