<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enchère_Plateforme</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="src/css/VisuelEnchereList.css">
    <link rel="stylesheet" href="src/css/navbar.css">
</head>
<!---------------------------------------------------------------------------------------------------------------->
<body>
<!--AJOUT INCLUDE HEADER-->
<?php include 'src/includes/header.php'?>
<!--AJOUT A INDEX la liste des encheres ajouté et généré depuis json-->
<?php include 'src/includes/AjoutEnchereList.php'?>
<!--Ajout page des fonctions-->
<?php include 'src/includes/functions.php' ?>
<?php include 'src/includes/traitement.php' ?>

<!----------------------------------------------------------------------------------------------------------------->
 <!-- jQuery and JS bundle w/ Popper.js -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
crossorigin="anonymous"></script>
</body>
</html>