<?php
/**
 * Created by PhpStorm.
 * User: 94010-06-10
 * Date: 19/12/2018
 * Time: 16:16
 */


class Contact
{
    /**
     * @var int $id     identifiant du contact (généré automatiquement par le SGBDR , attention pas de setter à prévoir pour Id)
     */
    private $id;

    /**
     * @var string      $nom        nom du contact
     */

    private $nom;


    /**
     * @var string  $prenom     prénom du contact
     */
    private $prenom;

    /**
     * @var  string     $tel    telephone du contact
     */
    private $tel;

    /**
     * @var  string  $mel   mail du contact
     */
    private $mel;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param string $tel
     * @return Contact
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return string
     */
    public function getMel()
    {
        return $this->mel;
    }

    /**
     * @param string $mel
     * @return Contact
     */
    public function setMel($mel)
    {
        $this->mel = $mel;
        return $this;
    }


}
