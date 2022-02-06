<?php


class Wykonawca implements \SplSubject
{
  
    public $state;

    private $observers;

    private $songs;

    public $name;

    public $musicCount;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
        $this->name="";
        $this->state=0;
        $this->songs = new \SplObjectStorage();
    }

  
    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
        echo "Wykonawca $this->name: Attached an observer.\n";
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
        echo "Wykonawca $this->name: Detached an observer.\n";
    }
   
    public function addUtwor(Utwor $utwor) : void{
        $this->songs->attach($utwor);
        $utwor->wykonawca=$this->name;
        $this->state=1;
        $this->notify();
        $this->musicCount++;
    }
 
    public function notify(): void
    {
        echo "Wykonawca $this->name: Notifying observers...\n";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function disaplaySonglist(): void
    {
        echo "Wykonawca $this->name: Notifying observers...\n";
        foreach ($this->songs as $song) {
           echo "\n$this->name - $song->nazwa";
        }
    }

}
class Observer implements \SplObserver{
    public $name;
    
    public function update(\SplSubject $subject): void
    {
        if ($subject->state == 1) {
            echo "$this->name: $subject->name released something.\n";
        }
        $subject->state = 0;
    }

}
class Utwor{
    public $nazwa;
    public $wykonawca;
}




$subject = new Wykonawca();
$subject->name="ABBA";

$o1 = new Observer();
$o1->name="observer 1";
$subject->attach($o1);

$o2 = new Observer();
$o2->name="observer 2";
$subject->attach($o2);

$s1 = new Utwor();
$s1->nazwa="Song 1";
$s2 = new Utwor();
$s2->nazwa="Song 2";
$s3 = new Utwor();
$s3->nazwa="Song 3";


$subject->addUtwor(s1);
$subject->addUtwor(s2);

$subject->detach($o2);

$subject->addUtwor(s3);
echo $subject->musicCount;

$subject->disaplaySonglist();