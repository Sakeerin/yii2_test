<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    // ใส่ชื่อระบบที่เราต้องการไม่เกิดผลกระทบทั้ง backend และ frontend โดยใช้คำสั่ง 'name' => 'ชื่อระบบของเรา'
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
