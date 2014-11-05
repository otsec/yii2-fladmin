FlAdmin Extension for Yii 2
===========================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist otsec/yii2-fladmin "0.1.*"
```

or add

```json
"otsec/yii2-fladmin": "0.1.*"
```

to the `require` section of your composer.json.


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
                    'fladmin' => '@vendor/otsec/yii2/fladmin/generator-crud',
                ],
            ]
        ],
    ];
}
```

