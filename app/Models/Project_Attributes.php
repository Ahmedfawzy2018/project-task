<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project ;

class Project_Attributes extends Model
{
    use HasFactory;
   
    protected $table="project_attributes";
    protected $fillable = ['project_id','Attkey','Attval'];
    public $timestamps = false;
    public function getProject()
    {
    	return Project::find($this->project_id) ;
    }


}
