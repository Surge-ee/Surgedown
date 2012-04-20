<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Markdown_ft extends EE_Fieldtype {

	var $info = array(
		'name'		=> 'Markdown',
		'version'	=> '0.5'
	);
	
	var $has_array_data = FALSE;

	// --------------------------------------------------------------------

	function validate($data)
	{
		return TRUE;
	}

	// --------------------------------------------------------------------

	function display_field($data)
	{		
		return form_textarea(array(
			'name'	=> $this->field_name,
			'id'	=> $this->field_name,
			'value'	=> $data
		));
	}

	// --------------------------------------------------------------------

	function replace_tag($data, $params = '', $tagdata = '')
	{
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
	
	// --------------------------------------------------------------------
	
	function display_settings($data)
	{
		/* Meeehhhhhhh
		$prefix = 'markdown';

		$field_rows	= ($data['field_ta_rows'] == '') ? 6 : $data['field_ta_rows'];
		
		$this->EE->table->add_row(
			lang('textarea_rows', 'field_ta_rows'),
			form_input(array('id'=>'field_ta_rows','name'=>'field_ta_rows', 'size'=>4,'value'=>$field_rows))
		);
		
		$this->field_formatting_row($data, $prefix);
		$this->text_direction_row($data, $prefix);
		$this->field_show_formatting_btns_row($data, $prefix);
		$this->field_show_smileys_row($data, $prefix);
		$this->field_show_glossary_row($data, $prefix);
		$this->field_show_spellcheck_row($data, $prefix);
		$this->field_show_writemode_row($data, $prefix);
		$this->field_show_file_selector_row($data, $prefix);
		*/
	}
}

// END Textarea_ft class

/* End of file ft.textarea.php */
/* Location: ./system/expressionengine/fieldtypes/ft.textarea.php */