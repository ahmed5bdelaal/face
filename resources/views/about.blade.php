@extends('layouts/about')
@extends('layouts/app')
<div class="about-section">
    <h1>About Us Page</h1>
    <p>ahmed abdelaal.</p>
    <p>datac.</p>
  </div>
  
  <h2 style="text-align:center">Our Team</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
        <div class="container">
          <h2>hassan khaled</h2>
          <p class="title">CEO & Founder</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>hassan@example.com</p>
        <p><a class="button" href="{{url('/contact/1')}}" >Contact</a></p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="/w3images/team2.jpg" alt="Mike" style="width:100%">
        <div class="container">
          <h2>islam adel</h2>
          <p class="title">web dev</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>islam@example.com</p>
          <p><a class="button" href="{{url('/contact/2')}}">Contact</a></p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="/w3images/team3.jpg" alt="John" style="width:100%">
        <div class="container">
          <h2>ahmed abddelaal</h2>
          <p class="title">Designer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>ahmed@example.com</p>
          <p><a class="button" href="{{url('/contact/3')}}">Contact</a></p>
        </div>
      </div>
    </div>
  </div>