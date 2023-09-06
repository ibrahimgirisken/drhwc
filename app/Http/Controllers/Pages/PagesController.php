<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu;
use App\Models\Module;
use App\Models\Template;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function getPages()
    {
        $pages = Page::all();
        return view('backend.pages.pages')->with('pages', $pages);
    }

    public function getPageAdd()
    {
        $menus = Menu::all();
        $templates = Template::all();
        return view('backend.pages.page-add')->with('menus', $menus)->with('templates', $templates);
    }

    public function postPageAdd(Request $request, Page $pageData)
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

            $pageData = [
                'order' => $request->order,
                'status' => $request->status,
                'menu_id' => $request->menu_id,
                'module_id' => $request->module_id,
                'tr' => ['slug' => $request->trUrl, 'title' => $request->trTitle, 'page_title' => $request->trPageTitle, 'content' => $request->trContent, 'brief' => $request->trBrief, 'keywords' => $request->trKeywords, 'description' => $request->trDescription],
                'en' => ['slug' => $request->enUrl, 'title' => $request->enTitle, 'page_title' => $request->enPageTitle, 'content' => $request->enContent, 'brief' => $request->enBrief, 'keywords' => $request->enKeywords, 'description' => $request->enDescription],
                'de' => ['slug' => $request->deUrl, 'title' => $request->deTitle, 'page_title' => $request->dePageTitle, 'content' => $request->deContent, 'brief' => $request->deBrief, 'keywords' => $request->deKeywords, 'description' => $request->deDescription],
            ];

            Page::create($pageData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Sayfa Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Sayfa Eklenemedi ' . $e]);
        }
    }


    public function getPageEdit($id)
    {
        $templates = Template::all();
        $page = Page::where('id',$id)->first();
        $menus = Menu::all();
        $pageTr = $page->translate('tr');
        $pageEn = $page->translate('en');
        $pageDe = $page->translate('de');
        return view('backend.pages.page-edit')->with('pageTr', $pageTr)->with('pageEn', $pageEn)->with('pageDe', $pageDe)->with('page', $page)->with('menus', $menus)->with('templates', $templates);
    }

    public function postPageEdit(Request $request, Page $pagesData, $id)
    {
        try {
            $page = Page::findOrFail($id);

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

            $pagesData = [
                'order' => $request->order,
                'status' => $request->status,
                'menu_id' => $request->menu_id,
                'template_id' => $request->template_id,
                'tr' => ['title' => $request->trTitle, 'slug' => $request->trUrl, 'page_title' => $request->trPageTitle, 'brief' => $request->trBrief, 'keywords' => $request->trKeywords, 'description' => $request->trDescription, 'content' => $request->trContent],
                'en' => ['title' => $request->enTitle, 'slug' => $request->enUrl, 'page_title' => $request->enPageTitle, 'brief' => $request->enBrief, 'keywords' => $request->enKeywords, 'description' => $request->enDescription, 'content' => $request->enContent],
                'de' => ['title' => $request->deTitle, 'slug' => $request->deUrl, 'page_title' => $request->dePageTitle, 'brief' => $request->deBrief, 'keywords' => $request->deKeywords, 'description' => $request->deDescription, 'content' => $request->deContent],
            ];

            $page->update($pagesData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Menu Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Menu Eklenemedi ' . $e]);
        }
    }
}
