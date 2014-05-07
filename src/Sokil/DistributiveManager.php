<?php

namespace Sokil;

class DistributiveManager extends \Sokil\Rest\Factory
{
    protected $_requestClassNamespace = '\Sokil\DistributiveManager\Request';
    
    private $_appId;
    
    private $_appKey;
    
    private $_token;
    
    public function setAppId($id)
    {
        $this->_appId = $id;
        return $this;
    }
    
    public function setAppKey($key)
    {
        $this->_appKey = $key;
        return $this;
    }
    
    private function _auth()
    {
        /* @var $authRequest \Sokil\DistributiveManager\Request\Auth */
        $authRequest = $this->createRequest('auth');
        $authRequest
            ->setAppId($this->_appId)
            ->setAppKey($this->_appKey);
        
        $this->_token = $authRequest->send()->get('token');
    }
    
    public function isAuthorised()
    {
        return (bool) $this->_token;
    }
    
    /**
     * 
     * @param type $name
     * @param array $urlParameters
     * @return \Sokil\Rest\Request
     */
    public function createRequest($name, array $urlParameters = null)
    {
        $request = parent::createRequest($name, $urlParameters);
        
        // authorise
        if(!$this->isAuthorised() && strtolower($name) !== 'auth') {
            $this->_auth();
        }
        
        // client authorised - set token to request
        $request->setQueryParam('auth_token', $this->_token);
        return $request;
    }
}
