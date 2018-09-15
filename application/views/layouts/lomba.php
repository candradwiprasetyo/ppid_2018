<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/js/function_tax_competition.js"></script>
<link href="<?= base_url() ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<link href="<?= base_url() ?>assets/css/uploader.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/js/jquery.uploadfile.min.js"></script>

<!-- article -->
<div class="row u-mrgn-top--20">
	<div class="col-md-8" style="padding-bottom: 150px;">

		

		

     <h1 class="c-main-title u-mrgn-top--20"><?= $data['title'] ?></h1>
     
		<form action="<?= base_url().'lomba/sent' ?>" name="form_tax_competition" method="POST" enctype="multipart/form-data">
			<?php
      if (isset($_GET['did']) && $_GET['did']=='1'){
      ?>
      <div class="alert alert-success" role="alert">
        <center>Terima kasih telah mendaftar. Data anda sudah tersimpan, <br>Jangan lupa like dan follow <a href="https://www.facebook.com/ddtcnews/" target="_blank">Facebook</a>, <a href="https://twitter.com/DDTCNews" target="_blank">Twitter</a> & <a href="https://instagram.com/ddtcnews" target="_blank">Instagram</a> <b>DDTCNews</b></li> <br>agar selalu update berita  pajak terkini.</center>
      </div>
      <?php
      } 
      ?>
			<h3 class="u-mrgn-bottom--30">Informasi Universitas</h3>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-6 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Nama Universitas"  name="i_university_name" id="i_university_name">
				</div>
				<div class="col-md-6 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Fakultas" name="i_university_faculty" id="i_university_faculty">
				</div>
			</div>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-6 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Program Studi" name="i_university_program" id="i_university_program">
				</div>
				<div class="col-md-6 u-mrgn-bottom--20">
					<select class="form-control c-textfield" placeholder="Jenjang Studi" name="i_university_grade" id="i_university_grade">
						<option value="">Jenjang Studi</option>
						<option value="D1">D1</option>
						<option value="D2">D2</option>
						<option value="D3">D3</option>
						<option value="D4">D4</option>
						<option value="S1">S1</option>
					</select>
				</div>
			</div>

			<h3 class="u-mrgn-bottom--30">Informasi Ketua Tim</h3>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-4 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Nama Lengkap"  name="i_leader_name" id="i_leader_name">
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Tempat Lahir" name="i_leader_born_place" id="i_leader_born_place">
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<div class="input-group date form_date col-md-12 " data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
	          <input class="form-control c-textfield" size="16" type="text" readonly value="" placeholder="Tanggal Lahir" name="i_leader_born_date" id="i_leader_born_date">
	          <span class="input-group-addon input-group-addon-tax"><span class="fa fa-calendar"></span></span>
	        </div>
	        <input type="hidden" id="dtp_input2" value="" />
				</div>
			</div>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-4 u-mrgn-bottom--20">
					<textarea class="form-control c-textfield" placeholder="Alamat (sesuai KTP)" name="i_leader_address" id="i_leader_address"></textarea>
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<select class="form-control c-textfield" placeholder="Jenis Kelamin" name="i_leader_gender" id="i_leader_gender">
						<option value="">Jenis Kelamin</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Angkatan" name="i_leader_grade" id="i_leader_grade">
				</div>
			</div>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-4 u-mrgn-bottom--20">
					<div class="input-group">
						<input type="text" class="form-control c-textfield" placeholder="Email"  name="i_leader_email" id="i_leader_email">
						<span class="input-group-addon input-group-addon-tax"><span class="fa fa-envelope"></span></span>
					</div>
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<div class="input-group">
						<input type="text" class="form-control c-textfield" placeholder="Telepon rumah" name="i_leader_phone" id="i_leader_phone">
						<span class="input-group-addon input-group-addon-tax"><span class="fa fa-phone"></span></span>
					</div>
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<div class="input-group">
						<input type="text" class="form-control c-textfield" placeholder="Handphone" name="i_leader_handphone" id="i_leader_handphone">
						<span class="input-group-addon input-group-addon-tax"><span class="fa fa-mobile"></span></span>
					</div>
				</div>
			</div>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-4 u-mrgn-bottom--20">
					<textarea class="form-control c-textfield" placeholder="Alergi/riwayat penyakit" name="i_leader_allergy" id="i_leader_allergy"></textarea>
				</div>
				<div class="col-md-8 u-mrgn-bottom--20">
					<div class="upload-btn-wrapper">
					  <button class="upload-btn">Foto 3x4 (Berwarna), KTM, KTP, Passport</button>
					  <input type="file" name="i_leader_photo" id="i_leader_photo"/>
					</div>
				</div>
				<div class="col-md-12 u-mrgn-bottom--20">
					<div class="u-txt--small u-txt-color--red">(File Foto, KTM, KTP, Passport dalam satu file. Maksimum ukuran file upload  : 5mb)<br><strong>*Untuk Passport dapat dilampirkan menyusul.</strong> Apabila belum tersedia, diharapkan dapat mengurus dokumen tersebut segera mungkin setelah pengumuman seleksi esai pada 17 September 2018 (untuk 15 tim terpilih).</div>
				</div>
			</div>

			<h3 class="u-mrgn-bottom--30">Informasi Anggota Tim</h3>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-4 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Nama Lengkap"  name="i_member_name" id="i_member_name">
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Tempat Lahir" name="i_member_born_place" id="i_member_born_place">
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<div class="input-group date form_date col-md-12 " data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
	          <input class="form-control c-textfield" size="16" type="text" readonly value="" placeholder="Tanggal Lahir" name="i_member_born_date" id="i_member_born_date">
	          <span class="input-group-addon input-group-addon-tax"><span class="fa fa-calendar"></span></span>
	        </div>
				</div>
			</div>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-4 u-mrgn-bottom--20">
					<textarea class="form-control c-textfield" placeholder="Alamat (sesuai KTP)" name="i_member_address" id="i_member_address"></textarea>
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<select class="form-control c-textfield" placeholder="Jenis Kelamin" name="i_member_gender" id="i_member_gender">
						<option value="">Jenis Kelamin</option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Angkatan" name="i_member_grade" id="i_member_grade">
				</div>
			</div>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-4 u-mrgn-bottom--20">
					<div class="input-group">
						<input type="text" class="form-control c-textfield" placeholder="Email"  name="i_member_email" id="i_member_email">
						<span class="input-group-addon input-group-addon-tax"><span class="fa fa-envelope"></span></span>
					</div>
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<div class="input-group">
						<input type="text" class="form-control c-textfield" placeholder="Telepon rumah" name="i_member_phone" id="i_member_phone">
						<span class="input-group-addon input-group-addon-tax"><span class="fa fa-phone"></span></span>
					</div>
				</div>
				<div class="col-md-4 u-mrgn-bottom--20">
					<div class="input-group">
						<input type="text" class="form-control c-textfield" placeholder="Handphone" name="i_member_handphone" id="i_member_handphone">
						<span class="input-group-addon input-group-addon-tax"><span class="fa fa-mobile"></span></span>
					</div>
				</div>
			</div>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-4 u-mrgn-bottom--20">
					<textarea class="form-control c-textfield" placeholder="Alergi/riwayat penyakit" name="i_member_allergy" id="i_member_allergy"></textarea>
				</div>
				<div class="col-md-8 u-mrgn-bottom--20">
					<div class="upload-btn-wrapper">
					  <button class="upload-btn">Foto 3x4 (Berwarna), KTM, KTP, Passport</button>
					  <input type="file" name="i_member_photo" id="i_member_photo"/>
					</div>
				</div>
				<div class="col-md-12 u-mrgn-bottom--20">
					<div class="u-txt--small u-txt-color--red">(File Foto, KTM, KTP, Passport dalam satu file. Maksimum ukuran file upload  : 5mb)<br><strong>*Untuk Passport dapat dilampirkan menyusul.</strong> Apabila belum tersedia, diharapkan dapat mengurus dokumen tersebut segera mungkin setelah pengumuman seleksi esai pada 17 September 2018 (untuk 15 tim terpilih).</div>
				</div>
			</div>

			<h3 class="u-mrgn-bottom--30">Esai</h3>
			<div class="row u-mrgn-bottom--0">
				<div class="col-md-12 u-mrgn-bottom--20">
					<select class="form-control c-textfield" placeholder="Tema esai" name="i_essai_theme_id" id="i_essai_theme_id">
						<option value="">Tema esai</option>
						<?php
						foreach($essay_theme as $key => $row){
						?>
							<option value="<?= $row->ID?>"><?= $row->NAME?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="col-md-12 u-mrgn-bottom--20">
					<input type="text" class="form-control c-textfield" placeholder="Judul esai" name="i_essai_title" id="i_essai_title">
				</div>
				<!-- <div class="col-md-6 u-mrgn-bottom--20">
					<div class="upload-btn-wrapper">
					  <button class="upload-btn">Upload File Esai (Word & PDF)</button>
					  <input type="file" name="i_essai_file" id="i_essai_file"/>
					</div>
					
				</div> -->
				
				<div class="col-md-12 u-mrgn-bottom--20">
					<div class="upload-btn-wrapper">	
					  <button class="upload-btn">Surat Pernyataan Orisinalitas (PDF)</button>
					  <input type="file" name="i_essai_statement_letter" id="i_essai_statement_letter"/>
					</div>
				</div>
				
			</div>

			<div style="position: absolute; width: 100%; height: 100px; bottom: 0;">
				<div class="row">
					<div class="col-md-6 u-mrgn-bottom--20">
						<input type="submit" class="btn btn-lg btn-danger" value="Kirim Formulir" id="i_sent">
					</div>
				</div>
			</div>
		</form>

		<div id="fileuploader">Upload File Esai (Word & PDF)</div>

		<div class="row">
			<div class="col-md-12 u-mrgn-bottom--20">
				<div class="u-txt--small u-txt-color--red">(Disubmit dua file esai <strong>(Word &amp; PDF)</strong>. Maksimum ukuran file upload  : 5mb)</div>
			</div>
			<div class="col-md-12 u-mrgn-bottom--20">
				<div class="u-txt--small">
					<input type="checkbox" id="i_terms">
					Dengan demikian, kami menyatakan mengerti, memahami, dan menyetujui syarat dan ketentuan yang berlaku pada DDTCNews Tax Competition 2018 ini.
				</div>
				<div class=" u-txt--small u-txt-color--red u-txt--bold" id="i_terms_warning" style="display: none;">Harap dicentang</div>
			</div>
		</div>

	</div>


	
	<div class="col-md-4 u-mrgn-top--30">
		
		<?php $this->load->view('layouts/google_ads');  ?>
		
		<?php $this->load->view('layouts/terbaru');  ?>

		<div class="row">
			<div class="col-md-12"><div class="c-main-title">Terpopuler</div></div>
			<div class="col-md-12">
						<?php foreach($terpopuler as $key => $row){
          	?>
            <div class="c-main-article">
          
              <div class="col-xs-2">
                <div class="number">
                  <?= $key + 1 ?>
                </div>
              </div>
              <div class="col-xs-10 u-pad--0">
                <div class="tag"><?= $row->UPPERDECK; ?></div>
                <div class="title"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
              </div>
              <div class="u-clear"></div>
              
              
            </div>
            <?php
              if ($key == 0) {
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="c-main-photo c-main-photo--terpopuler">
                        <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                        	<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
                        </a>
                      </div>
                      <?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12' && $row->SUBCATEGORY != '29') { ?>
                      <div class="c-border-bottom">
                          <div class="left"></div>
                          <div class="right"></div>
                        </div>
                        <?php
                      	}
                        ?>
                    </div>
                 </div>
                <?php
              }

            }
            ?>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript">
    
  $('.form_date').datetimepicker({
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
  })
  .on('changeDate', function(ev){
 

  });
  
</script><!-- 

<script>
$(document).ready(function()
{
	$("#fileuploader").uploadFile({
		url:"upload_file",
		fileName:"myfile",
		maxFileCount:5,
		maxFileSize:5000*1024,
		allowedTypes:"pdf,doc,docx",
	});
});
</script> -->

