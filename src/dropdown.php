<?php

class Dropdown {

	protected $menu = []; // Array of elements of the dropdown menu
	public $classPrefix = ''; // To avoid collisions with already used classes or use many dropdown lists in the same page with different styles

	public function fromArray(array $menu) {
		$this->menu = $menu;
	}

	public function getCode() {
		if (count($this->menu) != 1) 
			return '';

		$baseClass = $this->classPrefix.'menuwrapper';
		$dropdownClass = $this->classPrefix.'dropdown';

		$code = sprintf('<div class="%s">', $baseClass);
		$code.= sprintf('<ul class="%s">', $dropdownClass);

		$code.= $this->getSubmenuCode($this->menu);

		$code.= '</ul>';
		$code.= '</div>';

		return $code;
	}

	protected function getSubmenuCode(array $menu) {

		$code = '';

		foreach($menu as $key=>$value) {
			if (is_array($value)) { // Submenu
				$code.= sprintf('<li><a href="javascript: void(0);">%s</a>', $key);

				$code.= '<ul>';
				$code.= $this->getSubmenuCode($value);
				$code.= '</ul>';

				$code.= '</li>';
			}
			else { // Normal link
				$code.= sprintf('<li><a href="%s">%s</a></li>', $value, $key);
			}
		}

		return $code;
	}
}
?>