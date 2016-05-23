# Robots Step 2

The entity API provides a structured approach to data management within Drupal.

### Config vs Content

Drupal 8 provides two types of entities; a configuration entity and a content entity.

#### Config

Configuration entities allow the user to create many configurations of something

**Examples**

- Content Types

#### Content

- What is a content entity
- Where to use a content entity

**Examples**

 - Node

### Defining entities

##### Annotations

Annotations are used to define an entity. They tell Drupal which classes should be used to interact with entities of the defined type. Both **Configuration** and **Content** entities are defined through class annotations. Each entity definition is stored in cache so remember to clear cache when making changes.

``` php
<?php

/**
 * Defines the Robot entity.
 *
 * @ingroup robots
 *
 * @ContentEntityType(
 *   id = "robot",
 *   label = @Translation("Robot"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\robots\RobotListBuilder",
 *     "views_data" = "Drupal\robots\Entity\RobotViewsData",
 *     "form" = {
 *       "default" = "Drupal\robots\Entity\Form\RobotForm",
 *       "add" = "Drupal\robots\Entity\Form\RobotForm",
 *       "edit" = "Drupal\robots\Entity\Form\RobotForm",
 *       "delete" = "Drupal\robots\Entity\Form\RobotDeleteForm",
 *     },
 *     "access" = "Drupal\robots\RobotAccessControlHandler",
 *   },
 *   base_table = "robot",
 *   admin_permission = "administer Robot entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/robot/{robot}",
 *     "edit-form" = "/admin/robot/{robot}/edit",
 *     "delete-form" = "/admin/robot/{robot}/delete"
 *   },
 *   field_ui_base_route = "robot.settings"
 * )
 */
```

##### id `<string>`

Unique identifier of this entity type. It should be prepended with `moduleName` to avoid naming conflicts.

##### label `<string>`

Human readable name of the entity type. Can be a translatable string with

##### handlers `<object>`

Classes that handle different tasks relating to the entity. Each item here should reference a class

- view_buidler
- list_builder
- views_data
- form

  A keyed list of class references which are used to build different forms for the entity. Allowed keys:

    - default
    - add
    - edit
    - delete

**access** `<class reference>`

A class that controls access to the entity. Should extend `EntityAccessControlHandler`.

##### base_table `<string>`

A unique table name to store entities in. The schema for this table will be determined by the `BaseFieldsDefinitions` on the entity object.

##### admin_permission `<string>`

##### entity_keys `<object>`

- id
- label
- uuid

##### links `<object>`

The links object is a keyed list of paths. For core to find the routes the route name must follow a specific pattern:

```entity.<entity_name>.<link-name>``` (replace underscores with dashes)

Example:
```
entity.robot.delete_form
```

- canonical
- edit-form
- delete-form
- collection

##### fieldable `<bool>`

If additional fields can be added via the GUI to this entity type.

##### Base Field Definitions

The Entity classes `baseFieldDefinitions`


#### Step 1. Create the entity class file

```
robots
├── *src
|   └── *Entity
|       └── *Robot.php
```
