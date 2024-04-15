<?php
    include "param.conf";
    //connessione al DB
    $db = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);

    if ($db->connect_error) {
        echo "Errore di connessione la database\n";
        echo"Numero di errore: " . $db->connect_errno. "\n";
        echo "Errore: " .$db->connect_error. "\n";

        exit;
    }
?>