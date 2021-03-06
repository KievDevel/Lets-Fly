/*
 * jQuery liPaginate v 4.0
 *
 * Copyright 2012, Linnik Yura | LI MASS CODE | http://masscode.ru
 * http://masscode.ru/index.php/k2/item/42-lipaginate
 * Free to use
 * 
 * Desember 2012
 */
(function($){
	$.fn.liPaginate = function(params){
		var p = $.extend({
			easing:'easeOutQuart',
			duration: 1000,			
			effect:'vSlide',		
			pagePos:'double',		
			pageHeight:'auto',		
			maxPage:11				
		}, params);
		
		return this.each(function(){
			var pWrap = $(this),
			

			nodes = $(pWrap).contents().each(function () {
				if (this.nodeType == 3) {
					$(this).wrap('<span class="nodeTxt"/>');
				}
			});

			$('.nodeTxt',pWrap).each(function(){
				var nodeHtml = $.trim($(this).html());
				if(nodeHtml == ''){
					 $(this).remove();	
				}
			});

			var pChid = pWrap.children(),
				pWrapHeight = pWrap.height(),
				pHeight = p.pageHeight,
				dHeight = pWrapHeight,
				pChidLength = pChid.length,
				i = 0,
				coll = false,
				pChildEl = pChid.eq(0),
				pChildTemp = pChildEl;
				

			if(p.pageHeight == 'auto'){
				pHeight = ($(window).height() - 100)
			}
			

			function heightFunc(){
				pChildEl = pChid.eq(i);
				pChildCollection = pChildEl;
				pChildTemp = pChildEl;
				h1 = pChildEl.outerHeight(true);
				
				function heightCompare(){
					if(h1 < pHeight){
						coll = true;
						pChildTemp = pChildTemp.next();
						pChildCollection = pChildCollection.add(pChildTemp);
						h2 = pChildTemp.outerHeight(true);
						h1 = (h1 + h2);
						i++;
						if(i <= pChidLength - 1){
							heightCompare();
						}else{
							var pageItem = $('<div>').addClass('pageItem').css({height:pHeight});
							pChildCollection.wrapAll(pageItem);	
						}
					}else{
						if(i == 0){
							i++
							var pageItem = $('<div>').addClass('pageItem').css({height:pHeight});
							pChildCollection.wrapAll(pageItem);
							pChildCollection.splice((pChildCollection.length - 1) ,1);
						}else{
							if(coll){
								coll = false;
								var pageItem = $('<div>').addClass('pageItem').css({height:pHeight});
								pChildCollection.splice((pChildCollection.length - 1) ,1);
								pChildCollection.wrapAll(pageItem);
							}else{
								i++
								var pageItem = $('<div>').addClass('pageItem').css({height:pHeight});
								pChildCollection.wrapAll(pageItem);
								pChildCollection.splice((pChildCollection.length - 1) ,1);	
							}
						}
						if(i <= pChidLength - 1){
							heightFunc();	
						}
					}
				};
				heightCompare();
			};
			heightFunc();
			

			var pageItemEl = $('.pageItem',pWrap),
				pageLinkWrap = $('<div>').addClass('pageLinkWrap');
				
			pageItemEl.eq(0).addClass('pageActive');
			pageItemEl.each(function(e){
				var pageLink = $('<span>').addClass('pageLink').html((e+1)).appendTo(pageLinkWrap);
			})
			


			pWrap.on('click','.pageLink',function(){
				clickLink = $(this);
				activeIndex = $('.pageLink',clickLink.parent()).index(clickLink);
				$('.pageLinkWrap',pWrap).each(function(){
					indexNow = ($('.pageLinkActive',$(this)).html() - 1);
					$('.pageLink',$(this)).removeClass('pageLinkActive');
					$('.pageLink',$(this)).eq(activeIndex).addClass('pageLinkActive');
					if(p.effect == 'fade'){
						pageItemEl.hide().eq(activeIndex).fadeTo(p.duration,1);	
					}
					if(p.effect == 'simple'){
						pageItemEl.hide().eq(activeIndex).show();
					}
					if(p.effect == 'hSlide'){
						if(indexNow < activeIndex){
							pageItemEl.eq(indexNow).stop(true).css({zIndex:'1'}).fadeTo(400,0);
							pageItemEl.eq(activeIndex).css({left:$('.pageItemElWrap',pWrap).width(),opacity:'1',zIndex:'2'}).show().animate({left:'0'},p.duration,p.easing);
						}
						if(indexNow > activeIndex){
							pageItemEl.eq(indexNow).stop(true).css({zIndex:'1'}).fadeTo(400,0);
							pageItemEl.eq(activeIndex).css({left:-$('.pageItemElWrap',pWrap).width(),opacity:'1',zIndex:'2'}).show().animate({left:'0'},p.duration,p.easing);
						}
					}
					if(p.effect == 'vSlide'){
						if(indexNow < activeIndex){
							pageItemEl.eq(indexNow).stop(true).css({zIndex:'1'}).fadeTo(400,0);
							pageItemEl.eq(activeIndex).css({top:$('.pageItemElWrap',pWrap).height(),opacity:'1',zIndex:'2'}).show().animate({top:'0'},p.duration,p.easing);
						}
						if(indexNow > activeIndex){
							pageItemEl.eq(indexNow).stop(true).css({zIndex:'1'}).fadeTo(400,0);
							pageItemEl.eq(activeIndex).css({top:-$('.pageItemElWrap',pWrap).height(),opacity:'1',zIndex:'2'}).show().animate({top:'0'},p.duration,p.easing);
						}
					}
					

					var pageNext = $('.pageNext',$(this)),
						pagePrev = $('.pagePrev',$(this)),
						pageLinkLength = $('.pageLink',$(this)).length	
					disableNext($('.pageLinkActive',$(this)).html(), pageLinkLength, pageNext)
					disablePrev($('.pageLinkActive',$(this)).html(), pagePrev)
					
					navHide();
					
				})
				return false;
			})
			
			
			

			if(p.pagePos == 'after')
			pageLinkWrap.appendTo(pWrap);
			if(p.pagePos == 'before')
			pageLinkWrap.prependTo(pWrap);
			if(p.pagePos == 'double'){
				pageLinkWrap.clone().prependTo(pWrap);
				pageLinkWrap.appendTo(pWrap);
			}
			

			var disableNext = function(pActive,pLength,pNext){	
				if(pActive == pLength){
					pNext.addClass('disable')
				}else{
					pNext.removeClass('disable')	
				}
			}

			var disablePrev = function(pActive,pPrev){	
				if(pActive == 1){
					pPrev.addClass('disable')
				}else{
					pPrev.removeClass('disable')	
				}
			}
			

			$('.pageLinkWrap',pWrap).each(function(){
				var plw = $(this);
				$('.pageLink',plw).eq(0).addClass('pageLinkActive');
				var pageNext = $('<span>').html('»').addClass('pageNext').appendTo(plw);
				var pagePrev = $('<span>').html('«').addClass('pagePrev').addClass('disable').prependTo(plw);
				var nowActiveLink = 1
				
				var pageLinkLength = $('.pageLink',plw).length
				
				
				
				pageNext.on('click',function(){
					
					nowActiveLink = parseInt($('.pageLinkActive',plw).html());
					pagePrev.removeClass('disable')
					nal = nowActiveLink
					if(nowActiveLink < pageLinkLength){
						autoClick();

						disableNext($('.pageLinkActive',plw).html(), pageLinkLength, pageNext)
					}
				})
				
				pagePrev.on('click',function(){
					nowActiveLink = parseInt($('.pageLinkActive',plw).html());
					pageNext.removeClass('disable')
					nal = nowActiveLink-2
					if(nowActiveLink > 1){
						autoClick();

						disablePrev($('.pageLinkActive',plw).html(), pagePrev)
					}
				})
				
				function autoClick(){
					$('.pageLink',plw).eq((nal)).trigger('click')	
				}
			})
			

			if(p.effect == 'hSlide'){
				var pageItemElWrap = $('<div>').addClass('pageItemElWrap').css({height:pHeight, position:'relative', width:'100%',overflow:'hidden'})
				pageItemEl.wrapAll(pageItemElWrap)
				pageItemEl.eq(0).css({position:'absolute',top:'0',width:$('.pageItemElWrap',pWrap).width(),left:'0'})
				pageItemEl.not(':eq(0)').css({position:'absolute',top:'0',width:$('.pageItemElWrap',pWrap).width(),left:-$('.pageItemElWrap',pWrap).width()})
			}
			if(p.effect == 'vSlide'){
				var pageItemElWrap = $('<div>').addClass('pageItemElWrap').css({height:pHeight, position:'relative', width:'100%',overflow:'hidden'})
				pageItemEl.wrapAll(pageItemElWrap)
				pageItemEl.eq(0).css({position:'absolute',top:'0',width:$('.pageItemElWrap',pWrap).width(),left:'0'})
				pageItemEl.not(':eq(0)').css({position:'absolute',top:'0',width:$('.pageItemElWrap',pWrap).width(),top:-$('.pageItemElWrap',pWrap).height()})
			}
			
			var pageAnd = $('<span>').addClass('pageAnd').html('»»');
			$('.pageNext',pWrap).after(pageAnd.addClass('pageLast'));
			var pageAnd = $('<span>').addClass('pageAnd').html('««');
			$('.pagePrev',pWrap).before(pageAnd.addClass('pageFirst'));		
			
			//start
			var navHide = function(){
				$('.pageLinkWrap',pWrap).each(function(){
					
					var plw = $(this);
					
					var pageLink = $('.pageLink',plw);
					var pageLinkLength = pageLink.length;
					var pageLinkActive = $('.pageLinkActive',plw);
	
					pageLink.show();
					if(pageLinkLength > p.maxPage){
						var activeIndex = pageLink.index(pageLinkActive);
						pageLink.each(function(e){
							var pageLinkIndex = pageLink.index($(this));
							if(pageLinkIndex > (activeIndex + Math.floor(p.maxPage/2))){
								$(this).hide();
							}
							if(pageLinkIndex < (activeIndex - Math.floor(p.maxPage/2))){
								$(this).hide();
							}
						})	
						
						if($('.pageLink:visible',plw).length < p.maxPage){
							if($('.pageLink',plw).index($('.pageLinkActive',plw)) < (p.maxPage-Math.floor(p.maxPage/2))){
								for(i=0;i<p.maxPage;i++){
									$('.pageLink',plw).eq(i).show();
								}
							}	
							if($('.pageLink',plw).index($('.pageLinkActive',plw)) > (pageLinkLength-(p.maxPage-Math.floor(p.maxPage/2)))){
								for(i=pageLinkLength-p.maxPage;i<pageLinkLength;i++){
									$('.pageLink',plw).eq(i).show();
								}
							}	
						}
					}
					if($('.pageLink',plw).index($('.pageLinkActive',plw)) == (pageLinkLength-1)){
							$('.pageLast',plw).addClass('disable');
					}else{
						$('.pageLast',plw).removeClass('disable');
					}
					if($('.pageLink',plw).index($('.pageLinkActive',plw)) == 0){
						$('.pageFirst',plw).addClass('disable');
					}else{
						$('.pageFirst',plw).removeClass('disable');
					}
				})
			}
			
			pWrap.on('click','.pageLast',function(){
				$('.pageLink:last',pWrap).trigger('click');
			})
			pWrap.on('click','.pageFirst',function(){
				$('.pageLink:first',pWrap).trigger('click');
			})
			
			navHide();
		});
	};
})(jQuery);