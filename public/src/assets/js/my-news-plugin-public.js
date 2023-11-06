(function ($) {
  'use strict';

  // document.ready
  $(function(){

    class foMyNewsPlugin {
     
      constructor(el, index) {
        this.el = el;
        this.elIndex = index;
        this.getNewsInfo();
      }
      

      getNewsInfo() {
        let self = this;
        let apiURL = mnp_object.api_url + mnp_object.api_date;

        $.ajax({
          // url: "https://en.wikipedia.org/api/rest_v1/feed/featured/2022/11/11",
          url: apiURL,
          method: 'GET',
          dataType: 'json',
          success: function(data) {
            let news = data.mostread.articles;
            let multiplier = 4 * self.elIndex;
            let sliceStart = 0;
            let sliceEnd = 4;


            if (self.elIndex === 0) {
              news = news.slice(sliceStart, sliceEnd);
            } else if (self.elIndex >= 1) {
              sliceStart = sliceStart + multiplier;
              sliceEnd = sliceEnd + multiplier;
              news = news.slice(sliceStart, sliceEnd);
            }

            $(news).each( function ( index, article ) {
              let title = article.titles.normalized;
              let description = article.description;
              let img = article.originalimage.source;
              let extract = article.extract;
              let link = article.content_urls.desktop.page;


              $(self.el).append(`<div class="mnp-news-item" data-js="news-item-${self.elIndex}-${index}"></div>`);
              let newsItem = $('[data-js=news-item-' + self.elIndex + '-' + index +']');
              
              if (title && link) {
                $(newsItem).append(`<h2 class="mnp-news-item__title"><a href="${link}" target="_blank" rel="noreferrer">${title}</a></h2>`);
              }

              if (description) {
                $(newsItem).append(`<h3 class="mnp-news-item__desc">${description}</h3>`);
              }

              if (img) {
                $(newsItem).append(`<img class="mnp-news-item__img" src="${img}" height="400">`);
              }

              if (extract && link) {
                $(newsItem).append(`<p class="mnp-news-item__body">${extract} <a class="mnp-news-item__body-read-more" href="${link}" target="_blank" rel="noreferrer">Read More...</a></p>`);
              }

            });
            
          },
          error: function(err) {
            console.log('Error', err.responseText);
            console.error(err);
          }
        
        });
      }


  }

    /* -- Call the news plugin -- */
    $("[data-js=my-news-plugin]").each(function(index) {
      new foMyNewsPlugin( $(this), index );
    });


  });
})(jQuery);