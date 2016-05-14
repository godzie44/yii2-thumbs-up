# yii2-thumbs-up
Thumbs up rating yii2 module

Installation
------------
```bash
composer require godzie44/yii2-thumbs-up
```

Configuration
-------------

In config `/protected/config/main.php`
```php
<?php
return [
	// ...
	'modules' => [
      /* other modules */
        
		'thumbsup' => [
            'class' => 'godzie44\yii\module\thumbsup\Module',
			      'useRbac' => true, 
			      ]
    ],
	// ...
];
```

In auth manager add rules (if `Module::$useRbac = true`):
```php
<?php
use godzie44\yii\module\thumbsup;

$thumbsUpChange = new \yii\rbac\Permission([
            'name' => thumbsup\Permission::CHANGE,
            'description' => 'Can change thumb state',
        ]);
$authManager->add($thumbsUpChange);
```


Updating database schema
------------------------
After you downloaded and configured `rmrevin/yii2-comments`,
the last thing you need to do is updating your database schema by applying the migrations:

In `command line`:
```
php yii migrate/up --migrationPath=@vendor/godzie44/yii2-thumbs-up/migrations/
```

Usage
-----
In view
```php
<?php
// ...

use godzie44\yii\module\thumbsup;

echo thumbsup\widgets\ThumbsUpWidget::widget(['entity' => "entity-44"])

```

Parameters
----------

### Module parameters
* **useRbac** (optional, boolean) Default TRUE. Defines if the rating system will use Rbac validation to check permissions when trying to rate some entity.
