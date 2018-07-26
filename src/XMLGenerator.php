<?php
namespace oldmine\GoogleMerchantFeedGenerator;

class XMLGenerator implements IFeedGenerator {
    private $result;

    public function generateFeed(Feed $feed)
    {
        $this->writeLine('<?xml version="1.0" encoding="UTF-8"?>');
        $this->writeLine('<rss xmlns:g="http://base.google.com/ns/1.0" version="2.0">');
        foreach ($feed->getChannels() as $channel){
            $channel->generate($this);
        }
        $this->writeLine('</rss>');
    }

    public function generateChannel(Channel $chanel)
    {
        $this->writeLine('<channel>');
        $this->writeTag('title', $chanel->getTitle());
        $this->writeTag('link', $chanel->getLink());
        $this->writeTag('description', $chanel->getDescription());
        foreach ($chanel->getItems() as $item){
            $item->generate($this);
        }
        $this->writeLine('</channel>');
    }

    public function generateItem(Item $item)
    {
        $this->writeLine('<item>');
        $this->writeTag('g:id', $item->getId());
        $this->writeTag('g:title', $item->getTitle());
        $this->writeTag('g:description', $item->getDescription());
        $this->writeTag('g:link', $item->getLink());
        $this->writeTag('g:image_link', $item->getImageLink());
        $this->writeTag('g:condition', $item->getCondition());
        $this->writeTag('g:availability', $item->getAvailability());
        $this->writeTag('g:price', $item->getPrice());
        $this->writeTag('g:brand', $item->getBrand());
        $this->writeTag('g:mpn', $item->getMpn());
        $this->writeLine('</item>');
    }

    public function saveFeed($file)
    {
        file_put_contents($file, $this->result);
    }

    public function printFeed()
    {
        die($this->result);
    }

    public function getFeed()
    {
        return $this->result;
    }

    private function writeLine($line)
    {
        $this->result = $this->result . $line . PHP_EOL;
    }

    private function writeTag($tag, $value)
    {
        if (!empty($tag) && !empty($value))
            $this->writeLine("<{$tag}>{$value}</{$tag}>");
    }
}
