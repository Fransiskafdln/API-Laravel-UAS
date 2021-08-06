<?php

namespace App\Http\Controllers;

use App\Models\PendidikanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikan = PendidikanModel::orderBy('nama', 'DESC')->get();
        $response = [
            'message'=> 'Data pendidikan Admin',
            'data'   => $pendidikan 
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
            'ttl' => ['required'],
            'status' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $pendidikan = PendidikanModel::create($request->all());
            $response = [
                'message' => 'pendidikan Created',
                'data' => $pendidikan
            ];

            return response()->json($response, Response::HTTP_CREATED);

        } catch (QueryException $e ) {
            return response()->jason([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendidikan = PendidikanModel::findOrFail($id);
        $response = [
            'message' => 'Detail of Transaction Resource',
            'data' => $pendidikan
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendidikan = PendidikanModel::findOrFail($id);
 

        try {
            $pendidikan->delete();
            $response = [
                'message' => 'pendidikan Deleted',
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch (QueryException $e ) {
            return response()->jason([
                'message' => "Failed" . $e->errorInfo
            ]);
    }
    }
}
