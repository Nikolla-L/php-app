<?php
    $mysqli = new mysqli('localhost', 'root', '', 'nikdev', '3306');

    /* check connection */
    if ($mysqli->connect_error) {
        exit('Error connecting to database');
    }