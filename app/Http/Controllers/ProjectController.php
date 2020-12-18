<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project ;
use App\Models\Project_Attributes ;
use Response ;

class ProjectController extends Controller
{
  
    public function index()
    {
        $projects = Project::paginate(20) ; // Collect Projects 
        return view('welcome',['projects' => $projects]) ;
    }

    
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']); // Validate for inputs 

        $inputs = $request->only('name') ;

        $Project = Project::create($inputs) ; // create Project first

        if($Project){ // check if project inserted successully 

            $ArrAttributes = [] ; // Prepare Array for attruibutes
            if(!empty($request->inputArrKeys) && !empty($request->inputArrVals)){ // Check for attributes that isn't empty
                for($i=0;$i<count($request->inputArrKeys);$i++)
                {
                    $keyexp = explode(',', $request->inputArrKeys[$i]) ; // Get Keys
                    $valexp = explode(',', $request->inputArrVals[$i]) ; // Get Values

                    for($i=0;$i<count($keyexp);$i++)
                    {
                        $values['project_id'] = $Project->id ;
                        $values['Attkey'] = $keyexp[$i] ;
                        $values['Attval'] = $valexp[$i] ;
                        $ArrAttributes[] = $values ;
                    }
                }


                foreach ($ArrAttributes as $value) {  // Loop for attr to create 
                    Project_Attributes::create($value); // Insert 
                }
            }

            return redirect()->route('projects') ; //redirect to home page

        }else{
            abort(404) ;
        }
        
    }

    
    public function update(Request $request, $id)
    {
        $inputs = $request->only('name') ;

        if($id) {
            $project = Project::find($id) ;
        if($project ){ 

            if(!empty($inputs))
                Project::where('id',$id)->update($inputs) ; 
        
            $ArrAttributes = [] ; // Prepare Array for attruibutes
            if(!empty($request->inputArrKeys) && !empty($request->inputArrVals)){ // Check for attributes that isn't empty

            Project_Attributes::where('project_id',$id)->delete() ; //Delete old values 

                for($i=0;$i<count($request->inputArrKeys);$i++)
                {
                    $keyexp = explode(',', $request->inputArrKeys[$i]) ; // Get Keys
                    $valexp = explode(',', $request->inputArrVals[$i]) ; // Get Values

                    for($i=0;$i<count($keyexp);$i++)
                    {
                        $values['project_id'] = $id ;
                        $values['Attkey'] = $keyexp[$i] ;
                        $values['Attval'] = $valexp[$i] ;
                        $ArrAttributes[] = $values ;
                    }
                }


                foreach ($ArrAttributes as $value) {  // Loop for attr to create 
                    Project_Attributes::create($value); // Insert 
                }
            }

            return response()->json(['message'=>'success'],$this->Successstatus);
        }else{
             return response()->json(['message'=>'Nothing Found'], $this->FailStatus);
        }
    }

    }

}
