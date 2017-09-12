<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Crowdsource Platform</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="images/back.jpg" />
<!-- //Custom Theme files --> 
<!-- web font --> 
<link href="//fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>

<body>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #E91E63;
    opacity: 0.7;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 2em;
}

textarea {
    width: 100%;
    height: 80px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}



input[type=submit]:hover {
    background-color: #45a049;
}

input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    margin-top: 25px;
    cursor: pointer;
    
    
}

div {
    width: 50%;
    height: 50%;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;

    margin: auto;
}

label[for="translation"] {
    color: #5c5c5c;
    font-weight: bold;

}
label[for="sentence"] {
    color: #5c5c5c;
    font-weight: bold;
   
}

</style>

<ul>
  <li><a class="active" href="#">A Crowdsource Platform for Bengali to English Translation</a></li>
</ul>
 
 
<div>

  <form action="/action_page.php">
    <label for="sentence">Sentence</label>
<form>
  <textarea readonly>
zakia 
</textarea>
</form>

    <label for="translation">Translation</label>


  <textarea placeholder>type your translation here</textarea>
  
    <input type="Submit" style="position: absolute; right: 25px;" value="Submit">
    <input type="reset" style="position: absolute; right: 150px;" value="Next Sentence">

</form>

</div>
</body>
</html>