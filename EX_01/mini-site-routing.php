<!DOCTYPE html>

<html>

<head>
    <title> mini-site-routing </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/vitrine.css">

</head>

<body>
    <nav>

        <a href="mini-site-routing.php?page=connexion"> connexion </a>
        <a href="mini-site-routing.php?page=admin">Administration</a>
    </nav>

    <?php
    session_start();

    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'connexion') {
            require "connexion.php";
        }
        elseif ($_GET['page']== "admin")
        {
            require "admin.php";
        }
    }
    
    if (isset($_GET["page"]) && $_GET["page"] != "connexion" && (isset($_SESSION["id"]) || isset($_COOKIE["id"]))) 
    {
        echo "<p> Login: " . $_SESSION["id"] . "</p>";
        if (isset($_SESSION["image"]))
        {
            echo "<img href=\"". $_SESSION["image"] . "\"/>";
        }
    } else if (!isset($_GET["page"]) || isset($_GET["page"]) && $_GET["page"] != "connexion") {
        header("Location: mini-site-routing.php?page=connexion");
    }
    ?>
</body>

</html>