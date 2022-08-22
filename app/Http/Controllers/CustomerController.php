<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /*
     * index
     */
    public function index(){
        $data=Customer::latest()->get();
        return view('customer.index',[
            'all_customer' => $data
            ]);
    }
    /*
     * create
     */
    public function create(){
        return view('customer.create');
    }
    /*
     * store
     */

    public function store(Request $request){

        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required | unique:customers',
            'cell'=> 'required | unique:customers',

        ],[
            'name.required' =>'নামের ঘর পূরন করুন',
            'email.required' =>'ইমেইলের ঘর পূরন করুন',
            'email.unique' =>'আপনার ইমেইল কেউ নিয়ে নিছে',
            'cell.required' =>'ফোন নাম্বারের ঘর পূরন করুন',
            'cell.unique' =>'আপনার ফোন নাম্বার কেউ নিয়ে নিছে',


        ]);

        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $unique_file=md5(time().rand()). '.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/photo'),$unique_file);

        }


      Customer::create([
          'name' =>$request->name,
          'email' =>$request->email,
          'cell' =>$request->cell,
          'username' =>$request->uname,
          'password' =>password_hash($request->pass,PASSWORD_DEFAULT),
           'age' => $request->age,
           'photo' => $unique_file,
      ]);
        return redirect()->back()->with('success','customer added successful !');
    }
    /*
     * show
     */
    public function show($id){
       $data= Customer::find($id);
        return view('customer.show',[
            'single_c' =>$data
        ]);
    }
    /*
     * delete
     */
    public function delete($id){
        $delete_data=Customer::find($id);
        $delete_data->delete();

        unlink('assets/photo/'. $delete_data->photo);

        return redirect()->back()->with('success','customer deleted successful !');
    }
    /*
     * edit
     */
    public function edit($id){
        $data=Customer::find($id);
        return view('customer.edit',[
            'edit_data'=>$data
            ]);
    }
    /*
     * update
     */
    public function update(Request $request,$id){
        $unique_file='';
        if($request->hasFile('new_photo')){
            $file=$request->file('new_photo');
            $unique_file=md5(time().rand()). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('assets/photo'),$unique_file);

            if(file_exists('assets/photo/' . $request->old_photo)){
                unlink('assets/photo/' . $request->old_photo);
            }
            else{
                $unique_file=$request->old_photo;
            }
        }
        $update= Customer::find($id);
        $update->name=$request->name;
        $update->email=$request->email;
        $update->cell=$request->cell;
        $update->username=$request->uname;
        $update->age=$request->age;
        $update->photo=$unique_file;
        $update->update();
        return redirect()->back()->with('success','customer updated successful !');
    }

}
