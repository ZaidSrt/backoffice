!function(n){var e={};function t(s){if(e[s])return e[s].exports;var a=e[s]={i:s,l:!1,exports:{}};return n[s].call(a.exports,a,a.exports,t),a.l=!0,a.exports}t.m=n,t.c=e,t.d=function(n,e,s){t.o(n,e)||Object.defineProperty(n,e,{enumerable:!0,get:s})},t.r=function(n){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(n,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(n,"__esModule",{value:!0})},t.t=function(n,e){if(1&e&&(n=t(n)),8&e)return n;if(4&e&&"object"==typeof n&&n&&n.__esModule)return n;var s=Object.create(null);if(t.r(s),Object.defineProperty(s,"default",{enumerable:!0,value:n}),2&e&&"string"!=typeof n)for(var a in n)t.d(s,a,function(e){return n[e]}.bind(null,a));return s},t.n=function(n){var e=n&&n.__esModule?function(){return n.default}:function(){return n};return t.d(e,"a",e),e},t.o=function(n,e){return Object.prototype.hasOwnProperty.call(n,e)},t.p="/",t(t.s=16)}({16:function(n,e,t){n.exports=t("ByIP")},ByIP:function(n,e){$(".histo").hover((function(){$(".histori").css("display","block")}),(function(){$(".histori").css("display","none")})),$(".editar").hover((function(){$(".edit").css("display","block")}),(function(){$(".edit").css("display","none")})),$(".notify").hover((function(){$(".noti").css("display","block")}),(function(){$(".noti").css("display","none")})),$(".ver").hover((function(){$(".veri").css("display","block")}),(function(){$(".veri").css("display","none")})),$(".edi").hover((function(){$(".edita").css("display","block")}),(function(){$(".edita").css("display","none")})),$(".borrar").hover((function(){$(".borra").css("display","block")}),(function(){$(".borra").css("display","none")})),$(".ver").hover((function(){$(".veri1").css("display","block")}),(function(){$(".veri1").css("display","none")})),$(".edi").hover((function(){$(".edita1").css("display","block")}),(function(){$(".edita1").css("display","none")})),$(".borrar").hover((function(){$(".borra1").css("display","block")}),(function(){$(".borra1").css("display","none")})),$("#viewcarga").click((function(){alert("cambio3"),$("#carga-exitosa").replaceWith(),$("#menu").load("Cargar-landing.php")})),$("#viewbackgrilla").click((function(){alert("cambio50000"),$("#grilla").replaceWith(),$("#carga-exitosa").load("Progra_general.php")})),$(document).ready((function(){var n=new Array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE")[t.getMonth()];$(".progra-month").text(n);t.getDay();var e=new Array("DOMINGO","LUNES","MARTES","MIÉRCOLES","JUEVES","VIERNES","SÁBADO")[t.getDay()]+" "+t.getDate();$(".day").text(e),$(".btn-rol-all").click((function(){$("button[id=btn-rol]").removeClass("btn-rol-select"),$(this).addClass("btn-rol"),$("button[id=btn-rol]").removeClass("btn-rol"),$(this).addClass("btn-rol-select")})),$("button[id=btn-landing]").click((function(){$(this).hasClass("btn-landing")&$(this).hasClass("text-landing")&&($(this).removeClass("btn-landing").addClass("btn-grilla"),$(this).removeClass("text-landing").addClass("text-grilla"),$("button[id=btn-grilla]").addClass("btn-landing").removeClass("btn-grilla"),$("button[id=btn-grilla]").addClass("text-landing").removeClass("text-grilla"))})),$("button[id=btn-grilla]").click((function(){$(this).hasClass("btn-landing")&$(this).hasClass("text-landing")&&($(this).addClass("btn-grilla").removeClass("btn-landing"),$(this).addClass("text-grilla").removeClass("text-landing"),$("button[id=btn-landing]").addClass("btn-landing").removeClass("btn-grilla"),$("button[id=btn-landing]").addClass("text-landing").removeClass("text-grilla"))}));var s=$(".bn-nav");$(".bn-nav").click((function(){s.addClass("btn-menu-all").removeClass("btn-menu-select"),s.addClass("text-menu-selec").removeClass("menu"),$(this).addClass("btn-menu-select").removeClass("btn-menu-all"),$(this).addClass("menu").removeClass("text-menu-selec")}));var a=$(".sub-nav");$(".sub-nav").click((function(){a.addClass("txtmenu").removeClass("btn-menu-select"),a.addClass("text-menu-selec").removeClass("menu"),$(this).addClass("btn-menu-select").removeClass("txtmenu"),$(this).addClass("menu").removeClass("text-menu-selec")})),$(".option").click((function(){var n=$(this).attr("value"),e=$(this).attr("id-select"),t=$(this).attr("img");$("#"+e+" > p").val(t).text(n)})),$(".Dias").click((function(){var n=$(this).attr("value"),e=$(this).attr("id-select");$("#"+e+" > p").text(n)})),$(".Meses").click((function(){var n=$(this).attr("value"),e=$(this).attr("id-select");$("#"+e+" > p").text(n)})),$(".Años").click((function(){var n=$(this).attr("value"),e=$(this).attr("id-select");$("#"+e+" > p").text(n)})),$("#mujer").click((function(){$('input[id="mujer"]').is(":checked")&&($("#women").attr("src","../images/datos-adicionales/femenino-activo.svg"),$("#men").attr("src","../images/datos-adicionales/masculino-inactivo.svg"))})),$("#hombre").click((function(){$('input[id="hombre"]').is(":checked")&&($("#women").attr("src","../images/datos-adicionales/femenino-inactivo.svg"),$("#men").attr("src","../images/datos-adicionales/masculino-activo.svg"))})),$("#sino-save").click((function(){$('input[id="sino-save"]').is(":checked")&&$("#savesino").modal("show")})),$("#back-list").click((function(){$("#prev-sinopsis").replaceWith(),$("#navbar-prev-sinopsis").load("submenu.php")})),$("#viewapro").click((function(){$("#savechange").modal("show")})),$(".slider li").hide(),$(".slider li:first").show(),$("#agregar").click((function(){$("#tb1").append(' <div class="contenedor-fila"><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div><div class="contenedor-columna"></div></div> ')}))}));var t=new Date}});