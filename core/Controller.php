<?php

/**
* 
*/
class Controller
{
	public $request;
	public $vars = array();
	public $layout = 'default';
	private $rendered = false;
	public $name;

	function __construct($request) {
		$this->request = $request;
	}

	/**
	* Permet de rendre la vue à afficher
	* @param $view La vue à afficher
	*/
	public function render($view) {
		if($this->rendered){ return false; }
		extract($this->vars);
		if(strpos($view, '/') === 0) {
			$view = ROOT.DS.'view'.$view.'.php';
		} else {
			$view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
		}

		ob_start();
			require $view;
		$content_for_layout = ob_get_clean();
		require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
		$this->rendered = true;
	}

	/**
	* Transmet des variables sous forme de tableau à la vue
	* @param $key Nom de la clé
	* @param $value Valeur pour la clé
	*/
	public function set($key, $value=null) {
		if(is_array($key)) {
			$this->vars += $key;
		} else {
			$this->vars[$key] = $value;
		}
	}

	/**
	* Permet de charger un model
	* @param $name Le nom du model
	*/
	function loadModel($name) {
		$file = ROOT.DS.'model'.DS.$name.'.php';
		require_once($file);
		// if(!isset($this->$name)) {
			// $this->$name = new $name();
		// }
	}

	/**
	* Permet de détecter les modbiles/tablet
	*/
	public function isMobile() {
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
}