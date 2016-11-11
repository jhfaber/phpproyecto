<?php
//Este es un controlador personal
namespace phpproyecto\Http\Controllers;

use Illuminate\Http\Request;
use phpproyecto\Http\Requests as AnotherRequests;
use phpproyecto\Http\Requests\CategoriaFormRequest;
use Illuminate\Eloquent\Collection;
use DB;
use phpproyecto\Categoria;


use phpproyecto\Http\Requests;

//esesencialmente un error vamos a calmarnos, el error fue eliminado

class PersonalController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	
    	
    	$users = PersonalController::find(1);

        //DB::table('categoria')->where('condicion','=','1','or','condicion', '=', '0', 'or', 'condicion','=','NULL')
        //->orderBy('idcategoria','desc')
        //->paginate(10);
    	
    	return view('personal.index', ['users'=>$users]);
    }
    public function show()
    {
        return view("personal.consulta");
    }
    
}
