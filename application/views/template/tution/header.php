    <!-- aside -->
        <aside id="aside" class="app-aside modal fade " role="menu">
          <div class="left">
            <div class="box bg-white">
              <div class="navbar md-whiteframe-z1 no-radius blue">
                  <!-- brand -->
                  <a class="navbar-brand">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" style="
                          width: 24px; height: 24px;">
                        <path d="M 50 0 L 100 14 L 92 80 Z" fill="rgba(139, 195, 74, 0.5)"></path>
                        <path d="M 92 80 L 50 0 L 50 100 Z" fill="rgba(139, 195, 74, 0.8)"></path>
                        <path d="M 8 80 L 50 0 L 50 100 Z" fill="#f3f3f3"></path>
                        <path d="M 50 0 L 8 80 L 0 14 Z" fill="rgba(220, 220, 220, 0.6)"></path>
                      </svg>
                    <img src="assets/images/logo.png" alt="." style="max-height: 36px; display:none">
                    <span class="hidden-folded m-l inline">Admin</span>
                  </a>
                  <!-- / brand -->
              </div>
              <div class="box-row">
                <div class="box-cell scrollable hover">
                  <div class="box-inner">
                    <div class="p hidden-foldblue" style="background-image:url(assets/images/bg.png); background-size:cover">
                      <div class="rounded w-64 bg-white inline pos-rlt">
                        <img src="assets/images/a0.jpg" class="img-responsive rounded">
                      </div>
                      <a class="block m-t-sm" ui-toggle-class="hide, show" target="#nav, #account">
                        <span class="block font-bold">Admin</span>
                        <span class="pull-right auto">
                          <i class="fa inline fa-caret-down"></i>
                          <i class="fa none fa-caret-up"></i>
                        </span>
						<?php echo $user['username'] ?>
                    </div>
                    <div id="nav">
                      <nav ui-nav>
                        <ul class="nav">
                          <li>
                              <a href="tution" md-ink-ripple href="javascript:;">
                              <i class="fa fa-bank i-20"></i>
                              <span class="font-normal">Branchs</span>
                            </a>
                          </li>
                          <li>
                            <a md-ink-ripple href="subjects">
                              <i class="fa fa-users i-20"></i>
                              <span class="font-normal">Students</span>
                            </a>
                          </li>
                          <li>
                            <a md-ink-ripple href="subjects">
                              <i class="fa fa-graduation-cap i-20"></i>
                              <span class="font-normal">Facultys</span>
                            </a>
                          </li>
                          <li>
                            <a md-ink-ripple>
                              <i class="fa fa-book i-20"></i>
                              <span class="font-normal">Courses</span>
                            </a>
                          </li>
                            <li>
                            <a md-ink-ripple href="subjects">
                              <i class="fa fa-money i-20"></i>
                              <span class="font-normal">Fees</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                    <div id="account" class="hide m-v-xs">
                      <nav>
                        <ul class="nav">
                          <li>
                            <a md-ink-ripple href="page.profile.html">
                              <i class="icon mdi-action-perm-contact-cal i-20"></i>
                              <span>My Profile</span>
                            </a>
                          </li>
                          <li>
                            <a md-ink-ripple href="page.settings.html">
                              <i class="icon mdi-action-settings i-20"></i>
                              <span>Settings</span>
                            </a>
                          </li>
                          <li>
                            <a md-ink-ripple href="logout">
                              <i class="icon mdi-action-exit-to-app i-20"></i>
                              <span>Logout</span>
                            </a>
                          </li>
                          <li class="m-v-sm b-b b"></li>
                          <li>
                            <div class="nav-item" ui-toggle-class="folded" target="#aside">
                              <label class="md-check">
                                <input type="checkbox">
                                <i class="purple no-icon"></i>
                                <span class="hidden-folded">Folded aside</span>
                              </label>
                            </div>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
              <nav>
                <ul class="nav b-t b">
                  <li>
                    <a href="http://themeforest.net/item/materil-responsive-admin-dashboard-template/11062969" target="_blank" md-ink-ripple>
                      <i class="icon mdi-action-help i-20"></i>
                      <span>Help &amp; Feedback</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </aside>
        <!-- / aside -->
        


        