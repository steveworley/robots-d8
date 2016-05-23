<?php

/**
 * @file
 * Contains robot.page.inc..
 *
 * Page callback for Robot entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Robot templates.
 *
 * Default template: robot.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_robot(array &$variables) {
  // Fetch Robot Entity Object.
  $robot = $variables['elements']['#robot'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
