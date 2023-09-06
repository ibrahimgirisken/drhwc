<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenusController extends Controller
{
    public function getMenus()
    {
        $menus = Menu::all();
        return view('backend.menus.menus')->with('menus', $menus);
    }
    public function getMenuAdd()
    {
        $templates = Template::all();
        $menus = Menu::all();
        return view('backend.menus.menu-add')->with('menus', $menus)->with('templates',$templates);
    }

    public function postMenuAdd(Request $request,Menu $menuData)
    {
        try {
            if (empty($request->trUrl)) {
                $trSlug = Str::slug($request->trTitle, '-');
                $request->merge(['trUrl' => $trSlug]);
            }

            if (empty($request->enUrl)) {
                $enSlug = Str::slug($request->enTitle, '-');
                $request->merge(['enUrl' => $enSlug]);
            }

            if (empty($request->deUrl)) {
                $deSlug = Str::slug($request->deTitle, '-');
                $request->merge(['deUrl' => $deSlug]);
            }

            $menuData = [
                'order' => $request->order,
                'vitrin_status' => $request->vitrin,
                'footer_status' => $request->footer,
                'status' => $request->status,
                'parent_id' =>$request->menu_id,
                'template_id' => $request->template_id,
                'tr' => ['slug' => $request->trUrl, 'title' => $request->trTitle, 'page_title' => $request->trPageTitle, 'content' => $request->trContent],
                'en' => ['slug' => $request->enUrl, 'title' => $request->enTitle, 'page_title' => $request->enPageTitle, 'content' => $request->enContent],
                'de' => ['slug' => $request->deUrl, 'title' => $request->deTitle, 'page_title' => $request->dePageTitle, 'content' => $request->deContent],
            ];

            Menu::create($menuData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Menu Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Menu Eklenemedi '.$e]);
        }
    }

    public function getMenuEdit($id)
    {
        $templates = Template::all();
        $menus = Menu::all();
        $menu=menu::find($id);
        $menuTr = $menu->translate('tr');
        $menuEn = $menu->translate('en');
        $menuDe = $menu->translate('de');
        return view('backend.menus.menu-edit')->with('menu', $menu)->with('menuTr',$menuTr)->with('menuEn',$menuEn)->with('menuDe',$menuDe)->with('menus', $menus)->with('templates',$templates);;
    }

    public function postMenuEdit(Request $request,Menu $menuData, $id)
    {
        try {
            $menu = Menu::findOrFail($id);
            if (empty($request->trUrl)) {
                $trSlug = Str::slug($request->trTitle, '-');
                $request->merge(['trUrl' => $trSlug]);
            }

            if (empty($request->enUrl)) {
                $enSlug = Str::slug($request->enTitle, '-');
                $request->merge(['enUrl' => $enSlug]);
            }

            if (empty($request->deUrl)) {
                $deSlug = Str::slug($request->deTitle, '-');
                $request->merge(['deUrl' => $deSlug]);
            }

            $menuData = [
                'order' => $request->order,
                'vitrin_status' => $request->vitrin,
                'footer_status' => $request->footer,
                'status' => $request->status,
                'parent_id' =>$request->menu_id,
                'template_id' => $request->template_id,
                'tr' => ['slug' => $request->trUrl, 'title' => $request->trTitle, 'page_title' => $request->trPageTitle, 'content' => $request->trContent],
                'en' => ['slug' => $request->enUrl, 'title' => $request->enTitle, 'page_title' => $request->enPageTitle, 'content' => $request->enContent],
                'de' => ['slug' => $request->deUrl, 'title' => $request->deTitle, 'page_title' => $request->dePageTitle, 'content' => $request->deContent],
            ];

            $menu->update($menuData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Menu Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Menu Eklenemedi '.$e]);
        }
    }
}
