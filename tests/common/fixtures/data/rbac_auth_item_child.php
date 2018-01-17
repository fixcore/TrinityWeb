<?php
/**
 * Created by PhpStorm.
 * User: Alfred
 * Date: 20.10.2017
 * Time: 17:03
 */

return [
    [
        "parent" => "user",
        "child" => "editOwnModel"
    ],
    [
        "parent" => "moderator",
        "child" => "loginToBackend"
    ],
    [
        "parent" => "administrator",
        "child" => "moderator"
    ],
    [
        "parent" => "moderator",
        "child" => "user"
    ]
];