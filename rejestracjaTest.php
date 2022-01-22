<?php

include("connection.php");

class rejestracjaTest extends \PHPUnit\Framework\TestCase{

    public function testIsEmailExists(){
        $rejestracja= new App\Rejestracja;
        $testemail="123@aa";
        $result=$rejestracja->isEmailExists($con,$testemail);
        this->assertTrue($result);
    }
   
}