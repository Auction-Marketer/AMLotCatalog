<?php

namespace AM\LotCatalog;

abstract class SearchFilter extends Record {
    protected $_type;
    protected $_facet_name;
    protected $_global = false;

    protected $_type_allowed = ["number-facet", "string-facet"];

    /**
     * @param string $type
     */
    public function setType($type)
    {
        if(!in_array($type, $this->_type_allowed)) {
            throw new \Exception('Filter Type [' . $type . '] is not supported');
        }

        $this->_type = $type;
        return $this;
    }

    /**
     * @param string $facet_name
     */
    public function setFacetName($facet_name)
    {
        $this->_facet_name = $facet_name;
        return $this;
    }

    /**
     * @param boolean $global
     */
    public function setGlobal($global)
    {
        $this->_global = $global;
        return $this;
    }

    public abstract function getBody();
}