<?php

namespace OnlineStoreApp\Models;
use PDO;

/*Interface segregation principle applied here*/
interface isLoggedIn {
	public static function isLoggedIn();
}
interface requireLogin {
	public static function requireLogin();
}
interface login {
	public static function login();
}
interface logout {
	public static function logout();
}


class Auth implements isLoggedIn, requireLogin, login, logout
{

    /**
     * Return the user authentication status
     * 
     * @return boolean True if the user is authenticated, false otherwise
     */

    public static function isLoggedIn()
    {
        return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
    }



    /**
     * Require the user to be logged in, stopping with an unauthorized message if not logged in
     * 
     * @return void
     */

    public static function requireLogin()
    {
        if (! static::isLoggedIn()){
            // die("Unauthorized. You must login first.");
            header('location: /online_store-app');
            exit;
        }
    }



    /**
     * Log in using the session
     * 
     * @return void
     */

     public static function login()
     {
        // this helps prevent session fixation attacks
        //session_regenerate_id($id);

        $_SESSION['is_logged_in'] = true;
     }


     
     /**
      * Log out using the session
      *
      * @return void
      */

    public static function logout()
    {
        // Unset all of the session variables.
        $_SESSION = [];

        // If it's desired to kill the session, also delete the session cookie.

        // This will delete the session cookie data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();

        // redirects the user back to the login page
        header("location: signin");
        exit;
    }

}
