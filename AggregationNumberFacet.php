<?php

namespace AM\LotCatalog;

class AggregationNumberFacet extends AggregationFacet {
    protected $_min;
    protected $_max;

    public function __construct($number_facet)
    {
        parent::__construct($number_facet);
        $this->_min = isset($number_facet['min']) ? $number_facet['min'] : null;
        $this->_max = isset($number_facet['max']) ? $number_facet['max'] : null;
    }
}