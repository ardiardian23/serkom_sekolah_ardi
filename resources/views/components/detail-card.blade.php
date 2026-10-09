@props([
    'label'       => null,
    'icon'        => 'file-text',
    'title'       => '',
    'date'        => null,
    'image'       => null,
    'description' => '',
    'backUrl'     => url('/'),
    'backText'    => 'Kembali',
    'allUrl'      => null,
    'allText'     => 'Lihat Semua',
])

<div class="detail-card">

    {{-- HEADER --}}
    <div class="detail-header">

        @if ($label)
            <span class="detail-label">
                <i class="bi bi-{{ $icon }}"></i>
                {{ $label }}
            </span>
        @endif

        <h1 class="detail-title">
            {{ $title }}
        </h1>

        @if ($date)
            <div class="detail-date">
                <i class="bi bi-calendar3"></i>
                {{ $date }}
            </div>
        @endif

    </div>

    {{-- CONTENT --}}
    <div class="detail-content">

        @if ($image)
            <div class="detail-image-wrapper">
                <img
                    src="{{ $image }}"
                    alt="{{ $title }}"
                    class="detail-image"
                >
            </div>
        @endif

        <div class="detail-description">
            {!! nl2br(e($description)) !!}
        </div>

    </div>

    {{-- FOOTER --}}
    <div class="detail-footer">

        {{-- TOMBOL KIRI: LIHAT SEMUA --}}
        @if ($allUrl)
            <a
                href="{{ $allUrl }}"
                class="btn-detail-back"
            >
                <i class="bi bi-newspaper"></i>
                {{ $allText }}
            </a>
        @else
            <div></div>
        @endif

        {{-- TOMBOL KANAN: KEMBALI --}}
        <a
            href="{{ $backUrl }}"
            class="btn-detail-back"
        >
            <i class="bi bi-arrow-left"></i>
            {{ $backText }}
        </a>
    </div>
</div>
