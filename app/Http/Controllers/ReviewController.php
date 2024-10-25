<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $review = Review::with(['user', 'content'])->get();
        return view('review.index', compact('review'));
    }

    public function create()
    {
        return view('review.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_id' => 'required|exists:contents,id',
            'rating_value' => 'required|integer|min:1|max:5',
            'description' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'content_id' => $request->content_id,
            'rating_value' => $request->rating_value,
            'description' => $request->description,
        ]);

        return redirect()->route('review.index')->with('success', 'Review berhasil dibuat.');
    }

    public function show(Review $review)
    {
        return view('review.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('review.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'rating_value' => 'required|integer|min:1|max:5',
            'description' => 'required|string|max:1000',
        ]);

        $review->update([
            'rating_value' => $request->rating_value,
            'description' => $request->description,
        ]);

        return redirect()->route('review.index')->with('success', 'Review berhasil diperbarui.');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('review.index')->with('success', 'Review berhasil dihapus.');
    }
}
