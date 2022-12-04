<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accounts = account::orderBy('id' , 'desc')->simplePaginate(7);

        // $this->authorize('viewAny' , account::class);

        $accounts = account::orderBy('id' ,'desc');
        if ($request->get('search')) {
            $moduleIndex = account::where('created_at', 'like', '%' . $request->search . '%');
        }

        if ($request->get('name')) {
            $accounts = account::where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('code')) {
            $accounts = account::where('code', 'like', '%' . $request->code . '%');
        }
        if ($request->get('created_at')) {
            $accounts = account::where('created_at', 'like', '%' . $request->created_at . '%');
        }

        $accounts = $accounts->paginate(5);

        return response()->view('cms.accounts.index' , compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.accounts.create');
        // $this->authorize('create' , account::class);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all() , [
            'name' => 'required' ,
            'code' => 'numeric' ,
        ]);

        if(! $validator->fails()){
            $accounts = new account();
            $accounts->name = $request->get('name');
            $accounts->code = $request->get('code');

            $isSaved = $accounts->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => "Created is Successfully"] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "Created is Failed"] , 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
        $accounts = account::find($id);

        return response()->view('cms.accounts.show' , compact('accounts$accounts')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accounts = account::findOrFail($id);
        // $this->authorize('update' , account::class);

        return response()->view('cms.account.edits' , compact('accounts'));
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
        $validator = validator($request->all() , [
            'name' => 'required' ,
            'code' => 'numeric' ,
        ]);

        if(! $validator->fails()){

        $accounts = account::findOrFail($id);
        $accounts->name = $request->get('name');
        $accounts->code = $request->get('code');

        $isUpdate = $accounts->save();

        // return ['redirect' =>route('accounts.index')];


        if($isUpdate){
            return response()->json(['icon' => 'success' , 'title' => 'Updated is Successfully'] , 200);

        }
        else {
            return response()->json(['icon' => 'error' , 'title' => 'Updated is Failed'] , 400);
        }
    }
    else{
        return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
        $accounts = account::destroy($id);
        // return response()->json(['icon' => 'success' , 'title' => 'Deleted is Successfully'] ,200 );
        // $this->authorize('destroy' , account::class);
        return response()->json(['icon' => 'success','title'=>'Deleted is Succesfully'],200);

    }
}
