<?php
namespace Samson;

/**
 * @author Nick Tucci <nicktucci@hotmail.ca>
 * @version 1.0
 * @package Samson
 * @copyright 2014 https://github.com/Tuccinator/Samson
 */
class Samson
{
	/**
	 * Templates path
	 * @var string
	 */
	private $templateDir;

	/**
	 * Engine
	 * @var string
	 */
	private $engine;

	/**
	 * Partials
	 * @var string
	 */
	private $partials;

	/**
	 * Element manager for managing the elements
	 * @var string
	 */
	private $elementManager;

	/**
	 * Set the private properties
	 * @param ElementManager $elementManager The element manager used for elements
	 */
	public function __construct($elementManager = false)
	{
		$this->engine = 'php';
		$this->partials = [];
		$this->elementManager = $elementManager;
	}

	/**
	 * Set the location of templates
	 * @param string $path Path of templates
	 */
	public function setTemplateDir($path)
	{
		$this->templateDir = $path;
	}

	/**
	 * Add a partial template to template i.e. a comment form, etc
	 * @param Template $template Partial template
	 */
	public function addPartial(Template $template)
	{
		if(!file_exists($this->templateDir . $template->getFile())) {
			echo "The <i>{$template->getFile()}</i> partial does not exist.";
			return false;
		}

		array_push($this->partials, $template);
	}

	/**
	 * Retrieve all of the partials
	 * @return array Partials
	 */
	public function getPartials()
	{
		return $this->partials;
	}

	/**
	 * Add an HTML element for the template
	 * @param Element\Element $element HTML Element
	 */
	public function addElement(Element\Element $element)
	{
		if($this->elementManager !== false) {
			$this->elementManager->addElement($element);
		}
	}

	/**
	 * Renders the view for all templates including partials and elements
	 * @param  Template $template Main template
	 * @return
	 */
	public function render(Template $template)
	{
		$elements = array();

		foreach($this->elementManager->getElements() as $element) {
			$elements[$element->getId()] = "<{$element->getType()} id='{$element->getId()}'>{$element->getContent()}</{$element->getType()}>";
		}

		extract($elements);

		if(count($this->partials)) {
			foreach($this->partials as $partial) {
				extract($partial->getVars());
				include($this->templateDir . $partial->getFile());
			}
		}


		if(!file_exists($this->templateDir . $template->getFile())) {
			echo "<i>{$template->getFile()}</i> does not exist.";
			return false;
		}

		extract($template->getVars());
		include($this->templateDir . $template->getFile());
		return;
	}

	/**
	 * Set the engine to be used
	 * @param string $engine Engine
	 */
	public function setEngine($engine)
	{
		$engines = ['php', 'samson'];

		if(!in_array($engine, $engines)) {
			echo "<i>$engine</i> is not a valid engine.";
			return false;
		}

		$this->engine = $engine;
	}

	/**
	 * Retrieve the current engine
	 * @return string Engine
	 */
	public function getEngine()
	{
		return $this->engine;
	}
}