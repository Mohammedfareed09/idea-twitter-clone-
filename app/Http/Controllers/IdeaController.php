<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {

        $validated = request()->validate([
            'content' => 'required|min:5|max:240',
        ]);

        $validated['user_id'] = auth()->id();
        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created!');
    }



    public function destroy(Idea $idea)
    {
        if(auth()->id() !== $idea->user_id) {
            abort(404,'this is not yours');
        }
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }

    public function show(Idea $idea)
    {
        // return view('idea.show',[
        //     'idea' =>@$idea
        // ]);


        return view('idea.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if(auth()->id() !== $idea->user_id) {
            abort(404,'this is not yours');
        }
        $editing = true;
        return view('idea.show', compact('idea','editing'));
    }
    public function update(Idea $idea)
    {
        if(auth()->id() !== $idea->user_id) {
            abort(404,'this is not yours');
        }
        $validated =  request()->validate([
            'content' => 'required|min:5|max:240',
        ]);

        $idea->update($validated);
        // $idea->content = request()->get('content','');
        // $idea ->save();
        return redirect()->route('dashboard', $idea->id)->with('success','Idea updated successfly');
    }
}
