<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductController extends BackendController
{
    public function index()
    {
        $products = $this->productRepository->all();
        $columns = [
            'ID', 'Tên sản phẩm', 'Giá', 'Giá khuyến mại', 'Ảnh', 'Số lượng', 'Hot', 'Danh mục', 'Active', 'Hành động'
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
    {
        $request->offsetunset('_token');

        // $photos = $request->file('AnhPhu');
        // $paths  = [];

        // foreach ($photos as $photo) {
        //     $extension = $photo->getClientOriginalExtension();
        //     $filename  = 'product-photo-' . time() . '.' . $extension;
        //     $paths[]   = $photo->storeAs('upload', $filename);
        // }

        // dd($paths);


        // $request->merge([
        //     'AnhChinh' => $this->getImage('AnhChinh', 'upload/product', $request),
        //     'AnhPhu'   => json_encode($data), 
        // ]);

        $dataFormRequest = [
            'Id_DanhMucSp' => $request->Id_DanhMucSp,
            'MaSP'         => $request->MaSP,
            'TenSp'        => $request->TenSp,
            'DonGia'       => $request->DonGia,
            'GiaKhuyenMai' => $request->GiaKhuyenMai,
            'SoLuong'      => $request->SoLuong,
            'Sp_Hot'       => $request->Sp_Hot,
            'TrangThai'    => $request->TrangThai,
            'AnhChinh'     => $this->getImage('AnhChinh', 'upload/product', $request),
            'NgayTao'      => Carbon::now()
          ];
          
  
        // insert
          
        try {
            if(Product::create($dataFormRequest)) {
                return redirect()->back()->with('success', 'Thêm mới sản phẩm thành công');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Thêm mới sản phẩm thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $product = $this->productRepository->findById($id);
        $categories = $this->categoryRepository->all();

        return view('backend.product.edit',
            compact('product',
                'categories'
            )
        );
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->productRepository->findById($id);

        $this->validate($request,[
            'TenSp' => 'required|unique:sanpham,TenSp,'.$product->Id_SanPham.',Id_SanPham',
        ],[
            'TenSp.required' => 'Tên sản phẩm không được để trống',
            'TenSp.unique' => 'Sản phẩm đã tồn tại'
        ]);


        $request->offsetunset('_token');

        $data = [
            'Id_DanhMucSp' => $request->Id_DanhMucSp,
            'MaSP'         => $request->MaSP,
            'TenSp'        => $request->TenSp,
            'DonGia'       => $request->DonGia,
            'GiaKhuyenMai' => $request->GiaKhuyenMai,
            'SoLuong'      => $request->SoLuong,
            'Sp_Hot'       => $request->Sp_Hot,
            'TrangThai'    => $request->TrangThai,
            'NgayTao'      => Carbon::now()
        ];

        if ($request->hasFile('AnhChinh')) {
            $data['AnhChinh'] = $this->getImage('AnhChinh', 'upload/product', $request);
        }
        
        // update product
        try {
            if($product->update($data)) {
                return redirect()->route('products.index')->with('success','Sửa thành công');
            }
        } catch (\Exception $e) {
            DB::rollBack();
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

    public static function uploadFile($image, $uploadPath)
    {
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        $image->move($uploadPath, $imageName);
        return '/' . $uploadPath . '/' . $imageName;
    }

    public function getImage($name, $dir, $request)
    {
        if ($request->hasFile($name)) {
            $image = $request->file($name);
            // Upload file
            $uploadPath = $dir;
            $image = self::uploadFile($image, $uploadPath);
            return $image;
        }
        return '';
    }

}