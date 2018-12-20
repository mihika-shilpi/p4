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
     * GET /wishes
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



        $wish->save();

//        print($wish);
        $submitted = $request->input('submitted', null);

        # Note: Have to sync tags *after* the wish has been saved so there's a wish_id to store in the pivot table
        $wish->tags()->sync($request->tags);

        $wishes = Wish::orderBy('updated_at')->get();


        return view('wishes')->with([
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
        $wish = wish::find($id);
        $writers = writer::getForDropdown();
        $tags = Tag::getForCheckboxes();
        $tagsForThiswish = $wish->tags()->pluck('tags.id')->toArray();
        if (!$wish) {
            return view('wishes')->with([
                'alert' => 'wish not found.'
            ]);
        }
        return view('wish_edit')->with([
            'wish' => $wish,
            'writers' => $writers,
            'tags' => $tags,
            'tagsForThiswish' => $tagsForThiswish
        ]);
    }
    /*
    * PUT /wishes/{id}
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required | string | max:50',
            'description' => 'string | max:250 | nullable',
            'writer_id' => 'required | alpha_num',
            'tags' => 'string | nullable',
        ]);
        $wish = wish::find($id);
        $wish->tags()->sync($request->tags);
        $wish->title = $request->title;
        $wish->writer_id = $request->writer_id;
        $wish->description = $request->description;
        $wish->save();
        return view('wishes')->with([
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
        return view('wishes')->with('alert', 'We hope you are only deleting a wish if it is offensive or innapropriate. 2019 needs us to respect the wishes of everybody!');
    }

}
