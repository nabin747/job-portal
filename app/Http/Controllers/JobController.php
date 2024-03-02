<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
//    public function index()
//    {
//        return Job::all();
//    }

    public function index()
    {
//        if (!Auth::check()) {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }

        return Job::all();

    }
    public function store(Request $request)
    {
//        dd($request);
        $job = Job::create($request->all());
//        dd($job);
        return response()->json($job, 201);
    }

    public function show($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        return response()->json($job, 200);
    }

    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        $job->update($request->all());

        return response()->json($job, 200);
    }

    public function destroy($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        $job->delete();

        return response()->json(null, 204);
    }
}
