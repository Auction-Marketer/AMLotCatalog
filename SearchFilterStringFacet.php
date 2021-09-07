<?php

namespace AM\LotCatalog;

class SearchFilterStringFacet extends SearchFilter {
    protected $_value;
    protected $_type = "string-facet";

    /**
     * @param string|array $value
     */
    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }

    public function getBody()
    {
        return array(
            "type" => $this->_type,
            "facet-name" => $this->_facet_name,
            "value" => $this->_value,
            "global" => $this->_global,
        );
    }
}