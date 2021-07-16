<?php


// show_countをaタグ内に表示
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
	$output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
	return $output;
}
add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $output ) {
	$output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$output);
	return $output;
}

// サムネイルサイズ
add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'custom_size',134,134, true );
	add_image_size( 'custom_size_detail', 300, 300, true );
	add_image_size( 'blog-thumb', 1120, 800, true );
}

// wp_titleの半角除去
function my_title_fix($title, $sep, $seplocation){
		if(!$sep || $sep == "｜"){
				$title = str_replace(' '.$sep.' ', $sep, $title);
		}
		return $title;
}
add_filter('wp_title', 'my_title_fix', 10, 3);

// カスタム投稿
add_action('init', 'my_blog_init');
function my_blog_init() {
	register_post_type('blog', array(
			'labels' => array(
			'name' => 'ブログ',
			'singular_name' => 'ブログ',
			'all_items' => 'ブログ一覧',
			'add_new' => 'ブログ追加',
			'add_new_item' => 'ブログの追加',
			'edit_item' => 'ブログの編集',
			'new_item' => 'ブログ追加',
			'view_item' => 'ブログを表示',
			'search_items' => 'ブログを検索',
			'not_found' =>  'ブログが見つかりません',
			'not_found_in_trash' => 'ゴミ箱内にブログが見つかりませんでした。',
			'parent_item_colon' => ''
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'has_archive' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 4,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments'),
		'rewrite' => array('slug' => 'blog', 'with_front' => false)
	));

	// (カテゴリーのような) 階層化できる新規分類を追加
	register_taxonomy('blogcat',array('blog'), array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'ブログ分類',
			'singular_name' => 'ブログ分類',
			'search_items' =>  'ブログ分類を検索',
			'all_items' => 'すべてのブログ分類',
			'parent_item' => '親分類',
			'parent_item_colon' => '親分類：',
			'edit_item' => '編集',
			'update_item' => '更新',
			'add_new_item' => '新規分類を追加',
			'new_item_name' => '名前',
		),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'blogcat' ),
	));
}
// カスタム投稿タイプのスラッグを「id」で採番 //
function custom_auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
  if( $post_type == 'blog' ) {
    $slug = $post_ID;
  }
  return $slug;
}
add_filter( 'wp_unique_post_slug', 'custom_auto_post_slug', 10, 4 );

// カスタム投稿の管理画面ページ日付順ソート
add_filter('pre_get_posts', 'set_post_types_admin_order');
function set_post_types_admin_order( $wp_query ) {
	if ( is_admin() ) {
		$post_type = $wp_query->query['post_type'];
		if ( $post_type == 'recruitinfo' ) {
			$wp_query->set('orderby', 'date');
			$wp_query->set('order', 'DESC');
		}
	}
}

// カスタム投稿の月別アーカイブ
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
	global $my_archives_post_type;
	if ( isset($r['post_type']) ) {
		$my_archives_post_type = $r['post_type'];
		$where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
	} else {
		$my_archives_post_type = '';
	}
	return $where;
}

add_filter( 'get_archives_link', 'my_get_archives_link' );
function my_get_archives_link( $link_html ) {
	global $my_archives_post_type;
	if ( '' != $my_archives_post_type ) {
		$add_link .= '?post_type=' . $my_archives_post_type;
		$link_html = preg_replace("/href=\'(.+)\'\s/","href='$1".$add_link." '",$link_html);
		return $link_html;
	}
}

// CSSとjavascriptの表示を制御 wp_headとwp_footerに挿入。第5引数がtrueの場合はwp_footerに
if ( ! is_admin() ) {
	add_action('wp_print_styles', 'add_stylesheet');
	add_action('wp_print_scripts', 'add_script');

	// CSSを定義
	function register_style() {
		wp_register_style('style', get_stylesheet_uri());
		wp_register_style('all', get_stylesheet_directory_uri().'/css/all.css', array(), '');

	}

	// CSSを追加
	function add_stylesheet() {
		register_style();
			wp_enqueue_style('style');
			wp_enqueue_style('all');

		// トップページのみCSSを適用する場合
		if ( is_front_page() ) {
			// wp_enqueue_style('all');
		}
	}

	function register_script() {
		wp_register_script('main', get_stylesheet_directory_uri().'/js/main.js', array(), '', true);
		// wp_register_script('script', get_stylesheet_directory_uri().'/js/script.js', array(), '', true);
	}

	function add_script() {
		// wp_head内のjQuery除去
		// プラグインが動作不良を起こした場合、この記述は削除する
		// wp_deregister_script('jquery');

		// 定義したscriptの追加
		register_script();
		wp_enqueue_script('main');
		// wp_enqueue_script('script');
	}
}

// pagenation
function the_pagination() {
  // 一覧ページのクエリ
  global $wp_query;
  $big = 999999999;
  // １ページ以下なら非表示
  if ( $wp_query->max_num_pages <= 1 ) return;
  return paginate_links( array(
		'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format'       => '?paged=%#%',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'type'         => 'array',
    'end_size'     => 2,
		'mid_size'     => 2,
		'prev_next' => false
  ) );
}
