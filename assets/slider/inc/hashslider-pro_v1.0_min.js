$(document).ready(function(){function o(){$("#numbers a").click(function(){var e=$(this).html();$.get(n,function(t){var n=$(t).find(".hslide:nth-child("+e+")");$("#slider ul").append(n);g();h()});$("#numbers a").removeClass("active");$(this).addClass("active")})}function l(){$("#load").animate({width:e},u,"linear",function(){})}function c(){$("#load").animate({width:"0"},10,"linear",function(){l()})}function h(){clearInterval(f);$("#load").stop().fadeOut()}function p(){$("#slider").unmousewheel()}function d(){$("#slider").bind("mousewheel",function(e,t,n,r){if(t<0){p();h();y();e.stopPropagation();e.preventDefault()}if(t>0){p();w();h();e.stopPropagation();e.preventDefault()}})}function v(){var e=$("#slider .hslide:first-child").data("id");window.location.hash=e;$("#numbers a").removeClass("active");$('a[data-id|="'+e+'"]').addClass("active")}function m(){}function g(){$("#slider .hslide:first-child").animate({marginLeft:-1*e},r,i,function(){$(this).remove();v();d()})}function y(){$.get(n,function(e){var t=$("#slider .hslide:first-child").data("id");var n=$(e).find('.hslide[data-id|="'+t+'"]').index();var r=$(e).find(".hslide").size()-1;if(n<r){var i=n+2;var s=$(e).find(".hslide:nth-child("+i+")");$("#slider ul").append(s);$("#counter").html(n);g()}else{var o=$(e).find(".hslide:first-child");$("#slider ul").append(o);$("#counter").html(n);g()}})}function b(){$("#slider .hslide:first-child").animate({marginLeft:0},r,i,function(){$("#slider .hslide:nth-child(2)").remove()});d()}function w(){$.get(n,function(e){var t=$("#slider .hslide:first-child").data("id");var n=$(e).find('.hslide[data-id|="'+t+'"]').index();var r=n;if(r>0){var i=$(e).find(".hslide:nth-child("+r+")").css("marginLeft","-940px");$("#slider ul .hslide:first-child").before(i);b();$("#counter").html(n);v()}else{var i=$(e).find(".hslide:last-child").css("marginLeft","-940px");$("#slider ul .hslide:first-child").before(i);b();$("#counter").html(n);v()}})}var e=$("#slider").width();var t=e*10;var n=$("#slider").data("source");var r=$("#slider").data("speed");var i=$("#slider").data("easing");$("#slider ul").css("width",t);if(window.location.hash!=""){var s='.hslide[data-id|="'+window.location.hash.substr(1)+'"]';$.get(n,function(e){var t=$(e).find(s);$("#slider ul").html(t);v();l()})}else{$.get(n,function(e){var t=$(e).find(".hslide:first-child");$("#slider ul").append(t);v();l()})}$.get(n,function(e){var t=$(e).find(s);$(e).find(".hslide").each(function(){var e=$(this).index()+1;var t=$(this).data("id");$("#numbers").append('<a href="#" data-id="'+t+'">'+e+"</a>")});o()});var u=$("#slider").data("duration");var a=function(){y();c()};var f=setInterval(a,u);$("#next").click(function(){y();h()});$("#back").click(function(){w();h()});d()})