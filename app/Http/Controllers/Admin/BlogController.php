<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class BlogController extends Controller
{
    protected $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
        $this->middleware(['permission:blogs-read'])->only(['index']);
        $this->middleware(['permission:blogs-create'])->only(['create', 'store']);
        $this->middleware(['permission:blogs-update'])->only(['update', 'edit']);
        $this->middleware(['permission:blogs-delete'])->only(['destroy']);
    }



    public function index(Request $request)
    {


        $blogs = $this->blogService->getAll($request);



        // return $countries;
        return \view('admin.blog.index', \compact('blogs'));
    }

    public function create(Request $request)
    {


        return \view('admin.blog.create');
    }


    // public function export()
    // {
    //     ob_end_clean();
    //     ob_start();
    //     return Excel::download(new CountryExport,  Carbon::now() . '-countries.xlsx');
    // }



    public function store(Request $request)

    {


        $request->validate([
            'title_ar' => ['required', 'string', 'min:2'],
            'title_en' => ['required', 'string', 'min:2'],
            'desc_ar' => ['required', 'string', 'min:2'],
            'desc_en' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'image' => ['required', 'image', 'max:10240'],
        ]);



        $created = $this->blogService->store($request);

        if ($created) {
            $request->session()->flash('success', 'Blog Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }


    public function edit(Request $request, $id)
    {

        $blog = $this->blogService->getById($id);
        if (!$blog) {
            $request->session()->flash('failed', 'Blog Not Found');
            return redirect()->back();
        }


        return \view('admin.blog.edit', \compact('blog'));
    }


    public function update(Request $request, $id)
    {
        $blog = $this->blogService->getById($id);
        if (!$blog) {
            $request->session()->flash('failed', 'Blog Not Found');
            return redirect()->back();
        }
        $request->validate([
            'title_ar' => ['required', 'string', 'min:2'],
            'title_en' => ['required', 'string', 'min:2'],
            'desc_ar' => ['required', 'string', 'min:2'],
            'desc_en' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'image' => ['required', 'image', 'max:10240'],
        ]);

        $updated = $this->blogService->update($request, $blog);

        if ($updated) {
            $request->session()->flash('success', 'Blog Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $blog = $this->blogService->getById($id);
        if (!$blog) {
            $request->session()->flash('failed', 'Blog Not Found');
            return redirect()->back();
        }
        $blog->delete();
        $request->session()->flash('success', 'Blog Deleted SuccessFully');


        return redirect()->back();
    }


    public function restore(Request $request, $id)
    {
        $blog = $this->blogService->getById($id);
        if (!$blog) {
            $request->session()->flash('failed', 'Blog Not Found');
            return redirect()->back();
        }
        $blog->restore();
        $request->session()->flash('success', 'Blog Restored SuccessFully');

        return redirect()->back();
    }
}