<div class="container">
    <section id="predstaveni">
        @if(!empty($floor_plan) || !empty($video))
            <div class="row">
                {{-- <div class="col-md-6">
                    <div class="section-title">
                        <h3>Představení vozu</h3>
                    </div>
                    <div class="section-content">
                        {!! $description !!}
                    </div>
                </div>
                @if(!empty($photo))
                    <div class="col-md-6">
                        <div class="description__img" style="background-image: url({{ asset('storage/' . $photo->photography) }});">
                            <div class="description__text">
                                Fotografie zobrazuje typický vůz, jednotlivé detaily se liší (barevné provedení apod.).
                            </div>
                        </div>
                    </div>
                @endif --}}
                <div class="@if(!empty($video)) col-md-6 @else col-md-12 @endif">
                    <div class="section-floor-plan">
                        @if(!empty($floor_plan))
                        {{-- Заменить на ссылку что б  была возможность открыть картинку в новой вкладке для просмотра  --}}
                            <span >
                                <img src="{{ asset('storage/' . $floor_plan) }}" alt="Půdorys vozu" loading="lazy">
                            </span>
                        @endif
                    </div>
                </div>

                <div class="@if(!empty($floor_plan)) col-md-6 @else col-md-12 @endif">
                    <div class="section-video">
                        <iframe src="{{ $video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" class="video" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        @endif
    </section>
</div>
