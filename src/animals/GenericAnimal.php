<?php
namespace TTConsulting\Example\Animal;

/**
 * Class GenericAnimal.
 * Base animal class.
 * @package TTConsulting\Example\Animal
 */
abstract class GenericAnimal {

    /**
     * Animal nickname.
     * @var $_nick string
     */
    private $_nick;

    /**
     * Animal age.
     * @var $_age int
     */
    private $_age;

    /**
     * GenericAnimal constructor.
     * Assigns basic animal properties.
     * @param string $nick
     * @param int $age
     */
    public function __construct(string $nick, int $age)   {
        $this->_nick = $nick;
        $this->_age  = $age;
    }

    /**
     * Gets the name of the animal.
     * @return string
     */
    public function nickname() : string {
        return $this->_nick;
    }

    /**
     * Gets the age of the animal.
     * @return int
     */
    public function age() : int  {
        return $this->_age;
    }

    /**
     * Publishes animal voice.
     * @return mixed
     */
    public abstract function voice() : string;

}