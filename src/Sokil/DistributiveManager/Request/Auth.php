<?php

namespace Sokil\DistributiveManager\Request;

class Auth extends \Sokil\Rest\Request
{
    protected $_url = '/api/token';
    
    protected $_action = self::ACTION_READ;
    
    public function setAppId($id)
    {
        $this->setQueryParam('app_id', $id);
        return $this;
    }
    
    public function setAppKey($key)
    {
        $this->setQueryParam('app_key', $key);
        return $this;
    }
}

