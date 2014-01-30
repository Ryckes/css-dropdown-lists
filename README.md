CSS Dropdown lists
==================

CSS stylesheet to create dropdown lists. Includes a PHP library which can be used to convert a PHP array to a dropdown list of links (a menu).

Usage
-----

To use this library, just link the dropdown.css file found in directory _styles_ and create a list like the following:

```HTML
<div class="menuwrapper">
	<ul class="dropdown">
		<li><a href="javascript: void(0);">List</a>
			<ul>
				<li><a href="url">Item</a></li>
				<li><a href="javascript: void(0);">Nested list</a>
					<ul>
						<li><a href="url">Other item</a></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</div>
```

That's the ugly and dirty way. Now let's talk business.

PHP class Dropdown
------------------

We can create a list like the former in this way:

```PHP
<?php
$dropdown = new Dropdown();

$menu = ['List' => [
	'Item' => 'url',
	'Nested list' => [
		'Other item' => 'url'
		]
	]
];

$dropdown->fromArray($menu);

echo $dropdown->getCode();
?>
```

With that, we obtain exactly the same code as before. Easier, right? To make it work we only need to include the file dropdown.php found in directory _src_. And once again, link dropdown.css.

Styling
-------

Just linking dropdown.css will yield an also ugly and basic dropdown list. The list must be styled using another CSS file, a _skin_. We provide a light colors, basic skin in _styles_. Its purpose is not production usage, it is a guide to create your own skin.