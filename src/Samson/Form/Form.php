<?php
namespace Samson\Form;

/**
 * @author Nick Tucci <nicktucci@hotmail.ca>
 * @version 1.0
 * @package Samson
 * @copyright 2014 https://github.com/Tuccinator/Samson
 */
class Form
{
	/**
	 * All form input fields
	 * @var array
	 */
	public $fields;

	/**
	 * Attributes of form
	 * @var string
	 */
	public $formAttr;

	/**
	 * Set the form attributes
	 * @param Array $formAttr Form attributes
	 */
	public function __construct(Array $formAttr)
	{
		$this->fields = array();
		foreach($formAttr as $key => $value) {
			$this->formAttr .= "{$key}='{$value}' ";
		}
	}

	/**
	 * Add an input field to form
	 * @param  Array  $attr Field attributes
	 * @return self
	 */
	public function input(Array $attr)
	{
		$input = '<label for="' . $attr['name'] .'">' . ucfirst($attr['name']) . '</label>';
		$input .= '<input ';
		foreach($attr as $attrKey => $attribute) {
			$input .= $attrKey . '="' . $attribute . '" ';
		}
		$input .= ' />';
		array_push($this->fields, $input);
		return $this;
	}

	/**
	 * Select element for form
	 * @param  Array  $attr Attributes and options
	 * @return self
	 */
	public function select(Array $attr)
	{
		$select = '<label for="' . $attr['name'] . '">' . ucfirst($attr['name']) . '</label>';

		$options = '';
		foreach($attr['options'] as $optionKey => $option) {
			$options .= '<option value="' . $optionKey . '">' . $option . '</option>';
		}
		unset($attr['options']);

		$attrs = '';
		foreach($attr as $attrKey => $attribute) {
			$attrs .= $attrKey . '="' . $attribute . '" ';
		}
		$select .= '<select ' . $attrs . '>';
		$select .= $options;
		$select .= '</select>';

		array_push($this->fields, $select);
		return $this;
	}

	/**
	 * Textarea for form
	 * @param  Array  $attr Attributes and content
	 * @return self
	 */
	public function textarea(Array $attr)
	{
		$content = $attr['content'];
		unset($attr['content']);
		
		$attrs = '';
		foreach($attr as $attrKey => $attribute) {
			$attrs .= $attrKey . '="' . $attribute . '" ';
		}
		$textarea = '<label for="' . $attr['name'] . '">' . ucfirst($attr['name']) . '</label>';
		$textarea .= '<textarea ' . $attrs . '>' . $content . '</textarea>';
		array_push($this->fields, $textarea);
		return $this;
	}

	/**
	 * Button for form
	 * @param  Array  $attr Attributes and text
	 * @return self
	 */
	public function button(Array $attr)
	{
		$text = $attr['text'];
		unset($attr['text']);

		$attrs = '';
		foreach($attr as $attrKey => $attribute) {
			$attrs .= $attrKey . '="' . $attribute . '" ';
		}

		$button = '<button ' . $attrs . '>' . $text . '</button>';
		array_push($this->fields, $button);
		return $this;
	}

	/**
	 * Retreive a random 128 character string
	 * @return string Random string
	 */
	public function getCSRF()
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$token = '';
		for($i=0; $i <= 128; $i++) {
			$token .= $characters[mt_rand(0, strlen($characters) - 1)];
		}
		return $token;
	}

	/**
	 * Render and create the form
	 * @return string Form
	 */
	public function create()
	{
		$form = '<form ' . $this->formAttr . '>';

		foreach($this->fields as $field) {
			$form .= $field;
		}

		$token = $this->getCSRF();
		$_SESSION['token'] = $token;

		$form .= '<input type="hidden" name="CSRFToken" value="' . $token . '" />';
		$form .= '</form>';

		return $form;
	}
}