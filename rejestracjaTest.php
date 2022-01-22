<?php



class rejestracjaTest extends \PHPUnit\Framework\TestCase{

    public function testIsEmailExists(){
        $rejestracja= new App\Rejestracja;
        $testemail="123@aa";
        $result=$rejestracja->isEmailExists($testemail);
        $this->assertTrue($result);
    }


    public function testIsEmailValid(){
        $rejestracja= new App\Rejestracja;
        $testemail="123@aa";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertTrue(!$result);
    }

   
}