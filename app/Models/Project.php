<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project_Attributes;
class Project extends Model
{
    use HasFactory;

    protected $table="project";
    protected $fillable = ['name'];

    public function getAttr()
    {
    	
    	$attr = Project_Attributes::where('project_id',$this->id)->get()  ;
    	$text = "" ;
    	$text .="<table border='2'>" ;
    	for($i=0;$i<count($attr);$i++)
    	{	
    		$text .= "<tr>";
    		$text .= "<td>".$attr[$i]->Attkey . "</td>"."<td> ".$attr[$i]->Attval ."</td>" ;
    		$text .= "</tr>" ;
    	}
    	$text .="</table>" ;

    	echo $text ;

    }

}
