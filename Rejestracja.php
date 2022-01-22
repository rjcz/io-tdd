<?php

namespace App;





class Rejestracja{
        public function isEmailExists($email){
           
            $user = "root";
            $pass = "root";
            $database = "login_sample_db";
            $server = "localhost";
            $port = 8889;
            
            $con = mysqli_connect($server, $user, $pass, $database,$port );
            $sql = "SELECT * FROM users WHERE email LIKE '$email'";
            $result = mysqli_query($con, $sql);
            
            if ($result->num_rows > 0){
                return true;
            }
            else {
                return false;
            }
        }
}