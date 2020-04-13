<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Weather app</title>
  <link rel="stylesheet" href="main.css" />
</head>
<body>
  <div class="app-wrap">
    <header>
      <input type="text" autocomplete="off" class="search-box" placeholder="Search for a city..." />
    </header>
    <main>
      <section class="location">
        <div class="city">Northampton, GB</div>
        <div class="date">Thursday 10 January 2020</div>
      </section>
      <div class="current">
        <div class="temp">15<span>°c</span></div>
        <div class="weather">Sunny</div>
        <div class="hi-low">13°c / 16°c
        </div>
        <div class="hi-low"><?php echo(3+2)."F"?></div>
      </div>
    </main>
  </div>
  <script src="main.js"></script>
</body>
</html>