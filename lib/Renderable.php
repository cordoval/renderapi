<?php

/**
 * @file The Renderable class represents the data component of a render array.
 */
abstract class Renderable {

  // Container for the variables that the renderable will store.
  private $params = array();

  // The built class of the renderable.
  private $buildClass; 

  // Store list of classes for later registry checks.
  private $buildClasses = array();

  function __construct($params, $buildClasses) {
    foreach ($buildClasses as $buildClass) {
      $this->setBuildClass($buildClass);
    }
    foreach ($params as $name => $value) {
      $this->set($name, $value);
    }
  }

  public function set($name, $value) {
    $this->params[$name] = $value;
  }

  public function get($name) {
    // @todo This needs to implement a drillable structure.
    return $this->params[$name];
  }

  public function setBuildClass($buildClass) {
    $this->buildClass = $buildClass;
    // Append to build classes.
    $this->buildClasses[] = $buildClass;
  }

  function getBuildClass() {
    return $this->buildClass;
  }

  public function getBuildClasses() {
    return $this->buildClasses;
  }

  public function getAll() {
    return $this->params;
  }

  public function prepare() {
    // This is empty since this is an abstract class.
  }

  // Invoke the given template and render. Will later depend on some theme
  // engine.
  public function render() {
    // Prepare variables.
    $this->prepare();

    $template = $this->getRegisteredTemplate();

    extract($this->getAll(), EXTR_SKIP);

    // Start output buffering.
    ob_start();

    // Include the template file.
    include $template;

    // End buffering and return its contents.
    return ob_get_clean();
  }

  // Casting to string invokes render function.
  function __tostring() {
    // Return theme function.
    return $this->render();
  }

}
