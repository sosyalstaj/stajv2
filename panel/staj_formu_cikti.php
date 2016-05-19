
</br>
</br>
<center>
<table>
<tr>
<td><img src="img/logo.png" width="200px" height="200px"/></td>
<td width="150px"></td>
<td>
<center><h3>T.C.</h3></center>
<center><h2> KARADENİZ TEKNİK ÜNİVERSİTESİ</h2></center>
<center><h2>STAJ BAŞVURU FORMU</h2></center>
</br>
<center><h2>İLGİLİ MAKAMA</h2></center>
</td>
<td width="150px"></td>
<td><table border="1"><tr><td width="180px" height="200px"></td></tr></table></td>
</tr>
<tr>
<td colspan="5">
<p align="center"><font size="5">&nbsp;&nbsp;&nbsp;&nbsp;Üniversitemiz ..Of.. Fakülte/Yüksekokul/MYO Yazılım Mühendisliği  
Bölümü  öğrencisi  …<?php echo @$_POST["sure"]; ?>…. gün süre ile kurumunuzda/işyerinizde staj yapma talebinde bulunmuştur. 5510
sayılı Kanun gereğince <b>sigorta işlemleri (kısa vadeli sigorta kolları primi ile genel sağlık sigortası
primi ödemeleri) Üniversitemiz tarafından yapılacak olup </b>, aşağıda kimlik bilgileri verilen
öğrencimizin stajını kuruluşunuzda/işyerinizde yapmasında göstereceğiniz ilgiye teşekkür eder, saygılar sunarız.
</font></p>

</td>
</tr>
<tr>
<td colspan="5">
</br>
<p align="left"><font size="5"><b>Öğrencinin Bilgileri</b></font></p>

<table border="1" width="100%">
<tr >
<td height="35px" width="200px">Adı Soyadı</td>
<td colspan="3" ><?php echo @$_POST["adim"];  echo @$_POST["soyad"];?></td>
</tr>
<tr>
<td height="35px">Öğrenci No</td>
<td width="30%"><?php echo @$_POST["numara"]; ?></td>
<td width="250px">Bölüm/Sınıf</td>
<td  width="30%"><?php echo @$_POST["bolum_sinif"]; ?></td>
</tr>
<tr>
<td height="35px">e-posta</td>
<td width="30%"><?php echo @$_POST["emailim"]; ?></td>
<td>Telefon No</td>
<td  width="30%"><?php echo @$_POST["telefonum"]; ?></td>
</tr>
<tr>
<td height="50px">İkametgah Adresi</td>
<td colspan="3"><?php echo @$_POST["adresim"]; ?></td>
</tr>

</table>

</td>
</tr>

<tr>
<td colspan="5">
</br>
<p align="left"><font size="5"><b>Öğrencinin Nüfus Kayıt Bilgileri</b></font></p>

<table border="1" width="100%">
<tr>
<td height="35px" width="200px">T.C. Kimlik No</td>
<td width="30%"><?php echo @$_POST["tc"]; ?></td>
<td width="250px">Nüfusa Kayıtlı Olduğu İl</td>
<td  width="30%"><?php echo @$_POST["sehir"]; ?></td>
</tr>
<tr>
<td height="35px">N.Cüzdan Seri No</td>
<td width="30%"><?php echo @$_POST["seri"]; ?></td>
<td>İlçe</td>
<td  width="30%"><?php echo @$_POST["ilce"]; ?></td>
</tr>
<tr>
<td height="35px">Adı</td>
<td width="30%"><?php echo @$_POST["adim"]; ?></td>
<td>Mahalle- Köy</td>
<td  width="30%"><?php echo @$_POST["mahalle"]; ?></td>
</tr>
<tr>
<td height="35px">Soyadı</td>
<td width="30%"><?php echo @$_POST["soyad"]; ?></td>
<td>Cilt No</td>
<td  width="30%"><?php echo @$_POST["cilt"]; ?></td>
</tr>
<tr>
<td height="35px">Baba Adı</td>
<td width="30%"><?php echo @$_POST["baba"]; ?></td>
<td>Aile Sıra No</td>
<td  width="30%"><?php echo @$_POST["aile"]; ?></td>
</tr>
<tr>
<td height="35px">Ana Adı</td>
<td width="30%"><?php echo @$_POST["anne"]; ?></td>
<td>Sıra No</td>
<td  width="30%"><?php echo @$_POST["sira"]; ?></td>
</tr>
<tr>
<td height="35px">Doğum Yeri</td>
<td width="30%"><?php echo @$_POST["dogumYeri"]; ?></td>
<td>Verildiği Nüfus Dairesi</td>
<td  width="30%"><?php echo @$_POST["mahalle"]; ?></td>
</tr>
<tr>
<td height="35px">Doğum Tarihi</td>
<td width="30%"><?php echo @$_POST["dogumYil"]; ?></td>
<td>Veriliş Tarihi</td>
<td  width="30%"><?php echo @$_POST["verilisTarihi"]; ?></td>
</tr>
<tr>
<td height="35px" colspan="2"   ></> </td>

<td>Veriliş Nedeni</td>
<td  width="30%"><?php echo @$_POST["neden"]; ?></td>
</tr>
</table>
</td>
</tr>

<tr>
<td colspan="5">
</br>
<p align="left"><font size="5"><b>Staj Yapılacak Yerin</b></font></p>
<table border="1" width="100%">
<tr >
<td height="35px"  width="200px">Kurumun/Kuruluşun Adı</td>
<td colspan="3"  ><?php echo @$_POST["kurumAdi"]; ?></td>
</tr>
<tr>
<td height="35px">Adresi</td>
<td colspan="3" ><?php echo @$_POST["kurumAdres"]; ?></td>
</tr>
<tr>
<td height="35px">Üretim/Hizmet Alanı</td>
<td colspan="3" ><?php echo @$_POST["alan"]; ?></td>
</tr>
<tr>
<td height="35px">Telefon No</td>
<td width="30%"><?php echo @$_POST["isyeriTelefon"]; ?></td>
<td width="250px">Faks No</td>
<td width="30%"><?php echo @$_POST["fax"]; ?></td>
</tr>
<tr>
<td height="35px">e-posta</td>
<td width="30%"><?php echo @$_POST["kurumEmail"]; ?></td>
<td width="250px">Web Adresi</td>
<td width="30%"><?php echo @$_POST["web"]; ?></td>
</tr>

<tr>
<td colspan="5"> 
<table border="0" width="100%">
<tr>
<td  height="35px"  width="200px">Staja Başlama Tarihi</td>
<td ><?php echo @$_POST["baslamaTarih"]; ?></td>
<td width="100px">Bitiş Tarihi</td>
<td ><?php echo @$_POST["bitisTarihi"]; ?></td>
<td width="100px">Süresi (gün)</td>
<td ><?php echo @$_POST["sure"]; ?></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>

<tr>
<td colspan="5">
</br>
<p align="left"><font size="5"><b>İşveren veya Yetkilinin</b></font></p>
<table border="1" width="100%">
<tr >
<td height="35px"  width="200px">Adı Soyadı</td>
<td colspan="2"  ></td>
<td rowspan="3" valign="bottom" width="330px" ><center>(Kaşe/İmza/Tarih)<center></td>
</tr>
<tr>
<td height="35px">Görev ve Unvanı</td>
<td colspan="2" ></td>
</tr>
<tr>
<td height="35px">e-posta</td>
<td colspan="2" ></td>
</tr>

</table>
</td>
</tr>

<tr>
<td colspan="5">
</br>
<table border="1" width="100%">
<tr >
<td height="35px"  width="150px"><b>ÖĞRENCİNİN İMZASI</b></td>
<td height="35px"   width="150px"><b>STAJ KOMİSYONU ONAYI</b></td>
<td height="35px"   width="150px"><b>SAĞLIK, KÜLTÜR VE SPOR</br> DAİRE BAŞKANLIĞI ONAYI</b></td>
</tr>
<tr>
<td height="150px" width="150px" valign="bottom">
Belge üzerindeki bilgilerin doğru</br> olduğunu bildiririm.</br></br>
İmza:</br></br>
Tarih:</br>
</td>
<td height="150px" width="150px" valign="bottom"> İmza: </br></br>Tarih:</td>
<td height="150px" width="150px" valign="bottom">Sosyal Güvenlik Kurumuna giriş işlemi yapılmıştır. </br></br></br>Tarih:</td>
</tr>
</table>
</td>
</tr>

<tr>
<td colspan="5">
</br>
<table border="0" width="100%">
<tr >
<td height="35px"  width="15px" valign="top"> 
<b>EK  &nbsp;&nbsp;&nbsp; :</b>
</td>
<td height="35px"  width="90%">
1- Sağlık provizyon belgesi</br>
2- Aile sağlık yardımı sorgulama belgesi</br>
3- Nüfus cüzdanı fotokopisi (tek yüze, arka ve ön)</br>
</td>
</tr>
<tr >
<td height="35px"  width="15px" valign="top"> 
<b>NOT  &nbsp;&nbsp;&nbsp; :</b>
</td>
<td height="35px"  width="90%">
Formun staja başlama tarıhınden <u><b> en az 30 gün önce </b></u> Staj Komisyonu Başkanlığına teslim edilmesi gerekmektedir.<u><b> Teslim </br>
edilecek form 2 asıl nüsha olarak hazırlanır.</b></u> Bir nüshası Staj Komisyonuna, bir nüshası Sağlık, Kültür ve Spor Daire </br> Başkanlığına teslim edilecektir.
</td>
</tr>
<tr>
<td colspan="2">
Adres: Karadeniz Teknik Üniversitesi Sağlık, Kültür ve Spor Daire Başkanlığı TRABZON
Tel: 0462 377 38 00 e-mail: medikososyal@ktu.edu.tr http://www.ktu.edu.tr/sks
</td>
</tr>



</table>
</td>
</tr>

</table>
</center>