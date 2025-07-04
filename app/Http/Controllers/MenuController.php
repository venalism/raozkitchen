<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Hari;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $haris = Hari::all();

        $menus = Menu::with('hari')
            ->where('stok', '>', 0)
            ->when($request->filled('hari'), function ($query) use ($request) {
                $query->whereHas('hari', function ($q) use ($request) {
                    $q->where('nama_hari', $request->hari);
                });
            })
            ->paginate(9);

        return view('client.menu', compact('menus', 'haris'));
    }
}