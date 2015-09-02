<?php
namespace IceCreamShop;
/**
 * Class CommonOperations
 * @package IceCreamShop
 * This trait handle the common operations with the arrays
 * for static objects
 * Author: Jesus Arriaga Barron  jarriagabarron@gmail.com
 */
trait CommonOperations {
    /**
     * @return mixed
     * This method return the name of the class
     */
    public function getName()
    {
        return self::NAME;
    }
    /**
     * @param $array
     * @param $value
     * Load element into array
     */
    private function addItem(&$array,$value)
    {
        $array[]    =   strtolower($value);
    }

    /**
     * @param $array
     * This method show the item list (array)
     * @return string
     */
    private function getItemList(&$array)
    {
        if(count($array)<=0){
            return  "list is empty \n";
        }else {
            $result = "available ***: ";
            $result .= implode(" , ",$array) ;
            return $result."\n\n";
        }
    }

    /**
     * @param $array
     * @param $item
     * @return string
     * This method remove the elements of the array
     */
    private function removeItem(&$array,$item)
    {
        $pos = array_search(strtolower($item),$array);
        if($pos !== false) {
            unset(self::$$array[$pos]);
            return " {$item} was removed\n";
        }
            return "{$item} does not exist\n";
    }

    /**
     * @param $array
     * @param $variable
     * @param $newElement
     * @return string
     * This method set a value if this value exist in the given array
     */
    private function setValue(&$array,&$variable,&$newElement)
    {
        try {
            $pos = array_search(strtolower($newElement), $array);
            if ($pos !== false) {
                $variable = $array[$pos];
                return true;
            }
              throw new \Exception("{$newElement} is not available ");
        }catch(\Exception $e){
            echo "\n\n******ERROR******\n".$e->getMessage()."\n*************\n\n";
            return false;
        }
    }
} 