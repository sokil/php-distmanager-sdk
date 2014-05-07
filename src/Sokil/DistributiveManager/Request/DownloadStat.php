<?php

namespace Sokil\DistributiveManager\Request;

/**
 * @method \Sokil\DistributiveManager\Response\DownloadStat send()
 */
class DownloadStat extends \Sokil\Rest\Request
{
    protected $_url = '/api/stat/download/{environment_name}';
    
    protected $_action = self::ACTION_READ;
    
    protected $_responseClassName = '\Sokil\DistributiveManager\Response\DownloadStat';
    
    /**
     * Confect datetime in different format to timestamp in 
     * @param type $time
     * @return type
     * @throws \Exception
     */
    private function _timeToTimestamp($time)
    {
        if(is_numeric($time)) {
            return $time;
        }
        
        $time = strtotime($time);
        if(!$time) {
            throw new \Exception('Wrong time format');
        }
        
        return $time;
    }
    
    public function setTimeFrom($time)
    {
        $this->setQueryParam('time_from', $this->_timeToTimestamp($time));
        return $this;
    }
    
    public function setTimeTo($time)
    {
        $this->setQueryParam('time_to', $this->_timeToTimestamp($time));
        return $this;
    }
}

