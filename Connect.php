<?php

namespace App;
class Connect{  

    public function con(){
        $user = "root";
        $pass = "root";
        $database = "login_sample_db";
        $server = "localhost";
        $port = 8889;
        
        $con = mysqli_connect($server, $user, $pass, $database,$port );
        if(!$con){
            die("<script>alert('Connection Failed')</script>");
         }
        return $con;
    }
}
