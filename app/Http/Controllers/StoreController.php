<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $stores = Store::paginate(3);
            return view('index_store', ['stores' => $stores]);
        } else {
            return redirect('login')->with('error', 'You need to log in to access this page.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = ['Moka', 'Port Louis', 'Flacq', 'Curepipe', 'Black River', 'Savanne', 'Grand Port', 'Riviere du Rempart', 'Pamplemousses', 'Mahebourg', 'Plaines Wilhems'];
        return view('create_store', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'phone_no' => 'required|max:255',
            'street' => 'required|max:255',
            'city' => 'required|max:255',
            'districts' => 'required|in:Moka,Port Louis,Flacq,Curepipe,Black River,Savanne,Grand Port,Riviere du Rempart,Pamplemousses,Mahebourg,Plaines Wilhems',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        if ($request->filled(['latitude', 'longitude'])) {
            $storeData['coordinate'] = [
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ];
        }

        Store::create($storeData);

        return redirect('/stores')->with('success', 'Store has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $store = Store::with('products')->findOrFail($id); // Fetch the store with related products
        return view('show_store', ['store' => $store]); // Pass the store variable
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $store = Store::findOrFail($id);
        $districts = ['Moka', 'Port Louis', 'Flacq', 'Curepipe', 'Black River', 'Savanne', 'Grand Port', 'Riviere du Rempart', 'Pamplemousses', 'Mahebourg', 'Plaines Wilhems'];
        return view('edit_store', compact('store', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'phone_no' => 'required|max:255',
            'street' => 'required|max:255',
            'city' => 'required|max:255',
            'districts' => 'required|in:Moka,Port Louis,Flacq,Curepipe,Black River,Savanne,Grand Port,Riviere du Rempart,Pamplemousses,Mahebourg,Plaines Wilhems',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Update other fields except coordinates
        $store = Store::findOrFail($id);
        $store->phone_no = $updateData['phone_no'];
        $store->street = $updateData['street'];
        $store->city = $updateData['city'];
        $store->districts = $updateData['districts'];
        $store->save();  // Save these changes first

        // Check if latitude and longitude are provided, and then update the coordinates separately
        if ($request->filled(['latitude', 'longitude'])) {
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');

            // Use a raw query to update the POINT field
            DB::table('stores')
                ->where('store_id', $id)
                ->update([
                    'coordinate' => DB::raw("ST_GeomFromText('POINT($longitude $latitude)')")
                ]);
        }

        return redirect('/stores')->with('success', 'Store details have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = Store::findOrFail($id);

        // Check if the store has associated products
        if ($store->products()->count() > 0) {
            // Return a friendly message instead of an error
            return redirect('/stores')->with('error', 'Cannot delete store because it has associated products.');
        }

        // Proceed with deleting the store if there are no associated products
        $store->delete();

        return redirect('/stores')->with('success', value: "{$store->city} has been deleted");
    }
}
