<!DOCTYPE html>
<html>

<form method="post" action="mini-site-routing.php">;
  <input type="login" name="login">
  <input type="password" name="password">
  <input type="submit" name="upload" value="Uploader">
</form>

<?php
if (isset($_SESSION["id"])|| isset($_COOKIE["id"])) {
  if (isset($_POST['upload']) && isset($_FILES['fichier'])) {
    $errors = false;
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];
    if ($file_size > 2097152)
    {
      echo "<p>Le fichier ne doit pas dépasser 2Mo</p>";
      $errors = true;
    }
    elseif (strlen(substr($file_name, 0, strpos($file_name, '.')))<= 4)
    {
      echo "<p>Le nom du fichier doit faire au moins 4 caractères</p>";
      $errors = true;
    }
    elseif (pathinfo($file_name, PATHINFO_EXTENSION)!= "png" && pathinfo($file_name, PATHINFO_EXTENSION)!= 'jpg' && pathinfo($file_name, PATHINFO_EXTENSION)!= 'jpeg')
    {
      echo "<p>le fichier doit être un jpg, png ou jpeg</p>";
      $errors = true;
    }
    if ($errors == false && move_uploaded_file($file_name , "."))
    {
      $_SESSION["image"] = "./" . $file_name;
    }
  }
} 
?>

</html>