<?php

/**
 * @file
 * Contains \Drupal\robots\RobotListBuilder.
 */

namespace Drupal\robots;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Robot entities.
 *
 * @ingroup robots
 */
class RobotListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Robot ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\robots\Entity\Robot */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $this->getLabel($entity),
      new Url(
        'entity.robot.edit_form', array(
          'robot' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
