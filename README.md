Usage example
=============

    <?php
    require_once 'vendor/autoload.php';

    class User
    {
        use Fillable;

        $username;
        $password;
        $remember;
    }

    $user = User::createFrom($_REQUEST);

    //$user = new User();
    //$user->fill($_REQUEST);

Installation
============

Here is `composer.json` example:

    {
        "require": {
            "mac/fillable": "x"
        },
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/mac2000/fillable"
            }
        ]
    }

