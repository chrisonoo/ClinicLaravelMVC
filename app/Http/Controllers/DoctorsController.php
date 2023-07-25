<?php

    namespace App\Http\Controllers;

    use App\Models\Doctor;
    use Illuminate\Http\Request;
    use Illuminate\View\View;

    class DoctorsController extends Controller
    {
        public function index(): View
        {
            $doctors = (new Doctor)->where('is_active', '=', true)->get();

            return view("doctors.index", ['doctors' => $doctors]);
        }

        public function search(Request $request): View
        {
            // Get the search value from the request
            $search = $request->input('search');

            // Search in the title and body columns from the posts table
            $doctors = Doctor::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('surname', 'LIKE', "%{$search}%")
                ->orWhere('specialization', 'LIKE', "%{$search}%")
                ->get();

            // Return the search view with the results compacted
            return view('doctors.search', compact('doctors'));
        }
    }
