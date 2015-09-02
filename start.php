<?php
/**
 * This is a Demo , how the application works
 * and accomplishment the goals
 * Author : Jesus Arriaga Barron  jarriagabarron@gmail.com
 *
 * All the classes are in /src/iceCreamShop
 */
use IceCreamShop\Bootstrap;
use IceCreamShop\IceCreamSpoon;
use IceCreamShop\Cone;
use IceCreamShop\Milk;
use IceCreamShop\Cup;
use IceCreamShop\Soda;

require __DIR__.'/vendor/autoload.php';

//Load the initial configuration
$config = new Bootstrap();
$config->init();

//List available ice cream flavors
IceCreamSpoon::getAvailableFlavors();
//List available Cones
Cone::getAvailableCones();
//List available Cups
Cup::getAvailableCups();
//List available soda flavor
Soda::getAvailableFlavors();
//List available Milk type
Milk::getAvailableMilkTypes();

//Create a Valid IceCream with 2 spoons in a cone
$newIceCream = new \IceCreamShop\IceCreamProduct();
$newIceCream->addSpoon(new IceCreamSpoon('Lemon'));
$newIceCream->addSpoon(new IceCreamSpoon('Strawberry'));
$newIceCream->setContainer(new Cone('Waffle'));
$newIceCream->validateProduct();

//Create a Valid IceCream with 1 spoons in a cup
$newIceCream2 = new \IceCreamShop\IceCreamProduct();
$newIceCream2->addSpoon(new IceCreamSpoon('Blue Acorn'));
$newIceCream2->setContainer(new Cup('5oz'));
$newIceCream2->validateProduct();

//Create a INVALID IceCream with 3 spoons in a cup  --- the iceCream only can have
//2 ice cream spoons as maximum
$newIceCream3 = new \IceCreamShop\IceCreamProduct();
$newIceCream3->addSpoon(new IceCreamSpoon('Blue Acorn'));
$newIceCream3->addSpoon(new IceCreamSpoon('Lemon'));
$newIceCream3->addSpoon(new IceCreamSpoon('Strawberry'));
$newIceCream3->setContainer(new Cup('5oz'));
$newIceCream3->validateProduct();

//Create a MilkShake with 1 Flavor ice cream spoon
$milkShake1 = new \IceCreamShop\MilkShakeProduct();
$milkShake1->addSpoon(new IceCreamSpoon('Chocolate'));
$milkShake1->setContainer(new Cup('5oz'));
$milkShake1->addDrink(new Milk('skim-milk'));
$milkShake1->validateProduct();

//Create a Float with 1 soda and 3 ice creams spoons
$float1 = new \IceCreamShop\FloatProduct();
$float1->setContainer(new Cup('5oz'));
$float1->addSpoon(new IceCreamSpoon('strawberry'));
$float1->addSpoon(new IceCreamSpoon('strawberry'));
$float1->addSpoon(new IceCreamSpoon('Lemon'));
$float1->addDrink(new Soda('Coke'));
$float1->validateProduct();


//Process sell
$cart = new \IceCreamShop\ProcessSale();
$cart->addProduct($milkShake1);
$cart->addProduct($newIceCream);
$cart->addProduct($newIceCream2);
$cart->addProduct($float1);

$cart->checkOut();



