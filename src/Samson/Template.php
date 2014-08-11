<?php
namespace Samson;

/**
 * @author Nick Tucci <nicktucci@hotmail.ca>
 * @version 1.0
 * @package Samson
 * @copyright 2014 https://github.com/Tuccinator/Samson
 */
class Template
{
	/**
	 * All variables associated with template
	 * @var array
	 */
	private $vars;

	/**
	 * Filename to be included
	 * @var string
	 */
	private $file;

	/**
	 * Set the template properties
	 * @param string $file Filename
	 * @param array $vars All variables of template
	 */
	public function __construct($file, $escapedVars = [], $vars = [])
	{
		$this->file = $file;
		$this->vars['escaped'] = $escapedVars;
		$this->vars['original'] = $vars;
	}

	/**
	 * Set the filename explicitly
	 * @param string $file Filename
	 */
	public function setFile($file)
	{
		$this->file = $file;
	}

	/**
	 * Set the variables of the template
	 * @param array $array Variables of template
	 */
	public function setVars(array $array)
	{
		$this->vars = $array;
	}

	/**
	 * Retrieve all variables
	 * @return array Variables
	 */
	public function getVars($index = 'original')
	{
		return $this->vars[$index];
	}

	/**
	 * Retrieve the filename
	 * @return string Filename
	 */
	public function getFile()
	{
		return $this->file;
	}

}