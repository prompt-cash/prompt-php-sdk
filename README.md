# Prompt.Cash PHP SDK
This is a PHP library to add [Prompt.Cash](https://prompt.cash/) to your PHP based website (WordPress, Laravel, Joomla, ...).
It is a PHP wrapper over the [Prompt.Cash REST API](https://prompt.cash/pub/docs/).

For WordPress there is also an [official plugin](https://wordpress.org/plugins/prompt-cash-monetize-your-blog-with-bitcoin-cash/).

#### Installation
With composer (recommended):
```
composer require "prompt-cash/prompt-php-sdk"
```

Manual installation:

1. Download the source code and include `prompt-cash.php` from the root directory of this library.

#### Requirements
```
PHP >= 7.2
```

## Features
* create new payments
* show payment QR code as iframe or redirect to payment page in new window  
* check payment status
* create short URLs (URL shortener to monetize links)
* get a list of previously created short URLs
* delete and update short URLs


## Docs
Take a look at [code examples](./examples).

#### PromptPhpSdk class
##### __construct(PromptOptions $options = null)
Create the main API class.
* `PromptOptions $options` - (optional) API options (see below)


## Testing
To run unit tests type the following command in the project root directory (requires PHPUnit, installed automatically with Composer):

`./vendor/bin/phpunit --bootstrap vendor/autoload.php tests`


## Contact
[Website](https://prompt.cash/) -
[Twitter](https://twitter.com/CashPrompt) -
[Telegram](https://t.me/PromptCash) -
[YouTube](https://www.youtube.com/channel/UClfNVdL3T0RF6pF1yGi9teg)
