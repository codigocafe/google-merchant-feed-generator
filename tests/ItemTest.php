<?php

namespace oldmine\GoogleMerchantFeedGenerator\tests;

use oldmine\GoogleMerchantFeedGenerator\Item;

class ItemTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider providerItem
     * @param $item Item
     */
    public function testBasicItemStructure($item)
    {
        $this->assertNotEmpty($item->getId());
        $this->assertNotEmpty($item->getTitle());
        $this->assertNotEmpty($item->getDescription());
        $this->assertNotEmpty($item->getLink());
        $this->assertNotEmpty($item->getImageLink());
        $this->assertNotEmpty($item->getCondition());
        $this->assertNotEmpty($item->getAvailability());
        $this->assertNotEmpty($item->getPrice());
        $this->assertNotEmpty($item->getBrand());
        $this->assertNotEmpty($item->getMpn());
    }

    public function providerItem()
    {
        $item = new Item();
        $item->setId(1);
        $item->setTitle('Test Title 1');
        $item->setDescription('Test Description 1');
        $item->setLink('https://www.google.com/');
        $item->setImageLink('https://getcomposer.org/img/logo-composer-transparent5.png');
        $item->setCondition('new');
        $item->setAvailability('in stock');
        $item->setPriceWithCurrency(100, 'RUB');
        $item->setBrand('Test');
        $item->setMpn('4687DF4');

        return array(
            array ($item)
        );
    }
}