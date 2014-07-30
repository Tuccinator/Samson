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
	 * ID associated with HTML element
	 * @var string
	 */
	private $id;

	/**
	 * Name associated with HTML element
	 * @var string
	 */
	private $name;

	/**
	 * Class associated with HTML element
	 * @var string
	 */
	private $class;

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
	 * @param string  $id      ID associated with HTML element
	 * @param string  $class   Class associated with HTML element
	 * @param string  $name    Name associated with HTML element
	 */
	public function __construct($type, $content, $id = false, $class = false, $name = false)
	{
		$this->type = $type;
		$this->id = $id;
		$this->name = $name;
		$this->class = $class;
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
	 * Retrieve the ID of HTML element
	 * @return string ID of HTML element
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Retrieve the class of HTML element
	 * @return string Class of HTML element
	 */
	public function getClass()
	{
		return $this->class;
	}

	/**
	 * Retrieve the name of the HTML element
	 * @return string Name of the HTML element
	 */
	public function getName()
	{
		return $this->name;
	}
}