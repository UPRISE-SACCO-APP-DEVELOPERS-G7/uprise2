@extends('layouts/app', ['activePage' => 'welcome', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION'])

@section('content')
    <div class="full-page section-image" data-color="blue" data-image="{{asset('light-bootstrap/img/money.jpg')}}">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8 justify-content-center">
                        <img src="{{asset('light-bootstrap/img/log.png')}}" alt=""  style="width:200px; height: 200px; margin-left: 220px">
                        <h2 class="text-white text-center">{{ __('Welcome to Uprise Sacco system...') }}</h2>
                        <h4 class="text-white text-center">{{ __('Empower your financial futures with us!!!') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush