<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Page d'inscription </title>

    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div align="center">

    <form action="../Controller/Router.php?action=Create" method="POST" >

        <fieldset>
            <legend>Inscription</legend>
            <br/><br/>
            <table>
                <tr>
                    <td align="right">
                        <label for="nom"> Nom</label>:
                    </td>
                    <td>
                        <input type="text" name="nom" id="nom"  value="<?php if(isset($nom)) {echo $nom;}?>" maxlength="40">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="prenom">Prénom</label>:
                    </td>
                    <td>
                        <input type="text" name="prenom" id="prenom" value="<?php if(isset($prenom)) {echo $prenom;}?>" maxlength="40">
                    </td>
                </tr>


                <tr>
                    <td align="right">
                        <label for="tel">Tel</label>:
                    </td>
                    <td>
                        <input type="tel" name="tel" id="tel" value="<?php if(isset($tel)) {echo $tel;}?>" maxlength="40">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mel">Email</label>:
                    </td>
                    <td>
                        <input type="mel" name="mel" id="mel" value="<?php if(isset($mel)) {echo $mel;}?>" maxlength="40">
                    </td>
                </tr>

            </table>
            <br/><br/>
            <input type="submit" name="envoyer" value="envoyer" id="envoyer"><br/><br/>
        </fieldset>
    </form>
</div>
</body>
</html>