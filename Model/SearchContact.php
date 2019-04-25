<?php
/**
 * Created by PhpStorm.
 * User: REMYELFI
 * Date: 14/01/2019
 * Time: 22:02
 */
require_once ('DatabaseConnexion.php');
class SearchContact
{
    /**
     * SearchContact constructor.
     */
    public function __construct()
    {
        $this->db = DatabaseConnexion::getDatatabaseConnect();

    }


    public function Search()
    {
        if (isset($_POST['Search']) && !empty($_POST['Search'])) {
            $search = $_POST['Search'];

            $s = explode(" ", $search);
            $dbb = "SELECT * FROM contact";
            $i = 0;
            foreach ($s as $mot) {
                //afficher seulement les mots qui ont plus de 3 lettres
                // var_dump($mot);
                if (strlen($mot) > 4) {
                    if ($i == 0) {
                        $dbb .= " WHERE ";
                    } else {
                        $dbb .= " OR ";
                    }
                    $dbb .= " nom LIKE '%$mot%'";
                    $i++;
                }
            }
            echo $dbb;

            $req = $db->prepare($dbb);

            //print_r($search);
            $req->execute(array('%' . $search . '%', '%' . $search . '%'));
            $count = $req->rowCount();
            var_dump($count);

            if ($count == 0) {
                echo "Aucun document trouvé !";
            } else {
                echo "$count documents trouvés";

                while ($data = $req->fetch(PDO::FETCH_OBJ)) {

                    echo 'nom ' . $data->nom;
                }
            }


        }


    }
}