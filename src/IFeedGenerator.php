<?php
namespace oldmine\GoogleMerchantFeedGenerator;

interface IFeedGenerator{
    public function generateFeed(Feed $feed);
    public function generateChannel(Channel $channel);
    public function generateItem(Item $item);
}
