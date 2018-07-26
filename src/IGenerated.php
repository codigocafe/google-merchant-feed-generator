<?php
namespace oldmine\GoogleMerchantFeedGenerator;

interface IGenerated {
    public function generate(IFeedGenerator $feedGenerator);
}
