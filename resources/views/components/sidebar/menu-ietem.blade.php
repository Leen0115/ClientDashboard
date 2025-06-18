<li class="nav-item">
    @if (!empty($children) && is_array($children))
        <div class="nav-link parent">
            <i class="bi {{ $bootstrapIconName }}"></i> {{ $name }}
        </div>
        <ul class="nav flex-column {{ app()->getLocale() == 'ar' ? 'me-0' : 'ms-3' }}">
            @foreach ($children as $child)
                @if (is_array($child))
                    @php
                        $displayIcon = true;
                        if (auth()->guard('admin')->check()) {
                            $displayIcon = true;
                        }
                        $hasGrandchildren = !empty($child['children']) && is_array($child['children']);
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link child @if ($hasGrandchildren) has-children @else no-children @endif"
                            @if ($hasGrandchildren) data-bs-toggle="collapse" href="#{{ Str::slug($child['name']) }}Menu" role="button" aria-expanded="false" @else href="{{ $child['route'] }}" @endif>
                            <i class="bi {{ $displayIcon ? $child['bootstrapIcon'] : '' }}"></i> {{ $child['name'] }}
                            @if ($hasGrandchildren)
                                <i class="bi bi-chevron-right arrow-icon"></i>
                            @endif
                        </a>
                        @if ($hasGrandchildren)
                            <div class="collapse" id="{{ Str::slug($child['name']) }}Menu">
                                <ul class="nav flex-column {{ app()->getLocale() == 'ar' ? 'me-0' : 'ms-3' }}">
                                    @foreach ($child['children'] as $grandchild)
                                        <li cla ss="nav-item">
                                            <a class="nav-link child @if (!empty($grandchild['children'])) has-children @else no-children @endif"
                                                href="{{ $grandchild['route'] }}">
                                                <i
                                                    class="bi {{ $displayIcon ? $grandchild['bootstrapIcon'] : '' }}"></i>
                                                {{ $grandchild['name'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    @else
        <a class="nav-link no-children" href="{{ $route }}">
            <i class="bi {{ $bootstrapIconName }}"></i> {{ $name }}
        </a>
    @endif
</li>