<?php

namespace App\Http\Controllers;

use App\Models\ContentDetail;
use App\Models\Promotion;
use App\Models\Video;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{
    // Menampilkan daftar semua konten
    public function index()
{
    $content = Content::paginate(10); // Use paginate instead of get()
    return view('content.index', compact('content'));
}

    public function show($contentId)
    {
        $content = Content::with('contentDetails.videos')->findOrFail($contentId);
        return view('content.show', compact('content'));
    }

    public function create()
    {
        return view('content.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:100',
        'description' => 'required|string',
        'url_video' => 'required|url',
        'price' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category' => 'nullable|string|max:100',
    ]);

    $imgName = null;

    // Menangani upload gambar
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imgName); // Simpan ke folder 'public/images'
    }

    // Menyimpan data ke dalam database
    $createContent = Content::create([
        'user_id' => Auth::user()->id,
        'title' => $request->title,
        'description' => $request->description,
        'url_video' => $request->url_video,
        'price' => $request->price,
        'image_url' => $imgName ? 'images/' . $imgName : null, // Simpan path relatif ke gambar
        'category' => $request->category,
    ]);

    return redirect()->route('admin.content.index')->with('success', 'Content added successfully.');
}


public function update(Request $request, $id)
{
    // Validasi data input
    $request->validate([
        'title' => 'required|string|max:100',
        'description' => 'required|string',
        'url_video' => 'required|url',
        'price' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category' => 'nullable|string|max:100',
    ]);

    // Temukan konten berdasarkan ID
    $content = Content::findOrFail($id);

    // Cek jika ada upload gambar baru
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($content->image_url) {
            Storage::delete('public/' . basename($content->image_url));
        }

        // Simpan gambar baru
        $image = $request->file('image');
        $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('images', $imgName, 'public');
        $content->image_url = Storage::url($imagePath); // Simpan URL gambar
    }

    // Update data konten
    $content->title = $request->input('title');
    $content->description = $request->input('description');
    $content->url_video = $request->input('url_video');
    $content->price = $request->input('price', null);
    $content->category = $request->input('category');

    $content->save(); // Simpan perubahan ke database

    return redirect()->route('admin.content.index')->with('success', 'Content updated successfully.');
}


    public function destroy($id)
    {
        // Mencari konten berdasarkan ID
        $content = Content::findOrFail($id);

        // Menghapus gambar dari storage jika ada
        if ($content->image_url) {
            Storage::delete('public/' . $content->image_url);
        }

        // Menghapus konten dari database
        $content->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.content.index')->with('success', 'Content deleted successfully');
    }


        // Menambahkan video ke content detail tertentu
    public function addVideoToDetail(Request $request, $contentDetailId)
    {
        $contentDetail = ContentDetail::findOrFail($contentDetailId);
        $video = Video::findOrFail($request->video_id);

        $contentDetail->videos()->attach($video->id, ['watched' => $request->watched]);

        return redirect()->back()->with('success', 'Video successfully added to content detail.');
    }

    // Menghapus video dari content detail tertentu
    public function removeVideoFromDetail($contentDetailId, $videoId)
    {
        $contentDetail = ContentDetail::findOrFail($contentDetailId);
        $contentDetail->videos()->detach($videoId);

        return redirect()->back()->with('success', 'Video successfully removed from content detail.');
    }

    public function addPromotion(Request $request, $contentId)
    {
        $request->validate([
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'token' => 'required|string|unique:promotions,token',
            'valid_for_course' => 'required|boolean',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Promotion::create([
            'content_id' => $contentId,
            'discount_percentage' => $request->discount_percentage,
            'token' => $request->token,
            'valid_for_course' => $request->valid_for_course,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->back()->with('success', 'Promotion added successfully.');
    }

    public function applyPromotion(Request $request, $contentId)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $promotion = Promotion::where('content_id', $contentId)
                                ->where('token', $request->token)
                                ->first();

        if ($promotion && $promotion->isValid($request->token, $contentId)) {
            // Lakukan logika untuk menerapkan diskon pada konten
            return redirect()->back()->with('success', 'Promotion applied successfully.');
        }

        return redirect()->back()->with('error', 'Invalid token or promotion not valid for this content.');
    }

}
