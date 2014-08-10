<?php
session_start();
require('vendor/autoload.php');

use Samson\Samson;
use Samson\Template;
use Samson\Element;

$samson = new Samson(new Element\ElementManager());
$samson->setTemplateDir('src/views/');
$samson->addPartial(new Template('header.tpl', ['pageTitle' => 'Samson']));
$samson->addElement(new Element\Element('div', '<p>Here is a nice div.</p>', array('id' => 'testElement', 'class' => 'full-span')));
$form = $samson->form(array('action' => '', 'method' => 'POST'))
				->input(array('id' => 'username', 'name' => 'username', 'type' => 'text'))
				->select(array('name' => 'role', 'class' => 'form-control', 'options' => array('admin' => 'Admin', 'mod' => 'Mod', 'user' => 'User')))
				->textarea(array('name' => 'description', 'content' => 'I would really like to be an admin.', 'class' => 'sumo'))
				->button(array('name' => 'submit2' , 'class' => 'btn btn-primary', 'text' => 'Create'))
				->create();
$samson->addTemplate(new Template('user.tpl', ['username' => 'Nick Tucci', 'password' => 'password', 'form' => $form]));
$samson->addPartial(new Template('footer.tpl'));
$samson->render();