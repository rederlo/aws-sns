# My project's README
=======

use Aws\Sns\SnsClient;
use rederlo\Sns\Sms\SnsSms;

$sns = new SnsClient([
    'credentials' => [
        'key' => S3_KEY,
        'secret' => S3_SECRET_KEY,
    ],
    'region' => REGION, // < your aws from SNS Topic region
    'version' => 'latest'
]);


$args = [
    "SenderID" => "",
    "SMSType" => "Transactional",
    "Message" => utf8_encode(utf8_decode("teste")),
    "PhoneNumber" => "+55phone"
];

$sms = new SnsSms($sns);
$sms->send($args);