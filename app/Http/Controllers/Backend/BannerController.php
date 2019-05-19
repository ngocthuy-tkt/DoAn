<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends BackendController
{
    public function index()
    {
        $banners = $this->bannerRepository->all();
        $columns = [
            'ID', 'Title', 'Slug', 'Image', 'Link', 'Active', 'Hành động'
        ];
        return view('backend.banner.index', compact('banners', 'columns'));
    }

    public function create()
    {
        return view('backend.banner.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|unique:banners,title',
            'slug' => 'required|min:5|unique:banners,slug',
            'upload_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'title.unique' => 'Tiêu đề banner đã tồn tại',
            'slug.required' => 'Slug không được để trống',
            'slug.unique' => 'Slug đã tồn tại',
            'upload_avatar.image' => 'File phải là ảnh',
            'upload_avatar.max' => 'Dung lượng file quá lớn'
        ]);

        $request->offsetunset('_token');
        $imgName = '';
        if ($request->hasFile('upload_avatar')) {
            $image = $request->file('upload_avatar');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('user')->put($imgName, file_get_contents($image));
        }

        $request->merge([
            'image' => $imgName,
        ]);

        if (Banner::create($request->all())) {
            return redirect()->back()->with('success', 'Thêm mới tác giả dùng thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm mới thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $ban = $this->bannerRepository->findById($id);
        return view('backend.banner.edit', compact('ban'));
    }

    public function update(Request $request, $id)
    {
        $ban = $this->bannerRepository->findById($id);
        $this->validate($request, [
            'title' => 'required|min:5|unique:banners,title,' . $ban->id . ',id',
            'slug' => 'required|min:5|unique:banners,slug,' . $ban->id . ',id',
            'upload_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'title.unique' => 'Tiêu đề banner đã tồn tại',
            'slug.required' => 'Slug không được để trống',
            'slug.unique' => 'Slug đã tồn tại',
            'upload_avatar.image' => 'File phải là ảnh',
            'upload_avatar.max' => 'Dung lượng file quá lớn'
        ]);
        $request->offsetunset('_token');
        if ($request->hasFile('upload_avatar')) {
            Storage::disk('user')->delete($ban->image);
            $image = $request->file('upload_avatar');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('user')->put($imgName, file_get_contents($image));

            $ban->image = $imgName;
        }

        $ban->title = $request->title;
        $ban->slug = $request->slug;
        $ban->link = $request->link;
        $ban->active = $request->active;
        $check = $ban->save();
        if ($check) {
            return redirect()->route('banner.index')->with('success', 'Sửa thông tin tác giả thành công');
        } else {
            return redirect()->back()->with('error', 'Sửa thất bại, vui lòng thử lại');
        }
    }

    public function destroy($id)
    {
        $ban = $this->bannerRepository->findById($id);
        if (!$ban) {
            return redirect()->back();
        }
        if ($ban->delete()) {
            Storage::disk('user')->delete($ban->image);
            return redirect()->back()->with('success','Xóa thành công');
        }
        else {
            return redirect()->back()->with('error','Xóa không thành công');
        }
    }
}
