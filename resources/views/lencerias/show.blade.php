<x-app-layout>
    {{-- <div class="mx-auto max-w-7xl px-2 py-4 sm:px-6 lg:px-8"> <!-- Container -->
        <h1 class="text-lg text-rose-700 font-bold">{{ $accesorio->articulo->nombre }}</h1>
    </div> --}}

    <div class="container"> <!-- Container -->
        <h1 class="text-lg text-rose-700 font-bold">{{ $lenceria->articulo->nombre }}</h1>

        <div class="bg-slate-200">
            <span class="text-sm text-red-900 font-bold">{{ $lenceria->lenceria }}</span>
            <h2 class="text-sm text-purple-700">{{ $lenceria->articulo->descripcion }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Contenido principal -->
            <div class="md:col-span-2">
                <!-- figure -->
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($lenceria->foto->url) }}" alt="">
                </figure>
    
                <!-- body -->
                <div class="text-base bg-gray-500 text-white">
                    <b class="text-red-800">ID: </b>
                    {{ $lenceria->id }}
                    <br><b class="text-red-800">Lenceria: </b>
                    {{ $lenceria->lenceria }}
                    <br><b class="text-red-800">Talle: </b>
                    {{ $lenceria->talle }}
                    <br><b class="text-red-800">Genero: </b>
                    {{ $lenceria->genero }}
                    <br><b class="text-red-800">created_at: </b>
                    {{ $lenceria->created_at }}
                    <b class="text-red-800">update_at: </b>
                    {{ $lenceria->update_at }}
                    <br><b class="text-red-800">Articulo ID: </b>
                    {{ $lenceria->articulo->id }}
                    <br><b class="text-red-800">Nombre: </b>
                    {{ $lenceria->articulo->nombre }}
                    <br><b class="text-red-800">Slug: </b>
                    {{ $lenceria->articulo->slug }}
                    <br><b class="text-red-800">Descripcion: </b>
                    {{ $lenceria->articulo->descripcion }}
                    <br><b class="text-red-800">Cantidad: </b>
                    {{ $lenceria->articulo->cantidad }}
                    <br><b class="text-red-800">Status:</b>
                    {{ $lenceria->articulo->status }}
                    <br><b class="text-red-800">admin_id:</b>
                    {{ $lenceria->articulo->admin_id }}
                    <br><b class="text-red-800">articuloable_id:</b>
                    {{ $lenceria->articulo->articuloable_id }}
                    <br><b class="text-red-800">articuloable_type:</b>
                    {{ $lenceria->articulo->articuloable_type }}
                    <br><b class="text-red-800">created_at:</b>
                    {{ $lenceria->articulo->created_at }}
                    <br><b class="text-red-800">update_at:</b>
                    {{ $lenceria->articulo->update_at }}
                    
                </div>
            </div>
    
            <!-- Contenido relacionado -->
            <aside>
                <h2 class="text-2xl font-bold mb-2">Contenido relacionado</h2>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            @if ($similar['articulo']->articuloable_type == 'App\Models\Accesorio')
                                <a href="{{ Route('accesorios.show', $similar) }}" class="flex">
                                    <img class="rounded-xl w-36 h-24 object-cover object-center" src="{{ Storage::url($similar['foto']->url) }}" alt="">
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->nombre }}</span> <br>
                                    {{-- <span class="ml-2 text-gray-600">{{ $similar['id'] }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['accesorio'] }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['alto'] }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['largo'] }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['profundidad'] }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['created_at'] }}</span> 
                                    <span class="ml-2 text-gray-600">{{ $similar['updated_at'] }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->id }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->slug }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->descripcion }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->cantidad }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->status }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->admin_id }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->articuloable_id }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->articuloable_type }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->created_at }}</span> <br>
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->update_at }}</span> <br>  --}}
                                </a>
                            @elseif($similar['articulo']->articuloable_type == 'App\Models\Bijouterie')
                                <a href="{{ Route('bijouteries.show', $similar) }}" class="flex">
                                    <b>bijouterie</b>
                                    <img class="rounded-xl w-36 h-24 object-cover object-center" src="{{ Storage::url($similar['foto']->url) }}" alt="">
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->nombre }}</span>
                                </a>
                            @elseif($similar['articulo']->articuloable_type == 'App\Models\Lenceria')
                                <a href="{{ Route('lencerias.show', $similar) }}" class="flex">
                                    <b>lenceria</b>
                                    <img class="rounded-xl w-36 h-24 object-cover object-center" src="{{ Storage::url($similar['foto']->url) }}" alt="">
                                    <span class="ml-2 text-gray-600">{{ $similar['articulo']->nombre }}</span>
                                </a>
                            @endif
                            
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>