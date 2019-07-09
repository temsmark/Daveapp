<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
$document=Upload::findOrFail($id);
$filepath=public_path("uploads/".$document->upload);

return response()->file($filepath,[
    'Content-Disposition'=>'inline; filename"'.$filepath.'"'
]);
    }


}
