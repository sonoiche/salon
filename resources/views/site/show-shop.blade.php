@extends('layouts.site')
@section('content')
<!-- Team Section Start -->
<section class="team-section text-center pt-140 rpt-90 pb-90 rpb-40">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-9 col-sm-11">
                <div class="section-title mb-65">
                    <span class="bg-text">Salon Shops</span>
                    <span class="sub-title">Expert Salons</span>
                    <h2>Meet Our Professional Salons</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @if (in_array(1, $service_ids))
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-0-2s">
                    <img src="{{ url('assets/images/services/service-1.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-cut"></i>
                        <h5><a href="{{ url('appointment/1') }}?salon_id={{ $salon->id }}">Hair Cutting</a></h5>
                        <a href="{{ url('appointment/1') }}?salon_id={{ $salon->id }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            @if (in_array(2, $service_ids))
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-0-4s">
                    <img src="{{ url('assets/images/services/service-2.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-nail"></i>
                        <h5><a href="{{ url('appointment/2') }}?salon_id={{ $salon->id }}">Nail Polish</a></h5>
                        <a href="{{ url('appointment/2') }}?salon_id={{ $salon->id }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            @if (in_array(3, $service_ids))
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-0-6s">
                    <img src="{{ url('assets/images/services/service-3.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-massage-1"></i>
                        <h5><a href="{{ url('appointment/3') }}?salon_id={{ $salon->id }}">Body Massage</a></h5>
                        <a href="{{ url('appointment/3') }}?salon_id={{ $salon->id }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            @if (in_array(4, $service_ids))
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-0-8s">
                    <img src="{{ url('assets/images/services/service-4.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-relax"></i>
                        <h5><a href="{{ url('appointment/4') }}?salon_id={{ $salon->id }}">Spa & Foot</a></h5>
                        <a href="{{ url('appointment/4') }}?salon_id={{ $salon->id }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            @if (in_array(5, $service_ids))
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-1-0s">
                    <img src="{{ url('assets/images/services/service-5.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-beauty-treatment-1"></i>
                        <h5><a href="{{ url('appointment/5') }}?salon_id={{ $salon->id }}">Hair Colors</a></h5>
                        <a href="{{ url('appointment/5') }}?salon_id={{ $salon->id }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            @if (in_array(6, $service_ids))
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-1-2s">
                    <img src="{{ url('assets/images/services/service-6.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-liner"></i>
                        <h5><a href="{{ url('appointment/6') }}?salon_id={{ $salon->id }}">Brow Polish</a></h5>
                        <a href="{{ url('appointment/6') }}?salon_id={{ $salon->id }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-6">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-start align-items-start">
                        <div style="text-align: left">
                            Salon Name
                            <div>{{ $salon->name }}</div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-start align-items-start">
                        <div style="text-align: left">
                            Contact
                            <div>{{ $salon->phone }}</div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-start align-items-start">
                        <div style="text-align: left">
                            Complete Address
                            <div>{{ $salon->address . ' ' . $salon->city . ' ' . $salon->zip_code }}</div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-start align-items-start">
                        <div style="text-align: left">
                            GCash Number
                            <div>{{ $salon->gcash_number }}</div>
                        </div>
                    </li>
                </ol>                
            </div>
            <div class="col-6">
                <h3>Top 3 services of {{ $salon->name }}</h3>
                <ul class="list-group">
                    @foreach ($top_services as $service)
                    <li class="list-group-item" style="text-align: left">{{ $service->service->name ?? '' }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
                <form action="{{ url('salons') }}" method="post">
                    @csrf
                    <div class="rating">
                        <input id="input-id" name="rating" type="text" class="rating" data-size="lg" data-step="1" data-show-clear="false" data-show-caption="false" />
                    </div>
                    <div class="form-group" style="text-align: left">
                        <textarea class="form-control" id="review" name="review" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Rating</button>
                    <input type="hidden" name="salon_id" value="{{ $salon->id }}" />
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
                @foreach ($ratings as $rating)
                @php
                    $user = DB::table('users')->find($rating->user_id);
                @endphp
                <div class="d-flex" style="margin-bottom: 15px">
                    <div class="flex-shrink-0">
                        <img src="https://static.vecteezy.com/system/resources/previews/024/766/958/non_2x/default-male-avatar-profile-icon-social-media-user-free-vector.jpg" style="width: 80px" />
                    </div>
                    <div style="text-align: left; padding-left: 10px">
                        {{ $user->fname . ' ' . $user->lname }} &bull; {{ $rating->rating }} star rating
                        <div>
                            {{ $rating->comment }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></script>
@endpush