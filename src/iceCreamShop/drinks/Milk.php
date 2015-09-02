<?php

namespace IceCreamShop;

/**
 * Class Soda
 * @package IceCreamShop
 * This class contain a static method to handle the list of milk
 * represent a drink
 * Author: Jesus Arriaga Barron jarriagabarron@gmail.com
 */

class Milk {

    static  private $milkTypes= array();
    private $milkSelected;
    CONST   NAME = 'MILK';
    //Load trait for common operations
    use CommonOperations;

    /**
     * Load the type of milk for this drink
     * @param null $milkSelected
     */
    public function __construct($milkSelected=null)
    {
        try{
            if(!$milkSelected)
                throw new \Exception('Please select an available Type of Milk');
            $this->setMilkSelected($milkSelected);
        }catch (\Exception $e){
            echo "\n\n*****Error****\n".$e->getMessage()."\n*********\n\n";
        }
    }

    /**
     * @return mixed
     */
    public function getMilkSelected()
    {
        return $this->milkSelected;
    }

    /**
     * @param mixed $milkType
     */
    public function setMilkSelected($milkType)
    {
        $this->setValue(self::$milkTypes,$this->milkSelected,$milkType);
    }

    /**
     * @param $milkType
     *  This method add a new milk type
     */
    static public function addMilkType($milkType)
    {
        self::addItem(self::$milkTypes,$milkType);
    }

    /**
     * @param $milkType
     * This method remove a cup type
     */
    static public function removeMilkType($milkType)
    {
        echo "The milk type ".self::removeItem(self::$milkTypes,$milkType);
    }

    /**
     * This method get the list of items available
     */
    static public function getAvailableMilkTypes()
    {
        echo "The milk type ".self::getItemList(self::$milkTypes);
    }

}