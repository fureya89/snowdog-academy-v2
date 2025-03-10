<?php

namespace Snowdog\Academy\Menu;

class AccountMenu extends AbstractMenu
{
    public function getHref(): string
    {
        return '/account';
    }

    public function getLabel(): string
    {
        return 'Account';
    }

    public function isVisible(): bool
    {
        if(isset($_SESSION['login'])){
            return true;
        }
        return false;
    }
}
