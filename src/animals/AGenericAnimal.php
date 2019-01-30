<?php
namespace TTConsulting\Example\Animal;

/**
 * Class GenericAnimal.
 * Base animal class.
 * @package TTConsulting\Example\Animal
 */
abstract class AGenericAnimal {

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
     * Date of entry.
     * @var $_created int
     */
    private $_created;

    /**
     * GenericAnimal constructor.
     * Assigns basic animal properties.
     * @param string $nick
     * @param int $age
     */
    public function __construct(string $nick, int $age)   {
        $this->_nick = $nick;
        $this->_age  = $age;
        $this->_created = time();
    }

    /**
     * Gets new animal
     * @param string $type
     * @param string $nick
     * @param int $age
     * @return GenericAnimal
     */
    public static function create(string $type, string $nick, int $age) : AGenericAnimal {
        $type = __NAMESPACE__ . '\\' . $type;
        return new $type($nick, $age);
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
     * Gets the entered time.
     * @return int
     */
    public function entered() : int {
        return $this->_created;
    }

    /**
     * Publishes animal voice.
     * @return mixed
     */
    public abstract function voice() : string;

}