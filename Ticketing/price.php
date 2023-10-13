<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- animate -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- styles -->
  <link rel="stylesheet" href="price.css" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

  <title>Price Plan</title>
</head>

<body class="b">

<!-- <div class="maindiv"> -->
<img class="logo" src="logo2.png" onclick="home()" alt="">
  <div class="text">
    <p class="t1">PRICE DETAILS</p>
  </div>

  <div class="options">

    <div class="option1">
      <img class="option1-img" src="images/eco.jpg" alt="pool">
      <h2 class="option1-heading"><b>Economy</b></h2>
      <p class="option1-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <button class="option1-btn" type="button" onclick="previous()">PKR 70,000</button>
    </div>

    <div class="option2">
      <img class="option2-img" src="images/business.jpg" alt="pool">
      <h2 class="option2-heading"><b>Business</b></h2>
      <p class="option2-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <button class="option1-btn" type="button" onclick="previous()">PKR 80,000</button>
    </div>

    <div class="option3">
      <img class="option3-img"  src="images/fc.jpg"  alt="pool">
      <h2 class="option3-heading"><b>First Class</b></h2>
      <p class="option3-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <button class="option1-btn" type="button" onclick="previous()">PKR 120,000</button>
    </div>
  </div>



<script type="text/javascript">
  function previous(){
    window.open(
    "next.php", "_self");
  }
</script>
