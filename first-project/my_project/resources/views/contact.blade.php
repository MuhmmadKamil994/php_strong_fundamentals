@extends('main');
@section('content')
    
    <h2>Contact Us</h2>
      <p>Have questions or feedback? Fill out the form below and we’ll get back to you as soon as possible.</p>

      <form>
        <label for="name">Your Name</label>
        <input type="text" id="name" placeholder="Enter your name" required>

        <label for="email">Your Email</label>
        <input type="email" id="email" placeholder="Enter your email" required>

        <label for="message">Your Message</label>
        <textarea id="message" rows="5" placeholder="Write your message here..." required></textarea>

        <button type="submit">Send Message</button>
      </form>
@endsection
@section('title')
    Contact
@endsection