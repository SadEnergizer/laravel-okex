<?php

namespace Sadenergizer\Okex;

interface ClientContract
{
    public function getTicker($symbol);
    public function getOrder($symbol, $id);
    public function cancelOrder($symbol, $id);
}
