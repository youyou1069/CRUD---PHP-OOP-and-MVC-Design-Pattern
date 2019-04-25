<?php
/**
 * Created by PhpStorm.
 * User: 94010-06-10
 * Date: 09/01/2019
 * Time: 09:42
 */

require_once 'DatabaseConnexion.php';




class ReadAllRepository
{

    public function __construct()
    {
        $this->db = DatabaseConnexion::getDatatabaseConnect();

    }





    /**
     * recupere tous les objets de la bdd
     * return array/bool tableau d'objet Contact ou tableau vide ou false si erreur d'execution
     */

    public function readAlL()
    {

        $req = $this->db->query('SELECT * FROM contact ORDER BY nom, prenom');

        //construction tableau d'objet de type contact
        //$contacts = [];

        //while ($contact = $this->req->fetchAll(PDO::FETCH_OBJ)) {
         //   $contacts[] = $contact;
        //}
        //return $contacts;
        $req->setFetchMode(PDO::FETCH_CLASS, 'Contact');
        $contacts=$req->fetchAll();
        return $contacts;

    }


    public function Read($id)
    {
        $req = $this->db->prepare ('SELECT * FROM contact WHERE id=:id');
        //liaison de parametre
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        // execution de la requete
        $executeIsOk = $req->execute();

        if(!$executeIsOk=null)
        {
            //recuperer le resultat sous forme d'objet

            $contact = $req->fetchObject('Contact');

            if($contact===false){
                return null;
            }
            else{
                return $contact;
            }
        }
        else
        {
            //errerur d'execution
            return false;
        }

    }





}