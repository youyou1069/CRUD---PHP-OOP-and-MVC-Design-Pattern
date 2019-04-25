<?php
/**
 * Created by PhpStorm.
 * User: REMYELFI
 * Date: 12/01/2019
 * Time: 00:36
 */
require_once ('DatabaseConnexion.php');
require_once ('Contact.php');
class UpdateContact extends ReadAllRepository
{
    public function __construct()
    {
        $this->db = DatabaseConnexion::getDatatabaseConnect();

    }

    /**
     * met à jour un objet stocké en bdd
     * @param Contact $contact objet de type contact
     * @return bool true en cas succès ou flase en cas d'erreur
     */

    public function update(Contact $contact)
    {
        $req = $this->db->prepare('UPDATE contact SET nom=:nom, prenom=:prenom, tel=:tel, mel=:mel WHERE id=:id LIMIT 1');
        //liaison des paramètres

        $req->bindValue(':nom', $contact->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $contact->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':tel', $contact->getTel(), PDO::PARAM_STR);
        $req->bindValue(':mel', $contact->getMel(), PDO::PARAM_STR);
        $req->bindValue(':id', $contact->getId(), PDO::PARAM_INT);
        //execution de la requete
        $req->execute();
    }
}