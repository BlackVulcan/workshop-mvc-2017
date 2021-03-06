<?php

namespace Framework\Baby;


use Framework\Http\Router;
use Illuminate\Database\Capsule\Manager as Capsule;
use Smarty;

class Baby
{
    private static $smarty = null;
    private static $config;

    /**
     * Init the framework and let it build/bootstrap required services
     *
     * @param array $config The config for the framework
     *
     * @return Baby
     */
    public static function init(array $config)
    {
        self::$config = $config;
        self::bootModels($config);
        self::bootViews($config);

        return new self();
    }

    /**
     * Bootstrap the models
     *
     * @param array $config
     */
    public static function bootModels(array $config)
    {
        $capsule = new Capsule();

        $capsule->addConnection([
            'driver' => 'sqlite',
            'database' => $config["database"]["path"],
            'prefix' => ''
        ]);

        $capsule->bootEloquent();
    }

    /**
     * Bootstrap the views.
     *
     * @param array $config
     */
    private static function bootViews(array $config)
    {
        self::$smarty = new Smarty();
        self::$smarty->setTemplateDir(BASE_DIR . "views");
        self::$smarty->setCompileDir(BASE_DIR . 'storage/views_co');
        self::$smarty->setCacheDir(BASE_DIR . 'storage/views_ca');
        self::$smarty->setConfigDir(BASE_DIR . 'config');
    }

    /**
     * Run the framework and let it handle the request
     */
    public function run()
    {
        Router::run(self::$smarty, self::$config);
    }
}