<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Session;

use App\Models\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{

    /**
     * Create instances of the reservation controller
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        parent::init();
        $this->middleware('auth:admin');
    }

    function pageList() {
        $pages = \DB::table('pages')->get();
        return view('dev.Pages.list',['pages'=>$pages]);
    }

    function addPage(Request $request) {
        $requiredFields = array('nav_title','title','action');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request, $requiredFields)) {
                $page = new Page;
                foreach($requiredFields as $field) {
                    $page->{$field} = $request->{$field};
                }
                if ($page->save()) {
                    $request->session()->flash('success_message','Added successfully');
                }
            } else {
                $request->session()->flash('error_message','Kinldy fill all the fields');
            }
        } else {
            foreach($requiredFields as $field) {
                $request->{$field} = '';
            }
        }
        return view('dev.Pages.add',['request'=>$request]);
    }

    function editPage(Request $request, $id) {
        $page = Page::where('id',$id)->first();
        $requiredFields = array('nav_title','title','action');
        if ($request->isMethod('post')) {
            if ($this->validateFields($request, $requiredFields)) {
                foreach($requiredFields as $field) {
                    $page->{$field} = $request->{$field};
                }
                if ($page->save()) {
                    $request->session()->flash('success_message','Updated successfully');
                }
            } else {
                $request->session()->flash('error_message','Kinldy fill all the fields');
            }
        } else {
            foreach($requiredFields as $field) {
                $request->{$field} = $page->{$field};
            }
        }
        return view('dev.Pages.edit',['request'=>$request]);
    }

    function deletePage($id) {
        $pages = \DB::table('pages')->find($id);
        $pages->delete();
        return redirect('dev/pageList');
    }    
}