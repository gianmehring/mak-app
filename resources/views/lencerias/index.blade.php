<x-app-layout>
    <div class="container"> {{-- Container --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- Carta Articulos --}}
            @foreach ($lencerias as $lenceria)
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
                                    <a href="" class="{{$etiqueta->color}} inline-block px-2 h-6  rounded-full">
                                        {{ $etiqueta->nombre }}
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </article>
            @endforeach
            {{-- Fin Carta Articulos --}}

        </div>

        {{-- Navegación (8 articulos por "página") --}}
        <div class="mt-4">
            {{ $lencerias->links() }}
        </div>
        {{-- Fin navegación --}}
    </div>
</x-app-layout>