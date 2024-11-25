{{-- Si una directiva es definida entonces deja de formar parte de la variable attributes --}}
{{-- La variable que se recibe por defecto se llama x-slot --}}
@props(['type' => 'info']) {{-- Si no se recibe nada en type, tendra el valor de 'info' por defecto --}}

@php
    switch ($type) {
        case 'info':
            $class = 'text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400';
            break;
        case 'danger':
            $class = 'text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400';
            break;
        case 'success':
            $class = 'text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400';
            break;
        case 'warning':
            $class = 'text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300';
            break;
        case 'dark':
            $class = 'text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300';
            break;
        default:
            $class = 'text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400';
            break;
    }
@endphp

<div class="px-4 mx-auto max-w-7x1">
    <div {{ $attributes -> merge(['class' => 'p-4 mb-4 text-sm ' . $class] )}}" role="alert">
        {{-- El merge sirve para determinar si el parametro class existe si es asi el codigo se fusiona con las clases que tenemos por defecto --}}
        <span class="font-medium">{{$title}} </span>{{$slot}}.
    </div>
</div>
