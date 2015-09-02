<?php

namespace IceCreamShop;

/**
 * Class Cone
 * @package IceCreamShop
 * This class contain a static method to handle the list of Cones
 * represent a cone container
 * Author: Jesus Arriaga Barron jarriagabarron@gmail.com
 */
class Cone {

    static  private $types= array();
    private $coneType;
    CONST   NAME = 'CONE';

    //Load trait for common operations
    use CommonOperations;


    /**
     * Load the iceCream with flavor is this was assigned
     * @param null $coneType
     */
    public function __construct($coneType=null)
    {
        try{
            if(!$coneType)
                throw new \Exception('Please select an available Cone');
            $this->setCone($coneType);
        }catch (\Exception $e){
            echo "\n\n*****Error****\n".$e->getMessage()."\n*********\n\n";
        }
    }

    /**
     * @return mixed
     */
    public function getCone()
    {
        return $this->coneType;
    }

    /**
     * @param mixed $coneType
     */
    public function setCone($coneType)
    {
        $this->setValue(self::$types,$this->coneType,$coneType);
    }

    /**
     * @param $coneType
     * This add new cone for selection
     */
    static public function addConeType($coneType)
    {
        self::addItem(self::$types,$coneType);
    }

    /**
     * @param $coneType
     * This method remove a cone type
     */
    static public function removeConeType($coneType)
    {
        echo "The cone type ".self::removeItem(self::$types,$coneType);
    }

    /**
     * This method get the list of items available
     */
    static public function getAvailableCones()
    {
        echo "The cones type ".self::getItemList(self::$types);
    }

}