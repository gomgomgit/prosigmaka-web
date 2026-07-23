@php
    $clientNames = [
        1 => 'Astra', 2 => 'Toyota Motor Manufacturing Indonesia', 3 => 'Jayaboard', 4 => 'Bank Syariah Indonesia',
        5 => 'BMS', 6 => 'Yokke', 7 => 'Dompet Dhuafa', 8 => 'CT Corp', 9 => 'Mobbi', 10 => 'BPJS',
        11 => 'Enterprise client', 12 => 'Xapiens', 13 => 'SISI', 14 => 'SCC', 15 => 'Mitra Transaksi Indonesia',
        16 => 'Enterprise client', 17 => 'Enterprise client', 18 => 'Enterprise client', 19 => 'TMMIN', 20 => 'Astra International',
        21 => 'Enterprise client', 22 => 'PAM Jaya', 23 => 'Enterprise client', 24 => 'Enterprise client',
    ];
    $logoRows = [range(1, 12), range(13, 24)];
@endphp

<section id="clients" class="client-section section-shell" data-section>
    <div class="page-container">
        <div class="client-intro reveal">
            <p class="section-kicker">WHO WE WORK WITH</p>
            <h2>TRUSTED BY<br><span class="text-gradient">LEADING COMPANIES</span></h2>
            <p>We are proud to work with some of the most innovative companies across various industries</p>
        </div>
    </div>

    <div class="logo-marquee reveal" aria-label="Prosigmaka clients">
        @foreach ($logoRows as $logoRow)
            <div class="marquee-viewport {{ $loop->even ? 'marquee-reverse' : '' }}">
                <div class="marquee-track">
                    <div class="logo-set">
                        @foreach ($logoRow as $clientNumber)
                            <div class="client-logo">
                                <img src="{{ asset('assets/prosigmaka/clients/'.$clientNumber.'.png') }}" alt="{{ $clientNames[$clientNumber] }}" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                    <div class="logo-set" aria-hidden="true">
                        @foreach ($logoRow as $clientNumber)
                            <div class="client-logo">
                                <img src="{{ asset('assets/prosigmaka/clients/'.$clientNumber.'.png') }}" alt="" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="page-container client-proof reveal">
        <div><strong>50+</strong><small>Clients</small></div>
        <div><strong>100+</strong><small>Project Completion</small></div>
        <div><strong>10+</strong><small>Years Experience</small></div>
        <div><strong>100+</strong><small>Happy Users</small></div>
    </div>
</section>
