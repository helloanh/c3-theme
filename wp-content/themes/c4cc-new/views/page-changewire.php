<?php
/**
* Template Name: Change Wire
*/
//generate category links for each change wire category
$the_latest_link = getCategorylink( 'The Latest' );
$in_the_headlines_link = getCategorylink( 'In the Headlines' );
$most_read_link = getCategorylink( 'Most Read' );
$contributors_link = getCategorylink( 'Contributors' );
$videos_link = getCategorylink( 'Videos' );
$podcast_link = getCategorylink( 'Podcasts' );
get_header( 'changewire' );
global $hub;
?>
<div id="filter-container">
  <button id="filter-close"><i class="fa fa-times" aria-hidden="true"></i></button>
  <div class="row">
    <form action="#">
      <div class="col-sm-5">
        <ul>
          <li><a href="#">Community Organizing</a></li>
          <li><a href="#">Economic Justice</a></li>
          <li><a href="#">Health Care</a></li>
          <li><a href="#">Housing</a></li>
          <li><a href="#">Immigration</a></li>
          <li><a href="#">Politics</a></li>
          <li><a href="#">Retirement Security</a></li>
          <li><a href="#">Reinvestment</a></li>
          <li><a href="#">See all</a></li>
        </ul>
      </div>
      <div class="col-sm-7">
        <input type="text" placeholder="Search by Keyword"/>
        <input type="text" placeholder="Search by Keyword"/>
        <input type="text" placeholder="Search by Keyword"/>
        <input type="text" placeholder="Search by Keyword"/>
      </div>
    </form>
  </div>
</div><!-- end filter container -->

<div id="hub">
  <div class="container">
    <div class="hub-section section-no-padding row">
      <div class="col-md-8">
        <?php
        if ( $featuredPost = $hub->featuredPost() ) {
        ?>
        <div class="featured-story story-border-top"
          style="background-image: url(<?= $featuredPost->getImage(); ?>)">
          <div class="badge">Featured Story</div>
          <div class="story-badge">
            <small>
            <?= $featuredPost->getCreatedAt(); ?>
            <span><a href="<?= $featuredPost->getAuthorUrl(); ?>"><?= $featuredPost->getAuthorName(); ?></a></span>
            </small>
            <h2><?= $featuredPost->getTitle(); ?></h2>
            <p><?= $featuredPost->getExcerpt(); ?></p>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
      <div class="col-md-4">
        <div class="stories-list story-border-top">
          <div class="badge">The Latest</div>
          <!-- <a href="#" class="see-all">See All</a> -->
        </div>
        <?= $hub->TheLatest(); ?>
      </div>
    </div>
    <div class="hub-section row">
      <div class="col-md-7">
        <div class="stories-list story-border-top">
          <div class="badge">In The Headlines</div>
          <a href="https://communitychange.org/headlines-all/" class="see-all">See All</a>
        </div>
        <?= $hub->inTheHeadlinesCategory(); ?>
      </div>
      <div class="col-md-5">
        <div class="stories-list story-border-top">
          <div class="badge">Most Read</div>
          <a href="https://communitychange.org/most-read-all/" class="see-all">See All</a>
        </div>
        <?= $hub->mostRead(); ?>
      </div>
    </div>
  </div><!-- end container -->
  <div class="hub-section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="stories-list story-border-top">
            <div class="badge">Contributors</div>
            <a href="https://communitychange.org/authors/" class="see-all">See All</a>
          </div>
          <div class="hub-contributors">
            <?= $hub->contributors(); ?>
          </div>
        </div>
        <div class="col-md-8">
          <div class="hub-videos">
            <div class="stories-list story-border-top">
              <div class="badge">Videos</div>
              <<a href="https://communitychange.org/videos-all/" class="see-all">See All</a>
            </div>
            <?= $hub->videos(); ?>
          </div>
          <!-- Podcasts -->
          <div class="hub-podcasts">
            <div class="stories-list story-border-top">
              <div class="badge">Podcasts</div>
              <a href="http://www.choicesandchismes.org/" class="see-all">See All</a>
            </div>
            
            <div class="row fellows">
              <div class="col-xs-12">
                <br>
                <p>Podcasts coming soon!<p>
                </div>
              </div>
              <!-- $hub->podcasts();  -->
            </div>
          </div>
        </div>
      </div><!-- end row -->
    </div><!-- end container -->
  </div> <!-- end hub-section bg-gray -->

  <div class="fellow-section bg-white">
    <div class="container">
      <div class="row">
        <div class="stories-list story-border-top-grey">
          <div class="badge">Fellows Corner</div>
            <a href="https://communitychange.org/real-people/communications-fellows/" class="see-all">Read More</a>
        <div><!-- end stories-list story-border-top-grey -->
      </div><!-- end row -->

      <div class="row">
        <div class="fellows-corner">
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="https://communitychange.org/author/wthomas/">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2015/04/jeremiah-chapman.png" alt="jeremiah-chapman">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Jeremiah Chapman</h4>
              <p>Jeremiah Chapman is a North Carolina-based activist who focuses on raising the voices of people fighting for equality. </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="https://communitychange.org/author/wthomas/">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2015/04/Wendi-Thomas-headshot.jpg" alt="wendy-thomas">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Wendi Thomas</h4>
              <p>Wendi C. Thomas is a social justice activist and award-winning journalist from Memphis, Tennessee. </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="http://www.communitychange.org/author/sland/">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2015/04/Stephanie-Land.jpg" alt="stephanie-land">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Stephanie Land</h4>
              <p>Stephanie is mom to two beautiful girls and their shelter dog, Bodhi. She has worked as a house cleaner and landscaper to make ends meet. </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="https://communitychange.org/real-people/communications-fellows/">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2017/10/stephen-205.jpg" alt="Stephen-Smith">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Stephen Smith</h4>
              <p>Stephen Smith is the Director of the WV Healthy Kids and Families Coalition. </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="http://www.communitychange.org/author/amorales/">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2017/10/Morales-Headshot.jpg" alt="Andrea-Morales">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Andrea Morales</h4>
              <p>Andrea Morales is a Latinx photographer and journalist, who was born in Peru and raised in Miami, Florida.  </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="https://communitychange.org/author/dwellington/">
              <img class="media-object" src="https://communitychange.org/wp-content/uploads/2015/04/darrylw-1.gif" alt="Darryl-Lorenzo-Wellington"></a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Darryl Lorenzo Wellington</h4>
              <p>Darryl is a freelance writer. He has covered post-Katrina New Orleans, poverty exploitation in the plasma industry, and the Charleston massacre. </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="http://KSEOW.com">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2017/10/andykokleongseow.jpg" alt="andykokleongseow">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Kok-Leong Seow</h4>
              <p>Kok-Leong Seow is a DACAmented computer scientist and graduate student at Columbia University. </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="https://www.communitychange.org/author/tkennedy/">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2015/04/ThomasKennedy.png" alt="Thomas-Kennedy">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Thomas Kennedy</h4>
              <p>Born in Argentina, Thomas Kennedy came to the United States with his parents at the age of ten, first living in New Jersey before settling down in Miami. </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="https://communitychange.org/author/jsabur/">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2015/04/sabur_205.jpg" alt="Jamilah Sabur">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Jamilah Sabur</h4>
              <p>Jamilah Sabur is an interdisciplinary artist who was born in Saint Andrew Parish, Jamaica. </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="https://www.communitychange.org/author/stracy/">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2015/04/Sharisse_Tracey.jpg" alt="Sharisse Tracey">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Sharisse Tracey</h4>
              <p>Sharisse Tracey is an Army wife in upstate New York, mother of four, educator and writer whose work has appeared in many publications </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="https://communitychange.org/author/chill">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2015/04/Christen205-1.jpg" alt="Christen Hill">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Christen Hill</h4>
              <p>Christen Hill is a multimedia journalist and video storyteller with a focus on issues of race, social justice and culture. </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
          <div class="media col-xs-12 col-lg-3">
            <div class="media-left">
              <a href="https://communitychange.org/author/mmacdonald/">
                <img class="media-object" src="https://communitychange.org/wp-content/uploads/2015/04/MikkaMacdonald205-1.jpg" alt="Mikka Macdonald">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">Mikka Macdonald</h4>
              <p>Mikka Macdonald is a writer who focuses on social justice issues. She is a communications professional in Washington, D.C.  </p>
            </div>
          </div><!-- end media col-xs-12 col-lg-3 -->
        <div><!-- end fellows-corner-->
      </div><!-- end row -->
    </div><!-- container -->
  </div><!-- end fellow-section bg-white -->
 </div><!-- end hub -->

<?php get_footer( 'changewire' ); ?>