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
			case 'unauthorized':
				if(!file_exists ('pages/503.php')) die ($nopage);
				include "pages/503.php";
				break;
			case 'table':
                if(!file_exists ('pages/tables.php')) die ($nopage);
				include "pages/tables.php";
				break;
			case 'anggota':
                if(!file_exists ('pages/anggota.php')) die ($nopage);
				include "pages/anggota.php";
				break;
			case 'pendidikan':
                if(!file_exists ('pages/pendidikan.php')) die ($nopage);
				include "pages/pendidikan.php";
				break;
			case 'anggotadetail':
                if(!file_exists ('pages/det_anggota.php')) die ($nopage);
				include "pages/det_anggota.php";
				break;
			case 'pengalaman':
                if(!file_exists ('pages/pengalaman.php')) die ($nopage);
				include "pages/pengalaman.php";
				break;
			case 'kategorisoal':
                if(!file_exists ('pages/kategorisoal.php')) die ($nopage);
				include "pages/kategorisoal.php";
				break;
			case 'kategoriwawancara':
                if(!file_exists ('pages/kategoriwawancara.php')) die ($nopage);
				include "pages/kategoriwawancara.php";
				break;
			case 'kategoriberita':
                if(!file_exists ('pages/kategoriberita.php')) die ($nopage);
				include "pages/kategoriberita.php";
				break;
			case 'keterampilan':
                if(!file_exists ('pages/keterampilan.php')) die ($nopage);
				include "pages/keterampilan.php";
				break;
		case 'soal':
                if(!file_exists ('pages/soal.php')) die ($nopage);
				include "pages/soal.php";
				break;
		case 'wawancara':
                if(!file_exists ('pages/wawancara.php')) die ($nopage);
				include "pages/wawancara.php";
		case 'tertulis':
                if(!file_exists ('pages/tertulis.php')) die ($nopage);
				include "pages/tertulis.php";
				break;

		case 'valpenerimaanview':
        		if(!file_exists ('pages/admin/validasi/valpenerimaanview.php')) die ($nopage);
				include "pages/admin/validasi/valpenerimaanview.php";
				break;	
			
			//ampun guest	
		case 'permohonan':
        if(!file_exists ('pages/guest/permohonan.php')) die ($nopage);
				include "pages/guest/permohonan.php";
				break;

		case 'kaderisasi':
        if(!file_exists ('pages/guest/awal.php')) die ($nopage);
				include "pages/guest/awal.php";
				break;

		//ampun anggota
				
		case 'detailkader':
        if(!file_exists ('pages/member/det_saya.php')) die ($nopage);
				include "pages/member/det_saya.php";
				break;
				
		case 'anggotaview':
        if(!file_exists ('pages/member/anggota_view.php')) die ($nopage);
				include "pages/member/anggota_view.php";
				break;
		case 'pendidikanku':
			if(!file_exists ('pages/member/pendidikan.php')) die ($nopage);
			include "pages/member/pendidikan.php";
			break;
		case 'keterampilanku':
			if(!file_exists ('pages/member/keterampilan.php')) die ($nopage);
			include "pages/member/keterampilan.php";
			break;
		case 'pengalamanku':
			if(!file_exists ('pages/member/pengalaman.php')) die ($nopage);
			include "pages/member/pengalaman.php";
			break;
		
		
				//end

			default:
				echo $nopage;
				break;
		}
	}else{
		include "pages/anggota.php";
	}
?>
