<?php
require_once('vendor/autoload.php');

use oldmine\GoogleMerchantFeedGenerator\Feed;
use oldmine\GoogleMerchantFeedGenerator\Channel;
use oldmine\GoogleMerchantFeedGenerator\Item;
use oldmine\GoogleMerchantFeedGenerator\XMLGenerator;

// Test data samples
$testSamples = array(
    array(
        'Id' => '1',
        'Title' => 'Test good item',
        'Description' => 'Test good item description',
        'Link' => 'https://www.google.com/',
        'ImageLink' => 'https://getcomposer.org/img/logo-composer-transparent5.png',
        'Condition' => 'new',
        'Availability' => 'in stock',
        'Price' => '100.00 RUB',
        'Brand' => 'Test',
        'Mpn' => '4687DF4'
    ),
    array(
        'Id' => '2',
        'Title' => 'Test broken item',
        'Description' => 'Test broken item description',
        'Link' => 'https://www.google.com/',
        'ImageLink' => 'https://getcomposer.org/img/logo-composer-transparent5.png',
        'Condition' => 'bad condition',
        'Availability' => 'in stock',
        'Price' => '100.00 RUB',
        'Brand' => 'Test',
        'Mpn' => '4687DF4'
    ),
    array(
        'Id' => '2',
        'Title' => 'Test broken item',
        'Description' => 'Test broken item description',
        'Link' => 'https://www.google.com/',
        'ImageLink' => 'https://getcomposer.org/img/logo-composer-transparent5.png',
        'Condition' => 'new',
        'Availability' => 'asdasdasd',
        'Price' => '100.00 RUB',
        'Brand' => 'Test',
        'Mpn' => '4687DF4'
    )
);

// Create new Feed
$feed = new Feed();

// Create new Channel, sets its up and bind to Feed
$channel = new Channel();
$channel->setTitle('TestFeed')
    ->setLink('https://getcomposer.org/')
    ->setDescription('Test Feed Description')
    ->setFeed($feed);

// Create new Items
foreach ($testSamples as $testSample) {
    // If item is broken throw exception
    try {
        $item = new Item();

        $item->setId($testSample['Id'])
            ->setTitle($testSample['Title'])
            ->setDescription($testSample['Description'])
            ->setLink($testSample['Link'])
            ->setImageLink($testSample['ImageLink'])
            ->setCondition($testSample['Condition'])
            ->setAvailability($testSample['Availability'])
            ->setPrice($testSample['Price'])
            ->setBrand($testSample['Brand'])
            ->setMpn($testSample['Mpn'])
            ->setChannel($channel);
    } catch (Exception $exception) {
        // Catch exception and log error
        // Broken items are skipped in feed
        // So as not break feed
        error_log('Product has error. ID: ' . $testSample['Id'] . ', exception: ' . $exception);
    }
}

// Create Feed Generator required output format
$generator = new XMLGenerator();
$generator->generateFeed($feed);
$generator->printFeed();