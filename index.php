<?php

require('vendor/autoload.php');

use Samson\Samson;
use Samson\Template;
use Samson\Element;

$samson = new Samson(new Element\ElementManager());
$samson->setTemplateDir('src/views/');
$samson->addPartial(new Template('header.tpl', ['pageTitle' => 'Samson']));
$samson->addElement(new Element\Element('div', '<p>Here is a nice div.</p>', 'testElement'));
$samson->render(new Template('user.tpl', ['username' => 'Nick Tucci', 'password' => 'password']));