<nav class="section-indicator" aria-label="Indikator section">
    @foreach ($sections as $navSection)
        <a href="#{{ $navSection->key }}" data-section-dot="{{ $navSection->key }}" aria-label="{{ $navigationLabels[$navSection->key] ?? $navSection->label }}"><span></span></a>
    @endforeach
</nav>
