<?php

class MyWs{
	function hello($nama) {
		return "Hello, selamat datang " . $nama;
	}
	
	function cekBarang($kdBarang){
		switch ($kdBarang) {
			case 'MG1111' :
				$jumlah = 10;
				break;
			case 'MG1122' :
				$jumlah = 2220;
				break;
			case 'MG007' :
				$jumlah = 1;
				break;
			default :
				$jumlah = 0;
				break;
		}
		
		return $jumlah;
	}
	
	//document literal, not rpc
	function tambah($prm){
		$prm1=$prm->prm1;
		$prm2=$prm->prm2;
		
		return $prm1 + $prm2;	
	}
	
	function info(){
		$re->nama='budi';
		$re->npm='44445';
		$re->agama='islam';
						
		return $re;		
	}
	
	function setMhs($data){
		$nama=$data->nama;
		$npm=$data->npm;
		$sks=$data->sks;
		
		return 'selamat Anda telah terdaftar: '.$nama.' dan jml sks='.$sks;
	}
	
	function setInfo($input){
        $nama=$input->nama;
        $npm=$input->npm;
        $agama=$input->agama;
        $kelahiran=$input->kelahiran;
		$selisih=(20-(2016-$kelahiran));
         if (2016 - $kelahiran > 19){
          return 'selamat umur anda mencukupi';
         }else{
          return 'maaf, umur anda tidak mencukupi, anda perlu ' .$selisih. 'tahun lagi untuk memenuhi persyaratan';
         }
         
       }
	
}
	
//ini_set("soap.wsdl_cache_enabled", 0);

$server = new SoapServer("brosur_0.wsdl");
$server->setClass("MyWs");
$server->handle();

?>
