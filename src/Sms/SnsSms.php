<?php
namespace rederlo\Sns\Sms;

use Aws\Sns\SnsClient;
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
    public function __construct()
    {
        $this->Sns = new SnsClient([
            'credentials' => [
                'key' => S3_KEY,
                'secret' => S3_SECRET_KEY,
            ],
            'region' => REGION, // < your aws from SNS Topic region
            'version' => 'latest'
        ]);
    }

    public function send($phone, $text)
    {
        $args = [
            "SenderID" => "Sage",
            "SMSType" => "Transactional",
            "Message" => utf8_encode(utf8_decode($text)),
            "PhoneNumber" => $phone
        ];

        $info = $this->Sns->publish($args);
        $response = new HttpResponse();
        $response->setStatusCode((int)$info['@metadata']['statusCode']);
        $response->setContentType($info['@metadata']['headers']['content-type']);
        $response->setContent($info['MessageId']);
        return $response;
    }
}