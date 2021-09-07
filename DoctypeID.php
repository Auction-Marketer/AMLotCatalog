<?php

namespace AM\LotCatalog;

class DoctypeID extends Record {
    protected $_id;
    protected $_doctype; // TODO implement enum

    /**
     * DoctypeID constructor.
     * @param int $id
     * @param string $doctype
     */
    public function __construct($is_id, $doctype = null)
    {
        if(is_array($is_id) and isset($is_id['id']) and isset($is_id['doctype'])) {
            $doctype = $is_id['doctype'];
            $id = $is_id['id'];
        } else if(is_object($is_id) and isset($is_id->id) and isset($is_id->doctype)) {
            $doctype = $is_id->doctype;
            $id = $is_id->id;
        } else if(!empty($doctype) and (is_string($is_id) or is_integer($is_id))) {
            $id = (int) $is_id;
        } else {
            var_dump($is_id); die;
            // TODO create custom exception and handle it
            throw new \Exception('DoctypeID is incorrect');
        }

        $this->_id = $id;
        $this->_doctype = $doctype;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getDoctype()
    {
        return $this->_doctype;
    }

}