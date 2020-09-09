<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

require_once(Page::usePartial('head'));
require_once(Page::usePartial('sidebar'));
require_once(Page::usePartial('breadcumb'));

?>

<!-- Main content -->
<section class="content">
  <div class="error-page">
    <h2 class="headline text-warning"> 404</h2>

    <div class="error-content">
      <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

      <p>
        We could not find the page you were looking for.
        Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
      </p>

      <form class="search-form">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        <!-- /.input-group -->
      </form>
    </div>
    <!-- /.error-content -->
  </div>
  <!-- /.error-page -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

require_once(Page::usePartial('footer'));
require_once(Page::usePartial('script'));

?>

</body>
</html>
