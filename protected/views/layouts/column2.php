<?php $this->beginContent('//layouts/main'); ?>

  <!-- BODY -->
  <body class="tooltips">
  
  <!-- LOADING ANIMATION -->
  <div id="loading">
    <div class="loading-inner">
      <div class="spinner">
        <div class="cube1"></div>
        <div class="cube2"></div>
      </div>
    </div>
  </div>

  <div class="container">
      
    <!-- Your logo goes here -->
    <div class="logo-brand header sidebar rows">
      <div class="logo">
        <h1><a href="#fakelink"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/logo.png" alt="Logo"> Monster Boost</a></h1>
      </div>
    </div><!-- End div .header .sidebar .rows -->

    <!-- BEGIN SIDEBAR -->
    <div class="left side-menu">
      
      
            <div class="body rows scroll-y">
        
        <!-- Scrolling sidebar -->
                <div class="sidebar-inner slimscroller">
        
          <!-- User Session -->
          <div class="media">
            <a class="pull-left" href="#fakelink">
              <img class="media-object img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/avatar/8.jpg" alt="Avatar">
            </a>
            <div class="media-body">
              Welcome back,
              <h4 class="media-heading"><strong><?php echo Yii::app()->user->first_name ?></strong></h4>
              <a href="<?php echo $this->createUrl('/user/admin/update')?>">Edit</a>
              <a class="md-trigger" data-modal="logout-modal-alt">Logout</a>
            </div><!-- End div .media-body -->
          </div><!-- End div .media -->
          
          
          <!-- Search form -->
          <div id="search">
            <form role="form">
              <input type="text" class="form-control search" placeholder="Search here...">
              <i class="fa fa-search"></i>
            </form>
          </div><!-- End div #search -->
          
          <!-- Sidebar menu -->       
          <div id="sidebar-menu">
            <ul>
              <li><a href="/"><i class="fa fa-home"></i> Dashboard</a></li>
              <li><a href="<?php echo $this->createUrl('/widget/admin'); ?>"><i class="fa fa-leaf"></i> Competition Setup<!--<span class="label label-danger new-circle">COMING SOON</span>--></a></li>
              <li><a href="#"><i class="fa fa-leaf"></i> Stats/Analytics</a></li>
              <li><a href="<?php echo $this->createUrl('/entry/admin'); ?>"><i class="fa fa-leaf"></i> Entries</a></li>
              <li><a href="<?php echo $this->createUrl('/company/update'); ?>"><i class="fa fa-user"></i> Account</a></li>
              <li><a href="#fakelink"><i class="fa fa-bug"></i><i class="fa fa-angle-double-down i-right"></i> Drop Down</a>
                <ul>
                  <li><a href="element-primary.html"><i class="fa fa-angle-right"></i> Primary <span class="label label-success new-circle">UPDATED</span></a></li>
                  <li><a href="element-extended.html"><i class="fa fa-angle-right"></i> Extended</a></li>
                </ul>
              </li>
            </ul>
            <div class="clear"></div>
          </div><!-- End div #sidebar-menu -->
        </div><!-- End div .sidebar-inner .slimscroller -->
            </div><!-- End div .body .rows .scroll-y -->
      
      <!-- Sidebar footer -->
            <div class="footer rows animated fadeInUpBig">
        <div class="progress progress-xs progress-striped active">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
          <span class="progress-precentage">80&#37;</span>
          </div><!-- End div .pogress-bar -->
          <a data-toggle="tooltip" title="See task progress" class="btn btn-default md-trigger" data-modal="task-progress"><i class="fa fa-inbox"></i></a>
        </div><!-- End div .progress .progress-xs -->
            </div><!-- End div .footer .rows -->
        </div>
    <!-- END SIDEBAR -->
    
    
    
    <!-- BEGIN CONTENT -->
        <div class="right content-page">
    
      <!-- BEGIN CONTENT HEADER -->
            <div class="header content rows-content-header">
      
        <!-- Button mobile view to collapse sidebar menu -->
        <button class="button-menu-mobile show-sidebar">
          <i class="fa fa-bars"></i>
        </button>
        
        <!-- BEGIN NAVBAR CONTENT-->        
        <div class="navbar navbar-default" role="navigation">
          <div class="container">
            <!-- Navbar header -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-angle-double-down"></i>
              </button>
            </div><!-- End div .navbar-header -->
            
            <!-- Navbar collapse -->  
            <div class="navbar-collapse collapse">
            
              <!-- Left navbar -->
              <ul class="nav navbar-nav">
                <li>
                  <a href="#fakelink">
                    <i class="fa fa-cog"></i>
                  </a>
                </li>
                
                <!-- Dropdown language -->
                <li class="dropdown">
                  <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">English (US) <i class="fa fa-chevron-down i-xs"></i></a>
                  <ul class="dropdown-menu animated half flipInX">
                    <li><a href="#fakelink">English (British)</a></li>
                    <li><a href="#fakelink">Bahasa Indonesia</a></li>
                    <li><a href="#fakelink">French</a></li>
                  </ul>
                </li>
              </ul>
            
              <!-- Right navbar -->
              <ul class="nav navbar-nav navbar-right top-navbar">
                
                <?php
                /*
                <!-- Dropdown notifications -->
                <li class="dropdown">
                  <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="label label-danger absolute">24</span></a>
                  <ul class="dropdown-menu dropdown-message animated half flipInX">
                    <!-- Dropdown notification header -->
                    <li class="dropdown-header notif-header">New Notifications</li>
                    <li class="divider"></li>
                    
                    <!-- Dropdown notification body -->
                    <li class="unread">
                      <a href="#fakelink">
                      <p><strong>John Doe</strong> Uploaded a photo <strong>&#34;DSC000254.jpg&#34;</strong>
                      <br /><i>2 minutes ago</i></p>
                      </a>
                    </li>
                    <li class="unread">
                      <a href="#fakelink">
                      <p><strong>John Doe</strong> Created an photo album  <strong>&#34;Indonesia Tourism&#34;</strong>
                      <br /><i>8 minutes ago</i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#fakelink">
                      <p><strong>Annisa</strong> Posted an article  <strong>&#34;Yogyakarta never ending Asia&#34;</strong>
                      <br /><i>an hour ago</i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#fakelink">
                      <p><strong>Ari Rusmanto</strong> Added 3 products
                      <br /><i>3 hours ago</i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#fakelink">
                      <p><strong>Hana Sartika</strong> Send you a message  <strong>&#34;Lorem ipsum dolor...&#34;</strong>
                      <br /><i>12 hours ago</i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#fakelink">
                      <p><strong>Johnny Depp</strong> Updated his avatar
                      <br /><i>Yesterday</i></p>
                      </a>
                    </li>
                    
                    <!-- Dropdown notification footer -->
                    <li class="dropdown-footer"><a href="#fakelink"><i class="fa fa-refresh"></i> Refresh</a></li>
                  </ul>
                </li>
                -->
                <!-- End Dropdown notifications -->
              
                
                <!-- Dropdown Messages -->
                <li class="dropdown">
                  <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="label label-danger absolute">24</span></a>
                  <ul class="dropdown-menu dropdown-message animated half flipInX">
                    <!-- Dropdown Messages header -->
                    <li class="dropdown-header notif-header">New Messages</li>
                    
                    <!-- Dropdown messages body -->
                    <li class="divider"></li>
                    <li class="unread">
                      <a href="#fakelink">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/avatar/2.jpg" class="xs-avatar ava-dropdown" alt="Avatar">
                      <strong>John Doe</strong><br />
                      <p>Duis autem vel eum iriure dolor in hendrerit ...</p>
                      <p><i>5 minutes ago</i></p>
                      </a>
                    </li>
                    <li class="unread">
                      <a href="#fakelink">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/avatar/1.jpg" class="xs-avatar ava-dropdown" alt="Avatar">
                      <strong>Annisa Rusmanovski</strong><br />
                      <p>Duis autem vel eum iriure dolor in hendrerit ...</p>
                      <p><i>2 hours ago</i></p>
                      </a>
                    </li>
                    <li>
                      <a href="#fakelink">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/avatar/3.jpg" class="xs-avatar ava-dropdown" alt="Avatar">
                      <strong>Ari Rusmanto</strong><br />
                      <p>Duis autem vel eum iriure dolor in hendrerit ...</p>
                      <p><i>5 hours ago</i></p>
                      </a>
                    </li>
                    
                    <!-- Dropdown messages footer -->
                    <li class="dropdown-footer"><a href="#fakelink"><i class="fa fa-share"></i> See all messages</a></li>
                  </ul>
                </li>
                <!-- End Dropdown messages -->
                */ ?>
              
                <!-- Dropdown User session -->
                <li class="dropdown">
                  <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">Howdy, <strong><?php echo Yii::app()->user->first_name ?></strong> <i class="fa fa-chevron-down i-xs"></i></a>
                  <ul class="dropdown-menu animated half flipInX">
                    <li><a href="#fakelink">My Profile</a></li>
                    <li><a href="#fakelink">Change Password</a></li>
                    <li><a href="#fakelink">Account Setting</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Another action</li>
                    <li><a href="#fakelink">Help</a></li>
                    <!--<li><a href="lock-screen.html">Lock me</a></li>-->
                    <li><a class="md-trigger" data-modal="logout-modal">Logout</a></li>
                  </ul>
                </li>
                <!-- End Dropdown User session -->
              </ul>
            </div><!-- End div .navbar-collapse -->
          </div><!-- End div .container -->
        </div>
        <!-- END NAVBAR CONTENT-->
            </div>
      <!-- END CONTENT HEADER -->
      
      
      
      
      <!-- ============================================================== -->
      <!-- START YOUR CONTENT HERE -->
      <!-- ============================================================== -->
            <div class="body content rows scroll-y">

				<!-- Page header -->
					<div class="page-heading animated fadeInDownBig">
						<h1><?php echo CHtml::encode($this->pageTitle); ?> <small><?php echo CHtml::encode($this->pageSubTitle); ?></small></h1>
					</div>
				<!-- End page header -->

        <?php
        // if we have a message in the session then display it here
        /*
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <strong>Success!</strong> Best check yo self, you're not looking too good.
        </div>
        */
        ?>

        <?php if(Yii::app()->user->hasFlash('mainContentSucess')): ?>
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('mainContentSucess'); ?>.
          </div>
        <?php endif; ?>

        <?php if(Yii::app()->user->hasFlash('mainContentError')): ?>
          <div class="alert alert-error alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('mainContentError'); ?>.
          </div>
        <?php endif; ?>

				<?php echo $content; ?>

				<!-- Footer -->
					<footer>
						&copy; 2014 <a href="#">Monsterboost Admin</a>. Created with love by <a href="#" target="_blank">The Four Amigos</a>
					</footer>
				<!-- End Footer -->

            </div>
      <!-- ============================================================== -->
      <!-- END YOUR CONTENT HERE -->
      <!-- ============================================================== -->
      
      
        </div>
    <!-- END CONTENT -->
    
    
    
    
    
    <!--
    ============================================================================
    MODAL DIALOG EXAMPLE
    You can change transition style, just view element page
    ============================================================================
    -->
    <!-- Modal Logout Primary -->
    <div class="md-modal md-fall" id="logout-modal">
      <div class="md-content">
        <h3><strong>Logout</strong> Confirmation</h3>
        <div>
          <p class="text-center">Are you sure want to logout from this awesome system?</p>
          <p class="text-center">
          <button class="btn btn-danger md-close">Nope!</button>
          <a href="/user/logout" class="btn btn-success md-close">Yeah, I'm sure</a>
          </p>
        </div>
      </div>
    </div><!-- End .md-modal -->
    
    <!-- Modal Logout Alternatif -->
    <div class="md-modal md-just-me" id="logout-modal-alt">
      <div class="md-content">
        <h3><strong>Logout</strong> Confirmation</h3>
        <div>
          <p class="text-center">Are you sure want to logout from this awesome system?</p>
          <p class="text-center">
          <button class="btn btn-danger md-close">Nope!</button>
          <a href="/user/logout" class="btn btn-success md-close">Yeah, I'm sure</a>
          </p>
        </div>
      </div>
    </div><!-- End .md-modal -->
    
    <!-- Modal Task Progress -->  
    <div class="md-modal md-slide-stick-top" id="task-progress">
      <div class="md-content">
        <h3><strong>Task Progress</strong> Information</h3>
        <div>
          <p>CLEANING BUGS</p>
          <div class="progress progress-xs for-modal">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
            <span class="sr-only">80&#37; Complete</span>
            </div>
          </div>
          <p>POSTING SOME STUFF</p>
          <div class="progress progress-xs for-modal">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
            <span class="sr-only">65&#37; Complete</span>
            </div>
          </div>
          <p>BACKUP DATA FROM SERVER</p>
          <div class="progress progress-xs for-modal">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
            <span class="sr-only">95&#37; Complete</span>
            </div>
          </div>
          <p>RE-DESIGNING WEB APPLICATION</p>
          <div class="progress progress-xs for-modal">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            <span class="sr-only">100&#37; Complete</span>
            </div>
          </div>
          <p class="text-center">
          <button class="btn btn-danger btn-sm md-close">Close</button>
          </p>
        </div>
      </div>
    </div><!-- End .md-modal -->

    <!-- Generic Modal -->
    <div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" 
                   aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="simpleModalTitle">
                   
                </h4>
             </div>
             <div class="modal-body" id="simpleModalBody">
                
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                   Close
                </button>
                <button type="button" class="btn btn-primary" id="simpleModalSubmit">
                   Submit changes
                </button>
             </div>
          </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php
      Yii::app()->clientScript->registerScript('simpleModal',"
       $('#simpleModal').on('hidden.bs.modal', function () {
          $('#simpleModalBody').html('');$('#simpleModalTitle').html('');
       });
       $('#simpleModalSubmit').on('click', function () {
          var \$form = $('form', '#simpleModalBody');

          $.ajax({
              type: \$form.attr('method'),
              url: \$form.attr('action'),
              data: \$form.serialize(),
   
              success: function(data, status) {
                  $('#simpleModal').modal('hide');
                  //updateReturnPage();
              }
          });
 
          event.preventDefault();
       });

      ");
    ?>


    <!--
    ============================================================================
    END MODAL DIALOG EXAMPLE
    ============================================================================
    -->
    
    <!--
    MODAL OVERLAY
    Always place this div at the end of the page content
    -->
    <div class="md-overlay"></div>
    
    
    
  </div><!-- End div .container -->
  
  </body>

<?php $this->endContent(); ?>