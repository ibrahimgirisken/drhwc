<?php



namespace App\Http\Controllers\Settings;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Settings;


class SettingsController extends Controller

{

    public function getSettings()
    {

        return view('backend.settings.settings');
    }

    public function getSettingEdit($id)
    {

        $settings = Settings::find($id='1');
        return view('backend.settings.setting-edit',['id'=>$id])->with('settings', $settings);
    }

    public function postSettingEdit(Request $request,$id='1')
    {
        // dd( $request->all());

        try {
            Settings::find($id)->update([
                'title' =>  $request->title,
                'description' =>  $request->description,
                'keywords' =>  $request->keywords,
                'telephone' =>  $request->telephone,
                'mail' =>  $request->email,
                'address' =>  $request->address,
                'facebook' =>  $request->facebook,
                'googleMaps' =>  $request->maps,
                'instagram' =>  $request->instagram,
                'twitter' =>  $request->twitter,
                'logo' => 'yok',
                'status' => isset($request->status) ? $request->status :'',
            ]);

            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Menu Güncellendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Menu Güncellenemedi ' . $e]);
        }
    }
}
