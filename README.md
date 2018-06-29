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

Please refer to the [Api Documentation](https://github.com/okcoin-okex/API-docs-OKEx.com/) for more info!

```
use Sadenergizer\Okex\Okex;

// public API methods
Okex::getTicker($symbol);
Okex::getDepth($symbol, $size);
Okex::getTrades($symbol, $since = null);
Okex::getCandlestickData($symbol, $type, $size, $since);

// private API methods
Okex::getUserInfo();
Okex::placeOrder($symbol, $type, $price, $amount);
Okex::getOrder($symbol, $id);
Okex::cancelOrder($symbol, $id);
Okex::getWalletInfo();
```

This package is provided as-is. Do with it what you want!

