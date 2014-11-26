<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'test',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'formsDir'       => __DIR__ . '/../../app/forms/',
        'helpersDir'     => __DIR__ . '/../../app/helpers',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'validatorsDir'  => __DIR__ . '/../../app/plugins/validators',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'baseUri'        => '/phalcon-demo/',
    )
));
