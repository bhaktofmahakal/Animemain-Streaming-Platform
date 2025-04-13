<?php require "../layouts/header.php"; ?>  
<?php require "../../config/config.php"; ?>
<?php 



    if(isset($_GET['id'])) {

        $id= $_GET['id'];

        $image = $conn->query("SELECT * FROM shows WHERE id='$id'");
        $image->execute();

        $getImage = $image->fetch(PDO::FETCH_OBJ);

        unlink("img/" . $getImage->image);


        $deletShow = $conn->query("DELETE FROM shows WHERE id='$id'");
        $deletShow->execute();

        header("location: show-shows.php");

    }



?>