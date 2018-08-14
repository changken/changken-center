<?php

namespace Changken\Providers;

use Philo\Blade\Blade;
use Changken\Core\Container;
//use Changken\Database\MySQLConnect;
use Changken\Database\SQLiteConnect;
use Changken\Database\Member;
use Changken\Session\Session;

class CoreProvider extends Provider
{
    /**
        * 容器註冊
        *
        * @return void
        */
    public function register()
    {
        //$this->container->bind('mysql', function (Container $container){
        //    return new MySQLConnect();
        //});

        $this->container->bind('sqlite', function (Container $container){
            return new SQLiteConnect();
        });

        $this->container->bind('member', function(Container $container){
            return new Member($container->get('sqlite'));
        });

        $this->container->bind('session', function(Container $container){
            return new Session('ra9_');
        });

        $this->container->bind('blade', function (Container $container){
            return new Blade(VIEWS_PATH, CACHE_PATH);
        });
    }
}