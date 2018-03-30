<?php
require 'aws-autoloader.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
use Aws\Sns\SnsClient;

$params = array(
    'credentials' => array(
        'key' => 'AKIAJQZA5K4MPQAQZB5Q',
        'secret' => 'RoDZrVzqRABNY1nAIjf5jG2LoEJq5ym9Jvq2IE7b',
    ),
    'region' => 'us-west-2', // < your aws from SNS Topic region
    'version' => 'latest'
);
$sns = new \Aws\Sns\SnsClient($params);
if(!empty($_GET["phone"]))
    $no=$_GET["phone"];
else
    $no="9796289203";
$args = array(
    "SenderID" => "SMVDSB",
    "SMSType" => "Transactional",
    "Message" => "Hello World! Visit www.organizo.in !",
    "PhoneNumber" => "+91".$no
);

$result = $sns->publish($args);
echo "<pre>";
var_dump($result);
echo "</pre>";
?>
