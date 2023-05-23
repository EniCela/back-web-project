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

    // public function insert(Request $request)
    // {
    //     // $validatedData = $request->validate([
    //     //     'foto' => 'required|image|max:2048', // Rregulla për validimin e fotos
    //     // ]);

    //     // if ($request->hasFile('foto')) {
    //     //     $photoPath = $request->file('foto')->store('photos', 'public');

    //     //     $photo = new video();
    //     //     $photo->titulli = $request->input('titulli');
    //     //     $photo->viti = $request->input('viti');
    //     //     $photo->regjizori = $request->input('regjizori');
    //     //     $photo->cmimi = $request->input('cmimi');
    //     //     $photo->koha = $request->input('koha');
    //     //     $photo->pershkrimi = $request->input('pershkrimi');
    //     //     $photo->foto = $photoPath;
    //     //     $photo->save();

    //     //     return response()->json(['message' => 'Fotoja u ruajt me sukses!']);
    //     // }

    //     // return response()->json([
    //     //     'message' => 'Nuk u zgjodh fotoja ose ka ndodhur një gabim gjatë ruajtjes.']
    //     // );
    // }

    public function store(Request $request)
    {

        $video = new video([
            'titulli' => $request->input('titulli'),
            'viti' => $request->input('viti'),
            'regjizori' => $request->input('regjizori'),
            'cmimi' => $request->input('cmimi'),
            'koha' => $request->input('koha'),
            'pershkrimi' => $request->input('pershkrimi'),
            'video' => $request->input('video'),
            'foto' => $request->input('foto'),
         ]);

        // $file=$request->file('video')->store('docsupload');
        // $file_name=$file->getClientOriginalName();
        // $file->move('upload',$file->getClientOriginalName());


        // $insert=new video();
        // $video->video = $file_name;

        // $insert->save();
        $video->save();
        return response()->json('Movie created!');
    }

    public function update(Request $request, $id)
    {
       $video = video::find($id);
       $video->update($request->all());
       return response()->json('news updated');
    }

  public function show($id)
    {
        $contact = video::find($id);
        return response()->json($contact);
    }
    public function destroy($id)
    {
        $video = video::find($id);
        $video->delete();
        return response()->json(' deleted!');
    }

}
