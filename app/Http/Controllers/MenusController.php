<?php

namespace App\Http\Controllers;
use App\Components\MenusRecusive;
use Illuminate\Http\Request;
use App\Menus;
use Illuminate\Support\Str;
class MenusController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenusRecusive $menuRecusive, Menus $menu){
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }
    public function index(){
        $menus = $this->menu->paginate(10);
        return view('admin.menus.index',compact('menus'));
    }
    public function create(){
        $optionSelect = $this->menuRecusive->menuRecusive();
        return view('admin.menus.add',compact('optionSelect'));
    }
    public function store(Request $req){
        $this->menu->create([
            'name'=> $req->name,
            'parent_id'=> $req->parent_id,
            'slug'=>Str::slug($req->name,'-')
        ]);
        return redirect()->route('admin.menus.index');
    }
    public function edit($id){
        $menuEdit=$this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuEdit->parent_id);
        return view('admin.menus.edit',compact('optionSelect','menuEdit'));
    }
    public function update($id, Request $req){
        $this->menu->find($id)->update([
            'name'=> $req->name,
            'parent_id'=> $req->parent_id,
            'slug'=>Str::slug($req->name,'-')
        ]);
        return redirect()->route('admin.menus.index');
    }
    public function delete($id){
        $this->menu->find($id)->delete();
        return redirect()->route('admin.menus.index');
    }
}
