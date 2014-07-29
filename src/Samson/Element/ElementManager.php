<?php
namespace Samson\Element;

class ElementManager
{

	private $elements = [];

	public function addElement(Element $element)
	{
		array_push($this->elements, $element);
	}

	public function getElements()
	{
		return $this->elements;
	}
}