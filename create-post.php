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

    //controller per la creazione di un post
    if (isset($_POST['newPost'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        if (empty($title) || empty($content) || empty($category)) {
            $_SESSION['error'] = 'Devi inserire titolo, un contenuto e una categoria';
            header('Location: create-post.php');
        }
        else{
            $query = "INSERT INTO posts (`title`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`) 
            VALUES (?, ?, ?, ?, NOW(), NOW())";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ssii', $title, $content, $_SESSION['user']['id'], $category);
            $stmt->execute();

            header('Location: MyPosts.php');
        }
    }

    ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
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
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control" required >
                    </div>
                    <!-- Contenuto -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Descrizione</label>
                        <textarea name="content" id="content" class="form-control" style="height: 100px;" required></textarea>
                        <!-- <input type="text" name="content" id="content" class="form-control" required> -->
                    </div>
                    <!-- Categoria -->
                    <div class="mb-3">
                        <label for="category">Seleziona la categoria: </label>
                        <select name="category" id="category" class="form-select" required>
                            <?php 
                                //Selezione di tutte le categorie
                                $query = 'SELECT * FROM categories';
                                $stmt = $db->query($query);
                                while ($row = mysqli_fetch_array($stmt)) {
                                    ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="newPost" id="newPost" class="btn btn-danger">Crea post</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>