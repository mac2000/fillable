Usage example
=============

    <?php
    require_once 'vendor/autoload.php';

    use mac\fillable\Fillable;

    class User
    {
        use Fillable;

        public $username;
        protected $password;
        private $remember;
    }

    $user = User::createFrom(['username' => 'hello', 'password' => 'world', 'remember' => true]);

    print_r($user);

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

