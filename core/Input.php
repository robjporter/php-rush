<?php
  class Input {
    public static function sanitize($dirty) {
      return htmlentities($dirty,ENT_QUOTES,"UTF-8");
    }
    public static function get($inputName) {
      if(isset($_POST[$inputName])) {
        return self::sanitize($_POST[$inputName]);
      } else if(isset($_GET[$inputName])) {
        return self::sanitize($_GET[$inputName]);
      }
    }
  }
