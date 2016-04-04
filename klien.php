<?php

$wsdl="http://localhost/latihan/ws0?wsdl";
$client2 = new SoapClient ( $wsdl, array('cache_wsdl' => WSDL_CACHE_NONE, 'trace'=>1) );


//var_dump($client2->__getFunctions());
//var_dump($client2->__getTypes());
//PERHATIKAN WSDL !!!

//eksekusi servis ke-1
$return = $client2->hello('rambo sopan');
echo '<p>';
echo $return;
echo '</p>';

//eksekusi servis ke-2
$return2 = $client2->cekBarang('MG1122');
echo '<p>';
echo 'jumlah barang='.$return2;
echo '</p>';

//eksekusi servis ke-3
//document literal style
//2 input dikirim dalam 1 objek, return 1 output
$nilai=array('prm1'=>10, 'prm2'=>29);
$return3 = $client2->tambah($nilai);
echo '<p>';
echo 'hasil tambah='.$return3;
echo '</p>';

//eksekusi servis ke-4
//0 input dikirim, return 1 objek didalamnya ada 3 output

$nama = $_POST['nama'];
$npm = $_POST['npm'];
$agama = $_POST['agama'];
$kelahiran = $_POST['kelahiran'];
//eksekusi servis ke-1
$input=array('nama'=>$nama,'npm'=>$npm, 'agama'=>$agama,'kelahiran'=>$kelahiran);
echo '<p>';
echo $client2->setInfo($input);
echo '</p>';



//eksekusi servis ke-5
$data=array('nama'=>'Iwan','npm'=>'45676','sks'=>9);
echo '<p>';
echo $client2->setMhs($data);
echo '</p>';

//echo '<br>'.'--------------------'.'<br>';
//var_dump($client2->__getLastResponse());
echo '<br>'.'--------------------'.'<br>';
echo "Response :<br>", htmlentities($client2->__getLastResponse()), "<br>";
?>