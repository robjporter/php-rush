<?php
  class UserSessions extends Model {
    public function __construct() {
      $table = "user_sessions";
      parent::__construct($table);
    }
    public static function getFromCookie() {
      $userSession = new self();
      if(COOKIE::exists(REMEMBER_ME_COOKIE_NAME)) {
        $us = $userSession->findFirst([
          'conditions' => "user_agent = ? AND session = ?",
          'bind' => [Session::useragentnoversion(),COOKIE::get(REMEMBER_ME_COOKIE_NAME)]
        ]);
      }
      if(!$us) return false;
      return $us;
    }
  }
