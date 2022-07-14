@extends('layouts.app')

@section('content')

<script>
    window.bioEp={bgEl:{},popupEl:{},closeBtnEl:{},shown:!1,overflowDefault:"visible",transformDefault:"",width:400,height:220,html:"",css:"",fonts:[],delay:5,showOnDelay:!1,cookieExp:30,showOncePerSession:!1,onPopup:null,cookieManager:{create:function(a,b,d,c){var e="";c?e="; expires=0":d&&(c=new Date,c.setTime(c.getTime()+864E5*d),e="; expires="+c.toGMTString());document.cookie=a+"="+b+e+"; path=/"},get:function(a){a+="=";for(var b=document.cookie.split(";"),d=0;d<b.length;d++){for(var c=b[d];" "==
c.charAt(0);)c=c.substring(1,c.length);if(0===c.indexOf(a))return c.substring(a.length,c.length)}return null},erase:function(a){this.create(a,"",-1)}},checkCookie:function(){if(0>=this.cookieExp){if(this.showOncePerSession&&"true"==this.cookieManager.get("bioep_shown_session"))return!0;this.cookieManager.erase("bioep_shown");return!1}return"true"==this.cookieManager.get("bioep_shown")?!0:!1},addCSS:function(){for(var a=0;a<this.fonts.length;a++){var b=document.createElement("link");b.href=this.fonts[a];
b.type="text/css";b.rel="stylesheet";document.head.appendChild(b)}a=document.createTextNode("#bio_ep_bg {display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: #000; opacity: 0.3; z-index: 10001;}#bio_ep {display: none; position: fixed; width: "+this.width+"px; height: "+this.height+"px; font-family: 'Titillium Web', sans-serif; font-size: 16px; left: 50%; top: 50%; transform: translateX(-50%) translateY(-50%); -webkit-transform: translateX(-50%) translateY(-50%); -ms-transform: translateX(-50%) translateY(-50%); background-color: #fff; box-shadow: 0px 1px 4px 0 rgba(0,0,0,0.5); z-index: 10002;}#bio_ep_close {position: absolute; left: 100%; margin: -8px 0 0 -12px; width: 20px; height: 20px; color: #fff; font-size: 12px; font-weight: bold; text-align: center; border-radius: 50%; background-color: #5c5c5c; cursor: pointer;}"+
this.css);b=document.createElement("style");b.type="text/css";b.appendChild(a);document.head.insertBefore(b,document.getElementsByTagName("style")[0])},addPopup:function(){this.bgEl=document.createElement("div");this.bgEl.id="bio_ep_bg";document.body.appendChild(this.bgEl);document.getElementById("bio_ep")?this.popupEl=document.getElementById("bio_ep"):(this.popupEl=document.createElement("div"),this.popupEl.id="bio_ep",this.popupEl.innerHTML=this.html,document.body.appendChild(this.popupEl));document.getElementById("bio_ep_close")?
this.closeBtnEl=document.getElementById("bio_ep_close"):(this.closeBtnEl=document.createElement("div"),this.closeBtnEl.id="bio_ep_close",this.closeBtnEl.appendChild(document.createTextNode("X")),this.popupEl.insertBefore(this.closeBtnEl,this.popupEl.firstChild))},showPopup:function(){if(!this.shown&&(this.bgEl.style.display="block",this.popupEl.style.display="block",this.scalePopup(),this.overflowDefault=document.body.style.overflow,document.body.style.overflow="hidden",this.shown=!0,this.cookieManager.create("bioep_shown",
"true",this.cookieExp,!1),this.cookieManager.create("bioep_shown_session","true",0,!0),"function"===typeof this.onPopup))this.onPopup()},hidePopup:function(){this.bgEl.style.display="none";this.popupEl.style.display="none";document.body.style.overflow=this.overflowDefault},scalePopup:function(){var a=bioEp.popupEl.offsetWidth,b=bioEp.popupEl.offsetHeight,d=window.innerWidth,c=window.innerHeight,e=0,f=0,g=a/b;a>d-40&&(e=d-40,f=e/g,f>c-40&&(f=c-40,e=f*g));0===f&&b>c-40&&(e=(c-40)*g);a=e/a;if(0>=a||
1<a)a=1;""===this.transformDefault&&(this.transformDefault=window.getComputedStyle(this.popupEl,null).getPropertyValue("transform"));this.popupEl.style.transform=this.transformDefault+" scale("+a+")"},addEvent:function(a,b,d){a.addEventListener?a.addEventListener(b,d,!1):a.attachEvent&&a.attachEvent("on"+b,d)},loadEvents:function(){this.addEvent(document,"mouseout",function(a){a=a?a:window.event;"input"!=a.target.tagName.toLowerCase()&&(a.clientX>=Math.max(document.documentElement.clientWidth,window.innerWidth||
0)-50||50<=a.clientY||a.relatedTarget||a.toElement||bioEp.showPopup())}.bind(this));this.addEvent(this.closeBtnEl,"click",function(){bioEp.hidePopup()});this.addEvent(window,"resize",function(){bioEp.scalePopup()})},setOptions:function(a){this.width="undefined"===typeof a.width?this.width:a.width;this.height="undefined"===typeof a.height?this.height:a.height;this.html="undefined"===typeof a.html?this.html:a.html;this.css="undefined"===typeof a.css?this.css:a.css;this.fonts="undefined"===typeof a.fonts?
this.fonts:a.fonts;this.delay="undefined"===typeof a.delay?this.delay:a.delay;this.showOnDelay="undefined"===typeof a.showOnDelay?this.showOnDelay:a.showOnDelay;this.cookieExp="undefined"===typeof a.cookieExp?this.cookieExp:a.cookieExp;this.showOncePerSession="undefined"===typeof a.showOncePerSession?this.showOncePerSession:a.showOncePerSession;this.onPopup="undefined"===typeof a.onPopup?this.onPopup:a.onPopup},domReady:function(a){"interactive"===document.readyState||"complete"===document.readyState?
a():this.addEvent(document,"DOMContentLoaded",a)},init:function(a){"undefined"!==typeof a&&this.setOptions(a);this.addCSS();this.domReady(function(){bioEp.checkCookie()||(bioEp.addPopup(),setTimeout(function(){bioEp.loadEvents();bioEp.showOnDelay&&bioEp.showPopup()},1E3*bioEp.delay))})}};
</script>

<script type="text/html" id="exit">


    <div id="bio_ep_content">

        <div class="exit-img" id="bio_ep_exit">
            <img src="/images/web/blog-bg.webp" alt="Váš názor" id="bio_ep_img">


            <div id="bio_ep_form">
            <h2>Na Vašem názoru nám záleží</h2>
            <p>Vyberte jednu z možností důvodu vašeho odchodu:</p>

            <ul>
                <li>
                    <input type="radio" name="reason" value="index">
                </li>
                <li>
                    <input type="radio" name="reason" value="index">
                </li>
                <li>
                    <input type="radio" name="reason" value="index">
                </li>
                <li>
                    <input type="radio" name="reason" value="index">
                </li>
            </ul>



            <textarea name="reason-other" class="form-control" placeholder="Popište prosím důvod ..." v-model="message"></textarea>

            <button type="submit" class="secondary-btn">
                Zanechat názor
                <i class="icofont-thin-right"></i>
            </button>
            <a href="#" class="text-muted small" data-dismiss="modal">
                Zavřít
            </a>
            </div>
        </div>


    </div>




</script>

<script>
bioEp.init({
	html: document.getElementById('exit').innerHTML,
	css: '#bio_ep {width: 1000px; height: 385px; color: #333; background-color: #fafafa; text-align: center;}' +
		'#bio_ep_content {padding: 0px 0 0 0; font-family: "Titillium Web";}' +
		'#bio_ep_exit {display: flex; text-align: start; padding: 0px;}' +
		'#bio_ep_img {width: 473px; height: 385px;}' +
		'#bio_ep_form {dispaly: grid;}' +
		'#bio_ep_content span:nth-child(2) {display: block; color: #f21b1b; font-size: 32px; font-weight: 600;}' +
		'#bio_ep_content span:nth-child(3) {display: block; font-size: 16px;}' +
		'#bio_ep_content span:nth-child(4) {display: block; margin: -5px 0 0 0; font-size: 16px; font-weight: 600;}' +
		'.bio_btn {display: inline-block; margin: 18px 0 0 0; padding: 7px; color: #fff; font-size: 14px; font-weight: 600; background-color: #70bb39; border: 1px solid #47ad0b; cursor: pointer; -webkit-appearance: none; -moz-appearance: none; border-radius: 0; text-decoration: none;}',
	fonts: ['//fonts.googleapis.com/css?family=Titillium+Web:300,400,600'],
	cookieExp: 0
});
</script>

{{-- <div id="bio_ep_content">
    <img src="http://beeker.io/images/posts/2/tag.png" alt="Claim your discount!" />
    <span>HOLD ON!</span>
    <span>Click the button below to get a special discount</span>
    <span>This offer will NOT show again!</span>
    <a href="#YOURURLHERE" class="bio_btn">CLAIM YOUR DISCOUNT</a>
</div> --}}



    <div class="container  m-5" style="padding: 150px">




</div>

{{-- <div class="modal" tabindex="-1" role="dialog" id="exit">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-wrapper">
                    <div class="modal-col modal-left">
                        <img src="/images/web/blog-bg.webp" alt="Váš názor" class="modal-thumb">
                    </div>
                    <div class="modal-col modal-right">
                        <h2>Na Vašem názoru nám záleží</h2>
                        <p>Vyberte jednu z možností důvodu vašeho odchodu:</p>
                        <form action="/rezervace/feedback" method="POST" ref="leaveForm" @submit="submit($event)">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="caravan" :value="caravan.id">
                            <input type="hidden" name="email" :value="email">
                            <input type="hidden" name="start_date" :value="start_date">
                            <input type="hidden" name="end_date" :value="end_date">
                            <input type="hidden" name="price" :value="price">
                            <input type="hidden" name="visited" :value="visited">
                            <div class="form-group">
                                <div v-for="(reason, index) in reasons" :key="index" class="form-check radio">
                                    <label :for="'reason-' + index" class="form-check-label">
                                        <input type="radio" name="reason" :value="index" :id="'reason-' + index" class="form-check-input" v-model="selectedReason">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group" v-show="selectedReason == 4">
                                <textarea name="reason-other" class="form-control" placeholder="Popište prosím důvod ..." v-model="message"></textarea>
                            </div>
                            <div class="form-group actions mt-5">
                                <button type="submit" class="secondary-btn">
                                    Zanechat názor
                                    <i class="icofont-thin-right"></i>
                                </button>
                                <a href="#" class="text-muted small" data-dismiss="modal">
                                    Zavřít
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div> --}}


@endsection
