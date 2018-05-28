<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingridient;
use App\Http\Requests\StoreIngridientRequest;

class IngridientController extends Controller
{
    public function index()
    {
        $ingridients = Ingridient::all();
		$data = [
			'ingridients' => $ingridients,
			'menu_item' => 'ingridients'
		];
        return view('ingridients.index', $data);
    }
	
	public function create()
    {        
		$data = [			
			'menu_item' => 'ingridients'
		];
        return view('ingridients.create', $data);
    }
	
	public function store(StoreIngridientRequest $request)
    {        
        $ingridient = Ingridient::create([
            'title' => $request->title,            
        ]);
        
        return redirect()->route('ingridient.index');
    }
	
	public function update($id)
    {        
        $ingridient = Ingridient::findOrFail($id);
            
        $data = [
            'menu_item' => 'ingridients',
            'ingridient' => $ingridient,
        ];

        return view('ingridients.update', $data);
    }
	
	public function updatePost($id, StoreIngridientRequest $request)
    {
        $ingridient = Ingridient::findOrFail($id);        

        $ingridient->update([
            'title' => $request->title,            
        ]);
		
        return redirect()->route('ingridient.index');
    }
	
	public function delete($id)
    {
        $ingridient = Ingridient::findOrFail($id);
        
        $ingridient->delete();

        return back();
    }

}
