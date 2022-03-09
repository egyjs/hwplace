<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadAjaxFileController extends Controller
{
    public function upload(Request $request)
    {
        $files = is_array($request->file)? $request->file : [$request->file];
//        dd($files,$request->all());
        $urlpaths = [];
        foreach ($files as $file) {
            $fileName = Str::slug($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads');
            $file->move($path, $fileName);
            $urlpaths[] = url('uploads/' . $fileName);
        }
        return response()->json(['success' => $urlpaths]);
    }


}
