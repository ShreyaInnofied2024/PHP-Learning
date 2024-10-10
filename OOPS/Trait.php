<?php
trait Msg_1                                          //Trait 1
{
    public function message_1()
    {
        echo "Message 1 is printed <br>";
    }
}

trait Msg_2                                          //Trait 2
{
    public function message_2()
    {
        echo "Message 2 is printed <br>";
    }
}

class First                                        //Class implementing trait 1
{
    use Msg_1;
}

class Second                                       //class implementing Trait 1 and Trait 2
{
    use Msg_1, Msg_2;
}

$first = new First();
$first->message_1();
$second = new Second();
$second->message_1();
$second->message_2();
