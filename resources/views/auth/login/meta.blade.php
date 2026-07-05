@section('title', 'Ingresar')

@push('meta')
    <meta name="description" content="Inicia sesión en {{ config('app.name') }}">

    <meta name="robots" content="noindex, nofollow">

    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="Iniciar sesión · {{ config('app.name') }}">
    <meta property="og:description" content="Accede a tu cuenta en {{ config('app.name') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Iniciar sesión · {{ config('app.name') }}">
    <meta name="twitter:description" content="Accede a tu cuenta en {{ config('app.name') }}">
@endpush