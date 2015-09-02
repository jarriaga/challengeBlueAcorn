<?php

namespace IceCreamShop;
/**
 * Class Bootstrap
 * @package IceCreamShop
 *  This class loads the initial configuration for the environment
 * Author: Jesus Arriaga Barron
 */

class Bootstrap {

    /**
     * Load initial parameters
     */
    public function init()
    {
        $this->createFlavors();
        $this->createContainers();
        $this->createDrinks();
    }

    /**
     * Load the list of available iceCream flavors
     */
    private function createFlavors()
    {
        //Flavors of IceCream
        IceCreamSpoon::addFlavor('Strawberry');
        IceCreamSpoon::addFlavor('Lemon');
        IceCreamSpoon::addFlavor('Chocolate');
        IceCreamSpoon::addFlavor('Vanilla');
        IceCreamSpoon::addFlavor('Blue Acorn');
    }

    /**
     * Load the list of available containers
     */
    private function createContainers()
    {
        //Two different serving vessels
        Cone::addConeType('Waffle');
        Cup::addCupType('5oz');
    }

    /**
     * Load the list of available drinks
     */
    private function createDrinks()
    {
        //Three Different flavor soda
        Soda::addFlavor('Coke');
        Soda::addFlavor('Dr-Pepper');
        Soda::addFlavor('Sprite');
        //Three kind of milk
        Milk::addMilkType('Skim-Milk');
        Milk::addMilkType('Whole-Milk');
        Milk::addMilkType('2%-Milk');
    }

} 