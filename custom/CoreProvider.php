<?php
/**
 *  CoreProvider class
 *
 * @author changken admin@changken.org
 * @version v2.0.0 dev-2
 * @date: 2018/8/10
 * @since v2.0.0 dev-2 changken see git
 */

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
    }
}