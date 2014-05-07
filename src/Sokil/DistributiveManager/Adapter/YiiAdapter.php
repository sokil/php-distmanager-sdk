<?php

namespace Sokil\DistributiveManager\Adapter;

class YiiAdapter extends \Sokil\DistributiveManager implements \IApplicationComponent
{
    private $_initialized = false;
    
    public function init()
    {
        $this->_initialized = true;
    }
    
    public function getIsInitialized()
    {
        return $this->_initialized == true;
    }
}
