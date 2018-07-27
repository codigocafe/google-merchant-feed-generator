# Google Merchant Feed Generator

Библиотека для простого создания [Google Merchant Feed](https://support.google.com/merchants/answer/7052112?hl=ru)
[Страница на packagist.org](https://packagist.org/packages/oldmine/google-merchant-feed-generator)

## Getting Started

### Зависимости

````
PHP >= 5.3
Composer (optional)
````

### Установка

Выберите удобный вам способ установки

#### Composer (.json)
````
{
    "require": {
        "oldmine/google-merchant-feed-generator": "master"
    }
}
````

#### Composer (Command Line)
````
composer require oldmine/google-merchant-feed-generator
````

#### Если вы не используете Composer:
````
require_once('src/IFeedGenerator.php');
require_once('src/IGenerated.php');
require_once('src/Constants.php');
require_once('src/Item.php');
require_once('src/Channel.php');
require_once('src/Feed.php');
require_once('src/XMLGenerator.php');
````

#### Пример использования
````
//Импортируем пространства имён
use oldmine\GoogleMerchantFeedGenerator\Feed;
use oldmine\GoogleMerchantFeedGenerator\Channel;
use oldmine\GoogleMerchantFeedGenerator\Item;
use oldmine\GoogleMerchantFeedGenerator\XMLGenerator;

//Создаём новый фид
$feed = new Feed();

//Создаём новый канал и настраиваем его
$channel = new Channel();
$channel->setTitle('TestFeed')
    ->setLink('https://getcomposer.org/')
    ->setDescription('Test Feed Description')
    ->setFeed($feed);

//Создаём новый продукт и настраиваем его
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
    
//Создаём генератор необходимого формата
$generator = new XMLGenerator();
$generator->generateFeed($feed);
$generator->printFeed();
````

## Запуск тестов

В командной строке:
````
phpunit tests
````

## Авторы

* **Daniil Zhelninskiy** - [Oldmine](https://github.com/oldmine)

## Лицензия

This project is licensed under the Apache License Version 2.0 - see the [LICENSE.md](LICENSE.md) file for details
