"use strict";$(document).ready(function(){var e=$(".slider-owl-carousel-item").owlCarousel({items:1,mouseDrag:!1}),i=$(".slider-owl-carousel-item-2").owlCarousel({items:1,mouseDrag:!1});$("#home .homepage-slider .slider-holder").owlCarousel({items:1,onInitialized:function(t){var s=t.item.count,o=t.item.index,n=$(".homepage-slider .dot-numbers"),a=$(".homepage-slider .pagination-slider .progress");$(" #home .featured-items:first").fadeIn(),e.trigger("next.owl.carousel"),i.trigger("to.owl.carousel",2),n.html("");for(var l=0;l<s;l++)$('<li data-index="'+l+"\" class='"+(l==o?"active":"")+'\'>\n              <span class="fs-12">'+(l+1)+"</span>\n            </li>").on("click",function(e){n.children("li").removeClass("active"),$(this).addClass("active"),$(t.target).trigger("to.owl.carousel",[$(e.target).text()-1,500,!0])}).appendTo(n);a.css({height:100/s+"%",top:100*o/s+"%"})},onTranslated:function(t){var s=t.item.count,o=t.item.index,n=$(".homepage-slider .dot-numbers"),a=$(".homepage-slider .pagination-slider .progress");parseInt(o);n.children("li").removeClass("active"),n.children("li").eq(o).addClass("active"),0==o?(e.trigger("to.owl.carousel",1),i.trigger("to.owl.carousel",2)):1==o?(e.trigger("to.owl.carousel",2),i.trigger("to.owl.carousel",0)):2==o&&(e.trigger("to.owl.carousel",0),i.trigger("to.owl.carousel",1)),a.css({top:100*o/s+"%"})}}),$("#news  .slider-holder").owlCarousel({items:1,onInitialized:function(e){var i=e.item.count,t=e.item.index,s=$("#news .dot-numbers"),o=$("#news .pagination-slider .progress");s.html("");for(var n=0;n<i;n++)$('<li data-index="'+n+"\" class='"+(n==t?"active":"")+'\'>\n              <span class="fs-12">'+(n+1)+"</span>\n            </li>").on("click",function(i){s.children("li").removeClass("active"),$(this).addClass("active"),$(e.target).trigger("to.owl.carousel",[$(i.target).text()-1,500,!0])}).appendTo(s);o.css({height:100/i+"%",top:100*t/i+"%"})},onTranslated:function(e){var i=e.item.count,t=e.item.index,s=$("#news .dot-numbers"),o=$("#news .pagination-slider .progress");s.children("li").removeClass("active"),s.children("li").eq(t).addClass("active"),o.css({top:100*t/i+"%"})}}),$(".history-carousel").owlCarousel({items:1,loop:!0}),$(".selectbox .selectbox-value").click(function(){var e=$(this).siblings(".selectbox-list");$(this).hasClass("active")?(e.hide(),e.removeClass("active"),$(this).removeClass("active")):($(".selectbox .selectbox-value").removeClass("active"),$(".selectbox .selectbox-value").siblings(".selectbox-list").removeClass("active"),$(".selectbox .selectbox-value").siblings(".selectbox-list").hide(),e.show(),e.addClass("active"),$(this).addClass("active"))}),$(".selectbox .selectbox-list .value").click(function(){var e=$(this).closest(".selectbox-list"),i=$(this).closest(".selectbox").find(".selectbox-value"),t=$(this).closest(".selectbox").find(".selectbox-value-holder");i.find(".value").text($(this).text()),$(".selectbox .selectbox-list .value").removeClass("selected"),$(this).addClass("selected"),t.val($(this).attr("data-value")),i.removeClass("active"),i.find(".value").text().includes("Digər")?$(".another-type-active").fadeIn():$(".another-type-active").fadeOut(),i.addClass("activeSelected"),e.hide()}),$("#news .accordion-top .accordion-name").click(function(){if(!$(this).hasClass("accordion-active")){var e=parseInt($(this).parent().index())+1;$("#news .accordion-top .accordion-name").removeClass("accordion-active"),$(this).addClass("accordion-active"),$("#news .accordion-bottom .accordion-ul").removeClass("accordion-ul-active"),$("#news .accordion-bottom .accordion-ul:nth-child("+e+")").addClass("accordion-ul-active")}}),$("#doctor-profile .accordion-items .accordion-title").click(function(){var e=$(this).next(),i=$(this).find(".title-icon");$("#doctor-profile .accordion-items .accordion-title .title-icon i").removeClass("fa-minus").addClass("fa-plus"),$("#doctor-profile .accordion-items .accordion-desc").slideUp("400"),"none"==e.css("display")&&(i.find("i").attr("class","fas fa-minus"),e.slideDown("400"))}),jQuery.fn.extend({cvPlusCLick:function(){$(this).click(function(){var e=$(this).closest(".clicked-element"),i=e.find(".added-element").first().find(">:first-child").clone();e.find(".added-element").first().append(i)})}}),$("#cv .education-about .about-icon i").cvPlusCLick(),$("#cv .cv-file-input").click(function(e){e.preventDefault(),$("#cv .cv-file-input-none").click()}),$(".btn-menu").click(function(){$(this).hasClass("active")?($("body").addClass("body-scrool"),$(this).removeClass("active").addClass("responsive"),$(".menu-links").slideDown()):$(this).hasClass("responsive")&&($("body").removeClass("body-scrool"),$(this).removeClass("responsive").addClass("active"),$(".menu-links").slideUp())}),$(window).width()>1100?$(".dropdown").hover(function(){$(this).find(".dropdown-content").fadeToggle()}):$(".dropdown").click(function(e){e.preventDefault(),$(".dropdown").find(".dropdown-content").fadeOut(),$(this).find(".dropdown-content").fadeToggle(),$(".dropdown .dropdown-sub-content").fadeOut()}),$(window).width()>1100?$(".dropdown-content .content").hover(function(){$(this).find(".dropdown-sub-content").fadeToggle()}):$(".dropdown-content .content").click(function(e){e.preventDefault(),$(".dropdown").find(".dropdown-sub-content").fadeOut(),$(this).find(".dropdown-sub-content").fadeToggle()}),$(window).width()>1100&&($("#services .service").hover(function(){$(this).hasClass("medium")||($(this).addClass("diagnostic"),$(this).find(".featured-item").slideDown(),$(this).find(".service-icon").slideUp(300),$(this).find(".service-title").slideUp(300))}),$("#services .service").mouseleave(function(){$(this).hasClass("medium")||($(this).removeClass("diagnostic"),$(this).find(".featured-item").slideUp(),$(this).find(".service-icon").slideDown(300),$(this).find(".service-title").slideDown(300))})),$('[data-fancybox="galleryImage"]').fancybox({thumbs:{autoStart:!0}}),$("#organizations .organization-image").hover(function(){$(this).next().toggleClass("organization-active")}),$(".search-bar i").click(function(){$(".search-bar-element").fadeIn()}),$(".exit-element").click(function(e){$(".search-bar-element").fadeOut()}),$("#question .news-content").click(function(){$("#question .news-content").find(".question-content").slideUp(),"none"==$(this).find(".question-content").css("display")?$(this).find(".question-content").slideDown():$(this).find(".question-content").slideUp()}),$("#form-element-anket").validate({rules:{name:{required:!0},surname:{required:!0},number:{required:!0},comment:{maxlength:500},quality:{maxlength:500},message:{maxlength:500,required:!0},email:{required:!0}}}),$(window).width()>1100?$(".languages").hover(function(){$(this).find(".languages-list").slideToggle()}):$(".languages").click(function(){$(this).find(".languages-list").slideToggle()}),$(".languages .languages-list li").click(function(){})});