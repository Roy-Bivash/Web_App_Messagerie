<?php
//definition des constante : define("[nom de constante], [valeur de la constante]")
define("BDD","bddmessage");
define("USER_BDD","root");
define("PASSWORD_USER","");
define("SERVEUR","localhost");


//verification du login et mdp
function verifLoginMdp($pLogin, $pMdp)
{
    $retour = false;
    $pMdp = md5($pMdp);
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select * from utilisateur where login = '$pLogin' and passWord ='$pMdp';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}

//Affichage des messages
function getMessage($pLogin)
{
	$retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select * from lesMessages where loginDestinataire = '$pLogin'order by `numMessage` DESC;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}

//Affichage des destinataire
function getLesDestinataire()
{
	$retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select login from `utilisateur`";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}





//verification nbmessage
function verifNbMessages($login)
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="SELECT nbmessage FROM `utilisateur` WHERE login = '$login';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
    echo "$retour";
}


//Envoie du message
function enoieDeMessage($login, $utilisateurSelectionner, $messageEnvoie)
{
	$retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="insert into `lesmessages` (`numMessage`, `message`, `heureDateCreation`, `loginRedacteur`, `loginDestinataire`) value (null, '$messageEnvoie' , CURRENT_TIME(), '$login', '$utilisateurSelectionner');";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}
//ajoute du nombre de message dans la table utilisateur
function ajoutNbMessage($login)
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `utilisateur` SET `nbmessage` = `nbmessage` + '1' WHERE `utilisateur`.`login` = '$login';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}



//Affichage des messages generale
function getMessagePublic($sujet)
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select * from `lessagepublic` WHERE sujet = '$sujet' order by `numMessage` DESC;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}

//envoi du message publique (version original)
function envoieMessagePublic($nouvMessagePublic, $login, $sujet)
{
	$retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="insert into `lessagepublic` (`numMessage`, `dateHeure`, `message`, `loginRedacteur`, `sujet`) VALUES (NULL, CURRENT_TIME(), '$nouvMessagePublic', '$login', '$sujet');";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}


//Recuperer les sujet de discution
function getLesSujets()
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select distinct sujet from `lessagepublic`";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}


//Affichage les messages rediger par l'utilisateur connnecter
function getMessageEnvoyer($login)
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select * from lesMessages where loginRedacteur = '$login'order by `numMessage` DESC;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}






?>


