<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        return view('backend.products.products')->with('products', $products);
    }

    public function getProduct($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('frontend.pages.product.product')->with('product',$product)->with('categories',$categories);
    }

    public function getProductAdd()
    {
        $categories = Category::all();
        return view('backend.products.product-add')->with('categories',$categories);
    }

    public function postProductAdd(Request $request, Product $productData)
    {
        try {
            $trSlug = Str::slug($request->trName, '-');
            $enSlug = Str::slug($request->enName, '-');
            $deSlug = Str::slug($request->deName, '-');

            $request->merge(['trUrl' => $trSlug]);
            $request->merge(['enUrl' => $enSlug]);
            $request->merge(['deUrl' => $deSlug]);

            $imageName1 = "";
            $imageName2 = "";
            $imageName3 = "";

            if ($request->image1) {
                $imageName1 = $request->image1->getClientOriginalName();

                $request->image1->move(public_path('img/products'), $imageName1);
            }

            if ($request->image2) {
                $imageName2 = $request->image2->getClientOriginalName();

                $request->image2->move(public_path('img/products'), $imageName2);
            }

            if ($request->image3) {
                $imageName3 = $request->image3->getClientOriginalName();

                $request->image3->move(public_path('img/products'), $imageName3);
            }
            $productData = [
                'code' => $request->productCode,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'image1' =>  $imageName1,
                'image2' =>  $imageName2,
                'image3' =>  $imageName3,
                'tr' => ['name' => $request->trName, 'slug' => $request->trUrl, 'title' => $request->trTitle, 'brief' => $request->trBrief, 'keywords' => $request->trKeywords, 'description' => $request->trDescription, 'content' => $request->trContent],
                'en' => ['name' => $request->enName, 'slug' => $request->enUrl, 'title' => $request->enTitle, 'brief' => $request->enBrief, 'keywords' => $request->enKeywords, 'description' => $request->enDescription, 'content' => $request->enContent],
                'de' => ['name' => $request->deName, 'slug' => $request->deUrl, 'title' => $request->deTitle, 'brief' => $request->deBrief, 'keywords' => $request->deKeywords, 'description' => $request->deDescription, 'content' => $request->deContent],
            ];

            Product::create($productData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Ürün Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Ürün Eklenemedi Hata: ' . $e]);
        }
    }

    public function getProductEdit(Product $product,$id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $productTr = $product->translate('tr');
        $productEn = $product->translate('en');
        $productDe = $product->translate('de');
        return view('backend.products.product-edit')->with('productTr', $productTr)->with('productEn', $productEn)->with('productDe', $productDe)->with('product',$product)->with('categories',$categories);
    }

    public function postProductEdit(Request $request, Product $productData, $id)
    {
        try {
            $trSlug = Str::slug($request->trName, '-');
            $enSlug = Str::slug($request->enName, '-');
            $deSlug = Str::slug($request->deName, '-');

            $request->merge(['trUrl' => $trSlug]);
            $request->merge(['enUrl' => $enSlug]);
            $request->merge(['deUrl' => $deSlug]);

            
            $product=Product::findOrFail($id);
            
            $imageName1 = $product->image1;
            $imageName2 = $product->image2;
            $imageName3 = $product->image3;

            if ($request->image1&&$request->image1!=$product->image1) {
                $imageName1 = $request->image1->getClientOriginalName();
                File::delete(public_path('img/products/'.$product->image1));    
                $request->image1->move(public_path('img/products'), $imageName1);
            }

            if ($request->image2&&$request->image2!=$product->image2) {
                $imageName2 = $request->image2->getClientOriginalName();
                File::delete(public_path('img/products/'.$product->image1));    
                $request->image2->move(public_path('img/products/'), $imageName2);
            }

            if ($request->image3&&$request->image3!=$product->image3) {
                $imageName3 = $request->image3->getClientOriginalName();
                File::delete(public_path('img/products/'.$product->image3));    
                $request->image3->move(public_path('img/products/'), $imageName3);
            }

            $productData = [
                'code' => $request->productCode,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'image1' =>  $imageName1,
                'image2' =>  $imageName2,
                'image3' =>  $imageName3,
                'tr' => ['name' => $request->trName, 'slug' => $request->trUrl, 'title' => $request->trTitle, 'brief' => $request->trBrief, 'keywords' => $request->trKeywords, 'description' => $request->trDescription, 'content' => $request->trContent],
                'en' => ['name' => $request->enName, 'slug' => $request->enUrl, 'title' => $request->enTitle, 'brief' => $request->enBrief, 'keywords' => $request->enKeywords, 'description' => $request->enDescription, 'content' => $request->enContent],
                'de' => ['name' => $request->deName, 'slug' => $request->deUrl, 'title' => $request->deTitle, 'brief' => $request->deBrief, 'keywords' => $request->deKeywords, 'description' => $request->deDescription, 'content' => $request->deContent],
            ];

            $product->update($productData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Ürün Güncellendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Ürün Güncellenemedi ' . $e]);
        }
    }
}
