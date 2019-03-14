<?php

namespace App\Http\Controllers;

use App\data;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AppService\ApplicationService;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.lokasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param \App\data $data
     *
     * @return \Illuminate\Http\Response
     */
    public function show(data $data)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\data $data
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(data $data)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\data                $data
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, data $data)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\data $data
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(data $data)
    {
    }

    public function lokasi(Request $request, ApplicationService $service)
    {
        if ($request->ajax()) {
            $all = $request->all();
            DB::beginTransaction();
            try {
                $data = data::findOrFail(2);
                $data->delete();
                DB::commit();
                $error = $service->successResponse();
                flash()->success('Berhasil.')->important();

                return view('layouts.error', ['error' => $error]);
            } catch (\Exception $e) {
                DB::rollBack();
                $error = $service->errorResponse($e->getMessage());
                flash()->error('data gagal diupdate. '.$e->getMessage())->important();

                return view('layouts.error', ['error' => $error]);
            }
        } else {
        }

        //return response()->json(['isi' => $query]);
    }
}
