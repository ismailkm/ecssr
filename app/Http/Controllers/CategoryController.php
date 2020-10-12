<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.categories.index');
    }

    public function getModelsDataTable()
    {
      $categories = Category::query();

      return Datatables::of($categories)
            ->make();
    }
}
