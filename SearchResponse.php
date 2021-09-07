<?php

namespace AM\LotCatalog;

class SearchResponse extends Response {
    protected $_pagination;
    protected $_items;
    protected $_aggregations;

    protected function setData($data) {
        $this->setPagination($data['pagination']);
        $this->setItems($data['items']);
        $this->setAggregations($data['aggregations']);
    }

    protected function setPagination($pagination) {
        $this->_pagination = new SearchPaginationResponse($pagination);
    }

    protected function setItems($items) {
        $itemClass = null;
        if(isset($items[0])) {
            switch ($items[0]['doctypeID']['doctype']) {
                case 'lot':
                    $itemClass = LotDocument::class;
                    break;
                case 'auction':
                    $itemClass = AuctionDocument::class;
                    break;
                default:
                    $itemClass = LotDocument::class;
                    break;
            }
        }
        $this->_items = new ItemsIterator($items, $itemClass);
    }

    protected function setAggregations($aggregations) {
        $this->_aggregations = new Aggregation($aggregations);
    }

    public function getItems()
    {
        return $this->_items;
    }

    public function getPagination()
    {
        return $this->_pagination;
    }

    public function getAggregations()
    {
        return $this->_aggregations;
    }
}