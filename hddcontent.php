
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <ul class="breadcrumb">
                <li><a href="index.html">Anasayfa</a> <i class="icon-angle-right"></i></li>
                <li class="active">Hdd Hesaplama</li>
              </ul>
              <h2>Hdd Hesaplama</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <div class="container">
        <div class="row">

          <div class="span12">
              <form>
                  <div class="row controls">
                    <div class="span3 control-group">
                      <label>Kamera Sayısı</label>
                      <input type="text" value="" maxlength="100" name="kamerasayisi" id="kamerasayisi" class="span3">
                    </div>
                  </div>
                   <div class="row controls">
                    <div class="span3 control-group">
                      <label>Gün Sayısı</label>
                      <input type="text" value="" maxlength="100" name="gunsayisi" id="gunsayisi" class="span3">
                    </div>
                  </div>
                    <div class="btn-toolbar">
                    <input type="button" value="Hesapla" onclick="islem();" class="btn btn-primary">
                  </div>

                   <div class="row controls">
                    <div class="span3 control-group">
                      <label>Gerekli Alan(GB)</label>
                      <input type="text" value="" id="sonuc" name="sonuc" maxlength="130" class="span3" disabled>
                      
                    </div>

                  </div>
                  <p style="margin-top: -20px;"><strong>*</strong> Yapılan hesaplamalar ortalama değer belirtmektedir</p>

                </form>
          
              </div>
            </div>

          </div>

      </div>
    </section>
      <script type="text/javascript">
              function islem(){
                    s1= parseInt(document.getElementById('kamerasayisi').value);
                    s2=parseInt(document.getElementById('gunsayisi').value); 
                    document.getElementById('sonuc').value = (s1*21) * s2;
              }

            </script>