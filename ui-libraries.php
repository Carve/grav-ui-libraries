<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class UILibrariesPlugin
 * @package Grav\Plugin
 */
class UILibrariesPlugin extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        // Enable the main event we are interested in
        $this->enable([
            'onPageInitialized' => ['onPageInitialized', 0]
        ]);
    }
    
    public function onPageInitialized()
    {
        // Get a variable from the plugin configuration
        $libraries = $this->grav['config']->get('plugins.ui-libraries.libraries');
        $libs = array();

        foreach($libraries as $library) {
            if ($library['enabled'] == 'jqueryui')
                array_push($libs, 'http://code.jquery.com/ui/1.12.1/jquery-ui.min.js','http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
            else if ($library['enabled'] == 'bootstrap3')
                array_push($libs, 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css','https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css','https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js');
            else if ($library['enabled'] == 'bootstrap')
                array_push($libs, 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css','https://code.jquery.com/jquery-3.2.1.slim.min.js','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
            else if ($library['enabled'] == 'uikit')
                array_push($libs, 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-core.min.js','https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/css/uikit-core.min.css');
            else if ($library['enabled'] == 'pure.css')
                array_push($libs, 'https://unpkg.com/purecss@1.0.0/build/pure-min.css');
            else if ($library['enabled'] == 'skeleton')
                array_push($libs, 'https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css');
            else if ($library['enabled'] == 'base')
                array_push($libs, 'https://cdnjs.cloudflare.com/ajax/libs/basscss/8.1.0/css/basscss.min.css');
            else if ($library['enabled'] == 'foundation')
                array_push($libs, 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.3/js/foundation.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.3/css/foundation.min.css');
            else if ($library['enabled'] == 'materialize')
                array_push($libs, 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css');
            else if ($library['enabled'] == 'semanticui')
                array_push($libs, 'https://code.jquery.com/jquery-3.1.1.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css');

            $assets = $this->grav['assets'];
            $assets->registerCollection('libraries', $libs);
            $assets->add('libraries', 100);
        }
    }
}
