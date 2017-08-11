<?php

/**
 * Created by PhpStorm.
 * User: piyurisahu
 * Date: 09/08/17
 * Time: 9:36 PM
 */
interface ModeOfTransport
{
    public function typeOftransport();
}

class Bus implements ModeOfTransport
{

    public function typeOftransport()
    {
        // TODO: Implement typeOftransport() method.
        return 'traveling by bus';

    }
}

class Car implements ModeOfTransport
{
    function typeOftransport()
    {
        // TODO: Implement typeOftransport() method.
        return 'travelling by car';

    }
}

Class User
{
    protected $modeOfTransport;

    function __construct(ModeOfTransport $modeOfTransport)
    {
        $this->modeOfTransport = $modeOfTransport;
//        var_dump($modeOfTransport->typeOftransport());
    }

    public function call()
    {
        return $this->modeOfTransport->typeOftransport();
    }
    /**
     *
     */

}


$bus=new User(new Bus());
//echo "$bus->call()";
var_dump($bus->call());
$car=new User(new Car());
var_dump($car->call());
//echo "$car->call()";

//
//class StrtegyContext
//{
//    private $strategy = NULL;
//
//    function __construct($strategy)
//    {
//        switch ($strategy)
//            case: ""
//    }
//


