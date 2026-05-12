<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display the store homepage.
     */
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)->latest()->take(8)->get();
        $categories = Category::take(3)->get();
        
        return view('store.home', compact('featuredProducts', 'categories'));
    }

    /**
     * Display the full product catalog.
     */
    public function catalogo(Request $request)
    {
        $query = Product::where('is_active', true);

        // Search logic
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Simple filtering by category if provided
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->with('category')->latest()->paginate(12);
        $categories = Category::all();

        return view('store.catalogo', compact('products', 'categories'));
    }

    /**
     * Display the categories list.
     */
    public function categorias()
    {
        $categories = Category::withCount('products')->get();
        return view('store.categorias', compact('categories'));
    }

    /**
     * Display products of a specific category.
     */
    public function categoria(Category $category)
    {
        $products = $category->products()->where('is_active', true)->latest()->paginate(12);
        $categories = Category::all(); // For the sidebar

        return view('store.catalogo', [
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $category
        ]);
    }

    /**
     * Display products in offer.
     */
    public function ofertas()
    {
        // For now, let's just pick products with stock < 10 as "offers" or just random
        $products = Product::where('is_active', true)->where('stock', '<', 15)->latest()->paginate(12);
        $categories = Category::all();

        return view('store.catalogo', [
            'products' => $products,
            'categories' => $categories,
            'title' => 'Ofertas Exclusivas'
        ]);
    }

    /**
     * Display the product details.
     */
    public function detalle(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('store.detalle', compact('product', 'relatedProducts'));
    }

    /**
     * Display the checkout page.
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('carrito')->with('warning', 'Tu carrito está vacío.');
        }

        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('store.checkout', compact('cart', 'total'));
    }

    /**
     * Display the user profile.
     */
    public function perfil()
    {
        $user = Auth::user();
        // Mocking some orders for the view
        $orders = []; 
        
        return view('store.perfil', compact('user', 'orders'));
    }
}
