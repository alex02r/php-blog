<header>
    <div class="container">
        <div class="row justify-content-between align-items-center py-2">
            <div class="col-4 col-md-2">
                <!-- logo -->
                <h1><span class="text-danger">B</span>log</h1>
            </div>
            <div class="col-6 col-md-8 text-end">
                <!-- menu list -->
                <?php  
                session_start();
                    if (isset($_SESSION['user'])) {
                        /* se loggati visualizziamo il link per gestire i post */
                        ?>
                        <ul class="list-unstyled d-flex justify-content-end align-items-center gap-5">
                            <li>
                                <a href="#" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover">MyPost</a>
                            </li>
                            <li>
                               <a href="#" class="btn btn-sm btn-danger">LOGOUT</a> 
                            </li>
                        </ul>
                        <?php
                    }else{
                        /* Se non siamo loggati visualiziamo il link per il login */
                        ?>
                            <a class="btn btn-danger" href="./login.php">Login</a>
                        <?php  
                    }
                 
                ?>
            </div>
        </div>
    </div>
</header>