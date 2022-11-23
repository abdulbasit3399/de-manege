<?php

namespace App\Http\Controllers\Admin;

use App\Frontend;
use App\GeneralSetting;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;

class FrontendController extends Controller
{


    public function templates()
    {
        $page_title = 'Templates';
        $temPaths = array_filter(glob('core/resources/views/templates/*'), 'is_dir');
        $i = 0;
        foreach ($temPaths as $temp) {
            $arr = explode('/', $temp);
            $tempname = end($arr);
            $templates[$i]['name'] = $tempname;
            $templates[$i]['image'] = asset($temp) . '/preview.jpg';
            $i++;
        }
        $extra_templates = json_decode(getTemplates(), true);
        return view('admin.frontend.templates', compact('page_title', 'templates', 'extra_templates'));

    }

    public function templatesActive(Request $request)
    {
        $general = GeneralSetting::first();

        $general->active_template=  $request->name;
        $general->save();

        $notify[] = ['success', 'Updated Successfully'];
        return back()->withNotify($notify);
    }


    public function frontendSections($key)
    {
        $section = getPageSections()->$key;
        $content = Frontend::where('data_keys', $key . '.content')->latest()->first();
        $elements = Frontend::where('data_keys', $key . '.element')->latest()->get();
        $page_title = $section->name ;
        $empty_message = 'No item create yet.';
        return view('admin.frontend.index', compact('section', 'content', 'elements', 'key', 'page_title', 'empty_message'));
    }

    public function remove(Request $request)
    {
        $request->validate(['id' => 'required']);
        $frontend = Frontend::findOrFail($request->id);
        if (isset($frontend->value->image)) {
            remove_file(config('constants.frontend.' . $frontend->key . '.path') . '/' . $frontend->value->image);
        }
        $frontend->delete();
        $notify[] = ['success', 'Content has been removed.'];
        return back()->withNotify($notify);
    }


    protected function store_image($key, $type, $image, $old_image = null)
    {

        $path = 'assets/images/frontend/' . $key;
        if ($type == 'element') {
            $section = getPageSections()->$key;
            $size = @$section->element->image_property->size;
            $thumb = @$section->element->image_property->thumb;
        } elseif ($type == 'content') {
            $section = getPageSections()->$key;
            $size = @$section->content->image_property->size;
            $thumb = @$section->content->image_property->thumb;
        } else {
            $path = config('constants.' . $key . '.path');
            $size = config('constants.' . $key . '.size');
            $thumb = config('constants.' . $key . '.thumb');
        }

        return upload_image($image, $path, $size, $old_image, $thumb);
    }


    public function frontendElement($key, $id = null)
    {
        $section = getPageSections()->$key;
        unset($section->element->modal);
        $page_title = $section->name . ' Items';
        if ($id) {
            $data = Frontend::findOrFail($id);
            return view('admin.frontend.element', compact('section', 'key', 'page_title', 'data'));
        }
        return view('admin.frontend.element', compact('section', 'key', 'page_title'));
    }


    public function frontendContent(Request $request, $key)
    {
        $validation_rule = [];
        foreach ($request->except('_token', 'video') as $input_field => $val) {
            if ($input_field == 'image_input' && !isset($validation_rule['image_input'])) {
                $validation_rule['image_input'] = ['nullable', 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])];
                continue;
            }
            $validation_rule[$input_field] = 'required';
        }

        $request->validate($validation_rule, [], ['image_input' => 'image']);

        if ($request->id) {
            $content = Frontend::findOrFail($request->id);
        } else {
            $content = Frontend::where('data_keys', $key . '.' . $request->type)->first();
            if (!$content || $request->type == 'element') {
                $content = Frontend::create(['data_keys' => $key . '.' . $request->type]);
            }
        }


        if ($request->hasFile('image_input')) {
            try {
                $request->merge(['image' => $this->store_image($key, $request->type, $request->image_input, @$content->data_values->image
                )]);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Could not upload the Image.'];
                return back()->withNotify($notify);
            }
        } else if (isset($content->data_values->image)) {
            $request->merge(['image' => $content->data_values->image]);
        }

        $content->update(['data_values' => $request->except('_token', 'image_input', 'key', 'status', 'type')]);
        $notify[] = ['success', 'Content has been updated.'];
        return back()->withNotify($notify);
    }



    public function managePages()
    {
        //// HOME PAGE

        $count = Page::where('tempname',activeTemplate())->where('slug','home')->count();
        if($count == 0){
            $in['tempname'] = activeTemplate();
            $in['name'] = 'HOME';
            $in['slug'] = 'home';
            Page::create($in);
        }

        $pdata = Page::where('tempname',activeTemplate())->get();
        $page_title = 'Manage Section';
        $empty_message = 'No Page Created Yet';

        return view('admin.frontend.builder.pages', compact('page_title','pdata','empty_message'));
    }

    public function managePagesSave(Request $request){

        $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|min:3',
        ]);

        $exist = Page::where('tempname', activeTemplate())->where('slug', str_slug($request->slug))->count();
        if($exist != 0){
            $notify[] = ['error', 'This Page Already Exist on your Current Template. Please Change the Slug.'];
            return back()->withNotify($notify);
        }

        $in['tempname'] = activeTemplate();
        $in['name'] = $request->name;
        $in['slug'] = str_slug($request->slug);

        Page::create($in);
        $notify[] = ['success', 'Save Successfully'];
        return back()->withNotify($notify);

    }

    public function managePagesUpdate(Request $request){

        $page = Page::where('id',$request->id)->first();


        $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|min:3|unique:pages,slug,'.$page->id,
        ]);



        $page->name = $request->name;
        $page->slug = str_slug($request->slug);
        $page->save();


        $notify[] = ['success', 'Update Successfully'];
        return back()->withNotify($notify);

    }

    public function managePagesDelete(Request $request){
        $page = Page::where('id',$request->id)->first();
        $page->delete();

        $notify[] = ['success', 'Delete Successfully'];
        return back()->withNotify($notify);
    }



    public function manageSection($id)
    {
        $pdata = Page::findOrFail($id);
        $page_title = 'Manage Section of '.$pdata->name;
        $sections =  getPageSections(true);
        ksort($sections);
        return view('admin.frontend.builder.index', compact('page_title','pdata','sections'));
    }



    public function manageSectionUpdate($id, Request $request)
    {
        $request->validate([
            'secs' => 'required',
        ],[
            'secs.required' => 'Page should Contain Minimum One Section'
        ]);

        $page = Page::findOrFail($id);
        $page->secs = json_encode($request->secs);
        $page->save();
        $notify[] = ['success', 'Update Successfully'];
        return back()->withNotify($notify);

    }



    public function seoEdit()
    {
        $page_title = 'SEO Configuration';
        $seo = Frontend::where('data_keys', 'seo.data')->first();
        return view('admin.frontend.seo', compact('page_title', 'seo'));
    }


}
