<?php
namespace oldmine\GoogleMerchantFeedGenerator;

class Item implements IGenerated {
    private $id;
    private $title;
    private $description;
    private $link;
    private $imageLink;
    private $condition;
    private $availability;
    private $price;
    private $brand;
    private $mpn;

    public function __construct()
    {

    }

    public function generate(IFeedGenerator $generator)
    {
        $generator->generateItem($this);
    }

    public function setChannel(Channel $channel)
    {
        $channel->addItem($this);
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = substr($id, 0, 50);
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = substr($title, 0, 150);
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = substr($description, 0, 5000);
        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        if (filter_var($link, FILTER_VALIDATE_URL) !== false){
            $this->link = $link;
        } else {
            throw new \Exception ('Link: ' . $link . ' is not valid. Please check link');
        }
        return $this;
    }

    public function getImageLink()
    {
        return $this->imageLink;
    }

    public function setImageLink($imageLink)
    {
        if (filter_var($imageLink, FILTER_VALIDATE_URL) !== false){
            $this->imageLink = $imageLink;
        } else {
            throw new \Exception ('Image link: ' . $imageLink . ' is not valid. Please check image link');
        }
        return $this;
    }

    public function getCondition()
    {
        return $this->condition;
    }

    public function setCondition($condition)
    {
        if (in_array($condition, Constants::$CONDITIONS_ENUM, true)){
            $this->condition = $condition;
        } else {
            throw new \Exception ('Condition: ' . $condition . ' is not valid.');
        }
        return $this;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    public function setAvailability($availability)
    {
        if (in_array($availability, Constants::$AVAILABILITY_ENUM, true)){
            $this->availability = $availability;
        } else {
            throw new \Exception ('Availability: ' . $availability . ' is not valid.');
        }
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($PriceString)
    {
        $priceArr = explode(' ', $PriceString, 2);
        $price = $priceArr[0];
        $currency = $priceArr[1];

        $isValidPrice = preg_match(Constants::PRICE_REGEX, $price);
        $isValidCurrency = in_array($currency, Constants::$CURRENCY_ENUM);

        if ($isValidPrice === 1 && $isValidCurrency === true){
            $this->price = number_format($price, 2, '.', '') . ' ' . $currency;
        } else {
            throw new \Exception ('Price string: ' . $PriceString . ' is not valid.');
        }
        return $this;
    }

    public function setPriceWithCurrency($price, $currency)
    {
        $isValidPrice = preg_match(Constants::PRICE_REGEX, $price);
        $isValidCurrency = in_array($currency, Constants::$CURRENCY_ENUM);

        if ($isValidPrice === 1 && $isValidCurrency === true){
            $this->price = number_format($price, 2, '.', '') . ' ' . $currency;
        } else {
            throw new \Exception('Price and currency: ' . $price . ' ' . $currency . ' is not valid.');
        }
        return $this;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = substr($brand, 0, 70);
        return $this;
    }

    public function getMpn()
    {
        return $this->mpn;
    }

    public function setMpn($mpn)
    {
        $this->mpn = substr($mpn, 0, 70);
        return $this;
    }
}
