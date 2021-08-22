<?php

namespace Snowdog\Academy\Menu;

class AccountAddFundsMenu extends AbstractMenu
{
    public function getHref(): string
    {
        return '/account/addFunds';
    }

    public function getLabel(): string
    {
        return 'Add found';
    }

    public function isVisible(): bool
    {
        if(isset($_SESSION['login'])){
            return true;
        }
        return false;
    }
}
