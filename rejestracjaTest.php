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
        //valid
        $testemail="123@aa.com";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertFalse(!$result);

        $testemail="123@aa.b";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertFalse(!$result);

        $testemail="123@AA.COM";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertFalse(!$result);
        //non valid
        $testemail="123@aa";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertTrue(!$result);

        $testemail="123śżć@aa.com";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertTrue(!$result);

        $testemail=" 123@aa.com";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertTrue(!$result);

        
        $testemail="@aa.com";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertTrue(!$result);

        $testemail="1 23@aa.com";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertTrue(!$result);

        $testemail="";
        $result=$rejestracja->isEmailValid($testemail);
        $this->assertTrue(!$result);

      
    }

   
}