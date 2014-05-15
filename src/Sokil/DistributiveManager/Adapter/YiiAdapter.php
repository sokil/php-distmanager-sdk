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
    
    public function __set($name, $value)
    {
        $methodName = 'set' . $name;
        if(method_exists($this, $methodName)) {
            call_user_func(array($this, $methodName), $value);
        } else {
            $this->{$name} = $value;
        }
    }
    
    public function setLoggerSection($section = null)
    {
        if($section) {
            $this->setLogger(\Yii::app()->{$section});
        } else {
            $this->removeLogger();
        }
        
        return $this;
    }
}
