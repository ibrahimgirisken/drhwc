<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Template;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ModuleController extends Controller
{
    public function getModules()
    {
        $modules = Module::all();
        return view('backend.modules.modules')->with('modules', $modules);
    }
    public function getModuleAdd()
    {
        return view('backend.modules.module-add');
    }

    public function postModuleAdd(Request $request, Module $moduleData)
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

            $imageName1 = "";

            if ($request->image1) {
                $imageName1 = $request->image1->getClientOriginalName();

                $request->image1->move(public_path('img/page'), $imageName1);
            }

            $moduleData = [
                'order' => $request->order,
                'status' => $request->status,
                'image1' =>  $imageName1,
                'template_up' => $request->templateUp,
                'template_down' => $request->templateDown,
                'tr' => ['slug' => $request->trUrl, 'title' => $request->trTitle, 'content' => $request->trContent],
                'en' => ['slug' => $request->enUrl, 'title' => $request->enTitle, 'content' => $request->enContent],
                'de' => ['slug' => $request->deUrl, 'title' => $request->deTitle, 'content' => $request->deContent],
            ];

            Module::create($moduleData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Module Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Module Eklenemedi ' . $e]);
        }
    }

    public function getModuleEdit($id)
    {
        $module = Module::find($id);
        $templates = Template::all();
        $moduleTr = $module->translate('tr');
        $moduleEn = $module->translate('en');
        $moduleDe = $module->translate('de');
        return view('backend.modules.module-edit')->with('module', $module)->with('moduleTr', $moduleTr)->with('moduleEn', $moduleEn)->with('moduleDe', $moduleDe)->with('templates',$templates);
    }

    public function postModuleEdit(Request $request, Module $moduleData, $id)
    {
        try {
            $module = Module::findOrFail($id);
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

            $imageName1 = $module->image1;

            if ($request->image1&&$request->image1!=$module->image1) {
                $imageName1 = $request->image1->getClientOriginalName();
                File::delete(public_path('img/page/'.$module->image1));    
                $request->image1->move(public_path('img/page'), $imageName1);
            }


            $moduleData = [
                'order' => $request->order,
                'status' => $request->status,
                'image1' =>  $imageName1,
                'template_up' => $request->templateUp,
                'template_down' => $request->templateDown,
                'tr' => ['slug' => $request->trUrl, 'title' => $request->trTitle, 'content' => $request->trContent],
                'en' => ['slug' => $request->enUrl, 'title' => $request->enTitle, 'content' => $request->enContent],
                'de' => ['slug' => $request->deUrl, 'title' => $request->deTitle, 'content' => $request->deContent],
            ];

            $module->update($moduleData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Module Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Module Eklenemedi ' . $e]);
        }
    }
}
