$("#uni").change(function(){
		var cb = document.getElementById("uni");
		var uni = cb.options[cb.selectedIndex].value;
		
		$.ajax({
		type:"POST", 
		url:"process.php?islem=fakulte",
		data:{uni:uni},
		datatype:"html", 
		beforeSend : function(){ },
		success :function(cevap){ 
			$("#fakulte").html(cevap);
			akaList(uni);
		},
		error: function(){ alert("hata oluştu "); }
	});
});

var akaList =function(uni)
{
	$.ajax({
		type:"POST", 
		url:"process.php?islem=akademisyenList",
		data:{uni:uni},
		datatype:"html", 
		beforeSend : function(){ },
		success :function(cevap){ 
			$("#akademisyen").html(cevap);
		},
		error: function(){ alert("hata oluştu "); }
	});
}

$("#fakulte").change(function(){
		var cb = document.getElementById("fakulte");
		var fakulte = cb.options[cb.selectedIndex].value;
		
		$.ajax({
		type:"POST", 
		url:"process.php?islem=bolum",
		data:{fakulte:fakulte},
		datatype:"html", 
		beforeSend : function(){ },
		success :function(cevap){ $("#bolum").html(cevap);dom();},
		error: function(){ alert("hata oluştu "); }
	});
});

$("#il").change(function(){
		var cb = document.getElementById("il");
		var il = cb.options[cb.selectedIndex].value;
		
		$.ajax({
		type:"POST", 
		url:"process.php?islem=ilce",
		data:{il:il},
		datatype:"html", 
		beforeSend : function(){ },
		success :function(cevap){ $("#ilce").html(cevap);dom();},
		error: function(){ alert("hata oluştu "); }
	});
});


var ara=function()
{
		$.ajax({
		type:"POST", 
		url:"process.php?islem=arama",
		data:$("#frmArama").serialize(),
		datatype:"html", 
		beforeSend : function(){ },
		success :function(cevap){ $("#arama-sonuc").html(cevap);},
		error: function(){ alert("hata oluştu "); }
	});
}