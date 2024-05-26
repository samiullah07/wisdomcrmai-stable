<?php
$header_min = true;
$no_footer = true;
$use_bootstrap_icons = true;
require_once("customer-restrict.php");
require_once("../../inc/includes.php");
define('META_TITLE', 'Student Qualitative and Quantitative Data');
define('META_DESCRIPTION', 'Student Qualitative and Quantitative Data');
require_once("../../inc/header.php");
$getCustomer = $customers->getCustomer($_SESSION['id_customer']);
if($getCustomer->id){
    $get = $customers->getListBySchool($getCustomer->school);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>



<section id="inner-page">
    <div class="container">
        <div class="row">
            <div class="col"><h3>Student Qualitative and Quantitative Data</h3></div>
        </div>
    </div>
</section>


<section id="panel-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <?php require_once("_customer-sidebar.php");?>
            </div>
            <div class="col-12 col-sm-12 col-md-9 col-lg-9">

                <iframe
                    id="JotFormIFrame-240074856415861"
                    title="WizdomCRM AI Tutor Platform - Qualitative and Quantitative Data "
                    onload="window.parent.scrollTo(0,0)"
                    allowtransparency="true"
                    allowfullscreen="true"
                    allow="geolocation; microphone; camera"
                    src="https://form.jotform.com/240074856415861"
                    frameborder="0"
                    style="min-width:100%;max-width:100%;height:539px;border:none;"
                    scrolling="no"
                >
                </iframe>
                <script type="text/javascript">
                    var ifr = document.getElementById("JotFormIFrame-240074856415861");
                    if (ifr) {
                        var src = ifr.src;
                        var iframeParams = [];
                        if (window.location.href && window.location.href.indexOf("?") > -1) {
                            iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
                        }
                        if (src && src.indexOf("?") > -1) {
                            iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
                            src = src.substr(0, src.indexOf("?"))
                        }
                        iframeParams.push("isIframeEmbed=1");
                        ifr.src = src + "?" + iframeParams.join('&');
                    }
                    window.handleIFrameMessage = function(e) {
                        if (typeof e.data === 'object') { return; }
                        var args = e.data.split(":");
                        if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
                        if (!iframe) { return; }
                        switch (args[0]) {
                            case "scrollIntoView":
                                iframe.scrollIntoView();
                                break;
                            case "setHeight":
                                iframe.style.height = args[1] + "px";
                                if (!isNaN(args[1]) && parseInt(iframe.style.minHeight) > parseInt(args[1])) {
                                    iframe.style.minHeight = args[1] + "px";
                                }
                                break;
                            case "collapseErrorPage":
                                if (iframe.clientHeight > window.innerHeight) {
                                    iframe.style.height = window.innerHeight + "px";
                                }
                                break;
                            case "reloadPage":
                                window.location.reload();
                                break;
                            case "loadScript":
                                if( !window.isPermitted(e.origin, ['jotform.com', 'jotform.pro']) ) { break; }
                                var src = args[1];
                                if (args.length > 3) {
                                    src = args[1] + ':' + args[2];
                                }
                                var script = document.createElement('script');
                                script.src = src;
                                script.type = 'text/javascript';
                                document.body.appendChild(script);
                                break;
                            case "exitFullscreen":
                                if      (window.document.exitFullscreen)        window.document.exitFullscreen();
                                else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
                                else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
                                else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
                                else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
                                break;
                        }
                        var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
                        if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
                            var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
                            iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
                        }
                    };
                    window.isPermitted = function(originUrl, whitelisted_domains) {
                        var url = document.createElement('a');
                        url.href = originUrl;
                        var hostname = url.hostname;
                        var result = false;
                        if( typeof hostname !== 'undefined' ) {
                            whitelisted_domains.forEach(function(element) {
                                if( hostname.slice((-1 * element.length - 1)) === '.'.concat(element) ||  hostname === element ) {
                                    result = true;
                                }
                            });
                            return result;
                        }
                    };
                    if (window.addEventListener) {
                        window.addEventListener("message", handleIFrameMessage, false);
                    } else if (window.attachEvent) {
                        window.attachEvent("onmessage", handleIFrameMessage);
                    }
                </script>

            </div>
        </div>
    </div>
</section>



<?php
require_once("../../inc/footer.php");
?>
