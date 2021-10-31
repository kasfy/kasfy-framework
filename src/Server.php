<?php 

namespace Kasfy\Framework;

class Server
{
    public function serve($root)
    {
        return shell_exec("php -S localhost:4107 ". $root);
    }
}

