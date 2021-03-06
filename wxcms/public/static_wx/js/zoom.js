 $(document).ready(function() {
			var t9 = new PopupLayer({trigger:"#ele9",popupBlk:"#blk9",closeBtn:"#blk9",useOverlay:true,useFx:true,
				offsets:{
					x:0,
					y:-41
				}
			});
			t9.doEffects = function(way){
				if(way == "open"){
					this.popupLayer.css({opacity:0.3}).show(400,function(){
						this.popupLayer.animate({
							left:($(document).width() - this.popupLayer.width())/2,
							top:(document.documentElement.clientHeight - this.popupLayer.height())/2 + $(document).scrollTop(),
							opacity:0.8
						},1000,function(){this.popupLayer.css("opacity",1)}.binding(this));
					}.binding(this));
				}
				else{
					this.popupLayer.animate({
						left:this.trigger.offset().left,
						top:this.trigger.offset().top,
						opacity:0.1
					},{duration:500,complete:function(){this.popupLayer.css("opacity",1);this.popupLayer.hide()}.binding(this)});
				}
			}
		});