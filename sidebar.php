<?php
include('dbcon.php');
session_start();
if(!isset($_SESSION['username'])){
  header('location:home.html');
}
else{
  $uid= $_SESSION['verified_user_id'];
  $username=$_SESSION['username'];
}
if(isset($_SESSION['bag_status'])){
    $message = $_SESSION['bag_status'];
    echo "<script>alert('$message')</script>";
    unset($_SESSION['bag_status']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="styles.css">
    <script src="fabric.min.js"></script>
    <script src="jquery2.1.4.js"></script>
</head>
<body>
    <section id="header">
        <a href="#"><img src="images/logo.png" class="logo" alt="logo display" ></a>
        <div>
        <ul id="nav">
            <li><a  href="home.php">Home</a></li>
            <li><a class="active" href="sidebar.php">Design</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="bag.php"><i class="far fa-shopping-bag"></i></a></li>
        </ul>
        </div>
    </section>
    <section id="customize">
    <div class="container">
    <div class="tabs">
        <div class="sidebar">
            <button class="tabs_button" data-for-tab="5"><i class="fa fa-tshirt"></i><p>Tshirt Size</p> </button>
            <button class="tabs_button" data-for-tab="1"><i class="fa fa-palette"></i><p>Tshirt Color</p></button>
            <button class="tabs_button" data-for-tab="2"><i class="fa fa-text"></i><p>Add Text</p></button>
            <button class="tabs_button" data-for-tab="3"><i class="fa fa-image"></i><p>Add Art</p></button>
            <button class="tabs_button" data-for-tab="4"><i class="fa fa-upload"></i><p>Upload</p></button>
        </div>
        
        <div class="content" data-tab="1">
            <div class="well" >
                <div class="bell">
                <button class="ccd" id="btn1" style="background-color: rgba(162, 184, 205, 1);" onclick="change1()"></button>
                <button class="ccd" id="btn2" style="background-color:rgba(159, 102, 83, 1);"onclick="change2()"></button>
                <button class="ccd" id="btn3" style="background-color: rgba(205, 204, 199, 1);"onclick="change3()"></button>
                <button class="ccd" id="btn4" style="background-color: rgba(33, 34, 38, 1);"onclick="change4()"></button>
                <button class="ccd" id="btn5" style="background-color:rgba(144, 128, 109, 1);"onclick="change5()"></button>
                <button class="ccd" id="btn6" style="background-color: rgba(249, 242, 214, 1);"onclick="change6()"></button>
                <button class="ccd" id="btn7" style="background-color: rgba(254, 103, 66, 1);"onclick="change7()"></button>
                <button class="ccd" id="btn8" style="background-color: rgba(246, 235, 231, 1);"onclick="change8()"></button>
                <button class="ccd" id="btn9" style="background-color: rgba(1, 180, 184, 1);"onclick="change9()"></button>
                <button class="ccd" id="btn10" style="background-color: rgba(249, 249, 251, 1);" onclick="change10()"></button>
                </div>
            </div>
            <p><i>Choose T-shirt color </i></p>
        </div>
        <div class="content" data-tab="2">
            <div class="well">
                <button onclick="Addtext()">Add Text</button>
                <div id="text-wrapper" style="margin-top: 10px" ng-show="getText()">
                
                    <div id="text-controls">
                      <div class="texttype">
                        <label for="text-color">Font color:</label>
                        <input type="color" value="" id="text-color" size="10">
                      </div>
                      <div class="texttype">
                      <label for="font-family" style="display:inline-block">Font family:</label>
                      <select id="font-family">
                        <option value="arial">Arial</option>
                        <option value="helvetica" selected>Helvetica</option>
                        <option value="myriad pro">Myriad Pro</option>
                        <option value="delicious">Delicious</option>
                        <option value="verdana">Verdana</option>
                        <option value="georgia">Georgia</option>
                        <option value="courier">Courier</option>
                        <option value="comic sans ms">Comic Sans MS</option>
                        <option value="impact">Impact</option>
                        <option value="monaco">Monaco</option>
                        <option value="optima">Optima</option>
                        <option value="hoefler text">Hoefler Text</option>
                        <option value="plaster">Plaster</option>
                        <option value="engagement">Engagement</option>
                      </select>
                    </div>
                      <div class="texttype">
                        <label for="text-bg-color">Background color:</label>
                        <input type="color" value="" id="text-bg-color" size="10">
                      </div>
                      <div class="texttype">
                        <label for="text-stroke-color">Stroke color:</label>
                        <input type="color" value="" id="text-stroke-color">
                      </div>
                      <div class="texttype">
                        <label for="text-stroke-width">Stroke width:</label>
                        <input type="range" value="1" min="1" max="5" id="text-stroke-width">
                      </div>
                    </div>
              </div>
           </div>
        </div>
        <div class="content" data-tab="3">
            <p><i>Choose a design</i></p>
							  <div id="art" class="scroller">
                                  <button onclick="ic1()"><img style="cursor:pointer;" class="img-polaroid" src="images/art/1.jpg" ></button>
                                  <button onclick="ic2()"><img style="cursor:pointer;" class="img-polaroid" src="images/art/2.png"></button>
                                  <button onclick="ic3()"><img style="cursor:pointer;"class="img-polaroid" src="images/art/3.png"></button>
                                  <button onclick="ic4()"><img style="cursor:pointer;"class="img-polaroid" src="images/art/4.png"></button>
                                  <button onclick="ic5()"><img style="cursor:pointer;"class="img-polaroid" src="images/art/5.png"></button>
                                  <button onclick="ic6()"><img style="cursor:pointer;" class="img-polaroid" src="images/art/6.jpg"></button>
                                  <button onclick="ic7()"><img style="cursor:pointer;" class="img-polaroid" src="images/art/7.png"></button>
                                  <button onclick="ic8()"><img style="cursor:pointer;" class="img-polaroid" src="images/art/8.png"></button>
                                  <button onclick="ic9()"><img style="cursor:pointer;" class="img-polaroid" src="images/art/9.png"></button>
                                </div>
        </div>
            <div class="content" data-tab="4">
                 <input type="file" id="imgLoader">
            </div>
        
        
        <div class="content" data-tab="5">
            <form action="code.php" method="post">
            <div class="well">				      	
                <select class="tshirtsize" name="tshirt">                        
                  <option value="S">S</option>
                  <option value="M">M</option>                                        
                  <option value="L">L</option>                    
                  <option value="XL">XL</option>
                </select>
                  <p><i>Choose T-shirt size</i></p>
            </div>
        </div>
        </div>
        <input type="hidden" name="username" value="<?= $username?>"> 
        <button  id="btnDisplay" name="save"><a href="">Add to bag</a></button> 
        <input type="hidden" name="userimage" id="imagevalue" value=""> 
        </form>
    </div>
    <a href="#" id="remove" onclick="remove()" title="remove selected object"><i class="fa fa-trash"></i></a> 
    <div class="draw">
       <canvas id="canvas" ></canvas>
    </div>
    
</section>


    <script>
        const imgConverted = document.querySelector("#imgConverted");
        const btnDisplay =document.querySelector("#btnDisplay");
        function setuptabs(){
            document.querySelectorAll(".tabs_button").forEach(button =>{
                button.addEventListener("click",()=>{
                    const sidebar = button.parentElement;
                    const tabcontainer = sidebar.parentElement;
                    const tabNumber = button.dataset.forTab;
                    const tabtoactivate = tabcontainer.querySelector(`.content[data-tab="${tabNumber}"]`);
                    console.log(tabNumber);
                    sidebar.querySelectorAll(".tabs_button").forEach(button=>{
                       button.classList.remove("tabs_button--active"); 
                    });
                   
                    tabcontainer.querySelectorAll(".content").forEach(tab=>{
                       tab.classList.remove("content--active"); 
                    });

                    button.classList.add("tabs_button--active");
                    tabtoactivate.classList.add("content--active");
                });
            });
        }

        document.addEventListener("DOMContentLoaded",()=>{
            setuptabs();
            document.querySelectorAll(".tabs").forEach(tabcontainer=>{
                tabcontainer.querySelector(".sidebar .tabs_button").click();
            });
        });
        fabric.Object.prototype.transparentCorners = false;
       fabric.Object.prototype.padding = 5;
    var canvas = this.__canvas = new fabric.Canvas('canvas');
  	canvas.setHeight(450);
	canvas.setWidth(440);
    function remove(){
       var object = canvas.getActiveObject();
	   if (!object){
		alert('Please select the element to remove');
		return '';
	    }
	   canvas.remove(object);
       }
canvas.setBackgroundImage('images/tshirts/1.png', canvas.renderAll.bind(canvas), {
            top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });

function Addtext() { 
canvas.add(new fabric.IText('Tap and Type', { 
      left: 50,
      top: 100,
      fontFamily: 'arial black',
      fill: '#333',
	    fontSize: 50
}));
}
   document.getElementById('text-color').onchange = function() {
            canvas.getActiveObject().setFill(this.value);
            canvas.renderAll();
        };
		
		document.getElementById('text-bg-color').onchange = function() {
            canvas.getActiveObject().setBackgroundColor(this.value);
            canvas.renderAll();
        };
	

		document.getElementById('text-stroke-color').onchange = function() {
            canvas.getActiveObject().setStroke(this.value);
            canvas.renderAll();
        };

		document.getElementById('text-stroke-width').onchange = function() {
            canvas.getActiveObject().setStrokeWidth(this.value);
            canvas.renderAll();
        };				
	
		document.getElementById('font-family').onchange = function() {
            canvas.getActiveObject().setFontFamily(this.value);
            canvas.renderAll();
        };
        
        function change1(){
            canvas.setBackgroundImage('images/tshirts/1.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        function change2(){
            canvas.setBackgroundImage('images/tshirts/2.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        function change3(){
            canvas.setBackgroundImage('images/tshirts/3.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        function change4(){
            canvas.setBackgroundImage('images/tshirts/4.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        function change5(){
            canvas.setBackgroundImage('images/tshirts/5.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        function change6(){
            canvas.setBackgroundImage('images/tshirts/6.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        function change7(){
            canvas.setBackgroundImage('images/tshirts/7.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        function change8(){
            canvas.setBackgroundImage('images/tshirts/8.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        function change9(){
            canvas.setBackgroundImage('images/tshirts/9.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        function change10(){
            canvas.setBackgroundImage('images/tshirts/10.png', canvas.renderAll.bind(canvas), {
                top: -160,
            left: -60,
            originX: 'left',
            originY: 'top',
            scaleX: 0.6,
            scaleY: 0.6
        });
        }
        
        function ic1(){
        fabric.Image.fromURL('images/art/1.jpg', function(oImg) {
        canvas.add(oImg);
        });}
        function ic2(){
        fabric.Image.fromURL('images/art/2.png', function(oImg) {
        canvas.add(oImg);
        });}
        function ic3(){
        fabric.Image.fromURL('images/art/3.png', function(oImg) {
        canvas.add(oImg);
        });}
        function ic4(){
        fabric.Image.fromURL('images/art/4.png', function(oImg) {
        canvas.add(oImg);
        });}
        function ic5(){
        fabric.Image.fromURL('images/art/5.png', function(oImg) {
        canvas.add(oImg);
        });}
        function ic6(){
        fabric.Image.fromURL('images/art/6.jpg', function(oImg) {
        canvas.add(oImg);
        });}
        function ic7(){
        fabric.Image.fromURL('images/art/7.png', function(oImg) {
        canvas.add(oImg);
        });}
        function ic8(){
        fabric.Image.fromURL('images/art/8.png', function(oImg) {
        canvas.add(oImg);
        });}
        function ic9(){
        fabric.Image.fromURL('images/art/9.png', function(oImg) {
        canvas.add(oImg);
        });}
        btnDisplay.addEventListener("click",function() {
            const Dataurl = canvas.toDataURL();
            document.getElementById("imagevalue").value=Dataurl;
            console.log(Dataurl);
            imgConverted.src =Dataurl;
        });
        document.getElementById('imgLoader').onchange = function handleImage(e) {
        var reader = new FileReader();
        reader.onload = function (event) { console.log('fdsf');
        var imgObj = new Image();
        imgObj.src = event.target.result;
        imgObj.onload = function () {
            var image = new fabric.Image(imgObj);
            image.set({
                left: 250,
                top: 250,
                cornersize: 10
            });
            canvas.add(image);

        }
        
    }
    reader.readAsDataURL(e.target.files[0]);
}

    </script>
</body>
</html>
