<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Tile;



class TilesController extends Controller
{
    public function index()
    {
        $page_title = 'Tiles List';
        $empty_message = 'No tile available.';
        $tiles = Tile::latest()->paginate(config('constants.table.default'));
        return view('admin.tiles.list', compact('page_title', 'empty_message', 'tiles'));
    }

    public function create()
    {
        $page_title = 'Create Tile';
        return view('admin.tiles.create', compact('page_title'));
    }

    public function edit($id)
    {
        $method = Tile::where('id', $id)->firstOrFail();
        $page_title = 'Update Tile: '.$method->name;

        return view('admin.tiles.edit', compact('page_title', 'method'));
    }

    public function store(Request $request)
    {
        $validation_rule = [
            'name'           => 'required|max: 60',
            'image'          => 'image',
            'image'          => [new FileTypeValidate(['jpeg', 'jpg', 'png'])],
            'price'          => 'required',
            'description'    => 'required|max:64000',
        ];

        $request->validate($validation_rule, [], ['ud.*' => 'All user data']);

        $filename = '';
        if ($request->hasFile('image')) {
            try {
                $filename = upload_image($request->image, config('constants.deposit.gateway.path'), config('constants.deposit.gateway.size'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $tile = Tile::create([

            'name' => $request->name,
            'price' => $request->price,
            'image' => $filename,

            'description' => $request->description,
        ]);

        $notify[] = ['success', $tile->name . ' Tile has been added.'];
        return back()->withNotify($notify);
    }

    public function update(Request $request, $id)
    {
        $validation_rule = [
            'name'           => 'required|max: 60',
            'image'          => 'image',
            'image'          => [new FileTypeValidate(['jpeg', 'jpg', 'png'])],
            'price'          => 'required',
            'description'    => 'required|max:64000',
        ];

        $request->validate($validation_rule, [], ['ud.*' => 'All user data']);
        $method = Tile::where('id', $id)->firstOrFail();

        $filename = $method->image;
        if ($request->hasFile('image')) {
            try {
                $filename = upload_image($request->image, config('constants.deposit.gateway.path'), config('constants.deposit.gateway.size'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $method->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $filename,

            'description' => $request->description,
        ]);

        $notify[] = ['success', $method->name . ' Tile has been updated.'];
        return back()->withNotify($notify);
    }
}
