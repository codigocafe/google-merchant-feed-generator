<?php
namespace oldmine\GoogleMerchantFeedGenerator;

class Feed implements IGenerated {
    private $channels = array();

    public function generate(IFeedGenerator $generator)
    {
        $generator->generateFeed($this);
    }

    /**
     * @return Channel[]
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @param Channel[] $channels
     */
    public function addChannels($channels)
    {
        $this->channels += $channels;
    }

    /**
     * @param Channel $channel
     */
    public function addChannel($channel)
    {
        $this->channels[] = $channel;
    }
}
