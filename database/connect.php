<?php

$conn=mysqli_connect("localhost","root","","book_store1");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }