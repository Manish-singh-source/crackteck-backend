<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBanner;
use App\Models\ParentCategorie;
use App\Models\ProductDeal;
use App\Models\Collection;
use App\Models\Product;
use App\Models\AMC;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    /**
     * Display the frontend homepage with active banners, categories, deals, and collections
     */
    public function index()
    {
        // Get active banners ordered by sort_order
        $banners = WebsiteBanner::active()->ordered()->get();

        // Get active parent categories for e-commerce display, ordered by sort_order
        $categories = ParentCategorie::active()
            ->ecommerceActive()
            ->ordered()
            ->get();

        // Get active collections with their categories
        $collections = Collection::active()
            ->with('categories')
            ->orderBy('created_at', 'desc')
            ->limit(8) // Limit to 8 collections for homepage display
            ->get();


        // Get active deals that are currently running
        $activeDeals = ProductDeal::with([
                'dealItems.ecommerceProduct.warehouseProduct.brand',
                'dealItems.ecommerceProduct.warehouseProduct'
            ])
            ->where('status', 'active')
            ->where('offer_start_date', '<=', Carbon::now())
            ->where('offer_end_date', '>=', Carbon::now())
            ->orderBy('offer_start_date', 'desc')
            ->get();

        $products = Product::with(['brand', 'parentCategorie', 'subCategorie'])->get();
        // dd($products);  

        return view('frontend.index', compact('banners', 'categories', 'collections', 'activeDeals', 'products'));
    }

    /**
     * Display collection details page with associated products
     */
    public function collectionDetails($id)
    {
        // Get the collection with its categories
        $collection = Collection::active()
            ->with('categories')
            ->findOrFail($id);

        // Get all products that belong to categories in this collection
        $categoryIds = $collection->categories->pluck('id');

        $products = Product::whereIn('parent_category_id', $categoryIds)
            ->where('status', 1) // Only active products
            ->with(['brand', 'parentCategorie', 'subCategorie'])
            ->paginate(20);

        return view('frontend.collection-details', compact('collection', 'products'));
    }

    public function getProduct(Request $request)
    {

        $product = Product::with(['brand', 'parentCategorie', 'subCategorie'])->findOrFail($request->id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Display AMC plans page with active plans grouped by type
     */
    public function amcPlans()
    {
        // Get active AMC plans grouped by plan type
        $monthlyPlans = AMC::where('status', 'Active')
            ->where('plan_type', 'Monthly')
            ->get();

            // dd($monthlyPlans);

        $annualPlans = AMC::where('status', 'Active')
            ->where('plan_type', 'Annually')
            ->get();
            

        return view('frontend.amc', compact('monthlyPlans', 'annualPlans'));
    }

    public function storeContact(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        if (!$contact) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('contact')->with('success', 'Contact added successfully.');
    }
}
