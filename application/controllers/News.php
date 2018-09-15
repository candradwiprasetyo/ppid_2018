<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->library('library');
        $this->load->library('user_agent');
    }

    public function news_detail($slug=false)
    {   
        $meta['title'] = '';
        $meta['image'] = '';
        $meta['description'] = '';
        $meta['keyword'] = '';
        
        $exploded = explode('-', $slug);
        $id = end($exploded);


        $news_detail = $this->News_model->get_news('', '1', '', '', '', $id);
        $get_data_readcrumb = $this->News_model->get_data_readcrumb($id);

        $this->News_model->set_counter($id);

        

        if (count($news_detail) > 0){
          $category = $news_detail[0]->CATEGORY;
          if ($news_detail[0]->SUBCATEGORY == 1 || $news_detail[0]->SUBCATEGORY == 2 || $news_detail[0]->SUBCATEGORY == 3) {
            $terpopuler = $this->News_model->get_news_popular_home('', '5', $category, $news_detail[0]->SUBCATEGORY);
          } else {
            $terpopuler = $this->News_model->get_news_popular('', '5', $category, $news_detail[0]->SUBCATEGORY);
          }
          
          $artikel_terkait = $this->News_model->get_news('', '4', '', $category, $news_detail[0]->SUBCATEGORY, '', '', '', '', '', $id, '', true);
          $counter_share = $this->News_model->get_counter_share($id);
          $tax_engine_banner = $this->News_model->get_banner('', '1', 'section-1', '');
          $academy_banner = $this->News_model->get_banner('', '1', 'section-3', '');
          $detail_news_banner = $this->News_model->get_banner('', '2', 'bottom-detail-news', '');
          $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

          $meta['title'] = $news_detail[0]->TITLE;
          
          if ($this->agent->is_mobile()){
            $meta['image'] = base_url().'assets/images/thumb/'.$news_detail[0]->IMAGE;
          } else {
            $meta['image'] = base_url().'assets/images/view/'.$news_detail[0]->IMAGE;
          }
          
          $meta['description'] = $this->library->get_taicing($news_detail[0]->TAICING);
          $meta['keyword'] = $news_detail[0]->KEYWORD;

          $editorpick = $this->News_model->get_news('', '10', '', '', $news_detail[0]->SUBCATEGORY, '', '1', '', '', '', $id, '', true);

          $read_too = '';
          if ($news_detail[0]->KEYWORD != ''){
            $read_too = $this->News_model->get_news(0, 100, '', '', '', '', '', $news_detail[0]->KEYWORD, '', '', $id);
          }
        }

        $this->load->view('layouts/header', $array = array('meta' => $meta));

        if (count($news_detail) > 0){
          if ($news_detail[0]->SUBCATEGORY == '26') {

            $foto_slider = $this->News_model->get_foto('', '', $news_detail[0]->ID);

            $this->load->view('layouts/foto', $array = array(
                'news_detail' => $news_detail,
                'terpopuler' => $terpopuler,
                'artikel_terkait' => $artikel_terkait,
                'editorpick' => $editorpick,
                'counter_share' => $counter_share,
                'foto_slider' => $foto_slider,
                'get_data_readcrumb' => $get_data_readcrumb,
                'berita_terbaru' => $berita_terbaru,
            ));
          } else if ($news_detail[0]->SUBCATEGORY == '28') {

            $this->load->view('layouts/video', $array = array(
                'news_detail' => $news_detail,
                'terpopuler' => $terpopuler,
                'artikel_terkait' => $artikel_terkait,
                'editorpick' => $editorpick,
                'counter_share' => $counter_share,
                'get_data_readcrumb' => $get_data_readcrumb,
            ));
          } else if ($news_detail[0]->SUBCATEGORY == '4') {

            $this->load->view('layouts/infografis', $array = array(
                'news_detail' => $news_detail,
                'terpopuler' => $terpopuler,
                'artikel_terkait' => $artikel_terkait,
                'editorpick' => $editorpick,
                'counter_share' => $counter_share,
                'get_data_readcrumb' => $get_data_readcrumb,
                'berita_terbaru' => $berita_terbaru,
            ));
          } else {
            $this->load->view('layouts/news', $array = array(
                'news_detail' => $news_detail,
                'terpopuler' => $terpopuler,
                'artikel_terkait' => $artikel_terkait,
                'editorpick' => $editorpick,
                'counter_share' => $counter_share,
                'tax_engine_banner' => $tax_engine_banner,
                'academy_banner' => $academy_banner,
                'detail_news_banner' => $detail_news_banner,
                'get_data_readcrumb' => $get_data_readcrumb,
                'berita_terbaru' => $berita_terbaru,
                'read_too' => $read_too,
            ));
          }
        } else {
          $this->load->view('layouts/error_page');
        }
        $this->load->view('layouts/footer');
    }

    public function preview($slug=false)
    {   
        $meta['title'] = '';
        $meta['image'] = '';
        $meta['description'] = '';
        $meta['keyword'] = '';
        
        $exploded = explode('-', $slug);
        $id = end($exploded);

        //function get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='', $keyword='', $date='', $sticky='', $no_id='', $preview='')

        $news_detail = $this->News_model->get_news('', '1', '', '', '', $id, '', '', '', '', '', '1');
        $this->News_model->set_counter($id);
        $get_data_readcrumb = $this->News_model->get_data_readcrumb($id);

        if (count($news_detail) > 0){
          $category = $news_detail[0]->CATEGORY;
          if ($news_detail[0]->SUBCATEGORY == 1 || $news_detail[0]->SUBCATEGORY == 2 || $news_detail[0]->SUBCATEGORY == 3) {
            $terpopuler = $this->News_model->get_news_popular_home('', '5', $category, $news_detail[0]->SUBCATEGORY);
          } else {
            $terpopuler = $this->News_model->get_news_popular('', '5', $category, $news_detail[0]->SUBCATEGORY);
          }
          $artikel_terkait = $this->News_model->get_news('', '4', '', $category, $news_detail[0]->SUBCATEGORY, '', '', '', '', '', $id, '', true);
          $counter_share = $this->News_model->get_counter_share($id);
          $tax_engine_banner = $this->News_model->get_banner('', '1', 'section-1', '');
          $academy_banner = $this->News_model->get_banner('', '1', 'section-3', '');
          $detail_news_banner = $this->News_model->get_banner('', '2', 'bottom-detail-news', '');
          $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

          $meta['title'] = $news_detail[0]->TITLE;
          
          if ($this->agent->is_mobile()){
            $meta['image'] = base_url().'assets/images/thumb/'.$news_detail[0]->IMAGE;
          } else {
            $meta['image'] = base_url().'assets/images/view/'.$news_detail[0]->IMAGE;
          }
          
          $meta['description'] = $this->library->get_taicing($news_detail[0]->TAICING);
          $meta['keyword'] = $news_detail[0]->KEYWORD;

          $editorpick = $this->News_model->get_news('', '10', '', '', $news_detail[0]->SUBCATEGORY, '', '1', '', '', '', $id, '', true);

          $read_too = '';
          if ($news_detail[0]->KEYWORD != ''){
            $read_too = $this->News_model->get_news(0, 100, '', '', '', '', '', $news_detail[0]->KEYWORD, '', '', $id);
          }
        }

        $this->load->view('layouts/header', $array = array('meta' => $meta));

        if (count($news_detail) > 0){
          if ($news_detail[0]->SUBCATEGORY == '26') {

            $foto_slider = $this->News_model->get_foto('', '', $news_detail[0]->ID);

            $this->load->view('layouts/foto', $array = array(
                'news_detail' => $news_detail,
                'terpopuler' => $terpopuler,
                'artikel_terkait' => $artikel_terkait,
                'editorpick' => $editorpick,
                'counter_share' => $counter_share,
                'foto_slider' => $foto_slider,
                'get_data_readcrumb' => $get_data_readcrumb,
                'berita_terbaru' => $berita_terbaru,
            ));
          } else if ($news_detail[0]->SUBCATEGORY == '28') {

            $this->load->view('layouts/video', $array = array(
                'news_detail' => $news_detail,
                'terpopuler' => $terpopuler,
                'artikel_terkait' => $artikel_terkait,
                'editorpick' => $editorpick,
                'counter_share' => $counter_share,
                'get_data_readcrumb' => $get_data_readcrumb,
                'berita_terbaru' => $berita_terbaru,
            ));
          } else if ($news_detail[0]->SUBCATEGORY == '4') {

            $this->load->view('layouts/infografis', $array = array(
                'news_detail' => $news_detail,
                'terpopuler' => $terpopuler,
                'artikel_terkait' => $artikel_terkait,
                'editorpick' => $editorpick,
                'counter_share' => $counter_share,
                'get_data_readcrumb' => $get_data_readcrumb,
                'berita_terbaru' => $berita_terbaru,
            ));
          } else {
            $this->load->view('layouts/news', $array = array(
                'news_detail' => $news_detail,
                'terpopuler' => $terpopuler,
                'artikel_terkait' => $artikel_terkait,
                'editorpick' => $editorpick,
                'counter_share' => $counter_share,
                'tax_engine_banner' => $tax_engine_banner,
                'academy_banner' => $academy_banner,
                'detail_news_banner' => $detail_news_banner,
                'get_data_readcrumb' => $get_data_readcrumb,
                'berita_terbaru' => $berita_terbaru,
                'read_too' => $read_too,
            ));
          }
        } else {
          $this->load->view('layouts/error_page');
        }
        $this->load->view('layouts/footer');
    }

    public function share_button () {
        $type = $_POST['type'];
        
        $id = $_POST['id'];

        $check_share = $this->News_model->check_share($id);

        if ($check_share > 0) {
          // edit
          $get_share = $this->News_model->get_share($id);

          $facebook = $get_share[0]->FACEBOOK;
          $twitter = $get_share[0]->TWITTER;
          $google_plus = $get_share[0]->GOOGLE_PLUS;
          $linkedin = $get_share[0]->LINKEDIN;
          $whatsapp = $get_share[0]->WHATSAPP;
          $line = $get_share[0]->LINE;

          switch ($type) {
            case 'facebook':
                $facebook++;
            break;
            
            case 'twitter':
                $twitter++;
            break;

            case 'google_plus':
                $google_plus++;
            break;

            case 'linkedin':
                $linkedin++;
            break;

            case 'whatsapp':
                $whatsapp++;
            break;

            case 'line':
                $line++;
            break;
          }

          $data = array(
            'FACEBOOK' => $facebook,
            'TWITTER' => $twitter,
            'GOOGLE_PLUS' => $google_plus,
            'LINKEDIN' => $linkedin,
            'WHATSAPP' => $whatsapp,
            'LINE' => $line
          );

          $this->News_model->update_share($id, $data);

        } else {
          // insert
          $facebook = 0;
          $twitter = 0;
          $google_plus = 0;
          $linkedin = 0;
          $whatsapp = 0;
          $line = 0;

          switch ($type) {
            case 'facebook':
                $facebook = 1;
            break;
            
            case 'twitter':
                $twitter = 1;
            break;

            case 'google_plus':
                $google_plus = 1;
            break;

            case 'linkedin':
                $linkedin = 1;
            break;

            case 'whatsapp':
                $whatsapp = 1;
            break;

            case 'line':
                $line = 1;
            break;
          }

          $data = array(
            'ARTICLE_ID' => $id,
            'FACEBOOK' => $facebook,
            'TWITTER' => $twitter,
            'GOOGLE_PLUS' => $google_plus,
            'LINKEDIN' => $linkedin,
            'WHATSAPP' => $whatsapp,
            'LINE' => $line
          );

          $this->News_model->insert_share($data);
          
        }

        $counter_share = $this->News_model->get_counter_share($id);

        $form_data['success'] = true;
        $form_data['counter'] = $counter_share;
        echo json_encode($form_data);
    }

    function test() {
      $result = '';
      $phone = '628876543211';

      while(strlen($phone)>0){
        if (strlen($phone) <= 3){
          $sec = strlen($phone);
        } else {
          $sec = rand(3, 4);
        }
        for ($k=0;$k<$sec;$k++){
          $data = $phone[$k];
          $result .= $data;
        }
        $result .= '-';
        $phone = substr($phone, $sec); 
      }

      $result = substr($result, 0, -1);
      $first = $result[0];

      if ($first=='0'){
        $result = substr($phone, 1);
        $result = '+62'.$result;
      } else {
        $result = '+'.$result;
      }
      echo $result;
      
    }
}
