<?php 

namespace Kasfy;

class Framework
{
    public function serve()
    {
        echo shell_exec("php -S localhost:4107 kasfy");
    }
}

