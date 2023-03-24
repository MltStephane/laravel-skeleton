@props([
    'type' => 'info',
    'icon' => null,
])

@php
    if('info' === $type){
        $textColor = 'text-blue-900';
        $bgColor = 'bg-blue-200';
    } elseif('success' === $type){
        $textColor = 'text-green-900';
        $bgColor = 'bg-green-200';
    } elseif('danger' === $type){
        $textColor = 'text-red-900';
        $bgColor = 'bg-red-200';
    } elseif('warning' === $type){
        $textColor = 'text-orange-900';
        $bgColor = 'bg-orange-200';
    }
@endphp


<div class="rounded-xl shadow-lg p-4 flex items-center gap-2 {{ $bgColor }} font-medium {{ $textColor }}">
    @if (null !== $icon)
        <x-icon :name="$icon" class="h-5 w-5" />
    @endif
    <div class="text-sm">{!! $slot !!}</div>
</div>