<?php

session_start();

if(!isset($_SESSION['login'])){ 
    header("Location:index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy();
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://unpkg.com/papercss@1.8.3/dist/paper.min.css">
    <title>Landing</title>
</head>
<body>
    <div class="paper flex-center text-center">
        <h3>Landing :</h3>
        <h3>Welcome :<?php echo $_SESSION['email']; ?></h3>
        <form action="landing.php" method="POST">
            <button type="submit">Deconnecter</button>
        </form>
        <div id="citations" class="row flex-center" >
            <input type="text" name="" id="inputcitation" placeholder="votre citation...">
            <button id="sender">Ajouter une citation</button>
            <button onclick="DeleteAll()">Supprimer Toute les citation</button>
        </div>
        <div id="citacontent" class="elcenter">
            
        </div>
        <?php 
        if ($_SESSION['status'] == 0) { 
            echo '<script src="deletecitation.js"></script>';
        }
        ?>
        
        
    </div>
    <script src="index.js"></script>
</body>
</html>