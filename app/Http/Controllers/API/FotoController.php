<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProveFoto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'required|image|max:2048', // Rregulla për validimin e fotos
        ]);

        if ($request->hasFile('foto')) {
            $photoPath = $request->file('foto')->store('photos', 'public');

            $photo = new ProveFoto();
            $photo->foto = $photoPath;
            $photo->save();

            return response()->json(['message' => 'Fotoja u ruajt me sukses!', 'foto' => $photo]);
        }

        return response()->json([
            'message' => 'Nuk u zgjodh fotoja ose ka ndodhur një gabim gjatë ruajtjes.']
        );
    }
}
