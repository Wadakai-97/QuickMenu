<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Services\JudgementService;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function __construct(
        MenuService $menu_service,
        JudgementService $judgement_service
    ) {
        $this->menuService = $menu_service;
        $this->judgementService = $judgement_service;
    }

    /**
     * メニュー一覧を表示する。
     */
    public function getList() {
        $menus = $this->menuService->getList();
        return view(config('route.menu.list'), compact('menus'));
    }

    /**
     * メニューを検索条件で絞り込んで取得する。
     * @param array $request 検索条件
     * @return array|null
     */
    public function search(Request $request) {
        $menus = $this->menuService->find($request);
        return view(config('route.menu.list'), compact('menus'));
    }

    /**
     * メニュー登録画面を表示する。
     */
    public function index() {
        return view(config('route.menu.create'));
    }

    /**
     * メニューを登録する。
     * @param array $request 入力情報
     * @return null
     */
    public function create(MenuRequest $request) {
        try {
            $save_result = $this->menuService->create($request);
            $message_key = $this->judgementService->saveResultKey($save_result);
            $flash_message = $this->judgementService->saveResultMessage($save_result);

            return redirect()->route(config('route.menu.create'))->with($message_key, $flash_message);
        } catch (Throwable $e) {
            Log::error($e->getResponse()->getBody()->getContents());
        }
    }

    /**
     * メニューを削除する。
     * @param string $id  メニューID
     * @return bool
     */
    public function destroy($id)
    {
        try {
            $delete_result = $this->menuService->destroy($id);
            $message_key = $this->judgementService->deleteResultKey($delete_result);
            $flash_message = $this->judgementService->deleteResultMessage($delete_result);

            return redirect()->route(config('route.menu.list'))->with($message_key, $flash_message);
        } catch (Throwable $e) {
            Log::error($e->getResponse()->getBody()->getContents());
        }
    }
}
