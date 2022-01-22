<?php

namespace App;

include_once("Connect.php");



class Rejestracja{
        public function isEmailExists($email){
            $con1 = new Connect();
            $con=$con1->con();
            
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