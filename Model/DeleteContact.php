<?php
/**
 * Created by PhpStorm.
 * User: REMYELFI
 * Date: 11/01/2019
 * Time: 23:04
 */
require_once ('DatabaseConnexion.php');
require_once ('Contact.php');
class DeleteContact extends ReadAllRepository
{
    public function __construct()
    {
        $this->db = DatabaseConnexion::getDatatabaseConnect();

    }


    public function Delete(Contact $contact)
    {
        $req = $this->db->prepare('DELETE FROM contact WHERE id = :id LIMIT 1');
        //liaison des parametres
        $req->bindValue(':id', $contact->getId(), PDO::PARAM_INT);

        //executer la requete
        $req->execute();
    }

}