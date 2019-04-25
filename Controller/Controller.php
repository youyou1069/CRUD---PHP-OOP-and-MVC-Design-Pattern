<?php
/**
 * Created by PhpStorm.
 * User: REMYELFI
 * Date: 09/01/2019
 * Time: 21:36
 */
require '../Model/DatabaseConnexion.php';
require '../Model/Contact.php';
require '../Model/ReadAllRepository.php';
require '../Model/CreateContact.php';
require '../Model/DeleteContact.php';
require '../Model/UpdateContact.php';
require '../Model/SearchContact.php';

//The Controller listen

class Controller
{

    //Home Page shows all articles

    public function HomeController()
    {
        include('../View/Home.html');

    }


    public function readAllAction()
    {
        ob_start();
        // Database Connexion.
        $db = DatabaseConnexion::getDatatabaseConnect();


        //Call the Model
        $contactRepo = new ReadAllrepository;
        $contacts = $contactRepo->readAlL();

        //Call the Home page view
        include '../view/HomeContacts.php';

        // Get current buffer contents and delete current output buffer
        $html = ob_end_flush();
        //  die(var_dump($html));

        return $html;

    }

    //Article Detail
    public function contactController($id)
    {
        ob_start();
        $pdo = DatabaseConnexion::getDatatabaseConnect();

        $contactRepo = new ReadAllrepository ();
        $contacts = $contactRepo->read($id);

        include('../View/HomeContacts.php');
        $html = ob_end_flush();
        return $html;
    }


    public function createAction()
    {
        ob_start();
        // Database Connexion.
        $db = DatabaseConnexion::getDatatabaseConnect();


        //Call the Model


        //création d'un nouveau contact à partir des données formulaire
        $contact = new Contact();
        $contact->setNom($_POST['nom']);
        $contact->setPrenom($_POST['prenom']);
        $contact->setTel($_POST['tel']);
        $contact->setMel($_POST['mel']);

//insertion dans la base de donnée

        $contactRepo = new CreateContact($contact);
        $saveIsOk = $contactRepo->create($contact);

        if (! $saveIsOk = null) {
            $message = 'Le contact a été ajouté';
        } else {
            $message = 'echec de l\'ajout';
        }

        //Call the Home page view
        include '../View/InsertionOK.html';

        // Get current buffer contents and delete current output buffer
        $html = ob_end_flush();
        //  die(var_dump($html));

        return $html;

    }

    public function deleteAction()
    {
        ob_start();
        // Database Connexion.
        $db = DatabaseConnexion::getDatatabaseConnect();


        //Call the Model


        // récuperer le contact à supprimer à partir de l'URL

        $contactRepo = new DeleteContact();
        $contact = $contactRepo->Read($_GET['id']);

        //supprimer le contact
        //var_dump($contact);

        $contactRepo = new DeleteContact();
        $DeleteOk = $contactRepo->Delete($contact);

        if (!$deleteok = null) {
            $message = 'Le contact a été supprimé ';
        } else {
            $message = 'le contact pas été supprimé';
        }
        //Call the Home page view
        include '../View/SuppressionOK.html';
        // Get current buffer contents and delete current output buffer
        $html = ob_end_flush();
        //  die(var_dump($html));

        return $html;


    }

    public function updateAction()
    {
        ob_start();
        // Database Connexion.
        $db = DatabaseConnexion::getDatatabaseConnect();

        //var_dump($_POST['id']);

        //Call the Model




        // récuperer le contact à mettre a jour à partir de l'URL

        $contactRepo = new UpdateContact();
        $contact = $contactRepo->Read($_POST['id']);

        $contact->setNom($_POST['nom']);
        $contact->setPrenom($_POST['prenom']);
        $contact->setTel($_POST['tel']);
        $contact->setMel($_POST['mel']);

        //pas de id, géré par la bdd
        //metre a jour du contact

        $update = $contactRepo->Update($contact);
        if (!$update = null) {
            $message = 'Le contact a été mis à jour ';
        } else {
            $message = 'pas de mise à jour';
        }


        //Call the Home page view
        include '../View/UpdateOk.html';

        // Get current buffer contents and delete current output buffer
        $html = ob_end_flush();
        //  die(var_dump($html));

        return $html;
    }

    public function searchAction()
    {
        ob_start();
        // Database Connexion.
        $db = DatabaseConnexion::getDatatabaseConnect();



        //Call the Model
        $contactRepo = new SearchContact();
        $contactRepo->Search();


        //Call the Home page view
        include '../View/SearchData.php';

        // Get current buffer contents and delete current output buffer
        $html = ob_end_flush();
        //  die(var_dump($html));

        return $html;

    }



    }
