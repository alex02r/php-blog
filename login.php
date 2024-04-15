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
    <title>Login</title>
</head>
<body>
    <?php 
        include('./connection.php');
        //controlliamo se abbiamo inviato i dati
        if (isset($_POST['login'])) {
            if (empty($_POST['user']) && empty($_POST['psw'])) {
                $error = 'Inserisci username e password';
            }else{
                
            }
        }
    ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-6 col-md-4">
                <div class="shadow rounded p-5">
                    <!-- form di login -->
                    <form action="#" method="post">
                        <h2>Login</h2>
                        <!-- controlliamo se sono presenti errori -->
                        <?php 
                            if (isset($error)) {
                        ?>
                            <div class="alert text-danger">
                                <?php $error ; ?>
                            </div>
                        <?php
                            }; 
                        ?>
                        
                        <div class="mb-3">
                            <!-- user -->
                            <label for="user" class="form-label">Username</label>
                            <input type="text" id="user" name="user" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <!-- password -->
                            <label for="psw" class="psw">Password</label>
                            <input type="text" id="psw" name="psw" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login" id="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>