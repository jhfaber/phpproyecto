<?php

namespace phpproyecto\Http\Controllers;

use Illuminate\Http\Request;
use phpproyecto\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\IngresoFormRequest;
use sisVentas\Ingreso;
use sisVentas\DetalleIngreso;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class IngresoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            
            $query=trim($request->get('searchText'));
            $ingresos=DB::table('ingreso as i')
            ->join('persona as p','i.idproveedor','=','p.idpersona')
            ->join('detalle_ingreso as di','i.ingreso','=','di.idingreso')
            ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado', DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->where('i.num_comprobante','LIKE','%'$query.'%')
            ->orderBy('i.idingreso','desc')
            ->groupBy('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
            ->paginate(7);
            return view('compras.ingreso.index',['ingresos'=>$ingresos,"searchText"=>$query]);
           
        }
    }

    public function create()
    {
    	$personas=DB::table('persona')->where('tipo_persona','=','Proveedor')->get();
    	$articulos=DB::table('articulo as art')
    	->select(DB::raw('CONCAT(art.codigo, " ",art.nombre)AS articulo'), 'art.idarticulo')
    	->where('art.estado','=','Activo')
    	->get();
    	return view('compras.ingreso.create',['persona'=>$personas,'articulos'=>$articulos]);

    }
    public function store(IngresoFormRequest $request)
    {
    	//Se hace el try por que se deben guardar todos los datos, tanto en ingreso como en detalle de ingreso, si falla en alguna parte la transaccion no puede ser efectiva. 
    	try{ 
    		DB::beginTransaction();
    		$ingreso= new Ingreso;
    		$ingreso->idproveedor=$request->get('idproveedor');
    		$ingreso->tipo_comprobante=$request->get('tipo_comprobante');
    		$ingreso->serie_comprobante=$request->get('serie_comprobante');
    		$ingreso->num_comprobante=$request->get('num_comprobante');
    		$mytime= Carbon::now('America/Lima');
    		$ingreso->fecha_hora=$mytime->toDateTimeString();
    		$ingreso->impuesto='18';
    		$ingreso->estado='A';
    		$ingreso->save();
    		$idarticulo = $request->get('idarticulo');
    		$cantidad = $request->get('cantidad');
    		$precio_compra=$request->get('precio_compra');
    		$precio_venta=$$request->get('precio_venta');
    		DB::commit();
    		//vamos a ver
    		

    	}catch(\Exception $e)
    	{
    		DB::rollback();

    	}
    }
}
