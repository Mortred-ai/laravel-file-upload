<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function index()
    {
        $data = \App\Models\Upload::all();

        return view("page.index", compact('data'));
    }

    public function storeUpload(Request $req)
    {

        $req->validate(
            [
                "title"         =>  "required",
                "image"         =>  "required|image|max:5000"
            ]
        );

        $file = $req->file("image");

        echo "Nama file Original : " . $file->getClientOriginalName();
        echo "<br>";

        echo "File Extension : " . $file->getClientOriginalExtension();
        echo "<br>";

        echo "Ukuran File : " . $file->getSize();
        echo "<br>";

        echo "Path Original : " . $file->getRealPath();
        echo "<br>";

        $nama_folder = "file_uploaded";
        $nama_file = time() . "." . $file->getClientOriginalExtension();

        $file->move($nama_folder, $nama_file);

        $path_location = $nama_folder . "/" . $nama_file;

        $data = new \App\Models\Upload();
        $data->title = $req->title;
        $data->path_location  = $path_location;
        $data->save();

        return redirect("/");
    }

    public function delete($id)
    {
        $item = \App\Models\Upload::find($id);
        File::delete($item->path_location);

        $item->delete();

        return redirect('/');
    }
}
