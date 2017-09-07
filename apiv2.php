<?php 

/*
	Waktu Solat API v2 created by Afif Zafri
	XML data are fetch directly from JAKIM e-solat website
	This new version will be able to fetch prayer time data for the whole Year or by each month for chosen Zone
*/

if(isset($_GET['zon']) && isset($_GET['tahun']) && isset($_GET['bulan']))
{
	$kodzon = $_GET['zon']; # store get parameter in variable
	$tahun = $_GET['tahun'];
	$bulan = $_GET['bulan'];

	$url = "http://www.e-solat.gov.my/web/muatturun.php?zone=".$kodzon."&jenis=year&lang=en&year=".$tahun."&bulan=".$bulan;
	
	# use cURL to fetch webpage
    $ch = curl_init(); # initialize curl object
    curl_setopt($ch, CURLOPT_URL, $url); # set url
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); # receive server response
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); # do not verify SSL
    $data = curl_exec($ch); # execute curl, fetch webpage content
    echo curl_error($ch);
    $httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE); # receive http response status
    curl_close($ch);  # close curl

    print_r($data);
}
?>