# Robots Step 1

Drupal requires some initial set up steps before it will recognise your custom module. We will go over what is required for Drupal to find your module and make it accessible to install.

## Install path

Drupal requires that all modules be placed under `[root]/modules`. It is common practise to split contributed and custom modules into separate subdirectories under `modules`.

- `modules/contrib`: Contributed modules that are found on Drupal.org
- `modules/custom`: Custom module code that is not hosted on Drupal.org

#### Step 1: Create the module directory

1. Create the **robots** directory under `modules/custom`

```
.
├── core
├── modules
|   └── *custom
|       └── *robots
```
## .info.yml

The `info.yml` file contains metadata aobut your module and tells Drupal the directory contains a module. The `.info.yml` file is required to:

- Tell Drupal about the module
- Provide information that is used for the web ui administration pages
- Provide information around version compatibility
- Manage dependencies and other general administrative information about your module

The `info.yml` file needs to follow the `[module_name].info.yml` naminv convention for Drupal to be able to locate it.

### Required properties

Drupal requires that the `.info.yml` has the following properties to be valid:

- **name**: The name of the module
- **description**: A short description that is displayed in the web ui
- **package**: Used to group modules in the web ui
- **type**: indicates the type of plugin; can be `module`, `profile` or `theme`

The `info.yml` file allows some optional properties:

- **dependencies**: A list of modules that this module depends on, Drupal will enable all modules listed here prior to enabling your module. Modules cannot be enabled unless all their dependencies are satisfied and modules cannot be disabled if a dependant module is enabled.
- **configure**: If your module offers configuration this will update the web ui with a link to the configure route
- **hidden**: If the module should be visible in the web ui

#### Step 2: Add `[module].info.yml` to the directory

1. Create a file `info.yml` file
2. Add the required properties to the file

    ```
    name: Robots
    description: Robot management system
    package: Custom
    type: module
    ```
3. Check the web ui you should be able to find _Robots_

![admin menu](https://github.com/steveworley/robots-d8/blob/module-init/admin-modules.png)

## More info
https://www.drupal.org/node/2000204