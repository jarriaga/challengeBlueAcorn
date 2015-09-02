<?php

namespace IceCreamShop;

/**
 * Class Soda
 * @package IceCreamShop
 * This class contain a static method to handle the list of Soda
 * represent a drink
 * Author: Jesus Arriaga Barron jarriagabarron@gmail.com
 */
class Soda {

    static  private $flavors= array();
    private $flavor;
    CONST   NAME = 'SODA';
    //Load trait for common operations
    use CommonOperations;

    /**
     * Load the flavor of soda for this drink
     * @param null flavor
     */
    public function __construct($flavor=null)
    {
        try{
            if(!$flavor)
                throw new \Exception('Please select an available flavor of Soda');
            $this->setFlavor($flavor);
        }catch (\Exception $e){
            echo "\n\n*****Error****\n".$e->getMessage()."\n*********\n\n";
        }
    }

    /**
     * @return mixed
     */
    public function getFlavor()
    {
        return $this->flavor;
    }

    /**
     * @param mixed $flavor
     */
    public function setFlavor($flavor)
    {
         $this->setValue(self::$flavors,$this->flavor,$flavor);
    }

    /**
     * @param $flavor
     * This add new cup for selection* This add new cup for selection
     */
    static public function addFlavor($flavor)
    {
        self::addItem(self::$flavors,$flavor);
    }

    /**
     * @param $flavor
     * This method remove a cup type
     */
    static public function removeFlavor($flavor)
    {
        echo "The soda flavor  ".self::removeItem(self::$flavors,$flavor);
    }

    /**
     * This method get the list of items available
     */
    static public function getAvailableFlavors()
    {
        echo "The soda flavor ".self::getItemList(self::$flavors);
    }

}