
$(function() {
  $("#fileuploader").uploadFile({
    url:"upload_file",
    fileName:"myfile",
    maxFileCount:5,
    maxFileSize:5000*1024,
    allowedTypes:"pdf,doc,docx",
  });
  $("form[name='form_tax_competition']").validate({
    rules: {
      i_university_name: "required",
      i_university_faculty: "required",
      i_university_program: "required",
      i_university_grade: "required",
      i_leader_name: "required",
      i_leader_born_place: "required",
      i_leader_born_date: "required",
      i_leader_address: {
      	required: true,
        maxlength: 300,
      },
      i_leader_gender: "required",
      i_leader_grade: {
        required: true,
        maxlength: 4,
        number: true,
      },
      i_leader_email: {
        required: true,
        email: true,
      },
      i_leader_phone: {
        required: true,
        number: true,
      },
      i_leader_handphone: {
        required: true,
        number: true,
      },
      i_leader_photo: "required",
      i_member_name: "required",
      i_member_born_place: "required",
      i_member_born_date: "required",
      i_member_address: {
      	required: true,
        maxlength: 300,
      },
      i_member_gender: "required",
      i_member_grade: {
        required: true,
        maxlength: 4,
        number: true,
      },
      i_member_email: {
        required: true,
        email: true,
      },
      i_member_phone: {
        required: true,
        number: true,
      },
      i_member_handphone: {
        required: true,
        number: true,
      },
      i_member_photo: "required",
      i_essai_theme_id: "required",
      i_essai_title: "required",
      i_essai_file: "required",
      i_essai_statement_letter: "required",
    },
    messages: {
      i_university_name: "Nama University harus diisi",
      i_university_faculty: "Fakultas harus diisi",
      i_university_program: "Program Studi harus diisi",
      i_university_grade: "Jenjang Studi harus diisi",
      i_leader_name: "Nama lengkap harus diisi",
      i_leader_born_place: "Tempat lahir harus diisi",
      i_leader_born_date: "Tanggal lahir Harus diisi",
      i_leader_address: {
      	required: "Alamat harus diisi",
        maxlength: "Alamat maksimal 300 karakter",
      },
      i_leader_gender: "Jenis kelamin",
      i_leader_grade: {
        required: "Angkatan harus diisi",
        maxlength: "Angkatan harus berupa tahun",
        number: "Angkatan harus berupa tahun",
      },
      i_leader_email: {
        required: "Email harus diisi",
        email: "Email harus valid",
      },
      i_leader_phone: {
        required: "Telepon rumah harus diisi",
        number: "Telepon harus valid",
      },
      i_leader_handphone: {
        required: "Handphone harus diisi",
        number: "Handphone harus valid",
      },
      i_leader_photo: "File Foto, KTM, KTP, Passport harus diisi",
      i_member_name: "Nama lengkap harus diisi",
      i_member_born_place: "Tempat lahir harus diisi",
      i_member_born_date: "Tanggal lahir Harus diisi",
      i_member_address: {
      	required: "Alamat harus diisi",
        maxlength: "Alamat maksimal 300 karakter",
      },
      i_member_gender: "Jenis kelamin",
      i_member_grade: {
        required: "Angkatan harus diisi",
        maxlength: "Angkatan harus berupa tahun",
        number: "Angkatan harus berupa tahun",
      },
      i_member_email: {
        required: "Email harus diisi",
        email: "Email harus valid",
      },
      i_member_phone: {
        required: "Telepon rumah harus diisi",
        number: "Telepon harus valid",
      },
      i_member_handphone: {
        required: "Handphone harus diisi",
        number: "Handphone harus valid",
      },
      i_member_photo: "File Foto, KTM, KTP, Passport harus diisi",
      i_essai_theme_id: "Tema esai harus diisi",
      i_essai_title: "Judul Esai harus diisi",
      i_essai_file: "File esai harus diisi",
      i_essai_statement_letter: "Surat pernyataan orisinalitas harus diisi",
    },
    submitHandler: function(form) {
    	if($('#i_terms').is(":checked")) {
    		$('#i_terms_warning').hide();
    		$("#i_sent").prop('value', 'Processing...');
    		$('#i_sent').attr('disabled','disabled');
				form.submit();
    	} else {
    		$('#i_terms_warning').show();
    	}
    }
  });
});