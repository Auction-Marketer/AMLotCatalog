<?php

namespace AM\LotCatalog;

class Finance extends Record {
    protected $_low_estimate;
    protected $_high_estimate;
    protected $_hammer_price;
    protected $_reserve_price;
    protected $_current_bid;
    protected $_starting_price;
    protected $_currency;

    public function __construct($finance)
    {
        $this->_low_estimate    = isset($finance['low_estimate']) ? $finance['low_estimate'] : null;
        $this->_high_estimate   = isset($finance['high_estimate']) ? $finance['high_estimate'] : null;
        $this->_hammer_price    = isset($finance['hammer_price']) ? $finance['hammer_price'] : null;
        $this->_reserve_price   = isset($finance['reserve_price']) ? $finance['reserve_price'] : null;
        $this->_current_bid     = isset($finance['current_bid']) ? $finance['current_bid'] : null;
        $this->_starting_price  = isset($finance['starting_price']) ? $finance['starting_price'] : null;
        $this->_currency    = isset($finance['currency']) ? $finance['currency'] : null;
    }
}