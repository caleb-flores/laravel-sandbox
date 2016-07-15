<?php namespace App\Modules\Products\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\ProductService;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller {
	
	private  $productRepository;
	private $service;
	public function __construct(ProductService $service,ProductRepository $productRepository)
	{
		$this->productRepository = $productRepository;
		$this->service = $service;
		$this->middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->productRepository->all();
		
		return view("Products::index",compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("Products::create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$result = $this->service->addNewProduct(1,$request->all());
		if($result['success']){
			return redirect("/Products");
		}
		return redirect()->back()->withErrors($result['errors'])->withInput($request->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$product = $this->productRepository->find($id);
		return view('Products::show',compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$product = $this->productRepository->find($id);
		return view('Products::edit',compact('product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$this->productRepository->delete($id);

		return redirect("/Products");
	}

}
