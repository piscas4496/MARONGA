<!DOCTYPE html>
<html>
<head>
	<title></title>	
	</head >
    <?php include("../parties/header.php"); ?>
	<body align="center">
	<div>
	<div class="lignes">

		</div>
	<div class="conteneur-text"></div>
	<h1><span>Bienvenue</span><span>dans</span><span>notre</span><span>site</span><span>web</span></h1>
	<div class="conteneur-btn">
		
	<button class="btn">Aceuil</button>
	<button class="btn">services</button>
	<img class="logo" src="../images/2044908.jpg">
	<ul class="images" >
	<li class="bulle"> <img src="../images/portraipilote.JPG" class="logos"> </li> 
	<li class="bulle"><img src="../images/portraipilote.JPG" class="logos"></li> 
	<li class="bulle"><img src="../images/portraipilote.JPG" class="logos"></li> 
	<li class="bulle"><img src="../images/portraipilote.JPG" class="logos"></li> 
	<li class="bulle"><img src="../images/portraipilote.JPG" class="logos"></li> 
	</ul>
	</div>
	<script src="annimation.js"></script>
</div>
</body>
</html>








<style >
body{
	background: #333;
	font-family: arial, helvetica, sans-serif;
	height: 100vh;
	background: url('../images/avion-boeing-civil.JPG');
	background-repeat: no-repeat;
	background-size: cover;
	position: relative;
	overflow: hidden;
}

.conteneur-text{
	position:absolute;
	top: 30px;
	left:5px ; 

}

h1{
text-transform: uppercase;
font-size: 50px;
color: #f1f1f1;
word-spacing: 8px;
}

h1,span{
	position: relative;
}
.conteneur-btn{

	position:relative; 
	top:50px; 
}
.btn{
border:1px solid black;
outline: none;
font-size: 30px ;
background:transparent;  ;
padding:20px ;
width:300px ;
color: #f1f1f1 ;
cursor:pointer ;


}
/*.btn1:nth-child(1){

	margin-right: 30;
}*/

.btn2:hover{
	transition: all, 0.3s,ease-in-out;
	background: #f1f1f1;
	color: #333 ;
}

.lignes{
	position: relative;
	top:6%;
	left:5%;
}

.l1{
	width: 250px ;
	height:20px ;
	background:#f1f1f1 ;
	border-radius: 6px;

}

.l2{
	width: 250px ;
	height:20px ;
	background:#f1f1f1 ;
	border-radius: 6px;
}

.logo{
	position:absolute; 
	right: 4px;
	top: 2.9px;
	width: 80px;
	height:80px;
	cursor: pointer; 

}

.images{
	list-style-type: none;
	position: absolute;
	right: 3.3%;
	top: 50%;
	transform: translate(-50%);
	display: flex;
	justify-content: center;
	flex-direction: column;
}

.bulle{
	width: 60px;
	height: 60px;
	border-radius: 50%;
	border:1px solid #f1f1f1;
	display: flex;
	justify-content:center;
	align-items: center;
	margin:10px;
	background:  #f1f1f1;
	cursor: pointer;
	position: relative;	
}
.logos{
width:40px;
height:40px;
}


</style>