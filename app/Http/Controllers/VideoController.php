<?php

namespace App\Http\Controllers;

use App\Models\video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video = video::all();
        return response()->json($video);
    }
    //

    public function insert(Request $request)
    {
        $video = new video([
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

        // $insert=new video();
        // $video->video = $file_name;
        // $insert->save();

        $video->save();
        return response()->json('video created!');
    }

    public function store(Request $request)
    {
        $video = new Video([
            'titulli' => $request->input('titulli'),
            'viti' => $request->input('viti'),
            'regjizori' => $request->input('regjizori'),
            'cmimi' => $request->input('cmimi'),
            'koha' => $request->input('koha'),
            'pershkrimi' => $request->input('pershkrimi'),
            $this->validate($request, [
                'video' => 'required|file|mimetypes::mp4,ogx,oga,ogv,ogg,webm',
            ]),
            'video' => $request->input('video'),

         ]);

        $file=$request->file('video');
        $file->move('upload',$file->getClientOriginalName());
        $file_name=$file->getClientOriginalName();

        $insert=new video();
        $video->video = $file_name;
        $insert->save();
        $video->save();
        return response()->json('Movie created!');
    }


}
