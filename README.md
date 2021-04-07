 PACE (Progress Automatically Certain to Entertain) for Yii PHP Framework
=========================================================================
 PACE (Progress Automatically Certain to Entertain) - Automatic page load progress bar for Yii PHP Framework

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require thtmorais/yii2-pace "*"
```

or add

```
"thtmorais/yii2-pace": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php

use thtmorais\pace\Pace;

echo Pace::widget();

?>
```

or

```php
<?= \thtmorais\pace\Pace::widget() ?>
```

We recommend using in the `layouts/main.php` file. Or if you prefer in each view file with their respective settings.

Configuration
-------------

By default the PACE comes configured with blue color and animation minimal.

You can add general rule for all views in the `config/params.php` file as follows:

```php
<?php
    return [
        'paceOptions' => [
            'color' =>  'blue',
            'theme' => 'minimal',
            'options' => []
        ]
    ];
?>
```

or individually in each view: 

```php
<?php
   
use thtmorais\pace\Pace;

echo Pace::widget([
    'color'=>'red',
    'theme'=>'corner-indicator',
    'options'=>[]
]);

?>
```

You can preview **themes** and **colors** [here](https://codebyzach.github.io/pace/).
