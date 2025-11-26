<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProjectMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class ProjectMahasiswaController extends Controller
{
    public function index(): JsonResponse
    {
        $projects = ProjectMahasiswa::with('mahasiswa')->paginate(10);
        return response()->json($projects);
    }

    public function show(ProjectMahasiswa $project): JsonResponse
    {
        return response()->json($project->load('mahasiswa'));
    }
}