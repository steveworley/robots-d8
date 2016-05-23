# Robots Step 3

The hook system in Drupal is how modules can interact with each other. By using the entity API we get a bunch of hooks predefined for our custom entity type. This lesson will go through how to use hooks and how to define your own.

## Procedural

Hook implementations are procedural and follow a strict naming convention to be found by Drupal. The naming convention is `{mymodule}_[hook]`, for example: `robots_node_load`. This will trigger when a Drupal node entity is being loaded and we will have access to every node object that would be loaded at that time.

#### Step 1: Create a .module file

All hooks should be defined in the modules .module file.

```
robots
└── *robots.module
```

#### Step 2: Create a `node_load` hook definition

In `robots.module` add the hook definition for node load

```
<?php
use Drupal\robots\Entity\Robot;

function robots_node_load($nodes) {
  // Add some robots to the nodes.
  $robots = Robot::loadMultiple();
  foreach ($nodes as $node) {
    $node->robots = $robots;
  }
}

To define your own hook you can include the following snippet:

```
\Drupal::moduleHandler()->alter('my_module_hook', $data);
```

Where `$data` is the data that you want to alter and `my_module_hook` is the name of the hook that you want to be called.
