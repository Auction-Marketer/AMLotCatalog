<?php

namespace AM\LotCatalog;

class SearchSort extends Record {
    protected $_field;
    protected $_order = 'ASC';

    /**
     * @param string $field
     */
    public function setField($field)
    {
        $this->_field = $field;
        return $this;
    }

    /**
     * @param string $order
     */
    public function setOrder($order)
    {
        $this->_order = strtoupper($order) == 'DESC' ? 'DESC' : 'ASC';
        return $this;
    }

    public function getBody() {
        return [
            "field" => $this->_field,
            "order" => $this->_order
        ];
    }
}