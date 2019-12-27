</div>
<footer>
  <div class="foo">
    <div class="card">
      <div class="card-body">
        <h6 class="card-header text-center bg-primary" style="color: white;">
          &copy;2019 - All Rights Reserve By Pharmamarket
        </h6>
      </div>
    </div>
  </div>
</footer>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    if ($(window).width() < 768) {
      $('.dropdown-submenu > .dropdown-menu').on('click', function(){
        $(this).css('display', 'block');
        console.log('Less than 1280');
      });
    }
  });
</script>
</html>