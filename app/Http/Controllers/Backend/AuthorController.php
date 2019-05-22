<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends BackendController
{
    public function index()
    {
        $authors = $this->authorRepository->all();
        $columns = [
            'ID', 'Tên tác giả', 'Avatar', 'Số sách có trong shop', 'Active', 'Hành động'
        ];
        return view('backend.author.index', compact('authors', 'columns'));
    }

    public function create()
    {
        return view('backend.author.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|unique:author,name',
            'upload_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Email không được để trống',
            'name.unique' => 'Email đã tồn tại',
            'name.min' => 'Tên quá ngắn',
            'upload_avatar.image' => 'File phải là ảnh',
            'upload_avatar.max' => 'Dung lượng file quá lớn'
        ]);

        $request->offsetunset('_token');
        $imgName = '';
        if ($request->hasFile('upload_avatar')) {
            $image = $request->file('upload_avatar');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('product')->put($imgName, file_get_contents($image));
        }

        $request->merge([
            'avatar' => $imgName,
        ]);

        if (Author::create($request->all())) {
            return redirect()->back()->with('success', 'Thêm mới tác giả dùng thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm mới thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $author = $this->authorRepository->findById($id);
        return view('backend.author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = $this->authorRepository->findById($id);
        $this->validate($request, [
            'name' => 'required|min:5|unique:author,name,' . $author->id . ',id',
            'upload_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Email không được để trống',
            'name.unique' => 'Email đã tồn tại',
            'name.min' => 'Tên quá ngắn',
            'upload_avatar.image' => 'File phải là ảnh',
            'upload_avatar.max' => 'Dung lượng file quá lớn'
        ]);
        $request->offsetunset('_token');
        if ($request->hasFile('upload_avatar')) {
            Storage::disk('user')->delete($author->avatar);
            $image = $request->file('upload_avatar');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('user')->put($imgName, file_get_contents($image));

            $author->avatar = $imgName;
        }

        $author->name = $request->name;
        $author->active = $request->active;
        $check = $author->save();
        if ($check) {
            return redirect()->route('author.index')->with('success', 'Sửa thông tin tác giả thành công');
        } else {
            return redirect()->back()->with('error', 'Sửa thất bại, vui lòng thử lại');
        }
    }

    public function destroy($id)
    {
        $author = $this->authorRepository->findById($id);
        if ($author->product()->count() == 0) {
            if ($author->delete()) {
                Storage::disk('user')->delete($author->avatar);
                return redirect()->back()->with('success', 'Xóa thành công');
            } else {
                return redirect()->back()->with('error', 'Xóa không thành công');
            }
        }
        return redirect()->back()->with('error', 'Xóa thất bại');
    }
}
