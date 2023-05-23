@extends('layout.header')

@section('title', 'Cartpage')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/missions.css') }}">


    <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img width="1300px" height="400px" src="{{ Storage::url('assets/missionbanner.png') }}"
                    class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <div style="margin-left: 55px; margin-right: 55px;">
        <div class="top-container">
            <div class="d-flex flex-row align-items-center justify-content-end">
                <div class="d-flex flex-row align-items-center" style="margin-right: 250px;">
                    <img class="" src="{{ Storage::url('assets/points.png') }}" style="margin-right: 25px;">
                    <h3 style="margin-top: 8px">My Points</h3>
                </div>
                <strong style="font-size: 45px">{{ Auth::user()->points }}</strong>
            </div>
        </div>

        <div class="mid-container d-flex flex-wrap flex-row justify-content-around">
            @php
                $m1sub1 = false;
                $m1sub2 = false;
                $m1sub3 = false;
                $m2sub1 = false;
                $m2sub2 = false;
                $m2sub3 = false;
                $m3sub1 = false;
                $m3sub2 = false;
                $m3sub3 = false;
                $mission1Done = false;
            @endphp
            @foreach ($missions as $m)
                <div class="d-flex flex-column" style="background-color: white; width: 30%">
                    <h4 class="text-center fw-semibold mt-4 mb-4">{{ $m->missionName }}</h4>
                    <div class="d-flex flex-row justify-content-around ms-4 me-4 pt-4 pb-4"
                        style="background-color: #E6F5FF;">
                        @if ($m->winType == 0)
                            @if ($m->id == 1)
                                <img width="120px" height="150px"
                                    src="{{ Storage::url('books/' . $books[0]->bookCover) }}">
                            @else
                                <img width="120px" height="150px"
                                    src="{{ Storage::url('books/' . $books[1]->bookCover) }}">
                            @endif
                        @else
                            <img width="120px" height="150px" src="{{ Storage::url('assets/pts.png') }}">
                        @endif
                        <div class="d-flex flex-column w-50 align-items-center justify-content-center">
                            <h5 class="fw-semibold">{{ $m->missionRewards }}</h5>
                            <br>
                            <h6>Complete the below tasks and claim your rewards!</h6>
                        </div>
                    </div>

                    <h4 class="ms-4 me-4 fw-semibold mt-4 mb-4">Challenges</h4>


                    @if ($m->id == 1)
                        @if ($missionDone->first()->mission_id == $m->id)
                            @php
                                $mission1Done = true;
                            @endphp
                        @endif
                        <h6 class="ms-4 me-4 fw-semibold mt-2 mb-2">{{ $m->subMission1 }}</h6>

                        @if (Str::contains($m->subMission1, 'Buy'))
                            <div class="progress ms-4 me-4">
                                <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                    style="width: {{ $bookUserCount >= 1 ? '100%' : $bookUserCount * 11.11 . '%' }};"
                                    aria-valuenow="{{ $bookUserCount }}" aria-valuemin="0" aria-valuemax="1">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end me-4 ">
                                <h6>
                                    @if ($bookUserCount >= 1)
                                        @php
                                            $fixedCount = 1;
                                            $m1sub1 = true;
                                        @endphp
                                        {{ $fixedCount }}
                                    @else
                                        {{ $bookUserCount }}
                                    @endif
                                    /
                                    5
                                </h6>
                            </div>
                        @endif


                        <h6 class="ms-4 me-4 fw-semibold mt-2 mb-2">{{ $m->subMission2 }}</h6>

                        @if (Str::contains($m->subMission2, 'Read any book for 1 minutes'))
                            <div class="progress ms-4 me-4">
                                <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                    style="width: {{ Auth::user()->readTime >= 1 ? '100%' : Auth::user()->readTime * 11.11 . '%' }}; height: 20px;"
                                    aria-valuenow="{{ Auth::user()->readTime }}" aria-valuemin="0" aria-valuemax="1">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end me-4">
                                <h6>
                                    @if (Auth::user()->readTime >= 1)
                                        @php
                                            $fixedCount = 1;
                                            $m1sub2 = true;
                                        @endphp
                                    @else
                                        @php
                                            $fixedCount = Auth::user()->readTime;
                                        @endphp
                                        {{ $fixedCount }}
                                    @endif
                                    /
                                    1
                                </h6>
                            </div>
                        @endif

                        <h6 class="ms-4 me-4 fw-semibold mt-2 mb-2">{{ $m->subMission3 }}</h6>

                        @if (Str::contains($m->subMission3, 'Read any book for 2 minutes'))
                            <div class="progress ms-4 me-4">
                                <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                    style="width: {{ Auth::user()->readTime >= 2 ? '100%' : Auth::user()->readTime * 50 . '%' }}; height: 20px;"
                                    aria-valuenow="{{ Auth::user()->readTime }}" aria-valuemin="0" aria-valuemax="2">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end me-4">
                                <h6>
                                    @if (Auth::user()->readTime >= 2)
                                        @php
                                            $fixedCount = 2;
                                            $m1sub3 = true;
                                        @endphp
                                    @else
                                        @php
                                            $fixedCount = Auth::user()->readTime;
                                        @endphp
                                        {{ $fixedCount }}
                                    @endif
                                    /
                                    2
                                </h6>
                            </div>
                        @endif
                    @elseif ($m->id == 2)
                        <h6 class="ms-4 me-4 fw-semibold mt-2 mb-2">{{ $m->subMission1 }}</h6>

                        @if (Str::contains($m->subMission1, 'Buy 5 books'))
                            <div class="progress ms-4 me-4">
                                <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                    style="width: {{ $bookUserCount >= 5 ? '100%' : $bookUserCount * 20 . '%' }};"
                                    aria-valuenow="{{ $bookUserCount }}" aria-valuemin="0" aria-valuemax="5">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end me-4">
                                <h6>
                                    @if ($bookUserCount >= 5)
                                        @php
                                            $fixedCount = 5;
                                            $m2sub1 = true;
                                        @endphp
                                        {{ $fixedCount }}
                                    @else
                                        {{ $bookUserCount }}
                                    @endif
                                    /
                                    5
                                </h6>
                            </div>
                        @endif


                        <h6 class="ms-4 me-4 fw-semibold mt-2 mb-2">{{ $m->subMission2 }}</h6>

                        @if (Str::contains($m->subMission2, 'Buy 8 books'))
                            <div class="progress ms-4 me-4">
                                <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                    style="width: {{ $bookUserCount >= 8 ? '100%' : $bookUserCount * 12.5 . '%' }};"
                                    aria-valuenow="{{ $bookUserCount }}" aria-valuemin="0" aria-valuemax="8">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end me-4">
                                <h6>
                                    @if ($bookUserCount >= 8)
                                        @php
                                            $fixedCount = 8;
                                            $m2sub2 = true;
                                        @endphp
                                        {{ $fixedCount }}
                                    @else
                                        {{ $bookUserCount }}
                                    @endif
                                    /
                                    8
                                </h6>
                            </div>
                        @endif

                        <h6 class="ms-4 me-4 fw-semibold mt-2 mb-2">{{ $m->subMission3 }}</h6>

                        @if (Str::contains($m->subMission3, 'Read any book for 10 minutes'))
                            <div class="progress ms-4 me-4">
                                <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                    style="width: {{ Auth::user()->readTime >= 10 ? '100%' : Auth::user()->readTime * 10 . '%' }}; height: 20px;"
                                    aria-valuenow="{{ Auth::user()->readTime }}" aria-valuemin="0" aria-valuemax="10">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end me-4">
                                <h6>
                                    @if (Auth::user()->readTime >= 10)
                                        @php
                                            $fixedCount = 10;
                                            $m2sub3 = true;
                                        @endphp
                                    @else
                                        @php
                                            $fixedCount = Auth::user()->readTime;
                                        @endphp
                                        {{ $fixedCount }}
                                    @endif
                                    /
                                    10
                                </h6>
                            </div>
                        @endif
                    @else
                        <h6 class="ms-4 me-4 fw-semibold mt-2 mb-2">{{ $m->subMission1 }}</h6>

                        @if (Str::contains($m->subMission1, 'Read any book for 5 minutes'))
                            <div class="progress ms-4 me-4">
                                <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                    style="width: {{ Auth::user()->readTime >= 5 ? '100%' : Auth::user()->readTime * 20 . '%' }};"
                                    aria-valuenow="{{ Auth::user()->readTime }}" aria-valuemin="0" aria-valuemax="5">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end me-4">
                                <h6>
                                    @if (Auth::user()->readTime >= 5)
                                        @php
                                            $fixedCount = 5;
                                            $m3sub1 = true;
                                        @endphp
                                        {{ $fixedCount }}
                                    @else
                                        {{ Auth::user()->readTime }}
                                    @endif
                                    /
                                    5
                                </h6>
                            </div>
                        @endif


                        <h6 class="ms-4 me-4 fw-semibold mt-2 mb-2">{{ $m->subMission2 }}</h6>

                        @if (Str::contains($m->subMission2, 'Read any book for 15'))
                            <div class="progress ms-4 me-4">
                                <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                    style="width: {{ Auth::user()->readTime >= 15 ? '100%' : Auth::user()->readTime * 12.5 . '%' }};"
                                    aria-valuenow="{{ Auth::user()->readTime }}" aria-valuemin="0" aria-valuemax="15">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end me-4">
                                <h6>
                                    @if (Auth::user()->readTime >= 15)
                                        @php
                                            $fixedCount = 15;
                                            $m3sub2 = true;
                                        @endphp
                                        {{ $fixedCount }}
                                    @else
                                        {{ Auth::user()->readTime }}
                                    @endif
                                    /
                                    15
                                </h6>
                            </div>
                        @endif

                        <h6 class="ms-4 me-4 fw-semibold mt-2 mb-2">{{ $m->subMission3 }}</h6>

                        @if (Str::contains($m->subMission3, 'Buy 3 books'))
                            <div class="progress ms-4 me-4">
                                <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                    style="width: {{ $bookUserCount >= 3 ? '100%' : $bookUserCount * 33.33 . '%' }}; height: 20px;"
                                    aria-valuenow="{{ $bookUserCount }}" aria-valuemin="0" aria-valuemax="3">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end me-4">
                                <h6>
                                    @if ($bookUserCount >= 3)
                                        @php
                                            $fixedCount = 3;
                                            $m3sub3 = true;
                                        @endphp
                                        {{ $fixedCount }}
                                    @else
                                        {{ $bookUserCount }}
                                    @endif
                                    /
                                    3
                                </h6>
                            </div>
                        @endif
                    @endif
                    <br>

                    @php
                        $m1claim = false;
                        $m2claim = false;
                        $m3claim = false;
                    @endphp
                    @if ($m1sub1 && $m1sub2 && $m1sub3)
                        @php
                            $m1claim = true;
                        @endphp
                    @endif
                    @if ($m2sub1 && $m2sub2 && $m2sub3)
                        @php
                            $m2claim = true;
                        @endphp
                    @endif
                    @if ($m3sub1 && $m3sub2 && $m3sub3)
                        @php
                            $m3claim = true;
                        @endphp
                    @endif
                    @if ($m->id == 1)
                        <form action="/claimRewards/{{ $m->id }}/{{ $books[0]->id }}" method="POST"
                            class="d-flex justify-content-center align-items-center mb-4">
                            @csrf
                            <button class="btn-disable" id="btn-1" disabled="true">Click to Claim</button>
                        </form>
                    @elseif ($m->id == 2)
                        <form action="/claimRewards/{{ $m->id }}"
                            class="d-flex justify-content-center align-items-center mb-4">
                            <button class="btn-disable" id="btn-2" disabled="true">Click to Claim</button>
                        </form>
                    @elseif ($m->id == 3)
                        <form action="/claimRewards/{{ $m->id }}"
                            class="d-flex justify-content-center align-items-center mb-4">
                            <button class="btn-disable" id="btn-3" disabled="true">Click to Claim</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
        <br>
        <br>
    </div>

    <script>
        var isClaim1 = {{ $m1claim ? 'true' : 'false' }};
        var isClaim2 = {{ $m2claim ? 'true' : 'false' }};
        var isClaim3 = {{ $m3claim ? 'true' : 'false' }};

        var test1 = {{ $m3sub1 ? 'true' : 'false' }}
        var test2 = {{ $m3sub2 ? 'true' : 'false' }}
        var test3 = {{ $m3sub3 ? 'true' : 'false' }}

        var mission1Done = {{ $mission1Done ? 'true' : 'false' }}

        console.log("JAGA" + mission1Done);

        console.log(test1);
        console.log(test2);
        console.log("LAST" + test3);

        // console.log(isClaim1);
        // console.log(isClaim2);
        console.log(isClaim3);

        if (isClaim1) {
            document.getElementById("btn-1").disabled = false;
            document.getElementById("btn-1").className = "claim-btn";
        }
        if (isClaim2) {
            document.getElementById("btn-2").disabled = false;
            document.getElementById("btn-2").className = "claim-btn";
        }
        if (isClaim3) {
            document.getElementById("btn-3").disabled = false;
            document.getElementById("btn-3").className = "claim-btn";
        }

        if (mission1Done) {
            document.getElementById("btn-1").disabled = true;
            document.getElementById("btn-1").className = "btn-disable";
        }
    </script>

@endsection
