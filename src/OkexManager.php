<?php

namespace Sadenergizer\Okex;

class OkexManager
{
    /**
     * @var Client
     */
    public $client;

    /**
     * OkexManager constructor.
     */
    public function __construct()
    {
        $this->with(
            config('okex.auth')
        );
    }

    /**
     * Package version.
     *
     * @return string
     */
    public function version()
    {
        return '0.1';
    }

    /**
     * Load the custom Client interface.
     *
     * @param ClientContract $client
     * @return $this
     */
    public function withCustomClient(ClientContract $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Create new client instance with given credentials.
     *
     * @param array $auth
     * @param array $urls
     * @return $this
     */
    public function with($auth, $url, $version)
    {
        $url = $url ?: config('okex.url');
        $version = $version ?: config('okex.version');

        $this->client = new Client($auth, $url, $version);

        return $this;
    }

    /**
     * Dynamically call methods on the client.
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (!method_exists($this->client, $method)) {
            abort(500, "Method $method does not exist");
        }

        return call_user_func_array([$this->client, $method], $parameters);
    }
}
