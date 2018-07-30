# Google Merchant Feed Generator

Библиотека для создания [Google Merchant Feed](https://support.google.com/merchants/answer/7052112?hl=ru).

Библиотека проверяет целостность и формат данных чтобы соответствовать требованиям Google Merchant Center.

Данные для заполнения вы получаете из вашей базы данных, xml, json или иного формата и устанавливаете с помощью удобных методов.

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

See [UsageExample.php](UsageExample.php).

Выбрав генератор фида у вас есть несколько вариантов вывода результата:

````
$generator->printFeed() // Вывод фида в текущем документе
$generator->saveFeed($file) // Сохранить фид в $file 
$generator->getFeed() // Получить фид в виде строки
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
