//Nav
	//Responsive Dropdown
		function myFunction() {
		  var x = document.getElementById("myTopnav");
		  if (x.className === "topnav") {
		    x.className += " responsive";
		  } else {
		    x.className = "topnav";
		  }
		}
	//Scroll
	var prevScrollpos = window.pageYOffset;
	window.onscroll = function() {
	var currentScrollPos = window.pageYOffset;
	  if (prevScrollpos > currentScrollPos) {
	    document.getElementById("myTopnav").style.top = "0";
	  } else {
	    document.getElementById("myTopnav").style.top = "-15vh";
	  }
	  prevScrollpos = currentScrollPos;
	}
