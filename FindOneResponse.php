<?php

namespace AM\LotCatalog;

class FindOneResponse extends Response {
    protected $_item;

    protected function setData($data) {
        $this->_item = new LotDocument($data);
    }

    public function getItem()
    {
        return $this->_item;
    }
}