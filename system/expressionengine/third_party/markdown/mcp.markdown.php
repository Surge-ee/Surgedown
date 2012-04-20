<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
// ------------------------------------------------------------------------

/**
 * Markdown Module Control Panel File
 *
 * @package		Markdown
 * @subpackage	Addons
 * @category	Module
 * @author		Chris Fidao
 * @link		@fideloper
 */

class Markdown_mcp {
	
	public $return_data;
	
	private $_base_url;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		
		$this->_base_url = BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=markdown';
		
		$this->EE->cp->set_right_nav(array(
			'module_home'	=> $this->_base_url,
			// Add more right nav items here.
		));
	}
	
	// ----------------------------------------------------------------

	/**
	 * Index Function
	 *
	 * @return 	void
	 */
	public function index()
	{
		$this->EE->cp->set_variable('cp_page_title', 
								lang('markdown_module_name'));
		
		/**
		 * This is the addons home page, add more code here!
		 */		
	}

	/**
	 * Start on your custom code here...
	 */
	
}
/* End of file mcp.markdown.php */
/* Location: /system/expressionengine/third_party/markdown/mcp.markdown.php */