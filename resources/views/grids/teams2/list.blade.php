<section class="my-lg-9 my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-12">
                <div class="text-center mb-xl-7 mb-5 mx-xl-8">
                    <h2 class="mb-0">시간과 비용을 절약하세요
                        우리의 고성능 팀을 선택하세요.</h2>
                </div>
            </div>
        </div>
        <div class="row g-5">
            @foreach ($rows as $i => $item)
            <div class="col-lg-3 col-md-6">
                <div class="card text-center card-lift border-0">
                    <div class="card-body py-5">
                        <figure class="mb-4">
                            <img src="{{$item['image']}}"
                                alt="{{$item['name']}}"
                                style="width: 150px; height: 150px; border-radius: 50%;" />
                        </figure>

                        @if($design)
                        <h5 class="mb-1" wire:click="edit({{$i}})">{{$item['name']}}</h5>
                        @else
                        <h5 class="mb-1">{{$item['name']}}</h5>
                        @endif

                        @if(isset($item['position']))
                        <small>{{$item['position']}}</small>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-3 col-md-6">
                <div class="card text-center card-lift border-0">
                    <div class="card-body py-5">
                        <figure class="mb-4 d-flex justify-content-center">
                            <div style="width: 150px; height: 150px; border-radius: 50%; background-color: #f0f0f0;"></div>
                        </figure>

                        <h5 class="mb-1">새 맴버</h5>
                        <a href="#"
                            class="icon-link icon-link-hover fw-semicold">
                            팀에 합류하세요
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--save your time-->
