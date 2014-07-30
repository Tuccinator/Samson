<?php
namespace Samson\Element;

/**
 * @author Nick Tucci <nicktucci@hotmail.ca>
 * @version 1.0
 * @package Samson
 * @copyright 2014 https://github.com/Tuccinator/Samson
 */
class ElementManager
{
	/**
	 * All elements to be used with template
	 * @var array
	 */
	private $elements = [];

	/**
	 * Add an HTML element
	 * @param Element $element HTML element
	 */
	public function addElement(Element $element)
	{
		array_push($this->elements, $element);
	}

	/**
	 * Retrieve all HTML elements of template
	 * @return array HTML elements
	 */
	public function getElements()
	{
		return $this->elements;
	}
}