
var snake;	
var scl = 20;
var food;
var speed = 1;
var score=0;
var keynum = 39;
var taunt = "Use the arrow keys to play!";


	function setup(){
		
		var canvas = createCanvas(400,400);
		snake = new Snake();
		pickLocation();
		canvas.parent('sketch');
		
		
	}
	
	function pickLocation() {
		
		cols = floor(width/scl);
		rows = floor(height/scl);
		food = createVector(floor(random(cols)), floor(random(rows)));
		food.mult(scl);
		
	}
	
	function draw(){
		
		
		background(51);
		snake.death();
		snake.update();
		snake.show();
		textSize(32);
		text(score, 200, 200);
		textSize(16);
		textAlign(CENTER);
		text(taunt, 200, 225);
		
		fill(255,0,100);
		
		rectMode(RADIUS);  // Set rectMode to RADIUS
		fill('#000000');  // Set fill to white
		rect(food.x, food.y, scl, scl);  // Draw white rect using RADIUS mode

		rectMode(CENTER);  // Set rectMode to CENTER
		fill('#404040');  // Set fill to gray
		rect(food.x, food.y, scl, scl);
		
		
		
		if (snake.eat(food)) {
			
			pickLocation();
			speed = speed*1.08;
			score= score + 1;
			if(score === 1){	
				taunt = "zone uno";	
			}else if(score === 2){
				taunt = "easy stuff";
			}else if(score === 3){
				taunt = "notice the speed change?";
			}else if(score === 4){
				taunt = "this is still slow";
			}else if(score === 5){
				taunt = "=)";
			}else if(score === 6){
				taunt = "woo!";
			}else if(score === 7){
				taunt = "getting fasterrrr";
			}else if(score === 8){
				taunt = "medium speed";
			}else if(score === 9){
				taunt = "how was your day?";
			}else if(score === 10){
				taunt = "double digits, congrats.";
			}else if(score === 11){
				taunt = "pretty fast now!";
			}else if(score === 12){
				taunt = "you're good at this!";
			}else if(score === 13){
				taunt = "unlucky 13";
			}else if(score === 14){
				taunt = "can you even read this now?";
			}else if(score === 15){
				taunt = "Should I still bother with there";
			}else if(score === 16){
				taunt = "Youre really good at this, jesus";
			}else if(score === 17){
				taunt = "I'm running out of things to say";
			}else if(score === 18){
				taunt = "focus!";
			}else if(score === 19){
				taunt = "just lose already!";
			}else if(score === 20){
				taunt = "Okay I get it, youre better than me";
			}
			
		}
	}
	
	function keyPressed() {
		
		if(keyCode === UP_ARROW && !(keynum === 40)) {
			keynum = keyCode;
			
			snake.dir(0,-speed);

			
		}else if(keyCode === DOWN_ARROW && !(keynum === 38)){
			keynum = keyCode;
			snake.dir(0,speed);
			
		}else if(keyCode === RIGHT_ARROW && !(keynum === 37)){
			keynum = keyCode;
			snake.dir(speed,0);
			
		}else if(keyCode === LEFT_ARROW && !(keynum === 39)){
			keynum = keyCode;
			snake.dir(-speed,0);
			
		}
		
	}
	
	
	
	
	
	
	function Snake(){
		
		this.x=0;
		this.y=0;
		this.xspeed=1;
		this.yspeed=0;
		this.total=0;
		this.tail = [];
		
		this.dir = function(x,y) {
			
			this.xspeed = x;
			this.yspeed = y;
			
		}
		
		this.death = function(){
			
			for (var i = 0; i< this.tail.length; i++){
				var pos = this.tail[i];
				var d = dist(this.x, this.y, pos.x, pos.y);
				if(d<1){
					this.total= 0;
					this.tail = [];
					speed=1;
					score=0;
					taunt = "RIP";
				}
			}
			
		}
		
		this.update = function() {
			
			if (this.total === this.tail.length){
				for(var i=0; i<this.tail.length -1; i++){	
				
				this.tail[i] = this.tail[i+1];
				
				
			}
			}
			this.tail[this.total-1] = createVector(this.x,this.y);			
			
			
			this.x = this.x + this.xspeed*(scl/5);
			this.y = this.y + this.yspeed*(scl/5);
			
			this.x = constrain(this.x, 0 , width-scl);
			this.y = constrain(this.y, 0 , width-scl);
			
			
		}
		
		this.show = function() {
			
			fill(255);
			for(var i=0; i<this.tail.length -1; i++){	
					fill('#b3b3b3');
					ellipse(this.tail[i].x , this.tail[i].y, scl, scl);
				
			}
			fill('#ffffff');
			ellipse(this.x , this.y, scl, scl);
			
		}
		
		this.eat = function(pos) {
			
			var d = dist(this.x, this.y, pos.x, pos.y);
			if(d < 30){
				this.total++;
				
				return true;
			}else{
				
				return false;
			}
			
		}
		
		
		
		
	}
	