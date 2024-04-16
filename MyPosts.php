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

    // Inclusione db
    include('./connection.php');

    //controllo per l'eliminazione di un post
    if (isset($_POST['delete'])) {
        //recuperiamo l'id del post
        $post_id = $_POST['post_id'];
        //prepariamo la query
        $query = 'DELETE FROM posts WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->bind_param('i',$post_id);
        
        //eseguiamo la query
        if ($stmt->execute()) {
            $cookie_value = "Post eliminato con successo";
        } else {
            $cookie_value = "Errore durante l'eliminazione del post: " . $stmt->error;
        }
        $_SESSION['post_delete'] = $cookie_value;
    }

    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- img jumbo -->
            </div>
            <div class="col-12 text-end">
                <a href="create-post.php" class="btn btn-sm btn-warning">Crea nuovo post <i class="fas fa-plus"></i></a>
            </div>
            <div class="col-8 text-center">
                <?php
                    if (isset($_SESSION['post_delete'])) {
                        ?><div class="text-danger"><?php echo $_SESSION['post_delete'];?></div><?php
                        unset($_SESSION['post_delete']);
                    }
                ?>
                <table class="table table-striped">
                    <thead>
                        <th>
                            Titolo
                        </th>
                        <th>
                            Tools
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        /* visualizzazione di tutti i post relativi all'utente */

                        // Raccolta posts
                        $query = 'SELECT * FROM posts WHERE user_id=' . $_SESSION['user']['id'];
                        $stmt = $db->query($query);

                        while ($row = mysqli_fetch_array($stmt)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $row['title']?>
                                </td>
                                <td class="d-flex gap-2 justify-content-center">
                                    <a href="show-post.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-eye"></i></a>
                                    <a href="" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il post ?');">
                                        <!-- campo nascosto per passare l'id del post-->
                                        <input type="hidden" name="post_id" id="post_id" value="<?php echo $row['id'] ;?>">
                                        <button class="btn btn-sm btn-danger" id="delete" name="delete"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            
                        }
                        ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</body>

</html>