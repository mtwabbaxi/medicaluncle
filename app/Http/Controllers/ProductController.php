<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Review;
use Illuminate\Support\Facades\File;
use Auth;

class ProductController extends Controller
{
    public function addCategory() {
        return view('admin.categories.add');
    }

    public function categories(){
        $categories = Category::all();
        return view('admin.categories.categories',compact('categories'));
    }

    public function insertCategory(Request $req) {
        $req->validate([
            'name'=>'required',
        ]);

        $category = new Category;
        $category->name = $req->name;
        $category->user_id = Auth::id();
        $category->save();
        return redirect('admin/products/category')->with('msg','Successfully Added!');
    }

    public function deleteCategory($id){
        Category::find($id)->delete();
        return redirect()->back()->with('msg','Successfully Deleted!');
    }

    public function products() {
        $products = Product::where('user_id',Auth::id())->get();
        return view('seller.products.index', compact('products'));
    }

    public function add() {
        $categories = Category::all();
        return view('seller.products.add',compact('categories'));
    }

    public function insert(Request $req) {

        $req->validate([
            'name'=>'required',
            'price'=>'required',
            'sku'=>'required',
            'category_id'=>'required',
            'stock'=>'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:4096',
            'image' => 'required|max:4096',
            'image.*' => 'image|mimes:png,jpeg,jpg',
            'image' => 'max:4096',
            'image.*' => 'image|mimes:png,jpeg,jpg',
            'image2' => 'mimes:jpg,jpeg,png|max:4096',
            'image3' => 'mimes:jpg,jpeg,png|max:4096',
            'image4' => 'mimes:jpg,jpeg,png|max:4096',
        ]);

        $filename = $req->file('image')->getClientOriginalName();
        $genID = substr(sha1(time()), 0, 9);
        $finalName = $genID . "_" . $filename;

        $finalName2 = null;
        $finalName3 = null;
        $finalName4 = null;

        if($req->file('image2') !=null){
            $filename2 = $req->file('image2')->getClientOriginalName();
            $genID2 = substr(sha1(time()), 0, 9);
            $finalName2 = $genID2 . "_" . $filename2;
        }
        if($req->file('image3') !=null){
            $filename3 = $req->file('image3')->getClientOriginalName();
            $genID3 = substr(sha1(time()), 0, 9);
            $finalName3 = $genID3 . "_" . $filename3;
        }
        if($req->file('image4') !=null){
            $filename4 = $req->file('image4')->getClientOriginalName();
            $genID4 = substr(sha1(time()), 0, 9);
            $finalName4 = $genID4 . "_" . $filename4;
        }

        $product = new Product;
        $product->user_id = Auth::id();
        $product->name = $req->name;
        $product->category_id = $req->category_id;
        $product->price = $req->price;
        $product->sku = $req->sku;
        $product->stock = $req->stock;
        $product->image = $finalName;
        $product->image2 = $finalName2;
        $product->image3 = $finalName3;
        $product->image4 = $finalName4;
        $product->description = $req->description;
        $product->l = $req->l;
        $product->m = $req->m;
        $product->s = $req->s;
        $product->excerpt = $req->excerpt;
        $product->save();
        $req->file('image')->storeAs('public', $finalName);

        if($finalName2 != null){
            $req->file('image2')->storeAs('public', $finalName2);
        }
        if($finalName3 != null){
            $req->file('image3')->storeAs('public', $finalName3);
        }
        if($finalName4 != null){
            $req->file('image4')->storeAs('public', $finalName4);
        }

        return redirect()->back()->with('msg','Successfully Added!');
    }

    public function updateProduct($id){
        $categories = Category::all();
        $product = Product::find($id);
        return view('seller.products.update', compact('product','categories'));
    }

    public function updateInsertProduct(Request $req, $id){
        $product = Product::find($id);
        if($req->image != null) {
            $previous_image = public_path('storage/'.$product->image);
            $img=File::delete($previous_image);
            $req->validate([
                'name'=>'required',
                'price'=>'required',
                'sku'=>'required',
                'category_id'=>'required',
                'stock'=>'required',
                'image' => 'mimes:jpg,jpeg,png,pdf|max:4096',
                'image' => 'max:4096',
                'image.*' => 'image|mimes:png,jpeg,jpg',
                'image' => 'max:4096',
                'image.*' => 'image|mimes:png,jpeg,jpg',
                'image2' => 'mimes:jpg,jpeg,png|max:4096',
                'image3' => 'mimes:jpg,jpeg,png|max:4096',
                'image4' => 'mimes:jpg,jpeg,png|max:4096',
            ]);

            $filename = $req->file('image')->getClientOriginalName();
            $genID = substr(sha1(time()), 0, 9);
            $finalName = $genID . "_" . $filename;
            $product->image = $finalName;
            $req->file('image')->storeAs('public', $finalName);
        }

        if($req->image2 != null) {
            $previous_image = public_path('storage/'.$product->image2);
            $img=File::delete($previous_image);
            $req->validate([
                'image2' => 'mimes:jpg,jpeg,png|max:4096',
            ]);

            $filename = $req->file('image2')->getClientOriginalName();
            $genID = substr(sha1(time()), 0, 9);
            $finalName = $genID . "_" . $filename;
            $product->image2 = $finalName;
            $req->file('image2')->storeAs('public', $finalName);
        }
        if($req->image3 != null) {
            $previous_image = public_path('storage/'.$product->image3);
            $img=File::delete($previous_image);
            $req->validate([
                'image3' => 'mimes:jpg,jpeg,png|max:4096',
            ]);

            $filename = $req->file('image3')->getClientOriginalName();
            $genID = substr(sha1(time()), 0, 9);
            $finalName = $genID . "_" . $filename;
            $product->image3 = $finalName;
            $req->file('image3')->storeAs('public', $finalName);
        }
        if($req->image4 != null) {
            $previous_image = public_path('storage/'.$product->image4);
            $img=File::delete($previous_image);
            $req->validate([
                'image4' => 'mimes:jpg,jpeg,png|max:4096',
            ]);

            $filename = $req->file('image4')->getClientOriginalName();
            $genID = substr(sha1(time()), 0, 9);
            $finalName = $genID . "_" . $filename;
            $product->image4 = $finalName;
            $req->file('image4')->storeAs('public', $finalName);
        }
       
        $product->user_id = Auth::id();
        $product->name = $req->name;
        $product->category_id = $req->category_id;
        $product->price = $req->price;
        $product->sku = $req->sku;
        $product->stock = $req->stock;
        $product->l = $req->l;
        $product->m = $req->m;
        $product->s = $req->s;
        $product->description = $req->description;
        $product->excerpt = $req->excerpt;
        $product->save();
        return redirect()->back()->with('msg','Successfully Updated!');
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        if($product != null){
            if($product->user_id == Auth::id()){
                $product->delete();
                return redirect()->back()->with('msg','Deleted Successfully');
            } else {
                return redirect()->back()->with('msg','you cant have righs to delete');
            }
            
        }
        return redirect()->back()->with('msg','Product not found');
    }

    public function used(){
        return view('seller.products.used');
    }

    public function addUsed(){
        return view('seller.products.used-product');
    }

    public function insertUsed(){
        return view('seller.products.used');
    }

    public function inventory(){
        return view('seller.products.inventory');
    }

    public function productDetail($id){
        $product = Product::find($id);
        $similarProducts = null;
        if($product){

            // rating and Reviews
            $rating = null;
            $rating = Review::where('product_id',$product->id)->where('seller_id',$product->user_id)->avg('rating');
            if ($rating == null) {
                $rating = 0;
            } else {
                $rating = round($rating, 1);
                $pprod = Product::find($product->id);
                $pprod->rating = $rating;
                $pprod->save();
            }

            $reviews = Review::where('product_id',$product->id)->where('seller_id',$product->user_id)->get();
            

            $name = $product->name;
            $names = explode(" ", $name);
            if(count($names) == 2){
                $similarProducts = Product::where('name', 'like', '%' . $names[0] . '%')
                                        ->orWhere('name', 'like', '%' . $names[1] . '%')
                                        ->orWhere('excerpt', 'like', '%' . $names[1] . '%')
                                        ->orWhere('excerpt', 'like', '%' . $names[1] . '%')
                                        ->get();
                return view('buyer.products.detail',compact('product','similarProducts','rating','reviews'));
            }
            if(count($names) == 3){
                $similarProducts = Product::where('name', 'like', '%' . $names[0] . '%')
                                        ->orWhere('name', 'like', '%' . $names[1] . '%')
                                        ->orWhere('name', 'like', '%' . $names[2] . '%')
                                        ->orWhere('excerpt', 'like', '%' . $names[1] . '%')
                                        ->orWhere('excerpt', 'like', '%' . $names[1] . '%')
                                        ->orWhere('excerpt', 'like', '%' . $names[2] . '%')
                                        ->get();
                return view('buyer.products.detail',compact('product','similarProducts','rating','reviews'));
            }
            $similarProducts = Product::where('name', 'like', '%' . $names[0] . '%')->get();
            return view('buyer.products.detail',compact('product','similarProducts','rating','reviews'));
        } else {
            return redirect()->back()->with('msg','Product not found');
        }
    }

    public function b2bproducts(){
        $category = Category::where('name','B2B Products')->first();
        if($category != null){
            $products = Product::where('category_id',$category->id)->get();
            return view('buyer.products.b2b',compact('products'));
        } else {
            return redirect()->back()->with('msg','B2B not found!');
        }
    }
}
