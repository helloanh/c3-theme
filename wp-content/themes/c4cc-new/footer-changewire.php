<?php
global $hubConfig;
?>
<?php wp_footer(); ?>
<section id="join-us" class="pane-section">
    <div class="join-us-form">
        <div class="container">
            <h2>Join Us</h2>
                <div class="row">
                    <form name="signup" action="https://join.communitychange.org/page/s/sign-up" method="post" id="signup">
                        <div class="col-md-4  col-sm-6 col-xs-12">
                            <input class="dark-blue" type="text" name="email" placeholder="Enter your email" value="" id="email" />
                                                     <!-- <label for="zip">Zip</label> <input type="text" placeholder="Zip" name="zip" value="" id="zip" /> -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                           <input class="dark-blue" type="text" placeholder="First" value="" id="firstname" name="firstname" />
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                           <input class="dark-blue" type="text" placeholder="Last" value="" id="lastname" name="lastname" />
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input class="sb-orange" name="submit-btn" class="submit" value="Sign Up" type="submit">
                            <input name="redirect_url" type="hidden" value=""><input id="_guid" name="_guid" type="hidden" value="">
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <div class="join-us-actions">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-4 ele-right">
                    <a href="http://communitychange.org/contact/contact-us/" class="jua-btn">Contact Us</a>
                </div>
                <div class="col-sm-4 col-xs-4 ele-center">
                    <a href="http://communitychange.org/contact/careers/" class="jua-btn align-two-lines">Join Our Team</a>
                </div>
                <div class="col-sm-4 col-xs-4 ele-left">
                    <a href="https://join.communitychange.org/page/contribute/c3-donate-today" class="jua-btn">Donate</a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-8 col-sm-12 col-xs-12 footer-left-bloc">
                    <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <h4><a href="https://communitychange.org/contact/careers/">Career</h4>
                            <h4><a href="https://communitychange.org/contact/contact-us/">Contact</h4>
                            <h4><a href="https://join.communitychange.org/page/contribute/c3-donate-today">Donate</h4>
                            <?=
                            ccc_social_share(
                                WP_HOME,
                                get_bloginfo('title'),
                                get_bloginfo('description'),
                                ['facebook', 'twitter'],
                                'home-social-links'
                            );
                            ?>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 footer-contact">
                            <h4>Address</h4>
                            <ul>
                                <li>Center for Community Change </li>
                                <li> 1536 U Street NW Washington, DC 20009</li>
                                <li>202.339.9300</li>
                                <li><a style="color: #B5C3BD;" href="mailto:info@communitychange.org">info@communitychange.org</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 footer-about">
                            <h4>About</h4>
                            <ul>
                                <li><a href="/real-people/people/mission/">Mission</a></li>
                                <li><a href="/real-people/people/staff/">Staff</a></li>
                                <li><a href="/campaigns/">Campaigns</a></li>
                                <li><a href="/resources/">Resources</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 footer-quicklinks">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="/contact/press/">Press Releases</a></li>
                                <li><a href="/real-people/fellowships/">Fellowships</a></li>
                                <li><a href="/awards/">Change Champions Awards </a></li>
                                <li><a href="/annual-reports/">Annual Reports </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-4 col-sm-12 col-xs-12 footer-right-bloc">
                    <div class="row">
                        <div class="check-out-c4-txt">
                            <h5>Check out our sister organization:</h5>
                        </div>
                        <a href="http://cccaction.org/"><img class="img-responsive c4-logo-footer" alt="cccaction logo" src="<?= asset('images/footer-right-bloc.png') ?>"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="under-footer">
        <div class="container">
            <div class="logos">
                <ul>
                    <li><a href="/"><img class="img-responsive" src="<?= asset('images/logo.png') ?>" alt="CCC Logo"></a></li>
                    <li><a href="https://www.charitynavigator.org/index.cfm?bay=search.summary&orgid=6214#.VmX-3bgrKUk"><img class="img-responsive" src="<?= asset('images/4Star2015.jpg') ?>" alt="Charity Navigator 4 stars"></a></li>
                    <li><a href="http://www.thenonprofittimes.com/news-articles/2015-npt-best-places-to-work-mission-trumps-pay-although-compensation-does-matter/"><img class="img-responsive" src="<?= asset('images/bestorgs2015.jpg') ?>" alt="Best Orgs 2015"></a></li>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <li><a href="/privacy-policy/">Privacy Policy</a></li>
                    <li><a href="/annual-reports/">Financial Information</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>