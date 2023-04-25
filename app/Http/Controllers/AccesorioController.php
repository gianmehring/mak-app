<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Articulo;
use App\Models\Bijouterie;
use App\Models\Lenceria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccesorioController extends Controller
{
    //INDEX
    public function index(){
        $accesorios = Accesorio::latest('id')->paginate(8);
        return view('accesorios.index', compact('accesorios'));
    }
    //FIN INDEX

    //SHOW
    public function show(Accesorio $accesorio){
        #Obtengo el ID de la etiqueta del accesorio
        foreach ($accesorio->articulo->etiquetas as $etiqueta) {
            $etiquetas[] = $etiqueta->pivot->etiqueta_id;
        }

        #Buscamos los articulos similares por cada ID de etiqueta
        $articulos = [];
        //ESTA BIEN ESTO, DE ACÁ
        foreach ($etiquetas as $etiqueta) {
            #Obtengo el ID de los articulos similares   
            foreach (DB::table('articulo_etiqueta')->where('etiqueta_id', $etiqueta)->get() as $tag) {
                if (Articulo::where('id', $tag->articulo_id)->exists()) {
                    $articulos[] = Articulo::where('id', $tag->articulo_id)
                                                // ->where('articuloable_type', 'App\Models\Accesorio')
                                                ->where('id', '!=', $accesorio->articulo->id)
                                                ->first();
                }
            }
        }
        // HASTA ACÁ
        // foreach ($etiquetas as $etiqueta) {
        //     #Obtengo el ID de los articulos similares   
        //     foreach (DB::table('articulo_etiqueta')->where('etiqueta_id', $etiqueta)->get() as $tag) {
        //         // if(!in_array($tSag->articulo_id, $articulos)){   //Si el valor no está en el array entonces lo guardo
        //             $articulos[] = Articulo::where('id', $tag->articulo_id)->where('articuloable_type', 'App\Models\Accesorio');
        //         // }S
        //     }
        // }
        
        //NO SÉ SI ES NECESARIO. ver para BORRAR DE ACÁ
        foreach ($articulos as $key => $value) {
            if ($value == '') {unset($articulos[$key]);}
        }
        // echo '<pre>';
        // print_r($articulos);
        // return ;
        //HASTA ACÁ
        
        $similares = [];
        #Obtengo todos los articulos (accesorios, bijouteries y lencerias) similares
        foreach ($articulos as $articulo) {
            if(Articulo::where('id', $articulo->id)->where('articuloable_type', Accesorio::class)->exists()){
                $similares[] = Accesorio::where('id', $articulo->articuloable_id)->first();
            }elseif (Articulo::where('id', $articulo->id)->where('articuloable_type', Bijouterie::class)->exists()) {
                $similares[] = Bijouterie::where('id', $articulo->articuloable_id)->first();
            }elseif (Articulo::where('id', $articulo->id)->where('articuloable_type', Lenceria::class)->exists()) {
                $similares[] = Lenceria::where('id', $articulo->articuloable_id)->first();
            }
        }

        #Borro el articulo mostrado de la lista de articulos similares
        //Uso este método ya que, si en la consulta donde obtengo el articulo trato de agregarle la consula ->where('id', '!=', $accesorio->id), me da error.
        // foreach ($similares as $key => $value) {
        //     if($value->id == $accesorio->id){
        //         unset($similares[$key]);
        //         break;
        //     }
        // }
        return view('accesorios.show', compact('accesorio', 'similares'));
    }
    //FIN SHOW

    //EDIT

    //FIN EDIT
}
