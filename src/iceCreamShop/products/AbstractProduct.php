<?php


namespace IceCreamShop;
/**
 * Class AbstractProduct
 * @package IceCreamShop
 * Author: Jesus Arriaga Barron jarriagabarron@gmail.com
 * Description: this class contains the common methods for all products
 *              milkshake, ice cream, floats
 */

Abstract class AbstractProduct {
    protected $price;
    protected $discount;
    //object spoon
    protected $spoons = array();
    //object drink
    protected $drink;
    //object container
    protected $container;

    protected $maxSpoons;
    //name of classes for available containers
    protected $validContainers = array();
    //name of classes for available drinks
    protected $validDrinks = array();
    //Product Name
    protected $name;

    public function getName()
    {
        return  $this->name;
    }
    /**
     * @return mixed
     */
    public function getDrink()
    {
        return $this->drink;
    }

    /**
     * @param mixed $drink
     */
    public function addDrink($drink)
    {
        $this->drink = $drink;
    }


    /**
     * @return array
     */
    protected  function getValidContainers()
    {
        return $this->validContainers;
    }



    /**
     * @return bool
     * This method validate the spoons of iceCream and Vessel for all kind of products
     */
    protected function validateSpoonsAndServingVessel()
    {
        try{
            //Validate the spoons number
            if($this->getNumberSpoons()>$this->getMaxSpoons())
                throw new \Exception("You can select only {$this->getMaxSpoons()} ice Cream spoons");
            //Validate at least 1 spoon
            if($this->getNumberSpoons()==0)
                throw new \Exception("Select at least 1 ice Cream spoons");
            //Validate must have the container(serving vessel)
            if(!is_object($this->getContainer()))
                throw new \Exception("Select a serving vessel");

            //Validate the container is one of the available for this product
            foreach($this->getValidContainers() as $container){
                $cont = 'IceCreamShop\\'.$container;
                if($this->getContainer() instanceof $cont)
                    return true;
            }
            throw new \Exception("Select a valid serving vessel for this product,\n Available serving vessel list: ".implode(",",$this->getValidContainers()));
        }catch (\Exception $e){
            echo "\n\n***Product ".str_replace("IceCreamShop\\","",get_class($this))." is not Valid***\n ".$e->getMessage()."\n******************\n\n";
            return false;
        }
    }

    /**
     * @return bool
     * This method validate the drinks for all kind of products if is needed
     */
    protected  function validateDrinks()
    {
        try{
            //Validate must have the container(serving vessel)
            if(!is_object($this->getDrink()))
                throw new \Exception("Select a drink for your product");

            //Validate the container is one of the available for this product
            foreach($this->getValidDrinks() as $drink){
                $drinkClass = 'IceCreamShop\\'.$drink;
                if($this->getDrink() instanceof $drinkClass)
                    return true;
            }
            throw new \Exception("Select a valid drink for this product,\n Available drinks list: ".implode(",",$this->getValidDrinks()));
        }catch (\Exception $e){
            echo "\n\n***Product ".str_replace("IceCreamShop\\","",get_class($this))." is not Valid***\n ".$e->getMessage()."\n******************\n\n";
            return false;
        }
    }

    /**
     * @return array
     */
    protected function getValidDrinks()
    {
       return   $this->validDrinks;
    }

    /**
     * @param array $validDrinks
     */
    protected  function setValidDrinks(array $validDrinks)
    {
        try{
            foreach($validDrinks as $drink){
                $drinkClass = 'IceCreamShop\\'.$drink;
                if(!class_exists($drinkClass))
                    throw new \Exception("The drink {$drink} does not exist");
                $this->validDrinks      =   $validDrinks;
            }
        }catch (\Exception $e){
            echo "\n\n****ERROR*****\n".$e->getMessage()."\n***********\n\n";
            exit;
        }
    }

    /**
     * @param array $validContainers
     */
    protected  function setValidContainers(array $validContainers)
    {
        try{
            foreach($validContainers as $container){
                $cont = 'IceCreamShop\\'.$container;
                if(!class_exists($cont))
                    throw new \Exception("The container {$container} does not exist");
                $this->validContainers = $validContainers;
            }
        }catch (\Exception $e){
            echo "\n\n****ERROR*****\n".$e->getMessage()."\n***********\n\n";
            exit;
        }
    }

    /**
     * @return mixed
     */
    public function getMaxSpoons()
    {
        return $this->maxSpoons;
    }

    /**
     * @param mixed $maxSpoons
     */
    protected function setMaxSpoons($maxSpoons)
    {
        $this->maxSpoons = $maxSpoons;
    }


    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     */
    protected function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    protected  function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return array
     */
    public function getSpoons()
    {
        return $this->spoons;
    }

    /**
     * @param IceCreamSpoon $spoon
     */
    private function setSpoons(IceCreamSpoon $spoon)
    {
        $this->spoons[] = $spoon;
    }

    /**
     * @return int Number of spoons for this product
     */
    protected  function getNumberSpoons()
    {
        return count($this->spoons);
    }

    /**
     * @return bool Validate if we can add a new Spoon of iceCream
     */
    protected function canAddSpoon()
    {
        if($this->getNumberSpoons()<= $this->getMaxSpoons())
            return true;
        else
            return false;
    }

    /**
     * @param IceCreamSpoon $iceCreamSpoon
     * @throws \Exception
     * This method add a new IceCreamSpoon to the Product
     */
    public function addSpoon(IceCreamSpoon $iceCreamSpoon)
    {
        if($this->canAddSpoon())
            $this->setSpoons($iceCreamSpoon);
        else
            echo "You can't add more ice cream spoons";
    }



}