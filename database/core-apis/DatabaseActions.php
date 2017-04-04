<?php

namespace database\core\mysql;

/**
*
* DatabaseActions
*
* Contains declaration of various database actions
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class DatabaseActions
{

    public function __construct()
    {
        /**
         * Defines a constant action insert used to perform insert actions on a database table
         *
         */
        define("ACTION_INSERT", "insert");

        /**
         * Defines a constant action delete used to perform delete actions on a database table
         *
         */
        define("ACTION_DELETE", "delete");

        /**
         * Defines a constant action query used to perform query actions on a database table
         *
         */
        define("ACTION_QUERY", "query");

        /**
         * Defines a constant action update used to perform update actions on a database table
         *
         */
        define("ACTION_UPDATE", "update");


        /**
         * Defines a constant post client used to get the client posting data
         *
         */
        define("POST_CLIENT", "client");

        /**
         * Defines a constant client intent used to get the intent of the  client posting data
         *
         */
        define("CLIENT_INTENT", "intent");


        /**
         * Defines a constant post action used to get the action of the client posting data
         *
         */
        define("POST_ACTION", "action");

        /**
         * Defines a constant post action unknown posting data
         *
         */
        define("POST_ACTION_UNKNOWN ", "action_unknown");
        /**
         * Defines a constant post client unknown that represents an unknown client posting data
         *
         */
        define("POST_CLIENT_UNKNOWN ", "client_unknown");
        /**
         * Defines a constant post client desktop that represents a desktop client posting data
         *
         */
        define("POST_CLIENT_DESKTOP", "desktop");

        /**
         * Defines a constant post client mobile android that represents a mobile android client posting data
         *
         */
        define("POST_CLIENT_MOBILE_ANDROID", "mobile_android");
    }
}

?>
