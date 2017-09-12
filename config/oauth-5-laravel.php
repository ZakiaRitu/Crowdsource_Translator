<?php
use OAuth\Common\Storage\Session;

return [

    //if any problem occurs
    //composer dump-autoload and php artisan clear-compiled
    //use session


    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => new Session(),


    /**
	 * Consumers
	 */
	'consumers' => [
      //facebook Works
        'Facebook' => array(
            'client_id'     => '1066714296684623',
            'client_secret' => '9ab6c74df65b6dabf3e5ebd334d04f06',
            'scope'         => array('email'),
        ),



        //works Fine
        'Google' => array(
            'client_id'     => '204699774975-sgsbvg8plfpj4hbtb88u624dsd0f2ubf.apps.googleusercontent.com',
            'client_secret' => 'ateAnhGDlDS5I3fd6OT1VLDP',
            'scope'         => array('userinfo_email','userinfo_profile'),
        ),


        'Twitter' => array(
            'client_id'     => 'OQuzyMuj9m75ciea9BUE3WpbC',
            'client_secret' => 'axoHPzZcES86fJmhZFFamObIhuZWjQyb6iMiEcbEDUznM9Tvfv',

            // No scope - oauth1 doesn't need scope
        ),

        'Linkedin' => array(
            'client_id'     => '75ws5fei2l0iqq',
            'client_secret' => 'Jw0FLsVNAu3LVB1d',
        ),
        //working Github
        'Github' => array(
            'client_id'     => '116a743540adb2ac9762',
            'client_secret' => '4ac72ab135b0dceaadd7ded9a1f6e555423e0695',
        ),
	]

];