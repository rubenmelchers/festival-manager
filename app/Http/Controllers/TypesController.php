<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Type;

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
            'title' => 'required',
            'description' => 'required'
        ]);

        Type::create([
            'title' => request('title'),
            'description' => request('description')
        ]);

        return redirect('/types');
    }

    public function update($id) {

        //get filled out form fields and handle empty fields

        if(count(request('name'))) {
            $name = request('name');
        }
        else {
            $name = Festival::where('id', $id)->pluck('name')->first();
        }

        if(count(request('active'))) {
            $active = request('active');
        } else {
            $active = Festival::where('id', $id)->pluck('active')->first();
        }

        $type = Type::find($id);

        $type->name = $name;
        $type->active = $type;
        $type->save();

        return redirect('admin');
    }

    public function delete($id) {

        $type = Type::find($id);
        $type->delete();

        return redirect('admin');
    }

}
