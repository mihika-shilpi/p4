<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wish;
use App\Writer;
use App\Tag;

class WishController extends Controller
{
    public function index()
    {
        $wishes = Wish::orderBy('updated_at')->get();

        return view('wishes')->with([
            'wishes' => $wishes
            ]);

    }

    /**
     * POST /wishes
     * Process the form for adding a new wish
     */
    public function create(Request $request)
    {
        # Validate the request data
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'string|max:250|nullable',
            'writer' => 'required|alpha_num',
            'tags' => 'string|nullable',
        ]);

        $wish = new wish();
        $wish->title = $request->title;
        $wish->description = $request->description;

        $writer = Writer::where('name', '=', 'writer')->first();
        if ($writer) {
            $wish->writer_id = $writer->id;
        }
        else {
            $newWriter = new Writer();
            $newWriter->name = $request->writer;
            $newWriter->save();
            $wish->writer_id = $newWriter->id;
        }

        $tags = explode(",","$request->tags");
//        dd($tags);

//        foreach ($tags as $thistag) {
//            $tag = Tag::where('name', '=', $thistag)->first();
//            if ($tag) {
//                $wish->tag_id = $tag->id;
//                $wish->tags()->save($tag);
//            }
//            else {
//                $newTag = new Tag();
//                $newTag->name = $thistag;
//                $newTag->save();
//                $wish->tags()->save($newTag);
//            }
//

//            $tag = Tag::where('name', 'LIKE', $tagName)->first();
//
//            # Connect this tag to this wish
//            $wish->tags()->save($tag);


//        }
            #{{ $tag->name }}


        $wish->save();

//        print($wish);
        $submitted = $request->input('submitted', null);

        # Note: Have to sync tags *after* the wish has been saved so there's a wish_id to store in the pivot table


        $wishes = Wish::orderBy('updated_at')->get();


        return redirect('/')->with([
            'wishes' => $wishes,
            'submitted' => $submitted,
            'alert' => 'Your wish was added :)'
        ]);
    }
    /*
    * GET /wishes/{id}/edit
    */
    public function edit($id)
    {
        $wishes = Wish::orderBy('updated_at')->get();
        $thiswish = wish::find($id);
        $tagsForThiswish = $thiswish->tags()->pluck('tags.id')->toArray();

        return view('wishedit')->with([
            'wishes' => $wishes,
            'wish' => $thiswish,
            'tagsForThiswish' => $tagsForThiswish
        ]);
    }
    /*
    * PUT /wishes/{id}
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'string|max:250|nullable',
            'writer' => 'required|alpha_num',
            'tags' => 'string|nullable',
        ]);

        $wish = wish::find($id);

//        $wish->tags()->sync($request->tags);

        $wish->title = $request->title;
        $wish->description = $request->description;

        $writer = Writer::where('name', '=', 'writer')->first();
        if ($writer) {
            $wish->writer_id = $writer->id;
        }
        else {
            $newWriter = new Writer();
            $newWriter->name = $request->writer;
            $newWriter->save();
            $wish->writer_id = $newWriter->id;
        }

        $wish->save();

        return redirect('/')->with([
            'alert' => 'The Wish has been updated!'
        ]);
    }
    /*
    * Actually deletes the wish
    * DELETE /wishes/{id}/delete
    */
    public function delete($id)
    {
        $wish = wish::find($id);
        if (!$wish) {
            return view('wishes')->with('alert', 'Wish not found');
        }
        $wish->tags()->detach();
        $wish->delete();
        return redirect('/');
    }

}
