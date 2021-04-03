<div class="card d-flex w-100 mt-3">
    <div class="row w-100 mx-auto">
        <div class="col-md-auto rounded" style="background-image: url(/uploads/{{$announcement->img1}}); background-position: center center; background-size: cover; min-height: 200px; min-width: 200px;">
            &nbsp;
        </div>
        <div class="w100m200px">

            <div class="row d-flex justify-content-md-between h-100">

                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12 p-3 pb-0 pb-md-3">

                    <div class="row d-flex justify-content-between h-100">

                        <div>
                            <div class="col-12 d-flex flex-column flex-md-row">
                                <div class="w-100 d-flex justify-content-between">
                                    <h5 class="card-title text-primary">{{$announcement->title}}</h5>
                                    <h5 class="m-0 text-primary d-block d-md-none">{{$announcement->price}} zł</h5>
                                </div>
                            </div>

                            @if($user??false)
                            <div class="col-12">
                                <p class="card-text">
                                    <span class="badge {{$announcement->status}} rounded">{{__($announcement->status)}}</span>
                                </p>
                            </div>
                            @endif

                            <div class="col-12 mt-3">
                                <p class="card-text">{{$announcement->description}} </p>
                            </div>
                        </div>


                        <div class="col-12 d-flex align-items-end">
                            <p class="m-0"><small class="overflow-wrap" style="font-size: 12px;">{{$announcement->localization}}</small></p>
                        </div>
                    </div>

                </div>

                <div class="col-xl-4 col-lg-5 col-md-6 p-3 d-flex flex-column justify-content-between" style="text-align: right;">
                    <div class="d-none d-md-block">
                        <h5 class="m-0 text-primary">{{$announcement->price}} zł</h5>
                    </div>
                    <div class="b-row d-flex">
                        @if($user??false)

                        @if($announcement->status=='active')
                        <a class="btn btn-primary w-100 text-nowrap text-white rounded" href="{{ route('announcement.edit', $announcement->id) }}">Edytuj</a>
                        @else
                        <a class="btn btn-primary w-100 text-nowrap bg-gray text-white rounded" href="{{ route('announcement.edit', $announcement->id) }}">Podgląd</a>
                        @endif

                        @else
                        <a class="btn btn-primary w-100 text-nowrap bg-gray text-white rounded" href="#">Pokaż</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>