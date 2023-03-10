<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>WelshPowellR&R</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    
<style>
  input.call-picker
  {
    border: 1px solid #AAA;
    color: #666;
    text-transform: uppercase;
    outline: none;
    padding: 10px;
    width: 85px;
  }
   
  .color-picker
  {
    width: 180px;
    background: #F3F3F3;
    height: 115px;
    padding: 5px;
    border: 5px solid #fff;
    box-shadow: 0px 0px 3px 1px #DDD;
    position: absolute;
    left: 100px;
  }
   
  .color-holder
  {
    background: #ffffff;
    cursor: pointer;
    border: 1px solid #AAA;
    width: 40px;
    height: 36px;
    margin-left: 280px;
    margin-top: -40px;
  }
   
  .color-picker .color-item
  {
    cursor: pointer;
    width: 30px;
    height: 30px;
    list-style-type: none;
    float: left;
    margin: 2px;
    border: 1px solid #DDD;
    margin-left: 3px;
  }
   
  .color-picker .color-item:hover
  {
    border: 1px solid #666;
    opacity: 0.8;
    -moz-opacity: 0.8;
    filter:alpha(opacity=8);
  }
  
  

      </style>
     
    
</head>

<body>
  
  <div class="container">


    <div id="topPanel">
            <h4 ><?=$_SESSION['name']?></h4>
      <div class="row d-flex justify-content-center">
        
        <div class="col-xs-2 col-sm-2 col-md-3 col-lg-6 col-xl-7">

          <div id="canvasContainer" width="600" height="600">
            <canvas id="graphCanvas" width="600" height="600"></canvas>
            <img id="canvasImg" width="600" height="600" usemap="#clickmap">
            <map  id="clickmap" name="clickmap">
            </map>
          </div>
        </div>
        

        <div class="col-xs-10 col-sm-10 col-md-9 col-lg-6 col-xl-5">

          <div id="userInput">
            <div id="vertices" step="1" min="1" max="100" value="10"></div>
            
              
            <div> 
                <label >Color palette
                        <input type="text" name="custom-color" placeholder="#FFFFFF" id="pickcolor" class="call-picker" title="Cliquer ici pour ajouter une couleur">
                          <div class="color-picker" id="color-picker"></div>
                      </label>
              </div>
              
              
              
               <script>
              var colorList = ['808080', 'FF0000', 'FFFF00', '0000FF', '00FF00', 'FF00FF', '800080', 'C0C0C0', '800000', '008000','00FFFF', '008080' ];
              var picker = $('#color-picker');
              
              for (var i = 0; i < colorList.length; i++ )
              {
              
              
              
              picker.append('<li class="color-item" data-hex="' + '#' + colorList[i] + '" style="background-color:' + '#' + colorList[i] + ';"></li>');
              }
              
              $('body').click(function ()
                          {
              picker.fadeIn();
              });
              
              $('.call-picker').click(function(event) {
              event.stopPropagation();
              picker.fadeIn();
              picker.children('li').click(function() {
              var codeHex = $(this).data('hex');
              //$('.color-holder').css('background-color', codeHex);
             
              $('#pickcolor').val(codeHex);
              });
              });
              </script>
            <div id="generateOptions">
              <!--button type="button" class="input active" id="generateRandomButton">Random</button>
              <div  id="generateRandomButton"-->
              <div id="displayOptions">
              <div id="selectCycleLikeButton"> </div>
              <div id="selectWheelLikeButton"> </div>
              <br></div>
              <div id="modifyOptions">
              <div id="addVertexButton"> </div>
              <div id="addRandomEdgeButton"> </div>
              <br>
              <div id="firstVertex" step="1" min="0" max="99" value="0"></div>
              <div id="secondVertex" step="1" min="0" max="99" value="0"></div>
              <div id="toggleCustomEdgeButton"> </div>
              <br> <br>
              <br>
              <div  style="margin-top:75px;"id="colorOptions">
                <div id="result"></div>
                                <div id="result1" hidden ></div>

             <button type="button" class="input active" id="colorUncoloredButton">Uncolored</button>
                
             <button type="button" class="input" id="colorButton"  Onclick="myFunction()">Send</button>

             <button type="button" class="input" id="colorGreedyButton" Onclick="test()">Submit</button>
<script>
document.getElementById("colorGreedyButton").disabled = true;

globalVariableColors=[]//////////////////////////////////////////////
globalVariableColors2=[]
function myFunction() {
  let text = "Are you sure?";
  if (confirm(text) == true) {
    //counter color number
    var arrayColors=[];
    for(i=0;i<=arrayTest.length-1;i++){
      if(!arrayColors.includes(arrayTest[i].colorCell)){
        arrayColors.push(arrayTest[i].colorCell);
      }
    }
    globalVariableColors=arrayColors
    confirm=true;
		 document.getElementById("colorUncoloredButton").disabled = true;
		 document.getElementById("colorGreedyButton").disabled = false;
		 document.getElementById("colorButton").disabled = true;

  } else {
		 document.getElementById("colorUncoloredButton").disabled = false;
		 document.getElementById("colorGreedyButton").disabled = true;
		  alert("Take Your Time!");
    e.preventDefault();

  }
}</script>

                  
                  
                  
              </div>
           
              <br>
            </div>

          </div>
        </div>
      </div>

      <!--div><strong>[Maximized Browser]</strong> Click on the numbers of any two vertices to toggle an edge.</div-->
      <span id="selectedVertexText"></span>


    </div>

  <div id="bottomPanel">

    <table id="graphInformation" class="table table-sm">
      <thead class="thead-dark">
        <tr>
          <th class="columnLabel" scope="col">Vertex <i class="fa fa-sort"></i></th>
          <th class="columnLabel" scope="col">Color <i class="fa fa-sort"></i></th>
          <th class="columnLabel" scope="col">Degree <i class="fa fa-sort"></i></th>
          <th class="columnLabel" scope="col">Neighbors <i class="fa fa-sort"></i></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    </div>
  </div>

</body>
<!--submit timch gire ki thoti butto Random
w lgraph yji ggire ki ykoune butto Uncolored
id ki nahoha matimchiche wellsh et powell
button welsh yog3ide disabled hatan ycolori le dernier sommet

if(akan mbdache min sommet1 fi halite sommet ont le meme degre
ifelse (akan mide  le meme color ll deux sommet adjacence returnO;
else return 10;
))
comparaison  welsh et powell +note 0ou bien 10
kifah tithase les noms avexc les note php-->


<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script type="application/javascript" src="main.js"></script>

</html>
