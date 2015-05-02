<?php namespace NukaCode\Html;

use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    const NAME = 'html';

    const VERSION = '1.0.1';

    const DOCS = 'nukacode-html';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHtmlBuilder();

        $this->registerFormBuilder();

        $this->registerBBCode();
    }

    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->bindShared('html', function ($app) {
            return $app->make('NukaCode\Html\HtmlBuilder');
        }
        );
    }

    /**
     * Register the form builder instance.
     *
     * @return void
     */
    protected function registerFormBuilder()
    {
        $this->app->bindShared('form', function ($app) {
            $form = new FormBuilder($app['html'], $app['url'], $app['session.store']->getToken(), $app['view']);

            return $form->setSessionStore($app['session.store']);
        }
        );
    }

    /**
     * Register the BBCode instance.
     *
     * @return void
     */
    protected function registerBBCode()
    {
        $this->app->bindShared('bbcode', function ($app) {
            return $app->make('NukaCode\Html\BBCode');
        }
        );
    }
}
