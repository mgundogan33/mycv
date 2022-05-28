<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PersonalInformationController extends Controller
{
    public function index()
    {
        $information = PersonalInformation::latest()->paginate(10);
        return view('admin.personal_information', compact('information'));
    }
    public function create()
    {
        return view('admin.personal_add');
    }
    public function add(Request $request)
    {

        //return $request->all();
        $request->validate([
            'main_title'       => 'required',
            'about_text'       => 'required',
            'btn_contact_text' => 'required',
            'btn_contact_link' => 'required',
            'small_title_left' => 'required',
            'title_left'       => 'required',
            'small_title_right' => 'required',
            'title_right'      => 'required',
            'full_name'        => 'required',
            'image'            => 'nullable|mimes:jpeg,jpg,png',
            'task_name'        => 'required',
            'birthday'         => 'required',
            'website'          => 'required',
            'phone'            => 'required',
            'mail'             => 'required|email',
            'address'          => 'required',
            'languages'        => 'required',
            'interests'        => 'required',
            'cv'               => 'nullable|mimes:pdf,doc,docx',
        ]);
        if ($request->file()) {
            $request->file('image')
                ->storeAs('image', $request->image->getClientOriginalName(), 'public');
            $request->file('cv')
                ->storeAs('cv', $request->cv->getClientOriginalName(), 'public');
        }
        PersonalInformation::create([
            'main_title'        => $request->main_title,
            'about_text'        => $request->about_text,
            'btn_contact_text'  => $request->btn_contact_text,
            'btn_contact_link'  => $request->btn_contact_link,
            'small_title_left'  => $request->small_title_left,
            'title_left'        => $request->title_left,
            'small_title_right' => $request->small_title_right,
            'title_right'       => $request->title_right,
            'full_name'         => $request->full_name,
            'image'             => $request->image->getClientOriginalName(),
            'task_name'         => $request->task_name,
            'birthday'          => $request->birthday,
            'website'           => $request->website,
            'phone'             => $request->phone,
            'mail'              => $request->mail,
            'address'           => $request->address,
            'languages'         => $request->languages,
            'interests'         => $request->interests,
            'cv'                => $request->cv->getClientOriginalName(),
        ]);
        alert()->success('Başarılı', 'Kişisel bilgileriniz başarıyla eklendi')->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);
        return redirect()->route('personalInformation.index');
    }

    public function edit(Request $request)
    {
        $information = PersonalInformation::whereId($request->id)->firstOrFail();
        return view('admin.personal_edit', compact('information'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'main_title'       => 'required',
            'about_text'       => 'required',
            'btn_contact_text' => 'required',
            'btn_contact_link' => 'required',
            'small_title_left' => 'required',
            'title_left'       => 'required',
            'small_title_right' => 'required',
            'title_right'      => 'required',
            'full_name'        => 'required',
            'image'            => 'nullable|mimes:jpeg,jpg,png',
            'task_name'        => 'required',
            'birthday'         => 'required',
            'website'          => 'required',
            'phone'            => 'required',
            'mail'             => 'required|email',
            'address'          => 'required',
            'languages'        => 'required',
            'interests'        => 'required',
            'cv'               => 'nullable|mimes:pdf,doc,docx',
        ]);


        $file = PersonalInformation::select('id', 'image', 'cv')->where('id', $request->id)->first();
        if ($request->file('image')) {
            $control=public_path('storage/image/' . $file->image);
           if(File::exists($control)){
               unlink($control);
           }
            $request->file('image')
                ->storeAs('image', $request->image->getClientOriginalName(), 'public');
        }
        if ($request->file('cv')) {
            $control=public_path('storage/cv/' . $file->image);
           if(File::exists($control)){
               unlink($control);
           }
            $request->file('cv')
                ->storeAs('cv', $request->cv->getClientOriginalName(), 'public');
        }



        PersonalInformation::find($request->id)->update([
            'main_title'        => $request->main_title,
            'about_text'        => $request->about_text,
            'btn_contact_text'  => $request->btn_contact_text,
            'btn_contact_link'  => $request->btn_contact_link,
            'small_title_left'  => $request->small_title_left,
            'title_left'        => $request->title_left,
            'small_title_right'  => $request->small_title_right,
            'title_right'       => $request->title_right,
            'full_name'         => $request->full_name,
            'image'             => $request->image->getClientOriginalName(),
            'task_name'         => $request->task_name,
            'birthday'          => $request->birthday,
            'website'           => $request->website,
            'phone'             => $request->phone,
            'mail'              => $request->mail,
            'address'           => $request->address,
            'languages'         => $request->languages,
            'interests'         => $request->interests,
            'cv'                => $request->cv->getClientOriginalName(),
        ]);
        alert()->success('Başarılı', 'Kişisel bilgileriniz başarıyla eklendi')->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);
        return redirect()->route('personal_edit', $request->id);
    }
    public function destroy(Request $request)
    {
        PersonalInformation::findOrFail($request->id)->delete();
        alert()->success('Başarılı', 'Kişisel bilgileriniz başarıyla Silindi.')->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);
        return redirect()->route('personalInformation.index');
    }
}
