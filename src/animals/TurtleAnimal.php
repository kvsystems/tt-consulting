<?php
namespace TTConsulting\Example\Animal;

/**
 * Class TurtleAnimal.
 * Implements a turtle.
 * @package TTConsulting\Example\Animal
 */
class TurtleAnimal extends AGenericAnimal {

    /**
     * Publishes turtle voice.
     * @return string
     */
    public function voice() : string {
        return 'Молчание - золото';
    }

}