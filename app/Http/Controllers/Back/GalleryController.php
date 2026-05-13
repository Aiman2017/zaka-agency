<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function edit()
    {
        $items = GalleryItem::orderBy('sort_order')->orderBy('id')->get();
        $countries = GalleryItem::select('country')->distinct()->orderBy('country')->pluck('country');

        return view('back.gallery.edit', compact('items', 'countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'country'     => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'sort_order'  => 'nullable|integer|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,gif,webp|max:4096',
            'video'       => 'nullable|mimetypes:video/mp4,video/webm,video/ogg,video/quicktime|max:102400',
        ]);

        $request->validate([
            'image' => $request->hasFile('video') ? 'nullable' : 'required|image|mimes:jpeg,png,gif,webp|max:4096',
        ], ['image.required' => 'Please upload an image or a video.']);

        $dir = public_path('uploads/gallery');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file      = $request->file('image');
            $filename  = Str::random(40) . '.' . $file->extension();
            $file->move($dir, $filename);
            $imagePath = 'uploads/gallery/' . $filename;
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $file      = $request->file('video');
            $filename  = Str::random(40) . '.' . $file->extension();
            $file->move($dir, $filename);
            $videoPath = 'uploads/gallery/' . $filename;
        }

        GalleryItem::create([
            'title'       => $request->title,
            'description' => $request->description,
            'country'     => $request->country,
            'image'       => $imagePath,
            'video'       => $videoPath,
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.gallery.edit')->with('success', 'Item added successfully.');
    }

    public function update(Request $request, GalleryItem $galleryItem)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'country'     => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'sort_order'  => 'nullable|integer|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,gif,webp|max:4096',
            'video'       => 'nullable|mimetypes:video/mp4,video/webm,video/ogg,video/quicktime|max:102400',
        ]);

        $dir = public_path('uploads/gallery');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'country'     => $request->country,
            'sort_order'  => $request->sort_order ?? $galleryItem->sort_order,
        ];

        if ($request->hasFile('image')) {
            if ($galleryItem->image && file_exists(public_path($galleryItem->image))) {
                unlink(public_path($galleryItem->image));
            }
            $file          = $request->file('image');
            $filename      = Str::random(40) . '.' . $file->extension();
            $file->move($dir, $filename);
            $data['image'] = 'uploads/gallery/' . $filename;
        }

        if ($request->hasFile('video')) {
            if ($galleryItem->video && file_exists(public_path($galleryItem->video))) {
                unlink(public_path($galleryItem->video));
            }
            $file          = $request->file('video');
            $filename      = Str::random(40) . '.' . $file->extension();
            $file->move($dir, $filename);
            $data['video'] = 'uploads/gallery/' . $filename;
        }

        $galleryItem->update($data);

        return redirect()->route('admin.gallery.edit')->with('success', 'Item updated successfully.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        if ($galleryItem->image && file_exists(public_path($galleryItem->image))) {
            unlink(public_path($galleryItem->image));
        }
        if ($galleryItem->video && file_exists(public_path($galleryItem->video))) {
            unlink(public_path($galleryItem->video));
        }
        $galleryItem->delete();

        return redirect()->route('admin.gallery.edit')->with('success', 'Item deleted successfully.');
    }
}
