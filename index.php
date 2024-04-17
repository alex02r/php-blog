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
        
        if (isset($_GET['un']) && $_GET['un'] == 1) {
            session_unset();
            header('Location: index.php');
        }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- img -->
                <img src="./img/jumbo.jpg" alt="background" class="img-jumbo">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-gap-3">
            <div class="col-12">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <button type="submit" class="btn btn-danger" name="filter" value="0">All</button>
                    <?php
                        $query = 'SELECT * FROM categories';
                        $stmt = $db->query($query);
                        while($row = mysqli_fetch_array($stmt)){
                    ?>
                        <button type="submit" class="btn btn-danger" name="filter" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></button>
                    <?php 
                        }
                    ?>
                </form>
            </div>
            <?php
                //Query di selezione
                $query ='SELECT * FROM posts' ;
                //controlliamo il filtro applicato
                if(isset($_POST['filter']) && $_POST['filter'] != 0){
                    //abbiamo selezionato un filtro
                    $filter =  $_POST['filter'];
                    $query .= ' WHERE category_id = ?';
                    $stmt = $db->prepare($query);
                    $stmt->bind_param('i', $filter);
                }else{
                    //selezioniamo tutti i posts
                    $stmt = $db->prepare($query);
                }
                //eseguiamo la query
                $stmt->execute();
                //visualizziamo i posts
                $results = $stmt->get_result(); 
                if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()) {
                        ?>
                            <div class="col-12 col-md-4 col-lg-3">
                                <?php var_dump($row); ?>
                            </div>
                        <?php
                    }
                }else {
                    ?>
                    <div class="col-12 text-center my-5">
                        <h2>Non sono stati trovati post</h2>
                    </div>
                <?php
                }
            ?>

        </div>
    </div>
</body>
</html>