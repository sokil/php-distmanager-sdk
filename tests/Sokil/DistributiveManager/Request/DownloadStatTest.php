<?php

namespace Sokil\DistributiveManager\Request;

class DownloadStatTest extends \PHPUnit_Framework_TestCase
{
    public function testGetStat()
    {
        $factory = new \Sokil\DistributiveManager('http://dl.local/');
        $factory
            ->setAppId('5368e18efb5d1b1b2fa3a97d')
            ->setAppKey('awlxWpJ2CiOzorQQYHkx0s3BI4ZjjlnB7yJNq7nk');
        
        /* @var $request \Sokil\DistributiveManager\Request\DownloadStat */
        $request = $factory
            ->createRequest('downloadStat', array('environment_name' => 'windows'));
        
        // prepare response mock
        $responseMock = new \Guzzle\Http\Message\Response(200);
        $responseMock->setBody(json_encode(array(
            'stat'  => array(
                '1399493561' => 20,
                '1399493562' => 8,
            ),
            'total' => 28,
        )));

        $plugin = new \Guzzle\Plugin\Mock\MockPlugin;
        $plugin->addResponse($responseMock);
        $request->addSubscriber($plugin);
        
        // send request
        $response = $request->send();
        
        // check response
        $this->assertEquals(200, $response->getHttpCode());
        
        $this->assertEquals(28, $response->getTotalDownloads());
        
        $this->assertEquals(array(
            '1399493561' => 20,
            '1399493562' => 8,
        ), $response->getStatList());
    }
}

