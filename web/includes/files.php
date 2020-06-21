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
			case 'kegiatan':
                if(!file_exists ('pages/kegiatan.php')) die ($nopage);
				include "pages/kegiatan.php";
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
		case 'valpendidikan':
        		if(!file_exists ('pages/admin/validasi/valpendidikan.php')) die ($nopage);
				include "pages/admin/validasi/valpendidikan.php";
				break;
		case 'valketerampilan':
        		if(!file_exists ('pages/admin/validasi/valketerampilan.php')) die ($nopage);
				include "pages/admin/validasi/valketerampilan.php";
				break;
		case 'valpengalaman':
        		if(!file_exists ('pages/admin/validasi/valpengalaman.php')) die ($nopage);
				include "pages/admin/validasi/valpengalaman.php";
				break;
		case 'valkegiatan':
        		if(!file_exists ('pages/admin/validasi/valkegiatan.php')) die ($nopage);
				include "pages/admin/validasi/valkegiatan.php";
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

		case 'guesttestertulis':
        if(!file_exists ('pages/guest/guesttestertulis.php')) die ($nopage);
				include "pages/guest/guesttestertulis.php";
				break;

		case 'guesttestertulisselesai':
				if(!file_exists ('pages/guest/guesttestertulisselesai.php')) die ($nopage);
				include "pages/guest/guesttestertulisselesai.php";
				break;


		//ampun anggota

		case 'member':
        if(!file_exists ('pages/member/awal.php')) die ($nopage);
				include "pages/member/awal.php";
				break;

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
		case 'kegiatanku':
			if(!file_exists ('pages/member/kegiatan.php')) die ($nopage);
			include "pages/member/kegiatan.php";
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
