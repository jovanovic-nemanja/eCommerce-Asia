(window||this).bubbleText=function(e){function t(e){for(var t=[],i=0,r=e.length;r>i;i++){var a=e.charAt(i);a=" "===a?"&nbsp;":a,t[i]={"char":a,html:$('<span class="span-bubble-text">'+a+"</span>").appendTo(n)}}return t}if(e!==Object(e)||e.map===[].map)throw"bubbleText: Missing properties";var n=$(e.element),i=n[0];if(!i)throw"bubbleText: Missing element";var r=n.find(":first").length;if(r)throw"bubbleText: Element must be one leaf node";var a=e.newText;if("string"!=typeof a)throw"bubbleText: Missing newText";var l=i.innerHTML;i.innerHTML="";for(var h=t(a),o=t(l),s=[];h.length;){var f=h.shift(),p={add:f,width:f.html.width()+"px"};f.html.width(0);for(var d=f["char"],v=0,c=o.length;c>v;v++)if(d===o[v]["char"]){p.remove=o.splice(v,1)[0];break}s.push(p)}var b=0;if(e.proportional){var m=o.length,g=s.length;for(m>g?(m=Math.ceil(m/g),g=1):(g=Math.ceil(g/m),m=1);o.length;)if(b<s.length){for(var u=o.splice(0,m);u.length;)s.splice(b,0,{remove:u.shift()}),b++;b+=g}else s.push({remove:o.shift()})}else for(;o.length;){var p={remove:o.shift()};b<s.length?(s.splice(b,0,p),b+=2):s.push(p)}var w=n.find("span"),x=$(w[0]).height();w.each(function(){$(this).css({position:"relative",display:"inline-block",height:x+"px",overflow:"hidden"})});var T=parseInt(e.letterSpeed)||Math.floor((e.speed||2e3)/s.length),M=["&nbsp;",".",","];!function k(t){var n=s[t];if(!n)return i.innerHTML=a,void("function"==typeof e.callback&&e.callback());var r=function(){k(t+1)},l={duration:T,complete:r,easing:"linear"};n.add&&(l.complete=function(){var e=n.add.html.prev("span");if(e.length){var t=e.offset().top,i=n.add.html.offset().top;if(i!==t){for(;-1===M.indexOf(e.html())&&(e=e.prev("span"),0!==e.length););e.after("<br>")}}r()},n.add.html.animate({width:n.width},l)),n.remove&&n.remove.html.animate({width:0},n.add?{duration:T,easing:"linear"}:l)}(0)};