<?php
Class CustomPlugin {

    private static $initiated = false;
    static function init(){

        if(!self::$initiated){
            self::initHooks();
            self::$initiated = true;
        }

    }

     static function initHooks(){
        // add menu in admin panel
        add_action("admin_menu",array("CustomPlugin","addMenuOptionCallback"));

        //register your css files
        wp_register_style("custom-plugin-stylesheet",CUSTOM_PLUGIN__PLUGIN_URL.'assets/css/custom-plugin.css');
        wp_enqueue_style("custom-plugin-stylesheet");

        //register your js files
        wp_register_script("custom-plugin-js",CUSTOM_PLUGIN__PLUGIN_URL.'assets/js/custom-plugin.js');
        wp_enqueue_script("custom-plugin-js");


        
    }
    static function addMenuOptionCallback(){

        add_menu_page(
            "Custom Plugin Page Title",
            "Custom Plugin Menu Title",
            "manage_options",
            "custom_plugin",
            array("CustomPlugin","addMenuPageCallback"),
            CUSTOM_PLUGIN__PLUGIN_URL.'assets/images/icon.png'
        );

    }
    static function addMenuPageCallback(){

        CustomPlugin::View('admin-form');

    }
    static function View($view){

        include(CUSTOM_PLUGIN__PLUGIN_DIR.'/views/'.$view.".php");
    }

    static function  plugin_activation(){
        //code to perform your actions when plugin is installed
        //Examples: Creating Any custom Table in wordpress
        add_option( 'Activated_CustomPlugin', true );

    }

    static function  plugin_deactivation(){

       //code to perform your actions when plugin is uninstall

    }
}