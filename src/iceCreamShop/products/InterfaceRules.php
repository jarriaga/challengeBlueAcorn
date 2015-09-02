<?php
namespace IceCreamShop;
/**
 * Interface InterfaceRules
 * Description: This interface is to define the rules for this kind of product created.
 * Author: Jesus Arriaga Barron jarriagabarron@gmail.com
 */
Interface InterfaceRules
{
    public function setProductRules();

    public function validateProduct();

    public function setDiscount($percentage = 0);

    public function getProductConfiguration();
}