<?php
try{
    $db=new PDO("mysql:host=localhost;dbname=test","root","");
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND
    => 'SET NAMES utf8');
}
catch(PDOException $e){
    echo 'Echec de la connexion:'.$e->getMessage();
}

if (isset($_GET['search']) && !empty($_GET['search'])) {

    $search = $_GET['search'];




    $sql = "SELECT nom FROM contact WHERE nom LIKE ? OR prenom LIKE ?";


    $req = $db->prepare($sql);
    print_r($search);
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