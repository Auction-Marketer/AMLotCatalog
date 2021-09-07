<?php

namespace AM\LotCatalog;

abstract class Document extends Record {
    protected $_doctypeID;
    protected $_name;
    protected $_data;
    protected $_images;
    protected $_string_facets;
    protected $_number_facets;

    public function __construct($document) {
        $this->_doctypeID = new DoctypeID($document['doctypeID']);
        $this->_name = $document['name'];
        $this->_data = $document['data'];
        $this->_images = new ItemsIterator(isset($document['images']) ? $document['images'] : [], Image::class);
        $this->_string_facets = new ItemsIterator(isset($document['string-facets']) ? $document['string-facets'] : [], StringFacet::class);
        $this->_number_facets = new ItemsIterator(isset($document['number-facets']) ? $document['number-facets'] : [], NumberFacet::class);
    }
}