<?php
namespace semantic_ui;

/**
 * This class handles post related info
 */
class post {
	
	public $ref; // Top level class (semantic_ui-main.class.php)
	public $data_class; // the data_class (default: semantic_ui-wp.class.php)
	public $settings;
	
	public function __construct(&$settings,&$ref) {
		$this->ref = &$ref;
		$this->settings = &$settings;
		$this->data_class = &$ref->data_class;
		
		
	}
	
	
	public function the_title($id = FALSE) {
		$ref = &$this->ref;
		$settings = &$this->settings;
		if ($ref->tools->is_default($id)) {
			
		}
		
		
		
		return the_title();
	}
	
	
	public function the_content($id = FALSE) {
		$ref = &$this->ref;
		$settings = &$this->settings;
		
		
		return $ref->data_class->post_excerpt();
	}
	
	
	public function is_sticky($id = FALSE) {
		$ref = &$this->ref;
		$settings = &$this->settings;
		
		
		
	}
	
	
	public function featured_img($id = FALSE) {
		$ref = &$this->ref;
		$settings = &$this->settings;
		
		return $this->data_class->post_img_info($id);
		
	}
	
	public function tags($id = FALSE, $before = FALSE, $sep = FALSE, $after = FALSE, $fstr = FALSE) {
		$ref = &$this->ref;
		$settings = &$this->settings;
		
		$tags = $this->data_class->post_tags($id);
		$count = count($tags);
		
		$_fstr = trim($fstr);
		$sep = (string) $sep;
		
		if (is_string($before)==0) {
			$before = '';
		}
		if (is_string($after)==0) {
			$after = '';
		}
		if (is_string($sep)==0) {
			$sep = ', ';
		}
		if (is_string($fstr)==0 || empty($_fstr)) {
			$fstr = '<a href="%2$s" class="%3$s">%1$s</a>';
		}
		
		$str = ''; $i = 0;
		foreach (array_slice($tags,0,5) as $tag) {
			$i++;
			$str .= sprintf(
				$fstr,
				$before.$tag->name.$after,
				get_tag_link($tag->term_id),
				$tag->slug,
				$tag->description,
				$tag->term_id
			);
			if ($i != $count) {
				$str .= $sep;
			}
		}
		
		return $str;
	}
	
	
}