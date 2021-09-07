<?php

namespace AM\LotCatalog;

class ItemsIterator implements \Iterator {
    private $_position = 0;
    private $_items = array();
    private $_item_class;

    public function __construct($items, $item_class) {
        $this->_position = 0;
        $this->_item_class = is_object($item_class) ? get_class($item_class) : $item_class;

        if(!is_array($items)) {
            $items = array();
        }

        $this->setItems($items);
    }

    public function setItems($items)
    {
        $this->_items = array();

        foreach($items as $item) {
            if($item instanceof $this->_item_class) {
                $this->_items[] = $item;
            } else if(is_array($item)) {
                $this->_items[] = new $this->_item_class($item);
            } else {
                //TODO: Maybe throw an exception?
            }
        }

    }

    public function addItem($item)
    {
        if($item instanceof $this->_item_class) {
            $this->_items[] = $item;
        } else if(is_array($item)) {
            $this->_items[] = new $this->_item_class($item);
        }
    }


    public function rewind() {
        $this->_position = 0;
    }

    public function current() {
        return isset($this->_items[$this->_position]) ? $this->_items[$this->_position] : null;
    }

    public function key() {
        return $this->_position;
    }

    public function next() {
        ++$this->_position;
    }

    public function valid() {
        return isset($this->_items[$this->_position]);
    }
}