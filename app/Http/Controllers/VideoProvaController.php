<?php

namespace App\Http\Controllers;

use App\Models\videoprova;
use Illuminate\Http\Request;

class VideoProvaController extends Controller
{

    public function insertvideo(Request $request)
    {
        $video = new videoprova([

            'titulli' => $request->input('titulli'),
            'viti' => $request->input('viti'),
            'regjizori' => $request->input('regjizori'),
            'cmimi' => $request->input('cmimi'),
            'koha' => $request->input('koha'),
            'pershkrimi' => $request->input('pershkrimi'),
            // $this->validate($request, [
            //     'video' => 'required|file|mimetypes:video/mp4',
            // ]),
            'video' => $request->input('video'),

        ]);
        // $file=$request->file('video');
        // $file->move('upload',$file->getClientOriginalName());
        // $file_name=$file->getClientOriginalName();

        // $insert=new videoprova();
        // $insert->video = $file_name;
        // $insert-> save();

        $video->save();
        return response()->json('video created!');
}
}
