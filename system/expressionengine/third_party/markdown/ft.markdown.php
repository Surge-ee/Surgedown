<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(dirname(__FILE__).'/config.php');

class Markdown_ft extends EE_Fieldtype {

	public $info = array(
		'name'		=> 'Markdown',
		'version'	=> MARKDOWN_VER
	);
	
	public $has_array_data = FALSE;


	public function validate($data) {
		return TRUE;
	}

	/* PUBLISH PAGE *******************************************************************************************/

	public function display_field($data) {

	$ajax_action_id = $this->EE->db->where(array('class' => 'Markdown', 'method' => 'act_convertToMarkdown'))->get('actions')->row('action_id');
	$iframe_action_id = $this->EE->db->where(array('class' => 'Markdown', 'method' => 'act_createIframe'))->get('actions')->row('action_id');

	// include css and js
	$this->_include_theme_css('css/cp.css');
	$this->_include_theme_js('js/cp.js');

	// init MARKDOWN js
	$this->_insert_js('MARKDOWN.actionId = '.$ajax_action_id.'; MARKDOWN.init();');

	//Need to pass it entry_id
	//Need to pass it which css file (full path)?

	return '<div id="md_container">
				<div id="md_left" class="md_col">
					'.form_textarea(array(
						'name'	=> $this->field_name,
						'id'	=> $this->field_name,
						'value'	=> $data
					)).'
				</div><!-- md_left -->
				<div id="md_right" class="md_col">
					<iframe src="/?ACT='.$iframe_action_id.'&field_id='.$this->field_id.'&entry_id='.$this->EE->input->get('entry_id').'&stylesheet='.urlencode($this->settings['md_css_file']).'" id="md_iframe"></iframe>
				</div><!-- md_right -->
			</div><!-- md_container -->';
	}

	/* FRONT END ***********************************************************************************************/

	public function replace_tag($data, $params = '', $tagdata = '') {
		// return $this->EE->typography->parse_type(
		// 	$this->EE->functions->encode_ee_tags($data),
		// 	array(
		// 		'text_format'	=> $this->row['field_ft_'.$this->field_id],
		// 		'html_format'	=> $this->row['channel_html_formatting'],
		// 		'auto_links'	=> $this->row['channel_auto_link_urls'],
		// 		'allow_img_url' => $this->row['channel_allow_img_urls']
		// 	)
		// );
		//Markdown here
		require(PATH_THIRD . '/markdown/library/markdown.php');
		return Markdown($data);
	}
	
	
	/* INDIVISUAL SETTINGS **************************************************************************************/

	public function display_settings($data) {

		if(!isset($data['md_css_file']) || $data['md_css_file'] === '') {
			$data['md_css_file'] = $this->settings['md_global_css'];
		}

		$this->EE->lang->loadfile('markdown');

		$this->EE->table->add_row(
			lang('ind_css'),
			form_input(array('id'=>'md_css_file','name'=>'md_css_file','value'=>$data['md_css_file']))
		);
	}

	public function save_settings() {
		return array(
	        'md_css_file' => $this->EE->input->post('md_css_file')
	    );
	}

	/* GLOBAL SETTINGS ******************************************************************************************/

	public function display_global_settings() {
		$val = array_merge($this->settings, $_POST);

		$this->EE->lang->loadfile('markdown');
		$this->EE->load->library('table');

		$this->EE->table->set_template(array(
			'table_open'    => '<table class="mainTable padTable" border="0" cellspacing="0" cellpadding="0">',
			'row_start'     => '<tr class="even">',
			'row_alt_start' => '<tr class="odd">'
		));

		$this->EE->table->set_heading(array('data' => lang('glob_setting'), 'style' => 'width: 50%'), lang('glob_value'));

		$this->EE->table->add_row(
			lang('glob_default_css'),
			form_input('md_global_css', $val['md_global_css'], 'id="md_global_css" size="80"')
		);

	    return $this->EE->table->generate();
	}

	function save_global_settings() {
    	return array_merge($this->settings, $_POST);
	}

	/* INSTALL / UNINSTALL **************************************************************************************/

	public function install() {
	    return array(
	        'md_global_css'  => $this->_theme_url().'markdown/css/default.css',
	        'md_css_file' => $this->_theme_url().'markdown/css/default.css'
	    );
	}

	/* UTILITY *************************************************************************************************/

	/**
	 * Include Theme CSS
	 */
	private function _include_theme_css($file) {
		$this->EE->cp->add_to_head('<link rel="stylesheet" type="text/css" href="'.$this->_theme_url().'markdown/'.$file.'?'.MARKDOWN_VER.'" />');
	}

	/**
	 * Include Theme JS
	 */
	private function _include_theme_js($file) {
		$this->EE->cp->add_to_foot('<script type="text/javascript" src="'.$this->_theme_url().'markdown/'.$file.'?'.MARKDOWN_VER.'"></script>');
	}

	/**
	 * Insert CSS
	 */
	private function _insert_css($css) {
		$this->EE->cp->add_to_head('<style type="text/css">'.$css.'</style>');
	}

	/**
	 * Insert JS
	 */
	private function _insert_js($js) {
		$this->EE->cp->add_to_foot('<script type="text/javascript">'.$js.'</script>');
	}

	/**
	 * Theme URL
	 */
	private function _theme_url() {
		return defined('URL_THIRD_THEMES') ? URL_THIRD_THEMES : $this->EE->config->slash_item('theme_folder_url').'third_party/';

	}
}

// END Markdown_ft class

/* End of file ft.markdown.php */
/* Location: ./system/expressionengine/third_party/markdown/ft.markdown.php */