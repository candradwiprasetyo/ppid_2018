<script language="JavaScript">
  function commaFormatted(amount) {
  	var a = amount.split('.', 2);
  	var d = new String(a[1]);
  	var i = parseInt(a[0]);
  	if(isNaN(i)) { return 'N/A'; }
  	var minus = '';
  	if(i < 0) { minus = '-'; }
  	i = Math.abs(i);
  	var n = new String(i);
  	var b = [];
  	while(n.length > 3)
  	{
  		var nn = n.substr(n.length-3);
  		b.unshift(nn);
  		n = n.substr(0,n.length-3);
  	}
  	if(n.length > 0) { b.unshift(n); }
  	n = b.join(".");
  	if(a[1])
  	{
  		if(d.length < 1) { amount = n; }
  		else { amount = n + ',' + d; }
  	}
  	else
  	{
  		amount = n;
  	}
  	amount = minus + amount;
  	return amount;
  }
  
  function Bruto(){
  var tahun_bj = parseFloat(document.getElementsByName("tahun")[0].value);
  var gaji = parseFloat(document.getElementsByName("gaji")[0].value);                        
  
  bruto = gaji;
  b_jabatan = (bruto * 0.05);
  if(b_jabatan>=500000){b_jabatan=500000;}
                          
  netto=bruto-pengurang;
                          
  jml_bruto.value = commaFormatted(new String(bruto));


document.getElementById('bruto').value = jml_bruto;
            
            }

function hitung(){
								
	var tahun_bj = parseFloat(document.getElementsByName("tahun")[0].value);							
	var npwp = document.getElementsByName("npwp")[0].value;	
	var kawin = document.getElementsByName("kawin")[0].value;	
	
	var gaji = parseFloat(document.getElementsByName("gaji")[0].value);
	
	var tunj_lainnya = parseFloat(document.getElementsByName("tunj_lainnya")[0].value);
	var premi_jkk = parseFloat(document.getElementsByName("premi_jkk")[0].value);
	var premi_jk = parseFloat(document.getElementsByName("premi_jk")[0].value);
	var premi_jht = parseFloat(document.getElementsByName("premi_jht")[0].value);
	var premi_jpk = parseFloat(document.getElementsByName("premi_jpk")[0].value);
	var premi_lainnya = parseFloat(document.getElementsByName("premi_lainnya")[0].value);
	var premi=premi_jkk+premi_jk+premi_jht+premi_jpk+premi_lainnya;
	
	var bruto = gaji+tunj_lainnya+premi;
	var jabatan = (5/100)*bruto;
	
	if (jabatan>500000){
		jabatan=500000;
	}
	
	var iuran_pensiun = parseFloat(document.getElementsByName("iuran_pensiun")[0].value);
	var iuran_jht = parseFloat(document.getElementsByName("iuran_jht")[0].value);
	var iuran_tht = parseFloat(document.getElementsByName("iuran_tht")[0].value);
	var pengurang = jabatan+iuran_pensiun+iuran_jht+iuran_tht;
	var netto = bruto-pengurang;
	var netto_thn = netto*12;
								
	
	//------PTKP----						
	var comp_ptkp=kawin.split("-");
		
	var ptkp_2005 = [ 12000000, 1200000, 12000000, 1200000 ];
	var ptkp_2008 = [ 13200000, 1200000, 12000000, 1200000 ];							
	var ptkp_2012 = [ 15840000, 1320000, 15840000, 1320000 ];
	var ptkp_2014 = [ 24300000, 2025000, 24300000, 2025000 ];
	var ptkp_2015 = [ 36000000, 3000000, 36000000, 3000000 ];
	var ptkp_2016 = [ 54000000, 4500000, 54000000, 4500000 ];
	
	if(tahun_bj<=2005){
		tahun_bj=2005;
	}else if(tahun_bj<=2008){
		tahun_bj=2008;
	}else if(tahun_bj<=2012){
		tahun_bj=2012;
	}else if(tahun_bj<=2014){
		tahun_bj=2014;
	}
								
								
	var ptkp_pribadi=eval("ptkp_"+tahun_bj+"[0]");
	var ptkp_kawin=eval("ptkp_"+tahun_bj+'[1]');
	var ptkp_anak=eval("ptkp_"+tahun_bj+'[3]')*comp_ptkp[1];
	
	if(comp_ptkp[0]=="K"){
		var ptkp=ptkp_pribadi+ptkp_kawin+ptkp_anak;
	}else{
		var ptkp=ptkp_pribadi+ptkp_anak;
	}
	
	
	
	//alert(ptkp);
	
	
	//---------------------PPH21-----------------------
	
	if (npwp=='Tidak'){
		var biaya=120/100;
	}else{
		var biaya=1;
	}
	
	
	
	var pkp = Math.floor((netto_thn-ptkp)/1000)*1000;
	
	if(pkp>500000000){
		var pph21=(((5/100)*50000000)+((15/100)*200000000)+((25/100)*250000000)+((30/100)*(pkp-500000000)))*biaya;
	}
	if(pkp>250000000){
		var pph21=(((5/100)*50000000)+((15/100)*200000000)+((25/100)*(pkp-250000000)))*biaya;
	}
	if(pkp>50000000){
		var pph21=(((5/100)*50000000)+((15/100)*(pkp-50000000)))*biaya;
	}else{
		var pph21=((5/100)*pkp)*biaya;
	}				
			
	if(pph21<0){
		pph21=0;
	}

	if(pkp<0){
		pkp=0;
	}
											
	var pph21_perbulan=Math.ceil(pph21/12);
	
	
	
	
	document.getElementById('premi_jkk').value = commaFormatted(new String(premi_jkk));
	document.getElementById('premi_jk').value = premi_jk;
	document.getElementById('premi_jht').value = premi_jht;
	document.getElementById('premi_jpk').value = premi_jpk;
	document.getElementById('premi_lainnya').value = premi_lainnya;
	document.getElementById('iuran_pensiun').value = iuran_pensiun;
	document.getElementById('iuran_jht').value = iuran_jht;
	document.getElementById('iuran_tht').value = iuran_tht;
	document.getElementById('bruto').value = commaFormatted(new String(bruto));
	document.getElementById('jabatan').value = commaFormatted(new String(jabatan));
	document.getElementById('pengurang').value = commaFormatted(new String(pengurang));
	document.getElementById('netto').value = commaFormatted(new String(netto));
	document.getElementById('netto_thn').value = commaFormatted(new String(netto_thn));
	document.getElementById('ptkp').value = commaFormatted(new String(ptkp));
	document.getElementById('pkp').value = commaFormatted(new String(pkp));
	document.getElementById('pph21').value = commaFormatted(new String(pph21));							
	document.getElementById('pph21_perbulan').value = commaFormatted(new String(pph21_perbulan));
	
	
}
</script>
<script>
  var xmlhttp=false;
  
  if (!xmlhttp && typeof XMLHttpRequest!='undefined')  {
  	 xmlhttp = new XMLHttpRequest();
  }
  
  function ngitung() {
  	 xmlhttp.open("GET", 'http://www.pajakonline.com/engine/simulasi/rumus_pph21.php?f=ptkp&tahun=' + document.getElementById('tahun_f').value + '&npwp=' + document.getElementById('npwp').value + '&netto=' + document.getElementById('netto_tahun').value + '&status=' + document.getElementById('kawin').value, true);
  	 xmlhttp.onreadystatechange=function() {
  		   if (xmlhttp.readyState==4) {
  				 document.getElementById('pph_21_tahun').value = xmlhttp.responseText;
  		   }
  	 }
  xmlhttp.send(null)
  return false;
  }
</script>


<!-- article -->
<div class="row">
	<div class="col-md-8">

		<h1 class="c-main-title u-mrgn-top--20"><?= $data['title'] ?></h1>
			
		<!-- Cover large -->
		

		<form method="post" action="" id="simulasi" name="simulasi" style="normal 10px 'Helveticaff', Helvetica, arial, sans-serif">
		  <table width="100%" border="0" cellspacing="0" cellpadding="2" height="100%" class="table table-striped">
		     <tbody>
		        <tr>
		           <td class="list_row" valign="top" colspan="4">
		              <div class="cat_linkart_dd" valign="top"><a name="login" style="color:#000;font-size:15px"><strong>Identitas &amp; Tahun Pajak</strong></a></div>
		           </td>
		        </tr>
		        <tr>
		           <td>Apakah Anda memiliki NPWP?</td>
		           <td>:</td>
		           <td>
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Bagi yang belum mempunyai NPWP akan dikenakan tambahan PPh Pasal 21 sebesar 20%.">
		           </td>
		           <td>
		              <span id="dok_select">
		                 <select name="npwp" id="npwp" class="inputbox_white" onchange="hitung()">
		                    <option value="">-</option>
		                    <option value="Tidak">Tidak</option>
		                    <option value="Ya">Ya</option>
		                 </select>
		              </span>
		           </td>
		        </tr>
		        <tr>
		           <td style="border: medium none ;" class="list_row" valign="top">Tahun Pajak </td>
		           <td style="border: medium none ;" class="list_row" valign="top" width="7px">:</td>
		           <td style="border: medium none ;" valign="top" width="7px">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Pilih tahun pajak atau tahun yang akan dihitung PPh Pasal 21.">
		           </td>
		           <td style="border: medium none ;" valign="top">
		              <span id="dok_select">
		                 <select name="tahun" id="tahun_f" class="form-control" onchange="hitung()">
		<?php
		 for($i=2004;$i<=date('Y');$i++){
		?>
		                    <option value="<?php echo $i?>" selected=""><?php echo $i?></option>
		<?php
		}
		?>										
		                 </select>
		              </span>
		           </td>
		        </tr>
		        <tr>
		           <td style="border: medium none ;" class="list_row" valign="top">Status Perkawinan</td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;" valign="top">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Pilih status perkawinan dan jumlah tanggungan (TK = Tidak Kawin; K = Kawin)">
		           </td>
		           <td style="border: medium none ;" valign="top">
		              <span id="dok_select">
		                 <select name="kawin" id="kawin" class="inputbox_white" onchange="hitung()">
		                    <option value="TK-0" selected="">TK-0</option>
		                    <option value="TK-1">TK-1</option>
		                    <option value="TK-2">TK-2</option>
		                    <option value="TK-3">TK-3</option>
		                    <option value="K-0">K-0</option>
		                    <option value="K-1">K-1</option>
		                    <option value="K-2">K-2</option>
		                    <option value="K-3">K-3</option>
		                 </select>
		              </span>
		              <span id="dok_topik_select"></span>		
		              <span id="dok_topik_tag_select"></span>	
		           </td>
		        </tr>
		        <tr>
		           <td class="list_row" valign="top" colspan="4">
		              <div class="cat_linkart_dd" valign="top" ><a name="login" style="color:#000;font-size:15px"><strong>Komponen Penghasilan</strong></a></div>
		           </td>
		        </tr>
		        <tr>
		           <td style="border: medium none ;" class="list_row" valign="top">1. Gaji Pokok Sebulan</td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;" valign="top">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi gaji yang diterima secara teratur dalam periode bulanan, mingguan (Gaji x 4), dan harian (Gaji x 26).">
		                 
		              </div>
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="gaji" id="gaji" onchange="hitung()" tabindex="1" size="18" type="text" value="0" class="inputbox_white">
		           </td>
		        </tr>	
		       
		        <tr>
		           <td style="border: medium none ;" class="list_row">2. Tunjangan Lainnya
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi tunjangan lainnya yang diberikan secara teratur oleh pemberi kerja (lembur, transportasi, komunikasi, dsb)">
		               
		              </div>
		           </td>
		           <td style="border: medium none ;"> <input name="tunj_lainnya" id="tunj_lainnya" onchange="hitung()" onkeyup="javascript:checkNumber(simulasi.tunj_lainnya);" value="0" tabindex="1" size="18" type="text" class="inputbox_white">
		           </td>
		        </tr>
		        <tr>
		           <td style="border: medium none ;" class="list_row">3. Premi yang Dibayarkan oleh Pemberi Kerja
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top"></td>
		           <td style="border: medium none ;">
		              
		           </td>
		           <td style="border: medium none ;">
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">a. Premi jaminan kecelakaan kerja (JKK)
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi premi JKK">
		               
		           </td>
		           <td style="border: medium none ;"> 
		<input name="premi_jkk" id="premi_jkk" onchange="hitung()" value="0" tabindex="1" size="18" type="text" class="inputbox_white">
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">b. Premi jaminan kematian (JK)
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi premi JK">
		                
		           </td>
		           <td style="border: medium none ;"> 
		<input name="premi_jk" id="premi_jk" onchange="hitung()" value="0" tabindex="1" size="18" type="text" class="inputbox_white">
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">c. Premi jaminan hari tua (JHT)
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi premi JHT">
		                
		           </td>
		           <td style="border: medium none ;"> <input name="premi_jht" id="premi_jht" onchange="hitung()"  value="0" tabindex="1" size="18" type="text" class="inputbox_white">
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">d. Premi jaminan pemeliharaan kesehatan (JPK)
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi premi JPK">
		                
		           </td>
		           <td style="border: medium none ;"> <input name="premi_jpk" id="premi_jpk" onchange="hitung()" value="0" tabindex="1" size="18" type="text" class="inputbox_white">
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">e. Premi lainnya
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi premi lainnya, seperti premi asuransi jiwa, asuransi dwiguna, asuransi bea siswa, dan sebagainya">
		                
		           </td>
		           <td style="border: medium none ;"> 
		<input name="premi_lainnya" id="premi_lainnya" onchange="hitung()" value="0" tabindex="1" size="18" type="text" class="inputbox_white">
		           </td>
		        </tr>
		        
		        
		       
		        <tr>
		           <td style="border: medium none ;" class="list_row"><strong>4. Total Penghasilan Bruto</strong>
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Jumlah Penghasilan Bruto (1+2+3)">
		                 
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="bruto" disabled="" id="bruto" onfocus="blur();" value="0" tabindex="1" size="18" type="text" class="inputbox_white" style="font-weight:bold; background-color:#DDD;">
		           </td>
		        </tr>
		        <tr>
		           <td class="list_row" valign="top" colspan="4">
		              <div class="cat_linkart_dd" valign="top" ><a name="login" style="color:#000;font-size:15px"><strong>Pengurangan</strong></a></div>
		           </td>
		        </tr>

		<tr>
		           <td style="border: medium none ;" class="list_row">5. Biaya Jabatan
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		             <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Biaya untuk mendapatkan, menagih, dan memelihara penghasilan yang besarnya 5% dari penghasilan bruto. (Maksimal Rp 500.000)">
		                
		              </div>
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="jabatan" disabled="" id="jabatan" onfocus="blur();" value="0" tabindex="1" size="18" type="text" class="inputbox_white" style="font-weight:bold; background-color:#DDD;">
		           </td>
		        </tr>

		<tr>
		           <td style="border: medium none ;" class="list_row">6. Iuran yang dibayar sendiri melalui pemberi kerja
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top"></td>
		           <td style="border: medium none ;">
		              
		           </td>
		           <td style="border: medium none ;">                                     
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">a. Iuran pensiun
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi iuran pensiun">
		                 
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="iuran_pensiun" id="iuran_pensiun" value="0" onchange="hitung()" tabindex="1" size="18" type="text" class="inputbox_white">
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">b. Iuran jaminan hari tua
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi Iuran jaminan hari tua">
		                 
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="iuran_jht" id="iuran_jht" value="0" onchange="hitung()" tabindex="1" size="18" type="text" class="inputbox_white">
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">c. Iuran tunjangan hari tua
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		             <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Isi Iuran tunjangan hari tua">
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="iuran_tht" id="iuran_tht" value="0" onchange="hitung()" tabindex="1" size="18" type="text" class="inputbox_white">
		           </td>
		        </tr>


		        
		        
		        <tr>
		           <td style="border: medium none ;" class="list_row"><strong><strong>7. Total Pengurang Penghasilan Bruto</strong></strong>
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Jumlah Pengurangan (5+6)">
		                 
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="pengurang" disabled="" id="pengurang" onfocus="blur();" value="0" tabindex="1" size="18" type="text" class="inputbox_white" style="font-weight:bold; background-color:#DDD;">
		           </td>
		        </tr>
		        <tr>
		           <td class="list_row" valign="top" colspan="4">
		              <div class="cat_linkart_dd" valign="top" >
		<a name="login" style="color:#000;font-size:15px"><strong>Penghitungan PPh Pasal 21 Terutang</strong></a>
		</div>
		           </td>
		        </tr>
		        <tr>
		           <td style="border: medium none ;" class="list_row">8. Jumlah Penghasilan Netto 
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top"></td>
		           <td style="border: medium none ;">
		              <div class="tooltip">

		                 <span class="tooltiptext">Jumlah Penghasilan Netto (4-8)</span>
		              </div>
		           </td>
		           <td style="border: medium none ;"> 
		              
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">   a. Sebulan
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Penghasilan Bruto - Pengurangnya (poin 4-7).">
		                 
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="netto" disabled="" id="netto" onfocus="blur();" value="0" tabindex="1" size="18" type="text" class="inputbox_white" style="font-weight:bold; background-color:#DDD;">
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">   b. Setahun
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Penghasilan Netto Sebulan x 12">
		               
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="netto_thn" disabled="" id="netto_thn" onfocus="blur();" value="0" tabindex="1" size="18" type="text" class="inputbox_white" style="font-weight:bold; background-color:#DDD;">
		           </td>
		        </tr>

		                                    
		<tr>
		           <td style="border: medium none ;" class="list_row">9. PTKP
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Penghasilan tidak kena pajak">
		                 
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="ptkp" disabled="" id="ptkp" onfocus="blur();" value="0" tabindex="1" size="18" type="text" class="inputbox_white" style="font-weight:bold; background-color:#DDD;">
		           </td>
		        </tr>
		<tr>
		           <td style="border: medium none ;" class="list_row">10. Penghasilan kena Pajak
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		             <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Penghasilan Netto Setahun dikurangi PTKP (8b-9).">
		               
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="pkp" disabled="" id="pkp" onfocus="blur();" value="0" tabindex="1" size="18" type="text" class="inputbox_white" style="font-weight:bold; background-color:#DDD;">
		           </td>
		        </tr>


		<tr>
		           <td style="border: medium none ;" class="list_row"><strong>11. PPh Pasal 21 Terutang Setahun</strong>
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="PPh Pasal 21 setahun">
		               
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="pph21" disabled="" id="pph21" onfocus="blur();" value="0" tabindex="1" size="18" type="text" class="inputbox_white" style="font-weight:bold; background-color:#DDD;">
		           </td>
		        </tr>
		        <tr>
		           <td style="border: medium none ;" colspan="4" class="list_row">
		              <hr>
		           </td>
		        </tr>
		        <tr>
		           <td style="border: medium none ;" class="list_row"><strong><strong>12. PPh Pasal 21 Terutang Sebulan</strong></strong>
		           </td>
		           <td style="border: medium none ;" class="list_row" valign="top">:</td>
		           <td style="border: medium none ;">
		              <img src="<?= base_url(); ?>assets/images/question.png" width="20px" class="tooltip-bottom" title="Jumlah PPh Pasal 21 terutang yang dipotong oleh pemberi kerja per bulan.">
		                
		           </td>
		           <td style="border: medium none ;"> 
		              <input name="pph21_perbulan" id="pph21_perbulan" onfocus="blur();" value="0" tabindex="1" size="30" type="text" class="inputbox_white" style="font-weight:bold; background-color:#DDD;">
		           </td>
		        </tr>
		        <tr>
		           <td colspan="4" align="center"><br>		                                      
		              <input value="Reset" type="reset" class="btn btn-danger">
		           </td>
		        </tr>
		     </tbody>
		  </table>
		</form>
		

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
                      <?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12') { ?>
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

