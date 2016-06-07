<?php namespace Lilessam\Statister\Controllers;
use DB;
use Flash;
use Redirect;
use BackendMenu;
use Backend\Classes\Controller;
use Backend\Models\User;
use ApplicationException;
use Mail;
use Lang;
use Yaml;

 /*****************************************************************************
 ******************************************************************************
 ************************************ Statister *******************************
 *                                                                            *
 *                              Developed By Lil'Essam                        *
 *                                                                            *
 *****************************************************************************/

class Statister extends Controller
{
    /**
     * Implementing Behaviors
     * */
    public $implement = [
        'Backend.Behaviors.ListController',
    ];

    /**
     * Setting Configurations
     * */
    public $listConfig = 'config_list.yaml';

    /**
     * __Cunstructing
     * */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Lilessam.Statister', 'statister', 'statister');
    }

    /**
     * Passing to form
     * */
    public function index()
    {
        /**
         * Parsing the YAML file to be converted to PHP array
         * */
        $array = Yaml::parseFile(dirname(dirname(__FILE__))."/config.yaml");
    
            
        $this->vars['array'] = $array;
        $this->asExtension('ListController')->index();
        

    }
    

}