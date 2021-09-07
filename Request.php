<?php

namespace AM\LotCatalog;

abstract class Request {
    protected $_method = 'GET'; // TODO enum
    protected $_useCache = true;

    /**
     * @return bool
     */
    public function isUseCache()
    {
        return $this->_useCache;
    }

    /**
     * @param bool $useCache
     */
    public function setUseCache($useCache)
    {
        $this->_useCache = $useCache;
    }

    public function getCacheSignature() {
        return $this->_useCache ? '/' . sha1($this->getMethod() . $this->getUrl() . json_encode($this->getBody())) : null;
    }

    abstract function getUrl();

    public function getBody() {
        return null;
    }

    public function getMethod()
    {
        return strtoupper($this->_method);
    }
}