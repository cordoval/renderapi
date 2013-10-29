<?php

/**
 * @file I am fake Drupal.
 */

// Dummy load our renderable classes.

include './lib/WeightedInterface.php';
include './lib/AbstractCollection.php';
include './lib/AbstractWeightedCollection.php';
include './lib/AbstractRenderable.php';
include './lib/AbstractRenderableDecorator.php';

include './lib/RenderableBuilder.php';
include './lib/RenderableBuilderCollection.php';
include './lib/RenderableCollection.php';

include './lib/Accessor.php';

// Load our fake node module.
include './fake-drupal/modules/node/node.module.php';
include './fake-drupal/modules/node/ThemeFullNode.php';

// Load our fake custom module.
include './fake-drupal/modules/mymodule/mymodule.module.php';
include './fake-drupal/modules/mymodule/ThemeFoo.php';
include './fake-drupal/modules/mymodule/MyModuleFullNodeDecorator.php';

// Load fake common components.
include './fake-drupal/includes/theme/ThemeSomeExamples.php';
include './fake-drupal/includes/theme/ThemeItemList.php';
include './fake-drupal/includes/theme/ThemePage.php';

// Load our fake theme.
include './fake-drupal/themes/prague/PragueFullNodeDecorator.php';

/**
 * Dummy registry for callbacks that would alter our builder.
 */
function getAlterCallbacks($builder) {
  $callbacks = array();
  // switch ($builder->getBuildClass()) {
  //   case 'ThemeFullNode':
  //     $callbacks = array(
  //       'mymodule_alter_node_view',
  //     );
  //     break;
  //   case 'ThemeItemList':
  //     $callbacks = array(
  //       'mymodule_alter_item_list',
  //     );
  //     break;
  // }
  return $callbacks;
}

/**
 * Dummy registry for modules that may be decorating the renderable.
 */
function getModuleDecoratorClasses($renderable) {
  $classes = array();
  // switch ($renderable->getBuildClass()) {
  //   case 'ThemeFullNode':
  //     $classes = array(
  //       'MyModuleFullNodeDecorator',
  //     );
  //     break;
  // }
  return $classes;
}

/**
 * A registry for decorators that may apply to the renderable.
 */
function getThemeDecoratorClass($renderable) {
  $class = NULL;
  // switch ($renderable->getBuildClass()) {
  //   case 'ThemeFullNode':
  //   case 'MyModuleFullNodeDecorator':
  //     $class = 'PragueFullNodeDecorator';
  //     break;
  // }
  return $class;
}

/**
 * Convert string to build.
 */
function render($build) {
  return (string) $build;
}
