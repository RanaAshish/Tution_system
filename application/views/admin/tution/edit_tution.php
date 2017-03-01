<?php // var_dump($tution_info);die; ?>
<div class="box-cell" ng-app="tution_app" ng-controller="edit_controller">
    <div class="box-inner padding">
        <?php
            if($this->session->flashdata('succ') != null){
        ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?=$this->session->flashdata('succ')?>
        </div>
        <?php
            }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tution Registration
                    </div>
                    <div class="panel-body">
                        <form action="admin/tutions/edit/<?php echo $tution_info['id'] ?>" method="post" class="form-horizontal" role="form" name="registration_form">
                            <input type="hidden" name="contact_id" value="<?php echo $tution_info['contact'] ?>">
                            <input type="hidden" name="user_id" value="<?php echo $tution_info['user_id'] ?>">
                            <input type="hidden" name="branch_id" value="<?php echo $tution_info['branch_id'] ?>">
                            <div class="form-group has-feedback" ng-class="(registration_form.email.$valid) ? 'has-success': (registration_form.email.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Email : </label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" ng-model="email" placeholder="Enter Email" required="" >
                                    <span ng-show="registration_form.email.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.email.$valid && registration_form.email.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-class="(registration_form.username.$valid) ? 'has-success': (registration_form.username.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Username : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" ng-model="username" placeholder="Enter Username" required="">
                                    <span ng-show="registration_form.username.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.username.$valid && registration_form.username.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-class="(registration_form.class_name.$valid) ? 'has-success': (registration_form.class_name.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Class Name : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" minlength="3" name="class_name" ng-model="class_name" placeholder="Enter name of the tution class" required="">
                                    <span ng-show="registration_form.class_name.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.class_name.$valid && registration_form.class_name.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-class="(registration_form.address.$valid) ? 'has-success': (registration_form.address.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Address : </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="address" minlength="3" ng-model="address" placeholder="Type full address of class" required=""></textarea>
                                    <span ng-show="registration_form.address.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.address.$valid && registration_form.address.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-class="(registration_form.established_year.$valid) ? 'has-success': (registration_form.established_year.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Establishment Year : </label>
                                <div class="col-sm-10">
                                    <input type="text" pattern="^[12][0-9]*$" maxlength="4" minlength="4" class="form-control" name="established_year" ng-model="established_year" required=""/>
                                    <span ng-show="registration_form.established_year.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.established_year.$valid && registration_form.established_year.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-class="(registration_form.contact_number.$valid) ? 'has-success': (registration_form.contact_number.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Contact Number : </label>
                                <div class="col-sm-10">
                                    <input type="text" pattern="^[0-9]*$" minlength="7" class="form-control" name="contact_number" ng-model="contact_number" required=""/>
                                    <span ng-show="registration_form.contact_number.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.contact_number.$valid && registration_form.contact_number.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" ng-disabled="registration_form.$invalid">Update Class</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page variables -->
<script type="text/javascript">
    var tution_info = <?php echo json_encode($tution_info); ?>;
</script>
<!-- Page variables -->

<script type="text/javascript" src="assets/scripts/Admin/tution_edit.js"></script>