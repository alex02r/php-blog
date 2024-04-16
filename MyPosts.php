<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- favicon -->
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">

    <title>Blog</title>
</head>
<body>
    <?php
        session_start(); 
        include_once('./partials/templates/header.php'); 
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- img jumbo -->
            </div>
            <?php 
                /* visualizzazione di tutti i post relativi all'utente */
            ?>
        </div>
    </div>
</body>
</html>