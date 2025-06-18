@props(['arr'])

@php
    use App\Helpers\BreadcrumbHelper;

    $currentRoute = request()->path();
    $breadcrumb = BreadcrumbHelper::generateBreadcrumb($arr, '/' . $currentRoute);

    $isArabic = app()->getLocale() === 'ar';
    $items = $isArabic ? array_reverse($breadcrumb) : $breadcrumb;
@endphp

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" @if($isArabic) dir="rtl" @endif>
    <div class="container d-flex justify-content-between align-items-center" @if($isArabic) dir="rtl" @endif>

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 {{ $isArabic ? 'flex-row-reverse rtl' : '' }}">
                @foreach ($items as $item)
                    @if ($loop->last)
                        <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
                    @else
                        <li class="breadcrumb-item">{{ $item['name'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>

        {{-- Toggler --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navbar Content --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav {{ $isArabic ? 'me-auto' : 'ms-auto' }} d-flex align-items-center gap-3"> 
         {{-- Language Switcher --}}
                <div class="language-switcher">
                    <button onclick="changeLang('en')" class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}" style="font-family: 'Inter', sans-serif;" >
                        English
                    </button>
                    <button onclick="changeLang('ar')" class="lang-btn {{ app()->getLocale() === 'ar' ? 'active' : '' }}" style="font-family: 'Almarai', sans-serif;">
                        عربي
                    </button>
                </div>
                @auth('client')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::guard('client')->user()->name }}
                        </a>
                        <div class="dropdown-menu {{ $isArabic ? 'dropdown-menu-start' : 'dropdown-menu-end' }}">
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('client.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

                @guest('client')
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @endguest


            </ul>
        </div>
    </div>
</nav>

{{-- Language Switcher Style --}}
<style>
.language-switcher {
    background-color: #F6F7F9;
    border-radius: 5px;
    display: inline-flex;
    padding: 4px;
    gap: 2px;
    box-shadow: 0 0 0 1px #EBEEF4 ;
    /* font-family: "Almarai", sans-serif; */
    font-size: 14px;
}

.lang-btn {
    background: transparent;
    border: none;
    border-radius: 5px;
    padding: 3px 20px;
    cursor: pointer;
    font-weight: 400;
    transition: all 0.3s ease-in-out;
    color: #515151;
}

.lang-btn.active {
    background-color: #7514C0;
    color: white;
}
</style>

{{-- Language Change Script --}}
<script>
function changeLang(lang) {
    fetch("{{ url('/set-language') }}/" + lang, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.ok ? res.json() : Promise.reject())
    .then(data => {
        if(data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: data.message ?? 'Language changed successfully!',
                showConfirmButton: false,
                timer: 1000,
                customClass: {
                    popup: lang === 'ar' ? 'swal-ar' : 'swal-en'
                }
            }).then(() => {
                window.location.reload(true);
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: data.message ?? 'Failed to change language',
                showConfirmButton: false,
                timer: 1800,
                customClass: {
                    popup: lang === 'ar' ? 'swal-ar' : 'swal-en'
                }
            });
        }
    })
    .catch(() => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong. Please try again.',
            showConfirmButton: false,
            timer: 1800,
            customClass: {
                popup: lang === 'ar' ? 'swal-ar' : 'swal-en'
            }
        });
    });
}

</script>