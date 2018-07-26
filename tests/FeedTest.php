<?php

namespace oldmine\GoogleMerchantFeedGenerator\tests;

use oldmine\GoogleMerchantFeedGenerator\Feed;
use oldmine\GoogleMerchantFeedGenerator\Channel;

class FeedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerFeed
     * @param Feed $feed
     */
    public function testAddChannel($feed)
    {
        $channel = new Channel();
        $feed->addChannel($channel);

        $this->assertEquals(count($feed->getChannels()), 1);
    }

    /**
     * @dataProvider providerFeed
     * @param Feed $feed
     */
    public function testAddChannels($feed)
    {
        $channels = array(
            new Channel(),
            new Channel(),
            new Channel()
        );

        $feed->addChannels($channels);

        $this->assertEquals(count($feed->getChannels()), 3);
    }

    public function providerFeed()
    {
        $feed = new Feed();

        return array(
            array ($feed)
        );
    }
}
