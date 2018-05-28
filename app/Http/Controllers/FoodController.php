<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Ingridient;
use App\Http\Requests\StoreFoodRequest;
use App\FoodIngridient;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();
		$data = [
			'foods' => $foods,
			'menu_item' => 'foods'
		];
        return view('foods.index', $data);
    }
	
	public function create()
    {    
		$ingridients = Ingridient::all();
		$data = [			
			'menu_item' => 'foods',
			'ingridients' => $ingridients
		];
        return view('foods.create', $data);
    }
	
	public function store(StoreFoodRequest $request)
    {        
        $food = Food::create([
            'title' => $request->title, 
			'description' => $request->description, 
        ]);
        
		if(count($request->ingrient_id_list)){			
            foreach ($request->ingrient_id_list as $idx => $oneIngridientId) {
                $foodIngridient = new FoodIngridient();
                $foodIngridient->food_id = $food->id;
				$foodIngridient->ingridient_id = $oneIngridientId;
                $foodIngridient->ingridient_count = $request->ingridient_count[$idx];
                $foodIngridient->save();
            }
        }
		
        return redirect()->route('food.index');
    }
	
	public function update($id)
    {        
        $food = Food::findOrFail($id);
            
		$ingridientsAll = Ingridient::all();
			
		$ingridients = $food->ingridients()->get();
			
        $data = [
            'menu_item' => 'foods',
            'food' => $food,
			'ingridients' => $ingridientsAll,
			'foodIngridients' => $ingridients,
        ];
        return view('foods.update', $data);
    }
	
	public function updatePost($id, StoreFoodRequest $request)
    {
        $food = Food::findOrFail($id);        

        $food->update([
            'title' => $request->title, 
			'description' => $request->description, 
        ]);
		
		$foodIngridients = $food->ingridients()->getResults();
        foreach ($foodIngridients as $foodIngridient) {
            $foodIngridient->delete();
        }
		
		if(count($request->ingrient_id_list)){			
            foreach ($request->ingrient_id_list as $idx => $oneIngridientId) {
                $foodIngridient = new FoodIngridient();
                $foodIngridient->food_id = $food->id;
				$foodIngridient->ingridient_id = $oneIngridientId;
                $foodIngridient->ingridient_count = $request->ingridient_count[$idx];
                $foodIngridient->save();
            }
        }
		
        return redirect()->route('food.index');
    }
	
	public function delete($id)
    {
        $food = Food::findOrFail($id);
        
        $food->delete();

        return back();
    }
	
	public function show($id)
    {
        $food = Food::findOrFail($id);
		$foodIngridients = $food->ingridients()->getResults();
		
		$data= [
			'menu_item' => 'foods',
            'food' => $food,
			'foodIngridients' => $foodIngridients,
		];
		
        return view('foods.show', $data);
        
    }
	
	public function updateCount(Request $request){
		$fi = FoodIngridient::findOrFail($request->food_ingridient_id);
		$fi->update([
            'ingridient_count' => $request->ingridient_count,
        ]);
	}

}
