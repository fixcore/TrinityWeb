<?php
return [
    '<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_c>/<_a>',
    'team/<server:[^\/]+>/<teamId>' => 'team/index',
    '<server:[^\/]+>/<type>/<page>/<per-page>' => 'main/index',
    '<server:[^\/]+>/<type>' => 'main/index',
    '' => 'main/index',
];