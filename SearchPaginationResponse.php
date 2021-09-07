<?php

namespace AM\LotCatalog;

class SearchPaginationResponse extends Record {
    protected $_page;
    protected $_per_page;
    protected $_total_records;
    protected $_total_pages;

    public function __construct($data) {
        $this->_page = $data['page'];
        $this->_per_page = $data['per_page'];
        $this->_total_records = $data['total_records'];
        $this->_total_pages = $data['total_pages'];
    }
}