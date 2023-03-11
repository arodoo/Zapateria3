<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $search = "";
        $limit = 1;
        if ($request->has('search')) {
            $search = $request->input('search');

            if (trim($search) != '') {
                $data = Categoria::where('nombre', 'like', "%$search%");

            } else {
                $data = Categoria::all();
            }
        } else {
            $data = Categoria::all();
        }
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = $limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
        return view('admin.categorias.index', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }
}
