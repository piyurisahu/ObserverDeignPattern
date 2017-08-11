<?php

/**
 * Created by PhpStorm.
 * User: piyurisahu
 * Date: 11/08/17
 * Time: 9:59 AM
 */
abstract class AbstractObserver
{
    abstract function update(AbstractSubject $subject);
}

abstract class AbstractSubject
{
    abstract function attach(AbstractObserver $observer);

    abstract function detach(AbstractObserver $observer);

    abstract function notify();
}

function write_in($line)
{

    echo $line . "</br>";
}


class PatternObserver extends AbstractObserver
{
    function __construct()
    {
    }

    function update(AbstractSubject $subject)
    {
        // TODO: Implement update() method.
        write_in("Alert to observer");
        write_in($subject->favorite);
    }
}

class PatternSubject extends AbstractSubject
{

    public $favorite = NULL;
    private $observers = array();

    function __construct()
    {
    }

    function attach(AbstractObserver $observer)
    {
        // TODO: Implement attach() method.
        $this->observers[] = $observer;

    }

    function detach(AbstractObserver $observer)
    {
        // TODO: Implement detach() method.
        foreach($this->observers as $okey => $oval) {
            if ($oval == $observer) {
                unset($this->observers[$okey]);
            }
        }
    }

    function notify()
    {
        // TODO: Implement notify() method.
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    function updateFavorite($newFavorite)
    {
        $this->favorite = $newFavorite;
        $this->notify();
    }
}

write_in("begin testing observer pattern");
write_in("");
$notifier = new PatternSubject();
$observer1 = new PatternObserver();
$notifier->attach($observer1);
$observer2 = new PatternObserver();
$notifier->attach($observer2);
$notifier->detach($observer1);

$notifier->updateFavorite('idle');
$notifier->updateFavorite('idle');

