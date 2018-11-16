function setupCustomCols(){
    $('.custom-col').each(function(i, obj) {
        var len = $(obj).siblings('.custom-col').andSelf().length;
        var width = 100/len;
        $(obj).css("width", width+"%");
    });
};
function closeMenu(){
    $('#mobileMenuBtn').find('div').removeClass('open');
    $('#mobileMenu').stop().slideUp(200);
}
function Ajax(afile,adiv) {
    console.log(afile);
    var htm = afile.split('?');
    var xhr = $.ajax({
        type: "GET",
        url: htm[0],
        data: htm[1],
        cache: false,
        dataType: "html",
        success: function(html) {
			if(adiv!=0) {
				$('#' + adiv).fadeIn(50);
				$('#' + adiv).html(html);
			}
        }
    });
}
function editContent(file){
    
}