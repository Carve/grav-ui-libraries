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
            else if ($library['enabled'] == 'bootstrap')
                array_push($libs, 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js');
            else if ($library['enabled'] == 'uikit')
                array_push($libs, 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.5/js/uikit.min.js','https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.5/css/uikit.min.css');
            else if ($library['enabled'] == 'pure.css')
                array_push($libs, 'https://unpkg.com/purecss@0.6.2/build/pure-min.css');
            else if ($library['enabled'] == 'skeleton')
                array_push($libs, 'https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css');
            else if ($library['enabled'] == 'base')
                array_push($libs, 'https://unpkg.com/basscss@8.0.2/css/basscss.min.css');
            else if ($library['enabled'] == 'foundation')
                array_push($libs, 'https://cdn.jsdelivr.net/foundation/6.2.4-rc2/foundation.min.js', 'https://cdn.jsdelivr.net/foundation/6.2.4-rc2/foundation.min.css');
            else if ($library['enabled'] == 'ink')
                array_push($libs, 'http://fastly.ink.sapo.pt/3.1.10/js/ink-all.js', 'http://fastly.ink.sapo.pt/3.1.10/css/ink.css');
            else if ($library['enabled'] == 'materialize')
                array_push($libs, 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css');
            else if ($library['enabled'] == 'semanticui')
                array_push($libs, 'https://code.jquery.com/jquery-3.1.1.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css');

            $assets = $this->grav['assets'];
            $assets->registerCollection('libraries', $libs);
            $assets->add('libraries', 100);
        }
    }
}
