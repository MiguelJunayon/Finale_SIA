@extends('layout')

@section('content')
<br><br>
   <div class="container">
       <div class="left-image">
           <img src="https://www.bindwise.com/blog/content/images/2018/06/invenotry-grow.gif" alt="Left Image" style="max-width: 100%; height: auto;">
       </div>
       <div class="middle-content">
         <br>
           <div class="welcome-message">
               <center>
                   <h1>Welcome</h1>
               </center>
           </div>
           <div class="inventory-message">
               <p>&nbsp;Your Inventory Pro: Streamline your inventory management effortlessly. With our comprehensive tools and intuitive interface, you can efficiently track your inventory, manage stock levels, and streamline your operations. Say goodbye to inventory headaches and hello to smooth, hassle-free management.
                  <br>
                  <br>
               </p>
           </div>
       </div>
       <div class="right-image">
           <img src="https://miro.medium.com/v2/resize:fit:1358/0*c2lAlCKN721_oFYo.gif" alt="Right Image" style="max-width: 100%; height: auto;">
       </div>
   </div>
   <style>
   body {
      background-color: #e0f7fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
   }
   .container {
      display: flex;
      justify-content: space-between;
      max-width: 11000px; /* Limit the width */
      padding: 20px;
   }
   .left-image {
       flex: 0 0 30%; /* Set width for left image */
       transition: transform 0.3s ease; /* Add smooth transition */
   }
   .left-image:hover {
       transform: scale(1.05); /* Increase scale on hover */
   }
   .left-image img {
       max-width: 100%; /* Ensure image doesn't exceed container width */
       height: auto; /* Maintain aspect ratio */
       border-radius: 10px;
       box-shadow: 0 0 5px #375f74;
   }
   .middle-content {
       flex: 1; /* Allow middle content to take remaining space */
       padding: 0 20px; /* Add spacing around middle content */
   }
   .right-image {
       flex: 0 0 30%; /* Set width for right image */
       transition: transform 0.3s ease; /* Add smooth transition */
   }
   .right-image:hover {
       transform: scale(1.05); /* Increase scale on hover */
   }
   .right-image img {
       max-width: 100%; /* Ensure image doesn't exceed container width */
       height: auto; /* Maintain aspect ratio */
       border-radius: 10px;
       box-shadow: 0 0 5px #375f74;
   }
   .welcome-message, .inventory-message {
       transition: transform 0.3s ease; /* Add smooth transition */
   }
   .welcome-message:hover, .inventory-message:hover {
       transform: scale(1.05); /* Increase scale on hover */
   }
   .welcome-message {
       font-family: 'Playfair Display', serif;
       font-size: 36px;
       margin-bottom: 20px; /* Add some spacing between sections */
       color: white;
       text-shadow: 0 0 10px grey;
       text-align: justify; /* Justify the welcome message */
       background-color: rgba(55, 95, 116, 0.8); /* Adjust the alpha value as needed */
       border-radius: 5px;
       padding: 2.5px;
       box-shadow:0 0 10px #375f74;
   }
   .inventory-message {
       font-family: 'Playfair Display', serif;
       font-size: 20px;
       color: white;
       text-shadow: 0 0 10px grey;
       text-align: justify; /* Justify the inventory message */
       background-color: rgba(55, 95, 116, 0.8); /* Adjust the alpha value as needed */
       border-radius: 5px;
       box-shadow:0 0 10px #375f74;
       padding: 10px;
   }
   </style>
@endsection
