<?php
//
//
//
// // file name
// $filename = $_FILES['file']['name'];
//
// // Location
// $location = 'uploads/avatar/'.$filename;
//
// // file extension
// $file_extension = pathinfo($location, PATHINFO_EXTENSION);
// $file_extension = strtolower($file_extension);
//
// // Valid image extensions
// $image_ext = array("jpg","png","jpeg","gif");
//
// $response = 0;
// if(in_array($file_extension,$image_ext)){
// 	// Upload file
// 	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
// 		$response = $location;
// 	}
// }
//
// echo $response;

include "../includes/lib.php";
include "../includes/conf.php";

foreach ($_POST as $key => $value) {
    echo "<script>console.log(\"Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>\")</script>";

}

$id = $_POST['id'];
// $current_foto = $_POST['current_foto'];
$tmpFilePath = $_FILES['file'.$id]['tmp_name'];
if($tmpFilePath != ""){
	$output=1;
	$dirr = "../uploads/avatar/";
	// $dirr = "ftp://singkronlldikti1:jukung hab4ng Teknobar@@singkron.lldikti11.or.id/public_html/uploads_pt/".$id_universitas."/";
	if ( !is_dir( $dirr ) ) {
		mkdir($dirr, 0755, True);
	}

	$file_name_only = 'avatar-'.generateRandomString(5).'.jpg';
	$file_name = $dirr.$file_name_only;
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
		$dest = fopen($file_name, "wb");
		$src = file_get_contents($_FILES["file"]["tmp_name"]);
		fwrite($dest, $src, strlen($src));
		fclose($dest);

		$mySql = "UPDATE  `anggota` SET `foto`=? WHERE id=? ";
    $database = new Database();
    $db = $database->getConnection();
    $stmt = $db->prepare($mySql);
    $stmt->bindParam(1, $file_name_only);
    $stmt->bindParam(2, $id);
    $stmt->execute();
		$output = 0;
	}else{
		$output = 1;
		//gagal post;
	}
	//
	if(!empty($current_logo))
		unlink($dirr.$current_logo);
}
?>
<script language="javascript" type="text/javascript">
// console.log(<?php echo $output; ?>);
window.top.window.stopUpload(<?php echo $output; ?>,<?php echo $id ?>);
</script>
