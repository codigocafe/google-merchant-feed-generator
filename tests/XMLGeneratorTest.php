<?php

namespace oldmine\GoogleMerchantFeedGenerator\tests;

use oldmine\GoogleMerchantFeedGenerator\Feed;
use oldmine\GoogleMerchantFeedGenerator\Channel;
use oldmine\GoogleMerchantFeedGenerator\Item;
use oldmine\GoogleMerchantFeedGenerator\XMLGenerator;

class XMLGeneratorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider providerFeed
     * @param Feed $feed
     * @param $result
     */
    public function testXMLOutput($feed, $result)
    {
        $generator = new XMLGenerator();
        $generator->generateFeed($feed);

        $this->assertEquals($generator->getFeed(), $result);
    }


    public function providerFeed()
    {
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
            ->setPriceWithCurrency(100, 'RUB')
            ->setBrand('Test')
            ->setMpn('4687DF4')
            ->setChannel($channel);

        $result = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $result .= '<rss xmlns:g="http://base.google.com/ns/1.0" version="2.0">' . PHP_EOL;
        $result .= '<channel>' . PHP_EOL;
        $result .= '<title>TestFeed</title>' . PHP_EOL;
        $result .= '<link>https://getcomposer.org/</link>' . PHP_EOL;
        $result .= '<description>Test Feed Description</description>' . PHP_EOL;
        $result .= '<item>' . PHP_EOL;
        $result .= '<g:id>1</g:id>' . PHP_EOL;
        $result .= '<g:title>Test Title 1</g:title>' . PHP_EOL;
        $result .= '<g:description>Test Description 1</g:description>' . PHP_EOL;
        $result .= '<g:link>https://www.google.com/</g:link>' . PHP_EOL;
        $result .= '<g:image_link>https://getcomposer.org/img/logo-composer-transparent5.png</g:image_link>' . PHP_EOL;
        $result .= '<g:condition>new</g:condition>' . PHP_EOL;
        $result .= '<g:availability>in stock</g:availability>' . PHP_EOL;
        $result .= '<g:price>100 RUB</g:price>' . PHP_EOL;
        $result .= '<g:brand>Test</g:brand>' . PHP_EOL;
        $result .= '<g:mpn>4687DF4</g:mpn>' . PHP_EOL;
        $result .= '</item>' . PHP_EOL;
        $result .= '</channel>' . PHP_EOL;
        $result .= '</rss>' . PHP_EOL;

        return array(
            array ($feed, $result)
        );
    }
}