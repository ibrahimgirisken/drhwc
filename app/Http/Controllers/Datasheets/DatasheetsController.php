<?php

namespace App\Http\Controllers\Datasheets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Datasheet;
use App\Models\DatasheetTranslation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class DatasheetsController extends Controller

{

    public function getDatasheets()

    {

        $datasheets = Datasheet::all();

        return View("backend.datasheets.datasheets")->with('datasheets', $datasheets);
    }



    public function getDatasheetAdd()

    {
        $datasheet = Datasheet::with('translationsData')->find(1);
        return View("backend.datasheets.datasheet-add")->with('datasheet', $datasheet);
    }



    public function postDatasheetAdd(Request $request, Datasheet $datasheetData)
    {
        try {
            $imageName1 = "";
            $imageName2 = "";
            $imageName3 = "";

            if (!empty($request->trPath)) {
                $trSlug = Str::slug($request->trProductName, '-');
                $request->merge(['trUrl' => $trSlug]);
                $imageName1 = $request->trPath->getClientOriginalName();
                $request->trPath->move(public_path('datasheets'), $imageName1);
            }
            if (!empty($request->enPath)) {
                $enSlug = Str::slug($request->enProductName, '-');
                $request->merge(['enUrl' => $enSlug]);
                $imageName2 = $request->enPath->getClientOriginalName();
                $request->enPath->move(public_path('datasheets'), $imageName2);
            }
            if (!empty($request->dePath)) {
                $deSlug = Str::slug($request->deProductName, '-');
                $request->merge(['deUrl' => $deSlug]);
                $imageName3 = $request->dePath->getClientOriginalName();
                $request->dePath->move(public_path('datasheets'), $imageName3);
            }

            $nextId = Datasheet::max('uniqId') + 1;
            $datasheetData = [
                'uniqId' => $nextId,
                'productCode' => $request->productCode,
                'image' => $request->image,
                'order' => $request->order,
                'status' => $request->status,
                'tr' => ['productName' => $request->trProductName, 'content' => $request->trContent, 'slug' => $request->trUrl, 'path' => $imageName1],
                'en' => ['productName' => $request->enProductName, 'content' => $request->enContent, 'slug' => $request->enUrl, 'path' => $imageName2],
                'de' => ['productName' => $request->deProductName, 'content' => $request->deContent, 'slug' => $request->deUrl, 'path' => $imageName3]
            ];

            Datasheet::create($datasheetData);

            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Döküman Eklendi']);
        } catch (\Exception $e) {

            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Döküman Eklenemedi Hata: ' . $e]);
        }
    }



    public function getDatasheetEdit(Datasheet $datasheet, $id)
    {
        $datasheet = Datasheet::find($id);

        $imageName1 = $datasheet->image1;
        $imageName2 = $datasheet->image2;
        $imageName3 = $datasheet->image3;


        $datasheetTr = $datasheet->translate('tr');
        $datasheetEn = $datasheet->translate('en');
        $datasheetDe = $datasheet->translate('de');
        return view('backend.datasheets.datasheet-edit')->with('datasheetTr', $datasheetTr)->with('datasheetEn', $datasheetEn)->with('datasheetDe', $datasheetDe)->with('datasheet', $datasheet);
    }



    public function postDatasheetEdit(Request $request, Datasheet $datasheetData, $id)
    {
        try {
            $datasheet = Datasheet::find($id);
            $datasheetTr = $datasheet->translate('tr');
            $datasheetEn = $datasheet->translate('en');
            $datasheetDe = $datasheet->translate('de');
            $imageName1 = $datasheetTr->path;
            $imageName2 = $datasheetEn->path;
            $imageName3 = $datasheetDe->path;

            if (!empty($request->trPath && $request->trPath != $datasheetTr->path)) {
                $trSlug = Str::slug($request->trProductName, '-');
                $request->merge(['trUrl' => $trSlug]);
                $imageName1 = $request->trPath->getClientOriginalName();
                File::delete(public_path('datasheets/' . $request->trImageName));
                $request->trPath->move(public_path('datasheets'), $imageName1);
            }
            if (!empty($request->enPath && $request->enPath != $datasheetEn->path)) {
                $enSlug = Str::slug($request->enProductName, '-');
                $request->merge(['enUrl' => $enSlug]);
                $imageName2 = $request->enPath->getClientOriginalName();
                File::delete(public_path('datasheets/' . $request->enImageName));
                $request->enPath->move(public_path('datasheets'), $imageName2);
            }
            if (!empty($request->dePath && $request->dePath != $datasheetDe->path)) {
                $deSlug = Str::slug($request->deProductName, '-');
                $request->merge(['deUrl' => $deSlug]);
                $imageName3 = $request->dePath->getClientOriginalName();
                File::delete(public_path('datasheets/' . $request->deImageName));
                $request->dePath->move(public_path('datasheets'), $imageName3);
            }

            $datasheetData = [
                'productCode' => $request->productCode,
                'image' => $request->image,
                'order' => $request->order,
                'status' => $request->status,
                'tr' => ['productName' => $request->trProductName, 'content' => $request->trContent, 'slug' => $request->trUrl, 'path' => $imageName1],
                'en' => ['productName' => $request->enProductName, 'content' => $request->enContent, 'slug' => $request->enUrl, 'path' => $imageName2],
                'de' => ['productName' => $request->deProductName, 'content' => $request->deContent, 'slug' => $request->deUrl, 'path' => $imageName3]
            ];

            $datasheet->update($datasheetData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Datasheet Güncellendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Datasheet Güncellenemedi ' . $e]);
        }
    }



    public function getQrCode($uniqId)
    {

        $datasheets = Datasheet::where('uniqId', $uniqId)->get();

        if (count($datasheets) > 0) {

            return View("frontend.qr")->with('datasheets', $datasheets);
        } else {

            return redirect('/');
        }
    }
}
