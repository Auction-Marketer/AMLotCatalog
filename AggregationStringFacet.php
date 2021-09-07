<?php

namespace AM\LotCatalog;

class AggregationStringFacet extends AggregationFacet {
    protected $_key;
    protected $_doc_count;
    protected $_facet_value;

    public function __construct($string_facet)
    {
        parent::__construct($string_facet);
        $this->_facet_value = new ItemsIterator($string_facet['facet-value'], AggregationStringFacetValue::class);
    }
}