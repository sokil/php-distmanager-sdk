<?php

namespace Sokil\DistributiveManager\Request;

/**
 * @method \Sokil\DistributiveManager\Response\DownloadStat send()
 */
class DownloadStat extends \Sokil\Rest\Client\Request
{
    const GROUP_HOUR    = 'group';
    const GROUP_DAY     = 'day';
    const GROUP_WEEK    = 'week';
    const GROUP_MONTH   = 'month';
    
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
    
    public function groupByHour()
    {
        $this->setQueryParam('group', self::GROUP_HOUR);
        return $this;
    }
    
    public function groupByDay()
    {
        $this->setQueryParam('group', self::GROUP_DAY);
        return $this;
    }
    
    public function groupByWeek()
    {
        $this->setQueryParam('group', self::GROUP_WEEK);
        return $this;
    }
    
    public function groupByMonth()
    {
        $this->setQueryParam('group', self::GROUP_MONTH);
        return $this;
    }
}

