<?php

namespace App\Http\Controllers;
use App\DailyScrum;
use Illuminate\Http\Request;
use Auth;

class DailyScrumController extends Controller
{
    public function index(){
        $data = DailyScrum::all();
        return response($data);
    }

    public function show($id){
        $data = DailyScrum::where('id',$id)->get();
        return response ($data);
    }

    public function store (Request $request){
        try {
            $data = new DailyScrum();
            $data->team = $request->input('team');
            $data->id_users = $request->input('id_users');
            $data->activity_yesterday = $request->input('activity_yesterday');
            $data->activity_today = $request->input('activity_today');
            $data->problem_yesterday = $request->input('problem_yesterday');
            $data->solution = $request->input('solution');
            $data->save();
            return response()->json([
                'status'    => '1',
                'message'   => 'Tambah data berhasil!'
            ]);

        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Tambah data gagal!'
            ]);
        }
    }

    public function destroy($id){
        try{
            $data = DailyScrum::where('id', $id)->first();
            $data->delete();
            return response()->json([
                'status'    => '1',
                'message'   => 'Hapus data berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Hapus data gagal!'
            ]);
        }
    }
}
