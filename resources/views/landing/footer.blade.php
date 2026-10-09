<footer class="footer pt-5 pb-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <h5 class="fw-bold mb-3">
                    {{ $profil->nama_sekolah ?? 'Website Sekolah' }}
                </h5>
                <p class="text-secondary">
                    {{ $profil->deskripsi ?? 'Website resmi sekolah.' }}
                </p>
            </div>

            <div class="col-lg-6">
                <h6 class="fw-bold mb-3">Kontak</h6>
                <p class="text-secondary mb-2">
                    <i class="bi bi-geo-alt me-2"></i>
                    {{ $profil->alamat ?? '-' }}
                </p>
                <p class="text-secondary">
                    <i class="bi bi-telephone me-2"></i>
                    {{ $profil->kontak ?? '-' }}
                </p>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <div class="text-center text-secondary">
            <small>
                &copy; {{ date('Y') }}
                {{ $profil->nama_sekolah ?? 'Website Sekolah' }}.
                All Rights Reserved.
            </small>
        </div>
    </div>
</footer>

