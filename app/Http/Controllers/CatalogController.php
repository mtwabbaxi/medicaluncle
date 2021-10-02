<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Catalog;
use Auth;

class CatalogController extends Controller
{
    public function catalogs() {
        $catalogs = Catalog::where('user_id',Auth::id())->get();
        return view('seller.catalogs.index',compact('catalogs'));
    }

    public function add() {
        $categories = Category::where('user_id',Auth::id())->get();
        return view('seller.catalogs.add', compact('categories'));
    }

    public function insert(Request $req) {
        $this->validate($req, [
            'image' => 'required|mimes:jpg,jpeg,png|max:4096',
            'pdf' => 'required|mimes:pdf|max:4096',
        ]);

        $image = $req->file('image')->getClientOriginalName();
        $pdf = $req->file('pdf')->getClientOriginalName();
        $genID = substr(sha1(time()), 0, 9);
        $imageFinalName = $genID . "_" . $image;
        $pdfFinalName = $genID . "_" . $pdf;

        $catalog = new Catalog;
        $catalog->name = $req->name;
        $catalog->user_id = Auth::id();
        $catalog->category_id = $req->category_id;
        $catalog->excerpt = $req->excerpt;
        $catalog->image = $imageFinalName;
        $catalog->pdf = $pdfFinalName;

        $req->file('image')->storeAs('public', $imageFinalName);
        $req->file('pdf')->storeAs('public/catalogs', $pdfFinalName);

        $catalog->save();
        return redirect()->back()->with('msg','Successfully Added!');
    }

    public function delete($id){
        Catalog::find($id)->delete();
        return redirect()->back()->with('msg','Successfully Deleted');
    }
}
