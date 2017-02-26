<!--
Form wizard documentation
https://cidcode.net/stepformwizard/documentation.html
-->

<div class="box-cell">
    <div class="box-inner padding">
        <div class="card">

            <div class="card-body">

                <div class="row">
                    
                    <!-- BEGIN STEP FORM WIZARD -->
                    <div class="tsf-wizard tsf-wizard-1">
                        <!-- BEGIN NAV STEP-->
                        <div class="tsf-nav-step">
                            <!-- BEGIN STEP INDICATOR-->
                            <ul class="gsi-step-indicator triangle gsi-style-1  gsi-transition ">
                                <li class="current" data-target="step-1">
                                    <a href="#0">
                                        <span class="number">1</span>
                                        <span class="desc">
                                            <label>Tution setup</label>
                                            <span>Tution details</span>
                                        </span>
                                    </a>
                                </li>
                                <li data-target="step-2">
                                    <a href="#0">
                                        <span class="number">2</span>
                                        <span class="desc">
                                            <label>Manage branch</label>
                                            <span>Branch details</span>
                                        </span>
                                    </a>
                                </li>
                                <li data-target="step-3">
                                    <a href="#0">
                                        <span class="number">
                                            3
                                        </span>
                                        <span class="desc">
                                            <label>Manage Standard</label>
                                            <span>Stadard details</span>
                                        </span>
                                    </a>
                                </li>
                                <li data-target="step-4">
                                    <a href="#0">
                                        <span class="number">
                                            4
                                        </span>
                                        <span class="desc">
                                            <label>Manage Shift</label>
                                            <span>Shift details</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <!-- END STEP INDICATOR--->
                        </div>
                        <!-- END NAV STEP-->
                        <!-- BEGIN STEP CONTAINER -->

                        <div class="tsf-container">
                            <!-- BEGIN CONTENT-->
                            <div class="tsf-content">
                                <!-- BEGIN STEP 1-->
                                <div class="tsf-step step-1 active">
                                    <fieldset>
                                        <legend>Provide your tution details</legend>
                                        <form class="tsf-step-content">
                                            <div class="form-group">
                                                <label>Tution Name</label>
                                                <input type="text" class="form-control" placeholder="Enter your tution name" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control" placeholder="Enter your contact number">
                                            </div>
                                            <div class="form-group">
                                                <label>Area</label>
                                                <input type="text" class="form-control" placeholder="Enter your area name">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" placeholder="Street address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Establishment Year</label>
                                                <input type="text" class="form-control year_picker" placeholder="YYYY">
                                            </div>
                                        </form>
                                    </fieldset>
                                </div>
                                <!-- END STEP 1-->
                                <!-- BEGIN STEP 2-->
                                <div class=" tsf-step step-2 ">
                                    <fieldset>
                                        <legend>Provide your Course details</legend>
                                        <!-- BEGIN STEP CONTENT-->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="level_1" level="1">
                                                    <label>Choose education level that you teach:</label>
                                                    <select name="education_level[]" class="form-control level_change" level="1">
                                                        <option value="0">Select education level</option>
                                                        <option value="primary">Primary</option>
                                                        <option value="secodary">Secodary</option>
                                                        <option value="higher_secondary">Higher Secodary</option>
                                                        <option value="bachelor_degree">Bachelor degree courses</option>
                                                        <option value="master_degree">Master degree courses</option>
                                                    </select>
                                                    <div class="course_1">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- END STEP CONTENT-->
                                    </fieldset>
                                </div>
                                <!-- END STEP 2-->
                                <!-- BEGIN STEP 3-->
                                <div class=" tsf-step step-3 ">
                                    <fieldset>
                                        <legend>Provide your standard details</legend>
                                        <!-- BEGIN STEP CONTENT-->
                                        <form class="tsf-step-content">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Card Holder Name </label>
                                                <input type="email" class="form-control" id="example_cardName" placeholder="Enter Card Holder Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Card Number</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Card Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputAddress">CVC </label>
                                                <input type="text" class="form-control" id="exampleInputAddress" placeholder="CVC">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputAddress">Expiration(MM/YYYY)</label>
                                                <input type="text" class="form-control" id="exampleInputAddress" placeholder="MM/YYYY">
                                            </div>

                                        </form>
                                        <!-- END STEP CONTENT-->

                                    </fieldset>
                                </div>
                                <!-- END STEP 3-->
                                <!-- BEGIN STEP 4-->
                                <div class="tsf-step step-4">
                                    <fieldset>
                                        <legend>Provide your Shift details</legend>
                                        <!-- BEGIN STEP CONTENT-->
                                        <div class="row">
                                            <!-- BEGIN STEP CONTENT-->
                                            <form class="tsf-step-content">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-3">
                                                        <div id="profile-preview" class="image-preview">
                                                            <label for="image-upload" id="profile-label">Profile Image</label>
                                                            <input type="file" name="image" id="profile-upload" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div id="cover-preview" class="image-preview coverimage-preview">
                                                            <label for="image-upload" id="cover-label">Cover Image</label>
                                                            <input type="file" name="image" id="cover-upload" />
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                            <!-- END STEP CONTENT-->
                                        </div>
                                        <!-- END STEP CONTENT-->
                                    </fieldset>
                                </div>
                                <!-- END STEP 4-->

                            </div>
                            <!-- END CONTENT-->
                            <!-- BEGIN CONTROLS-->
                            <div class="tsf-controls ">
                                <!-- BEGIN PREV BUTTTON-->
                                <button type="button" data-type="prev" class="btn btn-left tsf-wizard-btn">
                                    <i class="fa fa-chevron-left"></i> PREV
                                </button>
                                <!-- END PREV BUTTTON-->
                                <!-- BEGIN NEXT BUTTTON-->
                                <button type="button" data-type="next" class="btn btn-right tsf-wizard-btn">
                                    NEXT <i class="fa fa-chevron-right"></i>
                                </button>
                                <!-- END NEXT BUTTTON-->
                                <!-- BEGIN FINISH BUTTTON-->
                                <button type="button" data-type="finish" class="btn btn-right tsf-wizard-btn">
                                    FINISH
                                </button>
                                <!-- END FINISH BUTTTON-->
                            </div>
                            <!-- END CONTROLS-->
                        </div>
                        <!-- END STEP CONTAINER -->
                    </div>
                </div>

            </div>

            <script type="text/javascript">
                $(document).ready(function () {
//                    form wizard
                    $('.tsf-wizard-1').tsfWizard({
                        stepEffect: 'basic',
                        stepStyle: 'style4',
                        navPosition: 'top',
                        stepTransition: true,
                        showButtons: true,
                        showStepNum: true,
                        height: 'auto',
                        width: 'auto',
                        disableSteps: 'after_current'
                    });
//                    profile picture
                    $.uploadPreview({
                        input_field: "#profile-upload",
                        preview_box: "#profile-preview",
                        label_field: "#profile-label"
                        });
//                    cover picture    
                    $.uploadPreview({
                        input_field: "#cover-upload",
                        preview_box: "#cover-preview",
                        label_field: "#cover-label"
                        });
//                    datetimepicker
                    $('.year_picker').datetimepicker({format:"YYYY"});
                    
//                    trigger when education level is change
                    $(document).on('change','.level_change',function(){
                        var level = $(this).val();
                        var form_index = $(this).attr('level')
                        console.log("level:",level);
                        console.log("index:",form_index);
                        
                        $.ajax({
                            url: "tution/index/course_form",
                            type: 'POST',
                            data: {'level':level,'index':form_index},
                            success: function (data) 
                            {
                                
                            }
                        })
                    });
                })
            </script>