<?php

require_once 'ItemsIterator.php';
require_once 'Record.php';
require_once 'Request.php';
require_once 'Response.php';
require_once 'Aggregation.php';
require_once 'AggregationFacet.php';
require_once 'AggregationNumberFacet.php';
require_once 'AggregationStringFacetValue.php';
require_once 'AggregationStringFacet.php';
require_once 'SearchPaginationResponse.php';
require_once 'SearchResponse.php';
require_once 'FindOneResponse.php';
require_once 'DoctypeID.php';
require_once 'Document.php';
require_once 'Finance.php';
require_once 'FindOneRequest.php';
require_once 'Image.php';
require_once 'LotCatalog.php';
require_once 'AuctionDocument.php';
require_once 'LotDocument.php';
require_once 'NumberFacet.php';
require_once 'Request.php';
require_once 'SearchSort.php';
require_once 'SearchFilter.php';
require_once 'SearchFilterNumberFacet.php';
require_once 'SearchFilterStringFacet.php';
require_once 'SearchRequest.php';
require_once 'StringFacet.php';

spl_autoload_register(function ($class_name) {
    $filename = $class_name . '.php';
    if(file_exists($filename)) {
        echo $filename;
        include $filename;
    }
});