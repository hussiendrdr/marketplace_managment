<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Process;
use App\Models\Customers;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();
        $customers=Customers::all();
        return view ('project.index',compact('projects','customers'));
    }

    public function projetCreate(Request $request){
        $customer=Customers::find($request->customer_id);
        $project=new Project;
        $project->customer_id=$customer->id;
        $project->customer_organization_name=$customer->customer_organization_name;
        $project->email=$customer->email;
        $project->save();
        return redirect()->route('project.index');
    }
    public function processIndex($id){
        $project=Project::find($id);
        $processes=Process::where('project_id','=',$id)->get();
        // dd($processes);
        return view ('process.index',compact('processes','project'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Project $project)
    {
        //
        $item = Project::findOrFail($project->id);
        $item->delete();
        return redirect ('project');
    }
}
