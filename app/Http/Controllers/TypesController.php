<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Type;
use Illuminate\Support\Facades\Auth;


class TypesController extends Controller
{

    public function index(Type $type) {

        $festivals = $type->festivals;

        return view('festivals.index', compact('festivals'));

    }

    public function show(Type $type) {


        return view('types.show', compact('type'));

    }

    public function create() {

        return view('types.create');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'active' => 'required'
        ]);

        Type::create([
            'name' => request('name'),
            'active' => (int) request('active')
        ]);

        session()->flash('message', 'You have created festival: "' . request('name') . '"');


        if(Auth::check() && Auth::user()->isAdmin()) {
            return redirect('admin');

        }

        return redirect('/types');
    }

    public function update($id) {

        //get filled out form fields and handle empty fields

        if(count(request('name'))) {
            $name = request('name');
        }
        else {
            $name = Type::where('id', $id)->pluck('name')->first();
        }

        if(count(request('active'))) {
            $active = (int) request('active');
        } else {
            $active = Type::where('id', $id)->pluck('active')->first();
        }

        $type = Type::find($id);

        $type->name = $name;
        $type->active = $active;
        $type->save();

        return redirect('admin');
    }

    public function delete($id) {

        $type = Type::find($id);
        session()->flash('message', 'You have deleted type: "' . $type->name . '"');
        $type->delete();


        return redirect('admin');
    }

}
