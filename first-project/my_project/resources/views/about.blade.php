@extends('main')
@section('sidebar')
@parent
    <p>this appended from main content secitons</p>
@endsection
@section('content')
<h2>About Us</h2>
      <p>Welcome to <strong>My Website</strong> — your go-to place for quality content and meaningful connections. We’re passionate about creating digital experiences that inspire and inform.</p>

      <h3>Our Mission</h3>
      <p>Our mission is to deliver valuable information and build a platform where ideas can thrive. We believe in simplicity, clarity, and innovation.</p>

      <h3>Our Team</h3>
      <p>We’re a small group of developers, designers, and content creators working together to bring you the best online experience possible.</p>
@endsection
@section('title')
  About
@endsection