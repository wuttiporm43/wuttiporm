<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Covid19;

class Covid19Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$sql = "select * from covid19s";
        // $covid19s = DB::select($sql, []);
        // $covid19s = Covid19::get();
        $perPage = 10;
        $search = $request->get('search');
        if (!empty($search)) {
            //กรณีมีข้อมูลที่ต้องการ search จะมีการใช้คำสั่ง where และ orWhere
            $covid19s = Covid19::where('country', 'LIKE', "%$search%")
                ->orWhere('total', 'LIKE', "%$search%")
                ->orWhere('active', 'LIKE', "%$search%")
                ->orWhere('death', 'LIKE', "%$search%")
                ->orWhere('recovered', 'LIKE', "%$search%")
                ->orderBy('date', 'desc')->paginate($perPage);
        } else {
            //กรณีไม่มีข้อมูล search จะทำงานเหมือนเดิม
            $covid19s = Covid19::orderBy('date', 'desc')->paginate($perPage);
        }

        //$covid19s = Covid19::orderBy('date', 'desc')->get();   
       // $covid19s = Covid19::orderBy('date', 'desc')->paginate($perPage);
        return view('covid19/index', compact('covid19s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('covid19.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        
        Covid19::create($requestData);

        return redirect('covid19');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $covid19 = Covid19::findOrFail($id);
        return view('covid19.show', compact('covid19'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $covid19 = Covid19::findOrFail($id);
        return view('covid19.edit', compact('covid19'));
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
        $requestData = $request->all();        
        $covid19 = Covid19::findOrFail($id);
        $covid19->update($requestData);
        return redirect('covid19');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Covid19::destroy($id);
        return redirect('covid19');
    }
}
