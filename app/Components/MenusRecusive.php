<?php 
namespace App\Components;
use App\Menus;

class MenusRecusive{
    private $html;
    public function __construct(){
        $this->html='';
    }
    public function menuRecusive($parent_id = 0, $submask = ''){
        $data = Menus::where('parent_id',$parent_id)->get();
        foreach($data as $value){
            $this->html .= '<option value="'.$value->id.'">'. $submask . $value->name . '</option>';
            $this->menuRecusive($value->id, $submask . '--');
        }
        return $this->html;
    }
    public function menuRecusiveEdit($parentIdEdit,$parent_id = 0, $submask = ''){
        $data = Menus::where('parent_id',$parent_id)->get();
        foreach($data as $value){
            if($parentIdEdit == $value->id){
                $this->html .= '<option selected value="'.$value->id.'">'. $submask . $value->name . '</option>';
            }else{
                $this->html .= '<option value="'.$value->id.'">'. $submask . $value->name . '</option>';
            }
            $this->menuRecusiveEdit($parentIdEdit,$value->id, $submask . '--');
        }
        return $this->html;
    }
}
?>