<?php

namespace AM\LotCatalog;

class SearchFilterNumberFacet extends SearchFilter {
    protected $_type = "number-facet";
    protected $_compare_method; // lt, lte, gt, gte, eq
    protected $_value;

    protected $_compare_method_allowed = ['min', 'min_eq', 'max', 'max_eq', 'eq'];

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * @param string $compare_method
     */
    public function setCompareMethod($compare_method)
    {
        if(!in_array($compare_method, $this->_compare_method_allowed)) {
            throw new \Exception('Compare Method [' . $compare_method . '] is not supported');
        }

        $this->_compare_method = $compare_method;
        return $this;
    }

    public function getBody()
    {
        return array(
            "type" => $this->_type,
            "facet-name" => $this->_facet_name,
            "compare-method" => $this->_compare_method,
            "global" => $this->_global,
            "value" => $this->_value
        );
    }
}