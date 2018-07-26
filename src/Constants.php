<?php
namespace oldmine\GoogleMerchantFeedGenerator;

final class Constants {
    const CONDITIONS_ENUM = array(
        'new',
        'refurbished',
        'used'
    );

    const AVAILABILITY_ENUM = array(
        'in stock',
        'out of stock',
        'preorder'
    );

    const CURRENCY_ENUM = array(
        'USD',
        'EUR',
        'GBP',
        'UAH',
        'RUB',
        'CAD'
    );

    const PRICE_REGEX = '/^\d+(\.\d{1,2})?$/';
}
