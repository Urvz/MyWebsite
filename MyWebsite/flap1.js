var bird;
var button;
var pipes = [];
var score=0;
var died = "You died";
var over = false;



function setup(){
	var canvas = createCanvas(400,450);
	canvas.parent('sketch');
	bird = new Bird();
	pipes.push(new Pipe());
}


function draw() {

	background(0);
	bird.show();
	bird.update();
	fill('#fffff');
	text(score, 30, 30);
	textSize(16);
	textAlign(CENTER);
	
	
	if (frameCount %  50 === 0){
		
		
		pipes.push(new Pipe());
		
		
	}
	
	if (over == true){
		
		
		text(died, 200, 200);
		textSize(32);
		textAlign(CENTER);
		
	}
	
	for (var i= pipes.length-1; i >= 0; i--){
		
		pipes[i].show();
		pipes[i].update();
		if (pipes[i].hits(bird)){
			
			
			
			
		}
		if (pipes[i].nohits(bird)){
			
			score = (score + 1);
			
			
		}
		if (pipes[i].offscreen()){
			
			pipes.splice(i,1);
			
		}
		
	}
	
}

function keyPressed(){
	
	if (key == ' '){
		
		bird.up();
		
	}
	
}


function Bird(){
	
	this.y = height/2;
	this.x = width/2;
	
	this.gravity = 0.5;
	this.lift = -15;
	this.velocity = 0;
	

	
	this.show = function(){
		
		fill(0,0,255);//this is the bird
		ellipse(this.x, this.y, 16,16);
		
	}
	
	this.up = function(){
		
		this.velocity += this.lift;
		
		
	}
	
	this.update = function() {
		this.velocity += this.gravity;
		this.velocity *= 0.95;
		this.y += this.velocity;
		
		if (this.y > height) {
			
			this.y = height;
			velocity = 0;
			
		}
		
		if (this.y < 0) {
			
			this.y = 0;
			velocity = 0;
			
		}
		
	}
	
}


function Pipe(){
	
	var spacing = random(50,height/2);
	var centery = random(spacing, height-spacing);
	this.top = centery - spacing/2;
	this.bottom = height - (centery + spacing/2);
	this.x= width;
	this.w=20;
	this.speed = 5;
	this.highlight = false;
	
	this.hits = function(bird){
		
		if(bird.y < this.top || bird.y > height - this.bottom){
			if (bird.x > this.x && bird.x < this.x + this.w){
				this.highlight = true;
				bird.gravity = 10;
				
				over = true;
				return true;
				
			}
			
			
		}
		this.highlight = false;
		
		return false;
		
	}
	
	this.nohits = function(bird){
		
		if(bird.y > this.top && bird.y < height - this.bottom){
			if (bird.x > this.x && bird.x < this.x + this.w){
				
				return true;
			}
			
		}
		return false;
		
	}
	
	this.show =  function(){
		
		fill(255);
		if(this.highlight){
			fill(255,0,0);
		}
		rect(this.x,0,this.w,this.top);
		rect(this.x,height-this.bottom,this.w,this.bottom);
	}
	
	this.update = function() {
		
		this.x -= this.speed;
		
	}
	
	this.offscreen = function(){
		
		if(this.x < -this.w) {
			return true;
		}else{
			return false;
		}
		
	}
	
}
