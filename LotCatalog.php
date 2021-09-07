<?php

namespace AM\LotCatalog;

require_once 'autoload.php';

class LotCatalog {
    protected $_endpoint;
    /**
     * LotCatalog constructor.
     * @param $_endpoint
     */
    public function __construct($_endpoint)
    {
        $this->_endpoint = $_endpoint;
    }

    public function findOne($doctypeID) {
        $request = new FindOneRequest($doctypeID);
        $response = $this->executeRequest($request);
        return new FindOneResponse($response);
    }

    public function search($searchRequest) {
        $response = $this->executeRequest($searchRequest);
        return new SearchResponse($response);
    }

    protected function executeRequest($request) {
        $url = $this->_endpoint . $request->getUrl(); // . $request->getCacheSignature();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        if($request->getMethod() === 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request->getBody()));
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Connection: Keep-Alive'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        curl_close ($ch);
        return $this->formatResponse($response);
    }

    protected function formatResponse($response) {
        if(gettype($response) === 'string') {
            $response = json_decode($response, true);
        }
        if(isset($response['success']) and isset($response['data'])) {
            // AWS HTTP Plain integration
            return $response;
        } elseif(isset($response['body'])) {
            // AWS HTTP Lambda integration
            return $response['body'];
        }
    }
}

