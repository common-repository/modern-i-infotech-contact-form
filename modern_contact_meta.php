<?php
/*
  Add the all meta boxes of QR Code plugin.
*/

add_action('add_meta_boxes','modern_contact_meta_boxes');
add_action('save_post','modern_contact_post_type',2);

//add_filter('the_content','post_content');
function modern_contact_meta_boxes()
{
    if (function_exists('add_meta_box'))
    {
        global $post;
      
	  add_meta_box( 'create_modern_contact_side', 'Modern Full Form', 'create_modern_contact_side','post','side','default' );
	  $modern_create=get_post_meta($post->ID,'modern_contact_code');
        
	  if($modern_create[0]==3){
             
	   add_meta_box( 'modern_contact_form_field', 'Message', 'modern_contact_form_field','post', 'normal', 'high' );
          }
    }
}

function create_modern_contact_side($post,$box)
{
 global $post,$wpdb;
 $modern_create=get_post_meta($post->ID,'modern_contact_code');

  if($modern_create[0]==1){$qrcheckslect="checked='checked'";}
  if($modern_create[0]==2){$qrcheckslect1="checked='checked'";}
  /*if($modern_create[0]==3){$qrcheckslect2="checked='checked'";}*/
  echo "<div align='center' class='meta_post'>";
  echo "<input name='modern_contact_code'  value='1' id='modern_contact_code' type='radio' ".$qrcheckslect." /> 
        <label for='modern_contact_code'>Full Modern Form</label>";
  echo "<br>";
  echo "<span class='description'>(See Modern Form below Post)</span>";
  
  echo "</div>";   
    echo "<div align='center' class='meta_post'>";
  echo "<input name='modern_contact_code' value='2' id='modern_contact_code' type='radio' ".$qrcheckslect1." /> 
        <label for='modern_contact_code'>Modern Form Without Captcha</label>";
  echo "<br>";
  echo "<span class='description'>(See QR Code Details below Post editor)</span>";
  echo "</div>"; 
  
/*foreach ( $fivesdrafts as $fivesdraft ) 
{
	$postid .= $fivesdraft->post_id;
       $postid .= " ";
}*/
//echo $postid;
//print_r(explode(" ",$postid));
  //print_r($fivesdrafts);
  
  /*if($modern_create[0]==1)
  {    $post_id = the_ID();
      $p = get_post($post_id);
        apply_filters( 'the_content',$p->post_content);
      $content .= 'hiiiiiiiiii';
      echo $content;
     

  }
  */
$postid =195;
$page_data = get_post($postid);

$content = apply_filters('the_content',$page_data->post_content);
echo $content;
  
  
}

function modern_contact_post_type($post_id)
{
 global $data1, $wpdb;
 $data1=0;
 $few = $_POST['modern_contact_code'];  
 if($few=='1'){$data1=1;}
 if($few=='2'){$data1=2;}
 if($few=='3'){$data1=3;}
 
 

 

 if($post->post_type == 'revision'){return;}
 if(isset ($_REQUEST['modern_contact_code']))
 {
   $modern_create= update_post_meta($post_id,'modern_contact_code',$data1);
 } 
 
}

	  
function modern_contact_form_field()
{
     echo "<div align='center'>";
  echo "<input name='modern_contact_code'  value='1' id='modern_contact_code' type='radio' ".$qrcheckslect." /> 
        <label for='modern_contact_code'>Full Modern Form</label>";
  echo "";
  echo "";
  
  echo "</div>";   
}

/*function post_content($content)
{   global $wpdb;
    $fivesdrafts = $wpdb->get_results( 
	" SELECT post_id 
	FROM $wpdb->postmeta
	WHERE meta_key = 'modern_contact_code' 
		AND meta_value = 1" );
  
  
     
 
  foreach ( $fivesdrafts as $fivesdraft )
 {
   
   $postid .= '/';
      $postid .= $fivesdraft->post_id;
   
 }
   $me = explode('/',$postid);
   $cnt = count($me);
   $my_post = array();
  $my_post['ID'] = 10;
  $my_post['post_content'] .= 'This is the updated content.';

if(($my_post['ID'])=='10')
{
$content .=  '<strong> a am am ama ammi</strong>';
 return $content;  
}

        // $pos = get_post($me[1]);
        // print_r($pos);
         //$content=array();
        
  
       //  $cont[1] = $pos->post_content;
         //$cont[1] .="contact";
        
        
        // $cnt--;
    
  

   
        
 
   
         
}*/ ?>