<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Main;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function getMainPages()
    {
        $mains = Main::all();
        return view('backend.main.main-pages')->with('mains', $mains);
    }
    

    public function getMainPageAdd()
    {
        return view('backend.main.main-page-add');
    }

    public function postMainPageAdd(Request $request, Main $mainData)
    {
        try {
            $trSlug = Str::slug($request->trTitle, '-');
            $enSlug = Str::slug($request->enTitle, '-');
            $deSlug = Str::slug($request->deTitle, '-');

            $request->merge(['trUrl' => $trSlug]);
            $request->merge(['enUrl' => $enSlug]);
            $request->merge(['deUrl' => $deSlug]);

            $imageName1 = "";

            if ($request->image1) {
                $imageName1 = $request->image1->getClientOriginalName();

                $request->image1->move(public_path('img/page'), $imageName1);
            }

            $mainData = [
                'tr' => ['title' => $request->trTitle, 'slug' => $request->trUrl, 'brief' => $request->trBrief, 'content' => $request->trContent],
                'en' => ['title' => $request->enTitle, 'slug' => $request->enUrl, 'brief' => $request->enBrief, 'content' => $request->enContent],
                'de' => ['title' => $request->deTitle, 'slug' => $request->deUrl, 'brief' => $request->deBrief, 'content' => $request->deContent],
                'image' =>  $imageName1,
                'status' => $request->status,
                'order' => $request->order
            ];

            Main::create($mainData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Ürün Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Ürün Eklenemedi Hata: ' . $e]);
        }
    }

    public function getMainPageEdit(Main $main, $id)
    {
        $main = Main::findOrFail($id);
        $mainTr = $main->translate('tr');
        $mainEn = $main->translate('en');
        $mainDe = $main->translate('de');
        return view('backend.main.main-page-edit')->with('mainTr', $mainTr)->with('mainEn', $mainEn)->with('mainDe', $mainDe)->with('main', $main);
    }

    public function postMainPageEdit(Request $request, Main $mainData, $id)
    {
        try {
            $main = Main::findOrFail($id);

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

            $imageName1 = $main->image;

            if ($request->image1 && $request->image1 != $main->image) {
                $imageName1 = $request->image1->getClientOriginalName();
                File::delete(public_path('img/page/' . $main->image));
                $request->image1->move(public_path('img/page'), $imageName1);
            }

            $mainData = [
                'order' => $request->order,
                'status' => $request->status,
                'image' =>  $imageName1,
                'tr' => ['slug' => $request->trUrl, 'title' => $request->trTitle, 'brief' => $request->trBrief, 'content' => $request->trContent],
                'en' => ['slug' => $request->enUrl, 'title' => $request->enTitle, 'brief' => $request->enBrief, 'content' => $request->enContent],
                'de' => ['slug' => $request->deUrl, 'title' => $request->deTitle, 'brief' => $request->deBrief, 'content' => $request->deContent],
            ];

            $main->update($mainData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Ürün Güncellendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Ürün Güncellenemedi ' . $e]);
        }
    }
}
