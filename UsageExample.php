<?php
require_once ('vendor/autoload.php');

use oldmine\GoogleMerchantFeedGenerator\Feed;
use oldmine\GoogleMerchantFeedGenerator\Channel;
use oldmine\GoogleMerchantFeedGenerator\Item;
use oldmine\GoogleMerchantFeedGenerator\XMLGenerator;

$feed = new Feed();

$channel = new Channel();
$channel->setTitle('TestFeed')
    ->setLink('https://getcomposer.org/')
    ->setDescription('Test Feed Description')
    ->setFeed($feed);

$item = new Item();
$item->setId(1)
    ->setTitle('Test Title 1')
    ->setDescription('Test Description 1')
    ->setLink('https://www.google.com/')
    ->setImageLink('https://getcomposer.org/img/logo-composer-transparent5.png')
    ->setCondition('new')
    ->setAvailability('in stock')
    ->setPrice('100 RUB')
    ->setBrand('Test')
    ->setMpn('4687DF4')
    ->setChannel($channel);

$generator = new XMLGenerator();
$generator->generateFeed($feed);
$generator->printFeed();