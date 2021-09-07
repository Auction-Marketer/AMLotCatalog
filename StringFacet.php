<?php

namespace AM\LotCatalog;

class StringFacet extends Record {
    protected $_facet_name;
    protected $_facet_value;

    public function __construct($string_facet)
    {
        $this->_facet_name = $string_facet['facet-name'];
        $this->_facet_value = $string_facet['facet-value'];
    }
}