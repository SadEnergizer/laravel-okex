<?php

namespace Sadenergizer\Okex;

use GuzzleHttp\Client as RestClient;
use GuzzleHttp\Exception\GuzzleException;

class Client implements ClientContract
{
    protected $apiUrl;
    protected $apiVersion;

    private $url;
    private $key;
    private $secret;
    private $client;

    public function __construct($auth, $url, $version)
    {
        $this->apiUrl = $url;
        $this->apiVersion = $version;
        $this->url = "{$url}/{$version}";

        $this->key = array_get($auth, 'key');
        $this->secret = array_get($auth, 'secret');

        $this->client = new RestClient([
            //'timeout'  => 10.0,
        ]);
    }

    public function getTicker($symbol)
    {
        $base = 'ticker.do';
        $params = [];
        $params['symbol'] = $symbol;

        return $this->request($base, $params);
    }

    public function getOrder($symbol, $id)
    {
        $base = 'order_info.do';
        $params = [];
        $params['symbol'] = $symbol;
        $params['order_id'] = $id;
        $method = 'POST';
        $isPublic = false;

        return $this->request($base, $params, $method, $isPublic);
    }

    public function cancelOrder($symbol, $id)
    {
        $base = 'cancel_order.do';
        $params = [];
        $params['symbol'] = $symbol;
        $params['order_id'] = $id;
        $method = 'POST';
        $isPublic = false;

        return $this->request($base, $params, $method, $isPublic);
    }

    public function request($base, $params = [], $method = 'GET', $isPublic = true)
    {
        if (!$isPublic) {
            $params['api_key'] = $this->key;
            ksort($params);
            $params['secret_key'] = $this->secret;
            $sign = strtoupper(md5(http_build_query($params)));
            unset($params['secret_key']);
            $params['sign'] = $sign;
        }

        $uri = "{$this->url}/{$base}";

        try {
            if ($method == 'GET') {
                $response = $this->client->request($method, $uri, ['query' => $params])->getBody();
            } else {
                $response = $this->client->request($method, $uri, ['form_params' => $params])->getBody();
            }
        } catch (ClientException $e) {
            return null;
        }

        $result = json_decode($response, true);
        return $result;
    }

}