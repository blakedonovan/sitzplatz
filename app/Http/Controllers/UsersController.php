<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Users;
class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $Users;

    public function __construct(Users $Users)
    {
        $this->Users = $Users;
    }

    public function index() {
      
        return response()->json(Users::all());
    }

    public function show($UsersId) {
        
        $Users = $this->Users->find($UsersId);
     
        if (empty($Users)) {
               return "No data found.";
        }
       
        return $Users;
    }
    public function store(Request $request) {
        
       
       

        $Users = $this->Users->create([
            'shortName' => $request->input('shortName'),
            'vn' => $request->input('vn'),
            'nn' => $request->input('nn'),
            'email' => $request->input('email'),
            'passwort' => $request->input('passwort'),
         
        ]); 
        
        return response()->json(Users::all());
    }

    public function update(Request $request, $UsersId) {
       
    
        $Users = $this->Users->find($UsersId);

     
        if (empty($Users)) {
            return "No data found.";
        }

        $Users->update([
            'shortName' => $request->input('shortName'),
            'vn' => $request->input('vn'),
            'nn' => $request->input('nn'),
            'email' => $request->input('email'),
            'passwort' => $request->input('passwort')
        ]);

        return $Users;
    }

    
    public function destroy($UsersId) {
        Users::findOrFail($UsersId)->delete();
        

        if (empty($Users)) {
            return "No data found.";

        }else{

            return response()->json(Users::all());

        }

        
        
    }



}