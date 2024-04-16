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
        include_once('./partials/templates/header.php'); 
        if
        
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12-col-md-8">
                <!-- form di creazione del post -->
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <!-- Titolo -->
                    <label for="title">Titolo</label>
                    <input type="text" name="title" id="title" required>
                    <!-- Contenuto -->
                    <label for="content">Descrizione</label>
                    <input type="text" name="content" id="content" required>
                    <button type="submit" name="newPost" id="newPost">Crea post</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>