<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\ParentCategorie;
use App\Models\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    //
    public function index()
    {
        // $categorie = Categorie::all();
        $parentCategorie = ParentCategorie::all();
        return view('/e-commerce/categories/index', compact('parentCategorie'));
    }

    // public function create()
    // {
    //     return view('/e-commerce/categories/create');
    // }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'parent_category' => 'required',
    //         'sub_category' => 'required',
    //         'feature_image' => 'required',
    //         'icon_image' => 'required',
    //         'status' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }

    //     $categorie = new Categorie();
    //     $categorie->parent_category = $request->parent_category;
    //     $categorie->sub_category = $request->sub_category;

    //     if ($request->hasFile('feature_image')) {
    //         $file = $request->file('feature_image');
    //         $filename = time() . '.' . $file->getClientOriginalExtension();

    //         $file->move(public_path('uploads/crm/categorie/feature_image'), $filename);
    //         $categorie->feature_image = 'uploads/crm/categorie/feature_image/' . $filename;
    //     }

    //     if ($request->hasFile('icon_image')) {
    //         $file = $request->file('icon_image');
    //         $filename = time() . '.' . $file->getClientOriginalExtension();

    //         $file->move(public_path('uploads/crm/categorie/icon_image'), $filename);
    //         $categorie->icon_image = 'uploads/crm/categorie/icon_image/' . $filename;
    //     }

    //     $categorie->status = $request->status;
    //     $categorie->save();


    //     if (!$categorie) {
    //         return back()->with('error', 'Something went wrong.');
    //     }
    //     return redirect()->route('category.index')->with('success', 'Categorie added successfully.');
    // }

    public function storeParent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_categories' => 'required|string|max:255',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_status_ecommerce' => 'boolean',
            'url' => 'required|string|max:255',
            'status' => 'required|string',
            'sort_order' => 'integer|min:0|unique:parent_categories,sort_order',
        ], [
            'sort_order.unique' => 'This sort order value already exists. Please provide a unique value.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $parentCategorie = new ParentCategorie();
        $parentCategorie->parent_categories = $request->parent_categories;
        $parentCategorie->category_status_ecommerce = $request->has('category_status_ecommerce') ? true : false;
        $parentCategorie->url = $request->url;
        $parentCategorie->status = $request->status;
        $parentCategorie->sort_order = $request->sort_order ?? 0;

        // Handle category image upload
        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $filename = time() . '_category.' . $file->getClientOriginalExtension();

            // Create directory if it doesn't exist
            $uploadPath = public_path('uploads/e-commerce/categories');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);
            $parentCategorie->category_image = 'uploads/e-commerce/categories/' . $filename;
        }

        $parentCategorie->save();

        if (!$parentCategorie) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('category.index')->with('success', 'Parent Category added successfully.');
    }

    public function storeSubCategorie(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_category_id' => 'required',
            'sub_categorie' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $subCategorie = new SubCategorie();
        $subCategorie->parent_category_id = $request->parent_category_id;
        $subCategorie->sub_categorie = $request->sub_categorie;

        if ($request->hasFile('feature_image')) {
            $file = $request->file('feature_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/crm/categorie/feature_image'), $filename);
            $subCategorie->feature_image = 'uploads/crm/categorie/feature_image/' . $filename;
        }

        if ($request->hasFile('icon_image')) {
            $file = $request->file('icon_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/crm/categorie/icon_image'), $filename);
            $subCategorie->icon_image = 'uploads/crm/categorie/icon_image/' . $filename;
        }

        $subCategorie->save();

        if (!$subCategorie) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('category.index')->with('success', 'Sub Categorie added successfully.');
    }

    public function parentCategorie($id)
    {
        $parentCategorie = ParentCategorie::findOrFail($id);
        $subCategorie = SubCategorie::where('parent_category_id', $id)->get();
        return view('/e-commerce/categories/view', compact('parentCategorie', 'subCategorie'));
    }

    public function getSubcategories(Request $request)
    {
        $parentId = $request->parent_category_id;

        $subcategories = SubCategorie::where('parent_id', $parentId)
            ->pluck('name', 'id'); // returns [id => name]

        return response()->json($subcategories);
    }

    public function delete($id)
    {
        $parentCategorie = ParentCategorie::findOrFail($id);
        $parentCategorie->delete();

        return redirect()->route('category.index')->with('success', 'Categorie deleted successfully.');
    }

    public function edit($id)
    {
        $parentCategorie = ParentCategorie::findOrFail($id);
        $subCategories = SubCategorie::where('parent_category_id', $id)->get();
        return view('/e-commerce/categories/edit', compact('parentCategorie', 'subCategories'));
    }

    public function editChild($id)
    {
        $subCategorie = SubCategorie::findOrFail($id);
        $parentCategories = ParentCategorie::where('status', 'Active')->get();
        return view('/e-commerce/categories/edit-child', compact('subCategorie', 'parentCategories'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'parent_categories' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_status_ecommerce' => 'boolean',
            'url' => 'required|string|max:255',
            'status' => 'required|string',
            'sort_order' => 'integer|min:0|unique:parent_categories,sort_order,' . $id,
        ], [
            'sort_order.unique' => 'Sort order value already exists.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $parentCategorie = ParentCategorie::findOrFail($id);
        $parentCategorie->parent_categories = $request->parent_categories;
        $parentCategorie->category_status_ecommerce = $request->has('category_status_ecommerce') ? true : false;
        $parentCategorie->url = $request->url;
        $parentCategorie->status = $request->status;
        $parentCategorie->sort_order = $request->sort_order ?? 0;

        // Handle category image upload
        if ($request->hasFile('category_image')) {
            // Delete old image if exists
            if ($parentCategorie->category_image && File::exists(public_path($parentCategorie->category_image))) {
                File::delete(public_path($parentCategorie->category_image));
            }

            $file = $request->file('category_image');
            $filename = time() . '_category.' . $file->getClientOriginalExtension();

            // Create directory if it doesn't exist
            $uploadPath = public_path('uploads/e-commerce/categories');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);
            $parentCategorie->category_image = 'uploads/e-commerce/categories/' . $filename;
        }

        $parentCategorie->save();

        return redirect()->route('category.index')->with('success', 'Parent Category updated successfully.');
    }

    public function updateChild(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'parent_category_id' => 'required|exists:parent_categories,id',
            'sub_categorie' => 'required|string|max:255',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $subCategorie = SubCategorie::findOrFail($id);
        $subCategorie->parent_category_id = $request->parent_category_id;
        $subCategorie->sub_categorie = $request->sub_categorie;

        // Handle feature image upload
        if ($request->hasFile('feature_image')) {
            // Delete old image if exists
            if ($subCategorie->feature_image && File::exists(public_path($subCategorie->feature_image))) {
                File::delete(public_path($subCategorie->feature_image));
            }

            $file = $request->file('feature_image');
            $filename = time() . '_feature.' . $file->getClientOriginalExtension();

            $uploadPath = public_path('uploads/crm/categorie/feature_image');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);
            $subCategorie->feature_image = 'uploads/crm/categorie/feature_image/' . $filename;
        }

        // Handle icon image upload
        if ($request->hasFile('icon_image')) {
            // Delete old image if exists
            if ($subCategorie->icon_image && File::exists(public_path($subCategorie->icon_image))) {
                File::delete(public_path($subCategorie->icon_image));
            }

            $file = $request->file('icon_image');
            $filename = time() . '_icon.' . $file->getClientOriginalExtension();

            $uploadPath = public_path('uploads/crm/categorie/icon_image');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);
            $subCategorie->icon_image = 'uploads/crm/categorie/icon_image/' . $filename;
        }

        $subCategorie->save();

        return redirect()->back()->with('success', 'Sub Category updated successfully.');
    }

    public function destroyChild($id)
    {
        $subCategorie = SubCategorie::findOrFail($id);

        // Delete associated images
        if ($subCategorie->feature_image && File::exists(public_path($subCategorie->feature_image))) {
            File::delete(public_path($subCategorie->feature_image));
        }
        if ($subCategorie->icon_image && File::exists(public_path($subCategorie->icon_image))) {
            File::delete(public_path($subCategorie->icon_image));
        }

        $subCategorie->delete();

        return redirect()->back()->with('success', 'Sub Category deleted successfully.');
    }

    public function updateOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'required|array',
            'categories.*.id' => 'required|exists:parent_categories,id',
            'categories.*.sort_order' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            foreach ($request->categories as $categoryData) {
                ParentCategorie::where('id', $categoryData['id'])
                    ->update(['sort_order' => $categoryData['sort_order']]);
            }

            return response()->json(['success' => true, 'message' => 'Category order updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update category order.'], 500);
        }
    }

    /**
     * Get child category data for AJAX requests
     */
    public function getChildCategoryData($id)
    {
        try {
            $subCategorie = SubCategorie::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $subCategorie->id,
                    'sub_categorie' => $subCategorie->sub_categorie,
                    'parent_category_id' => $subCategorie->parent_category_id,
                    'feature_image' => $subCategorie->feature_image,
                    'icon_image' => $subCategorie->icon_image,
                    'feature_image_url' => $subCategorie->feature_image ? asset($subCategorie->feature_image) : null,
                    'icon_image_url' => $subCategorie->icon_image ? asset($subCategorie->icon_image) : null,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Child category not found.'
            ], 404);
        }
    }

    public function checkSortOrderUnique(Request $request)
    {
        $sortOrder = $request->input('sort_order');
        $id = $request->input('id');

        $exists = ParentCategorie::where('sort_order', $sortOrder)
            ->where('id', '!=', $id)
            ->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }
}
