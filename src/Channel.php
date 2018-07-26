<?php
namespace oldmine\GoogleMerchantFeedGenerator;

class Channel implements IGenerated {
    private $title;
    private $link;
    private $description;
    private $items = array();

    public function __construct()
    {

    }

    public function generate(IFeedGenerator $generator)
    {
        $generator->generateChannel($this);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     */
    public function addItems($items)
    {
        $this->items += $items;
    }

    /**
     * @param Item $item
     */
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setFeed(Feed $feed)
    {
        $feed->addChannel($this);
        return $this;
    }
}
