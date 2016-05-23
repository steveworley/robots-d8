<?php

/**
 * @file
 * Contains \Drupal\robots\RobotInterface.
 */

namespace Drupal\robots;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Robot entities.
 *
 * @ingroup robots
 */
interface RobotInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.

}
