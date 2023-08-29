var Player = function(playlist) { this.playlist = playlist; };

Player.prototype = {
	play: function(index) {
		var sound;
		var data = this.playlist[0];

		if (data.howl) { sound = data.howl; }
		else { sound = data.howl = new Howl({ src: ['interface/shodan/shodan.mp3'], html5: true }); }

		sound.play();

		playBtn.style.display = 'none';
		pauseBtn.style.display = 'inline';
	},

	pause: function() {
		var sound = this.playlist[0].howl;

		sound.pause();

		playBtn.style.display = 'inline';
		pauseBtn.style.display = 'none';
	},

	stop: function() {
		var sound = this.playlist[0].howl;

		sound.stop();

		playBtn.style.display = 'inline';
		pauseBtn.style.display = 'none';
	},
};

var player = new Player([ { howl: null } ]);

playBtn.addEventListener('click', function() { player.play(); });
pauseBtn.addEventListener('click', function() { player.pause(); });
stopBtn.addEventListener('click', function() { player.stop(); });