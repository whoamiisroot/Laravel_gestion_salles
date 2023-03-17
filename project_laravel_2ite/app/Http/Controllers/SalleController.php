<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data= Salle::all();
        $results = DB::select('SELECT s.id, m.reference  AS num_machines
        FROM machines m
        JOIN salles s ON m.salleid = s.id
       ');
       
        return view('classe')->with('data',$data)->with('results',$results);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salle = Salle::create([
            'code' => $request->input('code'),
            'libelle' => $request->input('libelle'),
        ]);
    
        return redirect()->route('classe.index')->with('success', 'Record added successfully');
    }
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {  
    //     $salle = salle::find($id);
    //     $salle->delete();
    //     return redirect()->route('classe.index')->with('success', 'Record deleted successfully');
    // }
    public function destroy($id)
    {
        // Remove the foreign key constraint from the `machines` table
        
        DB::statement('ALTER TABLE machines DROP FOREIGN KEY FK_machine');
        DB::statement('UPDATE machines
        SET salleid =  34
        WHERE salleid='.$id.';');
        // Delete the class from the `classes` table
        $salle = salle::find($id);
        $salle->delete();
        
        // Restore the foreign key constraint in the `machines` table
        DB::statement('ALTER TABLE machines
        ADD CONSTRAINT FK_machine
        FOREIGN KEY (salleid) REFERENCES salles(id)');
         return redirect()->route('classe.index');
    }
}

