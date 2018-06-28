# Laravel-Okex

Start trading on Okex right away using your favorite PHP framework.

### Installation

`composer require sadenergizer/laravel-okex`.

Add the service provider to your `config/app.php`:
 
 ``` 
 'providers' => [
    Sadenergizer\Okex\OkexServiceProvider::class,
 ],
 ```
 
...run `php artisan vendor:publish` to copy the config file.

Edit the `config/okex.php` or add Okex api and secret in your `.env` file

```
OKEX_KEY={YOUR_API_KEY}
OKEX_SECRET={YOUR_API_SECRET}

```

Add the alias to your `config/app.php`:

```    
'aliases' => [
    'Okex' => Sadenergizer\Okex\Okex::class,
],
```

### Usage

Please refer to the [Api Documentation](https://github.com/okcoin-okex/API-docs-OKEx.com/) for more info, or read the [docblocks](https://github.com/sadenergizer/laravel-okex/blob/master/src/Client.php)!

```
use Sadenergizer\Okex\Okex;

// public API methods
Okex::getTicker($symbol);

// private API methods
Okex::getOrder($symbol, $id);
Okex::cancelOrder($symbol, $id);
```

This package is provided as-is. Do with it what you want!

