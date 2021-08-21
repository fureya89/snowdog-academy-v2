<?php

namespace Snowdog\Academy\Menu;

class RegisterMenu extends AbstractMenu
{
    public function getHref(): string
    {
        return '/register';
    }

    public function getLabel(): string
    {
        return 'Register';
    }

    public function isVisible(): bool
    {
        if(isset($_SESSION['login'])){
            return false;
        }
        return true;
    }
}
