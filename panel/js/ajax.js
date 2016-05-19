$("#uni").change(function(){
		var cb = document.getElementById("uni");
		var uni = cb.options[cb.selectedIndex].value;
		console.log(yetki);
		$.ajax({
		type:"POST", 
		url:"process.php?islem=fakulte",
		data:{uni:uni},
		datatype:"html", 
		beforeSend : function(){ },
		success :function(cevap){ $("#fakulte").html(cevap);dom();},
		error: function(){ alert("hata oluştu "); }
	});
});

$("#fakulte").change(function(){
		var cb = document.getElementById("fakulte");
		var fakulte = cb.options[cb.selectedIndex].value;
		console.log(yetki);
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
		console.log(yetki);
		$.ajax({
		type:"POST", 
		url:"process.php?islem=ilce",
		data:{il:il},
		datatype:"html", 
		beforeSend : function(){ },
		success :function(cevap){ $("#bolum").html(cevap);dom();},
		error: function(){ alert("hata oluştu "); }
	});
});

