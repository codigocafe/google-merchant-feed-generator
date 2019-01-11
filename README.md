# Google Merchant Feed Generator

[![Latest Stable Version](https://poser.pugx.org/oldmine/google-merchant-feed-generator/v/stable)](https://packagist.org/packages/oldmine/google-merchant-feed-generator)
[![Total Downloads](https://poser.pugx.org/oldmine/google-merchant-feed-generator/downloads)](https://packagist.org/packages/oldmine/google-merchant-feed-generator)
[![License](https://poser.pugx.org/oldmine/google-merchant-feed-generator/license)](https://packagist.org/packages/oldmine/google-merchant-feed-generator)

Library to generate valid [Google Merchant Feed](https://support.google.com/merchants/answer/7052112).

Library check data integrity and format to fit Google Merchant Center requirements.

Data to feed you will take from database, xml, json or other source and set it using library methods.

## Getting Started

### Dependencies

````
PHP >= 5.3
Composer (optional)
````

### Install

Choose acceptable installation method to your website

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

#### Without Composer:
````
require_once('src/IFeedGenerator.php');
require_once('src/IGenerated.php');
require_once('src/Constants.php');
require_once('src/Item.php');
require_once('src/Channel.php');
require_once('src/Feed.php');
require_once('src/XMLGenerator.php');
````

#### Usage examples

See [UsageExample.php](UsageExample.php).

When you have chosen feed generator you can choose method to get result:

````
$generator->printFeed() // Print feed in current document
$generator->saveFeed($file) // Save feed to $file
$generator->getFeed() // Get feed as string
````
## Tests

To run tests use command:
````
phpunit tests
````

## Author

* **Daniil Zhelninskiy** - [Oldmine](https://github.com/oldmine)

## License

This project is licensed under the Apache License Version 2.0 - see the [LICENSE.md](LICENSE.md) file for details
