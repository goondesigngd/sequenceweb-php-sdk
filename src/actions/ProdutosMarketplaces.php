<?php

namespace Sequencephpsdk\Actions;

class ProdutosMarketplaces {

    private $request;

    public function __construct($url, $token, $lg, $codloja) {
        $this->request = new \Sequencephpsdk\Utils\Request($url, $token, $lg, $codloja);
    }

    public function send($data) {
        return $this->request->execute("produtos-marketplace/receber-de-workers", "PUT", $data);
    }

}
