<?php

namespace API\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class QuerystringServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['querystring'] = $app->protect(function ($name) use ($app) {
            $default = $app['querystring.default_name'] ? $app['querystring.default_name'] : '';
            $name = $name ?: $default;

            return 'Querystring '.$app->escape($name);
        });
    }

    public function boot(Application $app)
    {

    }
}