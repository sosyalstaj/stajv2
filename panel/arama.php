<form method="POST" id="frmArama">
    <div class="col-md-3">
        <div class="box box-solid">
            <div class="box-header with-border">
             <h4 class="box-title">Arama Kriterleri</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
              		<div class="external-event bg-aqua">
                      <div class="checkbox">
                          <label>
                            <input name="akademisyen" value="1" type="checkbox"> Akademisyen
                          </label>
                       </div>
                  </div>
	                <div class="external-event bg-green ">
                        <div class="checkbox">
                          <label>
                            <input name="isyeri" type="checkbox" value="1"> İşyeri
                          </label>
                       </div>
                  </div>
	                <div class="external-event bg-yellow ">
                        <div class="checkbox">
                          <label>
                            <input name="ogrenci" type="checkbox" value="1"> Öğrenci
                          </label>
                       </div>
                  </div>
	                
	                <div class="external-event bg-light-blue ">
                      <div class="checkbox">
                          <label>
                            <input name="projeler" value="1" type="checkbox"> Projeler
                          </label>
                       </div>
                  </div>
	                <div class="external-event bg-red ">
                        <div class="checkbox">
                          <label>
                            <input name="sehir" type="checkbox" value="1"> Şehir
                          </label>
                       </div>
                  </div>
              </div>
            </div>
        </div>

    </div>
    
    <div class="col-md-9">
        <div class="form-group">
            <input type="text" name="arama" id="inputSuccess" onkeyup="ara()" 
            
            class="form-control" placeholder="Aranacak ifadeyi girin">
        </div>
    </div>
</form>
<div id="arama-sonuc" class="col-md-9">

</div>


