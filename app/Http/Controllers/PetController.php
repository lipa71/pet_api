<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetController extends Controller
{
    private $apiUrl = 'https://petstore.swagger.io/v2/pet';

    public function index()
    {
        $response = Http::get($this->apiUrl . '/findByStatus', ['status' => 'available']);

        if ($response->successful()) {
            $pets = $response->json();
        } else {
            $pets = [];
        }

        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($this->apiUrl, [
            'id' => rand(1000000, 9999999),
            'name' => $request->name,
            'status' => $request->status,
            'photoUrls' => ['https://example.com/photo.jpg'],
            'category' => ['id' => 1, 'name' => 'dogs']
        ]);

        if ($response->successful()) {
            return redirect('/')->with('success', 'Pet added successfully');
        }

        return back()->withErrors(['error' => $response->json()['message'] ?? 'Failed to add pet']);
    }

    public function edit($id)
    {
        $response = Http::get($this->apiUrl . "/{$id}");

        if ($response->successful()) {
            $pet = $response->json();
            return view('pets.edit', compact('pet'));
        }

        return redirect('/')->withErrors(['error' => 'Pet not found']);
    }

    public function update(Request $request, $id)
    {
        $response = Http::put($this->apiUrl, [
            'id' => (int)$id,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        if ($response->successful()) {
            return redirect('/')->with('success', 'Pet updated');
        }

        return back()->withErrors(['error' => 'Failed to update pet']);
    }

    public function delete($id)
    {
        $response = Http::delete($this->apiUrl . "/{$id}");

        if ($response->successful()) {
            return redirect('/')->with('success', 'Pet deleted');
        }

        return back()->withErrors(['error' => 'Failed to delete pet']);
    }
}
