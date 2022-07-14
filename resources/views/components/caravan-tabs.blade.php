<div class="container">
    <section id="parametry">
        <div class="section-title">
            <h1>Parametry vozu {{ $caravan->name }}</h1>
            <span class="description">Podrobnosti k obytnému vozu</span>
        </div>
        <div class="section-content">
            <div role="tabpanel">
                <nav class="nav" role="tablist">
                    @foreach($tabs as $tab)
                        <a href="#parametre-{{ $tab->id }}" class="nav-item {{ $loop->index == 0 ? 'active' : '' }}" data-toggle="tab" role="tab" aria-controls="parametre-{{ $tab->id }}" aria-selected="false">
                            {{ $tab->name }}
                        </a>
                    @endforeach
                </nav>

                <div class="tab-content">
                    @foreach($tabs as $tab)
                        <div role="tabpanel" class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}" id="parametre-{{ $tab->id }}" aria-labelledby="parametre-{{ $tab->id }}-tab">
                            {!! $tab->pivot->text !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>