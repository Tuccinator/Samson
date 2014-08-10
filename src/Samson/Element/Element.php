<?php
namespace Samson\Element;

/**
 * @author Nick Tucci <nicktucci@hotmail.ca>
 * @version 1.0
 * @package Samson
 * @copyright 2014 https://github.com/Tuccinator/Samson
 */
class Element
{
	/**
	 * Element attributes
	 * @var array
	 */
	private $attr;

	/**
	 * Type of HTML element i.e. div, h1
	 * @var string
	 */
	private $type;

	/**
	 * Content inside the HTML element
	 * @var string
	 */
	private $content;

	/**
	 * Set the HTML element properties
	 * @param string  $type    Type of HTML element
	 * @param string  $content Content inside the HTML element
	 * @param string  $attr Element attributes
	 */
	public function __construct($type, $content, $attr = [])
	{
		$this->type = $type;
		$this->attr = $attr;
		$this->content = $content;
	}

	/**
	 * Retrieve the HTML element type
	 * @return string Type of HTML element
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Retrieve the content of HTML element
	 * @return string Content inside HTML element
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Retrieve an array of element attributes
	 * @return array Element attributes
	 */
	public function getAttr($index = null)
	{
		if(!is_null($index)) {
			return $this->attr[$index];
		}
		return $this->attr;
	}
}