<?php

namespace AM\LotCatalog;

class Image extends Record {
    protected $_path;
    protected $_title;

    public function __construct($image)
    {
        $this->_path = $image['path'];
        $this->_title = $image['title'];
    }
}