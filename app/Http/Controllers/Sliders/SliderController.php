<?php

namespace App\Http\Controllers\Sliders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function getSliders()
    {
        $sliders = Slider::all();
        return view('backend.sliders.sliders')->with('sliders', $sliders);
    }

    public function getSliderAdd()
    {
        return view('backend.sliders.slider-add');
    }
    
    public function getSliderEdit($id)
    {
        $slider=Slider::find($id);
        $sliderTr = $slider->translate('tr');
        $sliderEn = $slider->translate('en');
        $sliderDe = $slider->translate('de');
        return view('backend.sliders.slider-edit')->with('sliderTr', $sliderTr)->with('sliderEn', $sliderEn)->with('sliderDe', $sliderDe)->with('slider',$slider);;
    }

    public function postSliderAdd(Request $request, Slider $sliderData)
    {
        try {

            $imageName1 = "";
            $imageName2 = "";
            $imageName3 = "";

            if ($request->desktop) {
                $imageName1 = $request->desktop->getClientOriginalName();

                $request->desktop->move(public_path('img/sliders'), $imageName1);
            }

            if ($request->tablet) {
                $imageName2 = $request->tablet->getClientOriginalName();

                $request->tablet->move(public_path('img/sliders'), $imageName2);
            }

            if ($request->mobile) {
                $imageName3 = $request->mobile->getClientOriginalName();

                $request->mobile->move(public_path('img/sliders'), $imageName3);
            }
            $sliderData = [
                'order'  => $request->order,
                'status' => $request->status,
                'desktop' =>  $imageName1,
                'tablet' =>  $imageName2,
                'mobile' =>  $imageName3,
                'tr' => ['title' => $request->trTitle, 'description' => $request->trContent, 'url' => $request->trUrl],
                'en' => ['title' => $request->enTitle, 'description' => $request->enContent, 'url' => $request->enUrl],
                'de' => ['title' => $request->deTitle, 'description' => $request->deContent, 'url' => $request->deUrl],
            ];

            Slider::create($sliderData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Ürün Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Ürün Eklenemedi Hata: ' . $e]);
        }
    }

    public function postSliderEdit(Request $request,Slider $sliderData,$id)
    {
        try {
            $slider = Slider::findOrFail($id);

            $imageName1 = $slider->desktop;
            $imageName2 = $slider->tablet;
            $imageName3 = $slider->mobile;

            if ($request->desktop && $request->desktop != $slider->desktop) {
                $imageName1 = $request->desktop->getClientOriginalName();
                File::delete(public_path('img/sliders/' . $slider->desktop));
                $request->desktop->move(public_path('img/sliders'), $imageName1);
            }

            if ($request->tablet && $request->tablet != $slider->tablet) {
                $imageName2 = $request->tablet->getClientOriginalName();
                File::delete(public_path('img/sliders/' . $slider->tablet));
                $request->tablet->move(public_path('img/sliders/'), $imageName2);
            }

            if ($request->mobile && $request->mobile != $slider->mobile) {
                $imageName3 = $request->mobile->getClientOriginalName();
                File::delete(public_path('img/sliders/' . $slider->mobile));
                $request->mobile->move(public_path('img/sliders/'), $imageName3);
            }

            $sliderData = [
                'order'  =>  $request->order,
                'status' =>  $request->status,
                'desktop'=>  $imageName1,
                'tablet' =>  $imageName2,
                'mobile' =>  $imageName3,
                'tr' => ['title' => $request->trTitle, 'content' => $request->trContent, 'url' => $request->trUrl],
                'en' => ['title' => $request->enTitle, 'content' => $request->enContent, 'url' => $request->enUrl],
                'de' => ['title' => $request->deTitle, 'content' => $request->deContent, 'url' => $request->deUrl],
            ];

            $slider->update($sliderData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Ürün Güncellendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Ürün Güncellenemedi ' . $e]);
        }
    }
}
