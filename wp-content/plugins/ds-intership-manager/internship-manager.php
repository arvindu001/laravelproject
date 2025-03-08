<?php
	/*
	Plugin Name: Internship Manager
	Plugin URI: www.alltechnosolution.com
	Description: Plugin for Internship Management.
	Version: 2.0 
	Author: Arvind Yadav.
        Author URI: www.alltechnosolution.com
	*/
	
        global $wpdb;
	if ( ! defined( 'DS_NEWS_TABLE' ) )
        define( 'DS_NEWS_TABLE',"enquery_details");	
	
	register_activation_hook(__FILE__,'create_dsnews_tables');
	
	function ds_internship_actions(){
            add_menu_page('Internship Form List', 'Internship Form List', 1,basename(__FILE__).'/ds-internship','ds_listnews');						add_menu_page('Internship Form List', 'Internship Form List', 2,basename(__FILE__).'/ds-student','ds_list_student');			add_menu_page('Internship Form List', 'Internship Form List', 3,basename(__FILE__).'/ds-staff','ds_list_staff');	
          //  add_submenu_page(basename(__FILE__).'/ds-news','Enquiry List','View News',1,basename(__FILE__).'/ds-news','ds_listnews');      }
	function ds_listnews(){
            include('custom_list_internship.php');
	}		function ds_list_student(){            include('student_list_internship.php');	}		function ds_list_staff(){            include('staff_list_internship.php');	}
	function ds_addnews(){
            include('config_internship.php');
	}
    function ds_news_date($format,$date){
            //return mysql date format
            if($format == 'mysql'){
                $dateARR = explode('/', $date);
                return $dateARR[2].'-'.$dateARR[1].'-'.$dateARR[0];
            }
            //return js date format
            if($format == 'js'){
                $dateARR = explode('-', $date);
                return $dateARR[2].'/'.$dateARR[1].'/'.$dateARR[0];
            }
            
        }
        
        function ds_news() {
            global $wpdb;
            $newsStr = "<ul id='news_ticker' class='fa-ul'>";
            $querystr = "SELECT " . DS_NEWS_TABLE . ".* FROM " . DS_NEWS_TABLE . " Where isVisible =1 AND (start_date <= now() AND end_date >= now()) ORDER BY " . DS_NEWS_TABLE . ".news_date DESC";
//           echo $querystr;exit;
            $customPages = $wpdb->get_results($querystr);
            foreach ($customPages as $cpage1) {
                $newsStr.='<li><a target="_blank" class = "news" href="' . $cpage1->news_url . '">' . $cpage1->news_content . '</a></li>';
            }
            $newsStr.="</ul>";
            return $newsStr;
        }
        
        add_shortcode('ds-news', 'ds_news');
		add_action('admin_menu','ds_news_actions');
?>