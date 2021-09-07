<?php

namespace AM\LotCatalog;

class LotDocument extends Document {
    protected $_auction_id;
    protected $_finance;
    protected $_auction;

    public function __construct($document) {
        parent::__construct($document);
        $this->_auction_id = $document['auction_id'];
        $this->_finance = new Finance($document['finance']);

        if(isset($document['auction']) and $document['auction']) {
            $this->_auction = new AuctionDocument($document['auction']);
        }
    }
}