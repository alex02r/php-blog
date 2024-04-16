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

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = 'SELECT * FROM posts WHERE id = ?';
            $stmt = $db->prepare($query);
            $stmt->bind_param('s', $id);

            //controlliamo l'esecuizione della query
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $post = $result->fetch_assoc();
            }else {
                echo 'errre nell esecuzione della query: '.$stmt->error;
            }
        }else {
            header('Location: forbidden.php');
        }
    ?>
    <div class="container my-5">
        <div class="row row-gap-4">
            <div class="col-12">
                <!-- visualizzazione immagine -->
                <!-- titolo -->
                <h2><?php echo $post['title'] ; ?></h2>
            </div>
            <div class="col-12 col-md-6">
                <?php
                    if (isset($_SESSION['user']) && $post['user_id'] == $_SESSION['user']['id']) {
                        //sei il titolare del post e poi modificarlo
                        ?>
                            <a href="" class="btn btn-sm btn-warning">Modifica <i class="fas fa-pen"></i></a>
                        <?php
                    }
                ?>
                <!-- descrizione post -->
                <p><?php echo $post['content']; ?></p>
            </div>
            <div class="col-12 col-md-6">
                <!-- spazio puiblicità -->
            </div>
        </div>
    </div>
</body>
</html>