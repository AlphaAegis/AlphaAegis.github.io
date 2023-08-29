
var ib = function() {
	var lng = "us";
	var top = 8;
	var left = 7;
	var maxw = 300;
	var speed = 10;
	var timer = 20;
	var endalpha = 95;
	var alpha = 0;
	var tt,h;
	var ie = document.all ? true : false;

	return {
		show:function(id) {
			var req = new XMLHttpRequest();

			if (tt == null) {
				tt = document.createElement("div");
				tt.setAttribute("id","tt");
				document.body.appendChild(tt);
				document.onmousemove = this.pos;
				tt.style.opacity = 0;
				tt.style.filter = "alpha(opacity=0)";
				tt.innerHTML = "Loading...";
			}

			req.open("POST", "request.php", true);
			req.onreadystatechange = function() { if (req.readyState == 4 && req.status == 200 && req.responseText != "Error") { tt.innerHTML = req.responseText; } };
			req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			req.send("id_ammo=" + id + "&lng=" + lng);

			tt.style.display = "block";
			tt.style.width = "auto";
			if (tt.offsetWidth > maxw) { tt.style.width = maxw + "px"; }

			h = parseInt(tt.offsetHeight) + top;
			clearInterval(tt.timer);
			tt.timer = setInterval(function() { ib.fade(1) }, timer);
		},
		pos:function(e) {
			var l = ie ? event.clientX + document.body.scrollLeft : e.pageX;
			var u = ie ? event.clientY + document.body.scrollTop : e.pageY;
			tt.style.top = (u - h) + "px";
			tt.style.left = (l + left) + "px";
		},
		fade:function(d) {
			var a = alpha;
			if ((a != endalpha && d == 1) || (a != 0 && d == -1)) {
				var i = speed;
				if(endalpha - a < speed && d == 1) { i = endalpha - a; } else if (alpha < speed && d == -1) { i = a; }

				alpha = a + (i * d);
				tt.style.opacity = alpha * .01;
				tt.style.filter = "alpha(opacity=" + alpha + ")";
			}
			else {
				clearInterval(tt.timer);
				if (d == -1) { tt.style.display = "none"; }
			}
		},
		hide:function() {
			clearInterval(tt.timer);
			tt.timer = setInterval(function() { ib.fade(-1) }, timer);
			tt.innerHTML = "Loading...";
		}
	};
}();