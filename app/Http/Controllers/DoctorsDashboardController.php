<?php

    namespace App\Http\Controllers;

    use App\Models\Doctor;
    use Illuminate\Http\Request;
    use Illuminate\View\View;

    class DoctorsDashboardController extends Controller
    {
        public function index(): View
        {
            $doctors = (new Doctor)->where('is_active', '=', true)->get();
            return view("doctors-dashboard.index", ['doctors' => $doctors]);
        }

        public function edit($id): View
        {
            $doctor = (new Doctor)->find($id);
            return view('doctors-dashboard.edit', ['doctor' => $doctor]);
        }

        public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'name' => ['required', 'max:64'],
                'surname' => ['required', 'max:64'],
                'specialization' => ['required', 'max:64'],
                'description' => ['required', 'max:128'],
            ]);

            $doctor = (new Doctor)->find($id);
            $doctor->name = $request->input('name');
            $doctor->surname = $request->input('surname');
            $doctor->specialization = $request->input('specialization');
            $doctor->description = $request->input('description');
            $doctor->save();
            return redirect('/dashboard/doctors');
        }

        public function delete($id) {
            $doctor = (new Doctor)->find($id);
            $doctor->is_active = false;
            $doctor->save();
            return redirect('/dashboard/doctors/');
        }

        public function showDeleted()
        {
            $doctors = (new doctor)->where('is_active', '=', false)->get();

            return view("doctors-dashboard.deleted", ['doctors' => $doctors]);
        }

        public function undelete($id) {
            $doctor = (new doctor)->find($id);
            $doctor->is_active = true;
            $doctor->save();
            return redirect('/dashboard/doctors/');
        }

        public function new()
        {
            return view('doctors-dashboard.new');
        }

        public function create(Request $request)
        {
            $validatedData = $request->validate([
                'name' => ['required', 'max:64'],
                'surname' => ['required', 'max:64'],
                'specialization' => ['required', 'max:64'],
                'description' => ['required', 'max:128'],
            ]);

            $doctor = new Doctor();
            $doctor->id = null;
            $doctor->name = $request->input('name');
            $doctor->surname = $request->input('surname');
            $doctor->specialization = $request->input('specialization');
            $doctor->description = $request->input('description');
            $doctor->photo = '/images/default-photo.png';
            $doctor->is_active = true;
            $doctor->save();
            return redirect('/dashboard/doctors/');
        }
    }
