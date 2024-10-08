<?php
trait msg1
{
    public function message1()
    {
        echo "Message 1 is printed <br>";
    }
}

trait msg2
{
    public function message2()
    {
        echo "Message 2 is printed <br>";
    }
}

class First
{
    use msg1;
}

class Second
{
    use msg1, msg2;
}

$first = new First();
$first->message1();
$second = new Second();
$second->message1();
$second->message2();
