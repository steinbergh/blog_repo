

$(document).ready(function() {
	//the code below aloows for toggling thru multiple classes when clicking
	$('#resize').click(function () {
	  var classes = ['small-print','medium-print','large-print'];
  		$('p').each(function(){
    		this.className = classes[($.inArray(this.className, classes)+1)%classes.length];
  		});
	});
});