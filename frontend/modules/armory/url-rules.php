<?php
return [
    '<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_c>/<_a>',
    'character/<server:[^\/]+>/<character:[^\/]+>/talents' => 'character/talents',
    'character/<server:[^\/]+>/<character:[^\/]+>' => 'character/index',
    '<server:[^\/]+>/<query:[^\/]+>' => 'main/index',
    '' => 'main/index',
];