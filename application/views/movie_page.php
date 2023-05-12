<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Movie Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <h1><img src="<?= base_url('assets/images/logo.gif') ?>" width="519" height="63" alt="Online Movie Store" /></h1>
      <div id="nav"> <a href="<?= base_url() ?>" <?= ($param_menu == 'home') ? 'class="active"' : '' ?>>HOME</a> | <a href="<?= base_url('movie/cart') ?>" <?= ($param_menu == 'cart') ? 'class="active"' : '' ?>>view cart <?= ($param_cart > 0) ? "({$param_cart})" : '' ?></a> | <a href="#">help</a> </div>
      <!-- end nav -->
      <a href="#"><img src="<?= base_url('assets/images/header_1.jpg') ?>" width="744" height="145" alt="Harry Potter cd" /></a> <a href="#"><img src="<?= base_url('assets/images/header_2.jpg') ?>" width="745" height="48" alt="" /></a> </div>
    <!-- end header -->
    <dl id="browse">
      <dt>Full Category Lists</dt>
      <dd class="first"><a href="<?= base_url('movie/page/action_adventure') ?>" <?= ($param_category == 'action_adventure') ? 'class="active"' : '' ?>>Action &amp; Adventure</a></dd>
      <dd><a href="<?= base_url('movie/page/animation_manga') ?>" <?= ($param_category == 'animation_manga') ? 'class="active"' : '' ?>>Anime &amp; Manga</a></dd>
      <dd><a href="<?= base_url('movie/page/arthouse_international') ?>" <?= ($param_category == 'arthouse_international') ? 'class="active"' : '' ?>>Art House &amp; International</a></dd>
      <dd><a href="<?= base_url('movie/page/classics') ?>" <?= ($param_category == 'classics') ? 'class="active"' : '' ?>>Classics</a></dd>
      <dd><a href="<?= base_url('movie/page/comedy') ?>" <?= ($param_category == 'comedy') ? 'class="active"' : '' ?>>Comedy</a></dd>
      <dd><a href="<?= base_url('movie/page/cult') ?>" <?= ($param_category == 'cult') ? 'class="active"' : '' ?>>Cult Movies</a></dd>
      <dd><a href="<?= base_url('movie/page/drama') ?>" <?= ($param_category == 'drama') ? 'class="active"' : '' ?>>Drama</a></dd>
      <dd><a href="<?= base_url('movie/page/new_future') ?>" <?= ($param_category == 'new_future') ? 'class="active"' : '' ?>>New &amp; Future Releases</a></dd>
      <dd><a href="<?= base_url('movie/page/horror') ?>" <?= ($param_category == 'horror') ? 'class="active"' : '' ?>>Horror</a></dd>
      <dd><a href="<?= base_url('movie/page/musicals') ?>" <?= ($param_category == 'musicals') ? 'class="active"' : '' ?>>Musicals</a></dd>
      <dd><a href="<?= base_url('movie/page/mystery_suspense') ?>" <?= ($param_category == 'mystery_suspense') ? 'class="active"' : '' ?>>Mystery &amp; Suspense</a></dd>
      <dd><a href="<?= base_url('movie/page/scifi_fantasy') ?>" <?= ($param_category == 'scifi_fantasy') ? 'class="active"' : '' ?>>Science Fiction &amp; Fantasy</a></dd>
      <dd class="last"><a href="<?= base_url('movie/page/western') ?>" <?= ($param_category == 'western') ? 'class="active"' : '' ?>>Westerns</a></dd>
      <dt>Search Your Favourite Movie</dt>
      <dd class="searchform">
        <form action="<?= base_url('movie/search') ?>" method="post">
          <div>
            <select name="cat">
              <option value="category"<?= ($param_category == 'category') ? ' selected' : '' ?>>CATEGORIES</option>
              <option value="action_adventure"<?= ($param_category == 'action_adventure') ? ' selected' : '' ?>>Action &amp; Adventure</option>
              <option value="animation_manga"<?= ($param_category == 'animation_manga') ? ' selected' : '' ?>>Anime &amp; Manga</option>
              <option value="arthouse_international"<?= ($param_category == 'arthouse_international') ? ' selected' : '' ?>>Art House &amp; International</option>
              <option value="classics"<?= ($param_category == 'classics') ? ' selected' : '' ?>>Classics</option>
              <option value="comedy"<?= ($param_category == 'comedy') ? ' selected' : '' ?>>Comedy</option>
              <option value="cult"<?= ($param_category == 'cult') ? ' selected' : '' ?>>Cult Movies</option>
              <option value="drama"<?= ($param_category == 'drama') ? ' selected' : '' ?>>Drama</option>
              <option value="new_future"<?= ($param_category == 'new_future') ? ' selected' : '' ?>>New &amp; Future Releases</option>
              <option value="horror"<?= ($param_category == 'horror') ? ' selected' : '' ?>>Horror</option>
              <option value="musicals"<?= ($param_category == 'musicals') ? ' selected' : '' ?>>Musicals</option>
              <option value="mystery_suspense"<?= ($param_category == 'mystery_suspense') ? ' selected' : '' ?>>Mystery &amp; Suspense</option>
              <option value="scifi_fantasy"<?= ($param_category == 'scifi_fantasy') ? ' selected' : '' ?>>Science Fiction &amp; Fantasy</option>
              <option value="western"<?= ($param_category == 'western') ? ' selected' : '' ?>>Westerns</option>
            </select>
          </div>
          <div>
            <input name="q" type="text" value="<?= (urldecode($param_search) == 'dvd title') ? 'DVD TITLE' : urldecode($param_search) ?>" class="text" />
          </div>
          <div class="softright">
            <input type="image" src="<?= base_url('assets/images/btn_search.gif') ?>" />
          </div>
        </form>
      </dd>
    </dl>
    <div id="body">
      <div class="inner">
<?php
  foreach($param_movies as $key=>$movie) {
?>
        <div class="<?= (($key % 2) == 0) ? 'leftbox' : 'rightbox' ?>">
          <h3><?= $movie->name; ?></h3>
          <img src="<?= base_url('assets/'.$movie->url); ?>" width="93" height="95" alt="photo 1" class="left" />
          <p><b>Price:</b> <b>$<?= $movie->price; ?></b> &amp; eligible for FREE Super Saver Shipping on orders over <b>$<?= $movie->eligibility; ?></b>.</p>
          <p><b>Availability:</b> <?= $movie->availability; ?></p>
          <p class="readmore"><a href="javascript:;" class="buy_now" data-idx="<?= $movie->idx ?>" data-price="<?= $movie->price; ?>">BUY <b>NOW</b></a></p>
          <div class="clear"></div>
        </div>
        <?php if(($key % 2) != 0) { echo '<div class="clear br"></div>'; }?>
<?php
  }
?>
        <div class="clear"></div>
      </div>
      <!-- end .inner -->
    </div>
    <!-- end body -->
    <div class="clear"></div>
    <div id="footer"> Web design by <a href="http://www.freewebsitetemplates.com">free website templates</a> &nbsp;
      <div id="footnav"> <a href="#">Legal</a> | <a href="#">Home</a> </div>
      <!-- end footnav -->
    </div>
    <!-- end footer -->
  </div>
  <!-- end inner -->
</div>
<!-- end wrapper -->
</body>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
<script>
function rfc3986EncodeURIComponent (str) {  
  return encodeURIComponent(str).replace(/[!'()*]/g, escape);
}
$(function() {
  $('input[type="image"]').click(function(e) {
    e.preventDefault();

    var search = ($('input[name="q"]').val() == 'DVD TITLE') ? 'dvd title' : rfc3986EncodeURIComponent($('input[name="q"]').val().toLowerCase());
    var url = '<?= base_url('movie/page/') ?>' + $('select[name="cat"]').val() + '/' + search;

    $(location).attr('href', url);
  });

  $('.buy_now').click(function(e) {
    e.preventDefault();

    form_data = {'idx' : $(this).data('idx'), 'price' : $(this).data('price')}

    $.post('<?= base_url('movie/add') ?>', form_data, function(data) {
      console.log(data);
      if(data.ret) {
        $(location).attr('href', '<?= base_url('movie/cart') ?>');
      }
    }, 'json');
  })
});
</script>
</html>
