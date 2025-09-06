<?php
        $conn = new mysqli("localhost", "root", "", "movies_db");

        function clears($clear){
            global $conn;
            $clear=mysqli_real_escape_string($conn,htmlspecialchars($clear));
            return $clear;
        }
        
    ?>