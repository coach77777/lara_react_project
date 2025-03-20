<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function HomeService(){

        $services = Service::latest()->get();
         return view('admin.service.index', compact('services'));
    }

    public function AddService(){
        return view('admin.service.create');
    }

    public function StoreService(Request $request){

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'svg_icon' => 'required|string', // SVG stored as raw text
            'font_icon' => 'nullable|string', // FontAwesome or Boxicons class
            'color' => 'required' // Add validation for color
        ]);

        Service::insert([
            'title' => $request->title,
            'description' => $request->description,
            'svg_icon' => $request->svg_icon, // Store SVG as text
            'font_icon' => $request->font_icon, // Store FontAwesome/BX class
            'color' => $request->color
        ]);
        return redirect()->route('home.service')->with('success', 'Service Inserted Successfully');
    }

    public function EditService($id)
{
    $service = Service::findOrFail($id); // Fetch service by ID
    return view('admin.service.edit', compact('service')); // Pass the variable
    }

    public function UpdateService(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'svg_icon' => 'required|string', // SVG stored as raw text
            'font_icon' => 'nullable|string', // FontAwesome or Boxicons class
            'color' => 'required' // Add validation for color
        ]);

        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('home.service')->with('error', 'Service not found');
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'svg_icon' => $request->svg_icon, // Store SVG as text
            'font_icon' => $request->font_icon, // Store FontAwesome/BX class
            'color' => $request->color
        ]);
        return redirect()->route('home.service')->with('success', 'Service Updated Successfully');
    }


}
