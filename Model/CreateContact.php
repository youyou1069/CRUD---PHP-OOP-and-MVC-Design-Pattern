<?php
/**
 * Created by PhpStorm.
 * User: REMYELFI
 * Date: 11/01/2019
 * Time: 21:03
 */
require_once ('DatabaseConnexion.php');
class CreateContact extends ReadAllRepository
{

    /**
     * Insert un objet contact dans la Bdd
     * @param Contact $contact
     * return bool true si l'objet a été inseret  dans la bdd , false si erreur
     */
    public function create(Contact $contact)
    {
        $req =$this->db-> prepare('INSERT INTO contact VALUES(NULL, :nom, :prenom, :tel, :mel)');

//liaison des parametres
        $req->bindValue(':nom', $contact->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $contact->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':tel', $contact->getTel(), PDO::PARAM_STR);
        $req->bindValue(':mel', $contact->getMel(), PDO::PARAM_STR);

        //execution de la requete

	    $executeIsOk = $req->execute();

        if(!$executeIsOk = null)
        {
            return false;
        }
        else
        {
            //retourner l'identifiant de la derniere ligne insérée et mettre a jour l'identifiant de l'objet passer en argument
            $id = $db->lastInsertId();
            //affecter un id à $contact
            $contact = $this->read($id);

            return true;
        }


    }
}