<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        return view('admin.usuarios.index');
    }

    public function usuarios(Request $request){
        $search = "";
        $limit = 1;
        if ($request->has('search')){
            $search = $request->input('search');
    
            if (trim($search) != ''){
                $data = User::where('name', 'like', "%$search%")
                    ->orwhere('email', 'like', "%$search%")->get();
            } else {
                $data = User::all();
            }
        } else {
            $data = User::all();
        }
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = $limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
        return view('admin.usuarios.index', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }

    public function categorias(Request $request)
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
