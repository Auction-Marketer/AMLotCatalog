<?php

namespace AM\LotCatalog;

class FindOneRequest extends Request {
    protected $_doctypeID;
    protected $_method = 'GET'; // TODO enum

    /**
     * FindOneRequest constructor.
     * @param int $_id
     */
    public function __construct($_doctypeID)
    {
        $this->_doctypeID = $_doctypeID;
    }


    public function getUrl() {
        return $this->_doctypeID->getDoctype() . '/' . $this->_doctypeID->getId();
    }
}