<div class="row u-mrgn-top--30">
  <div class="col-md-8">

    <h1 class="c-main-title"><?= $data['title'] ?></h1>

      <?php
      if (isset($_GET['did']) && $_GET['did']=='1'){
      ?>
      <div class="alert alert-success" role="alert">
        <center>Terima kasih jawaban anda sudah tersimpan, <br>Jangan lupa like dan follow <a href="https://www.facebook.com/ddtcnews/" target="_blank">Facebook</a>, <a href="https://twitter.com/DDTCNews" target="_blank">Twitter</a> & <a href="https://instagram.com/ddtcnews" target="_blank">Instagram</a> <b>DDTCNews</b></li> <br>agar selalu update berita  pajak terkini.</center>
      </div>
      <?php
      } else {
      ?>
      <?php
      if (isset($_GET['err']) && $_GET['err']=='1'){
      ?>
      <div class="alert alert-warning" role="alert">
        Email sudah pernah digunakan, silakan masukkan email yang lain
      </div>
      <?php } ?>

    <?php foreach($quiz as $key => $row){ ?>
    <div class="c-detail-article">
      <div class="c-main-photo c-main-photo--original u-mrgn-bottom--20">
        <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
      </div>
      <div class="c-detail-article__tag"><?= $row->TITLE ?></div>
      <div class="c-detail-article__description">
        <div class="c-sub-title"><?= $row->QUESTION; ?></div>

        <?php
        if($row->END_DATE < date('Y-m-d')){    
        ?> 
            A. <?php echo $row->OPTION_A; ?><br>
            B. <?php echo $row->OPTION_B; ?><br>
            C. <?php echo $row->OPTION_C; ?><br>
            D. <?php echo $row->OPTION_D; ?><br><br>
            <b>Jawaban : <?php echo $row->ANSWER; ?></b>
        <?php
        } else {
        ?>
        <!-- <div class="c-quiz">
          <div class="row">
            <div class="col-md-6 u-mrgn-bottom--20">
              <div class="c-quiz__item" id="i_quiz_1">UU No. 28 Tahun 2007</div>
            </div>
            <div class="col-md-6 u-mrgn-bottom--20"><div class="c-quiz__item" id="i_quiz_2">UU No. 28 Tahun 2007</div></div>
            <div class="col-md-6 u-mrgn-bottom--20"><div class="c-quiz__item" id="i_quiz_3">UU No. 28 Tahun 2007</div></div>
            <div class="col-md-6 u-mrgn-bottom--20"><div class="c-quiz__item" id="i_quiz_4">UU No. 28 Tahun 2007</div></div>
          </div>
        </div> -->


        <div class="c-quiz">
         <form method="POST" action="<?= base_url() ?>quiz/sent">
           
            <div class="row">
             
              <div class="col-md-6 u-mrgn-bottom--20">
                <input type="hidden" name="i_row_id" value="<?= $row->ID; ?>">
                <input type="hidden" name="i_url" value="<?= $data['url']; ?>">
                <input type="radio" id="option-1" name="i_option" class="c-quiz-input" value="A" required>
                <label for="option-1" class="c-quiz-label"><?= $row->OPTION_A; ?></label>
              </div>

              <div class="col-md-6 u-mrgn-bottom--20">
                <input type="radio" id="option-2" name="i_option" class="c-quiz-input" value="B">
                <label for="option-2" class="c-quiz-label"><?= $row->OPTION_B; ?></label>
              </div>

              <div class="col-md-6 u-mrgn-bottom--20">
                <input type="radio" id="option-3" name="i_option" class="c-quiz-input" value="C">
                <label for="option-3" class="c-quiz-label"><?= $row->OPTION_C; ?></label>
              </div>

              <div class="col-md-6 u-mrgn-bottom--20">
                <input type="radio" id="option-4" name="i_option" class="c-quiz-input" value="D">
                <label for="option-4" class="c-quiz-label"><?= $row->OPTION_D; ?></label>
              </div>

              <div class="col-md-6 u-mrgn-bottom--20">
                <label>Nama</label>
                <input type="text" class="form-control c-textfield" placeholder="Isi nama Anda" required="required" name="i_name">
              </div>

              <div class="col-md-6 u-mrgn-bottom--20">
                <label>No Telepon</label>
                <input type="text" class="form-control c-textfield" placeholder="Isi no telepon Anda" required="required" name="i_phone">
              </div>

              <div class="col-md-6 u-mrgn-bottom--20">
                <label>Email</label>
                <input type="email" class="form-control c-textfield" placeholder="Isi email Anda" required="required" name="i_email">
              </div>

              <div class="col-md-6 u-mrgn-bottom--20">
                <label>Universitas</label>
                <input type="text" class="form-control c-textfield" placeholder="Isi universitas Anda" required="required" name="i_university">
              </div>

              <div class="col-md-6 u-mrgn-bottom--20">
                <label>Facebook</label>
                <input type="text" class="form-control c-textfield" placeholder="Isi facebook Anda" name="i_facebook">
              </div>
              
              <div class="col-md-6 u-mrgn-bottom--20">
                <label>Twitter</label>
                <input type="text" class="form-control c-textfield" placeholder="Isi twitter Anda" name="i_twitter">
              </div>

              <div class="col-md-6 u-mrgn-bottom--20">
                <label>Instagram</label>
                <input type="text" class="form-control c-textfield" placeholder="Isi instagram Anda" name="i_instagram">
              </div>

              <div class="col-md-12 u-mrgn-bottom--20">
                <input type="submit" class="btn btn-lg btn-danger" value="Kirim">
              </div>
             
            </div>


            
           
           
            </form>
        </div> 



        <?php
        }
        ?>
        <div style="color:#F77B04"> 
          <h5 style="margin-top:50px;">SYARAT DAN KETENTUAN : <h5>
          <ul style="padding-left:20px;font-weight:normal">
            <li>  Kuis berlaku khusus untuk mahasiswa. </li>
            <li>  Peserta mengisi nama lengkap, nomor telpon, alamat email serta ID Twitter, Instagram dan Facebook untuk memudahkan pendataan.</li>
            <li>  Peserta wajib follow <a href="https://twitter.com/DDTCNews" target="_blank">Twitter</a> & <a href="https://instagram.com/ddtcnews" target="_blank">Instagram</a> atau like <a href="https://www.facebook.com/ddtcnews/" target="_blank">Facebook</a> DDTCNews.</li>
            <li>  Pemenang yang beruntung akan mendapatkan hadiah merchandise menarik senilai Rp250.000 berupa kaos, topi, notes, pulpen stylus, sticker, tumbler, dan goodie bag.</li>
            <li>  Pemenang akan diumumkan di setiap minggu melalui situs <a href="https://news.ddtc.co.id/" target="_blank">DDTCNews</a> serta akun Facebook, Twitter dan Instagram DDTCNews.</li>
          </ul>
          </div>
      </div>
    </div>
    <?php } } ?>
  </div>

  <div class="col-md-4">
    <div class="row c-main-desktop u-mrgn-top--30" style="margin-left: 10px;">
        <!-- detailberita1-news-336x280 -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:336px;height:280px"
            data-ad-client="ca-pub-1783522418730843"
            data-ad-slot="7539711426">
        </ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    
  </div>
</div>
