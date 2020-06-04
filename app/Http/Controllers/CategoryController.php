<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $cate){
        $this->category = $cate;
    }
    public function create(){
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.category.add',compact('htmlOption'));
    }
    public function store(Request $req){
        $this->category->create([
            'name'=> $req->name,
            'parent_id'=> $req->parent_id,
            'slug' => $req->name
        ]);
        return redirect()->route('admin.categories.index');
    }
    public function getCategory($parent_id){
        $data= $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }
    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit',compact('htmlOption','category'));
    }
    public function index(){
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }
    public function update($id, Request $req){
        $this->category->find($id)->update([
            'name'=> $req->name,
            'parent_id'=> $req->parent_id,
            'slug' => Str::slug($req->name,'-')
        ]);
        return redirect()->route('admin.categories.index');
    }
    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('admin.categories.index');
    }
}
