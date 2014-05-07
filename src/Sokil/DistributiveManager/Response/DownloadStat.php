<?php

namespace Sokil\DistributiveManager\Response;

class DownloadStat extends \Sokil\Rest\Response
{
    public function getStatList()
    {
        return $this->get('stat');
    }
    
    public function getTotalDownloads()
    {
        return $this->get('total');
    }
}

