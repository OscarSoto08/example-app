<div class="px-4 mx-auto max-w-7x1">
    <div {{ $attributes -> merge(['class' => 'p-4 mb-4 text-sm ' . $class] )}}" role="alert">
        {{-- El merge sirve para determinar si el parametro class existe si es asi el codigo se fusiona con las clases que tenemos por defecto --}}
        <span class="font-medium">{{$title}} </span>{{$slot}}.
    </div>
</div>
