<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\Category;
use App\Models\Contact;
use App\Models\PageMetaDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $metadetails = PageMetaDetails::where('page_name', 'home')->first();
        $products = Product::latest()->take(18)->get(['name', 'slug',  'image', 'stock']);
        return view('frontend.pages.home', compact('products', 'metadetails'));
    }

    public function about_us()
    {
        $metadetails = PageMetaDetails::where('page_name', 'about_us')->first();
        return view('frontend.pages.about-us', compact('metadetails'));
    }


    public function products()
    {
        $products = Product::select('name', 'slug', 'image', 'stock')->get();
        $metadetails = PageMetaDetails::where('page_name', 'products')->first();
        return view('frontend.pages.products', compact('products', 'metadetails'));
    }


    public function product_details($slug)
    {
        $product = product::where('slug', $slug)->first();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();
        $metadetails = $product->metaDetails;
        return view('frontend.pages.product-details', compact('product', 'relatedProducts', 'metadetails'));
    }


    public function products_category($slug)
    {
        $category = Category::where('slug', $slug)->with('products')->firstOrFail();
        $categories = Category::all();
        $metadetails = $category->metaDetails;
        return view('frontend.pages.categories-products', [
            'category' => $category,
            'products' => $category->products,
            'categories' => $categories,
            'metadetails' => $metadetails,
        ]);
    }


    public function contact_us()
    {
        $contact = Contact::first();
        $metadetails = PageMetaDetails::where('page_name', 'contact_us')->first();
        return view('frontend.pages.contact-us', compact('contact', 'metadetails'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        Mail::to('indrareddy85128@gmail.com')->send(new ContactMessageMail($data));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


    public function search(Request $request)
    {
        $query = $request->get('search');
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('cas_number', 'LIKE', "%{$query}%")
            ->orWhere('hsn_code', 'LIKE', "%{$query}%")
            ->take(10)
            ->get();

        return response()->json($products);
    }
}
