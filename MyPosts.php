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
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Blog</title>
</head>
<body>
    <?php
        session_start(); 
        //controlliamo se abbiamo l'accesso a questa pagina
        if (!isset($_SESSION['user'])) {
            header('Location: forbidden.php');
        }

        include_once('./partials/templates/header.php'); 
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- img jumbo -->
            </div>
            <div class="col-12 text-end">
                <a href="create-post.php" class="btn btn-sm btn-warning">Crea nuovo post <i class="fas fa-plus"></i></a>
            </div>
            <?php 
                /* visualizzazione di tutti i post relativi all'utente */
            ?>
        </div>
    </div>
</body>
</html>