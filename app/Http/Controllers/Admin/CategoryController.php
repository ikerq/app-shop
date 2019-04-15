<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id')->paginate(10);
        return  view('admin.categories.index')->with(compact('categories')); //listado
    }
    public function create(){
        return  view('admin.categories.create'); //formulario de registro
    }
    public function store(Request $request){
        
        $this->validate($request, Category::$rules, Category::$messages);

        //registrar nueva categopría en la BD
        Category::create($request->all()); // mass assignment --> with fillable from model Category

        return redirect('/admin/categories');
    }
    public function edit(Category $category){

        return  view('admin.categories.edit')->with(compact('category')); //formulario de registro
    }
    public function update(Request $request, Category $category){
        
        $this->validate($request, Category::$rules, Category::$messages);
        
        $category->update($request->all());

        return redirect('/admin/categories');
    }
    public function destroy(Category $category){
        $category->delete();
        return back();//--> return a la pagina anterior
    }
}
