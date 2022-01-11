<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;

class CategoryController extends Controller
{
    protected $category;
    protected $product;
    protected $user;

    function __construct()
    {
        $this->category = new Category;
        $this->product = new Product;
        $this->user = new User;
    }

    function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $this->category->name = $request->name;
        $this->category->image = $request->image;
        $this->category->active = $request->active;
        $this->category->created_by=$this->user->userLogin()->id;
        $this->category->updated_by=$this->user->userLogin()->id;

        $this->category->save();
        return redirect()->back();
    }

    function edit(Request $request)
    {
         $this->category->find($request->id)->update([
            'name' => $request->name,
            'image' => $request->image,
            'active' => $request->active,
            'updated_by'=>$this->user->userLogin()->id,
        ]);
        return redirect()->route('adminCategory'); 
    }

    function category()
    {
        return view('admin.category.category', [
            'title' => 'Admin| Danh mục',
            'user'=>$this->user->userLogin(),
            'listCategory' => $this->category->getAll(),

        ]);
    }
    function editCategory($id)
    {
        return view('admin.category.editCategory', [
            'title' => "Admin | Cập nhật danh mục",
            'user'=>$this->user->userLogin(),
            'listCategory' => $this->category->getAll(),
            'category' => $this->category->getCategory($id),
        ]);
    }
    function deletes(Request $request)
    {
        $temp = $this->product->getAllCategoryID($request->id);
        if (count($temp) == 0) {
            $result = $this->category->deletes($request->id);
            if ($result) {
                return response()->json([
                    'error'=> false,
                    'message' => 'Xóa danh mục thành công!'
                ]);
            } else {
                return response()->json([
                    'error'=> true,
                    'message' => 'Xóa danh mục bị lỗi, vui lòng thử lại!'
                ]);
            }
        } else {
            return response()->json([
                'error'=> true,
                'message' => 'Danh mục đang chứa sản phẩm, không thể xóa!'
            ]);
        }
    }
}
