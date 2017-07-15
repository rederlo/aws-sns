<?php
namespace rederlo\Sns\Sms;

use rederlo\Sns\Http\HttpResponse;

/**
 * Class SnsSms
 * @package rederlo\Sns\Sms
 */
class SnsSms
{
    /**
     * @var SnsClient
     */
    private $Sns;

    /**
     *
     */
    public function __construct(\Aws\Sns\SnsClient $sns)
    {
        $this->Sns = $sns;
    }

    public function send(array $args)
    {
        $info = $this->Sns->publish($args);
        $response = new HttpResponse();
        $response->setStatusCode((int)$info['@metadata']['statusCode']);
        $response->setContentType($info['@metadata']['headers']['content-type']);
        $response->setContent($info['MessageId']);
        return $response;
    }
}