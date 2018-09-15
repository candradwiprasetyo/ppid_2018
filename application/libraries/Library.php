<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Library
{
    function format_date($tanggal)
    {
        $tgl=substr($tanggal,8,2);
        $bulan=substr($tanggal,5,2);
        $tahun=substr($tanggal,0,4);

        $waktu=substr($tanggal,10,9);
        if(strlen($waktu)>0){
        $twaktu=explode(":",$waktu);
        $jam=$twaktu[0];
        $menit=$twaktu[1];
        $detik=$twaktu[2];
        if ($jam>24){
            $jam=$twaktu[0]-24;
        }
        //$waktu=$jam.':'.$menit.':'.$detik;
        $waktu=$jam.':'.$menit;
        }


        $hari=date('w',mktime(0,0,0,$bulan,$tgl,$tahun));

        switch ($hari) {
        case 0: $hari="Minggu";
        break;
        case 1: $hari="Senin";
        break;
        case 2: $hari="Selasa";
        break;
        case 3: $hari="Rabu";
        break;
        case 4: $hari="Kamis";
        break;
        case 5: $hari="Jum'at";
        break;
        case 6: $hari="Sabtu";
        break;
        }
        switch ($bulan) {
        case 1: $bulan="Januari";
        break;
        case 2: $bulan="Februari";
        break;
        case 3: $bulan="Maret";
        break;
        case 4: $bulan="April";
        break;
        case 5: $bulan="Mei";
        break;
        case 6: $bulan="Juni";
        break;
        case 7: $bulan="Juli";
        break;
        case 8: $bulan="Agustus";
        break;
        case 9: $bulan="September";
        break;
        case 10: $bulan="Oktober";
        break;
        case 11: $bulan="November";
        break;
        case 12: $bulan="Desember";
        break;
        }

        if ($waktu) {
            $result = "$hari, $tgl $bulan $tahun | $waktu WIB";
        } else {
            $result = "$hari, $tgl $bulan $tahun";
        }
        
        return $result;
    }

    function get_author($caption)
    {
        $break = explode(',', $caption);
        return $break[0];
    }

    function get_taicing($data)
    {
        return strip_tags($data);
    }

    function get_image($data, $type)
    {
        if ($type == '1') {
            $path = 'assets/images/thumb/';
        } else if ($type == '2') {
            $path = 'assets/images/view/';
        } else if ($type == '3') {
            $path = 'assets/images/ori/';
        }

        $image = $path.$data;

        if (file_exists($image)) {
            return base_url().$image;
        } else {
            return base_url().'assets/images/error-404.png';
        }
    }

    function check_image($image)
    {
        if (file_exists($image)) {
            return base_url().$image;
        } else {
            return base_url().'assets/images/error-404.png';
        }
    }

    function get_url_news($id, $title) {
        $search = array('\'',"quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
        $replace = array('',"","","","","","-","-","","","","","","","","","","","","","","","-","",""); 
                         
        $seo=str_replace("\\","",(str_replace($search, $replace, strtolower($title))));     
        $seo = str_replace(" ", "-", $seo);
        $seo = str_replace("@", "", $seo);
        $seo = $seo."-".$id;
        $seo = preg_replace('/[[:^print:]]/', '', $seo);
        return $seo;


    }

    function get_url_focus($id, $title) {
        $search = array('\'',"quot",".","(",")","'", "\"","/", ":", ",", "!", ".", "$", "'", "+", "%", "&",'lsquo;',"rsquo;","?","rlm;",";", " ","<i>","</i>");  
        $replace = array('',"","","","","","-","-","","","","","","","","","","","","","","","-","",""); 
                         
        $seo=str_replace("\\","",(str_replace($search, $replace, strtolower($title))));     
        $seo = str_replace(" ", "-", $seo);
        $seo = str_replace("@", "", $seo);
        $seo = $seo."-".$id;
        $seo = preg_replace('/[[:^print:]]/', '', $seo);
        return $seo;
    }

    function get_format_meta($title) {
        $search = array('"', "'");  
        $replace = array('', ''); 
                         
        $seo=str_replace("\\","",(str_replace($search, $replace, $title)));
        return $seo;
    }

    function get_news_url_replace($data) {
        
        
        $needle = 'news.ddtc.co.id/artikel';
        if (count(explode($needle, $data)) > 1) {
            $o = explode("//", $data);
            $o2 = explode("/", $o[1]);

            $new_url = 'href="'.base_url().$o2[3].'-'.$o2[2].'">';

            return $new_url;

        } else {
            return $data;
        }
        
    }

    function get_header_category() {
        $ci =& get_instance();
        $ci->db->select('*');
        $ci->db->from('tbl_category');
        $ci->db->where('STATUS=1');
        $ci->db->order_by(' NO ASC ');
        return $ci->db->get()->result();
    }

    function get_header_subcategory($category_id='') {
        $ci =& get_instance();
        $ci->db->select('*');
        $ci->db->from('tbl_subcategory');
        $ci->db->where('STATUS=1');    
        if ($category_id) {
            $ci->db->where("CATEGORY_ID='".$category_id."'");
        }
        $ci->db->order_by(' ID ASC ');
        return $ci->db->get()->result();
    }

    function get_news_header($category_id='', $subcategory_id='') {
        $ci =& get_instance();
        $ci->db->select('*');
        $ci->db->from('tbl_article');
        $ci->db->where('STATUS=1 and PUBLISH_TIMESTAMP <= Now()');
        $ci->db->where("PREVIEW IS NULL");
        if ($category_id) {
            $ci->db->where("CATEGORY='".$category_id."'");
        }
        if ($subcategory_id) {
            $ci->db->where("SUBCATEGORY='".$subcategory_id."'");
        }
        //$ci->db->where(" `PUBLISH_TIMESTAMP` < '2017-10-1'");
        $ci->db->order_by(' PUBLISH_TIMESTAMP DESC ');
        $ci->db->limit(3);
      
        return $ci->db->get()->result();
    }

    function get_count_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='', $keyword='', $date='') {
        
        $ci =& get_instance();
        $ci->db->select(' count(1) as TOTAL');
        $ci->db->from('tbl_article');
        $ci->db->where('STATUS=1 and PUBLISH_TIMESTAMP <= Now()');
        $ci->db->where("PREVIEW IS NULL");
        if ($category) {
            $ci->db->where("CATEGORY='".$category."'");
        }
        if ($subcategory) {
            $ci->db->where("SUBCATEGORY='".$subcategory."'");
        }
        if ($keyword) {
            $ci->db->where("KEYWORD like '%".$keyword."%'");
        }
        if ($date) {
            $ci->db->where("date(PUBLISH_TIMESTAMP)='".$date."'");
        }
        //$ci->db->where(" `PUBLISH_TIMESTAMP` < '2017-10-1'");
        $ci->db->order_by(' PUBLISH_TIMESTAMP DESC ');
        //$ci->db->limit(12);
        //$ci->output->enable_profiler(TRUE);
        return $ci->db->get()->result();
    }

    function get_count_quiz($start=0, $end='', $date='') {
        
        $ci =& get_instance();
        $ci->db->select(' count(1) as TOTAL');
        $ci->db->from('tbl_quiz');
        $ci->db->where('STATUS=1');
        if ($date) {
            $ci->db->where("start_date <= '".$date."' and end_date >= '".$date."'");
        }
        $ci->db->order_by(' ID DESC ');
        //$ci->output->enable_profiler(TRUE);
        return $ci->db->get()->result();
    }

    function get_meta($data, $type) {
        switch ($type) {
            case 1:
                if ($data) {
                    return $this->get_format_meta($data);
                } else {
                    return 'Website PPID DPM PTSP Jawa Timur';
                }
            break;

            case 2:
                // meta image
                if ($data) {
                    return $data;
                } else {
                    return base_url().'assets/images/meta_images.jpg';
                }
            break;

            case 3:
                // meta keyword
                if ($data) {
                    return $this->get_format_meta($data);
                } else {
                    return "Website PPID DPM PTSP Jawa Timur";
                }
            break;

            case 4:
                // meta description
                if ($data) {
                    return $this->get_format_meta($data);
                } else {
                    return "Website PPID DPM PTSP Jawa Timur";
                }
            break;
        }
    }

    function get_doc_url($type, $seo) {
        $url = $result="http://engine.ddtc.co.id/".$type.'/read/'.$seo;
        return $url;
    }

    function filter_only($text){
        $string=null;
        $string = preg_replace('/[^a-zA-Z0-9 -@,_.:{}!]+/', '', $text);

        return $string;
    }

    function get_reporter($id) {
        $ci =& get_instance();
        $sql = "select REPORTER as result from tbl_article where ID = '$id'";    
        $query = $ci->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        $reporter = $result['result'];

        $reporter_name = '';
        if ($reporter) {
            $sql = "select FULLNAME as result from tbl_writer where EMAIL = '$reporter'";    
            $query = $ci->db->query($sql);       
            $result = null;
            foreach ($query->result_array() as $row) $result = ($row);
            $reporter_name = $result['result'];
        }
        return $reporter_name;
    }

    function create_thumbnail_preserve_ratio($source, $destination, $thumbWidth)
    {
        //$extension = get_image_extension($source);
        $extension = pathinfo($source, PATHINFO_EXTENSION);
        $size = getimagesize($source);
        $imageWidth  = $size[0];
        $imageHeight = $size[1];
        $newWidth  = 250;
        $newheight = 170;   
        
        
        
        if ($imageWidth > $thumbWidth || $imageHeight > $thumbWidth)
        {
            // Calculate the ratio
            $xscale = ($imageWidth/$thumbWidth);
            $yscale = ($imageHeight/$thumbWidth);
            $newWidth  = ($yscale > $xscale) ? round($imageWidth * (1/$yscale)) : round($imageWidth * (1/$xscale));
            $newHeight = ($yscale > $xscale) ? round($imageHeight * (1/$yscale)) : round($imageHeight * (1/$xscale));
            
            
            $newImage = imagecreatetruecolor($newWidth, $newHeight);

        switch ($extension)
        {
            case 'jpeg':
            case 'jpg':
                $imageCreateFrom = 'imagecreatefromjpeg';
                $store = 'imagejpeg';
                break;

            case 'png':
                $imageCreateFrom = 'imagecreatefrompng';
                $store = 'imagepng';
                break;

            case 'gif':
                $imageCreateFrom = 'imagecreatefromgif';
                $store = 'imagegif';
                break;

            default:
                return false;
        }

        $container = $imageCreateFrom($source);
        imagecopyresampled($newImage, $container, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);
        return $store($newImage, $destination);
        }else{
            //error_log("ukuran gambar kekecilan", 3, "/var/tmp/jurnas-debug.log");
        }

        
    }

    function check_status_publish($id) {
        $ci =& get_instance();
        $sql = "select STATUS_PUBLISH as result from tbl_article where ID = '$id'";    
        $query = $ci->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        $result = $result['result'];
        //$ci->output->enable_profiler(TRUE);
        return $result;
    }

    function edit_status_publish($id)
    {
        $ci =& get_instance();
        $data = array(
            "STATUS_PUBLISH" => '1',
        );
        $ci->db->where('ID', $id);
        $ci->db->update('tbl_article', $data);
    }

}
