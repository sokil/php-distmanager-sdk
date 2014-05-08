<?php

namespace Sokil\DistributiveManager\Response;

class DownloadStat extends \Sokil\Rest\Response
{
    public function getStatList()
    {
        return $this->get('stat');
    }
    
    public function getEnvironmentStat($environmentName)
    {
        return $this->get('stat.' . $environmentName);
    }
    
    public function getTotalDownloads()
    {
        return $this->get('total');
    }
}

