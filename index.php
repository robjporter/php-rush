<?php
  define('DS', DIRECTORY_SEPARATOR);
  define('ROOT', dirname(__FILE__));

  // Load Configuration
  require_once(ROOT.DS.'config'.DS.'config.php');
  require_once(ROOT.DS.'app'.DS.'lib'.DS.'helpers'.DS.'functions.php');

  // Autoload classes
  function autoload($classname) {
    if(file_exists(ROOT.DS.'core'.DS.$classname.'.php')) {
      require_once(ROOT.DS.'core'.DS.$classname.'.php');
    } elseif(file_exists(ROOT.DS.'app'.DS.'controllers'.DS.$classname.'.php')) {
      require_once(ROOT.DS.'app'.DS.'controllers'.DS.$classname.'.php');
    } elseif(file_exists(ROOT.DS.'app'.DS.'models'.DS.$classname.'.php')) {
      require_once(ROOT.DS.'app'.DS.'models'.DS.$classname.'.php');
    }
  }

  spl_autoload_register('autoload');
  session_start();

  $url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];

  if(Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
    Users::loginUserFromCookie();
  }

  Router::route($url);
