var Winner = function(user, wins) {
    this.user = user;
    this.wins = wins;
}

Winner.prototype = {
    getHtml: function() {
		var html = "<div class='winner'>";
			html += "<h1>"+this.user+" wins: "+this.wins+"</h1>";
			html += "</div>";
		return html;
	}
}