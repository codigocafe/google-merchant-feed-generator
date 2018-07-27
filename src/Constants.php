<?php
namespace oldmine\GoogleMerchantFeedGenerator;

final class Constants {
    public static $CONDITIONS_ENUM = array(
        'new',
        'refurbished',
        'used'
    );

    public static $AVAILABILITY_ENUM = array(
        'in stock',
        'out of stock',
        'preorder'
    );

    public static $CURRENCY_ENUM = array(
        'USD',
        'EUR',
        'GBP',
        'UAH',
        'RUB',
        'CAD'
    );

    const PRICE_REGEX = '/^\d+(\.\d{1,2})?$/';
}
