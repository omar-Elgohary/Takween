<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    
    public function download($filename) {
        $file = Storage::disk('files')->get($filename);
        $headers = [
            'Content-Type' => Storage::disk('files')->mimeType($filename),
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ];
        return storage::download($file);
    }

}
