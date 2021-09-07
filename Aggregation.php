<?php

namespace AM\LotCatalog;

use SendGrid\Exception;

class Aggregation extends Record {
    protected $_string_facets;
    protected $_number_facets;

    public function __construct($aggregation)
    {
        $this->_string_facets = new ItemsIterator($aggregation['string-facets'], AggregationStringFacet::class);
        $this->_number_facets = new ItemsIterator($aggregation['number-facets'], AggregationNumberFacet::class);
    }

    public function facetLookup($facet_type, $facet_name) {
        $facet_type = '_' . str_replace('-', '_', $facet_type);

        if(!property_exists($this, $facet_type)) {
            throw new Exception('Property "'. $facet_type .'" not exist on the ' . self::class. ' object');
        }

        foreach($this->$facet_type as $facet) {
            if ($facet->key == $facet_name) {
                return $facet;
            }
        }

        return false;
    }
}