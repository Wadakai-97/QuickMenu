<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository implements MenuRepositoryInterface
{
    public function list()
    {
        return Menu::all();
    }
}
