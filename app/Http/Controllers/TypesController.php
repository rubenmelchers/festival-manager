<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Type;

class TypesController extends Controller
{

    public function index() {

        $types = Type::latest()->get();

        $name = 'test';

        return view('types.index', compact('types', 'name'));

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
}