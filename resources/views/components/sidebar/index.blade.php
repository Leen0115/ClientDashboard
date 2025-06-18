@props(['arr'])

<div class="sidebar bg-white d-flex flex-column vh-100">

    <!-- Logo -->
    <div class="text-center mb-4 mt-3">
        <img src="{{ asset('/images/Rodud-Black-Logo.png') }}" alt="Rodud Logo" class="img-fluid" width="100px">
    </div>

    <!-- Menu Items -->
    <ul class="nav flex-column p-1">
        @foreach ($arr as $index => $item)
            @continue(!empty($item['isSupport']))

            <x-Sidebar.menu-ietem :name="$item['name']" :route="$item['route']" :bootstrapIconName="$item['bootstrapIcon']" :children="$item['children']" />

            @php
                $nextItem = $arr[$index + 1] ?? null;
            @endphp

            @if ($nextItem && empty($nextItem['isSupport']))
                <hr class="my-2 mx-3" style="color: #cecece;">
            @endif
        @endforeach
    </ul>

    <div class="mt-auto ">

        {{-- support section --}}
        @php
            $supportItem = collect($arr)->firstWhere('isSupport', true);
        @endphp

        @if ($supportItem)
            <div class="px-4 ">
                <div class="">
                    <a class="btn btn-sm d-flex justify-content-between align-items-center custom-support-btn"
                        data-bs-toggle="collapse" href="#supportCollapse" role="button" aria-expanded="false"
                        aria-controls="supportCollapse">
                        <span><i class="{{ $supportItem['bootstrapIcon'] }} "></i> {{ $supportItem['name'] }}</span>
                        <i class="bi bi-chevron-right support-arrow-icon"></i>
                    </a>

                    <div class="collapse mt-2 support-section py-2" id="supportCollapse">
                        <ul class="list-unstyled mb-0 rounded ">
                            @foreach ($supportItem['children'] as $child)
                                <li>
                                    <a href="{{ url($child['route']) }}"
                                        class="d-block py-1 {{ app()->getLocale() === 'ar' ? 'pe-0' : 'ps-3' }} support-section-list text-decoration-none">
                                        <i
                                            class="{{ $child['bootstrapIcon'] }} {{ app()->getLocale() === 'ar' ? 'ms-1' : 'me-1' }}"></i>
                                        {{ $child['name'] }}
                                    </a>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <hr style="color: #cecece;">
            </div>
        @endif

        {{-- Footer --}}
        @php
            if (request()->is('client/*')) {
                $termsUrl = '/client/settings/terms';
                $privacyUrl = '/client/settings/privacy-policy';
            } elseif (request()->is('supplier/*')) {
                $termsUrl = '/supplier/settings/terms';
                $privacyUrl = '/supplier/settings/privacy-policy';
            } else {
                $termsUrl = '';
                $privacyUrl = '';
            }
        @endphp
        <div class="footer-text mt-3 px-3" style="color: #515151;">
            <small class="text-muted">
                {!! __('sideBar.byUsingRodud', [
                    'terms' =>
                        '<a href="' .
                        $termsUrl .
                        '" class="text-decoration-underline" style="color: #515151;">' .
                        __('sideBar.terms') .
                        '</a>',
                    'privacy' =>
                        '<a href="' .
                        $privacyUrl .
                        '" class="text-decoration-underline" style="color: #515151;">' .
                        __('sideBar.privacy') .
                        '</a>',
                ]) !!}
            </small>
        </div>
        <div class="mt-3 footer-text px-3" STYLE="color: #515151;">
            <small class="text-muted">
                {!! __('sideBar.allRightsReserved') !!}
            </small>
        </div>
    </div>
</div>

@push('scripts')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.querySelector('[data-bs-toggle="collapse"]');
            const arrowIcon = document.querySelector('.support-arrow-icon');
            const collapseElement = document.querySelector('#supportCollapse');

            collapseElement.addEventListener('show.bs.collapse', () => {
                arrowIcon.classList.add('rotate');
            });

            collapseElement.addEventListener('hide.bs.collapse', () => {
                arrowIcon.classList.remove('rotate');
            });
        });
    </script>
@endpush