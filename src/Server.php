<?php 

namespace Kasfy\Framework;

class Server
{
    public function serve()
    {
        return shell_exec("php -S localhost:4107 kasfy");
    }
}

