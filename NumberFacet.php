<?php

namespace AM\LotCatalog;

class NumberFacet extends Record {
    protected $_facet_name;
    protected $_facet_value;

    public function __construct($number_facet)
    {
        $this->_facet_name = $number_facet['facet-name'];
        $this->_facet_value = $number_facet['facet-value'];
    }
}