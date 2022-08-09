<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Container;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    public function index(){
        $containers = Container::all();
        return view('admin.containers.index', compact('containers'));
    }

    public function saveContainer(Request $request){

        $this->validate($request, array(
            'name' => 'required|max:255|unique:containers|min:5',
            'slug' => 'required|unique:containers',
        ));

        $container = new Container();
        $container->name = $request->input('name');
        $container->slug = $request->input('slug');
        $container->save();
        return redirect('/containers')->with('status', 'Container Added Successfully');
    }

    public function editContainer($slug){
        $container = Container::where('slug', $slug)->first();
        return view('admin.containers.edit', compact('container'));
    }

    public function updateContainer($slug, Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255|unique:containers|min:5',
            'slug' => 'required',
        ));
        $container = Container::where('slug', $slug)->first();
        $container->name = $request->input('name');
        $container->slug = $request->input('slug');
        $container->update();
        return redirect('/containers')->with('status', 'Container Updated Successfully');
    }

    public function deleteContainer($slug){
        $container = Container::where('slug', $slug)->first();
        $container->delete();
        return redirect('/containers')->with('warning', 'Container Deleted Successfully');
    }
}
