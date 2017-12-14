var t;

function windowResized() {
  resizeCanvas();
}

function setup() {
    var canvas = createCanvas(windowWidth*0.987, windowHeight);
    canvas.parent('sketch-holder');

    stroke(0, 18);
    noFill();
    t = 0;

}



function draw() {
  var x1 = windowWidth * noise(t + 15);
  var x2 = windowWidth * noise(t + 25);
  var x3 = windowWidth * noise(t + 35);
  var x4 = windowWidth * noise(t + 45);
  var y1 = height * noise(t + 55);
  var y2 = height * noise(t + 65);
  var y3 = height * noise(t + 75);
  var y4 = height * noise(t + 85);

  bezier(x1+0.2*windowWidth, y1, x2+0.2*windowWidth, y2, x3+0.2*windowWidth, y3, x4+0.2*windowWidth, y4);

  t += 0.004;

  // clear the background every 500 frames using mod (%) operator
  if (frameCount % 1000 == 0) {
    clear();
	// background(255);
  }
}
