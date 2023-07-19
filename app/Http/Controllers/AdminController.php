<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function product(){
        return view('admin.product');
    }

    public function uploadproduct(Request $request){
        $data=new Product();
        $image=$request->file;
         $imagename=time().'.'.$image->getClientOriginalExtension();
        // $request->file('image')->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;

        // $file = $request->image;
        // if ($file) {
        //     $extention = $file->getClientOriginalExtension();
        //     $fileName = time() . rand(1, 999999) . '.' . $extention;
        //     $file->move('images', $fileName);
        //     $path = '/images/' . $fileName;
        // } else {
        //     $path = null;
        // }


        // $data->image = $path;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->quantity=$request->quantity;
        $data->save();
        return redirect()->back()->with('message','product added succesfully');
    }

    public function showproduct(){
        $data=Product::all();
        return view('admin.showproduct',compact('data'));
    }
    public function deleteproduct($id){

        $data=Product::find($id);
        if($data!=null){
        $data->delete();
        return redirect()->back()->with('message','product deleted ');
        }
        else{
            return redirect()->back()->with('message','eRROR deleted ');
        }

    }
    public function updateview($id){
        $data=Product::find($id);
        return view('admin.updateview',compact('data'));

    }
    public function updateproduct(Request $request,$id)
    {
        $data=Product::find($id);

        $image=$request->file;
        if($image){

     
        $imagename=time().'.'.$image->getClientOriginalExtension();
       // $request->file('image')->getClientOriginalExtension();
       $request->file->move('productimage',$imagename);
       $data->image=$imagename;
    }

    
       $data->title=$request->title;
       $data->price=$request->price;
       $data->description=$request->description;
       $data->quantity=$request->quantity;
       $data->save();
       return redirect()->back()->with('message','product updated succesfully');
    }


    public function showorder(){
        $order=Order::all();
        return view('admin.showorder',compact('order'));
    }
    public function updatestatus($id){
        $order=Order::find($id);
        $order->status='delivered';
        $order->save();

    }
}
