<?php

namespace Sadenergizer\Okex;

interface ClientContract
{
    public function getTicker($symbol);
    public function getDepth($symbol, $size);
    public function getTrades($symbol, $since = null);
    public function getCandlestickData($symbol, $type, $size, $since);

    public function getUserInfo();
    public function placeOrder($symbol, $type, $price, $amount);
    public function getOrder($symbol, $id);
    public function cancelOrder($symbol, $id);
    public function getWalletInfo();
}
