<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{

    /**
     * メニュー一覧を表示する。
     */
    public function list() {
        $menus = Menu::getList();
        return view ('menu.list', compact('menus'));
    }

    /**
     * 検索条件に沿うメニューを取得する。
     *
     * @param array $request 検索条件
     * @return array|null
     */
    public function search(Request $request) {
        $menus = Menu::query()
                    ->whereTimezone($request)
                    ->whereCategory($request)
                    ->whereDishName($request)
                    ->paginate(15);
        return view('menu.list', compact('menus'));
    }

    /**
     * 登録画面を表示する。
     */
    public function index() {
        return view('menu.create');
    }

    /**
     * 商品を削除する。
     * @param string $id  メニューID
     * @return bool
     */
    public function destroy($id) {
        $delete_result = Menu::dataDestroy($id);

        if(!empty($delete_result)) {
            $message_key = config('status.MESSAGE_KEY_SUCCESS');
            $flash_message = config('message.DESTROY_SUCCESS');
        } else {
            $message_key = config('status.MESSAGE_KEY_FAILED');
            $flash_message = config('message.DESTROY_FAILED');
        }

        return redirect()->route('menu.list')->with($message_key, $flash_message);
    }

    /**
     * 入力情報を登録する。
     *
     * @param array $request 入力情報
     * @return null
     */
    public function create(MenuRequest $request) {
        try {
            DB::beginTransaction();
            $save_result = Menu::store($request->all());
            $request->session()->regenerateToken();
            DB::commit();

            if(!empty($save_result)) {
                $message_key = config('status.MESSAGE_KEY_SUCCESS');
                $flash_message = config('message.STORE_SUCCESS');
            } else {
                $message_key = config('status.MESSAGE_KEY_FAILED');
                $flash_message = config('message.STORE_FAILED');
            }

            return redirect()->route('menu.create')->with($message_key, $flash_message);
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e);
            throw $e;
        }
    }
}
