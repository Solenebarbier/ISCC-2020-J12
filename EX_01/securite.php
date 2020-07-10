<!DOCTYPE html>
<html>

<?php
session_start();
if (isset($_POST['submit']) && isset($_POST['password']) && isset($_POST["login"])) {
    function connect_to_database()
    {

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $databasename = "base-site-rooting";

        $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    try {
        $pdo = connect_to_database();
        $query = $pdo->query("SELECT * FROM utilisateurs WHERE `login` $_POST[login]" );
        $users = $query->fetchAll();
        if ($_POST["login"]==true){
            $query = $pdo->query("SELECT * FROM utilisateurs WHERE `password` $_POST[password]" );
        }
        else{
            echo "Mauvais couple identifiant / mot de passe";
        }
        foreach ($users as $user ){
            echo $user['login']; 
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e -> getMessage();
    }

    $_SESSION['login']= $_POST ['login'];
    $_COOKIE['img-path']= $_POST['img-path'];
    
    //$_SESSION['id'] = $_POST['login'];
    //setcookie("id", $_POST['login']);
    //header("Location: mini-site-routing.php?page=admin");
}

?>

</html>

