<?php    namespace Lilessam\Statister;
use Backend;
use Controller;
use System\Classes\PluginBase;
use Event;
class Plugin extends PluginBase
{
    /**
     * This declares basic information about plugin and its author
     * */
    public function pluginDetails()
    {
        return [
            'name'          => 'Statister',
            'description'   => 'Provides a full statistics page based on YAML file you write',
            'author'        => 'LilEssam',
            'icon'          => 'icon-signal'
        ];
    }

    /**
     * This method registers this plugin permission
     * The admin can set this permission to a specific user or a whole group that will access the plugin
     * */
    public function registerPermissions()
    {
        return [
            'lilessam.statistics.access' => [
                'label'     => 'Access to see site statistics',
                'tab'       => 'Statister'
            ],
        ];
    }
    
    /**
     * This method declares the settings of backend url and label in OctoberCMS control panel menu
     * */
    public function registerNavigation()
    {
        return [
            'statister' => [
                'label'       => 'lilessam.statister::lang.plugin.name',
                'url'         => Backend::url('lilessam/statister/statister'),
                'icon'        => 'icon-signal',
                'permissions' => ['lilessam.statistics.access'],
                'order'       => 30,
            ]
        ];
    }

}
