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
    include('./connection.php');
    if (isset($_POST['newPost'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        if (empty($title) && empty($content)) {
            $_SESSION['error'] = 'Devi inserire titolo e un contenuto';
            header('Location: create-post.php');
        }
        else{
            $title = mysqli_real_escape_string($db, $title);
            $content = mysqli_real_escape_string($db, $content);
            $query = "INSERT INTO posts (`title`, `content`, `user_id`, `created_at`, `updated_at`) 
            VALUES ('$title', '$content', '{$_SESSION['user']['id']}', NOW(), NOW())";
            $stmt = $db->prepare($query);
            $stmt->execute();

            header('Location: MyPosts.php');
        }
    }

    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <!-- form di creazione del post -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <!-- Controllo variabile della form -->
                    <?php
                    if (isset($_SESSION['error'])) {
                    ?>
                        <div class="text-danger">
                            <?php echo $_SESSION['error']; ?>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- Titolo -->
                    <label for="title">Titolo</label>
                    <input type="text" name="title" id="title" required >
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