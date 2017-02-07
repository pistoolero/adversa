<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2017-01-17
 * Time: 17:00
 */
echo "<!DOCTYPE html>".PHP_EOL."<html lang=\"pl\">".PHP_EOL;
Site::load(VIEWS_PATH.'header');
echo "<body>".PHP_EOL;

?>

    <!-- header -->
    <header id="header" class="navbar navbar-default affix-top" data-spy="affix" data-offset-top="400">
        <div class="container">
            <a alt="Mea" class="site-logo" href="/">
                <h2>KFSE</h2>
            </a>
            <nav role="navigation" id="nav-main" class="okayNav">
                <ul class="nav navbar-nav">
                    <li class="active sub-menu">
                        <a class="nav-link" href="/" type="button" id="dropdownMenu1" aria-haspopup="true" aria-expanded="true">Strona główna</a>
                    </li>
                    <li  class="dropdown sub-menu">
                        <a alt="Mea" class="dropdown-toggle nav-link" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Pages</a>
                        <div class="dropdown-menu sub-menu-panel" aria-labelledby="dropdownMenu1">
                            <a alt="Mea" class="sub-menu-item" href="about-us.html">About Us 1</a>
                            <a alt="Mea" class="sub-menu-item" href="about-us2.html">About Us 2</a>
                            <a alt="Mea" class="sub-menu-item" href="team.html">Team Members</a>
                            <a alt="Mea" class="sub-menu-item" href="services.html">Services</a>
                            <a alt="Mea" class="sub-menu-item" href="contact-us.html">Contact Us 1</a>
                            <a alt="Mea" class="sub-menu-item" href="contact-us2.html">Contact Us 2</a>
                            <a alt="Mea" class="sub-menu-item" href="404.html">404</a>
                        </div>
                    </li>
                    <li  class="dropdown sub-menu">
                        <a alt="Mea" class="dropdown-toggle nav-link" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Elements</a>
                        <div class="dropdown-menu sub-menu-panel" aria-labelledby="dropdownMenu1">
                            <a alt="Mea" class="sub-menu-item" href="tab.html">Tabs</a>
                            <a alt="Mea" class="sub-menu-item" href="alert.html">Alert</a>
                            <a alt="Mea" class="sub-menu-item" href="accordion.html">Accordions</a>
                            <a alt="Mea" class="sub-menu-item" href="pricing.html">Pricing Tables</a>
                            <a alt="Mea" class="sub-menu-item" href="buttons.html">Buttons</a>
                            <a alt="Mea" class="sub-menu-item" href="icons.html">Icons</a>
                            <a alt="Mea" class="sub-menu-item" href="carousel.html">Carousel</a>
                            <a alt="Mea" class="sub-menu-item" href="counter.html">Counter</a>
                            <a alt="Mea" class="sub-menu-item" href="map.html">Google Map</a>
                        </div>
                    </li>
                    <li class="dropdown sub-menu">
                        <a alt="Mea" class=" dropdown-toggle nav-link" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Portfolio</a>
                        <div class="dropdown-menu sub-menu-panel" aria-labelledby="dropdownMenu1">
                            <a alt="Mea" class="sub-menu-item" href="portfolio-col-3.html">Portfolio 3 columns</a>
                            <a alt="Mea" class="sub-menu-item" href="portfolio.html">Portfolio 4 columns</a>
                            <a alt="Mea" class="sub-menu-item" href="portfolio-single.html">Portfolio Single</a>
                        </div>
                    </li>
                    <li class="dropdown sub-menu">
                        <a alt="Mea" class="dropdown-toggle nav-link" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Blog</a>
                        <div class="dropdown-menu sub-menu-panel" aria-labelledby="dropdownMenu1">
                            <a alt="Mea" class="sub-menu-item" href="blog.html">Blog Page</a>
                            <a alt="Mea" class="sub-menu-item" href="blog-single.html">Blog Single Page</a>
                        </div>
                    </li>
                    <li class="dropdown sub-menu">
                        <a alt="Mea" class="dropdown-toggle nav-link" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Contact Us</a>
                        <div class="dropdown-menu sub-menu-panel" aria-labelledby="dropdownMenu1">
                            <a alt="Mea" class="sub-menu-item" href="contact-us.html">Contact Us 1</a>
                            <a alt="Mea" class="sub-menu-item" href="contact-us2.html">Contact Us 2</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /header -->
        <?php
        if (isset($_GET['page'])) {
            $require = VIEWS_PATH.'pages/'.$_GET['page'].'.php';
            switch ($_GET['page']) {
                case
                'main':
                    Site::load(VIEWS_PATH.'index');
                    break;
            }
            if(file_exists($require)){
                Site::load(VIEWS_PATH.'pages/'.$_GET['page']);
            }else{
                header("HTTP/1.0 404 Not Found");
                $error = http_response_code();
                Site::load(TEMPLATES_PATH.'errors/404');
                clearstatcache();

            }
        } elseif(!isset($_GET['post'])) {
            require_once __DIR__.DIRECTORY_SEPARATOR . 'index.php';
        }
        if(isset($_GET['post'])) {
            require_once __DIR__.'/post.php';
        }
        ?>
    <!-- Footer Section -->
    <footer class="mea-footer-section">
        <!-- Footer Widget Container -->
        <div class="footer-widget-container">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <div class="col-md-3 single-footer-widget wow animated fadeInUp" data-wow-delay=".2s">
                        <h3 class="footer-title">About MEA</h3>
                        <p>Fresh, innovative, creative, minimalist ... What's your style? You probably won't have a better chance to show off all your potential if it's not by designing a website for your own agency or web studio. It's time to push all those ideas and concepts forward.</p>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-md-3 single-footer-widget recent-news-widget wow animated fadeInUp" data-wow-delay=".3s">
                        <h3 class="footer-title">Recent News</h3>
                        <ul>
                            <li><a href="#">21 things that won’t help you become a better designer</a></li>
                            <li><a href="#">User Experience & Luxury Fashion Brands: A UX Designer’s Perspective</a></li>
                            <li><a href="#">Don’t Listen to Users and 4 Other Myths About Usability Testing</a></li>
                            <li><a href="#">Photoshop Express gets a UI update</a></li>
                        </ul>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-md-3 single-footer-widget recent-work-widget wow animated fadeInUp" data-wow-delay=".4s">
                        <h3 class="footer-title">Recent Works</h3>
                        <ul>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="/public_html/images/work/footer-work1.png" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href=""><h4>Bower JS plugin release</h4></a>
                                        <span>September 20, 2016</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="/public_html/images/work/footer-work2.png" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href=""><h4>Flat Icon collection</h4></a>
                                        <span>October 30, 2016</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-md-3 single-footer-widget footer-contact-widget wow animated fadeInUp" data-wow-delay=".5s">
                        <h3 class="footer-title">Contact Us</h3>
                        <p><span>Phone:</span> 879-890-9767</p>
                        <p><span>Span:</span> support@mea.com</p>
                        <p><span>Twitter:</span> @mea</p>

                        <h3 class="footer-title mt-50">Follow Us</h3>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-github"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-section">
            <div class="container">
                <div class="row">
                    <!-- Copuyright -->
                    <div class="col-md-6">
                        <p>&copy; 2016 MEA Studio. All Rights Reserved.</p>
                    </div>
                    <!-- Footer Links -->
                    <div class="col-md-6 footer-links">
                        <ul>
                            <li>
                                <a href="index.html"><i class="fa fa-home"></i> Homepage</a>
                            </li>
                            <li>
                                <a href="portfolio.html"><i class="fa fa-image"></i> Portfolio</a>
                            </li>
                            <li>
                                <a href="blog.html"><i class="fa fa-pencil"></i> Blog</a>
                            </li>
                            <li>
                                <a href="contact.html"><i class="fa fa-envelope"></i> Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Back To Top -->
    <a href="#" class="back-to-top">
        <div class="ripple-container"></div>
        <i class="fa fa-angle-up">
        </i>
    </a>

    <!-- Preloader -->
    <div id="loader">
        <div class="square-spin">
            <img src="/public_html/images/Preloader.gif" alt="MEA Proloader">
        </div>
    </div>

<?php
Site::load(VIEWS_PATH.'footer');
echo PHP_EOL."</body>".PHP_EOL;
echo PHP_EOL."</html>";
?>