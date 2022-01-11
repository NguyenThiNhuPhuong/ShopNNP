<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $user;
    protected $slider;

    function __construct()
    {
        $this->user = new User;
        $this->slider = new Slider;
    }

    function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image'=>'required',
        ]);
        $this->slider->name = $request->name;
        $this->slider->active = $request->active;
        $this->slider->url= $request->url;
        $this->slider->image= $request->image;
        $this->slider->content= $request->content;

        $this->slider->save();
        return redirect()->route('adminListSlider');
    }

    function edit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image'=>'required',
        ]);
         $this->slider->find($request->id)->update([
            'name' => $request->name,
            'url' => $request->url,
            'image' => $request->image,
            'content' => $request->content,
            'active' => $request->active,

        ]);
        return redirect()->route('adminListSlider'); 
    }

    function listSlider()
    {
        $listSlider=Slider::paginate(10);
        return view('admin.slider.listSlider', [
            'title' => 'Admin| Slider',
            'user'=>$this->user->userLogin(),
            'listSlider' => $listSlider,
        ]);
    }

    function addSlider()
    {
        return view('admin.slider.addSlider', [
            'title' => "Admin | Thêm slider",
            'user'=>$this->user->userLogin(),
        ]);
    }
    
    function editSlider($id)
    {
        return view('admin.slider.editSlider', [
            'title' => "Admin | Cập nhật slider",
            'user'=>$this->user->userLogin(),
            'slider' => $this->slider->getSlider($id),
        ]);
    }

    function deletes(Request $request)
    {
        $id = $request->id;
        $result = $this->slider->deletes($id);
        if ($result) {
            return response()->json([
                'error'=> false,
                'message' => "Xóa slider thành công!"
            ]);
        } else {
            return response()->json([
                'error'=> true,
                'message' => "Xóa slider bị lỗi, vui lòng thử lại!"
            ]);
        }
    }
    
}
