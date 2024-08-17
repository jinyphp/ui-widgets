<section class="py-lg-8 py-5">
    <div class="container">


        <div class="d-flex align-items-end mb-4">
            <div class="flex-grow-1">
                <h2 class="text-truncate h5 mb-0">
                    @if (isset($rows['title']))
                        {!! $rows['title'] !!}
                    @endif
                </h2>
                <p>
                    @if (isset($rows['description']))
                        {!! $rows['description'] !!}
                    @endif
                </p>
            </div>

            <div class="d-flex gap-2">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="myTab-{{$uuid}}" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab-{{$uuid}}"
                            data-bs-toggle="tab"
                            data-bs-target="#home-{{$uuid}}" type="button"
                            role="tab" aria-controls="home-{{$uuid}}"
                            aria-selected="true">
                            SnapShot
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab-{{$uuid}}" data-bs-toggle="tab"
                            data-bs-target="#profile-{{$uuid}}" type="button"
                            role="tab" aria-controls="profile-{{$uuid}}"
                            aria-selected="false">
                            Preview
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab-{{$uuid}}"
                            data-bs-toggle="tab"
                            data-bs-target="#contact-{{$uuid}}"
                            type="button"
                            role="tab" aria-controls="contact-{{$uuid}}" aria-selected="false">
                            Code
                        </button>
                    </li>
                </ul>

                @if($design)
                <button type="button" class="btn btn-info" wire:click="codeEdit()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                        <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0m6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0"/>
                    </svg>
                </button>
                @endif

                {{-- blade 다운로드 --}}
                <button type="button" class="btn btn-success" wire:click="download">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
                        <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383"/>
                        <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z"/>
                    </svg>
                </button>



            </div>
        </div>




        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent-{{$uuid}}">
            <div class="tab-pane fade show active" id="home-{{$uuid}}" role="tabpanel" aria-labelledby="home-tab-{{$uuid}}">
                <img src="{{$rows['image']}}" alt="">

            </div>

            <div class="tab-pane fade" id="profile-{{$uuid}}" role="tabpanel" aria-labelledby="profile-tab-{{$uuid}}">
                {{-- Blade Content --}}
                @if ($viewBlade)
                    @includeIf('widgets::' . $viewBlade)
                @endif
            </div>
            <div class="tab-pane fade" id="contact-{{$uuid}}" role="tabpanel" aria-labelledby="contact-tab-{{$uuid}}">
<pre>
    <code>
        {{ file_get_contents(View::getFinder()->find('widgets::' . $viewBlade)) }}
    </code>
</pre>
            </div>
        </div>



    </div>
</section>
