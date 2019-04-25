<?php
require_once '../Model/ReadAllRepository.php';
require_once '../Model/Contact.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lister les contacts</title>
</head>
<body>
<h1>Lister tous les contacts</h1>

<?php if(empty($contacts)):?>
    <p> il n'y a aucun contact à afficher </p>

<?php else: ?>
    <?php if($contacts===false): ?>
        <p>une erreur est survenue </p>

    <?php else: ?>

        <ul>
            <?php foreach ($contacts as $contact):?>
                <li>
                    <?= $contact->getNom ()?> -
                    <?= $contact->getPrenom ()?> -
                    <?= $contact->getTel ()?> -
                    <?= $contact->getMel ()?> -
                    <a href="../View/FormUpdate.php?action=Update&id=<?= $contact->getId()?>">Modifier</a>
                    <a href="../Controller/Router.php?action=Delete&id=<?= $contact->getId()?>">Supprimer</a>



                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif;?>
<?php endif;?>

<a href="../View/Accueil.php">Sommaire</a>
</body>
</html>
