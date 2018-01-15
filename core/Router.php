<?php
  class Router {
    public static function route($url) {
      // Controler
      if(URL_CONTROLLER_OFFSET) {
        array_shift($url);
      }

      // Controller
      $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]):DEFAULT_CONTROLLER;
      $controller_name = $controller;
      array_shift($url);

      // Action
      $action = (isset($url[0]) && $url[0] != '') ? $url[0].'Action':DEFAULT_ACTION.'Action';
      $action_name = (isset($url[0]) && $url[0] != '') ? $url[0] : DEFAULT_ACTION;
      array_shift($url);

      // ACL check
      $grantAccess = self::hasAccess($controller_name,$action_name);
      if(!$grantAccess) {
        $controller_name = $controller = ACCESS_RESTRICTED;
        $action = DEFAULT_ACTION."Action";
      }

      // Params
      $queryParams = $url;

      $dispatch = new $controller($controller_name,$action);

      if(method_exists($controller,$action)) {
        call_user_func_array([$dispatch,$action],$queryParams);
      } else {
        die('That method does not exist in the controller \"'.$controller_name.'\"');
      }
    }
    public static function redirect($url) {
      if(!headers_sent()) {
        header('location: '.SROOT.$url);
      } else {
        echo '<script type="text/javascript">window.location.href="'.SROOT.$url.'"</script><noscript><meta http-quiv="refresh" content="0;url='.$url.'"/></noscript>;exit;';
      }
    }
    public static function hasAccess($controller_name,$action_name='index') {
      $acl_file = file_get_contents(ROOT.DS.'app'.DS.'acl.json');
      $acl = json_decode($acl_file,true);
      $current_user_acls = ["Guest"];
      $grantAccess = false;

      if(Session::exists(CURRENT_USER_SESSION_NAME)) {
        $current_user_acls[] = "LoggedIn";
        foreach(currentUser()->acls() as $a) {
          $current_user_acls[] = $a;
        }
      }

      foreach($current_user_acls as $level) {
        if(array_key_exists($level,$acl) && array_key_exists($controller_name,$acl[$level])) {
          if(in_array($action_name,$acl[$level][$controller_name]) || in_array("*",$acl[$level][$controller_name])) {
            $grantAccess = true;
            break;
          }
        }
      }

      foreach($current_user_acls as $level) {
        $denied = [];
        if(array_key_exists($level,$acl)) {
          $denied = $acl[$level]['denied'];
        }
        if(!empty($denied) && array_key_exists($controller_name,$denied) && in_array($action_name,$denied[$controller_name])) {
          $grantAccess = false;
          break;
        }
      }

      return $grantAccess;
    }
    public static function getMenu($name) {
      $menuArray = [];
      $menuFile = file_get_contents(ROOT.DS.'app'.DS.'menu_acl.json');
      $acl = json_decode($menuFile,true);

      foreach($acl as $key => $value) {
        if(is_array($value)) {
          $sub = [];
          foreach($value as $k => $v) {
            if($k == 'separator' && !empty($sub)) {
              $sub[$k] = '';
              continue;
            } else if($finalVal = self::get_link($v)) {
              $sub[$k] = $finalVal;
            }
          }
          if(!empty($sub)) {
            $menuArray[$key] = $sub;
          }
        } else {
          if($finalVal = self::get_link($value)) {
            $menuArray[$key] = $finalVal;
          }
        }
      }
      return $menuArray;
    }
    public static function get_link($val) {
      if(preg_match('/https?:\/\//',$val) == 1) {
        return $val;
      } else {
        $uArray = explode(DS,$val);
        $controller_name = ucwords($uArray[0]);
        $action_name = (isset($uArray[1])) ? $uArray[1] : '';
        if(self::hasAccess($controller_name,$action_name)) {
          return SROOT.$val;
        }
        return false;
      }
    }
  }
