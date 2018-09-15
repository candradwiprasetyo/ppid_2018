<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminBerita extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('library');
    }

    public function index()
    {        
        $this->view('webmin/berita/index');
    }

    public function ajax()
    {
        $list = $this->M_Berita->get_datatables();
        $data = array();
        $ddtc = unserialize(base64_decode(get_cookie('ddtc')));
        foreach ($list as $berita) {
            $row = array();
            $temp = explode(" ", $berita->PUBLISH_TIMESTAMP);
            $date = explode("-", $temp[0]);
            $row[] = $berita->ID;
            $url_tittle = str_replace(" ", "-", $berita->TITLE)."/";
            $row[] = $berita->UPPERDECK.' <br/><a href="'.base_url().$this->library->get_url_news($berita->ID, $berita->TITLE).'" target="_blank">'.$berita->TITLE.'</a>'; 
            //$row[] = $berita->UPPERDECK.' <br/><a href="http://news.ddtc.co.id/artikel/'.$berita->ID.'/'.$url_tittle.'">'.$berita->TITLE.'</a>'; 

            $row[] = '<img src="'.site_url("assets/images/thumb/".$berita->IMAGE).'" width="60px" />';
            $row[] = $berita->CATEGORY_NAME." <br/> -".$berita->SUBCATEGORY_NAME;
            $row[] = isset($temp[0]) ? $date[2].'-'.$date[1].'-'.$date[0].'<br>'.$temp[1] : "";

            if($berita->STICKY == 1)
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';

            if($berita->STATUS == 1)
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';

            if($berita->TIPE == 'HEADLINE')
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';

            if($berita->EDITORPICK == 1)
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';

            $row[] = $berita->HIT;
            $action = '<a href="'.site_url('webmin/berita/edit/'.$berita->ID).'"><button type="button" class="btn btn-info">Edit</button></a>'; 
            
            if($berita->SUBCATEGORY=='26')
                $action .= '<a style="margin-left:10px" href="'.site_url('webmin/berita/image/'.$berita->ID).'"><button type="button" class="btn btn-success">Image</button></a>'; 
            
            if($ddtc['ROLE'] == "superadmin")
                $action.= '<a style="margin-left:10px" onclick="hapus('.$berita->ID.')"><button type="button" class="btn btn-danger">Hapus</button></a>';

            $row[] = $action;
            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Berita->count_all(),
                        "recordsFiltered" => $this->M_Berita->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        $data = $this->M_Berita->getdata(['tbl_article.ID'=> $id], 'single');
        $categoy = $this->M_Category->getdata();
        $subcategory = $this->M_SubCategory->getdata();
        $catAll = [];
        foreach ($categoy as $key => $value) {            
            $catAll[$value['ID']]['name'] = $value['CATEGORY_NAME'];
        }

        foreach ($subcategory as $key => $value) {
            $tot = 0;
            
            if(isset($catAll[$value['CATEGORY_ID']]['subcategory']))
            {
                $tot = count($catAll[$value['CATEGORY_ID']]['subcategory']);
            
                if($tot != 0)
                    $tot++;    
            }
            
            $catAll[$value['CATEGORY_ID']]['subcategory'][$tot] = $value;
        }

        $reporter = $this->M_Writer->getdata(['STATUS'=> 2]);
        $redaktur = $this->M_Writer->getdata(['STATUS'=> 1]);

        $this->view('webmin/berita/edit', ['data' => $data, 'category' => $catAll, 'reporter' => $reporter, 'redaktur' => $redaktur]);
    }

    public function send_push_notification($icon, $image, $title, $content, $url) {
        
        $fields = array(
            'app_id' => "9bb72fba-163f-41ab-8347-78319793e632",
            'included_segments' => array('All'),
            'data' => array("foo" => "bar"),
            'contents' => $content = array(
                            "en" => $content
                            ),
            'headings' => array(
                            "en" => $title
                            ),
            'url' => $url,
            'chrome_web_icon' => 'https://news.ddtc.co.id/assets/images/favicon-highres.png',
            //'chrome_web_image' => $image,
        );
        
        $fields = json_encode($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic NTc2NDVlNDAtYWFhMi00NWVmLTkxYzItMmYyZTk5OTliNDMw'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
    }

     public function send_push() {
        
        $fields = array(
            'app_id' => "9bb72fba-163f-41ab-8347-78319793e632",
            'included_segments' => array('All'),
            'data' => array("foo" => "bar"),
            'contents' => $content = array(
                            "en" => 'Berita Pajak Terbaru, Peraturan dan Analisis Pajak.'
                            ),
            'headings' => array(
                            "en" => 'DDTCNews'
                            ),
            'url' => 'https://news.ddtc.co.id',
            'chrome_web_icon' => 'https://news.ddtc.co.id/assets/images/favicon-highres.png',
            'chrome_web_image' => 'https://news.ddtc.co.id/assets/images/favicon-highres.png',
            'chrome_web_badge' => 'https://news.ddtc.co.id/assets/images/favicon-72.png',
        );
        
        $fields = json_encode($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic NTc2NDVlNDAtYWFhMi00NWVmLTkxYzItMmYyZTk5OTliNDMw'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
    }

    public function add()
    {
        $categoy = $this->M_Category->getdata();
        $subcategory = $this->M_SubCategory->getdata();
        $catAll = [];
        foreach ($categoy as $key => $value) {            
            $catAll[$value['ID']]['name'] = $value['CATEGORY_NAME'];
        }

        foreach ($subcategory as $key => $value) {
            $tot = 0;
            
            if(isset($catAll[$value['CATEGORY_ID']]['subcategory']))
            {
                $tot = count($catAll[$value['CATEGORY_ID']]['subcategory']);
            
                if($tot != 0)
                    $tot++;    
            }
            
            $catAll[$value['CATEGORY_ID']]['subcategory'][$tot] = $value;
        }

        $reporter = $this->M_Writer->getdata(['STATUS'=> 2]);
        $redaktur = $this->M_Writer->getdata(['STATUS'=> 1]);

        $this->view('webmin/berita/add', ['category' => $catAll, 'reporter' => $reporter, 'redaktur' => $redaktur]);   
    }

    

    public function update()
    {

        if($_FILES['photo']['size'] > 0)
        {
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $file = str_replace(" ", "", $file);
            $target_ori = "assets/images/ori/";
            $target_dir = "assets/images/thumb/";
            $target_view = "assets/images/view/";
            $target_file1 = $target_ori.$file;
            $target_file2 = $target_dir.$file;
            $target_file3 = $target_view.$file;
            // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file1)){
                // copy($target_file, $target_file2);
                if(!$this->library->create_thumbnail_preserve_ratio($target_file1, $target_file2, '300')){
                    copy($target_file1, $target_file2);
                }
                if(!$this->library->create_thumbnail_preserve_ratio($target_file1, $target_file3, '800')){
                    copy($target_file1, $target_file3);
                }
            }
            
            $filename = $file;
        } else {
            $filename = $_POST['image'];            
        }

        $SubCategory = $this->M_SubCategory->getdata(['tbl_subcategory.ID'=> $_POST['category']], 'single');
        $date = explode("-", $_POST['publish_date']);
        $data = array(
            "CATEGORY"              => isset($SubCategory->CATEGORY_ID) ? $SubCategory->CATEGORY_ID : "",
            "SUBCATEGORY"           => $_POST['category'],
            "UPPERDECK"             => $_POST['upperdeck'],
            "TITLE"                 => $_POST['title'],
            "TAICING"               => $_POST['taicing'],
            "CONTENT"               => $_POST['editor1'],
            "REPORTER"              => $_POST['reporter'],
            "REDAKTUR"              => $_POST['redaktur'],
            "TIPE"                  => $_POST['type'],
            "EDITORPICK"            => $_POST['editor_pick'],
            "VIDEO"                 => $_POST['youtube_url'],
            "IMAGE"                 => $filename,
            "CAPTION"               => $_POST['caption'],
            "STATUS"                => $_POST['status'],
            "PUBLISH_TIMESTAMP"     => $date[2].'-'.$date[1].'-'.$date[0]." ".$_POST['publish_time'],
            "KEYWORD"               => $_POST['keyword'],
            "TINYURL"               => "",
            "STICKY"                => $_POST['sticky'],
        );

        

        if($_POST['saveData'] == 'submit') {
            $data['PREVIEW'] = null;
            $resut = $this->M_Berita->update($this->input->post('id'), $data, 'tbl_article.ID');
            $check_status_publish = $this->library->check_status_publish($this->input->post('id'));
            
            if ($_POST['status'] == '1' && $check_status_publish == '0') { 
                $this->send_push_notification(
                    base_url().'assets/images/thumb/'.$filename, 
                    base_url().'assets/images/view/'.$filename, 
                    $_POST['title'], 
                    $_POST['taicing'],
                    base_url().$this->library->get_url_news($this->input->post('id'), $_POST['title'])
                );
                $this->library->edit_status_publish($this->input->post('id'));
            }
            redirect('webmin/berita');
        } else if($_POST['saveData'] == 'preview') {
            
            $data['PREVIEW'] = 1;

            $resut = $this->M_Berita->update($this->input->post('id'), $data, 'tbl_article.ID'); 

            $slug = $this->M_Berita->get_slug($this->input->post('id'));
            $url = $this->library->get_url_news($this->input->post('id'), $slug);

            redirect('preview/'. $url);
        }
    }

    public function store()
    {
        if($_FILES['photo']['size'] > 0)
        {
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $file = str_replace(" ", "", $file);
            $target_ori = "assets/images/ori/";
            $target_dir = "assets/images/thumb/";
            $target_view = "assets/images/view/";
            $target_file1 = $target_ori.$file;
            $target_file2 = $target_dir.$file;
            $target_file3 = $target_view.$file;
            // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file1)){
                // copy($target_file, $target_file2);
                if(!$this->library->create_thumbnail_preserve_ratio($target_file1, $target_file2, '300')){
                    copy($target_file1, $target_file2);
                }
                if(!$this->library->create_thumbnail_preserve_ratio($target_file1, $target_file3, '800')){
                    copy($target_file1, $target_file3);
                }
            }
            
            $filename = $file;
        } else {
            $filename = "";            
        }

        $SubCategory = $this->M_SubCategory->getdata(['tbl_subcategory.ID'=> $_POST['category']], 'single');
        $date = explode("-", $_POST['publish_date']);
        $data = array(
            "CATEGORY"              => isset($SubCategory->CATEGORY_ID) ? $SubCategory->CATEGORY_ID : "",
            "SUBCATEGORY"           => $_POST['category'],
            "UPPERDECK"             => $_POST['upperdeck'],
            "TITLE"                 => $_POST['title'],
            "TAICING"               => $_POST['taicing'],
            "CONTENT"               => $_POST['editor1'],
            "REPORTER"              => $_POST['reporter'],
            "REDAKTUR"              => $_POST['redaktur'],
            "TIPE"                  => $_POST['type'],
            "EDITORPICK"            => $_POST['editor_pick'],
            "VIDEO"                 => $_POST['youtube_url'],
            "IMAGE"                 => $filename,
            "CAPTION"               => $_POST['caption'],
            "STATUS"                => $_POST['status'],
            "PUBLISH_TIMESTAMP"     => $date[2].'-'.$date[1].'-'.$date[0]." ".$_POST['publish_time'],
            "KEYWORD"               => $_POST['keyword'],
            "TINYURL"               => "",
            "HIT"                   => 0,
            "STICKY"                => $_POST['sticky'],
            "STATUS_PUBLISH"        => 0,
        );

        if($_POST['saveData'] == 'submit') {
            $resut = $this->M_Berita->insert($data);

            if ($_POST['status'] == '1') {
                $this->send_push_notification(
                    base_url().'assets/images/thumb/'.$filename, 
                    base_url().'assets/images/view/'.$filename, 
                    $_POST['title'], 
                    $_POST['taicing'],
                    base_url().$this->library->get_url_news($resut, $_POST['title'])
                );
                $this->library->edit_status_publish($resut);
            }
            
            redirect('webmin/berita');
        } else if($_POST['saveData'] == 'preview') {
            $data['PREVIEW'] = 1;
            $resut = $this->M_Berita->insert($data);

            $slug = $this->M_Berita->get_slug($resut);
            $url = $this->library->get_url_news($resut, $slug);

            redirect('preview/'. $url);
        }
    }

    public function destroy(){
        $id = $this->uri->segment(4);
        $this->M_Berita->delete($id);
        redirect('webmin/berita');
    }

    public function subImage()
    {
        $this->view('webmin/berita/subImage');        
    }

    public function imageAjax()
    {
        $this->M_TblAddImage->ARTICLE_ID = $_POST['ARTICLE_ID'];
        $list = $this->M_TblAddImage->get_datatables();
        $data = array();
        $no=0;
        foreach ($list as $berita) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $berita->CAPTION;
            $row[] = $berita->SEQNUMBER;
            $row[] = '<img src="'.site_url("assets/images/view/".$berita->IMAGE).'" width="60px" />';
            $row[] = '
                <a onclick="showModal(\'edit\', '.$berita->ID.')"><button type="button" class="btn btn-info">Edit</button></a>
                <a onclick="hapus('.$berita->ARTICLE_ID.', '.$berita->ID.')"><button type="button" class="btn btn-danger">delete</button></a>
            ';
            
            $data[] = $row;       
        }

        $output = array(
                "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                "recordsTotal" => $this->M_TblAddImage->count_all(),
                "recordsFiltered" => $this->M_TblAddImage->count_filtered(),
                "data" => $data,
        );

        echo json_encode($output);
    }

    public function editImage()
    {
        $data = $this->M_TblAddImage->getdata(['ID'=> $this->uri->segment(5)], 'single');
        echo json_encode($data);
    }

    public function putImage()
    {
        if($_FILES['photo']['size'] > 0)
        {
            $target_dir = "assets/images/view/";
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $target_file = $target_dir.$file;;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $filename = $file;
        } else {
            $filename = $_POST['image'];            
        }

        $data = array(
            "CAPTION"               => $_POST['caption'],
            "SEQNUMBER"             => $_POST['urut'],            
            "IMAGE"                 => $filename,
        );

        $resut = $this->M_TblAddImage->update($this->input->post('id'), $data);
        echo 1;
    }

    public function storeImage()
    {
        if($_FILES['photo']['size'] > 0)
        {
            $target_dir = "assets/images/view/";
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $target_file = $target_dir.$file;;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $filename = $file;
        } else {
            $filename = $_POST['image'];            
        }

        $data = array(
            "CAPTION"               => $_POST['caption'],
            "SEQNUMBER"             => $_POST['urut'],            
            "IMAGE"                 => $filename,
            "STATUS"                 => 1,
            "ARTICLE_ID"                 => $_POST['id_article'],
        );

        $resut = $this->M_TblAddImage->insert($data);
        echo $resut;
    }

    public function destroyImage()
    {
        $article_id = $this->uri->segment(5);
        $id = $this->uri->segment(6);
        $data = $this->M_TblAddImage->getdata(['ID'=> $this->uri->segment(6)], 'single');

        if($data->IMAGE !="")
        {            
            $file = "assets/images/view/".$data->IMAGE;
            if (file_exists($file)) {
                 unlink($file);
            }

            $file = "assets/view/view/".$data->IMAGE;
            if (file_exists($file)) {
                 unlink($file);
            }

            $file = "assets/thumb/view/".$data->IMAGE;
            if (file_exists($file)) {
                 unlink($file);
            }            
        }
        
        $this->M_TblAddImage->delete($id);
        redirect('webmin/berita/image/'.$article_id);
    }
}