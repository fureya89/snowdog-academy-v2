<?php

namespace Snowdog\Academy\Menu;

class LogoutMenu extends AbstractMenu
{
    public function getHref(): string
    {
        return '/logout';
    }

    public function getLabel(): string
    {
        return 'Logout';
    }

    public function isVisible(): bool
    {
        if(isset($_SESSION['login'])){
            return true;
        }
        return false;
    }
}
