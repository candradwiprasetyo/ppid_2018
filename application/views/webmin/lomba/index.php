<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Tax Competition</b></h3>
      </div>
      <!-- /.box-header --> 
      <div class="box-body">
         <table id="data_place" width="100%" class="table table-bordered table-striped">
            <thead> 
               <tr>
                  <th>No</th>
                  <th>Universitas</th>
                  <th>Fakultas </th>
                  <th>Program Studi</th>
                  <th>Jenjang</th>
                  <th>Ketua Tim</th>
                  <th>Email Ketua Tim</th>
                  <th>Anggota Tim</th>
                  <th>Email Anggota Tim</th>
                  <th>-</th>
               </tr>
            </thead>
            <tbody>               
            </tbody>
         </table>
      </div>
      <!-- /.box-body -->
   </div>
</div>

<!-- Modal -->
    <div id="formModal" class="modal fade" role="dialog">
      <div class="modal-dialog"  style="width: 60%">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <div id="error_code" style="color: red">
                
            </div>
            
            <form id="form" class="form-horizontal" method="post" >
              
              <div class="row u-mrgn-bottom--0">
              <div class="col-md-12">

                <h3 class="u-mrgn-bottom--30">Informasi Universitas</h3>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-6 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Nama Universitas"  name="i_university_name" id="i_university_name" readonly>
                  </div>
                  <div class="col-md-6 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Fakultas" name="i_university_faculty" id="i_university_faculty" readonly>
                  </div>
                </div>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-6 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Program Studi" name="i_university_program" id="i_university_program" readonly>
                  </div>
                  <div class="col-md-6 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Jenjang Studi" name="i_university_grade" id="i_university_grade" readonly>
                    
                  </div>
                </div>

                <h3 class="u-mrgn-bottom--30">Informasi Ketua Tim</h3>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Nama Lengkap"  name="i_leader_name" id="i_leader_name" readonly>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Tempat Lahir" name="i_leader_born_place" id="i_leader_born_place" readonly>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <div class="input-group date form_date col-md-12 " data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                      <input class="form-control c-textfield" size="16" type="text" readonly value="" placeholder="Tanggal Lahir" name="i_leader_born_date" id="i_leader_born_date"  readonly>
                      <span class="input-group-addon input-group-addon-tax"><span class="fa fa-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" />
                  </div>
                </div>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <textarea class="form-control c-textfield" placeholder="Alamat (sesuai KTP)" name="i_leader_address" id="i_leader_address" readonly></textarea>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Tempat Lahir" name="i_leader_gender" id="i_leader_gender" readonly>
                    
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Angkatan" name="i_leader_grade" id="i_leader_grade" readonly>
                  </div>
                </div>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <div class="input-group">
                      <input type="text" class="form-control c-textfield" placeholder="Email"  name="i_leader_email" id="i_leader_email" readonly>
                      <span class="input-group-addon input-group-addon-tax"><span class="fa fa-envelope"></span></span>
                    </div>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <div class="input-group">
                      <input type="text" class="form-control c-textfield" placeholder="Telepon rumah" name="i_leader_phone" id="i_leader_phone" readonly>
                      <span class="input-group-addon input-group-addon-tax"><span class="fa fa-phone"></span></span>
                    </div>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <div class="input-group">
                      <input type="text" class="form-control c-textfield" placeholder="Handphone" name="i_leader_handphone" id="i_leader_handphone" readonly>
                      <span class="input-group-addon input-group-addon-tax"><span class="fa fa-mobile"></span></span>
                    </div>
                  </div>
                </div>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <textarea class="form-control c-textfield" placeholder="Alergi/riwayat penyakit" name="i_leader_allergy" id="i_leader_allergy" readonly></textarea>
                  </div>
                  <div class="col-md-8 u-mrgn-bottom--20">
                    <div class="upload-btn-wrapper">
                      <a class="btn btn-primary" id="i_leader_photo" download>Download Foto 3x4 (Berwarna), KTM, KTP, Passport</a>
                      
                    </div>
                  </div>
                  
                </div>

                <h3 class="u-mrgn-bottom--30">Informasi Anggota Tim</h3>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Nama Lengkap"  name="i_member_name" id="i_member_name" readonly>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Tempat Lahir" name="i_member_born_place" id="i_member_born_place" readonly>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <div class="input-group date form_date col-md-12 " data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                      <input class="form-control c-textfield" size="16" type="text" readonly value="" placeholder="Tanggal Lahir" name="i_member_born_date" id="i_member_born_date" readonly>
                      <span class="input-group-addon input-group-addon-tax"><span class="fa fa-calendar"></span></span>
                    </div>
                  </div>
                </div>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <textarea class="form-control c-textfield" placeholder="Alamat (sesuai KTP)" name="i_member_address" id="i_member_address" readonly></textarea>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Email"  name="i_member_gender" id="i_member_gender" readonly>
                    
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Angkatan" name="i_member_grade" id="i_member_grade" readonly>
                  </div>
                </div>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <div class="input-group">
                      <input type="text" class="form-control c-textfield" placeholder="Email"  name="i_member_email" id="i_member_email" readonly>
                      <span class="input-group-addon input-group-addon-tax"><span class="fa fa-envelope"></span></span>
                    </div>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <div class="input-group">
                      <input type="text" class="form-control c-textfield" placeholder="Telepon rumah" name="i_member_phone" id="i_member_phone" readonly>
                      <span class="input-group-addon input-group-addon-tax"><span class="fa fa-phone"></span></span>
                    </div>
                  </div>
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <div class="input-group">
                      <input type="text" class="form-control c-textfield" placeholder="Handphone" name="i_member_handphone" id="i_member_handphone" readonly>
                      <span class="input-group-addon input-group-addon-tax"><span class="fa fa-mobile"></span></span>
                    </div>
                  </div>
                </div>
                <div class="row u-mrgn-bottom--0">
                  <div class="col-md-4 u-mrgn-bottom--20">
                    <textarea class="form-control c-textfield" placeholder="Alergi/riwayat penyakit" name="i_member_allergy" id="i_member_allergy" readonly></textarea>
                  </div>
                  <div class="col-md-8 u-mrgn-bottom--20">
                    <div class="upload-btn-wrapper">
                      <a class="btn btn-primary" id="i_member_photo" download>Download Foto 3x4 (Berwarna), KTM, KTP, Passport</a>
                    </div>
                  </div>
                 
                </div>

                <h3 class="u-mrgn-bottom--30">Esai</h3>
                <div class="row">
                  <div class="col-md-12 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Judul esai" name="i_essai_theme_id" id="i_essai_theme_id" readonly>
                  </div>
                  <div class="col-md-12 u-mrgn-bottom--20">
                    <input type="text" class="form-control c-textfield" placeholder="Judul esai" name="i_essai_title" id="i_essai_title" readonly>
                  </div>
                  <div class="col-md-12 u-mrgn-bottom--20">
                    <div class="upload-btn-wrapper">

                      <!-- <a class="btn btn-primary" id="i_essay_file" download>Download File Esai (Word & PDF)</a> -->
                      <div id="parent_button_download"></div>
                    </div>
                  </div>
                  <div class="col-md-12 u-mrgn-bottom--20">
                    <div class="upload-btn-wrapper">
                      <a class="btn btn-primary" id="i_statement_letter" download>Download Surat Pernyataan Orisinalitas</a>
                    </div>
                  </div>
                 
                 
                </div>


              </div>
              </div>
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

<script>
   		var table; 
        $(document).ready(function() {
            table = $('#data_place').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('webmin/lomba/data/ajax')?>",
                    "type": "POST"
                },

                 columns: [
                    { data: "0" },
                    { data: "1" },
                    { data: "2" },
                    { data: "3" },
                    { data: "4" },
                    { data: "5" },
                    { data: "6" },
                    { data: "7" },
                    { data: "8" },
                    { data: "9" },
                ],
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],    });
                
        } );

        function showModal(ID)
        {   
            
                $(".loader").show();
                $.ajax({ 
                    url: '<?php echo site_url('webmin/lomba/view')?>',
                    data: {
                        'ID' : ID,
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(response)
                    {
                        data = response.data;
                        data.LEADER_GENDER = (data.LEADER_GENDER=='L') ? 'Laki-laki' : 'Perempuan';
                        data.MEMBER_GENDER = (data.MEMBER_GENDER=='L') ? 'Laki-laki' : 'Perempuan';

                        $(".loader").hide();
                        $(".modal-title").html("Data Tax Competition");
                        $("#i_university_name").val(data.UNIVERSITY_NAME);                      
                        $("#i_university_faculty").val(data.UNIVERSITY_FACULTY);                      
                        $("#i_university_grade").val(data.UNIVERSITY_GRADE);
                        $("#i_university_program").val(data.UNIVERSITY_PROGRAM);

                        $("#i_leader_name").val(data.LEADER_NAME);
                        $("#i_leader_born_place").val(data.LEADER_BORN_PLACE);
                        $("#i_leader_born_date").val(data.LEADER_BORN_DATE);
                        $("#i_leader_address").val(data.LEADER_ADDRESS);
                        $("#i_leader_gender").val(data.LEADER_GENDER);
                        $("#i_leader_grade").val(data.LEADER_YEAR);
                        $("#i_leader_email").val(data.LEADER_EMAIL);
                        $("#i_leader_phone").val(data.LEADER_PHONE);
                        $("#i_leader_handphone").val(data.LEADER_HANDPHONE);
                        $("#i_leader_allergy").val(data.LEADER_ALLERGY);
                        $("#i_leader_photo").attr("href", window.location.origin + '/uploads/tax_competition/leader_profile/' + data.LEADER_PHOTO);

                        $("#i_member_name").val(data.MEMBER_NAME);
                        $("#i_member_born_place").val(data.MEMBER_BORN_PLACE);
                        $("#i_member_born_date").val(data.MEMBER_BORN_DATE);
                        $("#i_member_address").val(data.MEMBER_ADDRESS);
                        $("#i_member_gender").val(data.MEMBER_GENDER);
                        $("#i_member_grade").val(data.MEMBER_YEAR);
                        $("#i_member_email").val(data.MEMBER_EMAIL);
                        $("#i_member_phone").val(data.MEMBER_PHONE);
                        $("#i_member_handphone").val(data.MEMBER_HANDPHONE);
                        $("#i_member_allergy").val(data.MEMBER_ALLERGY);
                        $("#i_member_photo").attr("href", window.location.origin + '/uploads/tax_competition/member_profile/' + data.MEMBER_PHOTO);

                        $("#i_essai_theme_id").val(data.NAME);
                        $("#i_essai_title").val(data.ESSAY_TITLE);
                        $("#i_essay_file").attr("href", window.location.origin + '/uploads/tax_competition/file_essay/' + data.ESSAY_FILE);
                        $("#i_statement_letter").attr("href", window.location.origin + '/uploads/tax_competition/statement_letter/' + data.ESSAY_STATEMENT_LETTER);

                        var button_download = '';
                        $.each(response.data_file, function(index, value) {
                          button_download += '<a class="btn btn-primary u-mrgn-bottom--20" id="i_essay_file" download href="'+window.location.origin + '/uploads/tax_competition/file_essay/' + value.FILENAME +'">' + value.FILENAME +'</a> ';
                        }); 

                        $('#parent_button_download').children('.btn-primary').remove();
                        $('#parent_button_download').append(button_download);

                        $("#formModal").modal('show');
                    }
                });
            
        }

        function hapus(id)
        {
          if (confirm("Apakah anda yakin menghapus data ini ?") == true) {
            window.location.href = "<?=site_url("webmin/lomba/destroy");?>/"+id;
          }
        }    
</script>