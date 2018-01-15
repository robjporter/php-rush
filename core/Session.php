<?php

  class Session {
    public static function exists($name) {
      return (isset($_SESSION[$name])) ? true:false;
    }
    public static function get($name) {
      return $_SESSION[$name];
    }
    public static function set($name,$value) {
      return $_SESSION[$name] = $value;
    }
    public static function delete($name) {
      if(self::exists($name)) {
        unset($_SESSION[$name]);
      }
    }
    public static function useragentnoversion() {
      $uagent = $_SERVER['HTTP_USER_AGENT'];
      $regex='/\/[a-zA-Z0-9.]+/';
      $newString = preg_replace($regex,'',$uagent);
      return $newString;
    }
    public static function useragent() {
      $uagent = $_SERVER['HTTP_USER_AGENT'];
      return $uagent;
    }
  }
