<?php

namespace App\Services;

use App\Helper\UploadHelper;
use App\Models\Admin;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class BlogService
{



    protected $blog;
    public function __construct(Blog $blog)
    {

        $this->blog = $blog;
    }

    public function getAll(Request $request)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';
        $blogs = $this->blog::with('admin')
            ->where(function ($query) use ($request) {
                return $query->when($request->search, function ($q) use ($request) {
                    return $q->where('title_ar', 'like', '%' . $request->search . '%')
                        ->orWhere('title_en', 'like', '%' . $request->search . '%');
                });
            })

            ->when($deleted, function ($q) use ($deleted) {
                return $q->onlyTrashed();
            })
            ->when($request->from, function ($q) use ($request) {
                return $q->whereDate('created_at', '>=', $request->from);
            })
            ->when($request->to, function ($q) use ($request) {
                return $q->whereDate('created_at', '<=', $request->to);
            })

            ->where(function ($query) use ($request, $status) {
                return $query->when($status, function ($q) use ($request) {
                    return $q->whereStatus($request->status);
                });
            })
            ->orderBy('created_at', $order)
            ->paginate($limit)
            ->withQueryString();


        return $blogs;
    }

    public function store(Request $request)
    {


        $data = $request->only([
            'title_ar' ,
            'title_en' ,
            'desc_ar' ,
            'desc_en',
            'status',
            'image',
        ]);
        $data['admin_id'] = Auth::guard('admin')->id();


        $blog = $this->blog::create($data);
        if ($request->hasFile('image')) {
            $imageName = UploadHelper::upload('blogs_images', $request->file('image'), config('imageDimensions.blogs.width'), config('imageDimensions.blogs.height'));

            $blog->image = $imageName;
        }
        $blog->save();
        return true;
    }


    public function update(Request $request, Blog $blog)
    {


        $data = $request->only([
            'title_ar',
            'title_en',
            'desc_ar',
            'desc_en',
            'status',
            'image',
        ]);

        $blog->update($data);

        if ($request->hasFile('image')) {

            if (File::exists(public_path('uploads/blogs_images/' . $blog->image))) {

                Storage::disk('public_uploads')->delete('blogs_images/' . $blog->image);
            }
            $imageName = UploadHelper::upload('blogs_images', $request->file('image'), config('imageDimensions.blogs.width'), config('imageDimensions.blogs.height'));

            $blog->image = $imageName;
        }
        $blog->save();

        return $blog ? true : false;
    }

    public function getById(int $id)
    {
        return  $this->blog::withTrashed()->find($id);
    }



    public function getActiveBlogs()
    {
        return  $this->blog::whereStatus(1)->get();
    }
}