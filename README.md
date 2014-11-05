FlAdmin Extension for Yii2
===========================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```json
{
    ...

    "require": {
        "otsec/yii2-fladmin": "0.1.*"
    },

    "repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/otsec/yii2-fladmin.git"
        }
    ],
}
```


CRUD Generator
---------------------

```php
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    ...

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'fladmin' => '@vendor/otsec/yii2-fladmin/generator-crud',
                ],
            ]
        ],
    ];
}
```

