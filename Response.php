<?php

namespace AM\LotCatalog;

abstract class Response extends Record {
    protected $_success;
    protected $_dataType;
    protected $_data;

    public function __construct($response_data) {
        if(gettype($response_data) === 'string') {
            $response_data = json_decode($response_data, true);
        }
        try {
            if(!isset($response_data['success']) or $response_data['success'] == false) {
                throw new \Exception('No results found');
            }
            $this->setDataType($response_data['dataType']);
            $this->setSuccess($response_data['success']);
            $this->setData($response_data['data']);
        } catch (\Exception $e) {
            $this->setSuccess(false);
        }
    }

    abstract protected function setData($data);

    /**
     * @param mixed $success
     */
    protected function setSuccess($success)
    {
        $this->_success = $success;
    }

    /**
     * @param mixed $dataType
     */
    protected function setDataType($dataType)
    {
        $this->_dataType = $dataType;
    }

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return !!$this->_success;
    }

}