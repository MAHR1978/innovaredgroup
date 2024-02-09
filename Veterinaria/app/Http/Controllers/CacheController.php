<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function limpiarCache()
    {
        Artisan::call('cache:clear');
        return 'Cache limpiado';
    }
}