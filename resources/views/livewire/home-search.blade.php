<div class="">
    <!--start filter section-->
    <div class="filter">
        <div class="container">
            <div class="form-filter1">
                <form method="post" wire:submit.prevent="search">
                    <div class="row">
                        <div class="col-12">
                            <input  class="form-control"
                                    type="text"
                                    wire:model="query" placeholder=" يمكنك كتابة اسم مكان"/>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Section -->
                        <div class="col-md-4 col-12 filtrs">
                            <div class="filter-btn">
                                <p>القسم</p>
                                <select class="custom-select" wire:model="selectedSection" id="section"  required>
                                    <option value="">-- اختر قسم --</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Governorate -->
                        <div class="col-md-4 col-12 filtrs">
                            <div class="filter-btn">
                                <p>المحافظة</p>
                                <select  class="custom-select"  wire:model="selectedState" id="state" required>
                                    <option value="">-- اختر محافظة --</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <!-- City -->
                        <div class="col-md-4 col-12 filtrs">

                            <div class="filter-btn">
                                <p>المدينة</p>
                                <select class="custom-select" wire:model="selectedCity" id="city">
                                    @if ($cities->count() == 0)
                                        <option value="">-- اختر محاظفة --</option>
                                    @else
                                        <option value="">-- اختر المنطقة او المدينة --</option>

                                    @endif
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>



{{--                        <div class="col-md-2 col-12 filtrs">--}}

{{--                            <div class="filter-btn">--}}
{{--                                <p>الى سعر</p>--}}
{{--                                <select class="custom-select" id="validationDefault04" required>--}}
{{--                                    <option selected disabled value="">الى سعر </option>--}}
{{--                                    <option value="">100.000</option>--}}
{{--                                    <option value="">200.000</option>--}}
{{--                                    <option value="">300.000</option>--}}
{{--                                    <option value="">400.000</option>--}}
{{--                                    <option value="">500.000</option>--}}
{{--                                    <option value="">600.000</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="col-md-2 col-12 filtrs">--}}

{{--                            <div class="filter-btn">--}}
{{--                                <p>أقل مساحة</p>--}}
{{--                                <select class="custom-select" id="validationDefault04" required>--}}
{{--                                    <option selected disabled value="">أقل مساحة</option>--}}
{{--                                    <option value="">10</option>--}}
{{--                                    <option value="">20</option>--}}
{{--                                    <option value="">30</option>--}}
{{--                                    <option value="">40</option>--}}
{{--                                    <option value="">50</option>--}}
{{--                                    <option value="">60</option>--}}

{{--                                </select>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="col-md-2 col-12 filtrs">--}}
{{--                            <div class="filter-btn">--}}
{{--                                <p>اكبر مساحة</p>--}}
{{--                                <select class="custom-select" id="validationDefault04" required>--}}
{{--                                    <option selected disabled value="">أكبر مساحة</option>--}}
{{--                                    <option value="">10</option>--}}
{{--                                    <option value="">20</option>--}}
{{--                                    <option value="">30</option>--}}
{{--                                    <option value="">40</option>--}}
{{--                                    <option value="">50</option>--}}
{{--                                    <option value="">60</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                        </div>--}}

                    </div>

                    <div class="text-center">
                        <button type="submit"  class="btn btn-primary bttn"><span><i class="fa fa-search mx-2"></i></span>ابحث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end filter section-->
</div>
