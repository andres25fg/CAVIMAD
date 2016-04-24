<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAVIMAD</title>
    
    <!-- Styles -->
    
    <?php echo $this->Html->css('font-awesome.min.css');?>
    <?php echo $this->Html->css('bootstrap.min.css');?>
    <?php echo $this->Html->css('dropdown-menu.css');?>
    <?php echo $this->Html->css('jquery.fancybox.css');?>
    <?php echo $this->Html->css('style.css');?>
    <!--<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"><!-- font-awesome -->
    <!--<link href="css/dropdown-menu.css" rel="stylesheet" type="text/css"><!-- dropdown-menu -->
   <!-- <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Bootstrap -->
    <!--<link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css"><!-- Fancybox -->
   <!-- <link href="css/style.css" rel="stylesheet" type="text/css"><!-- theme styles -->
   
   
    <base href="https://cavimad-esteban0589.c9users.io/"/><!-- theme styles -->

  </head>
  
  <body role="document">
  
    <!-- device test, don't remove. javascript needed! -->
    <span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span class="visible-lg"></span>
    <!-- device test end -->
    
    <div id="header" class="container"> 
       	<div id="k-site-logo" class="pull-left"><!-- site logo -->
        
            <h1 class="k-logo">
                <a href="http://www.ucr.ac.cr" title="Pagina oficial Universidad de Costa Rica">
                    <img src="app/webroot/img/ucr.gif" alt="UCR" width="100"; />
                </a>
            </h1>
            
            <a id="mobile-nav-switch" href="#drop-down-left"><span class="alter-menu-icon"></span></a><!-- alternative menu button -->
    
    	</div><!-- site logo end -->
        <ul class="list-inline pull-right">
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Calendar</a></li>
                    <li><a href="#">Directions</a></li>
                </ul>
        

    </div>
    
    <div id="k-head" ><!-- container + head wrapper -->
    
        <div class="container">
    
    	    <div class="row"><!-- row -->
        
            
        
        	<div class="col-lg-12">
        

            	<nav id="k-menu" class="k-main-navig"><!-- main navig -->
        
                    <ul id="drop-down-left" class="k-dropdown-menu">
                        <li>
                            <a href="" title="Pagina inicial">Inicio</a>
                        </li>
                        <li>
                            <a href="" title="Catalogo de especies">Catalogo</a>
                        </li>
                        <li>
                            <a href="" title="Biomonitoreo(Descargas y referencias)">Biomonitoreo</a>
                        </li>
                        <li>
                            <a href="" title="Colaboradores(Informacion de los colaboradores)">Colaboradores</a>
                        </li>
                        <li>
                            <a href="" title="Referencias(Informacion descargable y enlaces utiles)">Referencias</a>
                        </li>
                        <li>
                            <a href="" title="Sobre nosotros(Nuestra Historia)">Sobre nosotros</a>
                        </li>
                        <li>
                            <a href="" title="Contactenos">Contactenos</a>
                        </li>
                        <!--
                        <li>
                            <a href="#" class="Pages Collection" title="More Templates"></a>
                            <ul class="sub-menu">
                                <li><a href="news-single.html">News Single Page</a></li>
                                <li><a href="events-single.html">Events Single Page</a></li>
                                <li><a href="courses-single.html">Course Single Page</a></li>
                                <li><a href="gallery-single.html">Gallery Single Page</a></li>
                                <li><a href="news-stacked.html">News Stacked Page</a></li>
                                <li><a href="search-results.html">Search Results Page</a></li>
                                <li>
                                    <a href="#">Menu Test</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Second Level 01</a></li>
                                        <li>
                                            <a href="#">Second Level 02</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Third Level 01</a></li>
                                                <li><a href="#">Third Level 02</a></li>
                                                <li><a href="#">Third Level 03</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Second Level 03</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="about-us.html" title="How things work">About Us</a>
                            <ul class="sub-menu">
                                <li><a href="full-width.html">Full Width Page</a></li>
                                <li><a href="sidebar-left.html">Sidebar on Left</a></li>
                                <li><a href="formatting.html">Formatting</a></li>
                                <li><a href="school-leadership.html">School Leadership</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="404.html">404 Error</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact-us.html" title="School Contacts">Contact Us</a>
                        </li>
                        -->
                    </ul>
        
            	</nav><!-- main navig end -->
            
            </div>
            
        </div><!-- row end -->
    
        </div>
    </div><!-- container + head wrapper end -->
    
     <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
                <div id="k-top-search" class="col-lg-12 clearfix"><!-- top search -->
                
                    <form action="#" id="top-searchform" method="get" role="search">
                        <div class="input-group">
                            <input type="text" name="s" id="sitesearch" class="form-control" autocomplete="off" placeholder="Type in keyword(s) then hit Enter on keyboard" />
                        </div>
                    </form>
                    
                    <div id="bt-toggle-search" class="search-icon text-center"><i class="s-open fa fa-search"></i><i class="s-close fa fa-times"></i></div><!-- toggle search button -->
                
                </div><!-- top search end -->
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                
                	<ol class="breadcrumb">
                    	<li><a href="#">Home</a></li>
                        <li class="active">Page Example</li>
                    </ol>
                    
                </div><!-- breadcrumbs end -->
                
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- content wrapper end -->
    
    <div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
    
	<div id="k-footer"><!-- footer -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row no-gutter"><!-- row -->
            
            	<div class="col-lg-4 col-md-4"><!-- widgets column left -->
            
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Useful links</h1>
                                
                                <ul>
                                	<li><a href="#" title="menu item">Placement Exam Schedule</a></li>
                                    <li><a href="#" title="menu item">Superintendent's Hearing Audio</a></li>
                                    <li><a href="#" title="menu item">Budget Central</a></li>
                                    <li><a href="#" title="menu item">Job Opportunities - Application</a></li>
                                    <li><a href="#" title="menu item">College Acceptances as of May 12</a></li>
                                </ul>
                    
							</li>
                            
                        </ul>
                         
                    </div>
                    
                </div><!-- widgets column left end -->
            	<div class="col-lg-4 col-md-4"><!-- widgets column left -->
            
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Useful links</h1>
                                
                                <ul>
                                	<li><a href="#" title="menu item">Placement Exam Schedule</a></li>
                                    <li><a href="#" title="menu item">Superintendent's Hearing Audio</a></li>
                                    <li><a href="#" title="menu item">Budget Central</a></li>
                                    <li><a href="#" title="menu item">Job Opportunities - Application</a></li>
                                    <li><a href="#" title="menu item">College Acceptances as of May 12</a></li>
                                </ul>
                    
							</li>
                            
                        </ul>
                         
                    </div>
                    
                </div><!-- widgets column left end -->
            	<div class="col-lg-4 col-md-4"><!-- widgets column left -->
            
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Useful links</h1>
                                
                                <ul>
                                	<li><a href="#" title="menu item">Placement Exam Schedule</a></li>
                                    <li><a href="#" title="menu item">Superintendent's Hearing Audio</a></li>
                                    <li><a href="#" title="menu item">Budget Central</a></li>
                                    <li><a href="#" title="menu item">Job Opportunities - Application</a></li>
                                    <li><a href="#" title="menu item">College Acceptances as of May 12</a></li>
                                </ul>
                    
							</li>
                            
                        </ul>
                         
                    </div>
                    
                </div><!-- widgets column left end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- footer end -->
    
    <div id="k-subfooter"><!-- subfooter -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
            	<div class="col-lg-12">
                
                	<p class="copy-text text-inverse">
                    &copy; 2015 Buntington Public Schools. All rights reserved.
                    </p>
                
                </div>
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- subfooter end -->

    <!-- jQuery -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Drop-down -->
    <script src="js/dropdown-menu.js"></script>
    
    <!-- Fancybox -->
	<script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.fancybox-media.js"></script><!-- Fancybox media -->

    <!-- Pie charts -->
    <script src="js/jquery.easy-pie-chart.js"></script>
    
    <!-- Theme -->
    <script src="js/theme.js"></script>-->
    
  </body>
</html>