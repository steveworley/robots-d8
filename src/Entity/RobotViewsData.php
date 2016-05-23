<?php

/**
 * @file
 * Contains \Drupal\robots\Entity\Robot.
 */

namespace Drupal\robots\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Robot entities.
 */
class RobotViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['robot']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Robot'),
      'help' => $this->t('The Robot ID.'),
    );

    return $data;
  }

}
