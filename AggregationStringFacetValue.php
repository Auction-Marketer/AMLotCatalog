<?php

namespace AM\LotCatalog;

class AggregationStringFacetValue extends Record {
    protected $_key;
    protected $_doc_count;

    public function __construct($facet_value)
    {
        $this->_key = $facet_value['key'];
        $this->_doc_count = isset($facet_value['doc_count']) ? $facet_value['doc_count'] : null;
    }
}