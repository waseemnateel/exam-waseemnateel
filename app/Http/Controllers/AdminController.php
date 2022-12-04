<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $admins = Admin::orderBy('id' , 'desc')->paginate(10);
        // $this->authorize('viewAny' , Admin::class);

        return response()->view('cms.admin.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::where('guard_name' , 'admin')->get(); // , compact('roles')
        // $this->authorize('create' , Admin::class);

        return response()->view('cms.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(),[
            // 'image'=>"required|image|max:2048|mimes:png,jpg,jpeg,pdf",

        ] , [

        ]);

        if(! $validator->fails()){
        $admins = new Admin();
        $admins->email = $request->get('email');
        $admins->password = Hash::make($request->get('password'));

        $isSaved = $admins->save();

        if($isSaved){

        // $roles = Role::find($request->get('role_id'));
        // $admins->assignRole($roles->name);




        $isSaved = $admins->save();
        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' =>'Created is Successfully'] , 200);
        }
        else{
            return response()->json(['icon' => 'error' , 'title' =>'Created is Failed'] , 400);

        }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        // $this->authorize('update' , Admin::class);
        return response()->view('cms.admin.edit' , compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(),[
            'password' => 'nullable',
            // 'image'=>"required|image|max:2048|mimes:png,jpg,jpeg,pdf",

            ] , [

            ]);

            if(! $validator->fails()){
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            $isUpdate = $admins->save();

            if($isUpdate){





            return ['redirect' =>route('admins.index')];

            if($isUpdate){
                return response()->json(['icon' => 'success' , 'title' =>'Updated is Successfully'] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' =>'Updated is Failed'] , 400);

            }
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

            }
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->authorize('destroy' , Admin::class);
        $admins = Admin::destroy($id);

    }
}
