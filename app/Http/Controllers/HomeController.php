<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Datasheet;
use App\Models\DatasheetTranslation;
use App\Models\Main;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Menu;
use App\Models\PageTranslation;
use App\Models\ProductTranslation;
use App\Models\Settings;
use App\Models\Template;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $meta = $this->meta();
        return view('frontend.index', [
            'showProducts' => true,
            'products' => $this->listProducts(),
            'mains' => $this->listMainPage(),
            'sliders' => $this->listSlider(),
            'menus' => $this->listMenu(),
            'footerMenus' => $this->listFooterMenu(),
            'productCategories' => $this->listProductCategories(),
            'device' => $this->device(),
            'datasheets' => $this->getDatasheets()
        ]);
    }

    public function meta()
    {
        $meta = Settings::find(1);
        $description = $meta->description;
        $keywords = $meta->keywords;

        return [
            'description' => $description,
            'keywords' => $keywords
        ];
    }

    public function device()
    {
        $agent = new Agent();
        return $agent;
    }

    public function listProductCategories()
    {
        $productCategories = Category::orderBy('order')->where('status', 'on')->get();
        return $productCategories;
    }

    public function listProducts()
    {
        $products = Product::orderBy('order')->where('status', 'on')->get();
        return $products;
    }

    public function listMainPage()
    {
        $mains = Main::orderBy('order')->where('status', 'on')->get();
        return $mains;
    }

    public function listSlider()
    {
        $sliders = Slider::orderBy('order')->where('status', 'on')->get();
        return $sliders;
    }

    public function listMenu()
    {
        $menus = Menu::orderBy('order')->where('parent_id', 0)->where('status', 'on')->where('vitrin_status', 'on')->with('getMenu')->get();
        return $menus;
    }

    public function listFooterMenu()
    {
        $menus = Menu::with('getMenu')->where('footer_status', 'on')->get();
        return $menus;
    }

    public function getPage($slug)
    {
        $templates = Template::all();
        $pageData = PageTranslation::where('slug', $slug)->with('page')->first();
        if ($pageData) {
            $template = Template::where('id', $pageData['page']->template_id)->first();
            return view('frontend.other', ['menus' => $this->listMenu(), 'footerMenus' => $this->listFooterMenu(), 'productCategories' => $this->listProductCategories(),'datasheets' => $this->getDatasheets()])->with('pageData', $pageData)->with('template', $template)->with('templates', $templates);
        } else {
            return redirect()->route('getSite');
        }
    }

    public function getProductListByCategory($slug)
    {
        $categories = CategoryTranslation::where('slug', $slug)->with('categories')->get();
        $products = [];
        foreach ($categories as $category) {
            $products = Product::where('category_id', $category->category_id)->get();
        }
        return view('frontend.pages.product.product-list-by-category', ['menus' => $this->listMenu(), 'footerMenus' => $this->listFooterMenu(), 'productCategories' => $this->listProductCategories()])->with('categories', $categories)->with('products', $products);
    }

    public function getProduct($slug)
    {
        $product = ProductTranslation::where('slug', $slug)->with('product')->first();
        if ($product) {
            return view('frontend.pages.product.product', ['menus' => $this->listMenu(), 'footerMenus' => $this->listFooterMenu(), 'productCategories' => $this->listProductCategories()])->with('product', $product);
        } else {
            return redirect()->route('getSite');
        }
    }

    public function getDatasheets()
    {
        $datasheets = DatasheetTranslation::with('datasheets')->get();
        return $datasheets;
    }
}
