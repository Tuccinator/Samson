#Samson

Samson is a simple tiny template engine without a dedicated syntax in version 1.0.

Samson supports the following:

* CSRF Protection
* Automatically escaped variables
* Forms w/ input fields, select fields, buttons, and textarea. Labels are automatically created.
* Custom Elements
* Partial templates

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
	</br>
	<?php echo $form; ?>
	<footer>This is a footer.</footer>
</body>
</html>
```
Using the methods below, it will convert those variables to their actual values.

```php

use Samson\Samson;
use Samson\Template;
use Samson\Element;

// Instantiate the template engine with the element manager as a parameter (mandatory if using custom elements)
$samson = new Samson(new Element\ElementManager());

// Set the template directory
$samson->setTemplateDir('src/views/');

// Add the header partial template by injecting a Template object into the addPartial method
$samson->addPartial(new Template('header.tpl', ['pageTitle' => 'Welcome to Samson!']));

// Create a custom element with a variable name and ID of 'testElement'
$samson->addElement(new Element\Element('div', '<p>Here is a nice div.</p>', array('id' => 'testElement', 'class' => 'full-span')));

// Create a form with an input field, select field, textarea and button
$form = $samson->form(array('action' => '', 'method' => 'POST'))
				->input(array('type' => 'text', 'id' => 'username', 'name' => 'username'))
				->select(array('name' => 'role', 'class' => 'form-control', 'options' => array('admin' => 'Admin', 'mod' => 'Mod', 'user' => 'User')))
				->textarea(array('name' => 'description', 'content' => 'I would really like to be an admin.', 'class' => 'sumo'))
				->button(array('type' => 'submit', 'name' => 'submit' , 'class' => 'btn btn-primary', 'text' => 'Create'))
				->create();

// Add the main template by injecting another Template object into the addTemplate method. The second parameter takes the values to be escaped. Third parameter are non-escaped values.
$samson->addTemplate(new Template('user.tpl', ['username' => 'Nick Tucci', 'password' => 'password'], ['form' => $form]));

// Add yet another partial template, this time the footer
$samson->addPartial(new Template('footer.tpl'));

// Finally render the whole template
$samson->render();
```
After being rendered, it will change the above variables to below.

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
	</br>
	<form action="" method="POST">
		<label for="username">Username</label>
		<input type="text" id="username" name="username" />
		
		<label for="role">Role</label>
		<select name="role" class="form-control">
			<option value="admin">Admin</option>
			<option value="mod">Mod</option>
			<option value="user">User</option>
		</select>

		<label for="description">Description</label>
		<textarea name="description" class="sumo">
			I would really like to be an admin.
		</textarea>

		<button type="submit" name="submit" class="btn btn-primary">Create</button>
	</form>

	<footer>This is a footer.</footer>
</body>
</html>
```

Go try it out and see if you like it. I would very much benefit from the feedback!