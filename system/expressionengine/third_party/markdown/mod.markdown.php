<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
// ------------------------------------------------------------------------

/**
 * Markdown Module Front End File
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Module
 * @author		Chris Fidao
 * @link		@fideloper
 */

require_once(dirname(__FILE__).'/config.php');
require_once(dirname(__FILE__).'/library/markdown.php');

class Markdown {
	
	public $return_data;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->EE =& get_instance();
	}

	public function act_convertToMarkdown() {
		$markdown = $this->EE->input->post('md_markdown');

		$html = Markdown($markdown);

		echo $html;

		exit;
	}

	public function act_createIframe() {
		$entry_id = $this->EE->input->get('entry_id');
		$css_file = $this->EE->input->get('stylesheet');
		$field_id = $this->EE->input->get('field_id');
		$matrix = $this->EE->input->get('matrix', 0);
		$col_id = $this->EE->input->get('col_id', 0);
		$row_id = $this->EE->input->get('row_id', 0);

		if($field_id === false || $field_id === '' || $entry_id === false || $entry_id === '') {
			exit;
		}

		if($css_file === false || $css_file === '') {
			$css_file = MARKDOWN_GLOBAL_CSS;
		}

		if($matrix == 1) {
			$content = $this->EE->db->select('col_id_'.$col_id)->from('matrix_data')->where('entry_id', $entry_id)->where('row_id', $row_id)->get()->row('col_id_'.$col_id);
		} else {
			$content = $this->EE->db->select('field_id_'.$field_id)->from('channel_data')->where('entry_id', $entry_id)->get()->row('field_id_'.$field_id);
		}

		if(is_array($content)) {
			$content = '';
		}

		$html = file_get_contents(dirname(__FILE__).'/library/iframe.html');

		$html = str_replace('{stylesheet}', $css_file, $html);
		$html = str_replace('{content}', Markdown($content), $html);

		echo $html;

		exit;
	}

	public function toHTML() {
			return Markdown($this->EE->TMPL->tagdata);
	}
	
	
}
/* End of file mod.markdown.php */
/* Location: /system/expressionengine/third_party/markdown/mod.markdown.php */