<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Categorie;
use App\Models\ParentCategorie;
use App\Models\SubCategorie;
use App\Models\Warehouse;
use App\Models\WarehouseRack;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    //
    public function index()
    {
        return view('/warehouse/product-list/index');
    }

    public function create()
    {
        $warehouse = Warehouse::pluck('warehouse_name', 'id');
        $warehouseRack = WarehouseRack::pluck('rack_name', 'id');
        $zoneAreas = WarehouseRack::pluck('zone_area', 'id');
        $rackNo = WarehouseRack::pluck('rack_no', 'id');
        $levelNo = WarehouseRack::pluck('level_no', 'id');
        $positionNo = WarehouseRack::pluck('position_no', 'id');
        return view('/warehouse/product-list/create', compact('warehouse','warehouseRack','zoneAreas','rackNo','levelNo','positionNo'));
    }

    public function view()
    {
        return view('/warehouse/product-list/view');
    }

    public function edit()
    {
        return view('/warehouse/product-list/edit');
    }

    public function scrapItems()
    {
        return view('/warehouse/product-list/scrap-items');
    }

    public function ec_index()
    {
        return view('/e-commerce/products/index');
    }

    public function ec_create()
    {
        $brand = Brand::pluck('brand_title', 'id');
        $parentCategorie = ParentCategorie::pluck('parent_categories', 'id');
        $subcategorie = SubCategorie::pluck('sub_categorie', 'id');
        return view('/e-commerce/products/create', compact('brand', 'parentCategorie', 'subcategorie'));
    }

    public function ec_view()
    {
        return view('/e-commerce/products/view');
    }

    public function ec_edit()
    {
        return view('/e-commerce/products/edit');
    }

    public function ec_scrapItems()
    {
        return view('/e-commerce/products/scrap-items');
    }
    
}
