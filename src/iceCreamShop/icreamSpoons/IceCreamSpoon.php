<?php

namespace IceCreamShop;

/**
 * Class IceCreamSpoon
 * @package IceCreamShop
 * This class contain a static method to handle the flavor list of IceCream, and it
 * represent a spoon of icecream
 * Author: Jesus Arriaga Barron jarriagabarron@gmail.com
 */

class IceCreamSpoon
{
    //Static list flavors
    static private $flavors = array();
    //flavor of the spoon
    private $flavor;

    //Load trait for common operations
    use CommonOperations;

    /**
     * Load the iceCream with flavor is this was assigned
     * @param null $flavor
     */
    public function __construct($flavor=null)
    {   try{
            if(!$flavor)
                throw new \Exception('Please select an available ice Cream flavor for this spoon');
            $this->setFlavor($flavor);
        }catch (\Exception $e){
            echo "\n\n*****Error****\n".$e->getMessage()."\n*********\n\n";
        }
    }

    /**
     * @return mixed
     * This method return the spoon's flavor
     */
    public function getFlavor()
    {
        return $this->flavor;
    }

    /**
     * @param mixed $flavor
     * This method assign the flavor of the spoon
     */
    public function setFlavor($flavor)
    {
        $this->setValue(self::$flavors,$this->flavor,$flavor);
    }

    /**
     * @param $flavor
     * @throws \Exception
     * This method remove the flavor from the menu
     */
    static public function removeFlavor($flavor)
    {
        echo "The flavor ".self::removeItem(self::$flavors,$flavor);
    }

    /**
     * @param $flavor
     * This method add new Flavors to the list
     */
    static public function addFlavor($flavor)
    {
        self::addItem(self::$flavors,$flavor);
    }

    /**
     * @throws \Exception
     * This method print the list of flavors
     */
    static public function getAvailableFlavors()
    {
        echo "Ice Cream ". self::getItemList(self::$flavors);
    }
}