<?php

namespace Kasfy\Framework;

/***
     ꗥ 𝕂𝔸𝕊𝔽𝕐 
     ꗥ 𝕋𝕙𝕖 𝔽𝕣𝕒𝕞𝕖𝕨𝕠𝕣𝕜 𝕗𝕠𝕣 𝕊𝕞𝕒𝕣𝕥 𝔹𝕒𝕔𝕜-𝔼𝕟𝕕 
     ꗥ 𝔸𝕦𝕥𝕙𝕠𝕣: 𝕂𝕒𝕥𝕙𝕖𝕖𝕤𝕜𝕦𝕞𝕒𝕣 𝕊 [𝕙𝕥𝕥𝕡𝕤://𝕜𝕒𝕥𝕙𝕖𝕖𝕤𝕙.𝕛𝕤.𝕠𝕣𝕘]
 ***/
class Session
{
    protected const FLASH_KEY = 'flash_messages';

    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            $flashMessage['remove'] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function setFlash($key, $message)
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }

    public function getFlash($key)
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function __destruct()
    {
        $this->removeFlashMessages();
    }

    private function removeFlashMessages()
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => $flashMessage) {
            if ($flashMessage['remove']) {
                unset($flashMessages[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }
}
