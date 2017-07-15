<?php
/**
 * Created by PhpStorm.
 * User: ederl
 * Date: 22/06/2017
 * Time: 18:45
 */

namespace SnsTest;


use rederlo\Sns\Sms\SnsSms;

class SnsSmsTest extends \PHPUnit_Framework_TestCase
{
    public function testSend()
    {
        $sms = new SnsSms();
        $result = $sms->send("+5541998274011", "TESTE");
        $this->assertEquals(200, $result->getStatusCode());
        echo $result->getContent();
    }
}
