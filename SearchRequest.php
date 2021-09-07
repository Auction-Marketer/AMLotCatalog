<?php

namespace AM\LotCatalog;

class SearchRequest extends Request {
    protected $_method = 'POST';
    protected $_query = '';
    protected $_page = 1;
    protected $_per_page = 25;
    protected $_filters = [];
    protected $_sort = [];
    protected $_doctype = '';
    protected $_search_filters = null;

    /**
     * SearchRequest constructor.
     * @param string $doctype
     * @param array $filters
     */
    public function __construct($doctype, $filters = [], $sort = [])
    {
        $this->_doctype = $doctype;
        $this->_filters = $filters;
        $this->_sort = $sort;
    }

    public function addFilter($filter) {
        if(!$filter instanceof SearchFilter) {
            throw new \Exception("Filter should be instance of AM\LotCatalog\SearchFilter");
        }
        $this->_filters[] = $filter;
    }

    public function setFilters($filters) {
        foreach($filters as $filter) {
            if (!$filter instanceof SearchFilter) {
                throw new \Exception("Filter should be instance of AM\LotCatalog\SearchFilter");
            }
        }
        $this->_filters = $filters;
    }

    public function addSort($sort) {
        if(!$sort instanceof SearchSort) {
            throw new \Exception("Sort should be instance of AM\LotCatalog\SearchSort");
        }
        $this->_sort[] = $sort;
    }

    public function setSort($sorts) {
        foreach($sorts as $sort) {
            if (!$sort instanceof SearchSort) {
                throw new \Exception("Sort should be instance of AM\LotCatalog\SearchSort");
            }
        }
        $this->_sort= $sorts;
    }

    public function getUrl() {
        return $this->_doctype . '/_search';
    }

    public function getBody()
    {
        return [
            'query' => $this->_query,
            'page' => $this->_page,
            'per_page' => $this->_per_page,
            'filters' => array_map(function($filter) {
                return $filter->getBody();
            }, $this->_filters),
            'sort' => array_map(function($sort) {
                return $sort->getBody();
            }, $this->_sort)
        ];
    }

    /**
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->_query = $query;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->_page = $page;
    }

    /**
     * @param int $per_page
     */
    public function setPerPage($per_page)
    {
        $this->_per_page = $per_page;
    }
}