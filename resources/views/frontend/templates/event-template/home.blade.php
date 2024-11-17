@section('title', 'EVENT')
{{-- @section('raffle_template') --}}
@include('frontend.templates.event-template.includes.header')

 <!-- .wpo-counter-area start -->
 <div class="wpo-counter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wpo-counter-grids">
                    <!-- <div class="grid">
                    <div>
                        <h2><span class="odometer" data-count="14200">14200</span></h2>
                    </div>
                    <p>Total Services</p>
                </div>
                <div class="grid">
                    <div>
                        <h2><span class="odometer" data-count="13385.780006002635">13385.780006002635</span></h2>
                    </div>
                    <p>Portions Sponsored</p>
                </div> -->

                    <div class="grid">
                        <div>
                            <h2>$<span class="odometer" data-count="888048">888,048</span></h2>
                        </div>
                        <p>Raised</p>
                    </div>
                    <div class="grid">
                        <div>
                            <h2>$<span class="odometer" data-count="946800">946,800</span></h2>
                        </div>
                        <p>High Holidays Goal</p>
                    </div>

                    <!-- Progress Bar -->
                    <div class="progress-bar-sec">
                        <div>
                            <progress value="888048.0000000002" max="946800" style="width:100%;"></progress>
                        </div>
                        <p>Progress: 94%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .wpo-counter-area end -->

<!-- wpo-case-area start -->
<div class="wpo-event-area section-padding grey-bg">
    <div class="container" id="topSection">
        <div class="row">
            <div class="col-6 col-xs-12 package-card">
                <div class="wpo-section-title">
                    <span>Raw food Packages</span>
                    <h2>Sponsor Packages</h2>
                </div>
                <div class="wpo-event-text">
                    <h2>Package Deliveries</h2>
                    <ul>
                        <li>
                            <span class="pkg-meal-main-goal">$661,236 <small>raised, of</small> $720,000</span>
                            <div style="clear:both; margin-top:10px;" class="custom-progress-bar">
                                <div style="background-color: #e6e6e6; height: 10px; width: 100%; ">
                                    <div style="background-color: #7d452b; height: 100%; width: 91.838299971521%; "></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a class="general-sponsor-btn" href="javascript:;" onclick="SponsorMeal('https://hh23.masbia.org', 'Package Deliveries', '72', '214', '0', 'Any', '6', 'Package', '10')" style="text-decoration: underline;"> Sponsor Packages </a>
                </div>
            </div>
            <div class="col-6 col-xs-12 col2 sponsor-meal-card">
                <div class="wpo-section-title">
                    <span>In House Meals</span>
                    <h2>Sponsor Meals</h2>
                </div>
                <div class="wpo-event-item">
                    <div class="wpo-event-text">
                        <ul>
                            <li>
                                <span class="pkg-meal-main-goal">$226,905 <small>raised, of</small> $226,800</span>
                                <div style="clear:both;margin-top:10px;" class="custom-progress-bar">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; ">
                                        <div style="background-color: #7d452b; height: 100%; width: 100%; "></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="meal-action">
                    <a class="text-white" onclick="moveToSponsorMeal()">Sponsor Meals</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- wpo-case-area end -->

<!-- wpo-event-area start -->
<div class="wpo-event-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title" id="locations-header">
                    <h2>Meal & Location-Specific Sponsorship</h2>
                    <span>Choose a specific meal and location to direct your donation</span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <h1 class='group-name' id='grp-1'>Rosh Hashanah <a href='https://hh23.masbia.org/group/rh23'>View page</a></h1>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-186'>
                    <div class="wpo-event-text">
                        <h2>Rosh Hashana first night meal</h2>
                        <h4>שֵׁיִרְבּוּ זָכִיּוֹתֵינוּ</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,970 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="109.99999958277">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,822 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="104.50000011921">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $3,294 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="122">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Rosh Hashana first night meal', '54', '186', '0', 'Any', '1', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Rosh Hashana first night meal', '54', '186', '0', 'Any', '1', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-187'>
                    <div class="wpo-event-text">
                        <h2>Rosh Hashana first day meal</h2>
                        <h4>חֶסֶד וֶאֱמֶת יְקַדְּמוּ פָנֶיךָ <br>(תהלים פט טו)</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,862 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="106.0000000149">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $3,294 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="122">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,926 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="108.36000007391">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Rosh Hashana first day meal', '54', '187', '0', 'Any', '1', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Rosh Hashana first day meal', '54', '187', '0', 'Any', '1', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-188'>
                    <div class="wpo-event-text">
                        <h2>Rosh Hashana second night meal</h2>
                        <h4>שֶׁהֶחֱיָנוּ</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $3,132 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="116">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $3,520 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="130.38000011444">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,970 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="110">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Rosh Hashana second night meal', '54', '188', '0', 'Any', '1', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Rosh Hashana second night meal', '54', '188', '0', 'Any', '1', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-189'>
                    <div class="wpo-event-text">
                        <h2>Rosh Hashana second day meal</h2>
                        <h4>וְשִׁלְחוּ מָנוֹת לְאֵין נָכוֹן לוֹ <br>(נחמי-ה ח, י)</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,732 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.18000000715">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,793 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="103.44000011683">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,722 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.80000019073">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Rosh Hashana second day meal', '54', '189', '0', 'Any', '1', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Rosh Hashana second day meal', '54', '189', '0', 'Any', '1', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <h1 class='group-name' id='grp-8'>Tzoim Gedalia <a href='https://hh23.masbia.org/group/tg23'>View page</a></h1>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-190'>
                    <div class="wpo-event-text">
                        <h2>Tzoim Gedalia meal</h2>
                        <h4>אגרא דתעניתא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $3,036 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="112.46000009775">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,884 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="106.82000005245">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,913 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="107.88000005484">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Tzoim Gedalia meal', '54', '190', '0', 'Any', '8', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Tzoim Gedalia meal', '54', '190', '0', 'Any', '8', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <h1 class='group-name' id='grp-9'>Shabbos Shuva <a href='https://hh23.masbia.org/group/ss23'>View page</a></h1>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-191'>
                    <div class="wpo-event-text">
                        <h2>Shabbos Shuva night meal</h2>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,725 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.9200007543">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,748 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.76000034809">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,718 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.66000002623">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Shabbos Shuva night meal', '54', '191', '0', 'Any', '9', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Shabbos Shuva night meal', '54', '191', '0', 'Any', '9', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-192'>
                    <div class="wpo-event-text">
                        <h2>Shabbos Shuva day meal</h2>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,724 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.88000035286">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,725 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.92000029236">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,796 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="103.5400005579">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Shabbos Shuva day meal', '54', '192', '0', 'Any', '9', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Shabbos Shuva day meal', '54', '192', '0', 'Any', '9', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <h1 class='group-name' id='grp-3'>Yom Kippur <a href='https://hh23.masbia.org/group/yh23'>View page</a></h1>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-193'>
                    <div class="wpo-event-text">
                        <h2>Erev Yom Kippur first meal</h2>
                        <h4>שלחנו כפרה</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,731 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.14000047743">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,719 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.70000033826">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,729 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.06000006199">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Erev Yom Kippur first  meal', '54', '193', '0', 'Any', '3', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Erev Yom Kippur first  meal', '54', '193', '0', 'Any', '3', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-194'>
                    <div class="wpo-event-text">
                        <h2>Erev Yom Kippur second meal</h2>
                        <h4>סעודת המפסקת</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,702 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.08000025153">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,738 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.40000039339">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,842 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="105.26000005007">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Erev Yom Kippur second meal', '54', '194', '0', 'Any', '3', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Erev Yom Kippur second meal', '54', '194', '0', 'Any', '3', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-195'>
                    <div class="wpo-event-text">
                        <h2>Yom Kippur night meal</h2>
                        <h4>הֲלוֹא פָרֹס לָרָעֵב לַחְמֶךָ</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,715 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.54000047594">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,776 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="102.82000041008">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $3,114 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="115.34000003338">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Yom Kippur night meal', '54', '195', '0', 'Any', '3', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Yom Kippur night meal', '54', '195', '0', 'Any', '3', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <h1 class='group-name' id='grp-4'>Sukkos <a href='https://hh23.masbia.org/group/sukkos23'>View page</a></h1>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-196'>
                    <div class="wpo-event-text">
                        <h2>Sukkos first night meal</h2>
                        <h4>אַבְרָהָם רְחִימָא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,736 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.34000021219">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,741 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.52000030875">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,752 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.92000001669">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos first night meal', '54', '196', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos first night meal', '54', '196', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-197'>
                    <div class="wpo-event-text">
                        <h2>Sukkos first day meal</h2>
                        <h4>אַבְרָהָם רְחִימָא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,715 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.56000030041">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,704 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.16000045836">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,748 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.75999999046">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos first day meal', '54', '197', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos first day meal', '54', '197', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-198'>
                    <div class="wpo-event-text">
                        <h2>Sukkos second night meal</h2>
                        <h4>יִצְחָק עֲקִידְתָּא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,947 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="109.16000062227">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,724 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.88000065088">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,751 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.90000027418">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos second night meal', '54', '198', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos second night meal', '54', '198', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-199'>
                    <div class="wpo-event-text">
                        <h2>Sukkos second day meal</h2>
                        <h4>יִצְחָק עֲקִידְתָּא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,726 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.96000025421">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,705 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.20000016689">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,726 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.96000033617">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos second day meal', '54', '199', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos second day meal', '54', '199', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-200'>
                    <div class="wpo-event-text">
                        <h2>Sukkos third night meal</h2>
                        <h4>יַעֲקֹב שְׁלִימְתָּא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,710 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.36000037193">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,728 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.02000039816">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,706 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.24000018835">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos third night meal', '54', '200', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos third night meal', '54', '200', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-201'>
                    <div class="wpo-event-text">
                        <h2>Sukkos third day meal</h2>
                        <h4>יַעֲקֹב שְׁלִימְתָּא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,710 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.36000023782">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,742 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.54000008106">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,700 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos third day meal', '54', '201', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos third day meal', '54', '201', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-202'>
                    <div class="wpo-event-text">
                        <h2>Sukkos forth night meal</h2>
                        <h4>מֹשֶׁה רַעְיָה מְהֵימְנָה</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,726 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.98000013828">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,725 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.92000062764">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,700 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos forth night meal', '54', '202', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos forth night meal', '54', '202', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-203'>
                    <div class="wpo-event-text">
                        <h2>Sukkos forth day meal</h2>
                        <h4>מֹשֶׁה רַעְיָה מְהֵימְנָה</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,706 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.24000043049">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,714 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.52000060678">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,724 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.90000049025">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos forth day meal', '54', '203', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos forth day meal', '54', '203', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-204'>
                    <div class="wpo-event-text">
                        <h2>Sukkos fifth night meal</h2>
                        <h4>אַהֲרֹן כָּהֲנָא קָדִישָׁא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,705 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.20000077039">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,726 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.9800003171">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,748 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.78000003099">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos fifth night meal', '54', '204', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos fifth night meal', '54', '204', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-205'>
                    <div class="wpo-event-text">
                        <h2>Sukkos fifth day meal</h2>
                        <h4>אַהֲרֹן כָּהֲנָא קָדִישָׁא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,749 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.82000013068">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,732 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.19999998808">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,736 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.34000003338">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos fifth day meal', '54', '205', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos fifth day meal', '54', '205', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-206'>
                    <div class="wpo-event-text">
                        <h2>Sukkos sixth night meal</h2>
                        <h4>יוֹסֵף צַדִּיקָא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,710 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.37999999523">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,716 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.58000004292">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,729 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.06000012159">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos sixth night meal', '54', '206', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos sixth night meal', '54', '206', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-207'>
                    <div class="wpo-event-text">
                        <h2>Sukkos sixth day meal</h2>
                        <h4>יוֹסֵף צַדִּיקָא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,743 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.60000002384">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,703 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.12000006437">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,739 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.44000009447">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos sixth day meal', '54', '207', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos sixth day meal', '54', '207', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-208'>
                    <div class="wpo-event-text">
                        <h2>Sukkos seventh night meal</h2>
                        <h4>דָּוִד מַלְכָּא מְשִׁיחָא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,753 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.96000009775">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,750 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.86000007391">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,715 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.55999998003">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos seventh night meal', '54', '208', '0', 'Any', '4', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos seventh night meal', '54', '208', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-209'>
                    <div class="wpo-event-text">
                        <h2>Sukkos seventh day meal</h2>
                        <h4>דָּוִד מַלְכָּא מְשִׁיחָא</h4>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,726 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.96000000834">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,718 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.66000002623">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $840 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                                                                            <a href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos seventh day meal', '54', '209', '3', 'Queens', '4', 'Meal', '34','David / דָּוִד')" style="text-decoration: underline;">Sponsor</a>
                                                                                                    </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="31.100000083447">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 31.100000083447%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos seventh day meal', '54', '209', '0', 'Any', '4', 'Meal', '34')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Sukkos seventh day meal', '54', '209', '0', 'Any', '4', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <h1 class='group-name' id='grp-5'>Shimini Atzeres - Simchas Torah <a href='https://hh23.masbia.org/group/sa-st23'>View page</a></h1>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-210'>
                    <div class="wpo-event-text">
                        <h2>Shmini Atzeres night meal</h2>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,734 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.2600004673">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,717 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.62000024319">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,709 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.3400003314">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Shmini Atzeres night meal', '54', '210', '0', 'Any', '5', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Shmini Atzeres night meal', '54', '210', '0', 'Any', '5', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-211'>
                    <div class="wpo-event-text">
                        <h2>Shmini Atzeres day meal</h2>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,736 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.34000021219">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,713 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.48000019789">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,749 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.82000017166">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Shmini Atzeres day meal', '54', '211', '0', 'Any', '5', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Shmini Atzeres day meal', '54', '211', '0', 'Any', '5', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-212'>
                    <div class="wpo-event-text">
                        <h2>Simchas Torah night meal</h2>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,713 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.48000073433">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $2,733 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="101.22000026703">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $2,707 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                <span style="color: green;">All Covered</span> </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="100.26000059396">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 100%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Simchas Torah night meal', '54', '212', '0', 'Any', '5', 'Meal', '0')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Simchas Torah night meal', '54', '212', '0', 'Any', '5', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12 custom-grid">
                <div class="wpo-event-item" id='sub-grp-213'>
                    <div class="wpo-event-text">
                        <h2>Simchas Torah day meal</h2>
                        <ul>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Boro Park: $2,109 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                                                                            <a href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Simchas Torah day meal', '54', '213', '1', 'Boro Park', '5', 'Meal', '11','')" style="text-decoration: underline;">Sponsor</a>
                                                                                                    </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="78.100000202656">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 78.100000202656%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Flatbush: $668 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                                                                            <a href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Simchas Torah day meal', '54', '213', '2', 'Flatbush', '5', 'Meal', '38','')" style="text-decoration: underline;">Sponsor</a>
                                                                                                    </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="24.740000009537">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 24.740000009537%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>
                                                <i class="fi flaticon-pin"></i>Masbia of Queens: $443 of $2,700                                                    </span>
                                <span style="padding-left: 20px;float: right;">
                                                                                                            <a href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Simchas Torah day meal', '54', '213', '3', 'Queens', '5', 'Meal', '42','')" style="text-decoration: underline;">Sponsor</a>
                                                                                                    </span>
                                <!-- Progress Bar -->
                                <div style="clear:both; margin-top:10px;" class="custom-progress-bar" data-progress="16.399999976158">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; border-radius: 5px;">
                                        <div style="background-color: #4caf50; height: 100%; width: 16.399999976158%; border-radius: 5px;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="sponsor-btn-group">
                            <a class="general-sponsor-btn all" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Simchas Torah day meal', '54', '213', '0', 'Any', '5', 'Meal', '90')">
                                    Sponsor All Remaining Meals
                                </a>
                            <!-- <a class="general-sponsor-btn partial" href="javascript:;" onClick="SponsorMeal('https://hh23.masbia.org', 'Simchas Torah day meal', '54', '213', '0', 'Any', '5', 'Meal', '10')" style="margin-left:5px;">
                                        Sponsor Meals
                                    </a> -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- wpo-event-area end -->

<!-- Recent Donors -->
<div class="wpo-mission-area-2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h2>Recent Donors</h2>
                    <span>Together, We Make a Difference</span>
                </div>
            </div>
            <div class="col-md-6 pull-right ">
                <div class="btn-group">
                    <button type="button" style="background-color: #64733e;" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort By <span id="sortBy"></span>
                </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" onclick="loadMoreDonors(this, 'recent', '')">Recent</button></li>
                        <li><button class="dropdown-item" onclick="loadMoreDonors(this, '', 'topDonors')">Top Donors</button></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wpo-mission-wrap">
            <div class="row donors-list">
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>Sharon Scharf</h5>
                                <h5>$36.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 0.50 raw food package</p>
                            <p><i class="fa fa-clock-o"></i> May 08, 2024 02:21 am</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>Beverly Malek</h5>
                                <h5>$100.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-users'></i> 1.85 guests</p>
                            <p><i class="fa fa-clock-o"></i> Apr 08, 2024 07:07 am</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>ANDREA SIMON</h5>
                                <h5>$72.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 1.00 raw food package</p>
                            <p><i class="fa fa-clock-o"></i> Mar 11, 2024 07:55 pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>Adrianne Rynearson</h5>
                                <h5>$5.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-users'></i> 0.09 guest</p>
                            <p><i class="fa fa-clock-o"></i> Mar 01, 2024 10:21 pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>Hanna Markowitz</h5>
                                <h5>$72.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 1.00 raw food package</p>
                            <p><i class="fa fa-clock-o"></i> Feb 02, 2024 09:20 am</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>Richard Schulhoff</h5>
                                <h5>$100.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 1.39 raw food packages</p>
                            <p><i class="fa fa-clock-o"></i> Jan 11, 2024 11:28 am</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>George Olto</h5>
                                <h5>$72.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 1.00 raw food package</p>
                            <p><i class="fa fa-clock-o"></i> Dec 31, 2023 04:16 pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>Miriam Blaustein</h5>
                                <h5>$72.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 1.00 raw food package</p>
                            <p><i class="fa fa-clock-o"></i> Dec 26, 2023 12:27 pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>Lorraine Barcellos</h5>
                                <h5>$50.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 0.69 raw food package</p>
                            <p><i class="fa fa-clock-o"></i> Dec 17, 2023 09:15 am</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>Esther Sternlicht</h5>
                                <h5>$72.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 1.00 raw food package</p>
                            <p><i class="fa fa-clock-o"></i> Dec 11, 2023 08:25 pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>Molly Andrews</h5>
                                <h5>$1,000.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 13.89 raw food packages</p>
                            <p><i class="fa fa-clock-o"></i> Dec 08, 2023 05:55 am</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-content">
                            <div class="sponsor-head">
                                <h5>David Goldstein </h5>
                                <h5>$18.00</h5>
                            </div>
                            <p class="donation-info"><i class='fa fa-archive'></i> 0.25 raw food package</p>
                            <p><i class="fa fa-clock-o"></i> Dec 01, 2023 11:27 am</p>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="recordLimit" id="recordLimit" value="12">
            <input type="hidden" name="causeID" id="causeID" value="1">
            <input type="hidden" name="baseURL" id="baseURL" value="https://hh23.masbia.org/admin">
            <input type="hidden" name="sortingOption" id="sortingOption" value="">

            <div class="w-100 text-center mt-4">
                <button class="btn theme-btn load-more-btn" onclick="loadMoreDonors(this, '' , '')"> Load More <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- Recent Donors -->

<div class="wpo-case-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h2>Sponsor meals for Yom Tov</h2>
                    <span>Choose a Donation option</span>
                </div>
            </div>
        </div>
        <div class="wpo-case-wrap">
            <div class="wpo-case-slider">
                <div class="wpo-case-single">
                    <div class="wpo-case-item">
                        <div class="wpo-case-content">
                            <div class="wpo-case-text-top text-center">
                                <h2>Rosh Hashanah</h2>
                                <h5>$36,036 <span class="group_of_text"> raised, of</span> $32,400</h5>
                                <div style="clear:both; margin-top:10px;">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; ">
                                        <div class="slide-prog-bar" style="background-color: #4caf50; height: 100%; width: 111.221666685%; "></div>
                                    </div>
                                </div>
                                <h1 style="color: #5b6f33;padding-top: 35px; font-size: 32px;">Fully Sponsored</h1>
                                <!-- Check if progress is less than or equal to 100% before displaying "Still needed" -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wpo-case-single">
                    <div class="wpo-case-item">
                        <div class="wpo-case-content">
                            <div class="wpo-case-text-top text-center">
                                <h2>Yom Kippur</h2>
                                <h5>$25,065 <span class="group_of_text"> raised, of</span> $24,300</h5>
                                <div style="clear:both; margin-top:10px;">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; ">
                                        <div class="slide-prog-bar" style="background-color: #4caf50; height: 100%; width: 103.14888916579%; "></div>
                                    </div>
                                </div>
                                <h1 style="color: #5b6f33;padding-top: 35px; font-size: 32px;">Fully Sponsored</h1>
                                <!-- Check if progress is less than or equal to 100% before displaying "Still needed" -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wpo-case-single">
                    <div class="wpo-case-item">
                        <div class="wpo-case-content">
                            <div class="wpo-case-text-top text-center">
                                <h2>Sukkos</h2>
                                <h5>$112,806 <span class="group_of_text"> raised, of</span> $113,400</h5>
                                <div style="clear:both; margin-top:10px;">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; ">
                                        <div class="slide-prog-bar" style="background-color: #4caf50; height: 100%; width: 99.476190691548%; "></div>
                                    </div>
                                </div>
                                <h1>$594</h1>
                                <!-- Check if progress is less than or equal to 100% before displaying "Still needed" -->
                                <p>Still needed</p>
                            </div>
                            <div class="case-btn">
                                <ul>
                                    <li><a href="javascript:;" onClick="SponsorGroup('https://hh23.masbia.org', 'Sukkos', '54', '0', '0', 'Any', '4', 'Group', '11.00')">Sponsor $594 Now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wpo-case-single">
                    <div class="wpo-case-item">
                        <div class="wpo-case-content">
                            <div class="wpo-case-text-top text-center">
                                <h2>Shimini Atzeres - Simchas Torah</h2>
                                <h5>$27,731 <span class="group_of_text"> raised, of</span> $32,400</h5>
                                <div style="clear:both; margin-top:10px;">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; ">
                                        <div class="slide-prog-bar" style="background-color: #4caf50; height: 100%; width: 85.588333617275%; "></div>
                                    </div>
                                </div>
                                <h1>$4,669</h1>
                                <!-- Check if progress is less than or equal to 100% before displaying "Still needed" -->
                                <p>Still needed</p>
                            </div>
                            <div class="case-btn">
                                <ul>
                                    <li><a href="javascript:;" onClick="SponsorGroup('https://hh23.masbia.org', 'Shimini Atzeres - Simchas Torah', '54', '0', '0', 'Any', '5', 'Group', '86.47')">Sponsor $4,669 Now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wpo-case-single">
                    <div class="wpo-case-item">
                        <div class="wpo-case-content">
                            <div class="wpo-case-text-top text-center">
                                <h2>Tzoim Gedalia</h2>
                                <h5>$8,833 <span class="group_of_text"> raised, of</span> $8,100</h5>
                                <div style="clear:both; margin-top:10px;">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; ">
                                        <div class="slide-prog-bar" style="background-color: #4caf50; height: 100%; width: 109.05333340168%; "></div>
                                    </div>
                                </div>
                                <h1 style="color: #5b6f33;padding-top: 35px; font-size: 32px;">Fully Sponsored</h1>
                                <!-- Check if progress is less than or equal to 100% before displaying "Still needed" -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wpo-case-single">
                    <div class="wpo-case-item">
                        <div class="wpo-case-content">
                            <div class="wpo-case-text-top text-center">
                                <h2>Shabbos Shuva</h2>
                                <h5>$16,434 <span class="group_of_text"> raised, of</span> $16,200</h5>
                                <div style="clear:both; margin-top:10px;">
                                    <div style="background-color: #e6e6e6; height: 10px; width: 100%; ">
                                        <div class="slide-prog-bar" style="background-color: #4caf50; height: 100%; width: 101.44666705529%; "></div>
                                    </div>
                                </div>
                                <h1 style="color: #5b6f33;padding-top: 35px; font-size: 32px;">Fully Sponsored</h1>
                                <!-- Check if progress is less than or equal to 100% before displaying "Still needed" -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- wpo-case-area end -->


<!-- wpo-cta-area start -->
<div class="wpo-cta-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wpo-cta-text">
                    <h2>A Meal for All, A Blessing for All</h2>
                    <p>Join Our Mission to Ensure No One Goes Hungry During Our Holiest Days </p>
                    <div class="btns">
                        <a href="https://hh23.masbia.org/checkout" class="theme-btn">Donate Now</a>
                        <!-- <a href="https://hh23.masbia.org/checkout" class="theme-btn-s2">Checkout</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- wpo-cta-area end -->

<div class="modal fade" id="EventCartModal" tabindex="-1" aria-labelledby="EventCartModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EventCartModalTitle">Sponsor Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="cart_modal">

            </div>
            <div class="modal-footer" style="justify-content: center;">

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input dedicateDonationCheckbox d-none" id="dedicateDonationCheckbox">
                    <label class="form-check-label dedicateDonationCheckbox d-none" for="dedicateDonationCheckbox">Dedicate my donation in honor of someone's Ushpizin</label>
                </div>

                <button type="button" class="btn btn-primary" onClick="AddToCart('https://hh23.masbia.org')">Choose more items</button>
                <button class="btn btn-success ms-4" onClick="GoToCheckout('https://hh23.masbia.org')">Sponsor Now</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DedicationModal" tabindex="-1" aria-labelledby="DedicationModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DedicationModalTitle"> Ushpizin Dedication Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="cart_modal">
                <form method="post" action="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default UshpizinName">
                                    <label>Ushpizin Name</label>
                                    <input readonly type="text" name="donateForTheDay" id="donateForTheDay" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Honoree First Name</label>
                                    <input id="donatedToFirstName" name="donatedToFirstName" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Honoree Last Name</label>
                                    <input id="donatedToLastName" name="donatedToLastName" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Honoree Email</label>
                                    <input id="donatedToEmail" name="donatedToEmail" type="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Dedication Message</label>
                                    <textarea class="form-control" id="donatedToMsg" name="donatedToMsg" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onClick="GoToCheckout('https://hh23.masbia.org', 1)" class="btn btn-primary btn-cons">Continue</button>
                        <!-- <button type="button" class="btn btn-primary btn-cons" data-bs-dismiss="modal">Close</button> -->
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer" style="justify-content: center;">
            <button class="btn btn-success ms-4" onClick="DedicateMeal('https://hh23.masbia.org')"> Dedicate Meal</button>
        </div> -->
        </div>
    </div>
</div>

<div class="wpo-ne-footer">
    <!-- start wpo-site-footer -->
    <footer class="wpo-site-footer">
        <div class="wpo-upper-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-4 col-sm-6">
                        <div class="widget about-widget">
                            <div class="logo widget-title">
                                <img src="https://hh23.masbia.org/assets/images/masbia-logo-light.svg" alt="blog">
                            </div>
                            <p>Masbia is a non-profit 501(c)(3) federally tax-exempt charitable organization.</p>
                            <ul>
                                <li><a href="https://www.facebook.com/masbia/"><i class="ti-facebook"></i></a></li>
                                <li><a href="https://twitter.com/masbia"><i class="ti-twitter-alt"></i></a></li>
                                <li><a href="https://www.instagram.com/masbiask/"><i class="ti-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/user/MasbiaSoupKitchens"><i class="ti-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-4 col-sm-6">
                        <div class="widget link-widget">
                            <div class="widget-title">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="https://hh23.masbia.org">Home</a></li>
                                <li class="nav-item"><a class="nav-link" target="_blank" href="https://www.masbia.org/">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="https://hh23.masbia.org/#locations-header">Locations</a></li>
                                <li class="nav-item"><a class="nav-link" target="_blank" href="https://www.masbia.org/corporate_office/">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-4 col-sm-6">
                        <div class="widget market-widget wpo-service-link-widget">
                            <div class="widget-title">
                                <h3>More info </h3>
                            </div>
                            <p>Mailing Address:</p>
                            <div class="contact-ft">
                                <ul>
                                    <li><i class="fi flaticon-pin"></i>P.O. Box 191181, Brooklyn NY, 11219</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </div>
        <div class="wpo-lower-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <p class="copyright">&copy; 2024 Masbia. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end wpo-site-footer -->
</div>

</div>
<!-- end of page-wrapper -->





@include('frontend.templates.event-template.includes.footer')

@section('scripts')

<script type="module" src="{{ asset('assets/frontend/templates/raffle/js/main.js') }}?v={{ time() }}"></script>

@endsection
