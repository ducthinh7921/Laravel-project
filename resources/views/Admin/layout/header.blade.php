 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="trangchu">TWatch </a>
            </div>
            <!-- /.navbar-header -->
    
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                         
               
                            <li><a href="edit/{{Auth::user()->code}}"><i class="fa fa-gear fa-fw"></i>Setting</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="resetad/{{Auth::user()->code}}"><i class="fa fa-gear fa-fw"></i>Reset Password</a>
                            </li>
                        
                            <li class="divider"></li>
                            <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        
                        </ul>
                   
                </li>
            </ul>
     
            <!-- /.navbar-top-links -->
         
            @include('Admin.layout.menu')
            <!-- /.navbar-static-side -->
        </nav>