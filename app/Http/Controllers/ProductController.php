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
            'image' => 'required|mimes:jpg,jpeg,png,pdf|max:4096',
            'image' => 'required|max:4096',
            'image.*' => 'image|mimes:png,jpeg,jpg',
            'image' => 'max:4096',
            'image.*' => 'image|mimes:png,jpeg,jpg',
        ]);

        $filename = $req->file('image')->getClientOriginalName();
        $genID = substr(sha1(time()), 0, 9);
        $finalName = $genID . "_" . $filename;

        $product = new Product;
        $product->user_id = Auth::id();
        $product->name = $req->name;
        $product->category_id = $req->category_id;
        $product->price = $req->price;
        $product->sku = $req->sku;
        $product->stock = $req->stock;
        $product->image = $finalName;
        $product->description = $req->description;
        $product->excerpt = $req->excerpt;
        $product->save();
        $req->file('image')->storeAs('public', $finalName);
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
                'image' => 'required|mimes:jpg,jpeg,png,pdf|max:4096',
                'image' => 'required|max:4096',
                'image.*' => 'image|mimes:png,jpeg,jpg',
                'image' => 'max:4096',
                'image.*' => 'image|mimes:png,jpeg,jpg',
            ]);

            $filename = $req->file('image')->getClientOriginalName();
            $genID = substr(sha1(time()), 0, 9);
            $finalName = $genID . "_" . $filename;
            $product->image = $finalName;
            $req->file('image')->storeAs('public', $finalName);
        }
       
        $product->user_id = Auth::id();
        $product->name = $req->name;
        $product->category_id = $req->category_id;
        $product->price = $req->price;
        $product->sku = $req->sku;
        $product->stock = $req->stock;
        $product->description = $req->description;
        $product->excerpt = $req->excerpt;
        $product->save();
        return redirect()->back()->with('msg','Successfully Updated!');
    }

    public function deleteProduct($id){
        Product::find($id)->delete();
        return redirect()->back();
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
