<?php

namespace App\Services;

use App\Repositories\MenuRepositoryInterface;

class MenuService
{
    public function __construct(
        MenuRepository $menuRepository
    ) {
        $this->menuRepositry = $menuRepository;
    }

    public function list()
    {
        $menus = $this->menuRepositry->list();
        return $menus;
    }
}
