//function de generalisation du graph qui a ete pris de : https://tonyruan2.github.io/majestic_colorings/
let recursiveCallCount_ = 0;
const recursiveLimiter_ = 100000;
class Graph {
  constructor(vertexCount = 1, colorshape="#FFFFFF", coloredge="#000000") {
    if (vertexCount <= 0) {
      vertexCount = 1;
    }

    this.vertexCount = vertexCount;
    this.vertexColorMap = new Map();
    this.edgeColorMap = new Map();
    this.colorshape=colorshape;
    this.coloredge=coloredge;
//fonction pour matrice d'adjacent 
    let adjMatrix = new Array(vertexCount);
    for (let i = 0; i < vertexCount; ++i) {
      adjMatrix[i] = new Array(vertexCount);
      this.vertexColorMap.set(i.toString(), colorshape);
    }

    for (let i = 0; i < vertexCount; ++i) {
      for (let j = 0; j < vertexCount; ++j) {
        adjMatrix[i][j] = 0;
      }
    }
    this.adjMatrix = adjMatrix;
  }
  //ajouter arret entre deux sommets
  addEdge(vertex1, vertex2) {
    if (vertex1 < 0 || vertex1 >= this.vertexCount) {
      return;
    }
    if (vertex2 < 0 || vertex2 >= this.vertexCount) {
      return;
    }
    if (vertex1 == vertex2) {
      return;
    }

    this.adjMatrix[vertex1][vertex2] = 1;
    this.adjMatrix[vertex2][vertex1] = 1;

    let arr = [vertex1, vertex2];
    arr.sort();
    this.edgeColorMap.set(arr.join('_'), this.coloredge);
  }

//degree de sommet
  degree(vertex) {
    if (vertex < 0 || vertex >= this.vertexCount) {
      return 0;
    }
    let deg = 0;
    for (let i = 0; i < this.vertexCount; ++i) {
      if (i != vertex && this.adjMatrix[vertex][i] == 1) {
        ++deg;
      }
    }
    return deg;
  }
//liste d'adjacent de sommet
  incidentVertices(vertex) {
    let arr = [];
    if (vertex < 0 || vertex >= this.vertexCount) {
      return arr;
    }
    for (let i = 0; i < this.vertexCount; ++i) {
      if (i != vertex && this.adjMatrix[vertex][i] == 1) {
        arr.push(i);
      }
    }
    return arr;
  }

//les couleurs voisins dapres matrice
  incidentColoredVertices(vertex) {
    let arr = [];
    if (vertex < 0 || vertex >= this.vertexCount) {
      return arr;
    }
    for (let i = 0; i < this.vertexCount; ++i) {
      if (i != vertex && this.adjMatrix[vertex][i] == 1) {
        if (this.vertexColorMap.get(i.toString()) !=this.colorshape) {
          arr.push(i);
        }
      }
    }
    return arr;
  }
//clear graph
  assignUncoloredColoring() {
    for (let key of this.vertexColorMap.keys()) {
  
      this.vertexColorMap.set(key, this.colorshape);
    }
    for (let key of this.edgeColorMap.keys()) {
      this.edgeColorMap.set(key, this.coloredge);
    }
  }
//choisi le suivant coleur
  nextAvailableColor(keyIndex, colorCount) {
    let incidentColoredVertices = this.incidentColoredVertices(keyIndex);
    for (let i = 0; i < colorCount; ++i) {
      let available = true;
      let color = colorBank_[i];

      for (let i = 0; i < incidentColoredVertices.length; ++i) {
        if (color == this.vertexColorMap.get(incidentColoredVertices[i].toString())) {
          available = false;
          break;
        }
      }

      if (available) {
        return color;
      }
    }
    return colorshape;
  }
//la priorite de degre
  degreePriorityArray() {
    let arr = [];
    for (let key of this.vertexColorMap.keys()) {
      arr.push([this.degree(Number(key)), Number(key)]);
    }

    arr.sort(function(a, b) {
      if (a < b) {
        return 1;
      }
      if (a > b) {
        return -1;
      }
      return 0;
    });

    let priorityArr = [];
    for (let i = 0; i < arr.length; ++i) {
      priorityArr.push(arr[i][1]);
    }
    return priorityArr;
  }
//function de welsh powell qui a ???t??? pris de : https://tonyruan2.github.io/majestic_colorings/
  assignGreedyColoring() {
    this.assignUncoloredColoring();
    let priorityArr = this.degreePriorityArray();
    for (let key of priorityArr) {
      let color = this.nextAvailableColor(key, this.vertexCount);
      if (color == this.colorshape) {
        return;
       
      }
      this.vertexColorMap.set(key.toString(), color);
    }}

  
  //-----------------------------------------------------------------------------
//Colorier un sommet identifie par son index
vertexColoring(vertexId, color) {
  this.vertexColorMap.set(vertexId.toString(), color);  
}

//-----------------------------------------------------------------------------

//tester si le couleur est utilise ou non
  isColorAvailable(keyIndex, color) {
    let incidentColoredVertices = this.incidentColoredVertices(keyIndex);
    for (let i = 0; i < incidentColoredVertices.length; ++i) {
      if (color == this.vertexColorMap.get(incidentColoredVertices[i].toString())) {
        return false;
      }
    }
    return true;
  }
}
// Global variables used in drawing and displaying the graph qui a ete pris de : https://tonyruan2.github.io/majestic_colorings/
// first line of colorBank_: gray, red, yellow, blue, lime, fuschia, purple, silver, maroon, green, aqua, teal, navy, olive
const colorBank_ = ["#808080", "#FF0000", "#FFFF00", "#0000FF", "#00FF00", "#FF00FF", "#800080", "#C0C0C0", "#800000", "#008000", "#00FFFF", "#008080", "#000080", "#808000",
"#FF7F50", "#CA226B", "#8467D7", "#7D0552", "#FFA62F", "#348781", "#0000A0", "#8EEBEC", "#810541", "#F7E7CE", "#E67451", "#C24641", "#B4CFEC", "#7FFFD4", "#5EFB6E", "#87F717", "#E38AAE", "#C3FDB8", "#B6B6B4", "#565051", "#FBBBB9", "#842DCE", "#15317E", "#C12869", "#4B0082", "#728C00", "#43C6DB", "#C8B560", "#D462FF", "#9CB071", "#ECE5B6", "#FFDB58", "#6CC417", "#306754", "#F75D59", "#41A317", "#C8A2C8", "#E41B17", "#848482", "#C34A2C", "#7F4E52", "#736F6E", "#FFE87C", "#616D7E", "#B38481", "#FDD017", "#FFDFDD", "#FFE5B4", "#A74AC7", "#FCDFFF", "#342D7E", "#98AFC7", "#DEB887", "#2B60DE", "#FFF380", "#F88017", "#954535", "#FFD801", "#FBB917", "#8C001A", "#E55B3C", "#C19A6B", "#D2B9D3", "#463E3F", "#D1D0CE", "#C11B17", "#4E8975", "#FFF5EE", "#CD7F32", "#CFECEC", "#6CBB3C", "#348017", "#667C26", "#78C7C7", "#6C2DC7", "#FC6C85", "#FFF8C6", "#E3E4FA", "#DC381F", "#7E3817", "#C36241", "#3BB9FF", "#C58917", "#5C5858", "#E56E94", "#4CC417", "#CC6600", "#B041FF", "#CCFFFF", "#F2BB66", "#56A5EC", "#FAAFBA", "#EBDDE2", "#B1FB17", "#B7CEEC", "#566D7E", "#2B3856", "#F5F5DC", "#786D5F", "#827B60", "#C48189", "#E18B6B", "#9172EC", "#43BFC7", "#FDD7E4", "#87AFC7", "#9DC209", "#E66C2C", "#C68E17", "#4C4646", "#827839", "#3B3131", "#46C7C7", "#AF7817", "#EDE275", "#E799A3", "#3D3C3A", "#D16587", "#CCFB5D", "#C38EC7", "#3EA99F", "#5CB3FF", "#646D7E", "#8A4117", "#7F38EC", "#C88141", "#AF9B60", "#1F45FC", "#E0FFFF", "#C12267", "#93FFE8", "#FF2400", "#7BCCB5", "#F0FFFF", "#9F000F", "#E9AB17", "#FF8040", "#8E35EF", "#C2DFFF", "#F535AA", "#0041C2", "#E6A9EC", "#F9A7B0", "#82CAFF", "#614051", "#571B7E", "#F6358A", "#FAAFBE", "#C45AEC", "#C04000", "#A23BEC", "#EDDA74", "#F778A1", "#C35817", "#347C2C", "#FBB117", "#6D6968", "#F70D1A", "#6D7B8D", "#3B9C9C", "#9AFEFF", "#893BFF", "#990012", "#357EC7", "#493D26", "#F52887", "#EE9A4D", "#FAEBD7", "#F433FF", "#E9CFEC", "#D4A017", "#ADA96E", "#38ACEC", "#583759", "#4AA02C", "#E4287C", "#307D7E", "#2B547E", "#1589FF", "#FFEBCD", "#77BFC7", "#2B65EC", "#5E5A80", "#4863A0", "#4E9258", "#52D017", "#736AFF", "#8D38C9", "#7DFDFE", "#7FE817", "#E238EC", "#A0CFEC", "#BDEDFF", "#7F462C", "#6AFB92", "#E8ADAA", "#6AA121", "#E8A317", "#368BC1", "#7F5A58", "#E45E9D", "#151B54", "#C7A317", "#7D0541", "#C9BE62", "#306EFF", "#848b79", "#4E387E", "#151B8D", "#F62817", "#2554C7", "#ECC5C0", "#BCC6CC", "#C2B280", "#FFFFCC", "#625D5D", "#413839", "#F3E5AB", "#F660AB", "#B5A642", "#806517", "#9E7BFF", "#50EBEC", "#6698FF", "#347235", "#EDC9AF", "#7F525D", "#F9966B", "#387C44", "#8BB381", "#C48793", "#79BAEC", "#3090C7", "#FFCBA4", "#726E6D", "#92C7C7", "#B87333", "#82CAFA", "#F87431", "#B048B5", "#666362", "#657383", "#254117", "#6495ED", "#E78A61", "#F0F8FF", "#617C58", "#7E354D", "#B5EAAA", "#C25283", "#461B7E", "#F88158", "#5FFB17", "#E56717", "#7E3517", "#157DEC", "#AFDCEC", "#E2A76F", "#E7A1B0", "#F87217", "#438D80", "#98FF98", "#54C571", "#7F5217", "#89C35C", "#4EE2EC", "#488AC7", "#483C32", "#4CC552", "#95B9C7", "#E55451", "#737CA1", "#6F4E37", "#99C68E", "#7D1B7E", "#A1C935", "#1569C7", "#FBF6D9", "#6960EC", "#48CCCD", "#E5E4E2", "#B2C248", "#EAC117", "#728FCE", "#C25A7C", "#0020C2", "#25383C", "#4C787E", "#34282C", "#EBF4FA", "#504A4B", "#57E964", "#C47451", "#85BB65", "#F62217", "#C12283", "#C6DEFF", "#3EA055", "#659EC7", "#78866B", "#800517", "#E3319D", "#ADDFFF", "#64E986", "#B93B8F", "#7A5DC7", "#FDEEF4", "#FFFFC2", "#C6AEC7", "#BCE954", "#C5908E", "#5E7D7E", "#59E817", "#8AFB17", "#E42217", "#437C17", "#57FEFF", "#81D8D0", "#FFF8DC", "#966F33", "#E77471", "#837E7C", "#6A287E", "#835C3B", "#C85A17", "#7E587E", "#E0B0FF", "#347C17", "#F9B7FF"];

const canvas_ = document.getElementById("graphCanvas");
const context_ = canvas_.getContext("2d");
const clickmap_ = document.getElementById("clickmap");
const canvasWidth_ = 600;
const canvasHeight_ = 600;
const margin_ = 50;
let isDisplayWheel_ = false;
let globalGraph_ = new Graph();
let table_ = document.getElementById("graphInformation");
let firstSelectedVertex = -1;
let secondSelectedVertex = -1;

// Function used to print graph information to the console qui a ???t??? pris de : https://tonyruan2.github.io/majestic_colorings/


function logGraphInformation() {
   console.log("\n_________________");
   console.log("Graph information\n");
   let activeButtons = document.getElementById("colorOptions").getElementsByClassName("active");
   let coloringOption = activeButtons[0].id.replace("color", "").replace("Button", "");
   console.log("Coloring option: " + coloringOption);
   let usedColors = new Set();
   for (let value of globalGraph_.vertexColorMap.values()) {
     usedColors.add(value);
   }
   console.log("Colors used: " + usedColors.size.toString());
   console.log("recursiveCallCount_: " + recursiveCallCount_.toString());
   recursiveCallCount_ = 0;
}
//fonction pour s???lectionner une couleur de la palette et mettre dans la sommet selectionnee
function selectVertex(vertex) {

  var oInput = document.getElementById("pickcolor");

  globalGraph_.vertexColoring(vertex,oInput.value);
  colorGraph_bis(); 
}

function addClickableVertex(vertex, centerX, centerY, radius) {
  let area = document.createElement("AREA");
  area.id = "area" + vertex.toString();
  area.shape = "circle";
  area.coords = centerX.toString() + "," + centerY.toString() + "," + radius.toString();
  clickmap_.appendChild(area);

  document.getElementById(area.id).addEventListener("click", function() {
   selectVertex(vertex);
  
  });
}

//function pour supprimer la selection des sommets
function removeClickableVertices() {
  let areaCount = clickmap_.areas.length;
  for (let i = 0; i < areaCount; ++i) {
    clickmap_.removeChild(clickmap_.areas[0]);
  }
}

// Fonctions utilis???es pour dessiner et mettre ??? jour le graphique et le tableau affich???s qui a ete pris de :https://tonyruan2.github.io/majestic_colorings/ 

function dividePoints(numPoints, width, height, margin_, wheel = isDisplayWheel_) {
  if (numPoints == 0) {
    return [];
  }
  let xyArr = new Array(2 * numPoints);
  let centerX = width / 2;
  let centerY = height / 2;

  let includedCenter = 0;
  if (wheel) {
    xyArr[0] = centerX;
    xyArr[1] = centerY;
    ++includedCenter;
  }

  let degreeInterval = 360.0 / (numPoints - includedCenter);
  let horizontalRadius = width / 2 - margin_;
  let verticalRadius = height / 2 - margin_;

  for (let i = 0; i < numPoints - includedCenter; ++i) {
    let angleClockwise = i * degreeInterval;
    let xCoord = centerX + (horizontalRadius * Math.sin(angleClockwise * Math.PI / 180));
    let yCoord = centerY - (verticalRadius * Math.cos(angleClockwise * Math.PI / 180));
    xyArr[2 * (i + includedCenter)] = xCoord;
    xyArr[2 * (i + includedCenter) + 1] = yCoord;
  }
  return xyArr;
}
//function dessiner sommet avec circle et son couleur blanc avec border noir qui a ete pris de https://tonyruan2.github.io/majestic_colorings/

function drawVertex(vertex, centerX, centerY, radius, color="#FFFFFF") {
  let scalingRatio = 1 - (globalGraph_.vertexCount / 175);
  addClickableVertex(vertex, centerX, centerY, scalingRatio * radius);
  context_.beginPath();
  context_.arc(centerX, centerY, scalingRatio * radius, 0, 2 * Math.PI, false);
  context_.fillStyle = color;
  context_.fill();
  context_.lineWidth = 1;
  context_.strokeStyle = "#000";
  context_.stroke();

  context_.fillStyle =  "#000";
  context_.font = "16px Arial";
  context_.textAlign = "center";
  context_.fillText(vertex.toString(), centerX, centerY + 6);
}
//function dessiner arret avec  son couleur blanc qui a ete pris de https://tonyruan2.github.io/majestic_colorings/

function drawEdge(beginX, beginY, endX, endY, color="#000000") {
  context_.beginPath();
  context_.strokeStyle = color;
  context_.lineWidth = 4;
  context_.moveTo(beginX, beginY);
  context_.lineTo(endX, endY);
  context_.stroke();
}

function drawGraph() {
  removeClickableVertices();
  applyColoringOption();
  let pointPositions = dividePoints(globalGraph_.vertexCount, canvasWidth_, canvasHeight_, margin_);

  for (let key of globalGraph_.edgeColorMap.keys()) {
    let points = key.split("_");
    let firstPoint = parseInt(points[0]);
    let secondPoint = parseInt(points[1]);
    let beginX = pointPositions[2 * firstPoint];
    let beginY = pointPositions[2 * firstPoint + 1];
    let endX = pointPositions[2 * secondPoint];
    let endY = pointPositions[2 * secondPoint + 1];
    drawEdge(beginX, beginY, endX, endY, globalGraph_.edgeColorMap.get(key));
  }

  for (let key of globalGraph_.vertexColorMap.keys()) {
    drawVertex(key, pointPositions[2 * key], pointPositions[2 * key + 1], 20, globalGraph_.vertexColorMap.get(key));
  }
}

//------------------------------------------------------------
function drawGraph_bis() {
  removeClickableVertices();
  
  let pointPositions = dividePoints(globalGraph_.vertexCount, canvasWidth_, canvasHeight_, margin_);
  for (let key of globalGraph_.edgeColorMap.keys()) {
    let points = key.split("_");
    let firstPoint = parseInt(points[0]);
    let secondPoint = parseInt(points[1]);
    let beginX = pointPositions[2 * firstPoint];
    let beginY = pointPositions[2 * firstPoint + 1];
    let endX = pointPositions[2 * secondPoint];
    let endY = pointPositions[2 * secondPoint + 1];
    drawEdge(beginX, beginY, endX, endY, globalGraph_.edgeColorMap.get(key));
  }

  for (let key of globalGraph_.vertexColorMap.keys()) {
    drawVertex(key, pointPositions[2 * key], pointPositions[2 * key + 1], 20, globalGraph_.vertexColorMap.get(key));
  }
}
//------------------------------------------------------------

//confirm function 
// une fonction pour v???rifier et comparer les num???ros des couleurs utilis???es par l'apprenant et les num???ros de notre syst???me si la m???me couleur est vraie la fonction de comparaison est appel???e avec la liste adjacente sinon si la valeur est fausse alors la note 0
document.getElementById("colorGreedyButton").disabled = true;

globalVariableColors=[]//////////////////////////////////////////////
globalVariableColors2=[]
function myFunction() {
//apres clique sur le button send yafficha message vous etes sure ou nn quand l'apprenant clique sur oui il fait le function et les buttons disparu juste le button submit qui a afficher et la function de comparaison start 
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
}

//end confirm function 
function updateGraphText() {
  let activeGenerateButtons = document.getElementById("generateOptions").getElementsByClassName("active");
  let generateOption = document.getElementById(activeGenerateButtons[0].id).innerHTML;
  let baseVertexCount = document.getElementById("vertices").value;
  let endStr = (parseInt(baseVertexCount) != 1) ? " vertices" : " vertex";

  let activeColorButtons = document.getElementById("colorOptions").getElementsByClassName("active");
  let coloringOption = document.getElementById(activeColorButtons[0].id).innerHTML;

  let usedColors = new Set();
  for (let value of globalGraph_.vertexColorMap.values()) {
    usedColors.add(value);
  }
}

//function pour generer table
function clearDataTable() {
  let rowCount = table_.rows.length;
  for (let i = 1; i < rowCount; ++i) {
    table_.deleteRow(1);
  }
}
//function de comparaison apres la comparaison entre les nombres de couleurs il fait la comparaison entre les sommets adjacnets quand quelconque sommet avec ses adjacents le meme couleur est faux et la note est 0 sinon c'est vrai et la note est 10
let arrayTest=[]
var sub=false;
var boll=false;
function test(){  
  sub=true;
  //variable li nhot fih lresultat la note
  const result=document.getElementById('result')
  //la boucle li tverifi est ce que les sommets adjacents 3ndhm le meme couleur ou non
  for(i=0;i<=arrayTest.length-1;i++){
    for(j=0;j<=arrayTest[i].neighborsCell.length-1;j++){
      if(arrayTest[i].colorCell===arrayTest[arrayTest[i].neighborsCell[j]].colorCell){
        //ida lgina sommet whda m3a ladjacent t3ha 3ndhm le meme couleur c'est faux
        boll=false;
        break;
      }else{
      //sinon c'est vrai
        boll=true;
      }
    }
    if(!boll){
      break;
    }
  }

  
}
//function qui genere la table
function generateDataTable() {
  arrayTest=[];
  for (let i = 0; i < globalGraph_.vertexCount; ++i) {
    let row = table_.insertRow(i + 1);
    row.className += " item";
    let vertexCell = row.insertCell(0);
    let colorCell = row.insertCell(1);
    let degreeCell = row.insertCell(2);
    let neighborsCell = row.insertCell(3);
    vertexCell.innerHTML = i.toString();
    colorCell.innerHTML = globalGraph_.vertexColorMap.get(i.toString());

    let neighbors = globalGraph_.incidentVertices(i);
    degreeCell.innerHTML = neighbors.length;

    let neighborsStr = "";
    for (let j = 0; j < neighbors.length; ++j) {
      neighborsStr += neighbors[j];
      if (j < neighbors.length - 1) {
        neighborsStr += ", ";
      }
    }
    neighborsCell.innerHTML = neighborsStr;
    let test={
      vertexCell:i.toString(),
      colorCell:globalGraph_.vertexColorMap.get(i.toString()),
      degreeCell:neighbors.length,
      neighborsCell:neighbors
    }
    arrayTest.push(test)
  }
  var arrayColors=[];
    for(i=0;i<=arrayTest.length-1;i++){
      if(!arrayColors.includes(arrayTest[i].colorCell)){
        arrayColors.push(arrayTest[i].colorCell);
      }
    }
    //apres la comparaison de tous avec les sommets nhoto lresultat ici avec modification css
    if(boll && sub && arrayColors.length===globalVariableColors.length){
        $( "#result1" ).load( "res.php?note=10" );
      result.innerText='10/10';
      result.setAttribute('style','background:green; color:white;border-radius:5px; padding:5px');
        console.log('arrayColors:',arrayColors)
        console.log('globalVariableColors:',globalVariableColors)
    }else if(sub){
         $( "#result1" ).load( "res.php?note=0");
      result.innerHTML='0/10';
      result.setAttribute('style','background:red; color:white;border-radius:5px; padding:5px;');
    }
}
function updateShownGraph() {
  drawGraph();
  updateGraphText();
  clearDataTable();
  generateDataTable();
  logGraphInformation();
}

function clearCanvas() {
  context_.clearRect(0, 0, canvas_.width, canvas_.height);
}

//fonction pour colorer le graphe 

 function colorGraph() {
  clearCanvas();
   updateShownGraph();
   mat2=traitement();
 }
//---------------------------------------------
function colorGraph_bis() {
  clearCanvas();
  drawGraph_bis();
  updateGraphText();
  clearDataTable();
  generateDataTable();
  logGraphInformation();
 }

//----------------------------------------------
//les colorations sur le graphe si uncolored alors le graphe est non color??? si greedy on applique l'algorithme de welsh et powell
function applyColoringOption() {
  let activeButtons = document.getElementById("colorOptions").getElementsByClassName("active");
  let id = activeButtons[0].id;
  if (id == "colorUncoloredButton") {
    globalGraph_.assignUncoloredColoring();
  }

  else if (id == "colorGreedyButton") {
    globalGraph_.assignGreedyColoring();
    
  }  
}

//function calclue les sommets et generate random graph qui a ete pris de https://tonyruan2.github.io/majestic_colorings/ 
function retrieveVertexCount() {
  let vertexCount = Number(document.getElementById("vertices").value);
  if (vertexCount < 1) {
    vertexCount = 1;
  }
  else if (vertexCount > 100) {
    vertexCount = 100;
  }
  document.getElementById("vertices").value = vertexCount.toString();
  return vertexCount;
}

function generateRandomGraph(label = "", colorshape="#FFFFFF", coloredge="#728C00") {
  clearCanvas();
  let vertexCount = retrieveVertexCount();
  let minimumEdges = 0;
  let maximumEdges = vertexCount * (vertexCount - 1) / 2;

  if (label == "sparse") {
    maximumEdges = vertexCount - 1;
  }
  else if (label == "dense") {
    minimumEdges = vertexCount - 1;
  }

  let edgesRequired = Math.floor(Math.random() * (maximumEdges - minimumEdges + 1)) + minimumEdges;

  globalGraph_ = new Graph(vertexCount, colorshape,coloredge);

  let edgesAdded = 0;
  while (edgesAdded < edgesRequired) {
    let firstVertex = Math.floor(Math.random() * globalGraph_.vertexCount);
    let secondVertex = Math.floor(Math.random() * globalGraph_.vertexCount);
    if (firstVertex != secondVertex) {
      if (globalGraph_.adjMatrix[firstVertex][secondVertex] == 0) {
        globalGraph_.addEdge(firstVertex, secondVertex);
        ++edgesAdded;
      }
    }
  }
  updateShownGraph();
}

//fonction de l'utilisation des bottons

function addActiveFunctionality(optionsId) {
  let buttons = document.getElementById(optionsId).getElementsByClassName("input");
  for (let i = 0; i < buttons.length; ++i) {
    buttons[i].addEventListener("click", function() {
      let current = document.getElementById(optionsId).getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    })
  }
}

window.onload = function() {

  // reload la page faire random de graph
  const vertexCount = Math.floor(Math.random() * 8) + 3;
  document.getElementById("vertices").value = vertexCount.toString();
  generateRandomGraph("dense","#FFFFFF","#FFFFFF");

  addActiveFunctionality("generateOptions");
  addActiveFunctionality("displayOptions");
  addActiveFunctionality("colorOptions");
  
  // all credit goes to Nick Grealy: https://stackoverflow.com/questions/14267781/sorting-html-table-with-javascript/49041392#49041392

   /*dessiner le tableau dynamiquement */
   
  const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;
  const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
    v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

  document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
  const table = th.closest('table');
      
  Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
      .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
      .forEach(tr => table.appendChild(tr) );})));
//les bottons
      document.getElementById("colorUncoloredButton").addEventListener("click", colorGraph);
    
      document.getElementById("colorGreedyButton").addEventListener("click", colorGraph);
}
