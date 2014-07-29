<?php
namespace Samson;

class Template
{

	private $vars = [];
	private $file;

	public function __construct($file, $array = [])
	{
		$this->file = $file;
		$this->vars = $array;
	}

	public function setFile($file)
	{
		$this->file = $file;
	}

	public function setVars($array)
	{
		$this->vars = $array;
	}

	public function getVars()
	{
		return $this->vars;
	}

	public function getFile()
	{
		return $this->file;
	}

}