<?php

namespace IceCreamShop;

/**
 * Class Cup
 * @package IceCreamShop
 * This class contain a static method to handle the list of Cups
 * represent a cup container
 * Author: Jesus Arriaga Barron jarriagabarron@gmail.com
 */
class Cup {

    static  private $types= array();
    private $cupType;
    CONST   NAME = 'CUP';

    //Load trait for common operations
    use CommonOperations;


    /**
     * Load the iceCream with flavor is this was assigned
     * @param null $cupType
     */
    public function __construct($cupType=null)
    {   try{
            if(!$cupType)
                throw new \Exception('Please select an available Cup');
            $this->setCup($cupType);
        }catch (\Exception $e){
            echo "\n\n*****Error****\n".$e->getMessage()."\n*********\n\n";
        }
    }

    /**
     * @return mixed
     */
    public function getCup()
    {
        return $this->cupType;
    }

    /**
     * @param mixed $cupType
     */
    public function setCup($cupType)
    {
        $this->setValue(self::$types,$this->cupType,$cupType);
    }

    /**
     * @param $cupType
     * This add new cup for selection
     */
    static public function addCupType($cupType)
    {
        self::addItem(self::$types,$cupType);
    }

    /**
     * @param $cupType
     * This method remove a cup type
     */
    static public function removeCupType($cupType)
    {
        echo "The cup  ".self::removeItem(self::$types,$cupType);
    }

    /**
     * This method get the list of items available
     */
    static public function getAvailableCups()
    {
        echo "The cup type ".self::getItemList(self::$types);
    }

}