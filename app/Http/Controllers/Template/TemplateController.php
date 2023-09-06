<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function getTemplates()
    {
        $templates = Template::all();
        return view('backend.templates.templates')->with('templates', $templates);
    }

    public function getTemplateAdd()
    {
        return view('backend.templates.template-add');
    }

    public function postTemplateAdd(Request $request, Template $templateData)
    {
        try {
            $templateData = [
                'title' =>  $request->title,
                'order' => $request->order,
                'status' => $request->status
            ];
            
            Template::create($templateData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Sayfa Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Sayfa Eklenemedi ' . $e]);
        }
    }

    public function getTemplateEdit($id)
    {
        $template = Template::find($id);
        return view('backend.templates.template-edit')->with('template', $template);
    }

    public function postTemplateEdit(Request $request, $id)
    {
        try {
            Template::find($id)->update([
                'title' =>  $request->title,
                'order' => $request->order,
                'status' => $request->status
            ]);

            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Şablon Güncellendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Şablon Güncellenemedi ' . $e]);
        }
    }
}
