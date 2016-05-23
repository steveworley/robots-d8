# Robots Step 2

The next lesson is how to create custom entity types for your module.

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

The Entity classes `baseFieldDefinitions` method is used to determine what fields the entitiy will have and what the table schema for the entity will be.


#### Step 1. Create the entity class file

```
robots
├── *src
|   └── *Entity
|       └── *Robot.php
```

And add the [class definition](https://github.com/steveworley/robots-d8/blob/custom-entities/src/Entity/Robot.php).

#### Step 2. Create necessary class files to match those defined in the entities annotations.
```
robots
├── src
|   └── Entity
|       └── *Form
|           └── *RobotDeleteForm.php
|           └── *RobotForm.php
|           └── *RobotSettingsForm.php
|       └── Robot.php
|       └── *RobotViewsData.php
|   └── *RobotAccessControlHandler.php
|   └── *RobotInterface.php
|   └── *RobotListBuilder.php
```
Review any definitions on Github and update the classes.

- RobotDeleteForm: This is the form that is presented to the user when they attempt to delete an entity
- RobotForm: This is the form that is presented when creating or editing an entity
- RobotSettingsForm: When the content entity is fieldable this is the form that will be presented to users to configure fields
- RobotoViewsData.php: Defines how views can interact with the entity
- RobotAccessControlHandler.php: Defines how permissions are checked for this entity
- RobotInterface.php: An interface to the entity class, when additional fields are defined their getters and setters should be defined here.
- RobotListBuilder.php: Determines which fields should be shown when building a list of Robots.

#### Step 3. Add configuration YML files
```
robots
├── *robots.links.action.yml
├── *robots.links.menu.yml
├── *robotos.links.task.yml
├── *robots.permissions.yml
└── *robots.routing.yml
```

Review the definitions on Github and update the configuration files.

- robotos.links.action.yml: Defines roboto action links and where they appear
- robotos.links.menu.yml: Defines robot menu links
- robotos.links.task.yml: Defines configuration for specific tasks
- robotos.permissions.yml: Create new permissions which will be added to the admin/people/permissions page
- robots.routing.yml: Define routes that are used to access the Robot entity.

#### Step 4. Add templates
```
robots
├── *templates
|    └── robot.html.twig
└── *robot.page.inc
```

Review the definitions on Github and update the template files.

- robot.html.twig: Contains the default template information
- robot.page.inc: Prepares the robot entity for rendering via Twig.
