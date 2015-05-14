<!DOCTYPE html>
<html>
  <head>
        @include('admin.includes.head')
    </head>

  <body>

    <!-- Header Start -->
    <header>
        @include('admin.includes.header')
    </header>
    <!-- Header End -->

    <!-- Main Container start -->
    <div class="dashboard-container">

      <div class="container">
        <!-- Top Nav Start -->
            @include('admin.includes.menu')
        <!-- Sub Nav End -->

        <!-- Dashboard Wrapper Start -->
        <div class="dashboard-wrapper">
          @yield('content')
          <!-- Left Sidebar Start -->
          
          <!-- Right Sidebar End -->
        </div>
        <!-- Dashboard Wrapper End -->

        <footer>
          <p>© BlueMoon 2013-14</p>
        </footer>

      </div>
    </div>
    <!-- Main Container end -->

    <script src="{{SITE_URL}}/public/admin/js/wysi/wysihtml5-0.3.0.min.js"></script>
    <script src="{{SITE_URL}}/public/admin/js/jquery.js"></script>
    <script src="{{SITE_URL}}/public/admin/js/bootstrap.min.js"></script>
    <script src="{{SITE_URL}}/public/admin/js/wysi/bootstrap3-wysihtml5.js"></script>
    <script src="{{SITE_URL}}/public/admin/js/jquery.scrollUp.js"></script>
    
    <!-- Color Picker -->
    <script src="{{SITE_URL}}/public/admin/js/color-picker/jquery.minicolors.js"></script>

    <!-- Custom JS -->
    <script src="{{SITE_URL}}/public/admin/js/menu.js"></script>
    
    <script type="text/javascript">
      //ScrollUp
      $(function () {
        $.scrollUp({
          scrollName: 'scrollUp', // Element ID
          topDistance: '300', // Distance from top before showing element (px)
          topSpeed: 300, // Speed back to top (ms)
          animation: 'fade', // Fade, slide, none
          animationInSpeed: 400, // Animation in speed (ms)
          animationOutSpeed: 400, // Animation out speed (ms)
          scrollText: 'Top', // Text for element
          activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
      });

      //Tooltip
      $('a').tooltip('hide');

      //Popover
      $('.popover-pop').popover('hide');

      //Dropdown
      $('.dropdown-toggle').dropdown();

      //wysihtml5
      $('.textarea').wysihtml5();

      //Color Pickers
      $(document).ready( function() {
      
        $('.demo').each( function() {
          $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom left',
            change: function(hex, opacity) {
              if( !hex ) return;
              if( opacity ) hex += ', ' + opacity;
              try {
                console.log(hex);
              } catch(e) {}
            },
            theme: 'bootstrap'
          });
                
        });
      
      });

    </script>

  </body>
</html>