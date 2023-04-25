<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Articulo;
use App\Models\Bijouterie;
use App\Models\Lenceria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    //
    public function index(){
        $articulos = Articulo::latest('id')->paginate(8);

        // foreach ($articulos as $articulo) {
        //     // echo '<br>asd<br>
        //     // <pre>';
        //     // print_r($articulo);
        //     // echo '<br>asd<br>';
        //     if($articulo->articuloable_type == 'App\Models\Accesorio'){
        //         $articulo = Accesorio::where('id', $articulo->articuloable_id)->first();
        //         // echo 'aaaaaaaa';
        //     }elseif ($articulo->articuloable_type == 'App\Models\Bijouterie') {
        //         $articulo = Bijouterie::where('id', $articulo->articuloable_id)->first();
        //     }elseif ($articulo->articuloable_type == 'App\Models\Lenceria') {
        //         $articulo = Lenceria::where('id', $articulo->articuloable_id)->first();
        //     }
        // }

        // return ;

        $accesorios = Accesorio::all();
        $bijouteries = Bijouterie::all();
        $lencerias = Lenceria::all();
        
        // return;
        return view('articulos.index', compact('articulos', 'accesorios', 'bijouteries', 'lencerias'));
    }

    //SHOW
    public function show($idArticulo){

        //HAY ALGÚN PROBLEMA, NO ME ESTÁ MOSTRANDO LA INFORMACIÓN CORRECTA. REVISTAR, ADEMÁS NO PUEDO TRAER UN ARTICULO, SINO QUE TENGO QUE TRAER UN ID
        $articulo = Articulo::where('id', $idArticulo)->first();
        
        // echo '<pre>';
        $etiquetas = [];
        #Obtengo el ID de la etiqueta del accesorio
        foreach ($articulo->etiquetas as $etiqueta) {
            echo $etiqueta->pivot->etiqueta_id . '<br>';
            $etiquetas[] = $etiqueta->pivot->etiqueta_id;
        }
        
        
        // print_r($etiquetas);

        #Buscamos los articulos similares por cada ID de etiqueta
        $articulos = [];
        //ESTA BIEN ESTO, DE ACÁ
        foreach ($etiquetas as $etiqueta) {
            #Obtengo el ID de los articulos similares   
            foreach (DB::table('articulo_etiqueta')->where('etiqueta_id', $etiqueta)->get() as $tag) {
                if (Articulo::where('id', $tag->articulo_id)->exists()) {
                    $articulos[] = Articulo::where('id', $tag->articulo_id)
                                                // ->where('articuloable_type', 'App\Models\Accesorio')
                                                ->where('id', '!=', $articulo->id)
                                                ->first();
                }
            }
        }

        foreach ($articulos as $articulo) {
            // echo $articulo->id . '<br>';
        }

        // print_r($articulos);
        // HASTA ACÁ
        
        //NO SÉ SI ES NECESARIO. ver para BORRAR DE ACÁ
        foreach ($articulos as $key => $value) {
            if ($value == '') {unset($articulos[$key]);}
        }
        // HASTA ACÁ

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

        // print_r($similares);
        // return ;
        #Borro el articulo mostrado de la lista de articulos similares
        //Uso este método ya que, si en la consulta donde obtengo el articulo trato de agregarle la consula ->where('id', '!=', $accesorio->id), me da error.
        // foreach ($similares as $key => $value) {
        //     if(($value->articulo->id == $articulo->id) && ($value->articulo->articuloable_type == $articulo->articuloable_type)){
        //         echo '<pre>';
        //         print_r($value);
        //         echo '</pre>';
        //         unset($similares[$key]);
        //         break;
        //     }
        // }

        return view('articulos.show', compact('articulo', 'similares'));
    }
    //FIN SHOW

    //las functions accesorio, bijouterie y lenceria SEGURAMENTE LAS BORRE.
    public function accesorio($idArticulo){
        echo '<pre>';
        $articulo = Articulo::find($idArticulo);
        print_r($articulo);
    }

    public function bijouterie($idBijouterie){
        $articulo = Articulo::find($idBijouterie);

        #Obtengo el ID de la etiqueta del accesorio
        foreach ($articulo->etiquetas as $etiqueta) {
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
                                                ->where('id', '!=', $articulo->id)
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

    public function lenceria($idLenceria){
        echo '<pre>';
        $articulo = Articulo::find($idLenceria);
        print_r($articulo);
    }
}
