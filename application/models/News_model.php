<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get news
    function get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='', $keyword='', $date='', $sticky='', $no_id='', $preview='', $random_order=false)
    {

        $this->db->select('* , TIMEDIFF(NOW(),PUBLISH_TIMESTAMP) AS selisih');
        $this->db->from('tbl_article');
        if (!$preview) {
            // $this->db->where('STATUS=1 and PUBLISH_TIMESTAMP <= Now()');
            $this->db->where('STATUS=1');
        }
        if ($type) {
            $this->db->where("TIPE='".$type."'");
        }
        if ($category) {
            $this->db->where("CATEGORY='".$category."'");
        }
        if ($subcategory) {
            $this->db->where("SUBCATEGORY='".$subcategory."'");
        }
        if ($id) {
            $this->db->where("ID='".$id."'");
        }
        if ($editorpick) {
            $this->db->where("EDITORPICK='".$editorpick."'");
        }
        if ($editorpick) {
            $this->db->where("EDITORPICK='".$editorpick."'");
        }
        if ($keyword) {
            $topik = '';
            $key = explode(",", $keyword);
            for( $i=0; $i<=count($key)-1; $i++ ) {
                if ($i==0) {
                    $topik .= " ( KEYWORD like '%".trim($key[$i])."%' ";
                } else {
                    $topik .= " OR KEYWORD like '%".trim($key[$i])."%' ";
                }
                if ($i==count($key)-1) {
                    $topik .= " )"; 
                }

            }
            $this->db->where($topik);
        }
        if ($date) {
            $this->db->where("date(PUBLISH_TIMESTAMP)='".$date."'");
        }
        if ($sticky) {
            $this->db->where("STICKY='".$sticky."'");
        }
        if ($no_id) {
            $this->db->where("ID<>'".$no_id."'");
        }
        if ($preview) {
            $this->db->where("PREVIEW='".$preview."'");
        } else {
            //$this->db->where("PREVIEW IS NULL");
        }
        
        //$this->db->where(" `PUBLISH_TIMESTAMP` < '2017-10-1'");
        if ($random_order) {
            // $this->db->where('PUBLISH_TIMESTAMP > (CURDATE() - interval 30 DAY)');
            $random = rand(1, 8);
            $order = ['', 'TITLE', 'UPPERDECK', 'CAPTION', 'PUBLISH_TIMESTAMP', 'KEYWORD', 'TAICING', 'REPORTER', 'REDAKTUR'];
            $this->db->order_by($order[$random].' DESC ');
        } else {
            $this->db->order_by(' PUBLISH_TIMESTAMP DESC ');
        }
        
        $this->db->limit($end, $start);
        // if($random_order==true) {
            // $this->output->enable_profiler(TRUE);
        // }
        return $this->db->get()->result();
    }

    // get banner
    function get_banner($start=0, $end='', $pos = '', $id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_banners');
        $this->db->where('STATUS=1 AND START_DATE<=CURDATE() AND END_DATE>=CURDATE()');
        if ($pos) {
            $this->db->where("POS='".$pos."'");
        }
        if ($id) {
            $this->db->where("ID='".$id."'");
        }
        $this->db->order_by(' ORDERNUM ASC ');
        $this->db->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }

    // get focus
    function get_focus($start=0, $end='', $id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_focus');
        if ($id) {
            $this->db->where("ID='".$id."'");
        }
        $this->db->where('STATUS=1 and PUBLISH_TIMESTAMP <= Now()');
        // $this->db->where(" `PUBLISH_TIMESTAMP` < '2017-10-1'");
        $this->db->order_by(' PUBLISH_TIMESTAMP DESC ');
        $this->db->limit($end, $start);
        // $this->output->enable_profiler(TRUE);
        return $this->db->get()->result();  
    }

    // get focus news
    function get_focus_news($start=0, $end='', $focus_id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_focus_article');
        if ($focus_id) {
            $this->db->where("FOCUS_ID='".$focus_id."'");
        }
        $this->db->order_by(' ID DESC ');
        $this->db->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }

    // get news popular
    function get_news_popular($start=0, $end='', $category='', $subcategory='')
    {
        $this->db->select('*');
        $this->db->from('tbl_article');
        $this->db->where('STATUS=1 and PUBLISH_TIMESTAMP <= Now()');
        $this->db->where('PUBLISH_TIMESTAMP > (CURDATE() - interval 30 DAY)');
        $this->db->where("PREVIEW IS NULL");
        if ($category) {
            $this->db->where("CATEGORY='".$category."'");
        }
        if ($subcategory) {
            $this->db->where("SUBCATEGORY='".$subcategory."'");
        }
        $this->db->order_by(' HIT DESC ');
        $this->db->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }

	// get news popular home
    function get_news_popular_home($start=0, $end='', $category='', $subcategory='')
    {
        $this->db->select('*');
        $this->db->from('tbl_article');
        $this->db->where('STATUS=1 and PUBLISH_TIMESTAMP <= Now()');
        $this->db->where('PUBLISH_TIMESTAMP > (CURDATE() - interval 7 DAY)');
        $this->db->where("PREVIEW IS NULL");
        if ($category) {
            $this->db->where("CATEGORY='".$category."'");
        }
        if ($subcategory) {
            $this->db->where("SUBCATEGORY='".$subcategory."'");
        }
        $this->db->order_by(' HIT DESC ');
        $this->db->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }
    // get foto
    function get_foto($start=0, $end='', $article_id = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_add_image');
        $this->db->where('STATUS=1');
        if ($article_id) {
            $this->db->where("ARTICLE_ID='".$article_id."'");
        }
        $this->db->order_by(' SEQNUMBER ASC ');
        if ($end) {
            $this->db->limit($end, $start);
        }
       // $this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }

    // get category
    function get_category($seo) {
        $sql = "select ID as result from tbl_category where SEO = '$seo'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    // get category name
    function get_category_name($seo) {
        $sql = "select CATEGORY_NAME as result from tbl_category where SEO = '$seo'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    // get sub_category
    function get_subcategory($seo) {
        $sql = "select ID as result from tbl_subcategory where SEO = '$seo'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    // get sub_category
    function get_subcategory_name($seo) {
        $sql = "select SUBCATEGORY_NAME as result from tbl_subcategory where SEO = '$seo'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    // check share
    function check_share($id) {
        $sql = "select count(ID) as result from tbl_share where ARTICLE_ID = '$id'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    // get count banner
    function get_count_banner($id) {
        $sql = "select HIT as result from tbl_banners where ID = '$id'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        $hit = $result['result'];

        if ($hit != "" && $hit >= 0) {
            $this->db->where('ID', $id);
            $this->db->set('HIT', '`HIT`+ 1', FALSE);
            $this->db->update('tbl_banners');

        } else {
            $data = array(
                'HIT' => '1'
            );
            $this->db->where('ID', $id);
            $this->db->update('tbl_banners', $data);
        }
    }

    // get share
    function get_share($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_share');
        if ($id) {
            $this->db->where("ARTICLE_ID='".$id."'");
        }
        $this->db->limit(1);
       // $this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }

    // insert share
    function insert_share($data)
    {
        $this->db->insert('tbl_share', $data);
    }

    // update share
    function update_share($id, $data)
    {
        $this->db->where('ARTICLE_ID', $id);
        $this->db->update('tbl_share', $data);
    }

    // update counter
    function set_counter($id)
    {
        $sql = "select HIT as result from tbl_article where ID = '$id'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        $hit = $result['result'];

        if ($hit != "" && $hit >= 0) {
            $this->db->where('ID', $id);
            $this->db->set('HIT', '`HIT`+ 1', FALSE);
            $this->db->update('tbl_article');
            
        } else {
            $data = array(
                'HIT' => '1'
            );
            $this->db->where('ID', $id);
            $this->db->update('tbl_article', $data);
            
        }
    }

    // counter share
    function get_counter_share($id) {
        $sql = "select sum(FACEBOOK + TWITTER + GOOGLE_PLUS + LINKEDIN + WHATSAPP + LINE) as result from tbl_share where ARTICLE_ID = '$id'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        $result['result'] = ($result['result']) ? $result['result'] : "0";
        return $result['result'];
    }

    // get popup
    function get_popup()
    {
        $this->db->select('*');
        $this->db->from('tbl_popups');
        $this->db->where('STATUS=1');
        $this->db->order_by(' ID DESC ');
        $this->db->limit(1);
        //$this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }

    function get_data_readcrumb($id) {
        $sql = "select 
            b.CATEGORY_NAME as category_name,
            b.SEO as category_seo,
            c.SUBCATEGORY_NAME as subcategory_name,
            c.SEO as subcategory_seo,
            a.TITLE as article_title
            from tbl_article a 
            join tbl_category b on b.ID = a.CATEGORY
            join tbl_subcategory c on c.ID = a.SUBCATEGORY
            where a.ID = '$id'";    
        $query = $this->db->query($sql);
        $result = null;
        return $query->result_array();
    }
}
