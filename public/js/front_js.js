/* blog JS */
$(document).ready(function () {
    var down_menu_links = true;
    $(".blog_nav").on("click", function () {
        if (down_menu_links) {
            $(".down_menu_links").css({ marginRight: "0", transition: "0.2s" });
            $(" .header_right").css({marginLeft: "0", transition: "0.2s",});
            down_menu_links = false;
        } else {
            $(".down_menu_links").css({
                marginRight: "-40%",
                transition: "0.2s",
            });

            $(".header_right").css({
                marginLeft: "-45%",
                transition: "0.2s",
            });
           
            down_menu_links = true;
        }
    });
    var resizeTimersdown_menu_links;
    $(window).on("resize", function (e) {
        clearTimeout(resizeTimersdown_menu_links);
        resizeTimersdown_menu_links = setTimeout(function () {
            if ($(window).width() > 800) {
                $(".down_menu_links").css({
                    marginRight: "40px",
                    marginLeft: "40px",
                    transition: "none",
                });

                $(".header_right").css({
                    transition: "none",
                });

                down_menu_links = true;
            } else {
                $(".down_menu_links").css({
                    marginRight: "-40%",
                    transition: "none",
                    marginLeft: "0",
                });
                
                $(".header_right").css({
                    marginLeft: "-45%",
                    transition: "none",
                });
                down_menu_links = true;
            }
        }, 0);
    });

    $(document).mouseup(function (e) {
        var con_menu_links = $(".down_menu_links,.blog_nav,.header_right");
        if (down_menu_links == false) {
            if (!con_menu_links.is(e.target) &&con_menu_links.has(e.target).length === 0) {
              $(".down_menu_links").css({marginRight: "-40%",'transition': '0.2s'});
              $(".header_right").css({marginLeft: "-45%",'transition': '0.2s'});
            down_menu_links = true;
            }
        }
    });
	
	
	
	
	
	
	
	 var Interval;
    function starttricker(){
        $('#news li:first').slideUp(function(){
            $(this).appendTo($("#news")).slideDown(3000);
        });
    }
    function stopticker(){
        clearInterval(Interval);
    }
    $(document).ready(function () { 
        Interval = setInterval(starttricker,3000);

    $('#news').hover(function(){
        stopticker();
    },function(){
        Interval = setInterval(starttricker,3000);
    });
    });
});


const facebookBtn = document.querySelector(".facebook-btn");
const twitterBtn = document.querySelector(".twitter-btn");
const pinterestBtn = document.querySelector(".pinterest-btn");
const linkedinBtn = document.querySelector(".linkedin-btn");
const whatsappBtn = document.querySelector(".whatsapp-btn");

function init() {
  const pinterestImg = document.querySelector(".pinterest-img");

  let postUrl = encodeURI(document.location.href);
  let postImg = encodeURI(pinterestImg.src);

  facebookBtn.setAttribute(
    "href",
    `https://www.facebook.com/sharer.php?u=${postUrl}`,
    `;`
  );

  twitterBtn.setAttribute(
    "href",
    `https://twitter.com/share?url=${postUrl}`
  );

  pinterestBtn.setAttribute(
    "href",
    `https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}`
  );

  linkedinBtn.setAttribute(
    "href",
    `https://www.linkedin.com/shareArticle?url=${postUrl}`
  );

  whatsappBtn.setAttribute(
    "href",
    `https://wa.me/?text=${postUrl}`
  );
}

init();