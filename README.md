#Samson

Samson is a little template engine without a dedicated syntax. This uses pure PHP and is simple to use.

```html
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title><?php echo $pageTitle; ?></title>
</head>

<body>
	<h1><?php echo $username; ?></h1>
	<?php echo $testElement; ?>
	<p><?php echo $password; ?></p>
</body>
</html>
```

```php

use Samson\Samson;
use Samson\Template;
use Samson\Element;

//Instantiate the template engine with element manager
$samson = new Samson(new Element\ElementManager());

//Set the template paths
$samson->setTemplateDir('src/views/');

//Add element, ID is same as variable name
$samson->addElement(new Element\Element('div', 'Here is a test div.', 'testElement'));

//Add the header partial
$samson->addPartial('header.tpl', array('pageTitle' => 'Welcome to Samson!'));

//Render the partials and templates
$samson->render('user.tpl', array('username' => 'Tuccinator', 'password' => 'password'));
```

```html
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Welcome to Samson!</title>
</head>

<body>
	<h1>Tuccinator</h1>
	<div id="testElement">Here is a test div.</div>
	<p>password</p>
</body>
</html>
```