<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Document;
use App\Auth;
use App\User;
use App\TimeSetting;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $page_title = "My Document";
        $document = Document::all();
        // p($document);
        return view(activeTemplate() . 'user.document.index', compact('page_title','document'));
    }

    
    public function create()
    {
        $page_title = "Create New Document";
        return view(activeTemplate() . 'user.document.create', compact('page_title'));
    }

 
    public function store(Request $request)
    {
        if ($request->hasFile('doc_file')) {
            foreach($request->doc_file as $f){
            try {
                
                $document[] = upload_document($f, config('constants.user.document.path'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'File could not be uploaded.'];
                return back()->withNotify($notify);
            }
            }
        }

        Document::create([
            'user_id'=> auth()->id(),
            'type'=> $request->type,
            'document'=>isset($document)?json_encode($document):''
        ]);
        $notify[] = ['success', 'Create Successfully'];
        return back()->withNotify($notify);

    }


    // public function edit($id)
    // {
    //     $page_title = "Update Plan";
    //     $document = Document::whereId($id)->first();
    //     return view(activeTemplate() . 'user.document.edit', compact('page_title','document'));
    // }

  
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'document' => 'required',
    //     ]);
        
        
        
    //     $document = Document::whereid($id)->first();
       
         
    //     if ($request->hasFile('doc_file')) {
    //          foreach($request->doc_file as $f){
    //         try {
    //             $old = $document['document'] ?: null;
    //             $document[] = upload_document($f, config('constants.user.document.path'),'',$old);
    //         } catch (\Exception $exp) {
    //             $notify[] = ['error', 'File could not be uploaded.'];
    //             return back()->withNotify($notify);
    //         }
    //          }
    //     }
      
    //     if(isset($document)){
    //         $data['document']=json_encode($document);
    //     }
    //     Document::whereId($id)->update($data);
    //     $notify[] = ['success', 'Update Successfully'];
    //     return back()->withNotify($notify);

    // }

}
