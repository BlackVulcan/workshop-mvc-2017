<?php

namespace Framework\Baby;


use Framework\Http\Router;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Baby
{
    public static function init(array $config)
    {
        $capsule = new Capsule();

        $capsule->addConnection([
            'driver' => 'sqlite',
            'database' => $config["database"]["path"],
            'prefix' => ''
        ]);

        $capsule->bootEloquent();

        return new self();
    }

    public function run()
    {
        Router::run();
    }
}