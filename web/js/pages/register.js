$(document).ready(function(){


	setCookie("jwt", "", 1);

	var min=5;
	var max=9;
	var jumlah = Math.round(Math.random() * (+max - +min) + +min);

	min=1;
	max=4;
	var pengurang = Math.round(Math.random() * (+max - +min) + +min);
	var angka = jumlah - pengurang;

	document.getElementById("jumlahan").innerHTML = angka+" + "+pengurang+" = ?";

  $(document).on('submit', '#sign_up', function(){
		var hasil = document.getElementById("hasil").value;


		if (hasil==jumlah) {
      var password = document.getElementById("password").value;
      var repeatPassword = document.getElementById("repeatPassword").value;

      if(password==repeatPassword){
        var sign_up=$(this);
        var form_data=JSON.stringify(sign_up.serializeObject());
        $.ajax({
        	url: API_URL+"pengguna/register.php",
        	type : "POST",
        	contentType : 'application/json',
        	data : form_data,
        	success : function(result){

        		if(result.message=="Pendaftaran berhasil"){
        			// setCookie("jwt", result.jwt, 1);
               window.location.replace("login.php");
              bootbox.alert(result.message);
              
        		}else{
              bootbox.alert(result.message);
        		}

        	},
        	error: function(xhr, resp, text){
            bootbox.alert(text);
        		console.log(xhr);

        	}
        });

      }else{
        bootbox.alert("Password tidak sesuai");
      }
		}
		else {
      bootbox.alert("Penjumlahan tidak sesuai");
			return false;
		}

		return false;
	});

});
