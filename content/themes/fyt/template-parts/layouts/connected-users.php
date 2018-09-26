<?php

/*
Création de la table MySQL
CREATE TABLE `connectes` (
    `ip` varchar(20) NOT NULL default '',
    `derniere` int(9) unsigned NOT NULL default '0',
    `pseudo` varchar(32) NOT NULL default '',
    PRIMARY key (`ip`)
) TYPE=MyISAM;
*/

$host = DB_HOST;
$dbname = DB_NAME;
$user = DB_USER;
$pass = DB_PASS;

try {
  $db_connect = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $pass);
}
catch (PDOException $e) {
	die("Erreur en se connectant à la BD: " . $e->getMessage());
}

// fonction a appeler au début  de vos pages
function connectes()
{
    // nombre de minute d'inactivité avant de supprimer un membre de la liste des connectes
    $temps = 60;

    if(mysql_connect(DB_HOST, DB_USER, DB_PASS))
        mysql_select_db(DB_NAME);
    else
        return;

    // ip du client
    $ip = $_SERVER['REMOTE_ADDR'];

    // pseudo
    $pseudo = empty($_SESSION['user_login']) ? '' : $_SESSION['user_login'];

    // time actuel
    $time = time();

    // on recherche l'utilsateur
    $sql_query = "SELECT * FROM connectes where ip='$ip'";
    $result = mysql_query($sql_query);

    if(!$result)
        return;

    // si l'utilisateur n'est pas deja dans la table
    if(mysql_num_rows($result) == 0)
    {
    $sql_query = "INSERT INTO connectes VALUES ('$ip', '$time', '$pseudo')";
        $result = mysql_query($sql_query);

        if(!$result)
            return;
    }
    // mise-à-jour
    else
    {
$sql1="UPDATE connectes SET derniere='$time',pseudo='$pseudo' WHERE ip='$ip'";

        $result = mysql_query($sql1);

        if(!$result)
            return;
    }

    // temps d'incativité
    $time -= $temps * 60;

// on supprime ceux qui n'ont pas été connectés depuis assez longtemps
$sql_query = "DELETE LOW_PRIORITY FROM connectes WHERE derniere <= $time";
$result = mysql_query($sql_query);

    mysql_close();
}


// Affichage des connectés, à mettre ou vous voulez ;-)
$stop = 0;

if(PDO_MYSQL(DB_HOST, DB_USER, DB_PASS))
    mysql_select_db(DB_NAME);

else
    $stop = 1;

if(!$stop)
{
    $sql_query = "SELECT pseudo FROM connectes WHERE pseudo <> ''";
    $result = mysql_query($sql_query);

    if(!$result)
        $stop = 1;
    else
    {
        echo '<font color="#0000FF">Connectés:</font><br>';

        while($connecte = mysql_fetch_array($result))
            echo $connecte[0] . '<br>';
    }
}

if($stop == 0)
{
    $sql_query = "SELECT count(*) FROM connectes WHERE pseudo = ''";
    $result = mysql_query($sql_query);

    if($result)
    {
    $visiteurs = mysql_fetch_array($result);

    echo '<br><font color="#0000FF">Visiteurs:</font><br>' . $visiteurs[0];
    }
}

mysql_close();

// connected();
?>
