@extends('layouts.app')

@section('content')
    <section class="band_hero">
        <div class="container">
            <h2 class="text-center">{{ $structure->title->text }}</h2>
        </div>
    </section>
    <section>
        <div class="page-info">
            <div class="main-info">
                <h2 class="main-info-text">
                    {{ $structure->description1->text }}
                    <br><br>{{ $structure->description2->text }}
                </h2>
                <div class="team-title">
                    <h1>
                        {{ $structure->teamTitle->text }}:
                    </h1>
                </div>
                @foreach ($structure->teams as $index => $member)
                    @if ($index % 2 == 0)
                        <!-- Als de index even is -->
                        <div class="flex flex-wrap justify-center flex-row-reverse items-center my-10">
                            <div class="w-full shrink-0 grow-0 basis-auto md:w-3/12 lg:w-3/12">
                                <img src="{{ asset('storage/' . $member->profile_photo) }}"
                                    class="mb-6 w-full" />
                            </div>

                            <div
                                class="w-full shrink-0 grow-0 basis-auto md:w-9/12 md:pl-6 lg:w-9/12">
                                <div class="">
                                    <h2>
                                        {{ $member->full_name }}
                                    </h2>
                                    <h3>
                                        {{ $member->job_title }}
                                    </h3>
                                    <h4>
                                        {{ $member->job_description }}
                                    </h4>
                                    <div class="icons">
					<h3>
                                            <a href="{{ $member->social_link1 }}" target=”_blank”
                                                style="text-decoration: none; color: inherit;"><i
                                                    class="bi bi-linkedin"></i></a>
                                            <a href="{{ $member->social_link2 }}" target=”_blank”
                                                style="text-decoration: none; color: inherit;"><i class="bi bi-twitter"></i></a>
                                            <a href="{{ $member->social_link3 }}" target=”_blank”
                                                style="text-decoration: none; color: inherit;"><i class="bi bi-globe"></i></a>
					</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Als de index oneven is -->

                        <div class="flex flex-wrap justify-center items-center my-10">
                            <div class="w-full shrink-0 grow-0 basis-auto md:w-3/12 lg:w-3/12">
                                <img src="{{ asset('storage/' . $member->profile_photo) }}"
                                    class="mb-6 w-full" />
                            </div>

                            <div
                                class="w-full shrink-0 grow-0 basis-auto md:w-9/12 md:pl-6 lg:w-9/12">
                                <div class="">
                                    <h2>
                                        {{ $member->full_name }}
                                    </h2>
                                    <h3>
                                        {{ $member->job_title }}
                                    </h3>
                                    <h4>
                                        {{ $member->job_description }}
                                    </h4>
                                    <div class="icons">
					<h3>
                                            <a href="{{ $member->social_link1 }}" target=”_blank”
                                                style="text-decoration: none; color: inherit;"><i
                                                    class="bi bi-linkedin"></i></a>
                                            <a href="{{ $member->social_link2 }}" target=”_blank”
                                                style="text-decoration: none; color: inherit;"><i class="bi bi-twitter"></i></a>
                                            <a href="{{ $member->social_link3 }}" target=”_blank”
                                                style="text-decoration: none; color: inherit;"><i class="bi bi-globe"></i></a>
					</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
