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

        public function isEmailValid($email){
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public function doesHave6Char($password){
            if (strlen($password) >= '6') 
                return true;
            else return false;
        }

        public function doesHaveNumber($password){
            if (preg_match("#[0-9]+#", $password)) 
                return true;
            else return false;
        }

        public function doesHaveUppercase($password){
            if (preg_match("#[A-Z]+#",$password)) 
                return true;
            else return false;
        }

        public function doesHaveLowercase($password){
            if (preg_match("#[a-z]+#",$password)) 
                return true;
            else return false;
        }

        public function isPasswordValid($password){
            $r = new Rejestracja;
            if ($r->doesHave6Char($password) && $r->doesHaveNumber($password) 
            && $r->doesHaveUppercase($password) && $r->doesHaveLowercase($password) && !empty($password))
                return true;
                
            else return false;
        }

       
} 