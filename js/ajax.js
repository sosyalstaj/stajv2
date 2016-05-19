$("#yetki").change(function(){
		var cb = document.getElementById("yetki");
		var rol = cb.options[cb.selectedIndex].value;
		console.log(yetki);
		$.ajax({
		type:"POST", 
		url:"process.php?islem=uyeol",
		data:{rol:rol},
		datatype:"html", 
		beforeSend : function(){ $("#secilenRol").html("Yükleniyor.."); },
		success :function(cevap){ $("#secilenRol").html(cevap);dom();},
		error: function(){ alert("hata oluştu "); }
	});
});



var dom =function()
{
	$("#il-sec").change(function(){
		$.ajax({
		type:"POST", 
		url:"process.php?islem=ilce_listele",
		data:$("form").serialize(),
		datatype:"html", 
		beforeSend : function(){  },
		success :function(cevap){ $("#ilce-sec").html(cevap);},
		error: function(){ alert("hata oluştu "); }
	});
	});
}
$(function(){
	dom();
});