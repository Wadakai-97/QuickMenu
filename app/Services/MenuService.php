<?php

namespace App\Services;

use App\Repositories\MenuRepository;

class MenuService
{
    public function __construct(
        MenuRepository $menu_repository
    ) {
        $this->menuRepository = $menu_repository;
    }

    public function getList()
    {
        return $this->menuRepository->getList();
    }

    public function find($request)
    {
        return $this->menuRepository->find($request);
    }

    public function create($request)
    {
        return $this->menuRepository->create($request);
    }

    public function destroy($id)
    {
        return $this->menuRepository->destroy($id);
    }
}
