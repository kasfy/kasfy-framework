<?php

namespace Universe\exception;

/***
    ꗥ 𝕂𝔸𝕊𝔽𝕐 
    ꗥ 𝕋𝕙𝕖 𝔽𝕣𝕒𝕞𝕖𝕨𝕠𝕣𝕜 𝕗𝕠𝕣 𝕊𝕞𝕒𝕣𝕥 𝔹𝕒𝕔𝕜-𝔼𝕟𝕕 
    ꗥ 𝔸𝕦𝕥𝕙𝕠𝕣: 𝕂𝕒𝕥𝕙𝕖𝕖𝕤𝕜𝕦𝕞𝕒𝕣 𝕊 [𝕙𝕥𝕥𝕡𝕤://𝕜𝕒𝕥𝕙𝕖𝕖𝕤𝕙.𝕛𝕤.𝕠𝕣𝕘]
 ***/

use Universe\Application;

class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}