<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;


class ProductController extends Controller
{
    protected $product;
    protected $category;
    protected $user;

    function __construct()
    {
        $this->category = new Category();
        $this->product = new Product();
        $this->user = new User;
    }

    function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'price' => 'required',
            'content' => 'required',
            'num' => 'required',
            'image' => 'required',
        ]);
        $this->product->name = $request->name;
        $this->product->category_id = $request->category_id;
        $this->product->content = $request->content;
        $this->product->price = $request->price;
        $this->product->price_sale = $request->price_sale;
        $this->product->num = $request->num;
        $this->product->active = $request->active;
        $this->product->image = $request->image;
        $this->product->array_image = $request->array_image;
        $this->product->created_by=$this->user->userLogin()->id;
        $this->product->updated_by=$this->user->userLogin()->id;
        $this->product->save();
        return redirect()->route('adminListProduct');
    }

    function edit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'price' => 'required',
            'content' => 'required',
            'num' => 'required',
            'image' => 'required',
        ]);
         $this->product->find($request->id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'price' => $request->price,
            'price_sale' => $request->price_sale,
            'num' => $request->num,
            'active' => $request->active,
            'image' => $request->image,
            'array_image' => $request->array_image,
            'updated_by'=>$this->user->userLogin()->id,
        ]);
        return redirect()->route('adminListProduct'); 
    }

    function listProduct()
    {
        $listProduct=Product::paginate(10);
        return view('admin.product.listProduct', [
            'title' => "Admin | Danh sách sản phẩm",
            'user'=>$this->user->userLogin(),
            'listCategory' => $this->category->getActive(),
            'listProduct' => $listProduct,

        ]);
    }

    function addProduct()
    {
        return view('admin.product.addProduct', [
            'title' => "Admin | Thêm sản phẩm",
            'user'=>$this->user->userLogin(),
            'listCategory' => $this->category->getActive(),

        ]);
    }

    function editProduct($id)
    {
        return view('admin.product.editProduct', [
            'title' => "Admin | Cập nhật sản phẩm",
            'user'=>$this->user->userLogin(),
            'listCategory' => $this->category->getActive(),
            'product' => $this->product->getProduct($id),
        ]);
    }

    function deletes(Request $request)
    {
        $id = $request->id;
        $result = $this->product->deletes($id);
        if ($result) {
            return response()->json([
                'error'=> false,
                'message' => "Xóa sản phẩm thành công!"
            ]);
        } else {
            return response()->json([
                'error'=> true,
                'message' => "Xóa sản phẩm bị lỗi, vui lòng thử lại!"
            ]);
        }
    }
}
