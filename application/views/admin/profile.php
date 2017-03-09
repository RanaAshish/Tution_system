<div class="box-cell">
  <div class="box-inner padding">
    <div class="row row-sm">
      <div class="col-sm-12 text-center">
        <div class="panel panel-card">
          <?php
            if(empty($this->session->user['profile_image']))
                $imgurl = 'assets/images/user-profile.png';
            else
              $imgurl = 'uploads/users/'.$this->session->user['profile_image'];
          ?>
          <div class="r-t pos-rlt " id="bg-profile" md-ink-ripple="" style="background:url(<?=$imgurl?>) center center; background-size:cover">
            <div class="p-lg bg-white-overlay text-center r-t" style="padding: 17px;">
              <div id="crop-avatar"> 
                <a href="javascript:;" class="w-xs inline">
                  <div class="avatar-view" title="Change the avatar">
                    
                    <img src="<?=$imgurl?>" class="img-circle img-responsive">

                  </div>
                </a>

              </div>
              <div class="m-b m-t-sm h2">
                <span class=""><?=ucfirst($this->session->user['username'])?></span>
              </div>
              <!-- <a class="btn btn-sm btn-success m-b p-h no-border waves-effect">Edit</a> -->
              <p>
                Hi you are very smart guy.
              </p>
             
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="panel panel-card">
          <form>
            <div class="panel-body">
                <div class="form-group">
                  <label class="control-label">Current Password</label>
                  <input type="" name="" class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label">New Password</label>
                  <input type="" name="" class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label">Confirm Password</label>
                  <input type="" name="" class="form-control">
                </div>
                <button class="btn btn-primary">Change</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/scripts/Admin/cropper/cropper.min.js"></script>
<script src="assets/scripts/Admin/cropper/main.js"></script>

<!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="admin/profile" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <label for="avatarInput">Local upload</label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                  </div>
                </div>

                <div class="row avatar-btns">
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  <!-- /.modal -->
