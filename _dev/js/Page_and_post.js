Main.Page_and_post = {
    init:function(){
        Main.Page_and_post.magnific_popup_init();
    },

    magnific_popup_init:function(){

        $('.gallery-item a').click(function(e){
            var href = $(this).attr("href");
            var count = 0;
            var pos = href.indexOf("uploads");
            while(pos > -1){
                ++count;
                pos = href.indexOf("uploads", ++pos);
            }

            if(count != 0){
                e.preventDefault();
            }else{
                e.stopPropagation();
            }

        });
        $('.gallery-item').magnificPopup({
    		delegate: 'a',
    		type: 'image',
    		tLoading: 'Loading #%curr%...',
    		mainClass: 'mfp-img-mobile',
            key: 'some key',
    		gallery: {
    			enabled: true,
    			navigateByImgClick: false,
    			preload: [0,1], // Will preload 0 - before current, and 1 after the current image
                tCounter: '%curr% de %total%'
    		},
    		image: {
    			tError: '<a href="%url%">A Imagem #%curr%</a> não foi carregada.'
    		},
            zoom: {
    			enabled: true,
    			duration: 300, // don't foget to change the duration also in CSS
    			opener: function(element) {
    				return element.find('img');
    			}
    		}
        });
    }
}
