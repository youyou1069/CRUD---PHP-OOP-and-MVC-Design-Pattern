<?php


//Display all erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'Controller.php';


$controller = new Controller();
if(empty($_SERVER['QUERY_STRING']))
{
    $controller->HomeController();
}

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'Contacts') {
        $controller->readAllAction();
    }
        elseif ($_GET['action'] === 'Create') {
            $controller->createAction();
        }
            elseif ($_GET['action'] === 'Delete') {
                $controller->deleteAction();
            }

                elseif ($_GET['action'] === 'Update') {
                    $controller->updateAction();
                }
                    elseif ($_GET['action'] === 'Search') {

                        $controller->searchAction();

                    }

                    else {
                        echo 'Erreur : aucun identifiant de billet envoyé';
                    }
    }

