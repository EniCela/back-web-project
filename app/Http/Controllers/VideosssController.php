<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class VideosssController extends Controller
{
    public function getVideoUploadForm()
    {
        return view('video-upload');
    }

//     public function uploadVideo(Request $request)
//    {
//         $this->validate($request, [
//             'title' => 'required|string|max:255',
//             'video' => 'required|file|mimetypes:video/mp4',
//         ]);

//         $fileName = $request->video->getClientOriginalName();
//         $filePath = 'videos/' . $fileName;

//         $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));

//         // File URL to access the video in frontend
//         $url = Storage::disk('public')->url($filePath);

//         if ($isFileUploaded) {
//             $video = new Video();
//             $video->title = $request->title;
//             $video->path = $filePath;
//             $video->save();

//             return back()
//             ->with('success','Video has been successfully uploaded.');
//         }

//         return back()
//             ->with('error','Unexpected error occured');
//     }
}
