<?php

namespace SequencePhpSdk\Action;

class WorkerProdutosMarketplaces {

    private $request;

    public function __construct($url, $token, $lg, $codloja) {
        $this->request = new SequencePhpSdk\Util\Request($url, $token, $lg, $codloja);
    }

    public function send($data) {
        return $this->request->execute("worker-produtos-marketplace/receber-lote", "POST", $data);
    }

}
