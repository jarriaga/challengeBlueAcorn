<?php
/**
 * Class ProcessSale
 * @package IceCreamShop
 * Author: Jesus Arriaga Barron jarriagabarron@gmail.com
 * Description: this class handle and process the sell
 */

namespace IceCreamShop;


class ProcessSale {
    private $products = array();

    /**
     * @param $product
     * This method add the products to the cart
     */
    public function addProduct($product)
    {
        $this->products[] = $product;
    }

    /**
     * This method check every product in the cart and process the sell
     */
    public function checkOut()
    {
        $total = 0;
        $totalDiscount = 0;
        $result = "";
        foreach($this->products as $product){
            $discount = ($product->getDiscount()/100)*$product->getPrice();
            $result.= "\n".$product->getProductConfiguration()."\n -- price ". number_format($product->getPrice(),2);
            $result.= ($product->getDiscount()>0)?" -- Discount {$product->getDiscount()}% = ".number_format($discount,2) :"" ;
            $total+=$product->getPrice();
            $totalDiscount+=$discount;
        }
        $result .= "\n\n Total = ".number_format($total,2)."\n Discount = -".number_format($totalDiscount,2). "\n Grand Total = ".number_format($total-$totalDiscount,2);
        echo $result."\n";
    }



} 
