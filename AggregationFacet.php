<?php

namespace AM\LotCatalog;

abstract class AggregationFacet extends Record {
    protected $_key;
    protected $_doc_count;

    public function __construct($facet)
    {
        $this->_key = $facet['key'];
        $this->_doc_count = isset($number_facet['doc_count']) ? $number_facet['doc_count'] : null;
    }
}