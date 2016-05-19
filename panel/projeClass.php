<?php
class Proje {
   private $id;
   private $p_adi;
   private $p_icerik;
   private $tarih;
   private $id_user;
   
   
   
	function getId() 
	{
        return $this->id;
    }
	function setId($id)
	{  
		$this -> id = $id; 
	}
	function getLoginId() 
	{
        return $this->id_user;
    }
	function setLoginId($id_user)
	{  
		$this -> id_user = $id_user; 
	}
	function getProjeAdi() 
	{
        return $this->p_adi;;
    }
	function setProjeAdi($p_adi)
	{  
		$this -> p_adi = $p_adi; 
	}
	function getProjeIcerik() 
	{
       return $this->p_icerik;
    }
	function setProjeIcerik($p_icerik)
	{  
		$this -> p_icerik = $p_icerik; 
	}
	function getTarih() 
	{
       return $this->tarih;
    }
	function setTarih($tarih)
	{  
		$this -> tarih = $tarih; 
	}
	

   
}

?>