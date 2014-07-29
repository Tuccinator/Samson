<?php
namespace Samson;

class Samson
{

	private $templateDir;
	private $engine;
	private $partials;
	private $elementManager;

	public function __construct($elementManager = false)
	{
		$this->engine = 'php';
		$this->partials = [];
		$this->elementManager = $elementManager;
	}

	public function setTemplateDir($path)
	{
		$this->templateDir = $path;
	}

	public function addPartial(Template $template)
	{
		if(!file_exists($this->templateDir . $template->getFile())) {
			echo "The <i>{$template->getFile()}</i> partial does not exist.";
			return false;
		}

		array_push($this->partials, $template);
	}

	public function getPartials()
	{
		return $this->partials;
	}

	public function addElement(Element\Element $element)
	{
		if($this->elementManager !== false) {
			$this->elementManager->addElement($element);
		}
	}

	public function render(Template $template)
	{
		if(count($this->partials)) {
			foreach($this->partials as $partial) {
				extract($partial->getVars());
				include($this->templateDir . $partial->getFile());
			}
		}

		foreach($this->elementManager->getElements() as $element) {
			echo "<{$element->getType()} id='{$element->getId()}'>{$element->getContent()}</{$element->getType()}>";
		}

		if(!file_exists($this->templateDir . $template->getFile())) {
			echo "<i>{$template->getFile()}</i> does not exist.";
			return false;
		}

		extract($template->getVars());
		include($this->templateDir . $template->getFile());
	}

	public function setEngine($engine)
	{
		$engines = ['php', 'samson'];

		if(!in_array($engine, $engines)) {
			echo "$engine is not a valid engine.";
			return false;
		}

		$this->engine = $engine;
	}

	public function getEngine()
	{
		return $this->engine;
	}
}