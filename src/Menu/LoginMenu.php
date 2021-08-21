<?php

namespace Snowdog\Academy\Menu;

class LoginMenu extends AbstractMenu
{
    public function getHref(): string
    {
        return '/login';
    }

    public function getLabel(): string
    {
        return 'Login';
    }

    public function isVisible(): bool
    {
        if(isset($_SESSION['login'])){
            return !$_SESSION['login'];
        }
        return true;
    }
}
