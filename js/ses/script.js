$(document).ready(function () {

	$(".menu2  ul  li").mouseout(function(){
		$("a",this).css("color","#344C0E");
		$("> ul",this).css("display","none");
	});

	$(".menu2  ul  li").mouseover(function(){

		$("a",this).css("color","#990066");
		$("> ul",this).css("display","block");
	});


	$(".menu2 ul li").mouseout(function(){
		$(this).css("background-color","#C6E2FF");
	});

	$(".menu2 ul li").mouseover(function(){
		$(this).css("background-color","#FFDAB9");
	});

	$(".menu1  ul  li").mouseout(function(){
		$("a",this).css("color","#344C0E");
	});

	$(".menu1  ul  li").mouseover(function(){

		$("a",this).css("color","#990066");
	});
});

function Validacija()
{
	var ime = $('#form input[name=ime]').val();
	var prezime = $('#form input[name=prezime]').val();
	var email = $('#form input[name=email]').val();
	var username = $('#form input[name=username]').val();
	var password = $('#form input[name=password]').val();
	var message = "";
	if (ime.length == 0) {
		message = message + "Molimo Vas popunite polje za ime!<br/>";
	}
	if (prezime.length == 0) {
		message = message + "Molimo Vas popunite polje za prezime!<br/>";
	}
	var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!mailformat.test(email)){
		message = message + "Molimo Vas popunite polje za email ispravno!<br/>";
	}
	if (username.length < 4 || username.length > 15) {
		message = message + "Molimo Vas popunite polje za Korisnicko ime!Korisnicko ime mora sadrzati najmanje 4 karaktera a najvise 15 karaktera!<br/>";
	}
	if (password.length < 4 || password.length > 15) {
		message = message + "Molimo Vas popunite polje za Sifru!Sifra mora sadrzati najmanje 4 karaktera a najvise 15 karaktera!<br/>";
	}
	if (message.length==0) {
		return true;
	}
	$("#obavestenje").html("<label style='color:red;'>" + message + '</label>');
	return false;
}

function ObrisiProizvod(id_proizvoda)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  	xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  	if (xmlhttp.readyState==4 && xmlhttp.status==200)
  	{
  		odgovor = xmlhttp.responseText;
  		odgovor = odgovor.trim();
  		if(odgovor=="true")
  		{
  			UspesnoObrisan(id_proizvoda);
  		}else{
  			$("#obavestenje").html("<label style='color:red;'>" + xmlhttp.responseText + '</label>');
  		}

  	}
  }
  $("#obavestenje").html("<label style='color:blue;'>Molomo vas sacekajte...</label>");
  xmlhttp.open("GET","../../Obrisi/index.php?id=" + id_proizvoda,true);
  xmlhttp.send();
}
function UspesnoObrisan(id_proizvoda)
{
	$("#proizvod"+id_proizvoda).css("display","none");
	$("#obavestenje").html("<label style='color:green;'>Uspesno ste obrisali proizvod sa ID = " + id_proizvoda + '</label>');
}

function loadDoc(url, cfunc) {
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      cfunc(xhttp);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function myFunction(xhttp) {
  document.getElementById("demo").innerHTML = xhttp.responseText;
}
