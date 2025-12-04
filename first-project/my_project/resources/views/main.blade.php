<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My website-@yield('title')</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
  <header>
    <h1>My Website</h1>
    <nav>
      <a href="/">Home</a>
      <a href="/about">About</a>
      <a href="/contact">Contact</a>
    </nav>
  </header>

  <main>
    <aside>
      @section('sidebar')
      <h3>Sidebar</h3>
      <ul>
        <li><a href="/">Home </a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/contact">contact</a></li>
      </ul>
      @show
          </aside>

    <section>
      @hasSection ('content')
         @yield('content') 
      @else
          <h1>No any content found</h1>
      @endif
      
      
    </section>
  </main>

  <footer>
    <p>&copy; 2025 My Website. All rights reserved.</p>
  </footer>
</body>
</html>
