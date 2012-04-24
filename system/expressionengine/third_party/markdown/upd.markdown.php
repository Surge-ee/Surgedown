<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Markdown Module Install/Update File
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Module
 * @author		Chris Fidao
 * @link		@fideloper
 */

require_once(dirname(__FILE__).'/config.php');

class Markdown_upd {
	
	public $version = MARKDOWN_VER;
	
	private $EE;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Installation Method
	 *
	 * @return 	boolean 	TRUE
	 */
	public function install()
	{
		$mod_data = array(
			'module_name'			=> 'Markdown',
			'module_version'		=> $this->version,
			'has_cp_backend'		=> "n",
			'has_publish_fields'	=> 'n'
		);
		
		$this->EE->db->insert('modules', $mod_data);
		
		//Actions
		$this->EE->db->insert('actions', array(
			'class'  => 'Markdown',
			'method' => 'act_convertToMarkdown'
		));

		$this->EE->db->insert('actions', array(
			'class'  => 'Markdown',
			'method' => 'act_createIframe'
		));

		return TRUE;
	}

	// ----------------------------------------------------------------
	
	/**
	 * Uninstall
	 *
	 * @return 	boolean 	TRUE
	 */	
	public function uninstall()
	{
		$mod_id = $this->EE->db->select('module_id')
								->get_where('modules', array(
									'module_name'	=> 'Markdown'
								))->row('module_id');
		
		$this->EE->db->where('module_id', $mod_id)
					 ->delete('module_member_groups');
		
		$this->EE->db->where('module_name', 'Markdown')
					 ->delete('modules');
		
		//Actions
		$this->EE->db->where('class', 'Markdown')->delete('actions');
		
		return TRUE;
	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Module Updater
	 *
	 * @return 	boolean 	TRUE
	 */	
	public function update($current = '')
	{
		return TRUE;
	}
	
}
/* End of file upd.markdown.php */
/* Location: /system/expressionengine/third_party/markdown/upd.markdown.php */