<?php

namespace App\Http\Controllers\Consult;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consult\ConsultRequest;
use App\Interfaces\Consult\ConsultInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    protected $consultService;

    public function __construct(ConsultInterface $consultService)
    {
        $this->consultService = $consultService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultRequest $request): JsonResponse
    {
        $this->consultService->saveSchedule(
            $request->appointment_id,
            $request->patient_name,
            $request->patient_email
        );

        return response()->json(['message' => 'Consultation scheduled successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
