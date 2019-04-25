<?php
require_once '../Model/ReadAllRepository.php';
require_once '../Model/UpdateContact.php';
require_once '../Model/Contact.php';

$contactRepo = new UpdateContact();
$contact = $contactRepo->Read($_GET['id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lister les contacts</title>
</head>
<body>
<div align="center">

    <form action="../Controller/Router.php?action=Update" method="POST" >

        <fieldset>
            <legend>Modification</legend>
            <br/><br/>
            <table>
                <tr>
                    <td align="right">
                        <label for="nom"> Nom</label>:
                    </td>
                    <td>
                        <input type="text" name="nom" id="nom"  value="<?= $contact->getNom()?>" maxlength="40">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="prenom">Prénom</label>:
                    </td>
                    <td>
                        <input type="text" name="prenom" id="prenom" value="<?= $contact->getPrenom()?>" maxlength="40">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="tel">Tel</label>:
                    </td>
                    <td>
                        <input type="tel" name="tel" id="tel" value="<?= $contact->getTel()?>" maxlength="40">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mel">Email</label>:
                    </td>
                    <td>
                        <input type="email" name="mel" id="mel" value="<?= $contact->getMel()?>" maxlength="40">
                    </td>
                </tr>
                <td>
                    <input type="hidden" name="id" value="<?= $contact->getId()?>"
                </td>

                <tr>

                </tr>

            </table>
            <br/><br/>
            <input type="submit" name="envoyer" value="Modifier" id="envoyer">
            <br/><br/>
        </fieldset>
    </form>
</div>
</body>
</html>