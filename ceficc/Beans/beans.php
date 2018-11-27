<?php 
/*
 * Los métodos mágicos __set y __get se activan automáticamente cuando se invoca
 * directamente a una propiedad privada o que no existe. El método mágico __call
 * salta cuando se llama a un método que no existe o es privado.
 */

abstract class bean {

	/*
	 * Para cuando se llama a los atributos directamente. Se llama a los
	 * setter y getter si los hay; si no, se comprueba que la propiedad existe y se devuelve o setea el valor.
	 */

	public function __get($name) {
		$getter = 'get' . ucfirst($name);
		if (method_exists($this, $getter)) {
			return call_user_func(array($this, $getter));
		} elseif (property_exists(get_class($this), $name)) {
			return $this -> $name;
		} else {
			return null;
		}
	}

	public function __set($name, $value) {
		$setter = 'set' . ucfirst($name);
		if (method_exists($this, $setter)) {
			call_user_func(array($this, $setter), $value);
		} elseif (property_exists(get_class($this), $name)) {
			$this -> $name = $value;
		} else {
			echo "No existe el atributo $name.";
		}
	}

	// Utilizamos el método mágico __call para crear 'setter' y 'getters' dinámicos
	public function __call($metodo, $params = null) {
		// todo en minúsculas para evitar problemas. Por ejemplo setNombre
		$metodo = strtolower($metodo);
		$prefijo = substr($metodo, 0, 3);
		$atributo = substr($metodo, 3);
		if ($prefijo == 'set' && count($params) == 1) {
			if (property_exists(get_class($this), $atributo)) {
				$valor = $params[0];
				$this -> $atributo = $valor;
			} else {
				echo "No existe el atributo $atributo.";
			}
		} elseif ($prefijo == 'get') {
			if (property_exists(get_class($this), $atributo)) {
				return $this -> $atributo;
			}
			return NULL;
		} else {
			echo 'Método no definido <br/6gt;';
		}
	}

}

?>