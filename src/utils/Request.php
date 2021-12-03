<?php

namespace Sequencephpsdk\Utils;

use GuzzleHttp\Client;

class Request {

    private $client;
    private $token;
    private $lg;
    private $codloja;

    public function __construct($url, $token, $lg, $codloja) {
        $this->client = new Client(['base_uri' => $url]);
        $this->token = $token;
        $this->lg = $lg;
        $this->codloja = $codloja;
    }

    public function execute($resource, $method = "GET", $data = null) {
        if ($method == "GET") {
            $result = $this->client->request($method, $resource, $this->getRequestOptions([]));
            return json_decode($result->getBody()->getContents());
        } else {
            $result = $this->client->request($method, $resource, $this->getRequestOptions($data));
            return json_decode($result->getBody()->getContents());
        }
    }

    private function getRequestOptions($data) {
        $options["form_params"] = $data;
        $options["headers"]["token"] = $this->token;
        $options["headers"]["lg"] = $this->lg;
        $options["headers"]["codloja"] = $this->codloja;
        return $options;
    }

}
