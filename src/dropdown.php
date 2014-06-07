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
    $link = 'javascript: void(0);';
    
    foreach($menu as $key=>$value) {
      if($key == '__link')
	continue;
      
      if (is_array($value)) { // Submenu
	if(isset($value['__link']))
	  $link = $value['__link'];

	$code.= sprintf('<li><a href="%s">%s</a>', $link, $key);

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