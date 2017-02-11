
var nbClick = 0;
var posLeft;
function idBlock(id){
  return "#block" + id;
}
function idBlockMouv(id){
  return "#mouv" + id;
}
var mouv;
$(".pic").click(function(e){
	nbClick += 1;
	var idPic = $(this).attr('id');
	var idB = idBlock(idPic);
	mouv = idBlockMouv(idPic);
	if(nbClick == 1){
		$( this ).css( "width", "+=300" );
		$( this ).css( "height", "+=200" );
		$(idB).removeClass("hidden");
		
		$('.pic').css("cursor","auto");
		$(mouv).css("position","absolute");
		var p = $('#'+idPic);
		var position = p.position();
		posLeft = position.left;
		$(mouv).css("z-index","10");
		console.log($(window).width());
		console.log($(mouv).parent().position().left);
		//var centrage = posLeft - 150;
		$(mouv).animate({
		    left:  $(window).width() / 2 - $(mouv).width() - $(mouv).parent().position().left + $(window).width() / 20
		}, 2000);
		$(mouv).css("position","relative");
	}
});
$(".iconquit").click(function(e){
	$(".pic").css( "width", "273" );
	$(".pic").css( "height", "182" );
	$(".quit").addClass("hidden");
	$(mouv).css("left",posLeft);
	
	e.preventDefault();
	nbClick = 0;
	$('.pic').css("cursor","pointer");
	$(mouv).css("z-index","0");
	mouv = null;

});
