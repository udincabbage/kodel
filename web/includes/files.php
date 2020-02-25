<?php
// include "libs/library.php";
$nopage = "<meta http-equiv='refresh' content='1; url=./404.html'> ";
if(isset($_GET['p'])){
		$page = $_GET['p'];
		switch ($page) {
			 case '' :
                if(!file_exists ('pages/main.php')) die ($nopage);
                include 'pages/main.php';
				break; 
			case 'test':
				include "pages/test.php";
				break;
			case 'table':
                if(!file_exists ('pages/tables.php')) die ($nopage);
				include "pages/tables.php";
				break;
			case 'anggota':
                if(!file_exists ('pages/anggota.php')) die ($nopage);
				include "pages/anggota.php";
				break;
				//end

			default:
				echo $nopage;
				break;
		}
	}else{
		include "pages/main.php";
	}
?>
