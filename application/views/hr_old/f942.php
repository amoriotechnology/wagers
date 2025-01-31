<!DOCTYPE html>
<html style="width: 100%; height: 100%;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/formviewer.css">
    <script src="assets/formviewer.js" type="text/javascript"></script>
    <script src="assets/formvuapi.js" type="text/javascript"></script>
    <script type="text/javascript">
(function() {
"use strict";


 
/**
 * Shorthand helper function to getElementById
 * @param id
 * @returns {Element}
 */
var d = function (id) {
    return document.getElementById(id);
};

var ClassHelper = (function() {
    return {
        addClass: function(ele, name) {
            var classes = ele.className.length !== 0 ? ele.className.split(" ") : [];
            var index = classes.indexOf(name);
            if (index === -1) {
                classes.push(name);
                ele.className = classes.join(" ");
            }
        },

        removeClass: function(ele, name) {
            var classes = ele.className.length !== 0 ? ele.className.split(" ") : [];
            var index = classes.indexOf(name);
            if (index !== -1) {
                classes.splice(index, 1);
            }
            ele.className = classes.join(" ");
        }
    };
})();

var Button = {};

FormViewer.on('ready', function(data) {
    // Grab buttons
    Button.zoomIn = d('btnZoomIn');
    Button.zoomOut = d('btnZoomOut');

    if (Button.zoomIn) {
        Button.zoomIn.onclick = function(e) { FormViewer.zoomIn(); e.preventDefault(); };
    }
    if (Button.zoomOut) {
        Button.zoomOut.onclick = function(e) { FormViewer.zoomOut(); e.preventDefault(); };
    }

    document.title = data.title ? data.title : data.fileName;
    var pageLabels = data.pageLabels;
    var btnPage = d('btnPage');
    if (btnPage != null) {
        btnPage.innerHTML = pageLabels.length ? pageLabels[data.page - 1] : data.page;
        btnPage.title = data.page + " of " + data.pagecount;

        FormViewer.on('pagechange', function(data) {
            d('btnPage').innerHTML = pageLabels.length ? pageLabels[data.page - 1] : data.page;
            d('btnPage').title = data.page + " of " + data.pagecount;
        });
    }

    if (idrform.app) {
        idrform.app.execFunc = idrform.app.execMenuItem;
        idrform.app.execMenuItem = function (str) {
            switch (str.toUpperCase()) {
                case "FIRSTPAGE":
                    idrform.app.activeDocs[0].pageNum = 0;
                    FormViewer.goToPage(1);
                    break;
                case "LASTPAGE":
                    idrform.app.activeDocs[0].pageNum = FormViewer.config.pagecount - 1;
                    FormViewer.goToPage(FormViewer.config.pagecount);
                    break;
                case "NEXTPAGE":
                    idrform.app.activeDocs[0].pageNum++;
                    FormViewer.next();
                    break;
                case "PREVPAGE":
                    idrform.app.activeDocs[0].pageNum--;
                    FormViewer.prev();
                    break;
                default:
                    idrform.app.execFunc(str);
                    break;
            }
        }
    }

    document.addEventListener('keydown', function (e) {
        if (e.target != null) {
            switch (e.target.constructor) {
                case HTMLInputElement:
                case HTMLTextAreaElement:
                case HTMLVideoElement:
                case HTMLAudioElement:
                case HTMLSelectElement:
                    return;
                default:
                    break;
            }
        }
        switch (e.keyCode) {
            case 33: // Page Up
                FormViewer.prev();
                e.preventDefault();
                break;
            case 34: // Page Down
                FormViewer.next();
                e.preventDefault();
                break;
            case 37: // Left Arrow
                data.isR2L ? FormViewer.next() : FormViewer.prev();
                e.preventDefault();
                break;
            case 39: // Right Arrow
                data.isR2L ? FormViewer.prev() : FormViewer.next();
                e.preventDefault();
                break;
            case 36: // Home
                FormViewer.goToPage(1);
                e.preventDefault();
                break;
            case 35: // End
                FormViewer.goToPage(data.pagecount);
                e.preventDefault();
                break;
        }
    });
});

window.addEventListener("beforeprint", function(event) {
    FormViewer.setZoom(FormViewer.ZOOM_AUTO);
});

})();










</script>


 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
 <defs>
<style type="text/css"><![CDATA[
.g0_6{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,73.3H880.4" class="g0_6"/>
</svg>

 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
 <defs>
<style type="text/css"><![CDATA[
.g0_5{
fill: none;
stroke: #000;
stroke-width: 3.055;
stroke-miterlimit: 10;
}
.g1_5{
fill: #000;
}
.g2_5{
fill: none;
stroke: #000;
stroke-width: 2.291;
stroke-miterlimit: 10;
stroke-dasharray: 10,5;
}
.g3_5{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
.g4_5{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
.g5_5{
fill: #C0C0C0;
}
]]></style>
</defs>
<path d="M54.6,55H880.4M54.6,128.3H880.4" class="g0_5"/>
<path d="M484,198.6h55v-55H484v55Z" class="g1_5"/>
<path d="M54.6,843.3H880.4" class="g2_5"/>
<path d="M198,861.3v55.8M54.6,916.7H198.4m-.8,0H748.4" class="g3_5"/>
<path d="M747.2,880H880.4" class="g4_5"/>
<path d="M748,861.3v19.1m-.8,36.3H880.4M748,879.6v37.8" class="g3_5"/>
<path d="M328.5,916.7h333M330,915.1V964m-1.5,16.8H660.4M330,962.1v20.3M658.5,916.7H825.4M658.5,980.8H825.4M660,915.1v67.3M824.6,916.7h56.9m-56.9,64.1h56.9M880,915.1v67.3" class="g0_5"/>
<path d="M825,915.1v67.3" class="g4_5"/>
<path d="M55,1090.8H330v-110H55v110Z" class="g5_5"/>
<path d="M54.6,980.8H330.4" class="g4_5"/>
<path d="M54.6,1090.8H330.4" class="g3_5"/>
<path d="M330,980.4v111.2" class="g4_5"/>
<path d="M329.6,1090.8h22.8" class="g3_5"/>
<path d="M351.6,1017.5H880.4m-528.8,36.7H880.4" class="g4_5"/>
<path d="M351.6,1090.8H880.4" class="g3_5"/>
</svg>

 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
 <defs>
</defs>
</svg>



 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
 <defs>
<style type="text/css"><![CDATA[
.g0_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
.g1_3{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
.g2_3{
fill: #000;
}
.g3_3{
fill: none;
stroke: #000;
stroke-width: 1.145;
stroke-miterlimit: 10;
}
.g4_3{
fill: #FFF;
}
.g5_3{
fill: #D9D9D9;
}
.g6_3{
fill: none;
stroke: #000;
stroke-width: 0.762;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,55H583.4" class="g0_3"/>
<path d="M583,54.2V70.7m0,-.8V92" class="g1_3"/>
<path d="M582.6,55H880.4" class="g0_3"/>
<path d="M55,110h55V91.7H55V110Z" class="g2_3"/>
<path d="M54.6,91.7H880.4" class="g3_3"/>
<path d="M54.6,110H880.4" class="g1_3"/>
<path d="M740.7,136h15.2V120.7H740.7V136Z" class="g4_3"/>
<path d="M740.7,136h15.2V120.7H740.7V136ZM319,174.2H440V146.7H319v27.5Zm362.6,9.1H836.4M681.6,210.8H836.4M682,182.9v28.3M835.6,183.3h44.8m-44.8,27.5h44.8M880,182.9v28.3m-198.4,4.2H836.4M681.6,242.9H836.4M682,215v28.3M835.6,215.4h44.8m-44.8,27.5h44.8M880,215v28.3" class="g1_3"/>
<path d="M682,275H836V247.5H682V275Z" class="g5_3"/>
<path d="M681.6,247.5H836.4M681.6,275H836.4M682,247.1v28.3" class="g1_3"/>
<path d="M836,275h44V247.5H836V275Z" class="g5_3"/>
<path d="M835.6,247.5h44.8M835.6,275h44.8M880,247.1v28.3" class="g1_3"/>
<path d="M682,307.1H836V279.6H682v27.5Z" class="g5_3"/>
<path d="M681.6,279.6H836.4M681.6,307.1H836.4M682,279.2v28.3" class="g1_3"/>
<path d="M836,307.1h44V279.6H836v27.5Z" class="g5_3"/>
<path d="M835.6,279.6h44.8m-44.8,27.5h44.8M880,279.2v28.3m-198.4,4.2H836.4M681.6,339.2H836.4M682,311.3v28.3M835.6,311.7h44.8m-44.8,27.5h44.8M880,311.3v28.3m-198.4,4.2H836.4M681.6,371.3H836.4M682,343.4v28.2M835.6,343.8h44.8m-44.8,27.5h44.8M880,343.4v28.2M681.6,385H836.4M681.6,412.5H836.4M682,384.6v28.3M835.6,385h44.8m-44.8,27.5h44.8M880,384.6v28.3m-198.4,4.2H836.4M681.6,444.6H836.4M682,416.7V445M835.6,417.1h44.8m-44.8,27.5h44.8M880,416.7V445m-198.4,4.2H836.4M681.6,476.7H836.4M682,448.8v28.3M835.6,449.2h44.8m-44.8,27.5h44.8M880,448.8v28.3M681.6,490.4H836.4M681.6,517.9H836.4M682,490v28.3M835.6,490.4h44.8m-44.8,27.5h44.8M880,490v28.3" class="g1_3"/>
<path d="M682,577.5H836V550H682v27.5Z" class="g5_3"/>
<path d="M681.6,550H836.4M681.6,577.5H836.4M682,549.6v28.3" class="g1_3"/>
<path d="M836,577.5h44V550H836v27.5Z" class="g5_3"/>
<path d="M835.6,550h44.8m-44.8,27.5h44.8M880,549.6v28.3" class="g1_3"/>
<path d="M682,632.5H836V605H682v27.5Z" class="g5_3"/>
<path d="M681.6,605H836.4M681.6,632.5H836.4M682,604.6v28.3" class="g1_3"/>
<path d="M836,632.5h44V605H836v27.5Z" class="g5_3"/>
<path d="M835.6,605h44.8m-44.8,27.5h44.8M880,604.6v28.3" class="g1_3"/>
<path d="M55,660h55V641.7H55V660Z" class="g2_3"/>
<path d="M54.6,641.7H880.4" class="g3_3"/>
<path d="M54.6,660H880.4" class="g1_3"/>
<path d="M77,713.5H92.3V698.2H77v15.3Z" class="g4_3"/>
<path d="M77,713.5H92.3V698.2H77v15.3ZM363,715H627V687.5H363V715Zm297,0H836V687.5H660V715Z" class="g1_3"/>
<path d="M627,747.1h23.1V724.2H627v22.9Z" class="g4_3"/>
<path d="M649,724.2H628.1M649,747.1H628.1m22,-.9V725.1M627,746.2V725.1" class="g1_3"/>
<path d="M627,725.1v22.4m-.4,-.4H649m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H628.1m20.9,0H626.6m.4,-.4v22.4" class="g6_3"/>
<path d="M660,747.1h23.1V724.2H660v22.9Z" class="g4_3"/>
<path d="M682,724.2H661.1M682,747.1H661.1m22,-.9V725.1M660,746.2V725.1" class="g1_3"/>
<path d="M660,725.1v22.4m-.4,-.4H682m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H661.1m20.9,0H659.6m.4,-.4v22.4" class="g6_3"/>
<path d="M693,747.1h23.1V724.2H693v22.9Z" class="g4_3"/>
<path d="M715,724.2H694.1M715,747.1H694.1m22,-.9V725.1M693,746.2V725.1" class="g1_3"/>
<path d="M693,725.1v22.4m-.4,-.4H715m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H694.1m20.9,0H692.6m.4,-.4v22.4" class="g6_3"/>
<path d="M726,747.1h23.1V724.2H726v22.9Z" class="g4_3"/>
<path d="M748,724.2H727.1M748,747.1H727.1m22,-.9V725.1M726,746.2V725.1" class="g1_3"/>
<path d="M726,725.1v22.4m-.4,-.4H748m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H727.1m20.9,0H725.6m.4,-.4v22.4" class="g6_3"/>
<path d="M759,747.1h23.1V724.2H759v22.9Z" class="g4_3"/>
<path d="M781,724.2H760.1M781,747.1H760.1m22,-.9V725.1M759,746.2V725.1" class="g1_3"/>
<path d="M759,725.1v22.4m-.4,-.4H781m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H760.1m20.9,0H758.6m.4,-.4v22.4" class="g6_3"/>
<path d="M77,763.9H92.3V748.6H77v15.3Z" class="g4_3"/>
<path d="M77,763.9H92.3V748.6H77v15.3Z" class="g1_3"/>
<path d="M55,788.3h55V770H55v18.3Z" class="g2_3"/>
<path d="M54.6,770H880.4" class="g3_3"/>
<path d="M54.6,788.3H880.4" class="g1_3"/>
<path d="M220,889.2H539V825H220v64.2Z" class="g4_3"/>
<path d="M242,825H517M242,889.2H517M539,847v20.2M220,847v20.2" class="g1_3"/>
<path d="M220,867.2v22.3m-.4,-.3H242m275,0h22.4m-.4,.3V867.2M539,847V824.6m.4,.4H517m-275,0H219.6m.4,-.4V847" class="g6_3"/>
<path d="M220,925.8H363V898.3H220v27.5Z" class="g4_3"/>
<path d="M220,925.8H363V898.3H220v27.5ZM649,852.5H869V825H649v27.5Zm0,36.7H869V861.7H649v27.5Zm55,36.6H869V898.3H704v27.5ZM54.6,935H880.4" class="g1_3"/>
<path d="M847,956.4h15.3V941.1H847v15.3Z" class="g4_3"/>
<path d="M847,956.4h15.3V941.1H847v15.3ZM187,999.2H583V971.7H187v27.5Zm495,0H869V971.7H682v27.5Z" class="g1_3"/>
<path d="M187,1035.8H583v-27.5H187v27.5Z" class="g4_3"/>
<path d="M209,1008.3H561m-352,27.5H561m22,-5.5v-16.5m-396,16.5v-16.5" class="g1_3"/>
<path d="M187,1013.8v22.4m-.4,-.4H209m352,0h22.4m-.4,.4v-22.4m0,16.5V1008m.4,.3H561m-352,0H186.6m.4,-.3v22.3" class="g6_3"/>
<path d="M682,1035.8H814v-27.5H682v27.5Z" class="g4_3"/>
<path d="M704,1008.3h88m-88,27.5h88m22,-5.5v-16.5m-132,16.5v-16.5" class="g1_3"/>
<path d="M682,1013.8v22.4m-.4,-.4H704m88,0h22.4m-.4,.4v-22.4m0,16.5V1008m.4,.3H792m-88,0H681.6m.4,-.3v22.3" class="g6_3"/>
<path d="M187,1072.5H583V1045H187v27.5Zm495,0H869V1045H682v27.5Zm-495,36.7H583v-27.5H187v27.5Zm495,0H869v-27.5H682v27.5Zm-495,36.6H462v-27.5H187v27.5Zm341,0h55v-27.5H528v27.5Zm154,0H869v-27.5H682v27.5Z" class="g1_3"/>
<path d="M54.6,1155H781.4m-.8,0h99.8" class="g0_3"/>
</svg>


 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
 <defs>
<style type="text/css"><![CDATA[
.g0_2{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
.g1_2{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
.g2_2{
fill: #000;
}
.g3_2{
fill: #D9D9D9;
}
.g4_2{
fill: #FFF;
}
]]></style>
</defs>
<path d="M54.6,55H583.4" class="g0_2"/>
<path d="M583,54.2V70.7m0,-.8V92" class="g1_2"/>
<path d="M582.6,55H880.4" class="g0_2"/>
<path d="M55,110h55V91.7H55V110Z" class="g2_2"/>
<path d="M54.6,91.7H880.4M54.6,110H880.4" class="g1_2"/>
<path d="M682,146.7H836V119.2H682v27.5Z" class="g3_2"/>
<path d="M681.6,119.2H836.4M681.6,146.7H836.4M682,118.8v28.3" class="g1_2"/>
<path d="M836,146.7h44V119.2H836v27.5Z" class="g3_2"/>
<path d="M835.6,119.2h44.8m-44.8,27.5h44.8M880,118.8v28.3" class="g1_2"/>
<path d="M495,183.3H627V155.8H495v27.5Z" class="g3_2"/>
<path d="M495,183.3H627V155.8H495v27.5Zm186.6,9.2H836.4M681.6,220H836.4M682,192.1v28.3M835.6,192.5h44.8M835.6,220h44.8M880,192.1v28.3m-198.4,8.8H836.4M681.6,256.7H836.4M682,228.8v28.3M835.6,229.2h44.8m-44.8,27.5h44.8M880,228.8v28.3M681.6,275H836.4M681.6,302.5H836.4M682,274.6v28.3M835.6,275h44.8m-44.8,27.5h44.8M880,274.6v28.3" class="g1_2"/>
<path d="M682,339.2H836V311.7H682v27.5Z" class="g3_2"/>
<path d="M681.6,311.7H836.4M681.6,339.2H836.4M682,311.3v28.3" class="g1_2"/>
<path d="M836,339.2h44V311.7H836v27.5Z" class="g3_2"/>
<path d="M835.6,311.7h44.8m-44.8,27.5h44.8M880,311.3v28.3" class="g1_2"/>
<path d="M682,375.8H836V348.3H682v27.5Z" class="g3_2"/>
<path d="M681.6,348.3H836.4M681.6,375.8H836.4M682,347.9v28.3" class="g1_2"/>
<path d="M836,375.8h44V348.3H836v27.5Z" class="g3_2"/>
<path d="M835.6,348.3h44.8m-44.8,27.5h44.8M880,347.9v28.3m-198.4,18H836.4M681.6,421.7H836.4M682,393.8v28.3M835.6,394.2h44.8m-44.8,27.5h44.8M880,393.8v28.3" class="g1_2"/>
<path d="M682,458.3H836V430.8H682v27.5Z" class="g3_2"/>
<path d="M681.6,430.8H836.4M681.6,458.3H836.4M682,430.4v28.3" class="g1_2"/>
<path d="M836,458.3h44V430.8H836v27.5Z" class="g3_2"/>
<path d="M835.6,430.8h44.8m-44.8,27.5h44.8M880,430.4v28.3m-198.4,18H836.4M681.6,504.2H836.4M682,476.3v28.3M835.6,476.7h44.8m-44.8,27.5h44.8M880,476.3v28.3" class="g1_2"/>
<path d="M682,540.8H836V513.3H682v27.5Z" class="g3_2"/>
<path d="M681.6,513.3H836.4M681.6,540.8H836.4M682,512.9v28.3" class="g1_2"/>
<path d="M836,540.8h44V513.3H836v27.5Z" class="g3_2"/>
<path d="M835.6,513.3h44.8m-44.8,27.5h44.8M880,512.9v28.3M681.6,550H836.4M681.6,577.5H836.4M682,549.6v28.3M835.6,550h44.8m-44.8,27.5h44.8M880,549.6v28.3" class="g1_2"/>
<path d="M682,614.2H836V586.7H682v27.5Z" class="g3_2"/>
<path d="M681.6,586.7H836.4M681.6,614.2H836.4M682,586.3v28.3" class="g1_2"/>
<path d="M836,614.2h44V586.7H836v27.5Z" class="g3_2"/>
<path d="M835.6,586.7h44.8m-44.8,27.5h44.8M880,586.3v28.3" class="g1_2"/>
<path d="M682,650.8H836V623.3H682v27.5Z" class="g3_2"/>
<path d="M681.6,623.3H836.4M681.6,650.8H836.4M682,622.9v28.3" class="g1_2"/>
<path d="M836,650.8h44V623.3H836v27.5Z" class="g3_2"/>
<path d="M835.6,623.3h44.8m-44.8,27.5h44.8M880,622.9v28.3M681.6,660H836.4M681.6,687.5H836.4M682,659.6v28.3M835.6,660h44.8m-44.8,27.5h44.8M880,659.6v28.3m-451.4,8.8H539.4M428.6,724.2H539.4M429,696.3v28.3M538.6,696.7h44.8m-44.8,27.5h44.8M583,696.3v28.3" class="g1_2"/>
<path d="M649,722.6h15.3V707.4H649v15.2Z" class="g4_2"/>
<path d="M649,722.6h15.3V707.4H649v15.2Z" class="g1_2"/>
<path d="M770,722.6h15.3V707.4H770v15.2Z" class="g4_2"/>
<path d="M770,722.6h15.3V707.4H770v15.2Z" class="g1_2"/>
<path d="M55,751.7h55V733.3H55v18.4Z" class="g2_2"/>
<path d="M54.6,733.3H880.4M54.6,751.7H880.4" class="g1_2"/>
<path d="M168.7,777.6h15.2V762.4H168.7v15.2Z" class="g4_2"/>
<path d="M168.7,777.6h15.2V762.4H168.7v15.2Z" class="g1_2"/>
<path d="M168.7,805.1h15.2V789.9H168.7v15.2Z" class="g4_2"/>
<path d="M168.7,805.1h15.2V789.9H168.7v15.2Zm28.9,47.4h88.8M197.6,880h88.8M198,852.1v28.3m87.6,-27.9h44.8M285.6,880h44.8M330,852.1v28.3M197.6,898.3h88.8m-88.8,27.5h88.8M198,897.9v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M330,897.9v28.3m-132.4,18h88.8m-88.8,27.5h88.8M198,943.8v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M330,943.8v28.3M384.6,852.5h88.8M384.6,880h88.8M385,852.1v28.3m87.6,-27.9h44.8M472.6,880h44.8M517,852.1v28.3M384.6,898.3h88.8m-88.8,27.5h88.8M385,897.9v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M517,897.9v28.3m-132.4,18h88.8m-88.8,27.5h88.8M385,943.8v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M517,943.8v28.3M571.6,852.5h88.8M571.6,880h88.8M572,852.1v28.3m87.6,-27.9h44.8M659.6,880h44.8M704,852.1v28.3M571.6,898.3h88.8m-88.8,27.5h88.8M572,897.9v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M704,897.9v28.3m-132.4,18h88.8m-88.8,27.5h88.8M572,943.8v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M704,943.8v28.3M747.6,852.5h88.8M747.6,880h88.8M748,852.1v28.3m87.6,-27.9h44.8M835.6,880h44.8M880,852.1v28.3M747.6,898.3h88.8m-88.8,27.5h88.8M748,897.9v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M880,897.9v28.3m-132.4,18h88.8m-88.8,27.5h88.8M748,943.8v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M880,943.8v28.3m-198.4,8.7H836.4m-154.8,27.5H836.4M682,980.4v28.3M835.6,980.8h44.8m-44.8,27.5h44.8M880,980.4v28.3" class="g1_2"/>
<path d="M54.6,1035.8H781.4m-.8,0h99.8" class="g0_2"/>
</svg>

<script>

var idrform=new IDRFORM,idrscript={};function IDRFORM(){class Event{#e;#t;changeEx;commitKey;fieldFull;keyDown;modifier;name;rc=!0;richChange;richChangeEx;richValue;selEnd;selStart;targetName;type;willCommit;constructor(e,t){this.#e=e,this.#t=t,this.changeEx=null,this.commitKey=null,this.fieldFull=null,this.keyDown=null,this.modifier=null,this.name="",this.richChange=null,this.richChangeEx=null,this.richValue=null,this.selEnd=null,this.selStart=null,this.targetName="",this.type="Field",this.willCommit=null}get shift(){return this.#e.shiftKey}get source(){return new Field(this.#e.target)}get target(){return new Field(this.#e.target)}get value(){return this.#t?this.#t.value:this.#e.target.value}set value(e){if(this.#t)return this.#t.value=e,void 0;this.#e.target.value=e}get change(){return this.#e.target.value}set change(e){this.#e.target.value=e}}const doc=new Doc,app=new App;let event;const AVAIL_CALCULATES={},AVAIL_VALIDATES={};this.app=app,this.doc=doc,window.getField=function(e){return doc.getField(e)};const AVAIL_SCRIPTS={A:"click",K:"input",C:"",V:"",F:"",Fo:"focus",Bl:"blur",D:"mousedown",U:"mouseup",E:"mouseenter",X:"mouseleave"};this._radioUnisonSiblings={},this._checkboxGroups={},this.init=function(){const e=document.getElementById("FDFXFA_FormType");e&&(app.isAcroForm="FDF"===e.textContent||"AcroForm"===e.textContent);const t=document.getElementById("FDFXFA_Processing");if(t&&(t.style.display="none"),idrscript.documentscript)try{window.eval(atob(idrscript.documentscript))}catch(e){console.log(e)}idrscript.pagescript&&idrform.exec(idrscript.pagescript);const o=document.querySelectorAll("input, select, textarea");for(const e of o){const t=e.getAttribute("type"),o=e.getAttribute("id"),n=["button","radio","checkbox"].includes(e.type);for(const[t,i]of Object.entries(AVAIL_SCRIPTS)){const a=o+"_"+t;a in idrscript&&(n?i.length>0&&e.addEventListener(i,(e=>{idrform.exec(idrscript[a],e)})):"F"===t?e.addEventListener("onblur",(e=>{idrform.exec(idrscript[a],e)})):"C"===t?AVAIL_CALCULATES[o]=atob(idrscript[a]):"V"===t&&(AVAIL_VALIDATES[o]=atob(idrscript[a])))}if("button"!==t&&e.addEventListener("change",(e=>{idrform.doc.calculateNow()})),"radio"===t){if(e.dataset.hide&&e.addEventListener("click",this._hideEvent),e.dataset.show&&e.addEventListener("click",this._showEvent),e.dataset.flagRadiosinunison){let t=this._radioUnisonSiblings[e.dataset.fieldName];t||(t={},this._radioUnisonSiblings[e.dataset.fieldName]=t);let o=t[e.value];o||(o=[],t[e.value]=o),o.push(e),e.addEventListener("change",(e=>{this._doRadioUnison(e.currentTarget)}))}}else if("checkbox"===t){let t=this._checkboxGroups[e.dataset.fieldName];t||(t={},this._checkboxGroups[e.dataset.fieldName]=t);let o=t[e.value];o||(o=[],t[e.value]=o),o.push(e),e.addEventListener("change",(e=>{this._doCheckboxGroup(e.currentTarget)}))}}doc.calculateNow()},this.exec=function(e,t){this.doc.exec(atob(e),t),this.doc.calculateNow()},this.execMenuItem=function(e){this.app.execMenuItem(e)},this.submitForm=function(e){this.doc.submitForm(e)},this._hideEvent=function(e){if(e.target&&e.target.dataset&&e.target.dataset.hide)for(var t=e.target.dataset.hide.split(" "),o=0;o<t.length;o++)idrform.doc.getField(t[o]).display=display.hidden},this._showEvent=function(e){if(e.target&&e.target.dataset&&e.target.dataset.show)for(var t=e.target.dataset.show.split(" "),o=0;o<t.length;o++)idrform.doc.getField(t[o]).display=display.visible},this._doRadioUnison=function(e){this._updateRadioUnisonSiblings(e);for(const[t,o]of Object.entries(this._radioUnisonSiblings[e.dataset.fieldName]))t!==e.value&&this._updateRadioUnisonSiblings(o[0])},this._updateRadioUnisonSiblings=function(e){const t=undefined;this._radioUnisonSiblings[e.dataset.fieldName][e.value].forEach((t=>{t.checked=e.checked,"refreshApImage"in window&&refreshApImage(parseInt(t.dataset.imageIndex))}))},this._doCheckboxGroup=function(e){const t=this._checkboxGroups[e.dataset.fieldName],o=e.checked;for(const[n,i]of Object.entries(t))for(const t of i)t.checked=n===e.value&&o,"refreshApImage"in window&&refreshApImage(parseInt(t.dataset.imageIndex))},this.getCheckboxGroup=function(e){return this._checkboxGroups[e]},this.getCompletedFormPDF=function(){return new Blob([Uint8Array.from(EcmaParser._insertFieldsToPDF("")).buffer],{type:"application/pdf"})};const AnnotationType={Caret:"Caret",Circle:"Circle",FileAttachment:"FileAttachment",FreeText:"FreeText",Highlight:"Highlight",Ink:"Ink",Link:"Link",Line:"Line",Polygon:"Polygon",PolyLine:"PolyLine",Sound:"Sound",Square:"Square",Squiggly:"Squiggly",Stamp:"Stamp",StrikeOut:"StrikeOut",Text:"Text",Underline:"Underline"},border={s:"solid",d:"dashed",b:"beveled",i:"inset",u:"underline"},cursor={visible:0,hidden:1,delay:2},display={visible:0,hidden:1,noPrint:2,noView:3},font={Times:"Times-Roman",TimesB:"Times-Bold",TimesI:"Times-Italic",TimesBI:"Times-BoldItalic",Helv:"Helvetica",HelvB:"Helvetica-Bold",HelvI:"Helvetica-Oblique",HelvBI:"Helvetica-BoldOblique",Cour:"Courier",CourB:"Courier-Bold",CourI:"Courier-Oblique",CourBI:"Courier-BoldOblique",Symbol:"Symbol",ZapfD:"ZapfDingbats",KaGo:"HeiseiKakuGo-W5-UniJIS-UCS2-H",KaMi:"HeiseiMin-W3-UniJIS-UCS2-H"},highlight={n:"none",i:"invert",p:"push",o:"outline"},position={textOnly:0,iconOnly:1,iconTextV:2,textIconV:3,iconTextH:4,textIconH:5,overlay:6},style={ch:"check",cr:"cross",di:"diamond",ci:"circle",st:"star",sq:"square"},trans={blindsH:"BlindsHorizontal",blindsV:"BlindsVertical",boxI:"BoxIn",boxO:"BoxOut",dissolve:"Dissolve",glitterD:"GlitterDown",glitterR:"GlitterRight",glitterRD:"GlitterRightDown",random:"Random",replace:"Replace",splitHI:"SplitHorizontalIn",splitHO:"SplitHorizontalOut",splitVI:"SplitVerticalIn",splitVO:"SplitVerticalOut",wipeD:"WipeDown",wipeL:"WipeLeft",wipeR:"WipeRight",wipeU:"WipeUp"},zoomType={none:"NoVary",fitP:"FitPage",fitW:"FitWidth",fitH:"fitHeight",fitV:"fitVisibleWidth",pref:"Preferred",refW:"ReflowWidth"},DS_GREATER_THAN="Invalid value: must be greater than or equal to %s.",IDS_GT_AND_LT="Invalid value: must be greater than or equal to %s and less than or equal to %s.",IDS_LESS_THAN="Invalid value: must be less than or equal to %s.",IDS_INVALID_MONTH="** Invalid **",IDS_INVALID_DATE2="should match format",IDS_INVALID_VALUE="The value entered does not match the format of the field";function AFExecuteThisScript(e,t,o){return console.log("method not defined contact - IDR SOLUTIONS"),event.rc}function AFImportAppearance(e,t,o,n){return console.log("method not defined contact - IDR SOLUTIONS"),!0}function AFLayoutBorder(e,t,o,n,i){console.log("method not defined contact - IDR SOLUTIONS")}function AFLayoutCreateStream(e){return console.log("method not defined contact - IDR SOLUTIONS"),null}function AFLayoutDelete(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFLayoutNew(e,t,o){return console.log("method not defined contact - IDR SOLUTIONS"),null}function AFLayoutText(e,t,o,n,i,a){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDDocEnumPDFields(e,t,o,n,i){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDDocGetPDFieldFromName(e,t){return e.getField(t)}function AFPDDocLoadPDFields(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldFromCosObj(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldGetCosObj(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldGetDefaultTextAppearance(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldGetFlags(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldGetName(e){return e.name}function AFPDFieldGetValue(e){return e.value}function AFPDFieldIsAnnot(e){return console.log("AFPDFieldIsAnnot not defined contact - IDR SOLUTIONS"),!1}function AFPDFieldIsTerminal(e){return console.log("AFPDFieldIsTerminal not defined contact - IDR SOLUTIONS"),!0}function AFPDFieldIsValid(e){return console.log("AFPDFieldIsValid not defined contact - IDR SOLUTIONS"),!0}function AFPDFieldReset(e){console.log("AFPDFieldReset not defined contact - IDR SOLUTIONS")}function AFPDFieldSetDefaultTextAppearance(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldSetFlags(e,t,o){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldSetOptions(e,t){return console.log("method not defined contact - IDR SOLUTIONS"),"Good"}function AFPDFieldSetValue(e,t){e.value=t}function AFPDFormFromPage(e,t){return console.log("method not defined contact - IDR SOLUTIONS"),null}function AFPDWidgetGetAreaColors(e,t,o){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDWidgetGetBorder(e,t){return console.log("method not defined contact - IDR SOLUTIONS"),!0}function AFPDWidgetGetRotation(e){return console.log("method not defined contact - IDR SOLUTIONS"),null}function AFPDWidgetSetAreaColors(e,t,o){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDWidgetSetBorder(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFSimple_Calculate(e,t){let o=0;switch(e){case"AVG":let e=0;for(const n of t){const t=doc.getField(n);null!=t&&null!=t.value&&(e++,o+=Number(t.value))}o/=e;break;case"MIN":o=doc.getField(t[0]).value;for(const e of t){const t=doc.getField(e);null!=t&&null!=t.value&&(o=Math.min(o,t.value))}break;case"MAX":o=doc.getField(t[0]).value;for(const e of t){const t=doc.getField(e);null!=t&&null!=t.value&&(o=Math.max(o,t.value))}break;case"PRD":o=1;for(const e of t){const t=doc.getField(e);null!=t&&null!=t.value&&(o*=t.value)}break;case"SUM":for(const e of t){const t=doc.getField(e);null!=t&&null!=t.value&&(o+=Number(t.value))}break}return o}function AFDate_KeystrokeEx(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFDate_Format(e){var t=e,o=event.value,n,i;if(null!=o&&(""+o).length>0&&null==util.scand(t,o)){var a="Invalid date/time: please ensure that the date/time exists. Field ["+event.target.name+"] should match the format "+t;alert(a),event.value=null}}function AFDate_FormatEx(e){AFDate_Format(e)}function AFTime_Keystroke(e){AFTime_Format(e)}function AFTime_Format(e){var t=cFormat,o=event.value,n;if(null==util.scand(t,o)){var i="Invalid date/time: please ensure that the date/time exists. Field ["+event.target.name+"] should match the format "+t;alert(i),event.value=null}}function AFPercent_Keystroke(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFPercent_Format(e,t){if("number"==typeof e&&"number"==typeof t){if(e<0&&(alert("Invalid nDec value in AFPercent_Format"),event.value=null),e>512)return event.value="%",void 0;e=Math.floor(e),t=Math.min(Math.max(0,Math.floor(t)),4);var o=AFMakeNumber(event.value);if(null===o)return event.value="%",void 0;event.value=100*o+"%"}}function AFSpecial_Keystroke(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFSpecial_Format(e){var t;switch(e=AFMakeNumber(e)){case 0:t="99999";break;case 1:t="99999-9999";break;case 2:var o=""+event.value;t=o.length>8||o.startsWith("(")?"(999) 999-9999":"999-9999";break;case 3:t="999-99-9999";break;default:return alert("Invalid psf in AFSpecial_Keystroke"),void 0}event.value=util.printx(t,event.value)}function AFMakeNumber(e){if("number"==typeof e)return e;if("string"!=typeof e)return null;e=e.trim().replace(",",".");const t=parseFloat(e);return isNaN(t)||!isFinite(t)?null:t}function AFNumber_Format(e,t,o,n,i,a){var r=event.value;null!=(r=AFMakeNumber(r))&&(event.value=r)}function AFNumber_Keystroke(e,t,o,n,i,a){console.log("method not defined contact - IDR SOLUTIONS")}function AssembleFormAndImportFDF(e,t,o){return console.log("method not defined contact - IDR SOLUTIONS"),doc}function ExportAsFDF(e,t,o,n,i,a,r){console.log("method not defined contact - IDR SOLUTIONS")}function ExportAsFDFEx(e,t,o,n,i,a,r,s){console.log("method not defined contact - IDR SOLUTIONS")}function ExportAsFDFWithParams(e){console.log("method not defined contact - IDR SOLUTIONS")}function ExportAsHtml(e,t,o,n,i){console.log("method not defined contact - IDR SOLUTIONS")}function ExportAsHtmlEx(e,t,o,n,i,a){console.log("method not defined contact - IDR SOLUTIONS")}function ImportAnFDF(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function IsPDDocAcroForm(e){console.log("method not defined contact - IDR SOLUTIONS")}function ResetForm(e,t,o){console.log("method not defined contact - IDR SOLUTIONS")}function App(){this.isAcroForm=!0,this.activeDocs=[doc],this.calculate=!0,this.contstants=null,this.focusRect=!0,this.formsVersion=6,this.fromPDFConverters=new Array,this.fs=new FullScreen,this.fullScreen=!1,this.language="ENU",this.media=new Media,this.monitors={},this.numPlugins=0,this.openInPlace=!1,this.platform="WIN",this.plugins=new Array,this.printColorProfiles=new Array,this.printNames=new Array,this.runtimeHighlight=!1,this.runtimeHightlightColor=new Array,this.thermometer=new Thermometer,this.toolBar=!1,this.toolBarHorizontal=!1,this.toolBarVertical=!1,this.viewerType="Exchange-Pro",this.viewerVariation="Full",this.viewerVersion=6,this.addMenuItem=function(){console.log("addMenuItem method not defined contact - IDR SOLUTIONS")},this.addSubMenu=function(){console.log("addSubMenu method not defined contact - IDR SOLUTIONS")},this.addToolButton=function(){console.log("addToolButton method not defined contact - IDR SOLUTIONS")},this.alert=function(e,t,o,n,i,a){var r={cMsg:e,nIcon:0,nType:0,cTitle:"Adobe Acrobat",oDoc:null,oCheckBox:null};if(e instanceof Object)for(var s in e)r[s]=e[s];switch(void 0!==o&&(r.nType=o),r.nType){case 0:return window.alert(r.cMsg),void 0;case 1:case 2:case 3:return window.confirm(r.cMsg)}},this.beep=function(){var e;new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=").play()},this.beginPriv=function(){console.log("beginPriv method not defined contact - IDR SOLUTIONS")},this.browseForDoc=function(){console.log("browseForDoc method not defined contact - IDR SOLUTIONS")},this.clearInterval=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.clearTimeOut=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.endPriv=function(){console.log("endPriv method not defined contact - IDR SOLUTIONS")},this.execDialog=function(){console.log("execDialog method not defined contact - IDR SOLUTIONS")},this.execMenuItem=function(e){var t=document.getElementsByClassName("pageArea").length,o=e.toUpperCase();if("SAVEAS"===o)if(this.isAcroForm){var n=document.getElementById("FDFXFA_PDFName").textContent;EcmaParser.saveFormToPDF(n)}else createXFAPDF();else"PRINT"===o?this.activeDocs[0].print():"FIRSTPAGE"===o?this.activeDocs[0].pageNum=0:"PREVPAGE"===o?this.activeDocs[0].pageNum--:"NEXTPAGE"===o?this.activeDocs[0].pageNum++:"LASTPAGE"===o&&(this.activeDocs[0].pageNum=t-1)},this.getNthPluginName=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.getPath=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.goBack=function(){this.activeDocs[0].pageNum--},this.goForward=function(){this.activeDocs[0].pageNum++},this.hideMenuItem=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.hideToolbarButton=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.launchURL=function(e,t){app.activeDocs[0].getURL(e)},this.listMenuItems=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.listToolbarButtons=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.mailGetAddrs=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.mailMsg=function(e,t,o,n,i,a){var r="mailto:";r+=t.split(";").join(",");var s=!1;o&&(s=!0,r+="?cc=",r+=o.split(";").join(",")),n&&(s?r+="&":(s=!0,r+="?"),r+=n.split(";").join(",")),i&&(s?r+="&":(s=!0,r+="?"),r+=i.split(" ").join("%20")),a&&(s?r+="&":(s=!0,r+="?"),r+=a.split(" ").join("%20")),window.location.href=r},this.mailGetAddrs=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.newDoc=function(){return new Doc},this.newFDF=function(){return new FDF},this.openDoc=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.openFDF=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.popUpMenu=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.popUpMenuEx=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.removeToolButton=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.response=function(e,t,o,n){var i;return i=t?window.prompt(e,t):window.prompt(e)},this.setInterval=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.setTimeOut=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.trustedFunction=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.trustPropagatorFunction=function(){console.log("method not defined contact - IDR SOLUTIONS")}}function Doc(){this.pages=[],this.alternatePresentations={},this.author="",this.baseURL="",this.bookmarkRoot={},this.calculate=!1,this.creationDate=new Date,this.creator="",this.dataObjects=[],this.delay=!1,this.dirty=!1,this.disclosed=!1,this.docID=[],this.documentFileName="",this.dynamicXFAForm=!1,this.external=!0,this.fileSize=0,this.hidden=!1,this.hostContainer={},this.icons=[],this.info={},this.innerAppWindowRect=[],this.innerDocWindowRect=[],this.isModal=!1,this.keywords={},this.layout="",this.media={},this.metadata="",this.modDate=new Date,this.mouseX=0,this.mouseY=0,this.noautoComplete=!1,this.nocache=!1,this.numPages=0,this.numTemplates=0,this.path="",this.outerAppWindowRect=[],this.outerDocWindowRect=[],this.pageNum=0,this.pageWindowRect=[],this.permStatusReady=!1,this.producer="PDFWriter",this.requiresFullSave=!1,this.securityHandler="",this.selectedAnnots=[],this.sounds=[],this.spellDictionaryOrder=[],this.spellLanguageOrder=[],this.subject="",this.templates=[],this.title="",this.URL="",this.viewState={},this.xfa={},this.XFAForeground=!1,this.zoom=100,this.zoomType="novary",this.exec=function(scr,htmlEvent){try{console.log(htmlEvent),event=new Event(htmlEvent,null),eval(scr),event=void 0}catch(e){console.log(e)}}}function Events(){this.add=function(){console.log("add method not defined contact - IDR SOLUTIONS")},this.dispatch=function(){console.log("dispatch method not defined contact - IDR SOLUTIONS")},this.remove=function(){console.log("remove method not defined contact - IDR SOLUTIONS")}}function EventListener(){this.afterBlur=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterClose=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterDestroy=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterDone=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterError=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterEscape=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterEveryEvent=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterFocus=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterPause=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterPlay=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterReady=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterScript=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterSeek=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterStatus=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterStop=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onBlur=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onClose=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onDestroy=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onDone=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onError=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onEscape=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onEveryEvent=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onFocus=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onGetRect=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onPause=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onPlay=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onReady=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onScript=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onSeek=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onStatus=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onStrop=function(e){console.log("method not defined contact - IDR SOLUTIONS")}}function hexToRgbCss(e){var t=/^#?([a-f\d])([a-f\d])([a-f\d])$/i;e=e.replace(t,(function(e,t,o,n){return t+t+o+o+n+n}));var o=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e),n,i,a;return"rgb("+parseInt(o[1],16)+","+parseInt(o[2],16)+","+parseInt(o[3],16)+")"}function rgbToHexCss(e,t,o){return"#"+((1<<24)+(e<<16)+(t<<8)+o).toString(16).slice(1)}function rgbCssToArr(e){return e.replace(/[^\d,]/g,"").split(",")}console.println=function(e){console.log(e)},Object.defineProperty(Doc.prototype,"addAnnot",{value:function(e){return console.log("addAnnot method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addField",{value:function(e,t,o,n){var i=document.getElementsByClassName("pageArea"),a;switch(t){case"text":(a=document.createElement("input")).setAttribute("type","text");break;case"button":a=document.createElement("button");break;case"combobox":a=document.createElement("select");break;case"listbox":a=document.createElement("select");break;case"checkbox":(a=document.createElement("input")).setAttribute("type","checkbox");break;case"radiobutton":(a=document.createElement("input")).setAttribute("type","radio");break;default:a=document.createElement("div")}return a.setAttribute("data-field-name",e),a.style.position="absolute",a.style.left=n[0],a.style.top=n[1],i[o].appendChild(a),new Field(a)}}),Object.defineProperty(Doc.prototype,"addIcon",{value:function(e,t){return this.icons.push(t),null}}),Object.defineProperty(Doc.prototype,"addLink",{value:function(e,t){var o=document.getElementsByClassName("pageArea"),n=document.createElement("a");return n.style.position="absolute",n.style.left=t[0],n.style.top=t[1],o[e].appendChild(n),new Link(n)}}),Object.defineProperty(Doc.prototype,"addRecipientListCryptFilter",{value:function(e,t){return console.log("addRecipientListCryptFilter method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addRequirement",{value:function(e,t){return console.log("addRequirement method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addScript",{value:function(e,t){return console.log("addScript method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addThumbnails",{value:function(e,t){return console.log("addThumbnails method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addWatermarkFromFile",{value:function(e){return console.log("addWatermarkFromFile method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addWatermarkFromText",{value:function(e){return console.log("addWatermarkFromText method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addWeblinks",{value:function(e,t){return console.log("addWeblinks method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"bringToFront",{value:function(){return console.log("bringToFront method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"calculateNow",{value:function(){for(const[fieldId,script]of Object.entries(AVAIL_CALCULATES)){const target=document.getElementById(fieldId);if(target){event=new Event(null,target);const res=eval(script);null!=res&&(target.value=res)}}return event=void 0,1}}),Object.defineProperty(Doc.prototype,"closeDoc",{value:function(e){window.close()}}),Object.defineProperty(Doc.prototype,"colorConvertPage",{value:function(e,t,o){return console.log("colorConvertPage method not defined contact - IDR SOLUTIONS"),!0}}),Object.defineProperty(Doc.prototype,"createDataObject",{value:function(e,t,o,n){console.log("createDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"createTemplate",{value:function(e,t){console.log("createTemplate method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"deletePages",{value:function(e,t){console.log("deletePages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"embedDocAsDataObject",{value:function(e,t,o,n){console.log("embedDocAsDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"embedOutputIntent",{value:function(e){console.log("embedOutputIntent method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"encryptForRecipients",{value:function(e,t,o){return console.log("encryptForRecipients method not defined contact - IDR SOLUTIONS"),!1}}),Object.defineProperty(Doc.prototype,"encryptUsingPolicy",{value:function(e,t,o,n){return console.log("encryptUsingPolicy method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"exportAsFDF",{value:function(){console.log("exportAsFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportAsText",{value:function(){console.log("exportAsFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportAsXFDF",{value:function(){console.log("exportAsXFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportAsXFDFStr",{value:function(){console.log("exportAsXFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportDataObject",{value:function(){console.log("exportDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportXFAData",{value:function(){console.log("exportXFAData method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"extractPages",{value:function(e,t,o){console.log("extractPages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"flattenPages",{value:function(e,t,o){console.log("flattenPages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"getAnnot",{value:function(e,t){return console.log("getAnnot method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"getAnnot3D",{value:function(e,t){return console.log("getAnnot3D method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"getAnnots",{value:function(e,t,o){return console.log("getAnnots method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getAnnots3D",{value:function(e,t,o){return console.log("getAnnots3D method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getColorConvertAction",{value:function(){return console.log("getColorConvertAction method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getDataObject",{value:function(e){return console.log("getDataObject method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getDataObjectContents",{value:function(e,t){return console.log("getDataObjectContents method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getField",{value:function(e){var t=document.querySelectorAll('[data-field-name="'+e+'"]'),o=t[0];if(t.length>1&&"radio"==o.getAttribute("type"))for(var n=0,i=t.length;n<i;n++)if(t[n].checked)return new Field(t[n]);return new Field(o)}}),Object.defineProperty(Doc.prototype,"getIcon",{value:function(e){for(var t=0,o=this.icons.length;t<o;t++)if(this.icons[t].name===e)return this.icons[t];return new Icon}}),Object.defineProperty(Doc.prototype,"getLegalWarnings",{value:function(e){return console.log("getLegalWarnings method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getLinks",{value:function(e,t){return console.log("getLinks method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getNthFieldName",{value:function(e){var t,o=document.querySelectorAll("[data-field-name]")[e];return o?o.getAttribute("data-field-name"):""}}),Object.defineProperty(Doc.prototype,"getNthTemplate",{value:function(e){return console.log("getNthTemplate method not defined contact - IDR SOLUTIONS"),""}}),Object.defineProperty(Doc.prototype,"getOCGs",{value:function(e){return console.log("getOCGs method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getOCGOrder",{value:function(){return console.log("getOCGOrder method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getPageBox",{value:function(e,t){return console.log("getPageBox method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getPageLabel",{value:function(e){return console.log("getPageLabel method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getPageNthWord",{value:function(e,t,o){return console.log("getPageNthWord method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getPageNthWordQuads",{value:function(e,t){return console.log("getPageNthWordQuards method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getPageNumWords",{value:function(e){return console.log("getPageNumWords method not defined contact - IDR SOLUTIONS"),0}}),Object.defineProperty(Doc.prototype,"getPageRotation",{value:function(e){return console.log("getPageRotation method not defined contact - IDR SOLUTIONS"),0}}),Object.defineProperty(Doc.prototype,"getPageTransition",{value:function(e){return console.log("getPageTransition method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getPrintParams",{value:function(){return console.log("getPrintParams method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getSound",{value:function(e){return console.log("getSound method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getTemplate",{value:function(e){return console.log("getTemplate method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getURL",{value:function(e,t){console.log("getURL method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"gotoNamedDest",{value:function(e){console.log("gotoNamedDest method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importAnFDF",{value:function(e){console.log("importAnFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importDataObject",{value:function(e,t){console.log("importDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importIcon",{value:function(e,t){console.log("importIcon method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importSound",{value:function(e){console.log("importSound method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importTextData",{value:function(e,t){return console.log("importTextData method not defined contact - IDR SOLUTIONS"),0}}),Object.defineProperty(Doc.prototype,"importXFAData",{value:function(e){console.log("importXFAData method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"insertPages",{value:function(e,t,o,n){console.log("insertPages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"mailDoc",{value:function(){console.log("mailDoc method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"mailForm",{value:function(){console.log("mailForm method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"movePage",{value:function(e,t){console.log("movePage method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"newPage",{value:function(e,t,o){console.log("newPage method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"numFields",{get:function(){var e;return document.querySelectorAll("[data-field-name]").length}}),Object.defineProperty(Doc.prototype,"openDataObject",{value:function(e){return console.log("openDataObject method not defined contact - IDR SOLUTIONS"),this}}),Object.defineProperty(Doc.prototype,"print",{value:function(){window.print()}}),Object.defineProperty(Doc.prototype,"removeDataObject",{value:function(e){console.log("removeDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeField",{value:function(e){var t;document.querySelector('[data-field-name="'+e+'"]').remove()}}),Object.defineProperty(Doc.prototype,"removeIcon",{value:function(e){console.log("removeIcon method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeLinks",{value:function(e,t){console.log("removeLinks method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeRequirement",{value:function(e){console.log("removeRequirement method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeScript",{value:function(e){console.log("removeScript method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeTemplate",{value:function(e){console.log("removeTemplate method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeThumbnails",{value:function(e,t){console.log("removeThumbnails method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeWeblinks",{value:function(e,t){console.log("removeWeblinks method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"replacePages",{value:function(e,t,o,n){console.log("replacePages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"resetForm",{value:function(e){if(e);else{for(var t=document.getElementsByTagName("form")[0],o=t.elements,n=0;n<o.length;n++){var i;if(o[n].dataset&&o[n].dataset.fieldName&&o[n].dataset.defaultDisplay)idrform.doc.getField(o[n].dataset.fieldName).display=Number(o[n].dataset.defaultDisplay)}t.reset()}}}),Object.defineProperty(Doc.prototype,"saveAs",{value:function(e,t,o,n,i){var a;if(this._checkRequired())return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"),void 0;console.log("saveAs method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"scroll",{value:function(e,t){console.log("scroll method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"selectPageNthWord",{value:function(e,t,o){console.log("selectPageNthWord method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setAction",{value:function(e,t){console.log("setAction method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setDataObjectContents",{value:function(e,t,o){console.log("setDataObjectContents method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setOCGOrder",{value:function(e){console.log("setOCGOrder method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageAction",{value:function(e,t){console.log("setPageAction method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageBoxes",{value:function(e,t,o,n){console.log("setPageBoxes method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageLabels",{value:function(e,t){console.log("setPageLabels method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageTabOrder",{value:function(e,t){console.log("setPageTabOrder method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageTransitions",{value:function(e,t,o){console.log("setPageTransitions method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"spawnPageFromTemplate",{value:function(e,t,o,n,i){console.log("spawnPageFromTemplate method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"_getFieldsHTML",{value:function(e){for(var t=new Array,o=0,n=e.length;o<n;o++)for(var i=document.getElementsByTagName(e[o]),a=0,r=i.length;a<r;a++)t.push(i[a]);return t}}),Object.defineProperty(Doc.prototype,"_checkRequired",{value:function(){for(var e=!1,t=this._getFieldsHTML(["input","textarea","select"]),o=0,n=t.length;o<n;o++){var i=t[o];i.hasAttribute("required")&&(null!==i.value&&""!==i.value||(i.style.border="1px solid red",e=!0))}return e}}),Object.defineProperty(Doc.prototype,"_submitFormAsXML",{value:function(e){var t;if(this._checkRequired())return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"),void 0;for(var o="  <fields>",n=this._getFieldsHTML(["input","textarea","select"]),i,a,r=0,s=n.length;r<s;r++)if(i=(a=n[r]).getAttribute("data-field-name"))switch(a.type){case"radio":case"checkbox":a.checked&&null!=a.value&&(o+="<"+i+">"+a.value+"</"+i+">");break;default:null!=a.value&&(o+="<"+i+">"+a.value+"</"+i+">");break}o+="</fields>";var c=document.createElement("form");c.setAttribute("method","post"),document.body.appendChild(c),c.setAttribute("action",url);var l=document.createElement("textarea");l.setAttribute("name","xmldata"),l.value=btoa(o),c.appendChild(l),c.submit()}}),Object.defineProperty(Doc.prototype,"_submitFormAsJSON",{value:function(e){var t;if(this._checkRequired())return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"),void 0;for(var o='{"fields":[\n',n=this._getFieldsHTML(["input","textarea","select"]),i,a,r=0,s=n.length;r<s;r++)if(i=(a=n[r]).getAttribute("data-field-name"))switch(a.type){case"radio":case"checkbox":a.checked&&null!=a.value&&(o+='"'+i+'":"'+a.value+'",\n');break;default:null!=a.value&&(o+='"'+i+'":"'+a.value+'",\n');break}o+="]}";var c=document.createElement("form");c.setAttribute("method","post"),document.body.appendChild(c),c.setAttribute("action",url);var l=document.createElement("textarea");l.setAttribute("name","jsondata"),l.value=btoa(o),c.appendChild(l),c.submit()}}),Object.defineProperty(Doc.prototype,"_submitFormAsPDF",{value:function(e){var t;if(this._checkRequired())return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"),void 0;var o=document.getElementById("FDFXFA_Processing");o&&(o.style.display="block");var n=EcmaParser._insertFieldsToPDF(""),i=EcmaFilter.encodeBase64(n),a=document.createElement("form");a.setAttribute("method","post"),e||(e=window.prompt("Please Enter URL to Submit Form; \n[ Please use 'pdfdata' as named parameter for accessing filled pdf as base64 ] \n[ Please refer to FormVu documentation for defining submit URL ]")),a.setAttribute("action",e),document.body.appendChild(a);var r=document.createElement("textarea");r.setAttribute("name","pdfdata"),r.value=i,a.appendChild(r),a.submit(),o&&(o.style.display="none")}}),Object.defineProperty(Doc.prototype,"submitForm",{value:function(e,t,o,n,i,a,r){if(app.isAcroForm)this._submitFormAsPDF(e);else{var s=new PdfDocument,c=new PdfPage;s.addPage(c);var l=new PdfText(70,70,"Helvetica",20,"Please wait...");c.addText(l),l=new PdfText(70,110,"Helvetica",11,"If this message is not eventually replaced by proper contents of the document, your PDF"),c.addText(l),l=new PdfText(70,124,"Helvetica",11,"viewer may not be able to display this type of document."),c.addText(l),l=new PdfText(70,150,"Helvetica",11,"You can upgrade to the latest version of Adobe Reader for Windows, Mac, or Linux by"),c.addText(l),l=new PdfText(70,164,"Helvetica",11,"visiting http://www.adobe.com/go/reader_download."),c.addText(l),l=new PdfText(70,190,"Helvetica",11,"For more assistance with Adobe Reader visit http://www.adobe.com/go/acrreader."),c.addText(l),l=new PdfText(70,220,"Helvetica",7.5,"Windows is either a registered trademark or a trademark of Microsoft Corporation in the United States and/or other countries. Mac is a trademark "),c.addText(l),l=new PdfText(70,229,"Helvetica",7.5,"of Apple Inc., registered in the United States and other countries. Linux is the registered trademark of Linus Torvalds in the U.S. and other "),c.addText(l),l=new PdfText(70,238,"Helvetica",7.5,"countries."),c.addText(l);var d=generateXDP(),u=s.createPdfString(d),h=EcmaPDF.encode64(u),f=document.createElement("form");f.setAttribute("method","post"),e||(e=window.prompt("Please Enter URL to Submit Form; \n[ Please use 'pdfdata' as named parameter for accessing filled pdf as base64 ] \n[ Please refer to FormVu documentation for defining submit URL ]")),f.setAttribute("action",e),document.body.appendChild(f);var m=document.createElement("textarea");m.setAttribute("name","pdfdata"),m.value=h,f.appendChild(m),f.submit()}}}),Object.defineProperty(Doc.prototype,"syncAnnotScan",{value:function(){console.log("syncAnnotScan method not defined contact - IDR SOLUTIONS")}});var color={transparent:["T"],black:["G",0],white:["G",1],red:["RGB",1,0,0],green:["RGB",0,1,0],blue:["RGB",0,0,1],cyan:["CMYK",1,0,0,0],magenta:["CMYK",0,1,0,0],yellow:["CMYK",0,0,1,0],dkGray:["G",.25],gray:["G",.5],ltGray:["G",.75],convert:function(e,t){var o=e;switch(t){case"G":"RGB"===e[0]?o=new Array("G",.3*e[1]+.59*e[2]+.11*e[3]):"CMYK"===e[0]&&(o=new Array("G",1-Math.min(1,.3*e[1]+.59*e[2]+.11*e[3]+e[4])));break;case"RGB":"G"===e[0]?o=new Array("RGB",e[1],e[1],e[1]):"CMYK"===e[0]&&(o=new Array("RGB",1-Math.min(1,e[1]+e[4]),1-Math.min(1,e[2]+e[4]),1-Math.min(1,e[3]+e[4])));break;case"CMYK":"G"===e[0]?o=new Array("CMYK",0,0,0,1-e[1]):"RGB"===e[0]&&(o=new Array("CMYK",1-e[1],1-e[2],1-e[3],0));break}return o},equal:function(e,t){if("G"===e[0]?e=this.convert(e,t[0]):t=this.convert(t,e[0]),e[0]!==t[0])return!1;for(var o=e[0].length,n=1;n<=o;n++)if(e[n]!==t[n])return!1;return!0},htmlColorToPDF:function(e){e.hasOwnProperty("indexof")&&-1!==e.indexof("#")&&(e=hexToRgbCss(e));var t=rgbCssToArr(e);return["RGB",t[0]/255,t[1]/255,t[2]/255]},pdfColorToHTML:function(e){var t=color.convert(e,"RGB");return rgbToHexCss(parseInt(255*t[1]),parseInt(255*t[2]),parseInt(255*t[3]))}};function Field(e){this.input=e,this.buttonAlignX=0,this.buttonAlignY=0,this.buttonFitBounds=!1,this.buttonPosition=0,this.buttonScaleHoq=0,this.buttonScaleWhen=0,this.calcOrderIndex=0,this.comb=!1,this.commitOnSelChange=!0,this.currentValueIndices=[],this.defaultStyle={},this.defaultValue="",this.doNotScroll=!1,this.doNotSpellCheck=!1,this.delay=!1,this.doc=doc,this.exportValues=[],this.fileSelect=!1,this.highlight="none",this.multiline=!1,this.multipleSelection=!1,this.page=0,this.password=!1,this.print=!0,this.radiosInUnison=!1,this.rect=[],this.richText=!1,this.richValue=[],this.rotation=0,this.style="",this.submitName="",this.textFont=null,this.userName=""}function FDF(){this.deleteOption=0,this.isSigned=!1,this.numEmbeddedFiles=0}function FullScreen(){}Object.defineProperty(Field.prototype,"alignment",{get:function(){return this.input.style.textAlign?this.input.style.textAlign:"left"},set:function(e){this.input.style.textAlign=e}}),Object.defineProperty(Field.prototype,"borderStyle",{get:function(){switch(this.input.style.borderStyle){case"solid":return border.s;case"dashed":return border.d;case"beveled":return border.b;case"inset":return border.i;case"underline":return border.u}return"none"},set:function(e){this.input.style.borderStyle=e}}),Object.defineProperty(Field.prototype,"charLimit",{get:function(){return this.input.maxLength},set:function(e){this.input.maxLength=e}}),Object.defineProperty(Field.prototype,"display",{get:function(){return this.input&&("none"===this.input.style.display||this.input.classList.contains("idr-hidden"))?display.hidden:display.visible},set:function(e){switch(this.input&&(this.input.dataset.defaultDisplay=this.input.dataset.defaultDisplay??this.display),e){case display.visible:this.input.classList.contains("idr-hidden")&&this.input.classList.remove("idr-hidden"),this.input.style.display="initial";break;case display.hidden:case display.noView:this.input.style.display="none";break}}}),Object.defineProperty(Field.prototype,"editable",{get:function(){return this.input.disabled},set:function(e){this.input.style.disabled=e}}),Object.defineProperty(Field.prototype,"fillColor",{get:function(){if(!this.input)return"";var e=window.getComputedStyle(this.input);return color.htmlColorToPDF(e.backgroundColor)},set:function(e){this.input.style.backgroundColor=color.pdfColorToHTML(e)}}),Object.defineProperty(Field.prototype,"hidden",{get:function(){return this.input.hidden},set:function(e){this.input.hidden=e}}),Object.defineProperty(Field.prototype,"lineWidth",{get:function(){return parseInt(this.style.borderWidth)},set:function(e){this.input.style.borderWidth=e+"px"}}),Object.defineProperty(Field.prototype,"name",{get:function(){return this.input.getAttribute("data-field-name")},set:function(e){this.input.setAttribute("data-field-name",e)}}),Object.defineProperty(Field.prototype,"numItems",{get:function(){return this.input.options.length}}),Object.defineProperty(Field.prototype,"readOnly",{get:function(){return this.input.readOnly},set:function(e){this.input.readOnly=e}}),Object.defineProperty(Field.prototype,"required",{get:function(){return this.input.required},set:function(e){this.input.required=e}}),Object.defineProperty(Field.prototype,"textSize",{get:function(){return parseInt(this.input.style.fontSize)},set:function(e){this.input.style.fontSize=parseInt(e)+"px"}}),Object.defineProperty(Field.prototype,"strokeColor",{get:function(){return color.htmlColorToPDF(this.input.style.borderColor)},set:function(e){this.input.style.borderColor=color.pdfColorToHTML(e)}}),Object.defineProperty(Field.prototype,"textColor",{get:function(){return color.htmlColorToPDF(this.input.style.color)},set:function(e){this.input.style.color=color.pdfColorToHTML(e)}}),Object.defineProperty(Field.prototype,"type",{get:function(){var e=this.input.tagName;return"INPUT"===e?this.getAttribute("type"):"SELECT"===e?"listbox":"BUTTON"===e?"button":"text"}}),Object.defineProperty(Field.prototype,"value",{get:function(){if(this.input){var e=this.input.value,t;switch(this.input.getAttribute("type")){case"checkbox":if(!this.input.checked)return!1;break;case"radio":if(null!=e)return EcmaFormField.hexDecodeName(e);break;case"text":if(""===e)return e;break}return isNaN(e)?e:1*e}},set:function(e){"radio"==this.input.getAttribute("type")?this.input.value=EcmaFormField.hexEncodeName(e):this.input.value=e}}),Object.defineProperty(Field.prototype,"valueAsString",{get:function(){return""+this.input.value},set:function(e){this.input.value=""+e}}),Object.defineProperty(Field.prototype,"browseForFileToSubmit",{value:function(){console.log("browseForFileToSubmit is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"buttonGetCaption",{value:function(){return this.input.innerHTML}}),Object.defineProperty(Field.prototype,"buttonGetIcon",{value:function(){console.log("buttonGetIcon is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"buttonImportIcon",{value:function(){console.log("buttonImportIcon is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"buttonSetCaption",{value:function(e){this.input.innerHTML=e}}),Object.defineProperty(Field.prototype,"buttonSetIcon",{value:function(){console.log("buttonSetIcon is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"checkThisBox",{value:function(e,t){this.input.checked=!0}}),Object.defineProperty(Field.prototype,"clearItems",{value:function(){var e,t;for(e=this.input.options.length-1;e>=0;e--)this.input.remove(e)}}),Object.defineProperty(Field.prototype,"defaultsChecked",{value:function(){return this.input.checked}}),Object.defineProperty(Field.prototype,"deleteItemAt",{value:function(e){if(-1===e){var t=this.input.options.length-1;this.input.remove(t)}else this.input.remove(e)}}),Object.defineProperty(Field.prototype,"getArray",{value:function(){console.log("getArray is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"getItemAt",{value:function(e,t){return this.input.options[e]}}),Object.defineProperty(Field.prototype,"getLock",{value:function(){console.log("getLock is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"insertItemAt",{value:function(e,t,o){var n=document.createElement("option");n.text=e,this.input.add(n,o)}}),Object.defineProperty(Field.prototype,"isBoxChecked",{value:function(e){return this.input.checked}}),Object.defineProperty(Field.prototype,"isDefaultChecked",{value:function(e){console.log("isDefaultChecked is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"setAction",{value:function(e,t){switch(e){case"MouseUp":this.input.addEventListener("mouseup",new Function(t));break;case"MouseDown":this.input.addEventListener("mousedown",new Function(t));break;case"MouseEnter":this.input.addEventListener("mouseenter",new Function(t));break;case"MouseExit":this.input.addEventListener("mouseexit",new Function(t));break;case"OnFocus":this.input.addEventListener("focus",new Function(t));break;case"OnBlur":this.input.addEventListener("blur",new Function(t));break;case"Keystroke":this.input.addEventListener("keydown",new Function(t));break;case"Validate":break;case"Calculate":break;case"Format":break}}}),Object.defineProperty(Field.prototype,"setFocus",{value:function(){this.input.focus()}}),Object.defineProperty(Field.prototype,"setItems",{value:function(e){for(var t=0;t<e.length;t++){var o=document.createElement("option");o.text=e[t],this.input.add(o)}}}),Object.defineProperty(Field.prototype,"setLock",{value:function(e){console.log("setLock is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureGetModifications",{value:function(){console.log("signatureGetModifications is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureGetSeedValue",{value:function(){console.log("signatureGetSeedValue is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureInfo",{value:function(){console.log("signatureInfo is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signauteSetSeedValue",{value:function(){console.log("signauteSetSeedValue is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureSign",{value:function(){console.log("signatureSign is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureValidate",{value:function(){console.log("signatureValidate is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"addContact",{value:function(e){console.log("addContact method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"addEmbeddedFile",{value:function(e,t){console.log("addEmbeddedFile method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"addRequest",{value:function(e,t,o){console.log("addRequest method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"close",{value:function(){console.log("close method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"mail",{value:function(){console.log("mail method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"save",{value:function(){console.log("save method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"signatureClear",{value:function(){return console.log("signatureClear method not defined contact - IDR SOLUTIONS"),!1}}),Object.defineProperty(FDF.prototype,"signatureSign",{value:function(){return console.log("signatureSign method not defined contact - IDR SOLUTIONS"),!1}}),Object.defineProperty(FDF.prototype,"signatureValidate",{value:function(e,t){return console.log("signatureSign method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(FullScreen.prototype,"isFullscreen",{get:function(){return this.isinFullscreen},set:function(e){var t,o;e?(document.body.requestFullscreen||document.body.msRequestFullscreen||document.body.mozRequestFullScreen||document.body.webkitRequestFullscreen).call(document.body):(document.exitFullscreen||document.msExitFullscreen||document.mozCancelFullScreen||document.webkitCancelFullScreen).call(document)},configurable:!0,enumerable:!0}),Object.defineProperty(FullScreen.prototype,"isFullscreenEnabled",{value:function(){return document.fullscreenEnabled||document.msFullscreenEnabled||document.mozFullScreenEnabled||document.webkitFullscreenEnabled}}),Object.defineProperty(FullScreen.prototype,"isinFullscreen",{value:function(){return!!(document.fullscreenElement||document.msFullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement)}}),Object.defineProperty(FullScreen.prototype,"toggleFullscreen",{value:function(){var e,t;this.isinFullscreen()?(document.exitFullscreen||document.msExitFullscreen||document.mozCancelFullScreen||document.webkitCancelFullScreen).call(document):(document.body.requestFullscreen||document.body.msRequestFullscreen||document.body.mozRequestFullScreen||document.body.webkitRequestFullscreen).call(document.body)}});var ADBC={SQLT_BIGINT:0,SQLT_BINARY:1,SQLT_BIT:2,SQLT_CHAR:3,SQLT_DATE:4,SQLT_DECIMAL:5,SQLT_DOUBLE:6,SQLT_FLOAT:7,SQLT_INTEGER:8,SQLT_LONGVARBINARY:9,SQLT_LONGVARCHAR:10,SQLT_NUMERIC:11,SQLT_REAL:12,SQLT_SMALLINT:13,SQLT_TIME:14,SQLT_TIMESTAMP:15,SQLT_TINYINT:16,SQLT_VARBINARY:17,SQLT_VARCHAR:18,SQLT_NCHAR:19,SQLT_NVARCHAR:20,SQLT_NTEXT:21,Numeric:0,String:1,Binary:2,Boolean:3,Time:4,Date:5,TimeStamp:6,getDataSourceList:function(){return console.log("ADBC.getDataSourceList() method not defined contact - IDR SOLUTIONS"),new Array},newConnnection:function(){var e={};if(arguments[0]instanceof Object)e=arguments[0];else switch(e.cDSN=arguments[0],arguments.length){case 2:e.cUID=arguments[1];break;case 3:e.cUID=arguments[1],e.cPWD=arguments[2];break}return console.log("ADBC.newConnection method not defined contact - IDR SOLUTIONS"),null}};function Alerter(){this.dispathc=function(){console.log("dispatch method not defined contact - IDR SOLUTIONS")}}function Alert(){this.type="",this.doc=null,this.fromUser=!1,this.error={message:""},this.errorText="",this.fileName="",this.selection=null}function AlternatePresentation(){this.active=!1,this.type="",this.start=function(){console.log("start method not defined contact - IDR SOLUTIONS")},this.stop=function(){console.log("stop method not defined contact - IDR SOLUTIONS")}}function Annotation(){this.type="Text",this.rect=[],this.page=0,this.alignment=0,this.AP="Approved",this.arrowBegin="None",this.arrowEnd="None",this.attachIcon="PushPin",this.author="",this.borderEffectIntensity="",this.callout=[],this.caretSymbol="",this.contents="",this.creationDate=new Date,this.dash=[],this.delay=!1,this.doc=null,this.doCaption=!1,this.fillColor=[],this.gestures=[],this.hidden=!1,this.inReplyTo="",this.intent="",this.leaderExtend=0,this.leaderLength=0,this.lineEnding="none",this.lock=!1,this.modDate=new Date,this.name="",this.noteIcon="Note",this.noView=!1,this.opacity=1,this.open=!1,this.point=[],this.points=[],this.popupOpen=!0,this.popupRect=[],this.print=!1,this.quads=[],this.readOnly=!1,this.refType="",this.richContents=[],this.richDefaults=null,this.rotate=0,this.seqNum=0,this.soundIcon="",this.state="",this.stateModel="",this.strokeColor=[],this.style="",this.subject="",this.textFont="",this.textSize=10,this.toggleNoView=!1,this.vertices=null,this.width=1,this.URI="",this.GoTo=""}function Bookmark(){this.children=null,this.color=["RGB",1,0,0],this.name="",this.open=!0,this.parent=null,this.style=0,this.createChild=function(e,t,o){console.log("createChild method not defined contact - IDR SOLUTIONS")},this.execute=function(){console.log("execute method not defined contact - IDR SOLUTIONS")},this.insertChild=function(e,t){console.log("insertChild method not defined contact - IDR SOLUTIONS")},this.remove=function(){console.log("remove method not defined contact - IDR SOLUTIONS")},this.setAction=function(e){console.log("setAction method not defined contact - IDR SOLUTIONS")}}function Catalog(){this.isIdle=!1,this.jobs=new Array,this.getIndex=function(e){console.log("getIndex method not defined contact - IDR SOLUTIONS")},this.remove=function(e){console.log("remove method not defined contact - IDR SOLUTIONS")}}function CatalogJob(){this.path="",this.type="",this.status=""}function Certificate(){this.binary="",this.issuerDN={},this.keyUsage=new Array,this.MD5Hash="",this.privateKeyValidityEnd={},this.privateKeyValidityStart={},this.SHA1Hash="",this.serialNumber="",this.subjectCN="",this.subjectDN="",this.ubRights={},this.usage={},this.validityEnd={},this.validityStart={}}function Rights(){this.mode="",this.rights=new Array}function Usage(){this.endUserSigning=!1,this.endUserEncryption=!1}Object.defineProperty(Annotation.prototype,"getDictionaryString",{value:function(){for(var e="<</Type /Annot /Subtype /"+this.type+" /Rect [ ",t=0,o=this.rect.length;t<o;t++)e+=this.rect[t]+" ";if(e+="]",this.type===AnnotationType.Highlight){e+="/QuadPoints [ ";for(var t=0,o=this.quads.length;t<o;t++)e+=this.quads[t]+" ";e+="]"}else if(this.type===AnnotationType.Text)this.contents.length>0&&(e+="/Contents ("+this.contents+")"),this.open&&(e+="/Open true");else if(this.type===AnnotationType.Link){if(this.URI.length>0?e+="/A <</Type /Action /S /URI /URI ("+this.URI+")>>":this.GoTo.length>0&&(e+="/Dest ["+this.GoTo+" /Fit]>>"),this.quads.length>0){e+="/QuadPoints [ ";for(var t=0,o=this.quads.length;t<o;t++)e+=this.quads[t]+" ";e+="]"}}else if(this.type===AnnotationType.Line)e+="/L ["+this.points[0]+" "+this.points[1]+" "+this.points[2]+" "+this.points[3]+"]";else if(this.type===AnnotationType.Polygon||this.type===AnnotationType.PolyLine){e+="/Vertices [";for(var t=0,o=this.vertices.length;t<o;t++)e+=this.vertices[t]+" ";e+="]"}else if(this.type===AnnotationType.Ink){e+="/InkList [";for(var n=this.gestures,t=0,o=n.length;t<o;t++){var i=n[t];e+=" [";for(var a=0,r=i.length;a<r;a++)e+=i[a]+" ";e+="] "}e+="]"}else if(this.type===AnnotationType.FreeText){for(var s="",t=0,o=this.richContents.length;t<o;t++){var c=this.richContents[t];s+="<span style='font-size:"+c.textSize+";color:"+c.textColor+"'>"+c.text+"</span>"}e+="/DA (/Arial "+this.textSize+" Tf)/RC (<body><p>"+s+"</p></body>)"}if(this.type===AnnotationType.Line||this.type===AnnotationType.Highlight||this.type===AnnotationType.FreeText||this.type===AnnotationType.Link||this.type===AnnotationType.Square||this.type===AnnotationType.Circle||this.type===AnnotationType.Polygon||this.type===AnnotationType.PolyLine||this.type===AnnotationType.Ink){if(this.opacity<1&&(e+="/CA "+this.opacity),1!==this.width&&(e+="/BS <</Type /Border /W "+this.width+">>"),this.fillColor.length>0){e+="/IC [";for(var t=0,o=this.fillColor.length;t<o;t++)e+=this.fillColor[t]+" ";e+="]"}if(this.strokeColor.length>0){e+="/C [";for(var t=0,o=this.strokeColor.length;t<o;t++)e+=this.strokeColor[t]+" ";e+="]"}}return e+=">>"}}),Object.defineProperty(Annotation.prototype,"destroy",{value:function(){return console.log("destroy method not defined contact - IDR SOLUTIONS"),!0}}),Object.defineProperty(Annotation.prototype,"getProps",{value:function(){return console.log("getProps method not defined contact - IDR SOLUTIONS"),!0}}),Object.defineProperty(Annotation.prototype,"getStateInModel",{value:function(){return console.log("getStateInModel method not defined contact - IDR SOLUTIONS"),!0}}),Object.defineProperty(Annotation.prototype,"setProps",{value:function(e){for(var t in e)t in this&&(this[t]=e[t]);return!0}}),Object.defineProperty(Annotation.prototype,"transitionToState",{value:function(e){console.log("transitionToState method not defined contact - IDR SOLUTIONS")}});var Collab={addStateModel:function(e,t,o,n,i,a){console.log("addStateModel not implemented")},documentToStream:function(e){console.log("documentToStream not implemented")},removeStateModel:function(e){console.log("removeStateModel not implemented")}};function States(){this.cUIName="",this.oIcon={}}function ColorConvertAction(){this.action={},this.alias="",this.colorantName="",this.convertIntent=0,this.convertProfile="",this.embed=!1,this.isProcessColor=!1,this.matchAttributesAll={},this.matchAttributesAny=0,this.matchIntent={},this.matchSpaceTypeAll={},this.matchSpaceTypeAny=0,this.preserveBlack=!1,this.useBlackPointCompensation=!1}function Column(){this.columnNum-0,this.name="",this.type=0,this.typeName="",this.value=""}function ColumnInfo(){this.name="",this.description="",this.type="",this.typeName=""}function Connection(){this.close=function(){console.log("close method not defined contact - IDR SOLUTIONS")},this.getColumnList=function(e){console.log("getColumnList method not defined contact - IDR SOLUTIONS")},this.getTableList=function(){console.log("getTableList method not defined contact - IDR SOLUTIONS")},this.newStatement=function(){console.log("newStatement method not defined contact - IDR SOLUTIONS")}}function Data(){this.creationDate={},this.description="",this.MIMEType="",this.modDate={},this.name="",this.path="",this.size=0}function DataSourceInfo(){this.name="",this.description=""}function dbg(){this.bps=new Array,this.c=new function(){console.log("c method not defined contact - IDR SOLUTIONS")},this.cb=function(e,t){console.log("cb method not defined contact - IDR SOLUTIONS")},this.q=function(){console.log("q method not defined contact - IDR SOLUTIONS")},this.sb=function(e,t,o){console.log("sb method not defined contact - IDR SOLUTIONS")},this.si=function(){console.log("si method not defined contact - IDR SOLUTIONS")},this.sn=function(){console.log("sn method not defined contact - IDR SOLUTIONS")},this.so=function(){console.log("so method not defined contact - IDR SOLUTIONS")},this.sv=function(){console.log("sv method not defined contact - IDR SOLUTIONS")}}function Dialog(){this.enable=function(e){console.log("enable method not defined contact - IDR SOLUTIONS")},this.end=function(e){console.log("end method not defined contact - IDR SOLUTIONS")},this.load=function(e){console.log("load method not defined contact - IDR SOLUTIONS")},this.store=function(e){console.log("store method not defined contact - IDR SOLUTIONS")}}function DirConnection(){this.canList=!1,this.canDoCustomSearch=!1,this.canDoCustomUISearch=!1,this.canDoStandardSearch=!1,this.groups=new Array,this.name="",this.uiName=""}function Directory(){this.info={},this.connect=function(e,t){return console.log("connect method not defined contact - IDR SOLUTIONS"),null}}function DirectoryInformation(){this.dirStdEntryID="",this.dirStdEntryName="",this.dirStdEntryPrefDirHandlerID="",this.dirStdEntryDirType="",this.dirStdEntryDirVersion="",this.server="",this.port=0,this.searchBase="",this.maxNumEntries=0,this.timeout=0}function Icon(){this.name=""}function IconStream(){this.width=0,this.height=0}function Identity(){this.corporation="",this.email="",this.loginName="",this.name=""}function Index(){this.available=!1,this.name="",this.path="",this.selected=!1,this.build=function(){console.log("build is method not defined contact - IDR SOLUTIONS")},this.parameters=function(){console.log("parameters is method not defined contact - IDR SOLUTIONS")}}function Link(e){this.ele=e,this.borderColor=[],this.borderWidth=0,this.highlightMode="invert",this.rect=[],this.setAction=function(){console.log("setAction is method not defined contact - IDR SOLUTIONS")}}function Marker(){this.frame=0,this.index=0,this.name="",this.time=0}function Markers(){this.player={},this.get=function(e){console.log("get is method not defined contact - IDR SOLUTIONS")}}function Media(){this.align={topLeft:0,topCenter:1,topRight:2,centerLeft:3,center:4,centerRight:5,bottomLeft:6,bottomCenter:7,bottomRight:8},this.canResize={no:0,keepRatio:1,yes:2},this.closeReason={general:0,error:1,done:2,stop:3,play:4,uiGeneral:5,uiScreen:6,uiEdit:7,docClose:8,docSave:9,docChange:10},this.defaultVisible=!0,this.ifOffScreen={allow:0,forseOnScreen:1,cancel:2},this.layout={meet:0,slice:1,fill:2,scroll:3,hidden:4,standard:5},this.monitorType={document:0,nonDocument:1,primary:3,bestColor:4,largest:5,tallest:6,widest:7},this.openCode={success:0,failGeneral:1,failSecurityWindow:2,failPlayerMixed:3,failPlayerSecurityPrompt:4,failPlayerNotFound:5,failPlayerMimeType:6,failPlayerSecurity:7,failPlayerData:8},this.over={pageWindow:0,appWindow:1,desktop:2,monitor:3},this.pageEventNames={Open:0,Close:1,InView:2,OutView:3},this.raiseCode={fileNotFound:0,fileOpenFailed:1},this.raiseSystem={fileError:0},this.renditionType={unknown:0,media:1,selector:2},this.status={clear:0,message:1,contacting:2,buffering:3,init:4,seeking:5},this.trace=!1,this.version=7,this.windowType={docked:0,floating:1,fullScreen:2},this.addStockEvents=function(e,t){console.log("addStockEvents method not defined contact - IDR SOLUTIONS")},this.alertFileNotFound=function(e,t,o){console.log("alertFileNotFound method not defined contact - IDR SOLUTIONS")},this.alertSelectFailed=function(e,t,o,n){console.log("alertFileNotFound method not defined contact - IDR SOLUTIONS")},this.argsDWIM=function(e){console.log("argsDWIM method not defined contact - IDR SOLUTIONS")},this.canPlayOrAlert=function(e){console.log("canPlayOrAlert method not defined contact - IDR SOLUTIONS")},this.computeFloatWinRect=function(e,t,o,n){console.log("computeFloatWinRect method not defined contact - IDR SOLUTIONS")},this.constrainRectToScreen=function(e,t){console.log("constrainRectToScreen method not defined contact - IDR SOLUTIONS")},this.createPlayer=function(e){console.log("createPlayer method not defined contact - IDR SOLUTIONS")},this.getAltTextData=function(e){console.log("getAltTextData method not defined contact - IDR SOLUTIONS")},this.getAltTextSettings=function(){console.log("getAltTextSettings method not defined contact - IDR SOLUTIONS")},this.getAnnotStockEvents=function(){console.log("getAnnotStockEvents method not defined contact - IDR SOLUTIONS")},this.getAnnotTraceEvents=function(){console.log("getAnnotTraceEvents method not defined contact - IDR SOLUTIONS")},this.getPlayers=function(){console.log("getPlayers method not defined contact - IDR SOLUTIONS")},this.getPlayerStockEvents=function(){console.log("getPlayerStockEvents method not defined contact - IDR SOLUTIONS")},this.getPlayerTraceEvents=function(){console.log("getPlayerTraceEvents method not defined contact - IDR SOLUTIONS")},this.getRenditionSettings=function(){console.log("getRenditionSettings method not defined contact - IDR SOLUTIONS")},this.getURLData=function(){console.log("getURLData method not defined contact - IDR SOLUTIONS")},this.getURLSettings=function(){console.log("getURLSettings method not defined contact - IDR SOLUTIONS")},this.getWindowBorderSize=function(){console.log("getWindowBorderSize method not defined contact - IDR SOLUTIONS")},this.openPlayer=function(){console.log("openPlayer method not defined contact - IDR SOLUTIONS")},this.removeStockEvents=function(){console.log("removeStockEvents method not defined contact - IDR SOLUTIONS")},this.startPlayer=function(){console.log("startPlayer method not defined contact - IDR SOLUTIONS")}}function MediaOffset(){this.frame=0,this.marker="",this.time=0}function MediaPlayer(){this.annot={},this.defaultSize={width:0,height:0},this.doc={},this.events={},this.hasFocus=!1,this.id=0,this.innerRect=[],this.isOpen=!1,this.isPlaying=!1,this.outerRect=[],this.page=0,this.settings={},this.uiSize=[],this.visible=!1,this.close=function(){console.log("close is not implemented")},this.open=function(){console.log("open is not implemented")},this.pause=function(){console.log("pause is not implemented")},this.play=function(){console.log("play is not implemented")},this.seek=function(){console.log("seek is not implemented")},this.setFocus=function(){console.log("setFocus is not implemented")},this.stop=function(){console.log("stop is not implemented")},this.triggerGetRect=function(){console.log("triggerGetRect is not implemented")}}function MediaReject(){this.rendition={}}function MediaSelection(){this.selectContext={},this.players=[],this.rejects=[],this.rendtion={}}function MediaSettings(){this.autoPlay=!1,this.baseURL="",this.bgColor=[],this.bgOpacity=1,this.data={},this.duration=0,this.endAt=0,this.floating={},this.layout=0,this.monitor={},this.monitorType=0,this.page=0,this.palindrome=!1,this.players={},this.rate=0,this.repeat=0,this.showUI=!1,this.startAt={},this.visible=!1,this.volume=0,this.windowType=0}function Monitor(){this.colorDepth=0,this.isPrimary=!1,this.rect=[],this.workRect=[]}function Monitors(){this.bestColor=function(){console.log("bestColor is not implemented")},this.bestFit=function(){console.log("bestFit is not implemented")},this.desktop=function(){console.log("desktop is not implemented")},this.document=function(){console.log("document is not implemented")},this.filter=function(){console.log("filter is not implemented")},this.largest=function(){console.log("largest is not implemented")},this.leastOverlap=function(){console.log("leastOverlap is not implemented")},this.mostOverlap=function(){console.log("mostOverlap is not implemented")},this.nonDocument=function(){console.log("nonDocument is not implemented")},this.primary=function(){console.log("primary is not implemented")},this.secondary=function(){console.log("secondary is not implemented")},this.select=function(){console.log("select is not implemented")},this.tallest=function(){console.log("tallest is not implemented")},this.widest=function(){console.log("widest is not implemented")}}function Net(){this.SOAP={},this.Discovery={},this.HTTP={},this.streamDecode=function(){console.log("streamDecode is not implemented")},this.streamDigest=function(){console.log("streamDigest is not implemented")},this.streamEncode=function(){console.log("streamEncode is not implemented")}}function OCG(){this.constants={},this.initState=!1,this.locked=!1,this.name="",this.state=!1,this.getIntent=function(){console.log("getIntent is not implemented")},this.setAction=function(){console.log("setAction is not implemented")},this.setIntent=function(){console.log("setIntent is not implemented")}}function PlayerInfo(){this.id="",this.mimeTypes=[],this.name="",this.version="",this.canPlay=function(){console.log("canPlay is not implemented")},this.canUseData=function(){console.log("canUseData is not implemented")},this.honors=function(){console.log("honors is not implemented")}}function PlayerInfoList(){this.select=function(){console.log("select is not implemented")}}function Plugin(){this.certified=!1,this.loaded=!1,this.name="",this.path="",this.version=0}function Booklet(){this.binding=0,this.duplexMode=0,this.subsetForm=0,this.subsetTo=0}function PrintParams(){this.binaryOK=!0,this.bitmapDPI=0,this.booklet=new Booklet,this.colorOverride=0,this.colorProfile="",this.constants={},this.downloadFarEastFonts=!1,this.fileName="",this.firstPage=0,this.flags=0,this.fontPolicy=0,this.gradientDPI=0,this.interactive=0,this.lastPage=0,this.nUpAutoRotate=!1,this.nUpNumPagesH=0,this.nUpNumPagesV=0,this.nUpPageBorder=!1,this.nUpPageOrder=0,this.pageHandling=0,this.pageSubset=0,this.printAsImage=!1,this.printContent=0,this.printName="",this.psLevel=0,this.rasterFlags=0,this.reversePages=!1,this.tileLabel=!1,this.tileMark=0,this.tileOverlap=0,this.tileScale=0,this.transparencyLevel=0,this.usePrinterCRD=0,this.useT1Conversion=0}function Span(){this.alignement=0,this.fontFamily=["serif","sans-serif","monospace"],this.fontStretch="normal",this.fontStyle="normal",this.fontWeight=400,this.strikeThrough=!1,this.subscript=!1,this.superscript=!1,this.text="",this.textColor=color.black,this.textSize=12,this.underline=!1}function Thermometer(){this.cancelled=!1,this.duration=0,this.text="",this.value=0,this.begin=function(){console.log("begin method not defined contact - IDR SOLUTIONS")},this.end=function(){console.log("end method not defined contact - IDR SOLUTIONS")}}var util={crackURL:function(e){return console.log("crackURL method not defined contact - IDR SOLUTIONS"),{}},iconStreamFromIcon:function(){return console.log("iconStreamFromIcon method not defined contact - IDR SOLUTIONS"),{}},printd:function(e,t,o){var n=["JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"],i=["SUNDAY","MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY"];switch(e){case 0:return this.printd("D:yyyymmddHHMMss",t);case 1:return this.printd("yyyy.mm.dd HH:MM:ss",t);case 2:return this.printd("m/d/yy h:MM:ss tt",t)}var a={year:t.getFullYear(),month:t.getMonth(),day:t.getDate(),dayOfWeek:t.getDay(),hours:t.getHours(),minutes:t.getMinutes(),seconds:t.getSeconds()},r=/(mmmm|mmm|mm|m|dddd|ddd|dd|d|yyyy|yy|HH|H|hh|h|MM|M|ss|s|tt|t|\\.)/g;return e.replace(r,(function(e,t){switch(t){case"mmmm":return n[a.month];case"mmm":return n[a.month].substring(0,3);case"mm":return(a.month+1).toString().padStart(2,"0");case"m":return(a.month+1).toString();case"dddd":return i[a.dayOfWeek];case"ddd":return i[a.dayOfWeek].substring(0,3);case"dd":return a.day.toString().padStart(2,"0");case"d":return a.day.toString();case"yyyy":return a.year.toString();case"yy":return(a.year%100).toString().padStart(2,"0");case"HH":return a.hours.toString().padStart(2,"0");case"H":return a.hours.toString();case"hh":return(1+(a.hours+11)%12).toString().padStart(2,"0");case"h":return(1+(a.hours+11)%12).toString();case"MM":return a.minutes.toString().padStart(2,"0");case"M":return a.minutes.toString();case"ss":return a.seconds.toString().padStart(2,"0");case"s":return a.seconds.toString();case"tt":return a.hours<12?"am":"pm";case"t":return a.hours<12?"a":"p"}return t.charCodeAt(1)}))},printf:function(e,arguments){var t=e.indexOf("%");if(-1===t)return e+" "+arguments;var o=e[t+1],n=e.indexOf("."),i=e[n+1],a=arguments.toFixed(i);return t>0&&(a=e.substring(0,t)+a),a},printx:function(e,t){var o=[e=>e,e=>e.toUpperCase(),e=>e.toLowerCase()],n=[],i=0,a=t.length,r=o[0],s=!1;for(var c of e)if(s)n.push(c),s=!1;else{if(i>=a)break;switch(c){case"?":n.push(r(t.charAt(i++)));break;case"X":for(;i<a;){var l;if("a"<=(l=t.charAt(i++))&&l<="z"||"A"<=l&&l<="Z"||"0"<=l&&l<="9"){n.push(r(l));break}}break;case"A":for(;i<a;){var l;if("a"<=(l=t.charAt(i++))&&l<="z"||"A"<=l&&l<="Z"){n.push(r(l));break}}break;case"9":for(;i<a;){var l;if("0"<=(l=t.charAt(i++))&&l<="9"){n.push(l);break}}break;case"*":for(;i<a;)n.push(r(t.charAt(i++)));break;case"\\":s=!0;break;case">":r=o[1];break;case"<":r=o[2];break;case"=":r=o[0];break;default:n.push(c)}}return n.join("")},scand:function(e,t){var o=e.split(/[ \-:\/\.]/),n=t.split(/[ \-:\/\.]/);if(o.length!=n.length)return null;for(var i=new Date,a=0;a<o.length;a++){var r;switch(r=(r=n[a]).toUpperCase(),o[a]){case"d":case"dd":if(isNaN(r))return null;i.setDate(parseInt(r));break;case"m":case"mm":if(isNaN(r))return null;var r;if(0==(r=parseInt(r))||r>12)return null;i.setMonth(r);break;case"mmm":case"mmmm":if(isNaN(r)){for(var s=["JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"],c=-1,l=0,d=s.length;l<d;l++)if(-1!==s[l].indexOf(r)){c=l;break}if(-1===c)return null;i.setMonth(c)}else i.setMonth(parseInt(r)-1);break;case"y":case"yy":if(isNaN(r))return null;i.setFullYear(parseInt(r));break;case"yyy":case"yyyy":if(isNaN(r)||r.length!=o[a].length)return null;i.setFullYear(parseInt(r));break;case"H":case"HH":if(isNaN(r))return null;i.setHours(parseInt(r));break;case"M":case"MM":if(isNaN(r))return null;i.setMinutes(parseInt(r));case"s":case"ss":if(isNaN(r))return null;i.setSeconds(parseInt(r))}}return i},spansToXML:function(e){console.log("method not defined contact - IDR SOLUTIONS")},streamFromString:function(e,t){console.log("method not defined contact - IDR SOLUTIONS")},stringFromStream:function(e,t){console.log("method not defined contact - IDR SOLUTIONS")},xmlToSpans:function(e){console.log("method not defined contact - IDR SOLUTIONS")}},JSRESERVED=["break","delete","function","return","typeof","case","do","if","switch","var","catch","else","in","this","void","continue","false","instanceof","throw","while","debugger","finally","new","true","with","default","for","null","try","class","const","enum","export","extends","import","super","implements","let","private","public","yield","interface","package","protected","static","abstract","double","goto","native","static","boolean","enum","implements","package","super","byte","export","import","private","synchronized","char","extends","int","protected","throws","class","final","interface","public","transient","const","float","long","short","volatile","arguments","encodeURI","Infinity","Number","RegExp","Array","encodeURIComponent","isFinite","Object","String","Boolean","Error","isNaN","parseFloat","SyntaxError","Date","eval","JSON","parseInt","TypeError","decodeURI","EvalError","Math","RangeError","undefined","decodeURIComponent","Function","NaN","ReferenceError","URIError"],EcmaFilter={decode:function(e,t){if("FlateDecode"===e){for(var o=new EcmaFlate,n=[],i=0,a=2,r=t.length;a<r;a++)n[i++]=t[a];return o.decode(n)}var s,c,l;return"ASCII85Decode"===e?(new EcmaAscii85).decode(t):"ASCIIHexDecode"===e?(new EcmaAsciiHex).decode(t):"RunLengthDecode"===e?(new EcmaRunLength).decode():(console.log("This type of decoding is not supported yet : "+e),t)},applyPredictor:function(e,t,o,n,i,a,r){if(1===t)return e;for(var s,c=e.length,l=new EcmaBuffer(e),d=n*i+7>>3,u=(a*n*i+7>>3)+d,h=this.createByteBuffer(u),f=this.createByteBuffer(u),m,p=0,g=0;!(c<=g);){var y=0,S=d;if((s=t)>=10){if(-1===(m=l.getByte()))break;m+=10}else m=s;for(;S<u&&-1!==(y=l.readTo(h,S,u-S));)S+=y,g+=y;if(-1===y)break;switch(m){case 2:for(var O=d;O<u;O++){var E=255&h[O],A=255&h[O-d];h[O]=E+A&255,o&&(o[p]=h[O]),p++}break;case 10:for(var O=d;O<u;O++)o&&(o[p]=255&h[O]),p++;break;case 11:for(var O=d;O<u;O++){var E=255&h[O],A=255&h[O-d];h[O]=E+A,o&&(o[p]=255&h[O]),p++}break;case 12:for(var O=d;O<u;O++){var E=(255&f[O])+(255&h[O]);h[O]=E,o&&(o[p]=255&h[O]),p++}break;case 13:for(var O=d;O<u;O++){var I=255&h[O],v=(255&h[O-d])+(255&f[O])>>1;h[O]=I+v,o&&(o[p]=255&h[O]),p++}break;case 14:for(var O=d;O<u;O++){var D=255&h[O-d],b=255&f[O],T=255&f[O-d],F=D+b-T,R=F-D,L=F-b,P=F-T;R=R<0?-R:R,L=L<0?-L:L,P=P<0?-P:P,h[O]=R<=L&&R<=P?h[O]+D:L<=P?h[O]+b:h[O]+T,o&&(o[p]=255&h[O]),p++}break;case 15:break}for(var y=0;y<u;y++)f[y]=h[y]}return p},createByteBuffer:function(e){for(var t=[],o=0;o<e;o++)t.push(0);return t},decodeBase64:function(e){for(var t="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",o,n,i,a,r=[],s=e.replace(/[^A-Za-z0-9\+\/\=]/g,""),c=s.length,l=0;l<c;)o=t.indexOf(s.charAt(l++)),n=t.indexOf(s.charAt(l++)),i=t.indexOf(s.charAt(l++)),a=t.indexOf(s.charAt(l++)),r.push(o<<2|n>>4),64!==i&&r.push((15&n)<<4|i>>2),64!==a&&r.push((3&i)<<6|a);return r},encodeBase64:function(e){for(var t="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",o="",n,i,a,r,s,c,l,d=0,u=e.length;d<u;)r=(n=e[d++])>>2,s=(3&n)<<4|(i=e[d++])>>4,c=(15&i)<<2|(a=e[d++])>>6,l=63&a,isNaN(i)?c=l=64:isNaN(a)&&(l=64),o+=t.charAt(r)+t.charAt(s)+t.charAt(c)+t.charAt(l);return o}};function EcmaFlate(){this.decode=function(e){var t,o,n,i,a=1024;for(p=0,h=0,f=0,l=-1,m=!1,E=A=0,D=null,d=e,u=0,o=new Array(a),t=[];(n=j(o,0,a))>0;)for(i=0;i<n;i++)t.push(o[i]);return d=null,t};var e=[0,1,3,7,15,31,63,127,255,511,1023,2047,4095,8191,16383,32767,65535],t=[3,4,5,6,7,8,9,10,11,13,15,17,19,23,27,31,35,43,51,59,67,83,99,115,131,163,195,227,258,0,0],o=[1,2,3,4,5,7,9,13,17,25,33,49,65,97,129,193,257,385,513,769,1025,1537,2049,3073,4097,6145,8193,12289,16385,24577],n=[16,17,18,0,8,7,9,6,10,5,11,4,12,3,13,2,14,1,15],i=[0,0,0,0,0,0,0,0,1,1,1,1,2,2,2,2,3,3,3,3,4,4,4,4,5,5,5,5,0,99,99],a=[0,0,0,0,1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12,13,13],r=32768,s=0,c=new Array(r<<1),l,d,u,h,f,m,p,g=null,y,S,O,E,A,I=9,v=6,D,b,T,F;function R(){return d.length===u?-1:255&d[u++]}function L(t){return h&e[t]}function P(){this.next=null,this.list=null}function N(){this.e=0,this.b=0,this.n=0,this.t=null}function C(e,t,o,n,i,a){this.BMAX=16,this.N_MAX=288,this.status=0,this.root=null,this.m=0;var r,s=new Array(this.BMAX+1),c,l,d,u,h,f,m,p=new Array(this.BMAX+1),g,y,S,O=new N,E=new Array(this.BMAX),A=new Array(this.N_MAX),I=new Array(this.BMAX+1),v,D,b,T,F,R;for(R=this.root=null,h=0;h<s.length;h++)s[h]=0;for(h=0;h<p.length;h++)p[h]=0;for(h=0;h<E.length;h++)E[h]=null;for(h=0;h<A.length;h++)A[h]=0;for(h=0;h<I.length;h++)I[h]=0;c=t>256?e[256]:this.BMAX,g=e,y=0,h=t;do{s[g[y]]++,y++}while(--h>0);if(s[0]===t)return this.root=null,this.m=0,this.status=0,void 0;for(f=1;f<=this.BMAX&&0===s[f];f++);for(m=f,a<f&&(a=f),h=this.BMAX;0!==h&&0===s[h];h--);for(d=h,a>h&&(a=h),b=1<<f;f<h;f++,b<<=1)if((b-=s[f])<0)return this.status=2,this.m=a,void 0;if((b-=s[h])<0)return this.status=2,this.m=a,void 0;for(s[h]+=b,I[1]=f=0,g=s,y=1,D=2;--h>0;)I[D++]=f+=g[y++];g=e,y=0,h=0;do{0!==(f=g[y++])&&(A[I[f]++]=h)}while(++h<t);for(t=I[d],I[0]=h=0,g=A,y=0,u=-1,v=p[0]=0,S=null,T=0;m<=d;m++)for(r=s[m];r-- >0;){for(;m>v+p[1+u];){if(v+=p[1+u],u++,T=(T=d-v)>a?a:T,(l=1<<(f=m-v))>r+1)for(l-=r+1,D=m;++f<T&&!((l<<=1)<=s[++D]);)l-=s[D];for(v+f>c&&v<c&&(f=c-v),T=1<<f,p[1+u]=f,S=new Array(T),F=0;F<T;F++)S[F]=new N;(R=R?R.next=new P:this.root=new P).next=null,R.list=S,E[u]=S,u>0&&(I[u]=h,O.b=p[u],O.e=16+f,O.t=S,f=(h&(1<<v)-1)>>v-p[u],E[u-1][f].e=O.e,E[u-1][f].b=O.b,E[u-1][f].n=O.n,E[u-1][f].t=O.t)}for(O.b=m-v,y>=t?O.e=99:g[y]<o?(O.e=g[y]<256?16:15,O.n=g[y++]):(O.e=i[g[y]-o],O.n=n[g[y++]-o]),l=1<<m-v,f=h>>v;f<T;f+=l)S[f].e=O.e,S[f].b=O.b,S[f].n=O.n,S[f].t=O.t;for(f=1<<m-1;0!=(h&f);f>>=1)h^=f;for(h^=f;(h&(1<<v)-1)!==I[u];)v-=p[u],u--}this.m=p[1],this.status=0!==b&&1!==d?1:0}function k(e){for(;f<e;)h|=R()<<f,f+=8}function B(e){h>>=e,f-=e}function U(e,t,o){if(0===o)return 0;for(var n,i,a=0;;){for(k(T),n=(i=D.list[L(T)]).e;n>16;){if(99===n)return-1;B(i.b),k(n-=16),n=(i=i.t[L(n)]).e}if(B(i.b),16!==n){if(15===n)break;for(k(n),E=i.n+L(n),B(n),k(F),n=(i=b.list[L(F)]).e;n>16;){if(99===n)return-1;B(i.b),k(n-=16),n=(i=i.t[L(n)]).e}for(B(i.b),k(n),A=p-i.n-L(n),B(n);E>0&&a<o;)E--,A&=r-1,p&=r-1,e[t+a++]=c[p++]=c[A++];if(a===o)return o}else if(p&=r-1,e[t+a++]=c[p++]=i.n,a===o)return o}return l=-1,a}function w(e,t,o){var n;if(B(n=7&f),k(16),n=L(16),B(16),k(16),n!==(65535&~h))return-1;for(B(16),E=n,n=0;E>0&&n<o;)E--,p&=r-1,k(8),e[t+n++]=c[p++]=L(8),B(8);return 0===E&&(l=-1),n}function x(e,n,r){if(null===g){var s,c,l=new Array(288);for(s=0;s<144;s++)l[s]=8;for(;s<256;s++)l[s]=9;for(;s<280;s++)l[s]=7;for(;s<288;s++)l[s]=8;if(0!==(c=new C(l,288,257,t,i,S=7)).status){throw"EcmaFlateDecodeError : Huffman Status "+c.status;return-1}for(g=c.root,S=c.m,s=0;s<30;s++)l[s]=5;if((c=new C(l,30,0,o,a,O=5)).status>1){throw g=null,"EcmaFlateDecodeError : Huffman Status"+c.status;return-1}y=c.root,O=c.m}return D=g,b=y,T=S,F=O,U(e,n,r)}function M(e,r,s){var c,l,d,u,h,f,m,p,g,y=new Array(316);for(c=0;c<y.length;c++)y[c]=0;if(k(5),m=257+L(5),B(5),k(5),p=1+L(5),B(5),k(4),f=4+L(4),B(4),m>286||p>30)return-1;for(l=0;l<f;l++)k(3),y[n[l]]=L(3),B(3);for(;l<19;l++)y[n[l]]=0;if(0!==(g=new C(y,19,19,null,null,T=7)).status)return-1;for(D=g.root,T=g.m,u=m+p,c=d=0;c<u;)if(k(T),B(l=(h=D.list[L(T)]).b),(l=h.n)<16)y[c++]=d=l;else if(16===l){if(k(2),l=3+L(2),B(2),c+l>u)return-1;for(;l-- >0;)y[c++]=d}else if(17===l){if(k(3),l=3+L(3),B(3),c+l>u)return-1;for(;l-- >0;)y[c++]=0;d=0}else{if(k(7),l=11+L(7),B(7),c+l>u)return-1;for(;l-- >0;)y[c++]=0;d=0}if(g=new C(y,m,257,t,i,T=I),0===T&&(g.status=1),0!==g.status)return-1;for(D=g.root,T=g.m,c=0;c<p;c++)y[c]=y[c+m];return g=new C(y,p,0,o,a,F=v),b=g.root,0===(F=g.m)&&m>257||0!==g.status?-1:U(e,r,s)}function j(e,t,o){for(var n=0,i;n<o;){if(m&&-1===l)return n;if(E>0){if(l!==s)for(;E>0&&n<o;)E--,A&=r-1,p&=r-1,e[t+n++]=c[p++]=c[A++];else{for(;E>0&&n<o;)E--,p&=r-1,k(8),e[t+n++]=c[p++]=L(8),B(8);0===E&&(l=-1)}if(n===o)return n}if(-1===l){if(m)break;k(1),0!==L(1)&&(m=!0),B(1),k(2),l=L(2),B(2),D=null,E=0}switch(l){case 0:i=w(e,t+n,o-n);break;case 1:i=D?U(e,t+n,o-n):x(e,t+n,o-n);break;case 2:i=D?U(e,t+n,o-n):M(e,t+n,o-n);break;default:i=-1;break}if(-1===i)return m?0:-1;n+=i}return n}}function EcmaAsciiHex(){this.decode=function(e){for(var t=[],o=-1,n=0,i,a,r=!1,s=0,c=e.length;s<c;s++){if((i=e[s])>=48&&i<=57)a=15&i;else{if(!(i>=65&&i<=70||i>=97&&i<=102)){if(62===i){r=!0;break}continue}a=9+(15&i)}o<0?o=a:(t[n++]=o<<4|a,o=-1)}return o>=0&&r&&(t[n++]=o<<4,o=-1),t}}function EcmaAscii85(){this.decode=function(e){for(var t=e.length,o=[],n=[0,0,0,0,0],i,a,r,s,c,l=0;l<t;++l)if(122!==e[l]){for(i=0;i<5;++i)n[i]=e[l+i]-33;if((c=t-l)<5){for(i=c;i<4;n[++i]=0);n[c]=85}for(r=255&(a=85*(85*(85*(85*n[0]+n[1])+n[2])+n[3])+n[4]),s=255&(a>>>=8),a>>>=8,o.push(a>>>8,255&a,s,r),i=c;i<5;++i,o.pop());l+=4}else o.push(0,0,0,0);return o}}function EcmaRunLength(){this.decode=function(e){for(var t,o,n=e.length,i=0,a=[],r=0;r<n;r++)if((t=e[r])<0&&(t=256+t),128===t)r=n;else if(t>128){t=257-t,o=e[++r];for(var s=0;s<t;s++)a[i++]=o}else{r++,t++;for(var s=0;s<t;s++)a[i++]=e[r+s];r=r+t-1}return a}}var EcmaKEY={A:"A",AA:"AA",AC:"AC",AcroForm:"AcroForm",ActualText:"ActualText",AIS:"AIS",Alternate:"Alternate",AlternateSpace:"AlternateSpace",Annot:"Annot",Annots:"Annots",AntiAlias:"AntiAlias",AP:"AP",Array:"Array",ArtBox:"ArtBox",AS:"AS",Asset:"Asset",Assets:"Assets",Ascent:"Ascent",Author:"Author",AvgWidth:"AvgWidth",B:"B",BlackPoint:"BlackPoint",Background:"Background",Base:"Base",BaseEncoding:"BaseEncoding",BaseFont:"BaseFont",BaseState:"BaseState",BBox:"BBox",BC:"BC",BDC:"BDC",BG:"BG",BI:"BI",BitsPerComponent:"BitsPerComponent",BitsPerCoordinate:"BitsPerCoordinate",BitsPerFlag:"BitsPerFlag",BitsPerSample:"BitsPerSample",BlackIs1:"BlackIs1",BleedBox:"BleedBox",Blend:"Blend",Bounds:"Bounds",Border:"Border",BM:"BM",BPC:"BPC",BS:"BS",Btn:"Btn",ByteRange:"ByteRange",C:"C",C0:"C0",C1:"C1",C2:"C2",CA:"CA",ca:"ca",Calculate:"Calculate",CapHeight:"CapHeight",Caret:"Caret",Category:"Category",Catalog:"Catalog",Cert:"Cert",CF:"CF",CFM:"CFM",Ch:"Ch",CIDSet:"CIDSet",CIDSystemInfo:"CIDSystemInfo",CharProcs:"CharProcs",CharSet:"CharSet",CheckSum:"CheckSum",CIDFontType0C:"CIDFontType0C",CIDToGIDMap:"CIDToGIDMap",Circle:"Circle",ClassMap:"ClassMap",CMap:"CMap",CMapName:"CMapName",CMYK:"CMYK",CO:"CO",Color:"Color",Colors:"Colors",ColorBurn:"ColorBurn",ColorDodge:"ColorDodge",ColorSpace:"ColorSpace",ColorTransform:"ColorTransform",Columns:"Columns",Components:"Components",CompressedObject:"CompressedObject",Compatible:"Compatible",Configurations:"Configurations",Configs:"Configs",ContactInfo:"ContactInfo",Contents:"Contents",Coords:"Coords",Count:"Count",CreationDate:"CreationDate",Creator:"Creator",CropBox:"CropBox",CS:"CS",CVMRC:"CVMRC",D:"D",DA:"DA",DamageRowsBeforeError:"DamageRowsBeforeError",Darken:"Darken",DC:"DC",DCT:"DCT",Decode:"Decode",DecodeParms:"DecodeParms",Desc:"Desc",DescendantFonts:"DescendantFonts",Descent:"Descent",Dest:"Dest",Dests:"Dests",Difference:"Difference",Differences:"Differences",Domain:"Domain",DP:"DP",DR:"DR",DS:"DS",DV:"DV",DW:"DW",DW2:"DW2",E:"E",EarlyChange:"EarlyChange",EF:"EF",EFF:"EFF",EmbeddedFiles:"EmbeddedFiles",EOPROPtype:"EOPROPtype",Encode:"Encode",EncodeByteAlign:"EncodeByteAlign",Encoding:"Encoding",Encrypt:"Encrypt",EncryptMetadata:"EncryptMetadata",EndOfBlock:"EndOfBlock",EndOfLine:"EndOfLine",Exclusion:"Exclusion",Export:"Export",Extend:"Extend",Extends:"Extends",ExtGState:"ExtGState",Event:"Event",F:"F",FDF:"FDF",Ff:"Ff",Fields:"Fields",FIleAccess:"FIleAccess",FileAttachment:"FileAttachment",Filespec:"Filespec",Filter:"Filter",First:"First",FirstChar:"FirstChar",FIrstPage:"FIrstPage",Fit:"Fit",FItB:"FItB",FitBH:"FitBH",FItBV:"FItBV",FitH:"FitH",FItHeight:"FItHeight",FitR:"FitR",FitV:"FitV",FitWidth:"FitWidth",Flags:"Flags",Fo:"Fo",Font:"Font",FontBBox:"FontBBox",FontDescriptor:"FontDescriptor",FontFamily:"FontFamily",FontFile:"FontFile",FontFIle2:"FontFIle2",FontFile3:"FontFile3",FontMatrix:"FontMatrix",FontName:"FontName",FontStretch:"FontStretch",FontWeight:"FontWeight",Form:"Form",Format:"Format",FormType:"FormType",FreeText:"FreeText",FS:"FS",FT:"FT",FullScreen:"FullScreen",Function:"Function",Functions:"Functions",FunctionType:"FunctionType",G:"G",Gamma:"Gamma",GoBack:"GoBack",GoTo:"GoTo",GoToR:"GoToR",Group:"Group",H:"H",HardLight:"HardLight",Height:"Height",Hide:"Hide",Highlight:"Highlight",Hue:"Hue",Hival:"Hival",I:"I",ID:"ID",Identity:"Identity",Identity_H:"Identity_H",Identity_V:"Identity_V",IDTree:"IDTree",IM:"IM",Image:"Image",ImageMask:"ImageMask",Index:"Index",Indexed:"Indexed",Info:"Info",Ink:"Ink",InkList:"InkList",Instances:"Instances",Intent:"Intent",InvisibleRect:"InvisibleRect",IRT:"IRT",IT:"IT",ItalicAngle:"ItalicAngle",JavaScript:"JavaScript",JS:"JS",JT:"JT",JBIG2Globals:"JBIG2Globals",K:"K",Keywords:"Keywords",Keystroke:"Keystroke",Kids:"Kids",L:"L",Lang:"Lang",Last:"Last",LastChar:"LastChar",LastModified:"LastModified",LastPage:"LastPage",Launch:"Launch",Layer:"Layer",Leading:"Leading",Length:"Length",Length1:"Length1",Length2:"Length2",Length3:"Length3",Lighten:"Lighten",Limits:"Limits",Line:"Line",Linearized:"Linearized",LinearizedReader:"LinearizedReader",Link:"Link",ListMode:"ListMode",Location:"Location",Lock:"Lock",Locked:"Locked",Lookup:"Lookup",Luminosity:"Luminosity",LW:"LW",M:"M",MacExpertEncoding:"MacExpertEncoding",MacRomanEncoding:"MacRomanEncoding",Margin:"Margin",MarkInfo:"MarkInfo",Mask:"Mask",Matrix:"Matrix",Matte:"Matte",max:"max",MaxLen:"MaxLen",MaxWidth:"MaxWidth",MCID:"MCID",MediaBox:"MediaBox",Metadata:"Metadata",min:"min",MissingWidth:"MissingWidth",MK:"MK",ModDate:"ModDate",MouseDown:"MouseDown",MouseEnter:"MouseEnter",MouseExit:"MouseExit",MouseUp:"MouseUp",Movie:"Movie",Multiply:"Multiply",N:"N",Name:"Name",Named:"Named",Names:"Names",NeedAppearances:"NeedAppearances",Next:"Next",NextPage:"NextPage",NM:"NM",None:"None",Normal:"Normal",Nums:"Nums",O:"O",ObjStm:"ObjStm",OC:"OC",OCGs:"OCGs",OCProperties:"OCProperties",OE:"OE",OFF:"OFF",off:"off",ON:"ON",On:"On",OnBlur:"OnBlur",OnFocus:"OnFocus",OP:"OP",op:"op",Open:"Open",OpenAction:"OpenAction",OPI:"OPI",OPM:"OPM",Opt:"Opt",Order:"Order",Ordering:"Ordering",Outlines:"Outlines",Overlay:"Overlay",P:"P",PaintType:"PaintType",Page:"Page",PageLabels:"PageLabels",PageMode:"PageMode",Pages:"Pages",Params:"Params",Parent:"Parent",ParentTree:"ParentTree",Pattern:"Pattern",PatternType:"PatternType",PC:"PC",PDFDocEncoding:"PDFDocEncoding",Perms:"Perms",Pg:"Pg",PI:"PI",PieceInfo:"PieceInfo",PO:"PO",Polygon:"Polygon",PolyLine:"PolyLine",Popup:"Popup",Predictor:"Predictor",Prev:"Prev",PrevPage:"PrevPage",Print:"Print",PrinterMark:"PrinterMark",PrintState:"PrintState",Process:"Process",ProcSet:"ProcSet",Producer:"Producer",Projection:"Projection",Properties:"Properties",PV:"PV",Q:"Q",Qfactor:"Qfactor",QuadPoints:"QuadPoints",R:"R",Range:"Range",RBGroups:"RBGroups",RC:"RC",Reason:"Reason",Recipients:"Recipients",Rect:"Rect",Reference:"Reference",Registry:"Registry",ResetForm:"ResetForm",Resources:"Resources",RGB:"RGB",RichMedia:"RichMedia",RichMediaContent:"RichMediaContent",RD:"RD",RoleMap:"RoleMap",Root:"Root",Rotate:"Rotate",Rows:"Rows",RT:"RT",RV:"RV",S:"S",SA:"SA",Saturation:"Saturation",SaveAs:"SaveAs",Screen:"Screen",SetOCGState:"SetOCGState",Shading:"Shading",ShadingType:"ShadingType",Sig:"Sig",SigFlags:"SigFlags",Signed:"Signed",Size:"Size",SM:"SM",SMask:"SMask",SoftLight:"SoftLight",Sound:"Sound",Square:"Square",Squiggly:"Squiggly",Stamp:"Stamp",Standard:"Standard",StandardEncoding:"StandardEncoding",State:"State",StemH:"StemH",StemV:"StemV",StmF:"StmF",StrF:"StrF",StrikeOut:"StrikeOut",StructElem:"StructElem",StructParent:"StructParent",StructParents:"StructParents",StructTreeRoot:"StructTreeRoot",Style:"Style",SubFilter:"SubFilter",Subj:"Subj",Subject:"Subject",SubmitForm:"SubmitForm",Subtype:"Subtype",Supplement:"Supplement",T:"T",Tabs:"Tabs",TagSuspect:"TagSuspect",Text:"Text",TI:"TI",TilingType:"TilingType",tintTransform:"tintTransform",Title:"Title",TM:"TM",Toggle:"Toggle",ToUnicode:"ToUnicode",TP:"TP",TR:"TR",TrapNet:"TrapNet",Trapped:"Trapped",TrimBox:"TrimBox",Tx:"Tx",TxFontSize:"TxFontSize",TxOutline:"TxOutline",TU:"TU",Type:"Type",U:"U",UE:"UE",UF:"UF",Uncompressed:"Uncompressed",Unsigned:"Unsigned",Usage:"Usage",V:"V",Validate:"Validate",VerticesPerRow:"VerticesPerRow",View:"View",VIewState:"VIewState",VP:"VP",W:"W",W2:"W2",Watermark:"Watermark",WhitePoint:"WhitePoint",Widget:"Widget",Win:"Win",WinAnsiEncoding:"WinAnsiEncoding",Width:"Width",Widths:"Widths",WP:"WP",WS:"WS",X:"X",XFA:"XFA",XFAImages:"XFAImages",XHeight:"XHeight",XObject:"XObject",XRef:"XRef",XRefStm:"XRefStm",XStep:"XStep",XYZ:"XYZ",YStep:"YStep",Zoom:"Zoom",ZoomTo:"ZoomTo",Unchanged:"Unchanged",Underline:"Underline"},EcmaLEX={CHAR256:[1,0,0,0,0,0,0,0,0,1,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,2,0,0,2,2,0,0,0,0,0,2,4,4,4,4,4,4,4,4,4,4,0,0,2,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],STRPDF:[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,728,711,710,729,733,731,730,732,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,8226,8224,8225,8230,8212,8211,402,8260,8249,8250,8722,8240,8222,8220,8221,8216,8217,8218,8482,64257,64258,321,338,352,376,381,305,322,339,353,382,0,8364],isWhiteSpace:function(e){return 1===this.CHAR256[e]},isEOL:function(e){return 10===e||13===e},isDelimiter:function(e){return 2===this.CHAR256[e]},isComment:function(e){return 37===e},isBacklash:function(e){return 92===e},isEscSeq:function(e,t){if(252===e)switch(t){case 40:case 41:case 98:case 102:case 110:case 114:case 116:case 92:case 12:case 13:return!0;default:return!1}return!1},isDigit:function(e){return 4===this.CHAR256[e]},isBoolean:function(e){return"boolean"==typeof e},isNull:function(e){return null===typeof e},isNumber:function(e){return"number"==typeof e},isString:function(e){return"string"==typeof e},isHexString:function(e){return e instanceof EcmaHEX},isArray:function(e){return e instanceof Array},isName:function(e){return e instanceof EcmaNAME},isDict:function(e){return e instanceof EcmaDICT},isRef:function(e){return e instanceof EcmaOREF},isStreamDict:function(e){return EcmaKEY.Length in e.keys},getDA:function(e){for(var t={fontSize:10,fontName:"Arial",fontColor:"0 g"},o=e.length,n=0,i="",a=new Array;n<o;){var r=e.charCodeAt(n++);EcmaLEX.isWhiteSpace(r)||EcmaLEX.isEOL(r)?(i.length>0&&a.push(i),i=""):i+=String.fromCharCode(r)}i.length>0&&a.push(i);for(var n=0,o=a.length;n<o;n++)"/"===a[n].charAt(0)?(t.fontName=a[n].substring(1),a[n+1]&&(t.fontSize=parseInt(a[n+1]))):n>3&&"rg"===a[n]&&(t.fontColor=a[n-3]+" "+a[n-2]+" "+a[n-1]+" rg");return t},getRefFromString:function(e){var t=e.trim().split(" ");return new EcmaOREF(parseInt(t[0]),parseInt(t[1]))},getZeroLead:function(e){for(var t=""+e,o=10-t.length,n=0;n<o;n++)t="0"+t;return t},toPDFString:function(e){var t=e.length,o=[],n;if("þ"===e[0]&&"ÿ"===e[1])for(var i=2;i<t;i+=2)n=e.charCodeAt(i)<<8|e.charCodeAt(i+1),o.push(String.fromCharCode(n));else for(var i=0;i<t;++i){var a=this.STRPDF[e.charCodeAt(i)];o.push(a?String.fromCharCode(a):e.charAt(i))}return o.join("")},toPDFHex16String:function(e){var t=e.length,o=[],n;o.push("fe"),o.push("ff");for(var i=0;i<t;++i){n=e.charCodeAt(i);for(var a=Number(n>>8).toString(16);a.length<2;)a="0"+a;for(var r=Number(255&n).toString(16);r.length<2;)r="0"+r;o.push(a),o.push(r)}return o.join("")},toBytes32:function(e){return[(4278190080&e)>>24,(16711680&e)>>16,(65280&e)>>8,255&e]},textToBytes:function(e){for(var t=[],o,n=0,i=e.length;n<i;n++)(o=e.charCodeAt(n))<256?t.push(o):(t.push(o>>8),t.push(255&o));return t},bytesToText:function(e,t,o){for(var n="",i=t;i<o;i++)n+=String.fromCharCode(e[t+i]);return n},pushBytesToBuffer:function(e,t){for(var o=0,n=e.length;o<n;o++)t.push(e[o])},objectToText:function(e){if(this.isDict(e)){var t="<<";for(var o in e.keys)t+="/"+o+" "+this.objectToText(e.keys[o])+" ";return t+=">>"}if(this.isArray(e)){for(var t="[",n=0,i=e.length;n<i;n++)t+=" "+this.objectToText(e[n]);return t+="]"}return this.isRef(e)?e.ref:this.isName(e)?"/"+e.name:this.isNumber(e)?""+e:this.isString(e)?"("+EcmaLEX.toPDFString(e)+")":this.isHexString(e)?e.str:this.isBoolean(e)?e?"true":"false":"null"}},EcmaFontWidths={Arial:[750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,278,278,355,556,556,889,667,191,333,333,389,584,278,333,278,278,556,556,556,556,556,556,556,556,556,556,278,278,584,584,584,556,1015,667,667,722,722,667,611,778,722,278,500,667,556,833,722,778,667,778,722,667,611,722,667,944,667,667,611,278,278,278,469,556,333,556,556,500,556,556,278,556,556,222,222,500,222,833,556,556,556,556,333,500,278,556,500,722,500,500,500,334,260,334,584,350,556,350,222,556,333,1e3,556,556,333,1e3,667,333,1e3,350,611,350,350,222,222,333,333,350,556,1e3,333,1e3,500,333,944,350,500,667,278,333,556,556,556,556,260,556,333,737,370,556,584,333,737,552,400,549,333,333,333,576,537,333,333,333,365,556,834,834,834,611,667,667,667,667,667,667,1e3,722,667,667,667,667,278,278,278,278,722,722,778,778,778,778,778,584,778,722,722,722,722,667,667,611,556,556,556,556,556,556,889,500,556,556,556,556,278,278,278,278,556,556,556,556,556,556,556,549,611,556,556,556,556,500,556,500]},EcmaFormField={READONLY_ID:1,REQUIRED_ID:2,NOEXPORT_ID:3,MULTILINE_ID:13,PASSWORD_ID:14,NOTOGGLETOOFF_ID:15,RADIO_ID:16,PUSHBUTTON_ID:17,COMBO_ID:18,EDIT_ID:19,SORT_ID:20,FILESELECT_ID:21,MULTISELECT_ID:22,DONOTSPELLCHECK_ID:23,DONOTSCROLL_ID:24,COMB_ID:25,RICHTEXT_ID:26,RADIOINUNISON_ID:26,COMMITONSELCHANGE_ID:27,handleDisplayChange:function(e,t,o){var n=this.flagToBooleans(o);switch(t.display){case display.hidden:n[2]=!0,n[3]=!0,n[6]=!1;break;case display.noPrint:n[2]=!1,n[3]=!1,n[6]=!1;break;case display.noView:n[2]=!1,n[3]=!0,n[6]=!0;case display.visible:n[2]=!1,n[3]=!0,n[6]=!1;break}e.keys[EcmaKEY.F]=this.booleansToFlag(n)},editTextField:function(e,t,o,n,i,a){var r=!1,s=!1,c=i,l=n.keys[EcmaKEY.Ff];if(l){var d=this.flagToBooleans(l);if(d[1]=!0,r=d[this.PASSWORD_ID]){for(var u="",h=0,f=c.length;h<f;h++)u+="*";c=u}s=d[this.MULTILINE_ID]}if(n.keys[EcmaKEY.V]=i,n.keys[EcmaKEY.AP]=new EcmaDICT,n.keys[EcmaKEY.TU]){var m=n.keys[EcmaKEY.TU];EcmaLEX.isHexString(m)||(m=m.replace(/[{()}]/g,"_"),n.keys[EcmaKEY.TU]=m)}var p=0;n.keys[EcmaKEY.Q]&&(p=n.keys[EcmaKEY.Q]);var g=n.keys[EcmaKEY.Rect],y=g[2]-g[0];y=Math.round(100*y)/100;var S=g[3]-g[1];S=Math.round(100*S)/100;var O=10,E=n.keys.DA,A=n.keys[EcmaKEY.Parent];if(EcmaLEX.isRef(A)){var u,I=(u=new EcmaBuffer).getIndirectObject(A);EcmaLEX.isDict(I)&&(I.keys[EcmaKEY.V]=i,t.push(I),o.push(A))}var v="0 g",D="Arial";if(E){var b=EcmaLEX.getDA(E);O=0===(O=b.fontSize)?10:O,v=b.fontColor,D=b.fontName}var T=new EcmaDICT,F=new EcmaOREF(a,0),R=n.keys[EcmaKEY.AP].keys.N;if(R)var T=e.getObjectValue(R);n.keys[EcmaKEY.AP].keys.N=F,T.keys[EcmaKEY.BBox]=[0,0,y,S],T.keys[EcmaKEY.Matrix]=[1,0,0,1,0,0],T.keys[EcmaKEY.Subtype]=new EcmaNAME(EcmaKEY.Form);var L=new EcmaDICT,P=new EcmaDICT;P.keys[EcmaKEY.Name]=new EcmaNAME("Helv"),P.keys[EcmaKEY.Type]=new EcmaNAME("Font"),P.keys[EcmaKEY.Subtype]=new EcmaNAME("Type1"),P.keys[EcmaKEY.BaseFont]=new EcmaNAME("Helvetica"),P.keys[EcmaKEY.Encoding]=new EcmaNAME("PDFDocEncoding");var N=new EcmaDICT;N.keys.Helv=P,L.keys[EcmaKEY.Font]=N,T.keys[EcmaKEY.Resources]=L,T.keys[EcmaKEY.FormType]=1,T.keys[EcmaKEY.Type]=new EcmaNAME(EcmaKEY.XObject);var C="";if(s){for(var u,k=0,B="",U="",w="",h=0,f=c.length;h<f;h++){var x=c.charCodeAt(h),M=String.fromCharCode(x),j=this.findCodeWidth(x,O);k+j>y&&(U===w?(B+=U+"\n",U="",w="",k=0):(B+="\n",k=this.findStringWidth(U,O),w=U)),k+=j,10===x?(B+=U+"\n",U="",w="",k=0):EcmaLEX.isWhiteSpace(x)?(B+=U+" ",U="",w+=" "):(U+=M,w+=M)}U.length>0&&(B+=U);var X=B.split("\n"),K=1.2*O;K=Math.round(100*K)/100;var V=X.length*K,Y=S-V+V-O;(Y=Y<0?0:Y)>0&&(Y=Math.round(100*Y)/100),C+="/Tx BMC\nBT\n"+v+"\n/Helv "+O+" Tf\n",C+="2 "+Y+" Td\n("+X[0]+") Tj\n";for(var h=1,f=X.length;h<f;h++)C+="0 "+-K+" Td\n("+X[h]+") Tj\n";C+="ET\nEMC";var W=EcmaLEX.textToBytes(C);T.keys[EcmaKEY.Length]=W.length,T.rawStream=W,T.stream=W,t.push(T),o.push(F)}else{var _=O-.2*O,H=S-_>0?(S-_)/2:0,G=2;if(p>0){var x,M,Q=0;G=0;for(var h=0,f=c.length;h<f;h++)x=c.charCodeAt(h),M=String.fromCharCode(x),Q+=this.findCodeWidth(x,O);Q<y&&(G=1===p?(y-Q)/2:y-Q)}for(var W=[],q="/Tx BMC\nBT\n"+v+"\n"+G+" "+H+" Td\n/Helv "+O+" Tf\n(",z=") Tj\nET\nEMC",u,h=0,f=(u=EcmaLEX.textToBytes(q)).length;h<f;h++)W.push(u[h]);for(var h=0,f=(u=EcmaLEX.textToBytes(c)).length;h<f;h++)W.push(u[h]);for(var h=0,f=(u=EcmaLEX.textToBytes(z)).length;h<f;h++)W.push(u[h]);T.keys[EcmaKEY.Length]=W.length,T.rawStream=W,T.stream=W,t.push(T),o.push(F)}},selectCheckBox:function(e,t){var o="Yes",n="Off",i=t.keys[EcmaKEY.AP];if(i){var a=(i=(new EcmaBuffer).getObjectValue(i)).keys[EcmaKEY.D];if(a)for(var r in(a=(new EcmaBuffer).getObjectValue(a)).keys){var s;"off"!==r.toLowerCase()&&(o=r)}e?(t.keys[EcmaKEY.AS]=new EcmaNAME(o),t.keys[EcmaKEY.V]=new EcmaNAME(o)):(t.keys[EcmaKEY.AS]=new EcmaNAME(n),t.keys[EcmaKEY.V]=new EcmaNAME(n))}},selectRadioChild:function(e,t){var o=t.keys[EcmaKEY.AP];if(o){var n="Yes",i="Off",a=(o=(new EcmaBuffer).getObjectValue(o)).keys[EcmaKEY.D];if(a)for(var r in(a=(new EcmaBuffer).getObjectValue(a)).keys)"off"!==r.toLowerCase()&&(e.value!=r?(n=e.value,this.handleAPNameChange(o,e.value)):n=r);e.checked?t.keys[EcmaKEY.AS]=new EcmaNAME(n):t.keys[EcmaKEY.AS]=new EcmaNAME(i)}},handleAPNameChange:function(e,t){var o=e.keys[EcmaKEY.D];if(o)for(var n in(o=(new EcmaBuffer).getObjectValue(o)).keys)"off"!==n.toLowerCase()&&t!=n&&(o.keys[t]=o.keys[n],delete o.keys[n]);var i=e.keys[EcmaKEY.N];if(i)for(var a in(i=(new EcmaBuffer).getObjectValue(i)).keys)"off"!==a.toLowerCase()&&t!=a&&(i.keys[t]=i.keys[a],delete i.keys[a]);var r=e.keys[EcmaKEY.R];if(r)for(var s in(r=(new EcmaBuffer).getObjectValue(r)).keys)"off"!==s.toLowerCase()&&t!=s&&(r.keys[t]=r.keys[s],delete r.keys[s])},selectChoice:function(e,t,o,n,i){var a=o.keys[EcmaKEY.Opt],r=n;if(o.keys[EcmaKEY.V]=n,a)for(var s=0,c=a.length;s<c;s++){var l=a[s];if(EcmaLEX.isArray(l)){if(l[0]===n){r=l[1],o.keys[EcmaKEY.I]=[s];break}}else if(l===n){r=l,o.keys[EcmaKEY.I]=[s];break}}o.keys[EcmaKEY.AP]=new EcmaDICT;var d=o.keys[EcmaKEY.Rect],u=d[2]-d[0],h=d[3]-d[1],f=10,m=o.keys.DA;if(m){var p=m.indexOf("/");p>=0&&(m=m.substring(p).split(" "),f=parseInt(m[1])),o.keys.DA="/Arial "+f+" Tf"}var g=new EcmaDICT,y=new EcmaOREF(i,0);o.keys[EcmaKEY.AP].keys.N=y,g.keys[EcmaKEY.BBox]=[0,0,u,h],g.keys[EcmaKEY.Matrix]=[1,0,0,1,0,0],g.keys[EcmaKEY.Subtype]=new EcmaNAME(EcmaKEY.Form),g.keys[EcmaKEY.Resources]=new EcmaDICT,g.keys[EcmaKEY.FormType]=1,g.keys[EcmaKEY.Type]=new EcmaNAME(EcmaKEY.XObject);var S=f-.2*f,O,E="/Tx BMC\nBT\n/Arial "+f+" Tf\n0 g\n2 "+(h-S>0?(h-S)/2:0)+" Td\n("+r+") Tj\nET\nEMC",A=EcmaLEX.textToBytes(E);g.keys[EcmaKEY.Length]=A.length,g.rawStream=A,g.stream=A,e.push(g),t.push(y)},findStringWidth:function(e,t){for(var o=0,n=0,i=e.length;n<i;n++){var a=e.charCodeAt(n);o+=a<256?EcmaFontWidths.Arial[a]/1e3*t:t}return o},findCodeWidth:function(e,t){return e<256?EcmaFontWidths.Arial[e]/1e3*t:t},flagToBooleans:function(e){for(var t=[!1],o=0;o<32;o++)t[o+1]=(e&1<<o)==1<<o;return t},booleansToFlag:function(e){for(var t=0,o=0;o<32;o++)t=e[32-o]?t<<1|1:t<<=1;return t},hexEncodeName:function(e){for(var t="",o=0;o<e.length;o++){var n=e.charCodeAt(o);n<33||n>126||'"'===e[o]||"#"===e[o]||"/"===e[o]?t+=n.toString(16):t+=e[o]}return t},hexDecodeName:function(e){for(var t="",o=0;o<e.length;o++){var n=e.charCodeAt(o);if("#"===e[o]&&o+2<e.length){var i=parseInt(e[o+1]+e[o+2],16);t+=String.fromCharCode(i),o+=2}else(n>=33||n<=126)&&(t+=e[o])}return t}},EcmaNAMES={},EcmaOBJECTOFFSETS={},EcmaPageOffsets=[],EcmaFieldOffsets=[],EcmaMainCatalog=null,EcmaMainData=[],EcmaXRefType=0;function showEcmaParserError(e){alert(e)}function EcmaOBJOFF(e,t,o){this.data=t,this.offset=e,this.isStream=o}function EcmaDICT(){this.keys={},this.stream=null,this.rawStream=null}function EcmaNAME(e){this.name=e,this.value=null}function EcmaOREF(e,t){this.num=e,this.gen=t,this.ref=e+" "+t+" R"}function EcmaHEX(e){this.str=e}function EcmaBuffer(e){this.data=e,this.pos=0,this.markPos=0,this.length=0,e&&(this.length=e.length)}EcmaBuffer.prototype.getByte=function(){return this.pos>=this.length?-1:this.data[this.pos++]},EcmaBuffer.prototype.mark=function(){this.markPos=this.pos},EcmaBuffer.prototype.reset=function(){this.pos=this.markPos},EcmaBuffer.prototype.movePos=function(e){this.pos=e},EcmaBuffer.prototype.readTo=function(e){for(var t=this.length-this.pos,o=Math.min(e.length,t),n=0;n<o;n++)e[n]=this.getByte()},EcmaBuffer.prototype.readTo=function(e,t,o){if(this.pos<this.length){for(var n=0,i=this.length-this.pos,a=Math.min(o,i),r=0;r<a;r++)e[t+r]=this.getByte(),n++;return n}return-1},EcmaBuffer.prototype.lookNext=function(){return this.pos>=this.length?-1:this.data[this.pos]},EcmaBuffer.prototype.lookNextNext=function(){return this.pos>=this.length?-1:this.data[this.pos+1]},EcmaBuffer.prototype.getNextLine=function(){for(var e="",t=this.getByte();;)if(13===t){if(e.endsWith(" "))break;if(10===(t=this.getByte()))break}else{if(10===t)break;e+=String.fromCharCode(t),t=this.getByte()}return e},EcmaBuffer.prototype.skipLine=function(){for(var e=this.getByte();-1!==e;){if(13===e){if(10===(e=this.lookNext())){this.getByte();break}break}if(10===e)break;e=this.getByte()}},EcmaBuffer.prototype.getNumberValue=function(){var e=this.getByte(),t=1,o=!1;if(43===e?e=this.getByte():45===e&&(t=-1,e=this.getByte()),46===e&&(o=!0,e=this.getByte()),e<48||e>57)return 0;for(var n=""+String.fromCharCode(e);;){var i=this.lookNext();if(46!==i&&!EcmaLEX.isDigit(i))break;e=this.getByte(),n+=""+String.fromCharCode(e)}return o?t*parseFloat("0."+n):-1!==n.indexOf(".")?t*parseFloat(n):t*parseInt(n)},EcmaBuffer.prototype.getNameValue=function(){var e="",t;for(this.getByte();(t=this.lookNext())>=0&&!EcmaLEX.isDelimiter(t)&&!EcmaLEX.isWhiteSpace(t);)e+=String.fromCharCode(this.getByte());return e},EcmaBuffer.prototype.getNormalString=function(){var e=[];this.getByte();for(var t=1,o=this.getByte(),n=!1;;){var i=!1;switch(o){case-1:n=!0;break;case 40:e.push("("),t++;break;case 41:--t?e.push(")"):n=!0;break;case 92:switch(o=this.getByte()){case-1:n=!0;break;case 40:case 41:case 92:e.push(String.fromCharCode(o));break;case 110:e.push("\n");break;case 114:e.push("\r");break;case 116:e.push("\t");break;case 98:e.push("\b");break;case 102:e.push("\f");break;case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:var a=15&o;i=!0,(o=this.getByte())>=48&&o<=55&&(a=(a<<3)+(15&o),(o=this.getByte())>=48&&o<=55&&(i=!1,a=(a<<3)+(15&o))),e.push(String.fromCharCode(a));break;case 13:10===this.lookNext()&&this.getByte();break;case 10:break;default:e.push(String.fromCharCode(o));break}break;default:e.push(String.fromCharCode(o))}if(n)break;i||(o=this.getByte())}return e.join("")},EcmaBuffer.prototype.getHexString=function(){this.getByte();for(var e=this.getByte(),t="<";;){if(e<0||62===e){t+=">";break}EcmaLEX.isWhiteSpace(e)?e=this.getByte():(t+=String.fromCharCode(e),e=this.getByte())}return new EcmaHEX(t)},EcmaBuffer.prototype.getDictionary=function(){var e=new EcmaDICT;this.getByte(),this.getByte();for(var t=[],o=!0;o;){var n;switch(this.lookNext()){case-1:return e;case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:case 43:case 45:case 46:var i=this.getNumberValue(),a=this.lookNext(),r=this.lookNextNext();if(t.length>0){var s,c=(s=t.pop()).name;EcmaLEX.isWhiteSpace(a)&&EcmaLEX.isDigit(r)?(this.getByte(),r=this.getNumberValue(),this.getByte(),this.getByte(),e.keys[c]=new EcmaOREF(i,r)):e.keys[c]=i}break;case 47:var l=this.getNameValue(),d;if(EcmaNAMES[l]?d=EcmaNAMES[l]:(d=new EcmaNAME(l),EcmaNAMES[l]=d),0===t.length)t.push(d);else{var s,c=(s=t.pop()).name;e.keys[c]=d}break;case 40:var u=this.getNormalString();if(0!==t.length){var s,c=(s=t.pop()).name;e.keys[c]=u}break;case 60:if(60===this.lookNextNext()){var h=this.getDictionary();if(0!==t.length){var s,c=(s=t.pop()).name;e.keys[c]=h}}else{var f=this.getHexString();if(0!==t.length){var s,c=(s=t.pop()).name;e.keys[c]=f}}break;case 91:var m=this.getArray();if(0!==t.length){var s,c=(s=t.pop()).name;e.keys[c]=m}break;case 116:if(114===this.data[this.pos+1]&&117===this.data[this.pos+2]&&101===this.data[this.pos+3]){for(var p=0;p<4;p++)this.getByte();if(t.length>0){var s,c=(s=t.pop()).name;e.keys[c]=!0}}else this.getByte();break;case 102:if(97===this.data[this.pos+1]&&108===this.data[this.pos+2]&&115===this.data[this.pos+3]&&101===this.data[this.pos+4]){for(var p=0;p<5;p++)this.getByte();if(t.length>0){var s,c=(s=t.pop()).name;e.keys[c]=!1}}else this.getByte();break;case 110:if(117===this.data[this.pos+1]&&108===this.data[this.pos+2]&&108===this.data[this.pos+3]){for(var p=0;p<4;p++)this.getByte();if(t.length>0){var s,c=(s=t.pop()).name;e.keys[c]=null}}else this.getByte();break;case 62:this.getByte(),62===this.lookNext()&&(this.getByte(),o=!1);break;default:this.getByte();break}}return EcmaLEX.isStreamDict(e)&&!e.stream&&(e.rawStream=this.getRawStream(e)),e},EcmaBuffer.prototype.getArray=function(){this.getByte();for(var e=[];;){var t;switch(this.lookNext()){case-1:return e;case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:case 43:case 45:case 46:var o=this.getNumberValue(),n=this.data[this.pos],i=this.data[this.pos+1];if(EcmaLEX.isWhiteSpace(n)&&EcmaLEX.isDigit(i)){this.mark(),this.getByte(),i=this.getNumberValue(),this.getByte();var a=this.getByte(),r=this.lookNext();82===a&&(EcmaLEX.isWhiteSpace(r)||EcmaLEX.isDelimiter(r))?e.push(new EcmaOREF(o,i)):(e.push(o),this.reset())}else e.push(o);break;case 47:var s=this.getNameValue();EcmaNAMES[s]||(EcmaNAMES[s]=new EcmaNAME(s)),e.push(EcmaNAMES[s]);break;case 40:e.push(this.getNormalString());break;case 60:if(60===this.lookNextNext()){var c=this.getDictionary();e.push(c)}else e.push(this.getHexString());break;case 91:e.push(this.getArray());break;case 93:return this.getByte(),e;case 116:if(114===this.data[this.pos+1]&&117===this.data[this.pos+2]&&101===this.data[this.pos+3]){e.push(!0);for(var l=0;l<4;l++)this.getByte()}else this.getByte();break;case 102:if(97===this.data[this.pos+1]&&108===this.data[this.pos+2]&&115===this.data[this.pos+3]&&101===this.data[this.pos+4]){e.push(!1);for(var l=0;l<5;l++)this.getByte()}else this.getByte();break;case 110:if(117===this.data[this.pos+1]&&108===this.data[this.pos+2]&&108===this.data[this.pos+3]){e.push(null);for(var l=0;l<4;l++)this.getByte()}else this.getByte();default:this.getByte();break}}},EcmaBuffer.prototype.getRawStream=function(e){for(;;){var t;if(115===(t=this.lookNext())&&116===this.data[this.pos+1]&&114===this.data[this.pos+2]&&101===this.data[this.pos+3]&&97===this.data[this.pos+4]&&109===this.data[this.pos+5]){for(var o=0;o<6;o++)this.getByte();break}if(-1===t)return null;this.getByte()}this.skipLine();for(var n=this.getObjectValue(e.keys[EcmaKEY.Length]),i=new Array(n),o=0;o<n;o++)i[o]=255&this.getByte();for(;;){var t;if(-1===(t=this.lookNext()))break;if(101===t&&110===this.data[this.pos+1]&&100===this.data[this.pos+2]&&115===this.data[this.pos+3]&&116===this.data[this.pos+4]&&114===this.data[this.pos+5]&&101===this.data[this.pos+6]&&97===this.data[this.pos+7]&&109===this.data[this.pos+8]){for(var o=0;o<9;o++)this.getByte();break}this.getByte()}return i},EcmaBuffer.prototype.getStream=function(e){if(e.stream)return e.stream;var t=e.rawStream,o=e.keys[EcmaKEY.Filter];if(o)if(o instanceof Array)for(var n=0,i=o.length;n<i;n++)t=EcmaFilter.decode(o[n].name,t);else t=EcmaFilter.decode(o.name,t);var a=e.keys[EcmaKEY.DecodeParms];if(a){var r=1,s=1,c=8,l=1,d=1,u,h;if(a instanceof Array)for(var n=0,i=a.length;n<i;n++){var u,h;(h=(u=this.getObjectValue(a[n])).keys[EcmaKEY.Predictor])&&(r=h),(h=u.keys[EcmaKEY.Colors])&&(s=h),(h=u.keys[EcmaKEY.BitsPerComponent])&&(c=h),(h=u.keys[EcmaKEY.Columns])&&(l=h),(h=u.keys[EcmaKEY.EarlyChange])&&(d=h)}else(h=(u=this.getObjectValue(a)).keys[EcmaKEY.Predictor])&&(r=h),(h=u.keys[EcmaKEY.Colors])&&(s=h),(h=u.keys[EcmaKEY.BitsPerComponent])&&(c=h),(h=u.keys[EcmaKEY.Columns])&&(l=h),(h=u.keys[EcmaKEY.EarlyChange])&&(d=h);if(1!==r){var f=EcmaFilter.applyPredictor(t,r,null,s,c,l,d),m=EcmaFilter.createByteBuffer(f);EcmaFilter.applyPredictor(t,r,m,s,c,l,d)}t=m}return e.stream=t,t},EcmaBuffer.prototype.getObjectValue=function(e){if(EcmaLEX.isName(e))return e.name;if(EcmaLEX.isDict(e))return e;if(EcmaLEX.isRef(e)){var t=this.getIndirectObject(e,this.data,!1);return this.getObjectValue(t)}return e},EcmaBuffer.prototype.getIndirectObject=function(e){for(var t in EcmaOBJECTOFFSETS)if(t===e.ref){var o=EcmaOBJECTOFFSETS[t],n=o.offset,i=new EcmaBuffer(o.data),a;if(o.isStream)return o.data?(i.movePos(n),i.getObj()):null;for(i.movePos(n);;){var r=i.lookNext();if(-1===r)return null;if(111===r&&98===i.data[i.pos+1]&&106===i.data[i.pos+2]){for(var s=0;s<3;s++)i.getByte();break}i.getByte()}return i.getObj()}return null},EcmaBuffer.prototype.getObj=function(){for(;;){var e;switch(this.lookNext()){case-1:return null;case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:case 43:case 45:case 46:var t=this.getNumberValue(),o=this.lookNext(),n=this.lookNextNext(),i=this.data[this.pos+2],a=this.data[this.pos+3];return EcmaLEX.isWhiteSpace(o)&&EcmaLEX.isDigit(n)&&EcmaLEX.isWhiteSpace(i)&&82===a?(this.getByte(),n=this.getNumberValue(),this.getByte(),this.getByte(),new EcmaOREF(t,n)):t;case 47:return this.getNameValue();case 40:return this.getNormalString();case 60:return 60===this.lookNextNext()?this.getDictionary():this.getHexString();case 91:return this.getArray();case 116:if(114===this.data[this.pos+1]&&117===this.data[this.pos+2]&&101===this.data[this.pos+3]){for(var r=0;r<4;r++)this.getByte();return!0}this.getByte();break;case 102:if(97===this.data[this.pos+1]&&108===this.data[this.pos+2]&&115===this.data[this.pos+3]&&101===this.data[this.pos+4]){for(var r=0;r<5;r++)this.getByte();return!1}this.getByte();case 110:if(117===this.data[this.pos+1]&&108===this.data[this.pos+2]&&108===this.data[this.pos+3]){for(var r=0;r<4;r++)this.getByte();return null}this.getByte();default:this.getByte();break}}return null},EcmaBuffer.prototype.readSimpleXREF=function(){var e=this.lookNext();if(EcmaLEX.isDigit(e))return this.readStreamXREF(),void 0;this.skipLine();for(var t=null;;){var o=this.lookNext();if(-1===o)break;if(EcmaLEX.isEOL(o))this.skipLine();else{if(116===o&&114===this.data[this.pos+1]&&97===this.data[this.pos+2]&&105===this.data[this.pos+3]&&108===this.data[this.pos+4]&&101===this.data[this.pos+5]&&114===this.data[this.pos+6]){t=this.getObj();break}var n=this.getObj();this.getByte();var i=this.getObj();this.skipLine();for(var a=0;a<i;a++){var r=this.getObj(),s=this.getObj(),c=this.getNextLine(),l=n+a+" "+s+" R";"n"!==(c=c.trim())||EcmaOBJECTOFFSETS[l]||(EcmaOBJECTOFFSETS[l]=new EcmaOBJOFF(r,this.data,!1))}}}if(t){EcmaMainCatalog||(EcmaMainCatalog=t.keys.Root);var d=t.keys[EcmaKEY.Prev];if(d){var u=this.getObjectValue(d);this.movePos(u),this.readSimpleXREF()}}else showEcmaParserError("Trailer not found")},EcmaBuffer.prototype.readStreamXREF=function(){EcmaXRefType=1,this.getObj(),this.getObj();var e=this.getObj(),t=this.getStream(e),o=e.keys[EcmaKEY.W],n=e.keys[EcmaKEY.Index];n||(n=[0,e.keys[EcmaKEY.Size]]);for(var i=o[0],a=o[1],r=o[2],s=n.length,c=0,l=new EcmaBuffer(t);s>c;)for(var d=n[c++],u=d+n[c++],h=d;h<u;h++){var f=0,m=0,p=0;if(0===i)f=1;else for(var g=0;g<i;g++)f=f<<8|l.getByte();for(var g=0;g<a;g++)m=m<<8|l.getByte();for(var g=0;g<r;g++)p=p<<8|l.getByte();var y=h+" "+p+" R";if(!EcmaOBJECTOFFSETS[y])switch(f){case 0:break;case 1:EcmaOBJECTOFFSETS[y]=new EcmaOBJOFF(m,EcmaMainData,!1);break;case 2:EcmaOBJECTOFFSETS[y]=new EcmaOBJOFF(m,null,!0);break}}EcmaMainCatalog||(EcmaMainCatalog=e.keys.Root);var S=e.keys[EcmaKEY.Prev];if(S){var O=this.getObjectValue(S);this.movePos(O),this.readSimpleXREF()}},EcmaBuffer.prototype.findFirstXREFOffset=function(){for(var e=this.data.length-10;e>0;){var t,o;if(115===this.data[e]&&116===this.data[e+1]&&97===this.data[e+2]&&114===this.data[e+3]&&116===this.data[e+4]&&120===this.data[e+5]&&114===this.data[e+6]&&101===this.data[e+7]&&102===this.data[e+8])return this.movePos(e),this.skipLine(),this.getObj();e--}return-1},EcmaBuffer.prototype.updateAllObjStm=function(){for(var e in EcmaOBJECTOFFSETS){var t=e.split(" "),o=new EcmaOREF(t[0],t[1]),n=this.getIndirectObject(o);if(n instanceof EcmaDICT&&n.keys[EcmaKEY.Type]&&n.keys[EcmaKEY.Type].name===EcmaKEY.ObjStm)for(var i=n.keys[EcmaKEY.N],a=n.keys[EcmaKEY.First],r=new EcmaBuffer(this.getStream(n)),s=0;s<i;s++){var c=r.getNumberValue();r.getByte();var l=r.getNumberValue();r.getByte();var d=c+" 0 R",u=new EcmaOBJOFF(a+l,this.getStream(n),!0);d in EcmaOBJECTOFFSETS?EcmaOBJECTOFFSETS[d].isStream&&!EcmaOBJECTOFFSETS[d].data&&(EcmaOBJECTOFFSETS[d]=u):EcmaOBJECTOFFSETS[d]=u}}},EcmaBuffer.prototype.updatePageOffsets=function(){var e,t=this.getObjectValue(EcmaMainCatalog).keys[EcmaKEY.Pages];t&&(t=this.getObjectValue(t),this.getPagesFromPageTree(t))},EcmaBuffer.prototype.getPagesFromPageTree=function(e){for(var t=e.keys[EcmaKEY.Kids],o=0,n=(t=this.getObjectValue(t)).length;o<n;o++){var i=t[o],a=this.getObjectValue(i),r=a.keys[EcmaKEY.Type];r.name===EcmaKEY.Pages?this.getPagesFromPageTree(a):r.name===EcmaKEY.Page&&EcmaPageOffsets.push(i)}};var EcmaParser={saveFormToPDF:function(e){var t=this._insertFieldsToPDF(e);this._openURL(e,t)},_insertFieldsToPDF:function(e){this._updateFileInfo(e);var t=new EcmaBuffer(EcmaMainData),o=t.findFirstXREFOffset();o&&(t.movePos(o),t.readSimpleXREF()),t.updateAllObjStm(),t.updatePageOffsets();var n=1;for(var i in EcmaOBJECTOFFSETS){var a=i.split(" ");n=Math.max(parseInt(a[0]),n)}n++;var r=[],s=[],c,l=t.getObjectValue(EcmaMainCatalog).keys[EcmaKEY.AcroForm],d=t.getObjectValue(l);delete d.keys[EcmaKEY.XFA],r.push(d),s.push(l);for(var u=document.getElementsByTagName("input"),h=document.getElementsByTagName("textarea"),f=document.getElementsByTagName("select"),m=[],p=[],g=[],y=[],S=[],O=0,E=u.length;O<E;O++){var A,I;if((I=(A=u[O]).getAttribute("data-objref"))&&I.length>0){var v=A.type.toUpperCase();"TEXT"===v||"PASSWORD"===v?m.push(A):"CHECKBOX"===v?p.push(A):"RADIO"===v?g.push(A):"BUTTON"===v&&S.push(A)}}for(var O=0,E=h.length;O<E;O++){var A,I;(I=(A=h[O]).getAttribute("data-objref"))&&I.length>0&&m.push(A)}for(var O=0,E=f.length;O<E;O++){var A,I;(I=(A=f[O]).getAttribute("data-objref"))&&I.length>0&&y.push(A)}for(var O=0,E=m.length;O<E;O++){var D=m[O].value,b=m[O].getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F=t.getObjectValue(T);r.push(F),s.push(T),EcmaFormField.editTextField(t,r,s,F,D,n),n++}for(var O=0,E=S.length;O<E;O++){var b=S[O].getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F,R=(F=t.getObjectValue(T)).keys[EcmaKEY.F],L=S[O].getAttribute("data-field-name"),P=idrform.doc.getField(L);S[O].dataset&&S[O].dataset.defaultDisplay&&P.display!==Number(S[O].dataset.defaultDisplay)&&(r.push(F),s.push(T),EcmaFormField.handleDisplayChange(F,P,R))}for(var O=0,E=p.length;O<E;O++){var N=p[O].checked,b=p[O].getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F=t.getObjectValue(T);r.push(F),s.push(T),EcmaFormField.selectCheckBox(N,F)}for(var O=0,E=y.length;O<E;O++){var C=y[O].value,b=y[O].getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F=t.getObjectValue(T);r.push(F),s.push(T),EcmaFormField.selectChoice(r,s,F,C,n),n++}for(var k={},O=0,E=g.length;O<E;O++){var B=g[O],b=B.getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F,U=(F=t.getObjectValue(T)).keys[EcmaKEY.Parent].ref,w=B.checked,x=B.value;U?U in k?k[U].push({radioRef:b,parentRef:U,checked:w,value:x}):k[U]=[{radioRef:b,parentRef:U,checked:w,value:x}]:k[b]=[{radioRef:b,parentRef:null,checked:w,value:x}]}for(var M in k){var j=k[M],U;if(U=j[0].parentRef){var X=EcmaLEX.getRefFromString(U),K=t.getObjectValue(X);s.push(X),r.push(K);for(var V=!1,Y=null,O=0,E=j.length;O<E;O++)if(j[O].checked){Y=j[O].value,V=!0;break}V?K.keys[EcmaKEY.V]=new EcmaNAME(Y):delete K.keys[EcmaKEY.V];for(var O=0,E=j.length;O<E;O++){var W=EcmaLEX.getRefFromString(j[O].radioRef),_=t.getObjectValue(W);s.push(W),r.push(_),EcmaFormField.selectRadioChild(j[O],_)}}else{var W=EcmaLEX.getRefFromString(j[O].radioRef),_=t.getObjectValue(W);s.push(W),r.push(_),EcmaFormField.selectRadioChild(j[O],_)}}return this._saveFieldObjects(o,n,s,r),EcmaMainData},_saveFieldObjects:function(e,t,o,n){for(var i=EcmaMainData.length,a=[],r=0,s=o.length;r<s;r++){var c=o[r].num,l=n[r];a.push({ref:c,offset:i});var d=[];if(l.keys[EcmaKEY.Length]){var u=EcmaLEX.textToBytes(c+" 0 obj\n"),h=EcmaLEX.textToBytes(EcmaLEX.objectToText(n[r])+"stream\n"),f=n[r].rawStream,m=EcmaLEX.textToBytes("\nendstream\nendobj\n");EcmaLEX.pushBytesToBuffer(u,d),EcmaLEX.pushBytesToBuffer(h,d),EcmaLEX.pushBytesToBuffer(f,d),EcmaLEX.pushBytesToBuffer(m,d),EcmaLEX.pushBytesToBuffer(d,EcmaMainData)}else{var p=c+" 0 obj\n"+EcmaLEX.objectToText(n[r])+"\nendobj\n",d=EcmaLEX.textToBytes(p);EcmaLEX.pushBytesToBuffer(d,EcmaMainData)}i+=d.length}var g=EcmaMainData.length;if(EcmaXRefType){for(var y="[",S=[],r=0,s=a.length;r<s;r++){var O=a[r].ref,E=a[r].offset;S.push(1),EcmaLEX.pushBytesToBuffer(EcmaLEX.toBytes32(E),S),S.push(0),y+=O+" 1 "}y+="]";var A,I=(A=t)+" 0 obj\n<</Type /XRef /Root "+EcmaMainCatalog.ref+" /Prev "+e+" /Index "+y+" /W [1 4 1] /Size "+A+"/Length "+S.length+">>stream\n";EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(I),EcmaMainData),EcmaLEX.pushBytesToBuffer(S,EcmaMainData),I="\nendstream\nendobj\nstartxref\n"+g+"\n%%EOF",EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(I),EcmaMainData)}else{EcmaLEX.pushBytesToBuffer([120,114,101,102,10],EcmaMainData);for(var v="",r=0,s=a.length;r<s;r++){var c=a[r].ref,D=a[r].offset;v+=c+" 1\n"+EcmaLEX.getZeroLead(D)+" 00000 n \n"}var A;v+="trailer\n<</Size "+(A=t)+" /Root "+EcmaMainCatalog.ref+" /Prev "+e+">>\n",v+="startxref\n"+g+"\n%%EOF",EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(v),EcmaMainData)}},saveAnnotationToPDF:function(e,t){this._updateFileInfo(e);var o=new EcmaBuffer(EcmaMainData),n=o.findFirstXREFOffset();n&&(o.movePos(n),o.readSimpleXREF()),o.updateAllObjStm(),o.updatePageOffsets();var i=1;for(var a in EcmaOBJECTOFFSETS){var r=a.split(" ");i=Math.max(parseInt(r[0]),i)}i++,this._saveAnnotObjects(e,n,i,t)},_updateFileInfo:function(e){EcmaNAMES={},EcmaOBJECTOFFSETS={},EcmaPageOffsets=[],EcmaMainCatalog=null,EcmaXRefType=0;var t=document.getElementById("FDFXFA_PDFDump");if(t)EcmaMainData=EcmaFilter.decodeBase64(t.textContent);else{var o=new XMLHttpRequest;o.onreadystatechange=function(){if(EcmaMainData=[],4!==o.readyState||200!==o.status);else for(var e=o.responseText,t=0,n=e.length;t<n;t++)EcmaMainData.push(255&e.charCodeAt(t))},o.open("GET",e,!1),o.overrideMimeType("text/plain; charset=x-user-defined"),o.send()}},_saveAnnotObjects:function(e,t,o,n){for(var i=o,a=EcmaMainData.length,r=[],s={},c={},l=new EcmaBuffer(EcmaMainData),d=0,u=n.length;d<u;d++){var h=n[d].page,f=""+h,m=EcmaPageOffsets[h],p;f in c?p=c[f]:(p=l.getObjectValue(m),c[f]=p);var g=p.keys[EcmaKEY.Annots];s[f]=m.num,r.push({ref:i,offset:a});var y=i+" 0 obj\n"+n[d].getDictionaryString()+"\nendobj\n",S=EcmaLEX.textToBytes(y);if(EcmaLEX.pushBytesToBuffer(S,EcmaMainData),g)if(EcmaLEX.isRef(g)){var O=l.getObjectValue(g);if(EcmaLEX.isArray(O)){p.keys[EcmaKEY.Annots]=[];for(var E=0,A=O.length;E<A;E++)p.keys[EcmaKEY.Annots].push(O[E]);p.keys[EcmaKEY.Annots].push(new EcmaOREF(i,0))}else p.keys[EcmaKEY.Annots]=[g],p.keys[EcmaKEY.Annots].push(new EcmaOREF(i,0))}else EcmaLEX.isArray(g)?g.push(new EcmaOREF(i,0)):p.keys[EcmaKEY.Annots]=[new EcmaOREF(i,0)];else p.keys[EcmaKEY.Annots]=[new EcmaOREF(i,0)];a+=S.length,i++}var I=EcmaMainData.length;for(var v in s){var D=s[v];s[v]={ref:D,offset:I};var p=c[v],b=D+" 0 obj\n"+EcmaLEX.objectToText(p)+"\nendobj\n",S=EcmaLEX.textToBytes(b);EcmaLEX.pushBytesToBuffer(S,EcmaMainData),I=EcmaMainData.length}var T=EcmaMainData.length;EcmaXRefType?this._generateStreamXREF(t,T,o,r,s):this._generateSimpleXREF(t,T,o,r,s),this._openURL(e)},_generateSimpleXREF:function(e,t,o,n,i){EcmaLEX.pushBytesToBuffer([120,114,101,102,10],EcmaMainData);var a="";for(var r in i){var s=i[r].ref,c=i[r].offset;a+=s+" 1\n"+EcmaLEX.getZeroLead(c)+" 00000 n \n"}var l=n.length,d;if(l){a+=o+" "+l+"\n";for(var u=0,h=l;u<h;u++)a+=EcmaLEX.getZeroLead(n[u].offset)+" 00000 n \n"}a+="trailer\n<</Size "+(o+l)+" /Root "+EcmaMainCatalog.ref+" /Prev "+e+">>\n",a+="startxref\n"+t+"\n%%EOF",EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(a),EcmaMainData)},_generateStreamXREF:function(e,t,o,n,i){var a=n.length,r="[",s=[];for(var c in i){var l=i[c].ref,d=i[c].offset;s.push(1),EcmaLEX.pushBytesToBuffer(EcmaLEX.toBytes32(d),s),s.push(0),r+=l+" 1 "}r+=o+" "+a+"]";for(var u=0;u<a;u++){var d=n[u].offset;s.push(1),EcmaLEX.pushBytesToBuffer(EcmaLEX.toBytes32(d),s),s.push(0)}var h=o+a+1,f=h+" 0 obj\n<</Type /XRef /Root "+EcmaMainCatalog.ref+" /Prev "+e+" /Index "+r+" /W [1 4 1] /Size "+h+"/Length "+s.length+">>stream\n";EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(f),EcmaMainData),EcmaLEX.pushBytesToBuffer(s,EcmaMainData),f="\nendstream\nendobj\nstartxref\n"+t+"\n%%EOF",EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(f),EcmaMainData)},_openURL:function(e,t){var o,n="data:application/octet-stream;base64,"+EcmaFilter.encodeBase64(t),i=e,a=""+navigator.userAgent;if(-1!==a.indexOf("Edge")||-1!==a.indexOf("MSIE ")){for(var r=new ArrayBuffer(t.length),s=new Uint8Array(r),c=0,l=t.length;c<l;c++)s[c]=255&t[c];var d=new Blob([r],{type:"application/octet-stream"});return window.navigator.msSaveBlob(d,i),void 0}var u=document.createElement("a");if(u.setAttribute("download",i),u.setAttribute("href",n),document.body.appendChild(u),"click"in u)u.click();else{var h=document.createEvent("MouseEvent");h.initEvent("click",!0,!0),u.dispatchEvent(h)}u.setAttribute("href","")}},FONTNAMES={ARIAL:"Arial",HELVETICA:"Helvetica",COURIER:"Courier"},EcmaPDF={hashKey:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",getDictionaryString:function(e,t){for(var o=t,n=e.length;o<n&&60!==e[o];)o++;var i=[1],a="<<";for(o+=2;0!==i.length&&o<n;){var r=e[o],s=e[o+1];60===r&&s&&60===s?(i.push(1),o+=2,a+="<<"):62===r&&s&&62===s?(i.pop(),o+=2,a+=">>"):(a+=String.fromCharCode(r),o++)}return a},byteToString:function(e){return String.fromCharCode(e)},bytesToString:function(e){for(var t="",o=0;o<e.length;o++)t+=String.fromCharCode(parseInt(e[o]));return t},writeBytes:function(e,t){for(var o=0;o<e.length;o++){var n=e.charCodeAt(o);n<128?t.push(n):n<2048?t.push(192|n>>6,128|63&n):n<55296||n>=57344?t.push(224|n>>12,128|n>>6&63,128|63&n):(o++,n=65536+((1023&n)<<10|1023&e.charCodeAt(o)),t.push(240|n>>18,128|n>>12&63,128|n>>6&63,128|63&n))}},encode64:function(e){var t="",o,n,i,a,r,s,c,l=0;for(e=this.encodeUTF8(e);l<e.length;)a=(o=e.charCodeAt(l++))>>2,r=(3&o)<<4|(n=e.charCodeAt(l++))>>4,s=(15&n)<<2|(i=e.charCodeAt(l++))>>6,c=63&i,isNaN(n)?s=c=64:isNaN(i)&&(c=64),t+=this.hashKey.charAt(a)+this.hashKey.charAt(r)+this.hashKey.charAt(s)+this.hashKey.charAt(c);return t},decode64:function(e){for(var t="",o,n,i,a,r,s,c,l=0,d=(e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"")).length;l<d;)o=(a=this.hashKey.indexOf(e.charAt(l++)))<<2|(r=this.hashKey.indexOf(e.charAt(l++)))>>4,n=(15&r)<<4|(s=this.hashKey.indexOf(e.charAt(l++)))>>2,i=(3&s)<<6|(c=this.hashKey.indexOf(e.charAt(l++))),t+=String.fromCharCode(o),64!==s&&(t+=String.fromCharCode(n)),64!==c&&(t+=String.fromCharCode(i));return t=this.decodeUTF8(t)},encodeUTF8:function(e){for(var t="",o=0,n=(e=e.replace(/\r\n/g,"\n")).length;o<n;o++){var i=e.charCodeAt(o);i<128?t+=String.fromCharCode(i):i>127&&i<2048?(t+=String.fromCharCode(i>>6|192),t+=String.fromCharCode(63&i|128)):(t+=String.fromCharCode(i>>12|224),t+=String.fromCharCode(i>>6&63|128),t+=String.fromCharCode(63&i|128))}return t},decodeUTF8:function(e){for(var t="",o=0,n=0,i,a,r=e.length;o<r;)(n=e.charCodeAt(o))<128?(t+=String.fromCharCode(n),o++):n>191&&n<224?(i=e.charCodeAt(o+1),t+=String.fromCharCode((31&n)<<6|63&i),o+=2):(i=e.charCodeAt(o+1),a=e.charCodeAt(o+2),t+=String.fromCharCode((15&n)<<12|(63&i)<<6|63&a),o+=3);return t}};function PdfDocument(){for(var e in this._pages=new Array,this._xfaStreams=new Array,this._fontResources=new Array,FONTNAMES){var t="<</Type /Font /Subtype /Type1 /BaseFont /"+FONTNAMES[e]+">>",o=new PdfResource(FONTNAMES[e],t);this._fontResources.push(o)}}function PdfPage(){this._width=612,this._height=792,this._rotation=0,this._texts=new Array,this._images=new Array}function PdfText(e,t,o,n,i){this._x=e,this._y=t,this._fontName;var a=o.toUpperCase();this._fontName=a in FONTNAMES?FONTNAMES[a]:FONTNAMES.ARIAL,this._fontSize=n,this._fontText=i}function PdfImage(e,t,o){this._x=e,this._y=t,this._imageData=o}function PdfResource(e,t){this._name=e,this._stream=t}function XFAStream(e,t){this._name=e,this._data=t}function getObjStart(e){return e+" 0 obj"}function getObjRef(e){return e+" 0 R"}function getCatalogString(e){return getObjStart(e)+" <</Type /Catalog /Pages "+getObjRef(e+1)+">>\nendobj\n"}function getStructTreeString(e){return getObjStart(e)+" <</Type /StructTreeRoot>>\nendobj\n"}function getXFACatalogString(e,t,o){return getObjStart(e)+" <</NeedsRendering true/AcroForm "+getObjRef(t)+"/Extensions<</ADBE<</BaseVersion/1.7/ExtensionLevel 5>>>>/MarkInfo<</Marked true>>/Type /Catalog /Pages "+getObjRef(e+1)+">>\nendobj\n"}function getPageTreeString(e,t){for(var o=getObjStart(e)+" <</Type /Pages /Kids [ ",n=e+1,i=0;i<t;i++)o+=getObjRef(i+n)+" ";return o+="] /Count "+t+">>\nendobj\n"}function getPageString(e,t,o,n,i){return getObjStart(e)+" <</Type /Page /Parent "+getObjRef(t)+" /Resources "+getObjRef(o)+" /Contents "+getObjRef(n)+" /MediaBox [0 0 "+i._width+" "+i._height+"] /Rotate "+i._rotation+">>\nendobj\n"}function getContentString(e,t){for(var o="",n=t._texts.length,i=0;i<n;i++){var a=t._texts[i];o+="BT /"+a._fontName+" "+a._fontSize+" Tf "+a._x+" "+a._y+" Td ("+a._fontText+")Tj ET\n"}var r=new Array;return EcmaPDF.writeBytes(o,r),getObjStart(e)+" <</Length "+r.length+">>\nstream\n"+o+"\nendstream\nendobj\n"}function getResourceString(e,t,o){for(var n=getObjStart(e)+" <</Font <<",i=0;i<t;i++){var a;n+="/"+o._fontResources[i]._name+" "+getObjRef(e+1+i)+" "}return n+=">> >>\nendObj\n"}function getFontDefString(e,t){return getObjStart(e)+t._stream+"\nendobj\n"}function getZeroLead(e){for(var t=""+e,o=10-t.length,n=0;n<o;n++)t="0"+t;return t}function getXrefString(e){for(var t=e.length,o="xref\n0 "+(t+1)+"\n0000000000 65535 f \n",n=0;n<t;n++)o+=getZeroLead(e[n])+" 00000 n \n";return o}function getXFADefinitionString(e,t){return getObjStart(e)+"\n<</XFA "+getObjRef(t)+"/Fields[]>>\nendobj\n"}function getXFATemplateString(e,t,o){return getObjStart(e)+"\n<</Length "+t+">>stream\n"+o+"\nendstream\nendobj\n"}PdfDocument.prototype.addPage=function(e){this._pages.push(e)},PdfDocument.prototype.addXFAStream=function(e){this._xfaStreams.push(e)},PdfPage.prototype.setWidth=function(e){this._width=e},PdfPage.prototype.setHeight=function(e){this._height=e},PdfPage.prototype.addText=function(e){e._y=this._height-e._y-e._fontSize,this._texts.push(e)},PdfPage.prototype.setRotation=function(e){this._rotation=e},PdfPage.prototype.addImage=function(e){this._images.push(e)},PdfDocument.prototype.createPdfString=function(e){var t=new Array,o=new Array,n=this._pages.length,i=1,a=2,r=3,s=3+n,c=s+n,l=c+1,d=this._fontResources.length,u=l+d,h=u;EcmaPDF.writeBytes("%PDF-1.7\n",o);var f=null;f=e?getXFACatalogString(1,h,u):getCatalogString(1),t.push(o.length),EcmaPDF.writeBytes(f,o),f=getPageTreeString(2,n),t.push(o.length),EcmaPDF.writeBytes(f,o);for(var m=0;m<n;m++){var p,g,y;f=getPageString(3+m,2,c,y=s+m,p=this._pages[m]),t.push(o.length),EcmaPDF.writeBytes(f,o)}for(var m=0;m<n;m++){var p,y;f=getContentString(y=s+m,p=this._pages[m]),t.push(o.length),EcmaPDF.writeBytes(f,o)}f=getResourceString(c,d,this),t.push(o.length),EcmaPDF.writeBytes(f,o);for(var m=0;m<d;m++)f=getFontDefString(l+m,this._fontResources[m]),t.push(o.length),EcmaPDF.writeBytes(f,o);if(e){var S=h+1;f=getXFADefinitionString(h,S),t.push(o.length),EcmaPDF.writeBytes(f,o);var O=new Array;EcmaPDF.writeBytes(e,O),f=getXFATemplateString(S,O.length,e),t.push(o.length),EcmaPDF.writeBytes(f,o)}var E=o.length;return f=getXrefString(t),EcmaPDF.writeBytes(f,o),f="trailer <</Size "+(t.length+1)+" /Root 1 0 R>>\nstartxref\n"+E+"\n%%EOF",EcmaPDF.writeBytes(f,o),EcmaPDF.bytesToString(o)}}var app=idrform.app;



</script>
<style type="text/css">
.btn{border:0 none; height:30px; padding:0; width:30px; background-color:transparent; display:inline-block; margin:7px 5px 0; vertical-align:top; cursor:pointer; color:#fff;}
.btn:hover{background-color:#0e1319; color:#eddbd9; border-radius:5px;}
.page{box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);}
#formviewer{bottom:0; left:0; right:0; position:absolute; top:40px; background:#191f2f none repeat scroll 0 0;}
body{padding:0px; margin:0px; background-color:#191f2f;}
#FDFXFA_Menu{text-align:center;  z-index:9999; color:white;background-color:#707784; position:fixed; font-size:32px; margin:0px; opacity:0.8; top:0px; min-width:300px; min-height: 40px;     margin-left: 700px;}
#FDFXFA_Menu a{cursor:pointer; border-radius:5px; padding:5px; font-family: IDRSymbols; margin:5px 10px 5px 10px;}
#FDFXFA_PageLabel{padding-left:5px;font-size:20px}
#FDFXFA_PageCount{padding-right:5px;font-size:20px}
#FDFXFA_Menu a:hover{background-color:#0e1319; color:#eddbd9;}
#FDFXFA_PageLabel{min-width:20px;display:inline-block;}
#FDFXFA_Processing{width:100%; height:100%; z-index:10000; position:fixed; background-color:black; opacity:0.8; color:white; top:0px;text-align: center; font-size:300px; font-family:IDRSymbols;}
#FDFXFA_Processing span{top:50%;left:50%;margin:-50px 0 0 -50px}
#FDFXFA_FormType,#FDFXFA_Form,#FDFXFA_PDFName,#FDFXFA_FormSubmitURL{display:none;}
@font-face {font-family:'IDRSymbols'; src: url(data:application/x-font-woff;charset=utf-8;base64,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) format('woff'); font-weight:normal; font-style:normal;}
@media print {
#FDFXFA_Menu,#FDFXFA_Menu a,#FDFXFA_Menu label,#FDFXFA_Menu button{display:none}
#formviewer{overflow: visible}
div.page{box-shadow: none;}
}
</style>
</head>
<body style="margin: 0;" onload='idrform.init()'>
<script type="text/javascript" src="js/formvuacroform.js"></script>
<script type="text/javascript" src="js/EmbeddedScript.js"></script>
<div id='FDFXFA_Processing'>&#xF010;</div>
<div id='FDFXFA_FormType'>AcroForm</div>
<div id='FDFXFA_PDFName'>f944.pdf</div>
<div id='FDFXFA_Menu'><a title='Submit Form' onclick="FormViewer.handleFormSubmission('', 'formdata')">&#xF018;</a><a title='Go To FirstPage' onclick="idrform.app.execMenuItem('FirstPage')">&#xF01C;</a><a title='Go To PrevPage' onclick="idrform.app.execMenuItem('PrevPage')">&#xF01D;</a><label id='FDFXFA_PageLabel'><span id="btnPage">1</span></label><label id='FDFXFA_PageCount'>/ <span>6</span></label><a title='Go To NextPage' onclick="idrform.app.execMenuItem('NextPage')">&#xF01E;</a><a title='Go To LastPage' onclick="idrform.app.execMenuItem('LastPage')">&#xF01F;</a><a title='Save As Editable PDF' onclick="idrform.app.execMenuItem('SaveAs')">&#xF01A;</a><button id="btnZoomOut" title="Zoom Out" class="btn"><i class="fa fa-minus fa-lg" aria-hidden="true"></i></button><button id="btnZoomIn" title="Zoom In" class="btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></button></div>
<div id="formviewer">
<div></div>
<div id="overlay"></div>
<form>
<div id="contentContainer">
 
<div id="page1" style="width: 934px; height: 1209px; margin-top:20px;    margin-left: 495px;" class="page">
<div class="page-inner" style="width: 934px; height: 1209px;">


<div id="p1" class="pageArea" style="overflow: hidden; position: relative; width: 935px; height: 1210px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">



 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 935 1210" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_1{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
.g1_1{
fill: none;
stroke: #000;
stroke-width: 0.762;
stroke-miterlimit: 10;
}
.g2_1{
fill: #000;
}
.g3_1{
fill: none;
stroke: #000;
stroke-width: 1.145;
stroke-miterlimit: 10;
}
.g4_1{
fill: #FFF;
}
.g5_1{
fill: none;
stroke: #000;
stroke-width: 0.757;
stroke-miterlimit: 10;
}
.g6_1{
fill: #D9D9D9;
}
.g7_1{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M682,100.8H847M682,256.7H847M869,122.8V234.7M660,122.8V234.7" class="g0_1"/>
<path d="M660,234.7V257m-.4,-.3H682m165,0h22.4m-.4,.3V234.7m0,-111.9V100.5m.4,.3H847m-165,0H659.6m.4,-.3v22.3" class="g1_1"/>
<path d="M660,128.3H869V110H660v18.3Z" class="g2_1"/>
<path d="M77,100.8H627M77,357.5H627M649,122.8V335.5M55,122.8V335.5" class="g0_1"/>
<path d="M55,335.5v22.4m-.4,-.4H77m550,0h22.4m-.4,.4V335.5m0,-212.7V100.5m.4,.3H627m-550,0H54.6m.4,-.3v22.3" class="g1_1"/>
<path d="M300.2,110H285.9m14.3,27.5H285.9m22,-5.5V115.5M278.2,132V115.5" class="g0_1"/>
<path d="M278.2,115.5v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V115.5m0,16.5V109.6m.4,.4H285.9m14.3,0H277.8m.4,-.4V132" class="g1_1"/>
<path d="M338.1,110H323.8m14.3,27.5H323.8m22,-5.5V115.5M316.1,132V115.5" class="g0_1"/>
<path d="M316.1,115.5v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V115.5m0,16.5V109.6m.3,.4H323.8m14.3,0H315.7m.4,-.4V132" class="g1_1"/>
<path d="M395.7,110H381.4m14.3,27.5H381.4m22,-5.5V115.5M373.7,132V115.5" class="g0_1"/>
<path d="M373.7,115.5v22.4m-.3,-.4h22.3m-14.3,0h22.4m-.4,.4V115.5m0,16.5V109.6m.4,.4H381.4m14.3,0H373.4m.3,-.4V132" class="g1_1"/>
<path d="M434.5,110H420.2m14.3,27.5H420.2m22,-5.5V115.5M412.5,132V115.5" class="g0_1"/>
<path d="M412.5,115.5v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V115.5m0,16.5V109.6m.4,.4H420.2m14.3,0H412.1m.4,-.4V132" class="g1_1"/>
<path d="M473.3,110H459m14.3,27.5H459M481,132V115.5M451.3,132V115.5" class="g0_1"/>
<path d="M451.3,115.5v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V115.5m0,16.5V109.6m.3,.4H459m14.3,0H450.9m.4,-.4V132" class="g1_1"/>
<path d="M512,110H497.7M512,137.5H497.7m22,-5.5V115.5M490,132V115.5" class="g0_1"/>
<path d="M490,115.5v22.4m-.4,-.4H512m-14.3,0h22.4m-.4,.4V115.5m0,16.5V109.6m.4,.4H497.7m14.3,0H489.6m.4,-.4V132" class="g1_1"/>
<path d="M550.8,110H536.5m14.3,27.5H536.5m22,-5.5V115.5M528.8,132V115.5" class="g0_1"/>
<path d="M528.8,115.5v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V115.5m0,16.5V109.6m.4,.4H536.5m14.3,0H528.4m.4,-.4V132" class="g1_1"/>
<path d="M589.5,110H575.2m14.3,27.5H575.2m22,-5.5V115.5M567.5,132V115.5" class="g0_1"/>
<path d="M567.5,115.5v22.4m-.3,-.4h22.3m-14.3,0h22.4m-.4,.4V115.5m0,16.5V109.6m.4,.4H575.2m14.3,0H567.2m.3,-.4V132" class="g1_1"/>
<path d="M628.3,110H614m14.3,27.5H614M636,132V115.5M606.3,132V115.5" class="g0_1"/>
<path d="M606.3,115.5v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V115.5m0,16.5V109.6m.4,.4H614m14.3,0H605.9m.4,-.4V132" class="g1_1"/>
<path d="M210.5,174.2H638V146.7H210.5v27.5Zm-44,36.6H638V183.3H166.5v27.5Zm-44,36.7H638V220H122.5v27.5Zm0,45.8H451V265.8H122.5v27.5Zm339.5,0h55V265.8H462v27.5Zm66,0H638V265.8H528v27.5ZM122.5,339.2H396V311.7H122.5v27.5Zm286,0H517V311.7H408.5v27.5Zm119.5,0H638V311.7H528v27.5Z" class="g0_1"/>
<path d="M55,440h55V385H55v55Z" class="g2_1"/>
<path d="M54.6,385H880.4" class="g3_1"/>
<path d="M54.6,440H880.4m-198.8,9.2H836.4M681.6,476.7H836.4M682,448.8v28.3M835.6,449.2h44.8m-44.8,27.5h44.8M880,448.8v28.3m-198.4,8.7H836.4M681.6,513.3H836.4M682,485.4v28.3M835.6,485.8h44.8m-44.8,27.5h44.8M880,485.4v28.3" class="g0_1"/>
<path d="M682,539.3h15.3V524H682v15.3Z" class="g4_1"/>
<path d="M682,539.3h15.3V524H682v15.3ZM318.6,586.7H429.4M318.6,614.2H429.4M319,586.3v28.3M428.6,586.7h44.8m-44.8,27.5h44.8M473,586.3v28.3m65.6,-27.9H649.4M538.6,614.2H649.4M539,586.3v28.3M648.6,586.7h44.8m-44.8,27.5h44.8M693,586.3v28.3m-374.4,8.7H429.4M318.6,650.8H429.4M319,622.9v28.3M428.6,623.3h44.8m-44.8,27.5h44.8M473,622.9v28.3m65.6,-27.9H649.4M538.6,650.8H649.4M539,622.9v28.3M648.6,623.3h44.8m-44.8,27.5h44.8M693,622.9v28.3M318.6,660H429.4M318.6,687.5H429.4M319,659.6v28.3M428.6,660h44.8m-44.8,27.5h44.8M473,659.6v28.3M538.6,660H649.4M538.6,687.5H649.4M539,659.6v28.3M648.6,660h44.8m-44.8,27.5h44.8M693,659.6v28.3M726,586.7H858M726,724.2H858M880,608.7v93.5M704,608.7v93.5" class="g0_1"/>
<path d="M704,702.2v22.3m-.4,-.3H726m132,0h22.4m-.4,.3V702.2m0,-93.5V586.3m.4,.4H858m-132,0H703.6m.4,-.4v22.4" class="g5_1"/>
<path d="M318.6,696.7H429.4M318.6,724.2H429.4M319,696.3v28.3M428.6,696.7h44.8m-44.8,27.5h44.8M473,696.3v28.3m65.6,-27.9H649.4M538.6,724.2H649.4M539,696.3v28.3M648.6,696.7h44.8m-44.8,27.5h44.8M693,696.3v28.3m-374.4,8.7H429.4M318.6,760.8H429.4M319,732.9v28.3M428.6,733.3h44.8m-44.8,27.5h44.8M473,732.9v28.3m65.6,-27.9H649.4M538.6,760.8H649.4M539,732.9v28.3M648.6,733.3h44.8m-44.8,27.5h44.8M693,732.9v28.3M318.6,788.3H429.4M318.6,815.8H429.4M319,787.9v28.3M428.6,788.3h44.8m-44.8,27.5h44.8M473,787.9v28.3m65.6,-27.9H649.4M538.6,815.8H649.4M539,787.9v28.3M648.6,788.3h44.8m-44.8,27.5h44.8M693,787.9v28.3M681.6,825H836.4M681.6,852.5H836.4M682,824.6v28.3M835.6,825h44.8m-44.8,27.5h44.8M880,824.6v28.3m-198.4,8.8H836.4M681.6,889.2H836.4M682,861.3v28.3M835.6,861.7h44.8m-44.8,27.5h44.8M880,861.3v28.3m-198.4,8.7H836.4M681.6,925.8H836.4M682,897.9v28.3M835.6,898.3h44.8m-44.8,27.5h44.8M880,897.9v28.3M681.6,935H836.4M681.6,962.5H836.4M682,934.6v28.3M835.6,935h44.8m-44.8,27.5h44.8M880,934.6v28.3m-198.4,8.8H836.4M681.6,999.2H836.4M682,971.3v28.3M835.6,971.7h44.8m-44.8,27.5h44.8M880,971.3v28.3m-198.4,17.9H836.4M681.6,1045H836.4M682,1017.1v28.3m153.6,-27.9h44.8M835.6,1045h44.8m-.4,-27.9v28.3" class="g0_1"/>
<path d="M682,1081.7H836v-27.5H682v27.5Z" class="g6_1"/>
<path d="M681.6,1054.2H836.4m-154.8,27.5H836.4M682,1053.8v28.3" class="g0_1"/>
<path d="M836,1081.7h44v-27.5H836v27.5Z" class="g6_1"/>
<path d="M835.6,1054.2h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3M681.6,1100H836.4m-154.8,27.5H836.4M682,1099.6v28.3M835.6,1100h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3" class="g0_1"/>
<path d="M54.6,1155H594.4m-.8,0H792.4m-.8,0h88.8" class="g7_1"/>
</svg>





<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css" >
.t {
	transform-origin: bottom left;
	z-index: 2;
	position: absolute;
	white-space: pre;
	overflow: visible;
	line-height: 1.5;
}
.text-container {
	white-space: pre;
}
@supports (-webkit-touch-callout: none) {
	.text-container {
		white-space: normal;
	}
}
 
 
    /* FormViewer - v1.0.0 */

/* Layout Styles */
.page {
    display:block;
    overflow: hidden;
    background-color: white;
}

.page-inner {
    -webkit-transform-origin: top left;
    -ms-transform-origin: top left;
    transform-origin: top left;
}

#formviewer {
    overflow: auto;
    margin: 0;
    padding: 0;
    -webkit-overflow-scrolling: touch;
}

#overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 10;
    visibility: hidden;
}

#overlay.panning {
    visibility: visible;
    cursor: all-scroll;
    cursor: -moz-grab;
    cursor: -webkit-grab;
    cursor: grab;
}

#overlay.panning.mousedown {
    cursor: all-scroll;
    cursor: -moz-grabbing;
    cursor: -webkit-grabbing;
    cursor: grabbing;
}

/* Continuous Layout */
.layout-continuous .page {
    margin: 0 auto 10px;
}
.layout-continuous .page:last-child {
    margin: 0 auto 0;
}

 

</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_1{left:55px;bottom:1131px;letter-spacing:-0.18px;}
#t2_1{left:84px;bottom:1123px;letter-spacing:-0.21px;}
#t3_1{left:253px;bottom:1128px;letter-spacing:0.19px;}
#t4_1{left:253px;bottom:1115px;letter-spacing:-0.14px;}
#t5_1{left:770px;bottom:1112px;letter-spacing:-0.17px;}
#t6_1{left:687px;bottom:1079px;letter-spacing:-0.13px;}
#t7_1{left:669px;bottom:1058px;letter-spacing:0.1px;}
#t8_1{left:669px;bottom:1042px;letter-spacing:0.09px;}
#t9_1{left:669px;bottom:1027px;letter-spacing:0.1px;}
#ta_1{left:800px;bottom:1027px;letter-spacing:0.09px;}
#tb_1{left:669px;bottom:1012px;letter-spacing:0.1px;}
#tc_1{left:709px;bottom:1012px;}
#td_1{left:669px;bottom:990px;letter-spacing:0.09px;}
#te_1{left:703px;bottom:990px;letter-spacing:0.11px;}
#tf_1{left:827px;bottom:990px;letter-spacing:0.07px;}
#tg_1{left:669px;bottom:975px;letter-spacing:0.09px;}
#th_1{left:669px;bottom:960px;letter-spacing:0.1px;}
#ti_1{left:61px;bottom:1074px;letter-spacing:-0.16px;}
#tj_1{left:223px;bottom:1074px;letter-spacing:-0.14px;}
#tk_1{left:355px;bottom:1079px;}
#tl_1{left:61px;bottom:1037px;letter-spacing:-0.17px;}
#tm_1{left:94px;bottom:1037px;letter-spacing:-0.14px;}
#tn_1{left:61px;bottom:1000px;letter-spacing:-0.16px;}
#to_1{left:125px;bottom:1000px;letter-spacing:-0.11px;}
#tp_1{left:61px;bottom:962px;letter-spacing:-0.17px;}
#tq_1{left:124px;bottom:949px;letter-spacing:0.09px;}
#tr_1{left:346px;bottom:949px;letter-spacing:0.06px;}
#ts_1{left:543px;bottom:949px;letter-spacing:0.08px;}
#tt_1{left:124px;bottom:903px;letter-spacing:0.07px;}
#tu_1{left:479px;bottom:903px;letter-spacing:0.08px;}
#tv_1{left:564px;bottom:903px;letter-spacing:0.08px;}
#tw_1{left:124px;bottom:857px;letter-spacing:0.08px;}
#tx_1{left:413px;bottom:857px;letter-spacing:0.08px;}
#ty_1{left:542px;bottom:857px;letter-spacing:0.08px;}
#tz_1{left:55px;bottom:830px;letter-spacing:-0.11px;}
#t10_1{left:61px;bottom:787px;letter-spacing:-0.1px;}
#t11_1{left:116px;bottom:803px;letter-spacing:-0.13px;}
#t12_1{left:116px;bottom:787px;letter-spacing:-0.12px;}
#t13_1{left:116px;bottom:770px;letter-spacing:-0.12px;}
#t14_1{left:70px;bottom:731px;}
#t15_1{left:99px;bottom:731px;letter-spacing:-0.01px;}
#t16_1{left:348px;bottom:731px;}
#t17_1{left:367px;bottom:731px;}
#t18_1{left:385px;bottom:731px;}
#t19_1{left:403px;bottom:731px;}
#t1a_1{left:422px;bottom:731px;}
#t1b_1{left:440px;bottom:731px;}
#t1c_1{left:458px;bottom:731px;}
#t1d_1{left:477px;bottom:731px;}
#t1e_1{left:495px;bottom:731px;}
#t1f_1{left:513px;bottom:731px;}
#t1g_1{left:532px;bottom:731px;}
#t1h_1{left:550px;bottom:731px;}
#t1i_1{left:568px;bottom:731px;}
#t1j_1{left:587px;bottom:731px;}
#t1k_1{left:605px;bottom:731px;}
#t1l_1{left:623px;bottom:731px;}
#t1m_1{left:642px;bottom:731px;}
#t1n_1{left:667px;bottom:731px;}
#t1o_1{left:838px;bottom:727px;}
#t1p_1{left:70px;bottom:695px;}
#t1q_1{left:99px;bottom:695px;letter-spacing:-0.01px;}
#t1r_1{left:550px;bottom:695px;}
#t1s_1{left:568px;bottom:695px;}
#t1t_1{left:587px;bottom:695px;}
#t1u_1{left:605px;bottom:695px;}
#t1v_1{left:623px;bottom:695px;}
#t1w_1{left:642px;bottom:695px;}
#t1x_1{left:667px;bottom:695px;}
#t1y_1{left:838px;bottom:691px;}
#t1z_1{left:70px;bottom:667px;}
#t20_1{left:99px;bottom:667px;letter-spacing:-0.01px;}
#t21_1{left:667px;bottom:667px;}
#t22_1{left:704px;bottom:667px;letter-spacing:-0.01px;}
#t23_1{left:70px;bottom:640px;}
#t24_1{left:99px;bottom:640px;letter-spacing:-0.01px;}
#t25_1{left:367px;bottom:621px;letter-spacing:-0.01px;}
#t26_1{left:587px;bottom:621px;letter-spacing:-0.01px;}
#t27_1{left:99px;bottom:594px;letter-spacing:-0.01px;}
#t28_1{left:121px;bottom:594px;letter-spacing:-0.01px;}
#t29_1{left:431px;bottom:590px;}
#t2a_1{left:478px;bottom:595px;}
#t2b_1{left:490px;bottom:594px;letter-spacing:-0.01px;}
#t2c_1{left:651px;bottom:590px;}
#t2d_1{left:99px;bottom:557px;letter-spacing:-0.01px;}
#t2e_1{left:121px;bottom:557px;}
#t2f_1{left:143px;bottom:557px;letter-spacing:-0.01px;}
#t2g_1{left:431px;bottom:553px;}
#t2h_1{left:478px;bottom:558px;}
#t2i_1{left:490px;bottom:557px;letter-spacing:-0.01px;}
#t2j_1{left:651px;bottom:553px;}
#t2k_1{left:99px;bottom:520px;letter-spacing:-0.01px;word-spacing:3.71px;}
#t2l_1{left:143px;bottom:520px;letter-spacing:-0.01px;}
#t2m_1{left:431px;bottom:516px;}
#t2n_1{left:478px;bottom:521px;}
#t2o_1{left:490px;bottom:520px;letter-spacing:-0.01px;}
#t2p_1{left:651px;bottom:516px;}
#t2q_1{left:715px;bottom:602px;letter-spacing:-0.12px;word-spacing:-0.41px;}
#t2r_1{left:715px;bottom:589px;letter-spacing:-0.13px;}
#t2s_1{left:715px;bottom:577px;letter-spacing:-0.13px;}
#t2t_1{left:715px;bottom:564px;letter-spacing:-0.14px;}
#t2u_1{left:715px;bottom:552px;letter-spacing:-0.12px;}
#t2v_1{left:715px;bottom:539px;letter-spacing:-0.11px;}
#t2w_1{left:761px;bottom:539px;letter-spacing:-0.15px;}
#t2x_1{left:785px;bottom:539px;letter-spacing:-0.12px;}
#t2y_1{left:715px;bottom:526px;letter-spacing:-0.13px;}
#t2z_1{left:715px;bottom:514px;letter-spacing:-0.13px;}
#t30_1{left:715px;bottom:501px;letter-spacing:-0.14px;}
#t31_1{left:715px;bottom:489px;letter-spacing:-0.13px;}
#t32_1{left:99px;bottom:484px;letter-spacing:-0.01px;}
#t33_1{left:121px;bottom:484px;letter-spacing:-0.01px;}
#t34_1{left:431px;bottom:480px;}
#t35_1{left:478px;bottom:485px;}
#t36_1{left:490px;bottom:484px;letter-spacing:-0.01px;}
#t37_1{left:651px;bottom:480px;}
#t38_1{left:99px;bottom:447px;letter-spacing:-0.01px;}
#t39_1{left:121px;bottom:447px;letter-spacing:-0.01px;}
#t3a_1{left:431px;bottom:443px;}
#t3b_1{left:478px;bottom:448px;}
#t3c_1{left:490px;bottom:447px;letter-spacing:-0.01px;}
#t3d_1{left:651px;bottom:443px;}
#t3e_1{left:99px;bottom:423px;letter-spacing:-0.01px;}
#t3f_1{left:121px;bottom:423px;letter-spacing:-0.01px;}
#t3g_1{left:121px;bottom:408px;letter-spacing:-0.01px;}
#t3h_1{left:121px;bottom:392px;letter-spacing:-0.01px;}
#t3i_1{left:202px;bottom:392px;}
#t3j_1{left:220px;bottom:392px;}
#t3k_1{left:238px;bottom:392px;}
#t3l_1{left:257px;bottom:392px;}
#t3m_1{left:275px;bottom:392px;}
#t3n_1{left:293px;bottom:392px;}
#t3o_1{left:431px;bottom:388px;}
#t3p_1{left:478px;bottom:393px;}
#t3q_1{left:490px;bottom:392px;letter-spacing:-0.01px;}
#t3r_1{left:651px;bottom:388px;}
#t3s_1{left:99px;bottom:355px;letter-spacing:-0.01px;}
#t3t_1{left:121px;bottom:355px;letter-spacing:-0.01px;}
#t3u_1{left:357px;bottom:355px;letter-spacing:-0.01px;}
#t3v_1{left:664px;bottom:355px;letter-spacing:-0.01px;}
#t3w_1{left:838px;bottom:351px;}
#t3x_1{left:70px;bottom:319px;}
#t3y_1{left:99px;bottom:319px;letter-spacing:-0.01px;}
#t3z_1{left:299px;bottom:319px;letter-spacing:-0.01px;}
#t40_1{left:422px;bottom:319px;}
#t41_1{left:440px;bottom:319px;}
#t42_1{left:458px;bottom:319px;}
#t43_1{left:477px;bottom:319px;}
#t44_1{left:495px;bottom:319px;}
#t45_1{left:513px;bottom:319px;}
#t46_1{left:532px;bottom:319px;}
#t47_1{left:550px;bottom:319px;}
#t48_1{left:568px;bottom:319px;}
#t49_1{left:587px;bottom:319px;}
#t4a_1{left:605px;bottom:319px;}
#t4b_1{left:623px;bottom:319px;}
#t4c_1{left:642px;bottom:319px;}
#t4d_1{left:667px;bottom:319px;}
#t4e_1{left:838px;bottom:315px;}
#t4f_1{left:70px;bottom:282px;}
#t4g_1{left:99px;bottom:282px;letter-spacing:-0.01px;}
#t4h_1{left:271px;bottom:282px;letter-spacing:-0.01px;}
#t4i_1{left:385px;bottom:282px;}
#t4j_1{left:403px;bottom:282px;}
#t4k_1{left:422px;bottom:282px;}
#t4l_1{left:440px;bottom:282px;}
#t4m_1{left:458px;bottom:282px;}
#t4n_1{left:477px;bottom:282px;}
#t4o_1{left:495px;bottom:282px;}
#t4p_1{left:513px;bottom:282px;}
#t4q_1{left:532px;bottom:282px;}
#t4r_1{left:550px;bottom:282px;}
#t4s_1{left:568px;bottom:282px;}
#t4t_1{left:587px;bottom:282px;}
#t4u_1{left:605px;bottom:282px;}
#t4v_1{left:623px;bottom:282px;}
#t4w_1{left:642px;bottom:282px;}
#t4x_1{left:667px;bottom:282px;}
#t4y_1{left:838px;bottom:278px;}
#t4z_1{left:70px;bottom:245px;}
#t50_1{left:99px;bottom:245px;letter-spacing:-0.01px;}
#t51_1{left:287px;bottom:245px;letter-spacing:-0.01px;}
#t52_1{left:440px;bottom:245px;}
#t53_1{left:458px;bottom:245px;}
#t54_1{left:477px;bottom:245px;}
#t55_1{left:495px;bottom:245px;}
#t56_1{left:513px;bottom:245px;}
#t57_1{left:532px;bottom:245px;}
#t58_1{left:550px;bottom:245px;}
#t59_1{left:568px;bottom:245px;}
#t5a_1{left:587px;bottom:245px;}
#t5b_1{left:605px;bottom:245px;}
#t5c_1{left:623px;bottom:245px;}
#t5d_1{left:642px;bottom:245px;}
#t5e_1{left:667px;bottom:245px;}
#t5f_1{left:838px;bottom:241px;}
#t5g_1{left:70px;bottom:209px;letter-spacing:-0.01px;}
#t5h_1{left:99px;bottom:209px;letter-spacing:-0.01px;}
#t5i_1{left:550px;bottom:209px;letter-spacing:-0.01px;}
#t5j_1{left:664px;bottom:209px;letter-spacing:-0.01px;}
#t5k_1{left:838px;bottom:205px;}
#t5l_1{left:70px;bottom:178px;letter-spacing:-0.01px;}
#t5m_1{left:99px;bottom:178px;letter-spacing:-0.01px;word-spacing:0.48px;}
#t5n_1{left:99px;bottom:163px;letter-spacing:-0.01px;}
#t5o_1{left:238px;bottom:163px;}
#t5p_1{left:257px;bottom:163px;}
#t5q_1{left:275px;bottom:163px;}
#t5r_1{left:293px;bottom:163px;}
#t5s_1{left:312px;bottom:163px;}
#t5t_1{left:330px;bottom:163px;}
#t5u_1{left:348px;bottom:163px;}
#t5v_1{left:367px;bottom:163px;}
#t5w_1{left:385px;bottom:163px;}
#t5x_1{left:403px;bottom:163px;}
#t5y_1{left:422px;bottom:163px;}
#t5z_1{left:440px;bottom:163px;}
#t60_1{left:458px;bottom:163px;}
#t61_1{left:477px;bottom:163px;}
#t62_1{left:495px;bottom:163px;}
#t63_1{left:513px;bottom:163px;}
#t64_1{left:532px;bottom:163px;}
#t65_1{left:550px;bottom:163px;}
#t66_1{left:568px;bottom:163px;}
#t67_1{left:587px;bottom:163px;}
#t68_1{left:605px;bottom:163px;}
#t69_1{left:623px;bottom:163px;}
#t6a_1{left:642px;bottom:163px;}
#t6b_1{left:664px;bottom:163px;letter-spacing:-0.01px;}
#t6c_1{left:838px;bottom:159px;}
#t6d_1{left:70px;bottom:126px;letter-spacing:-0.01px;}
#t6e_1{left:99px;bottom:126px;letter-spacing:-0.01px;}
#t6f_1{left:257px;bottom:126px;}
#t6g_1{left:275px;bottom:126px;}
#t6h_1{left:293px;bottom:126px;}
#t6i_1{left:312px;bottom:126px;}
#t6j_1{left:330px;bottom:126px;}
#t6k_1{left:348px;bottom:126px;}
#t6l_1{left:367px;bottom:126px;}
#t6m_1{left:385px;bottom:126px;}
#t6n_1{left:403px;bottom:126px;}
#t6o_1{left:422px;bottom:126px;}
#t6p_1{left:440px;bottom:126px;}
#t6q_1{left:458px;bottom:126px;}
#t6r_1{left:477px;bottom:126px;}
#t6s_1{left:495px;bottom:126px;}
#t6t_1{left:513px;bottom:126px;}
#t6u_1{left:532px;bottom:126px;}
#t6v_1{left:550px;bottom:126px;}
#t6w_1{left:568px;bottom:126px;}
#t6x_1{left:587px;bottom:126px;}
#t6y_1{left:605px;bottom:126px;}
#t6z_1{left:623px;bottom:126px;}
#t70_1{left:642px;bottom:126px;}
#t71_1{left:664px;bottom:126px;letter-spacing:-0.01px;}
#t72_1{left:838px;bottom:122px;}
#t73_1{left:70px;bottom:96px;letter-spacing:-0.01px;}
#t74_1{left:99px;bottom:96px;letter-spacing:-0.01px;word-spacing:0.48px;}
#t75_1{left:99px;bottom:80px;letter-spacing:-0.01px;}
#t76_1{left:422px;bottom:80px;}
#t77_1{left:440px;bottom:80px;}
#t78_1{left:458px;bottom:80px;}
#t79_1{left:477px;bottom:80px;}
#t7a_1{left:495px;bottom:80px;}
#t7b_1{left:513px;bottom:80px;}
#t7c_1{left:532px;bottom:80px;}
#t7d_1{left:550px;bottom:80px;}
#t7e_1{left:568px;bottom:80px;}
#t7f_1{left:587px;bottom:80px;}
#t7g_1{left:605px;bottom:80px;}
#t7h_1{left:623px;bottom:80px;}
#t7i_1{left:642px;bottom:80px;}
#t7j_1{left:663px;bottom:80px;letter-spacing:-0.01px;}
#t7k_1{left:838px;bottom:76px;}
#t7l_1{left:99px;bottom:55px;letter-spacing:-0.01px;}
#t7m_1{left:55px;bottom:35px;letter-spacing:0.11px;}
#t7n_1{left:653px;bottom:35px;letter-spacing:-0.15px;}
#t7o_1{left:794px;bottom:36px;letter-spacing:-0.14px;}
#t7p_1{left:822px;bottom:34px;letter-spacing:0.15px;}
#t7q_1{left:851px;bottom:36px;letter-spacing:-0.14px;}

.s0_1{font-size:11px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s1_1{font-size:28px;font-family:HelveticaNeueLTStd-BlkCn_1l0;color:#000;}
.s2_1{font-size:21px;font-family:ITCFranklinGothicStd-Demi_1k-;color:#000;}
.s3_1{font-size:14px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#FFF;}
.s4_1{font-size:12px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s5_1{font-size:12px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s6_1{font-size:12px;font-family:HelveticaNeueLTStd-It_1ky;color:#000;}
.s7_1{font-size:11px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s8_1{font-size:11px;font-family:HelveticaNeueLTStd-It_1ky;color:#000;}
.s9_1{font-size:9px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.sa_1{font-size:14px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.sb_1{font-size:14px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.sc_1{font-size:13px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.sd_1{font-size:13px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.se_1{font-size:23px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.sf_1{font-size:11px;font-family:HelveticaNeueLTStd-BdIt_1l1;color:#000;}
.sg_1{font-size:15px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.t.v0_1{transform:scaleX(0.95);}
.t.v1_1{transform:scaleX(0.92);}
.t.v2_1{transform:scaleX(0.957);}
#form1_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 284px;	top: 112px;	width: 66px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 380px;	top: 112px;	width: 261px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 215px;	top: 147px;	width: 426px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
    #form4_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 173px;	top: 184px;	width: 471px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form5_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 127px;	top: 220px;	width: 515px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form6_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 127px;	top: 266px;	width: 327px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 462px;	top: 266px;	width: 54px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form8_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 266px;	width: 109px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form9_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 122px;	top: 312px;	width: 272px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form10_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 408px;	top: 312px;	width: 107px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form11_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 312px;	width: 109px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form12_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 456px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form13_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 829px;	top: 449px;	width: 31px;	height: 39px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form14_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 492px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form15_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 829px;	top: 486px;	width: 31px;	height: 39px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form16_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 524px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form17_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 319px;	top: 593px;	width: 109px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form18_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 421px;	top: 593px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form19_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 539px;	top: 593px;	width: 109px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form20_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 643px;	top: 593px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form21_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 319px;	top: 624px;	width: 109px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form22_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 440px;	top: 624px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form23_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 539px;	top: 624px;	width: 109px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form24_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 660px;	top: 624px;	width: 31px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form25_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 319px;	top: 660px;	width: 109px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form26_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 440px;	top: 660px;	width: 31px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form27_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 539px;	top: 660px;	width: 109px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form28_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 660px;	top: 660px;	width: 31px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form29_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 319px;	top: 697px;	width: 109px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form30_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 440px;	top: 697px;	width: 31px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form31_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 539px;	top: 740px;	width: 109px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form32_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 660px;	top: 697px;	width: 31px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form33_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 319px;	top: 740px;	width: 109px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form34_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 422px;	top: 740px;	width: 31px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form35_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 539px;	top: 740px;	width: 109px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form36_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 642px;	top: 740px;	width: 31px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form37_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 319px;	top: 789px;	width: 109px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form38_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 440px;	top: 789px;	width: 31px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form39_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 539px;	top: 789px;	width: 109px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form40_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 660px;	top: 789px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form41_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 832px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form42_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 830px;	top: 832px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form43_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 862px;	width: 153px;	height: 35px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form44_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 830px;	top: 860px;	width: 31px;	height: 39px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form45_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 906px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form46_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 899px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form47_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 941px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form48_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 824px;	top: 934px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif; margin: 7px;}
#form49_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 972px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form50_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 972px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form51_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 1018px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form52_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 1018px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form53_1{	z-index: 2;	background-size: 100% 100%;	background-image: url("1/form/444 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 1054px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form54_1{	z-index: 2;	background-size: 100% 100%;	background-image: url("1/form/445 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 1054px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form55_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 1100px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form56_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 1100px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form16_1 { z-index:2; }

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts1" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-BdIt_1l1;
	src: url("fonts/HelveticaNeueLTStd-BdIt_1l1.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Bd_1kx;
	src: url("fonts/HelveticaNeueLTStd-Bd_1kx.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-BlkCn_1l0;
	src: url("fonts/HelveticaNeueLTStd-BlkCn_1l0.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_1ky;
	src: url("fonts/HelveticaNeueLTStd-It_1ky.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_1kz;
	src: url("fonts/HelveticaNeueLTStd-Roman_1kz.woff") format("woff");
}

@font-face {
	font-family: ITCFranklinGothicStd-Demi_1k-;
	src: url("fonts/ITCFranklinGothicStd-Demi_1k-.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg1" style="-webkit-user-select: none;"><object width="935" height="1210" data="1/1.svg" type="image/svg+xml" id="pdf1" style="width:935px; height:1210px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_1" class="t s0_1">Form </span><span id="t2_1" class="t s1_1">944 for 2024: </span>
<span id="t3_1" class="t s2_1">Employer’s ANNUAL Federal Tax Return </span>
<span id="t4_1" class="t s0_1">Department of the Treasury — Internal Revenue Service </span>
<span id="t5_1" class="t s0_1">OMB No. 1545-2007 </span>
<span id="t6_1" class="t s3_1">Who Must File Form 944 </span>
<span id="t7_1" class="t s4_1">You must file annual Form 944 </span>
<span id="t8_1" class="t s4_1">instead of filing quarterly Forms 941 </span>
<span id="t9_1" class="t s5_1">only if the IRS notified </span><span id="ta_1" class="t s5_1">you in </span>
<span id="tb_1" class="t s5_1">writing</span><span id="tc_1" class="t s4_1">. </span>
<span id="td_1" class="t s4_1">Go to </span><span id="te_1" class="t s6_1">www.irs.gov/Form944 </span><span id="tf_1" class="t s4_1">for </span>
<span id="tg_1" class="t s4_1">instructions and the latest </span>
<span id="th_1" class="t s4_1">information. </span>
<span id="ti_1" class="t s7_1">Employer identification number </span><span id="tj_1" class="t s0_1">(EIN) </span>
<span id="tk_1" class="t s0_1">— </span>
<span id="tl_1" class="t s7_1">Name </span><span id="tm_1" class="t s8_1">(not your trade name) </span>
<span id="tn_1" class="t s7_1">Trade name </span><span id="to_1" class="t s8_1">(if any) </span>
<span id="tp_1" class="t s7_1">Address </span>
<span id="tq_1" class="t s9_1">Number </span><span id="tr_1" class="t s9_1">Street </span><span id="ts_1" class="t s9_1">Suite or room number </span>
<span id="tt_1" class="t s9_1">City </span><span id="tu_1" class="t s9_1">State </span><span id="tv_1" class="t s9_1">ZIP code </span>
<span id="tw_1" class="t s9_1">Foreign country name </span><span id="tx_1" class="t s9_1">Foreign province/county </span><span id="ty_1" class="t s9_1">Foreign postal code </span>
<span id="tz_1" class="t v0_1 sa_1">Read the separate instructions before you complete Form 944. Type or print within the boxes. </span>
<span id="t10_1" class="t s3_1">Part 1: </span>
<span id="t11_1" class="t sb_1">Answer these questions for this year. Employers in American Samoa, Guam, the Commonwealth of the Northern </span>
<span id="t12_1" class="t sb_1">Mariana Islands, the U.S. Virgin Islands, and Puerto Rico can skip lines 1 and 2, unless you have employees who are </span>
<span id="t13_1" class="t sb_1">subject to U.S. income tax withholding. </span>
<span id="t14_1" class="t sc_1">1 </span><span id="t15_1" class="t sc_1">Wages, tips, and other compensation </span><span id="t16_1" class="t sd_1">. </span><span id="t17_1" class="t sd_1">. </span><span id="t18_1" class="t sd_1">. </span><span id="t19_1" class="t sd_1">. </span><span id="t1a_1" class="t sd_1">. </span><span id="t1b_1" class="t sd_1">. </span><span id="t1c_1" class="t sd_1">. </span><span id="t1d_1" class="t sd_1">. </span><span id="t1e_1" class="t sd_1">. </span><span id="t1f_1" class="t sd_1">. </span><span id="t1g_1" class="t sd_1">. </span><span id="t1h_1" class="t sd_1">. </span><span id="t1i_1" class="t sd_1">. </span><span id="t1j_1" class="t sd_1">. </span><span id="t1k_1" class="t sd_1">. </span><span id="t1l_1" class="t sd_1">. </span><span id="t1m_1" class="t sd_1">. </span><span id="t1n_1" class="t sc_1">1 </span><span id="t1o_1" class="t se_1">. </span>
<span id="t1p_1" class="t sc_1">2 </span><span id="t1q_1" class="t sc_1">Federal income tax withheld from wages, tips, and other compensation </span><span id="t1r_1" class="t sd_1">. </span><span id="t1s_1" class="t sd_1">. </span><span id="t1t_1" class="t sd_1">. </span><span id="t1u_1" class="t sd_1">. </span><span id="t1v_1" class="t sd_1">. </span><span id="t1w_1" class="t sd_1">. </span><span id="t1x_1" class="t sc_1">2 </span><span id="t1y_1" class="t se_1">. </span>
<span id="t1z_1" class="t sc_1">3 </span><span id="t20_1" class="t sc_1">If no wages, tips, and other compensation are subject to social security or Medicare tax </span><span id="t21_1" class="t sc_1">3 </span><span id="t22_1" class="t sc_1">Check and go to line 5. </span>
<span id="t23_1" class="t sc_1">4 </span><span id="t24_1" class="t sc_1">Taxable social security and Medicare wages and tips: </span>
<span id="t25_1" class="t sc_1">Column 1 </span><span id="t26_1" class="t sc_1">Column 2 </span>
<span id="t27_1" class="t sc_1">4a </span><span id="t28_1" class="t sc_1">Taxable social security wages* </span><span id="t29_1" class="t se_1">. </span><span id="t2a_1" class="t s0_1">× </span><span id="t2b_1" class="t sd_1">0.124 = </span><span id="t2c_1" class="t se_1">. </span>
<span id="t2d_1" class="t sc_1">4a </span><span id="t2e_1" class="t sc_1">(i) </span><span id="t2f_1" class="t sc_1">Qualified sick leave wages* </span><span id="t2g_1" class="t se_1">. </span><span id="t2h_1" class="t s0_1">× </span><span id="t2i_1" class="t sd_1">0.062 = </span><span id="t2j_1" class="t se_1">. </span>
<span id="t2k_1" class="t sc_1">4a (ii) </span><span id="t2l_1" class="t v0_1 sc_1">Qualified family leave wages* </span><span id="t2m_1" class="t se_1">. </span><span id="t2n_1" class="t s0_1">× </span><span id="t2o_1" class="t sd_1">0.062 = </span><span id="t2p_1" class="t se_1">. </span>
<span id="t2q_1" class="t s8_1">* Include taxable qualified sick </span>
<span id="t2r_1" class="t s8_1">and family leave wages paid in </span>
<span id="t2s_1" class="t s8_1">2024 for leave taken after March </span>
<span id="t2t_1" class="t s8_1">31, 2021, and before October 1, </span>
<span id="t2u_1" class="t s8_1">2021, on line 4a. Use lines 4a(i) </span>
<span id="t2v_1" class="t s8_1">and 4a(ii) </span><span id="t2w_1" class="t sf_1">only </span><span id="t2x_1" class="t s8_1">for taxable </span>
<span id="t2y_1" class="t s8_1">qualified sick and family leave </span>
<span id="t2z_1" class="t s8_1">wages paid in 2024 for leave </span>
<span id="t30_1" class="t s8_1">taken after March 31, 2020, and </span>
<span id="t31_1" class="t s8_1">before April 1, 2021. </span>
<span id="t32_1" class="t sc_1">4b </span><span id="t33_1" class="t sc_1">Taxable social security tips </span><span id="t34_1" class="t se_1">. </span><span id="t35_1" class="t s0_1">× </span><span id="t36_1" class="t sd_1">0.124 = </span><span id="t37_1" class="t se_1">. </span>
<span id="t38_1" class="t sc_1">4c </span><span id="t39_1" class="t sc_1">Taxable Medicare wages &amp; tips </span><span id="t3a_1" class="t se_1">. </span><span id="t3b_1" class="t s0_1">× </span><span id="t3c_1" class="t sd_1">0.029 = </span><span id="t3d_1" class="t se_1">. </span>
<span id="t3e_1" class="t sc_1">4d </span><span id="t3f_1" class="t sc_1">Taxable wages &amp; tips subject </span>
<span id="t3g_1" class="t sc_1">to Additional Medicare Tax </span>
<span id="t3h_1" class="t sc_1">withholding </span><span id="t3i_1" class="t sd_1">. </span><span id="t3j_1" class="t sd_1">. </span><span id="t3k_1" class="t sd_1">. </span><span id="t3l_1" class="t sd_1">. </span><span id="t3m_1" class="t sd_1">. </span><span id="t3n_1" class="t sd_1">. </span><span id="t3o_1" class="t se_1">. </span><span id="t3p_1" class="t s0_1">× </span><span id="t3q_1" class="t sd_1">0.009 = </span><span id="t3r_1" class="t se_1">. </span>
<span id="t3s_1" class="t sc_1">4e </span><span id="t3t_1" class="t v1_1 sc_1">Total social security and Medicare taxes. </span><span id="t3u_1" class="t v1_1 sd_1">Add Column 2 from lines 4a, 4a(i), 4a(ii), 4b, 4c, and 4d </span><span id="t3v_1" class="t sc_1">4e </span><span id="t3w_1" class="t se_1">. </span>
<span id="t3x_1" class="t sc_1">5 </span><span id="t3y_1" class="t sc_1">Total taxes before adjustments. </span><span id="t3z_1" class="t sd_1">Add lines 2 and 4e </span><span id="t40_1" class="t sd_1">. </span><span id="t41_1" class="t sd_1">. </span><span id="t42_1" class="t sd_1">. </span><span id="t43_1" class="t sd_1">. </span><span id="t44_1" class="t sd_1">. </span><span id="t45_1" class="t sd_1">. </span><span id="t46_1" class="t sd_1">. </span><span id="t47_1" class="t sd_1">. </span><span id="t48_1" class="t sd_1">. </span><span id="t49_1" class="t sd_1">. </span><span id="t4a_1" class="t sd_1">. </span><span id="t4b_1" class="t sd_1">. </span><span id="t4c_1" class="t sd_1">. </span><span id="t4d_1" class="t sc_1">5 </span><span id="t4e_1" class="t se_1">. </span>
<span id="t4f_1" class="t sc_1">6 </span><span id="t4g_1" class="t sc_1">Current year’s adjustments </span><span id="t4h_1" class="t sd_1">(see instructions) </span><span id="t4i_1" class="t sd_1">. </span><span id="t4j_1" class="t sd_1">. </span><span id="t4k_1" class="t sd_1">. </span><span id="t4l_1" class="t sd_1">. </span><span id="t4m_1" class="t sd_1">. </span><span id="t4n_1" class="t sd_1">. </span><span id="t4o_1" class="t sd_1">. </span><span id="t4p_1" class="t sd_1">. </span><span id="t4q_1" class="t sd_1">. </span><span id="t4r_1" class="t sd_1">. </span><span id="t4s_1" class="t sd_1">. </span><span id="t4t_1" class="t sd_1">. </span><span id="t4u_1" class="t sd_1">. </span><span id="t4v_1" class="t sd_1">. </span><span id="t4w_1" class="t sd_1">. </span><span id="t4x_1" class="t sc_1">6 </span><span id="t4y_1" class="t se_1">. </span>
<span id="t4z_1" class="t sc_1">7 </span><span id="t50_1" class="t sc_1">Total taxes after adjustments. </span><span id="t51_1" class="t sd_1">Combine lines 5 and 6 </span><span id="t52_1" class="t sd_1">. </span><span id="t53_1" class="t sd_1">. </span><span id="t54_1" class="t sd_1">. </span><span id="t55_1" class="t sd_1">. </span><span id="t56_1" class="t sd_1">. </span><span id="t57_1" class="t sd_1">. </span><span id="t58_1" class="t sd_1">. </span><span id="t59_1" class="t sd_1">. </span><span id="t5a_1" class="t sd_1">. </span><span id="t5b_1" class="t sd_1">. </span><span id="t5c_1" class="t sd_1">. </span><span id="t5d_1" class="t sd_1">. </span><span id="t5e_1" class="t sc_1">7 </span><span id="t5f_1" class="t se_1">. </span>
<span id="t5g_1" class="t sc_1">8a </span><span id="t5h_1" class="t v2_1 sc_1">Qualified small business payroll tax credit for increasing research activities. </span><span id="t5i_1" class="t v2_1 sd_1">Attach Form 8974 </span><span id="t5j_1" class="t sc_1">8a </span><span id="t5k_1" class="t se_1">. </span>
<span id="t5l_1" class="t sc_1">8b </span><span id="t5m_1" class="t sc_1">Nonrefundable portion of credit for qualified sick and family leave wages for leave taken </span>
<span id="t5n_1" class="t sc_1">before April 1, 2021 </span><span id="t5o_1" class="t sd_1">. </span><span id="t5p_1" class="t sd_1">. </span><span id="t5q_1" class="t sd_1">. </span><span id="t5r_1" class="t sd_1">. </span><span id="t5s_1" class="t sd_1">. </span><span id="t5t_1" class="t sd_1">. </span><span id="t5u_1" class="t sd_1">. </span><span id="t5v_1" class="t sd_1">. </span><span id="t5w_1" class="t sd_1">. </span><span id="t5x_1" class="t sd_1">. </span><span id="t5y_1" class="t sd_1">. </span><span id="t5z_1" class="t sd_1">. </span><span id="t60_1" class="t sd_1">. </span><span id="t61_1" class="t sd_1">. </span><span id="t62_1" class="t sd_1">. </span><span id="t63_1" class="t sd_1">. </span><span id="t64_1" class="t sd_1">. </span><span id="t65_1" class="t sd_1">. </span><span id="t66_1" class="t sd_1">. </span><span id="t67_1" class="t sd_1">. </span><span id="t68_1" class="t sd_1">. </span><span id="t69_1" class="t sd_1">. </span><span id="t6a_1" class="t sd_1">. </span><span id="t6b_1" class="t sc_1">8b </span><span id="t6c_1" class="t se_1">. </span>
<span id="t6d_1" class="t sc_1">8c </span><span id="t6e_1" class="t sc_1">Reserved for future use </span><span id="t6f_1" class="t sd_1">. </span><span id="t6g_1" class="t sd_1">. </span><span id="t6h_1" class="t sd_1">. </span><span id="t6i_1" class="t sd_1">. </span><span id="t6j_1" class="t sd_1">. </span><span id="t6k_1" class="t sd_1">. </span><span id="t6l_1" class="t sd_1">. </span><span id="t6m_1" class="t sd_1">. </span><span id="t6n_1" class="t sd_1">. </span><span id="t6o_1" class="t sd_1">. </span><span id="t6p_1" class="t sd_1">. </span><span id="t6q_1" class="t sd_1">. </span><span id="t6r_1" class="t sd_1">. </span><span id="t6s_1" class="t sd_1">. </span><span id="t6t_1" class="t sd_1">. </span><span id="t6u_1" class="t sd_1">. </span><span id="t6v_1" class="t sd_1">. </span><span id="t6w_1" class="t sd_1">. </span><span id="t6x_1" class="t sd_1">. </span><span id="t6y_1" class="t sd_1">. </span><span id="t6z_1" class="t sd_1">. </span><span id="t70_1" class="t sd_1">. </span><span id="t71_1" class="t sc_1">8c </span><span id="t72_1" class="t se_1">. </span>
<span id="t73_1" class="t sc_1">8d </span><span id="t74_1" class="t sc_1">Nonrefundable portion of credit for qualified sick and family leave wages for leave taken </span>
<span id="t75_1" class="t sc_1">after March 31, 2021, and before October 1, 2021 </span><span id="t76_1" class="t sd_1">. </span><span id="t77_1" class="t sd_1">. </span><span id="t78_1" class="t sd_1">. </span><span id="t79_1" class="t sd_1">. </span><span id="t7a_1" class="t sd_1">. </span><span id="t7b_1" class="t sd_1">. </span><span id="t7c_1" class="t sd_1">. </span><span id="t7d_1" class="t sd_1">. </span><span id="t7e_1" class="t sd_1">. </span><span id="t7f_1" class="t sd_1">. </span><span id="t7g_1" class="t sd_1">. </span><span id="t7h_1" class="t sd_1">. </span><span id="t7i_1" class="t sd_1">. </span><span id="t7j_1" class="t sc_1">8d </span><span id="t7k_1" class="t se_1">. </span>
<span id="t7l_1" class="t sc_1">You MUST complete all three pages of Form 944 and SIGN it. </span>
<span id="t7m_1" class="t s5_1">For Privacy Act and Paperwork Reduction Act Notice, see the back of the Payment Voucher. </span><span id="t7n_1" class="t s0_1">Cat. No. 39316N </span><span id="t7o_1" class="t s0_1">Form </span><span id="t7p_1" class="t sg_1">944 </span><span id="t7q_1" class="t s0_1">(2023) </span></div>
<!-- End text definitions -->


<!-- Begin Form Data -->
<!--<input id="form1_1" type="text" tabindex="1" maxlength="2" value="12" data-objref="458 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].EIN_F944[0].f1_1[0]" style="font-size:24px; letter-spacing: 33px;" />-->
<!--<input id="form2_1" type="text" tabindex="2" maxlength="7" value="3456789" data-objref="459 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].EIN_F944[0].f1_2[0]" style="font-size:24px; letter-spacing: 27px;"/>-->



 
<?php
$Federal_Pin_Number = isset($get_cominfo[0]['Federal_Pin_Number']) ? $get_cominfo[0]['Federal_Pin_Number'] : 'Default Value';
 if(strlen($Federal_Pin_Number) >= 9) {
     $one = substr($Federal_Pin_Number, 0, 2);
     $two = substr($Federal_Pin_Number, -7);
} else {
     $one = '00'; // Example default value
    $two = '0000000'; // Example default value
 }
  ?>
<!-- Begin Form Data -->
<input id="form1_1" type="text" tabindex="1" maxlength="2" value="<?php echo htmlspecialchars($one, ENT_QUOTES, 'UTF-8'); ?> " data-objref="458 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].EIN_F944[0].f1_1[0]" style="font-size:24px; letter-spacing: 33px;" />
<input id="form2_1" type="text" tabindex="2" maxlength="7" value="<?php echo htmlspecialchars($two, ENT_QUOTES, 'UTF-8'); ?>" data-objref="459 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].EIN_F944[0].f1_2[0]" style="font-size:24px; letter-spacing: 27px;"/>









<?php
$company_name = isset($get_cominfo[0]['company_name']) ? $get_cominfo[0]['company_name'] : 'Default Name';
?>
<input id="form3_1" type="text" tabindex="3" data-objref="449 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_3[0]" 

value="<?php echo htmlspecialchars($company_name, ENT_QUOTES, 'UTF-8'); ?>" 

/>

<input id="form4_1" type="text" tabindex="4" data-objref="450 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_4[0]" value="<?php echo htmlspecialchars($company_name, ENT_QUOTES, 'UTF-8'); ?>"/>

<?php
$address = isset($get_cominfo[0]['address']) ? $get_cominfo[0]['address'] : 'Default Address';
$get_address = explode(',', $address);
?>

<input id="form5_1" type="text" tabindex="5" data-objref="451 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_5[0]" value="<?php echo htmlspecialchars($get_address[0], ENT_QUOTES, 'UTF-8'); ?>"/>

<input id="form6_1" type="text" tabindex="6" value="<?php echo htmlspecialchars($get_address[1], ENT_QUOTES, 'UTF-8'); ?>" data-objref="452 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_6[0]"/>

<input id="form7_1" type="text" tabindex="7" value="<?php echo htmlspecialchars($get_address[2], ENT_QUOTES, 'UTF-8'); ?>" data-objref="453 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_7[0]"/>

<input id="form8_1" type="text" tabindex="8" value="<?php echo htmlspecialchars($get_address[3], ENT_QUOTES, 'UTF-8'); ?>" data-objref="454 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_8[0]"/>

<input id="form9_1" type="text" tabindex="9" value="" data-objref="455 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_9[0]"/>
<input id="form10_1" type="text" tabindex="10" value="" data-objref="456 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_10[0]"/>
<input id="form11_1" type="text" tabindex="11" value="" data-objref="457 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_11[0]"/>






<?php
$t_tax = 0;
$t_tax = $get_payslip_info[0]['overalltotal_amount'];
// Format the number with two decimal places
$formatted_tax = number_format($t_tax, 2);


 $parts = explode('.', $formatted_tax);
 $inter = $parts[0]; // The integer (dollar) part
 $decimal = isset($parts[1]) ? $parts[1] : '00'; // The decimal (cent) part, defaulting to '00' if not present
 

?>



<!-- Input field for the integer part -->
<input id="form12_1" type="text" tabindex="12" value="<?php echo $currency . $inter; ?>" data-objref="403 0 R" data-field-name="topmostSubform[0].Page1[0].f1_12[0]"/>

<!-- Input field for the decimal part -->
<input id="form13_1" type="text" tabindex="13" maxlength="2" value="<?php echo $decimal; ?>" data-objref="404 0 R" data-field-name="topmostSubform[0].Page1[0].f1_13[0]"/>




<!-- Federal tax Employeer -->

<?php
$ftotal_amount = isset($get_payslip_info[0]['ftotal_amount']) ? $get_payslip_info[0]['ftotal_amount'] : '0';


$parts = explode('.', $ftotal_amount);
$inter = $parts[0]; // The integer (dollar) part
$decimal = isset($parts[1]) ? $parts[1] : '00'; // The decimal (cent) part, defaulting to '00' if not present


?>





<!-- Input field for total federal tax -->
<input id="form14_1" type="text" tabindex="14" data-objref="405 0 R" data-field-name="topmostSubform[0].Page1[0].f1_14[0]" 
value="<?php echo $currency .$inter; ?>" />

<!-- Input field for the decimal part of federal tax -->
<input id="form15_1" type="text" tabindex="15" maxlength="2" 
value="<?php echo  $decimal; ?>" 
data-objref="406 0 R" data-field-name="topmostSubform[0].Page1[0].f1_15[0]"/>








<input id="form16_1" type="checkbox" tabindex="16" value="Yes" data-objref="407 0 R" data-field-name="topmostSubform[0].Page1[0].c1_1[0]" imageName="1/form/407 0 R" images="110100"/>

<!-- Social Security Tax -->

<?php
$overalltotal_amount = isset($get_payslip_info[0]['overalltotal_amount']) ? $get_payslip_info[0]['overalltotal_amount'] : '0';
$formatted_overalltax = number_format($overalltotal_amount, 2);

$parts = explode('.', $formatted_overalltax);
$inter = $parts[0]; // The integer (dollar) part
$decimal = isset($parts[1]) ? $parts[1] : '00'; // The decimal (cent) part, defaulting to '00' if not present


?>

<!-- Input field for social security tax -->
<input id="form17_1" type="text" tabindex="17" value="<?php echo $currency . $inter; ?>" data-objref="408 0 R" data-field-name="topmostSubform[0].Page1[0].f1_16[0]"/>

<!-- Input field for the decimal part of social security tax -->
<input id="form18_1" type="text" tabindex="18" maxlength="2" value="<?php echo  $decimal; ?>"   data-objref="409 0 R" data-field-name="topmostSubform[0].Page1[0].f1_17[0]"/>





 
<?php
$social_security = $overalltotal_amount * 0.124;
$formatted_social_security = number_format($social_security, 2);


$parts = explode('.', $formatted_social_security);
$inter = $parts[0]; // The integer (dollar) part
$decimal = isset($parts[1]) ? $parts[1] : '00'; // The decimal (cent) part, defaulting to '00' if not present


?>

<!-- Input field for total security tax -->
<input id="form19_1" type="text" tabindex="19" value="<?php echo $currency . $inter; ?>" data-objref="410 0 R" data-field-name="topmostSubform[0].Page1[0].f1_18[0]"/>

<!-- Input field for the decimal part of total security tax -->
<input id="form20_1" type="text" tabindex="20" maxlength="2" value="<?php echo $decimal; ?>" data-objref="411 0 R" data-field-name="topmostSubform[0].Page1[0].f1_19[0]"/>

<input id="form21_1" type="text" tabindex="21" value="" data-objref="412 0 R" data-field-name="topmostSubform[0].Page1[0].f1_20[0]"/>
<input id="form22_1" type="text" tabindex="22" maxlength="3" value="" data-objref="413 0 R" data-field-name="topmostSubform[0].Page1[0].f1_21[0]"/>
<input id="form23_1" type="text" tabindex="23" value="" data-objref="414 0 R" data-field-name="topmostSubform[0].Page1[0].f1_22[0]"/>
<input id="form24_1" type="text" tabindex="24" maxlength="3" value="" data-objref="415 0 R" data-field-name="topmostSubform[0].Page1[0].f1_23[0]"/>
<input id="form25_1" type="text" tabindex="25" value="" data-objref="416 0 R" data-field-name="topmostSubform[0].Page1[0].f1_24[0]"/>

<input id="form26_1" type="text" tabindex="26" maxlength="3" value="" data-objref="417 0 R" data-field-name="topmostSubform[0].Page1[0].f1_25[0]"/>
<input id="form27_1" type="text" tabindex="27" value="" data-objref="418 0 R" data-field-name="topmostSubform[0].Page1[0].f1_26[0]"/>
<input id="form28_1" type="text" tabindex="28" maxlength="3" value="" data-objref="419 0 R" data-field-name="topmostSubform[0].Page1[0].f1_27[0]"/>
<input id="form29_1" type="text" tabindex="29" value="" data-objref="420 0 R" data-field-name="topmostSubform[0].Page1[0].f1_28[0]"/>
<input id="form30_1" type="text" tabindex="30" maxlength="3" value="" data-objref="421 0 R" data-field-name="topmostSubform[0].Page1[0].f1_29[0]"/>
<input id="form31_1" type="text" tabindex="31" value="" data-objref="422 0 R" data-field-name="topmostSubform[0].Page1[0].f1_30[0]"/>
<input id="form32_1" type="text" tabindex="32" maxlength="3" value="" data-objref="423 0 R" data-field-name="topmostSubform[0].Page1[0].f1_31[0]"/>

<!-- Medicare Tax -->

<?php
$total_medi_tax = $overalltotal_amount * 0.029 ;
$formatted_total_medi_tax = number_format($total_medi_tax, 2);

$totalsocialsecurity_Medicaretax = $total_medi_tax + $social_security;
$formatted_result = number_format($totalsocialsecurity_Medicaretax, 2);
// $formatted_result = round($totalsocialsecurity_Medicaretax, 2);


$totaltaxesbeforeadjustments = $ftotal_amount + $totalsocialsecurity_Medicaretax;
$formatted_resultbfa = number_format($totaltaxesbeforeadjustments, 2);

$currentyear_adjustments = 0;

$totaltax_afteradjustments = $totaltaxesbeforeadjustments + $currentyear_adjustments;
$formattedtotaltax_afteradjustments = number_format($totaltax_afteradjustments, 2);




$parts = explode('.', $formatted_overalltax);
$inter = $parts[0]; // The integer (dollar) part
$decimal = isset($parts[1]) ? $parts[1] : '00'; // The decimal (cent) part, defaulting to '00' if not present


?>




<!-- Input field for the formatted Medicare tax -->
<input id="form33_1" type="text" tabindex="33" value="<?php echo $currency . $inter; ?>" data-objref="424 0 R" data-field-name="topmostSubform[0].Page1[0].f1_32[0]"/>

<!-- Input field for the decimal part of the Medicare tax -->
<input id="form34_1" type="text" tabindex="34" maxlength="2" value="<?php echo  $decimal; ?>" data-objref="425 0 R" data-field-name="topmostSubform[0].Page1[0].f1_33[0]"/>



<?php
$parts = explode('.', $formatted_total_medi_tax);
$inter = $parts[0]; // The integer (dollar) part
$decimal = isset($parts[1]) ? $parts[1] : '00'; // The decimal (cent) part, defaulting to '00' if not present
?>

<!-- Input field for the formatted total Medicare tax -->
<input id="form35_1" type="text" tabindex="35" value="<?php echo $currency . $inter; ?>" data-objref="426 0 R" data-field-name="topmostSubform[0].Page1[0].f1_34[0]"/>

<!-- Input field for the decimal part of the total Medicare tax -->
<input id="form36_1" type="text" tabindex="36" maxlength="2" value="<?php echo  $decimal; ?>" data-objref="427 0 R" data-field-name="topmostSubform[0].Page1[0].f1_35[0]"/>

<input id="form37_1" type="text" tabindex="37" value="" data-objref="428 0 R" data-field-name="topmostSubform[0].Page1[0].f1_36[0]"/>
<input id="form38_1" type="text" tabindex="38" maxlength="3" value="" data-objref="429 0 R" data-field-name="topmostSubform[0].Page1[0].f1_37[0]"/>
<input id="form39_1" type="text" tabindex="39" value="" data-objref="430 0 R" data-field-name="topmostSubform[0].Page1[0].f1_38[0]"/>
<input id="form40_1" type="text" tabindex="40" maxlength="3" value="" data-objref="431 0 R" data-field-name="topmostSubform[0].Page1[0].f1_39[0]"/>





<?php
$parts = explode('.', $formatted_result);
$inter = $parts[0]; // The integer (dollar) part
$decimal = isset($parts[1]) ? $parts[1] : '00'; // The decimal (cent) part, defaulting to '00' if not present
?>

<!-- Input field for the formatted result -->
<input id="form41_1" type="text" tabindex="41" value="<?php echo $currency . $inter; ?>" data-objref="432 0 R" data-field-name="topmostSubform[0].Page1[0].f1_40[0]"/>

<!-- Input field for the decimal part of the result -->
<input id="form42_1" type="text" tabindex="42" maxlength="2" value="<?php echo $decimal?>" data-objref="433 0 R" data-field-name="topmostSubform[0].Page1[0].f1_41[0]"/>




<?php
$parts = explode('.', $formatted_resultbfa);
$inter = $parts[0]; // The integer (dollar) part
$decimal = isset($parts[1]) ? $parts[1] : '00'; // The decimal (cent) part, defaulting to '00' if not present
?>
<!-- Input field for the formatted result before any adjustments -->
<input id="form43_1" type="text" tabindex="43" value="<?php echo $currency . $inter; ?>" data-objref="434 0 R" data-field-name="topmostSubform[0].Page1[0].f1_42[0]"/>

<!-- Input field for the decimal part of the result before any adjustments -->
<input id="form44_1" type="text" tabindex="44" maxlength="2" value="<?php echo $decimal ?>"   data-objref="435 0 R" data-field-name="topmostSubform[0].Page1[0].f1_43[0]"/>





<input id="form45_1" type="text" tabindex="45" value="" data-objref="436 0 R" data-field-name="topmostSubform[0].Page1[0].f1_44[0]"/>
<input id="form46_1" type="text" tabindex="46" maxlength="3" value="" data-objref="437 0 R" data-field-name="topmostSubform[0].Page1[0].f1_45[0]"/>






<?php
$parts = explode('.', $formattedtotaltax_afteradjustments);
$inter = $parts[0]; // The integer (dollar) part
$decimal = isset($parts[1]) ? $parts[1] : '00'; // The decimal (cent) part, defaulting to '00' if not present
?>

<input id="form47_1" type="text" tabindex="47" value="<?php echo $currency . $inter; ?>" data-objref="438 0 R" data-field-name="topmostSubform[0].Page1[0].f1_46[0]"/>




<input id="form48_1" type="text" tabindex="48" maxlength="3" value="<?php echo $decimal ?>" data-objref="439 0 R" data-field-name="topmostSubform[0].Page1[0].f1_47[0]"/>
<input id="form49_1" type="text" tabindex="49" value="" data-objref="440 0 R" data-field-name="topmostSubform[0].Page1[0].f1_48[0]"/>
<input id="form50_1" type="text" tabindex="50" maxlength="3" value="" data-objref="441 0 R" data-field-name="topmostSubform[0].Page1[0].f1_49[0]"/>
<input id="form51_1" type="text" tabindex="51" value="" data-objref="442 0 R" data-field-name="topmostSubform[0].Page1[0].f1_50[0]"/>
<input id="form52_1" type="text" tabindex="52" maxlength="3" value="" data-objref="443 0 R" data-field-name="topmostSubform[0].Page1[0].f1_51[0]"/>
<input id="form53_1" type="button" tabindex="53" disabled="disabled" data-objref="444 0 R" data-field-name="topmostSubform[0].Page1[0].f1_52[0]"/>
<input id="form54_1" type="button" tabindex="54" maxlength="3" disabled="disabled" data-objref="445 0 R" data-field-name="topmostSubform[0].Page1[0].f1_53[0]"/>
<input id="form55_1" type="text" tabindex="55" value="" data-objref="446 0 R" data-field-name="topmostSubform[0].Page1[0].f1_54[0]"/>
<input id="form56_1" type="text" tabindex="56" maxlength="3" value="" data-objref="447 0 R" data-field-name="topmostSubform[0].Page1[0].f1_55[0]"/>

<!-- End Form Data -->

</div>

</div>
</div>
<!-- <div id="page2" style="width: 935px; height: 1210px; margin-top:20px;" class="page">
<div class="page-inner" style="width: 935px; height: 1210px;"> -->

<div id="page2" style="width: 934px; height: 1209px; margin-top:20px;     margin-left: 495px;" class="page">
<div class="page-inner" style="width: 934px; height: 1209px;">


<div id="p2" class="pageArea" style="overflow: hidden; position: relative; width: 935px; height: 1210px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">



<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 935 1210" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_2{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
.g1_2{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
.g2_2{
fill: #000;
}
.g3_2{
fill: #D9D9D9;
}
.g4_2{
fill: #FFF;
}
]]></style>
</defs>
<path d="M54.6,55H583.4" class="g0_2"/>
<path d="M583,54.2V70.7m0,-.8V92" class="g1_2"/>
<path d="M582.6,55H880.4" class="g0_2"/>
<path d="M55,110h55V91.7H55V110Z" class="g2_2"/>
<path d="M54.6,91.7H880.4M54.6,110H880.4" class="g1_2"/>
<path d="M682,146.7H836V119.2H682v27.5Z" class="g3_2"/>
<path d="M681.6,119.2H836.4M681.6,146.7H836.4M682,118.8v28.3" class="g1_2"/>
<path d="M836,146.7h44V119.2H836v27.5Z" class="g3_2"/>
<path d="M835.6,119.2h44.8m-44.8,27.5h44.8M880,118.8v28.3" class="g1_2"/>
<path d="M495,183.3H627V155.8H495v27.5Z" class="g3_2"/>
<path d="M495,183.3H627V155.8H495v27.5Zm186.6,9.2H836.4M681.6,220H836.4M682,192.1v28.3M835.6,192.5h44.8M835.6,220h44.8M880,192.1v28.3m-198.4,8.8H836.4M681.6,256.7H836.4M682,228.8v28.3M835.6,229.2h44.8m-44.8,27.5h44.8M880,228.8v28.3M681.6,275H836.4M681.6,302.5H836.4M682,274.6v28.3M835.6,275h44.8m-44.8,27.5h44.8M880,274.6v28.3" class="g1_2"/>
<path d="M682,339.2H836V311.7H682v27.5Z" class="g3_2"/>
<path d="M681.6,311.7H836.4M681.6,339.2H836.4M682,311.3v28.3" class="g1_2"/>
<path d="M836,339.2h44V311.7H836v27.5Z" class="g3_2"/>
<path d="M835.6,311.7h44.8m-44.8,27.5h44.8M880,311.3v28.3" class="g1_2"/>
<path d="M682,375.8H836V348.3H682v27.5Z" class="g3_2"/>
<path d="M681.6,348.3H836.4M681.6,375.8H836.4M682,347.9v28.3" class="g1_2"/>
<path d="M836,375.8h44V348.3H836v27.5Z" class="g3_2"/>
<path d="M835.6,348.3h44.8m-44.8,27.5h44.8M880,347.9v28.3m-198.4,18H836.4M681.6,421.7H836.4M682,393.8v28.3M835.6,394.2h44.8m-44.8,27.5h44.8M880,393.8v28.3" class="g1_2"/>
<path d="M682,458.3H836V430.8H682v27.5Z" class="g3_2"/>
<path d="M681.6,430.8H836.4M681.6,458.3H836.4M682,430.4v28.3" class="g1_2"/>
<path d="M836,458.3h44V430.8H836v27.5Z" class="g3_2"/>
<path d="M835.6,430.8h44.8m-44.8,27.5h44.8M880,430.4v28.3m-198.4,18H836.4M681.6,504.2H836.4M682,476.3v28.3M835.6,476.7h44.8m-44.8,27.5h44.8M880,476.3v28.3" class="g1_2"/>
<path d="M682,540.8H836V513.3H682v27.5Z" class="g3_2"/>
<path d="M681.6,513.3H836.4M681.6,540.8H836.4M682,512.9v28.3" class="g1_2"/>
<path d="M836,540.8h44V513.3H836v27.5Z" class="g3_2"/>
<path d="M835.6,513.3h44.8m-44.8,27.5h44.8M880,512.9v28.3M681.6,550H836.4M681.6,577.5H836.4M682,549.6v28.3M835.6,550h44.8m-44.8,27.5h44.8M880,549.6v28.3" class="g1_2"/>
<path d="M682,614.2H836V586.7H682v27.5Z" class="g3_2"/>
<path d="M681.6,586.7H836.4M681.6,614.2H836.4M682,586.3v28.3" class="g1_2"/>
<path d="M836,614.2h44V586.7H836v27.5Z" class="g3_2"/>
<path d="M835.6,586.7h44.8m-44.8,27.5h44.8M880,586.3v28.3" class="g1_2"/>
<path d="M682,650.8H836V623.3H682v27.5Z" class="g3_2"/>
<path d="M681.6,623.3H836.4M681.6,650.8H836.4M682,622.9v28.3" class="g1_2"/>
<path d="M836,650.8h44V623.3H836v27.5Z" class="g3_2"/>
<path d="M835.6,623.3h44.8m-44.8,27.5h44.8M880,622.9v28.3M681.6,660H836.4M681.6,687.5H836.4M682,659.6v28.3M835.6,660h44.8m-44.8,27.5h44.8M880,659.6v28.3m-451.4,8.8H539.4M428.6,724.2H539.4M429,696.3v28.3M538.6,696.7h44.8m-44.8,27.5h44.8M583,696.3v28.3" class="g1_2"/>
<path d="M649,722.6h15.3V707.4H649v15.2Z" class="g4_2"/>
<path d="M649,722.6h15.3V707.4H649v15.2Z" class="g1_2"/>
<path d="M770,722.6h15.3V707.4H770v15.2Z" class="g4_2"/>
<path d="M770,722.6h15.3V707.4H770v15.2Z" class="g1_2"/>
<path d="M55,751.7h55V733.3H55v18.4Z" class="g2_2"/>
<path d="M54.6,733.3H880.4M54.6,751.7H880.4" class="g1_2"/>
<path d="M168.7,777.6h15.2V762.4H168.7v15.2Z" class="g4_2"/>
<path d="M168.7,777.6h15.2V762.4H168.7v15.2Z" class="g1_2"/>
<path d="M168.7,805.1h15.2V789.9H168.7v15.2Z" class="g4_2"/>
<path d="M168.7,805.1h15.2V789.9H168.7v15.2Zm28.9,47.4h88.8M197.6,880h88.8M198,852.1v28.3m87.6,-27.9h44.8M285.6,880h44.8M330,852.1v28.3M197.6,898.3h88.8m-88.8,27.5h88.8M198,897.9v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M330,897.9v28.3m-132.4,18h88.8m-88.8,27.5h88.8M198,943.8v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M330,943.8v28.3M384.6,852.5h88.8M384.6,880h88.8M385,852.1v28.3m87.6,-27.9h44.8M472.6,880h44.8M517,852.1v28.3M384.6,898.3h88.8m-88.8,27.5h88.8M385,897.9v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M517,897.9v28.3m-132.4,18h88.8m-88.8,27.5h88.8M385,943.8v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M517,943.8v28.3M571.6,852.5h88.8M571.6,880h88.8M572,852.1v28.3m87.6,-27.9h44.8M659.6,880h44.8M704,852.1v28.3M571.6,898.3h88.8m-88.8,27.5h88.8M572,897.9v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M704,897.9v28.3m-132.4,18h88.8m-88.8,27.5h88.8M572,943.8v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M704,943.8v28.3M747.6,852.5h88.8M747.6,880h88.8M748,852.1v28.3m87.6,-27.9h44.8M835.6,880h44.8M880,852.1v28.3M747.6,898.3h88.8m-88.8,27.5h88.8M748,897.9v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M880,897.9v28.3m-132.4,18h88.8m-88.8,27.5h88.8M748,943.8v28.3m87.6,-27.9h44.8m-44.8,27.5h44.8M880,943.8v28.3m-198.4,8.7H836.4m-154.8,27.5H836.4M682,980.4v28.3M835.6,980.8h44.8m-44.8,27.5h44.8M880,980.4v28.3" class="g1_2"/>
<path d="M54.6,1035.8H781.4m-.8,0h99.8" class="g0_2"/>
</svg>





<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css" >
.t {
	transform-origin: bottom left;
	z-index: 2;
	position: absolute;
	white-space: pre;
	overflow: visible;
	line-height: 1.5;
}
.text-container {
	white-space: pre;
}
@supports (-webkit-touch-callout: none) {
	.text-container {
		white-space: normal;
	}
}


/* Layout Styles */
.page {
    display:block;
    overflow: hidden;
    background-color: white;
}

.page-inner {
    -webkit-transform-origin: top left;
    -ms-transform-origin: top left;
    transform-origin: top left;
}

#formviewer {
    overflow: auto;
    margin: 0;
    padding: 0;
    -webkit-overflow-scrolling: touch;
}

#overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 10;
    visibility: hidden;
}

#overlay.panning {
    visibility: visible;
    cursor: all-scroll;
    cursor: -moz-grab;
    cursor: -webkit-grab;
    cursor: grab;
}

#overlay.panning.mousedown {
    cursor: all-scroll;
    cursor: -moz-grabbing;
    cursor: -webkit-grabbing;
    cursor: grabbing;
}

/* Continuous Layout */
.layout-continuous .page {
    margin: 0 auto 10px;
}
.layout-continuous .page:last-child {
    margin: 0 auto 0;
}

</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_2{left:55px;bottom:1139px;letter-spacing:-0.17px;}
#t2_2{left:88px;bottom:1139px;letter-spacing:-0.14px;}
#t3_2{left:589px;bottom:1139px;letter-spacing:-0.15px;}
#t4_2{left:639px;bottom:1116px;}
#t5_2{left:61px;bottom:1098px;letter-spacing:-0.1px;}
#t6_2{left:116px;bottom:1098px;letter-spacing:-0.12px;}
#t7_2{left:363px;bottom:1098px;letter-spacing:-0.11px;}
#t8_2{left:70px;bottom:1061px;letter-spacing:-0.01px;}
#t9_2{left:99px;bottom:1061px;letter-spacing:-0.01px;}
#ta_2{left:257px;bottom:1061px;}
#tb_2{left:275px;bottom:1061px;}
#tc_2{left:293px;bottom:1061px;}
#td_2{left:312px;bottom:1061px;}
#te_2{left:330px;bottom:1061px;}
#tf_2{left:348px;bottom:1061px;}
#tg_2{left:367px;bottom:1061px;}
#th_2{left:385px;bottom:1061px;}
#ti_2{left:403px;bottom:1061px;}
#tj_2{left:422px;bottom:1061px;}
#tk_2{left:440px;bottom:1061px;}
#tl_2{left:458px;bottom:1061px;}
#tm_2{left:477px;bottom:1061px;}
#tn_2{left:495px;bottom:1061px;}
#to_2{left:513px;bottom:1061px;}
#tp_2{left:532px;bottom:1061px;}
#tq_2{left:550px;bottom:1061px;}
#tr_2{left:568px;bottom:1061px;}
#ts_2{left:587px;bottom:1061px;}
#tt_2{left:605px;bottom:1061px;}
#tu_2{left:623px;bottom:1061px;}
#tv_2{left:642px;bottom:1061px;}
#tw_2{left:662px;bottom:1061px;letter-spacing:-0.01px;}
#tx_2{left:838px;bottom:1057px;}
#ty_2{left:70px;bottom:1025px;letter-spacing:-0.01px;}
#tz_2{left:99px;bottom:1025px;letter-spacing:-0.01px;}
#t10_2{left:257px;bottom:1025px;}
#t11_2{left:275px;bottom:1025px;}
#t12_2{left:293px;bottom:1025px;}
#t13_2{left:312px;bottom:1025px;}
#t14_2{left:330px;bottom:1025px;}
#t15_2{left:348px;bottom:1025px;}
#t16_2{left:367px;bottom:1025px;}
#t17_2{left:385px;bottom:1025px;}
#t18_2{left:403px;bottom:1025px;}
#t19_2{left:422px;bottom:1025px;}
#t1a_2{left:440px;bottom:1025px;}
#t1b_2{left:458px;bottom:1025px;}
#t1c_2{left:477px;bottom:1025px;}
#t1d_2{left:70px;bottom:988px;letter-spacing:-0.01px;}
#t1e_2{left:99px;bottom:988px;letter-spacing:-0.01px;}
#t1f_2{left:277px;bottom:988px;letter-spacing:-0.01px;}
#t1g_2{left:422px;bottom:988px;}
#t1h_2{left:440px;bottom:988px;}
#t1i_2{left:458px;bottom:988px;}
#t1j_2{left:477px;bottom:988px;}
#t1k_2{left:495px;bottom:988px;}
#t1l_2{left:513px;bottom:988px;}
#t1m_2{left:532px;bottom:988px;}
#t1n_2{left:550px;bottom:988px;}
#t1o_2{left:568px;bottom:988px;}
#t1p_2{left:587px;bottom:988px;}
#t1q_2{left:605px;bottom:988px;}
#t1r_2{left:623px;bottom:988px;}
#t1s_2{left:642px;bottom:988px;}
#t1t_2{left:662px;bottom:988px;letter-spacing:-0.01px;}
#t1u_2{left:838px;bottom:984px;}
#t1v_2{left:70px;bottom:951px;}
#t1w_2{left:99px;bottom:951px;letter-spacing:-0.01px;}
#t1x_2{left:454px;bottom:951px;letter-spacing:-0.01px;}
#t1y_2{left:623px;bottom:951px;}
#t1z_2{left:642px;bottom:951px;}
#t20_2{left:667px;bottom:951px;}
#t21_2{left:838px;bottom:947px;}
#t22_2{left:63px;bottom:921px;letter-spacing:-0.01px;}
#t23_2{left:77px;bottom:921px;}
#t24_2{left:99px;bottom:921px;letter-spacing:-0.01px;word-spacing:4.48px;}
#t25_2{left:99px;bottom:905px;letter-spacing:-0.01px;}
#t26_2{left:568px;bottom:905px;}
#t27_2{left:587px;bottom:905px;}
#t28_2{left:605px;bottom:905px;}
#t29_2{left:623px;bottom:905px;}
#t2a_2{left:642px;bottom:905px;}
#t2b_2{left:655px;bottom:905px;letter-spacing:-0.01px;}
#t2c_2{left:838px;bottom:901px;}
#t2d_2{left:63px;bottom:869px;letter-spacing:-0.01px;}
#t2e_2{left:99px;bottom:869px;letter-spacing:-0.01px;}
#t2f_2{left:257px;bottom:869px;}
#t2g_2{left:275px;bottom:869px;}
#t2h_2{left:293px;bottom:869px;}
#t2i_2{left:312px;bottom:869px;}
#t2j_2{left:330px;bottom:869px;}
#t2k_2{left:348px;bottom:869px;}
#t2l_2{left:367px;bottom:869px;}
#t2m_2{left:385px;bottom:869px;}
#t2n_2{left:403px;bottom:869px;}
#t2o_2{left:422px;bottom:869px;}
#t2p_2{left:440px;bottom:869px;}
#t2q_2{left:458px;bottom:869px;}
#t2r_2{left:477px;bottom:869px;}
#t2s_2{left:495px;bottom:869px;}
#t2t_2{left:513px;bottom:869px;}
#t2u_2{left:532px;bottom:869px;}
#t2v_2{left:550px;bottom:869px;}
#t2w_2{left:568px;bottom:869px;}
#t2x_2{left:587px;bottom:869px;}
#t2y_2{left:605px;bottom:869px;}
#t2z_2{left:623px;bottom:869px;}
#t30_2{left:642px;bottom:869px;}
#t31_2{left:654px;bottom:869px;letter-spacing:-0.01px;}
#t32_2{left:838px;bottom:865px;}
#t33_2{left:63px;bottom:832px;letter-spacing:-0.01px;}
#t34_2{left:99px;bottom:832px;letter-spacing:-0.01px;}
#t35_2{left:257px;bottom:832px;}
#t36_2{left:275px;bottom:832px;}
#t37_2{left:293px;bottom:832px;}
#t38_2{left:312px;bottom:832px;}
#t39_2{left:330px;bottom:832px;}
#t3a_2{left:348px;bottom:832px;}
#t3b_2{left:367px;bottom:832px;}
#t3c_2{left:385px;bottom:832px;}
#t3d_2{left:403px;bottom:832px;}
#t3e_2{left:422px;bottom:832px;}
#t3f_2{left:440px;bottom:832px;}
#t3g_2{left:458px;bottom:832px;}
#t3h_2{left:477px;bottom:832px;}
#t3i_2{left:495px;bottom:832px;}
#t3j_2{left:513px;bottom:832px;}
#t3k_2{left:532px;bottom:832px;}
#t3l_2{left:550px;bottom:832px;}
#t3m_2{left:568px;bottom:832px;}
#t3n_2{left:587px;bottom:832px;}
#t3o_2{left:605px;bottom:832px;}
#t3p_2{left:623px;bottom:832px;}
#t3q_2{left:642px;bottom:832px;}
#t3r_2{left:655px;bottom:832px;letter-spacing:-0.01px;}
#t3s_2{left:838px;bottom:828px;}
#t3t_2{left:63px;bottom:802px;letter-spacing:-0.01px;}
#t3u_2{left:99px;bottom:802px;letter-spacing:-0.01px;word-spacing:2.09px;}
#t3v_2{left:99px;bottom:786px;letter-spacing:-0.01px;}
#t3w_2{left:220px;bottom:786px;}
#t3x_2{left:238px;bottom:786px;}
#t3y_2{left:257px;bottom:786px;}
#t3z_2{left:275px;bottom:786px;}
#t40_2{left:293px;bottom:786px;}
#t41_2{left:312px;bottom:786px;}
#t42_2{left:330px;bottom:786px;}
#t43_2{left:348px;bottom:786px;}
#t44_2{left:367px;bottom:786px;}
#t45_2{left:385px;bottom:786px;}
#t46_2{left:403px;bottom:786px;}
#t47_2{left:422px;bottom:786px;}
#t48_2{left:440px;bottom:786px;}
#t49_2{left:458px;bottom:786px;}
#t4a_2{left:477px;bottom:786px;}
#t4b_2{left:495px;bottom:786px;}
#t4c_2{left:513px;bottom:786px;}
#t4d_2{left:532px;bottom:786px;}
#t4e_2{left:550px;bottom:786px;}
#t4f_2{left:568px;bottom:786px;}
#t4g_2{left:587px;bottom:786px;}
#t4h_2{left:605px;bottom:786px;}
#t4i_2{left:623px;bottom:786px;}
#t4j_2{left:642px;bottom:786px;}
#t4k_2{left:654px;bottom:786px;letter-spacing:-0.01px;}
#t4l_2{left:838px;bottom:782px;}
#t4m_2{left:63px;bottom:750px;letter-spacing:-0.01px;}
#t4n_2{left:99px;bottom:750px;letter-spacing:-0.01px;}
#t4o_2{left:257px;bottom:750px;}
#t4p_2{left:275px;bottom:750px;}
#t4q_2{left:293px;bottom:750px;}
#t4r_2{left:312px;bottom:750px;}
#t4s_2{left:330px;bottom:750px;}
#t4t_2{left:348px;bottom:750px;}
#t4u_2{left:367px;bottom:750px;}
#t4v_2{left:385px;bottom:750px;}
#t4w_2{left:403px;bottom:750px;}
#t4x_2{left:422px;bottom:750px;}
#t4y_2{left:440px;bottom:750px;}
#t4z_2{left:458px;bottom:750px;}
#t50_2{left:477px;bottom:750px;}
#t51_2{left:495px;bottom:750px;}
#t52_2{left:513px;bottom:750px;}
#t53_2{left:532px;bottom:750px;}
#t54_2{left:550px;bottom:750px;}
#t55_2{left:568px;bottom:750px;}
#t56_2{left:587px;bottom:750px;}
#t57_2{left:605px;bottom:750px;}
#t58_2{left:623px;bottom:750px;}
#t59_2{left:642px;bottom:750px;}
#t5a_2{left:655px;bottom:750px;letter-spacing:-0.01px;}
#t5b_2{left:838px;bottom:746px;}
#t5c_2{left:63px;bottom:719px;letter-spacing:-0.01px;}
#t5d_2{left:99px;bottom:719px;letter-spacing:-0.01px;word-spacing:2.09px;}
#t5e_2{left:99px;bottom:704px;letter-spacing:-0.01px;}
#t5f_2{left:422px;bottom:704px;}
#t5g_2{left:440px;bottom:704px;}
#t5h_2{left:458px;bottom:704px;}
#t5i_2{left:477px;bottom:704px;}
#t5j_2{left:495px;bottom:704px;}
#t5k_2{left:513px;bottom:704px;}
#t5l_2{left:532px;bottom:704px;}
#t5m_2{left:550px;bottom:704px;}
#t5n_2{left:568px;bottom:704px;}
#t5o_2{left:587px;bottom:704px;}
#t5p_2{left:605px;bottom:704px;}
#t5q_2{left:623px;bottom:704px;}
#t5r_2{left:642px;bottom:704px;}
#t5s_2{left:658px;bottom:704px;letter-spacing:-0.01px;}
#t5t_2{left:838px;bottom:700px;}
#t5u_2{left:63px;bottom:667px;letter-spacing:-0.01px;}
#t5v_2{left:99px;bottom:667px;letter-spacing:-0.01px;}
#t5w_2{left:257px;bottom:667px;}
#t5x_2{left:275px;bottom:667px;}
#t5y_2{left:293px;bottom:667px;}
#t5z_2{left:312px;bottom:667px;}
#t60_2{left:330px;bottom:667px;}
#t61_2{left:348px;bottom:667px;}
#t62_2{left:367px;bottom:667px;}
#t63_2{left:385px;bottom:667px;}
#t64_2{left:403px;bottom:667px;}
#t65_2{left:422px;bottom:667px;}
#t66_2{left:440px;bottom:667px;}
#t67_2{left:458px;bottom:667px;}
#t68_2{left:477px;bottom:667px;}
#t69_2{left:495px;bottom:667px;}
#t6a_2{left:513px;bottom:667px;}
#t6b_2{left:532px;bottom:667px;}
#t6c_2{left:550px;bottom:667px;}
#t6d_2{left:568px;bottom:667px;}
#t6e_2{left:587px;bottom:667px;}
#t6f_2{left:605px;bottom:667px;}
#t6g_2{left:623px;bottom:667px;}
#t6h_2{left:642px;bottom:667px;}
#t6i_2{left:654px;bottom:667px;letter-spacing:-0.01px;}
#t6j_2{left:838px;bottom:663px;}
#t6k_2{left:63px;bottom:630px;letter-spacing:-0.01px;}
#t6l_2{left:99px;bottom:630px;letter-spacing:-0.01px;}
#t6m_2{left:330px;bottom:630px;letter-spacing:-0.01px;}
#t6n_2{left:513px;bottom:630px;}
#t6o_2{left:532px;bottom:630px;}
#t6p_2{left:550px;bottom:630px;}
#t6q_2{left:568px;bottom:630px;}
#t6r_2{left:587px;bottom:630px;}
#t6s_2{left:605px;bottom:630px;}
#t6t_2{left:623px;bottom:630px;}
#t6u_2{left:642px;bottom:630px;}
#t6v_2{left:655px;bottom:630px;letter-spacing:-0.01px;}
#t6w_2{left:838px;bottom:626px;}
#t6x_2{left:63px;bottom:594px;letter-spacing:-0.01px;}
#t6y_2{left:99px;bottom:594px;letter-spacing:-0.01px;}
#t6z_2{left:257px;bottom:594px;}
#t70_2{left:275px;bottom:594px;}
#t71_2{left:293px;bottom:594px;}
#t72_2{left:312px;bottom:594px;}
#t73_2{left:330px;bottom:594px;}
#t74_2{left:348px;bottom:594px;}
#t75_2{left:367px;bottom:594px;}
#t76_2{left:385px;bottom:594px;}
#t77_2{left:403px;bottom:594px;}
#t78_2{left:422px;bottom:594px;}
#t79_2{left:440px;bottom:594px;}
#t7a_2{left:458px;bottom:594px;}
#t7b_2{left:477px;bottom:594px;}
#t7c_2{left:495px;bottom:594px;}
#t7d_2{left:513px;bottom:594px;}
#t7e_2{left:532px;bottom:594px;}
#t7f_2{left:550px;bottom:594px;}
#t7g_2{left:568px;bottom:594px;}
#t7h_2{left:587px;bottom:594px;}
#t7i_2{left:605px;bottom:594px;}
#t7j_2{left:623px;bottom:594px;}
#t7k_2{left:642px;bottom:594px;}
#t7l_2{left:659px;bottom:594px;letter-spacing:-0.01px;}
#t7m_2{left:838px;bottom:590px;}
#t7n_2{left:63px;bottom:557px;letter-spacing:-0.01px;}
#t7o_2{left:99px;bottom:557px;letter-spacing:-0.01px;}
#t7p_2{left:257px;bottom:557px;}
#t7q_2{left:275px;bottom:557px;}
#t7r_2{left:293px;bottom:557px;}
#t7s_2{left:312px;bottom:557px;}
#t7t_2{left:330px;bottom:557px;}
#t7u_2{left:348px;bottom:557px;}
#t7v_2{left:367px;bottom:557px;}
#t7w_2{left:385px;bottom:557px;}
#t7x_2{left:403px;bottom:557px;}
#t7y_2{left:422px;bottom:557px;}
#t7z_2{left:440px;bottom:557px;}
#t80_2{left:458px;bottom:557px;}
#t81_2{left:477px;bottom:557px;}
#t82_2{left:495px;bottom:557px;}
#t83_2{left:513px;bottom:557px;}
#t84_2{left:532px;bottom:557px;}
#t85_2{left:550px;bottom:557px;}
#t86_2{left:568px;bottom:557px;}
#t87_2{left:587px;bottom:557px;}
#t88_2{left:605px;bottom:557px;}
#t89_2{left:623px;bottom:557px;}
#t8a_2{left:642px;bottom:557px;}
#t8b_2{left:659px;bottom:557px;letter-spacing:-0.01px;}
#t8c_2{left:838px;bottom:553px;}
#t8d_2{left:63px;bottom:520px;letter-spacing:-0.01px;}
#t8e_2{left:99px;bottom:520px;letter-spacing:-0.01px;}
#t8f_2{left:183px;bottom:520px;letter-spacing:-0.01px;}
#t8g_2{left:605px;bottom:520px;}
#t8h_2{left:623px;bottom:520px;}
#t8i_2{left:642px;bottom:520px;}
#t8j_2{left:664px;bottom:520px;letter-spacing:-0.01px;}
#t8k_2{left:838px;bottom:516px;}
#t8l_2{left:63px;bottom:484px;letter-spacing:-0.01px;}
#t8m_2{left:99px;bottom:484px;letter-spacing:0.24px;}
#t8n_2{left:177px;bottom:484px;letter-spacing:0.19px;}
#t8o_2{left:541px;bottom:480px;}
#t8p_2{left:587px;bottom:484px;letter-spacing:0.23px;}
#t8q_2{left:671px;bottom:484px;letter-spacing:-0.03px;}
#t8r_2{left:792px;bottom:484px;letter-spacing:-0.03px;}
#t8s_2{left:61px;bottom:456px;letter-spacing:-0.1px;}
#t8t_2{left:116px;bottom:456px;letter-spacing:-0.11px;}
#t8u_2{left:63px;bottom:429px;letter-spacing:-0.01px;}
#t8v_2{left:88px;bottom:429px;letter-spacing:-0.01px;}
#t8w_2{left:198px;bottom:429px;letter-spacing:-0.01px;}
#t8x_2{left:198px;bottom:405px;letter-spacing:-0.01px;}
#t8y_2{left:198px;bottom:389px;letter-spacing:-0.01px;}
#t8z_2{left:198px;bottom:374px;letter-spacing:-0.01px;}
#t90_2{left:166px;bottom:328px;letter-spacing:0.26px;}
#t91_2{left:253px;bottom:356px;letter-spacing:0.22px;}
#t92_2{left:288px;bottom:324px;}
#t93_2{left:166px;bottom:282px;letter-spacing:0.26px;}
#t94_2{left:253px;bottom:310px;letter-spacing:0.23px;}
#t95_2{left:288px;bottom:278px;}
#t96_2{left:166px;bottom:236px;letter-spacing:0.26px;}
#t97_2{left:252px;bottom:264px;letter-spacing:0.23px;}
#t98_2{left:288px;bottom:232px;}
#t99_2{left:353px;bottom:328px;letter-spacing:0.26px;}
#t9a_2{left:440px;bottom:356px;letter-spacing:0.21px;}
#t9b_2{left:475px;bottom:324px;}
#t9c_2{left:353px;bottom:282px;letter-spacing:0.26px;}
#t9d_2{left:440px;bottom:310px;letter-spacing:0.29px;}
#t9e_2{left:475px;bottom:278px;}
#t9f_2{left:355px;bottom:236px;letter-spacing:0.22px;}
#t9g_2{left:439px;bottom:264px;letter-spacing:0.25px;}
#t9h_2{left:475px;bottom:232px;}
#t9i_2{left:540px;bottom:328px;letter-spacing:0.26px;}
#t9j_2{left:628px;bottom:356px;letter-spacing:0.21px;}
#t9k_2{left:662px;bottom:324px;}
#t9l_2{left:540px;bottom:282px;letter-spacing:0.26px;}
#t9m_2{left:626px;bottom:310px;letter-spacing:0.24px;}
#t9n_2{left:662px;bottom:278px;}
#t9o_2{left:542px;bottom:236px;letter-spacing:0.21px;}
#t9p_2{left:624px;bottom:264px;letter-spacing:0.22px;}
#t9q_2{left:662px;bottom:232px;}
#t9r_2{left:718px;bottom:328px;letter-spacing:0.21px;}
#t9s_2{left:803px;bottom:356px;letter-spacing:0.22px;}
#t9t_2{left:838px;bottom:324px;}
#t9u_2{left:716px;bottom:282px;letter-spacing:0.26px;}
#t9v_2{left:802px;bottom:310px;letter-spacing:0.24px;}
#t9w_2{left:838px;bottom:278px;}
#t9x_2{left:718px;bottom:236px;letter-spacing:0.21px;}
#t9y_2{left:802px;bottom:264px;letter-spacing:0.24px;}
#t9z_2{left:838px;bottom:232px;}
#ta0_2{left:165px;bottom:200px;letter-spacing:-0.01px;}
#ta1_2{left:641px;bottom:200px;letter-spacing:-0.01px;}
#ta2_2{left:838px;bottom:196px;}
#ta3_2{left:99px;bottom:175px;letter-spacing:-0.01px;}
#ta4_2{left:55px;bottom:155px;letter-spacing:-0.14px;}
#ta5_2{left:83px;bottom:153px;}
#ta6_2{left:794px;bottom:155px;letter-spacing:-0.14px;}
#ta7_2{left:822px;bottom:153px;letter-spacing:0.15px;}
#ta8_2{left:851px;bottom:155px;letter-spacing:-0.14px;}

.s0_2{font-size:11px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s1_2{font-size:11px;font-family:HelveticaNeueLTStd-It_1ky;color:#000;}
.s2_2{font-size:15px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s3_2{font-size:14px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#FFF;}
.s4_2{font-size:14px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s5_2{font-size:14px;font-family:HelveticaNeueLTStd-It_1ky;color:#000;}
.s6_2{font-size:13px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s7_2{font-size:13px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s8_2{font-size:23px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s9_2{font-size:11px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.sa_2{font-size:10px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.sb_2{font-size:15px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.t.v0_2{transform:scaleX(0.979);}
#form1_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 55px;	top: 70px;	width: 425px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 605px;	top: 70px;	width: 32px;	height: 20px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 648px;	top: 70px;	width: 74px;	height: 20px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/334 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 119px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form5_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/335 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 119px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form6_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/336 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 495px;	top: 156px;	width: 132px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 193px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form8_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 193px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form9_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 229px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form10_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 229px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form11_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 275px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form12_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 275px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form13_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/343 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 312px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form14_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/344 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 312px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form15_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/345 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 349px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form16_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/346 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 349px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form17_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 394px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form18_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 394px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form19_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/349 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 431px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form20_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/350 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 431px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form21_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 477px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form22_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 477px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form23_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/353 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 514px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form24_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/354 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 514px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form25_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 550px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form26_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 550px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form27_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/357 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 587px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form28_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/358 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 587px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form29_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/359 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 624px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form30_2{	z-index: 2;	background-size: 100% 100%;	background-image: url("2/form/360 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 624px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form31_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 660px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form32_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 660px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form33_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 649px;	top: 708px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form34_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 770px;	top: 708px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form35_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 429px;	top: 697px;	width: 109px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form36_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 550px;	top: 697px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form37_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 168px;	top: 763px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form38_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 168px;	top: 790px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form39_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 199px;	top: 853px;	width: 86px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form40_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 297px;	top: 853px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form41_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 385px;	top: 853px;	width: 87px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form42_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 484px;	top: 853px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form43_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 572px;	top: 853px;	width: 87px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form44_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 671px;	top: 853px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form45_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 749px;	top: 853px;	width: 86px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form46_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 853px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form47_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 199px;	top: 899px;	width: 86px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form48_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 297px;	top: 899px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form49_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 385px;	top: 899px;	width: 87px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form50_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 484px;	top: 899px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form51_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 572px;	top: 899px;	width: 87px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form52_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 671px;	top: 899px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form53_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 749px;	top: 899px;	width: 86px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form54_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 899px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form55_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 199px;	top: 944px;	width: 86px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form56_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 297px;	top: 944px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form57_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 385px;	top: 944px;	width: 87px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form58_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 484px;	top: 944px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form59_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 572px;	top: 944px;	width: 87px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form60_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 671px;	top: 944px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form61_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 749px;	top: 944px;	width: 86px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form62_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 944px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form63_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 981px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form64_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 981px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form33_2 { z-index:5; }
#form34_2 { z-index:4; }
#form37_2 { z-index:3; }
#form38_2 { z-index:2; }

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts2" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_1kx;
	src: url("fonts/HelveticaNeueLTStd-Bd_1kx.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_1ky;
	src: url("fonts/HelveticaNeueLTStd-It_1ky.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_1kz;
	src: url("fonts/HelveticaNeueLTStd-Roman_1kz.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg2Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg2" style="-webkit-user-select: none;"><object width="935" height="1210" data="2/2.svg" type="image/svg+xml" id="pdf2" style="width:935px; height:1210px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_2" class="t s0_2">Name </span><span id="t2_2" class="t s1_2">(not your trade name) </span><span id="t3_2" class="t s0_2">Employer identification number (EIN) </span>
<span id="t4_2" class="t s2_2">– </span>
<span id="t5_2" class="t s3_2">Part 1: </span><span id="t6_2" class="t s4_2">Answer these questions for this year. </span><span id="t7_2" class="t s5_2">(continued) </span>
<span id="t8_2" class="t s6_2">8e </span><span id="t9_2" class="t s6_2">Reserved for future use </span><span id="ta_2" class="t s7_2">. </span><span id="tb_2" class="t s7_2">. </span><span id="tc_2" class="t s7_2">. </span><span id="td_2" class="t s7_2">. </span><span id="te_2" class="t s7_2">. </span><span id="tf_2" class="t s7_2">. </span><span id="tg_2" class="t s7_2">. </span><span id="th_2" class="t s7_2">. </span><span id="ti_2" class="t s7_2">. </span><span id="tj_2" class="t s7_2">. </span><span id="tk_2" class="t s7_2">. </span><span id="tl_2" class="t s7_2">. </span><span id="tm_2" class="t s7_2">. </span><span id="tn_2" class="t s7_2">. </span><span id="to_2" class="t s7_2">. </span><span id="tp_2" class="t s7_2">. </span><span id="tq_2" class="t s7_2">. </span><span id="tr_2" class="t s7_2">. </span><span id="ts_2" class="t s7_2">. </span><span id="tt_2" class="t s7_2">. </span><span id="tu_2" class="t s7_2">. </span><span id="tv_2" class="t s7_2">. </span><span id="tw_2" class="t s6_2">8e </span><span id="tx_2" class="t s8_2">. </span>
<span id="ty_2" class="t s6_2">8f </span><span id="tz_2" class="t s6_2">Reserved for future use </span><span id="t10_2" class="t s7_2">. </span><span id="t11_2" class="t s7_2">. </span><span id="t12_2" class="t s7_2">. </span><span id="t13_2" class="t s7_2">. </span><span id="t14_2" class="t s7_2">. </span><span id="t15_2" class="t s7_2">. </span><span id="t16_2" class="t s7_2">. </span><span id="t17_2" class="t s7_2">. </span><span id="t18_2" class="t s7_2">. </span><span id="t19_2" class="t s7_2">. </span><span id="t1a_2" class="t s7_2">. </span><span id="t1b_2" class="t s7_2">. </span><span id="t1c_2" class="t s7_2">. </span>
<span id="t1d_2" class="t s6_2">8g </span><span id="t1e_2" class="t s6_2">Total nonrefundable credits. </span><span id="t1f_2" class="t s7_2">Add lines 8a, 8b, and 8d </span><span id="t1g_2" class="t s7_2">. </span><span id="t1h_2" class="t s7_2">. </span><span id="t1i_2" class="t s7_2">. </span><span id="t1j_2" class="t s7_2">. </span><span id="t1k_2" class="t s7_2">. </span><span id="t1l_2" class="t s7_2">. </span><span id="t1m_2" class="t s7_2">. </span><span id="t1n_2" class="t s7_2">. </span><span id="t1o_2" class="t s7_2">. </span><span id="t1p_2" class="t s7_2">. </span><span id="t1q_2" class="t s7_2">. </span><span id="t1r_2" class="t s7_2">. </span><span id="t1s_2" class="t s7_2">. </span><span id="t1t_2" class="t s6_2">8g </span><span id="t1u_2" class="t s8_2">. </span>
<span id="t1v_2" class="t s6_2">9 </span><span id="t1w_2" class="t s6_2">Total taxes after adjustments and nonrefundable credits. </span><span id="t1x_2" class="t s7_2">Subtract line 8g from line 7 </span><span id="t1y_2" class="t s7_2">. </span><span id="t1z_2" class="t s7_2">. </span><span id="t20_2" class="t s6_2">9 </span><span id="t21_2" class="t s8_2">. </span>
<span id="t22_2" class="t s6_2">10 </span><span id="t23_2" class="t s6_2">a </span><span id="t24_2" class="t s6_2">Total deposits for this year, including overpayment applied from a prior year and </span>
<span id="t25_2" class="t s6_2">overpayments applied from Form 944-X, 944-X (SP), 941-X, or 941-X (PR) </span><span id="t26_2" class="t s7_2">. </span><span id="t27_2" class="t s7_2">. </span><span id="t28_2" class="t s7_2">. </span><span id="t29_2" class="t s7_2">. </span><span id="t2a_2" class="t s7_2">. </span><span id="t2b_2" class="t s6_2">10a </span><span id="t2c_2" class="t s8_2">. </span>
<span id="t2d_2" class="t s6_2">10b </span><span id="t2e_2" class="t s6_2">Reserved for future use </span><span id="t2f_2" class="t s7_2">. </span><span id="t2g_2" class="t s7_2">. </span><span id="t2h_2" class="t s7_2">. </span><span id="t2i_2" class="t s7_2">. </span><span id="t2j_2" class="t s7_2">. </span><span id="t2k_2" class="t s7_2">. </span><span id="t2l_2" class="t s7_2">. </span><span id="t2m_2" class="t s7_2">. </span><span id="t2n_2" class="t s7_2">. </span><span id="t2o_2" class="t s7_2">. </span><span id="t2p_2" class="t s7_2">. </span><span id="t2q_2" class="t s7_2">. </span><span id="t2r_2" class="t s7_2">. </span><span id="t2s_2" class="t s7_2">. </span><span id="t2t_2" class="t s7_2">. </span><span id="t2u_2" class="t s7_2">. </span><span id="t2v_2" class="t s7_2">. </span><span id="t2w_2" class="t s7_2">. </span><span id="t2x_2" class="t s7_2">. </span><span id="t2y_2" class="t s7_2">. </span><span id="t2z_2" class="t s7_2">. </span><span id="t30_2" class="t s7_2">. </span><span id="t31_2" class="t s6_2">10b </span><span id="t32_2" class="t s8_2">. </span>
<span id="t33_2" class="t s6_2">10c </span><span id="t34_2" class="t s6_2">Reserved for future use </span><span id="t35_2" class="t s7_2">. </span><span id="t36_2" class="t s7_2">. </span><span id="t37_2" class="t s7_2">. </span><span id="t38_2" class="t s7_2">. </span><span id="t39_2" class="t s7_2">. </span><span id="t3a_2" class="t s7_2">. </span><span id="t3b_2" class="t s7_2">. </span><span id="t3c_2" class="t s7_2">. </span><span id="t3d_2" class="t s7_2">. </span><span id="t3e_2" class="t s7_2">. </span><span id="t3f_2" class="t s7_2">. </span><span id="t3g_2" class="t s7_2">. </span><span id="t3h_2" class="t s7_2">. </span><span id="t3i_2" class="t s7_2">. </span><span id="t3j_2" class="t s7_2">. </span><span id="t3k_2" class="t s7_2">. </span><span id="t3l_2" class="t s7_2">. </span><span id="t3m_2" class="t s7_2">. </span><span id="t3n_2" class="t s7_2">. </span><span id="t3o_2" class="t s7_2">. </span><span id="t3p_2" class="t s7_2">. </span><span id="t3q_2" class="t s7_2">. </span><span id="t3r_2" class="t s6_2">10c </span><span id="t3s_2" class="t s8_2">. </span>
<span id="t3t_2" class="t s6_2">10d </span><span id="t3u_2" class="t s6_2">Refundable portion of credit for qualified sick and family leave wages for leave taken </span>
<span id="t3v_2" class="t s6_2">before April 1, 2021 </span><span id="t3w_2" class="t s7_2">. </span><span id="t3x_2" class="t s7_2">. </span><span id="t3y_2" class="t s7_2">. </span><span id="t3z_2" class="t s7_2">. </span><span id="t40_2" class="t s7_2">. </span><span id="t41_2" class="t s7_2">. </span><span id="t42_2" class="t s7_2">. </span><span id="t43_2" class="t s7_2">. </span><span id="t44_2" class="t s7_2">. </span><span id="t45_2" class="t s7_2">. </span><span id="t46_2" class="t s7_2">. </span><span id="t47_2" class="t s7_2">. </span><span id="t48_2" class="t s7_2">. </span><span id="t49_2" class="t s7_2">. </span><span id="t4a_2" class="t s7_2">. </span><span id="t4b_2" class="t s7_2">. </span><span id="t4c_2" class="t s7_2">. </span><span id="t4d_2" class="t s7_2">. </span><span id="t4e_2" class="t s7_2">. </span><span id="t4f_2" class="t s7_2">. </span><span id="t4g_2" class="t s7_2">. </span><span id="t4h_2" class="t s7_2">. </span><span id="t4i_2" class="t s7_2">. </span><span id="t4j_2" class="t s7_2">. </span><span id="t4k_2" class="t s6_2">10d </span><span id="t4l_2" class="t s8_2">. </span>
<span id="t4m_2" class="t s6_2">10e </span><span id="t4n_2" class="t s6_2">Reserved for future use </span><span id="t4o_2" class="t s7_2">. </span><span id="t4p_2" class="t s7_2">. </span><span id="t4q_2" class="t s7_2">. </span><span id="t4r_2" class="t s7_2">. </span><span id="t4s_2" class="t s7_2">. </span><span id="t4t_2" class="t s7_2">. </span><span id="t4u_2" class="t s7_2">. </span><span id="t4v_2" class="t s7_2">. </span><span id="t4w_2" class="t s7_2">. </span><span id="t4x_2" class="t s7_2">. </span><span id="t4y_2" class="t s7_2">. </span><span id="t4z_2" class="t s7_2">. </span><span id="t50_2" class="t s7_2">. </span><span id="t51_2" class="t s7_2">. </span><span id="t52_2" class="t s7_2">. </span><span id="t53_2" class="t s7_2">. </span><span id="t54_2" class="t s7_2">. </span><span id="t55_2" class="t s7_2">. </span><span id="t56_2" class="t s7_2">. </span><span id="t57_2" class="t s7_2">. </span><span id="t58_2" class="t s7_2">. </span><span id="t59_2" class="t s7_2">. </span><span id="t5a_2" class="t s6_2">10e </span><span id="t5b_2" class="t s8_2">. </span>
<span id="t5c_2" class="t s6_2">10f </span><span id="t5d_2" class="t s6_2">Refundable portion of credit for qualified sick and family leave wages for leave taken </span>
<span id="t5e_2" class="t s6_2">after March 31, 2021, and before October 1, 2021 </span><span id="t5f_2" class="t s7_2">. </span><span id="t5g_2" class="t s7_2">. </span><span id="t5h_2" class="t s7_2">. </span><span id="t5i_2" class="t s7_2">. </span><span id="t5j_2" class="t s7_2">. </span><span id="t5k_2" class="t s7_2">. </span><span id="t5l_2" class="t s7_2">. </span><span id="t5m_2" class="t s7_2">. </span><span id="t5n_2" class="t s7_2">. </span><span id="t5o_2" class="t s7_2">. </span><span id="t5p_2" class="t s7_2">. </span><span id="t5q_2" class="t s7_2">. </span><span id="t5r_2" class="t s7_2">. </span><span id="t5s_2" class="t s6_2">10f </span><span id="t5t_2" class="t s8_2">. </span>
<span id="t5u_2" class="t s6_2">10g </span><span id="t5v_2" class="t s6_2">Reserved for future use </span><span id="t5w_2" class="t s7_2">. </span><span id="t5x_2" class="t s7_2">. </span><span id="t5y_2" class="t s7_2">. </span><span id="t5z_2" class="t s7_2">. </span><span id="t60_2" class="t s7_2">. </span><span id="t61_2" class="t s7_2">. </span><span id="t62_2" class="t s7_2">. </span><span id="t63_2" class="t s7_2">. </span><span id="t64_2" class="t s7_2">. </span><span id="t65_2" class="t s7_2">. </span><span id="t66_2" class="t s7_2">. </span><span id="t67_2" class="t s7_2">. </span><span id="t68_2" class="t s7_2">. </span><span id="t69_2" class="t s7_2">. </span><span id="t6a_2" class="t s7_2">. </span><span id="t6b_2" class="t s7_2">. </span><span id="t6c_2" class="t s7_2">. </span><span id="t6d_2" class="t s7_2">. </span><span id="t6e_2" class="t s7_2">. </span><span id="t6f_2" class="t s7_2">. </span><span id="t6g_2" class="t s7_2">. </span><span id="t6h_2" class="t s7_2">. </span><span id="t6i_2" class="t s6_2">10g </span><span id="t6j_2" class="t s8_2">. </span>
<span id="t6k_2" class="t s6_2">10h </span><span id="t6l_2" class="t s6_2">Total deposits and refundable credits</span><span id="t6m_2" class="t s7_2">. Add lines 10a, 10d, and 10f </span><span id="t6n_2" class="t s7_2">. </span><span id="t6o_2" class="t s7_2">. </span><span id="t6p_2" class="t s7_2">. </span><span id="t6q_2" class="t s7_2">. </span><span id="t6r_2" class="t s7_2">. </span><span id="t6s_2" class="t s7_2">. </span><span id="t6t_2" class="t s7_2">. </span><span id="t6u_2" class="t s7_2">. </span><span id="t6v_2" class="t s6_2">10h </span><span id="t6w_2" class="t s8_2">. </span>
<span id="t6x_2" class="t s6_2">10i </span><span id="t6y_2" class="t s6_2">Reserved for future use </span><span id="t6z_2" class="t s7_2">. </span><span id="t70_2" class="t s7_2">. </span><span id="t71_2" class="t s7_2">. </span><span id="t72_2" class="t s7_2">. </span><span id="t73_2" class="t s7_2">. </span><span id="t74_2" class="t s7_2">. </span><span id="t75_2" class="t s7_2">. </span><span id="t76_2" class="t s7_2">. </span><span id="t77_2" class="t s7_2">. </span><span id="t78_2" class="t s7_2">. </span><span id="t79_2" class="t s7_2">. </span><span id="t7a_2" class="t s7_2">. </span><span id="t7b_2" class="t s7_2">. </span><span id="t7c_2" class="t s7_2">. </span><span id="t7d_2" class="t s7_2">. </span><span id="t7e_2" class="t s7_2">. </span><span id="t7f_2" class="t s7_2">. </span><span id="t7g_2" class="t s7_2">. </span><span id="t7h_2" class="t s7_2">. </span><span id="t7i_2" class="t s7_2">. </span><span id="t7j_2" class="t s7_2">. </span><span id="t7k_2" class="t s7_2">. </span><span id="t7l_2" class="t s6_2">10i </span><span id="t7m_2" class="t s8_2">. </span>
<span id="t7n_2" class="t s6_2">10j </span><span id="t7o_2" class="t s6_2">Reserved for future use </span><span id="t7p_2" class="t s7_2">. </span><span id="t7q_2" class="t s7_2">. </span><span id="t7r_2" class="t s7_2">. </span><span id="t7s_2" class="t s7_2">. </span><span id="t7t_2" class="t s7_2">. </span><span id="t7u_2" class="t s7_2">. </span><span id="t7v_2" class="t s7_2">. </span><span id="t7w_2" class="t s7_2">. </span><span id="t7x_2" class="t s7_2">. </span><span id="t7y_2" class="t s7_2">. </span><span id="t7z_2" class="t s7_2">. </span><span id="t80_2" class="t s7_2">. </span><span id="t81_2" class="t s7_2">. </span><span id="t82_2" class="t s7_2">. </span><span id="t83_2" class="t s7_2">. </span><span id="t84_2" class="t s7_2">. </span><span id="t85_2" class="t s7_2">. </span><span id="t86_2" class="t s7_2">. </span><span id="t87_2" class="t s7_2">. </span><span id="t88_2" class="t s7_2">. </span><span id="t89_2" class="t s7_2">. </span><span id="t8a_2" class="t s7_2">. </span><span id="t8b_2" class="t s6_2">10j </span><span id="t8c_2" class="t s8_2">. </span>
<span id="t8d_2" class="t s6_2">11 </span><span id="t8e_2" class="t s6_2">Balance due. </span><span id="t8f_2" class="t s7_2">If line 9 is more than line 10h, enter the difference and see instructions </span><span id="t8g_2" class="t s7_2">. </span><span id="t8h_2" class="t s7_2">. </span><span id="t8i_2" class="t s7_2">. </span><span id="t8j_2" class="t s6_2">11 </span><span id="t8k_2" class="t s8_2">. </span>
<span id="t8l_2" class="t s6_2">12 </span><span id="t8m_2" class="t v0_2 s0_2">Overpayment. </span><span id="t8n_2" class="t v0_2 s9_2">If line 10h is more than line 9, enter the difference </span><span id="t8o_2" class="t s8_2">. </span><span id="t8p_2" class="t s9_2">Check one: </span><span id="t8q_2" class="t sa_2">Apply to next return. </span><span id="t8r_2" class="t sa_2">Send a refund. </span>
<span id="t8s_2" class="t s3_2">Part 2: </span><span id="t8t_2" class="t s4_2">Tell us about your deposit schedule and tax liability for this year. </span>
<span id="t8u_2" class="t s6_2">13 </span><span id="t8v_2" class="t s6_2">Check one: </span><span id="t8w_2" class="t s6_2">Line 9 is less than $2,500. Go to Part 3. </span>
<span id="t8x_2" class="t s6_2">Line 9 is $2,500 or more. Enter your tax liability for each month. If you’re a semiweekly schedule depositor or </span>
<span id="t8y_2" class="t s6_2">you became one because you accumulated $100,000 or more of liability on any day during a deposit period, </span>
<span id="t8z_2" class="t s6_2">you must complete Form 945-A instead of the boxes below. </span>
<span id="t90_2" class="t s0_2">13a </span>
<span id="t91_2" class="t s9_2">Jan. </span>
<span id="t92_2" class="t s8_2">. </span>
<span id="t93_2" class="t s0_2">13b </span>
<span id="t94_2" class="t s9_2">Feb. </span>
<span id="t95_2" class="t s8_2">. </span>
<span id="t96_2" class="t s0_2">13c </span>
<span id="t97_2" class="t s9_2">Mar. </span>
<span id="t98_2" class="t s8_2">. </span>
<span id="t99_2" class="t s0_2">13d </span>
<span id="t9a_2" class="t s9_2">Apr. </span>
<span id="t9b_2" class="t s8_2">. </span>
<span id="t9c_2" class="t s0_2">13e </span>
<span id="t9d_2" class="t s9_2">May </span>
<span id="t9e_2" class="t s8_2">. </span>
<span id="t9f_2" class="t s0_2">13f </span>
<span id="t9g_2" class="t s9_2">June </span>
<span id="t9h_2" class="t s8_2">. </span>
<span id="t9i_2" class="t s0_2">13g </span>
<span id="t9j_2" class="t s9_2">July </span>
<span id="t9k_2" class="t s8_2">. </span>
<span id="t9l_2" class="t s0_2">13h </span>
<span id="t9m_2" class="t s9_2">Aug. </span>
<span id="t9n_2" class="t s8_2">. </span>
<span id="t9o_2" class="t s0_2">13i </span>
<span id="t9p_2" class="t s9_2">Sept. </span>
<span id="t9q_2" class="t s8_2">. </span>
<span id="t9r_2" class="t s0_2">13j </span>
<span id="t9s_2" class="t s9_2">Oct. </span>
<span id="t9t_2" class="t s8_2">. </span>
<span id="t9u_2" class="t s0_2">13k </span>
<span id="t9v_2" class="t s9_2">Nov. </span>
<span id="t9w_2" class="t s8_2">. </span>
<span id="t9x_2" class="t s0_2">13l </span>
<span id="t9y_2" class="t s9_2">Dec. </span>
<span id="t9z_2" class="t s8_2">. </span>
<span id="ta0_2" class="t s6_2">Total liability for year. Add lines 13a through 13l. Total must equal line 9. </span><span id="ta1_2" class="t s6_2">13m </span><span id="ta2_2" class="t s8_2">. </span>
<span id="ta3_2" class="t s6_2">You MUST complete all three pages of Form 944 and SIGN it. </span>
<span id="ta4_2" class="t s9_2">Page </span><span id="ta5_2" class="t sb_2">2 </span><span id="ta6_2" class="t s9_2">Form </span><span id="ta7_2" class="t sb_2">944 </span><span id="ta8_2" class="t s9_2">(2024) </span></div>
<!-- End text definitions -->


<!-- Begin Form Data -->
<input id="form1_2" type="text" tabindex="57" value="" data-objref="401 0 R" data-field-name="topmostSubform[0].Page2[0].Name_ReadOrder[0].f1_3[0]"/>
<input id="form2_2" type="text" tabindex="58" maxlength="2" value="" data-objref="399 0 R" data-field-name="topmostSubform[0].Page2[0].EIN_Number[0].f1_1[0]"/>
<input id="form3_2" type="text" tabindex="59" maxlength="7" value="" data-objref="400 0 R" data-field-name="topmostSubform[0].Page2[0].EIN_Number[0].f1_2[0]"/>
<input id="form4_2" type="button" tabindex="60" disabled="disabled" data-objref="334 0 R" data-field-name="topmostSubform[0].Page2[0].f2_3[0]"/>
<input id="form5_2" type="button" tabindex="61" maxlength="3" disabled="disabled" data-objref="335 0 R" data-field-name="topmostSubform[0].Page2[0].f2_4[0]"/>
<input id="form6_2" type="button" tabindex="62" disabled="disabled" data-objref="336 0 R" data-field-name="topmostSubform[0].Page2[0].f2_5[0]"/>
<input id="form7_2" type="text" tabindex="63" value="" data-objref="337 0 R" data-field-name="topmostSubform[0].Page2[0].f2_6[0]"/>
<input id="form8_2" type="text" tabindex="64" maxlength="3" value="" data-objref="338 0 R" data-field-name="topmostSubform[0].Page2[0].f2_7[0]"/>
<input id="form9_2" type="text" tabindex="65" value="" data-objref="339 0 R" data-field-name="topmostSubform[0].Page2[0].f2_8[0]"/>
<input id="form10_2" type="text" tabindex="66" maxlength="3" value="" data-objref="340 0 R" data-field-name="topmostSubform[0].Page2[0].f2_9[0]"/>
<input id="form11_2" type="text" tabindex="67" value="" data-objref="341 0 R" data-field-name="topmostSubform[0].Page2[0].f2_10[0]"/>
<input id="form12_2" type="text" tabindex="68" maxlength="3" value="" data-objref="342 0 R" data-field-name="topmostSubform[0].Page2[0].f2_11[0]"/>
<input id="form13_2" type="button" tabindex="69" disabled="disabled" data-objref="343 0 R" data-field-name="topmostSubform[0].Page2[0].f2_12[0]"/>
<input id="form14_2" type="button" tabindex="70" maxlength="3" disabled="disabled" data-objref="344 0 R" data-field-name="topmostSubform[0].Page2[0].f2_13[0]"/>
<input id="form15_2" type="button" tabindex="71" disabled="disabled" data-objref="345 0 R" data-field-name="topmostSubform[0].Page2[0].f2_14[0]"/>
<input id="form16_2" type="button" tabindex="72" maxlength="3" disabled="disabled" data-objref="346 0 R" data-field-name="topmostSubform[0].Page2[0].f2_15[0]"/>
<input id="form17_2" type="text" tabindex="73" value="" data-objref="347 0 R" data-field-name="topmostSubform[0].Page2[0].f2_16[0]"/>
<input id="form18_2" type="text" tabindex="74" maxlength="3" value="" data-objref="348 0 R" data-field-name="topmostSubform[0].Page2[0].f2_17[0]"/>
<input id="form19_2" type="button" tabindex="75" disabled="disabled" data-objref="349 0 R" data-field-name="topmostSubform[0].Page2[0].f2_18[0]"/>
<input id="form20_2" type="button" tabindex="76" maxlength="3" disabled="disabled" data-objref="350 0 R" data-field-name="topmostSubform[0].Page2[0].f2_19[0]"/>
<input id="form21_2" type="text" tabindex="77" value="" data-objref="351 0 R" data-field-name="topmostSubform[0].Page2[0].f2_20[0]"/>
<input id="form22_2" type="text" tabindex="78" maxlength="3" value="" data-objref="352 0 R" data-field-name="topmostSubform[0].Page2[0].f2_21[0]"/>
<input id="form23_2" type="button" tabindex="79" disabled="disabled" data-objref="353 0 R" data-field-name="topmostSubform[0].Page2[0].f2_22[0]"/>
<input id="form24_2" type="button" tabindex="80" maxlength="3" disabled="disabled" data-objref="354 0 R" data-field-name="topmostSubform[0].Page2[0].f2_23[0]"/>
<input id="form25_2" type="text" tabindex="81" value="" data-objref="355 0 R" data-field-name="topmostSubform[0].Page2[0].f2_24[0]"/>
<input id="form26_2" type="text" tabindex="82" maxlength="3" value="" data-objref="356 0 R" data-field-name="topmostSubform[0].Page2[0].f2_25[0]"/>
<input id="form27_2" type="button" tabindex="83" disabled="disabled" data-objref="357 0 R" data-field-name="topmostSubform[0].Page2[0].f2_26[0]"/>
<input id="form28_2" type="button" tabindex="84" maxlength="3" disabled="disabled" data-objref="358 0 R" data-field-name="topmostSubform[0].Page2[0].f2_27[0]"/>
<input id="form29_2" type="button" tabindex="85" disabled="disabled" data-objref="359 0 R" data-field-name="topmostSubform[0].Page2[0].f2_28[0]"/>
<input id="form30_2" type="button" tabindex="86" maxlength="3" disabled="disabled" data-objref="360 0 R" data-field-name="topmostSubform[0].Page2[0].f2_29[0]"/>
<input id="form31_2" type="text" tabindex="87" value="" data-objref="361 0 R" data-field-name="topmostSubform[0].Page2[0].f2_30[0]"/>
<input id="form32_2" type="text" tabindex="88" maxlength="3" value="" data-objref="362 0 R" data-field-name="topmostSubform[0].Page2[0].f2_31[0]"/>
<input id="form33_2" type="checkbox" tabindex="91" value="1" data-objref="365 0 R" data-field-name="topmostSubform[0].Page2[0].c2_1[0]" imageName="2/form/365 0 R" images="110100"/>
<input id="form34_2" type="checkbox" tabindex="92" value="2" data-objref="366 0 R" data-field-name="topmostSubform[0].Page2[0].c2_1[1]" imageName="2/form/366 0 R" images="110100"/>
<input id="form35_2" type="text" tabindex="89" value="" data-objref="363 0 R" data-field-name="topmostSubform[0].Page2[0].f2_32[0]"/>
<input id="form36_2" type="text" tabindex="90" maxlength="3" value="" data-objref="364 0 R" data-field-name="topmostSubform[0].Page2[0].f2_33[0]"/>
<input id="form37_2" type="checkbox" tabindex="93" value="1" data-objref="367 0 R" data-field-name="topmostSubform[0].Page2[0].c2_2[0]" imageName="2/form/367 0 R" images="110100"/>
<input id="form38_2" type="checkbox" tabindex="94" value="2" data-objref="368 0 R" data-field-name="topmostSubform[0].Page2[0].c2_2[1]" imageName="2/form/368 0 R" images="110100"/>
<input id="form39_2" type="text" tabindex="95" value="" data-objref="393 0 R" data-field-name="topmostSubform[0].Page2[0].FirstQuarter[0].f2_34[0]"/>
<input id="form40_2" type="text" tabindex="96" maxlength="3" value="" data-objref="394 0 R" data-field-name="topmostSubform[0].Page2[0].FirstQuarter[0].f2_35[0]"/>
<input id="form41_2" type="text" tabindex="101" value="" data-objref="387 0 R" data-field-name="topmostSubform[0].Page2[0].SecondQuarter[0].f2_40[0]"/>
<input id="form42_2" type="text" tabindex="102" maxlength="3" value="" data-objref="388 0 R" data-field-name="topmostSubform[0].Page2[0].SecondQuarter[0].f2_41[0]"/>
<input id="form43_2" type="text" tabindex="107" value="" data-objref="381 0 R" data-field-name="topmostSubform[0].Page2[0].ThirdQuarter[0].f2_46[0]"/>
<input id="form44_2" type="text" tabindex="108" maxlength="3" value="" data-objref="382 0 R" data-field-name="topmostSubform[0].Page2[0].ThirdQuarter[0].f2_47[0]"/>
<input id="form45_2" type="text" tabindex="113" value="" data-objref="375 0 R" data-field-name="topmostSubform[0].Page2[0].FourthQuarter[0].f2_52[0]"/>
<input id="form46_2" type="text" tabindex="114" maxlength="3" value="" data-objref="376 0 R" data-field-name="topmostSubform[0].Page2[0].FourthQuarter[0].f2_53[0]"/>
<input id="form47_2" type="text" tabindex="97" value="" data-objref="395 0 R" data-field-name="topmostSubform[0].Page2[0].FirstQuarter[0].f2_36[0]"/>
<input id="form48_2" type="text" tabindex="98" maxlength="3" value="" data-objref="396 0 R" data-field-name="topmostSubform[0].Page2[0].FirstQuarter[0].f2_37[0]"/>
<input id="form49_2" type="text" tabindex="103" value="" data-objref="389 0 R" data-field-name="topmostSubform[0].Page2[0].SecondQuarter[0].f2_42[0]"/>
<input id="form50_2" type="text" tabindex="104" maxlength="3" value="" data-objref="390 0 R" data-field-name="topmostSubform[0].Page2[0].SecondQuarter[0].f2_43[0]"/>
<input id="form51_2" type="text" tabindex="109" value="" data-objref="383 0 R" data-field-name="topmostSubform[0].Page2[0].ThirdQuarter[0].f2_48[0]"/>
<input id="form52_2" type="text" tabindex="110" maxlength="3" value="" data-objref="384 0 R" data-field-name="topmostSubform[0].Page2[0].ThirdQuarter[0].f2_49[0]"/>
<input id="form53_2" type="text" tabindex="115" value="" data-objref="377 0 R" data-field-name="topmostSubform[0].Page2[0].FourthQuarter[0].f2_54[0]"/>
<input id="form54_2" type="text" tabindex="116" maxlength="3" value="" data-objref="378 0 R" data-field-name="topmostSubform[0].Page2[0].FourthQuarter[0].f2_55[0]"/>
<input id="form55_2" type="text" tabindex="99" value="" data-objref="397 0 R" data-field-name="topmostSubform[0].Page2[0].FirstQuarter[0].f2_38[0]"/>
<input id="form56_2" type="text" tabindex="100" maxlength="3" value="" data-objref="398 0 R" data-field-name="topmostSubform[0].Page2[0].FirstQuarter[0].f2_39[0]"/>
<input id="form57_2" type="text" tabindex="105" value="" data-objref="391 0 R" data-field-name="topmostSubform[0].Page2[0].SecondQuarter[0].f2_44[0]"/>
<input id="form58_2" type="text" tabindex="106" maxlength="3" value="" data-objref="392 0 R" data-field-name="topmostSubform[0].Page2[0].SecondQuarter[0].f2_45[0]"/>
<input id="form59_2" type="text" tabindex="111" value="" data-objref="385 0 R" data-field-name="topmostSubform[0].Page2[0].ThirdQuarter[0].f2_50[0]"/>
<input id="form60_2" type="text" tabindex="112" maxlength="3" value="" data-objref="386 0 R" data-field-name="topmostSubform[0].Page2[0].ThirdQuarter[0].f2_51[0]"/>
<input id="form61_2" type="text" tabindex="117" value="" data-objref="379 0 R" data-field-name="topmostSubform[0].Page2[0].FourthQuarter[0].f2_56[0]"/>
<input id="form62_2" type="text" tabindex="118" maxlength="3" value="" data-objref="380 0 R" data-field-name="topmostSubform[0].Page2[0].FourthQuarter[0].f2_57[0]"/>
<input id="form63_2" type="text" tabindex="119" value="" data-objref="373 0 R" data-field-name="topmostSubform[0].Page2[0].f2_58[0]"/>
<input id="form64_2" type="text" tabindex="120" maxlength="3" value="" data-objref="374 0 R" data-field-name="topmostSubform[0].Page2[0].f2_59[0]"/>

<!-- End Form Data -->

</div>

</div>
</div>
 
<div id="page3" style="width: 934px; height: 1209px; margin-top:20px;    margin-left: 495px;" class="page">
<div class="page-inner" style="width: 934px; height: 1209px;">


<div id="p3" class="pageArea" style="overflow: hidden; position: relative; width: 935px; height: 1210px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">


<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 935 1210" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
.g1_3{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
.g2_3{
fill: #000;
}
.g3_3{
fill: none;
stroke: #000;
stroke-width: 1.145;
stroke-miterlimit: 10;
}
.g4_3{
fill: #FFF;
}
.g5_3{
fill: #D9D9D9;
}
.g6_3{
fill: none;
stroke: #000;
stroke-width: 0.762;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,55H583.4" class="g0_3"/>
<path d="M583,54.2V70.7m0,-.8V92" class="g1_3"/>
<path d="M582.6,55H880.4" class="g0_3"/>
<path d="M55,110h55V91.7H55V110Z" class="g2_3"/>
<path d="M54.6,91.7H880.4" class="g3_3"/>
<path d="M54.6,110H880.4" class="g1_3"/>
<path d="M740.7,136h15.2V120.7H740.7V136Z" class="g4_3"/>
<path d="M740.7,136h15.2V120.7H740.7V136ZM319,174.2H440V146.7H319v27.5Zm362.6,9.1H836.4M681.6,210.8H836.4M682,182.9v28.3M835.6,183.3h44.8m-44.8,27.5h44.8M880,182.9v28.3m-198.4,4.2H836.4M681.6,242.9H836.4M682,215v28.3M835.6,215.4h44.8m-44.8,27.5h44.8M880,215v28.3" class="g1_3"/>
<path d="M682,275H836V247.5H682V275Z" class="g5_3"/>
<path d="M681.6,247.5H836.4M681.6,275H836.4M682,247.1v28.3" class="g1_3"/>
<path d="M836,275h44V247.5H836V275Z" class="g5_3"/>
<path d="M835.6,247.5h44.8M835.6,275h44.8M880,247.1v28.3" class="g1_3"/>
<path d="M682,307.1H836V279.6H682v27.5Z" class="g5_3"/>
<path d="M681.6,279.6H836.4M681.6,307.1H836.4M682,279.2v28.3" class="g1_3"/>
<path d="M836,307.1h44V279.6H836v27.5Z" class="g5_3"/>
<path d="M835.6,279.6h44.8m-44.8,27.5h44.8M880,279.2v28.3m-198.4,4.2H836.4M681.6,339.2H836.4M682,311.3v28.3M835.6,311.7h44.8m-44.8,27.5h44.8M880,311.3v28.3m-198.4,4.2H836.4M681.6,371.3H836.4M682,343.4v28.2M835.6,343.8h44.8m-44.8,27.5h44.8M880,343.4v28.2M681.6,385H836.4M681.6,412.5H836.4M682,384.6v28.3M835.6,385h44.8m-44.8,27.5h44.8M880,384.6v28.3m-198.4,4.2H836.4M681.6,444.6H836.4M682,416.7V445M835.6,417.1h44.8m-44.8,27.5h44.8M880,416.7V445m-198.4,4.2H836.4M681.6,476.7H836.4M682,448.8v28.3M835.6,449.2h44.8m-44.8,27.5h44.8M880,448.8v28.3M681.6,490.4H836.4M681.6,517.9H836.4M682,490v28.3M835.6,490.4h44.8m-44.8,27.5h44.8M880,490v28.3" class="g1_3"/>
<path d="M682,577.5H836V550H682v27.5Z" class="g5_3"/>
<path d="M681.6,550H836.4M681.6,577.5H836.4M682,549.6v28.3" class="g1_3"/>
<path d="M836,577.5h44V550H836v27.5Z" class="g5_3"/>
<path d="M835.6,550h44.8m-44.8,27.5h44.8M880,549.6v28.3" class="g1_3"/>
<path d="M682,632.5H836V605H682v27.5Z" class="g5_3"/>
<path d="M681.6,605H836.4M681.6,632.5H836.4M682,604.6v28.3" class="g1_3"/>
<path d="M836,632.5h44V605H836v27.5Z" class="g5_3"/>
<path d="M835.6,605h44.8m-44.8,27.5h44.8M880,604.6v28.3" class="g1_3"/>
<path d="M55,660h55V641.7H55V660Z" class="g2_3"/>
<path d="M54.6,641.7H880.4" class="g3_3"/>
<path d="M54.6,660H880.4" class="g1_3"/>
<path d="M77,713.5H92.3V698.2H77v15.3Z" class="g4_3"/>
<path d="M77,713.5H92.3V698.2H77v15.3ZM363,715H627V687.5H363V715Zm297,0H836V687.5H660V715Z" class="g1_3"/>
<path d="M627,747.1h23.1V724.2H627v22.9Z" class="g4_3"/>
<path d="M649,724.2H628.1M649,747.1H628.1m22,-.9V725.1M627,746.2V725.1" class="g1_3"/>
<path d="M627,725.1v22.4m-.4,-.4H649m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H628.1m20.9,0H626.6m.4,-.4v22.4" class="g6_3"/>
<path d="M660,747.1h23.1V724.2H660v22.9Z" class="g4_3"/>
<path d="M682,724.2H661.1M682,747.1H661.1m22,-.9V725.1M660,746.2V725.1" class="g1_3"/>
<path d="M660,725.1v22.4m-.4,-.4H682m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H661.1m20.9,0H659.6m.4,-.4v22.4" class="g6_3"/>
<path d="M693,747.1h23.1V724.2H693v22.9Z" class="g4_3"/>
<path d="M715,724.2H694.1M715,747.1H694.1m22,-.9V725.1M693,746.2V725.1" class="g1_3"/>
<path d="M693,725.1v22.4m-.4,-.4H715m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H694.1m20.9,0H692.6m.4,-.4v22.4" class="g6_3"/>
<path d="M726,747.1h23.1V724.2H726v22.9Z" class="g4_3"/>
<path d="M748,724.2H727.1M748,747.1H727.1m22,-.9V725.1M726,746.2V725.1" class="g1_3"/>
<path d="M726,725.1v22.4m-.4,-.4H748m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H727.1m20.9,0H725.6m.4,-.4v22.4" class="g6_3"/>
<path d="M759,747.1h23.1V724.2H759v22.9Z" class="g4_3"/>
<path d="M781,724.2H760.1M781,747.1H760.1m22,-.9V725.1M759,746.2V725.1" class="g1_3"/>
<path d="M759,725.1v22.4m-.4,-.4H781m-20.9,0h22.4m-.4,.4V725.1m0,21.1V723.8m.4,.4H760.1m20.9,0H758.6m.4,-.4v22.4" class="g6_3"/>
<path d="M77,763.9H92.3V748.6H77v15.3Z" class="g4_3"/>
<path d="M77,763.9H92.3V748.6H77v15.3Z" class="g1_3"/>
<path d="M55,788.3h55V770H55v18.3Z" class="g2_3"/>
<path d="M54.6,770H880.4" class="g3_3"/>
<path d="M54.6,788.3H880.4" class="g1_3"/>
<path d="M220,889.2H539V825H220v64.2Z" class="g4_3"/>
<path d="M242,825H517M242,889.2H517M539,847v20.2M220,847v20.2" class="g1_3"/>
<path d="M220,867.2v22.3m-.4,-.3H242m275,0h22.4m-.4,.3V867.2M539,847V824.6m.4,.4H517m-275,0H219.6m.4,-.4V847" class="g6_3"/>
<path d="M220,925.8H363V898.3H220v27.5Z" class="g4_3"/>
<path d="M220,925.8H363V898.3H220v27.5ZM649,852.5H869V825H649v27.5Zm0,36.7H869V861.7H649v27.5Zm55,36.6H869V898.3H704v27.5ZM54.6,935H880.4" class="g1_3"/>
<path d="M847,956.4h15.3V941.1H847v15.3Z" class="g4_3"/>
<path d="M847,956.4h15.3V941.1H847v15.3ZM187,999.2H583V971.7H187v27.5Zm495,0H869V971.7H682v27.5Z" class="g1_3"/>
<path d="M187,1035.8H583v-27.5H187v27.5Z" class="g4_3"/>
<path d="M209,1008.3H561m-352,27.5H561m22,-5.5v-16.5m-396,16.5v-16.5" class="g1_3"/>
<path d="M187,1013.8v22.4m-.4,-.4H209m352,0h22.4m-.4,.4v-22.4m0,16.5V1008m.4,.3H561m-352,0H186.6m.4,-.3v22.3" class="g6_3"/>
<path d="M682,1035.8H814v-27.5H682v27.5Z" class="g4_3"/>
<path d="M704,1008.3h88m-88,27.5h88m22,-5.5v-16.5m-132,16.5v-16.5" class="g1_3"/>
<path d="M682,1013.8v22.4m-.4,-.4H704m88,0h22.4m-.4,.4v-22.4m0,16.5V1008m.4,.3H792m-88,0H681.6m.4,-.3v22.3" class="g6_3"/>
<path d="M187,1072.5H583V1045H187v27.5Zm495,0H869V1045H682v27.5Zm-495,36.7H583v-27.5H187v27.5Zm495,0H869v-27.5H682v27.5Zm-495,36.6H462v-27.5H187v27.5Zm341,0h55v-27.5H528v27.5Zm154,0H869v-27.5H682v27.5Z" class="g1_3"/>
<path d="M54.6,1155H781.4m-.8,0h99.8" class="g0_3"/>
</svg>

<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css" >
.t {
	transform-origin: bottom left;
	z-index: 2;
	position: absolute;
	white-space: pre;
	overflow: visible;
	line-height: 1.5;
}
.text-container {
	white-space: pre;
}
@supports (-webkit-touch-callout: none) {
	.text-container {
		white-space: normal;
	}
}
</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_3{left:55px;bottom:1139px;letter-spacing:-0.17px;}
#t2_3{left:88px;bottom:1139px;letter-spacing:-0.14px;}
#t3_3{left:589px;bottom:1139px;letter-spacing:-0.15px;}
#t4_3{left:639px;bottom:1116px;}
#t5_3{left:61px;bottom:1098px;letter-spacing:-0.1px;}
#t6_3{left:116px;bottom:1098px;letter-spacing:-0.12px;}
#t7_3{left:63px;bottom:1070px;letter-spacing:-0.01px;}
#t8_3{left:99px;bottom:1070px;letter-spacing:-0.01px;}
#t9_3{left:477px;bottom:1070px;}
#ta_3{left:495px;bottom:1070px;}
#tb_3{left:513px;bottom:1070px;}
#tc_3{left:532px;bottom:1070px;}
#td_3{left:550px;bottom:1070px;}
#te_3{left:568px;bottom:1070px;}
#tf_3{left:587px;bottom:1070px;}
#tg_3{left:605px;bottom:1070px;}
#th_3{left:623px;bottom:1070px;}
#ti_3{left:642px;bottom:1070px;}
#tj_3{left:660px;bottom:1070px;}
#tk_3{left:678px;bottom:1070px;}
#tl_3{left:697px;bottom:1070px;}
#tm_3{left:715px;bottom:1070px;}
#tn_3{left:760px;bottom:1070px;letter-spacing:-0.01px;}
#to_3{left:99px;bottom:1034px;letter-spacing:-0.01px;}
#tp_3{left:348px;bottom:1034px;}
#tq_3{left:377px;bottom:1034px;}
#tr_3{left:445px;bottom:1034px;letter-spacing:-0.01px;}
#ts_3{left:63px;bottom:997px;letter-spacing:-0.01px;}
#tt_3{left:99px;bottom:997px;letter-spacing:-0.01px;}
#tu_3{left:664px;bottom:997px;letter-spacing:-0.01px;}
#tv_3{left:838px;bottom:993px;}
#tw_3{left:63px;bottom:965px;letter-spacing:-0.01px;}
#tx_3{left:99px;bottom:965px;letter-spacing:-0.01px;}
#ty_3{left:664px;bottom:965px;letter-spacing:-0.01px;}
#tz_3{left:838px;bottom:961px;}
#t10_3{left:63px;bottom:933px;letter-spacing:-0.01px;}
#t11_3{left:99px;bottom:933px;letter-spacing:-0.01px;}
#t12_3{left:257px;bottom:933px;}
#t13_3{left:275px;bottom:933px;}
#t14_3{left:293px;bottom:933px;}
#t15_3{left:312px;bottom:933px;}
#t16_3{left:330px;bottom:933px;}
#t17_3{left:348px;bottom:933px;}
#t18_3{left:367px;bottom:933px;}
#t19_3{left:385px;bottom:933px;}
#t1a_3{left:403px;bottom:933px;}
#t1b_3{left:422px;bottom:933px;}
#t1c_3{left:440px;bottom:933px;}
#t1d_3{left:458px;bottom:933px;}
#t1e_3{left:477px;bottom:933px;}
#t1f_3{left:495px;bottom:933px;}
#t1g_3{left:513px;bottom:933px;}
#t1h_3{left:532px;bottom:933px;}
#t1i_3{left:550px;bottom:933px;}
#t1j_3{left:568px;bottom:933px;}
#t1k_3{left:587px;bottom:933px;}
#t1l_3{left:605px;bottom:933px;}
#t1m_3{left:623px;bottom:933px;}
#t1n_3{left:642px;bottom:933px;}
#t1o_3{left:664px;bottom:933px;letter-spacing:-0.01px;}
#t1p_3{left:838px;bottom:929px;}
#t1q_3{left:63px;bottom:901px;letter-spacing:-0.01px;}
#t1r_3{left:99px;bottom:901px;letter-spacing:-0.01px;}
#t1s_3{left:257px;bottom:901px;}
#t1t_3{left:275px;bottom:901px;}
#t1u_3{left:293px;bottom:901px;}
#t1v_3{left:312px;bottom:901px;}
#t1w_3{left:330px;bottom:901px;}
#t1x_3{left:348px;bottom:901px;}
#t1y_3{left:367px;bottom:901px;}
#t1z_3{left:385px;bottom:901px;}
#t20_3{left:403px;bottom:901px;}
#t21_3{left:422px;bottom:901px;}
#t22_3{left:440px;bottom:901px;}
#t23_3{left:458px;bottom:901px;}
#t24_3{left:477px;bottom:901px;}
#t25_3{left:495px;bottom:901px;}
#t26_3{left:513px;bottom:901px;}
#t27_3{left:532px;bottom:901px;}
#t28_3{left:550px;bottom:901px;}
#t29_3{left:568px;bottom:901px;}
#t2a_3{left:587px;bottom:901px;}
#t2b_3{left:605px;bottom:901px;}
#t2c_3{left:623px;bottom:901px;}
#t2d_3{left:642px;bottom:901px;}
#t2e_3{left:664px;bottom:901px;letter-spacing:-0.01px;}
#t2f_3{left:838px;bottom:897px;}
#t2g_3{left:63px;bottom:869px;letter-spacing:-0.01px;}
#t2h_3{left:99px;bottom:869px;letter-spacing:-0.01px;}
#t2i_3{left:664px;bottom:869px;letter-spacing:-0.01px;}
#t2j_3{left:838px;bottom:865px;}
#t2k_3{left:63px;bottom:837px;letter-spacing:-0.01px;}
#t2l_3{left:99px;bottom:837px;letter-spacing:-0.01px;}
#t2m_3{left:664px;bottom:837px;letter-spacing:-0.01px;}
#t2n_3{left:838px;bottom:833px;}
#t2o_3{left:63px;bottom:811px;letter-spacing:-0.01px;}
#t2p_3{left:99px;bottom:811px;letter-spacing:-0.01px;word-spacing:3.49px;}
#t2q_3{left:99px;bottom:795px;letter-spacing:-0.01px;}
#t2r_3{left:312px;bottom:795px;}
#t2s_3{left:330px;bottom:795px;}
#t2t_3{left:348px;bottom:795px;}
#t2u_3{left:367px;bottom:795px;}
#t2v_3{left:385px;bottom:795px;}
#t2w_3{left:403px;bottom:795px;}
#t2x_3{left:422px;bottom:795px;}
#t2y_3{left:440px;bottom:795px;}
#t2z_3{left:458px;bottom:795px;}
#t30_3{left:477px;bottom:795px;}
#t31_3{left:495px;bottom:795px;}
#t32_3{left:513px;bottom:795px;}
#t33_3{left:532px;bottom:795px;}
#t34_3{left:550px;bottom:795px;}
#t35_3{left:568px;bottom:795px;}
#t36_3{left:587px;bottom:795px;}
#t37_3{left:605px;bottom:795px;}
#t38_3{left:623px;bottom:795px;}
#t39_3{left:642px;bottom:795px;}
#t3a_3{left:664px;bottom:795px;letter-spacing:-0.01px;}
#t3b_3{left:838px;bottom:791px;}
#t3c_3{left:63px;bottom:763px;letter-spacing:-0.01px;}
#t3d_3{left:99px;bottom:763px;letter-spacing:-0.01px;}
#t3e_3{left:664px;bottom:763px;letter-spacing:-0.01px;}
#t3f_3{left:838px;bottom:759px;}
#t3g_3{left:63px;bottom:731px;letter-spacing:-0.01px;}
#t3h_3{left:99px;bottom:731px;letter-spacing:-0.01px;}
#t3i_3{left:664px;bottom:731px;letter-spacing:-0.01px;}
#t3j_3{left:838px;bottom:727px;}
#t3k_3{left:63px;bottom:706px;letter-spacing:-0.01px;}
#t3l_3{left:99px;bottom:706px;letter-spacing:-0.01px;word-spacing:2.19px;}
#t3m_3{left:99px;bottom:690px;letter-spacing:-0.01px;}
#t3n_3{left:312px;bottom:690px;}
#t3o_3{left:330px;bottom:690px;}
#t3p_3{left:348px;bottom:690px;}
#t3q_3{left:367px;bottom:690px;}
#t3r_3{left:385px;bottom:690px;}
#t3s_3{left:403px;bottom:690px;}
#t3t_3{left:422px;bottom:690px;}
#t3u_3{left:440px;bottom:690px;}
#t3v_3{left:458px;bottom:690px;}
#t3w_3{left:477px;bottom:690px;}
#t3x_3{left:495px;bottom:690px;}
#t3y_3{left:513px;bottom:690px;}
#t3z_3{left:532px;bottom:690px;}
#t40_3{left:550px;bottom:690px;}
#t41_3{left:568px;bottom:690px;}
#t42_3{left:587px;bottom:690px;}
#t43_3{left:605px;bottom:690px;}
#t44_3{left:623px;bottom:690px;}
#t45_3{left:642px;bottom:690px;}
#t46_3{left:664px;bottom:690px;letter-spacing:-0.01px;}
#t47_3{left:838px;bottom:686px;}
#t48_3{left:63px;bottom:630px;letter-spacing:-0.01px;}
#t49_3{left:99px;bottom:630px;letter-spacing:-0.01px;}
#t4a_3{left:257px;bottom:630px;}
#t4b_3{left:275px;bottom:630px;}
#t4c_3{left:293px;bottom:630px;}
#t4d_3{left:312px;bottom:630px;}
#t4e_3{left:330px;bottom:630px;}
#t4f_3{left:348px;bottom:630px;}
#t4g_3{left:367px;bottom:630px;}
#t4h_3{left:385px;bottom:630px;}
#t4i_3{left:403px;bottom:630px;}
#t4j_3{left:422px;bottom:630px;}
#t4k_3{left:440px;bottom:630px;}
#t4l_3{left:458px;bottom:630px;}
#t4m_3{left:477px;bottom:630px;}
#t4n_3{left:495px;bottom:630px;}
#t4o_3{left:513px;bottom:630px;}
#t4p_3{left:532px;bottom:630px;}
#t4q_3{left:550px;bottom:630px;}
#t4r_3{left:568px;bottom:630px;}
#t4s_3{left:587px;bottom:630px;}
#t4t_3{left:605px;bottom:630px;}
#t4u_3{left:623px;bottom:630px;}
#t4v_3{left:642px;bottom:630px;}
#t4w_3{left:664px;bottom:630px;letter-spacing:-0.01px;}
#t4x_3{left:838px;bottom:626px;}
#t4y_3{left:63px;bottom:575px;letter-spacing:-0.01px;}
#t4z_3{left:99px;bottom:575px;letter-spacing:-0.01px;}
#t50_3{left:257px;bottom:575px;}
#t51_3{left:275px;bottom:575px;}
#t52_3{left:293px;bottom:575px;}
#t53_3{left:312px;bottom:575px;}
#t54_3{left:330px;bottom:575px;}
#t55_3{left:348px;bottom:575px;}
#t56_3{left:367px;bottom:575px;}
#t57_3{left:385px;bottom:575px;}
#t58_3{left:403px;bottom:575px;}
#t59_3{left:422px;bottom:575px;}
#t5a_3{left:440px;bottom:575px;}
#t5b_3{left:458px;bottom:575px;}
#t5c_3{left:477px;bottom:575px;}
#t5d_3{left:495px;bottom:575px;}
#t5e_3{left:513px;bottom:575px;}
#t5f_3{left:532px;bottom:575px;}
#t5g_3{left:550px;bottom:575px;}
#t5h_3{left:568px;bottom:575px;}
#t5i_3{left:587px;bottom:575px;}
#t5j_3{left:605px;bottom:575px;}
#t5k_3{left:623px;bottom:575px;}
#t5l_3{left:642px;bottom:575px;}
#t5m_3{left:664px;bottom:575px;letter-spacing:-0.01px;}
#t5n_3{left:838px;bottom:571px;}
#t5o_3{left:61px;bottom:548px;letter-spacing:-0.1px;}
#t5p_3{left:116px;bottom:548px;letter-spacing:-0.12px;}
#t5q_3{left:61px;bottom:526px;letter-spacing:-0.01px;}
#t5r_3{left:706px;bottom:526px;letter-spacing:-0.01px;}
#t5s_3{left:819px;bottom:526px;letter-spacing:-0.01px;}
#t5t_3{left:99px;bottom:493px;letter-spacing:-0.01px;}
#t5u_3{left:132px;bottom:493px;letter-spacing:-0.01px;}
#t5v_3{left:132px;bottom:465px;letter-spacing:-0.01px;}
#t5w_3{left:99px;bottom:441px;letter-spacing:-0.01px;}
#t5x_3{left:61px;bottom:419px;letter-spacing:-0.1px;}
#t5y_3{left:116px;bottom:419px;letter-spacing:-0.12px;}
#t5z_3{left:61px;bottom:403px;letter-spacing:0.21px;word-spacing:0.75px;}
#t60_3{left:61px;bottom:389px;letter-spacing:0.2px;}
#t61_3{left:132px;bottom:352px;letter-spacing:0.13px;}
#t62_3{left:132px;bottom:333px;letter-spacing:0.16px;}
#t63_3{left:182px;bottom:285px;letter-spacing:-0.01px;}
#t64_3{left:583px;bottom:370px;letter-spacing:-0.01px;}
#t65_3{left:583px;bottom:356px;letter-spacing:-0.01px;}
#t66_3{left:583px;bottom:334px;letter-spacing:-0.01px;}
#t67_3{left:583px;bottom:319px;letter-spacing:-0.01px;}
#t68_3{left:583px;bottom:282px;letter-spacing:-0.01px;}
#t69_3{left:61px;bottom:251px;letter-spacing:0.14px;}
#t6a_3{left:663px;bottom:250px;letter-spacing:-0.01px;}
#t6b_3{left:61px;bottom:216px;letter-spacing:0.11px;}
#t6c_3{left:616px;bottom:217px;letter-spacing:0.25px;}
#t6d_3{left:61px;bottom:179px;letter-spacing:-0.14px;}
#t6e_3{left:616px;bottom:179px;letter-spacing:-0.01px;}
#t6f_3{left:61px;bottom:150px;letter-spacing:0.1px;}
#t6g_3{left:61px;bottom:136px;letter-spacing:0.1px;}
#t6h_3{left:616px;bottom:143px;letter-spacing:-0.01px;}
#t6i_3{left:61px;bottom:106px;letter-spacing:-0.01px;}
#t6j_3{left:616px;bottom:106px;letter-spacing:-0.01px;}
#t6k_3{left:61px;bottom:69px;letter-spacing:-0.01px;}
#t6l_3{left:484px;bottom:69px;letter-spacing:-0.01px;}
#t6m_3{left:616px;bottom:70px;letter-spacing:0.11px;}
#t6n_3{left:55px;bottom:36px;letter-spacing:-0.14px;}
#t6o_3{left:83px;bottom:34px;}
#t6p_3{left:794px;bottom:36px;letter-spacing:-0.14px;}
#t6q_3{left:822px;bottom:34px;letter-spacing:0.15px;}
#t6r_3{left:851px;bottom:36px;letter-spacing:-0.14px;}

.s0_3{font-size:11px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s1_3{font-size:11px;font-family:HelveticaNeueLTStd-It_1ky;color:#000;}
.s2_3{font-size:15px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s3_3{font-size:14px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#FFF;}
.s4_3{font-size:14px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s5_3{font-size:13px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s6_3{font-size:13px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s7_3{font-size:23px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s8_3{font-size:11px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s9_3{font-size:15px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.sa_3{font-size:12px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.t.v0_3{transform:scaleX(0.847);}
.t.v1_3{transform:scaleX(0.832);}
.t.v2_3{transform:scaleX(0.98);}
.t.v3_3{transform:scaleX(0.94);}
.t.v4_3{transform:scaleX(0.95);}
#form1_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 55px;	top: 70px;	width: 425px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 605px;	top: 70px;	width: 32px;	height: 20px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 648px;	top: 70px;	width: 74px;	height: 20px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_3{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 741px;	top: 121px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form5_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 319px;	top: 147px;	width: 119px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form6_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 184px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 184px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form8_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 216px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form9_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 216px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form10_3{	z-index: 2;	background-size: 100% 100%;	background-image: url("3/form/291 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 248px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form11_3{	z-index: 2;	background-size: 100% 100%;	background-image: url("3/form/292 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 248px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form12_3{	z-index: 2;	background-size: 100% 100%;	background-image: url("3/form/293 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 280px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form13_3{	z-index: 2;	background-size: 100% 100%;	background-image: url("3/form/294 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 280px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form14_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 312px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form15_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 312px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form16_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 344px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form17_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 344px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form18_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 385px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form19_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 385px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form20_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 417px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form21_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 417px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form22_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 449px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form23_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 449px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form24_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 491px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form25_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 491px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form26_3{	z-index: 2;	background-size: 100% 100%;	background-image: url("3/form/307 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 550px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form27_3{	z-index: 2;	background-size: 100% 100%;	background-image: url("3/form/308 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 550px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form28_3{	z-index: 2;	background-size: 100% 100%;	background-image: url("3/form/309 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 682px;	top: 605px;	width: 154px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form29_3{	z-index: 2;	background-size: 100% 100%;	background-image: url("3/form/310 0 ROff.png");	background-repeat: no-repeat;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 605px;	width: 32px;	height: 28px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	font: normal 15px 'Times New Roman', Times, serif;}
#form30_3{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 77px;	top: 698px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form31_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 365px;	top: 688px;	width: 260px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form32_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 660px;	top: 688px;	width: 174px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form33_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 627px;	top: 724px;	width: 154px;	height: 22px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form34_3{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 77px;	top: 749px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form35_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 651px;	top: 825px;	width: 217px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form36_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 651px;	top: 862px;	width: 217px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form37_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 660px;	top: 899px;	width: 164px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form38_3{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 847px;	top: 941px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form39_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 188px;	top: 972px;	width: 394px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form40_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 972px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form41_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 188px;	top: 1045px;	width: 394px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form42_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 1045px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form43_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 188px;	top: 1082px;	width: 394px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form44_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 1082px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form45_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 188px;	top: 1119px;	width: 272px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form46_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 1119px;	width: 54px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form47_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 1119px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_3 { z-index:5; }
#form30_3 { z-index:4; }
#form34_3 { z-index:3; }
#form38_3 { z-index:2; }

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts3" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_1kx;
	src: url("fonts/HelveticaNeueLTStd-Bd_1kx.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_1ky;
	src: url("fonts/HelveticaNeueLTStd-It_1ky.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_1kz;
	src: url("fonts/HelveticaNeueLTStd-Roman_1kz.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg3Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg3" style="-webkit-user-select: none;"><object width="935" height="1210" data="3/3.svg" type="image/svg+xml" id="pdf3" style="width:935px; height:1210px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_3" class="t s0_3">Name </span><span id="t2_3" class="t s1_3">(not your trade name) </span><span id="t3_3" class="t s0_3">Employer identification number (EIN) </span>
<span id="t4_3" class="t s2_3">– </span>
<span id="t5_3" class="t s3_3">Part 3: </span><span id="t6_3" class="t s4_3">Tell us about your business. If any question does NOT apply to your business, leave it blank. </span>
<span id="t7_3" class="t s5_3">14 </span><span id="t8_3" class="t s5_3">If your business has closed or you stopped paying wages </span><span id="t9_3" class="t s6_3">. </span><span id="ta_3" class="t s6_3">. </span><span id="tb_3" class="t s6_3">. </span><span id="tc_3" class="t s6_3">. </span><span id="td_3" class="t s6_3">. </span><span id="te_3" class="t s6_3">. </span><span id="tf_3" class="t s6_3">. </span><span id="tg_3" class="t s6_3">. </span><span id="th_3" class="t s6_3">. </span><span id="ti_3" class="t s6_3">. </span><span id="tj_3" class="t s6_3">. </span><span id="tk_3" class="t s6_3">. </span><span id="tl_3" class="t s6_3">. </span><span id="tm_3" class="t s6_3">. </span><span id="tn_3" class="t s6_3">Check here, and </span>
<span id="to_3" class="t s6_3">enter the final date you paid wages </span><span id="tp_3" class="t s6_3">/ </span><span id="tq_3" class="t s6_3">/ </span><span id="tr_3" class="t s6_3">; also attach a statement to your return. See instructions. </span>
<span id="ts_3" class="t s5_3">15 </span><span id="tt_3" class="t v0_3 s5_3">Qualified health plan expenses allocable to qualified sick leave wages for leave taken before April 1, 2021 </span><span id="tu_3" class="t s5_3">15 </span><span id="tv_3" class="t s7_3">. </span>
<span id="tw_3" class="t s5_3">16 </span><span id="tx_3" class="t v1_3 s5_3">Qualified health plan expenses allocable to qualified family leave wages for leave taken before April 1, 2021 </span><span id="ty_3" class="t s5_3">16 </span><span id="tz_3" class="t s7_3">. </span>
<span id="t10_3" class="t s5_3">17 </span><span id="t11_3" class="t s5_3">Reserved for future use </span><span id="t12_3" class="t s6_3">. </span><span id="t13_3" class="t s6_3">. </span><span id="t14_3" class="t s6_3">. </span><span id="t15_3" class="t s6_3">. </span><span id="t16_3" class="t s6_3">. </span><span id="t17_3" class="t s6_3">. </span><span id="t18_3" class="t s6_3">. </span><span id="t19_3" class="t s6_3">. </span><span id="t1a_3" class="t s6_3">. </span><span id="t1b_3" class="t s6_3">. </span><span id="t1c_3" class="t s6_3">. </span><span id="t1d_3" class="t s6_3">. </span><span id="t1e_3" class="t s6_3">. </span><span id="t1f_3" class="t s6_3">. </span><span id="t1g_3" class="t s6_3">. </span><span id="t1h_3" class="t s6_3">. </span><span id="t1i_3" class="t s6_3">. </span><span id="t1j_3" class="t s6_3">. </span><span id="t1k_3" class="t s6_3">. </span><span id="t1l_3" class="t s6_3">. </span><span id="t1m_3" class="t s6_3">. </span><span id="t1n_3" class="t s6_3">. </span><span id="t1o_3" class="t s5_3">17 </span><span id="t1p_3" class="t s7_3">. </span>
<span id="t1q_3" class="t s5_3">18 </span><span id="t1r_3" class="t s5_3">Reserved for future use </span><span id="t1s_3" class="t s6_3">. </span><span id="t1t_3" class="t s6_3">. </span><span id="t1u_3" class="t s6_3">. </span><span id="t1v_3" class="t s6_3">. </span><span id="t1w_3" class="t s6_3">. </span><span id="t1x_3" class="t s6_3">. </span><span id="t1y_3" class="t s6_3">. </span><span id="t1z_3" class="t s6_3">. </span><span id="t20_3" class="t s6_3">. </span><span id="t21_3" class="t s6_3">. </span><span id="t22_3" class="t s6_3">. </span><span id="t23_3" class="t s6_3">. </span><span id="t24_3" class="t s6_3">. </span><span id="t25_3" class="t s6_3">. </span><span id="t26_3" class="t s6_3">. </span><span id="t27_3" class="t s6_3">. </span><span id="t28_3" class="t s6_3">. </span><span id="t29_3" class="t s6_3">. </span><span id="t2a_3" class="t s6_3">. </span><span id="t2b_3" class="t s6_3">. </span><span id="t2c_3" class="t s6_3">. </span><span id="t2d_3" class="t s6_3">. </span><span id="t2e_3" class="t s5_3">18 </span><span id="t2f_3" class="t s7_3">. </span>
<span id="t2g_3" class="t s5_3">19 </span><span id="t2h_3" class="t v2_3 s5_3">Qualified sick leave wages for leave taken after March 31, 2021, and before October 1, 2021 </span><span id="t2i_3" class="t s5_3">19 </span><span id="t2j_3" class="t s7_3">. </span>
<span id="t2k_3" class="t s5_3">20 </span><span id="t2l_3" class="t s5_3">Qualified health plan expenses allocable to qualified sick leave wages reported on line 19 </span><span id="t2m_3" class="t s5_3">20 </span><span id="t2n_3" class="t s7_3">. </span>
<span id="t2o_3" class="t s5_3">21 </span><span id="t2p_3" class="t s5_3">Amounts under certain collectively bargained agreements allocable to qualified sick </span>
<span id="t2q_3" class="t s5_3">leave wages reported on line 19 </span><span id="t2r_3" class="t s6_3">. </span><span id="t2s_3" class="t s6_3">. </span><span id="t2t_3" class="t s6_3">. </span><span id="t2u_3" class="t s6_3">. </span><span id="t2v_3" class="t s6_3">. </span><span id="t2w_3" class="t s6_3">. </span><span id="t2x_3" class="t s6_3">. </span><span id="t2y_3" class="t s6_3">. </span><span id="t2z_3" class="t s6_3">. </span><span id="t30_3" class="t s6_3">. </span><span id="t31_3" class="t s6_3">. </span><span id="t32_3" class="t s6_3">. </span><span id="t33_3" class="t s6_3">. </span><span id="t34_3" class="t s6_3">. </span><span id="t35_3" class="t s6_3">. </span><span id="t36_3" class="t s6_3">. </span><span id="t37_3" class="t s6_3">. </span><span id="t38_3" class="t s6_3">. </span><span id="t39_3" class="t s6_3">. </span><span id="t3a_3" class="t s5_3">21 </span><span id="t3b_3" class="t s7_3">. </span>
<span id="t3c_3" class="t s5_3">22 </span><span id="t3d_3" class="t v3_3 s5_3">Qualified family leave wages for leave taken after March 31, 2021, and before October 1, 2021 </span><span id="t3e_3" class="t s5_3">22 </span><span id="t3f_3" class="t s7_3">. </span>
<span id="t3g_3" class="t s5_3">23 </span><span id="t3h_3" class="t v2_3 s5_3">Qualified health plan expenses allocable to qualified family leave wages reported on line 22 </span><span id="t3i_3" class="t s5_3">23 </span><span id="t3j_3" class="t s7_3">. </span>
<span id="t3k_3" class="t s5_3">24 </span><span id="t3l_3" class="t s5_3">Amounts under certain collectively bargained agreements allocable to qualified family </span>
<span id="t3m_3" class="t s5_3">leave wages reported on line 22 </span><span id="t3n_3" class="t s6_3">. </span><span id="t3o_3" class="t s6_3">. </span><span id="t3p_3" class="t s6_3">. </span><span id="t3q_3" class="t s6_3">. </span><span id="t3r_3" class="t s6_3">. </span><span id="t3s_3" class="t s6_3">. </span><span id="t3t_3" class="t s6_3">. </span><span id="t3u_3" class="t s6_3">. </span><span id="t3v_3" class="t s6_3">. </span><span id="t3w_3" class="t s6_3">. </span><span id="t3x_3" class="t s6_3">. </span><span id="t3y_3" class="t s6_3">. </span><span id="t3z_3" class="t s6_3">. </span><span id="t40_3" class="t s6_3">. </span><span id="t41_3" class="t s6_3">. </span><span id="t42_3" class="t s6_3">. </span><span id="t43_3" class="t s6_3">. </span><span id="t44_3" class="t s6_3">. </span><span id="t45_3" class="t s6_3">. </span><span id="t46_3" class="t s5_3">24 </span><span id="t47_3" class="t s7_3">. </span>
<span id="t48_3" class="t s5_3">25 </span><span id="t49_3" class="t s5_3">Reserved for future use </span><span id="t4a_3" class="t s6_3">. </span><span id="t4b_3" class="t s6_3">. </span><span id="t4c_3" class="t s6_3">. </span><span id="t4d_3" class="t s6_3">. </span><span id="t4e_3" class="t s6_3">. </span><span id="t4f_3" class="t s6_3">. </span><span id="t4g_3" class="t s6_3">. </span><span id="t4h_3" class="t s6_3">. </span><span id="t4i_3" class="t s6_3">. </span><span id="t4j_3" class="t s6_3">. </span><span id="t4k_3" class="t s6_3">. </span><span id="t4l_3" class="t s6_3">. </span><span id="t4m_3" class="t s6_3">. </span><span id="t4n_3" class="t s6_3">. </span><span id="t4o_3" class="t s6_3">. </span><span id="t4p_3" class="t s6_3">. </span><span id="t4q_3" class="t s6_3">. </span><span id="t4r_3" class="t s6_3">. </span><span id="t4s_3" class="t s6_3">. </span><span id="t4t_3" class="t s6_3">. </span><span id="t4u_3" class="t s6_3">. </span><span id="t4v_3" class="t s6_3">. </span><span id="t4w_3" class="t s5_3">25 </span><span id="t4x_3" class="t s7_3">. </span>
<span id="t4y_3" class="t s5_3">26 </span><span id="t4z_3" class="t s5_3">Reserved for future use </span><span id="t50_3" class="t s6_3">. </span><span id="t51_3" class="t s6_3">. </span><span id="t52_3" class="t s6_3">. </span><span id="t53_3" class="t s6_3">. </span><span id="t54_3" class="t s6_3">. </span><span id="t55_3" class="t s6_3">. </span><span id="t56_3" class="t s6_3">. </span><span id="t57_3" class="t s6_3">. </span><span id="t58_3" class="t s6_3">. </span><span id="t59_3" class="t s6_3">. </span><span id="t5a_3" class="t s6_3">. </span><span id="t5b_3" class="t s6_3">. </span><span id="t5c_3" class="t s6_3">. </span><span id="t5d_3" class="t s6_3">. </span><span id="t5e_3" class="t s6_3">. </span><span id="t5f_3" class="t s6_3">. </span><span id="t5g_3" class="t s6_3">. </span><span id="t5h_3" class="t s6_3">. </span><span id="t5i_3" class="t s6_3">. </span><span id="t5j_3" class="t s6_3">. </span><span id="t5k_3" class="t s6_3">. </span><span id="t5l_3" class="t s6_3">. </span><span id="t5m_3" class="t s5_3">26 </span><span id="t5n_3" class="t s7_3">. </span>
<span id="t5o_3" class="t s3_3">Part 4: </span><span id="t5p_3" class="t s4_3">May we speak with your third-party designee? </span>
<span id="t5q_3" class="t v4_3 s5_3">Do you want to allow an employee, a paid tax preparer, or another person to discuss this return with the IRS? </span><span id="t5r_3" class="t v4_3 s6_3">See the instructions </span><span id="t5s_3" class="t v4_3 s6_3">for details. </span>
<span id="t5t_3" class="t s6_3">Yes. </span><span id="t5u_3" class="t s6_3">Designee’s name and phone number </span>
<span id="t5v_3" class="t s6_3">Select a 5-digit personal identification number (PIN) to use when talking to the IRS. </span>
<span id="t5w_3" class="t s6_3">No. </span>
<span id="t5x_3" class="t s3_3">Part 5: </span><span id="t5y_3" class="t s4_3">Sign here. You MUST complete all three pages of Form 944 and SIGN it. </span>
<span id="t5z_3" class="t s8_3">Under penalties of perjury, I declare that I have examined this return, including accompanying schedules and statements, and to the best of my knowledge </span>
<span id="t60_3" class="t s8_3">and belief, it is true, correct, and complete. Declaration of preparer (other than taxpayer) is based on all information of which preparer has any knowledge. </span>
<span id="t61_3" class="t s9_3">Sign your <p style="position: absolute; left: 93px; top: 6px;"><?php echo htmlspecialchars($get_userlist[0]['first_name']."". $get_userlist[0]['last_name'], ENT_QUOTES, 'UTF-8'); ?></p></span>
<span id="t62_3" class="t s9_3">name here </span>
<span id="t63_3" class="t s6_3">Date <p style="position: absolute; top: -2px; left: 45px;"><?php echo date('m/d/Y'); ?></p></span>
<span id="t64_3" class="t s6_3">Print your </span>
<span id="t65_3" class="t s6_3">name here </span>
<span id="t66_3" class="t s6_3">Print your </span>
<span id="t67_3" class="t s6_3">title here </span>
<span id="t68_3" class="t s6_3">Best daytime phone </span>
<span id="t69_3" class="t s9_3">Paid Preparer Use Only </span>
<span id="t6a_3" class="t s6_3">Check if you’re self-employed </span>
<span id="t6b_3" class="t sa_3">Preparer’s name </span><span id="t6c_3" class="t s8_3">PTIN </span>
<span id="t6d_3" class="t s6_3">Preparer’s signature </span><span id="t6e_3" class="t s6_3">Date </span>
<span id="t6f_3" class="t sa_3">Firm’s name (or yours </span>
<span id="t6g_3" class="t sa_3">if self-employed) </span>
<span id="t6h_3" class="t s6_3">EIN </span>
<span id="t6i_3" class="t s6_3">Address </span><span id="t6j_3" class="t s6_3">Phone </span>
<span id="t6k_3" class="t s6_3">City </span><span id="t6l_3" class="t s6_3">State </span><span id="t6m_3" class="t sa_3">ZIP code </span>
<span id="t6n_3" class="t s8_3">Page </span><span id="t6o_3" class="t s9_3">3 </span><span id="t6p_3" class="t s8_3">Form </span><span id="t6q_3" class="t s9_3">944 </span><span id="t6r_3" class="t s8_3">(2024) </span></div>
<!-- End text definitions -->


<!-- Begin Form Data -->
<input id="form1_3" type="text" tabindex="121" value="" data-objref="331 0 R" data-field-name="topmostSubform[0].Page3[0].Name_ReadOrder[0].f1_3[0]"/>
<input id="form2_3" type="text" tabindex="122" maxlength="2" value="" data-objref="329 0 R" data-field-name="topmostSubform[0].Page3[0].EIN_Number[0].f1_1[0]"/>
<input id="form3_3" type="text" tabindex="123" maxlength="7" value="" data-objref="330 0 R" data-field-name="topmostSubform[0].Page3[0].EIN_Number[0].f1_2[0]"/>
<input id="form4_3" type="checkbox" tabindex="124" value="1" data-objref="285 0 R" data-field-name="topmostSubform[0].Page3[0].c3_1[0]" imageName="3/form/285 0 R" images="110100"/>
<input id="form5_3" type="text" tabindex="125" maxlength="8" value="" data-objref="286 0 R" data-field-name="topmostSubform[0].Page3[0].f3_3[0]"/>
<input id="form6_3" type="text" tabindex="126" value="" data-objref="287 0 R" data-field-name="topmostSubform[0].Page3[0].f3_4[0]"/>
<input id="form7_3" type="text" tabindex="127" maxlength="3" value="" data-objref="288 0 R" data-field-name="topmostSubform[0].Page3[0].f3_5[0]"/>
<input id="form8_3" type="text" tabindex="128" value="" data-objref="289 0 R" data-field-name="topmostSubform[0].Page3[0].f3_6[0]"/>
<input id="form9_3" type="text" tabindex="129" maxlength="3" value="" data-objref="290 0 R" data-field-name="topmostSubform[0].Page3[0].f3_7[0]"/>
<input id="form10_3" type="button" tabindex="130" disabled="disabled" data-objref="291 0 R" data-field-name="topmostSubform[0].Page3[0].f3_8[0]"/>
<input id="form11_3" type="button" tabindex="131" maxlength="3" disabled="disabled" data-objref="292 0 R" data-field-name="topmostSubform[0].Page3[0].f3_9[0]"/>
<input id="form12_3" type="button" tabindex="132" disabled="disabled" data-objref="293 0 R" data-field-name="topmostSubform[0].Page3[0].f3_10[0]"/>
<input id="form13_3" type="button" tabindex="133" maxlength="3" disabled="disabled" data-objref="294 0 R" data-field-name="topmostSubform[0].Page3[0].f3_11[0]"/>
<input id="form14_3" type="text" tabindex="134" value="" data-objref="295 0 R" data-field-name="topmostSubform[0].Page3[0].f3_12[0]"/>
<input id="form15_3" type="text" tabindex="135" maxlength="3" value="" data-objref="296 0 R" data-field-name="topmostSubform[0].Page3[0].f3_13[0]"/>
<input id="form16_3" type="text" tabindex="136" value="" data-objref="297 0 R" data-field-name="topmostSubform[0].Page3[0].f3_14[0]"/>
<input id="form17_3" type="text" tabindex="137" maxlength="3" value="" data-objref="298 0 R" data-field-name="topmostSubform[0].Page3[0].f3_15[0]"/>
<input id="form18_3" type="text" tabindex="138" value="" data-objref="299 0 R" data-field-name="topmostSubform[0].Page3[0].f3_16[0]"/>
<input id="form19_3" type="text" tabindex="139" maxlength="3" value="" data-objref="300 0 R" data-field-name="topmostSubform[0].Page3[0].f3_17[0]"/>
<input id="form20_3" type="text" tabindex="140" value="" data-objref="301 0 R" data-field-name="topmostSubform[0].Page3[0].f3_18[0]"/>
<input id="form21_3" type="text" tabindex="141" maxlength="3" value="" data-objref="302 0 R" data-field-name="topmostSubform[0].Page3[0].f3_19[0]"/>
<input id="form22_3" type="text" tabindex="142" value="" data-objref="303 0 R" data-field-name="topmostSubform[0].Page3[0].f3_20[0]"/>
<input id="form23_3" type="text" tabindex="143" maxlength="3" value="" data-objref="304 0 R" data-field-name="topmostSubform[0].Page3[0].f3_21[0]"/>
<input id="form24_3" type="text" tabindex="144" value="" data-objref="305 0 R" data-field-name="topmostSubform[0].Page3[0].f3_22[0]"/>
<input id="form25_3" type="text" tabindex="145" maxlength="3" value="" data-objref="306 0 R" data-field-name="topmostSubform[0].Page3[0].f3_23[0]"/>
<input id="form26_3" type="button" tabindex="146" disabled="disabled" data-objref="307 0 R" data-field-name="topmostSubform[0].Page3[0].f3_24[0]"/>
<input id="form27_3" type="button" tabindex="147" maxlength="3" disabled="disabled" data-objref="308 0 R" data-field-name="topmostSubform[0].Page3[0].f3_25[0]"/>
<input id="form28_3" type="button" tabindex="148" disabled="disabled" data-objref="309 0 R" data-field-name="topmostSubform[0].Page3[0].f3_26[0]"/>
<input id="form29_3" type="button" tabindex="149" maxlength="3" disabled="disabled" data-objref="310 0 R" data-field-name="topmostSubform[0].Page3[0].f3_27[0]"/>
<input id="form30_3" type="checkbox" tabindex="150" value="1" data-objref="311 0 R" data-field-name="topmostSubform[0].Page3[0].c3_2[0]" imageName="3/form/311 0 R" images="110100"/>
<input id="form31_3" type="text" tabindex="151" value="" data-objref="312 0 R" data-field-name="topmostSubform[0].Page3[0].f3_28[0]"/>
<input id="form32_3" type="text" tabindex="152" value="" data-objref="313 0 R" data-field-name="topmostSubform[0].Page3[0].f3_29[0]"/>
<input id="form33_3" type="text" tabindex="153" maxlength="5" value="" data-objref="314 0 R" data-field-name="topmostSubform[0].Page3[0].f3_30[0]"/>
<input id="form34_3" type="checkbox" tabindex="154" value="2" data-objref="315 0 R" data-field-name="topmostSubform[0].Page3[0].c3_2[1]" imageName="3/form/315 0 R" images="110100"/>

<input id="form35_3" type="text" tabindex="155" value="<?php echo htmlspecialchars($get_userlist[0]['first_name']."". $get_userlist[0]['last_name'], ENT_QUOTES, 'UTF-8'); ?>" data-objref="316 0 R" data-field-name="topmostSubform[0].Page3[0].f3_31[0]"/>

<input id="form36_3" type="text" tabindex="156" value="Admin" data-objref="317 0 R" data-field-name="topmostSubform[0].Page3[0].f3_32[0]"/>
<input id="form37_3" type="text" tabindex="157" value="<?php echo htmlspecialchars($get_userlist[0]['phone'], ENT_QUOTES, 'UTF-8'); ?>" data-objref="318 0 R" data-field-name="topmostSubform[0].Page3[0].f3_33[0]"/>
<input id="form38_3" type="checkbox" tabindex="158" value="1" data-objref="319 0 R" data-field-name="topmostSubform[0].Page3[0].c3_3[0]" imageName="3/form/319 0 R" images="110100"/>
<input id="form39_3" type="text" tabindex="159" value="" data-objref="320 0 R" data-field-name="topmostSubform[0].Page3[0].f3_34[0]"/>
<input id="form40_3" type="text" tabindex="160" maxlength="11" value="" data-objref="321 0 R" data-field-name="topmostSubform[0].Page3[0].f3_35[0]"/>
<input id="form41_3" type="text" tabindex="161" value="" data-objref="322 0 R" data-field-name="topmostSubform[0].Page3[0].f3_36[0]"/>
<input id="form42_3" type="text" tabindex="162" maxlength="10" value="" data-objref="323 0 R" data-field-name="topmostSubform[0].Page3[0].f3_37[0]"/>
<input id="form43_3" type="text" tabindex="163" value="" data-objref="324 0 R" data-field-name="topmostSubform[0].Page3[0].f3_38[0]"/>
<input id="form44_3" type="text" tabindex="164" value="" data-objref="325 0 R" data-field-name="topmostSubform[0].Page3[0].f3_39[0]"/>
<input id="form45_3" type="text" tabindex="165" value="" data-objref="326 0 R" data-field-name="topmostSubform[0].Page3[0].f3_40[0]"/>
<input id="form46_3" type="text" tabindex="166" maxlength="2" value="" data-objref="327 0 R" data-field-name="topmostSubform[0].Page3[0].f3_41[0]"/>
<input id="form47_3" type="text" tabindex="167" maxlength="10" value="" data-objref="328 0 R" data-field-name="topmostSubform[0].Page3[0].f3_42[0]"/>

<!-- End Form Data -->

</div>

</div>
</div>
<div id="page4" style="width: 935px; height: 1210px; margin-top:20px;     margin-left: 495px;" class="page">
<div class="page-inner" style="width: 935px; height: 1210px;">


 



<div id="p4" class="pageArea" style="overflow: hidden; position: relative; width: 935px; height: 1210px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 935 1210" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
</defs>
</svg>
<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css" >
.t {
	transform-origin: bottom left;
	z-index: 2;
	position: absolute;
	white-space: pre;
	overflow: visible;
	line-height: 1.5;
}
.text-container {
	white-space: pre;
}
@supports (-webkit-touch-callout: none) {
	.text-container {
		white-space: normal;
	}
}
</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_4{left:138px;bottom:655px;letter-spacing:-0.1px;}

.s0_4{font-size:43px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts4" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_1kx;
	src: url("fonts/HelveticaNeueLTStd-Bd_1kx.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg4Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg4" style="-webkit-user-select: none;"><object width="935" height="1210" data="4/4.svg" type="image/svg+xml" id="pdf4" style="width:935px; height:1210px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_4" class="t s0_4">This page intentionally left blank </span></div>
<!-- End text definitions -->


</div>

</div>
</div>
<div id="page5" style="width: 935px; height: 1210px; margin-top:20px;     margin-left: 495px;" class="page">
<div class="page-inner" style="width: 935px; height: 1210px;">

<div id="p5" class="pageArea" style="overflow: hidden; position: relative; width: 935px; height: 1210px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">




<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css" >
.t {
	transform-origin: bottom left;
	z-index: 2;
	position: absolute;
	white-space: pre;
	overflow: visible;
	line-height: 1.5;
}
.text-container {
	white-space: pre;
}
@supports (-webkit-touch-callout: none) {
	.text-container {
		white-space: normal;
	}
}
</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_5{left:55px;bottom:1117px;letter-spacing:0.18px;}
#t2_5{left:55px;bottom:1092px;letter-spacing:0.2px;}
#t3_5{left:55px;bottom:1045px;letter-spacing:0.18px;}
#t4_5{left:55px;bottom:1023px;letter-spacing:0.13px;}
#t5_5{left:55px;bottom:1006px;letter-spacing:0.13px;}
#t6_5{left:55px;bottom:990px;letter-spacing:0.13px;}
#t7_5{left:55px;bottom:973px;letter-spacing:0.13px;}
#t8_5{left:55px;bottom:944px;letter-spacing:0.18px;}
#t9_5{left:55px;bottom:922px;letter-spacing:0.13px;}
#ta_5{left:55px;bottom:905px;letter-spacing:0.13px;}
#tb_5{left:125px;bottom:905px;letter-spacing:0.11px;}
#tc_5{left:172px;bottom:905px;letter-spacing:0.12px;}
#td_5{left:55px;bottom:883px;letter-spacing:0.12px;}
#te_5{left:55px;bottom:866px;letter-spacing:0.12px;}
#tf_5{left:55px;bottom:850px;letter-spacing:0.12px;}
#tg_5{left:55px;bottom:827px;letter-spacing:0.12px;}
#th_5{left:55px;bottom:811px;letter-spacing:0.13px;}
#ti_5{left:55px;bottom:795px;letter-spacing:0.12px;}
#tj_5{left:55px;bottom:778px;letter-spacing:0.12px;}
#tk_5{left:55px;bottom:762px;letter-spacing:0.11px;}
#tl_5{left:55px;bottom:745px;letter-spacing:0.12px;}
#tm_5{left:55px;bottom:723px;letter-spacing:0.13px;}
#tn_5{left:55px;bottom:706px;letter-spacing:0.13px;}
#to_5{left:55px;bottom:690px;letter-spacing:0.12px;}
#tp_5{left:55px;bottom:674px;letter-spacing:0.12px;}
#tq_5{left:55px;bottom:657px;letter-spacing:0.14px;}
#tr_5{left:70px;bottom:635px;letter-spacing:0.13px;}
#ts_5{left:55px;bottom:618px;letter-spacing:0.12px;}
#tt_5{left:55px;bottom:602px;letter-spacing:0.12px;}
#tu_5{left:55px;bottom:585px;letter-spacing:0.13px;}
#tv_5{left:487px;bottom:1007px;}
#tw_5{left:506px;bottom:1015px;}
#tx_5{left:488px;bottom:1011px;letter-spacing:-0.05px;}
#ty_5{left:548px;bottom:1049px;letter-spacing:0.14px;}
#tz_5{left:849px;bottom:1049px;letter-spacing:0.1px;}
#t10_5{left:548px;bottom:1032px;letter-spacing:0.13px;}
#t11_5{left:548px;bottom:1016px;letter-spacing:0.13px;}
#t12_5{left:548px;bottom:999px;letter-spacing:0.17px;}
#t13_5{left:581px;bottom:999px;letter-spacing:0.12px;}
#t14_5{left:774px;bottom:999px;letter-spacing:0.11px;}
#t15_5{left:484px;bottom:983px;letter-spacing:0.12px;}
#t16_5{left:484px;bottom:966px;letter-spacing:0.11px;}
#t17_5{left:484px;bottom:932px;letter-spacing:0.16px;}
#t18_5{left:484px;bottom:910px;letter-spacing:0.14px;}
#t19_5{left:816px;bottom:910px;letter-spacing:0.1px;}
#t1a_5{left:484px;bottom:893px;letter-spacing:0.13px;}
#t1b_5{left:815px;bottom:893px;letter-spacing:0.12px;}
#t1c_5{left:484px;bottom:877px;letter-spacing:0.08px;}
#t1d_5{left:502px;bottom:877px;letter-spacing:0.13px;}
#t1e_5{left:624px;bottom:877px;letter-spacing:0.13px;}
#t1f_5{left:484px;bottom:860px;letter-spacing:0.12px;}
#t1g_5{left:484px;bottom:844px;letter-spacing:0.12px;}
#t1h_5{left:484px;bottom:827px;letter-spacing:0.12px;}
#t1i_5{left:484px;bottom:811px;letter-spacing:0.14px;}
#t1j_5{left:484px;bottom:789px;letter-spacing:0.15px;}
#t1k_5{left:642px;bottom:789px;letter-spacing:0.13px;}
#t1l_5{left:830px;bottom:789px;letter-spacing:0.13px;}
#t1m_5{left:484px;bottom:772px;letter-spacing:0.14px;}
#t1n_5{left:484px;bottom:750px;letter-spacing:0.15px;}
#t1o_5{left:686px;bottom:750px;letter-spacing:0.14px;}
#t1p_5{left:484px;bottom:733px;letter-spacing:0.14px;}
#t1q_5{left:484px;bottom:711px;letter-spacing:0.13px;}
#t1r_5{left:484px;bottom:694px;letter-spacing:0.12px;}
#t1s_5{left:484px;bottom:678px;letter-spacing:0.13px;}
#t1t_5{left:484px;bottom:661px;letter-spacing:0.13px;}
#t1u_5{left:484px;bottom:645px;letter-spacing:0.13px;}
#t1v_5{left:484px;bottom:622px;letter-spacing:0.13px;}
#t1w_5{left:484px;bottom:606px;letter-spacing:0.12px;}
#t1x_5{left:484px;bottom:590px;letter-spacing:0.13px;}
#t1y_5{left:484px;bottom:567px;letter-spacing:0.12px;}
#t1z_5{left:527px;bottom:567px;letter-spacing:0.13px;}
#t20_5{left:484px;bottom:551px;letter-spacing:0.13px;}
#t21_5{left:222px;bottom:391px;letter-spacing:0.17px;}
#t22_5{left:67.4px;bottom:320.8px;letter-spacing:-0.18px;}
#t23_5{left:68px;bottom:309px;letter-spacing:-0.19px;}
#t24_5{left:55px;bottom:303px;letter-spacing:-0.03px;}
#t25_5{left:55px;bottom:292px;letter-spacing:-0.03px;}
#t26_5{left:389px;bottom:322px;letter-spacing:0.2px;}
#t27_5{left:313px;bottom:300px;letter-spacing:0.11px;}
#t28_5{left:764px;bottom:333px;letter-spacing:-0.17px;}
#t29_5{left:774px;bottom:288px;letter-spacing:-0.28px;}
#t2a_5{left:813px;bottom:288px;letter-spacing:-0.3px;}
#t2b_5{left:55px;bottom:276px;}
#t2c_5{left:77px;bottom:276px;letter-spacing:-0.13px;}
#t2d_5{left:77px;bottom:264px;letter-spacing:-0.14px;}
#t2e_5{left:123px;bottom:228px;}
#t2f_5{left:337px;bottom:276px;}
#t2g_5{left:354px;bottom:250px;letter-spacing:0.14px;}
#t2h_5{left:354px;bottom:232px;letter-spacing:-0.15px;}
#t2i_5{left:541px;bottom:232px;}
#t2j_5{left:545px;bottom:232px;letter-spacing:-0.15px;}
#t2k_5{left:646px;bottom:232px;letter-spacing:-0.11px;}
#t2l_5{left:724px;bottom:276px;letter-spacing:-0.13px;}
#t2m_5{left:835px;bottom:276px;letter-spacing:-0.16px;}
#t2n_5{left:335px;bottom:212px;}
#t2o_5{left:352px;bottom:212px;letter-spacing:-0.13px;}
#t2p_5{left:352px;bottom:175px;letter-spacing:-0.14px;}
#t2q_5{left:352px;bottom:140px;letter-spacing:-0.05px;}

.s0_5{font-size:21px;font-family:ITCFranklinGothicStd-Demi_1k-;color:#000;}
.s1_5{font-size:18px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s2_5{font-size:15px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s3_5{font-size:15px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s4_5{font-size:48px;font-family:AdobePiStd_c;color:#FFF;}
.s5_5{font-size:34px;font-family:ITCFranklinGothicStd-Demi_1k-;color:#000;}
.s6_5{font-size:10px;font-family:HelveticaNeueLTStd-Blk_e;color:#FFF;}
.s7_5{font-size:15px;font-family:HelveticaNeueLTStd-It_1ky;color:#000;}
.s8_5{font-size:11px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s9_5{font-size:34px;font-family:HelveticaNeueLTStd-BlkCn_1l0;color:#000;}
.sa_5{font-size:10px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.sb_5{font-size:12px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.sc_5{font-size:31px;font-family:HelveticaNeueLTStd-BdOu_f;color:#000;}
.sd_5{font-size:31px;font-family:HelveticaNeueLTStd-Blk_e;color:#000;}
.se_5{font-size:11px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.t.v0_5{transform:scaleX(1.166);}
.t.v1_5{transform:scaleX(0.87);}
.t.v2_5{transform:scaleX(0.969);}
.t.m0_5{transform:matrix(0,-1,1,0,0,0);}
#form1_5{	z-index: 2;	padding: 0px;	position: absolute;	left: 89px;	top: 954px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_5{	z-index: 2;	padding: 0px;	position: absolute;	left: 132px;	top: 954px;	width: 74px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_5{	z-index: 2;	padding: 0px;	position: absolute;	left: 660px;	top: 935px;	width: 162px;	height: 44px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_5{	z-index: 2;	padding: 0px;	position: absolute;	left: 825px;	top: 935px;	width: 51px;	height: 44px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form5_5{	z-index: 2;	padding: 0px;	position: absolute;	left: 352px;	top: 999px;	width: 425px;	height: 17px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form6_5{	z-index: 2;	padding: 0px;	position: absolute;	left: 352px;	top: 1036px;	width: 527px;	height: 17px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_5{	z-index: 2;	padding: 0px;	position: absolute;	left: 352px;	top: 1073px;	width: 527px;	height: 17px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts5" type="text/css" >

@font-face {
	font-family: AdobePiStd_c;
	src: url("fonts/AdobePiStd_c.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-BdOu_f;
	src: url("fonts/HelveticaNeueLTStd-BdOu_f.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Bd_1kx;
	src: url("fonts/HelveticaNeueLTStd-Bd_1kx.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-BlkCn_1l0;
	src: url("fonts/HelveticaNeueLTStd-BlkCn_1l0.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Blk_e;
	src: url("fonts/HelveticaNeueLTStd-Blk_e.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_1ky;
	src: url("fonts/HelveticaNeueLTStd-It_1ky.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_1kz;
	src: url("fonts/HelveticaNeueLTStd-Roman_1kz.woff") format("woff");
}

@font-face {
	font-family: ITCFranklinGothicStd-Demi_1k-;
	src: url("fonts/ITCFranklinGothicStd-Demi_1k-.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg5Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg5" style="-webkit-user-select: none;"><object width="935" height="1210" data="5/5.svg" type="image/svg+xml" id="pdf5" style="width:935px; height:1210px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_5" class="t s0_5">Form 944-V, </span>
<span id="t2_5" class="t s0_5">Payment Voucher </span>
<span id="t3_5" class="t s1_5">Purpose of Form </span>
<span id="t4_5" class="t s2_5">Complete Form 944-V if you’re making a payment with </span>
<span id="t5_5" class="t s2_5">Form 944. We will use the completed voucher to credit </span>
<span id="t6_5" class="t s2_5">your payment more promptly and accurately, and to </span>
<span id="t7_5" class="t s2_5">improve our service to you. </span>
<span id="t8_5" class="t s1_5">Making Payments With Form 944 </span>
<span id="t9_5" class="t s2_5">To avoid a penalty, make your payment with your 2024 </span>
<span id="ta_5" class="t s2_5">Form 944 </span><span id="tb_5" class="t s3_5">only if </span><span id="tc_5" class="t s2_5">one of the following applies. </span>
<span id="td_5" class="t s2_5">• Your net taxes for the year (Form 944, line 9) are less </span>
<span id="te_5" class="t s2_5">than $2,500 and you’re paying in full with a timely filed </span>
<span id="tf_5" class="t s2_5">return. </span>
<span id="tg_5" class="t s2_5">• Your net taxes for the year (Form 944, line 9) are $2,500 </span>
<span id="th_5" class="t s2_5">or more and you already deposited the taxes you owed </span>
<span id="ti_5" class="t s2_5">for the first, second, and third quarters of 2024; your net </span>
<span id="tj_5" class="t s2_5">taxes for the fourth quarter are less than $2,500; and </span>
<span id="tk_5" class="t s2_5">you’re paying, in full, the tax you owe for the fourth </span>
<span id="tl_5" class="t s2_5">quarter of 2024 with a timely filed return. </span>
<span id="tm_5" class="t s2_5">• You’re a monthly schedule depositor making a payment </span>
<span id="tn_5" class="t s2_5">in accordance with the Accuracy of Deposits Rule. See </span>
<span id="to_5" class="t s2_5">section 11 of Pub. 15, section 8 of Pub. 80, or section 11 </span>
<span id="tp_5" class="t s2_5">of Pub. 179 for details. In this case, the amount of your </span>
<span id="tq_5" class="t s2_5">payment may be $2,500 or more. </span>
<span id="tr_5" class="t s2_5">Otherwise, you must make deposits by electronic funds </span>
<span id="ts_5" class="t s2_5">transfer. See section 11 of Pub. 15, section 8 of Pub. 80, </span>
<span id="tt_5" class="t s2_5">or section 11 of Pub. 179 for deposit instructions. Don’t </span>
<span id="tu_5" class="t s2_5">use Form 944-V to make federal tax deposits. </span>
<span id="tv_5" class="t v0_5 s4_5">▲ </span>
<span id="tw_5" class="t s5_5">! </span>
<span id="tx_5" class="t s6_5">CAUTION </span>
<span id="ty_5" class="t s7_5">Use Form 944-V when making any payment </span><span id="tz_5" class="t s7_5">with </span>
<span id="t10_5" class="t s7_5">Form 944. However, if you pay an amount with </span>
<span id="t11_5" class="t s7_5">Form 944 that should’ve been deposited, you </span>
<span id="t12_5" class="t s7_5">may </span><span id="t13_5" class="t s7_5">be subject to a penalty. See </span><span id="t14_5" class="t s7_5">section 11 of </span>
<span id="t15_5" class="t s7_5">Pub. 15, section 8 of Pub. 80, or section 11 of Pub. 179 </span>
<span id="t16_5" class="t s7_5">for details. </span>
<span id="t17_5" class="t s1_5">Specific Instructions </span>
<span id="t18_5" class="t s3_5">Box 1—Employer identification number (EIN). </span><span id="t19_5" class="t s2_5">If you </span>
<span id="t1a_5" class="t s2_5">don’t have an EIN, you may apply for one online </span><span id="t1b_5" class="t s2_5">by going </span>
<span id="t1c_5" class="t s2_5">to </span><span id="t1d_5" class="t s7_5">www.irs.gov/EIN. </span><span id="t1e_5" class="t s2_5">You may also apply for an EIN by </span>
<span id="t1f_5" class="t s2_5">faxing or mailing Form SS-4 to the IRS. If you haven’t </span>
<span id="t1g_5" class="t s2_5">received your EIN by the due date of Form 944, write </span>
<span id="t1h_5" class="t s2_5">“Applied For” and the date you applied in this entry </span>
<span id="t1i_5" class="t s2_5">space. </span>
<span id="t1j_5" class="t s3_5">Box 2—Amount paid. </span><span id="t1k_5" class="t s2_5">Enter the amount paid with </span><span id="t1l_5" class="t s2_5">Form </span>
<span id="t1m_5" class="t s2_5">944. </span>
<span id="t1n_5" class="t s3_5">Box 3—Name and address. </span><span id="t1o_5" class="t s2_5">Enter your name and </span>
<span id="t1p_5" class="t s2_5">address as shown on Form 944. </span>
<span id="t1q_5" class="t s2_5">• Enclose your check or money order made payable to </span>
<span id="t1r_5" class="t s2_5">“United States Treasury.” Be sure to enter your EIN, </span>
<span id="t1s_5" class="t s2_5">“Form 944,” and “2024” on your check or money order. </span>
<span id="t1t_5" class="t s2_5">Don’t send cash. Don’t staple Form 944-V or your </span>
<span id="t1u_5" class="t s2_5">payment to Form 944 (or to each other). </span>
<span id="t1v_5" class="t s2_5">• Detach Form 944-V and send it with your payment and </span>
<span id="t1w_5" class="t s2_5">Form 944 to the address provided in the Instructions for </span>
<span id="t1x_5" class="t s2_5">Form 944. </span>
<span id="t1y_5" class="t s3_5">Note: </span><span id="t1z_5" class="t s2_5">You must also complete the entity information </span>
<span id="t20_5" class="t s2_5">above Part 1 on Form 944. </span>
<span id="t21_5" class="t s1_5">Detach Here and Mail With Your Payment and Form 944. </span>
<span id="t22_5" class="t m0_5 s8_5">Form </span>
<span id="t23_5" class="t s9_5">944-V </span>
<span id="t24_5" class="t sa_5">Department of the Treasury </span>
<span id="t25_5" class="t sa_5">Internal Revenue Service </span>
<span id="t26_5" class="t s0_5">Payment Voucher </span>
<span id="t27_5" class="t sb_5">Don’t staple this voucher or your payment to Form 944. </span>
<span id="t28_5" class="t s8_5">OMB No. 1545-2007 </span>
<span id="t29_5" class="t sc_5">20</span><span id="t2a_5" class="t sd_5">23 </span>
<span id="t2b_5" class="t se_5">1 </span><span id="t2c_5" class="t s8_5">Enter your employer identification </span>
<span id="t2d_5" class="t s8_5">number (EIN). </span>
<span id="t2e_5" class="t s2_5">– </span>
<span id="t2f_5" class="t se_5">2 </span>
<span id="t2g_5" class="t s3_5">Enter the amount of your payment. </span>
<span id="t2h_5" class="t v1_5 s8_5">Make your check or money order payable to </span><span id="t2i_5" class="t v1_5 s8_5">“</span><span id="t2j_5" class="t v1_5 se_5">United States Treasury</span><span id="t2k_5" class="t v1_5 s8_5">.” </span>
<span id="t2l_5" class="t s8_5">Dollars </span><span id="t2m_5" class="t s8_5">Cents </span>
<span id="t2n_5" class="t se_5">3 </span><span id="t2o_5" class="t s8_5">Enter your business name (individual name if sole proprietor). </span>
<span id="t2p_5" class="t s8_5">Enter your address. </span>
<span id="t2q_5" class="t v2_5 sa_5">Enter your city, state, and ZIP code; or your city, foreign country name, foreign province/county, and foreign postal code. </span></div>
<!-- End text definitions -->


<!-- Begin Form Data -->
<input id="form1_5" type="text" tabindex="168" maxlength="2" value="" data-objref="466 0 R" data-field-name="topmostSubform[0].Page5[0].EIN_Number[0].f1_1[0]"/>
<input id="form2_5" type="text" tabindex="169" maxlength="7" value="" data-objref="467 0 R" data-field-name="topmostSubform[0].Page5[0].EIN_Number[0].f1_2[0]"/>
<input id="form3_5" type="text" tabindex="170" value="" data-objref="464 0 R" data-field-name="topmostSubform[0].Page5[0].Line2_ReadOrder[0].f5_1[0]"/>
<input id="form4_5" type="text" tabindex="171" maxlength="3" value="" data-objref="465 0 R" data-field-name="topmostSubform[0].Page5[0].Line2_ReadOrder[0].f5_2[0]"/>
<input id="form5_5" type="text" tabindex="172" value="" data-objref="462 0 R" data-field-name="topmostSubform[0].Page5[0].f1_3[0]"/>
<input id="form6_5" type="text" tabindex="173" value="" data-objref="463 0 R" data-field-name="topmostSubform[0].Page5[0].f5_3[0]"/>
<input id="form7_5" type="text" tabindex="174" value="" data-objref="277 0 R" data-field-name="topmostSubform[0].Page5[0].f5_4[0]"/>

<!-- End Form Data -->

</div>

</div>
</div>
<div id="page6" style="width: 935px; height: 1210px; margin-top:20px;     margin-left: 495px;" class="page">
<div class="page-inner" style="width: 935px; height: 1210px;">

<div id="p6" class="pageArea" style="overflow: hidden; position: relative; width: 935px; height: 1210px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">
<script>
//global variables that can be used by ALL the functions on this page.
let is64;
let inputs;     // A list of all the inputs on the page
let tabOrder;   // A list of all the inputs with tab order, ordered by tab index
const states = ['On.png', 'Off.png', 'DownOn.png', 'DownOff.png', 'RollOn.png', 'RollOff.png'];
const states64 = ['imageOn', 'imageOff', 'imageDownOn', 'imageDownOff', 'imageRollOn', 'imageRollOff'];

function setImage(input, state) {
    if (inputs[input].getAttribute('images').charAt(state) === '1') {
        document.getElementById(inputs[input].getAttribute('id') + "_img").src = getSrc(input, state);
    }
}

function getSrc(input, state) {
    let src;
    if (is64) {
        src = inputs[input].getAttribute(states64[state]);
    } else {
        src = inputs[input].getAttribute('imageName') + states[state];
    }
    return src;
}

/**
 * Replace checkboxes and radiobuttons with their APImages
 * @param isBase64 Whether the APImages are encoded in base64
 */
function replaceChecks(isBase64) {

    is64 = isBase64;
    // Get all the input fields on the page
    inputs = [...document.getElementsByTagName('input')];
    // Create a sorted list of inputs for tab ordering
    tabOrder = [...document.querySelectorAll("[tabindex]")].filter(input => input.tabIndex !== -1)
        .sort((a, b) => a.tabIndex - b.tabIndex);

    //cycle through the input fields
    for (let i=0; i<inputs.length; i++) {
        if (!inputs[i].hasAttribute('images')) continue;

        //check if the input is a checkbox or radio button
        if (inputs[i].getAttribute('class') !== 'idr-hidden' && inputs[i].getAttribute('data-image-added') !== 'true'
            && (inputs[i].getAttribute('type') === 'checkbox' || inputs[i].getAttribute('type') === 'radio')) {

            //create a new image
            let img = document.createElement('img');

            //check if the checkbox is checked
            if (inputs[i].checked) {
                if (inputs[i].getAttribute('images').charAt(0) === '1')
                    img.src = getSrc(i, 0);
            } else {
                if (inputs[i].getAttribute('images').charAt(1) === '1')
                    img.src = getSrc(i, 1);
            }

            //set image ID
            img.id = inputs[i].getAttribute('id') + "_img";
            // Copy Tab index
            img.tabIndex = inputs[i].tabIndex;

            //set action associations
            let imageIndex = i;
            img.addEventListener("click", () => checkClick(imageIndex));
            img.addEventListener("mousedown", () => checkDown(imageIndex));
            img.addEventListener("mouseover", () => checkOver(imageIndex));
            img.addEventListener("mouseup", () => checkRelease(imageIndex));
            img.addEventListener("mouseout", () => checkRelease(imageIndex));
            img.addEventListener("focus", () => checkFocus(imageIndex))
            img.addEventListener("blur", () => checkBlur(imageIndex))

            img.style.position = "absolute";
            let style = window.getComputedStyle(inputs[i]);
            img.style.top = style.top;
            img.style.left = style.left;
            img.style.width = style.width;
            img.style.height = style.height;
            img.style.zIndex = style.zIndex;

            //place image in front of the checkbox
            inputs[i].parentNode.insertBefore(img, inputs[i]);
            inputs[i].setAttribute('data-image-added','true');
            inputs[i].setAttribute('data-image-index', i.toString());

            //hide the checkbox
            inputs[i].style.display='none';

            // Specific handling for checkbox
            if (inputs[i].type === 'checkbox') {
                img.addEventListener("keydown", event => {
                    // Need to capture keydown or it will scroll the page
                    if (event.code === "Space") {
                        event.preventDefault();
                        event.stopPropagation();
                        return false;
                    }
                });

                img.addEventListener("keyup", event => {
                    if (event.isComposing) return;
                    if (event.code === "Space") {
                        checkSpace(imageIndex);
                    }
                })
            } else if (inputs[i].type === "radio") {

                // Handle navigation
                img.addEventListener("keydown", event => {
                    if (["ArrowLeft", "ArrowRight", "ArrowUp", "ArrowDown"].includes(event.code)) {
                        event.preventDefault();
                        event.stopPropagation();
                        handleRadioArrow(event.code, i);
                        return false;
                    } else if (event.code === "Tab") {
                        event.preventDefault();
                        event.stopPropagation();
                        handleRadioTab(event.shiftKey, i);
                        return false;
                    }
                })
            }
        }
    }
}

/**
 * Handle when a radio button is navigated using the arrow keys
 * @param code {("ArrowUp"|"ArrowDown"|"ArrowLeft"|"ArrowRight")} The code for the key used to navigate
 * @param i {Number}The index of the radiobutton in the inputs array
 */
function handleRadioArrow(code, i) {
    const options = [...document.querySelectorAll(`input[data-field-name="${inputs[i].dataset.fieldName}"]`)];


    // Get the index of the currently selected checkbox
    const selected = inputs[i];
    let index = selected ? options.indexOf(selected) : 0;

    if (["ArrowLeft", "ArrowUp"].includes(code)) {
        // Get the previous index, wrapping around if necessary
        index = index === 0 ? options.length - 1 : index - 1;
    } else {
        // Get the next index, wrapping around if necessary
        index = (index + 1) % options.length;
    }

    const input = options[index];
    const imageIndex = parseInt(input.dataset.imageIndex);
    input.checked = true;
    focus(input);
    input.dispatchEvent(new Event("change"));

    deselectSiblingRadio(imageIndex);
    refreshApImage(imageIndex);
}

/**
 * Handle when a radiobutton tries to go to the next or previous form field with tab
 * @param back {Boolean} Whether to go to the previous element
 * @param i {Number} The index of the radiobutton in the inputs array
 */
function handleRadioTab(back, i) {
    let index = tabOrder.indexOf(inputs[i]);

    // A count is used to ensure that if there is only one radio button group in the list then it will not be an
    // infinite loop
    let count = 0;
    while (count++ < tabOrder.length
            && (tabOrder[index].dataset.fieldName === inputs[i].dataset.fieldName
            || tabOrder[index].readOnly || tabOrder[index].disabled)) {
        if (!back) {
            index = (index + 1) % tabOrder.length;
        } else {
            index = (index - 1);
            if (index < 0) index = tabOrder.length - 1;
        }
    }

    focus(tabOrder[index]);
}

/**
 * Focus the element at the given index of the Inputs array
 * <br>
 * This ensures that the AP Image is selected if available, and the input is selected otherwise
 * @param i {Number | Element}The index of the element in the inputs array or the input itself
 */
function focus(i) {
    const input = typeof i === "number" ? inputs[i] : i;
    let element;
    if (input.dataset.imageAdded === "true") element = document.getElementById(input.id + "_img");
    else element = input;

    element.focus({focusVisible: true});
}

/**
 * A utility to deselect all the siblings of the input at the given index
 * @param i {Number} The index of the input of who's siblings are to be disabled
 */
function deselectSiblingRadio(i) {
    if (inputs[i].getAttribute('name') !== null) {
        for (let index = 0; index < inputs.length; index++) {
            if (index !== i && inputs[index].getAttribute('name') === inputs[i].getAttribute('name')) {
                inputs[index].checked = false;
                setImage(index, 1);
            }
        }
    }
}

/**
 * Refresh the AP Image of the given input based on its value
 *
 * Intended to be used externally to update the ap image after a change
 * @param i {Number} The index of the checkbox/radiobutton
 */
function refreshApImage(i)  {
    if (!inputs[i].hasAttribute('images')) return;
    if (inputs[i].checked) {
        setImage(i, 0);
    } else {
        setImage(i, 1);
    }
}

/**
 * Handle clicking on a checkbox/radiobutton
 * <br>
 * This is the one of the mouse operations that actually changes the checkbox/radiobutton status
 * @param i {Number} The index of the checkbox/radiobutton
 */
function checkClick(i) {
    if (!inputs[i].hasAttribute('images')) return;

    if (inputs[i].checked) {
        if (inputs[i].getAttribute('type') === 'radio' && inputs[i].dataset.flagNotoggletooff === "true") {
            inputs[i].dispatchEvent(new Event('click'));
            return;
        } else {
            inputs[i].checked = false;
            setImage(i, 1);
        }
    } else {
        inputs[i].checked = true;

        setImage(i, 0);

        deselectSiblingRadio(i);
    }

    /*
     * Both checkboxes and radio buttons fire the change and input events
     * https://html.spec.whatwg.org/multipage/input.html#concept-input-apply
     */
    inputs[i].dispatchEvent(new Event('change'));
    inputs[i].dispatchEvent(new Event('input'));

    inputs[i].dispatchEvent(new Event('click'));
}

/**
 * Handle when the space bar is pressed whilst a checkbox is targeted
 * <br>
 * This is only for checkboxes, so there's no radiobutton specific logic included
 * <br>
 * Changes the checkbox status and set the replacement image
 * @param i {Number} The index of the checkbox/radiobutton
 */
function checkSpace(i) {
    if (!inputs[i].hasAttribute('images')) return;
    if (inputs[i].checked) {
        inputs[i].checked = false;
        setImage(i, 1);
    } else {
        inputs[i].checked = true;
        setImage(i, 0);
    }

    /*
     * Both checkboxes and radio buttons fire the change and input events
     * https://html.spec.whatwg.org/multipage/input.html#concept-input-apply
     */
    inputs[i].dispatchEvent(new Event('change'));
    inputs[i].dispatchEvent(new Event('input'));

    inputs[i].dispatchEvent(new Event('keyup'));
}

/**
 * Handle when a checkbox/radiobutton is released (mouseup/mouseout)
 * @param i {Number} The index of the checkbox/radiobutton
 */
function checkRelease(i) {
    if (!inputs[i].hasAttribute('images')) return;
    if (inputs[i].checked) {
        setImage(i, 0);
    } else {
        setImage(i, 1);
    }
    inputs[i].dispatchEvent(new Event('mouseup'));
}

/**
 * Handle when a checkbox/radiobutton is pressed (mousedown)
 * @param i {Number} The index of the checkbox/radiobutton
 */
function checkDown(i) {
    if (!inputs[i].hasAttribute('images')) return;
    if (inputs[i].checked) {
        setImage(i, 2);
    } else {
        setImage(i, 3);
    }
    inputs[i].dispatchEvent(new Event('mousedown'));
}

/**
 * Handle when a mouse hovers over a checkbox/radiobutton
 * @param i {Number} The index of the checkbox/radiobutton
 */
function checkOver(i) {
    if (!inputs[i].hasAttribute('images')) return;
    if (inputs[i].checked) {
        setImage(i, 4);
    } else {
        setImage(i, 5);
    }
    inputs[i].dispatchEvent(new Event('mouseover'));
}

/**
 * Handle when the AP image is focused
 * @param i {Number} The index of the checkbox/radiobutton
 */
function checkFocus(i) {
    if (!inputs[i].hasAttribute('images')) return;

    inputs[i].dispatchEvent(new Event('focus'));
}

/**
 * Handle when the AP image loses focus
 * @param i {Number} The index of the checkbox/radiobutton
 */
function checkBlur(i) {
    if (!inputs[i].hasAttribute('images')) return;

    inputs[i].dispatchEvent(new Event('blur'));
}
</script>

<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css" >
.t {
	transform-origin: bottom left;
	z-index: 2;
	position: absolute;
	white-space: pre;
	overflow: visible;
	line-height: 1.5;
}
.text-container {
	white-space: pre;
}
@supports (-webkit-touch-callout: none) {
	.text-container {
		white-space: normal;
	}
}
</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_6{left:55px;bottom:1139px;letter-spacing:-0.15px;}
#t2_6{left:55px;bottom:1104px;letter-spacing:0.14px;}
#t3_6{left:55px;bottom:1087px;letter-spacing:0.12px;}
#t4_6{left:55px;bottom:1071px;letter-spacing:0.13px;}
#t5_6{left:431px;bottom:1071px;letter-spacing:0.08px;}
#t6_6{left:55px;bottom:1054px;letter-spacing:0.12px;}
#t7_6{left:55px;bottom:1038px;letter-spacing:0.13px;}
#t8_6{left:55px;bottom:1021px;letter-spacing:0.13px;}
#t9_6{left:55px;bottom:1005px;letter-spacing:0.15px;}
#ta_6{left:109px;bottom:1005px;letter-spacing:0.12px;}
#tb_6{left:55px;bottom:989px;letter-spacing:0.13px;}
#tc_6{left:81px;bottom:989px;letter-spacing:0.13px;}
#td_6{left:55px;bottom:972px;letter-spacing:0.12px;}
#te_6{left:55px;bottom:956px;letter-spacing:0.12px;}
#tf_6{left:55px;bottom:939px;letter-spacing:0.12px;}
#tg_6{left:55px;bottom:923px;letter-spacing:0.12px;}
#th_6{left:55px;bottom:907px;letter-spacing:0.12px;}
#ti_6{left:70px;bottom:884px;letter-spacing:0.12px;}
#tj_6{left:55px;bottom:868px;letter-spacing:0.12px;}
#tk_6{left:55px;bottom:851px;letter-spacing:0.13px;}
#tl_6{left:55px;bottom:835px;letter-spacing:0.12px;}
#tm_6{left:55px;bottom:818px;letter-spacing:0.12px;}
#tn_6{left:55px;bottom:802px;letter-spacing:0.12px;}
#to_6{left:55px;bottom:785px;letter-spacing:0.14px;}
#tp_6{left:70px;bottom:763px;letter-spacing:0.12px;}
#tq_6{left:55px;bottom:746px;letter-spacing:0.12px;}
#tr_6{left:55px;bottom:730px;letter-spacing:0.12px;}
#ts_6{left:55px;bottom:714px;letter-spacing:0.12px;}
#tt_6{left:55px;bottom:697px;letter-spacing:0.13px;}
#tu_6{left:55px;bottom:681px;letter-spacing:0.12px;}
#tv_6{left:484px;bottom:1104px;letter-spacing:0.11px;}
#tw_6{left:484px;bottom:1087px;letter-spacing:0.13px;}
#tx_6{left:484px;bottom:1071px;letter-spacing:0.12px;}
#ty_6{left:484px;bottom:1054px;letter-spacing:0.12px;}
#tz_6{left:484px;bottom:1038px;letter-spacing:0.12px;}
#t10_6{left:484px;bottom:1021px;letter-spacing:0.12px;}
#t11_6{left:484px;bottom:1005px;letter-spacing:0.12px;}
#t12_6{left:499px;bottom:983px;letter-spacing:0.12px;}
#t13_6{left:484px;bottom:966px;letter-spacing:0.13px;}
#t14_6{left:484px;bottom:950px;letter-spacing:0.13px;}
#t15_6{left:484px;bottom:927px;letter-spacing:0.14px;}
#t16_6{left:605px;bottom:927px;}
#t17_6{left:623px;bottom:927px;}
#t18_6{left:642px;bottom:927px;}
#t19_6{left:660px;bottom:927px;}
#t1a_6{left:678px;bottom:927px;}
#t1b_6{left:697px;bottom:927px;}
#t1c_6{left:715px;bottom:927px;}
#t1d_6{left:733px;bottom:927px;}
#t1e_6{left:752px;bottom:927px;}
#t1f_6{left:770px;bottom:927px;}
#t1g_6{left:783px;bottom:927px;letter-spacing:0.12px;}
#t1h_6{left:484px;bottom:905px;letter-spacing:0.13px;}
#t1i_6{left:752px;bottom:905px;}
#t1j_6{left:770px;bottom:905px;}
#t1k_6{left:788px;bottom:905px;}
#t1l_6{left:800px;bottom:905px;letter-spacing:0.11px;}
#t1m_6{left:484px;bottom:882px;letter-spacing:0.13px;}
#t1n_6{left:484px;bottom:866px;letter-spacing:0.13px;}
#t1o_6{left:697px;bottom:866px;}
#t1p_6{left:715px;bottom:866px;}
#t1q_6{left:733px;bottom:866px;}
#t1r_6{left:752px;bottom:866px;}
#t1s_6{left:770px;bottom:866px;}
#t1t_6{left:791px;bottom:866px;letter-spacing:0.12px;}
#t1u_6{left:499px;bottom:843px;letter-spacing:0.13px;}
#t1v_6{left:484px;bottom:827px;letter-spacing:0.13px;}
#t1w_6{left:484px;bottom:810px;letter-spacing:0.13px;}
#t1x_6{left:484px;bottom:794px;letter-spacing:0.14px;}
#t1y_6{left:654px;bottom:794px;letter-spacing:0.15px;}
#t1z_6{left:854px;bottom:794px;}
#t20_6{left:862px;bottom:794px;letter-spacing:0.1px;}
#t21_6{left:484px;bottom:777px;letter-spacing:0.13px;}
#t22_6{left:484px;bottom:761px;letter-spacing:0.12px;}
#t23_6{left:484px;bottom:745px;letter-spacing:0.13px;}
#t24_6{left:484px;bottom:728px;letter-spacing:0.13px;}
#t25_6{left:525px;bottom:728px;letter-spacing:0.12px;}
#t26_6{left:830px;bottom:728px;letter-spacing:0.13px;}
#t27_6{left:484px;bottom:712px;letter-spacing:0.13px;}
#t28_6{left:604px;bottom:712px;letter-spacing:0.12px;}

.s0_6{font-size:11px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s1_6{font-size:15px;font-family:HelveticaNeueLTStd-Bd_1kx;color:#000;}
.s2_6{font-size:15px;font-family:HelveticaNeueLTStd-Roman_1kz;color:#000;}
.s3_6{font-size:15px;font-family:HelveticaNeueLTStd-It_1ky;color:#000;}
</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts6" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_1kx;
	src: url("fonts/HelveticaNeueLTStd-Bd_1kx.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_1ky;
	src: url("fonts/HelveticaNeueLTStd-It_1ky.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_1kz;
	src: url("fonts/HelveticaNeueLTStd-Roman_1kz.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg6Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg6" style="-webkit-user-select: none;"><object width="935" height="1210" data="6/6.svg" type="image/svg+xml" id="pdf6" style="width:935px; height:1210px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_6" class="t s0_6">Form 944 (2024) </span>
<span id="t2_6" class="t s1_6">Privacy Act and Paperwork Reduction Act Notice. </span>
<span id="t3_6" class="t s2_6">We ask for the information on this form to carry out the </span>
<span id="t4_6" class="t s2_6">Internal Revenue laws of the United States. We need it </span><span id="t5_6" class="t s2_6">to </span>
<span id="t6_6" class="t s2_6">figure and collect the right amount of tax. Subtitle C, </span>
<span id="t7_6" class="t s2_6">Employment Taxes, of the Internal Revenue Code </span>
<span id="t8_6" class="t s2_6">imposes employment taxes on wages and provides for </span>
<span id="t9_6" class="t s2_6">income </span><span id="ta_6" class="t s2_6">tax withholding. This form is used to determine </span>
<span id="tb_6" class="t s2_6">the </span><span id="tc_6" class="t s2_6">amount of the taxes that you owe. Section 6011 </span>
<span id="td_6" class="t s2_6">requires you to provide the requested information if the </span>
<span id="te_6" class="t s2_6">tax is applicable to you. Section 6109 requires you to </span>
<span id="tf_6" class="t s2_6">provide your identification number. If you fail to provide </span>
<span id="tg_6" class="t s2_6">this information in a timely manner, or provide false or </span>
<span id="th_6" class="t s2_6">fraudulent information, you may be subject to penalties. </span>
<span id="ti_6" class="t s2_6">You’re not required to provide the information </span>
<span id="tj_6" class="t s2_6">requested on a form that is subject to the Paperwork </span>
<span id="tk_6" class="t s2_6">Reduction Act unless the form displays a valid OMB </span>
<span id="tl_6" class="t s2_6">control number. Books and records relating to a form or </span>
<span id="tm_6" class="t s2_6">instructions must be retained as long as their contents </span>
<span id="tn_6" class="t s2_6">may become material in the administration of any Internal </span>
<span id="to_6" class="t s2_6">Revenue law. </span>
<span id="tp_6" class="t s2_6">Generally, tax returns and return information are </span>
<span id="tq_6" class="t s2_6">confidential, as required by section 6103. However, </span>
<span id="tr_6" class="t s2_6">section 6103 allows or requires the IRS to disclose or give </span>
<span id="ts_6" class="t s2_6">the information shown on your tax return to others as </span>
<span id="tt_6" class="t s2_6">described in the Code. For example, we may disclose </span>
<span id="tu_6" class="t s2_6">your tax information to the Department of Justice for civil </span>
<span id="tv_6" class="t s2_6">and criminal litigation, and to cities, states, the District of </span>
<span id="tw_6" class="t s2_6">Columbia, and U.S. commonwealths and territories for </span>
<span id="tx_6" class="t s2_6">use in administering their tax laws. We may also disclose </span>
<span id="ty_6" class="t s2_6">this information to other countries under a tax treaty, to </span>
<span id="tz_6" class="t s2_6">federal and state agencies to enforce federal nontax </span>
<span id="t10_6" class="t s2_6">criminal laws, or to federal law enforcement and </span>
<span id="t11_6" class="t s2_6">intelligence agencies to combat terrorism. </span>
<span id="t12_6" class="t s2_6">The time needed to complete and file Form 944 will </span>
<span id="t13_6" class="t s2_6">vary depending on individual circumstances. The </span>
<span id="t14_6" class="t s2_6">estimated average time is: </span>
<span id="t15_6" class="t s1_6">Recordkeeping </span><span id="t16_6" class="t s2_6">. </span><span id="t17_6" class="t s2_6">. </span><span id="t18_6" class="t s2_6">. </span><span id="t19_6" class="t s2_6">. </span><span id="t1a_6" class="t s2_6">. </span><span id="t1b_6" class="t s2_6">. </span><span id="t1c_6" class="t s2_6">. </span><span id="t1d_6" class="t s2_6">. </span><span id="t1e_6" class="t s2_6">. </span><span id="t1f_6" class="t s2_6">. </span><span id="t1g_6" class="t s2_6">18 hr., 39 min. </span>
<span id="t1h_6" class="t s1_6">Learning about the law or the form </span><span id="t1i_6" class="t s2_6">. </span><span id="t1j_6" class="t s2_6">. </span><span id="t1k_6" class="t s2_6">. </span><span id="t1l_6" class="t s2_6">1 hr., 2 min. </span>
<span id="t1m_6" class="t s1_6">Preparing, copying, assembling, and </span>
<span id="t1n_6" class="t s1_6">sending the form to the IRS </span><span id="t1o_6" class="t s2_6">. </span><span id="t1p_6" class="t s2_6">. </span><span id="t1q_6" class="t s2_6">. </span><span id="t1r_6" class="t s2_6">. </span><span id="t1s_6" class="t s2_6">. </span><span id="t1t_6" class="t s2_6">3 hr., 46 min. </span>
<span id="t1u_6" class="t s2_6">If you have comments concerning the accuracy of </span>
<span id="t1v_6" class="t s2_6">these time estimates or suggestions for making Form 944 </span>
<span id="t1w_6" class="t s2_6">simpler, we would be happy to hear from you. You can </span>
<span id="t1x_6" class="t s2_6">send us comments from </span><span id="t1y_6" class="t s3_6">www.irs.gov/FormComments</span><span id="t1z_6" class="t s2_6">. </span><span id="t20_6" class="t s2_6">Or </span>
<span id="t21_6" class="t s2_6">you can send your comments to Internal Revenue </span>
<span id="t22_6" class="t s2_6">Service, Tax Forms and Publications Division, 1111 </span>
<span id="t23_6" class="t s2_6">Constitution Ave. NW, IR-6526, Washington, DC 20224. </span>
<span id="t24_6" class="t s2_6">Don’t </span><span id="t25_6" class="t s2_6">send Form 944 to this address. Instead, see </span><span id="t26_6" class="t s3_6">Where </span>
<span id="t27_6" class="t s3_6">Should You File? </span><span id="t28_6" class="t s2_6">in the Instructions for Form 944. </span></div>
<!-- End text definitions -->


<!-- call to setup Radio and Checkboxes as images, without this call images dont work for them -->
<script type="text/javascript">replaceChecks(false);</script>

</div>

</div>
</div>
</div>
</form>
</div>







<div id='FDFXFA_PDFDump' style='display:none;'>
JVBERi0xLjcNJeLjz9MNCjIxMjcgMCBvYmoNPDwvTGluZWFyaXplZCAxL0wgMTQxMTUxL08gMjEzMi9FIDMyNDQxL04gNi9UIDE0MDU4Mi9IIFsgNTEzIDMxNV0+Pg1lbmRvYmoNICAgICAgICAgICAgDQoyMTQ4IDAgb2JqDTw8L0RlY29kZVBhcm1zPDwvQ29sdW1ucyA0L1ByZWRpY3RvciAxMj4+L0ZpbHRlci9GbGF0ZURlY29kZS9JRFs8NEJFMkM0NUEyNTlEQzg0NUE3RURCNDZCOUM4QTE1Njk+PDVGNEQwOTdGRTY1QkVBNDk5QTRBQkEzMThDNEUwQzhDPl0vSW5kZXhbMjEyNyA0M10vSW5mbyAyMTI2IDAgUi9MZW5ndGggMTAxL1ByZXYgMTQwNTgzL1Jvb3QgMjEyOCAwIFIvU2l6ZSAyMTcwL1R5cGUvWFJlZi9XWzEgMiAxXT4+c3RyZWFtDQpo3mJiZBBgYGJg1gESjFxAguk+iBUDYsmBiBwgwW0NJFh2gNRtBBKs2iCuIIglAxK7CuL+AnGTgITwSSAhkAIkhNSABBcfSEIKSLQeZGBi5HgIZDEwMNKQ+P9rzVuAAAMAMB0OWw0KZW5kc3RyZWFtDWVuZG9iag1zdGFydHhyZWYNCjANCiUlRU9GDQogICAgIA0KMjE2OSAwIG9iag08PC9DIDIzMS9GaWx0ZXIvRmxhdGVEZWNvZGUvSSAyNTMvTGVuZ3RoIDIxOS9TIDEwMi9WIDIwOT4+c3RyZWFtDQpo3mJgYGBiYGDmZmBlYGBczMDPgAD8DMwMbAwsDBwdTswMHxcEvljJwcAsmdh/4JI+WJ6R1+IjCAk94bV54mJzuYGjo4MDCC0YOzoaOhqQdQBVCzMwnO+G0AwQ/UcZeDkuqB7axFVqzX/GtiVNKuHqMQXjwHMnBD9/TPTyFHVpYjRgYOwAamEWYGBQY1NgYPDhcWBgmCHRwMBoYAh0eEISAwPLgSMMDJyNHXEH4A4HGv9GC0hzMjBsZoeLWjAwzgdqYhBlYChJg4v6MzCpKII8A0QsAAEGALQmNPENCmVuZHN0cmVhbQ1lbmRvYmoNMjEyOCAwIG9iag08PC9BY3JvRm9ybSAyMTQ5IDAgUi9FeHRlbnNpb25zPDwvQURCRTw8L0Jhc2VWZXJzaW9uLzEuNy9FeHRlbnNpb25MZXZlbCAxMT4+Pj4vTGFuZyAyMTI1IDAgUi9NYXJrSW5mbzw8L01hcmtlZCB0cnVlPj4vTWV0YWRhdGEgNzcgMCBSL05hbWVzIDIxNTAgMCBSL1BhZ2VzIDIxMjQgMCBSL1N0cnVjdFRyZWVSb290IDk3IDAgUi9UeXBlL0NhdGFsb2cvVmlld2VyUHJlZmVyZW5jZXM8PC9EaXNwbGF5RG9jVGl0bGUgMjE1NSAwIFI+Pj4+DWVuZG9iag0yMTI5IDAgb2JqDTw8L0ZpbHRlclsvRmxhdGVEZWNvZGVdL0xlbmd0aCA0MDU+PnN0cmVhbQ0KSInUU11PwjAUfYZfcd0Ti2QRX1SUBxRJTBSUr+jT0tC70VjKsnagAf67XRmw6UAMTy5L06bnnnvPPbfMg5L6DHDilT484jIhFeEcqQ21GliRoOgxgdSCxQJSuCmGkk1EHip1DTdw7lzaxXkRAJjORILAmTKcYdjTXCa4g4RiaNkxxOASaL1xe++sLt0B4RG6dfmOFE5qoMII7QS6DvmRYLAp4co5s7eoVEAqhnAMVSanVCETvttCpHqZuQmf+yT9MlT0b7RX7Ayd/tSIScdH1e885mhIM2kEnILBdN+6D61muwwe4RLt6wzprk6sGpHCLrdb1DR54gamN/vEuf2AEoXhbpExpbab3k3GwUSgUKX5MLazaj3zyGfCKsOwRcb6/NqsxwfNXrX0IFjLjTJTqlniSnO9T0o9zvuLjPdJ8SFKXbhEXfdLhFJpaBUObU+bUy2pgR6JuMqGHWbxsMcUx9yE5iZuUqHw3cMjh/p3YXuHOmbjJBLD0Was/6TZuPY/J3X9AHPGMfsAk5FeFr8EGAC5qJCpDQplbmRzdHJlYW0NZW5kb2JqDTIxMzAgMCBvYmoNPDwvRmlsdGVyWy9GbGF0ZURlY29kZV0vTGVuZ3RoIDI3ND4+c3RyZWFtDQpIidySUUvDMBSF3/srLnkYK0Liq9YikykIUmHTgk/lrrmtwawJbbohzv9uW9xkXQt79jH3fDnccxKVwdR9WjLZdDa/u+cLQkllEqOuKZlVHyR9CENgdSEpUwVJ5nsAMMJCCBnqigJP9XxjRdtzfU/Zcd/fHSIimcRUVsoUfWPY7WCMhRu44pe+99UPdQSFLRQM545ou+eS18VTw7J35+y1EGmuOEqzIp6atagspQq1wLQ0K3SithIdsT/X5dvyMXp4bg1ubcjgAtBabjW6zJTr5sgmm8N401W036/V9EHTWOQ15tSN096Vl6a7Tig7YSxy4H2PPeFZVQ+wp1UPQb2qj77CP6h6IHJb9Y8AAwCXJB2JDQplbmRzdHJlYW0NZW5kb2JqDTIxMzEgMCBvYmoNPDwvRmlsdGVyWy9GbGF0ZURlY29kZV0vTGVuZ3RoIDQ2OD4+c3RyZWFtDQpIicSUwW7bMAyG730KIqcECPwCQw5Z0xbFuqTomu5oyBadcJVFT2Ji+O1H2d2CFO6AYIcBhmFIP6mPP2lRBVPpGuRqKnuK2XL1+WYGiwVMDt5iRR7tZHYFAH92YQEeW9gUP7CU6ezTVVrMHpbru+3yLu1ObtbbydvyC2GLIY8SyO/yZxKHSbG0XCAsy8CFEVhdj8u3jTWC+QpjeQq694LBlEJHhFsOdYRB9jvFExp7SrFGtPpq8xcMkdjnX+Mu5XrWauBxdQsVKVHAnwcKGMGk0jDAcVADV3COOmRX4gweNSDC5gsIg+XWOzZWXUJwShPllCNARISOD/rRRcEajK3JkyIa4ZCNFz9Gnm+cPaP/K/iAnME1N13fPtg+PYDxFhqjGEBeyXusInAbNfod6sB5Ad+5s9qcC5xNln4n2fNB3ovnva19vtp0YCk2znRzKFSaFjwLtBxeoQncYHBdBt+4fotAhzV6iVDTbi+9Vk89UqRCO68HG+fUI0fla2qmxkDNIbmTwo30sPoUYrRnfjfa4o/H5ILmDnMc/sHE/+ngfaWjlWYKg0eBkr3X+yFRainmaMgZlc+hTE4nH9Xslpw7/TtpMslH0XQjJicnfwkwAInWofoNCmVuZHN0cmVhbQ1lbmRvYmoNMjEzMiAwIG9iag08PC9Bbm5vdHMgMjE1NiAwIFIvQ29udGVudHNbMjEzNCAwIFIgMjEzNSAwIFIgMjEzNiAwIFIgMjEzNyAwIFIgMjEzOCAwIFIgMjEzOSAwIFIgMjE0MCAwIFIgMjE0MSAwIFJdL0Nyb3BCb3hbMC4wIDAuMCA2MTIuMCA3OTIuMF0vTWVkaWFCb3hbMC4wIDAuMCA2MTIuMCA3OTIuMF0vUGFyZW50IDIxMjQgMCBSL1Jlc291cmNlczw8L0ZvbnQ8PC9UMV8wIDIxNTggMCBSL1QxXzEgMjE2MCAwIFIvVDFfMiAyMTYyIDAgUi9UMV8zIDIxNjQgMCBSL1QxXzQgMjE2NiAwIFIvVDFfNSAyMTY4IDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1JvdGF0ZSAwL1N0cnVjdFBhcmVudHMgMC9UYWJzL1MvVHlwZS9QYWdlPj4NZW5kb2JqDTIxMzMgMCBvYmoNPDwvRmlsdGVyL0ZsYXRlRGVjb2RlL0ZpcnN0IDE4OS9MZW5ndGggMjc3NS9OIDIwL1R5cGUvT2JqU3RtPj5zdHJlYW0NCmje1Fp7b9s4Ev8E9x10/yVYFHyIei0WBRKn6QPZ3F6STdPNFQvFVmJfZMu1lWxzn/5mhkOLUmQ7Se920QIT0nwMh8PRbzjDamWyQAZaRfAnjLGiAh1Tiw7CNMRKGBilsWICYxRWosAkNCaGisFKEmSaBqcBsKS+DBjRKGAXSonDYgWsiGmsAxPF1BYGUWKoZoJYxxHWogCaaFwcJJnGRWNYQmYJ1tIgC5M0+OkncbC3I94V5T3s4ewa/twEu+LgBDoOq1kNBfVlBnpOqF7Uk2F+dHZaj17tV+UoyCLq+i0/uALuWH8N/8ThpChHy0udoHJOPouLw73LnfmiyKdXZbFrEmzdGVaz68nNrknpV11M52VeQy/N2fk6nU+LOt+NiOtOWQ3zsjgt6l1QMDZcV4vpLugY66O8zpdFvdwFVePvebWs7VIRif759WvYy4f8Pj8dLibz2h4TCQvtx/m0WF7u/H3vYP/Njz9KJeXv58ViORjfntaLyexmuUuHiYx7xpznCxoQtgboZsCgGhW/gwIG42J4u0tW0Ih0CqKEJIo49QT0OuWGTp31dNaLu+LSRKRVsJHMloZLq04oFZeay5BLw2XEZcxlYkvJ4ySPkzxO8jjpxvH6ktdVvK7idRWvq5ifYn6K+Snmp5ifYn6K+Wnmp5mfZn6a+Wnmp5mfZn6a+Wnmp5lfyPxC5hcyv5D5hcwvZH4h8wuZX8j8Qqdv5meYn2F+hvkZ5meYn2F+9tv4DCe8txwWsxq+MC0G+fxdMbkZ10GijBiM8wV8CDtiOc+HhRhVZZkvxDxfFLOyuK5tbYHDxbCaTnMxfpiPi5mYF4tJNRLLMl+OxX+KRSWqWSHqPypRjxdFIa6ru4W4ntwXYjn5KpbFPcyhVcVsAgOHVVnNoHk6sbXiy11eij2xLwbiQLwRh+KteCfeiw/iZ3Es/iF+EWiZZ+JXcS4+ik/iN5GLKzEUIwFLiRsxFhPxb3ErSjEVM1GJufgiFmIpanEn7sUf4qt4EF/uqrqwW6Hq6KqkLeKPf/0Nf9rOqztor0UxG+HeiikV07uynszLB0C0wurylQb1HZb5zTIINUHc/n719fIVoiT2BUomMWr8M3Ue5tNJ+bCzwr3j4q44OgsA/HZt/6QsEGPtWVITYok4PtzfOz74oTMPMfOkmuYzGgjQUtTDsTgGGAM1YtNHe8RGSvG+zsvJcG92UxaBFKeAjedBasTZw7ygobgh/Nqrhbhgy4hUQsCwD0iIQ7ZK8WY2rEYAb+LjZLY3W05Wvw8ni2WNRgZLtxezjgr3epTzEB1F4vTuqkbJUDzVCAmMR/V4eRlJGfyVpMHVacBBxIAosgQALoM4bDqRQgDDmCeEaWZLAAA3aRsRLyDk4QjbU6yDm4tTcMsAVAmAZwxACG47SGBdbMP1IwC3GNw0zUmUHRvbuVTCfKzTPOhDHhlsCkviDyXtA2TGMnYKgLERAFWUha1SZzHxItlRBhwHMmCZRrxv7MfxQKQL4BcCSFMf1BNwNBGAM9ZNKu3aMB9Lt74bi7rBOh4EHcBKcTBBKdyBsacB36GhKaQm/xyBcDqdJbcTK2SRZTwQOKSZWslEXPmcH50Z7plLPCe8F5nYyo42kDJv487T1ynMc/ZCv2mOofkpOAxHNI531yU8P3eWPjmbdIQ24+yhSygD1bHfI7cG7RXPvYdSuGH2tTt7WNkF2wmVHSK9uH6fsD0jm7HXHefSki0ujR0W+aiOf/Jc0Tm4kUosfHgPZT+8R9QHlpJluPo2eA/2y9tgMOugfNxG+Tcfz49PzvvwFWYP2ig/qGajYrYsRj7QZ2uAXqVyM9Ib1Ub6bZK8EOmz7w/pMVICN25S+PjhhoiUJAyM3Ef9kj9cbINoiEoEN56zjSjAi2Ub6IFSh2n4MeCHxChG8nA7znO/ESgIQDPdfKTefBNzO+8jCm0d59NeQGYsY2//pAse04yNGtmjlMgCZWr56mYeEjpClM3NIzmN5YV1vL32Ar325OC1LdB7ilMKMR0hxkhyfysNebtwWvLbLc7HXEE5iIOxvSiTWwJ18ujMEMS4n4Ae92is7tAGUmbugD5MLLm9xHBHdJKR3nl+qhqKPJ/WJXt+Sa/N+mQdru7lEa/jrxnE9fpvY3V+HXL24NvFOj6tc/YIz4LLNtCHxgP6OI27QF98HZb5tB2mNDC/R1HFEUQTGEvYSCLnCGLsxQ0uamhHDL5fiPr9AngD7AODgsMDYVt+4f3ZIDhc5LPbcjIL3lb1eDK0vqGqbjueIWp7hotfLg4uPvwADNx8Ox0R+QDipy0BQLzOL5h0s1+QadsvbJXjZY4hVt+dYwiRyEAbwE6QNPelllwftiG4hLIN8tsolI/nREZyBIAg0lCU2j73G+cZHkfOJPXGa68uvXlQzxxvyXx4H66MuI5zuoRrRrGtrwCIy1T3jDdtfni7TkxTx7QM6VK29enrJ+ZbuQ3BPFRRkneBq2dxs6Oudmml1J/YrZD8PBNlij0bWCuTtnsJPSfgHIzxHUPcjPH1GJp2X+YRndcayqRnDx6Fsk2+7TwiuaGdbafv/Mk2dX/7I8dk1lMs+9tNYyedCCB6UlIrn86LxTKfjfrTW4BAgPXL294810szXF/uimU9gcrj1NbRKrX1z1Zy60J8+rbkls1YtRJV6YZEVYoBcopafGaiSrcd1afzk09H73oDh9EWJ5WsdVLPTFNtlOGFDir8PnNUnHpo56jSyHZmMREm2F3OAeuUo0rU/yZHhfkpzDMYRUS5gyy0OSp8uMps3gdzC9iewfo0FvnFCZU275BRyEU8IOzO8JoN/UTG5tRQZj90oNxM0uTFXEljsJ6F9oqa2PwX1jMI47Ddz5tgzgavwng9p9wDoBtdzfF6rGyOzYYuobc+6w/KVY4KDqKdo8K0lDIJ7U4bDGwotcFqQhY83Z0jnaVUXuxCmS0pOfqxyTsawYk/N/txkipcyUCxizGr2AWNIGXmKxcF8QMSKRUVpJtEJ/XBWhS7QD3FJFdqE2OUYOyhLG0Mwic0CJ+c4ZAhdIiuXFh3Y5yROcPgA+8jNLS+9m7s4gylm0wjctlETmauSFljhbLtoqJks4t6vkd6ystL1yd53mhAngj9kPNCp6vHlW/xPr3vI1nc+z6iJL6PJM90O2EnPvr54Bjikh7If18/83HkldIvfB7ZKMQL/U70fL+D0P0XUt/bCD0p/JlPI/j1P+tphFPd+MSBTyNYbnoa8VLqvU8jKnvS0whlS+hpRPc+jawybeg+EDFRry7Tsi5j9qSnEXwN+fanEZvtySyacsaM9PLUpxGlNj6NkFvnPXafRqjPrHkacR6gQ89+GsF6h8jrsB21nkb4ycy/FnTp//k0QnnNjGzmqYFRSVD+0Bsk9KE1BAn4H0SeHyQkbbR+++7017OT/gv6VrxO1uL1swOFLXK8ELJf8Jy95pLyZ5GLBlaPCgjZ+Fk+JVJIs2+DbFh/FSngp+Rd4tqRQtxECnyB648U0v5IgS+YBBtptj5SiOImUoj0I4hwl2Zcv3s5JF1gNJBIdwGESCFqIEA+8TV79cjBvsBGCqFsIFsxVNtIoQPZva8cKDO+Ziu7j8zD9NVrdhb3QzaLsAoUGLK3BQruktwKFDgSckECBQqo+22BQgfKnU06elGgYNKVnW0MFHqguOsynB08CgYyPueeIKIdKPxXgAEAv2rvAQ0KZW5kc3RyZWFtDWVuZG9iag0yMTM0IDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9MZW5ndGggMTEzNT4+c3RyZWFtDQpIiayXW2/iRhTH3/0pziP7wOC52eNqtVJIyCpSk6qEqqoUqaIwZF2BnR1MKN++Z3yLsQcIJIqU4MmZ/7nMOT8Pw4k3uE6TTCcZfP06uL++uwEfvn0b3lyD54P9Mc/eYKyX0yx+1dfpMjXxSmcmnoGJvcGE/u0DhcnCC3PjEHgAoeCECgWTlde7Tc3qy+RfjxZi+EcywrnaMwJrYbVooUVVYaxASkLpvnEkBCxSA8xn/Be7cXSPsXayoFUWVpeVuqLQFUADSWyggqgoyGVHq5dlutPmiTG2hquHhz+ufoVbPddmuoTJ9D8Y62xjksMOWdNhqyilO86J77Pc3Y1+mZpsZQXSBWQ/NEyMnq43ZgcYQQh3KG4SdD3WrzrZaHjU5jWe6cP+eeVfKMJpCH2fMIW5zb3eb/dDeEgJUClkn/l+WKuM8PyvTBYvprM3JbHfAOPv+CEGn0jYgvcTM8uLCEIEREDIAkyKwmyVm6/wpO3pLb1H7/cy0o4DWTloiwVM5BU6RyzoislAEWwaSknQjMyHfoh9FEXHBUNHdJxdLKfqahKBttu2bsAVEc2cUZcKEgiraw8RP9gFYcth/xQPR31GjppI4Sxw4cnWuBAvHJauTnui/hnlr9MqnJRJ9d/rih5qm04P9htpFfJVWv0DJezgox5nir3v5Q3gq9wL5QGmh9lFeJxGewtvOPEsuWjOSpx+Xkx/lAcZYZARCaTEiuAMhTKf/z9/pHC/WWdwGy81WEoCgi2fy0kR0tCBZsq7bH6jTUFNhV2lIIgkoi139Ve6gZV1tbCupkmyQaxUHnP02o4jTOasiJN1pqdzSyW0j5Nn+LlBUmmz3OWb1riL1sAuM20KpAlaxgXT7saPkKR4jrGeV1vKYHttjd4O44yTTkBbE2cYRns7eTMMC8PvKWRprSpKu+12S2KzJs/p68DGX1Z5LxL7OnHVwWxmWZwmayzaPM8H34IaC9m1RYXV1NqS42ilDbY6kCp9VzfzwD8FQepAai4mpTpPyIFTgdBw45TyiDBcOy7pAKq9JVysd4yoKCxDhol/Jk6pg6eCdsr7UZYyB0sP1v5jLGUOlrqb72yUurjF9mnamPrqhiTwlx/U16NRPmLo2P7fjtiqWIh8WS68lBa0fF4Wz0xWO9KWwa54lvnl0i7ociHk5YIpFriqLKDUDCvNuO1k3nLS0UzKhYiVC1npRNJDmovSgrNDFrO2l2l74bSXdnk6gXaS71hs2gudQ/rnVHncJW/AuRnAU69KorIetfTv2gYPxULIKounL3uA7jRq/YI9NDjHAU4jvI8oimPkN0YoIoilE+BlDoLXas0b2/vUHBhHsBLJrJr9MtJEiY+IOS7nQDhVjPjqMrljBK91afDJGGcOjFMVEspaJf4oyLkD5Ier/yGQcwfI3U149pW464u9HVur7xnDy1DILuh7zh21qtTO7nsuXGoB4ZRd0qjcMZQMX1MqvEwuONL3te6n9z13TC+z318o++S+V++oPvwvwABKRSKtDQplbmRzdHJlYW0NZW5kb2JqDTIxMzUgMCBvYmoNPDwvRmlsdGVyL0ZsYXRlRGVjb2RlL0xlbmd0aCA2MTc+PnN0cmVhbQ0KSImsl01v2zAMhu/+FTpuhzDUB0kJKAqsaQ879DAsx12GYgM69AMdAuzvT4ntJk1pb5J1iRE7eShRzxsiaNA8dmhsAA7JPHQILl/z25Dvrw7Xw8tD97X70t3cbky3/vR7d//z+93OXFysbzefr41P5vLy6jo/ezE2EzPPOGfBiTPi0NztS+AA3NfBzOvhfb2x1Oq81tW2W2+en3Y/no7VAo7VrLk3nRwKinHeZZY3ggkIndk+dh++OScft7961o3GsiNrYmvBjR/AXAyBzJ83u6QE6M82mcDzYYszLcsLfd+yAZYXXwgLCowDoGQYAR9x+QlC/AeNFFrIB+eraPzaQAgpnbVvwFrOx36CXb36uOoFWQ1G6pYoVUXbQwKWt+098bFHjz7+p/khFnR+UcaCljHNvtKIvS9FeDyyc9/j/tvlupNVVt+zim0np7EShFDjJ2lBFKxChTnV98zmnpOWVSHA0NZz4oKeL/KctOQq1jXQPE5q7vMMEanxXEnpCCsWnVGB5X1FW2MnaxFMBL5qSLCbc33ANtedlbB6zCuwbXVnZaBOdn6R7qwEWLVvue/M0757Alvzu85KWkdYue/KMPUBwcYqQ7UoOgSpGhOCM76P2Oa+i5JZ7wgktvVdlJE62flFvouWYM2+5b5LmPad8y1b4btocR1gxb6LMlQ9E+ShXmOoFsXAYKumhcQ53wdse9+1zJIFS219j9pkner8It+jlmDNvuW+RzfteySIscL3qMV1gBX7HrWpmhCSqzE0alEUC6FqWsS5v6kjtrnvUcusMJBr7Ls2Wac6v8z3kwSbvwIMADdV6usNCmVuZHN0cmVhbQ1lbmRvYmoNMjEzNiAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDEyNTA+PnN0cmVhbQ0KSInsV99v2zYQfjfQ/+EeUyBh+EsUORQFkjQb8tAia7wNGAIMjM0k6izJpeSm/u97pGzHshVL7fo4G7Akiv7uu+/uyCMDil8GQidEa0g5hUk+CmP56IRJoqTB+1m8l0AJx+d89dT8zkY3o99Hl+8vYHR65uvs3k5qePPm9P3F1TswFN6+PX+H7yhJ4AlGn9FWY1EyRngidkwaIlQ0eAiUrUE70Cj/XjTehaYINwEtIeoZD19RonvgxD6cMIro5Mfg5LOA0pi2hBtcpCu3cdeRw7g1IWtClY8Gxy3pEIUyos2OxFsp0mCvUyQ+DTCkvkf9tVeNkZVPJ0NNpQfS5mfnvd7JeyZSDLVKU2Iwijw1+MQ0eIcoDcZFWdSu2IIwa4j4/nyMU+y8zspiM4XRTXkxyBBjzP4R6NX4fpRGB1MMGijNCaU4mo+OPtjcwevxpzhVNlOPbo+KsoZlufBQezt1UOCs29dhWjR9Oe7wkNFNFdJgm1EDKpHRkqAaA3fYPUb5AP/EEP8SjVZF9G+84d/hZXYPtlhuOdZBalNuW7awngRJUg7j6ejobDr1rqr6xEla4mhMIFDcxOALTAUkpaNUBxVSAxRK9xSiDWsVFVKgWbQtiFKyyYFFfuc8/OfP7av13U3tnat/BhJiLbLaQenBl2UOReTaJ7buEBtLg7NkkMwDCo21C62lbWKCtknU9iKrlz1sWbtuBOWYDYGuUEPYsgFlw0QnW8EEEVK2CN/UtnZ9jGWbsQzLcmCMJTGEcTKAsepmrAyR2kTGuMlFxn9fXcOknPaSTveTIlGhAnHhTc0g4noAcXMgMVRg3RTdr6V32UOBzBdF7ZdxierxgNOWB1yFZWPtQsqGeMBZvwecd3rAU1QMO8LghFKi5cTcl1+yYuJOozd9Cc9FR/ps/BiUQlwO8CPpTiHck3SadgZjXla1nbWzqcP4Jjc1SZIIa0KxJjIlVOiI+NHZKdSPDio3tx5LCrKiqv1iEjhWcOfu0WTYYtFYPp85nIAkcmzvJIHxch5XvLnPbl+h5aesfsyKCHdXfnUVaQm8z2+T6YEU7mAiFE7Q8z4ohYmCX/+wvaOZlReSEhq0YQavjTbX1tfAfonbJ5p7ob9hvLXmUpLudPciCUOJ3Gqr8IEkfd0442anc9rDpPIg5nmXRmKrlsIX5YhZshYiReVwe9YrEc6K6gm3SIxA5eDzwlVNGDGIOJZVsHTWE7jESJZL5ysMNpzlzmcTW8CNzUt7DL8tbH6MG1uI4kWZ52Xx5OysfoTyPo59KD1efBGFDh07afqL99ZntrBwVc1sMa2O4+Q/yA2BPzP/gIY2L/AXrhfO1yV8zCYlBOPVv9kcZlnhKjTN4hR+DItihi1LTL9H+8WBa4i7Cp4eS7De7ZKoFnefHEYFoaNpLPYSW6rafo3J+VjOplnxQA4UjWBbRRNFDtdQ+iixxI5UNksKO4SxWZk4NukIEaj9ZR9cUCWbryQog4yxrFxR2bgmrFu/VSeE2c1X/46UGZHs/4HngZfkFx29MCNGs9WfWc/CL9p9w9apSyqCXYE0zWno+TCJJ0zRu0KIrrPpCjE1P4TYdQhFRMxUo+PRb+sQesJCJvcApq39qmuG3jeZoEnTIQsuTAN8MC8D7qoyCFDSDkBcJwdJsk4m+CbAAAdcS2MNCmVuZHN0cmVhbQ1lbmRvYmoNMjEzNyAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDk2OT4+c3RyZWFtDQpIiayXS2+bShTH90j3O5xlWjWTeT+uciu1bit1kUVULyNV1B4n9NqQYtLHt+8MBozjgaGowgILzfxn5pzfeXB9fXWz+PgOCCfw+vXbdwtI3t+429tlcrVIH6usyOG6G0PbMQQydxOA3eUegmtEGXBNkdIGlrvkAr1Yfj1IXS2KvLJ51dNhrY5GBw3/5AJJxd1DI85oLULHRHgrQhH1Kst1cvHBrm2ZbiHLV8XOQpX+hB9Z9fBgt2vYlMUOfqT3dv8KquzR3dN8DUX1YEtwox9tvk/9ef2aV0vy2Z0MlpuEcaSoafTrUxHECf3bL4ZOKdpT+i2xw5YIMpo0k48meu9c9qassk266gvIVgB7n30DcnAacC6Rcx1XHGFMYLVL/PtdQjBBzP3bJp+S22ZbAVnVyp4rCjlLUYcVeb1FKnqCGC6JJyYiaE6IDowQ+HxJ4ZY0AbNQM+EMggwLPrfKNEEaEFRymknOYBIsHuOCR2LchacyJBrjQozFOMddjLMxERmI8Y8byIspgQxpaWH/9OWrdSatCtgXq8zlhr1dPZVZ9evuHyhKuLHrbOUHulwxtpOOd86Qkm0+YJHoE/poTX+V90nDNDM1DgT7X2mTzTAD5iSCB+Z/Gtq5xHGnS3Jcwl9um7X3T1wnMdInnls82NX/te3vC2/fbZZbEGNQyA7nS0eTZhouKSJE17bkYxNZAIRl+jP9srXP/VrvqHNrzUn9yqPy79gax4KCkcTMRVSdpP1Si2L7tMuBjE3vgCcu4Hmbn5uZY5VMdpRfMoWEK2x9q6RjMzsqCZKGR+xSm+JlhFipB+oFxY4ChwFWyBhzzDyK1pCM5zFpzvNYI8i0mSGoAqnbCzpC3Z1y86fVQpFYtVCBXEw1DhplUnJXbFDwzCjTBPm5IMMGyWlGOcNLiXjqUHKgXlBNXIQDM9N6QqX6jU7Te6laTAEjBxEv5ppHr3XHqALwgv0kxVzoatcb9QZiRCiH/yLYqyHsmaDzsVcB7BvBedjrAPZecDb2Ooq9DmDPKZ+PvQ5g3wjOw14HsOeCzcZeT8Ben2Lfb867COBU/EkEaBXqmCR3zmXy+E00WhC0DhWEu4vs7sXYLBOadfuUbrNNZtewz1yd39r0u51WQwweryFMP2uuJ7FvAs11KyjlHMFQQq9riN/gjC8Ow2LBZAKodil/zheHEcOCz40yTVAO1ZBJRjljy6h4MBkdqSFy2jeHMVNqSC+WIkWkNxIj7JrXSBWheAj8LunPAJ/iAPit4BzwKQ6Af6gi88CneAh8+C3AAOP8PtgNCmVuZHN0cmVhbQ1lbmRvYmoNMjEzOCAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDk4MD4+c3RyZWFtDQpIiZxW2W6bQBR95yvuo1PVk1lZpDRStoc8RFVV981ShTFuaTBObNI0f987LAbMsBhZsg3cOXfmzDnDubq6fLp7vAdOJVxf397fgfUKDCh+GEguiVIgXEkoZRBsLX1/a3GPCPwTW9+tb9bDE465vNmn0cYPUrg6AqpuQNueAmgbAJUgdjZBrmp4FObMJaoBeLdL0jCp4zklXlZwu8Aa/yWNdkmtxi1rGEQIsmA/BbZdbCym8ikoXJQirsBFucTx8NnWmpGLxZ/Otl4JqWeoMfSvLYkLQkoiRQ4h/R4MRo/TIrYnEWOxtmbLWRQtL/qGsao1darmXkZirfm3Nz+ONlG4ho2/jeIPiEP/bwjv/q/w8OnY4GFh2ibGyyZUU1btFZKZbz6tNsrhGQf9G89Ee+NLMMnPBTPoXIO5emKoon4RGfBUQ0WmCoNuuUtbXIwyAXO6wepcjANz22CCeloMI7hoy8sbNhSnDUNVLuIuy1yEKnS8QRPxo5K1JWluSSfDckAwThzXayh6KbgDoBHrrhOcEtdljUpKqM3hy4DKeZfKheLTVM4NKi/BzlY5N6hcg01VOR9UOTedzuVxf67KuUHlJdjZKucGlRfvjSkq5yNULuj414ZJ8GbNCdahOekowkFSh3ieVy3HtYkcZEdwAzsZnmCT8AwyVg5yjS8ZVUdDsm2GbQbgTLEEt82dDHhUMiXSs+HdgCw4ESfITBJbuog9R8ngH31D4qPsJ78Y6Gvwh8L52m2ei16a6Rw+b1k0G9PLYJ+OPTiuK+9RrGo+upPJW2Y1zmvLyvHLZc3NJGbOOnWf8FrOks3TX9paG04WCLWrsryCe+04RUx6TIL4bR1C6v/zV3EIr8ewc4iC5+wdMc/r54ww7U0c5CemLAQvfrSGKMkG0Xo9p3ieb3b7ojr1n8ME/E0a7uHJ3we/2yME+4xBhOO37rUKcXAIX4N0t8IxeNfUAm/jsRNHSQjSJ/DjEGYXB7zCMLi8aA/S2NnD8qlmUOUMznZJ/FHeK1idZYsoqWrBnXDXYqk1oEnbCUut6jZtBUs0Z6k1oKDt5mUfxVAQ2pcjJK3niOKMbudyjAlS5LF81YfGTLF8UZB32AWRH8MhDN72UfoBafRyGDjxZSNlYMprHldlCBaqabVREUH2pOrTE2kcYHeyFjZa3Ts3dMjB0CF7ovUpKaOyguyJ16ekjAPsjthjSGlLbET6UEMZG+Ws8/FQyFajQnbljYGMXRVSwjCgDkVsNRSxJ8le9cTsSbJX3VF7muzVoOxVT9aeJHvVk7cnyV6Vsof/AgwATwAthQ0KZW5kc3RyZWFtDWVuZG9iag0yMTM5IDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9MZW5ndGggOTA5Pj5zdHJlYW0NCkiJrJfNTttAFEb3foq7qkCiw/x6ZiSKBIFFFyyqZolUmdgBoySmxAj69r1jx4mTjO3BAhQSJZPj8dV3/JnoLzCg+MtAKkFiECImXFqYLSP3tvv7nRmiYBH9jn5Ft3cTiM4nxarMViVcXJzfTX7eAFcWLi+vb/CzasH1FNckL2VerHZrYtqsYZAjZMr+CDzsdB4xVW9BgeSKGAGCU6KNhekyOiGn0+euw8asQbodOoZ7jiUxwG1MpOAVQs76GHy7LRJbiYxpGp1Mk4/kYZHBXZbms+Q1g/fkMVvDNyjzl/WWdovnefVa5vNk1iaKhkjdie4mzCluT4FgnFDKdiPWvNp9e8IeqmyoR0Bu5Rig8gNNtUGuWH8GPMB4LwS+FdpzSEO9Q+GWiOFzMJ3Ao6GEAe0xUFDrxAgZylG6NB0WQ7M9MXY2cMOcDS7K2rJBG/Q2yc4tWrulK5iutu+UantxL7gGcMS2Pk4+Y9jeSkoot/BjIPi6K/hC8fHB157gb4Djgq89wXfA0cHXg8HXnuBLLscHX3uCvwGOC772BH/TCKOCbwKCb1hwI4Q6YHh3I+B1wTSNkFaxd2dCeHXBhz6o2K+I5jtNSbS7AdZvD88ZTtb9HByjLOAqTXM3hGSxqxbEHK58z8unp2KR5qvH6qOW0FjPjG9aqpoEI/Lr3+ix3Mj+ekMdRkhpOtrIAZUZA4y76s1tcITlRg9Zbnra6HAoQVIaj5QN8HAoQUBLu+otaChHZlg2bLnlw5Y3TRfTIMutCGk6hAU2XWslNh0dbjrb5UBTTKMcsB3FNNoB63GgbrqRDthBB2xPMY1ywPqKaQMc44CgHgfqphvlgKDDDgga4EDTdGEOCCq6m064O7caIbM+xjbGmhi+hWiLNdSGTIsSC2tdzHL3lM3eXvPyHySrdFdiZfKRrclhWZ1g38GkWLwtV8Bh/losYZGvsCxlcoaP+5P8/nTzon71gI/ZWYWWad/OVfsKsJllexBSSCJs5yy8Wgsad2gtZUzcZUrxXTgYZSFp8935bWhCfprmswtp0m0Ns/tJn/HSP+CzYB5bFB7RHkwjSD3GumHtYYTBuAeGt+IhkzjKExPDEjO5J/HOXCUN4aKKGt5GD4nLlE9cqUiM/+ngvR3GtWKoPsY2qNW51jdutaWViPCQzQu0Mkmf39blEr/b4WZtI6+Fq/TAS6uR+uvuJ+G/AAMAx3AmhQ0KZW5kc3RyZWFtDWVuZG9iag0yMTQwIDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9MZW5ndGggOTQ2Pj5zdHJlYW0NCkiJzJdNj9s2EIbvAvof5ugADZffIoEgwMZJgR5SIKiPCxRcm06UyNZGktPuvy9piV6vRYuygWBz8Qc9fEmO5300nKFXi68ZQZxQwLBYZbOXHPjwcQ7Zzbzatnbbwps3Nx/nf74HRnJ4+/bde//bgvzDgMBi7SZrRfrJ4jD5wyK7ua3bYm2WxwIqCGAoIPsOfiJ2r5xLRARQmiOtNSw3mR/fZAQTxNynMvs7+9RvKyKrg+xQEetrFCmOK3K3RYUoPxLE8JooJFKCJAiejaDDJYVbUkfSQvWUM7DzgqdZmSbII4K5nJaSQTFR8Swj71zBzM1DW1TboxgZYoivF/d/7lcV7hxuSQaUUJQrDYvNeOHSQ+H6bXkN/84FkjkHohTijO5F5JjIoXgpoqKv+Pmurn3UozX1HaW0AbP6umvajRtswKt5q+DOKrO7WWMtFNumrXdLf9Tm7pWPoRRhl92XN/6vxRuqE7yRCd4wnOAN5ghjcikdGDnLG6LkVYoR8/e8cVukglzKG8ZSvGExNwc8nKRlEh6YOCs4yMo0QXmGN1NSMigmlqd5w9Q4bzwqck2SvGF6jDeSO950IvmICMcR3iyq1pTQmv+sI826tfUxb9AAOPNqc19sLZTupQEBZrsCCfswKp2q/gXM/xMBwkkCIHkCIJyOA4QofKnVeeSxHNQkvVgt4uIOHG5rvmwu5AYXKW7wmCuDzfGFFuf5ebHjZEwTU3FeTMnEsHR0GhcCJ3DhnJ6nuxNBxmjBsaPFXkONaRwKdWbGwtjTUoSp/LCa26k6XuvTzpTFurAraDamLOF+13iENPBgHuuq3CMIlrVdFS2sq9r1NO6LcTGfobaNa4aWX8D9OcXdbz+KtrBDNDGHH8l6G962rXET/qjqDSid87ET8Iiln+WNccT0s8Mok7C5EAmbC3HNLUJErBIU2VU3HRHxS293Ia+5lwiV8ruIXK6CRU/TMsmmMnK3CoKnWZkmGGnH9r6fkpJBgUmaNr5kCeO72ptyL5F8zPkUI9n3CQrGVJ6qFwlXc52n7kenPF2skNTh5vFXta3terddmfvS7qfniMnQIzxU9T4LfpyhPEyq1tA9kp+6iZ4LXSDOg8s9J7pQ6VDdjX0/cMb/4pyrgm5TLL91jYpTDuG+f+nGsA4NwNpsivKxX40cmFJa88P2wYqE/ulf89k2fSw/XLliO4vPb80326XgNdNIKulKCtEu4dbJWLh9qIsSyO+uTaXklHrE1QV9gaYL/hdgAHSULegNCmVuZHN0cmVhbQ1lbmRvYmoNMjE0MSAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDEwNDk+PnN0cmVhbQ0KSInkV11r20oQfRfc/zCPKTSb/ZR2oRRat/fSh6Rp43uhECiyvGp0Y1uuLCfk33dWX5FtWZILhUIJ2M7u7NnZszNnZhmRjAOF6dw7Iy+m/3vszx54fzkB72KSrnK7yuHVq4vLyYd3IPwAXr9++87NTdlXAQymMS72A1Ut1rNm9fupd/Emy5M4jNoIukagkID3HSEo/jGQ0idMAeM+REvPjS09RhkR+Gvh3XifKp86IE0NeYhG9aloAe1Gk841wtUzHoVzpokawmM13lELfrijwh3NHhvcjHFfHAdrkzEOTHaABf4oJg5iB2OkTcRbDI9JuM6TdNWy8Wsb5qKDqXJThUfQhGO8MUoCA9Nlf5gGTZg6rxyE+5YKA1WCxrsUBYTug2ji9CzqM2tijztGyiT4bDc2e7BziNMM4m2+zSxsNxbAAbnEoVXicMIk+w2y/c8aaEkXxVDQ1Rz0XLNuRIHhNfu12EUDYqeb3KdEK7zp1mf2zStlRQtijMHsxHFgGjLrxUczUvMB+USNc2gnip7uUI0KsXLvVMAO5ahUlGKmSHOqjGo1JKN6VzuUDAivved6DLfBEW4b/dzjdpSGan1UkPepHYfXUe0KTR7D60FgGzosyuY5iov9MHK71RmVNdDD6mx4jzr7PvEFK+W5LyONeE4t1WTkvHeJfE5iH/8pl1ylq8zG29U8nC1ssTwgrqUoZ9dpVpDhxgUJ6kVpDKW0cFVbRpmdJ3llSANRDbsSUJr6slaa79twkcSJLb2VxGVLObNJovti0FWT2jxczasxamohi8NlsniqdmN+vdvChg+2MtasrkeP4Te7qWwllz2eda/Pw3tbUnAuDPEx0c7x5KVvcW4zuAyz6A4Eewmccvx0Hs8sbmDhY5SnMzSp5vYq4FlZE7kkWga/QWn4JQNji4xRnc01bxbr+UC9MX5/dcBO80QdN8HRwqDkyWAdUlgWhYD/RGdtzEBJkLSjl6+0t03FGN2VlB3FajMxDqur40cNH0HDftRIKgYVXFLZ31Yrf0RXLanq0m0fcxfnCKMlwpd0C5f/3kwhSpfrhc0thIsF5HeZtbAuhAjF8+80W4KRslCKmw//XEGSk/7glnQnuBk8ttkTiuD7QrReS0KJ/ZsouDk4VbDDjS4P5qDcI6cqZ+gvXGfJQxg9wRt0yrl9Ha5t9phm9/DZzrdRwbibu0rzJLIvYYMHzu8szELUdDyz+33713X4tHT7/5duozubDR5aH8lo7Cuw7u2cmAm8hTEnNjsnbslxUIAHIHlAHN/IAKXlW2kS5gSPRlzlZf7VgNuMHmulMKDZrttKj/KasR2va1cVM0SbwlXts/qyls1Tq5bRsnXBLyVwP922xzjcK0sNuMLg3sGG2zMsY+L2RZsA+CHAAF5RHQoNCmVuZHN0cmVhbQ1lbmRvYmoNMjE0MiAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDQ3MjEvU3VidHlwZS9UeXBlMUM+PnN0cmVhbQ0KSIlEVAlQVGcSnmGYN49rkHk+1Hny5gkoWCIyICjxWlBOOUSNyqEyzjxgdBhwOATU7JZhFUXU0mwCRqOm1mtRIyiorHgigkIYReORaIysu1YqxtUy0w+bquw/xk3qr/rP7v67v/665TJXF5lcLvfLXDQ/MyVxQqJoKRdLzUZDmlgmpixcUGqaGGtyCugkTi4Nd5VGe7L4AVrf3nhrVMJTb0nu0z2a3a+Rucjlr3+dXVRcaTPnF5QK+uipU0PIHB32bo4IEcLDwsKFGFPRClFYUFlSKhaWCElWY5GtuMhmKBVNoUKMxSLMdyqXCPPFEtFW7rz83R/BXCIYhFKbwSQWGmyrhKI88mY2iZYVoi1ftAlzbGXGVYWGEmOB2SpahZiEEEGsMFrKSszloqVSsJiNorVENAmlBbaisvwCIcVsLSqtLBbJZoXNYKsUEgpXJIYIBqtJKDRUCsRLm5hvJn7aiJLZKhhFW6mBrCvLbOYSk9lYai6yloROil+w0GlksmAS82QyORkypUymcpV5uch83GWCTOZPyyZ6yWJHyjbLZIkEa1maLEMG8jr5KfkLlyCXbJePXP7mctQFFH6KIsUL10DXDa4/K8cpW6kxVBx1nHqmSlMdUD2lvegIuoHupL+jHW6Rbia3f7r96r7KvcdjhsdSjwaPDk+151zPSs//esV71Xn9Wx2lLlQPeAvecd7V3m3e9mHhw1YPa/VhfYp9Tml8NRmaXZqLjIKZxWxk9mFSbbv0U7uczIHtilpXqWZw3lANBdvwGoszYZcSnlMo4CUWnIehnaohatm7PcxEcqaki6xzh86TeihIXQVuE8oHPcBNswX80Qf8n3U+Jhs38GcKYau0mJ27e/X+M9orZw+f5TvxG5ZpeVh2pGKRdu48a9ZGHrtgJLsb9T98AMF/oaM6n6ggu/4C6Dq0X28CBS6+zFfuqNq+djsNcSrmxNmTuYu26sCf+hj48d3oUU/fnzdThZ7V6BqHfloc9dL0spivr/msZmcNjaKKaUn7LOfc1ru0evt6cIsuH1T9qGkELhdYMoYxpyWNdJVdvLLEuJpnjhUfsx45qz159OBxnjl94qglT7dzyI/NW5m/egn3YXbLxWvtTe0HdIwFdmEfC7EUjoUZp9oPdO+8OQq9qU3WjwvXr54EypH9TVc6HmtBGXENZSFhc4NTj+Y25RCTU0yzEoK0yL2aDux3N45c7eAJfFIHhMr7wF/RJ3WwvVTWuoIlVXyS6vGn3X01/6JhIvqr1EMsRpa/HbtGfpHIQcpgERuBzHJMx/FaDGvH8Ec4mgd3KgYCzRAO4VqYdAL0d2EM/4fmK6emKyazA6A5A+kwXgthmRAeDX48ulN3cexxDMdwLU4qQH0MCrwaD0kNa6BwjRyivlXAxsFl7DT0oVB5pngm0KaY8V9n3Xp9N7D3fMwLcG8uvo/0cicZakkwXaBXdPn2U3XLLbmGanq26of6W13/0UIo6lXELBSAWn4JLisuQQELl0GNl6n3mteJ5nVf0DtFKTVJmLQB3OT7wR+qiPv74RcWG8E9AngQwH0AGuEgug8QqpIQIvAgD/6+d2phFlBA1+Ks2OlkQhopcvWQV+8vl7IcoCPxbCO2pNGD81hUUuuEMHNwHS3AnKEsIEjXglpaSfw7CaPB4oQsRprN3j309PuuM4YkfkvklNxUA3pFB8dvwSha+pQ4/z11of/RKft52n7+6rU3WvBD10c4HKeHoTdO3sE7o4CVLyvKoZgUyF7g0B04MJJVDcFMG/MAKuAWa39eNyYpc/ncaLH7Xo0OOQoja36ZCHoO/MD7MQTpmHMPcm7O3MPXqZjWnr3HOnu14IPednTFwNBgDNjIA0f1b2m6dJu72Gaep2MeTov4c9oOZ9QQRWCMJmH3AKeAHl/ye9RzcAuVopGhsGMoRIm+cF4Fbq6YQkESbFJuewc9fOFwEPAlwYkW6RDsEEfFD41QwnCq6fDhvRe4e2czYuNykmNSl7Z2V+vQn8KgOlD/CUZzMKYGPEABgVoYMcOB/MLl60wiv7nuMEQooeU36/UO8HOQ1OpgvfODfdIeFrzX6m+jF4fZs3AxSV1cB6YSsoz7GZQQcKXqWl6r7owx7XA6l7CkdKFJt7lO+WD7IeBec+e/MuZ8ohuLevbO8aSkFFNywhxDT4/9ZNc9nTPtPTBS0yzZhnwghHkiNThDseFIeEIxdhyFkyNx6Vo00hBC1UH6t/A5BMFwWr3eAVU/VpZDhUPTQJqZkrSLAiCMIU3tAYQR5vZfabb3Xl6WGLc4OyFhQVs/z7SQ15ts/IkFfRX8ZhVzLnpNZgqpqAkwIoGA7gsj70DQQPbNqV84s9jWe+Crq3ZtXzp4YqxTl0J1Mmp0zDfAfsR2t5/oGNiTlp+esypjfuY/uninP34OqH9fDutBpzgGiSx6f/5sDnhxkH0PFhPmx82HVCzAccGoxICFezJO5uqWn+oqus71XfjySrOubrNyxqZi5AK5rPxTbRt0r0DPxpp7e2809/TdbklOjs9Lm6X7rRYh5/dKfl+PZHGwqMdQILVJJKRcQuhGCGoAPQYA93fQM3bmDSRIFeztrUc7+7lLjda0D82lJouO6TJaVpj+OpleBlyTinnzSee5g62NdOux080/ae+nA40ZOG5iAAbU8IwdIocq2P/3gO2EwBGEwMlr5NWD6YpqX4igrjpptI+6jGSZQuG+wWVKjKQe4By2jnqGu5WYSqm/JIUMSxwwDdQaOzG2C0Lwf3xXeVRU5xUH4b3BbTSOg2RG3xPEoBEBARm2WBEZIygKAmqiJMG6IlDcIIAipC6DDC7RHBSxKkrYtBJFcUFB64IV3KoisiUFISjGWOQ+cqfn9H4weFrb0z/mvPneu/d+v/u7y3e/IYSwEzbAAyX8jq8+Hz3NJzRutojePDklV8IrnmI8pBLGNn9R7XpMVEiV+Scv3VfBh47nqL1iMxHAxOz4a1c2zpgTsSZERBdefjMBrKR4sDItJq66Z0vRSvCIR6tWnKTGWLREDwpHBNATYsEXhlBv0maJaM9PTA6dOUGN1mEwiGrlg3J6WD+9Gzp9nyi/uYNMhpFJBvwBmb1nCbd4iH5LUVkCKSgSX4T7FgNkpQRzHpzKHNEWnV3nOYk4mpevIgO0mRwm9hohA9IPYGVQ0stX1LJewURpMK0LeLkL8XuRJD3eSdKeF+EKSV2hlx0klcbLn5KTEzfAEarblVRM5KpkQoVwSZEkdVj+IlliOZ32zrzi0rjUuSFj3/Pq0Y0I72wRPubBLQGFFvzov4i59zD3wVXym7DQMAC5cT2el/TBuQUlNCRM6g6nOOViCeSyxDBYHt7QHR73DjT7Su4w6mr73kp6sMLXUi37Ahv65O2kGLBjOnaSTs+Dr0HHwWB6Shmc3pABdmQplkdnQzKn49FLSuZoybAZtaGyT3sNaZcZ1nA9m9sZ1pL4ZWkth068/OW/ZYVkRWCKWe305UEsNQMPiIAV1Hk9iAwjHQJMsjRyBtblOAg/wIFh9LA28klNgBjaS9FiJxSjKBPseynaCx6UWPeoUVqAhRY41Ir42Jiwcv5vdxKdnPwTp4ko/x/QutftUzrXcTfvFrW+Ub2PqQ9z9Y0DuReE144cFsBuZXUgl7I5ese69yJtRO3zdWjsctHzESc/Q3gLwRwWG/EW9YW0kHpIbd6qqd+J3wbrtIfCLWgdczq9cXvp1ofrH0/5k4VeVlt44najCkw8m3G4YFAanZnK3y+O0voujfITcSovj0yg8zqdajyH6ns42MNx6vE1irYcSFHidB2M+wSc1RD2pgNGgBu6Fs3PFBU1OOP8yj1XVTevHy57fGv95F0CtX7yedQdHI9KFPzwI1R1RbyNETpjujZNUU3TJIYIijaNz6l2Ue5H50ktkQdx5ArEkS+0XEVVUk8nyipjO3gRZ1rVU0ZEroYGJ5xkmMtbL/+MTmtFXM1TQZrL3sgwDMwdIATmAf8zhAryBb059k23yqx7GFNzozHAkMbS0EVK42gJSf8M58CPsjmrVzbjtylmv/kwWQce+xs2M1m5tJlDOx6HGhLYkpMSONa9g5iqCw8DaU2JO5i+AmUqpZQkboC2ONMt3V5mWyzJOjXcHeCEOziYw6Ne6g9fw88csY1jMR5HQzyH/jwkYBvHlBkK2MPI2MMCm8tDtjSLQ1+e7own0QtOckgWswyfcvLRG9s96wDYAG4D4dQ/SqVBsEi5epsLmi2OyCy/cvrAub3CuW/L0nMOW2Bgp/LarpNHKtRlJamBQZ4ZrptEl2SXGOyvsn76WcftqoMXSgVFfHrCzoRdiRZgy286vPXCBRUckcFQHHrUlga/gUvww28Eud/GLoc2aOyCgLhhFbRzSm/nqqBJiDpWlV4WXHB73RP1GzBrgGAIQrMG24CAtWErRB1k0lQjDTEsUk5e5q3RLKv98adTtY2Np7xdBXKmi2xSEdHwUgJ/V4JVKpr/FeVq9J6AA3EyOnZiPxoURrY/hlHZIo7iZ6Uu/Wqm2jm6+dGT/NbnN06tDtor/gc4RstWY1v1InTUVWwwU8dfjpxzPFCN9lMoO0VRcQnHPEGa3quu51wrEvS8DsKUbjEeE12WNdU1FT5ra8330vTiG9EC/bpM8xjEM7BOCS773GAcTlfjpNE4AB3R9TWagwb6N1G7Py3SdB+ZunhFsNr7izMt28QW89P64/db1PcKlvpminJ8TYni2d7SZdpE9poswUby7GgfX8Cfzcoqzj6YpjsovJWlr43NWKNGi+CZTuISN/smmdwPF7SDRRdcbXPoonPDBjaDWlGneCldlPYrac5V1Gl1spsr5x+docaxU1COKrSpohHZsbLyeEWBqJ/B+6QvD/VWL/wyu3yTiNY8DtgDAz//VQ2p+WDbJOLeZqVrTN2jmpP3n7XmTdX4LNF6iuxUkzTUdwLiTFnEFxNiCrcN5PCdRWdrqo595SZgKa0fyGD40iacEDY7Jmi5sB2OULzlBi/S3h/3C41a10nxOnN1P30g+YVK7LnXsvsK+tNYUtsjVk1i8ahV6g5k6Q6oYcwPZW9F6TTaGIpkv4/9Y3RySnpGqgDx3Vnv1Ef3bMFuV0y3mmHT8lfLadBM5KjHYRQ8o3kumGPDyQwM5CRFzzXQq7fe+mCxBKFesJ552zEezIfRB/Dv/Q0fqbjEZKCcf303+/uWbdo5Ap6l9RnZnQNVz+p2B2sFPE/rVzJQeV/Gfr6hEeFRQmVMUI6/+tPQ1WHLRB1F5z6qZL109mxgZFNR+n/pnNNLJ6+oeYhqGctxY6nATkJeDN8p0b0TTehmoukEE3AHDxswQQ262aAJerBrXENew4uXee7uHtHuH0+IbqinKqZ7LHiTIZZIFcZKqaugCy39T9PzC07c+EOlGiY8oSFOALtpMALdAuatCVnJ3HhZRThgv8Fb6Rj5rFFU1DXmN7Q9L3LzEBQvNVFeDu+Z7ytElqdX+/J0pk72l8jAowFUPVNZluIiGKptr7x79FqRqMcdFFXDcGmWsvFEfWtzoaunW+Qnjg5R9Q2CHEuJvjEwgLLaamtPC1Jk9tC3kVfkPf/z438cPKzbnikoMsFKpsjLSE3Wp6i1fuH+sQz5rReMQbTd2E6N0/QMaQUQhXngrcRRu6F/OAxSwwAYcA5GvvDMdz8keh7y2nNZVXJhd+HlkqSQnexaCIrNY4qRU6MZ8ivRyqk+uv5r8df1N5K+VC2cnxgxb/6xyjRCWb+FCuZeu2kru/Vu6nZlueo42f5HvM7bPon76fuC9J05ApjJtidtTEtSf/4v1U/fLf99yudXysDkUfudRfPtD/NyRPL4sR4UbEq/F7MpZSXYeRZtfSD3fQeQf4n9t8hGs+/ax08uP7pero9NuML5O8h/puD8wDjhxyTmH9NBWoEZnfH3V1D9xfj9K+tvTbbvrn9msgLbmHzfJSFqJ/7cxvxzD0itGpvO709ApcbfP7H+lmMz/f0ZyNH5/pn1N7DNaQHSps72+Pt7YK33/Pd71u9qbMDwBDZMdpZ97yxn7P6xlrmbBVQxMgCLQmAqZP0OrHaDvy//bve9DVRxGv6WNvguDa597X53svL9NoPmfMbWH8uZfywEuQBY27L+/gZyLef3b6zA1v13rz+Vs5OqI6LaJPO78vsLejl+c7J3rFjRuUL67Z6191bJ832/DOxP8jF+F/tZwQxsDmaI/qz4zve3go2vas7PuDm/s2Z+t+1m+z5nyscpf27MZIcKTuf4vnTS+0l/Xk7n/Mb1XYn721Qenu9Ks3h4e3j4fhwQ+WkrChBgAKiVzDsNCmVuZHN0cmVhbQ1lbmRvYmoNMjE0MyAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDQxMDgvU3VidHlwZS9UeXBlMUM+PnN0cmVhbQ0KSIl0VGtQFFcW7qa5l2GAAZk0UoPONCCwAcQHRoWwBpSXz0RF1PAwPAYZ3pkZIBBcja4rhDUaTJVZNNloxOxuGR/ZCiqCikYp1EjC4kSZKLg6hh2lrDXq6eHMVvYOuu7+2epb3fd0n+/293333MNz7m4cz/OT1yxNXrZmUVS6vqxGbzYU5C3TV+uXZKw0F05daHYlhMhBvBzovtHbTZ7kLWI8lozdG1tOwOYr+034YpL/Mn/Ojecf/bKgsqrOaFhfbJZmxM2dG83ucdPH77HR0szp02dKSYWV+XppZZ3JrC83SQsrCiqNVZXGPLO+MEZKKiuTVrjAJmmF3qQ31rhevqAkGUxSnmQ25hXqy/OMpVJlEftmKNSX5euN6/VGKdlYXVBanmcqKDZU6CukpLRoSf9OQVm1yVCjL6uTygwF+gqTvlAyFxsrq9cXS0sMFZXmuio9m+Qb84x1Ulp5fnq0lFdRKJXn1UmMpVG/3sB4GhnIUCEV6I3mPPYsqTYaTIWGArOhssIUMy11ZYZrkVlSob6I43h2cQqB8/HkAt04ieNCOG4Kx4Xz3Ms8FyNwszhuthsXz3HzA7kEZj2Xxi3iTNwh7h7/Eh/HL+eL+ff4Xv6RW4rbUbf7QppQ7+7uXufeT/zIW+Qj0k2eUhVdRT+iNo9gj90etxXeijWK33oGeJo9O5UTlVXKk15xXtu8Dns98Y7xTvX+xkfts9bnuEpUrVOd8/X3zfFt9P2bn9Ivs765S37QxfcHyI2ON5yNFD7ACyLOg10ERihKeFYEV+Bs8XDS3PE5zEMWU/mM6JqhK1LhJTbkhyDwTyFeAK38UDxPN+ZuzMnc8l5WIEi7m0HTBu4KFKgKb2JKzdgrtfzhYQES8U2x6GkDuAPRQP0oZEIYJGlTKEaw0hIwAWs1qPgSIzpCtP8Fgv+wkM2AEAFxIEAC1GpAaYDQbOC0K+lRqRUJEg3WR2ImhmMiQ25y5NbyFvirAAccueIqWh0S1WnMsWfNm3O06MbfO6Z07n/z4dM//O4Uum1yiWlmQt5lQloD/r+KLNhs5dvgotAGm0Vop3usBNvpc3ArBDEwCPRzEMh4+q4dNY5NtXydTIS6enGAQqdjE5lPVRstcp+FP2CDazbhAOwRcWoHquBl+E0//AABsCL9BvqhMRa/wlla2wbx4UU4BjGg2oDahCVZeBxnzikbAKJVfVYj7+njwQ96BTnFsVZcSOPzwvJnB21II1fO7Wy9pEMP5xFio6pmi3zewvfZ4KBNgJlysXh357nr9qCBk7lJKQX5qwt1KIXg8tx6LFXIa+geC3ES+snp7vbjXyjA5zpkDEASc3t2P1KMjo3G8AYt0wBtfVBv8f+9rdYGdbYMm/oRlMBdUf34tm0zclGpr0ej+9uD1z/QzaAY23h7AUhBkGyFyaO95nOpf9ap7Zc/vdRzSwPer36DEzAqOQw967U2Orr77MnBoAu9DXNRFbxhxg4dkwnxFn6b/KEgT5QvittpOl4j+A6FFNwqDtMjEE/+QVstZCodlYvJAuqc61xXP4fAZZfTcNMC0yx8iw3O2gT5j46lIjIVbk4l+YG2f36mrSvoXtfq6WHL5qDwSt6Jmy6yLw0lgTjQ8+mpbm336baBaxrwWTCC6nXZG6sM2qbt5yGDwHHKaDncLPwD2STIA2xZZw6tTyQyofhrTMNANMzHesUD+i0UQTDshTkQrRg3zdJUA+9b/PfZttig0LbEph5UX4NM+WOx/3RH//ftRcnpWVnpaav/ck2rHjznXCsmLP96+P63XSNDHZmJMxZnzNSp2zFMzhYzjq3qqtY2eagHp9Slzw/W4GTgFsMEVg3kNkwcKLuS+iftdg/1DcveM5dvaECIvhKqZVBFRDr66lxMki0wYPHfYSuwwTGb+gEchKvi7NzzPw53jY7+dGJF7NRV8eE69WPcj2EiqppuvAHKIAjus4DPWd3R4X3Aj2ggJO0+RmrVDzAyEpU4BT1+jAHlhSufdR7SbW8ioaXZrJsEBakfp5R8dVWnYqdEPmThbw+P1+FrcoN4d9f57+1BV08Zkpdkrcsu0eWUGt42lZbrN+ZuyVHcojv2kUMQCZXbIF8DRDoTgZOjIlCzWXvR2SD+z0kbZCVSaoU7Q821/hmOKPV19Ygc41CyUjmLdwi+T/EgnhKfUGZPKYFueghLyShF0ZFLQqkKNPVWedjKH7PLFXZB7oWtIgpl89PRMwhD0+yghcRRWAxZPw9koLvOTiEOlTcxBhvxV/gWvotrQUAFrIbkn0dh1hGtan+zFdiotfItjolCS4C8lX5iJc5wegaaiezh6hpOSk9BLZGDx4NNVLWBKbA+w8i/MIyd9oGVwC26l7WYW7TDlezlCpwlLsLPsntq2R9yx7O/Y9mykqailTCCkUxYNF2MPcSppFegh0S5WjArWNYRW6BpHPE8SQWHmx8m1DjIXf8Wx2N1VUvAPWaTg5DtdORfhNyjMjceYPh4BFEMhYFUfRSfOMdIE42Wx1wx49QMvmE18hCo2Sa0OPTqNS0BP1F1MfjIQwwPHzqHyD+f4adR9cfo5bzD4LhLvkPCGPy1F3vQaBeOQaf4wtbNEA6FYGannYAOl/7Hdq094Pm+QGB/KDtw8yJwES5/tmNaVQ+z6IQVWq28fNo+LrgXThAoplB0CSbdhYDEqzhZh19S66si5NBL3RWxs1e+HqbDUqrqGefi32pvsMPX9gw7q6cBeUxuFiF2J/p+h//mvEqjoriysA3zCsaFZCiKaJenyyXTRkEFjKAxBGwJpEmLjCtiXAjiMTpGVKBRmEFkbEQFxRZZRFCwWYJGBhAJjRuDaJBVTQeXxJIYgo7o4GhudV7nnLnVnMn8n5/v1Kv7vne/e+/3vYk8Zem4YKqaZFkhxgnPthF2oCexZZtG6eH9qQ91nnceuGyVJ0MXpMCYAAjkgYOpPahcbnPqfEoFDxNh74SeiCjvVopPq3oGuzdSsk9lL0OroFe09Dta/4yK5cl42wIJVW79zId68VSl6wZVlfBECkfWfGxzCF31aT/9HcTwMAYUZhhpFnLLc6/mNjtjAQ4skLl2vSdJbKw1BIOpZcZ++lWBKddYFWQaM/TrGtlOQP8BIDMTJNsgsnb/F56N+GUzbp8qM5Rne4Hbo6UXhI7ADrIN4mq7NIhztgF/HpK5/VKyIbcNNht5zriUDBdYh9XZEZa5D2DCa+G5FECoA0NL6XOqhudEzUC4LYC4BKMG8hZFqgitoqMFeK7jatGNo6qvjZ2Hq085ZzIpqwyrt653Xr0lMl7Lr1pTahbaIIHrzLlpaucbWlOWBEcbvNMEyqTSKal0mnLi7ehHfRfLzOdUOHbWGE5vbeQLSg8fyRPy2si+tN3pafxfdhtLS3MqDp0UzsBEkl2eU12hfOVTNoU6TFtOnXapXA6nWKISpEgLLNS7SpEi2yBFQiunDqWT6Bt+i80PwOFr8ISp92q0c1Vsom0tbeW+ZYr+iddnGyKOdS1+ysOCQfCG2TA2tB/ZWvx5ZIyQkdkM+cSXcYkYvu9JEdpERykDXnMwOl3zD3nELFTjLJlDhdt+KBSj+jrAqVLwZXQ7lq3T8J6buu4D6UFT8FZHfYxOkFHq2jCSjLIQQQ7BJxwwPTAB+IdfLf6AjtDQqZSbEX3loUo6KB3j/JiltAJ569b7n9LxVDuRBlJv6noLUXZfKuq8JCD8xJ3zyX07RPjAAmqLIkeELvRpDnCDu3/6ascL/skZjWav0BvIZeUfNpUpQf3R99QTE/Mm5Wmkt5mOhAAgT64DU6byZT7eEbFxPh8c2nC/4GBBZoHgQhvQqIRZwN2SpnctgSF2oMRdZJ5KYeQFk28h7zBtxYZOkc/Lz9iXJ7C9+bexnbLjdmTu4On49CmTYoVZTHIg+QGHJN1ggbcsEmtJ0bvGi1Ei+/g1bOCe3kTvNOpx/bL3Ji9CDXLzjWpH8bwjLYbr3DwmyZNk4CUftyfPrw3k6ftqNJnT6RsdXuDW3lraXC0L1dux2ybRsTw7ELroeLcBs0+dsgbXvOLB4UHdywtCwbm8y7lXnGW/Za8PhTRLdDTgHa5DzbG643WVpnFnq5pMjfzF2rjInWnr0hMFLW0mItMGZnK0NrvmlLL/k/PTgj7c/Kd1aCBugEkuCZsDxsvXA/m3wgAp9ngwQpKrBVhYyc1m4ieTR/I2Gmmxutn30dHw0pGOpks5w4mi/UV8V031zQIB3HEGI2ZiqyWa5NQdG/jdu7Oydgvwg/X2b2Em4DxsSgCDHrboFQbpuP28GtAN9f+LlqNmUDe4B/GwRNZTmkfjMzIfS3OI3zBMua1/wyjrBsKHQns6kAnrapHtlj9dg9Jjl4xfnPty3NnKi1WN/Fem7etS/rZ+T7SwkJoxHS1QfPTCsfPlleOqK66cNfMNZ7dEJ6dvT08SFtAH+L0d2siRCuOFSuXDoCpNcEjM0mhVZ/JKUygfFLph2VrsJsJWF/WS9xmX/56NTAyf/X9RgUPx+F0yFytruD0LRegTHYcgivu5CyaB+0B96Ht/DKGT6ZszIltEle9+jv7hOy8YD9pX4AP+oPrgW6qiWjqCelF/HCH4VoEwjNSms7hKq0S2V1oFPRxlPpRtkN/qll4YcQdrlRuoXe6nsh205XIPmWaoxBkSXHw3vo0H7WsIxBniGvSIjg2OSPwoQkCMAye+IfOY/0WX7429P4Dhr0n5yDA7sGsu9vitrbqSAJ4GqKkPnUW5Nk/gb7ZWNNVijy+hhVgE9IY0g/u5B3hw/f5ipD91CMPJM356TNcDfC4ZMaUf/4ihDRI7nNIm2GmsyW0qOTOurO7cF425zoeLcw6c5I1HD+w3CsX9JDM1NSOVfzdsRVC0DLP6NLoxxDnBnkvXPWKcCOHiEtGunjpJwcGYd+o9PDyWe/h3beyOVbEDXVu79CuV4Tr90qDQkt5DODvo2P0/rUOfia/KBnB6EHwupFxg74SUhxSZlZev5V9uvbwlPB3BmvZapN9bFI39jpBt9eF8mc10OnmXSQokfUwIvg72JWWkJCu1V3a2FRdnHipWFdwlhqSk9F38tu3GstzMnIO5wk1oIS/lt87b8jMhSm5F1wKRrZYKMae+zCJaQ2bv1Mydzq+MLmk6Yaw/VCR0QDNWvg5reU/03vXxSq/GqGe3eqqu1atwwMQm+ZPv8PYH+rT2WOelCDZW2oPBZsraG2fTIEVrJQ3xZr6x5aOVQs9z4LVvgqQGJ9TeOtkxWbOGt+fRCNtMu9rOROtGw+yLzbjwZm7gvz/K0rtQUmPdmGxq+YEnd7c5AdL1Cq3U4qh1f8lAEGx8QjeSZ5hTKIbtkIUXRbrD/SGcTGXAiaYTlwl0Q9dnCfC5HbBOakfRy0QEMxi6xX7kIjzSi+m35a+YTTbp4+Ni+OSEbONfBTYxOZiwDWnHSwzFfN/fmzvPCy67Cq1rCummXAZMR14csT3JdbKMFEdJV9wkkfuPAAMAi4PjbA0KZW5kc3RyZWFtDWVuZG9iag0yMTQ0IDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9MZW5ndGggNDU1OC9TdWJ0eXBlL1R5cGUxQz4+c3RyZWFtDQpIiWRVe1QTZxafYcgkvBJJOuommEwRakFegoAgUiAKiAgouOLqIiEJGoFEEx5Fa3VZqiChvk4tPdat7lbdPWpboPiqaMFVqy6iaGMxInE16knxUZc9d/Bmz+6EPds97v5zv3u/+X53fvc3935DEt5eBEmSbF5mRnre3OnZ+spafbVBq8nT1+hziwqrdZGLTVUao+eMilOQ3GRvLsifwWRc8+q7V7kCeCrhlIGHg94YlhJefCYCSG+1aW292bBqdTU7I2nWrAjeJsWM27gINjYmJpYdX+LSdaYyPVtYb6nWV1nY+UatybzWZNZU63VRbHplJbvYk8LCLtZb9OZaz+bP3FiDhdWwRWaNTl+lMVewpnL+mUGnryzTm1fpzexcc422okpj0a42GPVGNj2L1b+rrayxGGr1lfVspUGrN1r0OrZ6tdlUs2o1m2swmqrr1+p5p8ysMdezWVVl2RGsxqhjqzT1LE/SrF9l4GmaeZDByGr15moNv66pMRssOoO22mAyWqKiMwuLPElmsjp9OcErQRKEgCBEXkSAhFASRLAPEUURcQIimSQyJhMGgjARRDVB1BFEM0H8kSByPfItJAqIR6QfqSY3kPvIDvIiOewV5pXt9RElohKpHdQ/vaO9vxQECdIEFsEeQT+dQu+k++ifhIHCauFe4RfCe6IgUZHosMjpk+FzwmfA1883ybfZ92vfQb+lfh1+nH+h/1H/JwFlAW0BxwOeillxnLhFfF7iI9FKzklGJiyasGnC6QmPA6MCjYEnA8ek/tIIaZW0UXqKbenmRrpJ3oZ0Uy3eXNNYgbuJhg/xAoOpsFsAT2hk8VsGPIF7l9BNl4z7kIp8THPnGI+HnkiMQ+L19oLasU11++uknzsWOEHYC4xTthS2c/FM9mfLDwzIb59tv7pL2YtO5lbt+XXvyGVH4pesSvtAiccgmtmDyuFEmPS+KKl3SAiyjx4PAiMHCRLdxW3K/L0C2Ca8tLlD25YjctDrQJh7A4k2kezja0XzhShsnJGEAXL0uaqBNw1K3CeU7Z3dtujbpocinhi3onsEKPIeUNQ97jlzkf71+8UlymXCH47231EBhZRQjC9wXu2r+DrytJOCA/grJgIiy2EapMgh4SsIc0G4MocOxaAinIMxclR/h1N/xHDlf3EgdlK9PO4nCOqFORAjB3UeTJ0+jnNh5Fc4DVPkmFCOYRHjuKGW/zCaeJFurXhvWcl7Ip7RgaOXbPIX44yM0GAnu6GL6oYGBrrs2EW/BgPKQ53fO7S9dmxzHVnPCaj69cwtGs6MbRZk0OJNNq7fRnY54aST6oIXDMZ8gqVgBvMnUAoxMGMjlKIZzRuxFGconVZm1ArZEAqhVswOfnMbZmMohm6D7L8rxftruR39JPzBQQE3tozJodl349aFK7Ig173DIRS32LjzNvKEAw7z4jFcCeNo6nr0TGG7XJwalrcS/dNV0xYm5G/EFBGntbkJ+tMHT04+7BE96B2+AoFymBx2EydgeAKLIbuUPGs42A/rbdI/OeY5oM2Z75S9BCPcZ1r37rN+qhi+tiI2fm7xrPDiq4+bVAk0vtXkSoAQBfwCqO8h2KHpj/+dqlUoG+n5/ETPZTlMirqIEgxWR6Jii9JB37N2DjxR3OzRpqfm6tSbNrVY31fx5UGyjYTHdopL5MvLovG2WyNIgquYbIfkH23ThTgwETbDc0ErPvfoCkM2iLaRXzjgnJPi1owtZPAlPd/tfWuroPPoyUM9CtdfsiNRkFmUnFDQe2uLh+YbHz5PA4kCku6BCPwhIeQuSpf/csPqSlVzazuUCqBjPPGADTJt0nYHnHDMc8pGoYMLZEZOZcQlFmdERy258eDhuQGXSsaBAaYxIPxNRh/6KLCkABfiUgw7hkVQruJRWRdA8RImJT/DoNR8U46Wf4cAyO2/h5kQqpBx105oFuz2lM39w05CsIvidvIluFfO5kQ0hmEsCtG0ARtFLrqNbxcRtMFUCBaNfxlbQy3stEk7nTlO2Opc6JQNwkRYwQz19Qzb+xalpuQXJMTlnnMoZV05cJdZ0Flw0aKUnUoxleQkyjF0dC4EwaS/3YEpD8ouJxxSyk5fONh54Yrcmf8Io3kMkm8vQB+VzOZsYgbOt/df79bPVS/TZM8r/HJwvDMyPQpJjznTHHD8vmyUi+QqmcRCdWzSopuDf22/+8J1Nm2mUjaCbuxhULzHkQd+Ckj7HqZAM+xHagAn8/LglOmROAVZeziEXL/SfumIqrVZgAu2FMdMVchGsgo7rn+g+vekwTf/O21AceEM8h5Q9P+deW2Qj13aZhN5Jvk1SCP49oO8n/yGs1LcGW4y47ZmcVbabcUShrP2u620+Gu+HSvscP9+S520cWy67IfGiU9pO1QIoJcexArBKI1HxkoEwbTsSXc800qDH94X4BZaPNhihxZ7Yy3stksHXeBy5bhkdyAd7AxU0Xbbuqg5S5clqbCBjpjNwFMagm3PR1Wy0w+W98XtU/Ijc6bvUOefb8tvlJ9dcVh5sHRWS64CP6Zd/OHF9NCNjW+rZHfTVuqQUOJiWgzC9XbOYSePu7glLmoskdvKQEQNSuwYpsC16Mvfk1rUAYGz+BbK5mUiIHOfKoJG3wZ1HAYq8B013wuJEHYTWEh9drf4rc9U4pEWO3fWTg66OL4pBydCMw0No6CA38J6lIAXrlVh8zihmTSor4TwP569qK7PUWEsLd4+Xj3U/Yvvag2K4srCEpzbuBJYp+lxl3F7NA6oyEOBIDo+AgTCQ4mvIoqIYjRRygdrkhklbMEaEgWCYkpdQYNvMe7WIpKs4y4+1kckqAGCDmBDHJVBnELj4uP0eHrLPT2Y2sqPWD01Xbdvn9vnfPf7zjlXNSdbuVBSAqBE5iSFA4v8mqT8mflkE7TS/99xggQdEnbQ/G8kZQUFFZwrZZmhToIqSUuRrbbzdXyea4jukuyNV02wjvF1qNsaYcRReox4nQIYAyEtEAQxT26n44BKg5OBKQd/24zj9GhGRjl0KaYCj7Gw4qbjqO2cgXDr9+GSRQ3T+4UbtLzkdGUG4yXFGy4FE7Ue7jW7Mi0enU7PTp06w3wiciWXweKxzwnrSbEzXJlCsFLJJufMjwz96Nsfxa+CF3Hob4uhRBh5+n6v6AO7S4CFmuVu8NZKDrnKwa+TdA65mxjzgdKt6aCb3K0pVbodrkzUMd6KZqUXP5J7NTQiP0tAj8wsN8MIImKbQ/69g89o0zkYv1JuLuXkQUqz5pErczzjdyutRZziLbdqAskupJ8XNU55g9OzBlwCpgGHiWChiyMmpEEa0h0tdNFzTBOdOjBeIxBjIfYaBqERjbF0i8XYWHpoFN2CsEpQoe4asdqNmBVWE4GL2yT4HRWQqTfwNRGvuqmRyp7WLYyKSs8Y/rkBU0kVZH1RglK39XOnJ8TIggClUMB11bwTP3Lah+EGPKkIghMuQh67u3tm/HZDeXze1MOrvZ6wd+u2tH/aXNicWx+9y6uUu3Wg5odb/sCir6G/iF2kVXew2mOOt5zgcJDervFtcrtcKsD4T9GzCQP1qEMhhSrpUOCyga018F30Dyx3jL8xOOd1HDDqDHiL4xkxRD+F0rMOxtRDMAxHVovskMi3IXcI2c47/j3SEel+46KAHaLKYpcPJe5CCqaQyOFDjYLSaIIN/apUSXLdKfuRKoe5SZLBUJuUgN6ojWsCrShn0CMOZ4NHFEyHhD4nJIqkHmeMSjhtsfyMz5FdZDia8cdwifJcU8RwsfxcY2RQ9t9MDQygz7SUgPdos9wLjLjxl2f+/Lxngeq3GL8TA4hcZBJO5DIyjOwfDadREIMUWuAB45fDRKIZEXGC0ktjdYdVssNR8tmf1sEBDJdhD2ZDjwY1DI4okzRopV3nVJmrKWKffMVzn06+IikLmPy2fFojKZUmOZRTZiqnNT7x1ProbdpqB3UQG+18j+wHiULGwngc+M6CPecb/rXn/HbxwvbLn//tgBeIuEDYWPBJcaE+p+TLWgNUcvBq4N5QN/SjM9HvM4OdtW45u69F/+/6/JgU09aQ9Qa+JyI3ci0O8je2Zd1raTh47p/inKoPThyuLNtWIfr8Kd82vYG+DzMs2u/t0Ojg6+T3YZcQuHQ0euGghff+03viPjB45VRIkMjnKUbcJdgpszSVcqk1rZazeghvB18IhMDJoMWIN5PWzl5jKII9UexFYB7V1HWUwCMBfPNDzqkdQLQJfTAMQ2/iKxAOuhs20FYaItmUgvQFE/U4YPE95+OaXvBtti5L3mn4hYPVDmikLCfvJ9ijsLKI1S+btidNj+FTqG0KxMAbqIWIH64evFBlKGV8Xryd6oRihC+Eh8cfUGsw6GRIQNCiMZTqXpl/j5IOOQhTbRCo+ginyM2JEC0k5qWviNejZp7k2GyQhzIYUjYHpmGKHkcEkGUY5e+ydmQwUQ9end8B229QfMEo3Nh69vsu/c365ElbqB5fpnYl1QY62ycW7QPa0wc6u5z6k21UC7Me2Pl1xZdFn1XQnl3n+J6yjz/c/LE+dP6iCYapkW/c5nyy8b1GGGaThYbpL0jxjUSV8WCTgANXPOp5cKILPJ7WhowLyjLiQAPvhA3yXMHE+BsxxdyFlbOOJOvxrbdxLEE8og1fhdArjUcbCI4VDL0WmdBT5G1zYvZ9t1Ft8zRlMHBprx4mtN2Cye4WK12F2eOyHXbYPS/r7GBlPaea+q7ULpkuYp8deqg/yGrHYTNi/zhjjVgEh2iXFYHsyi2geeTRZPdsokDLo5gd5gtRI+3qLKbbXH4/T0OoXC5EKVdZWsH69/ILSkrzxVhuU0VFcbneVld71+DaO9BtFtG/5irLizVhHpOuQzzuVxWNOdAJWTBTg4xhAZo1simKc/uh6rLfwJVJrkGxGpKKI0WUr/78hvF1alw2dvxYz8PWvQsSRbxLQ046e6bzx93zUtSh7Ms9TfiHMSk1e+5yscE86+B0/ZuzVs1aZihifEeriesHKt+idePEt70EqJhZq1LeF8nO2kl22T8LAmwOz2rYIeDY2zgYoiH6NgyGsRAcSe1RNEZH4mAMFh060LY0d3W1xKMWh8TFh4fHNcMQUiwd4iCVVlID65dsx69LVjEqWYId9pSyl8iV8b3NBOEvVu7XWgffK+9X94xCTyjiXqI33GtnilGe9ytaw8OEWoqDUKu38031BFkug6Gn2uEPooML2zx7yZJoL/LjGHgQUMP7U+JRe4wDcu2JDqpUXUdhgoB+ZfczwEv/GLha8P1pQlVUpYFvm1w5fnu9/5lvy0+fv2hO2koHJ9AWjqtGph9vXDxytH3NzXVUyezrbhYk+SfH5afFJx1o3UQeWeko6Gnz6CVaJrsiKaGERbxxBztZ8N/X3xGv2JYSSb84boDrfTYjR/18lkrJF3tulQtUUNDKQucnGJPf/bpBhL4o7OHQ85spMOz6xa8uV4uUgtZNlCiaklvJbttyeSWVq1yyDFfL1QglTq02AXKcJpjBXKVc002cHVtyD5qfUKXa7VrOH3Otp7cjSLuKSX13gGzShLKR/YNBNAhhMIkM7zK+6ZEcRlXqsRKmcTCfcGokTpqrzLDBot0mb+Kt23R9DIyQDUbMpuMVwwz4KyTABs3/pMr2W/S352+B756svxnZhG8AWzudrHwKv5OvxZX9jC8XmvyjQngD2LvAil8VYrM20GZttu+Jf6ZlGLPmVldUZUhXVU2aUC0vXGDLLryhZd78zvnS19dt+LAJWBZ6/oj5zvxmL+PZ78yXgT2P739+nBYNYNs5Y98Oub3sdlnuNvKg3gb7b+/vzNjE+RSALQbG7h8dzN+bWH503P7TwQYUcvv+k/Hy959AE3+Katyyfvfu9u1376xvaWjY2GjIge3c+wbY1YHZ2fvjvegxtti6iDg5YHdnzflb8qAOEtDO38zYxPl+yIIs/S72s4IZ2MppEv1ZcftvBbBDtPhHHOOlH/HM37kXi373AkLP3167d//2BLI8vntE7wY2ET2API/oaKCMx2+v316sfFVzfsbN+Z01ne370knvJ/15OZ39GtcD7h8HRH58FgUIMADCnoL9DQplbmRzdHJlYW0NZW5kb2JqDTIxNDUgMCBvYmoNPDwvRmlsdGVyL0ZsYXRlRGVjb2RlL0xlbmd0aCAyNDg2L1N1YnR5cGUvVHlwZTFDPj5zdHJlYW0NCkiJNFQLVBNnFp4hmRlkawSyw1kzdGbER1xQeddHfRE8PnCxKCooyDZKhAghITyCiCgrVCGAiEdFcI9oMIhofSAWMKgF8bGyrlYU3VLZ2tpDlW732Hbv2D+es//o9uTkn/9x73e/+/33vySh9CBIkpyQGJe4KDEmaNnq6MVWfVZGpjFriTk33bgpPjd1+iKDySgbCRJHSv5K6f33WJSEqn+t+HUOBY3jYNDnur+XzZdQkGRza0e02bLVakxLzxVDZ8/6YBoeZ4e9HSPFaWJYSEhYVKp5o0GM35qTazDliMuyNpmtFrNVn2tInSFGZWaKq2TnHHGVIcdgzZc3MSnxN1biO1qiMUfUi1ZDmhGjWA2pYq5Vn2ow6a0ZonkzxsSbWfpcozlLnymu3moxbNZvMojR/w+Et2fIOQUvjpfPxAgx1bCZIEicI+FJEGNJgiUIDUEEEMQUkphOEMEEEUoQ4QQR6UHoCGKRB7GMIGKVRLyCWEcSAVhBIpaII/KI/UQbcZv0JG3keXLYg/GY5LHW45zCRxGmKFWcVkYodyi/oWZTZVQD/Qc6lb7ATGY2MNc9Wc90T4fnaIS9WxrtJvE4qVthV0p7Xse599BQjfpYNB/2UzBCIxFdY0FeuGsZN53ydg7zEV7T0lVWniF5pUJtKnTUDsFSs438CkIVsMsPglEoCmZaQc+O0N1SHoXW0NhOaoOJ2GSK4ispkO2ln0MwBT5oCpp4n8Gndgghv5D9CyCExf4hT+h5KILqpf8D0TjKj5ACHqQdihXQr0QeUAwejKquMR9CYQy0wzi7zReGIUj9GCaCk1WPQBy0U6idgSA/KQQtZ1CLO4RCY+AaCoUICH0JY7B7CYyFqeAJqUCRF2AaGCFM0SOHVzY/XQMM93Lg7NMrwmcPjnw7rIHoxfAh2oB1oeahPyLvZ5Hgfcd19MpFPrZsiS2dNxZssaVyyRnOjh3CqDSJ7etIXhm/IXlV3MeXbl7vuHxdUF3DbCeArzTTRu57TSqkkNc6Fq2gkeWNjoIJ9CWYQIGVbkf4E0W7A+AoOwBlA6iMUpXaYTymx4IA48nbEKGQXFI3C+PdxW90UjGMR0/xaR2wqA4ERoXDNGLbEGx7S7btfGdb9EaHM2+Ew9juMIQwqgg7+EtdNrIPG0EW+LNSF4rAgEvBn1ENNOa/1tlwMG84Dd4K6ZlM1tutLafRVklLoSiM5i3p99LQ4NZT8D6tOo3j1oIPxICPzBE2wwcKsEIt+4oe+FuF64Zw5dLxv/drvsi8sfIif2HVCvtSDh2UOdHSOCXEfMu0nLYXNAnHCg+aLZq80ryiQt5kzrAbOJkLOMALokFF9mPkfJijgDxwsDCG/hk5KFhMIzX0Ug+dHQ+eaO5m3o0/x59ZG1u5gkPt7wLcUg7TLZ17C53C8e0NWRaNaXtG9ja+MCutegsXTmPFpC7wJ+EjWa4GnKm7GvmDzt0FEfhgIa0aKAFWumMjr4IOdgKvkEZlOXh3OJ1WnZSXyVtsySUZXOrHB87mC9uaKztbNVI40rnDmZnVc/8Rxyf1PN35gHs0dKSnR7jeW/HkkUYuXVnfWumpQnoug3E0CnAXI14qptACGjbKRRFFq0pGYvNh98NXP/i24BsNh0B1kVTlt6upvOmEBkqYWzW9Ce38mY1LDiVwInovDY0rEkAoprovOrqONZUW1vH1BeXZeZodTGzZnN0r8zyXWpMTF2rUrqD7Sc8HPzt5s51XF1VkV1n2ZXtuhxxW7UqrNOVn8NmFlm0mbmOOs+3hq7refYJKfiqXQUk2w1z8ExVSJQyy8LuS6YPIi0MR0xGFQlDgd4iEGeD94hH4HhKQuJ9K/iR7YwI3s+Kb2/0Hvhy65kjZgKF+CXoJD17BXBvOKRjCQKt24ayK/V7rkBYVMV0ZhiOrODTVgJ/ZWEHtQl5tSISJ/e2fft7MV9HqorlMKaRjqtYKy45cPneHdauF0+0a6blVDR7Dd/fOXI9j/AyaZ7+8JJswfBz4K6Ra2MpW3tv5QN/n2afXtS7iUFgYGosCUdC/J+DHs/AGBDYJyP8AlZyyJWW50XWTr2yiKp6xfTVNl/u5O39NXF0tyHUyGbebuXIhaCEAtAqpCMvgqr6S2cZfMK1rSOZWr8xKLBDKoRJpcelpwUm32FvrnHzToVN1Tu7OJ7P+LCAnaHHH+/JdBfRglB4/0MrJ0yrYjmNMAgIR4OXrwv7iu//v/dVDLqmGddfg9TGmZ8/g48GSeWt5dOztWu1yVrQddPCOg876E9wpx18y9gs1BeXrbJq3BveZK7V9xjb+rGl9Qwr3pzjzR9nCTZO+eSm3bL08L6fVQ0+Yt+n9V4Qxvt3YZwq+lo5uTAxO0K1VJ+tP8scPOTD4w9IFCQI6gffvMp32O+bz/EVTcn0SF6XPjDHJSI+/RrgJlfwAX4+STiz/fNxUoVGqZ1FwJGLQVKT9F/LCtRz4AhiYDIGR4IXChcpA9oyjeMsh4bChKmmTZsVu7ayZleDd11cz8k9ehQLzIfInGPh++k++fTh0OMxQD4EezrMt9lP1WN06R8NJ7uHegISEPUixIDu74dh2obC5+lKrRj2KcArsmw+xm62KSWnszO/mYGon8OAjqIdul93K+JzvMya1LOFiNmXFW+QURh/h+7FjOWpsLTbfG1iJc+p7N36Tfy3z/PB3oCzj1efwRVqrlteY4ovWjMd+917grlryIzz7nmzBHTsa/BRSvMSyL9Jjzms5RCAyBfksb0u4mS+07hwu+nS3p3NPS5lRY1hRYk5e3XC1hP+ffgtXsv5mW/Yu/av04cNTV++U37Zqya4D3yt/H/3N8Epqw87JK3dvLI+eAQyR5MbvXKZlP6SB0fUY6MCC729+TBQFZj9jtt8ijXW/NVmNfnPe+13CJrwhsttvS6ZcwZrDrVull63vn7RC/jsze2dVRWedtE/brHPywJqVERhhwGhg+M7wQ6Vc6CDQk3Kg6Beu+FEl9mMCMFcuZRfeUdib11gil1uXX5ElHd6+aYv89ytAmSvsUR3Ry+PlYldsb9gnfWH/mtOL5YGZtMIEXBHtKvteX844/ccE5h/NwPD7Lcxm9VvO6rscuIxT/V3/2+b3UtbvImyfvzt/+e3M+t2e7bf996WsfAq/Xb+zmZT9tC4Xmv4jXnjDj2yQbiY2vd+HtL4fYv1tzPbd988E1ui6ipoo6aKSvv5CeeGC3+zswhvaFy/uXCz9XWX+y+/sG4EFwdSfTlN/B0xl+75k4p/YyexQ/gwOED9rCed3Nq7v6tzf2ebx8HxXn8HD28PD92ODyI/7ogABBgC0eRZSDQplbmRzdHJlYW0NZW5kb2JqDTIxNDYgMCBvYmoNPDwvRmlsdGVyL0ZsYXRlRGVjb2RlL0xlbmd0aCAxMjE4L1N1YnR5cGUvVHlwZTFDPj5zdHJlYW0NCkiJPJJ/bFNVFMffa9fXgltlezwyuvF6Q5QEGFBAYWsW7Aq6ilB+rA6zxcJb+9Y+1rXltevW4RA3f+wHE7bxq3TMgdtQWCYWYwQlogmRBYxkkck0xkgiwUAy1Oh54/QPX4nx3uTe7zn3nJPPPffSVJaGommaPL+j0rm9cqlDDMTEqOQRnGKDuMlVEfUuswfq1gczMWalgFbYLKUwm8MSbH70y6NdOph6Ev7MvVWY9WMepaHpu3+tD4XjsuTzR8nKkhJLEVllsawiZd5QjUgq4pGoWB8hLwY9ITkckoWo6F1OygIBsj2TECHbxYgoxzLO/zGIFCECicqCV6wX5DoSqlXPJK8YqBFlnyiTDXKDp65eiHj8UlAMkrLyIiI2eQINESkmBuIkIHnEYET0kqhfDjX4/GSTFAxF42FRFTWyIMdJeX2No4gIQS+pF+JEpZRFn6RyymqSFCQeUY4K6r67QZYiXskTlULByPIVL1S4MkWeIV6xllIHTRmpXIql5lIcZaIKqLVUObWVqqBy1OZSTlXWUmO0nu6iv9GUa3Zrjml+1i7WumF+12XlwWVaXZ+6rO3KUtpntqbbGXgXr3K4Dvp0cI9Bglc4yBjpXn2acT/WsA5Vm1G+5DIKM5aRGA+ABEX0GbihPQMSBzegCG8wxhYwKPvAQA+AEzTg1A7ANIepSRtYwTo5CSlI2SbRilabDVO8GjOLe5gcSaWS4UU87tMv2hv2eveOPOSNXUCUV9Q6Q2CfVstAteLnPtT/NJwY/mCgaUtlS9jn43EO5umsxfLKxSalFgi2M72DpweTSdD8k3/lyti1+6a/hTvoXLotIki8JLRu7bQbMoBQBYZIDPaAIW8A7GiF0gfgwDJwslPsJOxQWrnJxOmPzp2IbyvZE3fxYTQw7NQl5tJg/PlVbbFdjS19J9vMbSffHr5gQjuDz91ywbOwbOomrObZiz+Erq89wXfr2U9v9Q99e9UEuVUTaF/vavbX8rVS08sdZQbjYAzywaTYGukkEJgNpVqwwACnku3XdeN+Bo+iiYNDmA92yB8H02bFhm4Go2mrLsOPBth4FUzbYnD98RWcaAP7H+BiX2WrR6GUW3bgwmp4qQB8ozAHguYpPewtnsA1PFuPRWts6ELrd1UPzWzyqy9OjSbN3ahjdkYaws2vHzzSxrPVrUff6e9838DWd8A17m7/0FjquGyxNMt+776hu7yRdKntexqq6Isq9kW4z0EpVGEpk/446z+lvt0GXBGbcTfmtSifsWEg8+BNBpbPuHVYxbDnbekxXQdjU8YypnHHYEwphpwJMLzVmDcODvb2+DxwKMXfQ46dYe+N6kcGj5463tfZcZhnb4NOz947GKrr3lOAuYIHKbN3M+aM640wP/Ouv6kf5j1wTINDq0ThNAeWJuDQhzvDuFCdlgHkwAc7R2AhLORxdB4sOHLuwieH63ABFrbW1XjeOAeFvPE1lagAluASKM47qwKdP6sCwefMxPmh6ycSne1JHkqD+spq/8ZGcwfD3vwV7XpjS2LGncAtCTAnGBjuvdOb/rpP39w/4+7H3ccMqme6N/37sVlgmg2OJ0DTc+hQX09PT3Y2kDM9GZFzINuo9M9VtNy/AgwAxbdX+w0KZW5kc3RyZWFtDWVuZG9iag0yMTQ3IDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9MZW5ndGggNjg3L1N1YnR5cGUvVHlwZTFDPj5zdHJlYW0NCkiJPFBvSBNhHL5T70yTRer2oYm+jihXy8yENMiahs5YJpv1IXB0u3vdTm+3cXebWyT7EKRmFC1NTCM/KBVEBH2wRCkSI+hLJUL0JYosg0Iy2PvOd2E3iX4fnt/z/P7x8KOpnCyKpumyZof7dLtrrwNKEaiJPNcKw9DZ7taEfQ1Ci5YZKcdmGhfnxAuycEmBkRwm8vqfdZ5BX7eh1e0zqaOFVBZNr200BkMxRfT5NXCgrrbWpmNd1SYetIHqqqpqYBeCXgjcMVWDARW0yHxQCQUVToNCJbBLEnBlllXggipUIpnif09AVAEHNIUTYIBTukGwU++JApS8UPFBBRxXwnx3gFN5vyhDGdibbQBGeSmsihEoxYAk8lBWoQA0vxIM+/zAKcpBLRaCOvEqnBIDzQGvwwY4WQABLgZ0lwr0ibpPRV8SZcBDReP03BVWRFUQeU0Mymrl/iZ3e+ZIDRBgJ6XHSeoU1UadpRj9s5SD8lLT1AbdgN8NzuEfc/SSCfen2tL9LLpKFoykHt1g0ApLAHluRBmRTuSmWc8mR/VE1yx+ZswwklEGNDIRSXl66DiayY6bkIVFtpSHIRbWgNFEBB/6aUU5hXH8kliRtejR5sQCussU3Vu8Nb34yfzgYVjqvST2XShzknlGb75G88y12zfnJnYsn5m12ltlV0fpAFv0ZmyRISX60eXeJPqYpIeRBSWQJXsYQSOpWDmGdqI2xOh4Alkr3hILcRKG7CaNpchi+vwUFf9euu9pqukgpnKH/8WrUgMeIydQHv7QQzvxWjZ+jEeNZA9LmtMsM8B6MMuQXey39BATil4854j2XI+aVZLPXJ6c6ps0J5/c+TJbZjg/nvKMk65RdGSQReNDv4bS70dz/xVHtqCpxGoi/X0kL5mPLFuvFBj+CjAAHwQ80w0KZW5kc3RyZWFtDWVuZG9iag0xIDAgb2JqDTw8L0Fubm90cyA4MSAwIFIvQ29udGVudHMgMiAwIFIvQ3JvcEJveFswLjAgMC4wIDYxMi4wIDc5Mi4wXS9NZWRpYUJveFswLjAgMC4wIDYxMi4wIDc5Mi4wXS9QYXJlbnQgMjEyNCAwIFIvUmVzb3VyY2VzPDwvRm9udDw8L1QxXzAgMjE2NCAwIFIvVDFfMSAyMTY2IDAgUi9UMV8yIDIxNTggMCBSPj4vUHJvY1NldFsvUERGL1RleHRdPj4vUm90YXRlIDAvU3RydWN0UGFyZW50cyA1Ny9UYWJzL1MvVHlwZS9QYWdlPj4NZW5kb2JqDTIgMCBvYmoNPDwvRmlsdGVyL0ZsYXRlRGVjb2RlL0xlbmd0aCA1MDk5Pj5zdHJlYW0NCkiJ7JdZj9vIEcffBeQ79KMMjOm+j2CxgNfrBPuwG8eehzwMEHAkakyvRhpTlB1/+xSP5khkXxTiZIIdLDDy9lFdrK761b9fva7qcpOvavTDD69+ffPLzwijH3/86ec3aIFR89/7v8I/SrR49b7Y5nX5pXiz3+6r8r6oq3KFqnLxGZF2IUFMZEogJSRa3be77xeMy6yZ3i4+LP6+ePsrmH01OZEMJ2YCfUWnFjXJZGMRJgabGL0kGE4ip1Z/ul68erPf1cXu0S49/5LqbkHaL7km/2yMX28Wqp1QiMEh3GQYw+j9Yvlbfl+gF9ef2qWkW7q8We72Nfq2P1aorvJ1gXaw6uZFs6z14O2149PYowul48MgOlTQ80/j8K3BcHFr0zMv7DyZBpON7ocYnpnz+3FFUj6a9ARQi+w8hm/vH7b7b0WFyjVYKjflCrJnv0O74/0tjN4s3/7y2yh641PV+YeOp/XZdOt2/tCeYVcYu6LxmHYeky4Z4IcTDbmpGM+0pK3PN5TKoEdkKI4mYyhuEoeQzBiDqmKxaZxo0oU0uXYSJdMeaRDHGVYKNtJMKN4e+S6vakT+3GYbnOirEHKaR9My6QqPdZ4Mlyt4szJWfEOVTOzB94VsuRKFMHfN2Qgoefb1r3eHr5AM9cfiUKDPx+LQXN8BbfbNWHlA34q8yhyVuIJjy92xWJ9k0NQXfnr9/VXo9iswan455Cw4Io3OOGv90QFrQ1kti8CqoVIoVDacc71eLN/D11VfinX7XZtjfawKdDwU9rNsYtKMcNJvyZpJknG4neeB7zrguUflyB2SCcn7vboIg5/ox6amoVWd/oWi4ED+JvNEW7EEw0SzpYWIr1CNp5c0tiA7FWHn5U8w8D5W/hRPy783aL2baZC4DXJwkGeUm/Nup2PdjtJIu6PsrDkJrjI6+E51PLCUewIrwG3jCCw1CWEQ0zD09iZxTbInHfYamqYEdSKMVLR1Uu0GOenwCT+C6wxi39BTadPiM1BQdMheF4EVBwLTGILZkKvLTWAVSUcw+kMxOCBTaZBWjDZ3RFttp5tSjlQUO5e9nu0fvNv5ND3Hlyzc6Rnp9AJDnpFong21trwLrFKOPLve1/kW7fa7qtgcd+v8dlugVVWsy/qQjZNt+Xq9RttyVxyQzq+Qvr1C+W6N9LpZR0GVcvUEkua/2HSZdjddauOg7yJpHGmRUsqZ3YwH2iPXc415WyM41uTQvM7IY52RM38POo1ESv/h3G/rNBBJtly9EXpZShTGOcNltJVxdSYQph0MqKCiDYzrUAOj0j4hTMCE8RKjzv8FGMg3NbyG8vWn46G+h52HFgiJNPlwvK2rJswNUpC+Q5tqf9/9j2rWwgOOQZDnl6XAzrI02jZKE65KQSJVyckFOlM43q3WIL1ECQtHtfTVyekFwlXwSHmKgEQchySlrIRLIvb2xhFJsqc8ZZoSjkkS6WidChOpUyiyBKUpsbNQcWaghCWWmewVAMGoqwICVfCSwKuhSWYUsHySyHZ5Hlo/pCjJpOFnBd/sYhkGWdyNrouH/QHqup3gGcj6fqIRrJ2bRtjqrT+W3UKaMcn6wW9FXl31o0bYllnuVtvjutzd9YaNshW//1JUD/m3hjPtnATBYQ/IHx62Jajlbs8AiZYo3Qla2sHcRtHYMx+qsnca1g2UaPzrB6Wyn93wrRl7CfcjlHi8hhPvgIK9O+35f9lX98hw/vIfV90Pull+eHfzovk/0gzC2e2/YPzd+5s/3bwYo5LJ76HyPTnAnPDEWPd7Cc7D+JS+56mlHbgxj3TSAZ7emIA0nWnMQZ0em4TOFzVSRagptZ9yp5FIIZw0XltngUixpRxKsaVlQhTGSaNIFJaKhmEpjEwQNYoFWCngydaLGoIDNob8XN4GVolH7aOx5cz74lBUX5rKhqLdHOtjVaDjoRgXLITwOxTs88BFRFPSQTTIGGUviODbMNHUUOM406AOT/9Wd4uOHkKaVrIQDBOIaFQVi423+HSYkUKrCxShcuDBGuy9m2dQe16T8LVaXyAxNYnAUp9TQnAF7dX6TnU8sJp5AmsxOQ5sCiq1/y05iWuSPc97Mimo4/TW8Qelfszf9jTIWQ+EgaAJilW7n5Y9hcEUZzSKYT0k63LlX2XwM4b/3wY8N0miwnIVxrChKRiGvxiTNAwbHy0GavLW2DxqGgcurMHeu5kGPfqXtw5SQWZi2MgIho1yYbj3PQXDxtffBmyOApuCTRNQv+O4ptiDFPFwOCWq4/yGm4yCmGCaSmL4UVAyERITHBTEcFXSCmIUsjJkLMnIUMzr4BbxuEVCxlswb467dX677VgsMq2ttYd91caiGWeZlnbLfoM6irBh6aoq1mXdrySQjN1wA/tuqVJ26edjvi03ZdH5yjOBTT9zKFe/t4P0xHK+W/djlNhmssnvy+23/jSq7WnbIv9S9IsNs1a/5nfFoV8LdxTwzL2/zn8vuhi8ZCaT0LxfEqitZuq2ADMFev1QlVtErhDFlIwaGiQ1sWc+KeT/wQfOHhZCin4uWD/ysZnxQdgQvA73QIJVpGUxdoHQJ1j7exYRF1n0PEagaTF+wduBEBzpWoQQf4MYhyWpQRDqNziOSppB5uk4KSGZ5BDh8Y5DxFkrnzYaOCZB8hMiA42GG56k+QkZsndZhJbpOar/WfY/iQHfXZqo7i8izKM4QfhzQ9OFP6EkglGCLxDqhDqA0Vu0/s216CBGj1Fwcb72J5THMEqFQ/1b91PUP6EyIv/H0U2CJ1VeGk+Cm2bQ0fRaGqdEdpLo1MRpzHCi/m+ImqL/GQlhWfE0/c+oS/9vglvYs/7/z+r/fFMXFfo1r1YfEev1/xVqPO5fBn9b1ftbWNLPjdse5Znm1vsn1Rm+Y3dh3NldGi1lu8sm0l2YCLcCrswl+pdJfyuQ5CKLDv71vU/jSxQ107FWwBwi3iJ3HJYk5HLsNziOSppBl+YHhieFZJJOnMYZzllYUXPJkxQ15yF0w2+SouZD9i7vQsvkDEXd2Fk+q+onMeC7T+XgHqSOsjdE8F2Ee1ynqGqmZ6hqbiIoFfISDSwc0LAWe//mWnRQo/9gcPECVS1oDKWCuVR1736SqhY8rKon0U0CqBB+Io+Dm2bQ0fhaIqdEdpLoQsWJLHSqqgaqpqhqYUJoJpAnjMTRLIe0XX4MLSMuNF/v63yL1sXD/lDWh1YGVo/iulPIhxGilxl6vV6jbbkDjUpwfgV/1p2E7GUQgxY7HPG/xBrOhBT9QOiZIamTc5za5wPBHyOckywCJWizM/EhuR9IhM+25qhAS194qIi5LJIyxiLpUJJDzdOZ9S6139hpMNKMuQRnA4+ESEySR+E4OxSJqDmodhUXc4oGiMEMBWLEgaGGTF2WoWV8hpZ7lnFPYsB3lcKBN2DGCd7KCN6UTJBxTHePtTQZp1SEmFhd8n5VDlD0Fq1/cy06aNGTE+v4829qUOMYOjVxyDjrfpKM0zQi48bRTQKnZl4KT4KbZtDR41oSp0R2kuhaxFGsZaKMa3iqdBzKWoWgLHXWNLsolfWQtstPoWVmBpXHwg21mH5m81Nis8FuNuNHNn+KsNmQFDbL7tmWxmbjo8dAUn7+ZksjqXHgw1qU8iKLHo3MWxejD0GHQRFjs5EuNvfuJ7HZ+DrfgNJRdJNQavwKeRLcNIMelZwU2XGiUxyXyRSTVDYDVhXkfYTNFAcF879JL7cdN3IjDD+B34EXe7EBnAbJ4nHvvEm82EX2AIxzEWBueiSOR7GkVnRYe94+xdZh1Opik2LgMWYgqP9mV/9f1V9KYW8+iggxpQJU0/2xXbbrWWDzQ2hu8+/3Pz+z5WIdmGeLHVt12I/3L+36+Bkuk+8Z3iBs8UO8fvH8HLYhSrXrOduFwBbr3X57mGFxHt+td1EbXOMvq+z/1XEkV2THsRzOHUdMNxzJdaY7GH4nx5KbdGdQ8m41YvM8t0F+/64rucs0BckpVs7w8fvAk4Knxa6LUSYmEhQXVGLkHSHzEAsY9Mcxu4hdfteVQk2hK/ll15VTIhen2gaOKhZVjGqOGkKpXuT3P8N2076u8OI0y8gtQbOnWc4gJEwCIel4o/E9gx6maSv7KmTeNeH7s6CwNYLETImCWD0wFauPFD5HkiTMD1qSRSkCQBIAnAVvi1ImKAlBJxpTVpSRSSXkoZJqANV1577wBRoaXNCirwv2Fin19Rw4md02b5T0McSfQbG94N9ewuwL69bhh4zB5VVKiv9iEJU9dsJjFsHb8fgzlZOkHOakxPUPyQd0BXX1dOIwpzrE3wp8THh4X2eOaeHDZrN8ZfuOrcO3PZ4BF651kykI8FFBNI7iO8oBYlAO8upkMaCgcwPki6HRz2pQjIeAqaXFmz8f1vNhFcanuNgYkBZcReLh8U8heg77x8ejXSp05XPfH8HHCcCtxYuRYBxj8QR/tNs9kz/0jRtvm6xfKrZgW7GxGchhSNZ4q3yLBCK5nARPzzcl+CNZJUu/h3MJ4vS+evxPYblkhx1rn7rDnr12hy2bh023W+zZbvYS5oflMVnu2284stqnxXKxf2XPXRxZOM9eQ7ud6hPgJgaxdDFDnyYxTKlcQMNXrf0paha3EzWmRwjMAHgAKOVHDflJXP+Qvp5A6PYxVQKh69IJnDJmULl/XlaFZdjtjuHiO/leo4HYT11sNL3FIddjlEpVyejiKmmqSrfXT1TJFFQpYXCiSrjouVGVjrVh6OAYxhr2jz6A9c4fmzy0sxf83nr/0jCMcq+4Ux0ecYhjimtx21otvobwBdv5hZUTPHgp/sSKxymOEyAaFu/BnsKsXYXo2v7Pwy7EW7N2NjusDst2H+bsO8H5e/52RNY9X50Ke+7ju3b9yuYt/j9sF+vPeJQzs5uwXXTz99SdV4fdns261WYZ9oF97LYr5pX+64d+YQztPN4mxtCn7lvY4eGW3dcpstWF7OuxLziW3LoY/nDs6xPa7ZSOp5NEFEHzxNP/0mYHpOaJ9hydgL07Do+3Vopny7ZmTSS/sxgG8DvFiNR38iioip1SD1Mf9Q1F3NH1a+CgFkWhVeu02HUtysSImRdVSioxco+2+WSi3VtjS8Vf4fr1Mtq2YL3UPuV9i6MqagllTt5/mtAxnPY+eu/s/Y/hKed9IzLe5+omm5RY1iQsC7p/9RWCkGSAxzcv7oXAqBwEZsK3t0Up8q4hvHsSHBWlTNAmYCgpydhPBUuL8cU0xF/WiywOlk+NAhHdcdoABcymdASNg4ALDr9ex00aByuncRAW+n3hPvfahHujoNY1glSD7nEQFt+98vfiYHUOBzvh3tuiFLnXEu49C94WpUzQ0TgUlWTsJ5/HwfFyHPC9WpefDk5QOEgQjcDpMExG8ykdSeJg8ERnHD5ssjg4SOCA7SUumvcnI0c49yx2dzJyRIuOcakuFzmTY8ARlgU+zohFdnWEXc9id+ci5wkxcHGBqklGnufN70Xe/IA7nClORl6mvB/ZHiajMKUD9CjA6fU2Cl4z1vcqY/2qYORJx/aCdcHIU4E4IlAXi7zNMeAnbFsVizxlXU5nxRJB4DzJQk0wAi6yMACXxTAUBiPgQNMgG4FDYhiMnqd0FEkDiDcafjmswzQOwPU0DlXBCDjp3qNgTTACTkVixKEuFgF3GRzQqGn31sQiNElasCYWgRApHKqCEQiZx0FAOQ5lwQiEonAADY0eBaPPUzqaxMEouMJhmZkOIEwCB8CaiopgBILKFiexe4MRCKpJo1hZHCD0fI4DSdhWwTgkFllWEpY9i90bjUBKQszwxlVFI5CQt79UefsrgIaXRiOQOuV+gz10GI1epnQM6X7Nr9aCw+fMWgDSZtxfk41AJkwrKrMRSKo3HymoSkcAPIcBTDi3Jh0BUO4FOjCWCUISh6p0BCrPA+hiHkrTERgaCNW401B5S0eLKR1LAiHsWzp6CJt9jghw00TUxSNIGFjUxiNFhYueiMqApESOCDVh4KqApCgDA50ZywRVioi6gKR0nghlyokoDEjKUkQo4xvv3E1A+s+UjiOJuMpHv8+yPCif4EG546p4dz7SVMA4id2djzTVplHMVOYjLXMYaMK1WpnG1+QjTTj2LHZ3PtKaELNllRiZR5u897XNe18r18jidKQdbX3XOOtu0tGXKR1PW9+Zi/d/6/7Med/wjPer0pFJWBZq05GhGvORgbp0ZCAHgZnwbVU6MpR3j4J16ciYBAxV2cjYPA3GFdNQmo2MJ3GwvOGjbLSc0LGcxCFmpjMOfw+zHA5WTONQF41swr1QG40sFSt6HCqjkVU5HOyEe6uikaXcexKsikbW0jjUBSPr8jhYX45DYTByFxu7Ew7xt+A4GXDEKdywosKnbt8u2XLRPi2Wi/0re+627DW024Z9mM/x83XY4fdbtn/ZdofPL/j3smHHi1aH3Z6F/x766x/frQPzk+e5AAGmMS4eKaIkYJUhyckUSfiO+52AD1ue4KLgJTvK+SdFkFWKVKJGRdUfsWK0OJ1jyU1Zn1dMAkdZ/yR4W5UyQZdgqaQkYxP5PEueD1gaA4T2L5knXlAAGRU3pLhWHBX+3R3Yr/96+MRm3WqzDPvA2uUy4hIC27SfEZ/umX3stivmceNq13P28PNPv7FFdpfwA9sL9nWwvep+8RM36UFZ/Hz4SvoSjR4NRu3mPOeOgxOnKbYKfFRzbBN/4JOweODrzsSPh+FY2IYLN7hA5p5OJaDWgvdmu300o2/NRj+Zzj2ZFr5xfvh4/ftJPx7g2x4+Hr7L89dv5XX81uDL7PF7ySU8/uW6Jv8TYADQewuDDQplbmRzdHJlYW0NZW5kb2JqDTMgMCBvYmoNPDwvRmlsdGVyL0ZsYXRlRGVjb2RlL0ZpcnN0IDUvTGVuZ3RoIDE0OC9OIDEvVHlwZS9PYmpTdG0+PnN0cmVhbQ0KaN400MENwkAMBMBWUsJBbJ/dBl9E/20gwuS1WsmZPaUfxzresX7xOs6ZK2Otfz9Dpiy5Zcv/d2f4LnjxlKfkBS94wQte8JKXvOQlL3nJS17ykpe84hWveMUrXvGKV7zijftxP+7H/bgf96333b1nvGfu/+89rffd7bW9ttf2tr7vbm/b2/ba3ubty/t8BRgATzBhWw0KZW5kc3RyZWFtDWVuZG9iag00IDAgb2JqDTw8L0Fubm90cyA4MiAwIFIvQ29udGVudHMgNSAwIFIvQ3JvcEJveFswLjAgMC4wIDYxMi4wIDc5Mi4wXS9NZWRpYUJveFswLjAgMC4wIDYxMi4wIDc5Mi4wXS9QYXJlbnQgMjEyNCAwIFIvUmVzb3VyY2VzPDwvRm9udDw8L1QxXzAgMjE2NCAwIFIvVDFfMSAyMTY2IDAgUi9UMV8yIDIxNTggMCBSPj4vUHJvY1NldFsvUERGL1RleHRdPj4vUm90YXRlIDAvU3RydWN0UGFyZW50cyAxMjIvVGFicy9TL1R5cGUvUGFnZT4+DWVuZG9iag01IDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9MZW5ndGggNTI5OT4+c3RyZWFtDQpIieyX247bRhKG7wX4HfrSAWy6z4dsECB2jIUvnIMzlwMsOJqWR2uOJFOUk3n7VPMkUuxmN3WxcLKxDY/NQ3V1sf6v63/1Q1ltN/m6Qt999+r9m3c/Ioy+//71j2/QCiP3+8O/4R9btHr1wRZ5tf1i3+yLfbl9tFW5XaNyu/qMSP0gQUxkSiAlJFo/1m8/rhiXmbtdrH5b/bp6+x7CvpqsSPoVM4F+R8OImmTSRYQbfUyMXhIMK5Fh1Nc3q1dv9rvK7s5x6Xgn5ccVqXdyQ/7jgt9sVqq+oRCDRbjJMIarj6vnP+WPFn1z89/6UdI8+vz2+W5foaf9qURVmd9btIOnbr9xj9UZvL3xbI2dU9h6NgbVoYKOt8Zhr7Pl4l3MwH3R3SfTYrKL70MMz8z4+/gqKc8hAwXUIhvX8O3jodg/2RJt7yHSdrNdQ/fsd2h3eryDq7fP37776aJ6l6uq8UYvb+vR7Trt/FCv0T1huidcxrTJmDTNAD840dCbivFMS1rnfEupnM2I9OJwHUOxaxxCMmMMKu1q45Jw7UJcrw2qZOolDeI4w0rBizQTitdL/pKXFWLf1t0GK4YUQoZ95Jr/4tM2ymNNKv3XFdwpKqY+GpZfExb2ORfS1zCE+bXXVULJURVubFGg0xHld/tTq7G703G7s8djht5tUL57Qp9P9lh/3fu9PaKffr5B+eFQPKFqf37h9pl75QUqbP7Fom2F7op89ynrv+k0z15Mut4WRu4n7NFwjRTmGWdNOxM+E6RXHM00lhDk5n71HNIebQQ95Ee0LvZHe4/2pbuHjtX+cID/HvKn7e4j+j3/CDvrwdM2LAVNadoGrbdCMk7+thcGsiGZwLq9h+Y5SwaEavXHNQgbviFzqoU/tUBDGlAjTnte/S34qgdDl/1hwgdR+5FH3WdUxkbN9+bBrj+hB1vaFyCF+3An0p5PLwXONLTNS2hJyusSwoMA3urBos12lxfoPq9s3YaHfHvfNN98kemIQiuKNVRJKlVDR5mMumLM1YrSaK0oGx01w7pQqjKFpMZQl7osr1Dzq/t5/jVToV7wKuNctd31L5QXxz3KqypfP6AchAm1eXTvdXQpbXUqdxn6zQJXdseqPK0djI4zbKFiePy0Pf0S5AwHT/NdWL04ETMx5DldipnuiyFdh0oYjDhrzq5fT3kBpyzQ5MHmRfWADoA+ZP842N0RqJIXxX6d3xXW7ehz/+xxC43V0LKhz+b2GcCpuVLln+wO3dnNvrToh0O5LRB5AT0GfTCTsfISFU5ZDrAfZjzYt7/ddGB44m6ohBIoWk8b52EGw4ATO+5oL8ZpQMGvCMiwPyCvE6SCjMc7HRvvGInMd4xOFxSwoPGUBLotvgEWjndZkaR43BMPDvykcly2ExPRKY+Np1PSdB38EFxnoDHXc8o0JJ2RK/M3bjMKSBiFWuoQORNDn+WKlaQXcj0HuU6tm/xxCxPPQK+3z9AmQa8XI4U7G5gYnqwDQsGMSs3k1J1u1czq3Fsvr8w5jsgcsh1NtUmq5CQsc0avCehRXStzQTLKzUKZcxaROffJqJPlRUlSZMlFON5lRZLiyYDMU8px2U1cRWXOdUTmzq1oE5M59/dtK3MymPhVOIjoe3Y48X+wR1t+cToFSW5OMDBYMDX2QnyEZoSTr2DS/v+6EPiQxDOjkcyN/s27gy7w0kv0WACmQrTh386ENISAVAiGi+2AHPQhgkVYCMPGMmwJD0W6YJDVwmAehLQ7ZBjO9oUIFDKCQKFGkhcchuA6baoTahkaH3vo4WXAE57JsYs1LGVKLOkZGmt4JtTxsoclibJTnrt05ECnEAUAqihDJZthqDDsPOLrmSB8AUMR+oeiX8OFwKf0Od0RRfU8RaVMoKgwpDYjSSSVKkJSbK7welIHadpltzBgwI3yOsHl5lHhCFIV8SC1yz0Fq4pGsHpZ2BQcqrAFndQ1KV7IgqYU9bK7VdyCKpnIVwfHBC+q5ryoULT3VmYmhj7HYKwPUjvRQYizEz1u15+G3nLiLPNNZUv0Pi/XD4i1zvIFynf3znPePnOu8+d1tb+Dhwa+c7QDKjMhyHD9GYupzJkKhnUcGuzZyxId8ZNCqyvsnw77SSHNNQGDflJofYWf1DE/qcN+clKSFI3psJ+cVCQpXsBPJpXjsnV03E/qiJ90PZrgJ/Wcn4Re7/0kxeEgxusnz9J8sHlRPaBDke+Q/eNgd0eQZ14U+3V+V4A89+hzWMbl7TN72JcV3IPtF9udRXPcMH2ncxjkTDdjDdL3ys6EzoVeJWqhQoznUOiC8aVyMwEfxF1iy62LERG1GV83d+pQy5RhVDgWX6gy45lgapUlVGHSKSYqMpjVIioDhcQNB3ziOZUxnslOZWTmQCGY+nT2w+P+tKuO9YtwOlLeXj/t7uEoc1dZxrBqr65tWeXbXXtdy04g631R2HW1/WKLp/qmyLTqXrrLy4/wEkiwucN4d5zlH0trH223voSidBHPAm8zY6a9A4JvxnPRPXvWf/OsJN3SNQ/cxZdQLrBMLwlMfO7GiBFTQkwtl8yY6mr2VbmSv86FUF/2qAsYqGaUCtOXYB7BL8cLiUmw54DvolG6OJoHiC2AoS8XA5hgFSEwwT7UddjEy7BJsMeodcGGxUgKRnAAwgmVmPQOIXEKExqhMOUpFCZsjsIYxgWY0msK07kofau6qfPCmAyCnMefTf64Bahe6U1g/NmkeBMCxhWoOUxhwsA5u0KI8KpYE92pmEZUTGRExS5HTJZqj3gGiC4iBLgmokdbrZohRSrIUjkTE5Mz9YmmVeBlWZJUSD2Wrgt4WZW0gB5LV8s6pSSTbqIsrmvKI7qGXlaGRIVNxYywuaYgiEbXbC6IPAdhbKzrQYzrXM0UAbfPplPLLHeo8m4ShkeueGCXfplSPS9TbhzZlloUQj1nTBdRmWsiMo9mGplyAw0yNA9pMmUkJlPmE0GjqklZklTFPDawC3hZlbSAHivoZJpUkklXMRGXKZPzMnW9p3T8/GX+Dm5lKgW4oKaB+dwxxfruDZsg5TVBNGCC1JwJUkETRMMmiARNkJqaIB4yQaI3QS0+ahvETCZgtk3zQcD0f3zQ/8wHMeOdoAY+iEfQzHEEzQpfA1LumRW6iIJeFdHDyRbNilyDZs5iaOY+8HUkxVeQlHscYhfwsippAT0msUZzSkkm3cRVHM1cR9AsRBKauZlDMyCDs2YMo2ImisA+NH+wR1t+cUMQmJ7NqTqBmTkd7YRLNCM9Cr8qtf+tL4Q+JYmhTERQJnpC4ExDuOHf5cdVCwvCEcFwEYElK+1qE9SWYBEywuS2kGHCA5QuGuS1NJqHJu0mGQUDtRSIQsaAKNRI/IIrGAlc5lSnFDTkAjoEDguahD/hMQBdsGE9k4JJz+xfszShmJNuliSOUnnu13o56NEAUwGHKo5UyWaQyjQ+I1XOReH/IPWvdiH0KUUMqTKCVCkTkMqUTkSqVPNIZUYuhaDUQaS6vJZG8wCl3aSRVyBV4RhSFfEg1WWehFRF55E6KmgSBRULInVUz7RgvgEakJpSzEk3KxFHqpKJSHU4nCDVaWC6bN+zDBKHQwJ+EFLP6vWngTwIcr9hLVOvYhxzMbzHJM0E1MCt8kteVoh/WwMT1glWbHRGQo4C/T6sHhPuElNkbBYErCjin8Oc1eyPC9ubi/naVyCN/TXviuG+96AQ7/M/aa+23rZxLPxeoP+BjymQaHkRKXFeBtvpdJGH7QTr9GEWBgaqxcSa2pIhKZv63++hSNmiTYm+NGhQJzL18dy+c76zRa8KNRuVfUevRbtE2+qlRu2yqPO7DURpi3LVFM+lUr9O9LaU7IcdTobjDjFIMcEmuZ8qDY9eM3i3rVC2WlWvKCuRWm9W1VapW5ShTVbkqM1+oE2twABV3yIYcllZtUtVo42qm6qcv9ev50WzeGkabWwD2YcpWBoX4CS6/8/s18N5CEsdBb9Nt50p1R0syqatXxa6cpv+vG3ON4cAN3re5qrNilUTBZp1SvetxBYkx7p1AdUI1j+TvSR19e7xq7PRXMRhZqbcXyVDqSJiaHmM7ne/P1UTIfTJlsOcUtqgMlsrSE6ONsuqVKh8WX9TdSgywnGNsiSCoqSxbqC7Ljsbj0wS6uLpjrZaxHbIhEMjDyLL48gdRldiZ0IMA5Z2kwknkbQBm6mVAvwM8bu8eC5aW73ZChU5gBZPxSLr8mLChuY3D/df5h90bWs197pUJTBh9X3+viif9VNb2IEeKUkoQPK4NmPSVRim0MogBzwCTQP/Y0ym61SO7mW0qx+SuL3xjrAIVEKoOUrfbmYQrYlnI/r2M8oj2FMZZhEfGgnfMRhIMgQpPJA2jhci7iVZFMPpVw80RJQN/dfjOo5ErLHvcEThF/0g1jJLf5g/Avf6dBvMVUKP420v0/E2+OZOe9spl/lk3Xgmet/MNdazuxMvo9izR46W5t4zg997dndqICl2BWTXf87lFMXUlR0H6sBK4MuYRbFHUlrEy5hFsY+roJzJxcyi2EdWdgWemOKVBn4DVlGceL2IkjdgFcXe1Ws0C1eyanwzewtWEXfoxpxpxXA2rwiZ5pW4eF5RQj0BERdPK0p8LBWpKZ3LOEB8NLWRvBCRT7HKQL8Fr4hv7vI4Ym/BK+Ij8XgmruMV8ZHYX5Y/gVXSZVWiNfL5rKJ4mlWptHVwCa8o8QTEIF7ILOpjqsTRFdOF+shqo3khYjzFLAP9FsyivrkL18m3YBb10Xg8E9cxi/poPFaa13OLpi63pBisLmdwS05yi4NEpxdzi3mksUW8kFvMw1aNKC9nAvPS1UTzQkQ2xS0D/RbcYr75KxOz9vxsbjEPkScycR23mIfIo6V5PbdY4nCLQxoRBcdAJcLPJJ9Y6uHTMcDMAvxWla0qh+/v+Ngd+PgIZ7JNW1Tl/kw8mIf6X/1s7EzhNv23/hR6AYUroxgo87h+d/Olij48/m1Qf3/03BzvqAXRponoegf8qnMKAe68BnMI0v/gyn88kr90Hh6f3snuWoliHOEkgZfBgoR31z5kdYv4L6i7+3E0bPHBQpoc9CHG9SOaDiqYx7jzdzqV8YCLfkzr6RTuR2+8Yn8W+mAkwgnErHgu0VLVKkJ/Vi/o319nj2hRrTcr1SqUrVaoXdZKoU32rBpUPaHPVb1GEi7JyhzN7v/1BRXtPoMec3Z81ImhJjGJrQj9CVVDBfQeITp7vpa5qru0sAin+thj/u5mo8ps1RZggv4GBK9g9hswST8CzoHM7w/Xf7/U21uLImSPct89wZHA/du5WqyyWvUnmbTP22XWdg9phEUy+voy+5+yx+Kkv179yNZFqXJrqpBiB1o01ljJetBatS912dtKObHPi3KxesmL8rn3OKX2m2yh85OV2/5LEUnSG94slip/We0Cle5fK/PeI7o73WatWkO+GmMAj3iaHJ/v3W2rPtZs92ip7LOE9zd9U00fPJrK8Tytt/aRkP2l38vqdaXyZwN6JzjkJIHeCB21t+mbWhXq6RbKDkE42/pF3ULB1rVatLddUfbVG6FPXXazrkvB/ZtabSDZNZrfzN9XYHkNxZ2VqM1+bLKtqucfNOK3rIHcwRu6+IvyCep9h/C6LBbLPc4ya9D8PWQC7eyepIIYUsH2KGJYCh+p0N2YxVEypOa2ejF0wPswlNladZx1OqenyQzmhe2OBJhLsexaJ8UpNOOYhtVY7EyPQa8iPNVGQ+r3EzzF4e4nj+emhbK2nQXHPXqOcaonDUtA6DpqBkgG7gYAPXKui9yFcHRCeHW4FAjuKpPrZRf3LGeM+YN8reriHok3koErJRf36DtPFZ4tt7yzlAv/LB2MsqG4IURGUAwEVjkCfVdz+BM02ABLuZ+lJDUCQMJcgj+mCcp98m4EZTblsAxLOJZCx9aDHaaY0XAPdQEgbqfCAHVOrxLYaTEx7YQii5HxYihOPS+TY3V66Jqgjnj2eEQpTJtRh0zrbYt2dZo/zOePJd5JPsUn+MQDPpEUmMFMKX7UYznPtm0BGdksqzLognBdEBhc6AuK4DTsQuK44DuR+vqG1r+675+tfYV04uEds6A3iUh3Q/YhK3L00E/0r41Cf5SrbSAyCT6iLOddA4OYnbCNJcSJrOfd0UUsocdlcbiIJeysthVrlokEepah829LtfiOiidNgDmwAvRxo1ZPdwp0VbVV+YTESXZFmxr4LtzQKijoSsMsE2mN2yDdHEKh5k6oCJAUrIWh0ikYLoGXoTJMRJhJSeJUjrugMH0JOMFkbJx4vP8SMttVTHEsBmZbJ0Jmy7DZKT5oAMxmlXWBp9C2KPcEvgFpmcHiEYp+So5nkzEe5qduA8MMjNd7Sp1oDCY3E7qnMOruupRhPbEDUiD1CBwLaK07F9CnYkwfJaBihoCap3BRAM+nVWz4LsLbN2SPjjTAFBq+C3y9kkwTT1ygYdDjQF+tJFPfRBjNwXVaMvWtIf6K/Dl6UuKwvLLtBqh7hoaUxzy1LccmqFsuQzSVDk2tityHxgqAw9BwLfBD1JIerlq8wxI6Dc9DVc5oh3cJtaSHqn0EL8KboqoFfguqSg9VOUkHlfDzqCo9VB3PwXVUlR6qjtTjT6Eqw2NUHegaDDcbin4u6vVe0qD5TVV360NzuD+AqnK01PzDNLMZJh5Oml4P3eQkAcSwRzMe+csOlMRhR5J7gfh7SP4wHHvkj8SnKR+G+Qn2igl7UcLA2M7Wf+Z5rZomZG/iUZmCny4yGU5PsFkGYrw3+yG8nzGCPUG2Rp8WaELCRhM6FehYRsRuDUUbWJsYYZ4ox4a+et8LmhufYC4fNZcRPdr3Fs/a4GCFVxyTGWwBojeZibDFyQkWp67FuwajKwKs1TJFm/vf+we0qPKgxdJTFX2QT6oKih2jfScGcsOZbIxHsLBBYHbdOE7gkTvOvVGgbpklZv3SUBSyJkzGHrJn1XVUvclis8kS05/hg8OAA98G51kgVtQtyOHIxJF0HQFisVP8iB0/tKHUGNq7xImMUun49bmq1xN+sTRy/ZJx3J8+BIcgpA42DCOKKXMHzf8FGAC3VYyZDQplbmRzdHJlYW0NZW5kb2JqDTYgMCBvYmoNPDwvRmlsdGVyL0ZsYXRlRGVjb2RlL0ZpcnN0IDUvTGVuZ3RoIDExNC9OIDEvVHlwZS9PYmpTdG0+PnN0cmVhbQ0KaN400LkNw0AMRcFWVMLyr45lG04N99+GDWkcvYQYElzZxvaes355bTP9dI67WYeeeunSZz5tvkujU3flNa95zWv7x1B3jejUXQ899dKlvOIVr3jFK17xile84hUvvPz/xgsvvPDCCy+39/kKMABu2UddDQplbmRzdHJlYW0NZW5kb2JqDTcgMCBvYmoNPDwvQ29udGVudHMgOCAwIFIvQ3JvcEJveFswLjAgMC4wIDYxMi4wIDc5Mi4wXS9NZWRpYUJveFswLjAgMC4wIDYxMi4wIDc5Mi4wXS9QYXJlbnQgMjEyNCAwIFIvUmVzb3VyY2VzPDwvRm9udDw8L1QxXzAgMjE2NCAwIFI+Pi9Qcm9jU2V0Wy9QREYvVGV4dF0+Pi9Sb3RhdGUgMC9TdHJ1Y3RQYXJlbnRzIDE3MC9UYWJzL1MvVHlwZS9QYWdlPj4NZW5kb2JqDTggMCBvYmoNPDwvRmlsdGVyL0ZsYXRlRGVjb2RlL0xlbmd0aCAxNDA+PnN0cmVhbQ0KSIkcjbEOgjAYBvf/Kb5RF9oqAySEgcLgwGL+3VRTsFpaUxsT314kN9xyyXVMQseQbchoGjHqUw+Jtu16DZL4k2YSZ+tNdh+ro4/JLTYnd0NyJFhdJBR4okO11atqWRxrlKUqpKzAC+347t54mdnCbSsXg/H+C2+njKs34bnnBw3j+hyYfgIMAOjMKeMNCmVuZHN0cmVhbQ1lbmRvYmoNOSAwIG9iag08PC9Bbm5vdHMgODMgMCBSL0NvbnRlbnRzIDEwIDAgUi9Dcm9wQm94WzAuMCAwLjAgNjEyLjAgNzkyLjBdL01lZGlhQm94WzAuMCAwLjAgNjEyLjAgNzkyLjBdL1BhcmVudCAyMTI0IDAgUi9SZXNvdXJjZXM8PC9Gb250PDwvQzBfMCA5MyAwIFIvVDFfMCAyMTYyIDAgUi9UMV8xIDIxNjQgMCBSL1QxXzIgMjE1OCAwIFIvVDFfMyA5MiAwIFIvVDFfNCAyMTY2IDAgUi9UMV81IDIxNjAgMCBSL1QxXzYgOTEgMCBSPj4vUHJvY1NldFsvUERGL1RleHRdPj4vUm90YXRlIDAvU3RydWN0UGFyZW50cyAxNzEvVGFicy9TL1R5cGUvUGFnZT4+DWVuZG9iag0xMCAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDI5Nzc+PnN0cmVhbQ0KSImsV2tv2zoS/e5fwQX2QwskikhRr71FgTTJ7s2HtL1N2qLYLhaKRDe6lUWXku36398ZUpL1VrrYvpzK1DzOnJk5vLhUZbqO4pK8enVxd3V7TWzy+vWb6yuysgn+/vAv+CEljBzI6uKDyKIy3YsrmUmVbkSp0piodPWDUH2YEse1fJf4rkfijbawWbnctlz4KVvdr/5Y3dyB6YuBV1p7HZiyA8u26ay5Nw+riyuZlyI/GWTdNNS3FYU0VhcP9L9o/GG9otw44sTxiO/4ls988rBZvfinVBsScn7+6Yy8fPgTLJxTi5GHZPXifXTcoJdPchc/CYXfmoT67p3aPTqklUNmHDJ06AWhxR1HO3y/U1tZCCLXBH1PW+Vtq6yyahKED7TqO1bgUW31Sm62mSgFOeVD0jU5yt1XxpgSZBN9T/NvJCLbKqtDWj6dMrYBfcy5ft0inwUcyTKyg1jLJ0HiykNC9gYPUkoSK5Gk5dAM+FWNp40E/1sF75fZkUR5QqI43qmoFNnxTP8fLA1MpBt4ZQ84gaVCqH0aCzwHlq1pzNzFSjCnqcSdgaQqc0E+IyI1ANM+vMW62H5TlwdJor1MEwRe5FFWQsZQCkE6COla6CfMZs50VfQ3rdReyBwQTdf14yqaF0TmmmBYt7XMMnnQtd9us1QUM/D5pz4C77zyDgxyyReMLhclKaOfogCrSls/ikiRr02AZyRLwXX49SWJoOiZKIphNuVTlJO/szPXtnX1TyQFPDDQNCfrHVBPwxKREoYPpLlOMyDfwJoS5U7lM0kF/+ekqsgHgcDLmulVSiTKlIiSI0kE9HuKjYO2jSf8Xh7G0qljWKeqKM+A+bHMk6pLnlKVkB+7SJVCFVhfZMtvhjiYxRDpTlprOAeAVgZOBWrV4zftaKydOxU6q0t0VudUZ9R3NjBVe6+iH63xYknD2ZJWoUZQjrx8AqsFjKtkl4m6FFip/jgczp8cx5RUSZTHwoSJeV3q0RUfMYFrY64gH8C4Re6FGJqBApapzAml+Mb73aNFqKvrqh8HzdPAPiNSkdb5IcNqA36ocU5EGaVZYZHbHMlRkDgqhClJtJE7yEquDTsGpprZHB3JY8PpisIzyNNGMdA29O/Apzqk6B2JsNkVpRlzSQ3R45GIDHJTMgcZsd7liZkM57RDWBXlxVooA+YvYTfWj2MGGux0YEDkolQ7fQyAvJY5smeEDrgGW7sVNpHOby0SoaJMt0Cd6wm+mxGtQhv141DPCojnMa15YHHAHyVWa5Q4OOApCpmLK7vWMI5nGRXjoEJxaGC5nlEBTqC3zSvb5t5rdP4wrZXoUCy1dBIzyxI+HPQC4fnc4naol9nfZnjhnHhRRw5WHWPV0yLOJvjp0NBicNzzOGxJI14uPz7cvns7Y52PxswHy9cNENHQbvbvx27ZDk8ib3o/P9bd31+rzZ6tPLxYEku/w+jbC3VWaS60C/brLsS3l1yM73sYzSUpnuQuS5CXIIceBWTQrBTTboPAoKsXU4KuL3aPf0KHIJkbeaI7b/HlbmPpPubAyVYIvzTp2s05uhHrSTdDkQXpZ3qNuqD+mGbG/VbE6Rpm0W1rAszYb2Rfi27aqBuGNZHfyJ+EQqH8G9DK8ghrLk3ACLqJdK75bvMoUFvc3L79+tJqcK2F2+16vKBJPZeeoj0qDALvV6MWmQbC7qinmtZ9OcqVfsUGrmAgf5PYB0PVIIf8PxwsECTWN7m/ANfWQHB+qUPJCtmKx0SKw39Y1ugnete7OM3wR836+/tzjoTEJXb74R52m4EEE5+azUrEAi6qidl1lUM0kOzgL9wz6suWUXMHBa0ztALGnUstkRM8DP/lleyqjGhRVx1Iq40L1VUjyRXbKJ5do/4IWztiBqnEkEqXZoZsozQZ8uUmRy3VWvh4bH7e1K9qPAaB4zSbCTt4TtgOhv022hgpHCWJApU5FbsRr9XhpaA7oVaGSVTghDzkQPymyHM5zIjHmzzOZFFdzkA0xt+NJMoF6D0Fmx64mmgRHD1mYvTaiiz6mGu5f18CawryANeAYqeOlmbUGxy7Sr8rTgDodh611dC24SM+RemsH0DOk8FaQ4uNvikEWAK5+NTSPEUZbbPOupRqQT5CFs2u+oqKC9OK4iciURDChJuuA7On63AN4x6MtCLBxHXMqVmnJq46jNFLy2mJmmlS82Wr5B7GctXDojP/9dCa2fMz6dCl1ngrS/GPQRd8qeWynpyxhMUhYNZgYLg5yiOECUFt9P74tf54lLAr3sN1C74c7Q2Up5cK1lMUtxJp6cOUUFBsB/Jv0Kb/sUlCVj/Alt5+oLUscMS4rdVrvNHSbLNy4QGKvWx1v/pjWoWyll5MJ3Y25a7lOJwwjzZbu2LG70KZ6XIHu4N8RkJ8QUK8bxHiGbOA8XbRGhB9cu5ZIfyCOCCdMAyArSE+0TGg4QUM3Q6GiGAfPspCywOwA4vx8AQfVNBBlbwEnzeAz+0LeI6KjFFmsdBoYd1JC4H77cAH1aYh1Sg04Ybcos8odjCIlo1cDAAOm1qg4atKb4G6upqwvbEf6kHablBfU/0WJynIV/IBVHgOS/9eqH0ai5nKh+3KV5cfaq5X8MFcbrlwqWKo8EJXB1Rz65PcwbRV80A69gSQWHdnBEnHe1bfOHSqbwLtAJnKLS/0wUNo+YFvsOyNeC1d9iaPZsiPzPSFUeF0RoWtR0UrVR6ElobwlGXgW7SX5YjZ1mwYGBzvGWA5BzSXwONTPPS1B5+4tm0BxIwBt2wzcd7dvSFvJd5luHvObNtfwMSdKLxBY1D35yHStPsADCAoTJs2FoxDq9JFLPwBFl41Qcz9Bj5cG+83NPQtn5rRx+x64zjVCmLOdJM5Y3KxhhpyogHXywMt0xkz4ciUZpbtoils/5aSFBMXr9PMoNzRL/WuYp2q9iPgTTePR8hp53uNd7TVjpsjbHh/DIBswCsHro8GBGhSbxoH7szAyRj0nx10MGXzVOW8TVXW7TVGR4YUo8ESVbk7pCqOABqyri3cdMb8AlN5d9ed4AMZTKjnA3o628FdSK47g62l3sbhmNp9Ggq3p3MY9bHxltAIJtDwWL9tqaOn2hIY4fQqtcOaCwiM60LAjkbmLvo+d6c5XWcWL4149+gfGr/t9N/Ut5/5ArhTO5M7I4OTgiJbLoBLRyYnmuOh1nW/ao6NmWOj7OamEdv2+tV0ncW54XZ3Vt3u3IepAeVtt/u1zLJIFQsgT+0n1wlHJZ7zHJ67IwuqNthH+nkG/RGD/vgYGQF6aK9pxIFMgRvL/1y/cLF+nj1aP5d7lg/Csl2/KzC9UD2PntLwgT3tf9U3EJHED7Q9GoAXRpRYracg8dgEEyqt3594YLKvUEeMTmk3Y7SK7hdt8sna6VkKgTKXdmrnM/Q2b9WdiBTG/Wio3AqX9bnnnUDF31CUvlBvNjaFmwBubM6aSe0slL+zooZoODaKScpaitsBovWuaMOgg2UaT+6dJh1wzjvJtGTZ465Ic1EUJI82AjRXmifpPk12cGXTT9I1KSSsoK2SW5WKUqq+JBtg4U9tixoFuz/InoGEvyzkfDba0FX6NGguDq30/+K+WlYQBmLgD0ml3d22i1/gzbO3YlUERakP8O9dNkFshiWlKKjXIU1mJmmaNm3bBfWaIvOqSE4lqaoqsUyHiLK6KNcTVYbBdLFwGWaMpHkb/ltrUhaP6ayMB0e8pQlw4WNFwIUAkxsG1hxhHAMdR5icAbrQsyIseQLuBFhfM3DkHKEDBFxlWT3pSvLYcUSRYg40JjInFDnLRyBpI2nohullISm0pWXAJ/1ZytbOOeL5s7XgCJvkAR5D44AHqJ2paiHpP0/UhgFvB6sHSyWvrUwB4zKis2CgvhqAOfgDPCApjP6BgNol7fgZ00/yZYGqwOsmHZQ0oCp0FpRMZdWPDMOId+Mda+9bWw00Rnxa9oLXR/Z177R5CDAAUvSOgQ0KZW5kc3RyZWFtDWVuZG9iag0xMSAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDE1Pj5zdHJlYW0NCkiJamCAACaAAAMABIsAgw0KZW5kc3RyZWFtDWVuZG9iag0xMiAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDM3NS9TdWJ0eXBlL0NJREZvbnRUeXBlMEM+PnN0cmVhbQ0KSIl8kc9LAkEUxx1/bFSLlWAEmT3CAilUPHUIQYIFL6Fo0CnYnFGHcldmJ8H/QBA81KVjB/+DzltdOiZRx85Fh+47227Q7p48NYfH+3y/874PZlAoGg4hhBJKWWkojd0y1s9IldY59tU9sS5SIzktNpBYi4q0nBw5J6moa09jr/KW9bxkva1YL/K2OJAzoRhCUnz6/hFEVDDROOWDQ703YLTd4VAsFIoQeFAfGJx0DahoTZ31dKZygnNQvriA4KoBjBiE9QMxGKAGEMo7hIHqeW3qjTOCgTMVk67KzkH3nRls/bMJqAZeFhxr1Kc690QDVA3nvRQ92NLULzXOKDFyeaXeGPQI7AMmrZnH8Y7ilzBCR1gMR6b4NpFXM2ZkFBVDu+oOJWvsPCWdknUds74kB5zHpOWDezXnSqdBb5UcjyXxkPQ7x6f4z/JtH93Z9xH7c9XN2jU3+1uLxf3fmBeb8s6NqCTYxKYTZzyRzAVz8U+AAQAGX7DFDQplbmRzdHJlYW0NZW5kb2JqDTEzIDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9MZW5ndGggMjMxPj5zdHJlYW0NCkiJXJDBasMwDIbvfgod20NxG7qdQmBrKeTQbizbAzi2khka2SjOIW8/xQsdTGCD/P+f+C19qs81+QT6nYNtMEHnyTGOYWKL0GLvSR0KcN6mtcu3HUxUWuBmHhMONXVBlSXoDxHHxDNsXlxocav0GztkTz1svk7NFnQzxXjHASnBHqoKHHYy6GrizQwIOmO72onu07wT5s/xOUeEIveH3zA2OByjsciGelTlXqqC8iJVKST3T1+ptrPfhhf38VncxdNrkd3r+8LJ9+ARyk7MkifvIAdZInjCx5piiCDUctSPAAMAqbpvsQ0KZW5kc3RyZWFtDWVuZG9iag0xNCAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDEwMDYvU3VidHlwZS9UeXBlMUM+PnN0cmVhbQ0KSIlMUG1MW2UUvrfQW8ZIVeplWUvaNxOcThgVJIJxJDADVZBBC90kpEvpvbQX2tu729svWIxuyTJsYQlNNtQZicYxo2Y1MTFbRFxY/bMYjfEff4Y/5sdMiGR6bjk1+pYZY05yznnOe55znvewTKWBYVnWPurydruGnnKJ4YSoSQH/oBgXB0Y8mtDcE57e7dBtrG6p1OtreOzE0zubOy8b4ceH4I9H1na+rGUMLLv999GoklalYEgjT3d2dDRR3+nc9W1NpNXpbCXdQnRCJJ50TBMjMfKiHIiqSlT1a6JwmHSHw8RdJseIW4yJaqJc/E8PkWLETzTVL4gRvzpNopP0TRLE8ISoBkWVvKDGA9MRfywQkmRRJt19TURMBcLxmJQQw2kSlgKiHBMFooXUaDwYIgOSHNXSikiTCdWvpklfZMLVRPyyQCL+NKEqVTEoUZ0qJUkyCYiq5qdxKq5KMUEKaFJUjh1u6fWMlIc8QwRxkmFYxsIyBximgWEOMUwLy7SzTDW9LzPIvM+2sym2wG4Yqg2vGFKGT3Els6r/tspS37BakanUzxeHSuc5WMACj12QM8LPHBL8iocyKC2aSpxvN4cupJjT1/hyhmVkzkCXXgOt7BcwBMPgq4DX9YP8nbkrhQ3bjXx84MRwNBh3tI4e9A4/J40nhy+4qvQtyv42y8G+DehZh14rPIGm7/EIHsO9aEDPRbv5LLTCIbDAw9Bc+wm412CuGQScgAHLfTinC7xluzD3+dWbts9WZ06Oes/4HRZdmV3InnZgvclyf/6tNxeu2q7feG3QHUy4Q3LuvZQj9c6ZlWy+Ct3c8XNZVOAbG6Rug/UOZUILcpmcdd5k2V74KQOPW792QQ36jhxNCV67NzB17I3OKrM3Azlshmb9ZLL2bDFhUeA65PjvQDHOc7dRMVryJRfmeDjFWZSPfjdCkrPkP2w0QorDpaLPiNOceXYGevV66GWvgVJRFPURPgV9yGzjiWwVKngAn8Q4BmEfPguzIMIeaIYGB4Y516vy8W5bw9TWvXsfb23ffff5Uxcc5tLgcqLoS7K36KxbdaAUfajQFQ+KBRAgCUJFoQ4E3TrPQbRkNcIU7RFKtXMcCnqtEeOcefl/iiBPJ12DIo8yNKITItQawQkyyEgjRqjROsp2UOqgbTO/vr45iW3Y1j7p8bTnoc1uXk7oK9DPgkYngUZFUTgO/X8x2A/j//5/NcnepMuC5ROMFn08KqX9XE/G+RjJ3P3Bru+n+CUTjgHTVN78568wZjfPXC76LmNoCTpyHFzJlQJLpgelqUtV8MHi1mLpl0t7oKEaxvZma8xF56PFt/l/BBgAr+MEZg0KZW5kc3RyZWFtDWVuZG9iag0xNSAwIG9iag08PC9GaWx0ZXIvRmxhdGVEZWNvZGUvTGVuZ3RoIDc2Mi9TdWJ0eXBlL1R5cGUxQz4+c3RyZWFtDQpIiTxQX0hUWRifm86d3KbMZq+YG+NhaSZKc8cQ3MGUtWLtj1Q6QdLD0J25x/HqzL1y7xm3mR6i6EGQ3UxxZVfbda5sBBUFSQ+B1ENF1ktBRRFiPZiFhYgs3539ZmHP7WG/h9/3+33n+53z4wiu4jUuQRCqDkXaI50Hq/fTZD9lalw+TNO07ViEKTv3KEfSX1bsbwT762J7i1fC7WhtcR/4h7nhVSnMlT3JZza51gjC+9W9el/GUBPdjNSFw3U1ZFcotIu0KHqMkkjGZDRlkgNaXDf6dENmVKklLckk6XAMJumgJjX6neH/KYhqEpkwQ1ZoSjZ6id7Fz1SFJmPUSFCD7DPS8d6UbMa7VY1qpKW1htBT8WTaVPtpMkOSapxqJlUI6zb0dKKbtKmazjJ9lJOYIRsZ0pqK7a8hsqaQlJwhPKVBEyrPaXCTqpE4NZjMe0/aUE1FjTNV18za736MHHMuqScK7XLxKnP5XEX8H12HXa+FYXtgcMb+NCNw3DpTNFhsD+SPFgZE+AUfSNgMI274ICLBexI4ojDsKYjRLxyakWvRvis5DB21Ie89m3uXs6MchDsWCBaccrAIorAiQWBqbuFn/8JUAwYwYDbU1ZnzEKhi5dg0HV5amp6DJmiKzVVXx8LY5EehHNgyuCEIwWV0I0O2jbcgBrfxIfNzW3YFJWiExhWQIAvZAEjYiI0BlDDr51EGc59zcD0HvtxibtO0dd5atUCxQLR+snw4+cZul8Y8fz+GUmj1+/AeBOd3Y0k42b71YBW693UkWOqcvtn37yQsbi+cEYfmr8zDxtdQ9Kzi6e0bNx9Vvjx+qy3QtbeZeyfRl5Zgh7hw5eHb2aty5wmtt7PXj+Xfu7kd1zefDKGn0r4O3+IrcfT3P8YvT0DJiwrnTc/za7PvK6FixzsM4Q+1BEP+DafH89FxjP0G9aMi/Dm0NFK4P+LJTuSjE9gzthb+Gl4eLnwcK8l9Za27dGFx9KJT417vpSGo+PXCmHf9fwIMAAZ8bzINCmVuZHN0cmVhbQ1lbmRvYmoNMTYgMCBvYmoNPDwvRmlsdGVyL0ZsYXRlRGVjb2RlL0ZpcnN0IDQ2L0xlbmd0aCA1MTUvTiA3L1R5cGUvT2JqU3RtPj5zdHJlYW0NCmjehJJdb9owFIb/yrkEVejYjhMnUhUpgCLYJmANLZUQFynxwFpIUDDb2K+fHVKVTFCuTuLzng+/j30HCPgcXAG+C5QE4Hvg2D8B3Kfg+yaYwwCEyS+55xn9E3BPNJE30W0ia6JTRyZq3erxEadVJitVbDrjTBZa6VMXn+RGHXR16kRZ+Sa7mBz3+1zuTBpIGJqa6LC2Pz7zcDAeJlIDpbYfDtL9SKrNVoNgLg7lWdejgYdxnm4OwDEuC93vl3+WpD4HyoRnO63qTJzuVN4MhpmCRGfdc0Ll0jHieow9mKQ7iXEUz+P5Qy2fKSOuU4mupF5vcVJWuzSvjxbnrTghONZprtZRscklEEy03L2AcHF+2staareu1F6XFb42l3HJ+d799CCt5Mpc68PpYJqNix+lJWf3HC4MOjOy3dYStdnk+KbtUFNqBXYB8rEGLpaCLP2ArVZhuPS9d16N94HrXLpNOQ62aWVQdFD/LlFvKykxwgGOcYJTnONz94MHc1jDw368A+lR81psztAk1E5oMRnJ/JfUap1O5FF+m1s00M9/tvDwNp7n0Us0mj38V2kKe6bwDqrgBipGyOesaHD5RoOA3fLpr6xKa9alMYJcNYYHdQ6o4zq25X1jyjyD6VHnRcsft+3P1+R78vrlqj/Z9HjHIHHLIP65P4yH4T8BBgDHTlo6DQplbmRzdHJlYW0NZW5kb2JqDTE3IDAgb2JqDTw8L0NvbnRlbnRzIDE4IDAgUi9Dcm9wQm94WzAuMCAwLjAgNjEyLjAgNzkyLjBdL01lZGlhQm94WzAuMCAwLjAgNjEyLjAgNzkyLjBdL1BhcmVudCAyMTI0IDAgUi9SZXNvdXJjZXM8PC9Gb250PDwvVDFfMCAyMTU4IDAgUi9UMV8xIDIxNjQgMCBSL1QxXzIgMjE2NiAwIFI+Pi9Qcm9jU2V0Wy9QREYvVGV4dF0+Pi9Sb3RhdGUgMC9TdHJ1Y3RQYXJlbnRzIDE3OS9UYWJzL1MvVHlwZS9QYWdlPj4NZW5kb2JqDTE4IDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9MZW5ndGggMTcwNz4+c3RyZWFtDQpIicxX227bRhB911fMowvItEhdXQQpEidpXTRpaisICgQoVuRK2njJVXeXUvT3PbOkrmTsGuhDnQCiRHIuZ86cmb16Zb2ai9TTixdX729u31CPXr58/eaGOj3if3c/40JR5+pOauHVWt4YbazKpbcqJas6f1McHoypP4zGQxoPBlGvF1OaBwt5ZzjoRUNc6c5954/O2/cw/XrauboxhZfFwW986tcuOnHwO43/YuPTeWccboypP4KTSTQY9Gmady7eGZvT9WBAXy6SXtL/8sMP06+Vm4aPZOeDrcaV1bjyhw+2m4yiySgOdj9atRbpll4BHFFk9FGspN0Y+0B3MitTr0wR7n0wXqUyInZ7FG2PLuOoB0CmWefisyThHmhuLPmlJFXgKhfBBP77pXJ8LydvKBXWbsmUnp/c2axjvXjUyS2StYXQiG8ti1KSFhtHZh5cfiqUlxnde+GliwgBFRLflX/KxQVi4p9OXM3VorQywJIarWUaogUdFkuAlZsSoLNj8S2i+3LmldeSbrrPSudtvtJmm3P9puKbdN1dKo08b0z2PKRUvjJOOpIHF55dcDE2YoELzmxlzVplMpSmCYEqUpM/6fYCdmmj/HJpdKaKRUTTfbHxWTrUAABnEinlqpBNP/+CBRdHiAOfKhW/FJ62piSzATnvZUXYUS+OnwWVlX+XysIem0KkNShVuXFPOqbVMaHV/NnMZZCAhlittErFDFyBJzg8ijvuXdNZLM9ysYsbr1rCRQHZg69gvCjzmbQR3c6D5blQ+ijVMzfJIBoNWfLY6rnLy/ruSf2Q2Qk+BQnyUFC9pVwUhbRgtt0DOxfaSfzwrOzmVpRZqZnIR666IZ1cbGkmyZWzr6FPkZhE93gFHfi+VPZ3UhmSGdR+/jTllyRJ0PqF8bt6ZOe8OM6WPVzG54yqWGMYiUr3mKzA6ShINnSQ3EZbnGpwWWjpXHgn2MuUW2mxBaVoLbTK6Pf3r5s2UuRsjd7X/7UxD1XrW5kamzl88tArFhxQHWq7Fjhvq3Ac5aXzDLiVXqCjMyg/aQMbIgSoLKUV1q5pqKoVCwvKBklQUDlVhLxEBn1Q8FOPjTkC3R60sAWg/RB4pMyD1jL/LMFKofW2y2LCmZS22CHD1yclFla2lBlJzqs+E7rLue/ZMtuSO7R1P6JfIFFrboNGEsfPEQIyPNDsQQjCOLi7DxKqXKpNaB1aYE9pVdKTuN3SbML8DZpwSJStGTxsHYfdMIOJkFo1C6oXAuDxExHWEJLfBCaK7NJGhrbbx9Qwsnd5HFDN+jdyJawPUwlV/hV0wn4RhlCq1kp/v5jDXTGTSdSbUDKORrW7MKixtSmmilZeLWqB4Bu8dCiWgy65sB50qzCYbCoNQTTixxaIplGisvApuo/A6jw3xUZCWpYVV0BNqzy2xe/NUIy/IIc1tcF3brXQI4wN7y9hVWEsIYvmEUAbMrsrIuLCbAwxlEWG7yLY9lYKz/xu225kxvQPOQRECDtBkbIJPC7ZCRekfqpAFWCwqS57vJFGkHi8vHsJv+0MhUKzqxZZ8VJrxb5PQwDUMwgm4wt0Xf5Ig49aG3zKawJGUFgCKwGHTVDXV0vdXGEG7xfrjdK6pcPXAotqJjFNeLOhMNoyMDQrkWCqbFrmQA+xO956WmqGKaBY5iCRaH8kWMWk3I/fz2fcssL3jlO7C9L9IOWKgzobmuPoOqlHd8Asjv4XX3vRJJnUP8QTWtqoS/1rAn0eqeykBYnL+DoaDibHePwmhS0YCjGrDxWBfPVJhPvlfJsMoMXjaPisDMb98S6DKoHkifiv2+JPetifxsfxf7Qsh0igC4qutuFCOCfzma6uQdfGX8sgqUi63xBqreXhcZZ/3P9PSYI6Vt/7FSyD0RO44CRaA8PVjE/6tt5Ql+iXoLdhi8CkTWVV47AopGlp+eBa6/bl2ToqXd1nu/YLI9WViwX/wBsMa3UuHtjgXgOaiCrWCxtm3caUOuOdZ4kVfsvYLsE6mluTV2s89kYcbIv2uuAUdEgmvLOrSFIzcrPZRMq6aGHWVxzRTf30OXOj8xcbJ6XfW6bQtg4uxBIG8z4aZNI4bTbev5d2jQnd5WNqAKyafh/Lma5PGA7DdK1cmLgx/trmKVZI5ctqo11jn/jwuQt2Xo6GyahLn4VbohyeDYAZSS/BQaNp5Y0peD33Tx4YQ6r72oZe4PNXlmGpglrfIhgpMuwDUjaK8RlDtQ2FZSABV/odpsdPDVWpt6Xb412ZmbYL49ASb6edfwQYALC5aiQNCmVuZHN0cmVhbQ1lbmRvYmoNMTkgMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggNDUvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCnEKMSAxIDggOCByZQpXCm4KUQoNCmVuZHN0cmVhbQ1lbmRvYmoNMjAgMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggMjYvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCg0KZW5kc3RyZWFtDWVuZG9iag0yMSAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9GaWx0ZXJbL0ZsYXRlRGVjb2RlXS9Gb3JtVHlwZSAxL0xlbmd0aCA3Ny9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L0ZvbnQ8PC9aYURiIDkwIDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1N1YnR5cGUvRm9ybS9UeXBlL1hPYmplY3Q+PnN0cmVhbQ0KSIkq5DJUMFSwAMKiVK5wrjwupxAu/ahElySgSEgal6GepamZgpGekaWRoUJICpe5nrmBiUKID5eNsZmdQkgWl2sIVyAXQIABAAlmDroNCmVuZHN0cmVhbQ1lbmRvYmoNMjIgMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggMjYvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCg0KZW5kc3RyZWFtDWVuZG9iag0yMyAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9Gb3JtVHlwZSAxL0xlbmd0aCA0NS9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L1Byb2NTZXRbL1BERl0+Pi9TdWJ0eXBlL0Zvcm0vVHlwZS9YT2JqZWN0Pj5zdHJlYW0NCjAuNzQ5MDIzIGcKMCAwIDEwIDEwIHJlCmYKcQoxIDEgOCA4IHJlClcKbgpRCg0KZW5kc3RyZWFtDWVuZG9iag0yNCAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9GaWx0ZXJbL0ZsYXRlRGVjb2RlXS9Gb3JtVHlwZSAxL0xlbmd0aCA3Ny9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L0ZvbnQ8PC9aYURiIDkwIDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1N1YnR5cGUvRm9ybS9UeXBlL1hPYmplY3Q+PnN0cmVhbQ0KSIkq5DJUMFSwAMKiVK5wrjwupxAu/ahElySgSEgal6GepamZgpGekaWRoUJICpe5nrmBiUKID5eNsZmdQkgWl2sIVyAXQIABAAlmDroNCmVuZHN0cmVhbQ1lbmRvYmoNMjUgMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggMjYvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCg0KZW5kc3RyZWFtDWVuZG9iag0yNiAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9Gb3JtVHlwZSAxL0xlbmd0aCA0NS9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L1Byb2NTZXRbL1BERl0+Pi9TdWJ0eXBlL0Zvcm0vVHlwZS9YT2JqZWN0Pj5zdHJlYW0NCjAuNzQ5MDIzIGcKMCAwIDEwIDEwIHJlCmYKcQoxIDEgOCA4IHJlClcKbgpRCg0KZW5kc3RyZWFtDWVuZG9iag0yNyAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9GaWx0ZXJbL0ZsYXRlRGVjb2RlXS9Gb3JtVHlwZSAxL0xlbmd0aCA3Ny9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L0ZvbnQ8PC9aYURiIDkwIDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1N1YnR5cGUvRm9ybS9UeXBlL1hPYmplY3Q+PnN0cmVhbQ0KSIkq5DJUMFSwAMKiVK5wrjwupxAu/ahElySgSEgal6GepamZgpGekaWRoUJICpe5nrmBiUKID5eNsZmdQkgWl2sIVyAXQIABAAlmDroNCmVuZHN0cmVhbQ1lbmRvYmoNMjggMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggMjYvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCg0KZW5kc3RyZWFtDWVuZG9iag0yOSAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9Gb3JtVHlwZSAxL0xlbmd0aCA0NS9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L1Byb2NTZXRbL1BERl0+Pi9TdWJ0eXBlL0Zvcm0vVHlwZS9YT2JqZWN0Pj5zdHJlYW0NCjAuNzQ5MDIzIGcKMCAwIDEwIDEwIHJlCmYKcQoxIDEgOCA4IHJlClcKbgpRCg0KZW5kc3RyZWFtDWVuZG9iag0zMCAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9GaWx0ZXJbL0ZsYXRlRGVjb2RlXS9Gb3JtVHlwZSAxL0xlbmd0aCA3Ny9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L0ZvbnQ8PC9aYURiIDkwIDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1N1YnR5cGUvRm9ybS9UeXBlL1hPYmplY3Q+PnN0cmVhbQ0KSIkq5DJUMFSwAMKiVK5wrjwupxAu/ahElySgSEgal6GepamZgpGekaWRoUJICpe5nrmBiUKID5eNsZmdQkgWl2sIVyAXQIABAAlmDroNCmVuZHN0cmVhbQ1lbmRvYmoNMzEgMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggMjYvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCg0KZW5kc3RyZWFtDWVuZG9iag0zMiAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9Gb3JtVHlwZSAxL0xlbmd0aCA0NS9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L1Byb2NTZXRbL1BERl0+Pi9TdWJ0eXBlL0Zvcm0vVHlwZS9YT2JqZWN0Pj5zdHJlYW0NCjAuNzQ5MDIzIGcKMCAwIDEwIDEwIHJlCmYKcQoxIDEgOCA4IHJlClcKbgpRCg0KZW5kc3RyZWFtDWVuZG9iag0zMyAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9GaWx0ZXJbL0ZsYXRlRGVjb2RlXS9Gb3JtVHlwZSAxL0xlbmd0aCA3Ny9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L0ZvbnQ8PC9aYURiIDkwIDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1N1YnR5cGUvRm9ybS9UeXBlL1hPYmplY3Q+PnN0cmVhbQ0KSIkq5DJUMFSwAMKiVK5wrjwupxAu/ahElySgSEgal6GepamZgpGekaWRoUJICpe5nrmBiUKID5eNsZmdQkgWl2sIVyAXQIABAAlmDroNCmVuZHN0cmVhbQ1lbmRvYmoNMzQgMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggMjYvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCg0KZW5kc3RyZWFtDWVuZG9iag0zNSAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9Gb3JtVHlwZSAxL0xlbmd0aCA0NS9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L1Byb2NTZXRbL1BERl0+Pi9TdWJ0eXBlL0Zvcm0vVHlwZS9YT2JqZWN0Pj5zdHJlYW0NCjAuNzQ5MDIzIGcKMCAwIDEwIDEwIHJlCmYKcQoxIDEgOCA4IHJlClcKbgpRCg0KZW5kc3RyZWFtDWVuZG9iag0zNiAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9GaWx0ZXJbL0ZsYXRlRGVjb2RlXS9Gb3JtVHlwZSAxL0xlbmd0aCA3Ny9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L0ZvbnQ8PC9aYURiIDkwIDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1N1YnR5cGUvRm9ybS9UeXBlL1hPYmplY3Q+PnN0cmVhbQ0KSIkq5DJUMFSwAMKiVK5wrjwupxAu/ahElySgSEgal6GepamZgpGekaWRoUJICpe5nrmBiUKID5eNsZmdQkgWl2sIVyAXQIABAAlmDroNCmVuZHN0cmVhbQ1lbmRvYmoNMzcgMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggMjYvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCg0KZW5kc3RyZWFtDWVuZG9iag0zOCAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9Gb3JtVHlwZSAxL0xlbmd0aCA0NS9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L1Byb2NTZXRbL1BERl0+Pi9TdWJ0eXBlL0Zvcm0vVHlwZS9YT2JqZWN0Pj5zdHJlYW0NCjAuNzQ5MDIzIGcKMCAwIDEwIDEwIHJlCmYKcQoxIDEgOCA4IHJlClcKbgpRCg0KZW5kc3RyZWFtDWVuZG9iag0zOSAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9GaWx0ZXJbL0ZsYXRlRGVjb2RlXS9Gb3JtVHlwZSAxL0xlbmd0aCA3Ny9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L0ZvbnQ8PC9aYURiIDkwIDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1N1YnR5cGUvRm9ybS9UeXBlL1hPYmplY3Q+PnN0cmVhbQ0KSIkq5DJUMFSwAMKiVK5wrjwupxAu/ahElySgSEgal6GepamZgpGekaWRoUJICpe5nrmBiUKID5eNsZmdQkgWl2sIVyAXQIABAAlmDroNCmVuZHN0cmVhbQ1lbmRvYmoNNDAgMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggMjYvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCg0KZW5kc3RyZWFtDWVuZG9iag00MSAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9Gb3JtVHlwZSAxL0xlbmd0aCA0NS9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L1Byb2NTZXRbL1BERl0+Pi9TdWJ0eXBlL0Zvcm0vVHlwZS9YT2JqZWN0Pj5zdHJlYW0NCjAuNzQ5MDIzIGcKMCAwIDEwIDEwIHJlCmYKcQoxIDEgOCA4IHJlClcKbgpRCg0KZW5kc3RyZWFtDWVuZG9iag00MiAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9GaWx0ZXJbL0ZsYXRlRGVjb2RlXS9Gb3JtVHlwZSAxL0xlbmd0aCA3Ny9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L0ZvbnQ8PC9aYURiIDkwIDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1N1YnR5cGUvRm9ybS9UeXBlL1hPYmplY3Q+PnN0cmVhbQ0KSIkq5DJUMFSwAMKiVK5wrjwupxAu/ahElySgSEgal6GepamZgpGekaWRoUJICpe5nrmBiUKID5eNsZmdQkgWl2sIVyAXQIABAAlmDroNCmVuZHN0cmVhbQ1lbmRvYmoNNDMgMCBvYmoNPDwvQkJveFswLjAgMC4wIDEwLjAgMTAuMF0vRm9ybVR5cGUgMS9MZW5ndGggMjYvTWF0cml4WzEuMCAwLjAgMC4wIDEuMCAwLjAgMC4wXS9SZXNvdXJjZXM8PC9Qcm9jU2V0Wy9QREZdPj4vU3VidHlwZS9Gb3JtL1R5cGUvWE9iamVjdD4+c3RyZWFtDQowLjc0OTAyMyBnCjAgMCAxMCAxMCByZQpmCg0KZW5kc3RyZWFtDWVuZG9iag00NCAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9Gb3JtVHlwZSAxL0xlbmd0aCA0NS9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L1Byb2NTZXRbL1BERl0+Pi9TdWJ0eXBlL0Zvcm0vVHlwZS9YT2JqZWN0Pj5zdHJlYW0NCjAuNzQ5MDIzIGcKMCAwIDEwIDEwIHJlCmYKcQoxIDEgOCA4IHJlClcKbgpRCg0KZW5kc3RyZWFtDWVuZG9iag00NSAwIG9iag08PC9CQm94WzAuMCAwLjAgMTAuMCAxMC4wXS9GaWx0ZXJbL0ZsYXRlRGVjb2RlXS9Gb3JtVHlwZSAxL0xlbmd0aCA3Ny9NYXRyaXhbMS4wIDAuMCAwLjAgMS4wIDAuMCAwLjBdL1Jlc291cmNlczw8L0ZvbnQ8PC9aYURiIDkwIDAgUj4+L1Byb2NTZXRbL1BERi9UZXh0XT4+L1N1YnR5cGUvRm9ybS9UeXBlL1hPYmplY3Q+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NlQxMjoyOTo1NC0wNTowMDwveG1wOk1ldGFkYXRhRGF0ZT4KICAgICAgICAgPHhtcDpDcmVhdG9yVG9vbD5EZXNpZ25lciA2LjU8L3htcDpDcmVhdG9yVG9vbD4KICAgICAgICAgPHhtcDpNb2RpZnlEYXRlPjIwMjMtMTEtMTZUMTI6Mjk6NTQtMDU6MDA8L3htcDpNb2RpZnlEYXRlPgogICAgICAgICA8eG1wOkNyZWF0ZURhdGU+MjAyMy0xMS0xNlQxMjoyOTo1NC0wNTowMDwveG1wOkNyZWF0ZURhdGU+CiAgICAgICAgIDxwZGY6UHJvZHVjZXI+RGVzaWduZXIgNi41PC9wZGY6UHJvZHVjZXI+CiAgICAgICAgIDx4bXBNTTpEb2N1bWVudElEPnV1aWQ6M2IwZjRiODktMjA3ZC00ZmVhLWIyNzMtMDU1ZDc2NDExYjFkPC94bXBNTTpEb2N1bWVudElEPgogICAgICAgICA8eG1wTU06SW5zdGFuY2VJRD51dWlkOmM0MGMzODgzLTRiNjItNGE0My04Y2U5LTUyMDM1ZDA4MDQyMzwveG1wTU06SW5zdGFuY2VJRD4KICAgICAgICAgPHBkZnVhaWQ6cGFydD4xPC9wZGZ1YWlkOnBhcnQ+CiAgICAgICAgIDxkYzpmb3JtYXQ+YXBwbGljYXRpb24vcGRmPC9kYzpmb3JtYXQ+CiAgICAgICAgIDxkYzpkZXNjcmlwdGlvbj4KICAgICAgICAgICAgPHJkZjpBbHQ+CiAgICAgICAgICAgICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+RW1wbG95ZXIncyBBbm51YWwgRmVkZXJhbCBUYXggUmV0dXJuPC9yZGY6bGk+CiAgICAgICAgICAgIDwvcmRmOkFsdD4KICAgICAgICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgICAgICAgPGRjOmNyZWF0b3I+CiAgICAgICAgICAgIDxyZGY6U2VxPgogICAgICAgICAgICAgICA8cmRmOmxpPlNFOlc6Q0FSOk1QPC9yZGY6bGk+CiAgICAgICAgICAgIDwvcmRmOlNlcT4KICAgICAgICAgPC9kYzpjcmVhdG9yPgogICAgICAgICA8ZGM6dGl0bGU+CiAgICAgICAgICAgIDxyZGY6QWx0PgogICAgICAgICAgICAgICA8cmRmOmxpIHhtbDpsYW5nPSJ4LWRlZmF1bHQiPjIwMjMgRm9ybSA5NDQ8L3JkZjpsaT4KICAgICAgICAgICAgPC9yZGY6QWx0PgogICAgICAgICA8L2RjOnRpdGxlPgogICAgICAgICA8ZGVzYzp2ZXJzaW9uIHJkZjpwYXJzZVR5cGU9IlJlc291cmNlIj4KICAgICAgICAgICAgPHJkZjp2YWx1ZT45LjAuMC4yLjIwMTAwOTAyLjIuNzIwODA4PC9yZGY6dmFsdWU+CiAgICAgICAgICAgIDxkZXNjOnJlZj4vdGVtcGxhdGUvc3ViZm9ybVsxXTwvZGVzYzpyZWY+CiAgICAgICAgIDwvZGVzYzp2ZXJzaW9uPgogICAgICA8L3JkZjpEZXNjcmlwdGlvbj4KICAgPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgIAo8P3hwYWNrZXQgZW5kPSJ3Ij8+DQplbmRzdHJlYW0NZW5kb2JqDTc4IDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9GaXJzdCAxNS9MZW5ndGggODMvTiAyL1R5cGUvT2JqU3RtPj5zdHJlYW0NCmjeMjI0MlEwUDAyNDJVMLNUsLHRd84vzStRMNP3zkwpjjYyNDYCSgcpGIJJEzBpDiYtIeJgTqx+SGVBqn5AYnpqsZ2dRmqebmiwJkCAAQCxhxXBDQplbmRzdHJlYW0NZW5kb2JqDTc5IDAgb2JqDTw8L0ZpbHRlci9GbGF0ZURlY29kZS9GaXJzdCA3L0xlbmd0aCAxNjYvTiAxL1R5cGUvT2JqU3RtPj5zdHJlYW0NCmjefM07C4MwGIXhv5LNZGhzqQoGEcTLJogKnVP9aC2alJhA++9roVOHTmd5H47gIkYMpSnNvbsZi/tKnmWRd7JpCS0sKDcbXSoHuJSCiRPnPOZCJFF4YFHAWPCtdlrCNl81WBQfI0IbM/1nrTWTH+HX9f5yh9Hhan0s5gU22FCutVcLqmECu++gnqgD560mdJjdAvjzgGpjV5SEIcmytwADAGalPqoNCmVuZHN0cmVhbQ1lbmRvYmoNODAgMCBvYmoNPDwvRGVjb2RlUGFybXM8PC9Db2x1bW5zIDUvUHJlZGljdG9yIDEyPj4vRmlsdGVyL0ZsYXRlRGVjb2RlL0lEWzw0QkUyQzQ1QTI1OURDODQ1QTdFREI0NkI5QzhBMTU2OT48NUY0RDA5N0ZFNjVCRUE0OTlBNEFCQTMxOEM0RTBDOEM+XS9JbmZvIDIxMjYgMCBSL0xlbmd0aCAzMDYvUm9vdCAyMTI4IDAgUi9TaXplIDIxMjcvVHlwZS9YUmVmL1dbMSAzIDFdPj5zdHJlYW0NCmje7NI9L0RBGIbhOWfPhkWhoNWQqBRKRDR6jVCsSrT4Bwo/QSVBgn+gI7TbEjSEWqh8dL6Wfe/GRiQ20cl9iitvnplMJnOePMWXZ2nlIOUpZa9hzzDzI76Fvc/MJ3iGpzgedt2GaTrMz8mHwmISp8jnyR/CtifmC6zh4NecyHOSVGva2bSnleTv5xSHzNy2OGqYbffHXLojmeXkdeZV5kVWl8PKbth+H3YukPC2xX5YXuMdlkhGcQcnWN3EDk7gxUojJMfs2YiblAdYHWN1hnyO21bD7kvmPSwa/7d+dc0NS8jJjZXf7Xv5Oa+8f0+yeqtnqrZutuU7qL1Se6X2StVeqb1Se6Vqr9Reqb1StVdqr9ReqdortVdqr1TtldortVeq/61X+U3TbT8+BRgAKcVc8A0KZW5kc3RyZWFtDWVuZG9iag1zdGFydHhyZWYNCjExNg0KJSVFT0YNCjIxMjggMCBvYmoKPDwvQWNyb0Zvcm0gMjE0OSAwIFIvRXh0ZW5zaW9uczw8L0FEQkU8PC9CYXNlVmVyc2lvbi8xLjcvRXh0ZW5zaW9uTGV2ZWwgMTE+Pj4+L0xhbmcgMjEyNSAwIFIvTWFya0luZm88PC9NYXJrZWQgdHJ1ZT4+L01ldGFkYXRhIDc3IDAgUi9OYW1lcyAyMTUwIDAgUi9QYWdlcyAyMTI0IDAgUi9TdHJ1Y3RUcmVlUm9vdCA5NyAwIFIvVHlwZS9DYXRhbG9nL1ZpZXdlclByZWZlcmVuY2VzPDwvRGlzcGxheURvY1RpdGxlIDIxNTUgMCBSPj4vUGVybXMgMjE3MiAwIFI+PgplbmRvYmoKMjE3MSAwIG9iago8PC9UeXBlL1NpZy9GaWx0ZXIvQWRvYmUuUFBLTGl0ZS9TdWJGaWx0ZXIvYWRiZS5wa2NzNy5kZXRhY2hlZC9SZWZlcmVuY2VbPDwvVHlwZS9TaWdSZWYvVHJhbnNmb3JtTWV0aG9kL1VSMy9UcmFuc2Zvcm1QYXJhbXM8PC9WLzIuMi9UeXBlL1RyYW5zZm9ybVBhcmFtcy9Nc2coVGhpcyBpcyBhIFJpZ2h0cy1FbmFibGVkIFBERiBEb2N1bWVudCkvRG9jdW1lbnRbL0Z1bGxTYXZlXS9Bbm5vdHNbL0NyZWF0ZS9EZWxldGUvTW9kaWZ5L0NvcHkvSW1wb3J0L0V4cG9ydC9PbmxpbmVdL0Zvcm1bL0ZpbGxJbi9JbXBvcnQvRXhwb3J0L1N1Ym1pdFN0YW5kYWxvbmUvT25saW5lL0FkZC9EZWxldGVdL1NpZ25hdHVyZVsvTW9kaWZ5XS9QIGZhbHNlL0VGWy9DcmVhdGUvRGVsZXRlL0ltcG9ydC9Nb2RpZnldPj4vRGF0YSAyMTI4IDAgUj4+XS9OYW1lKEFSRSBQcm9kdWN0aW9uIFY4LjEgRzMgUDI0IDEwMDc2ODUpL00oRDoyMDIzMTExNzA4NDMzNS0wNScwMCcpL0NvbnRlbnRzPDMwODAwNjA5MmE4NjQ4ODZmNzBkMDEwNzAyYTA4MDMwODAwMjAxMDEzMTBiMzAwOTA2MDUyYjBlMDMwMjFhMDUwMDMwODAwNjA5MmE4NjQ4ODZmNzBkMDEwNzAxMDAwMGEwODAzMDgyMDYxYjMwODIwNDAzYTAwMzAyMDEwMjAyMTAwOTAxMzU3YTQ2YzMwZDE3YjJmN2Q2NGI0NTNjMDgxODMwMGQwNjA5MmE4NjQ4ODZmNzBkMDEwMTBiMDUwMDMwNzUzMTBiMzAwOTA2MDM1NTA0MDYxMzAyNTU1MzMxMjMzMDIxMDYwMzU1MDQwYTEzMWE0MTY0NmY2MjY1MjA1Mzc5NzM3NDY1NmQ3MzIwNDk2ZTYzNmY3MjcwNmY3MjYxNzQ2NTY0MzExZDMwMWIwNjAzNTUwNDBiMTMxNDQxNjQ2ZjYyNjUyMDU0NzI3NTczNzQyMDUzNjU3Mjc2Njk2MzY1NzMzMTIyMzAyMDA2MDM1NTA0MDMxMzE5NDE2NDZmNjI2NTIwNTA3MjZmNjQ3NTYzNzQyMDUzNjU3Mjc2Njk2MzY1NzMyMDQ3MzMzMDFlMTcwZDMyMzIzMDMyMzEzMTMwMzAzMDMwMzAzMDVhMTcwZDMzMzUzMTMyMzMzMTMyMzMzNTM5MzUzOTVhMzA3ZTMxMmIzMDI5MDYwMzU1MDQwMzBjMjI0MTUyNDUyMDUwNzI2ZjY0NzU2Mzc0Njk2ZjZlMjA1NjM4MmUzMTIwNDczMzIwNTAzMjM0MjAzMTMwMzAzNzM2MzgzNTMxMWQzMDFiMDYwMzU1MDQwYjBjMTQ0MTY0NmY2MjY1MjA1NDcyNzU3Mzc0MjA1MzY1NzI3NjY5NjM2NTczMzEyMzMwMjEwNjAzNTUwNDBhMGMxYTQxNjQ2ZjYyNjUyMDUzNzk3Mzc0NjU2ZDczMjA0OTZlNjM2ZjcyNzA2ZjcyNjE3NDY1NjQzMTBiMzAwOTA2MDM1NTA0MDYxMzAyNTU1MzMwODIwMTIyMzAwZDA2MDkyYTg2NDg4NmY3MGQwMTAxMDEwNTAwMDM4MjAxMGYwMDMwODIwMTBhMDI4MjAxMDEwMGIwMGUyN2ViZDRmZWE2YWVkZGMzNWMyMjNlMWM0OGFmOTQzYmEzYmQ5NTJiNjE5MmI0N2EyMTkyNWE0M2MxMjkxNzFjNWM5NmVlMzY4OTk2ZjI4NTUyOGQzMmMwYzBmZTExZDdjMWNhN2ZmODgwM2YxNzBlN2I5NmY5OWRmNjJmZjFhYmNlZjNmN2E0MDQ1MGEyMzI0MDUwNDQ3NWI2MTg4YjVlYjM0MmRmMGZlMDBkODlhMTUzMDFkNzczYTBiZTdmMjg2ZDYzMDBiZmFiMmU0ZWQwY2MwMGQ2NmM4Nzk4YmI5ZWZhNDRmMTkzYWFjNDI0YzQ5YjM5ZjViOTRmYzIwNTMwNGE3M2UzMmFjODQ2ZDdlYjgyM2ZiMGM4YjkzNDAxMmZlNzU1MWY2N2E4ZWM2OThlMTk0YzVkMzhhNDUyODMxNThiZGIxNTkyNGVjZDYzMTI1MGEyZjQ3MGQxN2RhNDIwOTg1MThkYTA5OTkyZTBiMzE3MWExNDM5ZGI5YTcyMzBkMThiY2MzNTU1NTZiZDBjNDhjOGEyYjkwZGUyMGU0ODllYThmY2I0YTRjOWEyNTUwMWE5YmY3ZDBkZjE3ZDIxNzc4MGI5YjdjMjY1YzI4NTZhNzYzZmRmZGEyYTdmN2QyYzc0NTRiNmQ2ZGFiOGViNWFiMTU2ZWI2OGIzMDIwMzAxMDAwMWEzODIwMTljMzA4MjAxOTgzMDBjMDYwMzU1MWQxMzAxMDFmZjA0MDIzMDAwMzAwYjA2MDM1NTFkMGYwNDA0MDMwMjA3ODAzMDE0MDYwMzU1MWQyNTA0MGQzMDBiMDYwOTJhODY0ODg2ZjcyZjAxMDEwNzMwODE4ZTA2MDM1NTFkMjAwNDgxODYzMDgxODMzMDgxODAwNjA5MmE4NjQ4ODZmNzJmMDEwMjAzMzA3MzMwNzEwNjA4MmIwNjAxMDUwNTA3MDIwMjMwNjUwYzYzNTk2Zjc1MjA2MTcyNjUyMDZlNmY3NDIwNzA2NTcyNmQ2OTc0NzQ2NTY0MjA3NDZmMjA3NTczNjUyMDc0Njg2OTczMjA0YzY5NjM2NTZlNzM2NTIwNDM2NTcyNzQ2OTY2Njk2MzYxNzQ2NTIwNjU3ODYzNjU3MDc0MjA2MTczMjA3MDY1NzI2ZDY5NzQ3NDY1NjQyMDYyNzkyMDc0Njg2NTIwNmM2OTYzNjU2ZTczNjUyMDYxNjc3MjY1NjU2ZDY1NmU3NDJlMzA1ZDA2MDM1NTFkMWYwNDU2MzA1NDMwNTJhMDUwYTA0ZTg2NGM2ODc0NzQ3MDNhMmYyZjcwNmI2OTJkNjM3MjZjMmU3Mzc5NmQ2MTc1NzQ2ODJlNjM2ZjZkMmY2MzYxNWYzNzYxMzU2MzMzNjEzMDYzMzczMzMxMzEzNzM0MzAzNjYxNjQ2NDMxMzkzMzMxMzI2MjYzMzE2MjYzMzIzMzY2MmY0YzYxNzQ2NTczNzQ0MzUyNGMyZTYzNzI2YzMwMzcwNjA4MmIwNjAxMDUwNTA3MDEwMTA0MmIzMDI5MzAyNzA2MDgyYjA2MDEwNTA1MDczMDAxODYxYjY4NzQ3NDcwM2EyZjJmNzA2YjY5MmQ2ZjYzNzM3MDJlNzM3OTZkNjE3NTc0NjgyZTYzNmY2ZDMwMWYwNjAzNTUxZDIzMDQxODMwMTY4MDE0NTcyOTdhMzI0ZGNjZmVlNDM1NGVjMDFmMjQ3M2NlNzM1M2FiZGY2YTMwMWIwNjBhMmE4NjQ4ODZmNzJmMDEwMTA3MDEwNDBkMzAwYjAyMDEwMTAzMDMwNGZmZjAwYTAxMDMzMDBkMDYwOTJhODY0ODg2ZjcwZDAxMDEwYjA1MDAwMzgyMDIwMTAwMjJhNmUwNGJhMmYzOWJmODdiZjAyZDdhN2ZiN2I5ZTliYzdjYjI1NjExZDdhNjk0YTM4YjQ0MDdiYWZhOWNiZGRmODlhMDkxMDdkOTA1NjQ3MmJkNTRjY2E0MWE2MjZkOTNiYWFhODk1NjkwZTZkNmNhNTNiNjgyOGJkOWMyN2QyMDdmZjFjYTViM2RhYTYyOWVkYjRiMmJlNDJjNjQyMjAwZjU2M2E0MGZjZWUyYmNmZGEwMGYyMGU0NGEwYjRhYjQ5YWM5MjI3YjFhZWQ4NTYzMDU5MDg2MzkzZDIzYzM3N2VmYjk5NjU1MjhlMTRlZjlkOTAwN2U5YTcwMmI5N2RjNjMxNjBkNDBjZWE4ODNhM2RiMmE0YjE1MGNkMDU0NmE3NzM1Mjk2Y2FmNGZjOTViMDkxY2QxYjdjNDg3NmRiYzZlODk4OTM2Y2Y5OGFhMjEyYWFmZWJhNGFkZjU1YjgxNDAzMGYwMWUxMTdkOTQ4ZTk3NWI1YmI5M2I4YzVmNjQ3OTA5ZWUxNzE0N2ExOWMyMDAyY2VlYmZmZDY1MjNjNDdkYzRiNDEwODE5NWVjNGYwNjEyYzJiYTliYWU4NWYxNjgxMWU1OGU1MDg2OWMxMmMyYWVkZWM0YzI4NDUxM2U0NzZkZTJjZjI4MGFlY2E0MTJjMDg1ZjQ2YTU4MjVjOTllN2Y3Y2JlNTE0YWU4YTk3NGExYzQ4ZTI5NjcwNzMyZmE3MWMzOGNlM2ZiZTk2MTk0ZjZjNzdjMDA2MzkxZTRiNzlmNDVmODE3ZjhkOWQ0ZGQwMmU2ZjIyOGU1MzM5MWM5ZmVkNzIyYjJhYWUyNDBhYzIzMGIyNWI4NGMyNDUyMjZjNzU2YmE5ZTZhYWIyZWQ0MWYzZTdiNTdhOWViMTRlMjU2ODNhNDE4MjQ4YjRkOTZkNWRmNDUyMTYyYTg2NTU0MGYyZmJhMDVmNjllZTY0NjczMzY1YmQ0ZGIwMWY1OGRhZDkxMzg5Nzc4MzczOTNhYzVmYWUxZWMzYzAyNjk2MTU3NWVkZTI4NGNlMGZhYTY4ZGZlZThlNTBhZGVkM2Q3ZTJhZTgwZWQ3MDE0NzhkN2VlOGU2YjgyYjJkZjE0MjQ2ZDJkODM0Y2FkNjM2NjhkMDMzYzE0Y2QzZDM3OWNkYzBhZjg4MTUxMjc5YjE4YTNkNjFkOTZkYzVlYjI0NjZiYzhiY2ZhZTYzOThkYzBlNjc3MTU1OGM4ZGUyYjQzMGM5MDNhZWNiN2EyZDY4MjM0M2E5YmRhOWY4M2QxMDcwYzNhYmIwOTI3NDU1MmRjYTg3MjczZTE1NDc0YmUyNGQxNjdiMzczOGJhMGZkODYxN2UyYjkyZTNhYjM2NDMwODIwNmExMzA4MjA0ODlhMDAzMDIwMTAyMDIxMDBjYThiNjU0N2I4OWU2ZDIwNjg5NzVjZDhiOWI4OWUyMzAwZDA2MDkyYTg2NDg4NmY3MGQwMTAxMGIwNTAwMzA2YzMxMGIzMDA5MDYwMzU1MDQwNjEzMDI1NTUzMzEyMzMwMjEwNjAzNTUwNDBhMTMxYTQxNjQ2ZjYyNjUyMDUzNzk3Mzc0NjU2ZDczMjA0OTZlNjM2ZjcyNzA2ZjcyNjE3NDY1NjQzMTFkMzAxYjA2MDM1NTA0MGIxMzE0NDE2NDZmNjI2NTIwNTQ3Mjc1NzM3NDIwNTM2NTcyNzY2OTYzNjU3MzMxMTkzMDE3MDYwMzU1MDQwMzEzMTA0MTY0NmY2MjY1MjA1MjZmNmY3NDIwNDM0MTIwNDczMjMwMWUxNzBkMzEzNjMxMzEzMjM5MzAzMDMwMzAzMDMwNWExNzBkMzQzMTMxMzEzMjM4MzIzMzM1MzkzNTM5NWEzMDc1MzEwYjMwMDkwNjAzNTUwNDA2MTMwMjU1NTMzMTIzMzAyMTA2MDM1NTA0MGExMzFhNDE2NDZmNjI2NTIwNTM3OTczNzQ2NTZkNzMyMDQ5NmU2MzZmNzI3MDZmNzI2MTc0NjU2NDMxMWQzMDFiMDYwMzU1MDQwYjEzMTQ0MTY0NmY2MjY1MjA1NDcyNzU3Mzc0MjA1MzY1NzI3NjY5NjM2NTczMzEyMjMwMjAwNjAzNTUwNDAzMTMxOTQxNjQ2ZjYyNjUyMDUwNzI2ZjY0NzU2Mzc0MjA1MzY1NzI3NjY5NjM2NTczMjA0NzMzMzA4MjAyMjIzMDBkMDYwOTJhODY0ODg2ZjcwZDAxMDEwMTA1MDAwMzgyMDIwZjAwMzA4MjAyMGEwMjgyMDIwMTAwYjcxZjJlYmRiZDA5YjM1YzQ4NmNmZTBjODNhZTZjMDFlYTUxNzgyNWE0ODAzZTg5YTdiMWIyODg2NGRhZjY4OTc2ODFmOWY5MWRmMzk1ZmM3ODk4OGQ5ODhlY2ZlNGVlMWM1NTNlMGQ3MzVhNzdjZWIxMTJhODE1Nzg2NTRjOTZmMjA3MTllZmM0MWRjMjgxYzZmMTAzNWRkOTUzNWMxZTczMjA0OTFmOTc0ZmQyMWE3ZWM5ZWFmNGQ3ZjBjMzcyNmRmNGEyZjc5NzkwMGQ0Mzk5ZjVmOGMyNmFhZjhmMDQ1OGQyZTU5N2RlMzY2Y2UyZmYyNDdlMzJjMDM0OGNhMmE4NTlhYWQyNDQyMTQ1MTQxYTU0MTUwNTlmMDIwMmYyNWNlY2IxM2E3NWQwMzkwYjlkOGYxMzYzZTk2YmI0NWY0MjAxZDc3Zjg4MWY1ZDU2NzBhNzE2MTE2NWNjZTIzZTIzODdhODRiY2I2ZjQyNzc3MTI4NTQ2ZGU4YzVjNTVlOWNjMTdmMTBjODAzZGFkNWUzYzc4MzU0NmQzMzQxZDdmODNkZjhjNDdhMzcwZTRjODY5ZTY0ZmUwZGRhYjRkMTMxMDMxODZkYmEwMGJlNGY3NDgzNGExNDg0MjVmYjM2YWFlOGEyNDU0MWVkNWY3NDYxMzljMmI1YjM1Mzg5ODEzZTZjZGFjZjcxMWIyZTdmYmIxNTY5NzAwMjFhMmI2MmEyMGM5NWQ2ZGYxYzRkZjI3NWNmOWE0ZDRkNDk1YmJmOWIxYjVmNmE5YWY4NGVmNDg5NmUxYWQ0ZWQ0MDM3YWExNDE4ZjY3ZTBlOWY2YjFiMWY1NWY1NGYwZmJiMmQzN2E0ZjBhMDgwZTU5MGUwODRlMTExM2UyMjI5ZmM5YjdjZjc3YWE4YmY1NmM0ZTZiMjY0NmEwNzE1ODM0NWFhOGUxZjNkMzYxMDlhMDQwZjE1YzkxYjc3YTJmOTQ2YzgyMjlkMzU1ZDk0MmY3NmU3ZTZmNzQ1YjEzOTNiYWFhOWE5ZjY2NmE0Y2Y1ZmQyYjk1NWQ4YzQ4N2ZhMmZhZmJjNDU3MzlhYjU3NTlhM2U0OWFlNzJlMmM0ZDUzM2NlNzhmZWQyZDRkZTQ5NGU4MTQyYjNjZDI1ZDgzZDg0YjcxYTEwNWM2MDkxZTNjMmJmNzEzNTExZTczNTdmN2QwZmExNzQ4M2IzYTI4ZDI3MTY3ZWZiNjNjNjFkNzc2OTNiZmYxZjQxMTNiZjI5OWE4NzhjOWYwZTk1NWQ4N2Q3MGFlNTg0ODIzZWE5ZWUzYTViMmU4YzUwMzI4NThjMDk1Y2U1ODNiZDk2NTRkODQ5MTY1NGIwZTFhMGZjN2RjZTllY2RlMTAyMDMwMTAwMDFhMzgyMDEzNDMwODIwMTMwMzAxMjA2MDM1NTFkMTMwMTAxZmYwNDA4MzAwNjAxMDFmZjAyMDEwMDMwMzUwNjAzNTUxZDFmMDQyZTMwMmMzMDJhYTAyOGEwMjY4NjI0Njg3NDc0NzAzYTJmMmY2MzcyNmMyZTYxNjQ2ZjYyNjUyZTYzNmY2ZDJmNjE2NDZmNjI2NTcyNmY2Zjc0NjczMjJlNjM3MjZjMzAwZTA2MDM1NTFkMGYwMTAxZmYwNDA0MDMwMjAxMDYzMDE0MDYwMzU1MWQyNTA0MGQzMDBiMDYwOTJhODY0ODg2ZjcyZjAxMDEwNzMwNTcwNjAzNTUxZDIwMDQ1MDMwNGUzMDRjMDYwOTJhODY0ODg2ZjcyZjAxMDIwMzMwM2YzMDNkMDYwODJiMDYwMTA1MDUwNzAyMDExNjMxNjg3NDc0NzA3MzNhMmYyZjc3Nzc3NzJlNjE2NDZmNjI2NTJlNjM2ZjZkMmY2ZDY5NzM2MzJmNzA2YjY5MmY3MDcyNmY2NDVmNzM3NjYzNjU1ZjYzNzA3MzJlNjg3NDZkNmMzMDI0MDYwMzU1MWQxMTA0MWQzMDFiYTQxOTMwMTczMTE1MzAxMzA2MDM1NTA0MDMxMzBjNTM1OTRkNDMyZDM0MzAzOTM2MmQzMzMzMzAxZDA2MDM1NTFkMGUwNDE2MDQxNDU3Mjk3YTMyNGRjY2ZlZTQzNTRlYzAxZjI0NzNjZTczNTNhYmRmNmEzMDFmMDYwMzU1MWQyMzA0MTgzMDE2ODAxNGE2MWNlMTZkNTQyNDRjYTg4ZjQ4NzJiZjZlYTk4Y2Q1ZTRlYzMxZDQzMDBkMDYwOTJhODY0ODg2ZjcwZDAxMDEwYjA1MDAwMzgyMDIwMTAwNzFjZWU1MDc4Y2E2ZGMyZGRjYzhlMDNiNjU1ZTAwOTI4MTk1ZWI5NTIwMjRhZjlmNjkzODVkYzk3Y2YxYjhkYWE1NGQwMDY1M2IyNWMxMTg1YzllYmU1OWI3ZGMxYjA2M2I1OTgzMjVmYTMzYmIyMmYyNGY2ZmJiMjE1YzU2MTZmNWI5Yzk4MzE1ZmI5NGI1MzVlMGExMzE3MjE5OWMyY2Q2MzU3OWVlODg4NDEyNzY2M2MzZjM2NGM0NTQyOTI3NzkwYTQ1MTEzZTBkMGYwNGIxYTNjZmYyOTFmYzNhMWYxZjFmODZlMmIzZDMwOGUxOGU0NThjNWU2MmI3NzRkNjU3MjJlNjE1NzFiY2E3MWNiYzg5M2IzMDNlYmQ2NTM3YjA3ZDkzZDIzM2VkMTY5ZWM1Mzc3ZjQ2NjY3N2I4NjA2ZDFhNTRjOTY3MWUxYjQ3ODcxNjk3NTQyOGFmZDkxNTY4NDc4YzM1NDJkYmNhMWQwYTczN2NmMzliNDc5ZGMyOTdiZTIyMmQyYjQ2NTQ1MjhmYzAyMmQ4NDUyYTU4NDQ1ZWM5ZWFmNTUyZmQ3YzU2ZTBiY2VmMzc2NmZhNTQ0MjhlNzJmMjY2Mzc3MmUxYTcxMTUxOTc3NjE4Y2Q2ZjlkYzI3YzJkNmVlMWQ2ZTk2MjY1OWEzN2RmNmNiOWI1MzMxMmM1MWE1MWJkZTVhMGIzZGY1NWZjYzMzYTk4MzZjYmRiZjdlZTQwNWRjYmZjMmU1ZWJkYjRiNWU2M2I1M2FkYjE4ZmY3YzA4MmNkNTA0YTc4NTRiNjUzMTM3YzJhOWI3OWZjODRjOWMyOTU5OGEyMmIyNjQyNGJiMmY4MTM0OTgyOTViYzdlMDUxNDhjMWY3Nzk1YTNhOGUwYmRlZTM1ZmRmMmI3MTUwMzM4NDAyMzQ4OTI5MWFjZWM1OGUzMmYyZmE5YjQyZjg5Y2IyNWFhNzFmYmNlNDZiMTU1ZmM2M2EwMDc5ODQzZjg2ZTYwODQ5NzA4YTVlOGEwMGZmOTQ3YjAyNDU4YjBlNmI5YjA1NzZhNDQ0ODcwMjE2MmU2NDk2YjRkYzFmMmQ5NzQ5ZGRkOTAyNzNiYzkxYTY2ZGUwNmE1ZWFhNDVmNGU0NjI5YzUzMzcxYzRhY2FmMjliOTFhMjQzYTMxNDdkYmVkNWFiMGI3ODhkYWQwNzdkNTZmYzQyZGQzNWVkYmIzYTA3NmVhYmE2N2FhODFjMDJhNzlmNTg1ZjZlZWFjOWQwZTEwZjQ1OTE3Y2RlYjg5MDJiMzZlNGFmM2M4ODYwMDYzNTZkODIwMWY0YzM0YmU2ZmU1OTgyNDE4ODgyZmQ4ZDc2MTllMGIxN2UwNjI1MmY3ZGRiYjMwODIwNWE0MzA4MjAzOGNhMDAzMDIwMTAyMDIxMDVkZjEyZjVmNTdhN2MzZTFiMDAyZDg5MzI3MGNkZGUxMzAwZDA2MDkyYTg2NDg4NmY3MGQwMTAxMGIwNTAwMzA2YzMxMGIzMDA5MDYwMzU1MDQwNjEzMDI1NTUzMzEyMzMwMjEwNjAzNTUwNDBhMTMxYTQxNjQ2ZjYyNjUyMDUzNzk3Mzc0NjU2ZDczMjA0OTZlNjM2ZjcyNzA2ZjcyNjE3NDY1NjQzMTFkMzAxYjA2MDM1NTA0MGIxMzE0NDE2NDZmNjI2NTIwNTQ3Mjc1NzM3NDIwNTM2NTcyNzY2OTYzNjU3MzMxMTkzMDE3MDYwMzU1MDQwMzEzMTA0MTY0NmY2MjY1MjA1MjZmNmY3NDIwNDM0MTIwNDczMjMwMWUxNzBkMzEzNjMxMzEzMjM5MzAzMDMwMzAzMDMwNWExNzBkMzQzNjMxMzEzMjM4MzIzMzM1MzkzNTM5NWEzMDZjMzEwYjMwMDkwNjAzNTUwNDA2MTMwMjU1NTMzMTIzMzAyMTA2MDM1NTA0MGExMzFhNDE2NDZmNjI2NTIwNTM3OTczNzQ2NTZkNzMyMDQ5NmU2MzZmNzI3MDZmNzI2MTc0NjU2NDMxMWQzMDFiMDYwMzU1MDQwYjEzMTQ0MTY0NmY2MjY1MjA1NDcyNzU3Mzc0MjA1MzY1NzI3NjY5NjM2NTczMzExOTMwMTcwNjAzNTUwNDAzMTMxMDQxNjQ2ZjYyNjUyMDUyNmY2Zjc0MjA0MzQxMjA0NzMyMzA4MjAyMjIzMDBkMDYwOTJhODY0ODg2ZjcwZDAxMDEwMTA1MDAwMzgyMDIwZjAwMzA4MjAyMGEwMjgyMDIwMTAwYjZkYTcyNjI5YmVlODM3YjMyYTI0NmUzOGEyMzMyOTc1N2FjMmQ3Mzc0NTFjYjA2ZmY3YjMyZTY5NzBjYWNjOGU3ZDkyMDY3NDg0YWY3NGQyNTgxNGYyMjVkNmY2OWRhMmMxODQyY2ZjNTZjOWQzZTcxMzQ3MTUyNTJhMWI2MWE1YjlkMTRjZGJiOGQ5MWU0YjE4OGY5NzAwZjZkMGNlN2M2YTdlYmYzNjQ5YzRmNWQ0MWMwNWZlNjE3ODg0MDRjZWIwM2NiOTVlZmIyYTVlNjhlMzhiZDFjMjM3OTU3YzMyMjcxMDRjOTcxMGViMzJiZDViZDUzOWRhNmVlNTJlZGRlZjJiNTRmZjc5MDI4NTJmZDUwMTc3ZTI0ZGQzN2Q4MGExMjFiMTM4YmEzMTQzOWU2YTk0OWE3YzZkNTRjMTZjMTVmNmRiNDY3MGFlNzFhOTk3NjQzOWY0NWVjY2MxY2Y0YTQxMjUwNmZmYTkwOWZlNjZhYThiYjk3OTEzZmZkZTUyMDhmZTA4ZmY5NjNiY2Q5YzViOTVkMDk4Y2E3OTY5MjY3YTg2MGQ1ZDViNjc0MTJjMzc1ZDExOTdiYmZmMzk3OGRkZTVhOWY5MmYwMzQ0MWNiMzQyODdjM2I3ZWM4MDJhNGE3YjMwOTJiOTU1ZDg2MWUxMTljYzE5ZDAyNDkyMGQ2Y2VkZWRhOGIzMTFiNGY3NDg0ODdlYWMxNWUyOTEzOTliYjQxM2UyMjkwZDI2NmM3MWEyYmJkOTM0NDRkZjNiZTE3MTA4OWEzYmRhMmVmMjMzMjk5OTU4Nzk4YTVjZTZlZjk2ZTNlZjA3MmNlYTU2OWI4NTNlNTc3MmMwYWJkOTgwNzIyZDdiYmRmNDRkOWQ4OTY2ZDljMGFkN2ViN2YzZjAwZjhjMzI4N2RlMTI1MTI0ZDlmMWYwYTFmNmZkNjU4ZDRkZTkzNjIxOGYyZmJiMjMwY2FjNWJhNDI4Y2NjMzhhMDk2YTdjYmQ5MDFiM2M5NmE0ZTZjYzRkYWNlMWJjZmZkOWQ4YzMyM2I1NjU2ZDMyODY1ZTE5Yzc5NDRkZjRhYWViODFjZGMzMzE2NDY2OGNmN2FjZTNkOGJiNTY1OGMzOGY3NzNjNDhlYTY5OGU1ZmM0ODMyZDA1ZGZlNGJmNjliOTU5MjE1NDUzMDA0MGQ5ZTI1NjJhNGM3NGJiZjcxOWY3NTY0MDdmMTRiMGI4NjZkYWE2NTBlZmFmZDM3MzIwOTVkMTc2ZDg5OTQ0MDIzODdlOWI0NTM5NWNkMjM2ZjA5MGY0MmNjYWVkMDQxMWFkYjZjYjc0NThlYzMwZmRkNWM1MjdlYzIwOTcyYjcwYzAxMzQ4MzJlNmU4MTAyMDMwMTAwMDFhMzQyMzA0MDMwMGUwNjAzNTUxZDBmMDEwMWZmMDQwNDAzMDIwMTA2MzAwZjA2MDM1NTFkMTMwMTAxZmYwNDA1MzAwMzAxMDFmZjMwMWQwNjAzNTUxZDBlMDQxNjA0MTRhNjFjZTE2ZDU0MjQ0Y2E4OGY0ODcyYmY2ZWE5OGNkNWU0ZWMzMWQ0MzAwZDA2MDkyYTg2NDg4NmY3MGQwMTAxMGIwNTAwMDM4MjAyMDEwMDk1ZmE3NTYzYmY2YTI2MTMzNjk3NDQyMGE1YTVlMjc5ZTEwMWVmMDgxNDQ0ZDk0MDQxMTNkMDNhM2MzNmUwZDk2NjljY2UwYWFhZWNmMWY0YjQ5NWEwZmQ0NDNlNTRmMWZiNzkyZWQxZDE5YzRkODg1OTg4MWIwYjRkZTM5MzhjYzRmODhmN2VhM2U2MzI5MzU5ZjVhZWI4NmMxMDZlODZiMGI1MjdlZDZlNjViYjA2Y2NiOWM3YzY0NDUzYjgzYmQyZGExOTQ3NjFkNTk1NzZkYTQ3OGU4Mjg2MjljNzk0ZGJiYmY0ODVjMWI1NjY2YzZkZDFiZWZkYmI2MzFhYjU2MGU5YzQwMGIzNzUzZjE4MDE2Y2EwYmUwNmQ0YzkyYTU3YWIyMTBlZjFkMDM2Mzk3MzEwMTZlNDRiNDIxZDcyZmI3ZTI3N2IyYTlmZjNhNjI1NGYyZDAyYWNjZGM3YjdiNjQ0YjUwOGQ5OTFmODBkM2Q1MDhkNTY5ZDgyMjkzOTUxNTMzZDAwMDc5MzRiNTgxM2IwOGE3NzljMjBhMjc3NjY4NWQwY2E1ZTIxOWE3NWJiNmU0NGYzMjQxMWM0MTYxZTU0NWEyM2Q1OTYyZGM3MDYxZjczM2RkN2U4MGViYzgwODZmYTY0MTc5MWNjZmFiZWMyZGYxYjEyOTRiYzg3OGVjZWVhMTI3OWE3MjM0MTZkZGE4MTBkZWU5MjU1ZGMzM2VkOTUyZDhjNjA0NDI0Y2U2ODczYWYyM2Y5MDM1Mjg2NzkxZWRiN2ZkZGI4ODc4YWQyM2EyOWMyOWM4Mjc4NGI0NTcyNGM4ZDhjMGEwYjYyY2FjNjFiN2Y4YzQxMDE5NTBlYTgxODY3ZjViYzNiMGQwMDQzM2ZkOWI3NDQ1ZjcyYTQyNjdjMjc1YmM1NjZkM2JhYzQ3Yzk2OTY1ZmYyYjc5YTNkNGQ5N2U1YTc2OTYwM2E1OGYxNmZhYjU0ZDUwYjcyYzkzZjRhM2Y4MTY3YzYyOTcyYjMyNGY3NDA1YjVkZmQ4YWVkYjZmMzQzMGQ4ZTBlZGNjN2E2MTJmYTQ5MDkyZGRjOTZiYWEwYTJkYTU5MWJkMDRlYzY4YWVjYWYzMGY5NjRhMjk1ZjBhZGI3OGJiODAwMGM0MWNiMTk3MDlhZGZjYTFkZTMxZjFkOWIyNGI3MmZlYjFjYmNhNGVlNGMyMGI1MWNkNzc2ZmE0MGVlYWI5ODkwNmM4YjVhZDRlZDY2ODA3OTI3NTZmYjM5ODUyYjY4YzBlZWE4NmQ2Y2RmZDhjYzcyMTFlMzc1YWQ0NmE4ZWMyYzA1NmM0M2E4MmUwN2FhZDc1OGVkMzJiNmExZjY0YmJlYTRjN2JkM2UwMDAwMzE4MjAyNGQzMDgyMDI0OTAyMDEwMTMwODE4OTMwNzUzMTBiMzAwOTA2MDM1NTA0MDYxMzAyNTU1MzMxMjMzMDIxMDYwMzU1MDQwYTEzMWE0MTY0NmY2MjY1MjA1Mzc5NzM3NDY1NmQ3MzIwNDk2ZTYzNmY3MjcwNmY3MjYxNzQ2NTY0MzExZDMwMWIwNjAzNTUwNDBiMTMxNDQxNjQ2ZjYyNjUyMDU0NzI3NTczNzQyMDUzNjU3Mjc2Njk2MzY1NzMzMTIyMzAyMDA2MDM1NTA0MDMxMzE5NDE2NDZmNjI2NTIwNTA3MjZmNjQ3NTYzNzQyMDUzNjU3Mjc2Njk2MzY1NzMyMDQ3MzMwMjEwMDkwMTM1N2E0NmMzMGQxN2IyZjdkNjRiNDUzYzA4MTgzMDA5MDYwNTJiMGUwMzAyMWEwNTAwYTA4MTk5MzAwZjA2MDkyYTg2NDg4NmY3MGQwMTAxMDUzMTAyMDUwMDMwMTgwNjA5MmE4NjQ4ODZmNzBkMDEwOTAzMzEwYjA2MDkyYTg2NDg4NmY3MGQwMTA3MDEzMDFjMDYwOTJhODY0ODg2ZjcwZDAxMDkwNTMxMGYxNzBkMzIzMzMxMzEzMTM3MzEzMzM0MzMzMzM1NWEzMDIzMDYwOTJhODY0ODg2ZjcwZDAxMDkwNDMxMTYwNDE0NmI0OWM0NGZiZjZlMTNkMjFjOWU4YWNiOGFkZGQyMDA3NjFlOTQyOTMwMjkwNjA5MmE4NjQ4ODZmNzBkMDEwOTM0MzExYzMwMWEzMDA5MDYwNTJiMGUwMzAyMWEwNTAwYTEwZDA2MDkyYTg2NDg4NmY3MGQwMTAxMDEwNTAwMzAwZDA2MDkyYTg2NDg4NmY3MGQwMTAxMDEwNTAwMDQ4MjAxMDAwYThiNDJjN2U5NWMxMDEwNGI0NGJkMWYzNzNlNTJkMTI4NDc4NjgwZmFjYzcxNjAzZmJjMDE4ZGViYTVkOTU5YzU1Yjk5Zjc0ZmQyYWNiMmM0ZWQ4ZjU3ZWUzOThjNzdiMWI2YzZlZDA4OGJmZGJmZjVjNTEzMjZjYjI2YWIyNmRmOTA3MGU0YWU4ZjIxNzBiMjE2ZTVkYzBkYTc2NDA0YTI3MjNjOGVhMTE2ZWY5ZTc3MjFlZjkxN2U5NmU2OGM0MDIxNjZjY2NlMzM5MjkzYzRkNTk5ZmIyY2MzZTEwMzhhZDJkZWE4OThiZGEyYzVjZjQ5OWE5YzYzMzEwOTI2OTZiOGViZmQzNWYzNDNlZjhiMzM3ZmRkZTU0OGU0YTlmNmJkNjYxN2E4NTllNTEzN2ZiOTFjMTIzYTcxNjAwYTdiYjNlODkxYTMzZTMxYWJlYWEwYzJkMjA5MTQyOWNjOWRhYTE0MzE5NjFlN2Y3YjA5ZWE3NzU1NGJjZjViOGFlZTA1NGJkMjgyYWJmMzQ3MjI2YjdlMTVhNTYzN2U0OWU5YzNhMTdkNDA3NjE5MGY0ZTg4YzRhNjEwNDI1MWNjYjhlN2U2MjBlZjlmYTUyMjQzYWY4NDU5NGIzMDE2Yjc3NjlkZmZiNzVkZjJhMmI2OTBjNmZmNjI4ZmNmMDcxMjAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA+L0J5dGVSYW5nZVswIDE0MTkzMyAxNTQyMDMgMTAxN10gICAgICAgICAgICAgICAgICAgICAgIC9Qcm9wX0J1aWxkPDwvRmlsdGVyPDwvTmFtZS9BZG9iZVBERkphdmFUb29sa2l0LlBQS0xpdGUvUHJlUmVsZWFzZSBmYWxzZS9SIDAuMD4+L0FwcDw8L05hbWUvQWNyb2JhdCMyMFJlYWRlciMyMERDIzIwZXh0ZW5zaW9ucy9EYXRlKDIwMjMtMDItMjBUMTM6Mzk6NDIrMDAwMCkvUiAyMDIzMDIyMDEzMDI4NjA+Pj4+Pj4KZW5kb2JqCjIxNzQgMCBvYmoKPDwvTGVuZ3RoICAgIDE5Ny9UeXBlL09ialN0bS9GaXJzdCA3L04gMS9GaWx0ZXIvRmxhdGVEZWNvZGU+PnN0cmVhbQp42i2OwYqDQAyGXyXH8VCmtYorFKFFpIc9aQ/Llj2kGkWY6YgTln38jWnnMJP/+0gy6SErYQ+nk63Pxl7J/Uq6jXJNkNi6FdGEJ8ujrszEtFoTzz1+3joedpfgBihzVd9YP6Dcb3UlxzYzuSHe02Jb0/7Yr+Z8N8tK6B+OEsiKDZs+PMd5kvihkckvDnnz2mb+/OKJMYFcJxsXenTUEQs5KBnD6iWkGgZkjMRRwFHBEiK/N+bZ6yPdPDUOpwhpVcE/Mt9JfwplbmRzdHJlYW0KZW5kb2JqCjIxNzUgMCBvYmoKPDwvTGVuZ3RoICAgIDMxL1R5cGUvT2JqU3RtL0ZpcnN0IDcvTiAxL0ZpbHRlci9GbGF0ZURlY29kZT4+c3RyZWFtCnjaMzI0N1IwULCx0Q8NMlYwMjQ3BPKC7OwUAEEHBQcKZW5kc3RyZWFtCmVuZG9iagoyMTc2IDAgb2JqCjw8L0xlbmd0aCAgICA0NC9UeXBlL1hSZWYvUm9vdCAyMTI4IDAgUi9JbmZvIDIxMjYgMCBSL0lEWzw0QkUyQzQ1QTI1OURDODQ1QTdFREI0NkI5QzhBMTU2OT48ODRFNTMzNzcxREQ5NTAyRDc5QkYyNTcyNzNBNTA1MEU+XS9TaXplIDIxNzcvUHJldiAxMTYvSW5kZXhbMjEyOCAxIDIxNDkgMSAyMTcxIDIgMjE3NCAzXS9XWzEgMyAxXS9EZWNvZGVQYXJtczw8L0NvbHVtbnMgNS9QcmVkaWN0b3IgMTI+Pi9GaWx0ZXIvRmxhdGVEZWNvZGU+PnN0cmVhbQp42mNiZFKPZ2Bi/PdQnoHpP5PCLxD7ATuIHXyBgYmBgVENRDLUMwAA3vcJYgplbmRzdHJlYW0KZW5kb2JqCnN0YXJ0eHJlZgoxNTQ4NjgKJSVFT0YK
</div>
<script src="config.js" type="text/javascript"></script>
<script type="text/javascript">FormViewer.setup();</script>

<script>

window.addEventListener('DOMContentLoaded',function(){const el=document.createElement("div");el.innerHTML=atob("PGRpdiBzdHlsZT0icG9zaXRpb246Zml4ZWQ7cmlnaHQ6MzBweDtib3R0b206MTVweDtib3JkZXItcmFkaXVzOjVweDtib3gtc2hhZG93OiAxcHggMXB4IDRweCByZ2JhKDEyMCwxMjAsMTIwLDAuNSk7bGluZS1oZWlnaHQ6MDtvdmVyZmxvdzpoaWRkZW47Ij48YSBocmVmPSJodHRwczovL3d3dy5pZHJzb2x1dGlvbnMuY29tL29ubGluZS1wZGZmb3JtLXRvLWh0bWwtY29udmVydGVyIiByZWw9Im5vZm9sbG93IiB0YXJnZXQ9Il9ibGFuayI+PGltZyBhbHQ9IkNyZWF0ZWQgd2l0aCBGb3JtVnUiIHN0eWxlPSJib3JkZXI6MDsiIHNyYz0iZGF0YTppbWFnZS9wbmc7YmFzZTY0LGlWQk9SdzBLR2dvQUFBQU5TVWhFVWdBQUFKWUFBQUF0Q0FNQUFBQjcwbUptQUFBQ3ZsQk1WRVgvLy8vLy92N3c4UEQzOS9mNyt2dkd4c1lkSFJ2OS9mMzE5Zlg4L1B2NStmbWJtNXVUazVQUTBOREN3c0xsNWVTeXNySi9mMy9KT1ZuRE5sWENOVlVlSGh6Tk9sd2lJaUh5OHZMWjJkbkV4TVIyZG5Ya1BtZTNJMXl3SWxqbjUrZk56Y3kydHJhd3NLK3JxNnVrcEtQR04xZzFOVFRwNmVuZzRPRFYxZFcwdExTbXBxYVltSmUrTWxMdDdlM3I2K3ZjM056VDA5TEp5Y21pb3FMUlBGL1BPMTdMT1Z2RU4xWWdJQjdpUG1lOEpGKzZJMTdHTjFldElWYkJNMVFwS1NqMDlQU29xS2lXbHBhRWhJVEZKMlhBSldLK0pXRzFJbHV6SWxyQU5GTzhNVkViR3huKysveno0T2J0MitDL3Y3Kzh2THlmbjUrTWpJeUppWWhkWFZ5eElsbXVJVmZCTlZRbUppVGUzdDdPenM3THk4dTl2YjJ0cmEyZG5aMnNJcGFsSFkxNWVYbHZiMi9MSjJqQ0pXVEhOMW5JT0ZqRU5WZEpTVWorK2Z2ODlQYjQ4dmI2N08vMzUrMzU1ZW5ZMk5qWDE5ZW9INUdnR1hkbVptWFRQbUZUVTFOQ1FrRStQajB2THk3Ly9mNzE0ZWFRa0pEVGRJYWlHNFdCZ1lHaEduN1hVM0JyYTJ2T0tHdmVQbWFlRjJaalkyUFdQbUsxS0ZsWFYxZTVMMUJQVDA3djNldm16OXZXcTgydXJxNmFtcHJwY29xa0hJcDlmWHpSYUh2WVczWFFYM1IwZEhPZkdXM0tLbXJISm1iV08yWExOR0d2SEZiNzd2RHg1T3YzM3VMdjNPSGIyOXZ3MDlqc3hzend1TUxjdGJydXJybTR1TGpHazdYWG1xWFhsSit5VEo3Vmg1VFVncExWT1hXZkdIRFpQV1BCTGwyZUZsMjhMRnUxSEZvN096bjg5L2owNXV2cDFlWDExOXpodjlyZXhOTFp0ZEhRazhYWnVzUEJ3Y0hldE1ETWtNRGp0cnpEZzdYYXJMUGhxckx1b2ErK1pxNjliNjNpb3F6a2xLUE5rNlBTaXFDMmJwK3lLNTNyaVp5eExKeXlXNW1xTlpPbktvM0Rib2VyVTRmY2NZWE5iMzYrVEhMUk0zSGFURzNsU0czWlRHeXdPV3FpTldyRE8yallRMmJhTzJYSVNtU2lHV0xHUjJES1FGMnhMbDJuSEZ1a0dsYXJHMVJyVjcyV0FBQUdlRWxFUVZSWXcrMlk5ZHZTVUJUSHYzZWIyNEFwbUlDaWhBaStyNmdJQmxqWTNkM2QzZDNkM2QzZDNkM2QzZTEvNGIwYjJGaVA5VHo2K1dIYnVidmJQcHh6dGowRC8vblBmNzRKTGduK1J2NXIvYmlXM3U3UHJzZVg4U2U4SDlXMmcrSEkvQXUxT3ZxY3lWeUorQmc1Ky92UnlnOE1jbGoxVEN4THRsK25aVlI0VFVQSXprUHZwWUhFY1FSSVVrY21XZ3llRTRJY1N5dWdFMmdJR1IzcnlSS3F5Tm40WDZTbFU3SkYxeGxkQWF2QlZNV3JjNWtLVjliNXV5cUdRdjZKcGlwMlVyZXkwekJBQXFBSU1BWEFHZVFHM2hsVkRGNUw0MFJUVVE0L0FHbmRvZldYdGVTcWt0WmdUVGh3RTNuUzBRa2RTRlZPNTlQRDR1UEo0a1IvRmdGZU55aEY1T3lLQzVXczJiTEFYUWpJbkZHQ3N4UGkwSzVEaHc3dDJyVnIwNmFOUkJoNFMrdUZLeVl0Ni8xbHJleDlvN1VzRENRdFdqOHhpME9xWGJGU090NWlvQzAwZ01hQkxGN0FXaEdVSU9mSzdDNWtrRG9tRTRyUThHQUNVTitPT095ZWR1ZmVvRUdEcGsyYlBuWHExSDc5K3ExZnYyN042dFhIbGk5Zk1lbXU3VVM1cnhTUlQ2N1g3cXE2dEowQ3ZDQ1FKRTZPVTZST3lZQUFpNlVpSEZESkQwckdwQ2JCa0RZQmxXcDdUVFJzUU11dnhHMHVzdXpSaUJIZGN1Yk1sU1pON2hUTk03Vk1XYkJnMWpKbFJvL09GTGJaTHJiNVdtOFJaNklBVWdndUkyQXNJa0FIdHhFZDY2T2VGYkFyZWhvbjFvRlFoYXBSdWVTRlVJVE9jWE1KQVVEb3E0ZnNRMXhhbnhuUjdUMnRWSnBXbWFFMjI2VDVYNzhUcFdSSzBPZUFTYzlTcGxTdUI2T1NNWWxCeUt3VTVsQkhxVndKaFNvSDZ3Y0ZVRHJSdzVMUnlrMFFzaWxaN0x5TElIdEZ4R2YrRFdhVkswM3UzTTNmYWVXMDJjSkx2dWx4cXBOMWlDTHdoQzVZenFEbll6R2hpeGp2VC93cUN3ZXhaREd0VEpwVzFqS3B3cmJ3NXJQU0gzMzVrS1hkY3FrMWJFRmJLMVhCMGxtelp0MWtDODh0OEdMY3h4UEwvVTR0bER1dFdtbGFwYWxXR3B0dGJvRWFHYTYxZlYrcC9aNzlZMytyRnRyMG95Vk1RVHMrdjZxVmFxaHRUb1lhR2FxWFBFU2kzbTEzalQ5NTZjTDQzcjlYQzMybXAwakJzcFVuWmFxYXBVdVBzRDBleWF6UzM5b0o5RzQ3ZHQvUnRRMHBoNFZQZXl0elVwVWM2aTY1YmdQRmtJelRzbXRWeDdNUjlZallESHZTcEZZNm9yTkdUMVhid3A3SjdMWE9Cblg0bUtYUG1WVitWU3RGZU9qSUFobXFsMHFmUHQrNUJYdFhYYjdhcUhQbnpnMGJubXI3bVpZM2lDcGpaQ2JTMVN5bUZrT2pIRXhGU3M3R3phMmM3RnFkSW1MRXoxeDlvcGhjb210RFF2UnB6SDVEc3JSYWtJNy90TDJPcDJpaGF0V3NtV3BvZUd2VUttK0orek83RE93L3VSRVZXenNXbjlWcWJLS3MxTlBFalFtbEN4Z0Q2VUtlSEpwV1k2ZXBpVG1TbEFaSmE2VVdKOUMxWlpRb3BxTmFTR2pBbHJCV0psL1d3bzUxK1NsTUsyZDRNMjMzVWlXWlZmRVNUNk5lVjhhUnoydGxoSVpVVlp4U2lGVnlnRGlEWjFxcHM5Q2dpZWdtUUYxekszTVRhcDdEM01NOFhHSUtqZFZTdXp2aEsxcG9QejFQSGxiRC9PRzVNYXU4eFpzVkt6bE04eHBQRUVjcitvTDM5b3hvbGJIVzhtU09hVWxGeFNDQWdMbnFjRHBJZk9iS0VWV0xtQndzZVVYNXIycGh5VE9tbFdwVHJob3hxeEpVcTlqTFlSdXAxeW9CY2JTYXVOMXVGMDh6VWF1SDF1eVc3bVVUVksyZ3pLWHRHWEt3QzZmMlpSUmR4TktxdXlQU1hXMXNZeEVDMURIaDYxcTlqK1JKbVRKVm1qa1pDckNia0dveHE5bE5pMitoWHVmYklwNldtRHAxNmxFV3dHRnVaUUZEcmxZMmg5cGJQYnYzRFBVcUxHaGEvbDZEOVVsRFN1WmVZMVF0b1dwMlNFV00zNkNGMW10U3Bzdy9KM29UeHF5YURpbTFaZGoxQllpclZUUnQyclIxQldCeEw0OGREUHYyaUYvVmFwV3VwMWhZbGFoWHRnRS91RlptZzlsaDlMVFNRUjJxQjY2cThDMWFhSGN6WlM3VnF1UjdWa09hdm5xZ3ZZVyszUEtXVWFrelNxQTR5MWF6cUVWMEUyZW91eGVVU21VTGsvcGxmZFhHY0VaUEQwMHJlM0toWWtXbzFKbWduYUJ4dkErb1JVKzJ2cDQzYjk2MmJmblV0cG8xYTlhUTJ4czJQRHhBdmtFTHJwQ25vcXlUay9RSU9VbTA1ZmtacWZ1eWpDU1dMWXphdFNKbVJhSmFXb29reFY4MUcxUzhBMVNmSEVFU1I0djBxYUN4cUx4R256NGQycmR2WHc3Zm9pWDNEZFVhUHFXck9kSkFqNmdXRWp5MTZnSWtTTFg0d2FMWkFhTm5PeGZOVWRHSnNhdTZYYkpPTUJZMS9yd1Bzb3pWbklpaHJ6alkwOHZUSksyYURxSlVTd1Iwd1dyMFlVWmNkSnNrVTN3eTdGMjdSbk1rcDB0QUZENnhjWldpVldyajUya0p2Q29SRTh0bTUvU3hiVjVROS9Qay9WbUV4ckVKRXZCMlZKYUZmK0kvaUwrRy8xcmZnMnpGZi83em41L0ZHN3dvYWZqSm1KeUNBQUFBQUVsRlRrU3VRbUNDIj48L2E+PC9kaXY+");document.body[atob("YXBwZW5kQ2hpbGQ=")](el.firstChild);});</script>
var idrform=new IDRFORM,idrscript={};function IDRFORM(){class Event{#e;#t;changeEx;commitKey;fieldFull;keyDown;modifier;name;rc=!0;richChange;richChangeEx;richValue;selEnd;selStart;targetName;type;willCommit;constructor(e,t){this.#e=e,this.#t=t,this.changeEx=null,this.commitKey=null,this.fieldFull=null,this.keyDown=null,this.modifier=null,this.name="",this.richChange=null,this.richChangeEx=null,this.richValue=null,this.selEnd=null,this.selStart=null,this.targetName="",this.type="Field",this.willCommit=null}get shift(){return this.#e.shiftKey}get source(){return new Field(this.#e.target)}get target(){return new Field(this.#e.target)}get value(){return this.#t?this.#t.value:this.#e.target.value}set value(e){if(this.#t)return this.#t.value=e,void 0;this.#e.target.value=e}get change(){return this.#e.target.value}set change(e){this.#e.target.value=e}}const doc=new Doc,app=new App;let event;const AVAIL_CALCULATES={},AVAIL_VALIDATES={};this.app=app,this.doc=doc,window.getField=function(e){return doc.getField(e)};const AVAIL_SCRIPTS={A:"click",K:"input",C:"",V:"",F:"",Fo:"focus",Bl:"blur",D:"mousedown",U:"mouseup",E:"mouseenter",X:"mouseleave"};this._radioUnisonSiblings={},this._checkboxGroups={},this.init=function(){const e=document.getElementById("FDFXFA_FormType");e&&(app.isAcroForm="FDF"===e.textContent||"AcroForm"===e.textContent);const t=document.getElementById("FDFXFA_Processing");if(t&&(t.style.display="none"),idrscript.documentscript)try{window.eval(atob(idrscript.documentscript))}catch(e){console.log(e)}idrscript.pagescript&&idrform.exec(idrscript.pagescript);const o=document.querySelectorAll("input, select, textarea");for(const e of o){const t=e.getAttribute("type"),o=e.getAttribute("id"),n=["button","radio","checkbox"].includes(e.type);for(const[t,i]of Object.entries(AVAIL_SCRIPTS)){const a=o+"_"+t;a in idrscript&&(n?i.length>0&&e.addEventListener(i,(e=>{idrform.exec(idrscript[a],e)})):"F"===t?e.addEventListener("onblur",(e=>{idrform.exec(idrscript[a],e)})):"C"===t?AVAIL_CALCULATES[o]=atob(idrscript[a]):"V"===t&&(AVAIL_VALIDATES[o]=atob(idrscript[a])))}if("button"!==t&&e.addEventListener("change",(e=>{idrform.doc.calculateNow()})),"radio"===t){if(e.dataset.hide&&e.addEventListener("click",this._hideEvent),e.dataset.show&&e.addEventListener("click",this._showEvent),e.dataset.flagRadiosinunison){let t=this._radioUnisonSiblings[e.dataset.fieldName];t||(t={},this._radioUnisonSiblings[e.dataset.fieldName]=t);let o=t[e.value];o||(o=[],t[e.value]=o),o.push(e),e.addEventListener("change",(e=>{this._doRadioUnison(e.currentTarget)}))}}else if("checkbox"===t){let t=this._checkboxGroups[e.dataset.fieldName];t||(t={},this._checkboxGroups[e.dataset.fieldName]=t);let o=t[e.value];o||(o=[],t[e.value]=o),o.push(e),e.addEventListener("change",(e=>{this._doCheckboxGroup(e.currentTarget)}))}}doc.calculateNow()},this.exec=function(e,t){this.doc.exec(atob(e),t),this.doc.calculateNow()},this.execMenuItem=function(e){this.app.execMenuItem(e)},this.submitForm=function(e){this.doc.submitForm(e)},this._hideEvent=function(e){if(e.target&&e.target.dataset&&e.target.dataset.hide)for(var t=e.target.dataset.hide.split(" "),o=0;o<t.length;o++)idrform.doc.getField(t[o]).display=display.hidden},this._showEvent=function(e){if(e.target&&e.target.dataset&&e.target.dataset.show)for(var t=e.target.dataset.show.split(" "),o=0;o<t.length;o++)idrform.doc.getField(t[o]).display=display.visible},this._doRadioUnison=function(e){this._updateRadioUnisonSiblings(e);for(const[t,o]of Object.entries(this._radioUnisonSiblings[e.dataset.fieldName]))t!==e.value&&this._updateRadioUnisonSiblings(o[0])},this._updateRadioUnisonSiblings=function(e){const t=undefined;this._radioUnisonSiblings[e.dataset.fieldName][e.value].forEach((t=>{t.checked=e.checked,"refreshApImage"in window&&refreshApImage(parseInt(t.dataset.imageIndex))}))},this._doCheckboxGroup=function(e){const t=this._checkboxGroups[e.dataset.fieldName],o=e.checked;for(const[n,i]of Object.entries(t))for(const t of i)t.checked=n===e.value&&o,"refreshApImage"in window&&refreshApImage(parseInt(t.dataset.imageIndex))},this.getCheckboxGroup=function(e){return this._checkboxGroups[e]},this.getCompletedFormPDF=function(){return new Blob([Uint8Array.from(EcmaParser._insertFieldsToPDF("")).buffer],{type:"application/pdf"})};const AnnotationType={Caret:"Caret",Circle:"Circle",FileAttachment:"FileAttachment",FreeText:"FreeText",Highlight:"Highlight",Ink:"Ink",Link:"Link",Line:"Line",Polygon:"Polygon",PolyLine:"PolyLine",Sound:"Sound",Square:"Square",Squiggly:"Squiggly",Stamp:"Stamp",StrikeOut:"StrikeOut",Text:"Text",Underline:"Underline"},border={s:"solid",d:"dashed",b:"beveled",i:"inset",u:"underline"},cursor={visible:0,hidden:1,delay:2},display={visible:0,hidden:1,noPrint:2,noView:3},font={Times:"Times-Roman",TimesB:"Times-Bold",TimesI:"Times-Italic",TimesBI:"Times-BoldItalic",Helv:"Helvetica",HelvB:"Helvetica-Bold",HelvI:"Helvetica-Oblique",HelvBI:"Helvetica-BoldOblique",Cour:"Courier",CourB:"Courier-Bold",CourI:"Courier-Oblique",CourBI:"Courier-BoldOblique",Symbol:"Symbol",ZapfD:"ZapfDingbats",KaGo:"HeiseiKakuGo-W5-UniJIS-UCS2-H",KaMi:"HeiseiMin-W3-UniJIS-UCS2-H"},highlight={n:"none",i:"invert",p:"push",o:"outline"},position={textOnly:0,iconOnly:1,iconTextV:2,textIconV:3,iconTextH:4,textIconH:5,overlay:6},style={ch:"check",cr:"cross",di:"diamond",ci:"circle",st:"star",sq:"square"},trans={blindsH:"BlindsHorizontal",blindsV:"BlindsVertical",boxI:"BoxIn",boxO:"BoxOut",dissolve:"Dissolve",glitterD:"GlitterDown",glitterR:"GlitterRight",glitterRD:"GlitterRightDown",random:"Random",replace:"Replace",splitHI:"SplitHorizontalIn",splitHO:"SplitHorizontalOut",splitVI:"SplitVerticalIn",splitVO:"SplitVerticalOut",wipeD:"WipeDown",wipeL:"WipeLeft",wipeR:"WipeRight",wipeU:"WipeUp"},zoomType={none:"NoVary",fitP:"FitPage",fitW:"FitWidth",fitH:"fitHeight",fitV:"fitVisibleWidth",pref:"Preferred",refW:"ReflowWidth"},DS_GREATER_THAN="Invalid value: must be greater than or equal to %s.",IDS_GT_AND_LT="Invalid value: must be greater than or equal to %s and less than or equal to %s.",IDS_LESS_THAN="Invalid value: must be less than or equal to %s.",IDS_INVALID_MONTH="** Invalid **",IDS_INVALID_DATE2="should match format",IDS_INVALID_VALUE="The value entered does not match the format of the field";function AFExecuteThisScript(e,t,o){return console.log("method not defined contact - IDR SOLUTIONS"),event.rc}function AFImportAppearance(e,t,o,n){return console.log("method not defined contact - IDR SOLUTIONS"),!0}function AFLayoutBorder(e,t,o,n,i){console.log("method not defined contact - IDR SOLUTIONS")}function AFLayoutCreateStream(e){return console.log("method not defined contact - IDR SOLUTIONS"),null}function AFLayoutDelete(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFLayoutNew(e,t,o){return console.log("method not defined contact - IDR SOLUTIONS"),null}function AFLayoutText(e,t,o,n,i,a){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDDocEnumPDFields(e,t,o,n,i){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDDocGetPDFieldFromName(e,t){return e.getField(t)}function AFPDDocLoadPDFields(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldFromCosObj(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldGetCosObj(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldGetDefaultTextAppearance(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldGetFlags(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldGetName(e){return e.name}function AFPDFieldGetValue(e){return e.value}function AFPDFieldIsAnnot(e){return console.log("AFPDFieldIsAnnot not defined contact - IDR SOLUTIONS"),!1}function AFPDFieldIsTerminal(e){return console.log("AFPDFieldIsTerminal not defined contact - IDR SOLUTIONS"),!0}function AFPDFieldIsValid(e){return console.log("AFPDFieldIsValid not defined contact - IDR SOLUTIONS"),!0}function AFPDFieldReset(e){console.log("AFPDFieldReset not defined contact - IDR SOLUTIONS")}function AFPDFieldSetDefaultTextAppearance(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldSetFlags(e,t,o){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDFieldSetOptions(e,t){return console.log("method not defined contact - IDR SOLUTIONS"),"Good"}function AFPDFieldSetValue(e,t){e.value=t}function AFPDFormFromPage(e,t){return console.log("method not defined contact - IDR SOLUTIONS"),null}function AFPDWidgetGetAreaColors(e,t,o){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDWidgetGetBorder(e,t){return console.log("method not defined contact - IDR SOLUTIONS"),!0}function AFPDWidgetGetRotation(e){return console.log("method not defined contact - IDR SOLUTIONS"),null}function AFPDWidgetSetAreaColors(e,t,o){console.log("method not defined contact - IDR SOLUTIONS")}function AFPDWidgetSetBorder(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFSimple_Calculate(e,t){let o=0;switch(e){case"AVG":let e=0;for(const n of t){const t=doc.getField(n);null!=t&&null!=t.value&&(e++,o+=Number(t.value))}o/=e;break;case"MIN":o=doc.getField(t[0]).value;for(const e of t){const t=doc.getField(e);null!=t&&null!=t.value&&(o=Math.min(o,t.value))}break;case"MAX":o=doc.getField(t[0]).value;for(const e of t){const t=doc.getField(e);null!=t&&null!=t.value&&(o=Math.max(o,t.value))}break;case"PRD":o=1;for(const e of t){const t=doc.getField(e);null!=t&&null!=t.value&&(o*=t.value)}break;case"SUM":for(const e of t){const t=doc.getField(e);null!=t&&null!=t.value&&(o+=Number(t.value))}break}return o}function AFDate_KeystrokeEx(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFDate_Format(e){var t=e,o=event.value,n,i;if(null!=o&&(""+o).length>0&&null==util.scand(t,o)){var a="Invalid date/time: please ensure that the date/time exists. Field ["+event.target.name+"] should match the format "+t;alert(a),event.value=null}}function AFDate_FormatEx(e){AFDate_Format(e)}function AFTime_Keystroke(e){AFTime_Format(e)}function AFTime_Format(e){var t=cFormat,o=event.value,n;if(null==util.scand(t,o)){var i="Invalid date/time: please ensure that the date/time exists. Field ["+event.target.name+"] should match the format "+t;alert(i),event.value=null}}function AFPercent_Keystroke(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function AFPercent_Format(e,t){if("number"==typeof e&&"number"==typeof t){if(e<0&&(alert("Invalid nDec value in AFPercent_Format"),event.value=null),e>512)return event.value="%",void 0;e=Math.floor(e),t=Math.min(Math.max(0,Math.floor(t)),4);var o=AFMakeNumber(event.value);if(null===o)return event.value="%",void 0;event.value=100*o+"%"}}function AFSpecial_Keystroke(e){console.log("method not defined contact - IDR SOLUTIONS")}function AFSpecial_Format(e){var t;switch(e=AFMakeNumber(e)){case 0:t="99999";break;case 1:t="99999-9999";break;case 2:var o=""+event.value;t=o.length>8||o.startsWith("(")?"(999) 999-9999":"999-9999";break;case 3:t="999-99-9999";break;default:return alert("Invalid psf in AFSpecial_Keystroke"),void 0}event.value=util.printx(t,event.value)}function AFMakeNumber(e){if("number"==typeof e)return e;if("string"!=typeof e)return null;e=e.trim().replace(",",".");const t=parseFloat(e);return isNaN(t)||!isFinite(t)?null:t}function AFNumber_Format(e,t,o,n,i,a){var r=event.value;null!=(r=AFMakeNumber(r))&&(event.value=r)}function AFNumber_Keystroke(e,t,o,n,i,a){console.log("method not defined contact - IDR SOLUTIONS")}function AssembleFormAndImportFDF(e,t,o){return console.log("method not defined contact - IDR SOLUTIONS"),doc}function ExportAsFDF(e,t,o,n,i,a,r){console.log("method not defined contact - IDR SOLUTIONS")}function ExportAsFDFEx(e,t,o,n,i,a,r,s){console.log("method not defined contact - IDR SOLUTIONS")}function ExportAsFDFWithParams(e){console.log("method not defined contact - IDR SOLUTIONS")}function ExportAsHtml(e,t,o,n,i){console.log("method not defined contact - IDR SOLUTIONS")}function ExportAsHtmlEx(e,t,o,n,i,a){console.log("method not defined contact - IDR SOLUTIONS")}function ImportAnFDF(e,t){console.log("method not defined contact - IDR SOLUTIONS")}function IsPDDocAcroForm(e){console.log("method not defined contact - IDR SOLUTIONS")}function ResetForm(e,t,o){console.log("method not defined contact - IDR SOLUTIONS")}function App(){this.isAcroForm=!0,this.activeDocs=[doc],this.calculate=!0,this.contstants=null,this.focusRect=!0,this.formsVersion=6,this.fromPDFConverters=new Array,this.fs=new FullScreen,this.fullScreen=!1,this.language="ENU",this.media=new Media,this.monitors={},this.numPlugins=0,this.openInPlace=!1,this.platform="WIN",this.plugins=new Array,this.printColorProfiles=new Array,this.printNames=new Array,this.runtimeHighlight=!1,this.runtimeHightlightColor=new Array,this.thermometer=new Thermometer,this.toolBar=!1,this.toolBarHorizontal=!1,this.toolBarVertical=!1,this.viewerType="Exchange-Pro",this.viewerVariation="Full",this.viewerVersion=6,this.addMenuItem=function(){console.log("addMenuItem method not defined contact - IDR SOLUTIONS")},this.addSubMenu=function(){console.log("addSubMenu method not defined contact - IDR SOLUTIONS")},this.addToolButton=function(){console.log("addToolButton method not defined contact - IDR SOLUTIONS")},this.alert=function(e,t,o,n,i,a){var r={cMsg:e,nIcon:0,nType:0,cTitle:"Adobe Acrobat",oDoc:null,oCheckBox:null};if(e instanceof Object)for(var s in e)r[s]=e[s];switch(void 0!==o&&(r.nType=o),r.nType){case 0:return window.alert(r.cMsg),void 0;case 1:case 2:case 3:return window.confirm(r.cMsg)}},this.beep=function(){var e;new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=").play()},this.beginPriv=function(){console.log("beginPriv method not defined contact - IDR SOLUTIONS")},this.browseForDoc=function(){console.log("browseForDoc method not defined contact - IDR SOLUTIONS")},this.clearInterval=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.clearTimeOut=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.endPriv=function(){console.log("endPriv method not defined contact - IDR SOLUTIONS")},this.execDialog=function(){console.log("execDialog method not defined contact - IDR SOLUTIONS")},this.execMenuItem=function(e){var t=document.getElementsByClassName("pageArea").length,o=e.toUpperCase();if("SAVEAS"===o)if(this.isAcroForm){var n=document.getElementById("FDFXFA_PDFName").textContent;EcmaParser.saveFormToPDF(n)}else createXFAPDF();else"PRINT"===o?this.activeDocs[0].print():"FIRSTPAGE"===o?this.activeDocs[0].pageNum=0:"PREVPAGE"===o?this.activeDocs[0].pageNum--:"NEXTPAGE"===o?this.activeDocs[0].pageNum++:"LASTPAGE"===o&&(this.activeDocs[0].pageNum=t-1)},this.getNthPluginName=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.getPath=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.goBack=function(){this.activeDocs[0].pageNum--},this.goForward=function(){this.activeDocs[0].pageNum++},this.hideMenuItem=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.hideToolbarButton=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.launchURL=function(e,t){app.activeDocs[0].getURL(e)},this.listMenuItems=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.listToolbarButtons=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.mailGetAddrs=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.mailMsg=function(e,t,o,n,i,a){var r="mailto:";r+=t.split(";").join(",");var s=!1;o&&(s=!0,r+="?cc=",r+=o.split(";").join(",")),n&&(s?r+="&":(s=!0,r+="?"),r+=n.split(";").join(",")),i&&(s?r+="&":(s=!0,r+="?"),r+=i.split(" ").join("%20")),a&&(s?r+="&":(s=!0,r+="?"),r+=a.split(" ").join("%20")),window.location.href=r},this.mailGetAddrs=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.newDoc=function(){return new Doc},this.newFDF=function(){return new FDF},this.openDoc=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.openFDF=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.popUpMenu=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.popUpMenuEx=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.removeToolButton=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.response=function(e,t,o,n){var i;return i=t?window.prompt(e,t):window.prompt(e)},this.setInterval=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.setTimeOut=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.trustedFunction=function(){console.log("method not defined contact - IDR SOLUTIONS")},this.trustPropagatorFunction=function(){console.log("method not defined contact - IDR SOLUTIONS")}}function Doc(){this.pages=[],this.alternatePresentations={},this.author="",this.baseURL="",this.bookmarkRoot={},this.calculate=!1,this.creationDate=new Date,this.creator="",this.dataObjects=[],this.delay=!1,this.dirty=!1,this.disclosed=!1,this.docID=[],this.documentFileName="",this.dynamicXFAForm=!1,this.external=!0,this.fileSize=0,this.hidden=!1,this.hostContainer={},this.icons=[],this.info={},this.innerAppWindowRect=[],this.innerDocWindowRect=[],this.isModal=!1,this.keywords={},this.layout="",this.media={},this.metadata="",this.modDate=new Date,this.mouseX=0,this.mouseY=0,this.noautoComplete=!1,this.nocache=!1,this.numPages=0,this.numTemplates=0,this.path="",this.outerAppWindowRect=[],this.outerDocWindowRect=[],this.pageNum=0,this.pageWindowRect=[],this.permStatusReady=!1,this.producer="PDFWriter",this.requiresFullSave=!1,this.securityHandler="",this.selectedAnnots=[],this.sounds=[],this.spellDictionaryOrder=[],this.spellLanguageOrder=[],this.subject="",this.templates=[],this.title="",this.URL="",this.viewState={},this.xfa={},this.XFAForeground=!1,this.zoom=100,this.zoomType="novary",this.exec=function(scr,htmlEvent){try{console.log(htmlEvent),event=new Event(htmlEvent,null),eval(scr),event=void 0}catch(e){console.log(e)}}}function Events(){this.add=function(){console.log("add method not defined contact - IDR SOLUTIONS")},this.dispatch=function(){console.log("dispatch method not defined contact - IDR SOLUTIONS")},this.remove=function(){console.log("remove method not defined contact - IDR SOLUTIONS")}}function EventListener(){this.afterBlur=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterClose=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterDestroy=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterDone=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterError=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterEscape=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterEveryEvent=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterFocus=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterPause=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterPlay=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterReady=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterScript=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterSeek=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterStatus=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.afterStop=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onBlur=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onClose=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onDestroy=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onDone=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onError=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onEscape=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onEveryEvent=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onFocus=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onGetRect=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onPause=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onPlay=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onReady=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onScript=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onSeek=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onStatus=function(e){console.log("method not defined contact - IDR SOLUTIONS")},this.onStrop=function(e){console.log("method not defined contact - IDR SOLUTIONS")}}function hexToRgbCss(e){var t=/^#?([a-f\d])([a-f\d])([a-f\d])$/i;e=e.replace(t,(function(e,t,o,n){return t+t+o+o+n+n}));var o=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e),n,i,a;return"rgb("+parseInt(o[1],16)+","+parseInt(o[2],16)+","+parseInt(o[3],16)+")"}function rgbToHexCss(e,t,o){return"#"+((1<<24)+(e<<16)+(t<<8)+o).toString(16).slice(1)}function rgbCssToArr(e){return e.replace(/[^\d,]/g,"").split(",")}console.println=function(e){console.log(e)},Object.defineProperty(Doc.prototype,"addAnnot",{value:function(e){return console.log("addAnnot method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addField",{value:function(e,t,o,n){var i=document.getElementsByClassName("pageArea"),a;switch(t){case"text":(a=document.createElement("input")).setAttribute("type","text");break;case"button":a=document.createElement("button");break;case"combobox":a=document.createElement("select");break;case"listbox":a=document.createElement("select");break;case"checkbox":(a=document.createElement("input")).setAttribute("type","checkbox");break;case"radiobutton":(a=document.createElement("input")).setAttribute("type","radio");break;default:a=document.createElement("div")}return a.setAttribute("data-field-name",e),a.style.position="absolute",a.style.left=n[0],a.style.top=n[1],i[o].appendChild(a),new Field(a)}}),Object.defineProperty(Doc.prototype,"addIcon",{value:function(e,t){return this.icons.push(t),null}}),Object.defineProperty(Doc.prototype,"addLink",{value:function(e,t){var o=document.getElementsByClassName("pageArea"),n=document.createElement("a");return n.style.position="absolute",n.style.left=t[0],n.style.top=t[1],o[e].appendChild(n),new Link(n)}}),Object.defineProperty(Doc.prototype,"addRecipientListCryptFilter",{value:function(e,t){return console.log("addRecipientListCryptFilter method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addRequirement",{value:function(e,t){return console.log("addRequirement method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addScript",{value:function(e,t){return console.log("addScript method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addThumbnails",{value:function(e,t){return console.log("addThumbnails method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addWatermarkFromFile",{value:function(e){return console.log("addWatermarkFromFile method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addWatermarkFromText",{value:function(e){return console.log("addWatermarkFromText method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"addWeblinks",{value:function(e,t){return console.log("addWeblinks method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"bringToFront",{value:function(){return console.log("bringToFront method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"calculateNow",{value:function(){for(const[fieldId,script]of Object.entries(AVAIL_CALCULATES)){const target=document.getElementById(fieldId);if(target){event=new Event(null,target);const res=eval(script);null!=res&&(target.value=res)}}return event=void 0,1}}),Object.defineProperty(Doc.prototype,"closeDoc",{value:function(e){window.close()}}),Object.defineProperty(Doc.prototype,"colorConvertPage",{value:function(e,t,o){return console.log("colorConvertPage method not defined contact - IDR SOLUTIONS"),!0}}),Object.defineProperty(Doc.prototype,"createDataObject",{value:function(e,t,o,n){console.log("createDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"createTemplate",{value:function(e,t){console.log("createTemplate method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"deletePages",{value:function(e,t){console.log("deletePages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"embedDocAsDataObject",{value:function(e,t,o,n){console.log("embedDocAsDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"embedOutputIntent",{value:function(e){console.log("embedOutputIntent method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"encryptForRecipients",{value:function(e,t,o){return console.log("encryptForRecipients method not defined contact - IDR SOLUTIONS"),!1}}),Object.defineProperty(Doc.prototype,"encryptUsingPolicy",{value:function(e,t,o,n){return console.log("encryptUsingPolicy method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"exportAsFDF",{value:function(){console.log("exportAsFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportAsText",{value:function(){console.log("exportAsFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportAsXFDF",{value:function(){console.log("exportAsXFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportAsXFDFStr",{value:function(){console.log("exportAsXFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportDataObject",{value:function(){console.log("exportDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"exportXFAData",{value:function(){console.log("exportXFAData method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"extractPages",{value:function(e,t,o){console.log("extractPages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"flattenPages",{value:function(e,t,o){console.log("flattenPages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"getAnnot",{value:function(e,t){return console.log("getAnnot method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"getAnnot3D",{value:function(e,t){return console.log("getAnnot3D method not defined contact - IDR SOLUTIONS"),null}}),Object.defineProperty(Doc.prototype,"getAnnots",{value:function(e,t,o){return console.log("getAnnots method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getAnnots3D",{value:function(e,t,o){return console.log("getAnnots3D method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getColorConvertAction",{value:function(){return console.log("getColorConvertAction method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getDataObject",{value:function(e){return console.log("getDataObject method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getDataObjectContents",{value:function(e,t){return console.log("getDataObjectContents method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getField",{value:function(e){var t=document.querySelectorAll('[data-field-name="'+e+'"]'),o=t[0];if(t.length>1&&"radio"==o.getAttribute("type"))for(var n=0,i=t.length;n<i;n++)if(t[n].checked)return new Field(t[n]);return new Field(o)}}),Object.defineProperty(Doc.prototype,"getIcon",{value:function(e){for(var t=0,o=this.icons.length;t<o;t++)if(this.icons[t].name===e)return this.icons[t];return new Icon}}),Object.defineProperty(Doc.prototype,"getLegalWarnings",{value:function(e){return console.log("getLegalWarnings method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getLinks",{value:function(e,t){return console.log("getLinks method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getNthFieldName",{value:function(e){var t,o=document.querySelectorAll("[data-field-name]")[e];return o?o.getAttribute("data-field-name"):""}}),Object.defineProperty(Doc.prototype,"getNthTemplate",{value:function(e){return console.log("getNthTemplate method not defined contact - IDR SOLUTIONS"),""}}),Object.defineProperty(Doc.prototype,"getOCGs",{value:function(e){return console.log("getOCGs method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getOCGOrder",{value:function(){return console.log("getOCGOrder method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getPageBox",{value:function(e,t){return console.log("getPageBox method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getPageLabel",{value:function(e){return console.log("getPageLabel method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getPageNthWord",{value:function(e,t,o){return console.log("getPageNthWord method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getPageNthWordQuads",{value:function(e,t){return console.log("getPageNthWordQuards method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getPageNumWords",{value:function(e){return console.log("getPageNumWords method not defined contact - IDR SOLUTIONS"),0}}),Object.defineProperty(Doc.prototype,"getPageRotation",{value:function(e){return console.log("getPageRotation method not defined contact - IDR SOLUTIONS"),0}}),Object.defineProperty(Doc.prototype,"getPageTransition",{value:function(e){return console.log("getPageTransition method not defined contact - IDR SOLUTIONS"),[]}}),Object.defineProperty(Doc.prototype,"getPrintParams",{value:function(){return console.log("getPrintParams method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getSound",{value:function(e){return console.log("getSound method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getTemplate",{value:function(e){return console.log("getTemplate method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(Doc.prototype,"getURL",{value:function(e,t){console.log("getURL method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"gotoNamedDest",{value:function(e){console.log("gotoNamedDest method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importAnFDF",{value:function(e){console.log("importAnFDF method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importDataObject",{value:function(e,t){console.log("importDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importIcon",{value:function(e,t){console.log("importIcon method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importSound",{value:function(e){console.log("importSound method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"importTextData",{value:function(e,t){return console.log("importTextData method not defined contact - IDR SOLUTIONS"),0}}),Object.defineProperty(Doc.prototype,"importXFAData",{value:function(e){console.log("importXFAData method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"insertPages",{value:function(e,t,o,n){console.log("insertPages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"mailDoc",{value:function(){console.log("mailDoc method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"mailForm",{value:function(){console.log("mailForm method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"movePage",{value:function(e,t){console.log("movePage method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"newPage",{value:function(e,t,o){console.log("newPage method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"numFields",{get:function(){var e;return document.querySelectorAll("[data-field-name]").length}}),Object.defineProperty(Doc.prototype,"openDataObject",{value:function(e){return console.log("openDataObject method not defined contact - IDR SOLUTIONS"),this}}),Object.defineProperty(Doc.prototype,"print",{value:function(){window.print()}}),Object.defineProperty(Doc.prototype,"removeDataObject",{value:function(e){console.log("removeDataObject method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeField",{value:function(e){var t;document.querySelector('[data-field-name="'+e+'"]').remove()}}),Object.defineProperty(Doc.prototype,"removeIcon",{value:function(e){console.log("removeIcon method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeLinks",{value:function(e,t){console.log("removeLinks method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeRequirement",{value:function(e){console.log("removeRequirement method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeScript",{value:function(e){console.log("removeScript method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeTemplate",{value:function(e){console.log("removeTemplate method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeThumbnails",{value:function(e,t){console.log("removeThumbnails method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"removeWeblinks",{value:function(e,t){console.log("removeWeblinks method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"replacePages",{value:function(e,t,o,n){console.log("replacePages method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"resetForm",{value:function(e){if(e);else{for(var t=document.getElementsByTagName("form")[0],o=t.elements,n=0;n<o.length;n++){var i;if(o[n].dataset&&o[n].dataset.fieldName&&o[n].dataset.defaultDisplay)idrform.doc.getField(o[n].dataset.fieldName).display=Number(o[n].dataset.defaultDisplay)}t.reset()}}}),Object.defineProperty(Doc.prototype,"saveAs",{value:function(e,t,o,n,i){var a;if(this._checkRequired())return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"),void 0;console.log("saveAs method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"scroll",{value:function(e,t){console.log("scroll method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"selectPageNthWord",{value:function(e,t,o){console.log("selectPageNthWord method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setAction",{value:function(e,t){console.log("setAction method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setDataObjectContents",{value:function(e,t,o){console.log("setDataObjectContents method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setOCGOrder",{value:function(e){console.log("setOCGOrder method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageAction",{value:function(e,t){console.log("setPageAction method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageBoxes",{value:function(e,t,o,n){console.log("setPageBoxes method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageLabels",{value:function(e,t){console.log("setPageLabels method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageTabOrder",{value:function(e,t){console.log("setPageTabOrder method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"setPageTransitions",{value:function(e,t,o){console.log("setPageTransitions method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"spawnPageFromTemplate",{value:function(e,t,o,n,i){console.log("spawnPageFromTemplate method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Doc.prototype,"_getFieldsHTML",{value:function(e){for(var t=new Array,o=0,n=e.length;o<n;o++)for(var i=document.getElementsByTagName(e[o]),a=0,r=i.length;a<r;a++)t.push(i[a]);return t}}),Object.defineProperty(Doc.prototype,"_checkRequired",{value:function(){for(var e=!1,t=this._getFieldsHTML(["input","textarea","select"]),o=0,n=t.length;o<n;o++){var i=t[o];i.hasAttribute("required")&&(null!==i.value&&""!==i.value||(i.style.border="1px solid red",e=!0))}return e}}),Object.defineProperty(Doc.prototype,"_submitFormAsXML",{value:function(e){var t;if(this._checkRequired())return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"),void 0;for(var o="<fields>",n=this._getFieldsHTML(["input","textarea","select"]),i,a,r=0,s=n.length;r<s;r++)if(i=(a=n[r]).getAttribute("data-field-name"))switch(a.type){case"radio":case"checkbox":a.checked&&null!=a.value&&(o+="<"+i+">"+a.value+"</"+i+">");break;default:null!=a.value&&(o+="<"+i+">"+a.value+"</"+i+">");break}o+="</fields>";var c=document.createElement("form");c.setAttribute("method","post"),document.body.appendChild(c),c.setAttribute("action",url);var l=document.createElement("textarea");l.setAttribute("name","xmldata"),l.value=btoa(o),c.appendChild(l),c.submit()}}),Object.defineProperty(Doc.prototype,"_submitFormAsJSON",{value:function(e){var t;if(this._checkRequired())return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"),void 0;for(var o='{"fields":[\n',n=this._getFieldsHTML(["input","textarea","select"]),i,a,r=0,s=n.length;r<s;r++)if(i=(a=n[r]).getAttribute("data-field-name"))switch(a.type){case"radio":case"checkbox":a.checked&&null!=a.value&&(o+='"'+i+'":"'+a.value+'",\n');break;default:null!=a.value&&(o+='"'+i+'":"'+a.value+'",\n');break}o+="]}";var c=document.createElement("form");c.setAttribute("method","post"),document.body.appendChild(c),c.setAttribute("action",url);var l=document.createElement("textarea");l.setAttribute("name","jsondata"),l.value=btoa(o),c.appendChild(l),c.submit()}}),Object.defineProperty(Doc.prototype,"_submitFormAsPDF",{value:function(e){var t;if(this._checkRequired())return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"),void 0;var o=document.getElementById("FDFXFA_Processing");o&&(o.style.display="block");var n=EcmaParser._insertFieldsToPDF(""),i=EcmaFilter.encodeBase64(n),a=document.createElement("form");a.setAttribute("method","post"),e||(e=window.prompt("Please Enter URL to Submit Form; \n[ Please use 'pdfdata' as named parameter for accessing filled pdf as base64 ] \n[ Please refer to FormVu documentation for defining submit URL ]")),a.setAttribute("action",e),document.body.appendChild(a);var r=document.createElement("textarea");r.setAttribute("name","pdfdata"),r.value=i,a.appendChild(r),a.submit(),o&&(o.style.display="none")}}),Object.defineProperty(Doc.prototype,"submitForm",{value:function(e,t,o,n,i,a,r){if(app.isAcroForm)this._submitFormAsPDF(e);else{var s=new PdfDocument,c=new PdfPage;s.addPage(c);var l=new PdfText(70,70,"Helvetica",20,"Please wait...");c.addText(l),l=new PdfText(70,110,"Helvetica",11,"If this message is not eventually replaced by proper contents of the document, your PDF"),c.addText(l),l=new PdfText(70,124,"Helvetica",11,"viewer may not be able to display this type of document."),c.addText(l),l=new PdfText(70,150,"Helvetica",11,"You can upgrade to the latest version of Adobe Reader for Windows, Mac, or Linux by"),c.addText(l),l=new PdfText(70,164,"Helvetica",11,"visiting http://www.adobe.com/go/reader_download."),c.addText(l),l=new PdfText(70,190,"Helvetica",11,"For more assistance with Adobe Reader visit http://www.adobe.com/go/acrreader."),c.addText(l),l=new PdfText(70,220,"Helvetica",7.5,"Windows is either a registered trademark or a trademark of Microsoft Corporation in the United States and/or other countries. Mac is a trademark "),c.addText(l),l=new PdfText(70,229,"Helvetica",7.5,"of Apple Inc., registered in the United States and other countries. Linux is the registered trademark of Linus Torvalds in the U.S. and other "),c.addText(l),l=new PdfText(70,238,"Helvetica",7.5,"countries."),c.addText(l);var d=generateXDP(),u=s.createPdfString(d),h=EcmaPDF.encode64(u),f=document.createElement("form");f.setAttribute("method","post"),e||(e=window.prompt("Please Enter URL to Submit Form; \n[ Please use 'pdfdata' as named parameter for accessing filled pdf as base64 ] \n[ Please refer to FormVu documentation for defining submit URL ]")),f.setAttribute("action",e),document.body.appendChild(f);var m=document.createElement("textarea");m.setAttribute("name","pdfdata"),m.value=h,f.appendChild(m),f.submit()}}}),Object.defineProperty(Doc.prototype,"syncAnnotScan",{value:function(){console.log("syncAnnotScan method not defined contact - IDR SOLUTIONS")}});var color={transparent:["T"],black:["G",0],white:["G",1],red:["RGB",1,0,0],green:["RGB",0,1,0],blue:["RGB",0,0,1],cyan:["CMYK",1,0,0,0],magenta:["CMYK",0,1,0,0],yellow:["CMYK",0,0,1,0],dkGray:["G",.25],gray:["G",.5],ltGray:["G",.75],convert:function(e,t){var o=e;switch(t){case"G":"RGB"===e[0]?o=new Array("G",.3*e[1]+.59*e[2]+.11*e[3]):"CMYK"===e[0]&&(o=new Array("G",1-Math.min(1,.3*e[1]+.59*e[2]+.11*e[3]+e[4])));break;case"RGB":"G"===e[0]?o=new Array("RGB",e[1],e[1],e[1]):"CMYK"===e[0]&&(o=new Array("RGB",1-Math.min(1,e[1]+e[4]),1-Math.min(1,e[2]+e[4]),1-Math.min(1,e[3]+e[4])));break;case"CMYK":"G"===e[0]?o=new Array("CMYK",0,0,0,1-e[1]):"RGB"===e[0]&&(o=new Array("CMYK",1-e[1],1-e[2],1-e[3],0));break}return o},equal:function(e,t){if("G"===e[0]?e=this.convert(e,t[0]):t=this.convert(t,e[0]),e[0]!==t[0])return!1;for(var o=e[0].length,n=1;n<=o;n++)if(e[n]!==t[n])return!1;return!0},htmlColorToPDF:function(e){e.hasOwnProperty("indexof")&&-1!==e.indexof("#")&&(e=hexToRgbCss(e));var t=rgbCssToArr(e);return["RGB",t[0]/255,t[1]/255,t[2]/255]},pdfColorToHTML:function(e){var t=color.convert(e,"RGB");return rgbToHexCss(parseInt(255*t[1]),parseInt(255*t[2]),parseInt(255*t[3]))}};function Field(e){this.input=e,this.buttonAlignX=0,this.buttonAlignY=0,this.buttonFitBounds=!1,this.buttonPosition=0,this.buttonScaleHoq=0,this.buttonScaleWhen=0,this.calcOrderIndex=0,this.comb=!1,this.commitOnSelChange=!0,this.currentValueIndices=[],this.defaultStyle={},this.defaultValue="",this.doNotScroll=!1,this.doNotSpellCheck=!1,this.delay=!1,this.doc=doc,this.exportValues=[],this.fileSelect=!1,this.highlight="none",this.multiline=!1,this.multipleSelection=!1,this.page=0,this.password=!1,this.print=!0,this.radiosInUnison=!1,this.rect=[],this.richText=!1,this.richValue=[],this.rotation=0,this.style="",this.submitName="",this.textFont=null,this.userName=""}function FDF(){this.deleteOption=0,this.isSigned=!1,this.numEmbeddedFiles=0}function FullScreen(){}Object.defineProperty(Field.prototype,"alignment",{get:function(){return this.input.style.textAlign?this.input.style.textAlign:"left"},set:function(e){this.input.style.textAlign=e}}),Object.defineProperty(Field.prototype,"borderStyle",{get:function(){switch(this.input.style.borderStyle){case"solid":return border.s;case"dashed":return border.d;case"beveled":return border.b;case"inset":return border.i;case"underline":return border.u}return"none"},set:function(e){this.input.style.borderStyle=e}}),Object.defineProperty(Field.prototype,"charLimit",{get:function(){return this.input.maxLength},set:function(e){this.input.maxLength=e}}),Object.defineProperty(Field.prototype,"display",{get:function(){return this.input&&("none"===this.input.style.display||this.input.classList.contains("idr-hidden"))?display.hidden:display.visible},set:function(e){switch(this.input&&(this.input.dataset.defaultDisplay=this.input.dataset.defaultDisplay??this.display),e){case display.visible:this.input.classList.contains("idr-hidden")&&this.input.classList.remove("idr-hidden"),this.input.style.display="initial";break;case display.hidden:case display.noView:this.input.style.display="none";break}}}),Object.defineProperty(Field.prototype,"editable",{get:function(){return this.input.disabled},set:function(e){this.input.style.disabled=e}}),Object.defineProperty(Field.prototype,"fillColor",{get:function(){if(!this.input)return"";var e=window.getComputedStyle(this.input);return color.htmlColorToPDF(e.backgroundColor)},set:function(e){this.input.style.backgroundColor=color.pdfColorToHTML(e)}}),Object.defineProperty(Field.prototype,"hidden",{get:function(){return this.input.hidden},set:function(e){this.input.hidden=e}}),Object.defineProperty(Field.prototype,"lineWidth",{get:function(){return parseInt(this.style.borderWidth)},set:function(e){this.input.style.borderWidth=e+"px"}}),Object.defineProperty(Field.prototype,"name",{get:function(){return this.input.getAttribute("data-field-name")},set:function(e){this.input.setAttribute("data-field-name",e)}}),Object.defineProperty(Field.prototype,"numItems",{get:function(){return this.input.options.length}}),Object.defineProperty(Field.prototype,"readOnly",{get:function(){return this.input.readOnly},set:function(e){this.input.readOnly=e}}),Object.defineProperty(Field.prototype,"required",{get:function(){return this.input.required},set:function(e){this.input.required=e}}),Object.defineProperty(Field.prototype,"textSize",{get:function(){return parseInt(this.input.style.fontSize)},set:function(e){this.input.style.fontSize=parseInt(e)+"px"}}),Object.defineProperty(Field.prototype,"strokeColor",{get:function(){return color.htmlColorToPDF(this.input.style.borderColor)},set:function(e){this.input.style.borderColor=color.pdfColorToHTML(e)}}),Object.defineProperty(Field.prototype,"textColor",{get:function(){return color.htmlColorToPDF(this.input.style.color)},set:function(e){this.input.style.color=color.pdfColorToHTML(e)}}),Object.defineProperty(Field.prototype,"type",{get:function(){var e=this.input.tagName;return"INPUT"===e?this.getAttribute("type"):"SELECT"===e?"listbox":"BUTTON"===e?"button":"text"}}),Object.defineProperty(Field.prototype,"value",{get:function(){if(this.input){var e=this.input.value,t;switch(this.input.getAttribute("type")){case"checkbox":if(!this.input.checked)return!1;break;case"radio":if(null!=e)return EcmaFormField.hexDecodeName(e);break;case"text":if(""===e)return e;break}return isNaN(e)?e:1*e}},set:function(e){"radio"==this.input.getAttribute("type")?this.input.value=EcmaFormField.hexEncodeName(e):this.input.value=e}}),Object.defineProperty(Field.prototype,"valueAsString",{get:function(){return""+this.input.value},set:function(e){this.input.value=""+e}}),Object.defineProperty(Field.prototype,"browseForFileToSubmit",{value:function(){console.log("browseForFileToSubmit is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"buttonGetCaption",{value:function(){return this.input.innerHTML}}),Object.defineProperty(Field.prototype,"buttonGetIcon",{value:function(){console.log("buttonGetIcon is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"buttonImportIcon",{value:function(){console.log("buttonImportIcon is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"buttonSetCaption",{value:function(e){this.input.innerHTML=e}}),Object.defineProperty(Field.prototype,"buttonSetIcon",{value:function(){console.log("buttonSetIcon is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"checkThisBox",{value:function(e,t){this.input.checked=!0}}),Object.defineProperty(Field.prototype,"clearItems",{value:function(){var e,t;for(e=this.input.options.length-1;e>=0;e--)this.input.remove(e)}}),Object.defineProperty(Field.prototype,"defaultsChecked",{value:function(){return this.input.checked}}),Object.defineProperty(Field.prototype,"deleteItemAt",{value:function(e){if(-1===e){var t=this.input.options.length-1;this.input.remove(t)}else this.input.remove(e)}}),Object.defineProperty(Field.prototype,"getArray",{value:function(){console.log("getArray is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"getItemAt",{value:function(e,t){return this.input.options[e]}}),Object.defineProperty(Field.prototype,"getLock",{value:function(){console.log("getLock is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"insertItemAt",{value:function(e,t,o){var n=document.createElement("option");n.text=e,this.input.add(n,o)}}),Object.defineProperty(Field.prototype,"isBoxChecked",{value:function(e){return this.input.checked}}),Object.defineProperty(Field.prototype,"isDefaultChecked",{value:function(e){console.log("isDefaultChecked is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"setAction",{value:function(e,t){switch(e){case"MouseUp":this.input.addEventListener("mouseup",new Function(t));break;case"MouseDown":this.input.addEventListener("mousedown",new Function(t));break;case"MouseEnter":this.input.addEventListener("mouseenter",new Function(t));break;case"MouseExit":this.input.addEventListener("mouseexit",new Function(t));break;case"OnFocus":this.input.addEventListener("focus",new Function(t));break;case"OnBlur":this.input.addEventListener("blur",new Function(t));break;case"Keystroke":this.input.addEventListener("keydown",new Function(t));break;case"Validate":break;case"Calculate":break;case"Format":break}}}),Object.defineProperty(Field.prototype,"setFocus",{value:function(){this.input.focus()}}),Object.defineProperty(Field.prototype,"setItems",{value:function(e){for(var t=0;t<e.length;t++){var o=document.createElement("option");o.text=e[t],this.input.add(o)}}}),Object.defineProperty(Field.prototype,"setLock",{value:function(e){console.log("setLock is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureGetModifications",{value:function(){console.log("signatureGetModifications is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureGetSeedValue",{value:function(){console.log("signatureGetSeedValue is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureInfo",{value:function(){console.log("signatureInfo is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signauteSetSeedValue",{value:function(){console.log("signauteSetSeedValue is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureSign",{value:function(){console.log("signatureSign is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(Field.prototype,"signatureValidate",{value:function(){console.log("signatureValidate is method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"addContact",{value:function(e){console.log("addContact method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"addEmbeddedFile",{value:function(e,t){console.log("addEmbeddedFile method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"addRequest",{value:function(e,t,o){console.log("addRequest method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"close",{value:function(){console.log("close method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"mail",{value:function(){console.log("mail method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"save",{value:function(){console.log("save method not defined contact - IDR SOLUTIONS")}}),Object.defineProperty(FDF.prototype,"signatureClear",{value:function(){return console.log("signatureClear method not defined contact - IDR SOLUTIONS"),!1}}),Object.defineProperty(FDF.prototype,"signatureSign",{value:function(){return console.log("signatureSign method not defined contact - IDR SOLUTIONS"),!1}}),Object.defineProperty(FDF.prototype,"signatureValidate",{value:function(e,t){return console.log("signatureSign method not defined contact - IDR SOLUTIONS"),{}}}),Object.defineProperty(FullScreen.prototype,"isFullscreen",{get:function(){return this.isinFullscreen},set:function(e){var t,o;e?(document.body.requestFullscreen||document.body.msRequestFullscreen||document.body.mozRequestFullScreen||document.body.webkitRequestFullscreen).call(document.body):(document.exitFullscreen||document.msExitFullscreen||document.mozCancelFullScreen||document.webkitCancelFullScreen).call(document)},configurable:!0,enumerable:!0}),Object.defineProperty(FullScreen.prototype,"isFullscreenEnabled",{value:function(){return document.fullscreenEnabled||document.msFullscreenEnabled||document.mozFullScreenEnabled||document.webkitFullscreenEnabled}}),Object.defineProperty(FullScreen.prototype,"isinFullscreen",{value:function(){return!!(document.fullscreenElement||document.msFullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement)}}),Object.defineProperty(FullScreen.prototype,"toggleFullscreen",{value:function(){var e,t;this.isinFullscreen()?(document.exitFullscreen||document.msExitFullscreen||document.mozCancelFullScreen||document.webkitCancelFullScreen).call(document):(document.body.requestFullscreen||document.body.msRequestFullscreen||document.body.mozRequestFullScreen||document.body.webkitRequestFullscreen).call(document.body)}});var ADBC={SQLT_BIGINT:0,SQLT_BINARY:1,SQLT_BIT:2,SQLT_CHAR:3,SQLT_DATE:4,SQLT_DECIMAL:5,SQLT_DOUBLE:6,SQLT_FLOAT:7,SQLT_INTEGER:8,SQLT_LONGVARBINARY:9,SQLT_LONGVARCHAR:10,SQLT_NUMERIC:11,SQLT_REAL:12,SQLT_SMALLINT:13,SQLT_TIME:14,SQLT_TIMESTAMP:15,SQLT_TINYINT:16,SQLT_VARBINARY:17,SQLT_VARCHAR:18,SQLT_NCHAR:19,SQLT_NVARCHAR:20,SQLT_NTEXT:21,Numeric:0,String:1,Binary:2,Boolean:3,Time:4,Date:5,TimeStamp:6,getDataSourceList:function(){return console.log("ADBC.getDataSourceList() method not defined contact - IDR SOLUTIONS"),new Array},newConnnection:function(){var e={};if(arguments[0]instanceof Object)e=arguments[0];else switch(e.cDSN=arguments[0],arguments.length){case 2:e.cUID=arguments[1];break;case 3:e.cUID=arguments[1],e.cPWD=arguments[2];break}return console.log("ADBC.newConnection method not defined contact - IDR SOLUTIONS"),null}};function Alerter(){this.dispathc=function(){console.log("dispatch method not defined contact - IDR SOLUTIONS")}}function Alert(){this.type="",this.doc=null,this.fromUser=!1,this.error={message:""},this.errorText="",this.fileName="",this.selection=null}function AlternatePresentation(){this.active=!1,this.type="",this.start=function(){console.log("start method not defined contact - IDR SOLUTIONS")},this.stop=function(){console.log("stop method not defined contact - IDR SOLUTIONS")}}function Annotation(){this.type="Text",this.rect=[],this.page=0,this.alignment=0,this.AP="Approved",this.arrowBegin="None",this.arrowEnd="None",this.attachIcon="PushPin",this.author="",this.borderEffectIntensity="",this.callout=[],this.caretSymbol="",this.contents="",this.creationDate=new Date,this.dash=[],this.delay=!1,this.doc=null,this.doCaption=!1,this.fillColor=[],this.gestures=[],this.hidden=!1,this.inReplyTo="",this.intent="",this.leaderExtend=0,this.leaderLength=0,this.lineEnding="none",this.lock=!1,this.modDate=new Date,this.name="",this.noteIcon="Note",this.noView=!1,this.opacity=1,this.open=!1,this.point=[],this.points=[],this.popupOpen=!0,this.popupRect=[],this.print=!1,this.quads=[],this.readOnly=!1,this.refType="",this.richContents=[],this.richDefaults=null,this.rotate=0,this.seqNum=0,this.soundIcon="",this.state="",this.stateModel="",this.strokeColor=[],this.style="",this.subject="",this.textFont="",this.textSize=10,this.toggleNoView=!1,this.vertices=null,this.width=1,this.URI="",this.GoTo=""}function Bookmark(){this.children=null,this.color=["RGB",1,0,0],this.name="",this.open=!0,this.parent=null,this.style=0,this.createChild=function(e,t,o){console.log("createChild method not defined contact - IDR SOLUTIONS")},this.execute=function(){console.log("execute method not defined contact - IDR SOLUTIONS")},this.insertChild=function(e,t){console.log("insertChild method not defined contact - IDR SOLUTIONS")},this.remove=function(){console.log("remove method not defined contact - IDR SOLUTIONS")},this.setAction=function(e){console.log("setAction method not defined contact - IDR SOLUTIONS")}}function Catalog(){this.isIdle=!1,this.jobs=new Array,this.getIndex=function(e){console.log("getIndex method not defined contact - IDR SOLUTIONS")},this.remove=function(e){console.log("remove method not defined contact - IDR SOLUTIONS")}}function CatalogJob(){this.path="",this.type="",this.status=""}function Certificate(){this.binary="",this.issuerDN={},this.keyUsage=new Array,this.MD5Hash="",this.privateKeyValidityEnd={},this.privateKeyValidityStart={},this.SHA1Hash="",this.serialNumber="",this.subjectCN="",this.subjectDN="",this.ubRights={},this.usage={},this.validityEnd={},this.validityStart={}}function Rights(){this.mode="",this.rights=new Array}function Usage(){this.endUserSigning=!1,this.endUserEncryption=!1}Object.defineProperty(Annotation.prototype,"getDictionaryString",{value:function(){for(var e="<</Type /Annot /Subtype /"+this.type+" /Rect [ ",t=0,o=this.rect.length;t<o;t++)e+=this.rect[t]+" ";if(e+="]",this.type===AnnotationType.Highlight){e+="/QuadPoints [ ";for(var t=0,o=this.quads.length;t<o;t++)e+=this.quads[t]+" ";e+="]"}else if(this.type===AnnotationType.Text)this.contents.length>0&&(e+="/Contents ("+this.contents+")"),this.open&&(e+="/Open true");else if(this.type===AnnotationType.Link){if(this.URI.length>0?e+="/A <</Type /Action /S /URI /URI ("+this.URI+")>>":this.GoTo.length>0&&(e+="/Dest ["+this.GoTo+" /Fit]>>"),this.quads.length>0){e+="/QuadPoints [ ";for(var t=0,o=this.quads.length;t<o;t++)e+=this.quads[t]+" ";e+="]"}}else if(this.type===AnnotationType.Line)e+="/L ["+this.points[0]+" "+this.points[1]+" "+this.points[2]+" "+this.points[3]+"]";else if(this.type===AnnotationType.Polygon||this.type===AnnotationType.PolyLine){e+="/Vertices [";for(var t=0,o=this.vertices.length;t<o;t++)e+=this.vertices[t]+" ";e+="]"}else if(this.type===AnnotationType.Ink){e+="/InkList [";for(var n=this.gestures,t=0,o=n.length;t<o;t++){var i=n[t];e+=" [";for(var a=0,r=i.length;a<r;a++)e+=i[a]+" ";e+="] "}e+="]"}else if(this.type===AnnotationType.FreeText){for(var s="",t=0,o=this.richContents.length;t<o;t++){var c=this.richContents[t];s+="<span style='font-size:"+c.textSize+";color:"+c.textColor+"'>"+c.text+"</span>"}e+="/DA (/Arial "+this.textSize+" Tf)/RC (<body><p>"+s+"</p></body>)"}if(this.type===AnnotationType.Line||this.type===AnnotationType.Highlight||this.type===AnnotationType.FreeText||this.type===AnnotationType.Link||this.type===AnnotationType.Square||this.type===AnnotationType.Circle||this.type===AnnotationType.Polygon||this.type===AnnotationType.PolyLine||this.type===AnnotationType.Ink){if(this.opacity<1&&(e+="/CA "+this.opacity),1!==this.width&&(e+="/BS <</Type /Border /W "+this.width+">>"),this.fillColor.length>0){e+="/IC [";for(var t=0,o=this.fillColor.length;t<o;t++)e+=this.fillColor[t]+" ";e+="]"}if(this.strokeColor.length>0){e+="/C [";for(var t=0,o=this.strokeColor.length;t<o;t++)e+=this.strokeColor[t]+" ";e+="]"}}return e+=">>"}}),Object.defineProperty(Annotation.prototype,"destroy",{value:function(){return console.log("destroy method not defined contact - IDR SOLUTIONS"),!0}}),Object.defineProperty(Annotation.prototype,"getProps",{value:function(){return console.log("getProps method not defined contact - IDR SOLUTIONS"),!0}}),Object.defineProperty(Annotation.prototype,"getStateInModel",{value:function(){return console.log("getStateInModel method not defined contact - IDR SOLUTIONS"),!0}}),Object.defineProperty(Annotation.prototype,"setProps",{value:function(e){for(var t in e)t in this&&(this[t]=e[t]);return!0}}),Object.defineProperty(Annotation.prototype,"transitionToState",{value:function(e){console.log("transitionToState method not defined contact - IDR SOLUTIONS")}});var Collab={addStateModel:function(e,t,o,n,i,a){console.log("addStateModel not implemented")},documentToStream:function(e){console.log("documentToStream not implemented")},removeStateModel:function(e){console.log("removeStateModel not implemented")}};function States(){this.cUIName="",this.oIcon={}}function ColorConvertAction(){this.action={},this.alias="",this.colorantName="",this.convertIntent=0,this.convertProfile="",this.embed=!1,this.isProcessColor=!1,this.matchAttributesAll={},this.matchAttributesAny=0,this.matchIntent={},this.matchSpaceTypeAll={},this.matchSpaceTypeAny=0,this.preserveBlack=!1,this.useBlackPointCompensation=!1}function Column(){this.columnNum-0,this.name="",this.type=0,this.typeName="",this.value=""}function ColumnInfo(){this.name="",this.description="",this.type="",this.typeName=""}function Connection(){this.close=function(){console.log("close method not defined contact - IDR SOLUTIONS")},this.getColumnList=function(e){console.log("getColumnList method not defined contact - IDR SOLUTIONS")},this.getTableList=function(){console.log("getTableList method not defined contact - IDR SOLUTIONS")},this.newStatement=function(){console.log("newStatement method not defined contact - IDR SOLUTIONS")}}function Data(){this.creationDate={},this.description="",this.MIMEType="",this.modDate={},this.name="",this.path="",this.size=0}function DataSourceInfo(){this.name="",this.description=""}function dbg(){this.bps=new Array,this.c=new function(){console.log("c method not defined contact - IDR SOLUTIONS")},this.cb=function(e,t){console.log("cb method not defined contact - IDR SOLUTIONS")},this.q=function(){console.log("q method not defined contact - IDR SOLUTIONS")},this.sb=function(e,t,o){console.log("sb method not defined contact - IDR SOLUTIONS")},this.si=function(){console.log("si method not defined contact - IDR SOLUTIONS")},this.sn=function(){console.log("sn method not defined contact - IDR SOLUTIONS")},this.so=function(){console.log("so method not defined contact - IDR SOLUTIONS")},this.sv=function(){console.log("sv method not defined contact - IDR SOLUTIONS")}}function Dialog(){this.enable=function(e){console.log("enable method not defined contact - IDR SOLUTIONS")},this.end=function(e){console.log("end method not defined contact - IDR SOLUTIONS")},this.load=function(e){console.log("load method not defined contact - IDR SOLUTIONS")},this.store=function(e){console.log("store method not defined contact - IDR SOLUTIONS")}}function DirConnection(){this.canList=!1,this.canDoCustomSearch=!1,this.canDoCustomUISearch=!1,this.canDoStandardSearch=!1,this.groups=new Array,this.name="",this.uiName=""}function Directory(){this.info={},this.connect=function(e,t){return console.log("connect method not defined contact - IDR SOLUTIONS"),null}}function DirectoryInformation(){this.dirStdEntryID="",this.dirStdEntryName="",this.dirStdEntryPrefDirHandlerID="",this.dirStdEntryDirType="",this.dirStdEntryDirVersion="",this.server="",this.port=0,this.searchBase="",this.maxNumEntries=0,this.timeout=0}function Icon(){this.name=""}function IconStream(){this.width=0,this.height=0}function Identity(){this.corporation="",this.email="",this.loginName="",this.name=""}function Index(){this.available=!1,this.name="",this.path="",this.selected=!1,this.build=function(){console.log("build is method not defined contact - IDR SOLUTIONS")},this.parameters=function(){console.log("parameters is method not defined contact - IDR SOLUTIONS")}}function Link(e){this.ele=e,this.borderColor=[],this.borderWidth=0,this.highlightMode="invert",this.rect=[],this.setAction=function(){console.log("setAction is method not defined contact - IDR SOLUTIONS")}}function Marker(){this.frame=0,this.index=0,this.name="",this.time=0}function Markers(){this.player={},this.get=function(e){console.log("get is method not defined contact - IDR SOLUTIONS")}}function Media(){this.align={topLeft:0,topCenter:1,topRight:2,centerLeft:3,center:4,centerRight:5,bottomLeft:6,bottomCenter:7,bottomRight:8},this.canResize={no:0,keepRatio:1,yes:2},this.closeReason={general:0,error:1,done:2,stop:3,play:4,uiGeneral:5,uiScreen:6,uiEdit:7,docClose:8,docSave:9,docChange:10},this.defaultVisible=!0,this.ifOffScreen={allow:0,forseOnScreen:1,cancel:2},this.layout={meet:0,slice:1,fill:2,scroll:3,hidden:4,standard:5},this.monitorType={document:0,nonDocument:1,primary:3,bestColor:4,largest:5,tallest:6,widest:7},this.openCode={success:0,failGeneral:1,failSecurityWindow:2,failPlayerMixed:3,failPlayerSecurityPrompt:4,failPlayerNotFound:5,failPlayerMimeType:6,failPlayerSecurity:7,failPlayerData:8},this.over={pageWindow:0,appWindow:1,desktop:2,monitor:3},this.pageEventNames={Open:0,Close:1,InView:2,OutView:3},this.raiseCode={fileNotFound:0,fileOpenFailed:1},this.raiseSystem={fileError:0},this.renditionType={unknown:0,media:1,selector:2},this.status={clear:0,message:1,contacting:2,buffering:3,init:4,seeking:5},this.trace=!1,this.version=7,this.windowType={docked:0,floating:1,fullScreen:2},this.addStockEvents=function(e,t){console.log("addStockEvents method not defined contact - IDR SOLUTIONS")},this.alertFileNotFound=function(e,t,o){console.log("alertFileNotFound method not defined contact - IDR SOLUTIONS")},this.alertSelectFailed=function(e,t,o,n){console.log("alertFileNotFound method not defined contact - IDR SOLUTIONS")},this.argsDWIM=function(e){console.log("argsDWIM method not defined contact - IDR SOLUTIONS")},this.canPlayOrAlert=function(e){console.log("canPlayOrAlert method not defined contact - IDR SOLUTIONS")},this.computeFloatWinRect=function(e,t,o,n){console.log("computeFloatWinRect method not defined contact - IDR SOLUTIONS")},this.constrainRectToScreen=function(e,t){console.log("constrainRectToScreen method not defined contact - IDR SOLUTIONS")},this.createPlayer=function(e){console.log("createPlayer method not defined contact - IDR SOLUTIONS")},this.getAltTextData=function(e){console.log("getAltTextData method not defined contact - IDR SOLUTIONS")},this.getAltTextSettings=function(){console.log("getAltTextSettings method not defined contact - IDR SOLUTIONS")},this.getAnnotStockEvents=function(){console.log("getAnnotStockEvents method not defined contact - IDR SOLUTIONS")},this.getAnnotTraceEvents=function(){console.log("getAnnotTraceEvents method not defined contact - IDR SOLUTIONS")},this.getPlayers=function(){console.log("getPlayers method not defined contact - IDR SOLUTIONS")},this.getPlayerStockEvents=function(){console.log("getPlayerStockEvents method not defined contact - IDR SOLUTIONS")},this.getPlayerTraceEvents=function(){console.log("getPlayerTraceEvents method not defined contact - IDR SOLUTIONS")},this.getRenditionSettings=function(){console.log("getRenditionSettings method not defined contact - IDR SOLUTIONS")},this.getURLData=function(){console.log("getURLData method not defined contact - IDR SOLUTIONS")},this.getURLSettings=function(){console.log("getURLSettings method not defined contact - IDR SOLUTIONS")},this.getWindowBorderSize=function(){console.log("getWindowBorderSize method not defined contact - IDR SOLUTIONS")},this.openPlayer=function(){console.log("openPlayer method not defined contact - IDR SOLUTIONS")},this.removeStockEvents=function(){console.log("removeStockEvents method not defined contact - IDR SOLUTIONS")},this.startPlayer=function(){console.log("startPlayer method not defined contact - IDR SOLUTIONS")}}function MediaOffset(){this.frame=0,this.marker="",this.time=0}function MediaPlayer(){this.annot={},this.defaultSize={width:0,height:0},this.doc={},this.events={},this.hasFocus=!1,this.id=0,this.innerRect=[],this.isOpen=!1,this.isPlaying=!1,this.outerRect=[],this.page=0,this.settings={},this.uiSize=[],this.visible=!1,this.close=function(){console.log("close is not implemented")},this.open=function(){console.log("open is not implemented")},this.pause=function(){console.log("pause is not implemented")},this.play=function(){console.log("play is not implemented")},this.seek=function(){console.log("seek is not implemented")},this.setFocus=function(){console.log("setFocus is not implemented")},this.stop=function(){console.log("stop is not implemented")},this.triggerGetRect=function(){console.log("triggerGetRect is not implemented")}}function MediaReject(){this.rendition={}}function MediaSelection(){this.selectContext={},this.players=[],this.rejects=[],this.rendtion={}}function MediaSettings(){this.autoPlay=!1,this.baseURL="",this.bgColor=[],this.bgOpacity=1,this.data={},this.duration=0,this.endAt=0,this.floating={},this.layout=0,this.monitor={},this.monitorType=0,this.page=0,this.palindrome=!1,this.players={},this.rate=0,this.repeat=0,this.showUI=!1,this.startAt={},this.visible=!1,this.volume=0,this.windowType=0}function Monitor(){this.colorDepth=0,this.isPrimary=!1,this.rect=[],this.workRect=[]}function Monitors(){this.bestColor=function(){console.log("bestColor is not implemented")},this.bestFit=function(){console.log("bestFit is not implemented")},this.desktop=function(){console.log("desktop is not implemented")},this.document=function(){console.log("document is not implemented")},this.filter=function(){console.log("filter is not implemented")},this.largest=function(){console.log("largest is not implemented")},this.leastOverlap=function(){console.log("leastOverlap is not implemented")},this.mostOverlap=function(){console.log("mostOverlap is not implemented")},this.nonDocument=function(){console.log("nonDocument is not implemented")},this.primary=function(){console.log("primary is not implemented")},this.secondary=function(){console.log("secondary is not implemented")},this.select=function(){console.log("select is not implemented")},this.tallest=function(){console.log("tallest is not implemented")},this.widest=function(){console.log("widest is not implemented")}}function Net(){this.SOAP={},this.Discovery={},this.HTTP={},this.streamDecode=function(){console.log("streamDecode is not implemented")},this.streamDigest=function(){console.log("streamDigest is not implemented")},this.streamEncode=function(){console.log("streamEncode is not implemented")}}function OCG(){this.constants={},this.initState=!1,this.locked=!1,this.name="",this.state=!1,this.getIntent=function(){console.log("getIntent is not implemented")},this.setAction=function(){console.log("setAction is not implemented")},this.setIntent=function(){console.log("setIntent is not implemented")}}function PlayerInfo(){this.id="",this.mimeTypes=[],this.name="",this.version="",this.canPlay=function(){console.log("canPlay is not implemented")},this.canUseData=function(){console.log("canUseData is not implemented")},this.honors=function(){console.log("honors is not implemented")}}function PlayerInfoList(){this.select=function(){console.log("select is not implemented")}}function Plugin(){this.certified=!1,this.loaded=!1,this.name="",this.path="",this.version=0}function Booklet(){this.binding=0,this.duplexMode=0,this.subsetForm=0,this.subsetTo=0}function PrintParams(){this.binaryOK=!0,this.bitmapDPI=0,this.booklet=new Booklet,this.colorOverride=0,this.colorProfile="",this.constants={},this.downloadFarEastFonts=!1,this.fileName="",this.firstPage=0,this.flags=0,this.fontPolicy=0,this.gradientDPI=0,this.interactive=0,this.lastPage=0,this.nUpAutoRotate=!1,this.nUpNumPagesH=0,this.nUpNumPagesV=0,this.nUpPageBorder=!1,this.nUpPageOrder=0,this.pageHandling=0,this.pageSubset=0,this.printAsImage=!1,this.printContent=0,this.printName="",this.psLevel=0,this.rasterFlags=0,this.reversePages=!1,this.tileLabel=!1,this.tileMark=0,this.tileOverlap=0,this.tileScale=0,this.transparencyLevel=0,this.usePrinterCRD=0,this.useT1Conversion=0}function Span(){this.alignement=0,this.fontFamily=["serif","sans-serif","monospace"],this.fontStretch="normal",this.fontStyle="normal",this.fontWeight=400,this.strikeThrough=!1,this.subscript=!1,this.superscript=!1,this.text="",this.textColor=color.black,this.textSize=12,this.underline=!1}function Thermometer(){this.cancelled=!1,this.duration=0,this.text="",this.value=0,this.begin=function(){console.log("begin method not defined contact - IDR SOLUTIONS")},this.end=function(){console.log("end method not defined contact - IDR SOLUTIONS")}}var util={crackURL:function(e){return console.log("crackURL method not defined contact - IDR SOLUTIONS"),{}},iconStreamFromIcon:function(){return console.log("iconStreamFromIcon method not defined contact - IDR SOLUTIONS"),{}},printd:function(e,t,o){var n=["JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"],i=["SUNDAY","MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY"];switch(e){case 0:return this.printd("D:yyyymmddHHMMss",t);case 1:return this.printd("yyyy.mm.dd HH:MM:ss",t);case 2:return this.printd("m/d/yy h:MM:ss tt",t)}var a={year:t.getFullYear(),month:t.getMonth(),day:t.getDate(),dayOfWeek:t.getDay(),hours:t.getHours(),minutes:t.getMinutes(),seconds:t.getSeconds()},r=/(mmmm|mmm|mm|m|dddd|ddd|dd|d|yyyy|yy|HH|H|hh|h|MM|M|ss|s|tt|t|\\.)/g;return e.replace(r,(function(e,t){switch(t){case"mmmm":return n[a.month];case"mmm":return n[a.month].substring(0,3);case"mm":return(a.month+1).toString().padStart(2,"0");case"m":return(a.month+1).toString();case"dddd":return i[a.dayOfWeek];case"ddd":return i[a.dayOfWeek].substring(0,3);case"dd":return a.day.toString().padStart(2,"0");case"d":return a.day.toString();case"yyyy":return a.year.toString();case"yy":return(a.year%100).toString().padStart(2,"0");case"HH":return a.hours.toString().padStart(2,"0");case"H":return a.hours.toString();case"hh":return(1+(a.hours+11)%12).toString().padStart(2,"0");case"h":return(1+(a.hours+11)%12).toString();case"MM":return a.minutes.toString().padStart(2,"0");case"M":return a.minutes.toString();case"ss":return a.seconds.toString().padStart(2,"0");case"s":return a.seconds.toString();case"tt":return a.hours<12?"am":"pm";case"t":return a.hours<12?"a":"p"}return t.charCodeAt(1)}))},printf:function(e,arguments){var t=e.indexOf("%");if(-1===t)return e+" "+arguments;var o=e[t+1],n=e.indexOf("."),i=e[n+1],a=arguments.toFixed(i);return t>0&&(a=e.substring(0,t)+a),a},printx:function(e,t){var o=[e=>e,e=>e.toUpperCase(),e=>e.toLowerCase()],n=[],i=0,a=t.length,r=o[0],s=!1;for(var c of e)if(s)n.push(c),s=!1;else{if(i>=a)break;switch(c){case"?":n.push(r(t.charAt(i++)));break;case"X":for(;i<a;){var l;if("a"<=(l=t.charAt(i++))&&l<="z"||"A"<=l&&l<="Z"||"0"<=l&&l<="9"){n.push(r(l));break}}break;case"A":for(;i<a;){var l;if("a"<=(l=t.charAt(i++))&&l<="z"||"A"<=l&&l<="Z"){n.push(r(l));break}}break;case"9":for(;i<a;){var l;if("0"<=(l=t.charAt(i++))&&l<="9"){n.push(l);break}}break;case"*":for(;i<a;)n.push(r(t.charAt(i++)));break;case"\\":s=!0;break;case">":r=o[1];break;case"<":r=o[2];break;case"=":r=o[0];break;default:n.push(c)}}return n.join("")},scand:function(e,t){var o=e.split(/[ \-:\/\.]/),n=t.split(/[ \-:\/\.]/);if(o.length!=n.length)return null;for(var i=new Date,a=0;a<o.length;a++){var r;switch(r=(r=n[a]).toUpperCase(),o[a]){case"d":case"dd":if(isNaN(r))return null;i.setDate(parseInt(r));break;case"m":case"mm":if(isNaN(r))return null;var r;if(0==(r=parseInt(r))||r>12)return null;i.setMonth(r);break;case"mmm":case"mmmm":if(isNaN(r)){for(var s=["JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"],c=-1,l=0,d=s.length;l<d;l++)if(-1!==s[l].indexOf(r)){c=l;break}if(-1===c)return null;i.setMonth(c)}else i.setMonth(parseInt(r)-1);break;case"y":case"yy":if(isNaN(r))return null;i.setFullYear(parseInt(r));break;case"yyy":case"yyyy":if(isNaN(r)||r.length!=o[a].length)return null;i.setFullYear(parseInt(r));break;case"H":case"HH":if(isNaN(r))return null;i.setHours(parseInt(r));break;case"M":case"MM":if(isNaN(r))return null;i.setMinutes(parseInt(r));case"s":case"ss":if(isNaN(r))return null;i.setSeconds(parseInt(r))}}return i},spansToXML:function(e){console.log("method not defined contact - IDR SOLUTIONS")},streamFromString:function(e,t){console.log("method not defined contact - IDR SOLUTIONS")},stringFromStream:function(e,t){console.log("method not defined contact - IDR SOLUTIONS")},xmlToSpans:function(e){console.log("method not defined contact - IDR SOLUTIONS")}},JSRESERVED=["break","delete","function","return","typeof","case","do","if","switch","var","catch","else","in","this","void","continue","false","instanceof","throw","while","debugger","finally","new","true","with","default","for","null","try","class","const","enum","export","extends","import","super","implements","let","private","public","yield","interface","package","protected","static","abstract","double","goto","native","static","boolean","enum","implements","package","super","byte","export","import","private","synchronized","char","extends","int","protected","throws","class","final","interface","public","transient","const","float","long","short","volatile","arguments","encodeURI","Infinity","Number","RegExp","Array","encodeURIComponent","isFinite","Object","String","Boolean","Error","isNaN","parseFloat","SyntaxError","Date","eval","JSON","parseInt","TypeError","decodeURI","EvalError","Math","RangeError","undefined","decodeURIComponent","Function","NaN","ReferenceError","URIError"],EcmaFilter={decode:function(e,t){if("FlateDecode"===e){for(var o=new EcmaFlate,n=[],i=0,a=2,r=t.length;a<r;a++)n[i++]=t[a];return o.decode(n)}var s,c,l;return"ASCII85Decode"===e?(new EcmaAscii85).decode(t):"ASCIIHexDecode"===e?(new EcmaAsciiHex).decode(t):"RunLengthDecode"===e?(new EcmaRunLength).decode():(console.log("This type of decoding is not supported yet : "+e),t)},applyPredictor:function(e,t,o,n,i,a,r){if(1===t)return e;for(var s,c=e.length,l=new EcmaBuffer(e),d=n*i+7>>3,u=(a*n*i+7>>3)+d,h=this.createByteBuffer(u),f=this.createByteBuffer(u),m,p=0,g=0;!(c<=g);){var y=0,S=d;if((s=t)>=10){if(-1===(m=l.getByte()))break;m+=10}else m=s;for(;S<u&&-1!==(y=l.readTo(h,S,u-S));)S+=y,g+=y;if(-1===y)break;switch(m){case 2:for(var O=d;O<u;O++){var E=255&h[O],A=255&h[O-d];h[O]=E+A&255,o&&(o[p]=h[O]),p++}break;case 10:for(var O=d;O<u;O++)o&&(o[p]=255&h[O]),p++;break;case 11:for(var O=d;O<u;O++){var E=255&h[O],A=255&h[O-d];h[O]=E+A,o&&(o[p]=255&h[O]),p++}break;case 12:for(var O=d;O<u;O++){var E=(255&f[O])+(255&h[O]);h[O]=E,o&&(o[p]=255&h[O]),p++}break;case 13:for(var O=d;O<u;O++){var I=255&h[O],v=(255&h[O-d])+(255&f[O])>>1;h[O]=I+v,o&&(o[p]=255&h[O]),p++}break;case 14:for(var O=d;O<u;O++){var D=255&h[O-d],b=255&f[O],T=255&f[O-d],F=D+b-T,R=F-D,L=F-b,P=F-T;R=R<0?-R:R,L=L<0?-L:L,P=P<0?-P:P,h[O]=R<=L&&R<=P?h[O]+D:L<=P?h[O]+b:h[O]+T,o&&(o[p]=255&h[O]),p++}break;case 15:break}for(var y=0;y<u;y++)f[y]=h[y]}return p},createByteBuffer:function(e){for(var t=[],o=0;o<e;o++)t.push(0);return t},decodeBase64:function(e){for(var t="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",o,n,i,a,r=[],s=e.replace(/[^A-Za-z0-9\+\/\=]/g,""),c=s.length,l=0;l<c;)o=t.indexOf(s.charAt(l++)),n=t.indexOf(s.charAt(l++)),i=t.indexOf(s.charAt(l++)),a=t.indexOf(s.charAt(l++)),r.push(o<<2|n>>4),64!==i&&r.push((15&n)<<4|i>>2),64!==a&&r.push((3&i)<<6|a);return r},encodeBase64:function(e){for(var t="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",o="",n,i,a,r,s,c,l,d=0,u=e.length;d<u;)r=(n=e[d++])>>2,s=(3&n)<<4|(i=e[d++])>>4,c=(15&i)<<2|(a=e[d++])>>6,l=63&a,isNaN(i)?c=l=64:isNaN(a)&&(l=64),o+=t.charAt(r)+t.charAt(s)+t.charAt(c)+t.charAt(l);return o}};function EcmaFlate(){this.decode=function(e){var t,o,n,i,a=1024;for(p=0,h=0,f=0,l=-1,m=!1,E=A=0,D=null,d=e,u=0,o=new Array(a),t=[];(n=j(o,0,a))>0;)for(i=0;i<n;i++)t.push(o[i]);return d=null,t};var e=[0,1,3,7,15,31,63,127,255,511,1023,2047,4095,8191,16383,32767,65535],t=[3,4,5,6,7,8,9,10,11,13,15,17,19,23,27,31,35,43,51,59,67,83,99,115,131,163,195,227,258,0,0],o=[1,2,3,4,5,7,9,13,17,25,33,49,65,97,129,193,257,385,513,769,1025,1537,2049,3073,4097,6145,8193,12289,16385,24577],n=[16,17,18,0,8,7,9,6,10,5,11,4,12,3,13,2,14,1,15],i=[0,0,0,0,0,0,0,0,1,1,1,1,2,2,2,2,3,3,3,3,4,4,4,4,5,5,5,5,0,99,99],a=[0,0,0,0,1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12,13,13],r=32768,s=0,c=new Array(r<<1),l,d,u,h,f,m,p,g=null,y,S,O,E,A,I=9,v=6,D,b,T,F;function R(){return d.length===u?-1:255&d[u++]}function L(t){return h&e[t]}function P(){this.next=null,this.list=null}function N(){this.e=0,this.b=0,this.n=0,this.t=null}function C(e,t,o,n,i,a){this.BMAX=16,this.N_MAX=288,this.status=0,this.root=null,this.m=0;var r,s=new Array(this.BMAX+1),c,l,d,u,h,f,m,p=new Array(this.BMAX+1),g,y,S,O=new N,E=new Array(this.BMAX),A=new Array(this.N_MAX),I=new Array(this.BMAX+1),v,D,b,T,F,R;for(R=this.root=null,h=0;h<s.length;h++)s[h]=0;for(h=0;h<p.length;h++)p[h]=0;for(h=0;h<E.length;h++)E[h]=null;for(h=0;h<A.length;h++)A[h]=0;for(h=0;h<I.length;h++)I[h]=0;c=t>256?e[256]:this.BMAX,g=e,y=0,h=t;do{s[g[y]]++,y++}while(--h>0);if(s[0]===t)return this.root=null,this.m=0,this.status=0,void 0;for(f=1;f<=this.BMAX&&0===s[f];f++);for(m=f,a<f&&(a=f),h=this.BMAX;0!==h&&0===s[h];h--);for(d=h,a>h&&(a=h),b=1<<f;f<h;f++,b<<=1)if((b-=s[f])<0)return this.status=2,this.m=a,void 0;if((b-=s[h])<0)return this.status=2,this.m=a,void 0;for(s[h]+=b,I[1]=f=0,g=s,y=1,D=2;--h>0;)I[D++]=f+=g[y++];g=e,y=0,h=0;do{0!==(f=g[y++])&&(A[I[f]++]=h)}while(++h<t);for(t=I[d],I[0]=h=0,g=A,y=0,u=-1,v=p[0]=0,S=null,T=0;m<=d;m++)for(r=s[m];r-- >0;){for(;m>v+p[1+u];){if(v+=p[1+u],u++,T=(T=d-v)>a?a:T,(l=1<<(f=m-v))>r+1)for(l-=r+1,D=m;++f<T&&!((l<<=1)<=s[++D]);)l-=s[D];for(v+f>c&&v<c&&(f=c-v),T=1<<f,p[1+u]=f,S=new Array(T),F=0;F<T;F++)S[F]=new N;(R=R?R.next=new P:this.root=new P).next=null,R.list=S,E[u]=S,u>0&&(I[u]=h,O.b=p[u],O.e=16+f,O.t=S,f=(h&(1<<v)-1)>>v-p[u],E[u-1][f].e=O.e,E[u-1][f].b=O.b,E[u-1][f].n=O.n,E[u-1][f].t=O.t)}for(O.b=m-v,y>=t?O.e=99:g[y]<o?(O.e=g[y]<256?16:15,O.n=g[y++]):(O.e=i[g[y]-o],O.n=n[g[y++]-o]),l=1<<m-v,f=h>>v;f<T;f+=l)S[f].e=O.e,S[f].b=O.b,S[f].n=O.n,S[f].t=O.t;for(f=1<<m-1;0!=(h&f);f>>=1)h^=f;for(h^=f;(h&(1<<v)-1)!==I[u];)v-=p[u],u--}this.m=p[1],this.status=0!==b&&1!==d?1:0}function k(e){for(;f<e;)h|=R()<<f,f+=8}function B(e){h>>=e,f-=e}function U(e,t,o){if(0===o)return 0;for(var n,i,a=0;;){for(k(T),n=(i=D.list[L(T)]).e;n>16;){if(99===n)return-1;B(i.b),k(n-=16),n=(i=i.t[L(n)]).e}if(B(i.b),16!==n){if(15===n)break;for(k(n),E=i.n+L(n),B(n),k(F),n=(i=b.list[L(F)]).e;n>16;){if(99===n)return-1;B(i.b),k(n-=16),n=(i=i.t[L(n)]).e}for(B(i.b),k(n),A=p-i.n-L(n),B(n);E>0&&a<o;)E--,A&=r-1,p&=r-1,e[t+a++]=c[p++]=c[A++];if(a===o)return o}else if(p&=r-1,e[t+a++]=c[p++]=i.n,a===o)return o}return l=-1,a}function w(e,t,o){var n;if(B(n=7&f),k(16),n=L(16),B(16),k(16),n!==(65535&~h))return-1;for(B(16),E=n,n=0;E>0&&n<o;)E--,p&=r-1,k(8),e[t+n++]=c[p++]=L(8),B(8);return 0===E&&(l=-1),n}function x(e,n,r){if(null===g){var s,c,l=new Array(288);for(s=0;s<144;s++)l[s]=8;for(;s<256;s++)l[s]=9;for(;s<280;s++)l[s]=7;for(;s<288;s++)l[s]=8;if(0!==(c=new C(l,288,257,t,i,S=7)).status){throw"EcmaFlateDecodeError : Huffman Status "+c.status;return-1}for(g=c.root,S=c.m,s=0;s<30;s++)l[s]=5;if((c=new C(l,30,0,o,a,O=5)).status>1){throw g=null,"EcmaFlateDecodeError : Huffman Status"+c.status;return-1}y=c.root,O=c.m}return D=g,b=y,T=S,F=O,U(e,n,r)}function M(e,r,s){var c,l,d,u,h,f,m,p,g,y=new Array(316);for(c=0;c<y.length;c++)y[c]=0;if(k(5),m=257+L(5),B(5),k(5),p=1+L(5),B(5),k(4),f=4+L(4),B(4),m>286||p>30)return-1;for(l=0;l<f;l++)k(3),y[n[l]]=L(3),B(3);for(;l<19;l++)y[n[l]]=0;if(0!==(g=new C(y,19,19,null,null,T=7)).status)return-1;for(D=g.root,T=g.m,u=m+p,c=d=0;c<u;)if(k(T),B(l=(h=D.list[L(T)]).b),(l=h.n)<16)y[c++]=d=l;else if(16===l){if(k(2),l=3+L(2),B(2),c+l>u)return-1;for(;l-- >0;)y[c++]=d}else if(17===l){if(k(3),l=3+L(3),B(3),c+l>u)return-1;for(;l-- >0;)y[c++]=0;d=0}else{if(k(7),l=11+L(7),B(7),c+l>u)return-1;for(;l-- >0;)y[c++]=0;d=0}if(g=new C(y,m,257,t,i,T=I),0===T&&(g.status=1),0!==g.status)return-1;for(D=g.root,T=g.m,c=0;c<p;c++)y[c]=y[c+m];return g=new C(y,p,0,o,a,F=v),b=g.root,0===(F=g.m)&&m>257||0!==g.status?-1:U(e,r,s)}function j(e,t,o){for(var n=0,i;n<o;){if(m&&-1===l)return n;if(E>0){if(l!==s)for(;E>0&&n<o;)E--,A&=r-1,p&=r-1,e[t+n++]=c[p++]=c[A++];else{for(;E>0&&n<o;)E--,p&=r-1,k(8),e[t+n++]=c[p++]=L(8),B(8);0===E&&(l=-1)}if(n===o)return n}if(-1===l){if(m)break;k(1),0!==L(1)&&(m=!0),B(1),k(2),l=L(2),B(2),D=null,E=0}switch(l){case 0:i=w(e,t+n,o-n);break;case 1:i=D?U(e,t+n,o-n):x(e,t+n,o-n);break;case 2:i=D?U(e,t+n,o-n):M(e,t+n,o-n);break;default:i=-1;break}if(-1===i)return m?0:-1;n+=i}return n}}function EcmaAsciiHex(){this.decode=function(e){for(var t=[],o=-1,n=0,i,a,r=!1,s=0,c=e.length;s<c;s++){if((i=e[s])>=48&&i<=57)a=15&i;else{if(!(i>=65&&i<=70||i>=97&&i<=102)){if(62===i){r=!0;break}continue}a=9+(15&i)}o<0?o=a:(t[n++]=o<<4|a,o=-1)}return o>=0&&r&&(t[n++]=o<<4,o=-1),t}}function EcmaAscii85(){this.decode=function(e){for(var t=e.length,o=[],n=[0,0,0,0,0],i,a,r,s,c,l=0;l<t;++l)if(122!==e[l]){for(i=0;i<5;++i)n[i]=e[l+i]-33;if((c=t-l)<5){for(i=c;i<4;n[++i]=0);n[c]=85}for(r=255&(a=85*(85*(85*(85*n[0]+n[1])+n[2])+n[3])+n[4]),s=255&(a>>>=8),a>>>=8,o.push(a>>>8,255&a,s,r),i=c;i<5;++i,o.pop());l+=4}else o.push(0,0,0,0);return o}}function EcmaRunLength(){this.decode=function(e){for(var t,o,n=e.length,i=0,a=[],r=0;r<n;r++)if((t=e[r])<0&&(t=256+t),128===t)r=n;else if(t>128){t=257-t,o=e[++r];for(var s=0;s<t;s++)a[i++]=o}else{r++,t++;for(var s=0;s<t;s++)a[i++]=e[r+s];r=r+t-1}return a}}var EcmaKEY={A:"A",AA:"AA",AC:"AC",AcroForm:"AcroForm",ActualText:"ActualText",AIS:"AIS",Alternate:"Alternate",AlternateSpace:"AlternateSpace",Annot:"Annot",Annots:"Annots",AntiAlias:"AntiAlias",AP:"AP",Array:"Array",ArtBox:"ArtBox",AS:"AS",Asset:"Asset",Assets:"Assets",Ascent:"Ascent",Author:"Author",AvgWidth:"AvgWidth",B:"B",BlackPoint:"BlackPoint",Background:"Background",Base:"Base",BaseEncoding:"BaseEncoding",BaseFont:"BaseFont",BaseState:"BaseState",BBox:"BBox",BC:"BC",BDC:"BDC",BG:"BG",BI:"BI",BitsPerComponent:"BitsPerComponent",BitsPerCoordinate:"BitsPerCoordinate",BitsPerFlag:"BitsPerFlag",BitsPerSample:"BitsPerSample",BlackIs1:"BlackIs1",BleedBox:"BleedBox",Blend:"Blend",Bounds:"Bounds",Border:"Border",BM:"BM",BPC:"BPC",BS:"BS",Btn:"Btn",ByteRange:"ByteRange",C:"C",C0:"C0",C1:"C1",C2:"C2",CA:"CA",ca:"ca",Calculate:"Calculate",CapHeight:"CapHeight",Caret:"Caret",Category:"Category",Catalog:"Catalog",Cert:"Cert",CF:"CF",CFM:"CFM",Ch:"Ch",CIDSet:"CIDSet",CIDSystemInfo:"CIDSystemInfo",CharProcs:"CharProcs",CharSet:"CharSet",CheckSum:"CheckSum",CIDFontType0C:"CIDFontType0C",CIDToGIDMap:"CIDToGIDMap",Circle:"Circle",ClassMap:"ClassMap",CMap:"CMap",CMapName:"CMapName",CMYK:"CMYK",CO:"CO",Color:"Color",Colors:"Colors",ColorBurn:"ColorBurn",ColorDodge:"ColorDodge",ColorSpace:"ColorSpace",ColorTransform:"ColorTransform",Columns:"Columns",Components:"Components",CompressedObject:"CompressedObject",Compatible:"Compatible",Configurations:"Configurations",Configs:"Configs",ContactInfo:"ContactInfo",Contents:"Contents",Coords:"Coords",Count:"Count",CreationDate:"CreationDate",Creator:"Creator",CropBox:"CropBox",CS:"CS",CVMRC:"CVMRC",D:"D",DA:"DA",DamageRowsBeforeError:"DamageRowsBeforeError",Darken:"Darken",DC:"DC",DCT:"DCT",Decode:"Decode",DecodeParms:"DecodeParms",Desc:"Desc",DescendantFonts:"DescendantFonts",Descent:"Descent",Dest:"Dest",Dests:"Dests",Difference:"Difference",Differences:"Differences",Domain:"Domain",DP:"DP",DR:"DR",DS:"DS",DV:"DV",DW:"DW",DW2:"DW2",E:"E",EarlyChange:"EarlyChange",EF:"EF",EFF:"EFF",EmbeddedFiles:"EmbeddedFiles",EOPROPtype:"EOPROPtype",Encode:"Encode",EncodeByteAlign:"EncodeByteAlign",Encoding:"Encoding",Encrypt:"Encrypt",EncryptMetadata:"EncryptMetadata",EndOfBlock:"EndOfBlock",EndOfLine:"EndOfLine",Exclusion:"Exclusion",Export:"Export",Extend:"Extend",Extends:"Extends",ExtGState:"ExtGState",Event:"Event",F:"F",FDF:"FDF",Ff:"Ff",Fields:"Fields",FIleAccess:"FIleAccess",FileAttachment:"FileAttachment",Filespec:"Filespec",Filter:"Filter",First:"First",FirstChar:"FirstChar",FIrstPage:"FIrstPage",Fit:"Fit",FItB:"FItB",FitBH:"FitBH",FItBV:"FItBV",FitH:"FitH",FItHeight:"FItHeight",FitR:"FitR",FitV:"FitV",FitWidth:"FitWidth",Flags:"Flags",Fo:"Fo",Font:"Font",FontBBox:"FontBBox",FontDescriptor:"FontDescriptor",FontFamily:"FontFamily",FontFile:"FontFile",FontFIle2:"FontFIle2",FontFile3:"FontFile3",FontMatrix:"FontMatrix",FontName:"FontName",FontStretch:"FontStretch",FontWeight:"FontWeight",Form:"Form",Format:"Format",FormType:"FormType",FreeText:"FreeText",FS:"FS",FT:"FT",FullScreen:"FullScreen",Function:"Function",Functions:"Functions",FunctionType:"FunctionType",G:"G",Gamma:"Gamma",GoBack:"GoBack",GoTo:"GoTo",GoToR:"GoToR",Group:"Group",H:"H",HardLight:"HardLight",Height:"Height",Hide:"Hide",Highlight:"Highlight",Hue:"Hue",Hival:"Hival",I:"I",ID:"ID",Identity:"Identity",Identity_H:"Identity_H",Identity_V:"Identity_V",IDTree:"IDTree",IM:"IM",Image:"Image",ImageMask:"ImageMask",Index:"Index",Indexed:"Indexed",Info:"Info",Ink:"Ink",InkList:"InkList",Instances:"Instances",Intent:"Intent",InvisibleRect:"InvisibleRect",IRT:"IRT",IT:"IT",ItalicAngle:"ItalicAngle",JavaScript:"JavaScript",JS:"JS",JT:"JT",JBIG2Globals:"JBIG2Globals",K:"K",Keywords:"Keywords",Keystroke:"Keystroke",Kids:"Kids",L:"L",Lang:"Lang",Last:"Last",LastChar:"LastChar",LastModified:"LastModified",LastPage:"LastPage",Launch:"Launch",Layer:"Layer",Leading:"Leading",Length:"Length",Length1:"Length1",Length2:"Length2",Length3:"Length3",Lighten:"Lighten",Limits:"Limits",Line:"Line",Linearized:"Linearized",LinearizedReader:"LinearizedReader",Link:"Link",ListMode:"ListMode",Location:"Location",Lock:"Lock",Locked:"Locked",Lookup:"Lookup",Luminosity:"Luminosity",LW:"LW",M:"M",MacExpertEncoding:"MacExpertEncoding",MacRomanEncoding:"MacRomanEncoding",Margin:"Margin",MarkInfo:"MarkInfo",Mask:"Mask",Matrix:"Matrix",Matte:"Matte",max:"max",MaxLen:"MaxLen",MaxWidth:"MaxWidth",MCID:"MCID",MediaBox:"MediaBox",Metadata:"Metadata",min:"min",MissingWidth:"MissingWidth",MK:"MK",ModDate:"ModDate",MouseDown:"MouseDown",MouseEnter:"MouseEnter",MouseExit:"MouseExit",MouseUp:"MouseUp",Movie:"Movie",Multiply:"Multiply",N:"N",Name:"Name",Named:"Named",Names:"Names",NeedAppearances:"NeedAppearances",Next:"Next",NextPage:"NextPage",NM:"NM",None:"None",Normal:"Normal",Nums:"Nums",O:"O",ObjStm:"ObjStm",OC:"OC",OCGs:"OCGs",OCProperties:"OCProperties",OE:"OE",OFF:"OFF",off:"off",ON:"ON",On:"On",OnBlur:"OnBlur",OnFocus:"OnFocus",OP:"OP",op:"op",Open:"Open",OpenAction:"OpenAction",OPI:"OPI",OPM:"OPM",Opt:"Opt",Order:"Order",Ordering:"Ordering",Outlines:"Outlines",Overlay:"Overlay",P:"P",PaintType:"PaintType",Page:"Page",PageLabels:"PageLabels",PageMode:"PageMode",Pages:"Pages",Params:"Params",Parent:"Parent",ParentTree:"ParentTree",Pattern:"Pattern",PatternType:"PatternType",PC:"PC",PDFDocEncoding:"PDFDocEncoding",Perms:"Perms",Pg:"Pg",PI:"PI",PieceInfo:"PieceInfo",PO:"PO",Polygon:"Polygon",PolyLine:"PolyLine",Popup:"Popup",Predictor:"Predictor",Prev:"Prev",PrevPage:"PrevPage",Print:"Print",PrinterMark:"PrinterMark",PrintState:"PrintState",Process:"Process",ProcSet:"ProcSet",Producer:"Producer",Projection:"Projection",Properties:"Properties",PV:"PV",Q:"Q",Qfactor:"Qfactor",QuadPoints:"QuadPoints",R:"R",Range:"Range",RBGroups:"RBGroups",RC:"RC",Reason:"Reason",Recipients:"Recipients",Rect:"Rect",Reference:"Reference",Registry:"Registry",ResetForm:"ResetForm",Resources:"Resources",RGB:"RGB",RichMedia:"RichMedia",RichMediaContent:"RichMediaContent",RD:"RD",RoleMap:"RoleMap",Root:"Root",Rotate:"Rotate",Rows:"Rows",RT:"RT",RV:"RV",S:"S",SA:"SA",Saturation:"Saturation",SaveAs:"SaveAs",Screen:"Screen",SetOCGState:"SetOCGState",Shading:"Shading",ShadingType:"ShadingType",Sig:"Sig",SigFlags:"SigFlags",Signed:"Signed",Size:"Size",SM:"SM",SMask:"SMask",SoftLight:"SoftLight",Sound:"Sound",Square:"Square",Squiggly:"Squiggly",Stamp:"Stamp",Standard:"Standard",StandardEncoding:"StandardEncoding",State:"State",StemH:"StemH",StemV:"StemV",StmF:"StmF",StrF:"StrF",StrikeOut:"StrikeOut",StructElem:"StructElem",StructParent:"StructParent",StructParents:"StructParents",StructTreeRoot:"StructTreeRoot",Style:"Style",SubFilter:"SubFilter",Subj:"Subj",Subject:"Subject",SubmitForm:"SubmitForm",Subtype:"Subtype",Supplement:"Supplement",T:"T",Tabs:"Tabs",TagSuspect:"TagSuspect",Text:"Text",TI:"TI",TilingType:"TilingType",tintTransform:"tintTransform",Title:"Title",TM:"TM",Toggle:"Toggle",ToUnicode:"ToUnicode",TP:"TP",TR:"TR",TrapNet:"TrapNet",Trapped:"Trapped",TrimBox:"TrimBox",Tx:"Tx",TxFontSize:"TxFontSize",TxOutline:"TxOutline",TU:"TU",Type:"Type",U:"U",UE:"UE",UF:"UF",Uncompressed:"Uncompressed",Unsigned:"Unsigned",Usage:"Usage",V:"V",Validate:"Validate",VerticesPerRow:"VerticesPerRow",View:"View",VIewState:"VIewState",VP:"VP",W:"W",W2:"W2",Watermark:"Watermark",WhitePoint:"WhitePoint",Widget:"Widget",Win:"Win",WinAnsiEncoding:"WinAnsiEncoding",Width:"Width",Widths:"Widths",WP:"WP",WS:"WS",X:"X",XFA:"XFA",XFAImages:"XFAImages",XHeight:"XHeight",XObject:"XObject",XRef:"XRef",XRefStm:"XRefStm",XStep:"XStep",XYZ:"XYZ",YStep:"YStep",Zoom:"Zoom",ZoomTo:"ZoomTo",Unchanged:"Unchanged",Underline:"Underline"},EcmaLEX={CHAR256:[1,0,0,0,0,0,0,0,0,1,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,2,0,0,2,2,0,0,0,0,0,2,4,4,4,4,4,4,4,4,4,4,0,0,2,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],STRPDF:[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,728,711,710,729,733,731,730,732,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,8226,8224,8225,8230,8212,8211,402,8260,8249,8250,8722,8240,8222,8220,8221,8216,8217,8218,8482,64257,64258,321,338,352,376,381,305,322,339,353,382,0,8364],isWhiteSpace:function(e){return 1===this.CHAR256[e]},isEOL:function(e){return 10===e||13===e},isDelimiter:function(e){return 2===this.CHAR256[e]},isComment:function(e){return 37===e},isBacklash:function(e){return 92===e},isEscSeq:function(e,t){if(252===e)switch(t){case 40:case 41:case 98:case 102:case 110:case 114:case 116:case 92:case 12:case 13:return!0;default:return!1}return!1},isDigit:function(e){return 4===this.CHAR256[e]},isBoolean:function(e){return"boolean"==typeof e},isNull:function(e){return null===typeof e},isNumber:function(e){return"number"==typeof e},isString:function(e){return"string"==typeof e},isHexString:function(e){return e instanceof EcmaHEX},isArray:function(e){return e instanceof Array},isName:function(e){return e instanceof EcmaNAME},isDict:function(e){return e instanceof EcmaDICT},isRef:function(e){return e instanceof EcmaOREF},isStreamDict:function(e){return EcmaKEY.Length in e.keys},getDA:function(e){for(var t={fontSize:10,fontName:"Arial",fontColor:"0 g"},o=e.length,n=0,i="",a=new Array;n<o;){var r=e.charCodeAt(n++);EcmaLEX.isWhiteSpace(r)||EcmaLEX.isEOL(r)?(i.length>0&&a.push(i),i=""):i+=String.fromCharCode(r)}i.length>0&&a.push(i);for(var n=0,o=a.length;n<o;n++)"/"===a[n].charAt(0)?(t.fontName=a[n].substring(1),a[n+1]&&(t.fontSize=parseInt(a[n+1]))):n>3&&"rg"===a[n]&&(t.fontColor=a[n-3]+" "+a[n-2]+" "+a[n-1]+" rg");return t},getRefFromString:function(e){var t=e.trim().split(" ");return new EcmaOREF(parseInt(t[0]),parseInt(t[1]))},getZeroLead:function(e){for(var t=""+e,o=10-t.length,n=0;n<o;n++)t="0"+t;return t},toPDFString:function(e){var t=e.length,o=[],n;if("þ"===e[0]&&"ÿ"===e[1])for(var i=2;i<t;i+=2)n=e.charCodeAt(i)<<8|e.charCodeAt(i+1),o.push(String.fromCharCode(n));else for(var i=0;i<t;++i){var a=this.STRPDF[e.charCodeAt(i)];o.push(a?String.fromCharCode(a):e.charAt(i))}return o.join("")},toPDFHex16String:function(e){var t=e.length,o=[],n;o.push("fe"),o.push("ff");for(var i=0;i<t;++i){n=e.charCodeAt(i);for(var a=Number(n>>8).toString(16);a.length<2;)a="0"+a;for(var r=Number(255&n).toString(16);r.length<2;)r="0"+r;o.push(a),o.push(r)}return o.join("")},toBytes32:function(e){return[(4278190080&e)>>24,(16711680&e)>>16,(65280&e)>>8,255&e]},textToBytes:function(e){for(var t=[],o,n=0,i=e.length;n<i;n++)(o=e.charCodeAt(n))<256?t.push(o):(t.push(o>>8),t.push(255&o));return t},bytesToText:function(e,t,o){for(var n="",i=t;i<o;i++)n+=String.fromCharCode(e[t+i]);return n},pushBytesToBuffer:function(e,t){for(var o=0,n=e.length;o<n;o++)t.push(e[o])},objectToText:function(e){if(this.isDict(e)){var t="<<";for(var o in e.keys)t+="/"+o+" "+this.objectToText(e.keys[o])+" ";return t+=">>"}if(this.isArray(e)){for(var t="[",n=0,i=e.length;n<i;n++)t+=" "+this.objectToText(e[n]);return t+="]"}return this.isRef(e)?e.ref:this.isName(e)?"/"+e.name:this.isNumber(e)?""+e:this.isString(e)?"("+EcmaLEX.toPDFString(e)+")":this.isHexString(e)?e.str:this.isBoolean(e)?e?"true":"false":"null"}},EcmaFontWidths={Arial:[750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,750,278,278,355,556,556,889,667,191,333,333,389,584,278,333,278,278,556,556,556,556,556,556,556,556,556,556,278,278,584,584,584,556,1015,667,667,722,722,667,611,778,722,278,500,667,556,833,722,778,667,778,722,667,611,722,667,944,667,667,611,278,278,278,469,556,333,556,556,500,556,556,278,556,556,222,222,500,222,833,556,556,556,556,333,500,278,556,500,722,500,500,500,334,260,334,584,350,556,350,222,556,333,1e3,556,556,333,1e3,667,333,1e3,350,611,350,350,222,222,333,333,350,556,1e3,333,1e3,500,333,944,350,500,667,278,333,556,556,556,556,260,556,333,737,370,556,584,333,737,552,400,549,333,333,333,576,537,333,333,333,365,556,834,834,834,611,667,667,667,667,667,667,1e3,722,667,667,667,667,278,278,278,278,722,722,778,778,778,778,778,584,778,722,722,722,722,667,667,611,556,556,556,556,556,556,889,500,556,556,556,556,278,278,278,278,556,556,556,556,556,556,556,549,611,556,556,556,556,500,556,500]},EcmaFormField={READONLY_ID:1,REQUIRED_ID:2,NOEXPORT_ID:3,MULTILINE_ID:13,PASSWORD_ID:14,NOTOGGLETOOFF_ID:15,RADIO_ID:16,PUSHBUTTON_ID:17,COMBO_ID:18,EDIT_ID:19,SORT_ID:20,FILESELECT_ID:21,MULTISELECT_ID:22,DONOTSPELLCHECK_ID:23,DONOTSCROLL_ID:24,COMB_ID:25,RICHTEXT_ID:26,RADIOINUNISON_ID:26,COMMITONSELCHANGE_ID:27,handleDisplayChange:function(e,t,o){var n=this.flagToBooleans(o);switch(t.display){case display.hidden:n[2]=!0,n[3]=!0,n[6]=!1;break;case display.noPrint:n[2]=!1,n[3]=!1,n[6]=!1;break;case display.noView:n[2]=!1,n[3]=!0,n[6]=!0;case display.visible:n[2]=!1,n[3]=!0,n[6]=!1;break}e.keys[EcmaKEY.F]=this.booleansToFlag(n)},editTextField:function(e,t,o,n,i,a){var r=!1,s=!1,c=i,l=n.keys[EcmaKEY.Ff];if(l){var d=this.flagToBooleans(l);if(d[1]=!0,r=d[this.PASSWORD_ID]){for(var u="",h=0,f=c.length;h<f;h++)u+="*";c=u}s=d[this.MULTILINE_ID]}if(n.keys[EcmaKEY.V]=i,n.keys[EcmaKEY.AP]=new EcmaDICT,n.keys[EcmaKEY.TU]){var m=n.keys[EcmaKEY.TU];EcmaLEX.isHexString(m)||(m=m.replace(/[{()}]/g,"_"),n.keys[EcmaKEY.TU]=m)}var p=0;n.keys[EcmaKEY.Q]&&(p=n.keys[EcmaKEY.Q]);var g=n.keys[EcmaKEY.Rect],y=g[2]-g[0];y=Math.round(100*y)/100;var S=g[3]-g[1];S=Math.round(100*S)/100;var O=10,E=n.keys.DA,A=n.keys[EcmaKEY.Parent];if(EcmaLEX.isRef(A)){var u,I=(u=new EcmaBuffer).getIndirectObject(A);EcmaLEX.isDict(I)&&(I.keys[EcmaKEY.V]=i,t.push(I),o.push(A))}var v="0 g",D="Arial";if(E){var b=EcmaLEX.getDA(E);O=0===(O=b.fontSize)?10:O,v=b.fontColor,D=b.fontName}var T=new EcmaDICT,F=new EcmaOREF(a,0),R=n.keys[EcmaKEY.AP].keys.N;if(R)var T=e.getObjectValue(R);n.keys[EcmaKEY.AP].keys.N=F,T.keys[EcmaKEY.BBox]=[0,0,y,S],T.keys[EcmaKEY.Matrix]=[1,0,0,1,0,0],T.keys[EcmaKEY.Subtype]=new EcmaNAME(EcmaKEY.Form);var L=new EcmaDICT,P=new EcmaDICT;P.keys[EcmaKEY.Name]=new EcmaNAME("Helv"),P.keys[EcmaKEY.Type]=new EcmaNAME("Font"),P.keys[EcmaKEY.Subtype]=new EcmaNAME("Type1"),P.keys[EcmaKEY.BaseFont]=new EcmaNAME("Helvetica"),P.keys[EcmaKEY.Encoding]=new EcmaNAME("PDFDocEncoding");var N=new EcmaDICT;N.keys.Helv=P,L.keys[EcmaKEY.Font]=N,T.keys[EcmaKEY.Resources]=L,T.keys[EcmaKEY.FormType]=1,T.keys[EcmaKEY.Type]=new EcmaNAME(EcmaKEY.XObject);var C="";if(s){for(var u,k=0,B="",U="",w="",h=0,f=c.length;h<f;h++){var x=c.charCodeAt(h),M=String.fromCharCode(x),j=this.findCodeWidth(x,O);k+j>y&&(U===w?(B+=U+"\n",U="",w="",k=0):(B+="\n",k=this.findStringWidth(U,O),w=U)),k+=j,10===x?(B+=U+"\n",U="",w="",k=0):EcmaLEX.isWhiteSpace(x)?(B+=U+" ",U="",w+=" "):(U+=M,w+=M)}U.length>0&&(B+=U);var X=B.split("\n"),K=1.2*O;K=Math.round(100*K)/100;var V=X.length*K,Y=S-V+V-O;(Y=Y<0?0:Y)>0&&(Y=Math.round(100*Y)/100),C+="/Tx BMC\nBT\n"+v+"\n/Helv "+O+" Tf\n",C+="2 "+Y+" Td\n("+X[0]+") Tj\n";for(var h=1,f=X.length;h<f;h++)C+="0 "+-K+" Td\n("+X[h]+") Tj\n";C+="ET\nEMC";var W=EcmaLEX.textToBytes(C);T.keys[EcmaKEY.Length]=W.length,T.rawStream=W,T.stream=W,t.push(T),o.push(F)}else{var _=O-.2*O,H=S-_>0?(S-_)/2:0,G=2;if(p>0){var x,M,Q=0;G=0;for(var h=0,f=c.length;h<f;h++)x=c.charCodeAt(h),M=String.fromCharCode(x),Q+=this.findCodeWidth(x,O);Q<y&&(G=1===p?(y-Q)/2:y-Q)}for(var W=[],q="/Tx BMC\nBT\n"+v+"\n"+G+" "+H+" Td\n/Helv "+O+" Tf\n(",z=") Tj\nET\nEMC",u,h=0,f=(u=EcmaLEX.textToBytes(q)).length;h<f;h++)W.push(u[h]);for(var h=0,f=(u=EcmaLEX.textToBytes(c)).length;h<f;h++)W.push(u[h]);for(var h=0,f=(u=EcmaLEX.textToBytes(z)).length;h<f;h++)W.push(u[h]);T.keys[EcmaKEY.Length]=W.length,T.rawStream=W,T.stream=W,t.push(T),o.push(F)}},selectCheckBox:function(e,t){var o="Yes",n="Off",i=t.keys[EcmaKEY.AP];if(i){var a=(i=(new EcmaBuffer).getObjectValue(i)).keys[EcmaKEY.D];if(a)for(var r in(a=(new EcmaBuffer).getObjectValue(a)).keys){var s;"off"!==r.toLowerCase()&&(o=r)}e?(t.keys[EcmaKEY.AS]=new EcmaNAME(o),t.keys[EcmaKEY.V]=new EcmaNAME(o)):(t.keys[EcmaKEY.AS]=new EcmaNAME(n),t.keys[EcmaKEY.V]=new EcmaNAME(n))}},selectRadioChild:function(e,t){var o=t.keys[EcmaKEY.AP];if(o){var n="Yes",i="Off",a=(o=(new EcmaBuffer).getObjectValue(o)).keys[EcmaKEY.D];if(a)for(var r in(a=(new EcmaBuffer).getObjectValue(a)).keys)"off"!==r.toLowerCase()&&(e.value!=r?(n=e.value,this.handleAPNameChange(o,e.value)):n=r);e.checked?t.keys[EcmaKEY.AS]=new EcmaNAME(n):t.keys[EcmaKEY.AS]=new EcmaNAME(i)}},handleAPNameChange:function(e,t){var o=e.keys[EcmaKEY.D];if(o)for(var n in(o=(new EcmaBuffer).getObjectValue(o)).keys)"off"!==n.toLowerCase()&&t!=n&&(o.keys[t]=o.keys[n],delete o.keys[n]);var i=e.keys[EcmaKEY.N];if(i)for(var a in(i=(new EcmaBuffer).getObjectValue(i)).keys)"off"!==a.toLowerCase()&&t!=a&&(i.keys[t]=i.keys[a],delete i.keys[a]);var r=e.keys[EcmaKEY.R];if(r)for(var s in(r=(new EcmaBuffer).getObjectValue(r)).keys)"off"!==s.toLowerCase()&&t!=s&&(r.keys[t]=r.keys[s],delete r.keys[s])},selectChoice:function(e,t,o,n,i){var a=o.keys[EcmaKEY.Opt],r=n;if(o.keys[EcmaKEY.V]=n,a)for(var s=0,c=a.length;s<c;s++){var l=a[s];if(EcmaLEX.isArray(l)){if(l[0]===n){r=l[1],o.keys[EcmaKEY.I]=[s];break}}else if(l===n){r=l,o.keys[EcmaKEY.I]=[s];break}}o.keys[EcmaKEY.AP]=new EcmaDICT;var d=o.keys[EcmaKEY.Rect],u=d[2]-d[0],h=d[3]-d[1],f=10,m=o.keys.DA;if(m){var p=m.indexOf("/");p>=0&&(m=m.substring(p).split(" "),f=parseInt(m[1])),o.keys.DA="/Arial "+f+" Tf"}var g=new EcmaDICT,y=new EcmaOREF(i,0);o.keys[EcmaKEY.AP].keys.N=y,g.keys[EcmaKEY.BBox]=[0,0,u,h],g.keys[EcmaKEY.Matrix]=[1,0,0,1,0,0],g.keys[EcmaKEY.Subtype]=new EcmaNAME(EcmaKEY.Form),g.keys[EcmaKEY.Resources]=new EcmaDICT,g.keys[EcmaKEY.FormType]=1,g.keys[EcmaKEY.Type]=new EcmaNAME(EcmaKEY.XObject);var S=f-.2*f,O,E="/Tx BMC\nBT\n/Arial "+f+" Tf\n0 g\n2 "+(h-S>0?(h-S)/2:0)+" Td\n("+r+") Tj\nET\nEMC",A=EcmaLEX.textToBytes(E);g.keys[EcmaKEY.Length]=A.length,g.rawStream=A,g.stream=A,e.push(g),t.push(y)},findStringWidth:function(e,t){for(var o=0,n=0,i=e.length;n<i;n++){var a=e.charCodeAt(n);o+=a<256?EcmaFontWidths.Arial[a]/1e3*t:t}return o},findCodeWidth:function(e,t){return e<256?EcmaFontWidths.Arial[e]/1e3*t:t},flagToBooleans:function(e){for(var t=[!1],o=0;o<32;o++)t[o+1]=(e&1<<o)==1<<o;return t},booleansToFlag:function(e){for(var t=0,o=0;o<32;o++)t=e[32-o]?t<<1|1:t<<=1;return t},hexEncodeName:function(e){for(var t="",o=0;o<e.length;o++){var n=e.charCodeAt(o);n<33||n>126||'"'===e[o]||"#"===e[o]||"/"===e[o]?t+=n.toString(16):t+=e[o]}return t},hexDecodeName:function(e){for(var t="",o=0;o<e.length;o++){var n=e.charCodeAt(o);if("#"===e[o]&&o+2<e.length){var i=parseInt(e[o+1]+e[o+2],16);t+=String.fromCharCode(i),o+=2}else(n>=33||n<=126)&&(t+=e[o])}return t}},EcmaNAMES={},EcmaOBJECTOFFSETS={},EcmaPageOffsets=[],EcmaFieldOffsets=[],EcmaMainCatalog=null,EcmaMainData=[],EcmaXRefType=0;function showEcmaParserError(e){alert(e)}function EcmaOBJOFF(e,t,o){this.data=t,this.offset=e,this.isStream=o}function EcmaDICT(){this.keys={},this.stream=null,this.rawStream=null}function EcmaNAME(e){this.name=e,this.value=null}function EcmaOREF(e,t){this.num=e,this.gen=t,this.ref=e+" "+t+" R"}function EcmaHEX(e){this.str=e}function EcmaBuffer(e){this.data=e,this.pos=0,this.markPos=0,this.length=0,e&&(this.length=e.length)}EcmaBuffer.prototype.getByte=function(){return this.pos>=this.length?-1:this.data[this.pos++]},EcmaBuffer.prototype.mark=function(){this.markPos=this.pos},EcmaBuffer.prototype.reset=function(){this.pos=this.markPos},EcmaBuffer.prototype.movePos=function(e){this.pos=e},EcmaBuffer.prototype.readTo=function(e){for(var t=this.length-this.pos,o=Math.min(e.length,t),n=0;n<o;n++)e[n]=this.getByte()},EcmaBuffer.prototype.readTo=function(e,t,o){if(this.pos<this.length){for(var n=0,i=this.length-this.pos,a=Math.min(o,i),r=0;r<a;r++)e[t+r]=this.getByte(),n++;return n}return-1},EcmaBuffer.prototype.lookNext=function(){return this.pos>=this.length?-1:this.data[this.pos]},EcmaBuffer.prototype.lookNextNext=function(){return this.pos>=this.length?-1:this.data[this.pos+1]},EcmaBuffer.prototype.getNextLine=function(){for(var e="",t=this.getByte();;)if(13===t){if(e.endsWith(" "))break;if(10===(t=this.getByte()))break}else{if(10===t)break;e+=String.fromCharCode(t),t=this.getByte()}return e},EcmaBuffer.prototype.skipLine=function(){for(var e=this.getByte();-1!==e;){if(13===e){if(10===(e=this.lookNext())){this.getByte();break}break}if(10===e)break;e=this.getByte()}},EcmaBuffer.prototype.getNumberValue=function(){var e=this.getByte(),t=1,o=!1;if(43===e?e=this.getByte():45===e&&(t=-1,e=this.getByte()),46===e&&(o=!0,e=this.getByte()),e<48||e>57)return 0;for(var n=""+String.fromCharCode(e);;){var i=this.lookNext();if(46!==i&&!EcmaLEX.isDigit(i))break;e=this.getByte(),n+=""+String.fromCharCode(e)}return o?t*parseFloat("0."+n):-1!==n.indexOf(".")?t*parseFloat(n):t*parseInt(n)},EcmaBuffer.prototype.getNameValue=function(){var e="",t;for(this.getByte();(t=this.lookNext())>=0&&!EcmaLEX.isDelimiter(t)&&!EcmaLEX.isWhiteSpace(t);)e+=String.fromCharCode(this.getByte());return e},EcmaBuffer.prototype.getNormalString=function(){var e=[];this.getByte();for(var t=1,o=this.getByte(),n=!1;;){var i=!1;switch(o){case-1:n=!0;break;case 40:e.push("("),t++;break;case 41:--t?e.push(")"):n=!0;break;case 92:switch(o=this.getByte()){case-1:n=!0;break;case 40:case 41:case 92:e.push(String.fromCharCode(o));break;case 110:e.push("\n");break;case 114:e.push("\r");break;case 116:e.push("\t");break;case 98:e.push("\b");break;case 102:e.push("\f");break;case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:var a=15&o;i=!0,(o=this.getByte())>=48&&o<=55&&(a=(a<<3)+(15&o),(o=this.getByte())>=48&&o<=55&&(i=!1,a=(a<<3)+(15&o))),e.push(String.fromCharCode(a));break;case 13:10===this.lookNext()&&this.getByte();break;case 10:break;default:e.push(String.fromCharCode(o));break}break;default:e.push(String.fromCharCode(o))}if(n)break;i||(o=this.getByte())}return e.join("")},EcmaBuffer.prototype.getHexString=function(){this.getByte();for(var e=this.getByte(),t="<";;){if(e<0||62===e){t+=">";break}EcmaLEX.isWhiteSpace(e)?e=this.getByte():(t+=String.fromCharCode(e),e=this.getByte())}return new EcmaHEX(t)},EcmaBuffer.prototype.getDictionary=function(){var e=new EcmaDICT;this.getByte(),this.getByte();for(var t=[],o=!0;o;){var n;switch(this.lookNext()){case-1:return e;case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:case 43:case 45:case 46:var i=this.getNumberValue(),a=this.lookNext(),r=this.lookNextNext();if(t.length>0){var s,c=(s=t.pop()).name;EcmaLEX.isWhiteSpace(a)&&EcmaLEX.isDigit(r)?(this.getByte(),r=this.getNumberValue(),this.getByte(),this.getByte(),e.keys[c]=new EcmaOREF(i,r)):e.keys[c]=i}break;case 47:var l=this.getNameValue(),d;if(EcmaNAMES[l]?d=EcmaNAMES[l]:(d=new EcmaNAME(l),EcmaNAMES[l]=d),0===t.length)t.push(d);else{var s,c=(s=t.pop()).name;e.keys[c]=d}break;case 40:var u=this.getNormalString();if(0!==t.length){var s,c=(s=t.pop()).name;e.keys[c]=u}break;case 60:if(60===this.lookNextNext()){var h=this.getDictionary();if(0!==t.length){var s,c=(s=t.pop()).name;e.keys[c]=h}}else{var f=this.getHexString();if(0!==t.length){var s,c=(s=t.pop()).name;e.keys[c]=f}}break;case 91:var m=this.getArray();if(0!==t.length){var s,c=(s=t.pop()).name;e.keys[c]=m}break;case 116:if(114===this.data[this.pos+1]&&117===this.data[this.pos+2]&&101===this.data[this.pos+3]){for(var p=0;p<4;p++)this.getByte();if(t.length>0){var s,c=(s=t.pop()).name;e.keys[c]=!0}}else this.getByte();break;case 102:if(97===this.data[this.pos+1]&&108===this.data[this.pos+2]&&115===this.data[this.pos+3]&&101===this.data[this.pos+4]){for(var p=0;p<5;p++)this.getByte();if(t.length>0){var s,c=(s=t.pop()).name;e.keys[c]=!1}}else this.getByte();break;case 110:if(117===this.data[this.pos+1]&&108===this.data[this.pos+2]&&108===this.data[this.pos+3]){for(var p=0;p<4;p++)this.getByte();if(t.length>0){var s,c=(s=t.pop()).name;e.keys[c]=null}}else this.getByte();break;case 62:this.getByte(),62===this.lookNext()&&(this.getByte(),o=!1);break;default:this.getByte();break}}return EcmaLEX.isStreamDict(e)&&!e.stream&&(e.rawStream=this.getRawStream(e)),e},EcmaBuffer.prototype.getArray=function(){this.getByte();for(var e=[];;){var t;switch(this.lookNext()){case-1:return e;case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:case 43:case 45:case 46:var o=this.getNumberValue(),n=this.data[this.pos],i=this.data[this.pos+1];if(EcmaLEX.isWhiteSpace(n)&&EcmaLEX.isDigit(i)){this.mark(),this.getByte(),i=this.getNumberValue(),this.getByte();var a=this.getByte(),r=this.lookNext();82===a&&(EcmaLEX.isWhiteSpace(r)||EcmaLEX.isDelimiter(r))?e.push(new EcmaOREF(o,i)):(e.push(o),this.reset())}else e.push(o);break;case 47:var s=this.getNameValue();EcmaNAMES[s]||(EcmaNAMES[s]=new EcmaNAME(s)),e.push(EcmaNAMES[s]);break;case 40:e.push(this.getNormalString());break;case 60:if(60===this.lookNextNext()){var c=this.getDictionary();e.push(c)}else e.push(this.getHexString());break;case 91:e.push(this.getArray());break;case 93:return this.getByte(),e;case 116:if(114===this.data[this.pos+1]&&117===this.data[this.pos+2]&&101===this.data[this.pos+3]){e.push(!0);for(var l=0;l<4;l++)this.getByte()}else this.getByte();break;case 102:if(97===this.data[this.pos+1]&&108===this.data[this.pos+2]&&115===this.data[this.pos+3]&&101===this.data[this.pos+4]){e.push(!1);for(var l=0;l<5;l++)this.getByte()}else this.getByte();break;case 110:if(117===this.data[this.pos+1]&&108===this.data[this.pos+2]&&108===this.data[this.pos+3]){e.push(null);for(var l=0;l<4;l++)this.getByte()}else this.getByte();default:this.getByte();break}}},EcmaBuffer.prototype.getRawStream=function(e){for(;;){var t;if(115===(t=this.lookNext())&&116===this.data[this.pos+1]&&114===this.data[this.pos+2]&&101===this.data[this.pos+3]&&97===this.data[this.pos+4]&&109===this.data[this.pos+5]){for(var o=0;o<6;o++)this.getByte();break}if(-1===t)return null;this.getByte()}this.skipLine();for(var n=this.getObjectValue(e.keys[EcmaKEY.Length]),i=new Array(n),o=0;o<n;o++)i[o]=255&this.getByte();for(;;){var t;if(-1===(t=this.lookNext()))break;if(101===t&&110===this.data[this.pos+1]&&100===this.data[this.pos+2]&&115===this.data[this.pos+3]&&116===this.data[this.pos+4]&&114===this.data[this.pos+5]&&101===this.data[this.pos+6]&&97===this.data[this.pos+7]&&109===this.data[this.pos+8]){for(var o=0;o<9;o++)this.getByte();break}this.getByte()}return i},EcmaBuffer.prototype.getStream=function(e){if(e.stream)return e.stream;var t=e.rawStream,o=e.keys[EcmaKEY.Filter];if(o)if(o instanceof Array)for(var n=0,i=o.length;n<i;n++)t=EcmaFilter.decode(o[n].name,t);else t=EcmaFilter.decode(o.name,t);var a=e.keys[EcmaKEY.DecodeParms];if(a){var r=1,s=1,c=8,l=1,d=1,u,h;if(a instanceof Array)for(var n=0,i=a.length;n<i;n++){var u,h;(h=(u=this.getObjectValue(a[n])).keys[EcmaKEY.Predictor])&&(r=h),(h=u.keys[EcmaKEY.Colors])&&(s=h),(h=u.keys[EcmaKEY.BitsPerComponent])&&(c=h),(h=u.keys[EcmaKEY.Columns])&&(l=h),(h=u.keys[EcmaKEY.EarlyChange])&&(d=h)}else(h=(u=this.getObjectValue(a)).keys[EcmaKEY.Predictor])&&(r=h),(h=u.keys[EcmaKEY.Colors])&&(s=h),(h=u.keys[EcmaKEY.BitsPerComponent])&&(c=h),(h=u.keys[EcmaKEY.Columns])&&(l=h),(h=u.keys[EcmaKEY.EarlyChange])&&(d=h);if(1!==r){var f=EcmaFilter.applyPredictor(t,r,null,s,c,l,d),m=EcmaFilter.createByteBuffer(f);EcmaFilter.applyPredictor(t,r,m,s,c,l,d)}t=m}return e.stream=t,t},EcmaBuffer.prototype.getObjectValue=function(e){if(EcmaLEX.isName(e))return e.name;if(EcmaLEX.isDict(e))return e;if(EcmaLEX.isRef(e)){var t=this.getIndirectObject(e,this.data,!1);return this.getObjectValue(t)}return e},EcmaBuffer.prototype.getIndirectObject=function(e){for(var t in EcmaOBJECTOFFSETS)if(t===e.ref){var o=EcmaOBJECTOFFSETS[t],n=o.offset,i=new EcmaBuffer(o.data),a;if(o.isStream)return o.data?(i.movePos(n),i.getObj()):null;for(i.movePos(n);;){var r=i.lookNext();if(-1===r)return null;if(111===r&&98===i.data[i.pos+1]&&106===i.data[i.pos+2]){for(var s=0;s<3;s++)i.getByte();break}i.getByte()}return i.getObj()}return null},EcmaBuffer.prototype.getObj=function(){for(;;){var e;switch(this.lookNext()){case-1:return null;case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:case 43:case 45:case 46:var t=this.getNumberValue(),o=this.lookNext(),n=this.lookNextNext(),i=this.data[this.pos+2],a=this.data[this.pos+3];return EcmaLEX.isWhiteSpace(o)&&EcmaLEX.isDigit(n)&&EcmaLEX.isWhiteSpace(i)&&82===a?(this.getByte(),n=this.getNumberValue(),this.getByte(),this.getByte(),new EcmaOREF(t,n)):t;case 47:return this.getNameValue();case 40:return this.getNormalString();case 60:return 60===this.lookNextNext()?this.getDictionary():this.getHexString();case 91:return this.getArray();case 116:if(114===this.data[this.pos+1]&&117===this.data[this.pos+2]&&101===this.data[this.pos+3]){for(var r=0;r<4;r++)this.getByte();return!0}this.getByte();break;case 102:if(97===this.data[this.pos+1]&&108===this.data[this.pos+2]&&115===this.data[this.pos+3]&&101===this.data[this.pos+4]){for(var r=0;r<5;r++)this.getByte();return!1}this.getByte();case 110:if(117===this.data[this.pos+1]&&108===this.data[this.pos+2]&&108===this.data[this.pos+3]){for(var r=0;r<4;r++)this.getByte();return null}this.getByte();default:this.getByte();break}}return null},EcmaBuffer.prototype.readSimpleXREF=function(){var e=this.lookNext();if(EcmaLEX.isDigit(e))return this.readStreamXREF(),void 0;this.skipLine();for(var t=null;;){var o=this.lookNext();if(-1===o)break;if(EcmaLEX.isEOL(o))this.skipLine();else{if(116===o&&114===this.data[this.pos+1]&&97===this.data[this.pos+2]&&105===this.data[this.pos+3]&&108===this.data[this.pos+4]&&101===this.data[this.pos+5]&&114===this.data[this.pos+6]){t=this.getObj();break}var n=this.getObj();this.getByte();var i=this.getObj();this.skipLine();for(var a=0;a<i;a++){var r=this.getObj(),s=this.getObj(),c=this.getNextLine(),l=n+a+" "+s+" R";"n"!==(c=c.trim())||EcmaOBJECTOFFSETS[l]||(EcmaOBJECTOFFSETS[l]=new EcmaOBJOFF(r,this.data,!1))}}}if(t){EcmaMainCatalog||(EcmaMainCatalog=t.keys.Root);var d=t.keys[EcmaKEY.Prev];if(d){var u=this.getObjectValue(d);this.movePos(u),this.readSimpleXREF()}}else showEcmaParserError("Trailer not found")},EcmaBuffer.prototype.readStreamXREF=function(){EcmaXRefType=1,this.getObj(),this.getObj();var e=this.getObj(),t=this.getStream(e),o=e.keys[EcmaKEY.W],n=e.keys[EcmaKEY.Index];n||(n=[0,e.keys[EcmaKEY.Size]]);for(var i=o[0],a=o[1],r=o[2],s=n.length,c=0,l=new EcmaBuffer(t);s>c;)for(var d=n[c++],u=d+n[c++],h=d;h<u;h++){var f=0,m=0,p=0;if(0===i)f=1;else for(var g=0;g<i;g++)f=f<<8|l.getByte();for(var g=0;g<a;g++)m=m<<8|l.getByte();for(var g=0;g<r;g++)p=p<<8|l.getByte();var y=h+" "+p+" R";if(!EcmaOBJECTOFFSETS[y])switch(f){case 0:break;case 1:EcmaOBJECTOFFSETS[y]=new EcmaOBJOFF(m,EcmaMainData,!1);break;case 2:EcmaOBJECTOFFSETS[y]=new EcmaOBJOFF(m,null,!0);break}}EcmaMainCatalog||(EcmaMainCatalog=e.keys.Root);var S=e.keys[EcmaKEY.Prev];if(S){var O=this.getObjectValue(S);this.movePos(O),this.readSimpleXREF()}},EcmaBuffer.prototype.findFirstXREFOffset=function(){for(var e=this.data.length-10;e>0;){var t,o;if(115===this.data[e]&&116===this.data[e+1]&&97===this.data[e+2]&&114===this.data[e+3]&&116===this.data[e+4]&&120===this.data[e+5]&&114===this.data[e+6]&&101===this.data[e+7]&&102===this.data[e+8])return this.movePos(e),this.skipLine(),this.getObj();e--}return-1},EcmaBuffer.prototype.updateAllObjStm=function(){for(var e in EcmaOBJECTOFFSETS){var t=e.split(" "),o=new EcmaOREF(t[0],t[1]),n=this.getIndirectObject(o);if(n instanceof EcmaDICT&&n.keys[EcmaKEY.Type]&&n.keys[EcmaKEY.Type].name===EcmaKEY.ObjStm)for(var i=n.keys[EcmaKEY.N],a=n.keys[EcmaKEY.First],r=new EcmaBuffer(this.getStream(n)),s=0;s<i;s++){var c=r.getNumberValue();r.getByte();var l=r.getNumberValue();r.getByte();var d=c+" 0 R",u=new EcmaOBJOFF(a+l,this.getStream(n),!0);d in EcmaOBJECTOFFSETS?EcmaOBJECTOFFSETS[d].isStream&&!EcmaOBJECTOFFSETS[d].data&&(EcmaOBJECTOFFSETS[d]=u):EcmaOBJECTOFFSETS[d]=u}}},EcmaBuffer.prototype.updatePageOffsets=function(){var e,t=this.getObjectValue(EcmaMainCatalog).keys[EcmaKEY.Pages];t&&(t=this.getObjectValue(t),this.getPagesFromPageTree(t))},EcmaBuffer.prototype.getPagesFromPageTree=function(e){for(var t=e.keys[EcmaKEY.Kids],o=0,n=(t=this.getObjectValue(t)).length;o<n;o++){var i=t[o],a=this.getObjectValue(i),r=a.keys[EcmaKEY.Type];r.name===EcmaKEY.Pages?this.getPagesFromPageTree(a):r.name===EcmaKEY.Page&&EcmaPageOffsets.push(i)}};var EcmaParser={saveFormToPDF:function(e){var t=this._insertFieldsToPDF(e);this._openURL(e,t)},_insertFieldsToPDF:function(e){this._updateFileInfo(e);var t=new EcmaBuffer(EcmaMainData),o=t.findFirstXREFOffset();o&&(t.movePos(o),t.readSimpleXREF()),t.updateAllObjStm(),t.updatePageOffsets();var n=1;for(var i in EcmaOBJECTOFFSETS){var a=i.split(" ");n=Math.max(parseInt(a[0]),n)}n++;var r=[],s=[],c,l=t.getObjectValue(EcmaMainCatalog).keys[EcmaKEY.AcroForm],d=t.getObjectValue(l);delete d.keys[EcmaKEY.XFA],r.push(d),s.push(l);for(var u=document.getElementsByTagName("input"),h=document.getElementsByTagName("textarea"),f=document.getElementsByTagName("select"),m=[],p=[],g=[],y=[],S=[],O=0,E=u.length;O<E;O++){var A,I;if((I=(A=u[O]).getAttribute("data-objref"))&&I.length>0){var v=A.type.toUpperCase();"TEXT"===v||"PASSWORD"===v?m.push(A):"CHECKBOX"===v?p.push(A):"RADIO"===v?g.push(A):"BUTTON"===v&&S.push(A)}}for(var O=0,E=h.length;O<E;O++){var A,I;(I=(A=h[O]).getAttribute("data-objref"))&&I.length>0&&m.push(A)}for(var O=0,E=f.length;O<E;O++){var A,I;(I=(A=f[O]).getAttribute("data-objref"))&&I.length>0&&y.push(A)}for(var O=0,E=m.length;O<E;O++){var D=m[O].value,b=m[O].getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F=t.getObjectValue(T);r.push(F),s.push(T),EcmaFormField.editTextField(t,r,s,F,D,n),n++}for(var O=0,E=S.length;O<E;O++){var b=S[O].getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F,R=(F=t.getObjectValue(T)).keys[EcmaKEY.F],L=S[O].getAttribute("data-field-name"),P=idrform.doc.getField(L);S[O].dataset&&S[O].dataset.defaultDisplay&&P.display!==Number(S[O].dataset.defaultDisplay)&&(r.push(F),s.push(T),EcmaFormField.handleDisplayChange(F,P,R))}for(var O=0,E=p.length;O<E;O++){var N=p[O].checked,b=p[O].getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F=t.getObjectValue(T);r.push(F),s.push(T),EcmaFormField.selectCheckBox(N,F)}for(var O=0,E=y.length;O<E;O++){var C=y[O].value,b=y[O].getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F=t.getObjectValue(T);r.push(F),s.push(T),EcmaFormField.selectChoice(r,s,F,C,n),n++}for(var k={},O=0,E=g.length;O<E;O++){var B=g[O],b=B.getAttribute("data-objref"),T=EcmaLEX.getRefFromString(b),F,U=(F=t.getObjectValue(T)).keys[EcmaKEY.Parent].ref,w=B.checked,x=B.value;U?U in k?k[U].push({radioRef:b,parentRef:U,checked:w,value:x}):k[U]=[{radioRef:b,parentRef:U,checked:w,value:x}]:k[b]=[{radioRef:b,parentRef:null,checked:w,value:x}]}for(var M in k){var j=k[M],U;if(U=j[0].parentRef){var X=EcmaLEX.getRefFromString(U),K=t.getObjectValue(X);s.push(X),r.push(K);for(var V=!1,Y=null,O=0,E=j.length;O<E;O++)if(j[O].checked){Y=j[O].value,V=!0;break}V?K.keys[EcmaKEY.V]=new EcmaNAME(Y):delete K.keys[EcmaKEY.V];for(var O=0,E=j.length;O<E;O++){var W=EcmaLEX.getRefFromString(j[O].radioRef),_=t.getObjectValue(W);s.push(W),r.push(_),EcmaFormField.selectRadioChild(j[O],_)}}else{var W=EcmaLEX.getRefFromString(j[O].radioRef),_=t.getObjectValue(W);s.push(W),r.push(_),EcmaFormField.selectRadioChild(j[O],_)}}return this._saveFieldObjects(o,n,s,r),EcmaMainData},_saveFieldObjects:function(e,t,o,n){for(var i=EcmaMainData.length,a=[],r=0,s=o.length;r<s;r++){var c=o[r].num,l=n[r];a.push({ref:c,offset:i});var d=[];if(l.keys[EcmaKEY.Length]){var u=EcmaLEX.textToBytes(c+" 0 obj\n"),h=EcmaLEX.textToBytes(EcmaLEX.objectToText(n[r])+"stream\n"),f=n[r].rawStream,m=EcmaLEX.textToBytes("\nendstream\nendobj\n");EcmaLEX.pushBytesToBuffer(u,d),EcmaLEX.pushBytesToBuffer(h,d),EcmaLEX.pushBytesToBuffer(f,d),EcmaLEX.pushBytesToBuffer(m,d),EcmaLEX.pushBytesToBuffer(d,EcmaMainData)}else{var p=c+" 0 obj\n"+EcmaLEX.objectToText(n[r])+"\nendobj\n",d=EcmaLEX.textToBytes(p);EcmaLEX.pushBytesToBuffer(d,EcmaMainData)}i+=d.length}var g=EcmaMainData.length;if(EcmaXRefType){for(var y="[",S=[],r=0,s=a.length;r<s;r++){var O=a[r].ref,E=a[r].offset;S.push(1),EcmaLEX.pushBytesToBuffer(EcmaLEX.toBytes32(E),S),S.push(0),y+=O+" 1 "}y+="]";var A,I=(A=t)+" 0 obj\n<</Type /XRef /Root "+EcmaMainCatalog.ref+" /Prev "+e+" /Index "+y+" /W [1 4 1] /Size "+A+"/Length "+S.length+">>stream\n";EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(I),EcmaMainData),EcmaLEX.pushBytesToBuffer(S,EcmaMainData),I="\nendstream\nendobj\nstartxref\n"+g+"\n%%EOF",EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(I),EcmaMainData)}else{EcmaLEX.pushBytesToBuffer([120,114,101,102,10],EcmaMainData);for(var v="",r=0,s=a.length;r<s;r++){var c=a[r].ref,D=a[r].offset;v+=c+" 1\n"+EcmaLEX.getZeroLead(D)+" 00000 n \n"}var A;v+="trailer\n<</Size "+(A=t)+" /Root "+EcmaMainCatalog.ref+" /Prev "+e+">>\n",v+="startxref\n"+g+"\n%%EOF",EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(v),EcmaMainData)}},saveAnnotationToPDF:function(e,t){this._updateFileInfo(e);var o=new EcmaBuffer(EcmaMainData),n=o.findFirstXREFOffset();n&&(o.movePos(n),o.readSimpleXREF()),o.updateAllObjStm(),o.updatePageOffsets();var i=1;for(var a in EcmaOBJECTOFFSETS){var r=a.split(" ");i=Math.max(parseInt(r[0]),i)}i++,this._saveAnnotObjects(e,n,i,t)},_updateFileInfo:function(e){EcmaNAMES={},EcmaOBJECTOFFSETS={},EcmaPageOffsets=[],EcmaMainCatalog=null,EcmaXRefType=0;var t=document.getElementById("FDFXFA_PDFDump");if(t)EcmaMainData=EcmaFilter.decodeBase64(t.textContent);else{var o=new XMLHttpRequest;o.onreadystatechange=function(){if(EcmaMainData=[],4!==o.readyState||200!==o.status);else for(var e=o.responseText,t=0,n=e.length;t<n;t++)EcmaMainData.push(255&e.charCodeAt(t))},o.open("GET",e,!1),o.overrideMimeType("text/plain; charset=x-user-defined"),o.send()}},_saveAnnotObjects:function(e,t,o,n){for(var i=o,a=EcmaMainData.length,r=[],s={},c={},l=new EcmaBuffer(EcmaMainData),d=0,u=n.length;d<u;d++){var h=n[d].page,f=""+h,m=EcmaPageOffsets[h],p;f in c?p=c[f]:(p=l.getObjectValue(m),c[f]=p);var g=p.keys[EcmaKEY.Annots];s[f]=m.num,r.push({ref:i,offset:a});var y=i+" 0 obj\n"+n[d].getDictionaryString()+"\nendobj\n",S=EcmaLEX.textToBytes(y);if(EcmaLEX.pushBytesToBuffer(S,EcmaMainData),g)if(EcmaLEX.isRef(g)){var O=l.getObjectValue(g);if(EcmaLEX.isArray(O)){p.keys[EcmaKEY.Annots]=[];for(var E=0,A=O.length;E<A;E++)p.keys[EcmaKEY.Annots].push(O[E]);p.keys[EcmaKEY.Annots].push(new EcmaOREF(i,0))}else p.keys[EcmaKEY.Annots]=[g],p.keys[EcmaKEY.Annots].push(new EcmaOREF(i,0))}else EcmaLEX.isArray(g)?g.push(new EcmaOREF(i,0)):p.keys[EcmaKEY.Annots]=[new EcmaOREF(i,0)];else p.keys[EcmaKEY.Annots]=[new EcmaOREF(i,0)];a+=S.length,i++}var I=EcmaMainData.length;for(var v in s){var D=s[v];s[v]={ref:D,offset:I};var p=c[v],b=D+" 0 obj\n"+EcmaLEX.objectToText(p)+"\nendobj\n",S=EcmaLEX.textToBytes(b);EcmaLEX.pushBytesToBuffer(S,EcmaMainData),I=EcmaMainData.length}var T=EcmaMainData.length;EcmaXRefType?this._generateStreamXREF(t,T,o,r,s):this._generateSimpleXREF(t,T,o,r,s),this._openURL(e)},_generateSimpleXREF:function(e,t,o,n,i){EcmaLEX.pushBytesToBuffer([120,114,101,102,10],EcmaMainData);var a="";for(var r in i){var s=i[r].ref,c=i[r].offset;a+=s+" 1\n"+EcmaLEX.getZeroLead(c)+" 00000 n \n"}var l=n.length,d;if(l){a+=o+" "+l+"\n";for(var u=0,h=l;u<h;u++)a+=EcmaLEX.getZeroLead(n[u].offset)+" 00000 n \n"}a+="trailer\n<</Size "+(o+l)+" /Root "+EcmaMainCatalog.ref+" /Prev "+e+">>\n",a+="startxref\n"+t+"\n%%EOF",EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(a),EcmaMainData)},_generateStreamXREF:function(e,t,o,n,i){var a=n.length,r="[",s=[];for(var c in i){var l=i[c].ref,d=i[c].offset;s.push(1),EcmaLEX.pushBytesToBuffer(EcmaLEX.toBytes32(d),s),s.push(0),r+=l+" 1 "}r+=o+" "+a+"]";for(var u=0;u<a;u++){var d=n[u].offset;s.push(1),EcmaLEX.pushBytesToBuffer(EcmaLEX.toBytes32(d),s),s.push(0)}var h=o+a+1,f=h+" 0 obj\n<</Type /XRef /Root "+EcmaMainCatalog.ref+" /Prev "+e+" /Index "+r+" /W [1 4 1] /Size "+h+"/Length "+s.length+">>stream\n";EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(f),EcmaMainData),EcmaLEX.pushBytesToBuffer(s,EcmaMainData),f="\nendstream\nendobj\nstartxref\n"+t+"\n%%EOF",EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(f),EcmaMainData)},_openURL:function(e,t){var o,n="data:application/octet-stream;base64,"+EcmaFilter.encodeBase64(t),i=e,a=""+navigator.userAgent;if(-1!==a.indexOf("Edge")||-1!==a.indexOf("MSIE ")){for(var r=new ArrayBuffer(t.length),s=new Uint8Array(r),c=0,l=t.length;c<l;c++)s[c]=255&t[c];var d=new Blob([r],{type:"application/octet-stream"});return window.navigator.msSaveBlob(d,i),void 0}var u=document.createElement("a");if(u.setAttribute("download",i),u.setAttribute("href",n),document.body.appendChild(u),"click"in u)u.click();else{var h=document.createEvent("MouseEvent");h.initEvent("click",!0,!0),u.dispatchEvent(h)}u.setAttribute("href","")}},FONTNAMES={ARIAL:"Arial",HELVETICA:"Helvetica",COURIER:"Courier"},EcmaPDF={hashKey:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",getDictionaryString:function(e,t){for(var o=t,n=e.length;o<n&&60!==e[o];)o++;var i=[1],a="<<";for(o+=2;0!==i.length&&o<n;){var r=e[o],s=e[o+1];60===r&&s&&60===s?(i.push(1),o+=2,a+="<<"):62===r&&s&&62===s?(i.pop(),o+=2,a+=">>"):(a+=String.fromCharCode(r),o++)}return a},byteToString:function(e){return String.fromCharCode(e)},bytesToString:function(e){for(var t="",o=0;o<e.length;o++)t+=String.fromCharCode(parseInt(e[o]));return t},writeBytes:function(e,t){for(var o=0;o<e.length;o++){var n=e.charCodeAt(o);n<128?t.push(n):n<2048?t.push(192|n>>6,128|63&n):n<55296||n>=57344?t.push(224|n>>12,128|n>>6&63,128|63&n):(o++,n=65536+((1023&n)<<10|1023&e.charCodeAt(o)),t.push(240|n>>18,128|n>>12&63,128|n>>6&63,128|63&n))}},encode64:function(e){var t="",o,n,i,a,r,s,c,l=0;for(e=this.encodeUTF8(e);l<e.length;)a=(o=e.charCodeAt(l++))>>2,r=(3&o)<<4|(n=e.charCodeAt(l++))>>4,s=(15&n)<<2|(i=e.charCodeAt(l++))>>6,c=63&i,isNaN(n)?s=c=64:isNaN(i)&&(c=64),t+=this.hashKey.charAt(a)+this.hashKey.charAt(r)+this.hashKey.charAt(s)+this.hashKey.charAt(c);return t},decode64:function(e){for(var t="",o,n,i,a,r,s,c,l=0,d=(e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"")).length;l<d;)o=(a=this.hashKey.indexOf(e.charAt(l++)))<<2|(r=this.hashKey.indexOf(e.charAt(l++)))>>4,n=(15&r)<<4|(s=this.hashKey.indexOf(e.charAt(l++)))>>2,i=(3&s)<<6|(c=this.hashKey.indexOf(e.charAt(l++))),t+=String.fromCharCode(o),64!==s&&(t+=String.fromCharCode(n)),64!==c&&(t+=String.fromCharCode(i));return t=this.decodeUTF8(t)},encodeUTF8:function(e){for(var t="",o=0,n=(e=e.replace(/\r\n/g,"\n")).length;o<n;o++){var i=e.charCodeAt(o);i<128?t+=String.fromCharCode(i):i>127&&i<2048?(t+=String.fromCharCode(i>>6|192),t+=String.fromCharCode(63&i|128)):(t+=String.fromCharCode(i>>12|224),t+=String.fromCharCode(i>>6&63|128),t+=String.fromCharCode(63&i|128))}return t},decodeUTF8:function(e){for(var t="",o=0,n=0,i,a,r=e.length;o<r;)(n=e.charCodeAt(o))<128?(t+=String.fromCharCode(n),o++):n>191&&n<224?(i=e.charCodeAt(o+1),t+=String.fromCharCode((31&n)<<6|63&i),o+=2):(i=e.charCodeAt(o+1),a=e.charCodeAt(o+2),t+=String.fromCharCode((15&n)<<12|(63&i)<<6|63&a),o+=3);return t}};function PdfDocument(){for(var e in this._pages=new Array,this._xfaStreams=new Array,this._fontResources=new Array,FONTNAMES){var t="<</Type /Font /Subtype /Type1 /BaseFont /"+FONTNAMES[e]+">>",o=new PdfResource(FONTNAMES[e],t);this._fontResources.push(o)}}function PdfPage(){this._width=612,this._height=792,this._rotation=0,this._texts=new Array,this._images=new Array}function PdfText(e,t,o,n,i){this._x=e,this._y=t,this._fontName;var a=o.toUpperCase();this._fontName=a in FONTNAMES?FONTNAMES[a]:FONTNAMES.ARIAL,this._fontSize=n,this._fontText=i}function PdfImage(e,t,o){this._x=e,this._y=t,this._imageData=o}function PdfResource(e,t){this._name=e,this._stream=t}function XFAStream(e,t){this._name=e,this._data=t}function getObjStart(e){return e+" 0 obj"}function getObjRef(e){return e+" 0 R"}function getCatalogString(e){return getObjStart(e)+" <</Type /Catalog /Pages "+getObjRef(e+1)+">>\nendobj\n"}function getStructTreeString(e){return getObjStart(e)+" <</Type /StructTreeRoot>>\nendobj\n"}function getXFACatalogString(e,t,o){return getObjStart(e)+" <</NeedsRendering true/AcroForm "+getObjRef(t)+"/Extensions<</ADBE<</BaseVersion/1.7/ExtensionLevel 5>>>>/MarkInfo<</Marked true>>/Type /Catalog /Pages "+getObjRef(e+1)+">>\nendobj\n"}function getPageTreeString(e,t){for(var o=getObjStart(e)+" <</Type /Pages /Kids [ ",n=e+1,i=0;i<t;i++)o+=getObjRef(i+n)+" ";return o+="] /Count "+t+">>\nendobj\n"}function getPageString(e,t,o,n,i){return getObjStart(e)+" <</Type /Page /Parent "+getObjRef(t)+" /Resources "+getObjRef(o)+" /Contents "+getObjRef(n)+" /MediaBox [0 0 "+i._width+" "+i._height+"] /Rotate "+i._rotation+">>\nendobj\n"}function getContentString(e,t){for(var o="",n=t._texts.length,i=0;i<n;i++){var a=t._texts[i];o+="BT /"+a._fontName+" "+a._fontSize+" Tf "+a._x+" "+a._y+" Td ("+a._fontText+")Tj ET\n"}var r=new Array;return EcmaPDF.writeBytes(o,r),getObjStart(e)+" <</Length "+r.length+">>\nstream\n"+o+"\nendstream\nendobj\n"}function getResourceString(e,t,o){for(var n=getObjStart(e)+" <</Font <<",i=0;i<t;i++){var a;n+="/"+o._fontResources[i]._name+" "+getObjRef(e+1+i)+" "}return n+=">> >>\nendObj\n"}function getFontDefString(e,t){return getObjStart(e)+t._stream+"\nendobj\n"}function getZeroLead(e){for(var t=""+e,o=10-t.length,n=0;n<o;n++)t="0"+t;return t}function getXrefString(e){for(var t=e.length,o="xref\n0 "+(t+1)+"\n0000000000 65535 f \n",n=0;n<t;n++)o+=getZeroLead(e[n])+" 00000 n \n";return o}function getXFADefinitionString(e,t){return getObjStart(e)+"\n<</XFA "+getObjRef(t)+"/Fields[]>>\nendobj\n"}function getXFATemplateString(e,t,o){return getObjStart(e)+"\n<</Length "+t+">>stream\n"+o+"\nendstream\nendobj\n"}PdfDocument.prototype.addPage=function(e){this._pages.push(e)},PdfDocument.prototype.addXFAStream=function(e){this._xfaStreams.push(e)},PdfPage.prototype.setWidth=function(e){this._width=e},PdfPage.prototype.setHeight=function(e){this._height=e},PdfPage.prototype.addText=function(e){e._y=this._height-e._y-e._fontSize,this._texts.push(e)},PdfPage.prototype.setRotation=function(e){this._rotation=e},PdfPage.prototype.addImage=function(e){this._images.push(e)},PdfDocument.prototype.createPdfString=function(e){var t=new Array,o=new Array,n=this._pages.length,i=1,a=2,r=3,s=3+n,c=s+n,l=c+1,d=this._fontResources.length,u=l+d,h=u;EcmaPDF.writeBytes("%PDF-1.7\n",o);var f=null;f=e?getXFACatalogString(1,h,u):getCatalogString(1),t.push(o.length),EcmaPDF.writeBytes(f,o),f=getPageTreeString(2,n),t.push(o.length),EcmaPDF.writeBytes(f,o);for(var m=0;m<n;m++){var p,g,y;f=getPageString(3+m,2,c,y=s+m,p=this._pages[m]),t.push(o.length),EcmaPDF.writeBytes(f,o)}for(var m=0;m<n;m++){var p,y;f=getContentString(y=s+m,p=this._pages[m]),t.push(o.length),EcmaPDF.writeBytes(f,o)}f=getResourceString(c,d,this),t.push(o.length),EcmaPDF.writeBytes(f,o);for(var m=0;m<d;m++)f=getFontDefString(l+m,this._fontResources[m]),t.push(o.length),EcmaPDF.writeBytes(f,o);if(e){var S=h+1;f=getXFADefinitionString(h,S),t.push(o.length),EcmaPDF.writeBytes(f,o);var O=new Array;EcmaPDF.writeBytes(e,O),f=getXFATemplateString(S,O.length,e),t.push(o.length),EcmaPDF.writeBytes(f,o)}var E=o.length;return f=getXrefString(t),EcmaPDF.writeBytes(f,o),f="trailer <</Size "+(t.length+1)+" /Root 1 0 R>>\nstartxref\n"+E+"\n%%EOF",EcmaPDF.writeBytes(f,o),EcmaPDF.bytesToString(o)}}var app=idrform.app;


FormViewer.config = {"pagecount":6,"title":"2024 Form 944","author":"SE:W:CAR:MP","subject":"Employer's Annual Federal Tax Return","keywords":"","creator":"Designer 6.5","producer":"Designer 6.5","creationdate":"D:20231116122954-05'00'","moddate":"D:20231116122954-05'00'","trapped":"","fileName":"f944.pdf","bounds":[[935,1210],[935,1210],[935,1210],[935,1210],[935,1210],[935,1210]],"bookmarks":[],"thumbnailType":"","pageType":"html","pageLabels":[]};



</script>


</body>
</html>
