<?php
//---save variables from form---
$m_name = $_POST['machine']; 		//machine name
$baudrate = $_POST['baudrate']; 	//rs232 baud rate
$bytesize = $_POST['bytesize']; 	//rs232 byte size
$parity = $_POST['parity']; 		//rs232 parity
$stopbits = $_POST['stopbits']; 	//rs232 stopbits
$handshake = $_POST['handshake']; 	//rs232 handshake

echo $m_name . "</br>";
echo $baudrate . "</br>";
echo $bytesize . "</br>";
echo $parity . "</br>";
echo $stopbits . "</br>";
echo $handshake . "</br>";

echo "settings are not active until reloaded on the device";
echo "</br>";
echo "</br>";
echo getcwd();

//---validate form data---
if ($parity == "even"){
	$parity = "E";}

elseif ($parity == "odd"){
	$parity = "O";}

elseif ($parity == "none"){
	$parity = "N";}


//---save data to config file---
$config_f = fopen("/var/www/Pi_web/data/wconfig.txt", "w+");
echo $config_f . "</br>";


$savestring = "[serial]" . PHP_EOL;
fwrite($config_f, $savestring);

$savestring = "port = /dev/ttyUSB0" . PHP_EOL;
fwrite($config_f, $savestring);

$savestring = "baudrate = " . $baudrate . PHP_EOL;
fwrite($config_f, $savestring);

$savestring = "bytesize = " . $bytesize . PHP_EOL;
fwrite($config_f, $savestring);

$savestring = "parity = " . $parity . PHP_EOL;
fwrite($config_f, $savestring);

$savestring = "stopbits = " . $stopbits . PHP_EOL;
fwrite($config_f, $savestring);

$savestring = "handshake = " . $handshake . PHP_EOL;
fwrite($config_f, $savestring);

if ($handshake == "XON/XOFF"){
	$savestring = "xonxoff = True" . PHP_EOL;
	fwrite($config_f, $savestring);}

$savestring = "[machine]" . PHP_EOL;
fwrite($config_f, $savestring);

$savestring = "machine_name = " . $m_name . PHP_EOL;
fwrite($config_f, $savestring);


fclose($config_f);

echo "<script>window.location = '" . $_SERVER['DOCUMENT_ROOT'] . "/Pi_web/index.html'</script>";
?>
