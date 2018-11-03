
<!doctype html>
<html lang="en">

    @include("layouts.header")

    <body>

    @include("layouts.nav")

    <main role="main" class="row">

           @yield("content")

    </main>
      @include("layouts.footer")
    </body>
</html>
