<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


        /**
     * search client and return .
     *
     * @return \Illuminate\Http\Response
     */
    public function SearchClientByName(Request $request)
    // {   $output = '';
    //     $name = $request->get('name');
    //      info($request);
    //     if($name)
    //         //$Users = User::where('name', 'LIKE', "%{$name}%")->get();
    //         $users = User::where('name','LIKE','%'.$name.'%')->get();
    //         info($users);
    //     //return dd($branches->stock());
    //     if($users)
    //         foreach($users as $user){
    //             $output .= '<option value="'.$user->id.'">' .$user->id.' - '.$user->name.'</option>';
    //             // $output.= '<option value="'.$employee->id.'">'.$employee->user->name.'</option>';
    //             //$output .=$user->name;
    //         }
    //     echo $output;
    //}

    //function fetch(Request $request)
    {
     if($request->get('name'));
     {
        $name = $request->get('name');
        $users = User::where('name','LIKE','%'.$name.'%')->where('type_id',3)->get();
        if(count($users)){
            $output = '<ul class="dropdown-menu order-dropdown" style="display:block; position:relative">';
            foreach($users as $user)
            {
            $output .= '<li><a href="#"> 000'.$user->id.' - '.$user->name.' </a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }else{
            $output = '';
            echo $output;
        }

    //   echo $output;
     }
    }



}
