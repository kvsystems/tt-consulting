<?php
namespace TTConsulting\Example\Animal;

/**
 * Class CatAnimal
 * Implements a cat.
 * @package TTConsulting\Example\Animal
 */
class CatAnimal extends AGenericAnimal {

    /**
     * Publishes cat voice.
     * @return string
     */
    public function voice() : string {
        return 'Мяу';
    }

}