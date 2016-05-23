<?php

/**
 * @file
 * Contains \Drupal\robots\RobotAccessControlHandler.
 */

namespace Drupal\robots;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Robot entity.
 *
 * @see \Drupal\robots\Entity\Robot.
 */
class RobotAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view robot entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit robot entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete robot entities');
    }

    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add robot entities');
  }

}
