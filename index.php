<?php
require_once('vendor/autoload.php'); 

if(empty($_GET['url'])){
  die('<pre>Usage: ?url=http://intranet.mindef.nl</pre>');
}
     
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

$qrCode = new QrCode($_GET['url']);

$qrCode->setSize(300);

$qrCode->setWriterByName('png');
$qrCode->setMargin(10);
$qrCode->setEncoding('UTF-8');
$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);

// Path to your logo with transparency
$qrCode->setLogoPath(__DIR__."/logo.png");
// Set the size of your logo, default is 48
$qrCode->setLogoSize(50, 100);
$qrCode->setRoundBlockSize(true);
$qrCode->setValidateResult(false);

// Directly output the QR code
header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();
