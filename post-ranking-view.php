<?php
/**
 * Plugin Name: Post Ranking View
 * Plugin URI: http://lbideias.com.br
 * Description: This plugin counts the number of visitors to each post and generates a ranking of most viewed posts.
 * Author: leobaiano
 * Author URI: http://lbideias.com.br/
 * Version: 1.0
 * License: GPLv2 or later
 * Text Domain: lb_prv
 * Domain Path: /languages/
 */

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Sets the plugin path.
	define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

	/**
	 * Class Post Ranking View
	 * @version 1.0
	 * @author Leo Baiano <leobaiano@lbideias.com.br>
	 */
	class PostRankingView {
		public static $lb_prv_views = 'lb_prv_views';

		public function __construct() {
			add_action( 'wp_head', array( $this, 'trackPostView' ) );
		}

		/**
		 * Updates the amount of visitors to a post
		 * @param  int $postID - Post id
		 */
		public  function setPostView( $postID ) {
			$count = get_post_meta( $postID, self::$lb_prv_views, true );
			
			$cookie = $_COOKIE["lb_prv_" . $postID];
			if( empty( $cookie ) ) {
				setcookie( "lb_prv_" . $postID, 1, time()+172800 ); 
				if( $count == '' ) {
					add_post_meta( $postID, self::$lb_prv_views, 1 );
				}
				else {
					$count++;
					update_post_meta( $postID, self::$lb_prv_views, $count );
				}
			}
		}

		/**
		 * Checks if the page is accessed and the single case but adds a visit
		 */
		public function trackPostView() {
			if ( !is_single() ) return;
			global $post;
			self::setPostView( $post->ID );
		}

		/**
		 * Returns the number of hits the post
		 * @param  int $postID - Post id
		 * @return int $count - Number of views the post
		 */
		public function coutPostViews( $postID ){
			$count = get_post_meta( $postID, self::$lb_prv_views, true );
			if( $count == '')
				return 0;
			else
				return $count;
		}

		/**
		 * Display Ranking
		 * @param  int $amount - Amount of posts to be displayed - Default = 5
		 * @param  string  $post_type - Type of post that should be considered in the ranking, if not set all kind of posts will enter the ranking.
		 * @param  string  $category - Category that should be considered in the ranking, if not set posts from all categories will enter the ranking.
		 * @param  boolean $print - Sets whether HTML is returned or an array with the posts ranking
		 * @return boolean $objPosts - Array or HTML
		 */
		public static function displayRanking( $amount = 5, $post_type = null, $category = null, $print = null ) {
			$arrPost = array();
			$args = array(
					'posts_per_page' => $amount,
					'meta_key' => self::$lb_prv_views,
					'orderby' => 'meta_value_num',
					'order' => 'DESC'
				);
			if( !empty( $post_type ) )
				$args['post_type'] = $post_type;

			if ( !empty( $category ) ) {
				if( is_numeric( $category ) )
					$args['category'] = $category;
				else
					$args['category_name'] = $category;
			}
			
			$qPosts = new WP_Query( $args );
			if( $qPosts->have_posts() ) {
				while( $qPosts->have_posts() ) { 
					$qPosts->the_post();
					$postID = get_the_ID();
					$url = get_permalink( $postID );
					$title = get_the_title( $postID );
					$views = get_post_meta( $postID, self::$lb_prv_views, true );
					$arrPost[] = array(
							'url'	=> $url,
							'title'	=> $title,
							'views'	=> $views
						);
				}
			}

			if( !empty( $arrPost ) ) {
				if( empty( $print ) ){
					$view = '<ul>';
						foreach( $arrPost as $row ) {
							$view .= '<li>';
								$view .= '<a href="' . $row['url'] . '" title="' . $row['title'] . '">' . $row['title'] . ' (' . $row['views'] . ')</a>';
							$view .= '</li>'; 
						}
					$view .= '</ul>';
				}
				else{
					$view = $arrPost;
				}
				return $view;
			}
			else{
				return "";
			}
		}
	}
	new PostRankingView;

	function displayRanking( $amount = 5, $post_type = null, $category = null, $print = null ){ 
		$posts = PostRankingView::displayRanking( $amount, $post_type, $category, $print );
		if( empty( $print ) )
			echo $posts;
		else
			return $posts;
	}