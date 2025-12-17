@props(['active' => false, 'url' => '#', 'icon' => null, 'label'])

<li>
    <a href="{{ $url }}"
       @class([
           'flex items-center gap-3 px-4 py-2 rounded-lg transition-colors',
           'bg-[#052148] text-white font-semibold' => $active,
           'hover:bg-[#ff751f] hover:text-white' => !$active,
       ])
    >
        @if ($icon)
            <span class="flex-shrink-0 w-4 h-4">{!! $icon !!}</span>
        @endif
        <span>{{ $label }}</span>
    </a>
</li>
