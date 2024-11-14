
@extends('master.main')

@section('content')
<div class="content-wrapper">
            <div class="greennature-content">
                <div class="greennature-page-title-wrapper header-style-5-title-wrapper">
                    <div class="greennature-page-title-overlay"></div>
                    <div class="greennature-page-title-container container">
                        <h1 class="greennature-page-title">About</h1>
                        <span class="greennature-page-caption">About Us</span>
                    </div>
                </div>
                <!-- Above Sidebar Section-->

                <!-- Sidebar With Content Section-->
                <div class="with-sidebar-wrapper">
                    <section id="content-section-1">
                  
                        <div class="clear"></div>
                    </section>
                    @if($About)
                    <section id="content-section-2">
                        <div class="greennature-color-wrapper  gdlr-show-all greennature-skin-light-grey" style="background-color: #ffffff; padding-top: 55px; padding-bottom: 35px; ">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-7">
                                        <div class="environment-section-title pb-5">
                                            <h2>{{ $About->name }}</h2>
                                        </div>
                                        <div class="environment-aboutus-text ">
                                            {{ $About->description }}
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-5 pt-3">
                                        <img src="{{ asset($About->image_path) }}" alt="{{ $About->name }}" class="img-fluid environment-aboutus-img">
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </section>
                    @endif
                    <section id="content-section-3">
                        <div class="greennature-color-wrapper  gdlr-show-all no-skin" style="background-color: #ffffff; padding-top: 70px; padding-bottom: 25px; ">
                            <div class="container">
                                <div class="four columns">
                                    <div class="greennature-ux column-service-ux">
                                        <div class="greennature-item greennature-column-service-item greennature-type-1-caption">
                                            <div class="column-service-image"><img src="upload/icon-6.png" alt="" width="80" height="80" /></div>
                                            <div class="column-service-content-wrapper">
                                                <h3 class="column-service-title">Earth</h3>
                                                <!-- <div class="column-service-caption greennature-skin-info">Amet Dapibus Mollis</div> -->
                                                <div class="column-service-content greennature-skin-content">
                                                    <p>Our planet Earth, a blue and green jewel in the vastness of space, is a testament to the beauty and resilience of life.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="four columns">
                                    <div class="greennature-ux column-service-ux">
                                        <div class="greennature-item greennature-column-service-item greennature-type-1-caption">
                                            <div class="column-service-image"><img src="upload/icon-5.png" alt="" width="80" height="80" /></div>
                                            <div class="column-service-content-wrapper">
                                                <h3 class="column-service-title">Water</h3>
                                                <!-- <div class="column-service-caption greennature-skin-info">Bibendum Aenean Nullam</div> -->
                                                <div class="column-service-content greennature-skin-content">
                                                    <p>Water, the lifeblood of our planet, nurtures every living organism, carving landscapes and sustaining ecosystems.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="four columns">
                                    <div class="greennature-ux column-service-ux">
                                        <div class="greennature-item greennature-column-service-item greennature-type-1-caption">
                                            <div class="column-service-image"><img src="upload/icon-7.png" alt="" width="80" height="80" /></div>
                                            <div class="column-service-content-wrapper">
                                                <h3 class="column-service-title">Plants</h3>
                                                <!-- <div class="column-service-caption greennature-skin-info">Cras Aenean Inceptos</div> -->
                                                <div class="column-service-content greennature-skin-content">
                                                    <p>Plants, the silent architects of our environment, transform sunlight into life, sustaining creatures great and small</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </section>
                    
                </div>
                
                <!-- Below Sidebar Section-->

            </div>
            <!-- greennature-content -->
            <div class="clear"></div>
        </div>
        
@endsection
