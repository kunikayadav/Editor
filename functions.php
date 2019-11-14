<?php
/**
 *  Function for Child Theme
 *
 */
if( !function_exists('bridge_qode_child_theme_enqueue_scripts') ) {

	Function bridge_qode_child_theme_enqueue_scripts() {
		wp_register_style( 'bridge-childstyle', get_stylesheet_directory_uri() . '/style.css' );
		wp_enqueue_style( 'bridge-childstyle' );
		wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri(). '/js/custom.js', array(), '1.0', true );
	}

	add_action( 'wp_enqueue_scripts', 'bridge_qode_child_theme_enqueue_scripts', 99 );
}

/* Shortcode to display post date and author for Insights and case study on homepage */
function author_info_function() {

	global $post;

	$author_info = '<div class="insight-meta">{{post_data:post_author}} - {{post_data:post_date}}</div>';

	return $author_info;
}
add_shortcode( 'author-info', 'author_info_function' );


/**
 * Add dots in excerpt
 *
 */
function custom_excerpt_more( $more ) {
	return '[...]';
}
add_filter( 'excerpt_more', 'custom_excerpt_more', 999  );
function post_grid_filter_grid_item_read_more_custom_text( $read_more ) {
    return '[...]';
}
add_filter( 'post_grid_filter_grid_item_read_more','post_grid_filter_grid_item_read_more_custom_text', 999 );

/**
 *  Create Custom Post Type Team
 *
 */
function register_custom_post() {

	$team_labels = array(
		'name'               => __( 'Team', 'bridge' ),
		'singular_name'      => __( 'Team', 'bridge' ),
		'add_new'            => _x( 'Add New Team Member', 'bridge' ),
		'add_new_item'       => __( 'Add New Team Member', 'bridge' ),
		'edit_item'          => __( 'Edit Team Member', 'bridge' ),
		'new_item'           => __( 'New Team Member', 'bridge' ),
		'view_item'          => __( 'View Team Member', 'bridge' ),
		'search_items'       => __( 'Search Team Member', 'bridge' ),
		'not_found'          => __( 'No Team Members found', 'bridge' ),
		'not_found_in_trash' => __( 'No Team Members found in Trash', 'bridge' ),
		'parent_item_colon'  => __( 'Parent Team Member:', 'bridge' ),
		'menu_name'          => __( 'Team', 'bridge' ),
	);

	$team_args = array(
		'labels'              => $team_labels,
		'hierarchical'        => false,
		'description'         => 'Team Post Type',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-groups',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes', ),
	);

	register_post_type( 'team', $team_args );
}

add_action( 'init', 'register_custom_post' );


/**
 * Short code for case study grid
 *
 */
function case_study_play_function() {

	global $post;

	$case_info = '<div class="cs-play-btn">/ Play /</div>';

	return $case_info;
}
add_shortcode( 'case_study_play', 'case_study_play_function' );

// Register Custom Post Type Vascular post
function create_vascularpost_cpt() {

	$labels = array(
		'name' => _x( 'Custom Posts', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Vascular post', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Custom Posts', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Vascular post', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Vascular post Archives', 'textdomain' ),
		'attributes' => __( 'Vascular post Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Vascular post:', 'textdomain' ),
		'all_items' => __( 'All Custom Posts', 'textdomain' ),
		'add_new_item' => __( 'Add New Vascular post', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Vascular post', 'textdomain' ),
		'edit_item' => __( 'Edit Vascular post', 'textdomain' ),
		'update_item' => __( 'Update Vascular post', 'textdomain' ),
		'view_item' => __( 'View Vascular post', 'textdomain' ),
		'view_items' => __( 'View Custom Posts', 'textdomain' ),
		'search_items' => __( 'Search Vascular post', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Vascular post', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Vascular post', 'textdomain' ),
		'items_list' => __( 'Custom Posts list', 'textdomain' ),
		'items_list_navigation' => __( 'Custom Posts list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Custom Posts list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Vascular post', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-customizer',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'vascularpost', $args );

}
add_action( 'init', 'create_vascularpost_cpt', 0 );

/* Custom category for publications */
add_action( 'init', 'create_vascularpost_categories', 0 );
function create_vascularpost_categories() {
	$labels = array(
		'name'              => _x( 'Category', 'Category general name', 'textdomain' ),
		'singular_name'     => _x( 'Category', 'Category singular name', 'textdomain' ),
		'search_items'      => __( 'Search Category', 'textdomain' ),
		'all_items'         => __( 'All Category', 'textdomain' ),
		'parent_item'       => __( 'Parent Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Category', 'textdomain' ),
		'update_item'       => __( 'Update Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Category', 'textdomain' ),
		'new_item_name'     => __( 'New Category CategoryName', 'textdomain' ),
		'menu_name'         => __( 'Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'Category' ),
	);

	register_taxonomy( 'Category', 'vascularpost', $args );
}

/* Custom category for topics */
add_action( 'init', 'create_vascularpost_topics', 0 );
function create_vascularpost_topics() {
	$labels = array(
		'name'              => _x( 'Topic', 'Topic general name', 'textdomain' ),
		'singular_name'     => _x( 'Topic', 'Topic singular name', 'textdomain' ),
		'search_items'      => __( 'Search Topic', 'textdomain' ),
		'all_items'         => __( 'All Topic', 'textdomain' ),
		'parent_item'       => __( 'Parent Topic', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Topic:', 'textdomain' ),
		'edit_item'         => __( 'Edit Topic', 'textdomain' ),
		'update_item'       => __( 'Update Topic', 'textdomain' ),
		'add_new_item'      => __( 'Add New Topic', 'textdomain' ),
		'new_item_name'     => __( 'New Topic CategoryName', 'textdomain' ),
		'menu_name'         => __( 'Topic', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'Topic' ),
	);

	register_taxonomy( 'Topic', 'vascularpost', $args );
}

/* Custom category for sections */
add_action( 'init', 'create_vascularpost_sections', 0 );
function create_vascularpost_sections() {
	$labels = array(
		'name'              => _x( 'Section', 'Section general name', 'textdomain' ),
		'singular_name'     => _x( 'Section', 'Section singular name', 'textdomain' ),
		'search_items'      => __( 'Search Section', 'textdomain' ),
		'all_items'         => __( 'All Section', 'textdomain' ),
		'parent_item'       => __( 'Parent Section', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Section:', 'textdomain' ),
		'edit_item'         => __( 'Edit Section', 'textdomain' ),
		'update_item'       => __( 'Update Section', 'textdomain' ),
		'add_new_item'      => __( 'Add New Section', 'textdomain' ),
		'new_item_name'     => __( 'New Section CategoryName', 'textdomain' ),
		'menu_name'         => __( 'Section', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'Section' ),
	);

	register_taxonomy( 'Section', 'vascularpost', $args );
}

/* Custom category for sections */
add_action( 'init', 'create_vascularpost_article_type', 0 );
function create_vascularpost_article_type() {
	$labels = array(
		'name'              => _x( 'Article', 'Article general name', 'textdomain' ),
		'singular_name'     => _x( 'Article', 'Article singular name', 'textdomain' ),
		'search_items'      => __( 'Search Article', 'textdomain' ),
		'all_items'         => __( 'All Article', 'textdomain' ),
		'parent_item'       => __( 'Parent Article', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Article:', 'textdomain' ),
		'edit_item'         => __( 'Edit Article', 'textdomain' ),
		'update_item'       => __( 'Update Article', 'textdomain' ),
		'add_new_item'      => __( 'Add New Article', 'textdomain' ),
		'new_item_name'     => __( 'New Article CategoryName', 'textdomain' ),
		'menu_name'         => __( 'Article', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'Article' ),
	);

	register_taxonomy( 'Article', 'vascularpost', $args );
}

/* upload xml file shortcode */
add_shortcode( 'file_upload', 'upload_form' );
function upload_form() {
	?>
	<form method="post" enctype="multipart/form-data">	
		<div class="form-group">
			<label for="file"> XML File: </label><br/>
				<input type="file" name="fileToUpload" >
		</div>

		<br/>
		<input type='submit' value='Submit' id='submit' name='submit'>
		<input type="reset" value="Reset">	
	</form>

<?php 

	global $wpdb;
    if ( isset($_POST['submit']) ) {
        $uri = wp_upload_dir();
        $upload_dir = $uri['basedir'];
        $upload_dir = $upload_dir . '/';
        $target_dir = $upload_dir;
        $target_file = $target_dir . basename( $_FILES["fileToUpload"]["name"] );
        $filename = basename( $_FILES["fileToUpload"]["name"] );
        $filetypenew = wp_check_filetype( $filename );
        $uploadOk = 1;
        $FileType = pathinfo( $target_file, PATHINFO_EXTENSION );

/* Check if file already exists */
        /* if (file_exists($target_file)) {
            echo "<br/><br/>Sorry, file already exists.";
            $uploadOk = 0;  
    	} */
    
/* Check file size */
		if ( $_FILES["fileToUpload"]["size"] > 500000 ) {
            echo "<br/><br/>Sorry, your file is too large.";
            $uploadOk = 0;
        }
/* Allow certain file formats */
        if ( $FileType != "xml" ) {
            echo "<br/><br/>Sorry, only XML files are allowed.";
            $uploadOk = 0;
        }
/* Check if $uploadOk is set to 0 by an error */
        if ( $uploadOk == 0 ) {
            echo "<br/><br/>Sorry, your file was not uploaded.";
            //echo "<br/>file name is ".$filetypenew." file name is ".$filename;
        } 
        else {
            if ( move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ) {
                echo "<br/><br/>The file " . basename( $_FILES["fileToUpload"]["name"] ) . " has been uploaded successfully!!";
                $xml = simplexml_load_file( $target_file );
                $i = 0;
                $post_titles = (string)$xml->title;
                $post_content = (string)$xml->body;

                $image_count = substr_count($post_content,'data-src');
                preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post_content, $image);
    			echo $image['src'];
    			//echo $image_count; die;
    			$image_label1  = explode('/',$image['src']);
				$image_name   = end($image_label1);
				//$path_parts = pathinfo($image['src']);
				//echo $path_parts['basename'], "\n";
				//print_r($image_name);die;	
                $post_status = $xml->status;
                $post_author = (string)$xml->authors->item0->label;
                $authors = trim( preg_replace('/[^A-Za-z0-9\-]/', '',$post_author) );
                //$author_name = strtolower( $authors );
   				$vitals = (string)html_entity_decode($xml->vitals->value);
   				//echo $author_name; 
   				$summary = (string)html_entity_decode($xml->summary);
   				$summary_image = $xml->summary_image->self;
   				$views = (string)html_entity_decode($xml->view_on_news_body);
   
   				if ( $post_status == 1 ){
   					$status = "publish";
   				}
   				else {
   					$status = "draft";
   				}
   				$password = wp_generate_password( 12, true );
   				$user_id = username_exists( $authors );
			    if ( !$user_id && email_exists($email) == false ) {
			        $user_id = wp_create_user( $authors, $password, $email );
			        if( !is_wp_error($user_id) ) {
			            $user = get_user_by( 'id', $user_id );
			            $user->set_role( 'author' );
			        }
			    }
		
			    /*$query = $wpdb->get_results( $wpdb->prepare( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = %s and post_status = 'publish'", 'vascularpost' ), ARRAY_A );
			    //print_r($query);
			    foreach ( $query as $index => $post ) {
				    if ( $post_titles == $post['post_title'] ) {
				    	echo "match";
				    	$current_post = $post['ID'];
						$my_post = array(
						  'ID' 			=> $current_post,
						  'post_title'  => $post['post_title'],
						  'post_content'=> $xml->body,
						  'post_status' => $status,
						  'post_type'   => 'vascularpost',
						  'post_author' => $user_id
						);

						$pid = wp_update_post( $my_post );
					}
				}*/
                /* Insert custom post data. */
                
	                $post = array(
	                    'post_title'    => $xml->title,
	                    'post_content'  => html_entity_decode($xml->body), 
	                    'post_status'   => $status,
	                    'post_type'   	=> 'vascularpost',
	                    'post_author'   => $user_id
	                );

	                $post_id = wp_insert_post( $post );
	                
	                $dirname = get_template_directory()."/s3fs-public/Image/September-2017/";
	                $path = str_replace("\\", "/", $dirname);
	                echo $path; 
	                //die;
						$images = glob($path.$image_name);
						
							foreach( $images as $image ) {
								//$image_n   = end($images);
								$image_upload = '<img src="'.get_template_directory_uri()."/s3fs-public/Image/September-2017/".$image_name.'">';
								//echo $image_upload;
							    //echo '<img src="'.get_template_directory_uri()."/s3fs-public/Image/September-2017/".$image_name.'">';
							    $image_path  = explode('/',$image);
							    $image_last   = end($image_path);
								//print_r($image_last);
							}
						

						/*$dirname = "D:/Mike  Groh - medstat_export/medstat_export/files/s3fs-public/Image/September-2017/".$image_name;
				        $images = scandir($dirname);
				        shuffle($images);
				        $ignore = Array(".", "..");
				        foreach($images as $curimg){
				            if(!in_array($curimg, $ignore)) {
				                echo "<li><a href='".$dirname.$curimg."'><img src='img.php?src=".$dirname.$curimg."&w=300&zc=1' alt='' /></a></li>n ";
				            }
				        }     */    
	                // Add Featured Image to Post
					
				        
	                if( !empty($summary_image) ){
						$image_url        = $summary_image; // Define the image URL here
						$image_label      = explode('/',$image_url);
						$image_name       = end($image_label);
						$upload_dir       = wp_upload_dir(); // Set upload folder
						$image_data       = file_get_contents($image_url); // Get image data
						$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
						$filename         = basename( $unique_file_name ); // Create image file name

						// Check folder permission and define file location
						if( wp_mkdir_p( $upload_dir['path'] ) ) {
						    $file = $upload_dir['path'] . '/' . $filename;
						} else {
						    $file = $upload_dir['basedir'] . '/' . $filename;
						}

						// Create the image  file on the server
						file_put_contents( $file, $image_data );

						// Check image file type
						$wp_filetype = wp_check_filetype( $filename, null );

						// Set attachment data
						$attachment = array(
						    'post_mime_type' => $wp_filetype['type'],
						    'post_title'     => sanitize_file_name( $filename ),
						    'post_content'   => '',
						    'post_status'    => 'inherit'
						);

						// Create the attachment
						$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

						// Include image.php
						require_once(ABSPATH . 'wp-admin/includes/image.php');

						// Define attachment metadata
						$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

						// Assign metadata to attachment
						wp_update_attachment_metadata( $attach_id, $attach_data );

						// And finally assign featured image to post
						set_post_thumbnail( $post_id, $attach_id );

						if( !empty($image_name) ){
							for ( $i = $image_count; $i >= 1; --$i ) {
							$uploaddir = wp_upload_dir();
						    $file = $image;
						    $uploadfile = $uploaddir['path'].'/'.basename($file);
						    move_uploaded_file($image, $uploadfile);
						    $filename = basename($uploadfile);
						    $wp_filetype = wp_check_filetype(basename( $filename ), null );
						    $attachment1  = array(
						        'post_mime_type' => $wp_filetype['type'],
						        'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
						        'post_content'   => '',
						        'post_status'    => 'inherit',
						    );

						    $attach_id = wp_insert_attachment($attachment1, $uploadfile);
						    $attachment_id = wp_get_attachment_image( $attach_id );
						    echo $attachment_id;   
						    update_post_meta( $post_id, '_thumbnail_id', $attach_id);
						    }  
						}

					}

	  
					else {
						/*$image = $image['src'];
						$imageData = base64_encode(file_get_contents($image));
						echo '<img src="'.$image.'">';*/
						/*$entries = scandir(".");
						$filelist = array();
						foreach($entries as $image) {
						    if (strpos($image, $image_name) === 0) {
						        $filelist[] = $image;
						        print_r($filelist);
						    }
						}*/
		            	$uploaddir = wp_upload_dir();
					    $file = $image;
					    $uploadfile = $uploaddir['path'].'/'.basename($file);
					    move_uploaded_file($image, $uploadfile);
					    $filename = basename($uploadfile);
					    $wp_filetype = wp_check_filetype(basename( $filename ), null );
					    $attachment1  = array(
					        'post_mime_type' => $wp_filetype['type'],
					        'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
					        'post_content'   => '',
					        'post_status'    => 'inherit',
					    );

					    $attach_id = wp_insert_attachment($attachment1, $uploadfile);
					    $attachment_id = wp_get_attachment_image( $attach_id );
					    echo $attachment_id;   
					    update_post_meta( $post_id, '_thumbnail_id', $attach_id);         	
					}

	                if ( !empty( $vitals ) ) {
	                	update_post_meta( $post_id, 'Vitals Value', $vitals, $prev_value = '' );
	            	}
	            	if ( !empty( $summary ) ) {
	                	update_post_meta( $post_id, 'Summary', $summary, $prev_value = '' );
	            	}
	            	if ( !empty( $views ) ) {
	                	update_post_meta( $post_id, 'View on News Body', $views, $prev_value = '' );
	            	}
	            	
	            	/* Insert category publications */
	            	
	            	foreach ( $xml->publications as $child ) { 
					    $count = $child->count();
					    //echo $count;
					} 
	   				for ( $i = $count; $i >= 0; --$i ) {
	   					//echo "item$i<br/>";
	   					$publication_desc = (string)$xml->publications->{"item$i"}->description;
	   					$publication = (string)$xml->publications->{"item$i"}->label;
	   					$vascular_publication = trim( preg_replace('/\s*\([^)]*\)/', '', $publication) );
	   					$public = strtolower( $vascular_publication );
	   					wp_insert_term(
							    $publication,  
							    'Category', 
							    array(
							        'description'=> $publication_desc,
							        'slug'       => $publication,
							        'parent'     => $parent_term_a_id
							    )
							);
	   					$terms = get_terms('Category',
			        				array (
			        					'taxonomy'   => 'Category',
										'hide_empty' => false,
										'term'       => $term->slug)
			        				);
					foreach ( $terms as $term ) {
						/* print_r( $term->name); die; */
						$names = trim( preg_replace('/\s*\([^)]*\)/', '', $term->name) );
						$label = strtolower( $names );
		   					if ( $label == $public ) {
						    	/* echo "true";
						    	print_r(array($term->term_id)); */
						    	wp_set_post_categories( $post_id, $post_categories = array($term->term_id), $append = true );
							}
							else {
								$cid = wp_insert_term(
								    $publication,  
								    'Category', 
								    array(
								        'description' => $publication_desc,
								        'slug'        => $publication,
								        'parent'      => $parent_term_a_id
								    )
								);
								if( !is_wp_error($cid) )
								$term_id = $cid['term_id'];
								/* echo "<pre>";
								echo $term_id; */
								wp_set_post_categories( $post_id, $post_categories = array( $term_id ), $append = true );
							}
		   				}
	   				}

	   				/* Insert category topics */
	   					
	            	foreach ( $xml->topics as $child ){ 
					    $count = $child->count();
					} 
		   				for ( $i = $count; $i >= 0; --$i ) {
		   					/* echo "item$i<br/>"; */
		   					$topic_desc      = (string)$xml->topics->{"item$i"}->description;
		   					$topics_name     = (string)$xml->topics->{"item$i"}->label;
		   					$vascular_topics = trim( preg_replace('/[^A-Za-z0-9\-]/', '', $topics_name) );
		   					$vascular_topic  = strtolower( $vascular_topics );
		   					/* print_r ($vascular_topic); */
		   					wp_insert_term(
								    $topics_name,  
								    'Topic', 
								    array(
								        'description'=> $topic_desc,
								        'slug'       => $topics_name,
								        'parent'     => $parent_term_a_id
								    )
								);
		   					$topics = get_terms('Topic',
	            				array (
	            					'taxonomy'   => 'Topic',
									'hide_empty' => false,
									'term'       => $term->slug)
	            				);

					foreach ( $topics as $topic ) {
						/* print_r( $topic->term_id ); die; */
						$topic_name = trim( preg_replace('/[^A-Za-z0-9\-]/', '', $topic->name) );
						$topic_label = strtolower( $topic_name );
		   					
		   					if ( $topic_label == $vascular_topic ) {
						    	wp_set_post_terms( $post_id, array($topic->term_id), 'Topic', $append = true );
							}
							else {
								$tid = wp_insert_term(
								    $topics_name,  
								    'Topic', 
								    array(
								        'description' => $topic_desc,
								        'slug'        => $topics_name,
								        'parent'      => $parent_term_a_id
								    )
								);
								if ( !is_wp_error($tid) )
								$topic_id = $tid['term_id'];
								wp_set_post_terms( $post_id, array($topic_id), 'Topic', $append = true );
							}
		   				}
	   				}

	   				/* Insert category sections */
	   					
	            	foreach ( $xml->sectionss as $child ){ 
					    $count = $child->count();
					} 
		   				for ( $i = $count; $i >= 0; --$i ) {
		   					/* echo "item$i<br/>"; */
		   					$section_desc      = (string)$xml->sections->{"item$i"}->description;
		   					$sections_name     = (string)$xml->sections->{"item$i"}->label;
		   					$vascular_sections = trim( preg_replace('/\s*\([^)]*\)/', '', $sections_name) );
		   					$vascular_section  = strtolower( $vascular_sections );
		   					/* print_r ($vascular_section); */
		   					wp_insert_term(
								    $sections_name,  
								    'Section', 
								    array(
								        'description'=> $section_desc,
								        'slug'       => $sections_name,
								        'parent'     => $parent_term_a_id
								    )
								);
		   					$sections = get_terms('Section',
	            				array (
	            					'taxonomy'   => 'Section',
									'hide_empty' => false,
									'term'       => $term->slug)
	            				);

					foreach ( $sections as $section ) {
						/* print_r( $section->name ); die; */
						$section_name = trim( preg_replace('/\s*\([^)]*\)/', '', $section->name) );
						$section_label = strtolower( $section_name );
		   					
		   					if ( $section_label == $vascular_section ) {
						    	wp_set_post_terms( $post_id, array($section->term_id), 'Section', $append = true );
							}
							else {
								$sid = wp_insert_term(
								    $section_name,  
								    'Section', 
								    array(
								        'description' => $section_desc,
								        'slug'        => $section_name,
								        'parent'      => $parent_term_a_id
								    )
								);
								if ( !is_wp_error($sid) )
								$section_id = $sid['term_id'];
								wp_set_post_terms( $post_id, array($section_id), 'Section', $append = true );
							}
		   				}
	   				}

	   				/* Insert category article type */
	   					
		   					$article_desc = (string)$xml->article_type->description;
		   					$article_type = (string)$xml->article_type->label;
		   					$vascular_article = trim( preg_replace('/\s*\([^)]*\)/', '', $article_type) );
		   					$vascular_articles  = strtolower( $vascular_article );
		   					/* print_r ($vascular_articles); */
		   					wp_insert_term(
								    $article_type,  
								    'Article', 
								    array(
								        'description'=> $article_desc,
								        'slug'       => $article_type,
								        'parent'     => $parent_term_a_id
								    )
								);
		   					$articles = get_terms('Article',
	            				array (
	            					'taxonomy'   => 'Article',
									'hide_empty' => false,
									'term'       => $term->slug)
	            				);
		   				foreach ( $articles as $article ) {

							$article_name = trim( preg_replace('/\s*\([^)]*\)/', '', $article->name) );
							$article_label = strtolower( $article_name );
		
		   					if ( $article_label == $vascular_articles ) {
						    	wp_set_post_terms( $post_id, array($article->term_id), 'Article', $append = true );
							}
							else {
								$aid = wp_insert_term(
								    $article_name,  
								    'Article', 
								    array(
								        'description' => $article_desc,
								        'slug'        => $article_name,
								        'parent'      => $parent_term_a_id
								    )
								);
								if ( !is_wp_error($aid) )
								$article_id = $aid['term_id'];
								wp_set_post_terms( $post_id, array($article_id), 'Article', $append = true );
							}
						}
	   				//}
   			 	//}   			
        	}

       	}
   	}
}

/* Adding Filters to the Custom Post Type vascular post */
function filter_post_by_taxonomies($post_type) {

	/* Apply this only on a specific post type */
	if ( 'vascularpost' !== $post_type )
		return;

	/* A list of taxonomy slugs to filter by */
	$taxonomies = array( 'Category', 'Topic', 'Section', 'Article' );
	foreach ( $taxonomies as $taxonomy_slug ) {

		/* Retrieve taxonomy data */
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;
		/* Retrieve taxonomy terms */
		$terms = get_terms( $taxonomy_slug );

		/* Display filter HTML */
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
	}

}
add_action( 'restrict_manage_posts', 'filter_post_by_taxonomies' , 10);