<header>
    <div class="container">
        <div class="row justify-content-between align-items-center py-2">
            <div class="col-4 col-md-2">
                <!-- logo -->
                <a href="index.php" class="link-underline link-dark link-underline-opacity-0"><h1><span class="text-danger">B</span>log</h1></a>
            </div>
            <div class="col-6 col-md-8 text-end">
                <!-- menu list -->
                <ul class="list-unstyled d-flex justify-content-end align-items-center gap-5">
                <?php
                    if (isset($_SESSION['user'])) {
                        /* se loggati visualizziamo il link per gestire i post */
                        ?>
                            <li>
                                <a href="index.php" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover" >Home</a>
                            </li>
                            <li>
                                <a href="MyPosts.php" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover">MyPosts</a>
                            </li>
                            <li>
                                <!-- logout -->
                               <a href="index.php?un=1" class="btn btn-sm btn-danger">LOGOUT</a> 
                            </li>
                        <?php
                    }else{
                        /* Se non siamo loggati visualiziamo il link per il login */
                        ?>
                            
                            <li>
                                <a href="index.php" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover" >Home</a>
                            </li>
                            <li>
                                <a class="btn btn-danger" href="./login.php">Login</a>
                            </li>
                        <?php  
                    }
                 
                ?>
                </ul>
            </div>
        </div>
    </div>
</header>