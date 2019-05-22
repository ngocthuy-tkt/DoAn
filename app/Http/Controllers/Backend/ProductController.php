<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;

class ProductController extends BackendController
{
    public function index()
    {
        $products = $this->productRepository->all();
        $columns = [
            'ID', 'Tên sản phẩm', 'Giá', 'Giá khuyến mại', 'Ảnh', 'Số lượng', 'Hot', 'Danh mục', 'Tác giả', 'Active', 'Hành động'
        ];
        return view('backend.product.index', compact('products', 'columns'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();
        // $authors = $this->authorRepository->all();
        // $pubs = $this->publishingHouseRepository->all();
        return view('backend.product.add', compact('categories'));
    }

    public function store(ProductRequest $request)
    {dd($request->all());
        $request->offsetunset('_token');
        $imgName = '';
        if ($request->hasFile('AnhChinh')) {
            $image = $request->file('AnhChinh');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('product')->put($imgName, file_get_contents($image));
        }

        $request->merge([
            'AnhChinh' => $imgName,
        ]);

        if (Product::create($request->all())) {
            return redirect()->back()->with('success', 'Thêm mới sản phẩm thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm mới sản phẩm thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $product = $this->productRepository->findById($id);
        $categories = $this->categoryRepository->all();
        $authors = $this->authorRepository->all();
        $pubs = $this->publishingHouseRepository->all();

        return view('backend.product.edit',
            compact('product',
                'categories',
                'authors',
                'pubs'
            )
        );
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->productRepository->findById($id);

        $this->validate($request,[
            'name' => 'required|unique:products,name,'.$product->id.',id',
            'slug' => 'required|unique:products,slug,'.$product->id.',id',
        ],[
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Sản phẩm đã tồn tại',
            'slug.required' => 'Đường dẫn không được để trống',
            'slug.unique' => 'Đường dẫn đã tồn tại',
        ]);


        $request->offsetunset('_token');
        if($request->hasFile('upload_product')){
            Storage::disk('product')->delete($product->image);
            $image      = $request->file('upload_product');
            $imgName   = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('product')->put($imgName,file_get_contents($image));

            $product->image = $imgName;
        }

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->author_id = $request->author_id;
        $product->publishing_house_id = $request->publishing_house_id;
        $product->active = $request->active;
        $product->hot = $request->hot;
        $check = $product->save();
        if ($check){
            return redirect()->route('products.index')->with('success','Sửa thành công');
        }
        else{
            return redirect()->back()->with('error','Sửa thất bại, vui lòng thử lại');
        }
    }

    public function destroy($id)
    {
        $product = $this->productRepository->findById($id);

        if ($product->delete()) {
            Storage::disk('product')->delete($product->image);
            return redirect()->back()->with('success','Xóa thành công');
        }
        else {
            return redirect()->back()->with('error','Xóa không thành công');
        }
    }
}
