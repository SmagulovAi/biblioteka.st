{{-- кусок html, который можно подключить на других страницах --}}
<h1>Header</h1>

{{-- добавление стиля в стэк styles --}}
@push('styles')
<link rel="stylesheet" href="header.css">
@endpush

{{-- добавление еще одного стиля в стэк styles --}}
@push('styles')
<link rel="stylesheet" href="footer.css">
@endpush

{{-- добавление строки в стэк links --}}
@push('links')
    <li>Шапка</li>
@endpush
