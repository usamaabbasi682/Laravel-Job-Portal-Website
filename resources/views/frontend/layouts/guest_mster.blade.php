<!DOCTYPE html>
<html lang="en">
<head>
    @includeIf('frontend.layouts.includes.head_links')
</head>
<body>
   <input type="hidden" value="PK" id="current_country_code">
   @includeIf('frontend.layouts.includes.header')
   @yield('main_content')
   <div class="rt-site-footer bg-gray-900 dark-footer">
      @includeIf('frontend.layouts.includes.footer')
   </div>
   @includeIf('frontend.layouts.includes.footer_links')
</body>
</html>