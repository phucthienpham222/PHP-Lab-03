<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "image"=>"tv.jpg", "price"=>"2000"],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "image"=>"iphone.jpeg", "price"=>"1500"],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "image"=>"chromecast.jpeg", "price"=>"300"],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "image"=>"glasses.jpeg", "price"=>"500"],
    ];

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "Danh sách sản phẩm.";
        $viewData["products"] = self::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $product = collect(self::$products)->firstWhere('id', $id);
        $viewData = [];
        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] = $product["name"]." – Thông tin sản phẩm.";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
}
