<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Machine;
use App\Models\Salle;
use Illuminate\Http\Request;
class MachineController extends Controller
{
    public function statistique(){
        $x=array();
        $y=array();
        $results = DB::select('SELECT s.libelle, COUNT(m.id) AS num_machines
        FROM machines m
        JOIN salles s ON m.salleid = s.id
        GROUP BY s.id, s.libelle;');
        foreach($results as $res){
            array_push($x, $res->libelle);
            array_push($y, $res->num_machines);
        }
        return view('statistique')->with('x',$x)->with('y',$y);
    }
    public function index()
    {
        $drop= salle::all();
        $data= machine::all();
        $etat=0;
        return view('machine')->with('data',$data)->with('drop',$drop)->with('etat',$etat);
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $string = $request->input('salleid');
        $dabab=intval((explode("#",$string))[0]);     
        $machine = machine::create([

            'reference' => $request->input('reference'),
            'marque' => $request->input('marque'),
            'dateAchat' => $request->input('DateAchat'),
            'prix' => $request->input('prix'),   
            'salleid' => $dabab,
            
        ]); 
        return redirect()->route('machine.index')->with('success', 'Record added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $drop= salle::all();
        $data= machine::all();
        $machine = Machine::find($id);
        $etat=1;
        return view('machine', compact('machine'))->with('data',$data)->with('drop',$drop)->with('etat',$etat);
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
        $machine = Machine::find($id);
        $machine->reference = $request->input('reference');
        $machine->marque = $request->input('marque');
        $machine->DateAchat = $request->input('DateAchat');
        $machine->prix = $request->input('prix');
        $machine->salleid = $request->input('salleid');
        $machine->save();
        return redirect()->route('machine.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    public function destroy($id)
    {
        $machine = machine::find($id);
        $machine->delete();
        return redirect()->route('machine.index')->with('success', 'Record deleted successfully');
    }

}
