<?php

/*
Plugin Name: Scroll rss excerpt
Plugin URI: http://www.gopiplus.com/work/2012/08/04/scroll-rss-excerpt-wordpress-plugin/
Description: http://www.gopiplus.com/work/2012/08/04/scroll-rss-excerpt-wordpress-plugin/
Author: Gopi.R
Version: 3.0
Author URI: http://www.gopiplus.com/work/2012/08/04/scroll-rss-excerpt-wordpress-plugin/
Donate link: http://www.gopiplus.com/work/2012/08/04/scroll-rss-excerpt-wordpress-plugin/
Tags: scroll, rss, excerpt
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $wpdb, $wp_version;

function srsse_add_javascript_files() 
{
	if (!is_admin())
	{
		wp_enqueue_script( 'scroll-rss-excerpt', get_option('siteurl').'/wp-content/plugins/scroll-rss-excerpt/scroll-rss-excerpt.js');
	}	
}

function srsse_install() 
{
	global $wpdb;
	add_option('srsse_widgettitle', "Scroll rss excerpt");
	add_option('srsse_setting', "1");
	add_option('srsse_height_display_length_s1', "200_4_200");
	add_option('srsse_s1', "http://www.gopiplus.com/work/category/word-press-plug-in/feed/");
	add_option('srsse_height_display_length_s2', "190_3_200");
	add_option('srsse_s2', "http://www.wordpress.org/news/feed/");
	add_option('srsse_height_display_length_s3', "190_2_200");	
	add_option('srsse_s3', "http://www.gopiplus.com/extensions/feed");
	add_option('srsse_height_display_length_s4', "190_4_200");	
	add_option('srsse_s4', "http://www.gopiplus.com/extensions/category/joomla-plugin/feed/");
}


function srsse_admin_options() 
{
	global $wpdb;
	?>
<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
	<h2>Scroll rss excerpt</h2>
<?php
	$srsse_height_display_length_s1 = get_option('srsse_height_display_length_s1');
	$srsse_height_display_length_s2 = get_option('srsse_height_display_length_s2');
	$srsse_height_display_length_s3 = get_option('srsse_height_display_length_s3');
	$srsse_height_display_length_s4 = get_option('srsse_height_display_length_s4');
	$srsse_s1 = get_option('srsse_s1');
	$srsse_s2 = get_option('srsse_s2');
	$srsse_s3 = get_option('srsse_s3');
	$srsse_s4 = get_option('srsse_s4');
	
	$srsse_height_display_length_s1_new = explode("_", $srsse_height_display_length_s1);
	$srsse_height_1 = @$srsse_height_display_length_s1_new[0];
	$srsse_display_1 = @$srsse_height_display_length_s1_new[1];
	$srsse_length_1 = @$srsse_height_display_length_s1_new[2];
	
	$srsse_height_display_length_s2 = explode("_", $srsse_height_display_length_s2);
	$srsse_height_2 = @$srsse_height_display_length_s2[0];
	$srsse_display_2 = @$srsse_height_display_length_s2[1];
	$srsse_length_2 = @$srsse_height_display_length_s2[2];
	
	$srsse_height_display_length_s3 = explode("_", $srsse_height_display_length_s3);
	$srsse_height_3 = @$srsse_height_display_length_s3[0];
	$srsse_display_3 = @$srsse_height_display_length_s3[1];
	$srsse_length_3 = @$srsse_height_display_length_s3[2];
	
	$srsse_height_display_length_s4 = explode("_", $srsse_height_display_length_s4);
	$srsse_height_4 = @$srsse_height_display_length_s4[0];
	$srsse_display_4 = @$srsse_height_display_length_s4[1];
	$srsse_length_4 = @$srsse_height_display_length_s4[2];
	
	if (@$_POST['srsse_submit']) 
	{
		
		//	Just security thingy that wordpress offers us
		check_admin_referer('srsse_form_setting');
		
		$srsse_height_1 = stripslashes($_POST['srsse_height_1']);
		$srsse_display_1 = stripslashes($_POST['srsse_display_1']);
		$srsse_length_1 = stripslashes($_POST['srsse_length_1']);
		
		$srsse_height_2 = stripslashes($_POST['srsse_height_2']);
		$srsse_display_2 = stripslashes($_POST['srsse_display_2']);
		$srsse_length_2 = stripslashes($_POST['srsse_length_2']);
		
		$srsse_height_3 = stripslashes($_POST['srsse_height_3']);
		$srsse_display_3 = stripslashes($_POST['srsse_display_3']);
		$srsse_length_3 = stripslashes($_POST['srsse_length_3']);
		
		$srsse_height_4 = stripslashes($_POST['srsse_height_4']);
		$srsse_display_4 = stripslashes($_POST['srsse_display_4']);
		$srsse_length_4 = stripslashes($_POST['srsse_length_4']);
		
		$srsse_height_display_length_s1 = $srsse_height_1 . "_" . $srsse_display_1. "_" . $srsse_length_1;
		$srsse_height_display_length_s2 = $srsse_height_2 . "_" . $srsse_display_2. "_" . $srsse_length_2;
		$srsse_height_display_length_s3 = $srsse_height_3 . "_" . $srsse_display_3. "_" . $srsse_length_3;
		$srsse_height_display_length_s4 = $srsse_height_4 . "_" . $srsse_display_4. "_" . $srsse_length_4;
		
		$srsse_s1 = stripslashes($_POST['srsse_s1']);
		$srsse_s2 = stripslashes($_POST['srsse_s2']);
		$srsse_s3 = stripslashes($_POST['srsse_s3']);
		$srsse_s4 = stripslashes($_POST['srsse_s4']);
		
		update_option('srsse_height_display_length_s1', $srsse_height_display_length_s1 );
		update_option('srsse_height_display_length_s2', $srsse_height_display_length_s2 );
		update_option('srsse_height_display_length_s3', $srsse_height_display_length_s3 );
		update_option('srsse_height_display_length_s4', $srsse_height_display_length_s4 );
		update_option('srsse_s1', $srsse_s1 );
		update_option('srsse_s2', $srsse_s2 );
		update_option('srsse_s3', $srsse_s3 );
		update_option('srsse_s4', $srsse_s4 );
		
	}
	
	?>
<form name="srsse_form" method="post" action="">
  <table width="620" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3"><h3>Setting 1</h3></td>
    </tr>
    <tr>
      <td colspan="3">RSS Link</td>
    </tr>
    <tr>
      <td height="30" colspan="3"><input  style="width: 600px;" type="text" value="<?php echo @$srsse_s1; ?>" name="srsse_s1" id="srsse_s1" /></td>
    </tr>
    <tr>
      <td height="30" width="160">Each Record Height</td>
      <td width="160">Display Records #</td>
      <td width="300">Text Length</td>
    </tr>
    <tr>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_height_1; ?>" name="srsse_height_1" id="srsse_height_1" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_display_1; ?>" name="srsse_display_1" id="srsse_display_1" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_length_1; ?>" name="srsse_length_1" id="srsse_length_1" /></td>
    </tr>
    <tr>
      <td colspan="3"><h3>Setting 2</h3></td>
    </tr>
    <tr>
      <td colspan="3">RSS Link</td>
    </tr>
    <tr>
      <td height="30" colspan="3"><input  style="width: 600px;" type="text" value="<?php echo @$srsse_s2; ?>" name="srsse_s2" id="srsse_s2" /></td>
    </tr>
    <tr>
      <td height="30">Each Record Height</td>
      <td>Display Records #</td>
      <td>Text Length</td>
    </tr>
    <tr>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_height_2; ?>" name="srsse_height_2" id="srsse_height_2" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_display_2; ?>" name="srsse_display_2" id="srsse_display_2" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_length_2; ?>" name="srsse_length_2" id="srsse_length_2" /></td>
    </tr>
    <tr>
      <td colspan="3"><h3>Setting 3</h3></td>
    </tr>
    <tr>
      <td colspan="3">RSS Link</td>
    </tr>
    <tr>
      <td height="30" colspan="3"><input  style="width: 600px;" type="text" value="<?php echo @$srsse_s3; ?>" name="srsse_s3" id="srsse_s3" /></td>
    </tr>
    <tr>
      <td height="30">Each Record Height</td>
      <td>Display Records #</td>
      <td>Text Length</td>
    </tr>
    <tr>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_height_3; ?>" name="srsse_height_3" id="srsse_height_3" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_display_3; ?>" name="srsse_display_3" id="srsse_display_3" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_length_3; ?>" name="srsse_length_3" id="srsse_length_3" /></td>
    </tr>
    <tr>
      <td colspan="3"><h3>Setting 4</h3></td>
    </tr>
    <tr>
      <td colspan="3">RSS Link</td>
    </tr>
    <tr>
      <td height="30" colspan="3"><input  style="width: 600px;" type="text" value="<?php echo @$srsse_s4; ?>" name="srsse_s4" id="srsse_s4" /></td>
    </tr>
    <tr>
      <td height="30">Each Record Height</td>
      <td>Display Records #</td>
      <td>Text Length</td>
    </tr>
    <tr>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_height_4; ?>" name="srsse_height_4" id="srsse_height_4" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_display_4; ?>" name="srsse_display_4" id="srsse_display_4" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$srsse_length_4; ?>" name="srsse_length_4" id="srsse_length_4" /></td>
    </tr>
    <tr>
      <td colspan="3" height="50" align="left"><input name="srsse_submit" id="srsse_submit" lang="publish" class="button-primary" value="Update All Settings" type="Submit" /></td>
    </tr>
  </table>
  <?php wp_nonce_field('srsse_form_setting'); ?>
</form>
	<h3>Plugin Configuration</h3>
	<ul>
		<li>Option 1. Use plugin short code to add this plugin into posts and pages.</li>
		<li>Option 2. Drag and drop the widget.</li>
	</ul>
    <p class="description">Check official website for more information <a href="http://www.gopiplus.com/work/2012/08/04/scroll-rss-excerpt-wordpress-plugin/" target="_blank">Click here</a></p>
  </div>
</div>
<?php
}

function srsse_shortcode( $atts ) 
{
	global $wpdb;
	//[scroll-rss-excerpt setting="1"]
	if ( ! is_array( $atts ) )
	{
		return '';
	}
	$srsse_setting = $atts['setting'];
	
	if($srsse_setting == "1")
	{
		$srsse_newsetting = get_option('srsse_height_display_length_s1');
		$url = get_option('srsse_s1');
	}
	elseif($srsse_setting == "2")
	{
		$srsse_newsetting = get_option('srsse_height_display_length_s2');
		$url = get_option('srsse_s2');
	}
	elseif($srsse_setting == "3")
	{
		$srsse_newsetting = get_option('srsse_height_display_length_s3');
		$url = get_option('srsse_s3');
	}
	elseif($srsse_setting == "4")
	{
		$srsse_newsetting = get_option('srsse_height_display_length_s4');
		$url = get_option('srsse_s4');
	}
	else
	{
		$srsse_newsetting = get_option('srsse_height_display_length_s1');
		$url = get_option('srsse_s1');
	}
	
	
	$srsse_height_display_length = explode("_", $srsse_newsetting);
	$srsse_scrollheight = @$srsse_height_display_length[0];
	$srsse_sametimedisplay = @$srsse_height_display_length[1];
	$srsse_textlength = @$srsse_height_display_length[2];
	
	if(!is_numeric(@$srsse_textlength)){ @$srsse_textlength = 250; }
	if(!is_numeric(@$srsse_sametimedisplay)){ @$srsse_sametimedisplay = 2; }
	if(!is_numeric(@$srsse_scrollheight)){ @$srsse_scrollheight = 150; }
	
	$xml = "";
	$cnt=0;
	$f = fopen( $url, 'r' );
	while( $data = fread( $f, 4096 ) ) { $xml .= $data; }
	fclose( $f );
	preg_match_all( "/\<item\>(.*?)\<\/item\>/s", $xml, $itemblocks );

	if ( ! empty($itemblocks) ) 
	{
		$srsse_count = 0;
		$srsse_html = "";
		$IRjsjs = "";
		$srsse_x = "";
		foreach( $itemblocks[1] as $block )
		{
			$srsse_target = "_blank";
			
			preg_match_all( "/\<title\>(.*?)\<\/title\>/",  $block, $title );
			preg_match_all( "/\<link\>(.*?)\<\/link\>/", $block, $link );
			preg_match_all( "/\<description\>(.*?)\<\/description\>/", $block, $description );
			
			$srsse_title = $title[1][0];
			$srsse_title = mysql_real_escape_string(trim($srsse_title));
			$srsse_link = $link[1][0];
			$srsse_link = trim($srsse_link);
			$srsse_text = $description[1][0];
			$srsse_text = str_replace("&lt;![CDATA[","",$srsse_text);
			$srsse_text = str_replace("<![CDATA[","",$srsse_text);
			$srsse_text = str_replace("]]&gt;","",$srsse_text);
			$srsse_text = str_replace("]]>","",$srsse_text);
			
			if(is_numeric($srsse_textlength))
			{
				if($srsse_textlength <> "" && $srsse_textlength > 0 )
				{
					// $srsse_text = substr($srsse_text, 0, $srsse_textlength);
					$srsse_text = srsse_excerpt_max_charlength($srsse_textlength, $srsse_text);
				}
			}
			
			$srsse_scrollheights = $srsse_scrollheight."px";	
			
			$srsse_html = $srsse_html . "<div class='srsse_div' style='height:".$srsse_scrollheights.";padding:1px 0px 1px 0px;'>"; 
			
			if($srsse_title <> "" )
			{
				$srsse_html = $srsse_html . "<div style='padding-left:4px;'><strong>";	
				$IRjsjs = $IRjsjs . "<div style=\'padding-left:4px;\'><strong>";				
				if($srsse_link <> "" ) 
				{ 
					$srsse_html = $srsse_html . "<a href='$srsse_link'>"; 
					$IRjsjs = $IRjsjs . "<a href=\'$srsse_link\'>";
				} 
				$srsse_html = $srsse_html . $srsse_title;
				$IRjsjs = $IRjsjs . $srsse_title;
				if($srsse_link <> "" ) 
				{ 
					$srsse_html = $srsse_html . "</a>"; 
					$IRjsjs = $IRjsjs . "</a>";
				}
				$srsse_html = $srsse_html . "</strong></div>";
				$IRjsjs = $IRjsjs . "</strong></div>";
			}
			
			if($srsse_text <> "" )
			{
				$srsse_html = $srsse_html . "<div style='padding-left:4px;'>$srsse_text</div>";	
				$IRjsjs = $IRjsjs . "<div style=\'padding-left:4px;\'>$srsse_text</div>";	
			}
			
			$srsse_html = $srsse_html . "</div>";
			
			$srsse_x = $srsse_x . "rssslider[$srsse_count] = '<div class=\'srsse_div\' style=\'height:".$srsse_scrollheights.";padding:1px 0px 1px 0px;\'>$IRjsjs</div>'; ";	
			$srsse_count++;
			$IRjsjs = "";
		}
		
		$srsse_scrollheight = $srsse_scrollheight + 4;
		if($srsse_count >= $srsse_sametimedisplay)
		{
			$srsse_count = $srsse_sametimedisplay;
			$srsse_scrollheight_New = ($srsse_scrollheight * $srsse_sametimedisplay);
		}
		else
		{
			$srsse_count = $srsse_count;
			$srsse_scrollheight_New = ($srsse_count  * $srsse_scrollheight);
		}
	}
	
	$rssslider = "";
	$rssslider = $rssslider . '<div style="padding-top:8px;padding-bottom:8px;">';
	$rssslider = $rssslider . '<div style="text-align:left;vertical-align:middle;text-decoration: none;overflow: hidden; position: relative; margin-left: 3px; height: '. @$srsse_scrollheight .'px;" id="ScrollRssExpertDIV">'.@$srsse_html.'</div>';
	$rssslider = $rssslider . '</div>';
	$rssslider = $rssslider . '<script type="text/javascript">';
	$rssslider = $rssslider . 'var rssslider = new Array();';
	$rssslider = $rssslider . "var objrssslider	= '';";
	$rssslider = $rssslider . "var srsse_scrollPos 	= '';";
	$rssslider = $rssslider . "var srsse_numScrolls	= '';";
	$rssslider = $rssslider . 'var srsse_heightOfElm = '. @$srsse_scrollheight. ';';
	$rssslider = $rssslider . 'var srsse_numberOfElm = '. @$srsse_count. ';';
	$rssslider = $rssslider . "var srsse_scrollOn 	= 'true';";
	$rssslider = $rssslider . 'function StartScrollRssExcerpt() ';
	$rssslider = $rssslider . '{';
	$rssslider = $rssslider . @$srsse_x;
	$rssslider = $rssslider . "ObjScrollRssExcerpt	= document.getElementById('ScrollRssExpertDIV');";
	$rssslider = $rssslider . "ObjScrollRssExcerpt.style.height = (srsse_numberOfElm * srsse_heightOfElm) + 'px';";
	$rssslider = $rssslider . 'ScrollRssExcerptContent();';
	$rssslider = $rssslider . '}';
	$rssslider = $rssslider . '</script>';
	$rssslider = $rssslider . '<script type="text/javascript">';
	$rssslider = $rssslider . 'StartScrollRssExcerpt();';
	$rssslider = $rssslider . '</script>';
	return $rssslider;
}

function srsse_add_to_menu() 
{
	if (is_admin()) 
	{
		add_options_page('Scroll rss excerpt', 'Scroll rss excerpt', 'manage_options', __FILE__, 'srsse_admin_options' );
	}
}


function srsse_excerpt_max_charlength($charlength, $excerpt) 
{
	$charlength++;
	if ( mb_strlen( $excerpt ) > $charlength ) 
	{
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) 
		{
			return mb_substr( $subex, 0, $excut ) . '[...]';
		} 
		else 
		{
			return $subex . '[...]';
		}
	} 
	else 
	{
		return $excerpt;
	}
}

function srsse_control() 
{
	$srsse_widgettitle = get_option('srsse_widgettitle');
	$srsse_setting = get_option('srsse_setting');
	if (@$_POST['srsse_submit']) 
	{
		$srsse_widgettitle = $_POST['srsse_widgettitle'];
		$srsse_setting = $_POST['srsse_setting'];
		update_option('srsse_widgettitle', $srsse_widgettitle );
		update_option('srsse_setting', $srsse_setting );
	}
	
	$setting1 = "";
	$setting2 = "";
	$setting3 = "";
	$setting4 = "";
	if($srsse_setting == "1") { $setting1 = "selected"; }
	if($srsse_setting == "2") { $setting2 = "selected"; }
	if($srsse_setting == "3") { $setting3 = "selected"; }
	if($srsse_setting == "4") { $setting4 = "selected"; }
	
	echo '<p>Widget Title:<br><input  style="width: 200px;" type="text" value="';
	echo $srsse_widgettitle . '" name="srsse_widgettitle" id="srsse_widgettitle" /></p>';
	echo '<p>Rss Setting:<br><select name="srsse_setting" id="srsse_setting">';
	echo '<option value="1" '.$setting1.'>Setting 1</option>';
	echo '<option value="2" '.$setting2.'>Setting 2</option>';
	echo '<option value="3" '.$setting3.'>Setting 3</option>';
	echo '<option value="4" '.$setting4.'>Setting 4</option>';
	echo '</select>';
	echo '<input type="hidden" id="srsse_submit" name="srsse_submit" value="1" />';
}

function srsse_widget($args) 
{
	extract($args);
	echo $before_widget . $before_title;
	echo get_option('srsse_widgettitle');
	echo $after_title;
	$srsse_setting = get_option('srsse_setting');
	$array = array("setting" => $srsse_setting);
	echo srsse_shortcode($array);
	echo $after_widget;
}

function ScrollRss( $atts ) 
{
	if(!is_numeric($atts)) 
	{
		$atts = 1;
	}
	$array = array();
	$array["setting"]=$atts;
	echo srsse_shortcode($array);
}

function srsse_init()
{
	if(function_exists('wp_register_sidebar_widget')) 
	{
		wp_register_sidebar_widget('Scroll rss excerpt', 'Scroll rss excerpt', 'srsse_widget');
	}
	
	if(function_exists('wp_register_widget_control')) 
	{
		wp_register_widget_control('Scroll rss excerpt', array('Scroll rss excerpt', 'widgets'), 'srsse_control');
	} 
}

function srsse_deactivation() 
{
	// No action required.
}

add_action("plugins_loaded", "srsse_init");
add_shortcode( 'scroll-rss-excerpt', 'srsse_shortcode' );
register_activation_hook(__FILE__, 'srsse_install');
register_deactivation_hook(__FILE__, 'srsse_deactivation');
add_action('admin_menu', 'srsse_add_to_menu');
add_action('wp_enqueue_scripts', 'srsse_add_javascript_files');
?>