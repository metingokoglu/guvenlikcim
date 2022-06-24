<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <ul class="breadcrumb">
                <li><a href="index.php">Anasayfa</a> <i class="icon-angle-right"></i></li>
                <li class="active">İletişim</li>
              </ul>
              <h2>Bizimle İletişime Geçin</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <div id="google-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1859.2819495699584!2d27.133924203499944!3d38.39693568598353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbd8d3d0e82703%3A0x4bcd42845961066a!2sZafertepe+Mahallesi%2C+555%2F4.+Sk.+3+A%2C+35270+Konak%2F%C4%B0zmir!5e0!3m2!1str!2str!4v1539022084124" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>

      <div class="container">
        <div class="row">
          <div class="span8">
            <h4></h4>

            <div id="sendmessage">Bizimle iletişime geçtiğiniz için Teşekkür Ederiz.</div>
            <div id="errormessage"></div>
            <form action="mesajgönder.php" method="post" role="form" class="contactForm">
              <div class="row">
                <div class="span4 form-group field">
                  <input type="text" name="isim" id="name" placeholder="Adınız Soyadınız" data-rule="minlen:4" data-msg="Lutfen isim soyisim giriniz en az 4 karakter" />
                  <div class="validation"></div>
                </div>

                <div class="span4 form-group">
                  <input type="email" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Lutfen email giriniz" />
                  <div class="validation"></div>
                </div>
                <div class="span8 form-group">
                  <input type="text" name="konu" id="subject" placeholder="Konu" data-rule="minlen:4" data-msg="lutfen en az 4 karakterlik konu giriniz" />
                  <div class="validation"></div>
                </div>
                <div class="span8 form-group">
                  <textarea name="mesaj" rows="5" data-rule="required" data-msg="Lutfen mesajinizi giriniz" placeholder="Mesaj"></textarea>
                  <div class="validation"></div>
                  <div class="text-center">
                    <button class="btn btn-theme btn-medium margintop10" type="submit">Gönder</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="span4">
            <div class="clearfix"></div>
            <aside class="right-sidebar">

              <div class="widget">
                <h5 class="widgetheading">İletişim Bilgilerimiz<span></span></h5>

                <ul class="contact-info">
                  <li><label>Adres :</label> 555/4 sokak No:3A Zafertepe Mahallesi<br /> İzmir/Konak</li>
                  <li><label>Telefon :</label>+90 552 217 31 07 </li>
                  <li><label>Email : </label> emre.calmaz@guvenlik-cim.com</li>
                </ul>

              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>