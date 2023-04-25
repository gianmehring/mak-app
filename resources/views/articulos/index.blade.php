<x-app-layout>
    <div class="container"> {{-- Container --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- ESTO PORDÍA SER:
                    ULTIMOS INGRESOS
                de acá
            -->
            @foreach ($articulos as $articulo)
                <article class="">
                    <div class="border w-full p-4 rounded-2xl">
                        @if ($articulo->articuloable_type == 'App\Models\Accesorio') <!-- Accesorio -->
                            <h3 class="text-2xl text-blue-950 text-center mb-3">Accesorio</h3>
                            @foreach ($accesorios as $accesorio)
                                @if ($articulo->articuloable_id == $accesorio->id)
                                    <img class="rounded-xl" src="{{ Storage::url($accesorio->foto->url) }}" alt="">
                                @endif
                            @endforeach
                            <div class="w-full h-full mt-3 flex flex-col">
                                <h2 class="text-xl font-bold text-black">
                                    <a href="{{ Route('accesorios.show', $articulo->articuloable_id) }}">
                                        {{ $articulo->nombre }}
                                    </a>
                                </h2>
    
                                <div>
                                    @foreach ($articulo->etiquetas as $etiqueta)
                                        <a href="" class="bg-{{$etiqueta->color}}-600 inline-block px-2 h-6  rounded-full">
                                            {{ $etiqueta->nombre }}
                                        </a>
                                    @endforeach
                                </div>
    
                            </div>
                        @elseif($articulo->articuloable_type == 'App\Models\Bijouterie') <!-- Bijouterie -->
                            <h3 class="text-2xl text-blue-950 text-center mb-3">Bijouterie</h3>
                            @foreach ($bijouteries as $bijouterie)
                                @if ($articulo->articuloable_id == $bijouterie->id)
                                    <img class="rounded-xl" src="{{ Storage::url($bijouterie->foto->url) }}" alt="">
                                @endif
                            @endforeach
                            <div class="w-full h-full mt-3 flex flex-col">
                                <h2 class="text-xl font-bold text-black">
                                    <a href="{{ Route('bijouteries.show', $articulo->articuloable_id) }}">
                                        {{ $articulo->nombre }}
                                    </a>
                                </h2>
    
                                <div>
                                    @foreach ($articulo->etiquetas as $etiqueta)
                                        <a href="" class="bg-{{$etiqueta->color}}-600 inline-block px-2 h-6  rounded-full">
                                            {{ $etiqueta->nombre }}
                                        </a>
                                    @endforeach
                                </div>
    
                            </div>
                        @elseif($articulo->articuloable_type == 'App\Models\Lenceria') <!-- Lenceria -->
                            <h3 class="text-2xl text-blue-950 text-center mb-3">Lenceria</h3>
                            @foreach ($lencerias as $lenceria)
                                @if ($articulo->articuloable_id == $lenceria->id)
                                    <img class="rounded-xl" src="{{ Storage::url($lenceria->foto->url) }}" alt="">
                                @endif
                            @endforeach
                            <div class="w-full h-full mt-3 flex flex-col">
                                <h2 class="text-xl font-bold text-black">
                                    <a href="{{ Route('lencerias.show', $articulo->articuloable_id) }}">
                                        {{ $articulo->nombre }}
                                    </a>
                                </h2>
    
                                <div>
                                    @foreach ($articulo->etiquetas as $etiqueta)
                                        <a href="" class="bg-{{$etiqueta->color}}-600 inline-block px-2 h-6  rounded-full">
                                            {{ $etiqueta->nombre }}
                                        </a>
                                    @endforeach
                                </div>
    
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
            <!-- ESTO PORDÍA SER:
                    ULTIMOS INGRESOS
                hasta acá
            -->

            
        </div>

        {{-- Navegación (8 articulos por "página") --}}
        <div class="mt-4">
            {{ $articulos->links() }}
            {{-- {{ $accesorios->links() }}
            {{ $bijouteries->links() }}
            {{ $lencerias->links() }} --}}
        </div>
        {{-- Fin navegación --}}

        {{-- Categoría accesorios --}}
        <h2 class="md:col-span-2 lg:col-span-4 text-4xl text-center">Accesorios</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($accesorios as $accesorio)
                <div class="text-base bg-gray-500 text-white">
                    {{-- <b class="text-red-800">ID: </b> {{ $accesorio->id }} <br>
                    <b class="text-red-800">Accesorio: </b> {{ $accesorio->accesorio }} <br>
                    <b class="text-red-800">Alto: </b> {{ $accesorio->alto }} <br>
                    <b class="text-red-800">Largo: </b> {{ $accesorio->largo }} <br>
                    <b class="text-red-800">Profundidad: </b> {{ $accesorio->profundidad }} <br>
                    <b class="text-red-800">created_at: </b> {{ $accesorio->created_at }} <br>
                    <b class="text-red-800">update_at: </b> {{ $accesorio->update_at }} <br>
                    <b class="text-red-800">Articulo ID: </b> {{ $accesorio->articulo->id }} <br> --}}
                    <b class="text-red-800">Nombre: </b> {{ $accesorio->articulo->nombre }} <br>
                    {{-- <b class="text-red-800">Slug: </b> {{ $accesorio->articulo->slug }} <br>
                    <b class="text-red-800">Descripcion: </b> {{ $accesorio->articulo->descripcion }} <br>
                    <b class="text-red-800">Cantidad: </b> {{ $accesorio->articulo->cantidad }} <br>
                    <b class="text-red-800">Status:</b> {{ $accesorio->articulo->status }} <br>
                    <b class="text-red-800">admin_id:</b> {{ $accesorio->articulo->admin_id }} <br>
                    <b class="text-red-800">articuloable_id:</b> {{ $accesorio->articulo->articuloable_id }} <br>
                    <b class="text-red-800">articuloable_type:</b> {{ $accesorio->articulo->articuloable_type }} <br>
                    <b class="text-red-800">created_at:</b> {{ $accesorio->articulo->created_at }} <br>
                    <b class="text-red-800">update_at:</b> {{ $accesorio->articulo->update_at }} <br> --}}
                    <b class="text-red-800">Foto</b> <img class="rounded-xl w-40" src="{{ Storage::url($accesorio->foto->url) }}" alt="">
                </div>
            @endforeach
        </div>
        {{-- Categoría bijouteries --}}
        <h2 class="md:col-span-2 lg:col-span-4 text-4xl text-center">Bijouteries</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($bijouteries as $bijouterie)
                <div class="text-base bg-gray-500 text-white">
                    {{-- <b class="text-red-800">ID: </b> {{ $bijouterie->id }} <br>
                    <b class="text-red-800">Acero: </b> {{ $bijouterie->acero }} <br>
                    <b class="text-red-800">Bijouterie: </b> {{ $bijouterie->bijouterie }} <br>
                    <b class="text-red-800">Largo: </b> {{ $bijouterie->largo }} <br>
                    <b class="text-red-800">Diametro: </b> {{ $bijouterie->diametro }} <br>
                    <b class="text-red-800">Talle: </b> {{ $bijouterie->talle }} <br>
                    <b class="text-red-800">created_at: </b> {{ $bijouterie->created_at }} <br>
                    <b class="text-red-800">update_at: </b> {{ $bijouterie->update_at }} <br>
                    <b class="text-red-800">Articulo ID: </b> {{ $bijouterie->articulo->id }} <br> --}}
                    <b class="text-red-800">Nombre: </b> {{ $bijouterie->articulo->nombre }} <br>
                    {{-- <b class="text-red-800">Slug: </b> {{ $bijouterie->articulo->slug }} <br>
                    <b class="text-red-800">Descripcion: </b> {{ $bijouterie->articulo->descripcion }} <br>
                    <b class="text-red-800">Cantidad: </b> {{ $bijouterie->articulo->cantidad }} <br>
                    <b class="text-red-800">Status:</b> {{ $bijouterie->articulo->status }} <br>
                    <b class="text-red-800">admin_id:</b> {{ $bijouterie->articulo->admin_id }} <br>
                    <b class="text-red-800">articuloable_id:</b> {{ $bijouterie->articulo->articuloable_id }} <br>
                    <b class="text-red-800">articuloable_type:</b> {{ $bijouterie->articulo->articuloable_type }} <br>
                    <b class="text-red-800">created_at:</b> {{ $bijouterie->articulo->created_at }} <br>
                    <b class="text-red-800">update_at:</b> {{ $bijouterie->articulo->update_at }} <br> --}}
                    <b class="text-red-800">Foto</b> <img class="rounded-xl w-40" src="{{ Storage::url($bijouterie->foto->url) }}" alt="">
                </div>
            @endforeach
        </div>
        {{-- Categoría lencerias --}}
        <h2 class="md:col-span-2 lg:col-span-4 text-4xl text-center">Lencerias</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($lencerias as $lenceria)
                <div class="text-base bg-gray-500 text-white">
                    {{-- <b class="text-red-800">ID: </b> {{ $lenceria->id }} <br>
                    <b class="text-red-800">Lenceria: </b> {{ $lenceria->lenceria }} <br>
                    <b class="text-red-800">Talle: </b> {{ $lenceria->talle }} <br>
                    <b class="text-red-800">Genero: </b> {{ $lenceria->genero }} <br>
                    <b class="text-red-800">created_at: </b> {{ $lenceria->created_at }} <br>
                    <b class="text-red-800">update_at: </b> {{ $lenceria->update_at }} <br>
                    <b class="text-red-800">Articulo ID: </b> {{ $lenceria->articulo->id }} <br> --}}
                    <b class="text-red-800">Nombre: </b> {{ $lenceria->articulo->nombre }} <br>
                    {{-- <b class="text-red-800">Slug: </b> {{ $lenceria->articulo->slug }} <br>
                    <b class="text-red-800">Descripcion: </b> {{ $lenceria->articulo->descripcion }} <br>
                    <b class="text-red-800">Cantidad: </b> {{ $lenceria->articulo->cantidad }} <br>
                    <b class="text-red-800">Status:</b> {{ $lenceria->articulo->status }} <br>
                    <b class="text-red-800">admin_id:</b> {{ $lenceria->articulo->admin_id }} <br>
                    <b class="text-red-800">articuloable_id:</b> {{ $lenceria->articulo->articuloable_id }} <br>
                    <b class="text-red-800">articuloable_type:</b> {{ $lenceria->articulo->articuloable_type }} <br>
                    <b class="text-red-800">created_at:</b> {{ $lenceria->articulo->created_at }} <br>
                    <b class="text-red-800">update_at:</b> {{ $lenceria->articulo->update_at }} <br> --}}
                    <b class="text-red-800">Foto</b> <img class="rounded-xl w-40" src="{{ Storage::url($lenceria->foto->url) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
<!--

    {{-- Carta Articulos --}}
            {{-- @foreach ($accesorios as $accesorio)
                <article class="">
                    <div class="border w-full p-4 rounded-2xl">
                        <img class="rounded-xl" src="{{ Storage::url($accesorio->foto->url) }}" alt="">
                        <div class="w-full h-full mt-3 flex flex-col">
                            <h2 class="text-xl font-bold text-black">
                                <a href="{{ Route('accesorios.show', $accesorio->id) }}">
                                    {{ $accesorio->articulo->nombre }}
                                </a>
                            </h1>

                            <div>
                                @foreach ($accesorio->articulo->etiquetas as $etiqueta)
                                    <a href="" class="bg-{{$etiqueta->color}}-600 inline-block px-2 h-6  rounded-full">
                                        {{ $etiqueta->nombre }}
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </article>
            @endforeach --}}
            {{-- @foreach ($bijouteries as $bijouterie)
                <article class="">
                    <div class="border w-full p-4 rounded-2xl">
                        <img class="rounded-xl" src="{{ Storage::url($bijouterie->foto->url) }}" alt="">
                        <div class="w-full h-full mt-3 flex flex-col">
                            <h2 class="text-xl font-bold text-black">
                                <a href="{{ Route('bijouteries.show', $bijouterie->id) }}">
                                    {{ $bijouterie->articulo->nombre }}
                                </a>
                            </h1>

                            <div>
                                @foreach ($bijouterie->articulo->etiquetas as $etiqueta)
                                    <a href="" class="bg-{{$etiqueta->color}}-600 inline-block px-2 h-6  rounded-full">
                                        {{ $etiqueta->nombre }}
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </article>
            @endforeach --}}
            {{-- Lencerias --}}
            {{-- @foreach ($lencerias as $lenceria)
                <article class="">
                    <div class="border w-full p-4 rounded-2xl">
                        <img class="rounded-xl" src="{{ Storage::url($lenceria->foto->url) }}" alt="">
                        <div class="w-full h-full mt-3 flex flex-col">
                            <h2 class="text-xl font-bold text-black">
                                <a href="{{ Route('lencerias.show', $lenceria->id) }}"> 
                                    {{ $lenceria->articulo->nombre }}
                                </a>
                            </h1>

                            <div>
                                @foreach ($lenceria->articulo->etiquetas as $etiqueta)
                                    <a href="" class="bg-{{$etiqueta->color}}-600 inline-block px-2 h-6  rounded-full">
                                        {{ $etiqueta->nombre }}
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </article>
            @endforeach --}}
            {{-- Fin Carta Articulos --}}
