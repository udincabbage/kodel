<?php

function patah($kata,$jumlah) {
		// $foo = str_repeat($kata,1);
		$kata = wordwrap($kata, $jumlah, '<br />', true);
		return $kata;
}

function patah_paksa($string, $width = 75, $break = "<br/>\n") {
  // split on problem words over the line length
  $pattern = sprintf('/([^ ]{%d,})/', $width);
  $output = '';
  $words = preg_split($pattern, $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

  foreach ($words as $word) {
	  if (false !== strpos($word, ' ')) {
		  // normal behaviour, rebuild the string
		  $output .= $word;
	  } else {
		  // work out how many characters would be on the current line
		  $wrapped = explode($break, wordwrap($output, $width, $break));
		  $count = $width - (strlen(end($wrapped)) % $width);

		  // fill the current line and add a break
		  $output .= substr($word, 0, $count) . $break;

		  // wrap any remaining characters from the problem word
		  $output .= wordwrap(substr($word, $count), $width, $break, true);
	  }
  }

  // wrap the final output
  return wordwrap($output, $width, $break);
}

function antara($str, $startDelimiter, $endDelimiter) {
  $contents = array();
  $startDelimiterLength = strlen($startDelimiter);
  $endDelimiterLength = strlen($startDelimiter);
  $startFrom = $contentStart = $contentEnd = 0;
  while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
    $contentStart += $startDelimiterLength;
    $contentEnd = strpos($str, $startDelimiter, $contentStart);
    if (false === $contentEnd) {
      break;
    }
    $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
    $startFrom = $contentEnd ;
  }

  return $contents;
}

function encD($f1){
	return base64_encode(base64_encode(base64_encode(base64_encode($f1))));
}

function decD($f1){
	return base64_decode(base64_decode(base64_decode(base64_decode($f1))));
}

function get_http_response_code($url) {
  $headers = get_headers($url);
  return substr($headers[0], 9, 3);
}

function generateRandomString($length) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}


# Fungsi untuk membalik tanggal dari format English (Y-m-d) -> Indo (d-m-Y)
function IndonesiaTgl($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl-$bln-$thn";
	return $tanggal;
}

# Fungsi untuk membalik tanggal dari format English (Y-m-d) -> Indo (d-m-Y)
function Indonesia2Tgl($tanggal){
	$namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni",
					 "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");

	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);

	if($bln=="00"){
		return "INVALID";
	}

	$tanggal ="$tgl ".$namaBln[$bln]." $thn";
	return $tanggal;
}


function format_interval(DateInterval $interval) {
	$result = "";

	if ($interval->y) { $result .= $interval->format("%y tahun "); }
	if ($interval->m) { $result .= $interval->format("%m bulan "); }
	if ($interval->d) { $result .= $interval->format("%d hari "); }
	// if ($interval->h) { $result .= $interval->format("%h hours "); }
	// if ($interval->i) { $result .= $interval->format("%i minutes "); }
	// if ($interval->s) { $result .= $interval->format("%s seconds "); }

	return $result;
}

function request_api($url,$jsonDataEncoded){
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  'Content-Type: application/json',
	  'Content-Length: ' . strlen($jsonDataEncoded))
	);
	$result = curl_exec($ch);
	$result_JSON = json_decode($result,true);
	$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	curl_close($ch);
	return $result_JSON;
}

function hash_pass($pass){
	$length = 31;
	// $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $salt="yabscdefhizklmnopqrstu123467805"; //must be the same as all your other files
    // $salt=$randomString; //must be the same as all your other files
	$day =date("d");
    return md5($pass.$salt.$day);
}

function singkat_nama($nama,$jumlahpakai) { 
	$array = explode(" ",$nama); 
	$last_word  = $array[count($array)-1]; 
	if(count($array)>$jumlahpakai) {  
		for ($i = 0; $i < $jumlahpakai; $i++){
		  echo  $array[$i].' ';
		}  
		for ($i = $jumlahpakai; $i < count($array)-1; $i++){
		  echo  substr("$array[$i]",0,1);
	} 
	$belakang = ' '.$last_word;  
	echo $belakang;
	} 
	else 
	{
		echo $nama;
	} 
	return;
}

function status_periode(){
	 $mySql = "SELECT `id`, `tahun`, `semester`, `tanggal_buka`, `tanggal_tutup`, `tanggal_buka2`, `tanggal_tutup2`, `tanggal_buka3`, `tanggal_kunci`, `bisa_upload`, `is_active` FROM `periode` WHERE is_active='Ya' ORDER BY tanggal_buka DESC LIMIT 1";
	  $database = new Database();
	  $db = $database->getConnection();
	  $stmt = $db->prepare($mySql);
	  $stmt->execute();
	  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
			
		$tanggal_buka = $rows['tanggal_buka'];
		$tanggal_tutup =$rows['tanggal_tutup'];
		$tanggal_buka2 =$rows['tanggal_buka2'];
		$tanggal_tutup2 =$rows['tanggal_tutup2'];
		$tanggal_buka3 =$rows['tanggal_buka3'];
		$tanggal_kunci =$rows['tanggal_kunci'];
		 
	   $hareni= date('Y-m-d');  
  if(($hareni >= $tanggal_buka) && ($hareni <= $tanggal_tutup)) {
	  $opsi = "Periode Terbuka";
  }
  else if(($hareni >= $tanggal_buka2) && ($hareni <= $tanggal_tutup2)) {
	  $opsi = "Periode Terbuka";
  }
  else if(($hareni >= $tanggal_buka3) && ($hareni <= $tanggal_kunci)) {
	  $opsi = "Periode Terbuka";
  } 
  else if($hareni > $tanggal_kunci) {
	  $opsi = "Periode Ditutup";
  } 
  else $opsi = "Periode Tertutup"; 
  return $opsi;
} 
	  
?>
