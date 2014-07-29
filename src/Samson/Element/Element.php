<?php
namespace Samson\Element;

class Element
{
	private $id;

	private $name;

	private $class;

	private $type;

	private $content;

	public function __construct($type, $content, $id = false, $class = false, $name = false)
	{
		$this->type = $type;
		$this->id = $id;
		$this->name = $name;
		$this->class = $class;
		$this->content = $content;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getClass()
	{
		return $this->class;
	}

	public function getName()
	{
		return $this->name;
	}
}