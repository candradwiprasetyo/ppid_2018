<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rss extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->library('library');
    }

    public function index()
    {   
        $limit=isset($_REQUEST['limit'])?$_REQUEST['limit']:3000;

        header('Content-Type: text/xml; charset=utf-8');
                        
        $rssfeed = '<?xml version="1.0" encoding="utf-8"?>';
        $rssfeed .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
        $rssfeed .= '<channel>';
        $rssfeed .= '<atom:link href="'.base_url().'/rss.php" rel="self" type="application/rss+xml" />';  
        $rssfeed .= '<title>ddtc RSS feed</title>';
        $rssfeed .= '<link>'.base_url().'</link>';
        $rssfeed .= '<description>ddtc RSS feed</description>';
        $rssfeed .= '<language>en-us</language>';
        $rssfeed .= '<copyright>Copyright (C) 2012 ddtc.co.id</copyright>';
     
        // $query = "SELECT * from tbl_article where STATUS=1 and PUBLISH_TIMESTAMP <= Now() order by PUBLISH_TIMESTAMP DESC LIMIT 100 ";
        // $result = $mysqli->query($query) or die ("Could not execute query");
     
        // while($row = mysqli_fetch_array($result)) {

        $sql = "SELECT * from tbl_article where STATUS=1 and PUBLISH_TIMESTAMP <= Now() order by PUBLISH_TIMESTAMP DESC LIMIT 100";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) {


            extract($row);
            
            $timestamp=$row['PUBLISH_TIMESTAMP'];           
            $year = substr($timestamp, 0, 4);
            $month = substr($timestamp, 5, 2);
            $day = substr($timestamp, 8, 2);
            $hour = substr($timestamp, 11, 2);
            $min = substr($timestamp, 14, 2);
            $sec = substr($timestamp, 17, 2);
            $pubDate = date('D, d M Y H:i:s O', mktime($hour, $min, $sec, $month, $day, $year));
            
            
            
            
            //$title =trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($row['TITLE']))))));
            $title=str_replace("&nbsp;"," ",$row['TITLE']);
            $title=str_replace("&acute;","'",$title);
            $title=str_replace("&ldquo;","",$title);
            $title=str_replace("&rdquo;","",$title);
            $title=str_replace("&"," dan ",$title);
            
            
            
            $content =trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($row['CONTENT']))))));
            
            $objImg=$row['IMAGE'];
            $rssfeed .= '<item>';
            $rssfeed .= '<title>' . $title . '</title>';
            $rssfeed .= '<description> <![CDATA[';      
            $imgsubfolder=substr($row['PUBLISH_TIMESTAMP'],0,7);
            $rssfeed .= '<img align="left" alt="' . $title . '" hspace="7" src="'.base_url()."assets/images/thumb/". $objImg . '" width="100" />';  
        
            $rssfeed .= substr($content,0,300) . '...]]> </description>';       
            $url= base_url().$this->library->get_url_news($row['ID'], $row['TITLE']);    
            $rssfeed .= '<link>' . $url . '</link>';        
            $rssfeed .= '<guid>'.base_url().'detail.php?ID='.$row['ID'].'</guid>';
            $rssfeed .= '<pubDate>' . $pubDate . '</pubDate>';
            $rssfeed .= '</item>';
        }
     
        $rssfeed .= '</channel>';
        $rssfeed .= '</rss>';
     
        echo $rssfeed;
        
    }
}
