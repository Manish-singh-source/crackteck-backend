<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Categorie;
use App\Models\ParentCategorie;
use App\Models\SubCategorie;
=======
use App\Models\User;
>>>>>>> 04484d88166d540bbe563a08b982f98211f3f972
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
<<<<<<< HEAD
        $validator = Validator::make($request->all(), [
            'parent_categories' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $parentCategorie = new ParentCategorie();
        $parentCategorie->parent_categories = $request->parent_categories;
        $parentCategorie->status = $request->status;
        $parentCategorie->save();

        if (!$parentCategorie) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('category.index')->with('success', 'Parent Categorie added successfully.');
=======
        $users = User::all();
    
        // dd($users);
        return view('/e-commerce/categories/create');
>>>>>>> 04484d88166d540bbe563a08b982f98211f3f972
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
        $categorie = Categorie::find($id);
        return view('/e-commerce/categories/edit', compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'parent_category' => 'required',
            'sub_category' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $categorie = Categorie::findOrFail($id);
        $categorie->parent_category = $request->parent_category;
        $categorie->sub_category = $request->sub_category;

        if ($request->hasFile('feature_image')) {

            // Only if updating profile 
            if ($categorie->feature_image != '') {
                if (File::exists(public_path($categorie->feature_image))) {
                    File::delete(public_path($categorie->feature_image));
                }
            }
            // updating profile end

            $file = $request->file('feature_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // dd($filename);

            $file->move(public_path('uploads/crm/categorie/feature_image'), $filename);
            $categorie->feature_image = 'uploads/crm/categorie/feature_image/' . $filename;
        }

        if ($request->hasFile('icon_image')) {

            // Only if updating profile 
            if ($categorie->icon_image != '') {
                if (File::exists(public_path($categorie->icon_image))) {
                    File::delete(public_path($categorie->icon_image));
                }
            }
            // updating profile end

            $file = $request->file('icon_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // dd($filename);

            $file->move(public_path('uploads/crm/categorie/icon_image'), $filename);
            $categorie->icon_image = 'uploads/crm/categorie/icon_image/' . $filename;
        }

        $categorie->status = $request->status;
        $categorie->save();

        return redirect()->route('category.index')->with('success', 'Categorie updated successfully.');
    }
}
