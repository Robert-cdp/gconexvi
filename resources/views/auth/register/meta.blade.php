@section('title', 'Crear Cuenta')

@push('meta')
    <meta name="description" content="Crea una cuenta en {{ config('app.name') }} y únete a la comunidad.">

    <meta name="robots" content="noindex, nofollow">

    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="Crear cuenta · {{ config('app.name') }}">
    <meta property="og:description" content="Regístrate en {{ config('app.name') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endpush