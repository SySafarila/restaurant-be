<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        $n = 1;

        return view('admin.banners.index', compact('banners', 'n'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image'],
            'description' => ['required', 'string']
        ]);

        $randomString = Str::random(10);
        $imgName = $randomString . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
        $dir = 'public/banners';

        Banner::create([
            'description' => $request->description,
            'image' => $imgName,
            'path' => 'storage/banners/'
        ]);

        $request->file('image')->storeAs($dir, $imgName);

        return redirect()->route('admin.banners.index')->with('status', 'Banner uploaded !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $banner->update([
            'description' => $request->description
        ]);

        if ($request->hasFile('image')) {
            // $image = ProductImage::find($imageId);
            $imgDir = explode('/', $banner->path)[1];
            $storageFullPath = 'public/' . $imgDir . '/' . $banner->image;

            if (Storage::disk('local')->exists($storageFullPath)) {
                Storage::disk('local')->delete($storageFullPath);
            }

            $randomString = Str::random(10);
            $imgName = $randomString . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            $dir = 'public/banners';

            $banner->update([
                'image' => $imgName,
                'path' => 'storage/banners/',
            ]);

            $request->file('image')->storeAs($dir, $imgName);
        }

        return redirect()->route('admin.banners.index')->with('status', 'Banner updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        if (Storage::disk('local')->exists('public/banners/' . $banner->image)) {
            Storage::disk('local')->delete('public/banners/' . $banner->image);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('status', 'Banner deleted !');
    }

    public function massDelete(Request $request)
    {
        $arr = explode(',', $request->ids);

        foreach ($arr as $data) {
            $banner = Banner::findOrFail($data);
            if (Storage::disk('local')->exists('public/banners/' . $banner->image)) {
                Storage::disk('local')->delete('public/banners/' . $banner->image);
            }
            $banner->delete();
        }

        // Banner::destroy($arr);

        return redirect()->route('admin.banners.index')->with('status', 'Bulk delete success');
    }
}
