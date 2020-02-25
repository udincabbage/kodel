  var jwt = getCookie('jwt');
  $.post(API_URL+"pengguna/validate-token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
    console.log(result);
    if(result.data.level!=1){
      window.location.replace("unauthorized");
    }
    // jenis_akun.innerText = "Admin";
    // nama_pengguna.innerText = result.data.nama_lengkap;
    // $("#img_account").attr("src","http://singkron.lldikti11.or.id/Uploads/avas/"+result.data.avatar);
  })

  // on error/fail, tell the user he needs to login to show the account page
  .fail(function(result){
    console.log(result);
    // alert('silahkan login terlebih dahulu');
    window.location.replace("pages/account/login.php");
  });
