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

/* FormViewer - v1.2.0 | Copyright 2022 IDRsolutions */
!function(){"use strict";var e={LAYOUT_CONTINUOUS:"continuous",SELECT_SELECT:"select",SELECT_PAN:"pan",ZOOM_SPECIFIC:"specific",ZOOM_ACTUALSIZE:"actualsize",ZOOM_FITWIDTH:"fitwidth",ZOOM_FITHEIGHT:"fitheight",ZOOM_FITPAGE:"fitpage",ZOOM_AUTO:"auto"},t=1,o=0,n,i,r,a,u=!0,s,c=[],l,f,m=[],d=10,g={},p=!1,v,O="",T=!1;e.setup=function(d){d||(d=FormViewer.config),p=!0,a=/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),s=d.bounds,o=d.pagecount,d.url&&(O=d.url),T=!!d.isR2L,i=D("formviewer"),T&&R.addClass(i,"isR2L"),A.setup();var g=document.createElement("style");g.setAttribute("type","text/css"),document.head.appendChild(g),f=g.sheet,(t<1||t>o)&&(t=1);for(var b=0;b<o;b++)if(s[b][0]!=s[0][0]||s[b][1]!=s[0][1]){u=!1;break}switch(v){case FormViewer.LAYOUT_CONTINUOUS:break;default:v=FormViewer.LAYOUT_CONTINUOUS}var F=[e.LAYOUT_CONTINUOUS];for(v===FormViewer.LAYOUT_CONTINUOUS&&(r=E),window.addEventListener("resize",(function(){A.updateZoom()})),l=D("overlay"),S.setup(),null==(n=D("contentContainer"))&&(n=D("mainXFAForm")),n.style.transform="translateZ(0)",n.style.padding="5px",b=1;b<=o;b++){var L=D("page"+b);L.setAttribute("style","width: "+s[b-1][0]+"px; height: "+s[b-1][1]+"px;"),m[b]=L,c[b]=h(L,b)}r.setup(t),R.addClass(i,"layout-"+r.toString()),A.updateZoomToDefault(),r.goToPage(t);var C={selectMode:S.currentSelectMode,isMobile:a,layout:r.toString(),availableLayouts:F,isFirstPage:1===t,isLastPage:r.isLastPage(t)};for(var w in d)d.hasOwnProperty(w)&&(C[w]=d[w]);C.page=t,e.fire("ready",C)};var h=function(t,o){var n={isVisible:function(){return!0},isLoaded:function(){return!0},hide:function(){},unload:function(){e.fire("pageunload",{page:o})},load:function(){e.fire("pageload",{page:o})}};return n},b=function(n){t!=n&&(t=n,e.fire("pagechange",{page:t,pagecount:o,isFirstPage:1===t,isLastPage:r.isLastPage(n)}))},E=function(){var n={},r=0,a=0,u=[];n.setup=function(){i.addEventListener("scroll",c);for(var e=0;e<o;e++)s[e][0]>r&&(r=s[e][0]),s[e][1]>a&&(a=s[e][1])},n.unload=function(){i.removeEventListener("scroll",c)};var c=function(){l()},l=function(){var e,t;if(m[1].getBoundingClientRect().top>0)b(1);else for(e=1;e<=o;e++){var n=m[e].getBoundingClientRect();t=n.top;var i=n.bottom-n.top;if(t<=.25*i&&t>.5*-i){b(e);break}}f()},f=function(){u=[t];var e,n,r=i.clientHeight,a=function(e){return(n=m[e].getBoundingClientRect()).bottom>0&&n.top<r};for(e=t-1;e>=1&&a(e);e--)u.push(e);for(e=t+1;e<=o&&a(e);e++)u.push(e)};return n.goToPage=function(e,t){var o=0;if(t){var n=t.split(" ");switch(n[0]){case"XYZ":o=Number(n[2]);break;case"FitH":o=Number(n[1]);break;case"FitR":o=Number(n[4]);break;case"FitBH":o=Number(n[1]);break}(isNaN(o)||o<0||o>s[e-1][1])&&(o=0),0!==o&&(o=s[e-1][1]-o)}var r=A.getZoom();i.scrollTop=m[e].offsetTop-5+o*r,b(e),f()},n.getVisiblePages=function(){return u},n.updateLayout=function(){},n.isLastPage=function(e){return e===o},n.getZoomBounds=function(){return{width:r,height:a}},n.getAutoZoom=function(e){return n.getZoomBounds().width>i.clientWidth-d?e:1},n.next=function(){e.goToPage(t+1)},n.prev=function(){e.goToPage(t-1)},n.toString=function(){return FormViewer.LAYOUT_CONTINUOUS},n}(),F=function(e){try{e.getSelection?e.getSelection().empty?e.getSelection().empty():e.getSelection().removeAllRanges&&e.getSelection().removeAllRanges():e.document.selection&&e.document.selection.empty()}catch(e){}},L=function(e){try{F(e)}catch(e){}},S=function(){var t={},o,n,r=!1,a;t.setup=function(){switch(a){case FormViewer.SELECT_PAN:case FormViewer.SELECT_SELECT:break;default:a=FormViewer.SELECT_SELECT}this.currentSelectMode=a,this.currentSelectMode==e.SELECT_SELECT?t.enableTextSelection():t.enablePanning()},t.enableTextSelection=function(){this.currentSelectMode=e.SELECT_SELECT,R.removeClass(l,"panning"),l.removeEventListener("mousedown",u),document.removeEventListener("mouseup",s),l.removeEventListener("mousemove",c)};var u=function(e){return e=e||window.event,R.addClass(l,"mousedown"),o=e.clientX,n=e.clientY,r=!0,!1},s=function(){R.removeClass(l,"mousedown"),r=!1},c=function(e){if(r)return e=e||window.event,i.scrollLeft=i.scrollLeft+o-e.clientX,i.scrollTop=i.scrollTop+n-e.clientY,o=e.clientX,n=e.clientY,!1};return t.enablePanning=function(){this.currentSelectMode=e.SELECT_PAN,F(window),R.addClass(l,"panning"),l.addEventListener("mousedown",u),document.addEventListener("mouseup",s),l.addEventListener("mousemove",c)},t.setDefaultMode=function(e){a=e},t}();e.setSelectMode=function(t){if(p){if(a)return;t==e.SELECT_SELECT?S.enableTextSelection():S.enablePanning(),e.fire("selectchange",{type:t})}else S.setDefaultMode(t)};var A=(C=e.ZOOM_AUTO,P=[.25,.5,.75,1,1.25,1.5,2,2.5,3,3.5,4],I=[e.ZOOM_AUTO,e.ZOOM_FITPAGE,e.ZOOM_FITHEIGHT,e.ZOOM_FITWIDTH,e.ZOOM_ACTUALSIZE],Z=0,M=1,U=function(e,t,o,n,i){var r;return"-webkit-transform: "+(r=i?"translate3d("+t+"px, "+o+"px, 0) scale("+n+")":"translateX("+t+"px) translateY("+o+"px) scale("+n+")")+";\n-ms-transform: "+r+";\ntransform: "+r+";"},x=function(t){var n=!1,a=!1;(M=H(t))>=4?(M=4,a=!0):M<=.25&&(M=.25,n=!0);var u=i.scrollTop/i.scrollHeight;r.updateLayout();for(var l=r.getVisiblePages(),f=1;f<=o;f++)-1===l.indexOf(f)&&c[f].hide();w&&y.deleteRule(w);var d=U(null,0,0,M,!1);w=y.insertRule(".page-inner { \n"+d+"\n}",y.cssRules.length);for(var g=0;g<o;g++)m[g+1].style.width=Math.floor(s[g][0]*M)+"px",m[g+1].style.height=Math.floor(s[g][1]*M)+"px";i.scrollTop=i.scrollHeight*u,++Z%2==1&&x(),e.fire("zoomchange",{zoomType:C,zoomValue:M,isMinZoom:n,isMaxZoom:a})},V=function(){for(var e=M,t=P[P.length-1],o=0,n;o<P.length;o++)if(P[o]>e){t=P[o];break}for(o=0;o<I.length;o++){var i=H(I[o]);if(i>e&&i<=t){if(n&&i===t)continue;n=I[o],t=i}}return n||t},k=function(){for(var e=M,t=P[0],o=P.length-1,n;o>=0;o--)if(P[o]<e){t=P[o];break}for(o=0;o<I.length;o++){var i=H(I[o]);if(i<e&&i>=t){if(n&&i===t)continue;n=I[o],t=i}}return n||t},H=function(t){var o=r.getZoomBounds(),n=(i.clientWidth-d)/o.width,a=(i.clientHeight-d)/o.height,u=parseFloat(t);switch(isNaN(u)||(M=u,t=e.ZOOM_SPECIFIC),t||(t=C),t){case e.ZOOM_AUTO:M=r.getAutoZoom(n,a);break;case e.ZOOM_FITWIDTH:M=n;break;case e.ZOOM_FITHEIGHT:M=a;break;case e.ZOOM_FITPAGE:M=Math.min(n,a);break;case e.ZOOM_ACTUALSIZE:M=1;break}return C=t,M},{setup:function(){var e=document.createElement("style");e.setAttribute("type","text/css"),document.head.appendChild(e),y=e.sheet},updateZoom:x,updateZoomToDefault:function(){x(_)},zoomIn:function(){x(V())},zoomOut:function(){x(k())},getZoom:function(){return M},setDefault:function(e){_=e}}),C,w,P,I,Z,y,M,_,N,U,x,V,k,H;e.zoomIn=function(){A.zoomIn()},e.zoomOut=function(){A.zoomOut()},e.setZoom=function(e){p?A.updateZoom(e):A.setDefault(e)},e.goToPage=function(e,n){p?e>=1&&e<=o&&r.goToPage(Number(e),n):t=e},e.next=function(){r.next()},e.prev=function(){r.prev()},e.setLayout=function(o){p?(r.unload(),R.removeClass(i,"layout-"+r.toString()),(r=E).setup(t),R.addClass(i,"layout-"+r.toString()),A.updateZoom(FormViewer.ZOOM_AUTO),r.goToPage(t),e.fire("layoutchange",{layout:o})):v=o},e.updateLayout=function(){A.updateZoom()};var D=function(e){return document.getElementById(e)};e.on=function(e,t){g[e]||(g[e]=[]),-1===g[e].indexOf(t)&&g[e].push(t)},e.off=function(e,t){if(g[e]){var o=g[e].indexOf(t);-1!==o&&g[e].splice(o,1)}},e.fire=function(e,t){g[e]&&g[e].forEach((function(e){e(t)}))};var R={addClass:function(e,t){var o=0!==e.className.length?e.className.split(" "):[],n;-1===o.indexOf(t)&&(o.push(t),e.className=o.join(" "))},removeClass:function(){for(var e=arguments[0],t=0!==e.className.length?e.className.split(" "):[],o=1;o<arguments.length;o++){var n=t.indexOf(arguments[o]);-1!==n&&t.splice(n,1)}e.className=t.join(" ")}};e.handleFormSubmission=function(e,t){FormVuAPI&&(e||(e=window.prompt("Please enter the URL to submit to"))?z(e,t):console.log("No URL provided for FormSubmission"))};var z=function(e,t){if(FormVuAPI){var o={url:e,success:function(){alert("Form submitted successfully")},failure:function(){alert("Form failed to submit, please try again")}},n="string"==typeof t?t.toLowerCase():"";if(e.startsWith("mailto:"))return o.format=n,FormVuAPI.submitFormAsMail(o),void 0;switch(n){case"json":"function"==typeof FormVuAPI.submitFormAsJSON&&FormVuAPI.submitFormAsJSON(o);break;case"pdf":"function"==typeof FormVuAPI.submitFormAsPDF&&FormVuAPI.submitFormAsPDF(o);break;case"formdata":default:"function"==typeof FormVuAPI.submitFormAsFormData&&FormVuAPI.submitFormAsFormData(o);break}}};"function"==typeof define&&define.amd?define(["formviewer"],[],(function(){return e})):"object"==typeof module&&module.exports?module.exports=e:window.FormViewer=e}();



(function () {
    "use strict";

    var FormVuAPI = {};

    FormVuAPI.extractFormValues = function () {
        const inputs = document.getElementsByTagName("input");
        const textareas = document.getElementsByTagName("textarea");
        const selects = document.getElementsByTagName("select");

        const texts = [];
        const checks = [];
        const checkGroups = [];
        const radios = [];
        const choices = [];

        for (const inp of inputs) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                const type = inp.type.toUpperCase();
                if (type === "TEXT" || type === "PASSWORD") {
                    texts.push(inp);
                } else if (type === "CHECKBOX") {
                    // Handle checkbox groups
                    if (Object.keys(idrform.getCheckboxGroup(inp.dataset.fieldName)).length > 1)
                        checkGroups.push(inp);
                    else checks.push(inp);
                } else if (type === "RADIO") {
                    // Filter out unisons
                    if (inp.name === inp.dataset.fieldName) radios.push(inp);
                }
            }
        }
        for (const inp of textareas) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                texts.push(inp);
            }
        }
        for (const inp of selects) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                choices.push(inp);
            }
        }

        const output = {};

        for (const item of texts) {
            const fieldText = item.value;
            const fieldName = item.getAttribute("data-field-name");
            output[fieldName] = fieldText;
        }

        for (const item of checkGroups) {
            const fieldName = item.getAttribute("data-field-name");
            const isChecked = item.checked;
            const value = item.value

            if (isChecked) {
                output[fieldName] = value;
            }
        }

        for (const item of checks) {
            const isChecked = item.checked;
            const fieldName = item.getAttribute("data-field-name");
            output[fieldName] = isChecked;
        }

        for (const item of choices) {
            const selected = item.value;
            const fieldName = item.getAttribute("data-field-name");
            const multiple =  item.getAttribute("multiple");
            if (multiple) {
                const options = item.children;
                const selectedItems = [];
                for (const option of options) {
                    if (option.selected) {
                        selectedItems.push(option.value);
                    }
                }
                output[fieldName] = selectedItems;
            } else {
                output[fieldName] = selected;
            }
        }

        for (const radio of radios) {
            const fieldName = radio.getAttribute("data-field-name");
            const isChecked = radio.checked;
            const value = radio.value;

            if (isChecked) {
                output[fieldName] = value;
            }
        }
        return output;
    };

    /**
     * Takes a JSON input in the format of formdata.json and updates the relevant
     * HTML fields values to match the provided values.
     *
     * @param {String|Object} formValues The values to be inserted into the HTML
     * @param {boolean} resetForm Whether a form reset should be called before inserting the values
     * @returns {boolean} true on method completion, false on invalid input
     */
    FormVuAPI.insertFormValues = function (formValues, resetForm) {
        if (typeof formValues === "string") {
            formValues = JSON.parse(formValues);
        } else if (!(formValues instanceof Object)) {
            console.error('Form values provided to insertFormValues is not an Object or JSON String');
            return false;
        }

        if (resetForm) {
            idrform.doc.resetForm();
        }

        for (let key of Object.keys(formValues)) {
            let val = formValues[key];
            if (val.inputType) {
                switch (val.inputType) {
                    case "radio button":
                        _handleRadioButtonInsert(val);
                        break;
                    case "checkbox":
                    case "checkbox group":
                        _handleCheckboxInsert(val);
                        break;
                    case "combobox":
                        _handleComboboxInsert(val);
                        break;
                    case "listbox":
                    case "listbox multi":
                        _handleListboxInsert(val);
                        break;
                    case "multiline text":
                        _handleMultilineTextInsert(val);
                        break;
                    default:
                        _handleGenericInputInsert(val);
                        break;
                }
            }
        }

        return true;
    };

    /**
     * Escapes the provided string for use as a CSS selector
     * Backslashes need to be escaped in order to be used in CSS selectors
     * (otherwise they will fail)
     *
     * @param {String} string the string to be escaped
     * @returns {String} an escaped string ready for use as a CSS selector
     * @private
     */
    let escapeForCssSelector = function(string) {
        return string.replaceAll('\\','\\\\');
    }

    /**
     * Selects the relevant radio button of the provided Form Field JSON object
     * Refreshes the AP images so the change is displayed
     * If the radio button is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleRadioButtonInsert = function(jsonObj) {
        let domRadioButtons = document.querySelectorAll('input[type=radio][data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref]');
        if (!domRadioButtons) {
            console.warn("Failed to find <input type=\"radio\"> " + jsonObj.fieldName);
            return;
        }
        domRadioButtons.forEach(element => {
            if (element.dataset.objref == jsonObj.objref) {
                element.checked = jsonObj.value;
                element.value = jsonObj.value;
            } else {
                element.checked = false;
            }
            if ("refreshApImage" in window && element.dataset.imageIndex) refreshApImage(parseInt(element.dataset.imageIndex));
        });
    }

    /**
     * Ticks the relevant checkbox of the provided Form Field JSON object
     * Refreshes the AP images so the change is displayed
     * If the checkbox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleCheckboxInsert = function(jsonObj) {
        let domCheckboxes = document.querySelectorAll('input[type=checkbox][data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref]');
        if (!domCheckboxes) {
            console.warn("Failed to find <input type=\"checkbox\"> " + jsonObj.fieldName);
            return;
        }
        domCheckboxes.forEach(element => {
            if (element.dataset.objref == jsonObj.objref) {
                element.checked = jsonObj.value;
                element.value = jsonObj.value;
            } else {
                element.checked = false;
            }
            if ("refreshApImage" in window && element.dataset.imageIndex) refreshApImage(parseInt(element.dataset.imageIndex));
        });
    };

    /**
     * Selects the relevant combobox option from the provided Form Field JSON object
     * If a value is not an option, a new option will be added with the provided value
     * If the combobox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleComboboxInsert = function(jsonObj) {
        let domCombobox = document.querySelector('select[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domCombobox) {
            console.warn("Failed to find <select> " + jsonObj.fieldName);
            return;
        }

        let options = domCombobox.children;
        let optionFound = false;
        for (let i = 0, ii = options.length; i < ii; i++) {
            let option = options[i];
            if (option.value === jsonObj.value) {
                option.setAttribute("selected", "selected");
                domCombobox.selectedIndex = i;
                optionFound = true;
            } else {
                option.removeAttribute("selected");
            }
        }
        if (!optionFound) {
            const newOpt = document.createElement("option");
            newOpt.text = jsonObj.value;
            newOpt.value = jsonObj.value;
            newOpt.setAttribute("selected", "selected");
            domCombobox.appendChild(newOpt);
        }
        domCombobox.value = jsonObj.value;
    }

    /**
     * Selects the relevant listbox option from the provided Form Field JSON object
     * Unselects any other options
     * If the listbox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleListboxInsert = function(jsonObj) {
        let domListbox = document.querySelector('select[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domListbox) {
            console.warn("Failed to find <select> " + jsonObj.fieldName);
            return;
        }
        let options = domListbox.children;
        for (let i = 0, ii = options.length; i < ii; i++) {
            let option = options[i];

            if (option.value == jsonObj.value || jsonObj.value instanceof Array && jsonObj.value.includes(option.value)) {
                option.selected = true;
                option.setAttribute("selected", "selected");
            } else {
                option.removeAttribute("selected");
            }
        }
    }

    /**
     * Inserts the multiline text from the provided Form Field JSON object
     * If the textarea is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleMultilineTextInsert = function(jsonObj) {
        let domTextArea = document.querySelector('textarea[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domTextArea) {
            console.warn("Failed to find <textarea> " + jsonObj.fieldName);
            return;
        }
        domTextArea.value = jsonObj.value;
    }

    /**
     * Inserts the value of the provided Form Field JSON object into the relevant HTML input
     * Can also insert into textareas if not using single-line text output
     * If the input/textarea is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleGenericInputInsert = function(jsonObj) {
        let domInput = document.querySelector(':is(input,textarea)[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domInput) {
            console.warn("Failed to find <input> or <textarea>" + jsonObj.fieldName);
            return;
        }
        domInput.value = jsonObj.value;
    }

    let setRequestEventHandlers = function(xhr, params) {
        xhr.onreadystatechange = function(event) {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    if (params.success) {
                        params.success(event);
                    }
                } else {
                    if (params.failure) {
                        params.failure(event);
                    } else {
                        console.log(event.target.response);
                    }
                }
            }
        };
    };

    FormVuAPI.submitFormAsMail = function(params) {
        if (typeof params !== 'object') {
            params = {url: params};
        }
        if (!params.url.startsWith('mailto:')) {
            return;
        }
        switch (params.format) {
            case 'formdata':
                alert('The file will be saved in your machine, please attach it to the email');
                downloadFormDataValues(this.extractFormValues());
                openMailToLink(params.url);
                break;
            case 'pdf':
                alert('The file will be saved in your machine, please attach it to the email');
                idrform.app.execMenuItem('SaveAs');
                openMailToLink(params.url);
                break;
            default:
                alert('Unsupported submission format. Submission failed.');
                break;
        }
    };

    let downloadFormDataValues = function(formValues) {
        let formValuesString = "";
        for (var value in formValues) {
            if (formValues.hasOwnProperty(value) && formValues[value] !== undefined) {
                if (formValuesString.length !== 0) {
                    formValuesString += '&';
                }

                formValuesString += encodeURIComponent(value) + '=' + formValues[value];
            }
        }
        let fileDL = document.createElement('a');
        let pdfName = document.getElementById("FDFXFA_PDFName").textContent;
        fileDL.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(formValuesString));
        fileDL.setAttribute('download', pdfName + '.txt');
        fileDL.style.display = 'none';
        document.body.appendChild(fileDL);
        fileDL.click();
        document.body.removeChild(fileDL);
    };

    let openMailToLink = function(target) {
        let mailto = document.createElement('a');
        mailto.setAttribute('href', target);
        mailto.setAttribute('target', "_blank");
        mailto.style.display = 'none';
        document.body.appendChild(mailto);
        mailto.click();
        document.body.removeChild(mailto);
    };

    FormVuAPI.submitFormAsJSON = function (params) {
        let url = typeof params === 'object' ? params.url : params;

        let formValues = {data: this.extractFormValues()};
        let xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.send(JSON.stringify(formValues));
            return xhr;
        }
    };

    FormVuAPI.submitFormAsFormData = function (params) {
        let url = typeof params === 'object' ? params.url : params;

        let formValues = this.extractFormValues();
        let xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);

            let formData = new FormData();
            for (var value in formValues) {
                if (formValues.hasOwnProperty(value) && formValues[value] !== undefined) {
                    formData.append(encodeURIComponent(value), formValues[value]);
                }
            }
            xhr.send(formData);
            return xhr;
        }
    };

    FormVuAPI.submitFormAsPDF = function (params) {
        let url, submitType="formData";
        if (typeof params === 'object') {
            url = params.url;
            submitType = params.submitType || "formData";
        } else {
            url = params;
        }

        const xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);
            const file = idrform.getCompletedFormPDF();
            const fileName = document.querySelector("#FDFXFA_PDFName").textContent;

            if (submitType === "raw") {
                xhr.setRequestHeader("Content-Disposition", `filename="${fileName}"`)
                xhr.send(file);
            } else if (submitType === "formData") {
                const formData = new FormData();
                formData.append("file", file, fileName);
                xhr.send(formData);
            }
            return xhr;
        }
    }

    window.FormVuAPI = FormVuAPI;

}());



</script>


 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
stroke-width: 1.222;
stroke-miterlimit: 10;
}
.g4_1{
fill: none;
stroke: #000;
stroke-width: 1.145;
stroke-miterlimit: 10;
}
.g5_1{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M55,357.5H605V91.7H55V357.5ZM253,100.8H238.7M253,128.3H238.7m22,-5.5V106.3M231,122.8V106.3" class="g0_1"/>
<path d="M231,106.3v22.4m-.4,-.4H253m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H238.7m14.3,0H230.6m.4,-.3v22.3" class="g1_1"/>
<path d="M294.5,100.8H280.2m14.3,27.5H280.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M272.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H280.2m14.3,0H272.1m.4,-.3v22.3" class="g1_1"/>
<path d="M353.3,100.8H339m14.3,27.5H339m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M331.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H339m14.3,0H330.9m.4,-.3v22.3" class="g1_1"/>
<path d="M391.9,100.8H377.6m14.3,27.5H377.6m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M369.9,106.3v22.4m-.3,-.4h22.3m-14.3,0H400m-.4,.4V106.3m0,16.5V100.5m.4,.3H377.6m14.3,0H369.6m.3,-.3v22.3" class="g1_1"/>
<path d="M430.8,100.8H416.5m14.3,27.5H416.5m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M408.8,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H416.5m14.3,0H408.4m.4,-.3v22.3" class="g1_1"/>
<path d="M469.6,100.8H455.3m14.3,27.5H455.3m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M447.6,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H455.3m14.3,0H447.2m.4,-.3v22.3" class="g1_1"/>
<path d="M508.5,100.8H494.2m14.3,27.5H494.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M486.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H494.2m14.3,0H486.1m.4,-.3v22.3" class="g1_1"/>
<path d="M547.2,100.8H532.9m14.3,27.5H532.9m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M525.2,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H532.9m14.3,0H524.8m.4,-.3v22.3" class="g1_1"/>
<path d="M586.3,100.8H572m14.3,27.5H572m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M564.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H572m14.3,0H563.9m.4,-.3v22.3" class="g1_1"/>
<path d="M209,165H594V137.5H209V165Zm-33,36.7H594V174.2H176v27.5Zm-55,36.6H594V210.8H121v27.5Zm0,55H407V265.8H121v27.5Zm297,0h55V265.8H418v27.5Zm66,0H594V265.8H484v27.5ZM121,337.6H319V311.7H121v25.9Zm209,0H473V311.7H330v25.9Zm154,0H594V311.7H484v25.9ZM660,91.7H847M660,293.3H847M869,113.7V271.3M638,113.7V271.3" class="g0_1"/>
<path d="M638,271.3v22.4m-.4,-.4H660m187,0h22.4m-.4,.4V271.3m0,-157.6V91.3m.4,.4H847m-187,0H637.6m.4,-.4v22.4" class="g1_1"/>
<path d="M649,145H858V108.3H649V145Z" class="g2_1"/>
<path d="M650.8,165.7h15.3V150.4H650.8v15.3Zm0,27.5h15.3V177.9H650.8v15.3Zm0,27.5h15.3V205.4H650.8v15.3Zm0,27.5h15.3V232.9H650.8v15.3Z" class="g0_1"/>
<path d="M55,403.3h55V385H55v18.3Z" class="g2_1"/>
<path d="M54.6,385h55.8" class="g3_1"/>
<path d="M54.6,403.3h55.8" class="g0_1"/>
<path d="M54.6,385H880.4" class="g3_1"/>
<path d="M54.6,403.3H880.4M693,440h33V412.5H693V440Zm55,0h33V412.5H748V440Zm-54.4,34.4h15.3V459.1H693.6v15.3Zm0,28.2h15.3V487.4H693.6v15.2Z" class="g0_1"/>
<path d="M55,531.7h55V513.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,513.3h55.8" class="g3_1"/>
<path d="M54.6,531.7h55.8" class="g0_1"/>
<path d="M54.6,513.3H880.4" class="g3_1"/>
<path d="M54.6,531.7H880.4m-187.8,9.1H836.4M692.6,568.3H836.4M693,540.4v28.3M835.6,540.8h44.8m-44.8,27.5h44.8M880,540.4v28.3m-407.4,-.4H616.4M472.6,595.8H616.4M473,567.9v28.3M615.6,568.3h44.8m-44.8,27.5h44.8M660,567.9v28.3M242,621.8h15.3V606.5H242v15.3Zm0,18.3h15.3V624.9H242v15.2ZM473,621.8h15.3V606.5H473v15.3Zm0,18.3h15.3V624.9H473v15.2ZM660,621.8h15.3V606.5H660v15.3Zm-187.4,29H616.4M472.6,678.3H616.4M473,650.4v28.3M615.6,650.8h44.8m-44.8,27.5h44.8M660,650.4v28.3m32.6,-.4H836.4M692.6,705.8H836.4M693,677.9v28.3M835.6,678.3h44.8m-44.8,27.5h44.8M880,677.9v28.3M692.6,715H836.4M692.6,742.5H836.4M693,714.6v28.3M835.6,715h44.8m-44.8,27.5h44.8M880,714.6v28.3m-187.4,8.8H836.4M692.6,779.2H836.4M693,751.3v28.3M835.6,751.7h44.8m-44.8,27.5h44.8M880,751.3v28.3" class="g0_1"/>
<path d="M55,806.7h55V788.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,788.3h55.8" class="g3_1"/>
<path d="M54.6,806.7h55.8" class="g0_1"/>
<path d="M54.6,788.3H880.4" class="g4_1"/>
<path d="M54.6,806.7H880.4m-187.8,9.1H836.4M692.6,843.3H836.4M693,815.4v28.3M835.6,815.8h44.8m-44.8,27.5h44.8M880,815.4v28.3m-187.4,18H836.4M692.6,889.2H836.4M693,861.3v28.3M835.6,861.7h44.8m-44.8,27.5h44.8M880,861.3v28.3M692.6,895H836.4M692.6,922.5H836.4M693,894.6v28.2M835.6,895h44.8m-44.8,27.5h44.8M880,894.6v28.2" class="g0_1"/>
<path d="M55,944.2h55V925.8H55v18.4Z" class="g2_1"/>
<path d="M54.6,925.8h55.8" class="g3_1"/>
<path d="M54.6,944.2h55.8" class="g0_1"/>
<path d="M109.6,925.8H880.4" class="g4_1"/>
<path d="M109.6,944.2H880.4M692.6,950H836.4M692.6,977.5H836.4M693,949.6v28.2M835.6,950h44.8m-44.8,27.5h44.8M880,949.6v28.2m-187.4,8.8H836.4m-143.8,27.5H836.4M693,986.2v28.3M835.6,986.6h44.8m-44.8,27.5h44.8M880,986.2v28.3M692.6,1045H836.4m-143.8,27.5H836.4M693,1044.6v28.3M835.6,1045h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-187.4,8.8H836.4m-143.8,27.5H836.4M693,1081.3v28.3m142.6,-27.9h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-271.9,23.2h15.2v-15.2H608.1v15.2Zm143,-.7h15.2v-15.3H751.1v15.3Z" class="g0_1"/>
<path d="M54.6,1155H594.4m-.8,0H792.4m-.8,0h88.8" class="g5_1"/>
</svg>


 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
fill: none;
stroke: #000;
stroke-width: 1.222;
stroke-miterlimit: 10;
}
.g4_2{
fill: none;
stroke: #000;
stroke-width: 0.762;
stroke-miterlimit: 10;
}
.g5_2{
fill: none;
stroke: #000;
stroke-width: 0.757;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.2,73.3H880.8" class="g0_2"/>
<path d="M54.6,110H605.4M605,72.9v37.5" class="g1_2"/>
<path d="M55,128.3h55V110H55v18.3Z" class="g2_2"/>
<path d="M54.6,110h55.8" class="g3_2"/>
<path d="M54.6,128.3h55.8" class="g1_2"/>
<path d="M54.6,110H880.4" class="g3_2"/>
<path d="M54.6,128.3H880.4m-352.8,55H671.4M527.6,210.8H671.4M528,182.9v28.3M670.6,183.3h44.8m-44.8,27.5h44.8M715,182.9v28.3M527.6,220H671.4M527.6,247.5H671.4M528,219.6v28.3M670.6,220h44.8m-44.8,27.5h44.8M715,219.6v28.3m-187.4,8.8H671.4M527.6,284.2H671.4M528,256.3v28.3M670.6,256.7h44.8m-44.8,27.5h44.8M715,256.3v28.3m-187.4,8.7H671.4M527.6,320.8H671.4M528,292.9v28.3M670.6,293.3h44.8m-44.8,27.5h44.8M715,292.9v28.3M527.6,330H671.4M527.6,357.5H671.4M528,329.6v28.3M670.6,330h44.8m-44.8,27.5h44.8M715,329.6v28.3" class="g1_2"/>
<path d="M55,385h55V366.7H55V385Z" class="g2_2"/>
<path d="M54.6,366.7h55.8" class="g3_2"/>
<path d="M54.6,385h55.8" class="g1_2"/>
<path d="M54.6,366.7H880.4" class="g3_2"/>
<path d="M54.6,385H880.4M88,456.8h15.3V441.5H88v15.3Zm308,1.5H627V430.8H396v27.5Zm253,0H869V430.8H649v27.5Zm22,9.2H660M671,495H660m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M649,473v22.4m-.4,-.4H671m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H660m11,0H648.6m.4,-.4v22.4" class="g4_2"/>
<path d="M715,467.5H704M715,495H704m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M693,473v22.4m-.4,-.4H715m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H704m11,0H692.6m.4,-.4v22.4" class="g4_2"/>
<path d="M759,467.5H748M759,495H748m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M737,473v22.4m-.4,-.4H759m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H748m11,0H736.6m.4,-.4v22.4" class="g4_2"/>
<path d="M803,467.5H792M803,495H792m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M781,473v22.4m-.4,-.4H803m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H792m11,0H780.6m.4,-.4v22.4" class="g4_2"/>
<path d="M847,467.5H836M847,495H836m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M825,473v22.4m-.4,-.4H847m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H836m11,0H824.6m.4,-.4v22.4" class="g4_2"/>
<path d="M88,520.2h15.3V504.9H88v15.3Z" class="g1_2"/>
<path d="M55,550h55V531.7H55V550Z" class="g2_2"/>
<path d="M54.6,531.7h55.8" class="g3_2"/>
<path d="M54.6,550h55.8" class="g1_2"/>
<path d="M54.6,531.7H880.4" class="g3_2"/>
<path d="M54.6,550H880.4M198,632.5H462m-264,55H462m22,-33v11m-308,-11v11" class="g1_2"/>
<path d="M176,665.5v22.4m-.4,-.4H198m264,0h22.4m-.4,.4V665.5m0,-11V632.1m.4,.4H462m-264,0H175.6m.4,-.4v22.4" class="g5_2"/>
<path d="M176,742.5H297V715H176v27.5ZM583,660H869V632.5H583V660Zm0,36.7H869V669.2H583v27.5Zm66,36.6H869V705.8H649v27.5ZM54.6,770H880.4m-26.7,29.8H869V784.5H853.7v15.3ZM220,861.7H616V834.2H220v27.5Zm462,0H869V834.2H682v27.5ZM242,880H594M242,907.5H594M616,902V885.5M220,902V885.5" class="g1_2"/>
<path d="M220,885.5v22.4m-.4,-.4H242m352,0h22.4m-.4,.4V885.5m0,16.5V879.6m.4,.4H594m-352,0H219.6m.4,-.4V902" class="g5_2"/>
<path d="M682,907.5H803V880H682v27.5ZM220,953.3H616V925.8H220v27.5Zm462,0H869V925.8H682v27.5ZM220,990H616V962.5H220V990Zm462,0H869V962.5H682V990Zm-462,36.7H407V999.2H220v27.5Zm242,0H616V999.2H462v27.5Zm220,0H869V999.2H682v27.5Z" class="g1_2"/>
<path d="M54.6,1063.3H792.4m-.8,0h88.8" class="g0_2"/>
</svg>



 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_3{
fill: none;
stroke: #000;
stroke-width: 3.055;
stroke-miterlimit: 10;
}
.g1_3{
fill: #000;
}
.g2_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
stroke-dasharray: 7,4;
}
.g3_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
.g4_3{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,55H880.4M54.6,128.3H880.4" class="g0_3"/>
<path d="M55,481.3h55v-55H55v55Z" class="g1_3"/>
<path d="M54.6,846.4H880.4" class="g2_3"/>
<path d="M187,870.4v28.3M54.6,925.8H187.8M187,897.9v28.7m-.4,-.8H759.4" class="g3_3"/>
<path d="M758.2,889.2H880.4" class="g4_3"/>
<path d="M759,870.4v19.1m-.5,36.3H880.7m-121.4,-37v37.8" class="g3_3"/>
<path d="M54.6,980.8H77.4m-.8,0H330.4" class="g4_3"/>
<path d="M328.5,925.8H660.4m-331.9,55H660.4M330,924.3v58.1M658.5,925.8H825.4m-166.9,55H825.4M660,924.3v58.1M824.6,925.8h56.9m-56.9,55h56.9M880,924.3v58.1" class="g0_3"/>
<path d="M825,924.3v58.1m-495,-2v110.8m21.6,-73.7H880.4m-528.8,36.7H880.4M55,1090.8H880" class="g4_3"/>
</svg>

 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_4{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,73.3H880.4" class="g0_4"/>
</svg>




<style type="text/css">
.btn{border:0 none; height:30px; padding:0; width:30px; background-color:transparent; display:inline-block; margin:7px 5px 0; vertical-align:top; cursor:pointer; color:#fff;}
.btn:hover{background-color:#0e1319; color:#eddbd9; border-radius:5px;}
.page{box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);}
#formviewer{bottom:0; left:0; right:0; position:absolute; top:40px; background:#191f2f none repeat scroll 0 0;}
body{padding:0px; margin:0px; background-color:#191f2f;}
    {  z-index:9999; color:white;background-color:#707784; position:fixed; font-size:32px; margin:61px; opacity:0.8; top:0px; min-width:300px; min-height: 40px;margin-left: 706px;background: black;}


    
    .btn{border:0 none; height:30px; padding:0; width:30px; background-color:transparent; display:inline-block; margin:7px 5px 0; vertical-align:top; cursor:pointer; color:#fff;}
.btn:hover{background-color:#0e1319; color:#eddbd9; border-radius:5px;}
.page{box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);}
#formviewer{bottom:0; left:0; right:0; position:absolute; top:40px; background:#191f2f none repeat scroll 0 0;}
body{padding:0px; margin:0px; background-color:#191f2f;}
#FDFXFA_Menu{text-align:center;   z-index:9999; color:white;background-color:#707784; position:fixed; font-size:32px; margin:0px; opacity:0.8; top:0px; min-width:300px; min-height: 40px; margin-left: 725px;}




#FDFXFA_Menu a{cursor:pointer; border-radius:5px; padding:5px; font-family: IDRSymbols; margin:5px 10px 5px 10px;}
#FDFXFA_PageLabel{padding-left:5px;font-size:20px}
#FDFXFA_PageCount{padding-right:5px;font-size:20px}
#FDFXFA_Menu a:hover{background-color:#0e1319; color:#eddbd9;}
#FDFXFA_PageLabel{min-width:20px;display:inline-block;}
#FDFXFA_Processing{width:100%; height:100%;  position:fixed; background-color:black; opacity:0.8; color:white; top:0px;text-align: center; font-size:300px; font-family:IDRSymbols;}
#FDFXFA_Processing span{top:50%;left:50%;margin:-50px 0 0 -50px}
#FDFXFA_FormType,#FDFXFA_Form,#FDFXFA_PDFName,#FDFXFA_FormSubmitURL{display:none;}
@font-face {font-family:'IDRSymbols'; src: url(data:application/x-font-woff;charset=utf-8;base64,d09GRk9UVE8AABXAAAsAAAAAHqgAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAABDRkYgAAADNAAAEecAABjLaEwijEZGVE0AABVAAAAAHAAAABx9NjoUR0RFRgAAFRwAAAAiAAAAJgAnAE1PUy8yAAABaAAAAEoAAABgRXjg9mNtYXAAAALoAAAANwAAAUIADfLLaGVhZAAAAQgAAAA1AAAANgwgJhRoaGVhAAABQAAAAB4AAAAkBnAEBWhtdHgAABVcAAAAYgAAAIZxOhexbWF4cAAAAWAAAAAGAAAABgAnUABuYW1lAAABtAAAATIAAAIr0D8cW3Bvc3QAAAMgAAAAEwAAACD/hgAyeJxjYGRgYADi6EaeR/H8Nl8ZuJlfAEUYrlRGcIDpxV1nGNT/P2Hey1QO5HIwMIFEAUvIDCkAAAB4nGNgZGBgimBgYIhifgEkGZj3MjAyoAIZADoTAn4AAAAAUAAAJwAAeJxjYGF+zjiBgZWBgamLaTcDA0MPhGa8z2DIyAQUZWDlZIADAQSTISDNNYWh4QPDB1Vmhf8WDFFMEQwMDUCNcAUKQMgIAJVIDIsAAHichY/NasJAFIXP+FfcSPEJbgsFBRMm2QRcVhHsoosE3BaVNAY0IzFZ2HUfocs+Q5+rj9GTZAjdOYu531zOnHsugBF+oNCcBywtKwzxYbmDO3xZ7uIJv5Z7GKpHy33cq1fLA/YvVKrekK/n+lfFCmO8W+5w7qflLl7wbbmHsRpZ7kPUzPKA/TcsYHDGFTlSJDiggGCCPaasPjQ8BJiR19wjZI2oP6KkLiVluAALc77maXIoZLKfiq+9YCbrZSiROZZFajJKmt8R55ywqx1ARXQ97QwxRMzZJbtb5kAYJ+VxS1jVE4q65lTEdSaXqQTzNtN/16ZfZXZ4O+0GWJmsWJk8icV3tcylnU72Asdzqti3cm6YIOfGzeZC78rdrWuVCZs4v3Bh0dpztdZyw/APH2JUPwAAeJxjYGBgZoBgGQZGBhCwAfIYwXwWBgUgzQKEQP4H1f//gSTD//8CjFCVDIxsDDDmiAUAW8IGyAB4nGNgZgCD/80MRgxYAAAoRAG4AHiczViJX5RV978Pw8MMoMP6oLzigCwuaMmguFTSiEppvfpzxYXQLDVNpNcFUzMHExAHBHHXTMQFCc1McwHBETfMpbTSNjVfdxEmRb0P3oH7fi+PWe/vL3g/w+fcc88992z33HPPg0RcXYkkSR79+w4ZOid5fMpUIrkQiUSqXkTtLalxLmofndrS9auUp4PrPeUg6SevIEK8g1wifIJIm6AWcb6kg+A3EC8SQFqTcNKRRJOexEJeIwPJcJJI3iFTyL/Ih2QBySA5ZAVZTwpJMfmS7CcV5Dg5Q74nv5Br5A5xkCekQXKVPKVOUowUO2va5PioqChtMGtDtDZ00Yau2hCjDd20obs29NCGntrQWxvitKGPNvTVhn7aEN80mDV9Zk2fWdNn1vSZNX1mTZ9Z02fW9Jk1fWZNn1nTZ9b0mTV9Zk2fWdNn1vRFa/qiNX3Rmr5oTV+0pi86pk/KB3OmT5703syQ9u90CImGzk4hOK2QoSlTZ82cnDJtxvOj++sMCZEypcVSlrREsknZUo60VMqV8qRlUr60XFohrZRWSaulNdJaaZ20XvpU2iB9Jm2UCqRNUqG0WdoibZW2SUXSdqlY+lwqkXaQduKIQ8nbpEryl+aC9K1U5xLh0s3lNV17XaNrlWudLLstdO/uGdvsnWaXm+/z8vYa4vXEe5D3bh8Xn0yfAp+dPqU+532e+Mb71vjZ/Lf6n7aVq/3KpfLy+r3luvKApy3V4saWbuXO2Yrar36vs5/eWJAqqWH0c4VV0C02Z7asWulchR5jVpu6RnaOYCcU9pAtrd9nY3/QvFEJsjNcDVfUUHZLDae3ZOMTOliNVSYXpezcWVS0c2dK0eTJKSmTTW/TQKV+mHNpwzC3RLVUyXY66vfYbKpDbkhwDlKyhnOXsd3tnDdOIzZOPsu1cv5KlYWTQy7A+nQHCNVZOC8bTThJvGqVjWU1ddUOh0THPKhRw3VqO9pW6aCG1OidoTRR6aiGVuud4cBs7dTwLJtDdt5zhigdHDX6CBAjHA/07eg4xdbmQZbtsWzcQiNLaeRhGinRVBpxnLbFn66+uXpBCfFg4wJY2wCMDwJYJI2gkXq6jiWJhYegHmej/kT/YmDt6CgFeLsmPOAZJuJaU62rUe8rzvvV6n09dbJKhdayina0wkEr5YZwdkihKjvWjtod1C43HUQCBc8frLIDrawBrSFU8DxhJ9rRSget0Hgy1XtKHbOH4cAegtYQQu2Kg1V0ZHb6Bz3UxFP/VZ0OOpUHzC7ItRCVAC7qwuyMgPAIfGX0hOKsrVNrm0ylh7GuhjO7Tb0vawTsz3HeV0OFbTTqJHU5Qr1PSvTT4wIznNKpRtVbGU67HtEnHFaGs65H3FiPq8rVb07/9NM3b3TvPnBobOyAo1dNgwOYfLMrdTFxErpHnHbI13ZO3I047aB0KydeDzB1mwPMJQK0rqeRFtnVmBrOIA2eOEBr259wvv8+cmHCMYDII0iNg3XABg3BXqkBQH8QLFemCaFnIeCQhNVX52Da/iWIiugDEDgSwHzcAhNephYDlc33mAtzMXdisgkOHqVuzx3c8Xfv2NQZytXT8OoUvPrnoNjYN05qXt34u1dt/le8imryKvqZV+W04rlL9CJV/zqfN/vHxr55VvPk+t89Cf1f8aRzkyddmjwpSKWJNElCzUnUqW3VtgpLYkk0kSVS7ZcEbLQbS8xBribRkRIdrYYqbKRaS0fqjfWz8xXOi9q8z0nfI+9y0mVoMiep27Zx8i9be86/vJsKA6NhIFsBs3SjYb5zDTD9DJhavxBu1sTAh/Y9waI2B/bqZWD2Q1jg94hhcBbzoD7r3pvy3t3wrEEyJGRh+UCJcCcOstS9kPVCV8h6UmA1OLvVuyqcDPTHyqFvQNxHAJaMxZYd1WCMvyi2nAPmOhU0ulWcRgBUqdkIl9t8SPX9BiyXToJFfgjsuzARTBFCdAaGs7ZrL5aU7J7L3Khv5kEZrszG8mvDIOFiuTiJNyH1wmnIch9rNfR1zlHGvKWICP68cgFO4rEFYWnlYd81l/agL9i+vPhVYep4yxQb5+O+fp314MQ44MCU5OSUDfL8ngzxh4Iv9kCYFAIFd5dBQbuLIohlAD3drQbjE068p4L81qyjnN9qPd/B+bbXKkUA0jjpv7mcCsd5BSexxvlw48Fx2ozzNRMnInjRiG/jmkxO0i889OXkj8udwVXqwvnj974tS+RkaBcofumXHzjJCMjkPKPiICfjNoPWc85U6s0Mt1Pq/Fws9KA6AMf/8EMseJxBrB/VAmve5U8gaMTTB6B55jPAH4sFQeMPz9hNTVAjNm0WsoL9DHD49GXMPtRbIN8xAJuN4+DNg53AvBvIMyBoxDgEAr2/FmAvRD0oeEbjDh0xNUGN2LSZO96A/JAQTmJCMUsYYIf8ex7Y7CtMqBW3r8VEiwBWjUZ8/IEpj+0a4DXCJ0Hjd9ZaTQI+IzZtFrKC/awGTtZdF1f1Ryvk35oMMUqFWP0Nxv1jeRN4RiNKOKaBqyA1cDW23OstaGGQd3OqiM/NZKIRsRnLt96zB/tZXDgpDMKO+J+sSkrBrC1bCjYVFaVumm6anjorJdjPWzpNX1L8vF2TC2dsN2G6vXBzMciuxTM3TzNNmzkjObgPNSt+rq5Tij5Ad7Ftx46UbeguPphi8pO8OR9lFHndSsT+12ioMXWE+ms3QAy/an8GBI2YggTtrEUD/NoPTTQw/xpiMTVBjcivXbc2yQo2PkkpKi4pKinmpIdHLy4NmxeGqjH3iETPHKSjdx0o1akH1MFKTlr2oryFeQuXpi/PyFucn5Wbtyx/yfIlK5aszMrPWIHf0k+WGRblLVqdvuiThcutOQsMzIoeBWmz4HVOuokzrxqmctIaacJ/6yiOrFCEsBbg8X1RJjNgdMsPRM7agAVsF1k4DnwtXEUB3gjaP4bYUTBNcaJsBiwWpSNKHFIM1pt/i3W/jcA87FBQvxgLfRpAM14SquJEfLgIjSewzqIid5t9DWJiPhproK49boaH9zAzVxMNcUYpn2xM37x547Lly2cvmzFjdvonpvmXlPepd4memU4CaQ9kCt2KujbcBGGxFgjrK5LznwJrAoLGy9bCtc+vWUwIwqVR8Oa3wzD54jpgd+wAN9aD6dEVccWuQY7rz8DODBPX4nVspOKQalpi+jgNwBEIFtkh6s5AuM/vx+H54rWiLNdPB3BIIki+IvNFLTbsFdVvKbAur2P3wxPigoou8+5CxKTVS+C7NB8skQNFRNvdJqhdQfJE5BebeQO7HCcJ/CsuA8uHL4m7uAB7b16HqGIrsEpR8XwSgN1OBzZiAbb06ges5WtguVwKMKIvVjOP21EzF7pBzPg+uHhkurA1KRkSH50DceckGHJ2H6bxjRDxf6cAevbE1NwGfKWb/4svJwerm/KBeZohe8garHauF5kDzXxXN2AnTgCcfxELcYEWPE5bhmKLT6goKdVmmNd6HOYlbwHMGW8RJluEQ1A1TORixgZxNNfAF7IFYMwEAEs5ZNcWC9fmEXwBqCPUWoW596W9WC+KH/P6geYvzmS2AVSP6jUVYkYsh/ztAGJ6jjZfyvJYjo26fwdCeywVcSyNvCQAscpUjmdZ2Ytp7gXWHNvet2uAJ6yAgUUrLPFMzqZZ0FyvV6fBj429xQH2FKc/vARmff4uTpDfEh8Pb4u7//FTGGxtC+lz3IAt+Bka22zDwrhJmA5fD495vhVbRgRC0PgK6GtdA+LHaQAfVYEn7WPQ0ntgSxJW+e8iqTjCTopFwUzwBAtfQRDdgM2YfybyeZG4bmlboWrebEhdNFoUY9FarBMlqvhbYS0X9bV4CFYK8Hzz26es1J/6yMaVB+iM/XT6fklNPqKjdervSBMvESJ1k6izaBP4dfGmeiniVqAHIEEDIfmPf4M2ao54zsQr8hT28kspVgOLnzB2N7PgMLj46Pp3T4CrInuvqgCb0L0Rj3PEkJMEB2IfYZH9ArN7LxJ154p4UjIwfSVeFA0VCo9+iQ19ZoKmF/ltES+FwZMYsg4gsU98AaUsCWyV0bDLPQ9ACsbWF33Q01lK9r9P42GIU1Spbl9AxrAt4K0WGdY6EjT3D0DzFh2NLNqt+3fFQmcsNHsEzF08PlUdxIEtwGr5HlHrRgC7FSaqS0dxr0VfFHgOQusqISrAD7T0VEydJtGNUNPJIvwktQsN1fn/rsaoHkobDxbO4sQQehNwMP1OEa2lMzxXjmJXlAkTdrvVB59X2jRMfKxHPyMlv4wm8uXGwwi7fBmYKKKteEwTJnFpz6N5nCzVrdJxl7iOFrBL4rJxUQQFK/+XE3aRngKIunxMEtcy5zsEatcpixLqwUlua9CLqrRJr4eENx6zo/jwmEWQcfwjwqU8V3u2zBtbILUa6xeR/28jHX3pv0lqIY1TjowJY67D7PI4mgU8NGx0mUzjdilHE8LCRlTILItWK7QiCxkhWtB1h6ErqoMoHr1JWMSY8g4dcONsu3aXSPXHdujqP/tR2T1hgluD0FAPDU6hYfiYOuZaaZf3QcPwMY/CDpXJDBqGJtSF2StkKjQwaCBJQq7QwL8VuqChLqKsvAYabDTPVzXQPOZ92q9AXYzUZ91O0256Pzsbxm4oNpZH87LBJDtfoQ6lJicHjf8Rm42OLs2inVh7m3NEhC2HVjpDbTZWGWaTjcW7indu3bmS2tmO3XtoUnmZL+1GTfiQiPS7bqV38DFtG0Orlthg6XFnkWKbJCa7ZHbyjGKbLPCdMquqeo77VVtZ1XeKbYKY7padVniaw+yyX52VmsS/HvxuW9XwLDHvQCOpXd+wsEYx0lIaKn11S/cV1DkrbqkV+v0sVQnzMNJDWKCtkIRicgCT+ruqmxKOyZeYPB2MADgrorBhLDaA7NhPT5ZKdFSFml2qo9lqgqJms5PObLeR9IniDFVr1VC9scyuhldIdNkBtf0+Ha2gR/Dpf/MmdaWuN81N37x415mr+Sa++pKWKCyYujCZBuHnQmUaTIMZRhaEH+gs2GS0FUt0TLGSrNYU651Hv1fGjT+zeOUqefou1KUXRMVzTEeKk86HLqCb6OfOSaeR55Dsqf05GRL/Oz78ztcaVqxiL9DIhVbkujH9DueHr1XgFfE6znnFxHC88kHfIxlaXUFTWjsFt/rVIEiUyFwrlzrdFi/mlV+I+MoRNUEUFt9AYCcSQQt+2W5gh9gGfPlF7NJRy2klArfGfEH0PZ6is72/ExaeOY15zAgAryGiUId0ALr3krhVZ6YhGTNE+94RN5OfX4OVueJT4MWfwCm5f27n0o1mkNS4rZuVN5aKz4fU2djziYzbPQoPtNTPB37xe32COOl+ajbnP/+ahEaiDKl9fPIJNGmp/Q1/t86l9ae4w82eoLcggYmiN9kh2rs3raLWioLZC9r9Y9Ch87jzIH4RKyJwW1Rr9TgU39sD56tzARqSxXSk4HwcD+OWpkNm429vgjM9SnQXwb9i/7jhEBplFdjv4G+gED91vQWxvokPAJLeAmCOHr7nZWB5xfsQbEhEVeKrqkQz1fRq+YvLuh9g01yAH8PE7g1tEP/CYhhHwtfWoZPSDcW7EbMJpT3lbc5/8JoK7Ho2Hr6WhSjjv3VH87e0ECeSH4egRB3ifM+FTINxs3pQ/Csu8Bd6T6cOUHG7nAfovWybekB2VgQ4D9JA9aDe+PQj/6deiq2ZB0302J9bV3a4rFkzWuV5hL5yrVnzINLGj7iJ/566E18STeaRY9JIFknb0ki9p20QDc2ynZQ9/6zCjfbnVdj+vAoT2ZPmsvE26g939uO14/e3Iy4XRLfQ711g0fiiaDxYh+ngFkiJCAPCskbkamY8KvQofJnzx7vtBtpS78n+FMRfP2jRBPEX2j4TxM/ii6NJEP/ijkUTRCattGiCpG0L/yYoP2Plkrz8Zfnp+YuXp69Ny81ct3hNzvK81Z/uLly7es+ygsz1aRsNaRsnZS8qSCsp2bxoB043BS42CxRClgHzvGX9GB/HjqfJeJd9niLX5OVInlq3rLkZk+fNWYMjche94z3/STgT0VnK1WvXfmhYPTd3fsbshVNSrfOT02Z9/HHuzNxZ69I2zDd4/ge3HruHAHicY2BkYGDgAWIxBjkGJgZGIFQDYhagCBMQM0IwAAscAHUAAAAAAAEAAAAA1BlXPwAAAADUeVgIAAAAANSjisx4nGN+wWDE/IIhkfkZQwqQPg7ED4A4CYgnAvFRIE5gfsGoDcUcCMxwAoiPAfFJoN4PzM8YLYD0TCA+AcRAfYyRQLoTiuvBGKieYQGDOkM7QzNDCsNRhr9AfgsQPgIALOsuRwAA) format('woff'); font-weight:normal; font-style:normal;}
@media print {
#FDFXFA_Menu,#FDFXFA_Menu a,#FDFXFA_Menu label,#FDFXFA_Menu button{display:none}
#formviewer{overflow: visible}
div.page{box-shadow: none;}
}
</style>
</head>
<body style="margin: 0;" onload='idrform.init()'>

<div id='FDFXFA_Processing'>&#xF010;</div>
<div id='FDFXFA_FormType'>AcroForm</div>
<div id='FDFXFA_PDFName'>f940.pdf</div>
<div id='FDFXFA_Menu'><a title='Submit Form' onclick="FormViewer.handleFormSubmission('', 'formdata')">&#xF018;</a><a title='Go To FirstPage' onclick="idrform.app.execMenuItem('FirstPage')">&#xF01C;</a><a title='Go To PrevPage' onclick="idrform.app.execMenuItem('PrevPage')">&#xF01D;</a><label id='FDFXFA_PageLabel'><span id="btnPage">1</span></label><label id='FDFXFA_PageCount'>/ <span>6</span></label><a title='Go To NextPage' onclick="idrform.app.execMenuItem('NextPage')">&#xF01E;</a><a title='Go To LastPage' onclick="idrform.app.execMenuItem('LastPage')">&#xF01F;</a><a title='Save As Editable PDF' onclick="idrform.app.execMenuItem('SaveAs')">&#xF01A;</a><button id="btnZoomOut" title="Zoom Out" class="btn"><i class="fa fa-minus fa-lg" aria-hidden="true"></i></button><button id="btnZoomIn" title="Zoom In" class="btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></button></div>
<div id="formviewer">
<div></div>
<div id="overlay"></div>
<form>
<div id="contentContainer"  style="background: white;">
<div id="page1" style="width: 934px; height: 1209px; margin-top:20px;     margin-left: 600px;" class="page">
<div class="page-inner" style="width: 934px; height: 1209px;">

<div id="p1" class="pageArea" style="overflow: hidden; position: relative; width: 934px; height: 1209px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">



<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
stroke-width: 1.222;
stroke-miterlimit: 10;
}
.g4_1{
fill: none;
stroke: #000;
stroke-width: 1.145;
stroke-miterlimit: 10;
}
.g5_1{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M55,357.5H605V91.7H55V357.5ZM253,100.8H238.7M253,128.3H238.7m22,-5.5V106.3M231,122.8V106.3" class="g0_1"/>
<path d="M231,106.3v22.4m-.4,-.4H253m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H238.7m14.3,0H230.6m.4,-.3v22.3" class="g1_1"/>
<path d="M294.5,100.8H280.2m14.3,27.5H280.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M272.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H280.2m14.3,0H272.1m.4,-.3v22.3" class="g1_1"/>
<path d="M353.3,100.8H339m14.3,27.5H339m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M331.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H339m14.3,0H330.9m.4,-.3v22.3" class="g1_1"/>
<path d="M391.9,100.8H377.6m14.3,27.5H377.6m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M369.9,106.3v22.4m-.3,-.4h22.3m-14.3,0H400m-.4,.4V106.3m0,16.5V100.5m.4,.3H377.6m14.3,0H369.6m.3,-.3v22.3" class="g1_1"/>
<path d="M430.8,100.8H416.5m14.3,27.5H416.5m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M408.8,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H416.5m14.3,0H408.4m.4,-.3v22.3" class="g1_1"/>
<path d="M469.6,100.8H455.3m14.3,27.5H455.3m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M447.6,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H455.3m14.3,0H447.2m.4,-.3v22.3" class="g1_1"/>
<path d="M508.5,100.8H494.2m14.3,27.5H494.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M486.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H494.2m14.3,0H486.1m.4,-.3v22.3" class="g1_1"/>
<path d="M547.2,100.8H532.9m14.3,27.5H532.9m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M525.2,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H532.9m14.3,0H524.8m.4,-.3v22.3" class="g1_1"/>
<path d="M586.3,100.8H572m14.3,27.5H572m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M564.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H572m14.3,0H563.9m.4,-.3v22.3" class="g1_1"/>
<path d="M209,165H594V137.5H209V165Zm-33,36.7H594V174.2H176v27.5Zm-55,36.6H594V210.8H121v27.5Zm0,55H407V265.8H121v27.5Zm297,0h55V265.8H418v27.5Zm66,0H594V265.8H484v27.5ZM121,337.6H319V311.7H121v25.9Zm209,0H473V311.7H330v25.9Zm154,0H594V311.7H484v25.9ZM660,91.7H847M660,293.3H847M869,113.7V271.3M638,113.7V271.3" class="g0_1"/>
<path d="M638,271.3v22.4m-.4,-.4H660m187,0h22.4m-.4,.4V271.3m0,-157.6V91.3m.4,.4H847m-187,0H637.6m.4,-.4v22.4" class="g1_1"/>
<path d="M649,145H858V108.3H649V145Z" class="g2_1"/>
<path d="M650.8,165.7h15.3V150.4H650.8v15.3Zm0,27.5h15.3V177.9H650.8v15.3Zm0,27.5h15.3V205.4H650.8v15.3Zm0,27.5h15.3V232.9H650.8v15.3Z" class="g0_1"/>
<path d="M55,403.3h55V385H55v18.3Z" class="g2_1"/>
<path d="M54.6,385h55.8" class="g3_1"/>
<path d="M54.6,403.3h55.8" class="g0_1"/>
<path d="M54.6,385H880.4" class="g3_1"/>
<path d="M54.6,403.3H880.4M693,440h33V412.5H693V440Zm55,0h33V412.5H748V440Zm-54.4,34.4h15.3V459.1H693.6v15.3Zm0,28.2h15.3V487.4H693.6v15.2Z" class="g0_1"/>
<path d="M55,531.7h55V513.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,513.3h55.8" class="g3_1"/>
<path d="M54.6,531.7h55.8" class="g0_1"/>
<path d="M54.6,513.3H880.4" class="g3_1"/>
<path d="M54.6,531.7H880.4m-187.8,9.1H836.4M692.6,568.3H836.4M693,540.4v28.3M835.6,540.8h44.8m-44.8,27.5h44.8M880,540.4v28.3m-407.4,-.4H616.4M472.6,595.8H616.4M473,567.9v28.3M615.6,568.3h44.8m-44.8,27.5h44.8M660,567.9v28.3M242,621.8h15.3V606.5H242v15.3Zm0,18.3h15.3V624.9H242v15.2ZM473,621.8h15.3V606.5H473v15.3Zm0,18.3h15.3V624.9H473v15.2ZM660,621.8h15.3V606.5H660v15.3Zm-187.4,29H616.4M472.6,678.3H616.4M473,650.4v28.3M615.6,650.8h44.8m-44.8,27.5h44.8M660,650.4v28.3m32.6,-.4H836.4M692.6,705.8H836.4M693,677.9v28.3M835.6,678.3h44.8m-44.8,27.5h44.8M880,677.9v28.3M692.6,715H836.4M692.6,742.5H836.4M693,714.6v28.3M835.6,715h44.8m-44.8,27.5h44.8M880,714.6v28.3m-187.4,8.8H836.4M692.6,779.2H836.4M693,751.3v28.3M835.6,751.7h44.8m-44.8,27.5h44.8M880,751.3v28.3" class="g0_1"/>
<path d="M55,806.7h55V788.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,788.3h55.8" class="g3_1"/>
<path d="M54.6,806.7h55.8" class="g0_1"/>
<path d="M54.6,788.3H880.4" class="g4_1"/>
<path d="M54.6,806.7H880.4m-187.8,9.1H836.4M692.6,843.3H836.4M693,815.4v28.3M835.6,815.8h44.8m-44.8,27.5h44.8M880,815.4v28.3m-187.4,18H836.4M692.6,889.2H836.4M693,861.3v28.3M835.6,861.7h44.8m-44.8,27.5h44.8M880,861.3v28.3M692.6,895H836.4M692.6,922.5H836.4M693,894.6v28.2M835.6,895h44.8m-44.8,27.5h44.8M880,894.6v28.2" class="g0_1"/>
<path d="M55,944.2h55V925.8H55v18.4Z" class="g2_1"/>
<path d="M54.6,925.8h55.8" class="g3_1"/>
<path d="M54.6,944.2h55.8" class="g0_1"/>
<path d="M109.6,925.8H880.4" class="g4_1"/>
<path d="M109.6,944.2H880.4M692.6,950H836.4M692.6,977.5H836.4M693,949.6v28.2M835.6,950h44.8m-44.8,27.5h44.8M880,949.6v28.2m-187.4,8.8H836.4m-143.8,27.5H836.4M693,986.2v28.3M835.6,986.6h44.8m-44.8,27.5h44.8M880,986.2v28.3M692.6,1045H836.4m-143.8,27.5H836.4M693,1044.6v28.3M835.6,1045h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-187.4,8.8H836.4m-143.8,27.5H836.4M693,1081.3v28.3m142.6,-27.9h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-271.9,23.2h15.2v-15.2H608.1v15.2Zm143,-.7h15.2v-15.3H751.1v15.3Z" class="g0_1"/>
<path d="M54.6,1155H594.4m-.8,0H792.4m-.8,0h88.8" class="g5_1"/>
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

 
 
 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
stroke-width: 1.222;
stroke-miterlimit: 10;
}
.g4_1{
fill: none;
stroke: #000;
stroke-width: 1.145;
stroke-miterlimit: 10;
}
.g5_1{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M55,357.5H605V91.7H55V357.5ZM253,100.8H238.7M253,128.3H238.7m22,-5.5V106.3M231,122.8V106.3" class="g0_1"/>
<path d="M231,106.3v22.4m-.4,-.4H253m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H238.7m14.3,0H230.6m.4,-.3v22.3" class="g1_1"/>
<path d="M294.5,100.8H280.2m14.3,27.5H280.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M272.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H280.2m14.3,0H272.1m.4,-.3v22.3" class="g1_1"/>
<path d="M353.3,100.8H339m14.3,27.5H339m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M331.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H339m14.3,0H330.9m.4,-.3v22.3" class="g1_1"/>
<path d="M391.9,100.8H377.6m14.3,27.5H377.6m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M369.9,106.3v22.4m-.3,-.4h22.3m-14.3,0H400m-.4,.4V106.3m0,16.5V100.5m.4,.3H377.6m14.3,0H369.6m.3,-.3v22.3" class="g1_1"/>
<path d="M430.8,100.8H416.5m14.3,27.5H416.5m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M408.8,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H416.5m14.3,0H408.4m.4,-.3v22.3" class="g1_1"/>
<path d="M469.6,100.8H455.3m14.3,27.5H455.3m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M447.6,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H455.3m14.3,0H447.2m.4,-.3v22.3" class="g1_1"/>
<path d="M508.5,100.8H494.2m14.3,27.5H494.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M486.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H494.2m14.3,0H486.1m.4,-.3v22.3" class="g1_1"/>
<path d="M547.2,100.8H532.9m14.3,27.5H532.9m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M525.2,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H532.9m14.3,0H524.8m.4,-.3v22.3" class="g1_1"/>
<path d="M586.3,100.8H572m14.3,27.5H572m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M564.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H572m14.3,0H563.9m.4,-.3v22.3" class="g1_1"/>
<path d="M209,165H594V137.5H209V165Zm-33,36.7H594V174.2H176v27.5Zm-55,36.6H594V210.8H121v27.5Zm0,55H407V265.8H121v27.5Zm297,0h55V265.8H418v27.5Zm66,0H594V265.8H484v27.5ZM121,337.6H319V311.7H121v25.9Zm209,0H473V311.7H330v25.9Zm154,0H594V311.7H484v25.9ZM660,91.7H847M660,293.3H847M869,113.7V271.3M638,113.7V271.3" class="g0_1"/>
<path d="M638,271.3v22.4m-.4,-.4H660m187,0h22.4m-.4,.4V271.3m0,-157.6V91.3m.4,.4H847m-187,0H637.6m.4,-.4v22.4" class="g1_1"/>
<path d="M649,145H858V108.3H649V145Z" class="g2_1"/>
<path d="M650.8,165.7h15.3V150.4H650.8v15.3Zm0,27.5h15.3V177.9H650.8v15.3Zm0,27.5h15.3V205.4H650.8v15.3Zm0,27.5h15.3V232.9H650.8v15.3Z" class="g0_1"/>
<path d="M55,403.3h55V385H55v18.3Z" class="g2_1"/>
<path d="M54.6,385h55.8" class="g3_1"/>
<path d="M54.6,403.3h55.8" class="g0_1"/>
<path d="M54.6,385H880.4" class="g3_1"/>
<path d="M54.6,403.3H880.4M693,440h33V412.5H693V440Zm55,0h33V412.5H748V440Zm-54.4,34.4h15.3V459.1H693.6v15.3Zm0,28.2h15.3V487.4H693.6v15.2Z" class="g0_1"/>
<path d="M55,531.7h55V513.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,513.3h55.8" class="g3_1"/>
<path d="M54.6,531.7h55.8" class="g0_1"/>
<path d="M54.6,513.3H880.4" class="g3_1"/>
<path d="M54.6,531.7H880.4m-187.8,9.1H836.4M692.6,568.3H836.4M693,540.4v28.3M835.6,540.8h44.8m-44.8,27.5h44.8M880,540.4v28.3m-407.4,-.4H616.4M472.6,595.8H616.4M473,567.9v28.3M615.6,568.3h44.8m-44.8,27.5h44.8M660,567.9v28.3M242,621.8h15.3V606.5H242v15.3Zm0,18.3h15.3V624.9H242v15.2ZM473,621.8h15.3V606.5H473v15.3Zm0,18.3h15.3V624.9H473v15.2ZM660,621.8h15.3V606.5H660v15.3Zm-187.4,29H616.4M472.6,678.3H616.4M473,650.4v28.3M615.6,650.8h44.8m-44.8,27.5h44.8M660,650.4v28.3m32.6,-.4H836.4M692.6,705.8H836.4M693,677.9v28.3M835.6,678.3h44.8m-44.8,27.5h44.8M880,677.9v28.3M692.6,715H836.4M692.6,742.5H836.4M693,714.6v28.3M835.6,715h44.8m-44.8,27.5h44.8M880,714.6v28.3m-187.4,8.8H836.4M692.6,779.2H836.4M693,751.3v28.3M835.6,751.7h44.8m-44.8,27.5h44.8M880,751.3v28.3" class="g0_1"/>
<path d="M55,806.7h55V788.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,788.3h55.8" class="g3_1"/>
<path d="M54.6,806.7h55.8" class="g0_1"/>
<path d="M54.6,788.3H880.4" class="g4_1"/>
<path d="M54.6,806.7H880.4m-187.8,9.1H836.4M692.6,843.3H836.4M693,815.4v28.3M835.6,815.8h44.8m-44.8,27.5h44.8M880,815.4v28.3m-187.4,18H836.4M692.6,889.2H836.4M693,861.3v28.3M835.6,861.7h44.8m-44.8,27.5h44.8M880,861.3v28.3M692.6,895H836.4M692.6,922.5H836.4M693,894.6v28.2M835.6,895h44.8m-44.8,27.5h44.8M880,894.6v28.2" class="g0_1"/>
<path d="M55,944.2h55V925.8H55v18.4Z" class="g2_1"/>
<path d="M54.6,925.8h55.8" class="g3_1"/>
<path d="M54.6,944.2h55.8" class="g0_1"/>
<path d="M109.6,925.8H880.4" class="g4_1"/>
<path d="M109.6,944.2H880.4M692.6,950H836.4M692.6,977.5H836.4M693,949.6v28.2M835.6,950h44.8m-44.8,27.5h44.8M880,949.6v28.2m-187.4,8.8H836.4m-143.8,27.5H836.4M693,986.2v28.3M835.6,986.6h44.8m-44.8,27.5h44.8M880,986.2v28.3M692.6,1045H836.4m-143.8,27.5H836.4M693,1044.6v28.3M835.6,1045h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-187.4,8.8H836.4m-143.8,27.5H836.4M693,1081.3v28.3m142.6,-27.9h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-271.9,23.2h15.2v-15.2H608.1v15.2Zm143,-.7h15.2v-15.3H751.1v15.3Z" class="g0_1"/>
<path d="M54.6,1155H594.4m-.8,0H792.4m-.8,0h88.8" class="g5_1"/>
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
 

<!-- Begin inline CSS -->
<style type="text/css" >

#t1_1{left:55px;bottom:1129px;letter-spacing:-0.14px;}
#t2_1{left:86px;bottom:1122px;letter-spacing:-0.21px;}
#t3_1{left:253px;bottom:1127px;letter-spacing:0.19px;}
#t4_1{left:253px;bottom:1118px;letter-spacing:-0.14px;}
#t5_1{left:814px;bottom:1134px;letter-spacing:0.2px;}
#t6_1{left:781px;bottom:1118px;letter-spacing:-0.17px;}
#t7_1{left:66px;bottom:1092px;letter-spacing:-0.15px;}
#t8_1{left:66px;bottom:1079px;letter-spacing:-0.12px;}
#t9_1{left:312px;bottom:1086px;}
#ta_1{left:66px;bottom:1045px;letter-spacing:-0.17px;}
#tb_1{left:99px;bottom:1045px;letter-spacing:-0.14px;}
#tc_1{left:66px;bottom:1009px;letter-spacing:-0.16px;}
#td_1{left:130px;bottom:1009px;letter-spacing:-0.11px;}
#te_1{left:66px;bottom:970px;letter-spacing:-0.17px;}
#tf_1{left:123px;bottom:955px;letter-spacing:0.09px;}
#tg_1{left:224px;bottom:955px;letter-spacing:0.06px;}
#th_1{left:491px;bottom:955px;letter-spacing:0.08px;}
#ti_1{left:123px;bottom:900px;letter-spacing:0.07px;}
#tj_1{left:435px;bottom:900px;letter-spacing:0.08px;}
#tk_1{left:520px;bottom:900px;letter-spacing:0.08px;}
#tl_1{left:123px;bottom:856px;letter-spacing:0.08px;}
#tm_1{left:332px;bottom:856px;letter-spacing:0.08px;}
#tn_1{left:486px;bottom:856px;letter-spacing:0.08px;}
#to_1{left:655px;bottom:1080px;letter-spacing:-0.12px;}
#tp_1{left:655px;bottom:1066px;letter-spacing:-0.14px;}
#tq_1{left:671px;bottom:1040px;letter-spacing:0.09px;}
#tr_1{left:685px;bottom:1040px;letter-spacing:0.14px;}
#ts_1{left:671px;bottom:1012px;letter-spacing:0.1px;}
#tt_1{left:685px;bottom:1012px;letter-spacing:0.11px;}
#tu_1{left:671px;bottom:989px;letter-spacing:0.09px;}
#tv_1{left:685px;bottom:989px;letter-spacing:0.11px;}
#tw_1{left:686px;bottom:977px;letter-spacing:0.12px;}
#tx_1{left:671px;bottom:962px;letter-spacing:0.1px;}
#ty_1{left:685px;bottom:962px;letter-spacing:0.1px;}
#tz_1{left:686px;bottom:950px;letter-spacing:0.11px;}
#t10_1{left:649px;bottom:930px;letter-spacing:0.09px;}
#t11_1{left:683px;bottom:930px;letter-spacing:0.11px;}
#t12_1{left:807px;bottom:930px;letter-spacing:0.07px;}
#t13_1{left:649px;bottom:918px;letter-spacing:0.1px;}
#t14_1{left:55px;bottom:823px;letter-spacing:-0.01px;}
#t15_1{left:60px;bottom:804px;letter-spacing:-0.1px;}
#t16_1{left:121px;bottom:804px;letter-spacing:-0.12px;}
#t17_1{left:70px;bottom:767px;letter-spacing:-0.01px;}
#t18_1{left:99px;bottom:767px;letter-spacing:-0.01px;}
#t19_1{left:642px;bottom:767px;}
#t1a_1{left:671px;bottom:767px;letter-spacing:-0.01px;}
#t1b_1{left:70px;bottom:746px;letter-spacing:-0.01px;}
#t1c_1{left:99px;bottom:746px;letter-spacing:-0.01px;word-spacing:1.73px;}
#t1d_1{left:99px;bottom:730px;letter-spacing:-0.01px;}
#t1e_1{left:165px;bottom:730px;}
#t1f_1{left:183px;bottom:730px;}
#t1g_1{left:202px;bottom:730px;}
#t1h_1{left:220px;bottom:730px;}
#t1i_1{left:238px;bottom:730px;}
#t1j_1{left:257px;bottom:730px;}
#t1k_1{left:275px;bottom:730px;}
#t1l_1{left:293px;bottom:730px;}
#t1m_1{left:312px;bottom:730px;}
#t1n_1{left:330px;bottom:730px;}
#t1o_1{left:348px;bottom:730px;}
#t1p_1{left:367px;bottom:730px;}
#t1q_1{left:385px;bottom:730px;}
#t1r_1{left:403px;bottom:730px;}
#t1s_1{left:422px;bottom:730px;}
#t1t_1{left:440px;bottom:730px;}
#t1u_1{left:458px;bottom:730px;}
#t1v_1{left:477px;bottom:730px;}
#t1w_1{left:495px;bottom:730px;}
#t1x_1{left:513px;bottom:730px;}
#t1y_1{left:532px;bottom:730px;}
#t1z_1{left:550px;bottom:730px;}
#t20_1{left:568px;bottom:730px;}
#t21_1{left:587px;bottom:730px;}
#t22_1{left:605px;bottom:730px;}
#t23_1{left:623px;bottom:730px;}
#t24_1{left:642px;bottom:730px;}
#t25_1{left:671px;bottom:730px;letter-spacing:-0.01px;}
#t26_1{left:715px;bottom:743px;letter-spacing:0.1px;}
#t27_1{left:715px;bottom:730px;letter-spacing:0.11px;}
#t28_1{left:70px;bottom:703px;}
#t29_1{left:99px;bottom:703px;letter-spacing:-0.01px;}
#t2a_1{left:513px;bottom:703px;}
#t2b_1{left:532px;bottom:703px;}
#t2c_1{left:550px;bottom:703px;}
#t2d_1{left:568px;bottom:703px;}
#t2e_1{left:587px;bottom:703px;}
#t2f_1{left:605px;bottom:703px;}
#t2g_1{left:623px;bottom:703px;}
#t2h_1{left:642px;bottom:703px;}
#t2i_1{left:671px;bottom:703px;}
#t2j_1{left:715px;bottom:707px;letter-spacing:0.11px;}
#t2k_1{left:715px;bottom:694px;letter-spacing:0.11px;}
#t2l_1{left:60px;bottom:676px;letter-spacing:-0.1px;}
#t2m_1{left:121px;bottom:675px;letter-spacing:-0.12px;}
#t2n_1{left:70px;bottom:639px;}
#t2o_1{left:99px;bottom:639px;letter-spacing:-0.01px;}
#t2p_1{left:312px;bottom:639px;}
#t2q_1{left:330px;bottom:639px;}
#t2r_1{left:348px;bottom:639px;}
#t2s_1{left:367px;bottom:639px;}
#t2t_1{left:385px;bottom:639px;}
#t2u_1{left:403px;bottom:639px;}
#t2v_1{left:422px;bottom:639px;}
#t2w_1{left:440px;bottom:639px;}
#t2x_1{left:458px;bottom:639px;}
#t2y_1{left:477px;bottom:639px;}
#t2z_1{left:495px;bottom:639px;}
#t30_1{left:513px;bottom:639px;}
#t31_1{left:532px;bottom:639px;}
#t32_1{left:550px;bottom:639px;}
#t33_1{left:568px;bottom:639px;}
#t34_1{left:587px;bottom:639px;}
#t35_1{left:605px;bottom:639px;}
#t36_1{left:623px;bottom:639px;}
#t37_1{left:642px;bottom:639px;}
#t38_1{left:675px;bottom:639px;}
#t39_1{left:836px;bottom:635px;}
#t3a_1{left:70px;bottom:611px;}
#t3b_1{left:99px;bottom:611px;letter-spacing:-0.01px;}
#t3c_1{left:312px;bottom:611px;}
#t3d_1{left:330px;bottom:611px;}
#t3e_1{left:348px;bottom:611px;}
#t3f_1{left:367px;bottom:611px;}
#t3g_1{left:385px;bottom:611px;}
#t3h_1{left:403px;bottom:611px;}
#t3i_1{left:422px;bottom:611px;}
#t3j_1{left:455px;bottom:611px;}
#t3k_1{left:616px;bottom:607px;}
#t3l_1{left:99px;bottom:584px;letter-spacing:-0.01px;}
#t3m_1{left:220px;bottom:584px;letter-spacing:-0.01px;}
#t3n_1{left:265px;bottom:584px;letter-spacing:-0.01px;}
#t3o_1{left:220px;bottom:565px;letter-spacing:-0.01px;}
#t3p_1{left:265px;bottom:565px;letter-spacing:-0.01px;}
#t3q_1{left:451px;bottom:584px;letter-spacing:-0.01px;}
#t3r_1{left:494px;bottom:584px;letter-spacing:-0.01px;}
#t3s_1{left:451px;bottom:565px;letter-spacing:-0.01px;}
#t3t_1{left:494px;bottom:565px;letter-spacing:-0.01px;}
#t3u_1{left:638px;bottom:584px;letter-spacing:-0.01px;}
#t3v_1{left:680px;bottom:584px;letter-spacing:-0.01px;}
#t3w_1{left:70px;bottom:544px;}
#t3x_1{left:99px;bottom:544px;letter-spacing:-0.01px;word-spacing:0.06px;}
#t3y_1{left:99px;bottom:529px;letter-spacing:-0.01px;}
#t3z_1{left:147px;bottom:529px;}
#t40_1{left:165px;bottom:529px;}
#t41_1{left:183px;bottom:529px;}
#t42_1{left:202px;bottom:529px;}
#t43_1{left:220px;bottom:529px;}
#t44_1{left:238px;bottom:529px;}
#t45_1{left:257px;bottom:529px;}
#t46_1{left:275px;bottom:529px;}
#t47_1{left:293px;bottom:529px;}
#t48_1{left:312px;bottom:529px;}
#t49_1{left:330px;bottom:529px;}
#t4a_1{left:348px;bottom:529px;}
#t4b_1{left:367px;bottom:529px;}
#t4c_1{left:385px;bottom:529px;}
#t4d_1{left:403px;bottom:529px;}
#t4e_1{left:422px;bottom:529px;}
#t4f_1{left:455px;bottom:529px;}
#t4g_1{left:616px;bottom:525px;}
#t4h_1{left:70px;bottom:501px;}
#t4i_1{left:99px;bottom:501px;letter-spacing:-0.01px;}
#t4j_1{left:155px;bottom:501px;letter-spacing:-0.01px;}
#t4k_1{left:293px;bottom:501px;}
#t4l_1{left:312px;bottom:501px;}
#t4m_1{left:330px;bottom:501px;}
#t4n_1{left:348px;bottom:501px;}
#t4o_1{left:367px;bottom:501px;}
#t4p_1{left:385px;bottom:501px;}
#t4q_1{left:403px;bottom:501px;}
#t4r_1{left:422px;bottom:501px;}
#t4s_1{left:440px;bottom:501px;}
#t4t_1{left:458px;bottom:501px;}
#t4u_1{left:477px;bottom:501px;}
#t4v_1{left:495px;bottom:501px;}
#t4w_1{left:513px;bottom:501px;}
#t4x_1{left:532px;bottom:501px;}
#t4y_1{left:550px;bottom:501px;}
#t4z_1{left:568px;bottom:501px;}
#t50_1{left:587px;bottom:501px;}
#t51_1{left:605px;bottom:501px;}
#t52_1{left:623px;bottom:501px;}
#t53_1{left:642px;bottom:501px;}
#t54_1{left:675px;bottom:501px;}
#t55_1{left:836px;bottom:497px;}
#t56_1{left:70px;bottom:464px;}
#t57_1{left:99px;bottom:464px;letter-spacing:-0.01px;}
#t58_1{left:264px;bottom:464px;letter-spacing:-0.01px;}
#t59_1{left:495px;bottom:464px;}
#t5a_1{left:513px;bottom:464px;}
#t5b_1{left:532px;bottom:464px;}
#t5c_1{left:550px;bottom:464px;}
#t5d_1{left:568px;bottom:464px;}
#t5e_1{left:587px;bottom:464px;}
#t5f_1{left:605px;bottom:464px;}
#t5g_1{left:623px;bottom:464px;}
#t5h_1{left:642px;bottom:464px;}
#t5i_1{left:675px;bottom:464px;}
#t5j_1{left:836px;bottom:461px;}
#t5k_1{left:70px;bottom:428px;}
#t5l_1{left:99px;bottom:428px;letter-spacing:-0.01px;}
#t5m_1{left:283px;bottom:428px;letter-spacing:-0.01px;}
#t5n_1{left:422px;bottom:428px;}
#t5o_1{left:440px;bottom:428px;}
#t5p_1{left:458px;bottom:428px;}
#t5q_1{left:477px;bottom:428px;}
#t5r_1{left:495px;bottom:428px;}
#t5s_1{left:513px;bottom:428px;}
#t5t_1{left:532px;bottom:428px;}
#t5u_1{left:550px;bottom:428px;}
#t5v_1{left:568px;bottom:428px;}
#t5w_1{left:587px;bottom:428px;}
#t5x_1{left:605px;bottom:428px;}
#t5y_1{left:623px;bottom:428px;}
#t5z_1{left:642px;bottom:428px;}
#t60_1{left:675px;bottom:428px;}
#t61_1{left:836px;bottom:424px;}
#t62_1{left:60px;bottom:401px;letter-spacing:-0.1px;}
#t63_1{left:121px;bottom:401px;letter-spacing:-0.12px;}
#t64_1{left:70px;bottom:381px;}
#t65_1{left:99px;bottom:381px;letter-spacing:-0.01px;word-spacing:1.12px;}
#t66_1{left:99px;bottom:365px;letter-spacing:-0.01px;}
#t67_1{left:246px;bottom:365px;letter-spacing:-0.01px;}
#t68_1{left:283px;bottom:365px;}
#t69_1{left:295px;bottom:365px;letter-spacing:-0.01px;}
#t6a_1{left:477px;bottom:365px;}
#t6b_1{left:495px;bottom:365px;}
#t6c_1{left:513px;bottom:365px;}
#t6d_1{left:532px;bottom:365px;}
#t6e_1{left:550px;bottom:365px;}
#t6f_1{left:568px;bottom:365px;}
#t6g_1{left:587px;bottom:365px;}
#t6h_1{left:605px;bottom:365px;}
#t6i_1{left:623px;bottom:365px;}
#t6j_1{left:642px;bottom:365px;}
#t6k_1{left:675px;bottom:364px;}
#t6l_1{left:836px;bottom:360px;}
#t6m_1{left:63px;bottom:346px;letter-spacing:-0.01px;}
#t6n_1{left:99px;bottom:346px;letter-spacing:-0.01px;word-spacing:0.09px;}
#t6o_1{left:99px;bottom:332px;letter-spacing:-0.01px;word-spacing:3.27px;}
#t6p_1{left:415px;bottom:332px;letter-spacing:-0.01px;word-spacing:3.27px;}
#t6q_1{left:99px;bottom:318px;letter-spacing:-0.01px;}
#t6r_1{left:157px;bottom:318px;letter-spacing:-0.01px;word-spacing:0.13px;}
#t6s_1{left:642px;bottom:318px;}
#t6t_1{left:668px;bottom:318px;letter-spacing:-0.01px;}
#t6u_1{left:836px;bottom:314px;}
#t6v_1{left:63px;bottom:284px;letter-spacing:-0.01px;}
#t6w_1{left:99px;bottom:284px;letter-spacing:-0.01px;}
#t6x_1{left:257px;bottom:284px;letter-spacing:-0.01px;}
#t6y_1{left:532px;bottom:284px;}
#t6z_1{left:550px;bottom:284px;}
#t70_1{left:568px;bottom:284px;}
#t71_1{left:587px;bottom:284px;}
#t72_1{left:605px;bottom:284px;}
#t73_1{left:623px;bottom:284px;}
#t74_1{left:642px;bottom:284px;}
#t75_1{left:668px;bottom:284px;letter-spacing:-0.01px;}
#t76_1{left:836px;bottom:281px;}
#t77_1{left:60px;bottom:263px;letter-spacing:-0.1px;}
#t78_1{left:125px;bottom:263px;letter-spacing:-0.12px;}
#t79_1{left:63px;bottom:229px;letter-spacing:-0.01px;}
#t7a_1{left:99px;bottom:229px;letter-spacing:-0.01px;}
#t7b_1{left:307px;bottom:229px;letter-spacing:-0.01px;}
#t7c_1{left:495px;bottom:229px;}
#t7d_1{left:513px;bottom:229px;}
#t7e_1{left:532px;bottom:229px;}
#t7f_1{left:550px;bottom:229px;}
#t7g_1{left:568px;bottom:229px;}
#t7h_1{left:587px;bottom:229px;}
#t7i_1{left:605px;bottom:229px;}
#t7j_1{left:623px;bottom:229px;}
#t7k_1{left:642px;bottom:229px;}
#t7l_1{left:668px;bottom:229px;letter-spacing:-0.01px;}
#t7m_1{left:836px;bottom:226px;}
#t7n_1{left:63px;bottom:193px;letter-spacing:-0.01px;}
#t7o_1{left:99px;bottom:193px;letter-spacing:-0.01px;}
#t7p_1{left:642px;bottom:193px;}
#t7q_1{left:668px;bottom:193px;letter-spacing:-0.01px;}
#t7r_1{left:836px;bottom:189px;}
#t7s_1{left:63px;bottom:171px;letter-spacing:-0.01px;}
#t7t_1{left:99px;bottom:171px;letter-spacing:-0.01px;}
#t7u_1{left:183px;bottom:171px;letter-spacing:-0.01px;}
#t7v_1{left:99px;bottom:153px;}
#t7w_1{left:116px;bottom:153px;letter-spacing:-0.01px;}
#t7x_1{left:99px;bottom:136px;}
#t7y_1{left:116px;bottom:136px;letter-spacing:-0.01px;}
#t7z_1{left:532px;bottom:136px;}
#t80_1{left:550px;bottom:136px;}
#t81_1{left:568px;bottom:136px;}
#t82_1{left:587px;bottom:136px;}
#t83_1{left:605px;bottom:136px;}
#t84_1{left:623px;bottom:136px;}
#t85_1{left:642px;bottom:136px;}
#t86_1{left:668px;bottom:134px;letter-spacing:-0.01px;}
#t87_1{left:836px;bottom:131px;}
#t88_1{left:63px;bottom:98px;letter-spacing:-0.01px;}
#t89_1{left:99px;bottom:98px;letter-spacing:-0.01px;}
#t8a_1{left:189px;bottom:98px;letter-spacing:-0.01px;}
#t8b_1{left:622px;bottom:98px;letter-spacing:-0.01px;}
#t8c_1{left:668px;bottom:98px;letter-spacing:-0.01px;}
#t8d_1{left:836px;bottom:94px;}
#t8e_1{left:99px;bottom:72px;letter-spacing:-0.01px;}
#t8f_1{left:126px;bottom:72px;letter-spacing:-0.01px;}
#t8g_1{left:167px;bottom:72px;letter-spacing:-0.01px;}
#t8h_1{left:389px;bottom:72px;letter-spacing:-0.01px;}
#t8i_1{left:424px;bottom:72px;}
#t8j_1{left:526px;bottom:72px;letter-spacing:-0.01px;}
#t8k_1{left:627px;bottom:72px;letter-spacing:-0.01px;}
#t8l_1{left:771px;bottom:72px;letter-spacing:-0.01px;}
#t8m_1{left:55px;bottom:34px;letter-spacing:0.11px;}
#t8n_1{left:653px;bottom:34px;letter-spacing:-0.14px;}
#t8o_1{left:794px;bottom:35px;letter-spacing:-0.14px;}
#t8p_1{left:822px;bottom:33px;letter-spacing:0.15px;}
#t8q_1{left:851px;bottom:35px;letter-spacing:-0.14px;}

.s0_1{font-size:11px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s1_1{font-size:28px;font-family:HelveticaNeueLTStd-BlkCn_ws;color:#000;}
.s2_1{font-size:21px;font-family:ITCFranklinGothicStd-Demi_wr;color:#000;}
.s3_1{font-size:15px;font-family:OCRAStd_wn;color:#000;}
.s4_1{font-size:11px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s5_1{font-size:11px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
.s6_1{font-size:9px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s7_1{font-size:14px;font-family:HelveticaNeueLTStd-Bd_wo;color:#FFF;}
.s8_1{font-size:11px;font-family:HelveticaNeueLTStd-Bd_wo;color:#FFF;}
.s9_1{font-size:12px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sa_1{font-size:12px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.sb_1{font-size:12px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
.sc_1{font-size:13px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.sd_1{font-size:14px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.se_1{font-size:13px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sf_1{font-size:26px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sg_1{font-size:15px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.t.v0_1{transform:scaleX(0.849);}
.t.v1_1{transform:scaleX(0.98);}
.t.v2_1{transform:scaleX(0.897);}
.t.v3_1{transform:scaleX(0.96);}
.t.v4_1{transform:scaleX(0.935);}
#form1_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 231px;	top: 99px;	width: 70px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 332px;	top: 99px;	width: 261px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 209px;	top: 136px;	width: 384px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 651px;	top: 150px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form5_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 651px;	top: 177px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form6_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 176px;	top: 173px;	width: 417px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 651px;	top: 205px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form8_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 121px;	top: 209px;	width: 472px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form9_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 651px;	top: 232px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form10_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 121px;	top: 264px;	width: 284px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form11_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 419px;	top: 264px;	width: 54px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form12_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 484px;	top: 264px;	width: 109px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form13_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 121px;	top: 310px;	width: 197px;	height: 25px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form14_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 330px;	top: 310px;	width: 142px;	height: 25px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form15_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 484px;	top: 310px;	width: 109px;	height: 25px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form16_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 411px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form17_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 749px;	top: 411px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form18_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 694px;	top: 459px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form19_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 694px;	top: 486px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form20_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 547px;	width: 138px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form21_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 547px;	width: 29px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form22_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 474px;	top: 567px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form23_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 627px;	top: 567px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form24_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 242px;	top: 605px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form25_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 474px;	top: 605px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form26_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 660px;	top: 605px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form27_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 242px;	top: 624px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form28_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 474px;	top: 624px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form29_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 474px;	top: 649px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form30_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 627px;	top: 649px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form31_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 677px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form32_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 677px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form33_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 714px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form34_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 714px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form35_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 750px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form36_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 750px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form37_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 814px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form38_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 814px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form39_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 860px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form40_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 860px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form41_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 894px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form42_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 894px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form43_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 949px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form44_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 949px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form45_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 986px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form46_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 986px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form47_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 1044px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form48_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 1044px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form49_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 1080px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form50_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 1080px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form51_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 752px;	top: 1115px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form52_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 608px;	top: 1117px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form25_1 { z-index:3; }
#form28_1 { z-index:2; }
#form18_1 { z-index:6; }
#form19_1 { z-index:5; }
#form26_1 { z-index:4; }
#form51_1 { z-index:3; }
#form52_1 { z-index:2; }
#form24_1 { z-index:3; }
#form27_1 { z-index:2; }
#form4_1 { z-index:5; }
#form5_1 { z-index:4; }
#form7_1 { z-index:3; }
#form9_1 { z-index:2; }

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts1" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_wo;
	src: url("fonts/HelveticaNeueLTStd-Bd_wo.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-BlkCn_ws;
	src: url("fonts/HelveticaNeueLTStd-BlkCn_ws.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_wp;
	src: url("fonts/HelveticaNeueLTStd-It_wp.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_wq;
	src: url("fonts/HelveticaNeueLTStd-Roman_wq.woff") format("woff");
}

@font-face {
	font-family: ITCFranklinGothicStd-Demi_wr;
	src: url("fonts/ITCFranklinGothicStd-Demi_wr.woff") format("woff");
}

@font-face {
	font-family: OCRAStd_wn;
	src: url("fonts/OCRAStd_wn.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg1" style="-webkit-user-select: none;"><object width="933" height="1209" data="1/1.svg" type="image/svg+xml" id="pdf1" style="width:933px; height:1209px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_1" class="t s0_1">Form </span><span id="t2_1" class="t s1_1">940 for 2023: </span>
<span id="t3_1" class="t v0_1 s2_1">Employer’s Annual Federal Unemployment (FUTA) Tax Return </span>
<span id="t4_1" class="t s0_1">Department of the Treasury — Internal Revenue Service </span>
<span id="t5_1" class="t s3_1">850113 </span>
<span id="t6_1" class="t s0_1">OMB No. 1545-0028 </span>


<span id="t7_1" class="t v1_1 s4_1">Employer identification number </span>




<span id="t8_1" class="t s4_1">(EIN) </span>
<span id="t9_1" class="t s0_1">— </span>
<span id="ta_1" class="t s4_1">Name </span><span id="tb_1" class="t s5_1">(not your trade name) </span>
<span id="tc_1" class="t s4_1">Trade name </span><span id="td_1" class="t s5_1">(if any) </span>
<span id="te_1" class="t s4_1">Address </span>
<span id="tf_1" class="t s6_1">Number </span><span id="tg_1" class="t s6_1">Street </span><span id="th_1" class="t s6_1">Suite or room number </span>
<span id="ti_1" class="t s6_1">City </span><span id="tj_1" class="t s6_1">State </span><span id="tk_1" class="t s6_1">ZIP code </span>
<span id="tl_1" class="t s6_1">Foreign country name </span><span id="tm_1" class="t s6_1">Foreign province/county </span><span id="tn_1" class="t s6_1">Foreign postal code </span>
<span id="to_1" class="t s7_1">Type of Return </span>
<span id="tp_1" class="t s8_1">(Check all that apply.) </span>
<span id="tq_1" class="t s9_1">a. </span><span id="tr_1" class="t sa_1">Amended </span>
<span id="ts_1" class="t s9_1">b. </span><span id="tt_1" class="t sa_1">Successor employer </span>
<span id="tu_1" class="t s9_1">c. </span><span id="tv_1" class="t sa_1">No payments to employees in </span>
<span id="tw_1" class="t sa_1">2023 </span>
<span id="tx_1" class="t s9_1">d. </span><span id="ty_1" class="t sa_1">Final: Business closed or </span>
<span id="tz_1" class="t sa_1">stopped paying wages </span>
<span id="t10_1" class="t sa_1">Go to </span><span id="t11_1" class="t sb_1">www.irs.gov/Form940 </span><span id="t12_1" class="t sa_1">for </span>
<span id="t13_1" class="t sa_1">instructions and the latest information. </span>
<span id="t14_1" class="t sc_1">Read the separate instructions before you complete this form. Please type or print within the boxes. </span>
<span id="t15_1" class="t s7_1">Part 1: </span><span id="t16_1" class="t sd_1">Tell us about your return. If any line does NOT apply, leave it blank. See instructions before completing Part 1. </span>
<span id="t17_1" class="t se_1">1a </span><span id="t18_1" class="t se_1">If you had to pay state unemployment tax in one state only, enter the state abbreviation </span><span id="t19_1" class="t sc_1">. </span><span id="t1a_1" class="t se_1">1a </span>
<span id="t1b_1" class="t se_1">1b </span><span id="t1c_1" class="t se_1">If you had to pay state unemployment tax in more than one state, you are a multi-state </span>
<span id="t1d_1" class="t se_1">employer </span><span id="t1e_1" class="t sc_1">. </span><span id="t1f_1" class="t sc_1">. </span><span id="t1g_1" class="t sc_1">. </span><span id="t1h_1" class="t sc_1">. </span><span id="t1i_1" class="t sc_1">. </span><span id="t1j_1" class="t sc_1">. </span><span id="t1k_1" class="t sc_1">. </span><span id="t1l_1" class="t sc_1">. </span><span id="t1m_1" class="t sc_1">. </span><span id="t1n_1" class="t sc_1">. </span><span id="t1o_1" class="t sc_1">. </span><span id="t1p_1" class="t sc_1">. </span><span id="t1q_1" class="t sc_1">. </span><span id="t1r_1" class="t sc_1">. </span><span id="t1s_1" class="t sc_1">. </span><span id="t1t_1" class="t sc_1">. </span><span id="t1u_1" class="t sc_1">. </span><span id="t1v_1" class="t sc_1">. </span><span id="t1w_1" class="t sc_1">. </span><span id="t1x_1" class="t sc_1">. </span><span id="t1y_1" class="t sc_1">. </span><span id="t1z_1" class="t sc_1">. </span><span id="t20_1" class="t sc_1">. </span><span id="t21_1" class="t sc_1">. </span><span id="t22_1" class="t sc_1">. </span><span id="t23_1" class="t sc_1">. </span><span id="t24_1" class="t sc_1">. </span><span id="t25_1" class="t se_1">1b </span>
<span id="t26_1" class="t sa_1">Check here. </span>
<span id="t27_1" class="t v2_1 sa_1">Complete Schedule A (Form 940). </span>
<span id="t28_1" class="t se_1">2 </span><span id="t29_1" class="t se_1">If you paid wages in a state that is subject to CREDIT REDUCTION </span><span id="t2a_1" class="t sc_1">. </span><span id="t2b_1" class="t sc_1">. </span><span id="t2c_1" class="t sc_1">. </span><span id="t2d_1" class="t sc_1">. </span><span id="t2e_1" class="t sc_1">. </span><span id="t2f_1" class="t sc_1">. </span><span id="t2g_1" class="t sc_1">. </span><span id="t2h_1" class="t sc_1">. </span><span id="t2i_1" class="t se_1">2 </span>
<span id="t2j_1" class="t sa_1">Check here. </span>
<span id="t2k_1" class="t v2_1 sa_1">Complete Schedule A (Form 940). </span>
<span id="t2l_1" class="t s7_1">Part 2: </span><span id="t2m_1" class="t sd_1">Determine your FUTA tax before adjustments. If any line does NOT apply, leave it blank. </span>
<span id="t2n_1" class="t se_1">3 </span><span id="t2o_1" class="t se_1">Total payments to all employees </span><span id="t2p_1" class="t sc_1">. </span><span id="t2q_1" class="t sc_1">. </span><span id="t2r_1" class="t sc_1">. </span><span id="t2s_1" class="t sc_1">. </span><span id="t2t_1" class="t sc_1">. </span><span id="t2u_1" class="t sc_1">. </span><span id="t2v_1" class="t sc_1">. </span><span id="t2w_1" class="t sc_1">. </span><span id="t2x_1" class="t sc_1">. </span><span id="t2y_1" class="t sc_1">. </span><span id="t2z_1" class="t sc_1">. </span><span id="t30_1" class="t sc_1">. </span><span id="t31_1" class="t sc_1">. </span><span id="t32_1" class="t sc_1">. </span><span id="t33_1" class="t sc_1">. </span><span id="t34_1" class="t sc_1">. </span><span id="t35_1" class="t sc_1">. </span><span id="t36_1" class="t sc_1">. </span><span id="t37_1" class="t sc_1">. </span><span id="t38_1" class="t se_1">3 </span>
<span id="t39_1" class="t sf_1">. </span>
<span id="t3a_1" class="t se_1">4 </span><span id="t3b_1" class="t se_1">Payments exempt from FUTA tax </span><span id="t3c_1" class="t sc_1">. </span><span id="t3d_1" class="t sc_1">. </span><span id="t3e_1" class="t sc_1">. </span><span id="t3f_1" class="t sc_1">. </span><span id="t3g_1" class="t sc_1">. </span><span id="t3h_1" class="t sc_1">. </span><span id="t3i_1" class="t sc_1">. </span><span id="t3j_1" class="t se_1">4 </span>
<span id="t3k_1" class="t sf_1">. </span>
<span id="t3l_1" class="t v3_1 sc_1">Check all that apply: </span><span id="t3m_1" class="t se_1">4a </span><span id="t3n_1" class="t sc_1">Fringe benefits </span>
<span id="t3o_1" class="t se_1">4b </span><span id="t3p_1" class="t sc_1">Group-term life insurance </span>
<span id="t3q_1" class="t se_1">4c </span><span id="t3r_1" class="t sc_1">Retirement/Pension </span>
<span id="t3s_1" class="t se_1">4d </span><span id="t3t_1" class="t sc_1">Dependent care </span>
<span id="t3u_1" class="t se_1">4e </span><span id="t3v_1" class="t sc_1">Other </span>
<span id="t3w_1" class="t se_1">5 </span><span id="t3x_1" class="t se_1">Total of payments made to each employee in excess of </span>
<span id="t3y_1" class="t se_1">$7,000 </span><span id="t3z_1" class="t sc_1">. </span><span id="t40_1" class="t sc_1">. </span><span id="t41_1" class="t sc_1">. </span><span id="t42_1" class="t sc_1">. </span><span id="t43_1" class="t sc_1">. </span><span id="t44_1" class="t sc_1">. </span><span id="t45_1" class="t sc_1">. </span><span id="t46_1" class="t sc_1">. </span><span id="t47_1" class="t sc_1">. </span><span id="t48_1" class="t sc_1">. </span><span id="t49_1" class="t sc_1">. </span><span id="t4a_1" class="t sc_1">. </span><span id="t4b_1" class="t sc_1">. </span><span id="t4c_1" class="t sc_1">. </span><span id="t4d_1" class="t sc_1">. </span><span id="t4e_1" class="t sc_1">. </span><span id="t4f_1" class="t se_1">5 </span>
<span id="t4g_1" class="t sf_1">. </span>
<span id="t4h_1" class="t se_1">6 </span><span id="t4i_1" class="t se_1">Subtotal </span><span id="t4j_1" class="t sc_1">(line 4 + line 5 = line 6) </span><span id="t4k_1" class="t sc_1">. </span><span id="t4l_1" class="t sc_1">. </span><span id="t4m_1" class="t sc_1">. </span><span id="t4n_1" class="t sc_1">. </span><span id="t4o_1" class="t sc_1">. </span><span id="t4p_1" class="t sc_1">. </span><span id="t4q_1" class="t sc_1">. </span><span id="t4r_1" class="t sc_1">. </span><span id="t4s_1" class="t sc_1">. </span><span id="t4t_1" class="t sc_1">. </span><span id="t4u_1" class="t sc_1">. </span><span id="t4v_1" class="t sc_1">. </span><span id="t4w_1" class="t sc_1">. </span><span id="t4x_1" class="t sc_1">. </span><span id="t4y_1" class="t sc_1">. </span><span id="t4z_1" class="t sc_1">. </span><span id="t50_1" class="t sc_1">. </span><span id="t51_1" class="t sc_1">. </span><span id="t52_1" class="t sc_1">. </span><span id="t53_1" class="t sc_1">. </span><span id="t54_1" class="t se_1">6 </span>
<span id="t55_1" class="t sf_1">. </span>
<span id="t56_1" class="t se_1">7 </span><span id="t57_1" class="t se_1">Total taxable FUTA wages </span><span id="t58_1" class="t sc_1">(line 3 – line 6 = line 7). See instructions </span><span id="t59_1" class="t sc_1">. </span><span id="t5a_1" class="t sc_1">. </span><span id="t5b_1" class="t sc_1">. </span><span id="t5c_1" class="t sc_1">. </span><span id="t5d_1" class="t sc_1">. </span><span id="t5e_1" class="t sc_1">. </span><span id="t5f_1" class="t sc_1">. </span><span id="t5g_1" class="t sc_1">. </span><span id="t5h_1" class="t sc_1">. </span><span id="t5i_1" class="t se_1">7 </span>
<span id="t5j_1" class="t sf_1">. </span>
<span id="t5k_1" class="t se_1">8 </span><span id="t5l_1" class="t se_1">FUTA tax before adjustments </span><span id="t5m_1" class="t sc_1">(line 7 x 0.006 = line 8) </span><span id="t5n_1" class="t sc_1">. </span><span id="t5o_1" class="t sc_1">. </span><span id="t5p_1" class="t sc_1">. </span><span id="t5q_1" class="t sc_1">. </span><span id="t5r_1" class="t sc_1">. </span><span id="t5s_1" class="t sc_1">. </span><span id="t5t_1" class="t sc_1">. </span><span id="t5u_1" class="t sc_1">. </span><span id="t5v_1" class="t sc_1">. </span><span id="t5w_1" class="t sc_1">. </span><span id="t5x_1" class="t sc_1">. </span><span id="t5y_1" class="t sc_1">. </span><span id="t5z_1" class="t sc_1">. </span><span id="t60_1" class="t se_1">8 </span>
<span id="t61_1" class="t sf_1">. </span>
<span id="t62_1" class="t s7_1">Part 3: </span><span id="t63_1" class="t sd_1">Determine your adjustments. If any line does NOT apply, leave it blank. </span>
<span id="t64_1" class="t se_1">9 </span><span id="t65_1" class="t se_1">If ALL of the taxable FUTA wages you paid were excluded from state unemployment tax, </span>
<span id="t66_1" class="t se_1">multiply line 7 by 0.054 </span><span id="t67_1" class="t sc_1">(line 7 </span><span id="t68_1" class="t sc_1">× </span><span id="t69_1" class="t sc_1">0.054 = line 9). Go to line 12 </span><span id="t6a_1" class="t sc_1">. </span><span id="t6b_1" class="t sc_1">. </span><span id="t6c_1" class="t sc_1">. </span><span id="t6d_1" class="t sc_1">. </span><span id="t6e_1" class="t sc_1">. </span><span id="t6f_1" class="t sc_1">. </span><span id="t6g_1" class="t sc_1">. </span><span id="t6h_1" class="t sc_1">. </span><span id="t6i_1" class="t sc_1">. </span><span id="t6j_1" class="t sc_1">. </span><span id="t6k_1" class="t se_1">9 </span>
<span id="t6l_1" class="t sf_1">. </span>
<span id="t6m_1" class="t se_1">10 </span><span id="t6n_1" class="t se_1">If SOME of the taxable FUTA wages you paid were excluded from state unemployment tax, </span>
<span id="t6o_1" class="t se_1">OR you paid ANY state unemployment tax late </span><span id="t6p_1" class="t sc_1">(after the due date for filing Form 940), </span>
<span id="t6q_1" class="t sc_1">complete </span><span id="t6r_1" class="t sc_1">the worksheet in the instructions. Enter the amount from line 7 of the worksheet . </span><span id="t6s_1" class="t sc_1">. </span><span id="t6t_1" class="t se_1">10 </span>
<span id="t6u_1" class="t sf_1">. </span>
<span id="t6v_1" class="t se_1">11 </span><span id="t6w_1" class="t se_1">If credit reduction applies</span><span id="t6x_1" class="t sc_1">, enter the total from Schedule A (Form 940) </span><span id="t6y_1" class="t sc_1">. </span><span id="t6z_1" class="t sc_1">. </span><span id="t70_1" class="t sc_1">. </span><span id="t71_1" class="t sc_1">. </span><span id="t72_1" class="t sc_1">. </span><span id="t73_1" class="t sc_1">. </span><span id="t74_1" class="t sc_1">. </span><span id="t75_1" class="t se_1">11 </span>
<span id="t76_1" class="t sf_1">. </span>
<span id="t77_1" class="t s7_1">Part 4: </span><span id="t78_1" class="t sd_1">Determine your FUTA tax and balance due or overpayment. If any line does NOT apply, leave it blank. </span>
<span id="t79_1" class="t se_1">12 </span><span id="t7a_1" class="t se_1">Total FUTA tax after adjustments </span><span id="t7b_1" class="t sc_1">(lines 8 + 9 + 10 + 11 = line 12) </span><span id="t7c_1" class="t sc_1">. </span><span id="t7d_1" class="t sc_1">. </span><span id="t7e_1" class="t sc_1">. </span><span id="t7f_1" class="t sc_1">. </span><span id="t7g_1" class="t sc_1">. </span><span id="t7h_1" class="t sc_1">. </span><span id="t7i_1" class="t sc_1">. </span><span id="t7j_1" class="t sc_1">. </span><span id="t7k_1" class="t sc_1">. </span><span id="t7l_1" class="t se_1">12 </span>
<span id="t7m_1" class="t sf_1">. </span>
<span id="t7n_1" class="t se_1">13 </span><span id="t7o_1" class="t se_1">FUTA tax deposited for the year, including any overpayment applied from a prior year </span><span id="t7p_1" class="t sc_1">. </span><span id="t7q_1" class="t se_1">13 </span>
<span id="t7r_1" class="t sf_1">. </span>
<span id="t7s_1" class="t se_1">14 </span><span id="t7t_1" class="t se_1">Balance due. </span><span id="t7u_1" class="t sc_1">If line 12 is more than line 13, enter the excess on line 14. </span>
<span id="t7v_1" class="t sc_1">• </span><span id="t7w_1" class="t sc_1">If line 14 is more than $500, you must deposit your tax. </span>
<span id="t7x_1" class="t sc_1">• </span><span id="t7y_1" class="t sc_1">If line 14 is $500 or less, you may pay with this return. See instructions </span><span id="t7z_1" class="t sc_1">. </span><span id="t80_1" class="t sc_1">. </span><span id="t81_1" class="t sc_1">. </span><span id="t82_1" class="t sc_1">. </span><span id="t83_1" class="t sc_1">. </span><span id="t84_1" class="t sc_1">. </span><span id="t85_1" class="t sc_1">. </span>
<span id="t86_1" class="t se_1">14 </span>
<span id="t87_1" class="t sf_1">. </span>
<span id="t88_1" class="t se_1">15 </span><span id="t89_1" class="t se_1">Overpayment. </span><span id="t8a_1" class="t sc_1">If line 13 is more than line 12, enter the excess on line 15 and check a box </span><span id="t8b_1" class="t sc_1">below </span><span id="t8c_1" class="t se_1">15 </span>
<span id="t8d_1" class="t sf_1">. </span>
<span id="t8e_1" class="t sc_1">You </span><span id="t8f_1" class="t se_1">MUST </span><span id="t8g_1" class="t sc_1">complete both pages of this form and </span><span id="t8h_1" class="t se_1">SIGN </span><span id="t8i_1" class="t sc_1">it. </span><span id="t8j_1" class="t sc_1">Check one: </span><span id="t8k_1" class="t v4_1 sc_1">Apply to next return. </span><span id="t8l_1" class="t sc_1">Send a refund. </span>
<span id="t8m_1" class="t s9_1">For Privacy Act and Paperwork Reduction Act Notice, see the back of the Payment Voucher. </span><span id="t8n_1" class="t s0_1">Cat. No. 11234O </span><span id="t8o_1" class="t s0_1">Form </span><span id="t8p_1" class="t sg_1">940 </span><span id="t8q_1" class="t s0_1">(2023) </span></div>
<!-- End text definitions -->



 
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
 if (isset($get_cominfo) && !empty($get_cominfo)) {
    $company_name = $get_cominfo[0]['company_name'];
} else {
     $company_name = 'Default Name';
}
?>
 
<input id="form3_1" type="text" tabindex="3" 
value="<?php echo htmlspecialchars($company_name, ENT_QUOTES,'UTF-8'); ?>"  
data-objref="360 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_3[0]" style="margin-left: 5px;"/>





<input id="form4_1" type="checkbox" tabindex="12" value="Report1" data-objref="354 0 R" data-field-name="topmostSubform[0].Page1[0].TypeReturn[0].c1_1[0]" imageName="1/form/354 0 R" images="110100"/>



<input id="form5_1" type="checkbox" tabindex="13" value="Report2" data-objref="355 0 R" data-field-name="topmostSubform[0].Page1[0].TypeReturn[0].c1_2[0]" imageName="1/form/355 0 R" images="110100"/>




<?php
$username = 'Default Address';
if (isset($get_cdata) && !empty($get_cdata[0]['username'])) {
    $username = $get_cdata[0]['username'];
}
?>
<input id="form6_1" type="text" tabindex="4" 
value="<?php echo htmlspecialchars($username, ENT_QUOTES,'UTF-8'); ?>"  
data-objref="361 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_4[0]" style="margin-left: 5px;" />








<input id="form7_1" type="checkbox" tabindex="14" value="Report3" data-objref="356 0 R" data-field-name="topmostSubform[0].Page1[0].TypeReturn[0].c1_3[0]" imageName="1/form/356 0 R" images="110100"/>



<?php
$address = isset($get_cominfo[0]['address']) ? $get_cominfo[0]['address'] : 'Default Address';
$get_address = explode(',' , $address);
?>
<input id="form8_1" type="text" tabindex="5" 
value="<?php echo htmlspecialchars($get_address[0], ENT_QUOTES, 'UTF-8'); ?><?php echo htmlspecialchars($get_address[1], ENT_QUOTES, 'UTF-8'); ?><?php echo htmlspecialchars($get_address[2], ENT_QUOTES, 'UTF-8'); ?>"
data-objref="362 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_5[0]" style="margin-left: 5px;"/>








<input id="form9_1" type="checkbox" tabindex="15" value="Report4" data-objref="357 0 R" data-field-name="topmostSubform[0].Page1[0].TypeReturn[0].c1_4[0]" imageName="1/form/357 0 R" images="110100"/>

<input id="form10_1" type="text" tabindex="6" 
 value="<?php echo htmlspecialchars($get_address[1], ENT_QUOTES, 'UTF-8'); ?>"
data-objref="363 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_6[0]" style="margin-left: 5px;" />







<input id="form11_1" type="text" tabindex="7" maxlength="2" 
value="<?php echo htmlspecialchars($get_address[2], ENT_QUOTES, 'UTF-8'); ?>" 
data-objref="364 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_7[0]"/>

 

<input id="form12_1" type="text" tabindex="8" maxlength="10" value="<?php echo htmlspecialchars($get_address[3], ENT_QUOTES, 'UTF-8'); ?>" data-objref="476 0 R" data-field-name="topmostSubform[0].Page1[0].Header[0].EntityArea[0].f1_8[0]"/>





<input id="form13_1" type="text" tabindex="9" value="" data-objref="366 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_9[0]"/>
<input id="form14_1" type="text" tabindex="10" value="" data-objref="367 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_10[0]"/>
<input id="form15_1" type="text" tabindex="11" value="" data-objref="368 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_11[0]"/>
<input id="form16_1" type="text" tabindex="16" maxlength="1" value="" data-objref="315 0 R" data-field-name="topmostSubform[0].Page1[0].f1_12[0]"/>
<input id="form17_1" type="text" tabindex="17" maxlength="1" value="" data-objref="316 0 R" data-field-name="topmostSubform[0].Page1[0].f1_13[0]"/>
<input id="form18_1" type="checkbox" tabindex="18" value="1" data-objref="317 0 R" data-field-name="topmostSubform[0].Page1[0].c1_5[0]" imageName="1/form/317 0 R" images="110100"/>
<input id="form19_1" type="checkbox" tabindex="19" value="1" data-objref="318 0 R" data-field-name="topmostSubform[0].Page1[0].c1_6[0]" imageName="1/form/318 0 R" images="110100"/>


<?php
// Check if $get_paytotal is set and not empty, and that total_grosspay has a value
if (isset($get_paytotal) && !empty($get_paytotal[0]['total_grosspay'])) {
    $total_grosspay = $get_paytotal[0]['total_grosspay'];  
}
$parts = explode('.', number_format($total_grosspay, 2, '.', ''));
// Preparing the integer and decimal parts
$integerPart = $parts[0];
$decimalPart = isset($parts[1]) ? $parts[1] : '00';
?>

<!-- Input field for dollars -->
<input id="form20_1" type="text" tabindex="20" 
 value="$<?php echo htmlspecialchars($integerPart, ENT_QUOTES, 'UTF-8'); ?>"  
data-objref="319 0 R" data-field-name="topmostSubform[0].Page1[0].f1_14[0]"/>
<!-- Input field for cents -->
<input id="form21_1" type="text" tabindex="21" maxlength="2" 
value="<?php echo htmlspecialchars($decimalPart, ENT_QUOTES, 'UTF-8'); ?>"  
 data-objref="320 0 R" data-field-name="topmostSubform[0].Page1[0].f1_15[0]"/>



<input id="form22_1" type="text" tabindex="22" value="" data-objref="321 0 R" data-field-name="topmostSubform[0].Page1[0].f1_16[0]"/>
<input id="form23_1" type="text" tabindex="23" maxlength="2" value="" data-objref="322 0 R" data-field-name="topmostSubform[0].Page1[0].f1_17[0]"/>
<input id="form24_1" type="checkbox" tabindex="24" value="1" data-objref="352 0 R" data-field-name="topmostSubform[0].Page1[0].Checkboxes4a-b[0].c1_7[0]" imageName="1/form/352 0 R" images="110100"/>
<input id="form25_1" type="checkbox" tabindex="26" value="1" data-objref="350 0 R" data-field-name="topmostSubform[0].Page1[0].Checkboxes4c-d[0].c1_9[0]" imageName="1/form/350 0 R" images="110100"/>
<input id="form26_1" type="checkbox" tabindex="28" value="1" data-objref="325 0 R" data-field-name="topmostSubform[0].Page1[0].c1_11[0]" imageName="1/form/325 0 R" images="110100"/>
<input id="form27_1" type="checkbox" tabindex="25" value="1" data-objref="353 0 R" data-field-name="topmostSubform[0].Page1[0].Checkboxes4a-b[0].c1_8[0]" imageName="1/form/353 0 R" images="110100"/>
<input id="form28_1" type="checkbox" tabindex="27" value="1" data-objref="351 0 R" data-field-name="topmostSubform[0].Page1[0].Checkboxes4c-d[0].c1_10[0]" imageName="1/form/351 0 R" images="110100"/>


 

<input id="form29_1" type="text" tabindex="29" value="" data-objref="326 0 R" data-field-name="topmostSubform[0].Page1[0].f1_18[0]"/>

 


<input id="form30_1" type="text" tabindex="30" maxlength="2" value="" data-objref="327 0 R" data-field-name="topmostSubform[0].Page1[0].f1_19[0]"/>
<input id="form31_1" type="text" tabindex="31" value="" data-objref="328 0 R" data-field-name="topmostSubform[0].Page1[0].f1_20[0]"/>
<input id="form32_1" type="text" tabindex="32" maxlength="2" value="" data-objref="329 0 R" data-field-name="topmostSubform[0].Page1[0].f1_21[0]"/>


<?php
// Check if $get_paytotal is set and not empty, and that total_grosspay has a value
if (isset($get_paytotal) && !empty($get_paytotal[0]['total_grosspay'])) {
    $total_grosspay = $get_paytotal[0]['total_grosspay'];  
}

  if (isset($amountGreaterThan) && !empty($amountGreaterThan)) {
    $totalAmount = $amountGreaterThan['totalAmount'];
} else {
     $totalAmount = '0';
}
 
    $SumofFUTAwages2   =  $totalAmount;
 
   $seventhvalue = $SumofFUTAwages2 ;


   $parts = explode('.', number_format($seventhvalue, 2, '.', ''));
   $integerPart = $parts[0];
   $decimalPart = isset($parts[1]) ? $parts[1] : '00'; // Default to '00' if no decimal part
 ?>


 

<input id="form33_1" type="text" tabindex="33" 
value="$<?php echo htmlspecialchars('0', ENT_QUOTES, 'UTF-8'); ?>"  
data-objref="330 0 R" data-field-name="topmostSubform[0].Page1[0].f1_22[0]"/>

<input id="form34_1" type="text" tabindex="34" maxlength="2" 
value="<?php echo htmlspecialchars('00', ENT_QUOTES, 'UTF-8'); ?>"  
 data-objref="331 0 R" data-field-name="topmostSubform[0].Page1[0].f1_23[0]"/>


 



<?php
// Assuming $seventhvalue is defined and numeric
$valuesMultiple = $seventhvalue * 0.006;
// Splitting the result at the decimal point
$parts = explode('.', number_format($valuesMultiple, 2, '.', ''));
// Preparing the integer and decimal parts
$integerPart = $parts[0];
$decimalPart = isset($parts[1]) ? $parts[1] : '00'; // Default to '00' if no decimal part
?>

<input id="form35_1" type="text" tabindex="35" 
 value="$<?php echo htmlspecialchars('0', ENT_QUOTES, 'UTF-8'); ?>"  
 data-objref="332 0 R" data-field-name="topmostSubform[0].Page1[0].f1_24[0]"/>

<input id="form36_1" type="text" tabindex="36" maxlength="2" 
 value="<?php echo htmlspecialchars('00', ENT_QUOTES, 'UTF-8'); ?>"  
 data-objref="333 0 R" data-field-name="topmostSubform[0].Page1[0].f1_25[0]"/>




<input id="form37_1" type="text" tabindex="37" value="" data-objref="334 0 R" data-field-name="topmostSubform[0].Page1[0].f1_26[0]"/>
<input id="form38_1" type="text" tabindex="38" maxlength="2" value="" data-objref="335 0 R" data-field-name="topmostSubform[0].Page1[0].f1_27[0]"/>
<input id="form39_1" type="text" tabindex="39" value="" data-objref="336 0 R" data-field-name="topmostSubform[0].Page1[0].f1_28[0]"/>
<input id="form40_1" type="text" tabindex="40" maxlength="2" value="" data-objref="337 0 R" data-field-name="topmostSubform[0].Page1[0].f1_29[0]"/>
<input id="form41_1" type="text" tabindex="41" value="" data-objref="338 0 R" data-field-name="topmostSubform[0].Page1[0].f1_30[0]"/>
<input id="form42_1" type="text" tabindex="42" maxlength="2" value="" data-objref="339 0 R" data-field-name="topmostSubform[0].Page1[0].f1_31[0]"/>
<input id="form43_1" type="text" tabindex="43" value="" data-objref="340 0 R" data-field-name="topmostSubform[0].Page1[0].f1_32[0]"/>
<input id="form44_1" type="text" tabindex="44" maxlength="2" value="" data-objref="341 0 R" data-field-name="topmostSubform[0].Page1[0].f1_33[0]"/>
<input id="form45_1" type="text" tabindex="45" value="" data-objref="342 0 R" data-field-name="topmostSubform[0].Page1[0].f1_34[0]"/>
<input id="form46_1" type="text" tabindex="46" maxlength="2" value="" data-objref="343 0 R" data-field-name="topmostSubform[0].Page1[0].f1_35[0]"/>
<input id="form47_1" type="text" tabindex="47" value="" data-objref="344 0 R" data-field-name="topmostSubform[0].Page1[0].f1_36[0]"/>
<input id="form48_1" type="text" tabindex="48" maxlength="2" value="" data-objref="345 0 R" data-field-name="topmostSubform[0].Page1[0].f1_37[0]"/>
<input id="form49_1" type="text" tabindex="49" value="" data-objref="346 0 R" data-field-name="topmostSubform[0].Page1[0].f1_38[0]"/>
<input id="form50_1" type="text" tabindex="50" maxlength="2" value="" data-objref="347 0 R" data-field-name="topmostSubform[0].Page1[0].f1_39[0]"/>
<input id="form51_1" type="checkbox" tabindex="52" value="2" data-objref="349 0 R" data-field-name="topmostSubform[0].Page1[0].c1_12[1]" imageName="1/form/349 0 R" images="110100"/>
<input id="form52_1" type="checkbox" tabindex="51" value="1" data-objref="348 0 R" data-field-name="topmostSubform[0].Page1[0].c1_12[0]" imageName="1/form/348 0 R" images="110100"/>

<!-- End Form Data -->

</div>

</div>
</div>
<div id="page2" style="width: 933px; height: 1209px; margin-top:20px;     margin-left: 600px;" class="page">
<div class="page-inner" style="width: 933px; height: 1209px;">

<div id="p2" class="pageArea" style="overflow: hidden; position: relative; width: 933px; height: 1209px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">


<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
fill: none;
stroke: #000;
stroke-width: 1.222;
stroke-miterlimit: 10;
}
.g4_2{
fill: none;
stroke: #000;
stroke-width: 0.762;
stroke-miterlimit: 10;
}
.g5_2{
fill: none;
stroke: #000;
stroke-width: 0.757;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.2,73.3H880.8" class="g0_2"/>
<path d="M54.6,110H605.4M605,72.9v37.5" class="g1_2"/>
<path d="M55,128.3h55V110H55v18.3Z" class="g2_2"/>
<path d="M54.6,110h55.8" class="g3_2"/>
<path d="M54.6,128.3h55.8" class="g1_2"/>
<path d="M54.6,110H880.4" class="g3_2"/>
<path d="M54.6,128.3H880.4m-352.8,55H671.4M527.6,210.8H671.4M528,182.9v28.3M670.6,183.3h44.8m-44.8,27.5h44.8M715,182.9v28.3M527.6,220H671.4M527.6,247.5H671.4M528,219.6v28.3M670.6,220h44.8m-44.8,27.5h44.8M715,219.6v28.3m-187.4,8.8H671.4M527.6,284.2H671.4M528,256.3v28.3M670.6,256.7h44.8m-44.8,27.5h44.8M715,256.3v28.3m-187.4,8.7H671.4M527.6,320.8H671.4M528,292.9v28.3M670.6,293.3h44.8m-44.8,27.5h44.8M715,292.9v28.3M527.6,330H671.4M527.6,357.5H671.4M528,329.6v28.3M670.6,330h44.8m-44.8,27.5h44.8M715,329.6v28.3" class="g1_2"/>
<path d="M55,385h55V366.7H55V385Z" class="g2_2"/>
<path d="M54.6,366.7h55.8" class="g3_2"/>
<path d="M54.6,385h55.8" class="g1_2"/>
<path d="M54.6,366.7H880.4" class="g3_2"/>
<path d="M54.6,385H880.4M88,456.8h15.3V441.5H88v15.3Zm308,1.5H627V430.8H396v27.5Zm253,0H869V430.8H649v27.5Zm22,9.2H660M671,495H660m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M649,473v22.4m-.4,-.4H671m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H660m11,0H648.6m.4,-.4v22.4" class="g4_2"/>
<path d="M715,467.5H704M715,495H704m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M693,473v22.4m-.4,-.4H715m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H704m11,0H692.6m.4,-.4v22.4" class="g4_2"/>
<path d="M759,467.5H748M759,495H748m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M737,473v22.4m-.4,-.4H759m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H748m11,0H736.6m.4,-.4v22.4" class="g4_2"/>
<path d="M803,467.5H792M803,495H792m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M781,473v22.4m-.4,-.4H803m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H792m11,0H780.6m.4,-.4v22.4" class="g4_2"/>
<path d="M847,467.5H836M847,495H836m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M825,473v22.4m-.4,-.4H847m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H836m11,0H824.6m.4,-.4v22.4" class="g4_2"/>
<path d="M88,520.2h15.3V504.9H88v15.3Z" class="g1_2"/>
<path d="M55,550h55V531.7H55V550Z" class="g2_2"/>
<path d="M54.6,531.7h55.8" class="g3_2"/>
<path d="M54.6,550h55.8" class="g1_2"/>
<path d="M54.6,531.7H880.4" class="g3_2"/>
<path d="M54.6,550H880.4M198,632.5H462m-264,55H462m22,-33v11m-308,-11v11" class="g1_2"/>
<path d="M176,665.5v22.4m-.4,-.4H198m264,0h22.4m-.4,.4V665.5m0,-11V632.1m.4,.4H462m-264,0H175.6m.4,-.4v22.4" class="g5_2"/>
<path d="M176,742.5H297V715H176v27.5ZM583,660H869V632.5H583V660Zm0,36.7H869V669.2H583v27.5Zm66,36.6H869V705.8H649v27.5ZM54.6,770H880.4m-26.7,29.8H869V784.5H853.7v15.3ZM220,861.7H616V834.2H220v27.5Zm462,0H869V834.2H682v27.5ZM242,880H594M242,907.5H594M616,902V885.5M220,902V885.5" class="g1_2"/>
<path d="M220,885.5v22.4m-.4,-.4H242m352,0h22.4m-.4,.4V885.5m0,16.5V879.6m.4,.4H594m-352,0H219.6m.4,-.4V902" class="g5_2"/>
<path d="M682,907.5H803V880H682v27.5ZM220,953.3H616V925.8H220v27.5Zm462,0H869V925.8H682v27.5ZM220,990H616V962.5H220V990Zm462,0H869V962.5H682V990Zm-462,36.7H407V999.2H220v27.5Zm242,0H616V999.2H462v27.5Zm220,0H869V999.2H682v27.5Z" class="g1_2"/>
<path d="M54.6,1063.3H792.4m-.8,0h88.8" class="g0_2"/>
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

#t1_2{left:814px;bottom:1134px;letter-spacing:0.2px;}
#t2_2{left:61px;bottom:1119px;letter-spacing:-0.17px;}
#t3_2{left:94px;bottom:1119px;letter-spacing:-0.13px;}
#t4_2{left:611px;bottom:1119px;letter-spacing:-0.15px;}
#t5_2{left:661px;bottom:1096px;}
#t6_2{left:60px;bottom:1079px;letter-spacing:-0.1px;}
#t7_2{left:125px;bottom:1079px;letter-spacing:-0.11px;}
#t8_2{left:63px;bottom:1039px;letter-spacing:-0.01px;}
#t9_2{left:88px;bottom:1039px;letter-spacing:-0.01px;word-spacing:0.31px;}
#ta_2{left:88px;bottom:1024px;letter-spacing:-0.01px;}
#tb_2{left:88px;bottom:996px;letter-spacing:-0.01px;word-spacing:3.75px;}
#tc_2{left:192px;bottom:996px;letter-spacing:-0.01px;}
#td_2{left:330px;bottom:996px;}
#te_2{left:348px;bottom:996px;}
#tf_2{left:367px;bottom:996px;}
#tg_2{left:385px;bottom:996px;}
#th_2{left:403px;bottom:996px;}
#ti_2{left:422px;bottom:996px;}
#tj_2{left:440px;bottom:996px;}
#tk_2{left:458px;bottom:996px;}
#tl_2{left:477px;bottom:996px;}
#tm_2{left:495px;bottom:996px;letter-spacing:-0.01px;}
#tn_2{left:671px;bottom:992px;}
#to_2{left:88px;bottom:959px;letter-spacing:-0.01px;}
#tp_2{left:121px;bottom:959px;letter-spacing:-0.01px;}
#tq_2{left:196px;bottom:959px;letter-spacing:-0.01px;}
#tr_2{left:312px;bottom:959px;}
#ts_2{left:330px;bottom:959px;}
#tt_2{left:348px;bottom:959px;}
#tu_2{left:367px;bottom:959px;}
#tv_2{left:385px;bottom:959px;}
#tw_2{left:403px;bottom:959px;}
#tx_2{left:422px;bottom:959px;}
#ty_2{left:440px;bottom:959px;}
#tz_2{left:458px;bottom:959px;}
#t10_2{left:477px;bottom:959px;}
#t11_2{left:495px;bottom:959px;letter-spacing:-0.01px;}
#t12_2{left:671px;bottom:956px;}
#t13_2{left:88px;bottom:923px;letter-spacing:-0.01px;word-spacing:3.75px;}
#t14_2{left:194px;bottom:923px;letter-spacing:-0.01px;}
#t15_2{left:348px;bottom:923px;}
#t16_2{left:367px;bottom:923px;}
#t17_2{left:385px;bottom:923px;}
#t18_2{left:403px;bottom:923px;}
#t19_2{left:422px;bottom:923px;}
#t1a_2{left:440px;bottom:923px;}
#t1b_2{left:458px;bottom:923px;}
#t1c_2{left:477px;bottom:923px;}
#t1d_2{left:495px;bottom:923px;letter-spacing:-0.01px;}
#t1e_2{left:671px;bottom:919px;}
#t1f_2{left:88px;bottom:886px;letter-spacing:-0.01px;}
#t1g_2{left:121px;bottom:886px;letter-spacing:-0.01px;}
#t1h_2{left:193px;bottom:886px;letter-spacing:-0.01px;}
#t1i_2{left:367px;bottom:886px;}
#t1j_2{left:385px;bottom:886px;}
#t1k_2{left:403px;bottom:886px;}
#t1l_2{left:422px;bottom:886px;}
#t1m_2{left:440px;bottom:886px;}
#t1n_2{left:458px;bottom:886px;}
#t1o_2{left:477px;bottom:886px;}
#t1p_2{left:495px;bottom:886px;letter-spacing:-0.01px;}
#t1q_2{left:671px;bottom:882px;}
#t1r_2{left:59px;bottom:849px;letter-spacing:-0.01px;}
#t1s_2{left:88px;bottom:849px;letter-spacing:-0.01px;}
#t1t_2{left:267px;bottom:849px;letter-spacing:-0.01px;}
#t1u_2{left:495px;bottom:849px;letter-spacing:-0.01px;}
#t1v_2{left:671px;bottom:846px;}
#t1w_2{left:726px;bottom:849px;letter-spacing:-0.01px;}
#t1x_2{left:60px;bottom:823px;letter-spacing:-0.1px;}
#t1y_2{left:121px;bottom:823px;letter-spacing:-0.12px;}
#t1z_2{left:88px;bottom:801px;letter-spacing:-0.01px;word-spacing:0.06px;}
#t20_2{left:88px;bottom:785px;letter-spacing:-0.01px;}
#t21_2{left:110px;bottom:749px;letter-spacing:-0.01px;}
#t22_2{left:165px;bottom:749px;letter-spacing:-0.01px;}
#t23_2{left:165px;bottom:712px;letter-spacing:-0.01px;}
#t24_2{left:110px;bottom:684px;letter-spacing:-0.01px;}
#t25_2{left:60px;bottom:658px;letter-spacing:-0.1px;}
#t26_2{left:121px;bottom:658px;letter-spacing:-0.12px;}
#t27_2{left:88px;bottom:630px;letter-spacing:-0.01px;}
#t28_2{left:88px;bottom:616px;letter-spacing:-0.01px;}
#t29_2{left:88px;bottom:603px;letter-spacing:-0.01px;}
#t2a_2{left:88px;bottom:589px;letter-spacing:-0.01px;}
#t2b_2{left:88px;bottom:546px;letter-spacing:0.13px;}
#t2c_2{left:88px;bottom:530px;letter-spacing:0.14px;}
#t2d_2{left:132px;bottom:464px;letter-spacing:-0.01px;}
#t2e_2{left:207px;bottom:464px;}
#t2f_2{left:240px;bottom:464px;}
#t2g_2{left:506px;bottom:561px;letter-spacing:-0.01px;}
#t2h_2{left:506px;bottom:548px;letter-spacing:-0.01px;}
#t2i_2{left:506px;bottom:525px;letter-spacing:-0.01px;}
#t2j_2{left:506px;bottom:511px;}
#t2k_2{left:506px;bottom:474px;letter-spacing:-0.01px;}
#t2l_2{left:88px;bottom:404px;letter-spacing:0.13px;}
#t2m_2{left:664px;bottom:406px;letter-spacing:-0.01px;}
#t2n_2{left:88px;bottom:345px;letter-spacing:-0.01px;}
#t2o_2{left:627px;bottom:345px;letter-spacing:0.1px;}
#t2p_2{left:88px;bottom:314px;letter-spacing:-0.01px;}
#t2q_2{left:88px;bottom:300px;letter-spacing:-0.01px;}
#t2r_2{left:627px;bottom:299px;letter-spacing:-0.01px;}
#t2s_2{left:713px;bottom:299px;}
#t2t_2{left:746px;bottom:299px;}
#t2u_2{left:88px;bottom:268px;letter-spacing:-0.01px;}
#t2v_2{left:88px;bottom:254px;letter-spacing:-0.01px;}
#t2w_2{left:627px;bottom:254px;letter-spacing:-0.01px;}
#t2x_2{left:88px;bottom:217px;letter-spacing:-0.01px;}
#t2y_2{left:627px;bottom:217px;letter-spacing:-0.01px;}
#t2z_2{left:88px;bottom:180px;}
#t30_2{left:429px;bottom:180px;letter-spacing:-0.01px;}
#t31_2{left:627px;bottom:180px;letter-spacing:-0.01px;}
#t32_2{left:55px;bottom:127px;letter-spacing:-0.14px;}
#t33_2{left:83px;bottom:125px;}
#t34_2{left:794px;bottom:127px;letter-spacing:-0.14px;}
#t35_2{left:822px;bottom:125px;letter-spacing:0.15px;}
#t36_2{left:851px;bottom:127px;letter-spacing:-0.14px;}

.s0_2{font-size:15px;font-family:OCRAStd_wn;color:#000;}
.s1_2{font-size:11px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s2_2{font-size:11px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
.s3_2{font-size:15px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s4_2{font-size:14px;font-family:HelveticaNeueLTStd-Bd_wo;color:#FFF;}
.s5_2{font-size:14px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s6_2{font-size:13px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s7_2{font-size:13px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s8_2{font-size:26px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s9_2{font-size:15px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sa_2{font-size:12px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.sb_2{font-size:11px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.t.v0_2{transform:scaleX(0.985);}
.t.v1_2{transform:scaleX(0.9);}
#form1_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 55px;	top: 87px;	width: 384px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 627px;	top: 87px;	width: 32px;	height: 20px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 669px;	top: 87px;	width: 78px;	height: 20px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 182px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form5_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 182px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form6_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 219px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 219px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form8_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 255px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form9_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 255px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form10_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 292px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form11_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 292px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form12_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 329px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form13_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 329px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form14_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 89px;	top: 440px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form15_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 399px;	top: 429px;	width: 226px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form16_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 649px;	top: 429px;	width: 219px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form17_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 649px;	top: 466px;	width: 208px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form18_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 89px;	top: 504px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form19_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 587px;	top: 631px;	width: 281px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form20_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 587px;	top: 668px;	width: 281px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form21_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 649px;	top: 704px;	width: 219px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form22_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 854px;	top: 784px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form23_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 223px;	top: 833px;	width: 391px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form24_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 833px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form25_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 223px;	top: 924px;	width: 391px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form26_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 924px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form27_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 223px;	top: 961px;	width: 391px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form28_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 961px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form29_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 223px;	top: 998px;	width: 182px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form30_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 462px;	top: 998px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form31_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 998px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form14_2 { z-index:4; }
#form18_2 { z-index:3; }
#form22_2 { z-index:2; }

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts2" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_wo;
	src: url("fonts/HelveticaNeueLTStd-Bd_wo.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_wp;
	src: url("fonts/HelveticaNeueLTStd-It_wp.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_wq;
	src: url("fonts/HelveticaNeueLTStd-Roman_wq.woff") format("woff");
}

@font-face {
	font-family: OCRAStd_wn;
	src: url("fonts/OCRAStd_wn.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg2Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg2" style="-webkit-user-select: none;"><object width="933" height="1209" data="2/2.svg" type="image/svg+xml" id="pdf2" style="width:933px; height:1209px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_2" class="t s0_2">850212 </span>
<span id="t2_2" class="t s1_2">Name </span><span id="t3_2" class="t s2_2">(not your trade name) </span><span id="t4_2" class="t s1_2">Employer identification number (EIN) </span>





<span id="t5_2" class="t s3_2">– </span>
<span id="t6_2" class="t s4_2">Part 5: </span><span id="t7_2" class="t s5_2">Report your FUTA tax liability by quarter only if line 12 is more than $500. If not, go to Part 6. </span>
<span id="t8_2" class="t s6_2">16 </span><span id="t9_2" class="t s6_2">Report the amount of your FUTA tax liability for each quarter; do NOT enter the amount you deposited. If you had no liability for </span>
<span id="ta_2" class="t s6_2">a quarter, leave the line blank. </span>
<span id="tb_2" class="t s6_2">16a 1st quarter </span><span id="tc_2" class="t s7_2">(January 1 – March 31) </span><span id="td_2" class="t s7_2">. </span><span id="te_2" class="t s7_2">. </span><span id="tf_2" class="t s7_2">. </span><span id="tg_2" class="t s7_2">. </span><span id="th_2" class="t s7_2">. </span><span id="ti_2" class="t s7_2">. </span><span id="tj_2" class="t s7_2">. </span><span id="tk_2" class="t s7_2">. </span><span id="tl_2" class="t s7_2">. </span><span id="tm_2" class="t s6_2">16a </span>
<span id="tn_2" class="t s8_2">. </span>
<span id="to_2" class="t s6_2">16b </span><span id="tp_2" class="t s6_2">2nd quarter </span><span id="tq_2" class="t s7_2">(April 1 – June 30) </span><span id="tr_2" class="t s7_2">. </span><span id="ts_2" class="t s7_2">. </span><span id="tt_2" class="t s7_2">. </span><span id="tu_2" class="t s7_2">. </span><span id="tv_2" class="t s7_2">. </span><span id="tw_2" class="t s7_2">. </span><span id="tx_2" class="t s7_2">. </span><span id="ty_2" class="t s7_2">. </span><span id="tz_2" class="t s7_2">. </span><span id="t10_2" class="t s7_2">. </span><span id="t11_2" class="t s6_2">16b </span>
<span id="t12_2" class="t s8_2">. </span>
<span id="t13_2" class="t s6_2">16c 3rd quarter </span><span id="t14_2" class="t s7_2">(July 1 – September 30) </span><span id="t15_2" class="t s7_2">. </span><span id="t16_2" class="t s7_2">. </span><span id="t17_2" class="t s7_2">. </span><span id="t18_2" class="t s7_2">. </span><span id="t19_2" class="t s7_2">. </span><span id="t1a_2" class="t s7_2">. </span><span id="t1b_2" class="t s7_2">. </span><span id="t1c_2" class="t s7_2">. </span><span id="t1d_2" class="t s6_2">16c </span>
<span id="t1e_2" class="t s8_2">. </span>
<span id="t1f_2" class="t s6_2">16d </span><span id="t1g_2" class="t s6_2">4th quarter </span><span id="t1h_2" class="t s7_2">(October 1 – December 31) </span><span id="t1i_2" class="t s7_2">. </span><span id="t1j_2" class="t s7_2">. </span><span id="t1k_2" class="t s7_2">. </span><span id="t1l_2" class="t s7_2">. </span><span id="t1m_2" class="t s7_2">. </span><span id="t1n_2" class="t s7_2">. </span><span id="t1o_2" class="t s7_2">. </span><span id="t1p_2" class="t s6_2">16d </span>
<span id="t1q_2" class="t s8_2">. </span>
<span id="t1r_2" class="t s6_2">17 </span><span id="t1s_2" class="t s6_2">Total tax liability for the year </span><span id="t1t_2" class="t s7_2">(lines 16a + 16b + 16c + 16d = line 17) </span><span id="t1u_2" class="t s6_2">17 </span>
<span id="t1v_2" class="t s8_2">. </span>
<span id="t1w_2" class="t s6_2">Total must equal line 12. </span>
<span id="t1x_2" class="t s4_2">Part 6: </span><span id="t1y_2" class="t s5_2">May we speak with your third-party designee? </span>
<span id="t1z_2" class="t v0_2 s6_2">Do you want to allow an employee, a paid tax preparer, or another person to discuss this return with the IRS? See the instructions </span>
<span id="t20_2" class="t v0_2 s6_2">for details. </span>
<span id="t21_2" class="t s6_2">Yes. </span><span id="t22_2" class="t s7_2">Designee’s name and phone number </span>
<span id="t23_2" class="t s7_2">Select a 5-digit personal identification number (PIN) to use when talking to the IRS. </span>
<span id="t24_2" class="t s6_2">No. </span>
<span id="t25_2" class="t s4_2">Part 7: </span><span id="t26_2" class="t s5_2">Sign here. You MUST complete both pages of this form and SIGN it. </span>
<span id="t27_2" class="t s7_2">Under penalties of perjury, I declare that I have examined this return, including accompanying schedules and statements, and to the </span>
<span id="t28_2" class="t s7_2">best of my knowledge and belief, it is true, correct, and complete, and that no part of any payment made to a state unemployment </span>
<span id="t29_2" class="t s7_2">fund claimed as a credit was, or is to be, deducted from the payments made to employees. Declaration of preparer (other than </span>
<span id="t2a_2" class="t s7_2">taxpayer) is based on all information of which preparer has any knowledge. </span>


<span id="t2b_2" class="t s9_2">Sign your  <p style="position: absolute; left: 93px; top: 6px;"><?php echo htmlspecialchars($get_userlist[0]['first_name']."". $get_userlist[0]['last_name'], ENT_QUOTES, 'UTF-8'); ?></p></span>




<span id="t2c_2" class="t s9_2">name here </span>


<span id="t2d_2" class="t s7_2">Date <p style="position: absolute; top: -2px; left: 60px;"><?php echo date('m')."/".date('d')."/".gmdate('Y')." "; ?></p></span><span id="t2e_2" class="t s7_2">/ </span><span id="t2f_2" class="t s7_2">/ </span>


<span id="t2g_2" class="t s7_2">Print your </span>
<span id="t2h_2" class="t s7_2">name here </span>
<span id="t2i_2" class="t s7_2">Print your </span>
<span id="t2j_2" class="t s7_2">title here </span>
<span id="t2k_2" class="t s7_2">Best daytime phone </span>
<span id="t2l_2" class="t s9_2">Paid Preparer Use Only </span><span id="t2m_2" class="t s7_2">Check if you are self-employed </span>
<span id="t2n_2" class="t s7_2">Preparer’s name </span><span id="t2o_2" class="t v1_2 sa_2">PTIN </span>
<span id="t2p_2" class="t s7_2">Preparer’s </span>
<span id="t2q_2" class="t s7_2">signature </span><span id="t2r_2" class="t s7_2">Date </span><span id="t2s_2" class="t s7_2">/ </span><span id="t2t_2" class="t s7_2">/ </span>
<span id="t2u_2" class="t s7_2">Firm’s name (or yours </span>
<span id="t2v_2" class="t s7_2">if self-employed) </span><span id="t2w_2" class="t s7_2">EIN </span>
<span id="t2x_2" class="t s7_2">Address </span><span id="t2y_2" class="t s7_2">Phone </span>
<span id="t2z_2" class="t s7_2">City </span><span id="t30_2" class="t s7_2">State </span><span id="t31_2" class="t s7_2">ZIP code </span>
<span id="t32_2" class="t sb_2">Page </span><span id="t33_2" class="t s9_2">2 </span><span id="t34_2" class="t sb_2">Form </span><span id="t35_2" class="t s9_2">940 </span><span id="t36_2" class="t sb_2">(2023) </span></div>
<!-- End text definitions -->


<!-- Begin Form Data -->
<input id="form1_2" type="text" tabindex="53" value="" data-objref="282 0 R" data-field-name="topmostSubform[0].Page2[0].f1_3[0]"/>
<input id="form2_2" type="text" tabindex="54" maxlength="2" value="" data-objref="283 0 R" data-field-name="topmostSubform[0].Page2[0].f1_1[0]"/>
<input id="form3_2" type="text" tabindex="55" maxlength="7" value="" data-objref="284 0 R" data-field-name="topmostSubform[0].Page2[0].f1_2[0]"/>
<input id="form4_2" type="text" tabindex="56" value="" data-objref="285 0 R" data-field-name="topmostSubform[0].Page2[0].f2_1[0]"/>
<input id="form5_2" type="text" tabindex="57" maxlength="2" value="" data-objref="286 0 R" data-field-name="topmostSubform[0].Page2[0].f2_2[0]"/>
<input id="form6_2" type="text" tabindex="58" value="" data-objref="287 0 R" data-field-name="topmostSubform[0].Page2[0].f2_3[0]"/>
<input id="form7_2" type="text" tabindex="59" maxlength="2" value="" data-objref="288 0 R" data-field-name="topmostSubform[0].Page2[0].f2_4[0]"/>
<input id="form8_2" type="text" tabindex="60" value="" data-objref="289 0 R" data-field-name="topmostSubform[0].Page2[0].f2_5[0]"/>
<input id="form9_2" type="text" tabindex="61" maxlength="2" value="" data-objref="290 0 R" data-field-name="topmostSubform[0].Page2[0].f2_6[0]"/>
<input id="form10_2" type="text" tabindex="62" value="" data-objref="291 0 R" data-field-name="topmostSubform[0].Page2[0].f2_7[0]"/>
<input id="form11_2" type="text" tabindex="63" maxlength="2" value="" data-objref="292 0 R" data-field-name="topmostSubform[0].Page2[0].f2_8[0]"/>
<input id="form12_2" type="text" tabindex="64" value="" data-objref="293 0 R" data-field-name="topmostSubform[0].Page2[0].f2_9[0]"/>
<input id="form13_2" type="text" tabindex="65" maxlength="2" value="" data-objref="294 0 R" data-field-name="topmostSubform[0].Page2[0].f2_10[0]"/>
<input id="form14_2" type="checkbox" tabindex="66" value="1" data-objref="295 0 R" data-field-name="topmostSubform[0].Page2[0].c2_1[0]" imageName="2/form/295 0 R" images="110100"/>
<input id="form15_2" type="text" tabindex="67" value="" data-objref="296 0 R" data-field-name="topmostSubform[0].Page2[0].f2_11[0]"/>
<input id="form16_2" type="text" tabindex="68" value="" data-objref="297 0 R" data-field-name="topmostSubform[0].Page2[0].f2_12[0]"/>
<input id="form17_2" type="text" tabindex="69" maxlength="5" value="" data-objref="298 0 R" data-field-name="topmostSubform[0].Page2[0].f2_13[0]"/>
<input id="form18_2" type="checkbox" tabindex="70" value="2" data-objref="299 0 R" data-field-name="topmostSubform[0].Page2[0].c2_1[1]" imageName="2/form/299 0 R" images="110100"/>
<input id="form19_2" type="text" tabindex="71" value="" data-objref="300 0 R" data-field-name="topmostSubform[0].Page2[0].f2_14[0]"/>
<input id="form20_2" type="text" tabindex="72" value="" data-objref="301 0 R" data-field-name="topmostSubform[0].Page2[0].f2_15[0]"/>
<input id="form21_2" type="text" tabindex="73" value="" data-objref="302 0 R" data-field-name="topmostSubform[0].Page2[0].f2_16[0]"/>
<input id="form22_2" type="checkbox" tabindex="74" value="1" data-objref="303 0 R" data-field-name="topmostSubform[0].Page2[0].c2_2[0]" imageName="2/form/303 0 R" images="110100"/>
<input id="form23_2" type="text" tabindex="75" value="" data-objref="304 0 R" data-field-name="topmostSubform[0].Page2[0].f2_17[0]"/>
<input id="form24_2" type="text" tabindex="76" maxlength="11" value="" data-objref="305 0 R" data-field-name="topmostSubform[0].Page2[0].f2_18[0]"/>
<input id="form25_2" type="text" tabindex="77" value="" data-objref="306 0 R" data-field-name="topmostSubform[0].Page2[0].f2_19[0]"/>
<input id="form26_2" type="text" tabindex="78" maxlength="10" value="" data-objref="307 0 R" data-field-name="topmostSubform[0].Page2[0].f2_20[0]"/>
<input id="form27_2" type="text" tabindex="79" value="" data-objref="308 0 R" data-field-name="topmostSubform[0].Page2[0].f2_21[0]"/>
<input id="form28_2" type="text" tabindex="80" value="" data-objref="309 0 R" data-field-name="topmostSubform[0].Page2[0].f2_22[0]"/>
<input id="form29_2" type="text" tabindex="81" value="" data-objref="310 0 R" data-field-name="topmostSubform[0].Page2[0].f2_23[0]"/>
<input id="form30_2" type="text" tabindex="82" maxlength="2" value="" data-objref="311 0 R" data-field-name="topmostSubform[0].Page2[0].f2_24[0]"/>
<input id="form31_2" type="text" tabindex="83" maxlength="10" value="" data-objref="312 0 R" data-field-name="topmostSubform[0].Page2[0].f2_25[0]"/>

<!-- End Form Data -->

</div>

</div>
</div>
<div id="page3" style="width: 933px; height: 1209px; margin-top:20px;     margin-left: 600px;     " class="page">
<div class="page-inner" style="width: 933px; height: 1209px;">

<div id="p3" class="pageArea" style="overflow: hidden; position: relative; width: 933px; height: 1209px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">

 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_3{
fill: none;
stroke: #000;
stroke-width: 3.055;
stroke-miterlimit: 10;
}
.g1_3{
fill: #000;
}
.g2_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
stroke-dasharray: 7,4;
}
.g3_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
.g4_3{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,55H880.4M54.6,128.3H880.4" class="g0_3"/>
<path d="M55,481.3h55v-55H55v55Z" class="g1_3"/>
<path d="M54.6,846.4H880.4" class="g2_3"/>
<path d="M187,870.4v28.3M54.6,925.8H187.8M187,897.9v28.7m-.4,-.8H759.4" class="g3_3"/>
<path d="M758.2,889.2H880.4" class="g4_3"/>
<path d="M759,870.4v19.1m-.5,36.3H880.7m-121.4,-37v37.8" class="g3_3"/>
<path d="M54.6,980.8H77.4m-.8,0H330.4" class="g4_3"/>
<path d="M328.5,925.8H660.4m-331.9,55H660.4M330,924.3v58.1M658.5,925.8H825.4m-166.9,55H825.4M660,924.3v58.1M824.6,925.8h56.9m-56.9,55h56.9M880,924.3v58.1" class="g0_3"/>
<path d="M825,924.3v58.1m-495,-2v110.8m21.6,-73.7H880.4m-528.8,36.7H880.4M55,1090.8H880" class="g4_3"/>
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

#t1_3{left:55px;bottom:1114px;letter-spacing:0.18px;}
#t2_3{left:55px;bottom:1092px;letter-spacing:0.19px;}
#t3_3{left:55px;bottom:1044px;letter-spacing:0.17px;}
#t4_3{left:55px;bottom:1022px;letter-spacing:0.13px;}
#t5_3{left:55px;bottom:1005px;letter-spacing:0.13px;}
#t6_3{left:55px;bottom:989px;letter-spacing:0.13px;}
#t7_3{left:55px;bottom:972px;letter-spacing:0.13px;}
#t8_3{left:55px;bottom:943px;letter-spacing:0.17px;}
#t9_3{left:55px;bottom:921px;letter-spacing:0.13px;}
#ta_3{left:55px;bottom:904px;letter-spacing:0.13px;}
#tb_3{left:125px;bottom:904px;letter-spacing:0.1px;}
#tc_3{left:172px;bottom:904px;letter-spacing:0.12px;}
#td_3{left:55px;bottom:888px;letter-spacing:0.12px;}
#te_3{left:55px;bottom:872px;letter-spacing:0.12px;}
#tf_3{left:55px;bottom:855px;letter-spacing:0.13px;}
#tg_3{left:55px;bottom:839px;letter-spacing:0.12px;}
#th_3{left:343px;bottom:839px;letter-spacing:0.14px;}
#ti_3{left:55px;bottom:822px;letter-spacing:0.13px;}
#tj_3{left:258px;bottom:822px;letter-spacing:0.12px;}
#tk_3{left:55px;bottom:806px;letter-spacing:0.12px;}
#tl_3{left:55px;bottom:789px;letter-spacing:0.13px;}
#tm_3{left:58px;bottom:722px;}
#tn_3{left:77px;bottom:731px;}
#to_3{left:59px;bottom:728px;letter-spacing:-0.05px;}
#tp_3{left:119px;bottom:763px;letter-spacing:0.14px;}
#tq_3{left:119px;bottom:747px;letter-spacing:0.13px;}
#tr_3{left:119px;bottom:731px;letter-spacing:0.13px;}
#ts_3{left:119px;bottom:714px;letter-spacing:0.12px;}
#tt_3{left:345px;bottom:714px;letter-spacing:0.12px;}
#tu_3{left:55px;bottom:698px;letter-spacing:0.11px;}
#tv_3{left:121px;bottom:698px;letter-spacing:0.12px;}
#tw_3{left:484px;bottom:1044px;letter-spacing:0.16px;}
#tx_3{left:484px;bottom:1022px;letter-spacing:0.14px;}
#ty_3{left:816px;bottom:1022px;letter-spacing:0.1px;}
#tz_3{left:484px;bottom:1005px;letter-spacing:0.12px;}
#t10_3{left:484px;bottom:989px;letter-spacing:0.11px;}
#t11_3{left:665px;bottom:989px;letter-spacing:0.14px;}
#t12_3{left:778px;bottom:989px;letter-spacing:0.12px;}
#t13_3{left:484px;bottom:972px;letter-spacing:0.12px;}
#t14_3{left:484px;bottom:956px;letter-spacing:0.12px;}
#t15_3{left:484px;bottom:940px;letter-spacing:0.12px;}
#t16_3{left:484px;bottom:923px;letter-spacing:0.12px;}
#t17_3{left:484px;bottom:901px;letter-spacing:0.15px;}
#t18_3{left:642px;bottom:901px;letter-spacing:0.12px;}
#t19_3{left:484px;bottom:884px;letter-spacing:0.13px;}
#t1a_3{left:484px;bottom:862px;letter-spacing:0.15px;}
#t1b_3{left:686px;bottom:862px;letter-spacing:0.13px;}
#t1c_3{left:484px;bottom:845px;letter-spacing:0.14px;}
#t1d_3{left:484px;bottom:823px;}
#t1e_3{left:500px;bottom:823px;letter-spacing:0.13px;}
#t1f_3{left:484px;bottom:806px;letter-spacing:0.12px;}
#t1g_3{left:484px;bottom:790px;letter-spacing:0.13px;}
#t1h_3{left:484px;bottom:773px;letter-spacing:0.13px;}
#t1i_3{left:484px;bottom:757px;letter-spacing:0.13px;}
#t1j_3{left:484px;bottom:734px;}
#t1k_3{left:500px;bottom:734px;letter-spacing:0.13px;}
#t1l_3{left:484px;bottom:718px;letter-spacing:0.12px;}
#t1m_3{left:484px;bottom:702px;letter-spacing:0.14px;}
#t1n_3{left:484px;bottom:679px;letter-spacing:0.12px;}
#t1o_3{left:527px;bottom:679px;letter-spacing:0.12px;}
#t1p_3{left:484px;bottom:663px;letter-spacing:0.13px;}
#t1q_3{left:222px;bottom:364px;letter-spacing:0.17px;}
#t1r_3{left:69px;bottom:315.7px;letter-spacing:-0.18px;}
#t1s_3{left:73px;bottom:303px;letter-spacing:-0.22px;}
#t1t_3{left:55px;bottom:295px;letter-spacing:-0.03px;}
#t1u_3{left:55px;bottom:284px;letter-spacing:-0.03px;}
#t1v_3{left:389px;bottom:311px;letter-spacing:0.2px;}
#t1w_3{left:321px;bottom:289px;letter-spacing:0.11px;}
#t1x_3{left:770px;bottom:322px;letter-spacing:-0.17px;}
#t1y_3{left:780px;bottom:278px;letter-spacing:-0.28px;}
#t1z_3{left:819px;bottom:278px;letter-spacing:-0.3px;}
#t20_3{left:63px;bottom:266px;}
#t21_3{left:77px;bottom:266px;letter-spacing:-0.14px;}
#t22_3{left:123px;bottom:226px;}
#t23_3{left:335px;bottom:266px;}
#t24_3{left:352px;bottom:252px;letter-spacing:0.14px;}
#t25_3{left:352px;bottom:240px;letter-spacing:-0.18px;}
#t26_3{left:541px;bottom:240px;}
#t27_3{left:545px;bottom:240px;letter-spacing:-0.19px;}
#t28_3{left:648px;bottom:240px;letter-spacing:-0.13px;}
#t29_3{left:725px;bottom:266px;letter-spacing:-0.13px;}
#t2a_3{left:838px;bottom:266px;letter-spacing:-0.16px;}
#t2b_3{left:335px;bottom:211px;}
#t2c_3{left:352px;bottom:211px;letter-spacing:-0.13px;}
#t2d_3{left:352px;bottom:176px;letter-spacing:-0.14px;}
#t2e_3{left:352px;bottom:139px;letter-spacing:-0.13px;}

.s0_3{font-size:21px;font-family:ITCFranklinGothicStd-Demi_wr;color:#000;}
.s1_3{font-size:18px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s2_3{font-size:15px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s3_3{font-size:15px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s4_3{font-size:15px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
.s5_3{font-size:48px;font-family:AdobePiStd_7;color:#FFF;}
.s6_3{font-size:34px;font-family:ITCFranklinGothicStd-Demi_wr;color:#000;}
.s7_3{font-size:10px;font-family:HelveticaNeueLTStd-Blk_9;color:#FFF;}
.s8_3{font-size:11px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s9_3{font-size:31px;font-family:HelveticaNeueLTStd-BlkCn_ws;color:#000;}
.sa_3{font-size:10px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.sb_3{font-size:12px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sc_3{font-size:31px;font-family:HelveticaNeueLTStd-BdOu_a;color:#000;}
.sd_3{font-size:31px;font-family:HelveticaNeueLTStd-Blk_9;color:#000;}
.se_3{font-size:11px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sf_3{font-size:10px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.t.v0_3{transform:scaleX(1.166);}
.t.v1_3{transform:scaleX(0.979);}
.t.v2_3{transform:scaleX(0.915);}
.t.m0_3{transform:matrix(0,-0.9,1,0,0,0);}
#form1_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 663px;	top: 940px;	width: 159px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 825px;	top: 940px;	width: 51px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 89px;	top: 955px;	width: 31px;	height: 23px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 132px;	top: 955px;	width: 74px;	height: 23px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form5_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 352px;	top: 995px;	width: 384px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form6_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 352px;	top: 1031px;	width: 527px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 352px;	top: 1068px;	width: 527px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts3" type="text/css" >

@font-face {
	font-family: AdobePiStd_7;
	src: url("fonts/AdobePiStd_7.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-BdOu_a;
	src: url("fonts/HelveticaNeueLTStd-BdOu_a.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Bd_wo;
	src: url("fonts/HelveticaNeueLTStd-Bd_wo.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-BlkCn_ws;
	src: url("fonts/HelveticaNeueLTStd-BlkCn_ws.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Blk_9;
	src: url("fonts/HelveticaNeueLTStd-Blk_9.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_wp;
	src: url("fonts/HelveticaNeueLTStd-It_wp.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_wq;
	src: url("fonts/HelveticaNeueLTStd-Roman_wq.woff") format("woff");
}

@font-face {
	font-family: ITCFranklinGothicStd-Demi_wr;
	src: url("fonts/ITCFranklinGothicStd-Demi_wr.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg3Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg3" style="-webkit-user-select: none;"><object width="933" height="1209" data="3/3.svg" type="image/svg+xml" id="pdf3" style="width:933px; height:1209px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_3" class="t s0_3">Form 940-V, </span>
<span id="t2_3" class="t s0_3">Payment Voucher </span>
<span id="t3_3" class="t s1_3">Purpose of Form </span>
<span id="t4_3" class="t s2_3">Complete Form 940-V if you’re making a payment with </span>
<span id="t5_3" class="t s2_3">Form 940. We will use the completed voucher to credit </span>
<span id="t6_3" class="t s2_3">your payment more promptly and accurately, and to </span>
<span id="t7_3" class="t s2_3">improve our service to you. </span>
<span id="t8_3" class="t s1_3">Making Payments With Form 940 </span>
<span id="t9_3" class="t s2_3">To avoid a penalty, make your payment with your 2023 </span>
<span id="ta_3" class="t s2_3">Form 940 </span><span id="tb_3" class="t s3_3">only if </span><span id="tc_3" class="t s2_3">your FUTA tax for the fourth quarter </span>
<span id="td_3" class="t s2_3">(plus any undeposited amounts from earlier quarters) is </span>
<span id="te_3" class="t s2_3">$500 or less. If your total FUTA tax after adjustments </span>
<span id="tf_3" class="t s2_3">(Form 940, line 12) is more than $500, you must make </span>
<span id="tg_3" class="t s2_3">deposits by electronic funds transfer. See </span><span id="th_3" class="t s4_3">When Must </span>
<span id="ti_3" class="t s4_3">You Deposit Your FUTA Tax? </span><span id="tj_3" class="t s2_3">in the Instructions for Form </span>
<span id="tk_3" class="t s2_3">940. Also see sections 11 and 14 of Pub. 15 for more </span>
<span id="tl_3" class="t s2_3">information about deposits. </span>
<span id="tm_3" class="t v0_3 s5_3">▲ </span>
<span id="tn_3" class="t s6_3">! </span>
<span id="to_3" class="t s7_3">CAUTION </span>
<span id="tp_3" class="t s4_3">Use Form 940-V when making any payment with </span>
<span id="tq_3" class="t s4_3">Form 940. However, if you pay an amount with </span>
<span id="tr_3" class="t s4_3">Form 940 that should’ve been deposited, you </span>
<span id="ts_3" class="t s4_3">may be subject to a penalty. See </span><span id="tt_3" class="t s2_3">Deposit </span>
<span id="tu_3" class="t s2_3">Penalties </span><span id="tv_3" class="t s4_3">in section 11 of Pub. 15. </span>
<span id="tw_3" class="t s1_3">Specific Instructions </span>
<span id="tx_3" class="t s3_3">Box 1—Employer identification number (EIN). </span><span id="ty_3" class="t s2_3">If you </span>
<span id="tz_3" class="t s2_3">don’t have an EIN, you may apply for one online by </span>
<span id="t10_3" class="t s2_3">visiting the IRS website at </span><span id="t11_3" class="t s4_3">www.irs.gov/EIN</span><span id="t12_3" class="t s2_3">. You may also </span>
<span id="t13_3" class="t s2_3">apply for an EIN by faxing or mailing Form SS-4 to the </span>
<span id="t14_3" class="t s2_3">IRS. If you haven’t received your EIN by the due date of </span>
<span id="t15_3" class="t s2_3">Form 940, write “Applied For” and the date you applied in </span>
<span id="t16_3" class="t s2_3">this entry space. </span>
<span id="t17_3" class="t s3_3">Box 2—Amount paid. </span><span id="t18_3" class="t s2_3">Enter the amount paid with </span>
<span id="t19_3" class="t s2_3">Form 940. </span>
<span id="t1a_3" class="t s3_3">Box 3—Name and address. </span><span id="t1b_3" class="t s2_3">Enter your name and </span>
<span id="t1c_3" class="t s2_3">address as shown on Form 940. </span>
<span id="t1d_3" class="t s2_3">• </span><span id="t1e_3" class="t s2_3">Enclose your check or money order made payable to </span>
<span id="t1f_3" class="t s2_3">“United States Treasury.” Be sure to enter your EIN, </span>
<span id="t1g_3" class="t s2_3">“Form 940,” and “2023” on your check or money order. </span>
<span id="t1h_3" class="t s2_3">Don’t send cash. Don’t staple Form 940-V or your </span>
<span id="t1i_3" class="t s2_3">payment to Form 940 (or to each other). </span>
<span id="t1j_3" class="t s2_3">• </span><span id="t1k_3" class="t s2_3">Detach Form 940-V and send it with your payment and </span>
<span id="t1l_3" class="t s2_3">Form 940 to the address provided in the Instructions for </span>
<span id="t1m_3" class="t s2_3">Form 940. </span>
<span id="t1n_3" class="t s3_3">Note: </span><span id="t1o_3" class="t s2_3">You must also complete the entity information </span>
<span id="t1p_3" class="t s2_3">above Part 1 on Form 940. </span>
<span id="t1q_3" class="t s1_3">Detach Here and Mail With Your Payment and Form 940. </span>
<span id="t1r_3" class="t m0_3 s8_3">Form </span>
<span id="t1s_3" class="t s9_3">940-V </span>
<span id="t1t_3" class="t sa_3">Department of the Treasury </span>
<span id="t1u_3" class="t sa_3">Internal Revenue Service </span>
<span id="t1v_3" class="t s0_3">Payment Voucher </span>
<span id="t1w_3" class="t sb_3">Don’t staple or attach this voucher to your payment. </span>
<span id="t1x_3" class="t s8_3">OMB No. 1545-0028 </span>
<span id="t1y_3" class="t sc_3">20</span><span id="t1z_3" class="t sd_3">23 </span>
<span id="t20_3" class="t se_3">1 </span><span id="t21_3" class="t s8_3">Enter your employer identification number (EIN). </span>
<span id="t22_3" class="t s2_3">– </span>
<span id="t23_3" class="t se_3">2 </span>
<span id="t24_3" class="t s3_3">Enter the amount of your payment. </span>
<span id="t25_3" class="t v1_3 sa_3">Make your check or money order payable to </span><span id="t26_3" class="t v1_3 sa_3">“</span><span id="t27_3" class="t v1_3 sf_3">United States Treasury</span><span id="t28_3" class="t v1_3 sa_3">.” </span>
<span id="t29_3" class="t s8_3">Dollars </span><span id="t2a_3" class="t s8_3">Cents </span>
<span id="t2b_3" class="t se_3">3 </span><span id="t2c_3" class="t s8_3">Enter your business name (individual name if sole proprietor). </span>
<span id="t2d_3" class="t s8_3">Enter your address. </span>
<span id="t2e_3" class="t v2_3 s8_3">Enter your city, state, and ZIP code; or your city, foreign country name, foreign province/county, and foreign postal code. </span></div>
<!-- End text definitions -->


<!-- Begin Form Data -->
<input id="form1_3" type="text" tabindex="86" value="" data-objref="370 0 R" data-field-name="topmostSubform[0].Page3[0].f3_1[0]"/>
<input id="form2_3" type="text" tabindex="87" maxlength="3" value="" data-objref="371 0 R" data-field-name="topmostSubform[0].Page3[0].f3_2[0]"/>
<input id="form3_3" type="text" tabindex="84" maxlength="2" value="" data-objref="374 0 R" data-field-name="topmostSubform[0].Page3[0].EIN_ReadOrder[0].f1_1[0]"/>
<input id="form4_3" type="text" tabindex="85" maxlength="7" value="" data-objref="375 0 R" data-field-name="topmostSubform[0].Page3[0].EIN_ReadOrder[0].f1_2[0]"/>
<input id="form5_3" type="text" tabindex="88" value="" data-objref="372 0 R" data-field-name="topmostSubform[0].Page3[0].f1_3[0]"/>
<input id="form6_3" type="text" tabindex="89" value="" data-objref="373 0 R" data-field-name="topmostSubform[0].Page3[0].f3_4[0]"/>
<input id="form7_3" type="text" tabindex="90" value="" data-objref="277 0 R" data-field-name="topmostSubform[0].Page3[0].f3_5[0]"/>

<!-- End Form Data -->

</div>

</div>
</div>
<div id="page4" style="width: 933px; height: 1209px; margin-top:20px;     margin-left:600px;      " class="page">
<div class="page-inner" style="width: 933px; height: 1209px;">

<div id="p4" class="pageArea" style="overflow: hidden; position: relative; width: 933px; height: 1209px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">


 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_4{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,73.3H880.4" class="g0_4"/>
</svg>




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







(function () {
    "use strict";

    var FormVuAPI = {};

    FormVuAPI.extractFormValues = function () {
        const inputs = document.getElementsByTagName("input");
        const textareas = document.getElementsByTagName("textarea");
        const selects = document.getElementsByTagName("select");

        const texts = [];
        const checks = [];
        const checkGroups = [];
        const radios = [];
        const choices = [];

        for (const inp of inputs) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                const type = inp.type.toUpperCase();
                if (type === "TEXT" || type === "PASSWORD") {
                    texts.push(inp);
                } else if (type === "CHECKBOX") {
                    // Handle checkbox groups
                    if (Object.keys(idrform.getCheckboxGroup(inp.dataset.fieldName)).length > 1)
                        checkGroups.push(inp);
                    else checks.push(inp);
                } else if (type === "RADIO") {
                    // Filter out unisons
                    if (inp.name === inp.dataset.fieldName) radios.push(inp);
                }
            }
        }
        for (const inp of textareas) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                texts.push(inp);
            }
        }
        for (const inp of selects) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                choices.push(inp);
            }
        }

        const output = {};

        for (const item of texts) {
            const fieldText = item.value;
            const fieldName = item.getAttribute("data-field-name");
            output[fieldName] = fieldText;
        }

        for (const item of checkGroups) {
            const fieldName = item.getAttribute("data-field-name");
            const isChecked = item.checked;
            const value = item.value

            if (isChecked) {
                output[fieldName] = value;
            }
        }

        for (const item of checks) {
            const isChecked = item.checked;
            const fieldName = item.getAttribute("data-field-name");
            output[fieldName] = isChecked;
        }

        for (const item of choices) {
            const selected = item.value;
            const fieldName = item.getAttribute("data-field-name");
            const multiple =  item.getAttribute("multiple");
            if (multiple) {
                const options = item.children;
                const selectedItems = [];
                for (const option of options) {
                    if (option.selected) {
                        selectedItems.push(option.value);
                    }
                }
                output[fieldName] = selectedItems;
            } else {
                output[fieldName] = selected;
            }
        }

        for (const radio of radios) {
            const fieldName = radio.getAttribute("data-field-name");
            const isChecked = radio.checked;
            const value = radio.value;

            if (isChecked) {
                output[fieldName] = value;
            }
        }
        return output;
    };

    /**
     * Takes a JSON input in the format of formdata.json and updates the relevant
     * HTML fields values to match the provided values.
     *
     * @param {String|Object} formValues The values to be inserted into the HTML
     * @param {boolean} resetForm Whether a form reset should be called before inserting the values
     * @returns {boolean} true on method completion, false on invalid input
     */
    FormVuAPI.insertFormValues = function (formValues, resetForm) {
        if (typeof formValues === "string") {
            formValues = JSON.parse(formValues);
        } else if (!(formValues instanceof Object)) {
            console.error('Form values provided to insertFormValues is not an Object or JSON String');
            return false;
        }

        if (resetForm) {
            idrform.doc.resetForm();
        }

        for (let key of Object.keys(formValues)) {
            let val = formValues[key];
            if (val.inputType) {
                switch (val.inputType) {
                    case "radio button":
                        _handleRadioButtonInsert(val);
                        break;
                    case "checkbox":
                    case "checkbox group":
                        _handleCheckboxInsert(val);
                        break;
                    case "combobox":
                        _handleComboboxInsert(val);
                        break;
                    case "listbox":
                    case "listbox multi":
                        _handleListboxInsert(val);
                        break;
                    case "multiline text":
                        _handleMultilineTextInsert(val);
                        break;
                    default:
                        _handleGenericInputInsert(val);
                        break;
                }
            }
        }

        return true;
    };

    /**
     * Escapes the provided string for use as a CSS selector
     * Backslashes need to be escaped in order to be used in CSS selectors
     * (otherwise they will fail)
     *
     * @param {String} string the string to be escaped
     * @returns {String} an escaped string ready for use as a CSS selector
     * @private
     */
    let escapeForCssSelector = function(string) {
        return string.replaceAll('\\','\\\\');
    }

    /**
     * Selects the relevant radio button of the provided Form Field JSON object
     * Refreshes the AP images so the change is displayed
     * If the radio button is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleRadioButtonInsert = function(jsonObj) {
        let domRadioButtons = document.querySelectorAll('input[type=radio][data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref]');
        if (!domRadioButtons) {
            console.warn("Failed to find <input type=\"radio\"> " + jsonObj.fieldName);
            return;
        }
        domRadioButtons.forEach(element => {
            if (element.dataset.objref == jsonObj.objref) {
                element.checked = jsonObj.value;
                element.value = jsonObj.value;
            } else {
                element.checked = false;
            }
            if ("refreshApImage" in window && element.dataset.imageIndex) refreshApImage(parseInt(element.dataset.imageIndex));
        });
    }

    /**
     * Ticks the relevant checkbox of the provided Form Field JSON object
     * Refreshes the AP images so the change is displayed
     * If the checkbox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleCheckboxInsert = function(jsonObj) {
        let domCheckboxes = document.querySelectorAll('input[type=checkbox][data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref]');
        if (!domCheckboxes) {
            console.warn("Failed to find <input type=\"checkbox\"> " + jsonObj.fieldName);
            return;
        }
        domCheckboxes.forEach(element => {
            if (element.dataset.objref == jsonObj.objref) {
                element.checked = jsonObj.value;
                element.value = jsonObj.value;
            } else {
                element.checked = false;
            }
            if ("refreshApImage" in window && element.dataset.imageIndex) refreshApImage(parseInt(element.dataset.imageIndex));
        });
    };

    /**
     * Selects the relevant combobox option from the provided Form Field JSON object
     * If a value is not an option, a new option will be added with the provided value
     * If the combobox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleComboboxInsert = function(jsonObj) {
        let domCombobox = document.querySelector('select[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domCombobox) {
            console.warn("Failed to find <select> " + jsonObj.fieldName);
            return;
        }

        let options = domCombobox.children;
        let optionFound = false;
        for (let i = 0, ii = options.length; i < ii; i++) {
            let option = options[i];
            if (option.value === jsonObj.value) {
                option.setAttribute("selected", "selected");
                domCombobox.selectedIndex = i;
                optionFound = true;
            } else {
                option.removeAttribute("selected");
            }
        }
        if (!optionFound) {
            const newOpt = document.createElement("option");
            newOpt.text = jsonObj.value;
            newOpt.value = jsonObj.value;
            newOpt.setAttribute("selected", "selected");
            domCombobox.appendChild(newOpt);
        }
        domCombobox.value = jsonObj.value;
    }

    /**
     * Selects the relevant listbox option from the provided Form Field JSON object
     * Unselects any other options
     * If the listbox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleListboxInsert = function(jsonObj) {
        let domListbox = document.querySelector('select[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domListbox) {
            console.warn("Failed to find <select> " + jsonObj.fieldName);
            return;
        }
        let options = domListbox.children;
        for (let i = 0, ii = options.length; i < ii; i++) {
            let option = options[i];

            if (option.value == jsonObj.value || jsonObj.value instanceof Array && jsonObj.value.includes(option.value)) {
                option.selected = true;
                option.setAttribute("selected", "selected");
            } else {
                option.removeAttribute("selected");
            }
        }
    }

    /**
     * Inserts the multiline text from the provided Form Field JSON object
     * If the textarea is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleMultilineTextInsert = function(jsonObj) {
        let domTextArea = document.querySelector('textarea[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domTextArea) {
            console.warn("Failed to find <textarea> " + jsonObj.fieldName);
            return;
        }
        domTextArea.value = jsonObj.value;
    }

    /**
     * Inserts the value of the provided Form Field JSON object into the relevant HTML input
     * Can also insert into textareas if not using single-line text output
     * If the input/textarea is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleGenericInputInsert = function(jsonObj) {
        let domInput = document.querySelector(':is(input,textarea)[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domInput) {
            console.warn("Failed to find <input> or <textarea>" + jsonObj.fieldName);
            return;
        }
        domInput.value = jsonObj.value;
    }

    let setRequestEventHandlers = function(xhr, params) {
        xhr.onreadystatechange = function(event) {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    if (params.success) {
                        params.success(event);
                    }
                } else {
                    if (params.failure) {
                        params.failure(event);
                    } else {
                        console.log(event.target.response);
                    }
                }
            }
        };
    };

    FormVuAPI.submitFormAsMail = function(params) {
        if (typeof params !== 'object') {
            params = {url: params};
        }
        if (!params.url.startsWith('mailto:')) {
            return;
        }
        switch (params.format) {
            case 'formdata':
                alert('The file will be saved in your machine, please attach it to the email');
                downloadFormDataValues(this.extractFormValues());
                openMailToLink(params.url);
                break;
            case 'pdf':
                alert('The file will be saved in your machine, please attach it to the email');
                idrform.app.execMenuItem('SaveAs');
                openMailToLink(params.url);
                break;
            default:
                alert('Unsupported submission format. Submission failed.');
                break;
        }
    };

    let downloadFormDataValues = function(formValues) {
        let formValuesString = "";
        for (var value in formValues) {
            if (formValues.hasOwnProperty(value) && formValues[value] !== undefined) {
                if (formValuesString.length !== 0) {
                    formValuesString += '&';
                }

                formValuesString += encodeURIComponent(value) + '=' + formValues[value];
            }
        }
        let fileDL = document.createElement('a');
        let pdfName = document.getElementById("FDFXFA_PDFName").textContent;
        fileDL.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(formValuesString));
        fileDL.setAttribute('download', pdfName + '.txt');
        fileDL.style.display = 'none';
        document.body.appendChild(fileDL);
        fileDL.click();
        document.body.removeChild(fileDL);
    };

    let openMailToLink = function(target) {
        let mailto = document.createElement('a');
        mailto.setAttribute('href', target);
        mailto.setAttribute('target', "_blank");
        mailto.style.display = 'none';
        document.body.appendChild(mailto);
        mailto.click();
        document.body.removeChild(mailto);
    };

    FormVuAPI.submitFormAsJSON = function (params) {
        let url = typeof params === 'object' ? params.url : params;

        let formValues = {data: this.extractFormValues()};
        let xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.send(JSON.stringify(formValues));
            return xhr;
        }
    };

    FormVuAPI.submitFormAsFormData = function (params) {
        let url = typeof params === 'object' ? params.url : params;

        let formValues = this.extractFormValues();
        let xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);

            let formData = new FormData();
            for (var value in formValues) {
                if (formValues.hasOwnProperty(value) && formValues[value] !== undefined) {
                    formData.append(encodeURIComponent(value), formValues[value]);
                }
            }
            xhr.send(formData);
            return xhr;
        }
    };

    FormVuAPI.submitFormAsPDF = function (params) {
        let url, submitType="formData";
        if (typeof params === 'object') {
            url = params.url;
            submitType = params.submitType || "formData";
        } else {
            url = params;
        }

        const xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);
            const file = idrform.getCompletedFormPDF();
            const fileName = document.querySelector("#FDFXFA_PDFName").textContent;

            if (submitType === "raw") {
                xhr.setRequestHeader("Content-Disposition", `filename="${fileName}"`)
                xhr.send(file);
            } else if (submitType === "formData") {
                const formData = new FormData();
                formData.append("file", file, fileName);
                xhr.send(formData);
            }
            return xhr;
        }
    }

    window.FormVuAPI = FormVuAPI;

}());









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

#t1_4{left:55px;bottom:1138px;letter-spacing:-0.14px;}
#t2_4{left:55px;bottom:1103px;letter-spacing:0.14px;}
#t3_4{left:55px;bottom:1086px;letter-spacing:0.12px;}
#t4_4{left:55px;bottom:1070px;letter-spacing:0.12px;}
#t5_4{left:55px;bottom:1053px;letter-spacing:0.12px;}
#t6_4{left:55px;bottom:1037px;letter-spacing:0.13px;}
#t7_4{left:55px;bottom:1020px;letter-spacing:0.13px;}
#t8_4{left:55px;bottom:1004px;letter-spacing:0.13px;}
#t9_4{left:55px;bottom:988px;letter-spacing:0.12px;}
#ta_4{left:55px;bottom:971px;letter-spacing:0.13px;}
#tb_4{left:322px;bottom:971px;letter-spacing:0.12px;}
#tc_4{left:55px;bottom:955px;letter-spacing:0.12px;}
#td_4{left:55px;bottom:938px;letter-spacing:0.12px;}
#te_4{left:55px;bottom:922px;letter-spacing:0.11px;}
#tf_4{left:55px;bottom:906px;letter-spacing:0.12px;}
#tg_4{left:55px;bottom:889px;letter-spacing:0.12px;}
#th_4{left:70px;bottom:867px;letter-spacing:0.12px;}
#ti_4{left:55px;bottom:850px;letter-spacing:0.12px;}
#tj_4{left:55px;bottom:834px;letter-spacing:0.13px;}
#tk_4{left:55px;bottom:817px;letter-spacing:0.12px;}
#tl_4{left:55px;bottom:801px;letter-spacing:0.12px;}
#tm_4{left:55px;bottom:784px;letter-spacing:0.12px;}
#tn_4{left:55px;bottom:768px;letter-spacing:0.13px;}
#to_4{left:70px;bottom:745px;letter-spacing:0.12px;}
#tp_4{left:55px;bottom:729px;letter-spacing:0.12px;}
#tq_4{left:55px;bottom:713px;letter-spacing:0.12px;}
#tr_4{left:55px;bottom:696px;letter-spacing:0.12px;}
#ts_4{left:55px;bottom:680px;letter-spacing:0.13px;}
#tt_4{left:484px;bottom:1103px;letter-spacing:0.12px;}
#tu_4{left:484px;bottom:1086px;letter-spacing:0.11px;}
#tv_4{left:484px;bottom:1070px;letter-spacing:0.13px;}
#tw_4{left:484px;bottom:1053px;letter-spacing:0.12px;}
#tx_4{left:484px;bottom:1037px;letter-spacing:0.12px;}
#ty_4{left:484px;bottom:1020px;letter-spacing:0.12px;}
#tz_4{left:484px;bottom:1004px;letter-spacing:0.12px;}
#t10_4{left:484px;bottom:988px;letter-spacing:0.12px;}
#t11_4{left:499px;bottom:965px;letter-spacing:0.12px;}
#t12_4{left:484px;bottom:949px;letter-spacing:0.13px;}
#t13_4{left:484px;bottom:932px;letter-spacing:0.11px;}
#t14_4{left:484px;bottom:910px;letter-spacing:0.14px;}
#t15_4{left:605px;bottom:910px;}
#t16_4{left:623px;bottom:910px;}
#t17_4{left:642px;bottom:910px;}
#t18_4{left:660px;bottom:910px;}
#t19_4{left:678px;bottom:910px;}
#t1a_4{left:697px;bottom:910px;}
#t1b_4{left:715px;bottom:910px;}
#t1c_4{left:733px;bottom:910px;}
#t1d_4{left:752px;bottom:910px;}
#t1e_4{left:770px;bottom:910px;}
#t1f_4{left:790px;bottom:910px;letter-spacing:0.12px;}
#t1g_4{left:484px;bottom:887px;letter-spacing:0.13px;}
#t1h_4{left:752px;bottom:887px;}
#t1i_4{left:770px;bottom:887px;}
#t1j_4{left:791px;bottom:887px;letter-spacing:0.12px;}
#t1k_4{left:484px;bottom:865px;letter-spacing:0.13px;}
#t1l_4{left:484px;bottom:848px;letter-spacing:0.13px;}
#t1m_4{left:697px;bottom:848px;}
#t1n_4{left:715px;bottom:848px;}
#t1o_4{left:733px;bottom:848px;}
#t1p_4{left:752px;bottom:848px;}
#t1q_4{left:770px;bottom:848px;}
#t1r_4{left:790px;bottom:848px;letter-spacing:0.12px;}
#t1s_4{left:499px;bottom:826px;letter-spacing:0.13px;}
#t1t_4{left:484px;bottom:809px;letter-spacing:0.12px;}
#t1u_4{left:484px;bottom:793px;letter-spacing:0.13px;}
#t1v_4{left:484px;bottom:776px;letter-spacing:0.13px;}
#t1w_4{left:484px;bottom:760px;letter-spacing:0.15px;}
#t1x_4{left:683px;bottom:760px;letter-spacing:0.12px;}
#t1y_4{left:484px;bottom:744px;letter-spacing:0.13px;}
#t1z_4{left:484px;bottom:727px;letter-spacing:0.12px;}
#t20_4{left:484px;bottom:711px;letter-spacing:0.13px;}
#t21_4{left:755px;bottom:711px;letter-spacing:0.13px;}
#t22_4{left:484px;bottom:694px;letter-spacing:0.12px;}
#t23_4{left:663px;bottom:694px;letter-spacing:0.13px;}
#t24_4{left:803px;bottom:694px;letter-spacing:0.1px;}
#t25_4{left:484px;bottom:678px;letter-spacing:0.12px;}

.s0_4{font-size:11px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s1_4{font-size:15px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s2_4{font-size:15px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s3_4{font-size:15px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts4" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_wo;
	src: url("fonts/HelveticaNeueLTStd-Bd_wo.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_wp;
	src: url("fonts/HelveticaNeueLTStd-It_wp.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_wq;
	src: url("fonts/HelveticaNeueLTStd-Roman_wq.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg4Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg4" style="-webkit-user-select: none;"><object width="933" height="1209" data="4/4.svg" type="image/svg+xml" id="pdf4" style="width:933px; height:1209px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_4" class="t s0_4">Form 940 (2023) </span>
<span id="t2_4" class="t s1_4">Privacy Act and Paperwork Reduction Act Notice. </span>
<span id="t3_4" class="t s2_4">We ask for the information on this form to carry out the </span>
<span id="t4_4" class="t s2_4">Internal Revenue laws of the United States. We need it </span>
<span id="t5_4" class="t s2_4">to figure and collect the right amount of tax. Chapter </span>
<span id="t6_4" class="t s2_4">23, Federal Unemployment Tax Act, of Subtitle C, </span>
<span id="t7_4" class="t s2_4">Employment Taxes, of the Internal Revenue Code </span>
<span id="t8_4" class="t s2_4">imposes a tax on employers with respect to employees. </span>
<span id="t9_4" class="t s2_4">This form is used to determine the amount of the tax that </span>
<span id="ta_4" class="t s2_4">you owe. Section 6011 requires you to </span><span id="tb_4" class="t s2_4">provide the </span>
<span id="tc_4" class="t s2_4">requested information if you are liable for FUTA tax under </span>
<span id="td_4" class="t s2_4">section 3301. Section 6109 requires you to provide your </span>
<span id="te_4" class="t s2_4">identification number. If you fail to provide this </span>
<span id="tf_4" class="t s2_4">information in a timely manner or provide a false or </span>
<span id="tg_4" class="t s2_4">fraudulent form, you may be subject to penalties. </span>
<span id="th_4" class="t s2_4">You’re not required to provide the information </span>
<span id="ti_4" class="t s2_4">requested on a form that is subject to the Paperwork </span>
<span id="tj_4" class="t s2_4">Reduction Act unless the form displays a valid OMB </span>
<span id="tk_4" class="t s2_4">control number. Books and records relating to a form or </span>
<span id="tl_4" class="t s2_4">instructions must be retained as long as their contents </span>
<span id="tm_4" class="t s2_4">may become material in the administration of any Internal </span>
<span id="tn_4" class="t s2_4">Revenue law. </span>
<span id="to_4" class="t s2_4">Generally, tax returns and return information are </span>
<span id="tp_4" class="t s2_4">confidential, as required by section 6103. However, </span>
<span id="tq_4" class="t s2_4">section 6103 allows or requires the IRS to disclose or </span>
<span id="tr_4" class="t s2_4">give the information shown on your tax return to others </span>
<span id="ts_4" class="t s2_4">as described in the Code. For example, we may disclose </span>
<span id="tt_4" class="t s2_4">your tax information to the Department of Justice for civil </span>
<span id="tu_4" class="t s2_4">and criminal litigation, and to cities, states, the District of </span>
<span id="tv_4" class="t s2_4">Columbia, and U.S. commonwealths and territories to </span>
<span id="tw_4" class="t s2_4">administer their tax laws. We may also disclose this </span>
<span id="tx_4" class="t s2_4">information to other countries under a tax treaty, to </span>
<span id="ty_4" class="t s2_4">federal and state agencies to enforce federal nontax </span>
<span id="tz_4" class="t s2_4">criminal laws, or to federal law enforcement and </span>
<span id="t10_4" class="t s2_4">intelligence agencies to combat terrorism. </span>
<span id="t11_4" class="t s2_4">The time needed to complete and file this form will vary </span>
<span id="t12_4" class="t s2_4">depending on individual circumstances. The estimated </span>
<span id="t13_4" class="t s2_4">average time is: </span>
<span id="t14_4" class="t s1_4">Recordkeeping </span><span id="t15_4" class="t s2_4">. </span><span id="t16_4" class="t s2_4">. </span><span id="t17_4" class="t s2_4">. </span><span id="t18_4" class="t s2_4">. </span><span id="t19_4" class="t s2_4">. </span><span id="t1a_4" class="t s2_4">. </span><span id="t1b_4" class="t s2_4">. </span><span id="t1c_4" class="t s2_4">. </span><span id="t1d_4" class="t s2_4">. </span><span id="t1e_4" class="t s2_4">. </span><span id="t1f_4" class="t s2_4">9 hr., 19 min. </span>
<span id="t1g_4" class="t s1_4">Learning about the law or the form </span><span id="t1h_4" class="t s2_4">. </span><span id="t1i_4" class="t s2_4">. </span><span id="t1j_4" class="t s2_4">1 hr., 23 min. </span>
<span id="t1k_4" class="t s1_4">Preparing, copying, assembling, and </span>
<span id="t1l_4" class="t s1_4">sending the form to the IRS </span><span id="t1m_4" class="t s2_4">. </span><span id="t1n_4" class="t s2_4">. </span><span id="t1o_4" class="t s2_4">. </span><span id="t1p_4" class="t s2_4">. </span><span id="t1q_4" class="t s2_4">. </span><span id="t1r_4" class="t s2_4">1 hr., 36 min. </span>
<span id="t1s_4" class="t s2_4">If you have comments concerning the accuracy of </span>
<span id="t1t_4" class="t s2_4">these time estimates or suggestions for making </span>
<span id="t1u_4" class="t s2_4">Form 940 simpler, we would be happy to hear from </span>
<span id="t1v_4" class="t s2_4">you. You can send us comments from </span>
<span id="t1w_4" class="t s3_4">www.irs.gov/FormComments</span><span id="t1x_4" class="t s2_4">. Or you can send your </span>
<span id="t1y_4" class="t s2_4">comments to Internal Revenue Service, Tax Forms and </span>
<span id="t1z_4" class="t s2_4">Publications Division, 1111 Constitution Ave. NW, </span>
<span id="t20_4" class="t s2_4">IR-6526, Washington, DC 20224. Don’t </span><span id="t21_4" class="t s2_4">send Form 940 to </span>
<span id="t22_4" class="t s2_4">this address. Instead, see </span><span id="t23_4" class="t s3_4">Where Do You File? </span><span id="t24_4" class="t s2_4">in the </span>
<span id="t25_4" class="t s2_4">Instructions for Form 940. </span></div>
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
</div>
<script src="config.js" type="text/javascript"></script>
<script type="text/javascript">FormViewer.setup();</script>

<script>window.addEventListener('DOMContentLoaded',function(){const el=document.createElement("div");el.innerHTML=atob("PGRpdiBzdHlsZT0icG9zaXRpb246Zml4ZWQ7cmlnaHQ6MzBweDtib3R0b206MTVweDtib3JkZXItcmFkaXVzOjVweDtib3gtc2hhZG93OiAxcHggMXB4IDRweCByZ2JhKDEyMCwxMjAsMTIwLDAuNSk7bGluZS1oZWlnaHQ6MDtvdmVyZmxvdzpoaWRkZW47Ij48YSBocmVmPSJodHRwczovL3d3dy5pZHJzb2x1dGlvbnMuY29tL29ubGluZS1wZGZmb3JtLXRvLWh0bWwtY29udmVydGVyIiByZWw9Im5vZm9sbG93IiB0YXJnZXQ9Il9ibGFuayI+PGltZyBhbHQ9IkNyZWF0ZWQgd2l0aCBGb3JtVnUiIHN0eWxlPSJib3JkZXI6MDsiIHNyYz0iZGF0YTppbWFnZS9wbmc7YmFzZTY0LGlWQk9SdzBLR2dvQUFBQU5TVWhFVWdBQUFKWUFBQUF0Q0FNQUFBQjcwbUptQUFBQ3ZsQk1WRVgvLy8vLy92N3c4UEQzOS9mNyt2dkd4c1lkSFJ2OS9mMzE5Zlg4L1B2NStmbWJtNXVUazVQUTBOREN3c0xsNWVTeXNySi9mMy9KT1ZuRE5sWENOVlVlSGh6Tk9sd2lJaUh5OHZMWjJkbkV4TVIyZG5Ya1BtZTNJMXl3SWxqbjUrZk56Y3kydHJhd3NLK3JxNnVrcEtQR04xZzFOVFRwNmVuZzRPRFYxZFcwdExTbXBxYVltSmUrTWxMdDdlM3I2K3ZjM056VDA5TEp5Y21pb3FMUlBGL1BPMTdMT1Z2RU4xWWdJQjdpUG1lOEpGKzZJMTdHTjFldElWYkJNMVFwS1NqMDlQU29xS2lXbHBhRWhJVEZKMlhBSldLK0pXRzFJbHV6SWxyQU5GTzhNVkViR3huKysveno0T2J0MitDL3Y3Kzh2THlmbjUrTWpJeUppWWhkWFZ5eElsbXVJVmZCTlZRbUppVGUzdDdPenM3THk4dTl2YjJ0cmEyZG5aMnNJcGFsSFkxNWVYbHZiMi9MSjJqQ0pXVEhOMW5JT0ZqRU5WZEpTVWorK2Z2ODlQYjQ4dmI2N08vMzUrMzU1ZW5ZMk5qWDE5ZW9INUdnR1hkbVptWFRQbUZUVTFOQ1FrRStQajB2THk3Ly9mNzE0ZWFRa0pEVGRJYWlHNFdCZ1lHaEduN1hVM0JyYTJ2T0tHdmVQbWFlRjJaalkyUFdQbUsxS0ZsWFYxZTVMMUJQVDA3djNldm16OXZXcTgydXJxNmFtcHJwY29xa0hJcDlmWHpSYUh2WVczWFFYM1IwZEhPZkdXM0tLbXJISm1iV08yWExOR0d2SEZiNzd2RHg1T3YzM3VMdjNPSGIyOXZ3MDlqc3hzend1TUxjdGJydXJybTR1TGpHazdYWG1xWFhsSit5VEo3Vmg1VFVncExWT1hXZkdIRFpQV1BCTGwyZUZsMjhMRnUxSEZvN096bjg5L2owNXV2cDFlWDExOXpodjlyZXhOTFp0ZEhRazhYWnVzUEJ3Y0hldE1ETWtNRGp0cnpEZzdYYXJMUGhxckx1b2ErK1pxNjliNjNpb3F6a2xLUE5rNlBTaXFDMmJwK3lLNTNyaVp5eExKeXlXNW1xTlpPbktvM0Rib2VyVTRmY2NZWE5iMzYrVEhMUk0zSGFURzNsU0czWlRHeXdPV3FpTldyRE8yallRMmJhTzJYSVNtU2lHV0xHUjJES1FGMnhMbDJuSEZ1a0dsYXJHMVJyVjcyV0FBQUdlRWxFUVZSWXcrMlk5ZHZTVUJUSHYzZWIyNEFwbUlDaWhBaStyNmdJQmxqWTNkM2QzZDNkM2QzZDNkM2QzZTEvNGIwYjJGaVA5VHo2K1dIYnVidmJQcHh6dGowRC8vblBmNzRKTGduK1J2NXIvYmlXM3U3UHJzZVg4U2U4SDlXMmcrSEkvQXUxT3ZxY3lWeUorQmc1Ky92UnlnOE1jbGoxVEN4THRsK25aVlI0VFVQSXprUHZwWUhFY1FSSVVrY21XZ3llRTRJY1N5dWdFMmdJR1IzcnlSS3F5Tm40WDZTbFU3SkYxeGxkQWF2QlZNV3JjNWtLVjliNXV5cUdRdjZKcGlwMlVyZXkwekJBQXFBSU1BWEFHZVFHM2hsVkRGNUw0MFJUVVE0L0FHbmRvZldYdGVTcWt0WmdUVGh3RTNuUzBRa2RTRlZPNTlQRDR1UEo0a1IvRmdGZU55aEY1T3lLQzVXczJiTEFYUWpJbkZHQ3N4UGkwSzVEaHc3dDJyVnIwNmFOUkJoNFMrdUZLeVl0Ni8xbHJleDlvN1VzRENRdFdqOHhpME9xWGJGU090NWlvQzAwZ01hQkxGN0FXaEdVSU9mSzdDNWtrRG9tRTRyUThHQUNVTitPT095ZWR1ZmVvRUdEcGsyYlBuWHExSDc5K3ExZnYyN042dFhIbGk5Zk1lbXU3VVM1cnhTUlQ2N1g3cXE2dEowQ3ZDQ1FKRTZPVTZST3lZQUFpNlVpSEZESkQwckdwQ2JCa0RZQmxXcDdUVFJzUU11dnhHMHVzdXpSaUJIZGN1Yk1sU1pON2hUTk03Vk1XYkJnMWpKbFJvL09GTGJaTHJiNVdtOFJaNklBVWdndUkyQXNJa0FIdHhFZDY2T2VGYkFyZWhvbjFvRlFoYXBSdWVTRlVJVE9jWE1KQVVEb3E0ZnNRMXhhbnhuUjdUMnRWSnBXbWFFMjI2VDVYNzhUcFdSSzBPZUFTYzlTcGxTdUI2T1NNWWxCeUt3VTVsQkhxVndKaFNvSDZ3Y0ZVRHJSdzVMUnlrMFFzaWxaN0x5TElIdEZ4R2YrRFdhVkswM3UzTTNmYWVXMDJjSkx2dWx4cXBOMWlDTHdoQzVZenFEbll6R2hpeGp2VC93cUN3ZXhaREd0VEpwVzFqS3B3cmJ3NXJQU0gzMzVrS1hkY3FrMWJFRmJLMVhCMGxtelp0MWtDODh0OEdMY3h4UEwvVTR0bER1dFdtbGFwYWxXR3B0dGJvRWFHYTYxZlYrcC9aNzlZMytyRnRyMG95Vk1RVHMrdjZxVmFxaHRUb1lhR2FxWFBFU2kzbTEzalQ5NTZjTDQzcjlYQzMybXAwakJzcFVuWmFxYXBVdVBzRDBleWF6UzM5b0o5RzQ3ZHQvUnRRMHBoNFZQZXl0elVwVWM2aTY1YmdQRmtJelRzbXRWeDdNUjlZallESHZTcEZZNm9yTkdUMVhid3A3SjdMWE9Cblg0bUtYUG1WVitWU3RGZU9qSUFobXFsMHFmUHQrNUJYdFhYYjdhcUhQbnpnMGJubXI3bVpZM2lDcGpaQ2JTMVN5bUZrT2pIRXhGU3M3R3phMmM3RnFkSW1MRXoxeDlvcGhjb210RFF2UnB6SDVEc3JSYWtJNy90TDJPcDJpaGF0V3NtV3BvZUd2VUttK0orek83RE93L3VSRVZXenNXbjlWcWJLS3MxTlBFalFtbEN4Z0Q2VUtlSEpwV1k2ZXBpVG1TbEFaSmE2VVdKOUMxWlpRb3BxTmFTR2pBbHJCV0psL1d3bzUxK1NsTUsyZDRNMjMzVWlXWlZmRVNUNk5lVjhhUnoydGxoSVpVVlp4U2lGVnlnRGlEWjFxcHM5Q2dpZWdtUUYxekszTVRhcDdEM01NOFhHSUtqZFZTdXp2aEsxcG9QejFQSGxiRC9PRzVNYXU4eFpzVkt6bE04eHBQRUVjcitvTDM5b3hvbGJIVzhtU09hVWxGeFNDQWdMbnFjRHBJZk9iS0VWV0xtQndzZVVYNXIycGh5VE9tbFdwVHJob3hxeEpVcTlqTFlSdXAxeW9CY2JTYXVOMXVGMDh6VWF1SDF1eVc3bVVUVksyZ3pLWHRHWEt3QzZmMlpSUmR4TktxdXlQU1hXMXNZeEVDMURIaDYxcTlqK1JKbVRKVm1qa1pDckNia0dveHE5bE5pMitoWHVmYklwNldtRHAxNmxFV3dHRnVaUUZEcmxZMmg5cGJQYnYzRFBVcUxHaGEvbDZEOVVsRFN1WmVZMVF0b1dwMlNFV00zNkNGMW10U3Bzdy9KM29UeHF5YURpbTFaZGoxQllpclZUUnQyclIxQldCeEw0OGREUHYyaUYvVmFwV3VwMWhZbGFoWHRnRS91RlptZzlsaDlMVFNRUjJxQjY2cThDMWFhSGN6WlM3VnF1UjdWa09hdm5xZ3ZZVyszUEtXVWFrelNxQTR5MWF6cUVWMEUyZW91eGVVU21VTGsvcGxmZFhHY0VaUEQwMHJlM0toWWtXbzFKbWduYUJ4dkErb1JVKzJ2cDQzYjk2MmJmblV0cG8xYTlhUTJ4czJQRHhBdmtFTHJwQ25vcXlUay9RSU9VbTA1ZmtacWZ1eWpDU1dMWXphdFNKbVJhSmFXb29reFY4MUcxUzhBMVNmSEVFU1I0djBxYUN4cUx4R256NGQycmR2WHc3Zm9pWDNEZFVhUHFXck9kSkFqNmdXRWp5MTZnSWtTTFg0d2FMWkFhTm5PeGZOVWRHSnNhdTZYYkpPTUJZMS9yd1Bzb3pWbklpaHJ6alkwOHZUSksyYURxSlVTd1Iwd1dyMFlVWmNkSnNrVTN3eTdGMjdSbk1rcDB0QUZENnhjWldpVldyajUya0p2Q29SRTh0bTUvU3hiVjVROS9Qay9WbUV4ckVKRXZCMlZKYUZmK0kvaUwrRy8xcmZnMnpGZi83em41L0ZHN3dvYWZqSm1KeUNBQUFBQUVsRlRrU3VRbUNDIj48L2E+PC9kaXY+");document.body[atob("YXBwZW5kQ2hpbGQ=")](el.firstChild);});</script>






























































































































<script type="text/javascript">

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

/* FormViewer - v1.2.0 | Copyright 2022 IDRsolutions */
!function(){"use strict";var e={LAYOUT_CONTINUOUS:"continuous",SELECT_SELECT:"select",SELECT_PAN:"pan",ZOOM_SPECIFIC:"specific",ZOOM_ACTUALSIZE:"actualsize",ZOOM_FITWIDTH:"fitwidth",ZOOM_FITHEIGHT:"fitheight",ZOOM_FITPAGE:"fitpage",ZOOM_AUTO:"auto"},t=1,o=0,n,i,r,a,u=!0,s,c=[],l,f,m=[],d=10,g={},p=!1,v,O="",T=!1;e.setup=function(d){d||(d=FormViewer.config),p=!0,a=/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),s=d.bounds,o=d.pagecount,d.url&&(O=d.url),T=!!d.isR2L,i=D("formviewer"),T&&R.addClass(i,"isR2L"),A.setup();var g=document.createElement("style");g.setAttribute("type","text/css"),document.head.appendChild(g),f=g.sheet,(t<1||t>o)&&(t=1);for(var b=0;b<o;b++)if(s[b][0]!=s[0][0]||s[b][1]!=s[0][1]){u=!1;break}switch(v){case FormViewer.LAYOUT_CONTINUOUS:break;default:v=FormViewer.LAYOUT_CONTINUOUS}var F=[e.LAYOUT_CONTINUOUS];for(v===FormViewer.LAYOUT_CONTINUOUS&&(r=E),window.addEventListener("resize",(function(){A.updateZoom()})),l=D("overlay"),S.setup(),null==(n=D("contentContainer"))&&(n=D("mainXFAForm")),n.style.transform="translateZ(0)",n.style.padding="5px",b=1;b<=o;b++){var L=D("page"+b);L.setAttribute("style","width: "+s[b-1][0]+"px; height: "+s[b-1][1]+"px;"),m[b]=L,c[b]=h(L,b)}r.setup(t),R.addClass(i,"layout-"+r.toString()),A.updateZoomToDefault(),r.goToPage(t);var C={selectMode:S.currentSelectMode,isMobile:a,layout:r.toString(),availableLayouts:F,isFirstPage:1===t,isLastPage:r.isLastPage(t)};for(var w in d)d.hasOwnProperty(w)&&(C[w]=d[w]);C.page=t,e.fire("ready",C)};var h=function(t,o){var n={isVisible:function(){return!0},isLoaded:function(){return!0},hide:function(){},unload:function(){e.fire("pageunload",{page:o})},load:function(){e.fire("pageload",{page:o})}};return n},b=function(n){t!=n&&(t=n,e.fire("pagechange",{page:t,pagecount:o,isFirstPage:1===t,isLastPage:r.isLastPage(n)}))},E=function(){var n={},r=0,a=0,u=[];n.setup=function(){i.addEventListener("scroll",c);for(var e=0;e<o;e++)s[e][0]>r&&(r=s[e][0]),s[e][1]>a&&(a=s[e][1])},n.unload=function(){i.removeEventListener("scroll",c)};var c=function(){l()},l=function(){var e,t;if(m[1].getBoundingClientRect().top>0)b(1);else for(e=1;e<=o;e++){var n=m[e].getBoundingClientRect();t=n.top;var i=n.bottom-n.top;if(t<=.25*i&&t>.5*-i){b(e);break}}f()},f=function(){u=[t];var e,n,r=i.clientHeight,a=function(e){return(n=m[e].getBoundingClientRect()).bottom>0&&n.top<r};for(e=t-1;e>=1&&a(e);e--)u.push(e);for(e=t+1;e<=o&&a(e);e++)u.push(e)};return n.goToPage=function(e,t){var o=0;if(t){var n=t.split(" ");switch(n[0]){case"XYZ":o=Number(n[2]);break;case"FitH":o=Number(n[1]);break;case"FitR":o=Number(n[4]);break;case"FitBH":o=Number(n[1]);break}(isNaN(o)||o<0||o>s[e-1][1])&&(o=0),0!==o&&(o=s[e-1][1]-o)}var r=A.getZoom();i.scrollTop=m[e].offsetTop-5+o*r,b(e),f()},n.getVisiblePages=function(){return u},n.updateLayout=function(){},n.isLastPage=function(e){return e===o},n.getZoomBounds=function(){return{width:r,height:a}},n.getAutoZoom=function(e){return n.getZoomBounds().width>i.clientWidth-d?e:1},n.next=function(){e.goToPage(t+1)},n.prev=function(){e.goToPage(t-1)},n.toString=function(){return FormViewer.LAYOUT_CONTINUOUS},n}(),F=function(e){try{e.getSelection?e.getSelection().empty?e.getSelection().empty():e.getSelection().removeAllRanges&&e.getSelection().removeAllRanges():e.document.selection&&e.document.selection.empty()}catch(e){}},L=function(e){try{F(e)}catch(e){}},S=function(){var t={},o,n,r=!1,a;t.setup=function(){switch(a){case FormViewer.SELECT_PAN:case FormViewer.SELECT_SELECT:break;default:a=FormViewer.SELECT_SELECT}this.currentSelectMode=a,this.currentSelectMode==e.SELECT_SELECT?t.enableTextSelection():t.enablePanning()},t.enableTextSelection=function(){this.currentSelectMode=e.SELECT_SELECT,R.removeClass(l,"panning"),l.removeEventListener("mousedown",u),document.removeEventListener("mouseup",s),l.removeEventListener("mousemove",c)};var u=function(e){return e=e||window.event,R.addClass(l,"mousedown"),o=e.clientX,n=e.clientY,r=!0,!1},s=function(){R.removeClass(l,"mousedown"),r=!1},c=function(e){if(r)return e=e||window.event,i.scrollLeft=i.scrollLeft+o-e.clientX,i.scrollTop=i.scrollTop+n-e.clientY,o=e.clientX,n=e.clientY,!1};return t.enablePanning=function(){this.currentSelectMode=e.SELECT_PAN,F(window),R.addClass(l,"panning"),l.addEventListener("mousedown",u),document.addEventListener("mouseup",s),l.addEventListener("mousemove",c)},t.setDefaultMode=function(e){a=e},t}();e.setSelectMode=function(t){if(p){if(a)return;t==e.SELECT_SELECT?S.enableTextSelection():S.enablePanning(),e.fire("selectchange",{type:t})}else S.setDefaultMode(t)};var A=(C=e.ZOOM_AUTO,P=[.25,.5,.75,1,1.25,1.5,2,2.5,3,3.5,4],I=[e.ZOOM_AUTO,e.ZOOM_FITPAGE,e.ZOOM_FITHEIGHT,e.ZOOM_FITWIDTH,e.ZOOM_ACTUALSIZE],Z=0,M=1,U=function(e,t,o,n,i){var r;return"-webkit-transform: "+(r=i?"translate3d("+t+"px, "+o+"px, 0) scale("+n+")":"translateX("+t+"px) translateY("+o+"px) scale("+n+")")+";\n-ms-transform: "+r+";\ntransform: "+r+";"},x=function(t){var n=!1,a=!1;(M=H(t))>=4?(M=4,a=!0):M<=.25&&(M=.25,n=!0);var u=i.scrollTop/i.scrollHeight;r.updateLayout();for(var l=r.getVisiblePages(),f=1;f<=o;f++)-1===l.indexOf(f)&&c[f].hide();w&&y.deleteRule(w);var d=U(null,0,0,M,!1);w=y.insertRule(".page-inner { \n"+d+"\n}",y.cssRules.length);for(var g=0;g<o;g++)m[g+1].style.width=Math.floor(s[g][0]*M)+"px",m[g+1].style.height=Math.floor(s[g][1]*M)+"px";i.scrollTop=i.scrollHeight*u,++Z%2==1&&x(),e.fire("zoomchange",{zoomType:C,zoomValue:M,isMinZoom:n,isMaxZoom:a})},V=function(){for(var e=M,t=P[P.length-1],o=0,n;o<P.length;o++)if(P[o]>e){t=P[o];break}for(o=0;o<I.length;o++){var i=H(I[o]);if(i>e&&i<=t){if(n&&i===t)continue;n=I[o],t=i}}return n||t},k=function(){for(var e=M,t=P[0],o=P.length-1,n;o>=0;o--)if(P[o]<e){t=P[o];break}for(o=0;o<I.length;o++){var i=H(I[o]);if(i<e&&i>=t){if(n&&i===t)continue;n=I[o],t=i}}return n||t},H=function(t){var o=r.getZoomBounds(),n=(i.clientWidth-d)/o.width,a=(i.clientHeight-d)/o.height,u=parseFloat(t);switch(isNaN(u)||(M=u,t=e.ZOOM_SPECIFIC),t||(t=C),t){case e.ZOOM_AUTO:M=r.getAutoZoom(n,a);break;case e.ZOOM_FITWIDTH:M=n;break;case e.ZOOM_FITHEIGHT:M=a;break;case e.ZOOM_FITPAGE:M=Math.min(n,a);break;case e.ZOOM_ACTUALSIZE:M=1;break}return C=t,M},{setup:function(){var e=document.createElement("style");e.setAttribute("type","text/css"),document.head.appendChild(e),y=e.sheet},updateZoom:x,updateZoomToDefault:function(){x(_)},zoomIn:function(){x(V())},zoomOut:function(){x(k())},getZoom:function(){return M},setDefault:function(e){_=e}}),C,w,P,I,Z,y,M,_,N,U,x,V,k,H;e.zoomIn=function(){A.zoomIn()},e.zoomOut=function(){A.zoomOut()},e.setZoom=function(e){p?A.updateZoom(e):A.setDefault(e)},e.goToPage=function(e,n){p?e>=1&&e<=o&&r.goToPage(Number(e),n):t=e},e.next=function(){r.next()},e.prev=function(){r.prev()},e.setLayout=function(o){p?(r.unload(),R.removeClass(i,"layout-"+r.toString()),(r=E).setup(t),R.addClass(i,"layout-"+r.toString()),A.updateZoom(FormViewer.ZOOM_AUTO),r.goToPage(t),e.fire("layoutchange",{layout:o})):v=o},e.updateLayout=function(){A.updateZoom()};var D=function(e){return document.getElementById(e)};e.on=function(e,t){g[e]||(g[e]=[]),-1===g[e].indexOf(t)&&g[e].push(t)},e.off=function(e,t){if(g[e]){var o=g[e].indexOf(t);-1!==o&&g[e].splice(o,1)}},e.fire=function(e,t){g[e]&&g[e].forEach((function(e){e(t)}))};var R={addClass:function(e,t){var o=0!==e.className.length?e.className.split(" "):[],n;-1===o.indexOf(t)&&(o.push(t),e.className=o.join(" "))},removeClass:function(){for(var e=arguments[0],t=0!==e.className.length?e.className.split(" "):[],o=1;o<arguments.length;o++){var n=t.indexOf(arguments[o]);-1!==n&&t.splice(n,1)}e.className=t.join(" ")}};e.handleFormSubmission=function(e,t){FormVuAPI&&(e||(e=window.prompt("Please enter the URL to submit to"))?z(e,t):console.log("No URL provided for FormSubmission"))};var z=function(e,t){if(FormVuAPI){var o={url:e,success:function(){alert("Form submitted successfully")},failure:function(){alert("Form failed to submit, please try again")}},n="string"==typeof t?t.toLowerCase():"";if(e.startsWith("mailto:"))return o.format=n,FormVuAPI.submitFormAsMail(o),void 0;switch(n){case"json":"function"==typeof FormVuAPI.submitFormAsJSON&&FormVuAPI.submitFormAsJSON(o);break;case"pdf":"function"==typeof FormVuAPI.submitFormAsPDF&&FormVuAPI.submitFormAsPDF(o);break;case"formdata":default:"function"==typeof FormVuAPI.submitFormAsFormData&&FormVuAPI.submitFormAsFormData(o);break}}};"function"==typeof define&&define.amd?define(["formviewer"],[],(function(){return e})):"object"==typeof module&&module.exports?module.exports=e:window.FormViewer=e}();



(function () {
    "use strict";

    var FormVuAPI = {};

    FormVuAPI.extractFormValues = function () {
        const inputs = document.getElementsByTagName("input");
        const textareas = document.getElementsByTagName("textarea");
        const selects = document.getElementsByTagName("select");

        const texts = [];
        const checks = [];
        const checkGroups = [];
        const radios = [];
        const choices = [];

        for (const inp of inputs) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                const type = inp.type.toUpperCase();
                if (type === "TEXT" || type === "PASSWORD") {
                    texts.push(inp);
                } else if (type === "CHECKBOX") {
                    // Handle checkbox groups
                    if (Object.keys(idrform.getCheckboxGroup(inp.dataset.fieldName)).length > 1)
                        checkGroups.push(inp);
                    else checks.push(inp);
                } else if (type === "RADIO") {
                    // Filter out unisons
                    if (inp.name === inp.dataset.fieldName) radios.push(inp);
                }
            }
        }
        for (const inp of textareas) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                texts.push(inp);
            }
        }
        for (const inp of selects) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                choices.push(inp);
            }
        }

        const output = {};

        for (const item of texts) {
            const fieldText = item.value;
            const fieldName = item.getAttribute("data-field-name");
            output[fieldName] = fieldText;
        }

        for (const item of checkGroups) {
            const fieldName = item.getAttribute("data-field-name");
            const isChecked = item.checked;
            const value = item.value

            if (isChecked) {
                output[fieldName] = value;
            }
        }

        for (const item of checks) {
            const isChecked = item.checked;
            const fieldName = item.getAttribute("data-field-name");
            output[fieldName] = isChecked;
        }

        for (const item of choices) {
            const selected = item.value;
            const fieldName = item.getAttribute("data-field-name");
            const multiple =  item.getAttribute("multiple");
            if (multiple) {
                const options = item.children;
                const selectedItems = [];
                for (const option of options) {
                    if (option.selected) {
                        selectedItems.push(option.value);
                    }
                }
                output[fieldName] = selectedItems;
            } else {
                output[fieldName] = selected;
            }
        }

        for (const radio of radios) {
            const fieldName = radio.getAttribute("data-field-name");
            const isChecked = radio.checked;
            const value = radio.value;

            if (isChecked) {
                output[fieldName] = value;
            }
        }
        return output;
    };

    /**
     * Takes a JSON input in the format of formdata.json and updates the relevant
     * HTML fields values to match the provided values.
     *
     * @param {String|Object} formValues The values to be inserted into the HTML
     * @param {boolean} resetForm Whether a form reset should be called before inserting the values
     * @returns {boolean} true on method completion, false on invalid input
     */
    FormVuAPI.insertFormValues = function (formValues, resetForm) {
        if (typeof formValues === "string") {
            formValues = JSON.parse(formValues);
        } else if (!(formValues instanceof Object)) {
            console.error('Form values provided to insertFormValues is not an Object or JSON String');
            return false;
        }

        if (resetForm) {
            idrform.doc.resetForm();
        }

        for (let key of Object.keys(formValues)) {
            let val = formValues[key];
            if (val.inputType) {
                switch (val.inputType) {
                    case "radio button":
                        _handleRadioButtonInsert(val);
                        break;
                    case "checkbox":
                    case "checkbox group":
                        _handleCheckboxInsert(val);
                        break;
                    case "combobox":
                        _handleComboboxInsert(val);
                        break;
                    case "listbox":
                    case "listbox multi":
                        _handleListboxInsert(val);
                        break;
                    case "multiline text":
                        _handleMultilineTextInsert(val);
                        break;
                    default:
                        _handleGenericInputInsert(val);
                        break;
                }
            }
        }

        return true;
    };

    /**
     * Escapes the provided string for use as a CSS selector
     * Backslashes need to be escaped in order to be used in CSS selectors
     * (otherwise they will fail)
     *
     * @param {String} string the string to be escaped
     * @returns {String} an escaped string ready for use as a CSS selector
     * @private
     */
    let escapeForCssSelector = function(string) {
        return string.replaceAll('\\','\\\\');
    }

    /**
     * Selects the relevant radio button of the provided Form Field JSON object
     * Refreshes the AP images so the change is displayed
     * If the radio button is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleRadioButtonInsert = function(jsonObj) {
        let domRadioButtons = document.querySelectorAll('input[type=radio][data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref]');
        if (!domRadioButtons) {
            console.warn("Failed to find <input type=\"radio\"> " + jsonObj.fieldName);
            return;
        }
        domRadioButtons.forEach(element => {
            if (element.dataset.objref == jsonObj.objref) {
                element.checked = jsonObj.value;
                element.value = jsonObj.value;
            } else {
                element.checked = false;
            }
            if ("refreshApImage" in window && element.dataset.imageIndex) refreshApImage(parseInt(element.dataset.imageIndex));
        });
    }

    /**
     * Ticks the relevant checkbox of the provided Form Field JSON object
     * Refreshes the AP images so the change is displayed
     * If the checkbox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleCheckboxInsert = function(jsonObj) {
        let domCheckboxes = document.querySelectorAll('input[type=checkbox][data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref]');
        if (!domCheckboxes) {
            console.warn("Failed to find <input type=\"checkbox\"> " + jsonObj.fieldName);
            return;
        }
        domCheckboxes.forEach(element => {
            if (element.dataset.objref == jsonObj.objref) {
                element.checked = jsonObj.value;
                element.value = jsonObj.value;
            } else {
                element.checked = false;
            }
            if ("refreshApImage" in window && element.dataset.imageIndex) refreshApImage(parseInt(element.dataset.imageIndex));
        });
    };

    /**
     * Selects the relevant combobox option from the provided Form Field JSON object
     * If a value is not an option, a new option will be added with the provided value
     * If the combobox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleComboboxInsert = function(jsonObj) {
        let domCombobox = document.querySelector('select[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domCombobox) {
            console.warn("Failed to find <select> " + jsonObj.fieldName);
            return;
        }

        let options = domCombobox.children;
        let optionFound = false;
        for (let i = 0, ii = options.length; i < ii; i++) {
            let option = options[i];
            if (option.value === jsonObj.value) {
                option.setAttribute("selected", "selected");
                domCombobox.selectedIndex = i;
                optionFound = true;
            } else {
                option.removeAttribute("selected");
            }
        }
        if (!optionFound) {
            const newOpt = document.createElement("option");
            newOpt.text = jsonObj.value;
            newOpt.value = jsonObj.value;
            newOpt.setAttribute("selected", "selected");
            domCombobox.appendChild(newOpt);
        }
        domCombobox.value = jsonObj.value;
    }

    /**
     * Selects the relevant listbox option from the provided Form Field JSON object
     * Unselects any other options
     * If the listbox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleListboxInsert = function(jsonObj) {
        let domListbox = document.querySelector('select[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domListbox) {
            console.warn("Failed to find <select> " + jsonObj.fieldName);
            return;
        }
        let options = domListbox.children;
        for (let i = 0, ii = options.length; i < ii; i++) {
            let option = options[i];

            if (option.value == jsonObj.value || jsonObj.value instanceof Array && jsonObj.value.includes(option.value)) {
                option.selected = true;
                option.setAttribute("selected", "selected");
            } else {
                option.removeAttribute("selected");
            }
        }
    }

    /**
     * Inserts the multiline text from the provided Form Field JSON object
     * If the textarea is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleMultilineTextInsert = function(jsonObj) {
        let domTextArea = document.querySelector('textarea[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domTextArea) {
            console.warn("Failed to find <textarea> " + jsonObj.fieldName);
            return;
        }
        domTextArea.value = jsonObj.value;
    }

    /**
     * Inserts the value of the provided Form Field JSON object into the relevant HTML input
     * Can also insert into textareas if not using single-line text output
     * If the input/textarea is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleGenericInputInsert = function(jsonObj) {
        let domInput = document.querySelector(':is(input,textarea)[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domInput) {
            console.warn("Failed to find <input> or <textarea>" + jsonObj.fieldName);
            return;
        }
        domInput.value = jsonObj.value;
    }

    let setRequestEventHandlers = function(xhr, params) {
        xhr.onreadystatechange = function(event) {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    if (params.success) {
                        params.success(event);
                    }
                } else {
                    if (params.failure) {
                        params.failure(event);
                    } else {
                        console.log(event.target.response);
                    }
                }
            }
        };
    };

    FormVuAPI.submitFormAsMail = function(params) {
        if (typeof params !== 'object') {
            params = {url: params};
        }
        if (!params.url.startsWith('mailto:')) {
            return;
        }
        switch (params.format) {
            case 'formdata':
                alert('The file will be saved in your machine, please attach it to the email');
                downloadFormDataValues(this.extractFormValues());
                openMailToLink(params.url);
                break;
            case 'pdf':
                alert('The file will be saved in your machine, please attach it to the email');
                idrform.app.execMenuItem('SaveAs');
                openMailToLink(params.url);
                break;
            default:
                alert('Unsupported submission format. Submission failed.');
                break;
        }
    };

    let downloadFormDataValues = function(formValues) {
        let formValuesString = "";
        for (var value in formValues) {
            if (formValues.hasOwnProperty(value) && formValues[value] !== undefined) {
                if (formValuesString.length !== 0) {
                    formValuesString += '&';
                }

                formValuesString += encodeURIComponent(value) + '=' + formValues[value];
            }
        }
        let fileDL = document.createElement('a');
        let pdfName = document.getElementById("FDFXFA_PDFName").textContent;
        fileDL.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(formValuesString));
        fileDL.setAttribute('download', pdfName + '.txt');
        fileDL.style.display = 'none';
        document.body.appendChild(fileDL);
        fileDL.click();
        document.body.removeChild(fileDL);
    };

    let openMailToLink = function(target) {
        let mailto = document.createElement('a');
        mailto.setAttribute('href', target);
        mailto.setAttribute('target', "_blank");
        mailto.style.display = 'none';
        document.body.appendChild(mailto);
        mailto.click();
        document.body.removeChild(mailto);
    };

    FormVuAPI.submitFormAsJSON = function (params) {
        let url = typeof params === 'object' ? params.url : params;

        let formValues = {data: this.extractFormValues()};
        let xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.send(JSON.stringify(formValues));
            return xhr;
        }
    };

    FormVuAPI.submitFormAsFormData = function (params) {
        let url = typeof params === 'object' ? params.url : params;

        let formValues = this.extractFormValues();
        let xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);

            let formData = new FormData();
            for (var value in formValues) {
                if (formValues.hasOwnProperty(value) && formValues[value] !== undefined) {
                    formData.append(encodeURIComponent(value), formValues[value]);
                }
            }
            xhr.send(formData);
            return xhr;
        }
    };

    FormVuAPI.submitFormAsPDF = function (params) {
        let url, submitType="formData";
        if (typeof params === 'object') {
            url = params.url;
            submitType = params.submitType || "formData";
        } else {
            url = params;
        }

        const xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);
            const file = idrform.getCompletedFormPDF();
            const fileName = document.querySelector("#FDFXFA_PDFName").textContent;

            if (submitType === "raw") {
                xhr.setRequestHeader("Content-Disposition", `filename="${fileName}"`)
                xhr.send(file);
            } else if (submitType === "formData") {
                const formData = new FormData();
                formData.append("file", file, fileName);
                xhr.send(formData);
            }
            return xhr;
        }
    }

    window.FormVuAPI = FormVuAPI;

}());



</script>


 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
stroke-width: 1.222;
stroke-miterlimit: 10;
}
.g4_1{
fill: none;
stroke: #000;
stroke-width: 1.145;
stroke-miterlimit: 10;
}
.g5_1{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M55,357.5H605V91.7H55V357.5ZM253,100.8H238.7M253,128.3H238.7m22,-5.5V106.3M231,122.8V106.3" class="g0_1"/>
<path d="M231,106.3v22.4m-.4,-.4H253m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H238.7m14.3,0H230.6m.4,-.3v22.3" class="g1_1"/>
<path d="M294.5,100.8H280.2m14.3,27.5H280.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M272.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H280.2m14.3,0H272.1m.4,-.3v22.3" class="g1_1"/>
<path d="M353.3,100.8H339m14.3,27.5H339m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M331.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H339m14.3,0H330.9m.4,-.3v22.3" class="g1_1"/>
<path d="M391.9,100.8H377.6m14.3,27.5H377.6m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M369.9,106.3v22.4m-.3,-.4h22.3m-14.3,0H400m-.4,.4V106.3m0,16.5V100.5m.4,.3H377.6m14.3,0H369.6m.3,-.3v22.3" class="g1_1"/>
<path d="M430.8,100.8H416.5m14.3,27.5H416.5m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M408.8,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H416.5m14.3,0H408.4m.4,-.3v22.3" class="g1_1"/>
<path d="M469.6,100.8H455.3m14.3,27.5H455.3m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M447.6,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H455.3m14.3,0H447.2m.4,-.3v22.3" class="g1_1"/>
<path d="M508.5,100.8H494.2m14.3,27.5H494.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M486.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H494.2m14.3,0H486.1m.4,-.3v22.3" class="g1_1"/>
<path d="M547.2,100.8H532.9m14.3,27.5H532.9m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M525.2,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H532.9m14.3,0H524.8m.4,-.3v22.3" class="g1_1"/>
<path d="M586.3,100.8H572m14.3,27.5H572m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M564.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H572m14.3,0H563.9m.4,-.3v22.3" class="g1_1"/>
<path d="M209,165H594V137.5H209V165Zm-33,36.7H594V174.2H176v27.5Zm-55,36.6H594V210.8H121v27.5Zm0,55H407V265.8H121v27.5Zm297,0h55V265.8H418v27.5Zm66,0H594V265.8H484v27.5ZM121,337.6H319V311.7H121v25.9Zm209,0H473V311.7H330v25.9Zm154,0H594V311.7H484v25.9ZM660,91.7H847M660,293.3H847M869,113.7V271.3M638,113.7V271.3" class="g0_1"/>
<path d="M638,271.3v22.4m-.4,-.4H660m187,0h22.4m-.4,.4V271.3m0,-157.6V91.3m.4,.4H847m-187,0H637.6m.4,-.4v22.4" class="g1_1"/>
<path d="M649,145H858V108.3H649V145Z" class="g2_1"/>
<path d="M650.8,165.7h15.3V150.4H650.8v15.3Zm0,27.5h15.3V177.9H650.8v15.3Zm0,27.5h15.3V205.4H650.8v15.3Zm0,27.5h15.3V232.9H650.8v15.3Z" class="g0_1"/>
<path d="M55,403.3h55V385H55v18.3Z" class="g2_1"/>
<path d="M54.6,385h55.8" class="g3_1"/>
<path d="M54.6,403.3h55.8" class="g0_1"/>
<path d="M54.6,385H880.4" class="g3_1"/>
<path d="M54.6,403.3H880.4M693,440h33V412.5H693V440Zm55,0h33V412.5H748V440Zm-54.4,34.4h15.3V459.1H693.6v15.3Zm0,28.2h15.3V487.4H693.6v15.2Z" class="g0_1"/>
<path d="M55,531.7h55V513.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,513.3h55.8" class="g3_1"/>
<path d="M54.6,531.7h55.8" class="g0_1"/>
<path d="M54.6,513.3H880.4" class="g3_1"/>
<path d="M54.6,531.7H880.4m-187.8,9.1H836.4M692.6,568.3H836.4M693,540.4v28.3M835.6,540.8h44.8m-44.8,27.5h44.8M880,540.4v28.3m-407.4,-.4H616.4M472.6,595.8H616.4M473,567.9v28.3M615.6,568.3h44.8m-44.8,27.5h44.8M660,567.9v28.3M242,621.8h15.3V606.5H242v15.3Zm0,18.3h15.3V624.9H242v15.2ZM473,621.8h15.3V606.5H473v15.3Zm0,18.3h15.3V624.9H473v15.2ZM660,621.8h15.3V606.5H660v15.3Zm-187.4,29H616.4M472.6,678.3H616.4M473,650.4v28.3M615.6,650.8h44.8m-44.8,27.5h44.8M660,650.4v28.3m32.6,-.4H836.4M692.6,705.8H836.4M693,677.9v28.3M835.6,678.3h44.8m-44.8,27.5h44.8M880,677.9v28.3M692.6,715H836.4M692.6,742.5H836.4M693,714.6v28.3M835.6,715h44.8m-44.8,27.5h44.8M880,714.6v28.3m-187.4,8.8H836.4M692.6,779.2H836.4M693,751.3v28.3M835.6,751.7h44.8m-44.8,27.5h44.8M880,751.3v28.3" class="g0_1"/>
<path d="M55,806.7h55V788.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,788.3h55.8" class="g3_1"/>
<path d="M54.6,806.7h55.8" class="g0_1"/>
<path d="M54.6,788.3H880.4" class="g4_1"/>
<path d="M54.6,806.7H880.4m-187.8,9.1H836.4M692.6,843.3H836.4M693,815.4v28.3M835.6,815.8h44.8m-44.8,27.5h44.8M880,815.4v28.3m-187.4,18H836.4M692.6,889.2H836.4M693,861.3v28.3M835.6,861.7h44.8m-44.8,27.5h44.8M880,861.3v28.3M692.6,895H836.4M692.6,922.5H836.4M693,894.6v28.2M835.6,895h44.8m-44.8,27.5h44.8M880,894.6v28.2" class="g0_1"/>
<path d="M55,944.2h55V925.8H55v18.4Z" class="g2_1"/>
<path d="M54.6,925.8h55.8" class="g3_1"/>
<path d="M54.6,944.2h55.8" class="g0_1"/>
<path d="M109.6,925.8H880.4" class="g4_1"/>
<path d="M109.6,944.2H880.4M692.6,950H836.4M692.6,977.5H836.4M693,949.6v28.2M835.6,950h44.8m-44.8,27.5h44.8M880,949.6v28.2m-187.4,8.8H836.4m-143.8,27.5H836.4M693,986.2v28.3M835.6,986.6h44.8m-44.8,27.5h44.8M880,986.2v28.3M692.6,1045H836.4m-143.8,27.5H836.4M693,1044.6v28.3M835.6,1045h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-187.4,8.8H836.4m-143.8,27.5H836.4M693,1081.3v28.3m142.6,-27.9h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-271.9,23.2h15.2v-15.2H608.1v15.2Zm143,-.7h15.2v-15.3H751.1v15.3Z" class="g0_1"/>
<path d="M54.6,1155H594.4m-.8,0H792.4m-.8,0h88.8" class="g5_1"/>
</svg>


 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
fill: none;
stroke: #000;
stroke-width: 1.222;
stroke-miterlimit: 10;
}
.g4_2{
fill: none;
stroke: #000;
stroke-width: 0.762;
stroke-miterlimit: 10;
}
.g5_2{
fill: none;
stroke: #000;
stroke-width: 0.757;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.2,73.3H880.8" class="g0_2"/>
<path d="M54.6,110H605.4M605,72.9v37.5" class="g1_2"/>
<path d="M55,128.3h55V110H55v18.3Z" class="g2_2"/>
<path d="M54.6,110h55.8" class="g3_2"/>
<path d="M54.6,128.3h55.8" class="g1_2"/>
<path d="M54.6,110H880.4" class="g3_2"/>
<path d="M54.6,128.3H880.4m-352.8,55H671.4M527.6,210.8H671.4M528,182.9v28.3M670.6,183.3h44.8m-44.8,27.5h44.8M715,182.9v28.3M527.6,220H671.4M527.6,247.5H671.4M528,219.6v28.3M670.6,220h44.8m-44.8,27.5h44.8M715,219.6v28.3m-187.4,8.8H671.4M527.6,284.2H671.4M528,256.3v28.3M670.6,256.7h44.8m-44.8,27.5h44.8M715,256.3v28.3m-187.4,8.7H671.4M527.6,320.8H671.4M528,292.9v28.3M670.6,293.3h44.8m-44.8,27.5h44.8M715,292.9v28.3M527.6,330H671.4M527.6,357.5H671.4M528,329.6v28.3M670.6,330h44.8m-44.8,27.5h44.8M715,329.6v28.3" class="g1_2"/>
<path d="M55,385h55V366.7H55V385Z" class="g2_2"/>
<path d="M54.6,366.7h55.8" class="g3_2"/>
<path d="M54.6,385h55.8" class="g1_2"/>
<path d="M54.6,366.7H880.4" class="g3_2"/>
<path d="M54.6,385H880.4M88,456.8h15.3V441.5H88v15.3Zm308,1.5H627V430.8H396v27.5Zm253,0H869V430.8H649v27.5Zm22,9.2H660M671,495H660m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M649,473v22.4m-.4,-.4H671m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H660m11,0H648.6m.4,-.4v22.4" class="g4_2"/>
<path d="M715,467.5H704M715,495H704m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M693,473v22.4m-.4,-.4H715m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H704m11,0H692.6m.4,-.4v22.4" class="g4_2"/>
<path d="M759,467.5H748M759,495H748m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M737,473v22.4m-.4,-.4H759m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H748m11,0H736.6m.4,-.4v22.4" class="g4_2"/>
<path d="M803,467.5H792M803,495H792m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M781,473v22.4m-.4,-.4H803m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H792m11,0H780.6m.4,-.4v22.4" class="g4_2"/>
<path d="M847,467.5H836M847,495H836m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M825,473v22.4m-.4,-.4H847m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H836m11,0H824.6m.4,-.4v22.4" class="g4_2"/>
<path d="M88,520.2h15.3V504.9H88v15.3Z" class="g1_2"/>
<path d="M55,550h55V531.7H55V550Z" class="g2_2"/>
<path d="M54.6,531.7h55.8" class="g3_2"/>
<path d="M54.6,550h55.8" class="g1_2"/>
<path d="M54.6,531.7H880.4" class="g3_2"/>
<path d="M54.6,550H880.4M198,632.5H462m-264,55H462m22,-33v11m-308,-11v11" class="g1_2"/>
<path d="M176,665.5v22.4m-.4,-.4H198m264,0h22.4m-.4,.4V665.5m0,-11V632.1m.4,.4H462m-264,0H175.6m.4,-.4v22.4" class="g5_2"/>
<path d="M176,742.5H297V715H176v27.5ZM583,660H869V632.5H583V660Zm0,36.7H869V669.2H583v27.5Zm66,36.6H869V705.8H649v27.5ZM54.6,770H880.4m-26.7,29.8H869V784.5H853.7v15.3ZM220,861.7H616V834.2H220v27.5Zm462,0H869V834.2H682v27.5ZM242,880H594M242,907.5H594M616,902V885.5M220,902V885.5" class="g1_2"/>
<path d="M220,885.5v22.4m-.4,-.4H242m352,0h22.4m-.4,.4V885.5m0,16.5V879.6m.4,.4H594m-352,0H219.6m.4,-.4V902" class="g5_2"/>
<path d="M682,907.5H803V880H682v27.5ZM220,953.3H616V925.8H220v27.5Zm462,0H869V925.8H682v27.5ZM220,990H616V962.5H220V990Zm462,0H869V962.5H682V990Zm-462,36.7H407V999.2H220v27.5Zm242,0H616V999.2H462v27.5Zm220,0H869V999.2H682v27.5Z" class="g1_2"/>
<path d="M54.6,1063.3H792.4m-.8,0h88.8" class="g0_2"/>
</svg>



 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_3{
fill: none;
stroke: #000;
stroke-width: 3.055;
stroke-miterlimit: 10;
}
.g1_3{
fill: #000;
}
.g2_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
stroke-dasharray: 7,4;
}
.g3_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
.g4_3{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,55H880.4M54.6,128.3H880.4" class="g0_3"/>
<path d="M55,481.3h55v-55H55v55Z" class="g1_3"/>
<path d="M54.6,846.4H880.4" class="g2_3"/>
<path d="M187,870.4v28.3M54.6,925.8H187.8M187,897.9v28.7m-.4,-.8H759.4" class="g3_3"/>
<path d="M758.2,889.2H880.4" class="g4_3"/>
<path d="M759,870.4v19.1m-.5,36.3H880.7m-121.4,-37v37.8" class="g3_3"/>
<path d="M54.6,980.8H77.4m-.8,0H330.4" class="g4_3"/>
<path d="M328.5,925.8H660.4m-331.9,55H660.4M330,924.3v58.1M658.5,925.8H825.4m-166.9,55H825.4M660,924.3v58.1M824.6,925.8h56.9m-56.9,55h56.9M880,924.3v58.1" class="g0_3"/>
<path d="M825,924.3v58.1m-495,-2v110.8m21.6,-73.7H880.4m-528.8,36.7H880.4M55,1090.8H880" class="g4_3"/>
</svg>

 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_4{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,73.3H880.4" class="g0_4"/>
</svg>




<style type="text/css">
.btn{border:0 none; height:30px; padding:0; width:30px; background-color:transparent; display:inline-block; margin:7px 5px 0; vertical-align:top; cursor:pointer; color:#fff;}
.btn:hover{background-color:#0e1319; color:#eddbd9; border-radius:5px;}
.page{box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);}
#formviewer{bottom:0; left:0; right:0; position:absolute; top:40px; background:#191f2f none repeat scroll 0 0;}
body{padding:0px; margin:0px; background-color:#191f2f;}
    {  z-index:9999; color:white;background-color:#707784; position:fixed; font-size:32px; margin:61px; opacity:0.8; top:0px; min-width:300px; min-height: 40px;margin-left: 706px;background: black;}


    
    .btn{border:0 none; height:30px; padding:0; width:30px; background-color:transparent; display:inline-block; margin:7px 5px 0; vertical-align:top; cursor:pointer; color:#fff;}
.btn:hover{background-color:#0e1319; color:#eddbd9; border-radius:5px;}
.page{box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);}
#formviewer{bottom:0; left:0; right:0; position:absolute; top:40px; background:#191f2f none repeat scroll 0 0;}
body{padding:0px; margin:0px; background-color:#191f2f;}
#FDFXFA_Menu{text-align:center;   z-index:9999; color:white;background-color:#707784; position:fixed; font-size:32px; margin:0px; opacity:0.8; top:0px; min-width:300px; min-height: 40px; margin-left: 725px;}




#FDFXFA_Menu a{cursor:pointer; border-radius:5px; padding:5px; font-family: IDRSymbols; margin:5px 10px 5px 10px;}
#FDFXFA_PageLabel{padding-left:5px;font-size:20px}
#FDFXFA_PageCount{padding-right:5px;font-size:20px}
#FDFXFA_Menu a:hover{background-color:#0e1319; color:#eddbd9;}
#FDFXFA_PageLabel{min-width:20px;display:inline-block;}
#FDFXFA_Processing{width:100%; height:100%;  position:fixed; background-color:black; opacity:0.8; color:white; top:0px;text-align: center; font-size:300px; font-family:IDRSymbols;}
#FDFXFA_Processing span{top:50%;left:50%;margin:-50px 0 0 -50px}
#FDFXFA_FormType,#FDFXFA_Form,#FDFXFA_PDFName,#FDFXFA_FormSubmitURL{display:none;}
@font-face {font-family:'IDRSymbols'; src: url(data:application/x-font-woff;charset=utf-8;base64,d09GRk9UVE8AABXAAAsAAAAAHqgAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAABDRkYgAAADNAAAEecAABjLaEwijEZGVE0AABVAAAAAHAAAABx9NjoUR0RFRgAAFRwAAAAiAAAAJgAnAE1PUy8yAAABaAAAAEoAAABgRXjg9mNtYXAAAALoAAAANwAAAUIADfLLaGVhZAAAAQgAAAA1AAAANgwgJhRoaGVhAAABQAAAAB4AAAAkBnAEBWhtdHgAABVcAAAAYgAAAIZxOhexbWF4cAAAAWAAAAAGAAAABgAnUABuYW1lAAABtAAAATIAAAIr0D8cW3Bvc3QAAAMgAAAAEwAAACD/hgAyeJxjYGRgYADi6EaeR/H8Nl8ZuJlfAEUYrlRGcIDpxV1nGNT/P2Hey1QO5HIwMIFEAUvIDCkAAAB4nGNgZGBgimBgYIhifgEkGZj3MjAyoAIZADoTAn4AAAAAUAAAJwAAeJxjYGF+zjiBgZWBgamLaTcDA0MPhGa8z2DIyAQUZWDlZIADAQSTISDNNYWh4QPDB1Vmhf8WDFFMEQwMDUCNcAUKQMgIAJVIDIsAAHichY/NasJAFIXP+FfcSPEJbgsFBRMm2QRcVhHsoosE3BaVNAY0IzFZ2HUfocs+Q5+rj9GTZAjdOYu531zOnHsugBF+oNCcBywtKwzxYbmDO3xZ7uIJv5Z7GKpHy33cq1fLA/YvVKrekK/n+lfFCmO8W+5w7qflLl7wbbmHsRpZ7kPUzPKA/TcsYHDGFTlSJDiggGCCPaasPjQ8BJiR19wjZI2oP6KkLiVluAALc77maXIoZLKfiq+9YCbrZSiROZZFajJKmt8R55ywqx1ARXQ97QwxRMzZJbtb5kAYJ+VxS1jVE4q65lTEdSaXqQTzNtN/16ZfZXZ4O+0GWJmsWJk8icV3tcylnU72Asdzqti3cm6YIOfGzeZC78rdrWuVCZs4v3Bh0dpztdZyw/APH2JUPwAAeJxjYGBgZoBgGQZGBhCwAfIYwXwWBgUgzQKEQP4H1f//gSTD//8CjFCVDIxsDDDmiAUAW8IGyAB4nGNgZgCD/80MRgxYAAAoRAG4AHiczViJX5RV978Pw8MMoMP6oLzigCwuaMmguFTSiEppvfpzxYXQLDVNpNcFUzMHExAHBHHXTMQFCc1McwHBETfMpbTSNjVfdxEmRb0P3oH7fi+PWe/vL3g/w+fcc88992z33HPPg0RcXYkkSR79+w4ZOid5fMpUIrkQiUSqXkTtLalxLmofndrS9auUp4PrPeUg6SevIEK8g1wifIJIm6AWcb6kg+A3EC8SQFqTcNKRRJOexEJeIwPJcJJI3iFTyL/Ih2QBySA5ZAVZTwpJMfmS7CcV5Dg5Q74nv5Br5A5xkCekQXKVPKVOUowUO2va5PioqChtMGtDtDZ00Yau2hCjDd20obs29NCGntrQWxvitKGPNvTVhn7aEN80mDV9Zk2fWdNn1vSZNX1mTZ9Z02fW9Jk1fWZNn1nTZ9b0mTV9Zk2fWdNn1vRFa/qiNX3Rmr5oTV+0pi86pk/KB3OmT5703syQ9u90CImGzk4hOK2QoSlTZ82cnDJtxvOj++sMCZEypcVSlrREsknZUo60VMqV8qRlUr60XFohrZRWSaulNdJaaZ20XvpU2iB9Jm2UCqRNUqG0WdoibZW2SUXSdqlY+lwqkXaQduKIQ8nbpEryl+aC9K1U5xLh0s3lNV17XaNrlWudLLstdO/uGdvsnWaXm+/z8vYa4vXEe5D3bh8Xn0yfAp+dPqU+532e+Mb71vjZ/Lf6n7aVq/3KpfLy+r3luvKApy3V4saWbuXO2Yrar36vs5/eWJAqqWH0c4VV0C02Z7asWulchR5jVpu6RnaOYCcU9pAtrd9nY3/QvFEJsjNcDVfUUHZLDae3ZOMTOliNVSYXpezcWVS0c2dK0eTJKSmTTW/TQKV+mHNpwzC3RLVUyXY66vfYbKpDbkhwDlKyhnOXsd3tnDdOIzZOPsu1cv5KlYWTQy7A+nQHCNVZOC8bTThJvGqVjWU1ddUOh0THPKhRw3VqO9pW6aCG1OidoTRR6aiGVuud4cBs7dTwLJtDdt5zhigdHDX6CBAjHA/07eg4xdbmQZbtsWzcQiNLaeRhGinRVBpxnLbFn66+uXpBCfFg4wJY2wCMDwJYJI2gkXq6jiWJhYegHmej/kT/YmDt6CgFeLsmPOAZJuJaU62rUe8rzvvV6n09dbJKhdayina0wkEr5YZwdkihKjvWjtod1C43HUQCBc8frLIDrawBrSFU8DxhJ9rRSget0Hgy1XtKHbOH4cAegtYQQu2Kg1V0ZHb6Bz3UxFP/VZ0OOpUHzC7ItRCVAC7qwuyMgPAIfGX0hOKsrVNrm0ylh7GuhjO7Tb0vawTsz3HeV0OFbTTqJHU5Qr1PSvTT4wIznNKpRtVbGU67HtEnHFaGs65H3FiPq8rVb07/9NM3b3TvPnBobOyAo1dNgwOYfLMrdTFxErpHnHbI13ZO3I047aB0KydeDzB1mwPMJQK0rqeRFtnVmBrOIA2eOEBr259wvv8+cmHCMYDII0iNg3XABg3BXqkBQH8QLFemCaFnIeCQhNVX52Da/iWIiugDEDgSwHzcAhNephYDlc33mAtzMXdisgkOHqVuzx3c8Xfv2NQZytXT8OoUvPrnoNjYN05qXt34u1dt/le8imryKvqZV+W04rlL9CJV/zqfN/vHxr55VvPk+t89Cf1f8aRzkyddmjwpSKWJNElCzUnUqW3VtgpLYkk0kSVS7ZcEbLQbS8xBribRkRIdrYYqbKRaS0fqjfWz8xXOi9q8z0nfI+9y0mVoMiep27Zx8i9be86/vJsKA6NhIFsBs3SjYb5zDTD9DJhavxBu1sTAh/Y9waI2B/bqZWD2Q1jg94hhcBbzoD7r3pvy3t3wrEEyJGRh+UCJcCcOstS9kPVCV8h6UmA1OLvVuyqcDPTHyqFvQNxHAJaMxZYd1WCMvyi2nAPmOhU0ulWcRgBUqdkIl9t8SPX9BiyXToJFfgjsuzARTBFCdAaGs7ZrL5aU7J7L3Khv5kEZrszG8mvDIOFiuTiJNyH1wmnIch9rNfR1zlHGvKWICP68cgFO4rEFYWnlYd81l/agL9i+vPhVYep4yxQb5+O+fp314MQ44MCU5OSUDfL8ngzxh4Iv9kCYFAIFd5dBQbuLIohlAD3drQbjE068p4L81qyjnN9qPd/B+bbXKkUA0jjpv7mcCsd5BSexxvlw48Fx2ozzNRMnInjRiG/jmkxO0i889OXkj8udwVXqwvnj974tS+RkaBcofumXHzjJCMjkPKPiICfjNoPWc85U6s0Mt1Pq/Fws9KA6AMf/8EMseJxBrB/VAmve5U8gaMTTB6B55jPAH4sFQeMPz9hNTVAjNm0WsoL9DHD49GXMPtRbIN8xAJuN4+DNg53AvBvIMyBoxDgEAr2/FmAvRD0oeEbjDh0xNUGN2LSZO96A/JAQTmJCMUsYYIf8ex7Y7CtMqBW3r8VEiwBWjUZ8/IEpj+0a4DXCJ0Hjd9ZaTQI+IzZtFrKC/awGTtZdF1f1Ryvk35oMMUqFWP0Nxv1jeRN4RiNKOKaBqyA1cDW23OstaGGQd3OqiM/NZKIRsRnLt96zB/tZXDgpDMKO+J+sSkrBrC1bCjYVFaVumm6anjorJdjPWzpNX1L8vF2TC2dsN2G6vXBzMciuxTM3TzNNmzkjObgPNSt+rq5Tij5Ad7Ftx46UbeguPphi8pO8OR9lFHndSsT+12ioMXWE+ms3QAy/an8GBI2YggTtrEUD/NoPTTQw/xpiMTVBjcivXbc2yQo2PkkpKi4pKinmpIdHLy4NmxeGqjH3iETPHKSjdx0o1akH1MFKTlr2oryFeQuXpi/PyFucn5Wbtyx/yfIlK5aszMrPWIHf0k+WGRblLVqdvuiThcutOQsMzIoeBWmz4HVOuokzrxqmctIaacJ/6yiOrFCEsBbg8X1RJjNgdMsPRM7agAVsF1k4DnwtXEUB3gjaP4bYUTBNcaJsBiwWpSNKHFIM1pt/i3W/jcA87FBQvxgLfRpAM14SquJEfLgIjSewzqIid5t9DWJiPhproK49boaH9zAzVxMNcUYpn2xM37x547Lly2cvmzFjdvonpvmXlPepd4memU4CaQ9kCt2KujbcBGGxFgjrK5LznwJrAoLGy9bCtc+vWUwIwqVR8Oa3wzD54jpgd+wAN9aD6dEVccWuQY7rz8DODBPX4nVspOKQalpi+jgNwBEIFtkh6s5AuM/vx+H54rWiLNdPB3BIIki+IvNFLTbsFdVvKbAur2P3wxPigoou8+5CxKTVS+C7NB8skQNFRNvdJqhdQfJE5BebeQO7HCcJ/CsuA8uHL4m7uAB7b16HqGIrsEpR8XwSgN1OBzZiAbb06ges5WtguVwKMKIvVjOP21EzF7pBzPg+uHhkurA1KRkSH50DceckGHJ2H6bxjRDxf6cAevbE1NwGfKWb/4svJwerm/KBeZohe8garHauF5kDzXxXN2AnTgCcfxELcYEWPE5bhmKLT6goKdVmmNd6HOYlbwHMGW8RJluEQ1A1TORixgZxNNfAF7IFYMwEAEs5ZNcWC9fmEXwBqCPUWoW596W9WC+KH/P6geYvzmS2AVSP6jUVYkYsh/ztAGJ6jjZfyvJYjo26fwdCeywVcSyNvCQAscpUjmdZ2Ytp7gXWHNvet2uAJ6yAgUUrLPFMzqZZ0FyvV6fBj429xQH2FKc/vARmff4uTpDfEh8Pb4u7//FTGGxtC+lz3IAt+Bka22zDwrhJmA5fD495vhVbRgRC0PgK6GtdA+LHaQAfVYEn7WPQ0ntgSxJW+e8iqTjCTopFwUzwBAtfQRDdgM2YfybyeZG4bmlboWrebEhdNFoUY9FarBMlqvhbYS0X9bV4CFYK8Hzz26es1J/6yMaVB+iM/XT6fklNPqKjdervSBMvESJ1k6izaBP4dfGmeiniVqAHIEEDIfmPf4M2ao54zsQr8hT28kspVgOLnzB2N7PgMLj46Pp3T4CrInuvqgCb0L0Rj3PEkJMEB2IfYZH9ArN7LxJ154p4UjIwfSVeFA0VCo9+iQ19ZoKmF/ltES+FwZMYsg4gsU98AaUsCWyV0bDLPQ9ACsbWF33Q01lK9r9P42GIU1Spbl9AxrAt4K0WGdY6EjT3D0DzFh2NLNqt+3fFQmcsNHsEzF08PlUdxIEtwGr5HlHrRgC7FSaqS0dxr0VfFHgOQusqISrAD7T0VEydJtGNUNPJIvwktQsN1fn/rsaoHkobDxbO4sQQehNwMP1OEa2lMzxXjmJXlAkTdrvVB59X2jRMfKxHPyMlv4wm8uXGwwi7fBmYKKKteEwTJnFpz6N5nCzVrdJxl7iOFrBL4rJxUQQFK/+XE3aRngKIunxMEtcy5zsEatcpixLqwUlua9CLqrRJr4eENx6zo/jwmEWQcfwjwqU8V3u2zBtbILUa6xeR/28jHX3pv0lqIY1TjowJY67D7PI4mgU8NGx0mUzjdilHE8LCRlTILItWK7QiCxkhWtB1h6ErqoMoHr1JWMSY8g4dcONsu3aXSPXHdujqP/tR2T1hgluD0FAPDU6hYfiYOuZaaZf3QcPwMY/CDpXJDBqGJtSF2StkKjQwaCBJQq7QwL8VuqChLqKsvAYabDTPVzXQPOZ92q9AXYzUZ91O0256Pzsbxm4oNpZH87LBJDtfoQ6lJicHjf8Rm42OLs2inVh7m3NEhC2HVjpDbTZWGWaTjcW7indu3bmS2tmO3XtoUnmZL+1GTfiQiPS7bqV38DFtG0Orlthg6XFnkWKbJCa7ZHbyjGKbLPCdMquqeo77VVtZ1XeKbYKY7padVniaw+yyX52VmsS/HvxuW9XwLDHvQCOpXd+wsEYx0lIaKn11S/cV1DkrbqkV+v0sVQnzMNJDWKCtkIRicgCT+ruqmxKOyZeYPB2MADgrorBhLDaA7NhPT5ZKdFSFml2qo9lqgqJms5PObLeR9IniDFVr1VC9scyuhldIdNkBtf0+Ha2gR/Dpf/MmdaWuN81N37x415mr+Sa++pKWKCyYujCZBuHnQmUaTIMZRhaEH+gs2GS0FUt0TLGSrNYU651Hv1fGjT+zeOUqefou1KUXRMVzTEeKk86HLqCb6OfOSaeR55Dsqf05GRL/Oz78ztcaVqxiL9DIhVbkujH9DueHr1XgFfE6znnFxHC88kHfIxlaXUFTWjsFt/rVIEiUyFwrlzrdFi/mlV+I+MoRNUEUFt9AYCcSQQt+2W5gh9gGfPlF7NJRy2klArfGfEH0PZ6is72/ExaeOY15zAgAryGiUId0ALr3krhVZ6YhGTNE+94RN5OfX4OVueJT4MWfwCm5f27n0o1mkNS4rZuVN5aKz4fU2djziYzbPQoPtNTPB37xe32COOl+ajbnP/+ahEaiDKl9fPIJNGmp/Q1/t86l9ae4w82eoLcggYmiN9kh2rs3raLWioLZC9r9Y9Ch87jzIH4RKyJwW1Rr9TgU39sD56tzARqSxXSk4HwcD+OWpkNm429vgjM9SnQXwb9i/7jhEBplFdjv4G+gED91vQWxvokPAJLeAmCOHr7nZWB5xfsQbEhEVeKrqkQz1fRq+YvLuh9g01yAH8PE7g1tEP/CYhhHwtfWoZPSDcW7EbMJpT3lbc5/8JoK7Ho2Hr6WhSjjv3VH87e0ECeSH4egRB3ifM+FTINxs3pQ/Csu8Bd6T6cOUHG7nAfovWybekB2VgQ4D9JA9aDe+PQj/6deiq2ZB0302J9bV3a4rFkzWuV5hL5yrVnzINLGj7iJ/566E18STeaRY9JIFknb0ki9p20QDc2ynZQ9/6zCjfbnVdj+vAoT2ZPmsvE26g939uO14/e3Iy4XRLfQ711g0fiiaDxYh+ngFkiJCAPCskbkamY8KvQofJnzx7vtBtpS78n+FMRfP2jRBPEX2j4TxM/ii6NJEP/ijkUTRCattGiCpG0L/yYoP2Plkrz8Zfnp+YuXp69Ny81ct3hNzvK81Z/uLly7es+ygsz1aRsNaRsnZS8qSCsp2bxoB043BS42CxRClgHzvGX9GB/HjqfJeJd9niLX5OVInlq3rLkZk+fNWYMjche94z3/STgT0VnK1WvXfmhYPTd3fsbshVNSrfOT02Z9/HHuzNxZ69I2zDd4/ge3HruHAHicY2BkYGDgAWIxBjkGJgZGIFQDYhagCBMQM0IwAAscAHUAAAAAAAEAAAAA1BlXPwAAAADUeVgIAAAAANSjisx4nGN+wWDE/IIhkfkZQwqQPg7ED4A4CYgnAvFRIE5gfsGoDcUcCMxwAoiPAfFJoN4PzM8YLYD0TCA+AcRAfYyRQLoTiuvBGKieYQGDOkM7QzNDCsNRhr9AfgsQPgIALOsuRwAA) format('woff'); font-weight:normal; font-style:normal;}
@media print {
#FDFXFA_Menu,#FDFXFA_Menu a,#FDFXFA_Menu label,#FDFXFA_Menu button{display:none}
#formviewer{overflow: visible}
div.page{box-shadow: none;}
}
</style>
</head>
<body style="margin: 0;" onload='idrform.init()'>

<div id='FDFXFA_Processing'>&#xF010;</div>
<div id='FDFXFA_FormType'>AcroForm</div>
<div id='FDFXFA_PDFName'>f940.pdf</div>
<div id='FDFXFA_Menu'><a title='Submit Form' onclick="FormViewer.handleFormSubmission('', 'formdata')">&#xF018;</a><a title='Go To FirstPage' onclick="idrform.app.execMenuItem('FirstPage')">&#xF01C;</a><a title='Go To PrevPage' onclick="idrform.app.execMenuItem('PrevPage')">&#xF01D;</a><label id='FDFXFA_PageLabel'><span id="btnPage">1</span></label><label id='FDFXFA_PageCount'>/ <span>6</span></label><a title='Go To NextPage' onclick="idrform.app.execMenuItem('NextPage')">&#xF01E;</a><a title='Go To LastPage' onclick="idrform.app.execMenuItem('LastPage')">&#xF01F;</a><a title='Save As Editable PDF' onclick="idrform.app.execMenuItem('SaveAs')">&#xF01A;</a><button id="btnZoomOut" title="Zoom Out" class="btn"><i class="fa fa-minus fa-lg" aria-hidden="true"></i></button><button id="btnZoomIn" title="Zoom In" class="btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></button></div>
<div id="formviewer">
<div></div>
<div id="overlay"></div>
<form>
<div id="contentContainer"  style="background: white;">
<div id="page1" style="width: 934px; height: 1209px; margin-top:20px;     margin-left: 600px;" class="page">
<div class="page-inner" style="width: 934px; height: 1209px;">

<div id="p1" class="pageArea" style="overflow: hidden; position: relative; width: 934px; height: 1209px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">

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

 
 
 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
stroke-width: 1.222;
stroke-miterlimit: 10;
}
.g4_1{
fill: none;
stroke: #000;
stroke-width: 1.145;
stroke-miterlimit: 10;
}
.g5_1{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M55,357.5H605V91.7H55V357.5ZM253,100.8H238.7M253,128.3H238.7m22,-5.5V106.3M231,122.8V106.3" class="g0_1"/>
<path d="M231,106.3v22.4m-.4,-.4H253m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H238.7m14.3,0H230.6m.4,-.3v22.3" class="g1_1"/>
<path d="M294.5,100.8H280.2m14.3,27.5H280.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M272.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H280.2m14.3,0H272.1m.4,-.3v22.3" class="g1_1"/>
<path d="M353.3,100.8H339m14.3,27.5H339m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M331.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H339m14.3,0H330.9m.4,-.3v22.3" class="g1_1"/>
<path d="M391.9,100.8H377.6m14.3,27.5H377.6m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M369.9,106.3v22.4m-.3,-.4h22.3m-14.3,0H400m-.4,.4V106.3m0,16.5V100.5m.4,.3H377.6m14.3,0H369.6m.3,-.3v22.3" class="g1_1"/>
<path d="M430.8,100.8H416.5m14.3,27.5H416.5m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M408.8,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H416.5m14.3,0H408.4m.4,-.3v22.3" class="g1_1"/>
<path d="M469.6,100.8H455.3m14.3,27.5H455.3m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M447.6,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H455.3m14.3,0H447.2m.4,-.3v22.3" class="g1_1"/>
<path d="M508.5,100.8H494.2m14.3,27.5H494.2m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M486.5,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.3m-.3,.4V106.3m0,16.5V100.5m.3,.3H494.2m14.3,0H486.1m.4,-.3v22.3" class="g1_1"/>
<path d="M547.2,100.8H532.9m14.3,27.5H532.9m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M525.2,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H532.9m14.3,0H524.8m.4,-.3v22.3" class="g1_1"/>
<path d="M586.3,100.8H572m14.3,27.5H572m22,-5.5V106.3m-29.7,16.5V106.3" class="g0_1"/>
<path d="M564.3,106.3v22.4m-.4,-.4h22.4m-14.3,0h22.4m-.4,.4V106.3m0,16.5V100.5m.4,.3H572m14.3,0H563.9m.4,-.3v22.3" class="g1_1"/>
<path d="M209,165H594V137.5H209V165Zm-33,36.7H594V174.2H176v27.5Zm-55,36.6H594V210.8H121v27.5Zm0,55H407V265.8H121v27.5Zm297,0h55V265.8H418v27.5Zm66,0H594V265.8H484v27.5ZM121,337.6H319V311.7H121v25.9Zm209,0H473V311.7H330v25.9Zm154,0H594V311.7H484v25.9ZM660,91.7H847M660,293.3H847M869,113.7V271.3M638,113.7V271.3" class="g0_1"/>
<path d="M638,271.3v22.4m-.4,-.4H660m187,0h22.4m-.4,.4V271.3m0,-157.6V91.3m.4,.4H847m-187,0H637.6m.4,-.4v22.4" class="g1_1"/>
<path d="M649,145H858V108.3H649V145Z" class="g2_1"/>
<path d="M650.8,165.7h15.3V150.4H650.8v15.3Zm0,27.5h15.3V177.9H650.8v15.3Zm0,27.5h15.3V205.4H650.8v15.3Zm0,27.5h15.3V232.9H650.8v15.3Z" class="g0_1"/>
<path d="M55,403.3h55V385H55v18.3Z" class="g2_1"/>
<path d="M54.6,385h55.8" class="g3_1"/>
<path d="M54.6,403.3h55.8" class="g0_1"/>
<path d="M54.6,385H880.4" class="g3_1"/>
<path d="M54.6,403.3H880.4M693,440h33V412.5H693V440Zm55,0h33V412.5H748V440Zm-54.4,34.4h15.3V459.1H693.6v15.3Zm0,28.2h15.3V487.4H693.6v15.2Z" class="g0_1"/>
<path d="M55,531.7h55V513.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,513.3h55.8" class="g3_1"/>
<path d="M54.6,531.7h55.8" class="g0_1"/>
<path d="M54.6,513.3H880.4" class="g3_1"/>
<path d="M54.6,531.7H880.4m-187.8,9.1H836.4M692.6,568.3H836.4M693,540.4v28.3M835.6,540.8h44.8m-44.8,27.5h44.8M880,540.4v28.3m-407.4,-.4H616.4M472.6,595.8H616.4M473,567.9v28.3M615.6,568.3h44.8m-44.8,27.5h44.8M660,567.9v28.3M242,621.8h15.3V606.5H242v15.3Zm0,18.3h15.3V624.9H242v15.2ZM473,621.8h15.3V606.5H473v15.3Zm0,18.3h15.3V624.9H473v15.2ZM660,621.8h15.3V606.5H660v15.3Zm-187.4,29H616.4M472.6,678.3H616.4M473,650.4v28.3M615.6,650.8h44.8m-44.8,27.5h44.8M660,650.4v28.3m32.6,-.4H836.4M692.6,705.8H836.4M693,677.9v28.3M835.6,678.3h44.8m-44.8,27.5h44.8M880,677.9v28.3M692.6,715H836.4M692.6,742.5H836.4M693,714.6v28.3M835.6,715h44.8m-44.8,27.5h44.8M880,714.6v28.3m-187.4,8.8H836.4M692.6,779.2H836.4M693,751.3v28.3M835.6,751.7h44.8m-44.8,27.5h44.8M880,751.3v28.3" class="g0_1"/>
<path d="M55,806.7h55V788.3H55v18.4Z" class="g2_1"/>
<path d="M54.6,788.3h55.8" class="g3_1"/>
<path d="M54.6,806.7h55.8" class="g0_1"/>
<path d="M54.6,788.3H880.4" class="g4_1"/>
<path d="M54.6,806.7H880.4m-187.8,9.1H836.4M692.6,843.3H836.4M693,815.4v28.3M835.6,815.8h44.8m-44.8,27.5h44.8M880,815.4v28.3m-187.4,18H836.4M692.6,889.2H836.4M693,861.3v28.3M835.6,861.7h44.8m-44.8,27.5h44.8M880,861.3v28.3M692.6,895H836.4M692.6,922.5H836.4M693,894.6v28.2M835.6,895h44.8m-44.8,27.5h44.8M880,894.6v28.2" class="g0_1"/>
<path d="M55,944.2h55V925.8H55v18.4Z" class="g2_1"/>
<path d="M54.6,925.8h55.8" class="g3_1"/>
<path d="M54.6,944.2h55.8" class="g0_1"/>
<path d="M109.6,925.8H880.4" class="g4_1"/>
<path d="M109.6,944.2H880.4M692.6,950H836.4M692.6,977.5H836.4M693,949.6v28.2M835.6,950h44.8m-44.8,27.5h44.8M880,949.6v28.2m-187.4,8.8H836.4m-143.8,27.5H836.4M693,986.2v28.3M835.6,986.6h44.8m-44.8,27.5h44.8M880,986.2v28.3M692.6,1045H836.4m-143.8,27.5H836.4M693,1044.6v28.3M835.6,1045h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-187.4,8.8H836.4m-143.8,27.5H836.4M693,1081.3v28.3m142.6,-27.9h44.8m-44.8,27.5h44.8m-.4,-27.9v28.3m-271.9,23.2h15.2v-15.2H608.1v15.2Zm143,-.7h15.2v-15.3H751.1v15.3Z" class="g0_1"/>
<path d="M54.6,1155H594.4m-.8,0H792.4m-.8,0h88.8" class="g5_1"/>
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
 

<!-- Begin inline CSS -->
<style type="text/css" >

#t1_1{left:55px;bottom:1129px;letter-spacing:-0.14px;}
#t2_1{left:86px;bottom:1122px;letter-spacing:-0.21px;}
#t3_1{left:253px;bottom:1127px;letter-spacing:0.19px;}
#t4_1{left:253px;bottom:1118px;letter-spacing:-0.14px;}
#t5_1{left:814px;bottom:1134px;letter-spacing:0.2px;}
#t6_1{left:781px;bottom:1118px;letter-spacing:-0.17px;}
#t7_1{left:66px;bottom:1092px;letter-spacing:-0.15px;}
#t8_1{left:66px;bottom:1079px;letter-spacing:-0.12px;}
#t9_1{left:312px;bottom:1086px;}
#ta_1{left:66px;bottom:1045px;letter-spacing:-0.17px;}
#tb_1{left:99px;bottom:1045px;letter-spacing:-0.14px;}
#tc_1{left:66px;bottom:1009px;letter-spacing:-0.16px;}
#td_1{left:130px;bottom:1009px;letter-spacing:-0.11px;}
#te_1{left:66px;bottom:970px;letter-spacing:-0.17px;}
#tf_1{left:123px;bottom:955px;letter-spacing:0.09px;}
#tg_1{left:224px;bottom:955px;letter-spacing:0.06px;}
#th_1{left:491px;bottom:955px;letter-spacing:0.08px;}
#ti_1{left:123px;bottom:900px;letter-spacing:0.07px;}
#tj_1{left:435px;bottom:900px;letter-spacing:0.08px;}
#tk_1{left:520px;bottom:900px;letter-spacing:0.08px;}
#tl_1{left:123px;bottom:856px;letter-spacing:0.08px;}
#tm_1{left:332px;bottom:856px;letter-spacing:0.08px;}
#tn_1{left:486px;bottom:856px;letter-spacing:0.08px;}
#to_1{left:655px;bottom:1080px;letter-spacing:-0.12px;}
#tp_1{left:655px;bottom:1066px;letter-spacing:-0.14px;}
#tq_1{left:671px;bottom:1040px;letter-spacing:0.09px;}
#tr_1{left:685px;bottom:1040px;letter-spacing:0.14px;}
#ts_1{left:671px;bottom:1012px;letter-spacing:0.1px;}
#tt_1{left:685px;bottom:1012px;letter-spacing:0.11px;}
#tu_1{left:671px;bottom:989px;letter-spacing:0.09px;}
#tv_1{left:685px;bottom:989px;letter-spacing:0.11px;}
#tw_1{left:686px;bottom:977px;letter-spacing:0.12px;}
#tx_1{left:671px;bottom:962px;letter-spacing:0.1px;}
#ty_1{left:685px;bottom:962px;letter-spacing:0.1px;}
#tz_1{left:686px;bottom:950px;letter-spacing:0.11px;}
#t10_1{left:649px;bottom:930px;letter-spacing:0.09px;}
#t11_1{left:683px;bottom:930px;letter-spacing:0.11px;}
#t12_1{left:807px;bottom:930px;letter-spacing:0.07px;}
#t13_1{left:649px;bottom:918px;letter-spacing:0.1px;}
#t14_1{left:55px;bottom:823px;letter-spacing:-0.01px;}
#t15_1{left:60px;bottom:804px;letter-spacing:-0.1px;}
#t16_1{left:121px;bottom:804px;letter-spacing:-0.12px;}
#t17_1{left:70px;bottom:767px;letter-spacing:-0.01px;}
#t18_1{left:99px;bottom:767px;letter-spacing:-0.01px;}
#t19_1{left:642px;bottom:767px;}
#t1a_1{left:671px;bottom:767px;letter-spacing:-0.01px;}
#t1b_1{left:70px;bottom:746px;letter-spacing:-0.01px;}
#t1c_1{left:99px;bottom:746px;letter-spacing:-0.01px;word-spacing:1.73px;}
#t1d_1{left:99px;bottom:730px;letter-spacing:-0.01px;}
#t1e_1{left:165px;bottom:730px;}
#t1f_1{left:183px;bottom:730px;}
#t1g_1{left:202px;bottom:730px;}
#t1h_1{left:220px;bottom:730px;}
#t1i_1{left:238px;bottom:730px;}
#t1j_1{left:257px;bottom:730px;}
#t1k_1{left:275px;bottom:730px;}
#t1l_1{left:293px;bottom:730px;}
#t1m_1{left:312px;bottom:730px;}
#t1n_1{left:330px;bottom:730px;}
#t1o_1{left:348px;bottom:730px;}
#t1p_1{left:367px;bottom:730px;}
#t1q_1{left:385px;bottom:730px;}
#t1r_1{left:403px;bottom:730px;}
#t1s_1{left:422px;bottom:730px;}
#t1t_1{left:440px;bottom:730px;}
#t1u_1{left:458px;bottom:730px;}
#t1v_1{left:477px;bottom:730px;}
#t1w_1{left:495px;bottom:730px;}
#t1x_1{left:513px;bottom:730px;}
#t1y_1{left:532px;bottom:730px;}
#t1z_1{left:550px;bottom:730px;}
#t20_1{left:568px;bottom:730px;}
#t21_1{left:587px;bottom:730px;}
#t22_1{left:605px;bottom:730px;}
#t23_1{left:623px;bottom:730px;}
#t24_1{left:642px;bottom:730px;}
#t25_1{left:671px;bottom:730px;letter-spacing:-0.01px;}
#t26_1{left:715px;bottom:743px;letter-spacing:0.1px;}
#t27_1{left:715px;bottom:730px;letter-spacing:0.11px;}
#t28_1{left:70px;bottom:703px;}
#t29_1{left:99px;bottom:703px;letter-spacing:-0.01px;}
#t2a_1{left:513px;bottom:703px;}
#t2b_1{left:532px;bottom:703px;}
#t2c_1{left:550px;bottom:703px;}
#t2d_1{left:568px;bottom:703px;}
#t2e_1{left:587px;bottom:703px;}
#t2f_1{left:605px;bottom:703px;}
#t2g_1{left:623px;bottom:703px;}
#t2h_1{left:642px;bottom:703px;}
#t2i_1{left:671px;bottom:703px;}
#t2j_1{left:715px;bottom:707px;letter-spacing:0.11px;}
#t2k_1{left:715px;bottom:694px;letter-spacing:0.11px;}
#t2l_1{left:60px;bottom:676px;letter-spacing:-0.1px;}
#t2m_1{left:121px;bottom:675px;letter-spacing:-0.12px;}
#t2n_1{left:70px;bottom:639px;}
#t2o_1{left:99px;bottom:639px;letter-spacing:-0.01px;}
#t2p_1{left:312px;bottom:639px;}
#t2q_1{left:330px;bottom:639px;}
#t2r_1{left:348px;bottom:639px;}
#t2s_1{left:367px;bottom:639px;}
#t2t_1{left:385px;bottom:639px;}
#t2u_1{left:403px;bottom:639px;}
#t2v_1{left:422px;bottom:639px;}
#t2w_1{left:440px;bottom:639px;}
#t2x_1{left:458px;bottom:639px;}
#t2y_1{left:477px;bottom:639px;}
#t2z_1{left:495px;bottom:639px;}
#t30_1{left:513px;bottom:639px;}
#t31_1{left:532px;bottom:639px;}
#t32_1{left:550px;bottom:639px;}
#t33_1{left:568px;bottom:639px;}
#t34_1{left:587px;bottom:639px;}
#t35_1{left:605px;bottom:639px;}
#t36_1{left:623px;bottom:639px;}
#t37_1{left:642px;bottom:639px;}
#t38_1{left:675px;bottom:639px;}
#t39_1{left:836px;bottom:635px;}
#t3a_1{left:70px;bottom:611px;}
#t3b_1{left:99px;bottom:611px;letter-spacing:-0.01px;}
#t3c_1{left:312px;bottom:611px;}
#t3d_1{left:330px;bottom:611px;}
#t3e_1{left:348px;bottom:611px;}
#t3f_1{left:367px;bottom:611px;}
#t3g_1{left:385px;bottom:611px;}
#t3h_1{left:403px;bottom:611px;}
#t3i_1{left:422px;bottom:611px;}
#t3j_1{left:455px;bottom:611px;}
#t3k_1{left:616px;bottom:607px;}
#t3l_1{left:99px;bottom:584px;letter-spacing:-0.01px;}
#t3m_1{left:220px;bottom:584px;letter-spacing:-0.01px;}
#t3n_1{left:265px;bottom:584px;letter-spacing:-0.01px;}
#t3o_1{left:220px;bottom:565px;letter-spacing:-0.01px;}
#t3p_1{left:265px;bottom:565px;letter-spacing:-0.01px;}
#t3q_1{left:451px;bottom:584px;letter-spacing:-0.01px;}
#t3r_1{left:494px;bottom:584px;letter-spacing:-0.01px;}
#t3s_1{left:451px;bottom:565px;letter-spacing:-0.01px;}
#t3t_1{left:494px;bottom:565px;letter-spacing:-0.01px;}
#t3u_1{left:638px;bottom:584px;letter-spacing:-0.01px;}
#t3v_1{left:680px;bottom:584px;letter-spacing:-0.01px;}
#t3w_1{left:70px;bottom:544px;}
#t3x_1{left:99px;bottom:544px;letter-spacing:-0.01px;word-spacing:0.06px;}
#t3y_1{left:99px;bottom:529px;letter-spacing:-0.01px;}
#t3z_1{left:147px;bottom:529px;}
#t40_1{left:165px;bottom:529px;}
#t41_1{left:183px;bottom:529px;}
#t42_1{left:202px;bottom:529px;}
#t43_1{left:220px;bottom:529px;}
#t44_1{left:238px;bottom:529px;}
#t45_1{left:257px;bottom:529px;}
#t46_1{left:275px;bottom:529px;}
#t47_1{left:293px;bottom:529px;}
#t48_1{left:312px;bottom:529px;}
#t49_1{left:330px;bottom:529px;}
#t4a_1{left:348px;bottom:529px;}
#t4b_1{left:367px;bottom:529px;}
#t4c_1{left:385px;bottom:529px;}
#t4d_1{left:403px;bottom:529px;}
#t4e_1{left:422px;bottom:529px;}
#t4f_1{left:455px;bottom:529px;}
#t4g_1{left:616px;bottom:525px;}
#t4h_1{left:70px;bottom:501px;}
#t4i_1{left:99px;bottom:501px;letter-spacing:-0.01px;}
#t4j_1{left:155px;bottom:501px;letter-spacing:-0.01px;}
#t4k_1{left:293px;bottom:501px;}
#t4l_1{left:312px;bottom:501px;}
#t4m_1{left:330px;bottom:501px;}
#t4n_1{left:348px;bottom:501px;}
#t4o_1{left:367px;bottom:501px;}
#t4p_1{left:385px;bottom:501px;}
#t4q_1{left:403px;bottom:501px;}
#t4r_1{left:422px;bottom:501px;}
#t4s_1{left:440px;bottom:501px;}
#t4t_1{left:458px;bottom:501px;}
#t4u_1{left:477px;bottom:501px;}
#t4v_1{left:495px;bottom:501px;}
#t4w_1{left:513px;bottom:501px;}
#t4x_1{left:532px;bottom:501px;}
#t4y_1{left:550px;bottom:501px;}
#t4z_1{left:568px;bottom:501px;}
#t50_1{left:587px;bottom:501px;}
#t51_1{left:605px;bottom:501px;}
#t52_1{left:623px;bottom:501px;}
#t53_1{left:642px;bottom:501px;}
#t54_1{left:675px;bottom:501px;}
#t55_1{left:836px;bottom:497px;}
#t56_1{left:70px;bottom:464px;}
#t57_1{left:99px;bottom:464px;letter-spacing:-0.01px;}
#t58_1{left:264px;bottom:464px;letter-spacing:-0.01px;}
#t59_1{left:495px;bottom:464px;}
#t5a_1{left:513px;bottom:464px;}
#t5b_1{left:532px;bottom:464px;}
#t5c_1{left:550px;bottom:464px;}
#t5d_1{left:568px;bottom:464px;}
#t5e_1{left:587px;bottom:464px;}
#t5f_1{left:605px;bottom:464px;}
#t5g_1{left:623px;bottom:464px;}
#t5h_1{left:642px;bottom:464px;}
#t5i_1{left:675px;bottom:464px;}
#t5j_1{left:836px;bottom:461px;}
#t5k_1{left:70px;bottom:428px;}
#t5l_1{left:99px;bottom:428px;letter-spacing:-0.01px;}
#t5m_1{left:283px;bottom:428px;letter-spacing:-0.01px;}
#t5n_1{left:422px;bottom:428px;}
#t5o_1{left:440px;bottom:428px;}
#t5p_1{left:458px;bottom:428px;}
#t5q_1{left:477px;bottom:428px;}
#t5r_1{left:495px;bottom:428px;}
#t5s_1{left:513px;bottom:428px;}
#t5t_1{left:532px;bottom:428px;}
#t5u_1{left:550px;bottom:428px;}
#t5v_1{left:568px;bottom:428px;}
#t5w_1{left:587px;bottom:428px;}
#t5x_1{left:605px;bottom:428px;}
#t5y_1{left:623px;bottom:428px;}
#t5z_1{left:642px;bottom:428px;}
#t60_1{left:675px;bottom:428px;}
#t61_1{left:836px;bottom:424px;}
#t62_1{left:60px;bottom:401px;letter-spacing:-0.1px;}
#t63_1{left:121px;bottom:401px;letter-spacing:-0.12px;}
#t64_1{left:70px;bottom:381px;}
#t65_1{left:99px;bottom:381px;letter-spacing:-0.01px;word-spacing:1.12px;}
#t66_1{left:99px;bottom:365px;letter-spacing:-0.01px;}
#t67_1{left:246px;bottom:365px;letter-spacing:-0.01px;}
#t68_1{left:283px;bottom:365px;}
#t69_1{left:295px;bottom:365px;letter-spacing:-0.01px;}
#t6a_1{left:477px;bottom:365px;}
#t6b_1{left:495px;bottom:365px;}
#t6c_1{left:513px;bottom:365px;}
#t6d_1{left:532px;bottom:365px;}
#t6e_1{left:550px;bottom:365px;}
#t6f_1{left:568px;bottom:365px;}
#t6g_1{left:587px;bottom:365px;}
#t6h_1{left:605px;bottom:365px;}
#t6i_1{left:623px;bottom:365px;}
#t6j_1{left:642px;bottom:365px;}
#t6k_1{left:675px;bottom:364px;}
#t6l_1{left:836px;bottom:360px;}
#t6m_1{left:63px;bottom:346px;letter-spacing:-0.01px;}
#t6n_1{left:99px;bottom:346px;letter-spacing:-0.01px;word-spacing:0.09px;}
#t6o_1{left:99px;bottom:332px;letter-spacing:-0.01px;word-spacing:3.27px;}
#t6p_1{left:415px;bottom:332px;letter-spacing:-0.01px;word-spacing:3.27px;}
#t6q_1{left:99px;bottom:318px;letter-spacing:-0.01px;}
#t6r_1{left:157px;bottom:318px;letter-spacing:-0.01px;word-spacing:0.13px;}
#t6s_1{left:642px;bottom:318px;}
#t6t_1{left:668px;bottom:318px;letter-spacing:-0.01px;}
#t6u_1{left:836px;bottom:314px;}
#t6v_1{left:63px;bottom:284px;letter-spacing:-0.01px;}
#t6w_1{left:99px;bottom:284px;letter-spacing:-0.01px;}
#t6x_1{left:257px;bottom:284px;letter-spacing:-0.01px;}
#t6y_1{left:532px;bottom:284px;}
#t6z_1{left:550px;bottom:284px;}
#t70_1{left:568px;bottom:284px;}
#t71_1{left:587px;bottom:284px;}
#t72_1{left:605px;bottom:284px;}
#t73_1{left:623px;bottom:284px;}
#t74_1{left:642px;bottom:284px;}
#t75_1{left:668px;bottom:284px;letter-spacing:-0.01px;}
#t76_1{left:836px;bottom:281px;}
#t77_1{left:60px;bottom:263px;letter-spacing:-0.1px;}
#t78_1{left:125px;bottom:263px;letter-spacing:-0.12px;}
#t79_1{left:63px;bottom:229px;letter-spacing:-0.01px;}
#t7a_1{left:99px;bottom:229px;letter-spacing:-0.01px;}
#t7b_1{left:307px;bottom:229px;letter-spacing:-0.01px;}
#t7c_1{left:495px;bottom:229px;}
#t7d_1{left:513px;bottom:229px;}
#t7e_1{left:532px;bottom:229px;}
#t7f_1{left:550px;bottom:229px;}
#t7g_1{left:568px;bottom:229px;}
#t7h_1{left:587px;bottom:229px;}
#t7i_1{left:605px;bottom:229px;}
#t7j_1{left:623px;bottom:229px;}
#t7k_1{left:642px;bottom:229px;}
#t7l_1{left:668px;bottom:229px;letter-spacing:-0.01px;}
#t7m_1{left:836px;bottom:226px;}
#t7n_1{left:63px;bottom:193px;letter-spacing:-0.01px;}
#t7o_1{left:99px;bottom:193px;letter-spacing:-0.01px;}
#t7p_1{left:642px;bottom:193px;}
#t7q_1{left:668px;bottom:193px;letter-spacing:-0.01px;}
#t7r_1{left:836px;bottom:189px;}
#t7s_1{left:63px;bottom:171px;letter-spacing:-0.01px;}
#t7t_1{left:99px;bottom:171px;letter-spacing:-0.01px;}
#t7u_1{left:183px;bottom:171px;letter-spacing:-0.01px;}
#t7v_1{left:99px;bottom:153px;}
#t7w_1{left:116px;bottom:153px;letter-spacing:-0.01px;}
#t7x_1{left:99px;bottom:136px;}
#t7y_1{left:116px;bottom:136px;letter-spacing:-0.01px;}
#t7z_1{left:532px;bottom:136px;}
#t80_1{left:550px;bottom:136px;}
#t81_1{left:568px;bottom:136px;}
#t82_1{left:587px;bottom:136px;}
#t83_1{left:605px;bottom:136px;}
#t84_1{left:623px;bottom:136px;}
#t85_1{left:642px;bottom:136px;}
#t86_1{left:668px;bottom:134px;letter-spacing:-0.01px;}
#t87_1{left:836px;bottom:131px;}
#t88_1{left:63px;bottom:98px;letter-spacing:-0.01px;}
#t89_1{left:99px;bottom:98px;letter-spacing:-0.01px;}
#t8a_1{left:189px;bottom:98px;letter-spacing:-0.01px;}
#t8b_1{left:622px;bottom:98px;letter-spacing:-0.01px;}
#t8c_1{left:668px;bottom:98px;letter-spacing:-0.01px;}
#t8d_1{left:836px;bottom:94px;}
#t8e_1{left:99px;bottom:72px;letter-spacing:-0.01px;}
#t8f_1{left:126px;bottom:72px;letter-spacing:-0.01px;}
#t8g_1{left:167px;bottom:72px;letter-spacing:-0.01px;}
#t8h_1{left:389px;bottom:72px;letter-spacing:-0.01px;}
#t8i_1{left:424px;bottom:72px;}
#t8j_1{left:526px;bottom:72px;letter-spacing:-0.01px;}
#t8k_1{left:627px;bottom:72px;letter-spacing:-0.01px;}
#t8l_1{left:771px;bottom:72px;letter-spacing:-0.01px;}
#t8m_1{left:55px;bottom:34px;letter-spacing:0.11px;}
#t8n_1{left:653px;bottom:34px;letter-spacing:-0.14px;}
#t8o_1{left:794px;bottom:35px;letter-spacing:-0.14px;}
#t8p_1{left:822px;bottom:33px;letter-spacing:0.15px;}
#t8q_1{left:851px;bottom:35px;letter-spacing:-0.14px;}

.s0_1{font-size:11px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s1_1{font-size:28px;font-family:HelveticaNeueLTStd-BlkCn_ws;color:#000;}
.s2_1{font-size:21px;font-family:ITCFranklinGothicStd-Demi_wr;color:#000;}
.s3_1{font-size:15px;font-family:OCRAStd_wn;color:#000;}
.s4_1{font-size:11px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s5_1{font-size:11px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
.s6_1{font-size:9px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s7_1{font-size:14px;font-family:HelveticaNeueLTStd-Bd_wo;color:#FFF;}
.s8_1{font-size:11px;font-family:HelveticaNeueLTStd-Bd_wo;color:#FFF;}
.s9_1{font-size:12px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sa_1{font-size:12px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.sb_1{font-size:12px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
.sc_1{font-size:13px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.sd_1{font-size:14px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.se_1{font-size:13px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sf_1{font-size:26px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sg_1{font-size:15px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.t.v0_1{transform:scaleX(0.849);}
.t.v1_1{transform:scaleX(0.98);}
.t.v2_1{transform:scaleX(0.897);}
.t.v3_1{transform:scaleX(0.96);}
.t.v4_1{transform:scaleX(0.935);}
#form1_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 237px;	top: 102px;	width: 70px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 338px;	top: 101px;	width: 261px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 209px;	top: 136px;	width: 384px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 651px;	top: 150px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form5_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 651px;	top: 177px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form6_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 176px;	top: 173px;	width: 417px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 651px;	top: 205px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form8_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 121px;	top: 209px;	width: 472px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form9_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 651px;	top: 232px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form10_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 121px;	top: 264px;	width: 284px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form11_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 419px;	top: 264px;	width: 54px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form12_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 484px;	top: 264px;	width: 109px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form13_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 121px;	top: 310px;	width: 197px;	height: 25px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form14_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 330px;	top: 310px;	width: 142px;	height: 25px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form15_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 484px;	top: 310px;	width: 109px;	height: 25px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form16_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 411px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form17_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 749px;	top: 411px;	width: 31px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form18_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 694px;	top: 459px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form19_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 694px;	top: 486px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form20_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 539px;	width: 138px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form21_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 833px;	top: 539px;	width: 29px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form22_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 474px;	top: 567px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form23_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 627px;	top: 567px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form24_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 242px;	top: 605px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form25_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 474px;	top: 605px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form26_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 660px;	top: 605px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form27_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 242px;	top: 624px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form28_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 474px;	top: 624px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form29_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 474px;	top: 649px;	width: 138px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form30_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 612px;	top: 649px;	width: 29px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form31_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 677px;	width: 138px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form32_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 833px;	top: 677px;	width: 29px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form33_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 714px;	width: 138px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form34_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 833px;	top: 714px;	width: 29px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form35_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 750px;	width: 138px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form36_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 833px;	top: 750px;	width: 29px;	height: 40px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form37_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 814px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form38_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 814px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form39_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 860px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form40_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 860px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form41_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 894px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form42_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 894px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form43_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 949px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form44_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 949px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form45_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 986px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form46_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 986px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form47_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 1044px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form48_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 1044px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form49_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 694px;	top: 1080px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form50_1{	z-index: 2;	padding: 0px;	position: absolute;	left: 847px;	top: 1080px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form51_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 752px;	top: 1115px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form52_1{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 608px;	top: 1117px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form25_1 { z-index:3; }
#form28_1 { z-index:2; }
#form18_1 { z-index:6; }
#form19_1 { z-index:5; }
#form26_1 { z-index:4; }
#form51_1 { z-index:3; }
#form52_1 { z-index:2; }
#form24_1 { z-index:3; }
#form27_1 { z-index:2; }
#form4_1 { z-index:5; }
#form5_1 { z-index:4; }
#form7_1 { z-index:3; }
#form9_1 { z-index:2; }

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts1" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_wo;
	src: url("fonts/HelveticaNeueLTStd-Bd_wo.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-BlkCn_ws;
	src: url("fonts/HelveticaNeueLTStd-BlkCn_ws.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_wp;
	src: url("fonts/HelveticaNeueLTStd-It_wp.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_wq;
	src: url("fonts/HelveticaNeueLTStd-Roman_wq.woff") format("woff");
}

@font-face {
	font-family: ITCFranklinGothicStd-Demi_wr;
	src: url("fonts/ITCFranklinGothicStd-Demi_wr.woff") format("woff");
}

@font-face {
	font-family: OCRAStd_wn;
	src: url("fonts/OCRAStd_wn.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg1" style="-webkit-user-select: none;"><object width="933" height="1209" data="1/1.svg" type="image/svg+xml" id="pdf1" style="width:933px; height:1209px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_1" class="t s0_1">Form </span><span id="t2_1" class="t s1_1">940 for 2023: </span>
<span id="t3_1" class="t v0_1 s2_1">Employer’s Annual Federal Unemployment (FUTA) Tax Return </span>
<span id="t4_1" class="t s0_1">Department of the Treasury — Internal Revenue Service </span>
<span id="t5_1" class="t s3_1">850113 </span>
<span id="t6_1" class="t s0_1">OMB No. 1545-0028 </span>
<span id="t7_1" class="t v1_1 s4_1">Employer identification number </span>
<span id="t8_1" class="t s4_1">(EIN) </span>
<span id="t9_1" class="t s0_1">— </span>
<span id="ta_1" class="t s4_1">Name </span><span id="tb_1" class="t s5_1">(not your trade name) </span>
<span id="tc_1" class="t s4_1">Trade name </span><span id="td_1" class="t s5_1">(if any) </span>
<span id="te_1" class="t s4_1">Address </span>
<span id="tf_1" class="t s6_1">Number </span><span id="tg_1" class="t s6_1">Street </span><span id="th_1" class="t s6_1">Suite or room number </span>
<span id="ti_1" class="t s6_1">City </span><span id="tj_1" class="t s6_1">State </span><span id="tk_1" class="t s6_1">ZIP code </span>
<span id="tl_1" class="t s6_1">Foreign country name </span><span id="tm_1" class="t s6_1">Foreign province/county </span><span id="tn_1" class="t s6_1">Foreign postal code </span>
<span id="to_1" class="t s7_1">Type of Return </span>
<span id="tp_1" class="t s8_1">(Check all that apply.) </span>
<span id="tq_1" class="t s9_1">a. </span><span id="tr_1" class="t sa_1">Amended </span>
<span id="ts_1" class="t s9_1">b. </span><span id="tt_1" class="t sa_1">Successor employer </span>
<span id="tu_1" class="t s9_1">c. </span><span id="tv_1" class="t sa_1">No payments to employees in </span>
<span id="tw_1" class="t sa_1">2023 </span>
<span id="tx_1" class="t s9_1">d. </span><span id="ty_1" class="t sa_1">Final: Business closed or </span>
<span id="tz_1" class="t sa_1">stopped paying wages </span>
<span id="t10_1" class="t sa_1">Go to </span><span id="t11_1" class="t sb_1">www.irs.gov/Form940 </span><span id="t12_1" class="t sa_1">for </span>
<span id="t13_1" class="t sa_1">instructions and the latest information. </span>
<span id="t14_1" class="t sc_1">Read the separate instructions before you complete this form. Please type or print within the boxes. </span>
<span id="t15_1" class="t s7_1">Part 1: </span><span id="t16_1" class="t sd_1">Tell us about your return. If any line does NOT apply, leave it blank. See instructions before completing Part 1. </span>
<span id="t17_1" class="t se_1">1a </span><span id="t18_1" class="t se_1">If you had to pay state unemployment tax in one state only, enter the state abbreviation </span><span id="t19_1" class="t sc_1">. </span><span id="t1a_1" class="t se_1">1a </span>
<span id="t1b_1" class="t se_1">1b </span><span id="t1c_1" class="t se_1">If you had to pay state unemployment tax in more than one state, you are a multi-state </span>
<span id="t1d_1" class="t se_1">employer </span><span id="t1e_1" class="t sc_1">. </span><span id="t1f_1" class="t sc_1">. </span><span id="t1g_1" class="t sc_1">. </span><span id="t1h_1" class="t sc_1">. </span><span id="t1i_1" class="t sc_1">. </span><span id="t1j_1" class="t sc_1">. </span><span id="t1k_1" class="t sc_1">. </span><span id="t1l_1" class="t sc_1">. </span><span id="t1m_1" class="t sc_1">. </span><span id="t1n_1" class="t sc_1">. </span><span id="t1o_1" class="t sc_1">. </span><span id="t1p_1" class="t sc_1">. </span><span id="t1q_1" class="t sc_1">. </span><span id="t1r_1" class="t sc_1">. </span><span id="t1s_1" class="t sc_1">. </span><span id="t1t_1" class="t sc_1">. </span><span id="t1u_1" class="t sc_1">. </span><span id="t1v_1" class="t sc_1">. </span><span id="t1w_1" class="t sc_1">. </span><span id="t1x_1" class="t sc_1">. </span><span id="t1y_1" class="t sc_1">. </span><span id="t1z_1" class="t sc_1">. </span><span id="t20_1" class="t sc_1">. </span><span id="t21_1" class="t sc_1">. </span><span id="t22_1" class="t sc_1">. </span><span id="t23_1" class="t sc_1">. </span><span id="t24_1" class="t sc_1">. </span><span id="t25_1" class="t se_1">1b </span>
<span id="t26_1" class="t sa_1">Check here. </span>
<span id="t27_1" class="t v2_1 sa_1">Complete Schedule A (Form 940). </span>
<span id="t28_1" class="t se_1">2 </span><span id="t29_1" class="t se_1">If you paid wages in a state that is subject to CREDIT REDUCTION </span><span id="t2a_1" class="t sc_1">. </span><span id="t2b_1" class="t sc_1">. </span><span id="t2c_1" class="t sc_1">. </span><span id="t2d_1" class="t sc_1">. </span><span id="t2e_1" class="t sc_1">. </span><span id="t2f_1" class="t sc_1">. </span><span id="t2g_1" class="t sc_1">. </span><span id="t2h_1" class="t sc_1">. </span><span id="t2i_1" class="t se_1">2 </span>
<span id="t2j_1" class="t sa_1">Check here. </span>
<span id="t2k_1" class="t v2_1 sa_1">Complete Schedule A (Form 940). </span>
<span id="t2l_1" class="t s7_1">Part 2: </span><span id="t2m_1" class="t sd_1">Determine your FUTA tax before adjustments. If any line does NOT apply, leave it blank. </span>
<span id="t2n_1" class="t se_1">3 </span><span id="t2o_1" class="t se_1">Total payments to all employees </span><span id="t2p_1" class="t sc_1">. </span><span id="t2q_1" class="t sc_1">. </span><span id="t2r_1" class="t sc_1">. </span><span id="t2s_1" class="t sc_1">. </span><span id="t2t_1" class="t sc_1">. </span><span id="t2u_1" class="t sc_1">. </span><span id="t2v_1" class="t sc_1">. </span><span id="t2w_1" class="t sc_1">. </span><span id="t2x_1" class="t sc_1">. </span><span id="t2y_1" class="t sc_1">. </span><span id="t2z_1" class="t sc_1">. </span><span id="t30_1" class="t sc_1">. </span><span id="t31_1" class="t sc_1">. </span><span id="t32_1" class="t sc_1">. </span><span id="t33_1" class="t sc_1">. </span><span id="t34_1" class="t sc_1">. </span><span id="t35_1" class="t sc_1">. </span><span id="t36_1" class="t sc_1">. </span><span id="t37_1" class="t sc_1">. </span><span id="t38_1" class="t se_1">3 </span>
<span id="t39_1" class="t sf_1">. </span>
<span id="t3a_1" class="t se_1">4 </span><span id="t3b_1" class="t se_1">Payments exempt from FUTA tax </span><span id="t3c_1" class="t sc_1">. </span><span id="t3d_1" class="t sc_1">. </span><span id="t3e_1" class="t sc_1">. </span><span id="t3f_1" class="t sc_1">. </span><span id="t3g_1" class="t sc_1">. </span><span id="t3h_1" class="t sc_1">. </span><span id="t3i_1" class="t sc_1">. </span><span id="t3j_1" class="t se_1">4 </span>
<span id="t3k_1" class="t sf_1">. </span>
<span id="t3l_1" class="t v3_1 sc_1">Check all that apply: </span><span id="t3m_1" class="t se_1">4a </span><span id="t3n_1" class="t sc_1">Fringe benefits </span>
<span id="t3o_1" class="t se_1">4b </span><span id="t3p_1" class="t sc_1">Group-term life insurance </span>
<span id="t3q_1" class="t se_1">4c </span><span id="t3r_1" class="t sc_1">Retirement/Pension </span>
<span id="t3s_1" class="t se_1">4d </span><span id="t3t_1" class="t sc_1">Dependent care </span>
<span id="t3u_1" class="t se_1">4e </span><span id="t3v_1" class="t sc_1">Other </span>
<span id="t3w_1" class="t se_1">5 </span><span id="t3x_1" class="t se_1">Total of payments made to each employee in excess of </span>
<span id="t3y_1" class="t se_1">$7,000 </span><span id="t3z_1" class="t sc_1">. </span><span id="t40_1" class="t sc_1">. </span><span id="t41_1" class="t sc_1">. </span><span id="t42_1" class="t sc_1">. </span><span id="t43_1" class="t sc_1">. </span><span id="t44_1" class="t sc_1">. </span><span id="t45_1" class="t sc_1">. </span><span id="t46_1" class="t sc_1">. </span><span id="t47_1" class="t sc_1">. </span><span id="t48_1" class="t sc_1">. </span><span id="t49_1" class="t sc_1">. </span><span id="t4a_1" class="t sc_1">. </span><span id="t4b_1" class="t sc_1">. </span><span id="t4c_1" class="t sc_1">. </span><span id="t4d_1" class="t sc_1">. </span><span id="t4e_1" class="t sc_1">. </span><span id="t4f_1" class="t se_1">5 </span>
<span id="t4g_1" class="t sf_1">. </span>
<span id="t4h_1" class="t se_1">6 </span><span id="t4i_1" class="t se_1">Subtotal </span><span id="t4j_1" class="t sc_1">(line 4 + line 5 = line 6) </span><span id="t4k_1" class="t sc_1">. </span><span id="t4l_1" class="t sc_1">. </span><span id="t4m_1" class="t sc_1">. </span><span id="t4n_1" class="t sc_1">. </span><span id="t4o_1" class="t sc_1">. </span><span id="t4p_1" class="t sc_1">. </span><span id="t4q_1" class="t sc_1">. </span><span id="t4r_1" class="t sc_1">. </span><span id="t4s_1" class="t sc_1">. </span><span id="t4t_1" class="t sc_1">. </span><span id="t4u_1" class="t sc_1">. </span><span id="t4v_1" class="t sc_1">. </span><span id="t4w_1" class="t sc_1">. </span><span id="t4x_1" class="t sc_1">. </span><span id="t4y_1" class="t sc_1">. </span><span id="t4z_1" class="t sc_1">. </span><span id="t50_1" class="t sc_1">. </span><span id="t51_1" class="t sc_1">. </span><span id="t52_1" class="t sc_1">. </span><span id="t53_1" class="t sc_1">. </span><span id="t54_1" class="t se_1">6 </span>
<span id="t55_1" class="t sf_1">. </span>
<span id="t56_1" class="t se_1">7 </span><span id="t57_1" class="t se_1">Total taxable FUTA wages </span><span id="t58_1" class="t sc_1">(line 3 – line 6 = line 7). See instructions </span><span id="t59_1" class="t sc_1">. </span><span id="t5a_1" class="t sc_1">. </span><span id="t5b_1" class="t sc_1">. </span><span id="t5c_1" class="t sc_1">. </span><span id="t5d_1" class="t sc_1">. </span><span id="t5e_1" class="t sc_1">. </span><span id="t5f_1" class="t sc_1">. </span><span id="t5g_1" class="t sc_1">. </span><span id="t5h_1" class="t sc_1">. </span><span id="t5i_1" class="t se_1">7 </span>
<span id="t5j_1" class="t sf_1">. </span>
<span id="t5k_1" class="t se_1">8 </span><span id="t5l_1" class="t se_1">FUTA tax before adjustments </span><span id="t5m_1" class="t sc_1">(line 7 x 0.006 = line 8) </span><span id="t5n_1" class="t sc_1">. </span><span id="t5o_1" class="t sc_1">. </span><span id="t5p_1" class="t sc_1">. </span><span id="t5q_1" class="t sc_1">. </span><span id="t5r_1" class="t sc_1">. </span><span id="t5s_1" class="t sc_1">. </span><span id="t5t_1" class="t sc_1">. </span><span id="t5u_1" class="t sc_1">. </span><span id="t5v_1" class="t sc_1">. </span><span id="t5w_1" class="t sc_1">. </span><span id="t5x_1" class="t sc_1">. </span><span id="t5y_1" class="t sc_1">. </span><span id="t5z_1" class="t sc_1">. </span><span id="t60_1" class="t se_1">8 </span>
<span id="t61_1" class="t sf_1">. </span>
<span id="t62_1" class="t s7_1">Part 3: </span><span id="t63_1" class="t sd_1">Determine your adjustments. If any line does NOT apply, leave it blank. </span>
<span id="t64_1" class="t se_1">9 </span><span id="t65_1" class="t se_1">If ALL of the taxable FUTA wages you paid were excluded from state unemployment tax, </span>
<span id="t66_1" class="t se_1">multiply line 7 by 0.054 </span><span id="t67_1" class="t sc_1">(line 7 </span><span id="t68_1" class="t sc_1">× </span><span id="t69_1" class="t sc_1">0.054 = line 9). Go to line 12 </span><span id="t6a_1" class="t sc_1">. </span><span id="t6b_1" class="t sc_1">. </span><span id="t6c_1" class="t sc_1">. </span><span id="t6d_1" class="t sc_1">. </span><span id="t6e_1" class="t sc_1">. </span><span id="t6f_1" class="t sc_1">. </span><span id="t6g_1" class="t sc_1">. </span><span id="t6h_1" class="t sc_1">. </span><span id="t6i_1" class="t sc_1">. </span><span id="t6j_1" class="t sc_1">. </span><span id="t6k_1" class="t se_1">9 </span>
<span id="t6l_1" class="t sf_1">. </span>
<span id="t6m_1" class="t se_1">10 </span><span id="t6n_1" class="t se_1">If SOME of the taxable FUTA wages you paid were excluded from state unemployment tax, </span>
<span id="t6o_1" class="t se_1">OR you paid ANY state unemployment tax late </span><span id="t6p_1" class="t sc_1">(after the due date for filing Form 940), </span>
<span id="t6q_1" class="t sc_1">complete </span><span id="t6r_1" class="t sc_1">the worksheet in the instructions. Enter the amount from line 7 of the worksheet . </span><span id="t6s_1" class="t sc_1">. </span><span id="t6t_1" class="t se_1">10 </span>
<span id="t6u_1" class="t sf_1">. </span>
<span id="t6v_1" class="t se_1">11 </span><span id="t6w_1" class="t se_1">If credit reduction applies</span><span id="t6x_1" class="t sc_1">, enter the total from Schedule A (Form 940) </span><span id="t6y_1" class="t sc_1">. </span><span id="t6z_1" class="t sc_1">. </span><span id="t70_1" class="t sc_1">. </span><span id="t71_1" class="t sc_1">. </span><span id="t72_1" class="t sc_1">. </span><span id="t73_1" class="t sc_1">. </span><span id="t74_1" class="t sc_1">. </span><span id="t75_1" class="t se_1">11 </span>
<span id="t76_1" class="t sf_1">. </span>
<span id="t77_1" class="t s7_1">Part 4: </span><span id="t78_1" class="t sd_1">Determine your FUTA tax and balance due or overpayment. If any line does NOT apply, leave it blank. </span>
<span id="t79_1" class="t se_1">12 </span><span id="t7a_1" class="t se_1">Total FUTA tax after adjustments </span><span id="t7b_1" class="t sc_1">(lines 8 + 9 + 10 + 11 = line 12) </span><span id="t7c_1" class="t sc_1">. </span><span id="t7d_1" class="t sc_1">. </span><span id="t7e_1" class="t sc_1">. </span><span id="t7f_1" class="t sc_1">. </span><span id="t7g_1" class="t sc_1">. </span><span id="t7h_1" class="t sc_1">. </span><span id="t7i_1" class="t sc_1">. </span><span id="t7j_1" class="t sc_1">. </span><span id="t7k_1" class="t sc_1">. </span><span id="t7l_1" class="t se_1">12 </span>
<span id="t7m_1" class="t sf_1">. </span>
<span id="t7n_1" class="t se_1">13 </span><span id="t7o_1" class="t se_1">FUTA tax deposited for the year, including any overpayment applied from a prior year </span><span id="t7p_1" class="t sc_1">. </span><span id="t7q_1" class="t se_1">13 </span>
<span id="t7r_1" class="t sf_1">. </span>
<span id="t7s_1" class="t se_1">14 </span><span id="t7t_1" class="t se_1">Balance due. </span><span id="t7u_1" class="t sc_1">If line 12 is more than line 13, enter the excess on line 14. </span>
<span id="t7v_1" class="t sc_1">• </span><span id="t7w_1" class="t sc_1">If line 14 is more than $500, you must deposit your tax. </span>
<span id="t7x_1" class="t sc_1">• </span><span id="t7y_1" class="t sc_1">If line 14 is $500 or less, you may pay with this return. See instructions </span><span id="t7z_1" class="t sc_1">. </span><span id="t80_1" class="t sc_1">. </span><span id="t81_1" class="t sc_1">. </span><span id="t82_1" class="t sc_1">. </span><span id="t83_1" class="t sc_1">. </span><span id="t84_1" class="t sc_1">. </span><span id="t85_1" class="t sc_1">. </span>
<span id="t86_1" class="t se_1">14 </span>
<span id="t87_1" class="t sf_1">. </span>
<span id="t88_1" class="t se_1">15 </span><span id="t89_1" class="t se_1">Overpayment. </span><span id="t8a_1" class="t sc_1">If line 13 is more than line 12, enter the excess on line 15 and check a box </span><span id="t8b_1" class="t sc_1">below </span><span id="t8c_1" class="t se_1">15 </span>
<span id="t8d_1" class="t sf_1">. </span>
<span id="t8e_1" class="t sc_1">You </span><span id="t8f_1" class="t se_1">MUST </span><span id="t8g_1" class="t sc_1">complete both pages of this form and </span><span id="t8h_1" class="t se_1">SIGN </span><span id="t8i_1" class="t sc_1">it. </span><span id="t8j_1" class="t sc_1">Check one: </span><span id="t8k_1" class="t v4_1 sc_1">Apply to next return. </span><span id="t8l_1" class="t sc_1">Send a refund. </span>
<span id="t8m_1" class="t s9_1">For Privacy Act and Paperwork Reduction Act Notice, see the back of the Payment Voucher. </span><span id="t8n_1" class="t s0_1">Cat. No. 11234O </span><span id="t8o_1" class="t s0_1">Form </span><span id="t8p_1" class="t sg_1">940 </span><span id="t8q_1" class="t s0_1">(2023) </span></div>
<!-- End text definitions -->


<!-- Begin Form Data -->
<input id="form1_1" type="text" tabindex="1" maxlength="2" value="" data-objref="358 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_1[0]"/>
<input id="form2_1" type="text" tabindex="2" maxlength="7" value="" data-objref="359 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_2[0]"/>






<?php
 if (isset($get_cominfo) && !empty($get_cominfo)) {
    $company_name = $get_cominfo[0]['company_name'];
} else {
     $company_name = 'Default Name';
}
?>
 
<input id="form3_1" type="text" tabindex="3" 
value="<?php echo htmlspecialchars($company_name, ENT_QUOTES,'UTF-8'); ?>"  
data-objref="360 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_3[0]" style="margin-left: 5px;"/>





<input id="form4_1" type="checkbox" tabindex="12" value="Report1" data-objref="354 0 R" data-field-name="topmostSubform[0].Page1[0].TypeReturn[0].c1_1[0]" imageName="1/form/354 0 R" images="110100"/>



<input id="form5_1" type="checkbox" tabindex="13" value="Report2" data-objref="355 0 R" data-field-name="topmostSubform[0].Page1[0].TypeReturn[0].c1_2[0]" imageName="1/form/355 0 R" images="110100"/>




<?php
$username = 'Default Address';
if (isset($get_cdata) && !empty($get_cdata[0]['username'])) {
    $username = $get_cdata[0]['username'];
}
?>
<input id="form6_1" type="text" tabindex="4" 
value="<?php echo htmlspecialchars($username, ENT_QUOTES,'UTF-8'); ?>"  
data-objref="361 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_4[0]" style="margin-left: 5px;" />








<input id="form7_1" type="checkbox" tabindex="14" value="Report3" data-objref="356 0 R" data-field-name="topmostSubform[0].Page1[0].TypeReturn[0].c1_3[0]" imageName="1/form/356 0 R" images="110100"/>



<?php
$address = isset($get_cominfo[0]['address']) ? $get_cominfo[0]['address'] : 'Default Address';
$get_address = explode(',' , $address);
?>
<input id="form8_1" type="text" tabindex="5" 
value="<?php echo htmlspecialchars($get_address[0], ENT_QUOTES, 'UTF-8'); ?><?php echo htmlspecialchars($get_address[1], ENT_QUOTES, 'UTF-8'); ?><?php echo htmlspecialchars($get_address[2], ENT_QUOTES, 'UTF-8'); ?>"
data-objref="362 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_5[0]" style="margin-left: 5px;"/>








<input id="form9_1" type="checkbox" tabindex="15" value="Report4" data-objref="357 0 R" data-field-name="topmostSubform[0].Page1[0].TypeReturn[0].c1_4[0]" imageName="1/form/357 0 R" images="110100"/>

<input id="form10_1" type="text" tabindex="6" 
 value="<?php echo htmlspecialchars($get_address[1], ENT_QUOTES, 'UTF-8'); ?>"
data-objref="363 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_6[0]" style="margin-left: 5px;" />







<input id="form11_1" type="text" tabindex="7" maxlength="2" 
value="<?php echo htmlspecialchars($get_address[2], ENT_QUOTES, 'UTF-8'); ?>" 
data-objref="364 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_7[0]"/>

<input id="form12_1" type="text" tabindex="8" maxlength="10" value="" data-objref="365 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_8[0]"/>






<input id="form13_1" type="text" tabindex="9" value="" data-objref="366 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_9[0]"/>
<input id="form14_1" type="text" tabindex="10" value="" data-objref="367 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_10[0]"/>
<input id="form15_1" type="text" tabindex="11" value="" data-objref="368 0 R" data-field-name="topmostSubform[0].Page1[0].EntityArea[0].f1_11[0]"/>
<input id="form16_1" type="text" tabindex="16" maxlength="1" value="" data-objref="315 0 R" data-field-name="topmostSubform[0].Page1[0].f1_12[0]"/>
<input id="form17_1" type="text" tabindex="17" maxlength="1" value="" data-objref="316 0 R" data-field-name="topmostSubform[0].Page1[0].f1_13[0]"/>
<input id="form18_1" type="checkbox" tabindex="18" value="1" data-objref="317 0 R" data-field-name="topmostSubform[0].Page1[0].c1_5[0]" imageName="1/form/317 0 R" images="110100"/>
<input id="form19_1" type="checkbox" tabindex="19" value="1" data-objref="318 0 R" data-field-name="topmostSubform[0].Page1[0].c1_6[0]" imageName="1/form/318 0 R" images="110100"/>
<input id="form20_1" type="text" tabindex="20" value="" data-objref="319 0 R" data-field-name="topmostSubform[0].Page1[0].f1_14[0]"/>
<input id="form21_1" type="text" tabindex="21" maxlength="2" value="" data-objref="320 0 R" data-field-name="topmostSubform[0].Page1[0].f1_15[0]"/>
<input id="form22_1" type="text" tabindex="22" value="" data-objref="321 0 R" data-field-name="topmostSubform[0].Page1[0].f1_16[0]"/>
<input id="form23_1" type="text" tabindex="23" maxlength="2" value="" data-objref="322 0 R" data-field-name="topmostSubform[0].Page1[0].f1_17[0]"/>
<input id="form24_1" type="checkbox" tabindex="24" value="1" data-objref="352 0 R" data-field-name="topmostSubform[0].Page1[0].Checkboxes4a-b[0].c1_7[0]" imageName="1/form/352 0 R" images="110100"/>
<input id="form25_1" type="checkbox" tabindex="26" value="1" data-objref="350 0 R" data-field-name="topmostSubform[0].Page1[0].Checkboxes4c-d[0].c1_9[0]" imageName="1/form/350 0 R" images="110100"/>
<input id="form26_1" type="checkbox" tabindex="28" value="1" data-objref="325 0 R" data-field-name="topmostSubform[0].Page1[0].c1_11[0]" imageName="1/form/325 0 R" images="110100"/>
<input id="form27_1" type="checkbox" tabindex="25" value="1" data-objref="353 0 R" data-field-name="topmostSubform[0].Page1[0].Checkboxes4a-b[0].c1_8[0]" imageName="1/form/353 0 R" images="110100"/>
<input id="form28_1" type="checkbox" tabindex="27" value="1" data-objref="351 0 R" data-field-name="topmostSubform[0].Page1[0].Checkboxes4c-d[0].c1_10[0]" imageName="1/form/351 0 R" images="110100"/>





<?php
 if (isset($amountGreaterThan) && !empty($amountGreaterThan)) {
    $totalAmount = $amountGreaterThan['totalAmount'];
} else {
     $totalAmount = '0';
}


$parts = explode('.', number_format($totalAmount, 2, '.', ''));
// Preparing the integer and decimal parts
$integerPart = $parts[0];
$decimalPart = isset($parts[1]) ? $parts[1] : '00'; // Default to '00' if no decimal part
?>
<input id="form29_1" type="text" tabindex="29" 
value="$<?php echo htmlspecialchars($integerPart, ENT_QUOTES, 'UTF-8'); ?>" 
data-objref="326 0 R" data-field-name="topmostSubform[0].Page1[0].f1_18[0]"/>
<input id="form30_1" type="text" tabindex="30" maxlength="2" 
value="<?php echo htmlspecialchars($decimalPart, ENT_QUOTES, 'UTF-8'); ?>" 
 data-objref="327 0 R" data-field-name="topmostSubform[0].Page1[0].f1_19[0]"/>






<?php  
 $SumofFUTAwages   =  $totalAmount;


 $parts = explode('.', number_format($SumofFUTAwages, 2, '.', ''));
// Preparing the integer and decimal parts
$integerPart = $parts[0];
$decimalPart = isset($parts[1]) ? $parts[1] : '00'; // Default to '00' if no decimal part
 ?>




<input id="form31_1" type="text" tabindex="31"
value="$<?php echo htmlspecialchars($integerPart, ENT_QUOTES, 'UTF-8'); ?>" 
data-objref="328 0 R" data-field-name="topmostSubform[0].Page1[0].f1_20[0]"/>

<input id="form32_1" type="text" tabindex="32" maxlength="2"
value="<?php echo htmlspecialchars($decimalPart, ENT_QUOTES, 'UTF-8'); ?>" 
  data-objref="329 0 R" data-field-name="topmostSubform[0].Page1[0].f1_21[0]"/>







<input id="form33_1" type="text" tabindex="33" value="" data-objref="330 0 R" data-field-name="topmostSubform[0].Page1[0].f1_22[0]"/>
<input id="form34_1" type="text" tabindex="34" maxlength="2" value="" data-objref="331 0 R" data-field-name="topmostSubform[0].Page1[0].f1_23[0]"/>









<input id="form35_1" type="text" tabindex="35" value="" data-objref="332 0 R" data-field-name="topmostSubform[0].Page1[0].f1_24[0]"/>
<input id="form36_1" type="text" tabindex="36" maxlength="2" value="" data-objref="333 0 R" data-field-name="topmostSubform[0].Page1[0].f1_25[0]"/>





<input id="form37_1" type="text" tabindex="37" value="" data-objref="334 0 R" data-field-name="topmostSubform[0].Page1[0].f1_26[0]"/>
<input id="form38_1" type="text" tabindex="38" maxlength="2" value="" data-objref="335 0 R" data-field-name="topmostSubform[0].Page1[0].f1_27[0]"/>
<input id="form39_1" type="text" tabindex="39" value="" data-objref="336 0 R" data-field-name="topmostSubform[0].Page1[0].f1_28[0]"/>
<input id="form40_1" type="text" tabindex="40" maxlength="2" value="" data-objref="337 0 R" data-field-name="topmostSubform[0].Page1[0].f1_29[0]"/>
<input id="form41_1" type="text" tabindex="41" value="" data-objref="338 0 R" data-field-name="topmostSubform[0].Page1[0].f1_30[0]"/>
<input id="form42_1" type="text" tabindex="42" maxlength="2" value="" data-objref="339 0 R" data-field-name="topmostSubform[0].Page1[0].f1_31[0]"/>
<input id="form43_1" type="text" tabindex="43" value="" data-objref="340 0 R" data-field-name="topmostSubform[0].Page1[0].f1_32[0]"/>
<input id="form44_1" type="text" tabindex="44" maxlength="2" value="" data-objref="341 0 R" data-field-name="topmostSubform[0].Page1[0].f1_33[0]"/>
<input id="form45_1" type="text" tabindex="45" value="" data-objref="342 0 R" data-field-name="topmostSubform[0].Page1[0].f1_34[0]"/>
<input id="form46_1" type="text" tabindex="46" maxlength="2" value="" data-objref="343 0 R" data-field-name="topmostSubform[0].Page1[0].f1_35[0]"/>
<input id="form47_1" type="text" tabindex="47" value="" data-objref="344 0 R" data-field-name="topmostSubform[0].Page1[0].f1_36[0]"/>
<input id="form48_1" type="text" tabindex="48" maxlength="2" value="" data-objref="345 0 R" data-field-name="topmostSubform[0].Page1[0].f1_37[0]"/>
<input id="form49_1" type="text" tabindex="49" value="" data-objref="346 0 R" data-field-name="topmostSubform[0].Page1[0].f1_38[0]"/>
<input id="form50_1" type="text" tabindex="50" maxlength="2" value="" data-objref="347 0 R" data-field-name="topmostSubform[0].Page1[0].f1_39[0]"/>
<input id="form51_1" type="checkbox" tabindex="52" value="2" data-objref="349 0 R" data-field-name="topmostSubform[0].Page1[0].c1_12[1]" imageName="1/form/349 0 R" images="110100"/>
<input id="form52_1" type="checkbox" tabindex="51" value="1" data-objref="348 0 R" data-field-name="topmostSubform[0].Page1[0].c1_12[0]" imageName="1/form/348 0 R" images="110100"/>

<!-- End Form Data -->

</div>

</div>
</div>
<div id="page2" style="width: 933px; height: 1209px; margin-top:20px;     margin-left: 600px;" class="page">
<div class="page-inner" style="width: 933px; height: 1209px;">

<div id="p2" class="pageArea" style="overflow: hidden; position: relative; width: 933px; height: 1209px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">



 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
fill: none;
stroke: #000;
stroke-width: 1.222;
stroke-miterlimit: 10;
}
.g4_2{
fill: none;
stroke: #000;
stroke-width: 0.762;
stroke-miterlimit: 10;
}
.g5_2{
fill: none;
stroke: #000;
stroke-width: 0.757;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.2,73.3H880.8" class="g0_2"/>
<path d="M54.6,110H605.4M605,72.9v37.5" class="g1_2"/>
<path d="M55,128.3h55V110H55v18.3Z" class="g2_2"/>
<path d="M54.6,110h55.8" class="g3_2"/>
<path d="M54.6,128.3h55.8" class="g1_2"/>
<path d="M54.6,110H880.4" class="g3_2"/>
<path d="M54.6,128.3H880.4m-352.8,55H671.4M527.6,210.8H671.4M528,182.9v28.3M670.6,183.3h44.8m-44.8,27.5h44.8M715,182.9v28.3M527.6,220H671.4M527.6,247.5H671.4M528,219.6v28.3M670.6,220h44.8m-44.8,27.5h44.8M715,219.6v28.3m-187.4,8.8H671.4M527.6,284.2H671.4M528,256.3v28.3M670.6,256.7h44.8m-44.8,27.5h44.8M715,256.3v28.3m-187.4,8.7H671.4M527.6,320.8H671.4M528,292.9v28.3M670.6,293.3h44.8m-44.8,27.5h44.8M715,292.9v28.3M527.6,330H671.4M527.6,357.5H671.4M528,329.6v28.3M670.6,330h44.8m-44.8,27.5h44.8M715,329.6v28.3" class="g1_2"/>
<path d="M55,385h55V366.7H55V385Z" class="g2_2"/>
<path d="M54.6,366.7h55.8" class="g3_2"/>
<path d="M54.6,385h55.8" class="g1_2"/>
<path d="M54.6,366.7H880.4" class="g3_2"/>
<path d="M54.6,385H880.4M88,456.8h15.3V441.5H88v15.3Zm308,1.5H627V430.8H396v27.5Zm253,0H869V430.8H649v27.5Zm22,9.2H660M671,495H660m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M649,473v22.4m-.4,-.4H671m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H660m11,0H648.6m.4,-.4v22.4" class="g4_2"/>
<path d="M715,467.5H704M715,495H704m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M693,473v22.4m-.4,-.4H715m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H704m11,0H692.6m.4,-.4v22.4" class="g4_2"/>
<path d="M759,467.5H748M759,495H748m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M737,473v22.4m-.4,-.4H759m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H748m11,0H736.6m.4,-.4v22.4" class="g4_2"/>
<path d="M803,467.5H792M803,495H792m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M781,473v22.4m-.4,-.4H803m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H792m11,0H780.6m.4,-.4v22.4" class="g4_2"/>
<path d="M847,467.5H836M847,495H836m22,-5.5V473m-33,16.5V473" class="g1_2"/>
<path d="M825,473v22.4m-.4,-.4H847m-11,0h22.4m-.4,.4V473m0,16.5V467.1m.4,.4H836m11,0H824.6m.4,-.4v22.4" class="g4_2"/>
<path d="M88,520.2h15.3V504.9H88v15.3Z" class="g1_2"/>
<path d="M55,550h55V531.7H55V550Z" class="g2_2"/>
<path d="M54.6,531.7h55.8" class="g3_2"/>
<path d="M54.6,550h55.8" class="g1_2"/>
<path d="M54.6,531.7H880.4" class="g3_2"/>
<path d="M54.6,550H880.4M198,632.5H462m-264,55H462m22,-33v11m-308,-11v11" class="g1_2"/>
<path d="M176,665.5v22.4m-.4,-.4H198m264,0h22.4m-.4,.4V665.5m0,-11V632.1m.4,.4H462m-264,0H175.6m.4,-.4v22.4" class="g5_2"/>
<path d="M176,742.5H297V715H176v27.5ZM583,660H869V632.5H583V660Zm0,36.7H869V669.2H583v27.5Zm66,36.6H869V705.8H649v27.5ZM54.6,770H880.4m-26.7,29.8H869V784.5H853.7v15.3ZM220,861.7H616V834.2H220v27.5Zm462,0H869V834.2H682v27.5ZM242,880H594M242,907.5H594M616,902V885.5M220,902V885.5" class="g1_2"/>
<path d="M220,885.5v22.4m-.4,-.4H242m352,0h22.4m-.4,.4V885.5m0,16.5V879.6m.4,.4H594m-352,0H219.6m.4,-.4V902" class="g5_2"/>
<path d="M682,907.5H803V880H682v27.5ZM220,953.3H616V925.8H220v27.5Zm462,0H869V925.8H682v27.5ZM220,990H616V962.5H220V990Zm462,0H869V962.5H682V990Zm-462,36.7H407V999.2H220v27.5Zm242,0H616V999.2H462v27.5Zm220,0H869V999.2H682v27.5Z" class="g1_2"/>
<path d="M54.6,1063.3H792.4m-.8,0h88.8" class="g0_2"/>
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

#t1_2{left:814px;bottom:1134px;letter-spacing:0.2px;}
#t2_2{left:61px;bottom:1119px;letter-spacing:-0.17px;}
#t3_2{left:94px;bottom:1119px;letter-spacing:-0.13px;}
#t4_2{left:611px;bottom:1119px;letter-spacing:-0.15px;}
#t5_2{left:661px;bottom:1096px;}
#t6_2{left:60px;bottom:1079px;letter-spacing:-0.1px;}
#t7_2{left:125px;bottom:1079px;letter-spacing:-0.11px;}
#t8_2{left:63px;bottom:1039px;letter-spacing:-0.01px;}
#t9_2{left:88px;bottom:1039px;letter-spacing:-0.01px;word-spacing:0.31px;}
#ta_2{left:88px;bottom:1024px;letter-spacing:-0.01px;}
#tb_2{left:88px;bottom:996px;letter-spacing:-0.01px;word-spacing:3.75px;}
#tc_2{left:192px;bottom:996px;letter-spacing:-0.01px;}
#td_2{left:330px;bottom:996px;}
#te_2{left:348px;bottom:996px;}
#tf_2{left:367px;bottom:996px;}
#tg_2{left:385px;bottom:996px;}
#th_2{left:403px;bottom:996px;}
#ti_2{left:422px;bottom:996px;}
#tj_2{left:440px;bottom:996px;}
#tk_2{left:458px;bottom:996px;}
#tl_2{left:477px;bottom:996px;}
#tm_2{left:495px;bottom:996px;letter-spacing:-0.01px;}
#tn_2{left:671px;bottom:992px;}
#to_2{left:88px;bottom:959px;letter-spacing:-0.01px;}
#tp_2{left:121px;bottom:959px;letter-spacing:-0.01px;}
#tq_2{left:196px;bottom:959px;letter-spacing:-0.01px;}
#tr_2{left:312px;bottom:959px;}
#ts_2{left:330px;bottom:959px;}
#tt_2{left:348px;bottom:959px;}
#tu_2{left:367px;bottom:959px;}
#tv_2{left:385px;bottom:959px;}
#tw_2{left:403px;bottom:959px;}
#tx_2{left:422px;bottom:959px;}
#ty_2{left:440px;bottom:959px;}
#tz_2{left:458px;bottom:959px;}
#t10_2{left:477px;bottom:959px;}
#t11_2{left:495px;bottom:959px;letter-spacing:-0.01px;}
#t12_2{left:671px;bottom:956px;}
#t13_2{left:88px;bottom:923px;letter-spacing:-0.01px;word-spacing:3.75px;}
#t14_2{left:194px;bottom:923px;letter-spacing:-0.01px;}
#t15_2{left:348px;bottom:923px;}
#t16_2{left:367px;bottom:923px;}
#t17_2{left:385px;bottom:923px;}
#t18_2{left:403px;bottom:923px;}
#t19_2{left:422px;bottom:923px;}
#t1a_2{left:440px;bottom:923px;}
#t1b_2{left:458px;bottom:923px;}
#t1c_2{left:477px;bottom:923px;}
#t1d_2{left:495px;bottom:923px;letter-spacing:-0.01px;}
#t1e_2{left:671px;bottom:919px;}
#t1f_2{left:88px;bottom:886px;letter-spacing:-0.01px;}
#t1g_2{left:121px;bottom:886px;letter-spacing:-0.01px;}
#t1h_2{left:193px;bottom:886px;letter-spacing:-0.01px;}
#t1i_2{left:367px;bottom:886px;}
#t1j_2{left:385px;bottom:886px;}
#t1k_2{left:403px;bottom:886px;}
#t1l_2{left:422px;bottom:886px;}
#t1m_2{left:440px;bottom:886px;}
#t1n_2{left:458px;bottom:886px;}
#t1o_2{left:477px;bottom:886px;}
#t1p_2{left:495px;bottom:886px;letter-spacing:-0.01px;}
#t1q_2{left:671px;bottom:882px;}
#t1r_2{left:59px;bottom:849px;letter-spacing:-0.01px;}
#t1s_2{left:88px;bottom:849px;letter-spacing:-0.01px;}
#t1t_2{left:267px;bottom:849px;letter-spacing:-0.01px;}
#t1u_2{left:495px;bottom:849px;letter-spacing:-0.01px;}
#t1v_2{left:671px;bottom:846px;}
#t1w_2{left:726px;bottom:849px;letter-spacing:-0.01px;}
#t1x_2{left:60px;bottom:823px;letter-spacing:-0.1px;}
#t1y_2{left:121px;bottom:823px;letter-spacing:-0.12px;}
#t1z_2{left:88px;bottom:801px;letter-spacing:-0.01px;word-spacing:0.06px;}
#t20_2{left:88px;bottom:785px;letter-spacing:-0.01px;}
#t21_2{left:110px;bottom:749px;letter-spacing:-0.01px;}
#t22_2{left:165px;bottom:749px;letter-spacing:-0.01px;}
#t23_2{left:165px;bottom:712px;letter-spacing:-0.01px;}
#t24_2{left:110px;bottom:684px;letter-spacing:-0.01px;}
#t25_2{left:60px;bottom:658px;letter-spacing:-0.1px;}
#t26_2{left:121px;bottom:658px;letter-spacing:-0.12px;}
#t27_2{left:88px;bottom:630px;letter-spacing:-0.01px;}
#t28_2{left:88px;bottom:616px;letter-spacing:-0.01px;}
#t29_2{left:88px;bottom:603px;letter-spacing:-0.01px;}
#t2a_2{left:88px;bottom:589px;letter-spacing:-0.01px;}
#t2b_2{left:88px;bottom:546px;letter-spacing:0.13px;}
#t2c_2{left:88px;bottom:530px;letter-spacing:0.14px;}
#t2d_2{left:132px;bottom:464px;letter-spacing:-0.01px;}
#t2e_2{left:207px;bottom:464px;}
#t2f_2{left:240px;bottom:464px;}
#t2g_2{left:506px;bottom:561px;letter-spacing:-0.01px;}
#t2h_2{left:506px;bottom:548px;letter-spacing:-0.01px;}
#t2i_2{left:506px;bottom:525px;letter-spacing:-0.01px;}
#t2j_2{left:506px;bottom:511px;}
#t2k_2{left:506px;bottom:474px;letter-spacing:-0.01px;}
#t2l_2{left:88px;bottom:404px;letter-spacing:0.13px;}
#t2m_2{left:664px;bottom:406px;letter-spacing:-0.01px;}
#t2n_2{left:88px;bottom:345px;letter-spacing:-0.01px;}
#t2o_2{left:627px;bottom:345px;letter-spacing:0.1px;}
#t2p_2{left:88px;bottom:314px;letter-spacing:-0.01px;}
#t2q_2{left:88px;bottom:300px;letter-spacing:-0.01px;}
#t2r_2{left:627px;bottom:299px;letter-spacing:-0.01px;}
#t2s_2{left:713px;bottom:299px;}
#t2t_2{left:746px;bottom:299px;}
#t2u_2{left:88px;bottom:268px;letter-spacing:-0.01px;}
#t2v_2{left:88px;bottom:254px;letter-spacing:-0.01px;}
#t2w_2{left:627px;bottom:254px;letter-spacing:-0.01px;}
#t2x_2{left:88px;bottom:217px;letter-spacing:-0.01px;}
#t2y_2{left:627px;bottom:217px;letter-spacing:-0.01px;}
#t2z_2{left:88px;bottom:180px;}
#t30_2{left:429px;bottom:180px;letter-spacing:-0.01px;}
#t31_2{left:627px;bottom:180px;letter-spacing:-0.01px;}
#t32_2{left:55px;bottom:127px;letter-spacing:-0.14px;}
#t33_2{left:83px;bottom:125px;}
#t34_2{left:794px;bottom:127px;letter-spacing:-0.14px;}
#t35_2{left:822px;bottom:125px;letter-spacing:0.15px;}
#t36_2{left:851px;bottom:127px;letter-spacing:-0.14px;}

.s0_2{font-size:15px;font-family:OCRAStd_wn;color:#000;}
.s1_2{font-size:11px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s2_2{font-size:11px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
.s3_2{font-size:15px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s4_2{font-size:14px;font-family:HelveticaNeueLTStd-Bd_wo;color:#FFF;}
.s5_2{font-size:14px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s6_2{font-size:13px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s7_2{font-size:13px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s8_2{font-size:26px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s9_2{font-size:15px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sa_2{font-size:12px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.sb_2{font-size:11px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.t.v0_2{transform:scaleX(0.985);}
.t.v1_2{transform:scaleX(0.9);}
#form1_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 55px;	top: 87px;	width: 384px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 627px;	top: 87px;	width: 32px;	height: 20px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 669px;	top: 87px;	width: 78px;	height: 20px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 182px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form5_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 182px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form6_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 219px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 219px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form8_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 255px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form9_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 255px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form10_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 292px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form11_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 292px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form12_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 529px;	top: 329px;	width: 138px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form13_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 329px;	width: 29px;	height: 26px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form14_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 89px;	top: 440px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form15_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 399px;	top: 429px;	width: 226px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form16_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 649px;	top: 429px;	width: 219px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form17_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 649px;	top: 466px;	width: 208px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form18_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 89px;	top: 504px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form19_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 587px;	top: 631px;	width: 281px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form20_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 587px;	top: 668px;	width: 281px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form21_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 649px;	top: 704px;	width: 219px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form22_2{	z-index: 2;	border-style: none;	padding: 0px;	position: absolute;	left: 854px;	top: 784px;	width: 15px;	height: 15px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	font: normal 12px Wingdings, 'Zapf Dingbats';}
#form23_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 223px;	top: 833px;	width: 391px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form24_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 833px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form25_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 223px;	top: 924px;	width: 391px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form26_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 924px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form27_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 223px;	top: 961px;	width: 391px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form28_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 961px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form29_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 223px;	top: 998px;	width: 182px;	height: 26px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form30_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 462px;	top: 998px;	width: 153px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form31_2{	z-index: 2;	padding: 0px;	position: absolute;	left: 682px;	top: 998px;	width: 187px;	height: 26px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form14_2 { z-index:4; }
#form18_2 { z-index:3; }
#form22_2 { z-index:2; }

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts2" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_wo;
	src: url("fonts/HelveticaNeueLTStd-Bd_wo.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_wp;
	src: url("fonts/HelveticaNeueLTStd-It_wp.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_wq;
	src: url("fonts/HelveticaNeueLTStd-Roman_wq.woff") format("woff");
}

@font-face {
	font-family: OCRAStd_wn;
	src: url("fonts/OCRAStd_wn.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg2Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg2" style="-webkit-user-select: none;"><object width="933" height="1209" data="2/2.svg" type="image/svg+xml" id="pdf2" style="width:933px; height:1209px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_2" class="t s0_2">850212 </span>
<span id="t2_2" class="t s1_2">Name </span><span id="t3_2" class="t s2_2">(not your trade name) </span><span id="t4_2" class="t s1_2">Employer identification number (EIN) </span>
<span id="t5_2" class="t s3_2">– </span>
<span id="t6_2" class="t s4_2">Part 5: </span><span id="t7_2" class="t s5_2">Report your FUTA tax liability by quarter only if line 12 is more than $500. If not, go to Part 6. </span>
<span id="t8_2" class="t s6_2">16 </span><span id="t9_2" class="t s6_2">Report the amount of your FUTA tax liability for each quarter; do NOT enter the amount you deposited. If you had no liability for </span>
<span id="ta_2" class="t s6_2">a quarter, leave the line blank. </span>
<span id="tb_2" class="t s6_2">16a 1st quarter </span><span id="tc_2" class="t s7_2">(January 1 – March 31) </span><span id="td_2" class="t s7_2">. </span><span id="te_2" class="t s7_2">. </span><span id="tf_2" class="t s7_2">. </span><span id="tg_2" class="t s7_2">. </span><span id="th_2" class="t s7_2">. </span><span id="ti_2" class="t s7_2">. </span><span id="tj_2" class="t s7_2">. </span><span id="tk_2" class="t s7_2">. </span><span id="tl_2" class="t s7_2">. </span><span id="tm_2" class="t s6_2">16a </span>
<span id="tn_2" class="t s8_2">. </span>
<span id="to_2" class="t s6_2">16b </span><span id="tp_2" class="t s6_2">2nd quarter </span><span id="tq_2" class="t s7_2">(April 1 – June 30) </span><span id="tr_2" class="t s7_2">. </span><span id="ts_2" class="t s7_2">. </span><span id="tt_2" class="t s7_2">. </span><span id="tu_2" class="t s7_2">. </span><span id="tv_2" class="t s7_2">. </span><span id="tw_2" class="t s7_2">. </span><span id="tx_2" class="t s7_2">. </span><span id="ty_2" class="t s7_2">. </span><span id="tz_2" class="t s7_2">. </span><span id="t10_2" class="t s7_2">. </span><span id="t11_2" class="t s6_2">16b </span>
<span id="t12_2" class="t s8_2">. </span>
<span id="t13_2" class="t s6_2">16c 3rd quarter </span><span id="t14_2" class="t s7_2">(July 1 – September 30) </span><span id="t15_2" class="t s7_2">. </span><span id="t16_2" class="t s7_2">. </span><span id="t17_2" class="t s7_2">. </span><span id="t18_2" class="t s7_2">. </span><span id="t19_2" class="t s7_2">. </span><span id="t1a_2" class="t s7_2">. </span><span id="t1b_2" class="t s7_2">. </span><span id="t1c_2" class="t s7_2">. </span><span id="t1d_2" class="t s6_2">16c </span>
<span id="t1e_2" class="t s8_2">. </span>
<span id="t1f_2" class="t s6_2">16d </span><span id="t1g_2" class="t s6_2">4th quarter </span><span id="t1h_2" class="t s7_2">(October 1 – December 31) </span><span id="t1i_2" class="t s7_2">. </span><span id="t1j_2" class="t s7_2">. </span><span id="t1k_2" class="t s7_2">. </span><span id="t1l_2" class="t s7_2">. </span><span id="t1m_2" class="t s7_2">. </span><span id="t1n_2" class="t s7_2">. </span><span id="t1o_2" class="t s7_2">. </span><span id="t1p_2" class="t s6_2">16d </span>
<span id="t1q_2" class="t s8_2">. </span>
<span id="t1r_2" class="t s6_2">17 </span><span id="t1s_2" class="t s6_2">Total tax liability for the year </span><span id="t1t_2" class="t s7_2">(lines 16a + 16b + 16c + 16d = line 17) </span><span id="t1u_2" class="t s6_2">17 </span>
<span id="t1v_2" class="t s8_2">. </span>
<span id="t1w_2" class="t s6_2">Total must equal line 12. </span>
<span id="t1x_2" class="t s4_2">Part 6: </span><span id="t1y_2" class="t s5_2">May we speak with your third-party designee? </span>
<span id="t1z_2" class="t v0_2 s6_2">Do you want to allow an employee, a paid tax preparer, or another person to discuss this return with the IRS? See the instructions </span>
<span id="t20_2" class="t v0_2 s6_2">for details. </span>
<span id="t21_2" class="t s6_2">Yes. </span><span id="t22_2" class="t s7_2">Designee’s name and phone number </span>
<span id="t23_2" class="t s7_2">Select a 5-digit personal identification number (PIN) to use when talking to the IRS. </span>
<span id="t24_2" class="t s6_2">No. </span>
<span id="t25_2" class="t s4_2">Part 7: </span><span id="t26_2" class="t s5_2">Sign here. You MUST complete both pages of this form and SIGN it. </span>
<span id="t27_2" class="t s7_2">Under penalties of perjury, I declare that I have examined this return, including accompanying schedules and statements, and to the </span>
<span id="t28_2" class="t s7_2">best of my knowledge and belief, it is true, correct, and complete, and that no part of any payment made to a state unemployment </span>
<span id="t29_2" class="t s7_2">fund claimed as a credit was, or is to be, deducted from the payments made to employees. Declaration of preparer (other than </span>
<span id="t2a_2" class="t s7_2">taxpayer) is based on all information of which preparer has any knowledge. </span>
<span id="t2b_2" class="t s9_2">Sign your </span>
<span id="t2c_2" class="t s9_2">name here </span>
<span id="t2d_2" class="t s7_2">Date </span><span id="t2e_2" class="t s7_2">/ </span><span id="t2f_2" class="t s7_2">/ </span>


<span id="t2g_2" class="t s7_2">Print your </span>
<span id="t2h_2" class="t s7_2">name here </span>
<span id="t2i_2" class="t s7_2">Print your </span>
<span id="t2j_2" class="t s7_2">title here </span>
<span id="t2k_2" class="t s7_2">Best daytime phone </span>
<span id="t2l_2" class="t s9_2">Paid Preparer Use Only </span><span id="t2m_2" class="t s7_2">Check if you are self-employed </span>
<span id="t2n_2" class="t s7_2">Preparer’s name </span><span id="t2o_2" class="t v1_2 sa_2">PTIN </span>
<span id="t2p_2" class="t s7_2">Preparer’s </span>
<span id="t2q_2" class="t s7_2">signature </span><span id="t2r_2" class="t s7_2">Date </span><span id="t2s_2" class="t s7_2">/ </span><span id="t2t_2" class="t s7_2">/ </span>
<span id="t2u_2" class="t s7_2">Firm’s name (or yours </span>
<span id="t2v_2" class="t s7_2">if self-employed) </span><span id="t2w_2" class="t s7_2">EIN </span>
<span id="t2x_2" class="t s7_2">Address </span><span id="t2y_2" class="t s7_2">Phone </span>
<span id="t2z_2" class="t s7_2">City </span><span id="t30_2" class="t s7_2">State </span><span id="t31_2" class="t s7_2">ZIP code </span>
<span id="t32_2" class="t sb_2">Page </span><span id="t33_2" class="t s9_2">2 </span><span id="t34_2" class="t sb_2">Form </span><span id="t35_2" class="t s9_2">940 </span><span id="t36_2" class="t sb_2">(2023) </span></div>
<!-- End text definitions -->


<!-- Begin Form Data -->
<input id="form1_2" type="text" tabindex="53" value="" data-objref="282 0 R" data-field-name="topmostSubform[0].Page2[0].f1_3[0]"/>
<input id="form2_2" type="text" tabindex="54" maxlength="2" value="" data-objref="283 0 R" data-field-name="topmostSubform[0].Page2[0].f1_1[0]"/>
<input id="form3_2" type="text" tabindex="55" maxlength="7" value="" data-objref="284 0 R" data-field-name="topmostSubform[0].Page2[0].f1_2[0]"/>
<input id="form4_2" type="text" tabindex="56" value="" data-objref="285 0 R" data-field-name="topmostSubform[0].Page2[0].f2_1[0]"/>
<input id="form5_2" type="text" tabindex="57" maxlength="2" value="" data-objref="286 0 R" data-field-name="topmostSubform[0].Page2[0].f2_2[0]"/>
<input id="form6_2" type="text" tabindex="58" value="" data-objref="287 0 R" data-field-name="topmostSubform[0].Page2[0].f2_3[0]"/>
<input id="form7_2" type="text" tabindex="59" maxlength="2" value="" data-objref="288 0 R" data-field-name="topmostSubform[0].Page2[0].f2_4[0]"/>
<input id="form8_2" type="text" tabindex="60" value="" data-objref="289 0 R" data-field-name="topmostSubform[0].Page2[0].f2_5[0]"/>
<input id="form9_2" type="text" tabindex="61" maxlength="2" value="" data-objref="290 0 R" data-field-name="topmostSubform[0].Page2[0].f2_6[0]"/>
<input id="form10_2" type="text" tabindex="62" value="" data-objref="291 0 R" data-field-name="topmostSubform[0].Page2[0].f2_7[0]"/>
<input id="form11_2" type="text" tabindex="63" maxlength="2" value="" data-objref="292 0 R" data-field-name="topmostSubform[0].Page2[0].f2_8[0]"/>
<input id="form12_2" type="text" tabindex="64" value="" data-objref="293 0 R" data-field-name="topmostSubform[0].Page2[0].f2_9[0]"/>
<input id="form13_2" type="text" tabindex="65" maxlength="2" value="" data-objref="294 0 R" data-field-name="topmostSubform[0].Page2[0].f2_10[0]"/>
<input id="form14_2" type="checkbox" tabindex="66" value="1" data-objref="295 0 R" data-field-name="topmostSubform[0].Page2[0].c2_1[0]" imageName="2/form/295 0 R" images="110100"/>
<input id="form15_2" type="text" tabindex="67" value="" data-objref="296 0 R" data-field-name="topmostSubform[0].Page2[0].f2_11[0]"/>
<input id="form16_2" type="text" tabindex="68" value="" data-objref="297 0 R" data-field-name="topmostSubform[0].Page2[0].f2_12[0]"/>
<input id="form17_2" type="text" tabindex="69" maxlength="5" value="" data-objref="298 0 R" data-field-name="topmostSubform[0].Page2[0].f2_13[0]"/>
<input id="form18_2" type="checkbox" tabindex="70" value="2" data-objref="299 0 R" data-field-name="topmostSubform[0].Page2[0].c2_1[1]" imageName="2/form/299 0 R" images="110100"/>
<input id="form19_2" type="text" tabindex="71" value="<?php echo htmlspecialchars($get_userlist[0]['first_name']."". $get_userlist[0]['last_name'], ENT_QUOTES, 'UTF-8'); ?>" data-objref="300 0 R" data-field-name="topmostSubform[0].Page2[0].f2_14[0]"/>
<input id="form20_2" type="text" tabindex="72" value="Admin" data-objref="301 0 R" data-field-name="topmostSubform[0].Page2[0].f2_15[0]"/>
<input id="form21_2" type="text" tabindex="73" value="<?php echo htmlspecialchars($get_userlist[0]['phone'], ENT_QUOTES, 'UTF-8'); ?>" data-objref="302 0 R" data-field-name="topmostSubform[0].Page2[0].f2_16[0]"/>
<input id="form22_2" type="checkbox" tabindex="74" value="1" data-objref="303 0 R" data-field-name="topmostSubform[0].Page2[0].c2_2[0]" imageName="2/form/303 0 R" images="110100"/>
<input id="form23_2" type="text" tabindex="75" value="" data-objref="304 0 R" data-field-name="topmostSubform[0].Page2[0].f2_17[0]"/>
<input id="form24_2" type="text" tabindex="76" maxlength="11" value="" data-objref="305 0 R" data-field-name="topmostSubform[0].Page2[0].f2_18[0]"/>
<input id="form25_2" type="text" tabindex="77" value="" data-objref="306 0 R" data-field-name="topmostSubform[0].Page2[0].f2_19[0]"/>
<input id="form26_2" type="text" tabindex="78" maxlength="10" value="" data-objref="307 0 R" data-field-name="topmostSubform[0].Page2[0].f2_20[0]"/>
<input id="form27_2" type="text" tabindex="79" value="" data-objref="308 0 R" data-field-name="topmostSubform[0].Page2[0].f2_21[0]"/>
<input id="form28_2" type="text" tabindex="80" value="" data-objref="309 0 R" data-field-name="topmostSubform[0].Page2[0].f2_22[0]"/>
<input id="form29_2" type="text" tabindex="81" value="" data-objref="310 0 R" data-field-name="topmostSubform[0].Page2[0].f2_23[0]"/>
<input id="form30_2" type="text" tabindex="82" maxlength="2" value="" data-objref="311 0 R" data-field-name="topmostSubform[0].Page2[0].f2_24[0]"/>
<input id="form31_2" type="text" tabindex="83" maxlength="10" value="" data-objref="312 0 R" data-field-name="topmostSubform[0].Page2[0].f2_25[0]"/>

<!-- End Form Data -->

</div>

</div>
</div>
<div id="page3" style="width: 933px; height: 1209px; margin-top:20px;     margin-left: 600px;     " class="page">
<div class="page-inner" style="width: 933px; height: 1209px;">

<div id="p3" class="pageArea" style="overflow: hidden; position: relative; width: 933px; height: 1209px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">

 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_3{
fill: none;
stroke: #000;
stroke-width: 3.055;
stroke-miterlimit: 10;
}
.g1_3{
fill: #000;
}
.g2_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
stroke-dasharray: 7,4;
}
.g3_3{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
.g4_3{
fill: none;
stroke: #000;
stroke-width: 0.763;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,55H880.4M54.6,128.3H880.4" class="g0_3"/>
<path d="M55,481.3h55v-55H55v55Z" class="g1_3"/>
<path d="M54.6,846.4H880.4" class="g2_3"/>
<path d="M187,870.4v28.3M54.6,925.8H187.8M187,897.9v28.7m-.4,-.8H759.4" class="g3_3"/>
<path d="M758.2,889.2H880.4" class="g4_3"/>
<path d="M759,870.4v19.1m-.5,36.3H880.7m-121.4,-37v37.8" class="g3_3"/>
<path d="M54.6,980.8H77.4m-.8,0H330.4" class="g4_3"/>
<path d="M328.5,925.8H660.4m-331.9,55H660.4M330,924.3v58.1M658.5,925.8H825.4m-166.9,55H825.4M660,924.3v58.1M824.6,925.8h56.9m-56.9,55h56.9M880,924.3v58.1" class="g0_3"/>
<path d="M825,924.3v58.1m-495,-2v110.8m21.6,-73.7H880.4m-528.8,36.7H880.4M55,1090.8H880" class="g4_3"/>
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

#t1_3{left:55px;bottom:1114px;letter-spacing:0.18px;}
#t2_3{left:55px;bottom:1092px;letter-spacing:0.19px;}
#t3_3{left:55px;bottom:1044px;letter-spacing:0.17px;}
#t4_3{left:55px;bottom:1022px;letter-spacing:0.13px;}
#t5_3{left:55px;bottom:1005px;letter-spacing:0.13px;}
#t6_3{left:55px;bottom:989px;letter-spacing:0.13px;}
#t7_3{left:55px;bottom:972px;letter-spacing:0.13px;}
#t8_3{left:55px;bottom:943px;letter-spacing:0.17px;}
#t9_3{left:55px;bottom:921px;letter-spacing:0.13px;}
#ta_3{left:55px;bottom:904px;letter-spacing:0.13px;}
#tb_3{left:125px;bottom:904px;letter-spacing:0.1px;}
#tc_3{left:172px;bottom:904px;letter-spacing:0.12px;}
#td_3{left:55px;bottom:888px;letter-spacing:0.12px;}
#te_3{left:55px;bottom:872px;letter-spacing:0.12px;}
#tf_3{left:55px;bottom:855px;letter-spacing:0.13px;}
#tg_3{left:55px;bottom:839px;letter-spacing:0.12px;}
#th_3{left:343px;bottom:839px;letter-spacing:0.14px;}
#ti_3{left:55px;bottom:822px;letter-spacing:0.13px;}
#tj_3{left:258px;bottom:822px;letter-spacing:0.12px;}
#tk_3{left:55px;bottom:806px;letter-spacing:0.12px;}
#tl_3{left:55px;bottom:789px;letter-spacing:0.13px;}
#tm_3{left:58px;bottom:722px;}
#tn_3{left:77px;bottom:731px;}
#to_3{left:59px;bottom:728px;letter-spacing:-0.05px;}
#tp_3{left:119px;bottom:763px;letter-spacing:0.14px;}
#tq_3{left:119px;bottom:747px;letter-spacing:0.13px;}
#tr_3{left:119px;bottom:731px;letter-spacing:0.13px;}
#ts_3{left:119px;bottom:714px;letter-spacing:0.12px;}
#tt_3{left:345px;bottom:714px;letter-spacing:0.12px;}
#tu_3{left:55px;bottom:698px;letter-spacing:0.11px;}
#tv_3{left:121px;bottom:698px;letter-spacing:0.12px;}
#tw_3{left:484px;bottom:1044px;letter-spacing:0.16px;}
#tx_3{left:484px;bottom:1022px;letter-spacing:0.14px;}
#ty_3{left:816px;bottom:1022px;letter-spacing:0.1px;}
#tz_3{left:484px;bottom:1005px;letter-spacing:0.12px;}
#t10_3{left:484px;bottom:989px;letter-spacing:0.11px;}
#t11_3{left:665px;bottom:989px;letter-spacing:0.14px;}
#t12_3{left:778px;bottom:989px;letter-spacing:0.12px;}
#t13_3{left:484px;bottom:972px;letter-spacing:0.12px;}
#t14_3{left:484px;bottom:956px;letter-spacing:0.12px;}
#t15_3{left:484px;bottom:940px;letter-spacing:0.12px;}
#t16_3{left:484px;bottom:923px;letter-spacing:0.12px;}
#t17_3{left:484px;bottom:901px;letter-spacing:0.15px;}
#t18_3{left:642px;bottom:901px;letter-spacing:0.12px;}
#t19_3{left:484px;bottom:884px;letter-spacing:0.13px;}
#t1a_3{left:484px;bottom:862px;letter-spacing:0.15px;}
#t1b_3{left:686px;bottom:862px;letter-spacing:0.13px;}
#t1c_3{left:484px;bottom:845px;letter-spacing:0.14px;}
#t1d_3{left:484px;bottom:823px;}
#t1e_3{left:500px;bottom:823px;letter-spacing:0.13px;}
#t1f_3{left:484px;bottom:806px;letter-spacing:0.12px;}
#t1g_3{left:484px;bottom:790px;letter-spacing:0.13px;}
#t1h_3{left:484px;bottom:773px;letter-spacing:0.13px;}
#t1i_3{left:484px;bottom:757px;letter-spacing:0.13px;}
#t1j_3{left:484px;bottom:734px;}
#t1k_3{left:500px;bottom:734px;letter-spacing:0.13px;}
#t1l_3{left:484px;bottom:718px;letter-spacing:0.12px;}
#t1m_3{left:484px;bottom:702px;letter-spacing:0.14px;}
#t1n_3{left:484px;bottom:679px;letter-spacing:0.12px;}
#t1o_3{left:527px;bottom:679px;letter-spacing:0.12px;}
#t1p_3{left:484px;bottom:663px;letter-spacing:0.13px;}
#t1q_3{left:222px;bottom:364px;letter-spacing:0.17px;}
#t1r_3{left:69px;bottom:315.7px;letter-spacing:-0.18px;}
#t1s_3{left:73px;bottom:303px;letter-spacing:-0.22px;}
#t1t_3{left:55px;bottom:295px;letter-spacing:-0.03px;}
#t1u_3{left:55px;bottom:284px;letter-spacing:-0.03px;}
#t1v_3{left:389px;bottom:311px;letter-spacing:0.2px;}
#t1w_3{left:321px;bottom:289px;letter-spacing:0.11px;}
#t1x_3{left:770px;bottom:322px;letter-spacing:-0.17px;}
#t1y_3{left:780px;bottom:278px;letter-spacing:-0.28px;}
#t1z_3{left:819px;bottom:278px;letter-spacing:-0.3px;}
#t20_3{left:63px;bottom:266px;}
#t21_3{left:77px;bottom:266px;letter-spacing:-0.14px;}
#t22_3{left:123px;bottom:226px;}
#t23_3{left:335px;bottom:266px;}
#t24_3{left:352px;bottom:252px;letter-spacing:0.14px;}
#t25_3{left:352px;bottom:240px;letter-spacing:-0.18px;}
#t26_3{left:541px;bottom:240px;}
#t27_3{left:545px;bottom:240px;letter-spacing:-0.19px;}
#t28_3{left:648px;bottom:240px;letter-spacing:-0.13px;}
#t29_3{left:725px;bottom:266px;letter-spacing:-0.13px;}
#t2a_3{left:838px;bottom:266px;letter-spacing:-0.16px;}
#t2b_3{left:335px;bottom:211px;}
#t2c_3{left:352px;bottom:211px;letter-spacing:-0.13px;}
#t2d_3{left:352px;bottom:176px;letter-spacing:-0.14px;}
#t2e_3{left:352px;bottom:139px;letter-spacing:-0.13px;}

.s0_3{font-size:21px;font-family:ITCFranklinGothicStd-Demi_wr;color:#000;}
.s1_3{font-size:18px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s2_3{font-size:15px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s3_3{font-size:15px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s4_3{font-size:15px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
.s5_3{font-size:48px;font-family:AdobePiStd_7;color:#FFF;}
.s6_3{font-size:34px;font-family:ITCFranklinGothicStd-Demi_wr;color:#000;}
.s7_3{font-size:10px;font-family:HelveticaNeueLTStd-Blk_9;color:#FFF;}
.s8_3{font-size:11px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s9_3{font-size:31px;font-family:HelveticaNeueLTStd-BlkCn_ws;color:#000;}
.sa_3{font-size:10px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.sb_3{font-size:12px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sc_3{font-size:31px;font-family:HelveticaNeueLTStd-BdOu_a;color:#000;}
.sd_3{font-size:31px;font-family:HelveticaNeueLTStd-Blk_9;color:#000;}
.se_3{font-size:11px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.sf_3{font-size:10px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.t.v0_3{transform:scaleX(1.166);}
.t.v1_3{transform:scaleX(0.979);}
.t.v2_3{transform:scaleX(0.915);}
.t.m0_3{transform:matrix(0,-0.9,1,0,0,0);}
#form1_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 663px;	top: 940px;	width: 159px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form2_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 825px;	top: 940px;	width: 51px;	height: 37px;	color: rgb(0,0,0);	text-align: right;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form3_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 89px;	top: 955px;	width: 31px;	height: 23px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form4_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 132px;	top: 955px;	width: 74px;	height: 23px;	color: rgb(0,0,0);	text-align: center;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form5_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 352px;	top: 995px;	width: 384px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form6_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 352px;	top: 1031px;	width: 527px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}
#form7_3{	z-index: 2;	padding: 0px;	position: absolute;	left: 352px;	top: 1068px;	width: 527px;	height: 20px;	color: rgb(0,0,0);	text-align: left;	background: transparent;	border: none;	font: normal 15px 'Times New Roman', Times, serif;}

</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts3" type="text/css" >

@font-face {
	font-family: AdobePiStd_7;
	src: url("fonts/AdobePiStd_7.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-BdOu_a;
	src: url("fonts/HelveticaNeueLTStd-BdOu_a.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Bd_wo;
	src: url("fonts/HelveticaNeueLTStd-Bd_wo.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-BlkCn_ws;
	src: url("fonts/HelveticaNeueLTStd-BlkCn_ws.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Blk_9;
	src: url("fonts/HelveticaNeueLTStd-Blk_9.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_wp;
	src: url("fonts/HelveticaNeueLTStd-It_wp.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_wq;
	src: url("fonts/HelveticaNeueLTStd-Roman_wq.woff") format("woff");
}

@font-face {
	font-family: ITCFranklinGothicStd-Demi_wr;
	src: url("fonts/ITCFranklinGothicStd-Demi_wr.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg3Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg3" style="-webkit-user-select: none;"><object width="933" height="1209" data="3/3.svg" type="image/svg+xml" id="pdf3" style="width:933px; height:1209px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_3" class="t s0_3">Form 940-V, </span>
<span id="t2_3" class="t s0_3">Payment Voucher </span>
<span id="t3_3" class="t s1_3">Purpose of Form </span>
<span id="t4_3" class="t s2_3">Complete Form 940-V if you’re making a payment with </span>
<span id="t5_3" class="t s2_3">Form 940. We will use the completed voucher to credit </span>
<span id="t6_3" class="t s2_3">your payment more promptly and accurately, and to </span>
<span id="t7_3" class="t s2_3">improve our service to you. </span>
<span id="t8_3" class="t s1_3">Making Payments With Form 940 </span>
<span id="t9_3" class="t s2_3">To avoid a penalty, make your payment with your 2023 </span>
<span id="ta_3" class="t s2_3">Form 940 </span><span id="tb_3" class="t s3_3">only if </span><span id="tc_3" class="t s2_3">your FUTA tax for the fourth quarter </span>
<span id="td_3" class="t s2_3">(plus any undeposited amounts from earlier quarters) is </span>
<span id="te_3" class="t s2_3">$500 or less. If your total FUTA tax after adjustments </span>
<span id="tf_3" class="t s2_3">(Form 940, line 12) is more than $500, you must make </span>
<span id="tg_3" class="t s2_3">deposits by electronic funds transfer. See </span><span id="th_3" class="t s4_3">When Must </span>
<span id="ti_3" class="t s4_3">You Deposit Your FUTA Tax? </span><span id="tj_3" class="t s2_3">in the Instructions for Form </span>
<span id="tk_3" class="t s2_3">940. Also see sections 11 and 14 of Pub. 15 for more </span>
<span id="tl_3" class="t s2_3">information about deposits. </span>
<span id="tm_3" class="t v0_3 s5_3">▲ </span>
<span id="tn_3" class="t s6_3">! </span>
<span id="to_3" class="t s7_3">CAUTION </span>
<span id="tp_3" class="t s4_3">Use Form 940-V when making any payment with </span>
<span id="tq_3" class="t s4_3">Form 940. However, if you pay an amount with </span>
<span id="tr_3" class="t s4_3">Form 940 that should’ve been deposited, you </span>
<span id="ts_3" class="t s4_3">may be subject to a penalty. See </span><span id="tt_3" class="t s2_3">Deposit </span>
<span id="tu_3" class="t s2_3">Penalties </span><span id="tv_3" class="t s4_3">in section 11 of Pub. 15. </span>
<span id="tw_3" class="t s1_3">Specific Instructions </span>
<span id="tx_3" class="t s3_3">Box 1—Employer identification number (EIN). </span><span id="ty_3" class="t s2_3">If you </span>
<span id="tz_3" class="t s2_3">don’t have an EIN, you may apply for one online by </span>
<span id="t10_3" class="t s2_3">visiting the IRS website at </span><span id="t11_3" class="t s4_3">www.irs.gov/EIN</span><span id="t12_3" class="t s2_3">. You may also </span>
<span id="t13_3" class="t s2_3">apply for an EIN by faxing or mailing Form SS-4 to the </span>
<span id="t14_3" class="t s2_3">IRS. If you haven’t received your EIN by the due date of </span>
<span id="t15_3" class="t s2_3">Form 940, write “Applied For” and the date you applied in </span>
<span id="t16_3" class="t s2_3">this entry space. </span>
<span id="t17_3" class="t s3_3">Box 2—Amount paid. </span><span id="t18_3" class="t s2_3">Enter the amount paid with </span>
<span id="t19_3" class="t s2_3">Form 940. </span>
<span id="t1a_3" class="t s3_3">Box 3—Name and address. </span><span id="t1b_3" class="t s2_3">Enter your name and </span>
<span id="t1c_3" class="t s2_3">address as shown on Form 940. </span>
<span id="t1d_3" class="t s2_3">• </span><span id="t1e_3" class="t s2_3">Enclose your check or money order made payable to </span>
<span id="t1f_3" class="t s2_3">“United States Treasury.” Be sure to enter your EIN, </span>
<span id="t1g_3" class="t s2_3">“Form 940,” and “2023” on your check or money order. </span>
<span id="t1h_3" class="t s2_3">Don’t send cash. Don’t staple Form 940-V or your </span>
<span id="t1i_3" class="t s2_3">payment to Form 940 (or to each other). </span>
<span id="t1j_3" class="t s2_3">• </span><span id="t1k_3" class="t s2_3">Detach Form 940-V and send it with your payment and </span>
<span id="t1l_3" class="t s2_3">Form 940 to the address provided in the Instructions for </span>
<span id="t1m_3" class="t s2_3">Form 940. </span>
<span id="t1n_3" class="t s3_3">Note: </span><span id="t1o_3" class="t s2_3">You must also complete the entity information </span>
<span id="t1p_3" class="t s2_3">above Part 1 on Form 940. </span>
<span id="t1q_3" class="t s1_3">Detach Here and Mail With Your Payment and Form 940. </span>
<span id="t1r_3" class="t m0_3 s8_3">Form </span>
<span id="t1s_3" class="t s9_3">940-V </span>
<span id="t1t_3" class="t sa_3">Department of the Treasury </span>
<span id="t1u_3" class="t sa_3">Internal Revenue Service </span>
<span id="t1v_3" class="t s0_3">Payment Voucher </span>
<span id="t1w_3" class="t sb_3">Don’t staple or attach this voucher to your payment. </span>
<span id="t1x_3" class="t s8_3">OMB No. 1545-0028 </span>
<span id="t1y_3" class="t sc_3">20</span><span id="t1z_3" class="t sd_3">23 </span>
<span id="t20_3" class="t se_3">1 </span><span id="t21_3" class="t s8_3">Enter your employer identification number (EIN). </span>
<span id="t22_3" class="t s2_3">– </span>
<span id="t23_3" class="t se_3">2 </span>
<span id="t24_3" class="t s3_3">Enter the amount of your payment. </span>
<span id="t25_3" class="t v1_3 sa_3">Make your check or money order payable to </span><span id="t26_3" class="t v1_3 sa_3">“</span><span id="t27_3" class="t v1_3 sf_3">United States Treasury</span><span id="t28_3" class="t v1_3 sa_3">.” </span>
<span id="t29_3" class="t s8_3">Dollars </span><span id="t2a_3" class="t s8_3">Cents </span>
<span id="t2b_3" class="t se_3">3 </span><span id="t2c_3" class="t s8_3">Enter your business name (individual name if sole proprietor). </span>
<span id="t2d_3" class="t s8_3">Enter your address. </span>
<span id="t2e_3" class="t v2_3 s8_3">Enter your city, state, and ZIP code; or your city, foreign country name, foreign province/county, and foreign postal code. </span></div>
<!-- End text definitions -->


<!-- Begin Form Data -->
<input id="form1_3" type="text" tabindex="86" value="" data-objref="370 0 R" data-field-name="topmostSubform[0].Page3[0].f3_1[0]"/>
<input id="form2_3" type="text" tabindex="87" maxlength="3" value="" data-objref="371 0 R" data-field-name="topmostSubform[0].Page3[0].f3_2[0]"/>
<input id="form3_3" type="text" tabindex="84" maxlength="2" value="" data-objref="374 0 R" data-field-name="topmostSubform[0].Page3[0].EIN_ReadOrder[0].f1_1[0]"/>
<input id="form4_3" type="text" tabindex="85" maxlength="7" value="" data-objref="375 0 R" data-field-name="topmostSubform[0].Page3[0].EIN_ReadOrder[0].f1_2[0]"/>
<input id="form5_3" type="text" tabindex="88" value="" data-objref="372 0 R" data-field-name="topmostSubform[0].Page3[0].f1_3[0]"/>
<input id="form6_3" type="text" tabindex="89" value="" data-objref="373 0 R" data-field-name="topmostSubform[0].Page3[0].f3_4[0]"/>
<input id="form7_3" type="text" tabindex="90" value="" data-objref="277 0 R" data-field-name="topmostSubform[0].Page3[0].f3_5[0]"/>

<!-- End Form Data -->

</div>

</div>
</div>
<div id="page4" style="width: 933px; height: 1209px; margin-top:20px;     margin-left:600px;      " class="page">
<div class="page-inner" style="width: 933px; height: 1209px;">

<div id="p4" class="pageArea" style="overflow: hidden; position: relative; width: 933px; height: 1209px; margin-top:auto; margin-left:auto; margin-right:auto; background-color: white;">


 <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg viewBox="0 0 933 1209" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<style type="text/css"><![CDATA[
.g0_4{
fill: none;
stroke: #000;
stroke-width: 1.527;
stroke-miterlimit: 10;
}
]]></style>
</defs>
<path d="M54.6,73.3H880.4" class="g0_4"/>
</svg>




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







(function () {
    "use strict";

    var FormVuAPI = {};

    FormVuAPI.extractFormValues = function () {
        const inputs = document.getElementsByTagName("input");
        const textareas = document.getElementsByTagName("textarea");
        const selects = document.getElementsByTagName("select");

        const texts = [];
        const checks = [];
        const checkGroups = [];
        const radios = [];
        const choices = [];

        for (const inp of inputs) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                const type = inp.type.toUpperCase();
                if (type === "TEXT" || type === "PASSWORD") {
                    texts.push(inp);
                } else if (type === "CHECKBOX") {
                    // Handle checkbox groups
                    if (Object.keys(idrform.getCheckboxGroup(inp.dataset.fieldName)).length > 1)
                        checkGroups.push(inp);
                    else checks.push(inp);
                } else if (type === "RADIO") {
                    // Filter out unisons
                    if (inp.name === inp.dataset.fieldName) radios.push(inp);
                }
            }
        }
        for (const inp of textareas) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                texts.push(inp);
            }
        }
        for (const inp of selects) {
            const ref = inp.getAttribute("data-objref");
            if (ref && ref.length > 0) {
                choices.push(inp);
            }
        }

        const output = {};

        for (const item of texts) {
            const fieldText = item.value;
            const fieldName = item.getAttribute("data-field-name");
            output[fieldName] = fieldText;
        }

        for (const item of checkGroups) {
            const fieldName = item.getAttribute("data-field-name");
            const isChecked = item.checked;
            const value = item.value

            if (isChecked) {
                output[fieldName] = value;
            }
        }

        for (const item of checks) {
            const isChecked = item.checked;
            const fieldName = item.getAttribute("data-field-name");
            output[fieldName] = isChecked;
        }

        for (const item of choices) {
            const selected = item.value;
            const fieldName = item.getAttribute("data-field-name");
            const multiple =  item.getAttribute("multiple");
            if (multiple) {
                const options = item.children;
                const selectedItems = [];
                for (const option of options) {
                    if (option.selected) {
                        selectedItems.push(option.value);
                    }
                }
                output[fieldName] = selectedItems;
            } else {
                output[fieldName] = selected;
            }
        }

        for (const radio of radios) {
            const fieldName = radio.getAttribute("data-field-name");
            const isChecked = radio.checked;
            const value = radio.value;

            if (isChecked) {
                output[fieldName] = value;
            }
        }
        return output;
    };

    /**
     * Takes a JSON input in the format of formdata.json and updates the relevant
     * HTML fields values to match the provided values.
     *
     * @param {String|Object} formValues The values to be inserted into the HTML
     * @param {boolean} resetForm Whether a form reset should be called before inserting the values
     * @returns {boolean} true on method completion, false on invalid input
     */
    FormVuAPI.insertFormValues = function (formValues, resetForm) {
        if (typeof formValues === "string") {
            formValues = JSON.parse(formValues);
        } else if (!(formValues instanceof Object)) {
            console.error('Form values provided to insertFormValues is not an Object or JSON String');
            return false;
        }

        if (resetForm) {
            idrform.doc.resetForm();
        }

        for (let key of Object.keys(formValues)) {
            let val = formValues[key];
            if (val.inputType) {
                switch (val.inputType) {
                    case "radio button":
                        _handleRadioButtonInsert(val);
                        break;
                    case "checkbox":
                    case "checkbox group":
                        _handleCheckboxInsert(val);
                        break;
                    case "combobox":
                        _handleComboboxInsert(val);
                        break;
                    case "listbox":
                    case "listbox multi":
                        _handleListboxInsert(val);
                        break;
                    case "multiline text":
                        _handleMultilineTextInsert(val);
                        break;
                    default:
                        _handleGenericInputInsert(val);
                        break;
                }
            }
        }

        return true;
    };

    /**
     * Escapes the provided string for use as a CSS selector
     * Backslashes need to be escaped in order to be used in CSS selectors
     * (otherwise they will fail)
     *
     * @param {String} string the string to be escaped
     * @returns {String} an escaped string ready for use as a CSS selector
     * @private
     */
    let escapeForCssSelector = function(string) {
        return string.replaceAll('\\','\\\\');
    }

    /**
     * Selects the relevant radio button of the provided Form Field JSON object
     * Refreshes the AP images so the change is displayed
     * If the radio button is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleRadioButtonInsert = function(jsonObj) {
        let domRadioButtons = document.querySelectorAll('input[type=radio][data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref]');
        if (!domRadioButtons) {
            console.warn("Failed to find <input type=\"radio\"> " + jsonObj.fieldName);
            return;
        }
        domRadioButtons.forEach(element => {
            if (element.dataset.objref == jsonObj.objref) {
                element.checked = jsonObj.value;
                element.value = jsonObj.value;
            } else {
                element.checked = false;
            }
            if ("refreshApImage" in window && element.dataset.imageIndex) refreshApImage(parseInt(element.dataset.imageIndex));
        });
    }

    /**
     * Ticks the relevant checkbox of the provided Form Field JSON object
     * Refreshes the AP images so the change is displayed
     * If the checkbox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleCheckboxInsert = function(jsonObj) {
        let domCheckboxes = document.querySelectorAll('input[type=checkbox][data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref]');
        if (!domCheckboxes) {
            console.warn("Failed to find <input type=\"checkbox\"> " + jsonObj.fieldName);
            return;
        }
        domCheckboxes.forEach(element => {
            if (element.dataset.objref == jsonObj.objref) {
                element.checked = jsonObj.value;
                element.value = jsonObj.value;
            } else {
                element.checked = false;
            }
            if ("refreshApImage" in window && element.dataset.imageIndex) refreshApImage(parseInt(element.dataset.imageIndex));
        });
    };

    /**
     * Selects the relevant combobox option from the provided Form Field JSON object
     * If a value is not an option, a new option will be added with the provided value
     * If the combobox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleComboboxInsert = function(jsonObj) {
        let domCombobox = document.querySelector('select[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domCombobox) {
            console.warn("Failed to find <select> " + jsonObj.fieldName);
            return;
        }

        let options = domCombobox.children;
        let optionFound = false;
        for (let i = 0, ii = options.length; i < ii; i++) {
            let option = options[i];
            if (option.value === jsonObj.value) {
                option.setAttribute("selected", "selected");
                domCombobox.selectedIndex = i;
                optionFound = true;
            } else {
                option.removeAttribute("selected");
            }
        }
        if (!optionFound) {
            const newOpt = document.createElement("option");
            newOpt.text = jsonObj.value;
            newOpt.value = jsonObj.value;
            newOpt.setAttribute("selected", "selected");
            domCombobox.appendChild(newOpt);
        }
        domCombobox.value = jsonObj.value;
    }

    /**
     * Selects the relevant listbox option from the provided Form Field JSON object
     * Unselects any other options
     * If the listbox is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleListboxInsert = function(jsonObj) {
        let domListbox = document.querySelector('select[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domListbox) {
            console.warn("Failed to find <select> " + jsonObj.fieldName);
            return;
        }
        let options = domListbox.children;
        for (let i = 0, ii = options.length; i < ii; i++) {
            let option = options[i];

            if (option.value == jsonObj.value || jsonObj.value instanceof Array && jsonObj.value.includes(option.value)) {
                option.selected = true;
                option.setAttribute("selected", "selected");
            } else {
                option.removeAttribute("selected");
            }
        }
    }

    /**
     * Inserts the multiline text from the provided Form Field JSON object
     * If the textarea is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleMultilineTextInsert = function(jsonObj) {
        let domTextArea = document.querySelector('textarea[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domTextArea) {
            console.warn("Failed to find <textarea> " + jsonObj.fieldName);
            return;
        }
        domTextArea.value = jsonObj.value;
    }

    /**
     * Inserts the value of the provided Form Field JSON object into the relevant HTML input
     * Can also insert into textareas if not using single-line text output
     * If the input/textarea is not found, a warning will be logged to the console
     *
     * @param {Object} jsonObj an object representation of a Form Field
     * @private
     */
    let _handleGenericInputInsert = function(jsonObj) {
        let domInput = document.querySelector(':is(input,textarea)[data-field-name="' + escapeForCssSelector(jsonObj.fieldName) + '"][data-objref="' + jsonObj.objref + '"]');
        if (!domInput) {
            console.warn("Failed to find <input> or <textarea>" + jsonObj.fieldName);
            return;
        }
        domInput.value = jsonObj.value;
    }

    let setRequestEventHandlers = function(xhr, params) {
        xhr.onreadystatechange = function(event) {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    if (params.success) {
                        params.success(event);
                    }
                } else {
                    if (params.failure) {
                        params.failure(event);
                    } else {
                        console.log(event.target.response);
                    }
                }
            }
        };
    };

    FormVuAPI.submitFormAsMail = function(params) {
        if (typeof params !== 'object') {
            params = {url: params};
        }
        if (!params.url.startsWith('mailto:')) {
            return;
        }
        switch (params.format) {
            case 'formdata':
                alert('The file will be saved in your machine, please attach it to the email');
                downloadFormDataValues(this.extractFormValues());
                openMailToLink(params.url);
                break;
            case 'pdf':
                alert('The file will be saved in your machine, please attach it to the email');
                idrform.app.execMenuItem('SaveAs');
                openMailToLink(params.url);
                break;
            default:
                alert('Unsupported submission format. Submission failed.');
                break;
        }
    };

    let downloadFormDataValues = function(formValues) {
        let formValuesString = "";
        for (var value in formValues) {
            if (formValues.hasOwnProperty(value) && formValues[value] !== undefined) {
                if (formValuesString.length !== 0) {
                    formValuesString += '&';
                }

                formValuesString += encodeURIComponent(value) + '=' + formValues[value];
            }
        }
        let fileDL = document.createElement('a');
        let pdfName = document.getElementById("FDFXFA_PDFName").textContent;
        fileDL.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(formValuesString));
        fileDL.setAttribute('download', pdfName + '.txt');
        fileDL.style.display = 'none';
        document.body.appendChild(fileDL);
        fileDL.click();
        document.body.removeChild(fileDL);
    };

    let openMailToLink = function(target) {
        let mailto = document.createElement('a');
        mailto.setAttribute('href', target);
        mailto.setAttribute('target', "_blank");
        mailto.style.display = 'none';
        document.body.appendChild(mailto);
        mailto.click();
        document.body.removeChild(mailto);
    };

    FormVuAPI.submitFormAsJSON = function (params) {
        let url = typeof params === 'object' ? params.url : params;

        let formValues = {data: this.extractFormValues()};
        let xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.send(JSON.stringify(formValues));
            return xhr;
        }
    };

    FormVuAPI.submitFormAsFormData = function (params) {
        let url = typeof params === 'object' ? params.url : params;

        let formValues = this.extractFormValues();
        let xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);

            let formData = new FormData();
            for (var value in formValues) {
                if (formValues.hasOwnProperty(value) && formValues[value] !== undefined) {
                    formData.append(encodeURIComponent(value), formValues[value]);
                }
            }
            xhr.send(formData);
            return xhr;
        }
    };

    FormVuAPI.submitFormAsPDF = function (params) {
        let url, submitType="formData";
        if (typeof params === 'object') {
            url = params.url;
            submitType = params.submitType || "formData";
        } else {
            url = params;
        }

        const xhr = new XMLHttpRequest();
        if (xhr.upload) {
            setRequestEventHandlers(xhr, params);
            xhr.open('POST', url, true);
            const file = idrform.getCompletedFormPDF();
            const fileName = document.querySelector("#FDFXFA_PDFName").textContent;

            if (submitType === "raw") {
                xhr.setRequestHeader("Content-Disposition", `filename="${fileName}"`)
                xhr.send(file);
            } else if (submitType === "formData") {
                const formData = new FormData();
                formData.append("file", file, fileName);
                xhr.send(formData);
            }
            return xhr;
        }
    }

    window.FormVuAPI = FormVuAPI;

}());









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

#t1_4{left:55px;bottom:1138px;letter-spacing:-0.14px;}
#t2_4{left:55px;bottom:1103px;letter-spacing:0.14px;}
#t3_4{left:55px;bottom:1086px;letter-spacing:0.12px;}
#t4_4{left:55px;bottom:1070px;letter-spacing:0.12px;}
#t5_4{left:55px;bottom:1053px;letter-spacing:0.12px;}
#t6_4{left:55px;bottom:1037px;letter-spacing:0.13px;}
#t7_4{left:55px;bottom:1020px;letter-spacing:0.13px;}
#t8_4{left:55px;bottom:1004px;letter-spacing:0.13px;}
#t9_4{left:55px;bottom:988px;letter-spacing:0.12px;}
#ta_4{left:55px;bottom:971px;letter-spacing:0.13px;}
#tb_4{left:322px;bottom:971px;letter-spacing:0.12px;}
#tc_4{left:55px;bottom:955px;letter-spacing:0.12px;}
#td_4{left:55px;bottom:938px;letter-spacing:0.12px;}
#te_4{left:55px;bottom:922px;letter-spacing:0.11px;}
#tf_4{left:55px;bottom:906px;letter-spacing:0.12px;}
#tg_4{left:55px;bottom:889px;letter-spacing:0.12px;}
#th_4{left:70px;bottom:867px;letter-spacing:0.12px;}
#ti_4{left:55px;bottom:850px;letter-spacing:0.12px;}
#tj_4{left:55px;bottom:834px;letter-spacing:0.13px;}
#tk_4{left:55px;bottom:817px;letter-spacing:0.12px;}
#tl_4{left:55px;bottom:801px;letter-spacing:0.12px;}
#tm_4{left:55px;bottom:784px;letter-spacing:0.12px;}
#tn_4{left:55px;bottom:768px;letter-spacing:0.13px;}
#to_4{left:70px;bottom:745px;letter-spacing:0.12px;}
#tp_4{left:55px;bottom:729px;letter-spacing:0.12px;}
#tq_4{left:55px;bottom:713px;letter-spacing:0.12px;}
#tr_4{left:55px;bottom:696px;letter-spacing:0.12px;}
#ts_4{left:55px;bottom:680px;letter-spacing:0.13px;}
#tt_4{left:484px;bottom:1103px;letter-spacing:0.12px;}
#tu_4{left:484px;bottom:1086px;letter-spacing:0.11px;}
#tv_4{left:484px;bottom:1070px;letter-spacing:0.13px;}
#tw_4{left:484px;bottom:1053px;letter-spacing:0.12px;}
#tx_4{left:484px;bottom:1037px;letter-spacing:0.12px;}
#ty_4{left:484px;bottom:1020px;letter-spacing:0.12px;}
#tz_4{left:484px;bottom:1004px;letter-spacing:0.12px;}
#t10_4{left:484px;bottom:988px;letter-spacing:0.12px;}
#t11_4{left:499px;bottom:965px;letter-spacing:0.12px;}
#t12_4{left:484px;bottom:949px;letter-spacing:0.13px;}
#t13_4{left:484px;bottom:932px;letter-spacing:0.11px;}
#t14_4{left:484px;bottom:910px;letter-spacing:0.14px;}
#t15_4{left:605px;bottom:910px;}
#t16_4{left:623px;bottom:910px;}
#t17_4{left:642px;bottom:910px;}
#t18_4{left:660px;bottom:910px;}
#t19_4{left:678px;bottom:910px;}
#t1a_4{left:697px;bottom:910px;}
#t1b_4{left:715px;bottom:910px;}
#t1c_4{left:733px;bottom:910px;}
#t1d_4{left:752px;bottom:910px;}
#t1e_4{left:770px;bottom:910px;}
#t1f_4{left:790px;bottom:910px;letter-spacing:0.12px;}
#t1g_4{left:484px;bottom:887px;letter-spacing:0.13px;}
#t1h_4{left:752px;bottom:887px;}
#t1i_4{left:770px;bottom:887px;}
#t1j_4{left:791px;bottom:887px;letter-spacing:0.12px;}
#t1k_4{left:484px;bottom:865px;letter-spacing:0.13px;}
#t1l_4{left:484px;bottom:848px;letter-spacing:0.13px;}
#t1m_4{left:697px;bottom:848px;}
#t1n_4{left:715px;bottom:848px;}
#t1o_4{left:733px;bottom:848px;}
#t1p_4{left:752px;bottom:848px;}
#t1q_4{left:770px;bottom:848px;}
#t1r_4{left:790px;bottom:848px;letter-spacing:0.12px;}
#t1s_4{left:499px;bottom:826px;letter-spacing:0.13px;}
#t1t_4{left:484px;bottom:809px;letter-spacing:0.12px;}
#t1u_4{left:484px;bottom:793px;letter-spacing:0.13px;}
#t1v_4{left:484px;bottom:776px;letter-spacing:0.13px;}
#t1w_4{left:484px;bottom:760px;letter-spacing:0.15px;}
#t1x_4{left:683px;bottom:760px;letter-spacing:0.12px;}
#t1y_4{left:484px;bottom:744px;letter-spacing:0.13px;}
#t1z_4{left:484px;bottom:727px;letter-spacing:0.12px;}
#t20_4{left:484px;bottom:711px;letter-spacing:0.13px;}
#t21_4{left:755px;bottom:711px;letter-spacing:0.13px;}
#t22_4{left:484px;bottom:694px;letter-spacing:0.12px;}
#t23_4{left:663px;bottom:694px;letter-spacing:0.13px;}
#t24_4{left:803px;bottom:694px;letter-spacing:0.1px;}
#t25_4{left:484px;bottom:678px;letter-spacing:0.12px;}

.s0_4{font-size:11px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s1_4{font-size:15px;font-family:HelveticaNeueLTStd-Bd_wo;color:#000;}
.s2_4{font-size:15px;font-family:HelveticaNeueLTStd-Roman_wq;color:#000;}
.s3_4{font-size:15px;font-family:HelveticaNeueLTStd-It_wp;color:#000;}
</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts4" type="text/css" >

@font-face {
	font-family: HelveticaNeueLTStd-Bd_wo;
	src: url("fonts/HelveticaNeueLTStd-Bd_wo.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-It_wp;
	src: url("fonts/HelveticaNeueLTStd-It_wp.woff") format("woff");
}

@font-face {
	font-family: HelveticaNeueLTStd-Roman_wq;
	src: url("fonts/HelveticaNeueLTStd-Roman_wq.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg4Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg4" style="-webkit-user-select: none;"><object width="933" height="1209" data="4/4.svg" type="image/svg+xml" id="pdf4" style="width:933px; height:1209px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_4" class="t s0_4">Form 940 (2023) </span>
<span id="t2_4" class="t s1_4">Privacy Act and Paperwork Reduction Act Notice. </span>
<span id="t3_4" class="t s2_4">We ask for the information on this form to carry out the </span>
<span id="t4_4" class="t s2_4">Internal Revenue laws of the United States. We need it </span>
<span id="t5_4" class="t s2_4">to figure and collect the right amount of tax. Chapter </span>
<span id="t6_4" class="t s2_4">23, Federal Unemployment Tax Act, of Subtitle C, </span>
<span id="t7_4" class="t s2_4">Employment Taxes, of the Internal Revenue Code </span>
<span id="t8_4" class="t s2_4">imposes a tax on employers with respect to employees. </span>
<span id="t9_4" class="t s2_4">This form is used to determine the amount of the tax that </span>
<span id="ta_4" class="t s2_4">you owe. Section 6011 requires you to </span><span id="tb_4" class="t s2_4">provide the </span>
<span id="tc_4" class="t s2_4">requested information if you are liable for FUTA tax under </span>
<span id="td_4" class="t s2_4">section 3301. Section 6109 requires you to provide your </span>
<span id="te_4" class="t s2_4">identification number. If you fail to provide this </span>
<span id="tf_4" class="t s2_4">information in a timely manner or provide a false or </span>
<span id="tg_4" class="t s2_4">fraudulent form, you may be subject to penalties. </span>
<span id="th_4" class="t s2_4">You’re not required to provide the information </span>
<span id="ti_4" class="t s2_4">requested on a form that is subject to the Paperwork </span>
<span id="tj_4" class="t s2_4">Reduction Act unless the form displays a valid OMB </span>
<span id="tk_4" class="t s2_4">control number. Books and records relating to a form or </span>
<span id="tl_4" class="t s2_4">instructions must be retained as long as their contents </span>
<span id="tm_4" class="t s2_4">may become material in the administration of any Internal </span>
<span id="tn_4" class="t s2_4">Revenue law. </span>
<span id="to_4" class="t s2_4">Generally, tax returns and return information are </span>
<span id="tp_4" class="t s2_4">confidential, as required by section 6103. However, </span>
<span id="tq_4" class="t s2_4">section 6103 allows or requires the IRS to disclose or </span>
<span id="tr_4" class="t s2_4">give the information shown on your tax return to others </span>
<span id="ts_4" class="t s2_4">as described in the Code. For example, we may disclose </span>
<span id="tt_4" class="t s2_4">your tax information to the Department of Justice for civil </span>
<span id="tu_4" class="t s2_4">and criminal litigation, and to cities, states, the District of </span>
<span id="tv_4" class="t s2_4">Columbia, and U.S. commonwealths and territories to </span>
<span id="tw_4" class="t s2_4">administer their tax laws. We may also disclose this </span>
<span id="tx_4" class="t s2_4">information to other countries under a tax treaty, to </span>
<span id="ty_4" class="t s2_4">federal and state agencies to enforce federal nontax </span>
<span id="tz_4" class="t s2_4">criminal laws, or to federal law enforcement and </span>
<span id="t10_4" class="t s2_4">intelligence agencies to combat terrorism. </span>
<span id="t11_4" class="t s2_4">The time needed to complete and file this form will vary </span>
<span id="t12_4" class="t s2_4">depending on individual circumstances. The estimated </span>
<span id="t13_4" class="t s2_4">average time is: </span>
<span id="t14_4" class="t s1_4">Recordkeeping </span><span id="t15_4" class="t s2_4">. </span><span id="t16_4" class="t s2_4">. </span><span id="t17_4" class="t s2_4">. </span><span id="t18_4" class="t s2_4">. </span><span id="t19_4" class="t s2_4">. </span><span id="t1a_4" class="t s2_4">. </span><span id="t1b_4" class="t s2_4">. </span><span id="t1c_4" class="t s2_4">. </span><span id="t1d_4" class="t s2_4">. </span><span id="t1e_4" class="t s2_4">. </span><span id="t1f_4" class="t s2_4">9 hr., 19 min. </span>
<span id="t1g_4" class="t s1_4">Learning about the law or the form </span><span id="t1h_4" class="t s2_4">. </span><span id="t1i_4" class="t s2_4">. </span><span id="t1j_4" class="t s2_4">1 hr., 23 min. </span>
<span id="t1k_4" class="t s1_4">Preparing, copying, assembling, and </span>
<span id="t1l_4" class="t s1_4">sending the form to the IRS </span><span id="t1m_4" class="t s2_4">. </span><span id="t1n_4" class="t s2_4">. </span><span id="t1o_4" class="t s2_4">. </span><span id="t1p_4" class="t s2_4">. </span><span id="t1q_4" class="t s2_4">. </span><span id="t1r_4" class="t s2_4">1 hr., 36 min. </span>
<span id="t1s_4" class="t s2_4">If you have comments concerning the accuracy of </span>
<span id="t1t_4" class="t s2_4">these time estimates or suggestions for making </span>
<span id="t1u_4" class="t s2_4">Form 940 simpler, we would be happy to hear from </span>
<span id="t1v_4" class="t s2_4">you. You can send us comments from </span>
<span id="t1w_4" class="t s3_4">www.irs.gov/FormComments</span><span id="t1x_4" class="t s2_4">. Or you can send your </span>
<span id="t1y_4" class="t s2_4">comments to Internal Revenue Service, Tax Forms and </span>
<span id="t1z_4" class="t s2_4">Publications Division, 1111 Constitution Ave. NW, </span>
<span id="t20_4" class="t s2_4">IR-6526, Washington, DC 20224. Don’t </span><span id="t21_4" class="t s2_4">send Form 940 to </span>
<span id="t22_4" class="t s2_4">this address. Instead, see </span><span id="t23_4" class="t s3_4">Where Do You File? </span><span id="t24_4" class="t s2_4">in the </span>
<span id="t25_4" class="t s2_4">Instructions for Form 940. </span></div>
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
</div>
<script src="config.js" type="text/javascript"></script>
<script type="text/javascript">FormViewer.setup();</script>

<script>window.addEventListener('DOMContentLoaded',function(){const el=document.createElement("div");el.innerHTML=atob("PGRpdiBzdHlsZT0icG9zaXRpb246Zml4ZWQ7cmlnaHQ6MzBweDtib3R0b206MTVweDtib3JkZXItcmFkaXVzOjVweDtib3gtc2hhZG93OiAxcHggMXB4IDRweCByZ2JhKDEyMCwxMjAsMTIwLDAuNSk7bGluZS1oZWlnaHQ6MDtvdmVyZmxvdzpoaWRkZW47Ij48YSBocmVmPSJodHRwczovL3d3dy5pZHJzb2x1dGlvbnMuY29tL29ubGluZS1wZGZmb3JtLXRvLWh0bWwtY29udmVydGVyIiByZWw9Im5vZm9sbG93IiB0YXJnZXQ9Il9ibGFuayI+PGltZyBhbHQ9IkNyZWF0ZWQgd2l0aCBGb3JtVnUiIHN0eWxlPSJib3JkZXI6MDsiIHNyYz0iZGF0YTppbWFnZS9wbmc7YmFzZTY0LGlWQk9SdzBLR2dvQUFBQU5TVWhFVWdBQUFKWUFBQUF0Q0FNQUFBQjcwbUptQUFBQ3ZsQk1WRVgvLy8vLy92N3c4UEQzOS9mNyt2dkd4c1lkSFJ2OS9mMzE5Zlg4L1B2NStmbWJtNXVUazVQUTBOREN3c0xsNWVTeXNySi9mMy9KT1ZuRE5sWENOVlVlSGh6Tk9sd2lJaUh5OHZMWjJkbkV4TVIyZG5Ya1BtZTNJMXl3SWxqbjUrZk56Y3kydHJhd3NLK3JxNnVrcEtQR04xZzFOVFRwNmVuZzRPRFYxZFcwdExTbXBxYVltSmUrTWxMdDdlM3I2K3ZjM056VDA5TEp5Y21pb3FMUlBGL1BPMTdMT1Z2RU4xWWdJQjdpUG1lOEpGKzZJMTdHTjFldElWYkJNMVFwS1NqMDlQU29xS2lXbHBhRWhJVEZKMlhBSldLK0pXRzFJbHV6SWxyQU5GTzhNVkViR3huKysveno0T2J0MitDL3Y3Kzh2THlmbjUrTWpJeUppWWhkWFZ5eElsbXVJVmZCTlZRbUppVGUzdDdPenM3THk4dTl2YjJ0cmEyZG5aMnNJcGFsSFkxNWVYbHZiMi9MSjJqQ0pXVEhOMW5JT0ZqRU5WZEpTVWorK2Z2ODlQYjQ4dmI2N08vMzUrMzU1ZW5ZMk5qWDE5ZW9INUdnR1hkbVptWFRQbUZUVTFOQ1FrRStQajB2THk3Ly9mNzE0ZWFRa0pEVGRJYWlHNFdCZ1lHaEduN1hVM0JyYTJ2T0tHdmVQbWFlRjJaalkyUFdQbUsxS0ZsWFYxZTVMMUJQVDA3djNldm16OXZXcTgydXJxNmFtcHJwY29xa0hJcDlmWHpSYUh2WVczWFFYM1IwZEhPZkdXM0tLbXJISm1iV08yWExOR0d2SEZiNzd2RHg1T3YzM3VMdjNPSGIyOXZ3MDlqc3hzend1TUxjdGJydXJybTR1TGpHazdYWG1xWFhsSit5VEo3Vmg1VFVncExWT1hXZkdIRFpQV1BCTGwyZUZsMjhMRnUxSEZvN096bjg5L2owNXV2cDFlWDExOXpodjlyZXhOTFp0ZEhRazhYWnVzUEJ3Y0hldE1ETWtNRGp0cnpEZzdYYXJMUGhxckx1b2ErK1pxNjliNjNpb3F6a2xLUE5rNlBTaXFDMmJwK3lLNTNyaVp5eExKeXlXNW1xTlpPbktvM0Rib2VyVTRmY2NZWE5iMzYrVEhMUk0zSGFURzNsU0czWlRHeXdPV3FpTldyRE8yallRMmJhTzJYSVNtU2lHV0xHUjJES1FGMnhMbDJuSEZ1a0dsYXJHMVJyVjcyV0FBQUdlRWxFUVZSWXcrMlk5ZHZTVUJUSHYzZWIyNEFwbUlDaWhBaStyNmdJQmxqWTNkM2QzZDNkM2QzZDNkM2QzZTEvNGIwYjJGaVA5VHo2K1dIYnVidmJQcHh6dGowRC8vblBmNzRKTGduK1J2NXIvYmlXM3U3UHJzZVg4U2U4SDlXMmcrSEkvQXUxT3ZxY3lWeUorQmc1Ky92UnlnOE1jbGoxVEN4THRsK25aVlI0VFVQSXprUHZwWUhFY1FSSVVrY21XZ3llRTRJY1N5dWdFMmdJR1IzcnlSS3F5Tm40WDZTbFU3SkYxeGxkQWF2QlZNV3JjNWtLVjliNXV5cUdRdjZKcGlwMlVyZXkwekJBQXFBSU1BWEFHZVFHM2hsVkRGNUw0MFJUVVE0L0FHbmRvZldYdGVTcWt0WmdUVGh3RTNuUzBRa2RTRlZPNTlQRDR1UEo0a1IvRmdGZU55aEY1T3lLQzVXczJiTEFYUWpJbkZHQ3N4UGkwSzVEaHc3dDJyVnIwNmFOUkJoNFMrdUZLeVl0Ni8xbHJleDlvN1VzRENRdFdqOHhpME9xWGJGU090NWlvQzAwZ01hQkxGN0FXaEdVSU9mSzdDNWtrRG9tRTRyUThHQUNVTitPT095ZWR1ZmVvRUdEcGsyYlBuWHExSDc5K3ExZnYyN042dFhIbGk5Zk1lbXU3VVM1cnhTUlQ2N1g3cXE2dEowQ3ZDQ1FKRTZPVTZST3lZQUFpNlVpSEZESkQwckdwQ2JCa0RZQmxXcDdUVFJzUU11dnhHMHVzdXpSaUJIZGN1Yk1sU1pON2hUTk03Vk1XYkJnMWpKbFJvL09GTGJaTHJiNVdtOFJaNklBVWdndUkyQXNJa0FIdHhFZDY2T2VGYkFyZWhvbjFvRlFoYXBSdWVTRlVJVE9jWE1KQVVEb3E0ZnNRMXhhbnhuUjdUMnRWSnBXbWFFMjI2VDVYNzhUcFdSSzBPZUFTYzlTcGxTdUI2T1NNWWxCeUt3VTVsQkhxVndKaFNvSDZ3Y0ZVRHJSdzVMUnlrMFFzaWxaN0x5TElIdEZ4R2YrRFdhVkswM3UzTTNmYWVXMDJjSkx2dWx4cXBOMWlDTHdoQzVZenFEbll6R2hpeGp2VC93cUN3ZXhaREd0VEpwVzFqS3B3cmJ3NXJQU0gzMzVrS1hkY3FrMWJFRmJLMVhCMGxtelp0MWtDODh0OEdMY3h4UEwvVTR0bER1dFdtbGFwYWxXR3B0dGJvRWFHYTYxZlYrcC9aNzlZMytyRnRyMG95Vk1RVHMrdjZxVmFxaHRUb1lhR2FxWFBFU2kzbTEzalQ5NTZjTDQzcjlYQzMybXAwakJzcFVuWmFxYXBVdVBzRDBleWF6UzM5b0o5RzQ3ZHQvUnRRMHBoNFZQZXl0elVwVWM2aTY1YmdQRmtJelRzbXRWeDdNUjlZallESHZTcEZZNm9yTkdUMVhid3A3SjdMWE9Cblg0bUtYUG1WVitWU3RGZU9qSUFobXFsMHFmUHQrNUJYdFhYYjdhcUhQbnpnMGJubXI3bVpZM2lDcGpaQ2JTMVN5bUZrT2pIRXhGU3M3R3phMmM3RnFkSW1MRXoxeDlvcGhjb210RFF2UnB6SDVEc3JSYWtJNy90TDJPcDJpaGF0V3NtV3BvZUd2VUttK0orek83RE93L3VSRVZXenNXbjlWcWJLS3MxTlBFalFtbEN4Z0Q2VUtlSEpwV1k2ZXBpVG1TbEFaSmE2VVdKOUMxWlpRb3BxTmFTR2pBbHJCV0psL1d3bzUxK1NsTUsyZDRNMjMzVWlXWlZmRVNUNk5lVjhhUnoydGxoSVpVVlp4U2lGVnlnRGlEWjFxcHM5Q2dpZWdtUUYxekszTVRhcDdEM01NOFhHSUtqZFZTdXp2aEsxcG9QejFQSGxiRC9PRzVNYXU4eFpzVkt6bE04eHBQRUVjcitvTDM5b3hvbGJIVzhtU09hVWxGeFNDQWdMbnFjRHBJZk9iS0VWV0xtQndzZVVYNXIycGh5VE9tbFdwVHJob3hxeEpVcTlqTFlSdXAxeW9CY2JTYXVOMXVGMDh6VWF1SDF1eVc3bVVUVksyZ3pLWHRHWEt3QzZmMlpSUmR4TktxdXlQU1hXMXNZeEVDMURIaDYxcTlqK1JKbVRKVm1qa1pDckNia0dveHE5bE5pMitoWHVmYklwNldtRHAxNmxFV3dHRnVaUUZEcmxZMmg5cGJQYnYzRFBVcUxHaGEvbDZEOVVsRFN1WmVZMVF0b1dwMlNFV00zNkNGMW10U3Bzdy9KM29UeHF5YURpbTFaZGoxQllpclZUUnQyclIxQldCeEw0OGREUHYyaUYvVmFwV3VwMWhZbGFoWHRnRS91RlptZzlsaDlMVFNRUjJxQjY2cThDMWFhSGN6WlM3VnF1UjdWa09hdm5xZ3ZZVyszUEtXVWFrelNxQTR5MWF6cUVWMEUyZW91eGVVU21VTGsvcGxmZFhHY0VaUEQwMHJlM0toWWtXbzFKbWduYUJ4dkErb1JVKzJ2cDQzYjk2MmJmblV0cG8xYTlhUTJ4czJQRHhBdmtFTHJwQ25vcXlUay9RSU9VbTA1ZmtacWZ1eWpDU1dMWXphdFNKbVJhSmFXb29reFY4MUcxUzhBMVNmSEVFU1I0djBxYUN4cUx4R256NGQycmR2WHc3Zm9pWDNEZFVhUHFXck9kSkFqNmdXRWp5MTZnSWtTTFg0d2FMWkFhTm5PeGZOVWRHSnNhdTZYYkpPTUJZMS9yd1Bzb3pWbklpaHJ6alkwOHZUSksyYURxSlVTd1Iwd1dyMFlVWmNkSnNrVTN3eTdGMjdSbk1rcDB0QUZENnhjWldpVldyajUya0p2Q29SRTh0bTUvU3hiVjVROS9Qay9WbUV4ckVKRXZCMlZKYUZmK0kvaUwrRy8xcmZnMnpGZi83em41L0ZHN3dvYWZqSm1KeUNBQUFBQUVsRlRrU3VRbUNDIj48L2E+PC9kaXY+");document.body[atob("YXBwZW5kQ2hpbGQ=")](el.firstChild);});</script>






























































































































<script type="text/javascript">

var idrform = new IDRFORM,
    idrscript = {};

function IDRFORM() {
    class Event {
        #e;
        #t;
        changeEx;
        commitKey;
        fieldFull;
        keyDown;
        modifier;
        name;
        rc = !0;
        richChange;
        richChangeEx;
        richValue;
        selEnd;
        selStart;
        targetName;
        type;
        willCommit;
        constructor(e, t) {
            this.#e = e, this.#t = t, this.changeEx = null, this.commitKey = null, this.fieldFull = null, this.keyDown = null, this.modifier = null, this.name = "", this.richChange = null, this.richChangeEx = null, this.richValue = null, this.selEnd = null, this.selStart = null, this.targetName = "", this.type = "Field", this.willCommit = null
        }
        get shift() {
            return this.#e.shiftKey
        }
        get source() {
            return new Field(this.#e.target)
        }
        get target() {
            return new Field(this.#e.target)
        }
        get value() {
            return this.#t ? this.#t.value : this.#e.target.value
        }
        set value(e) {
            if (this.#t) return this.#t.value = e, void 0;
            this.#e.target.value = e
        }
        get change() {
            return this.#e.target.value
        }
        set change(e) {
            this.#e.target.value = e
        }
    }
    const doc = new Doc,
        app = new App;
    let event;
    const AVAIL_CALCULATES = {},
        AVAIL_VALIDATES = {};
    this.app = app, this.doc = doc, window.getField = function(e) {
        return doc.getField(e)
    };
    const AVAIL_SCRIPTS = {
        A: "click",
        K: "input",
        C: "",
        V: "",
        F: "",
        Fo: "focus",
        Bl: "blur",
        D: "mousedown",
        U: "mouseup",
        E: "mouseenter",
        X: "mouseleave"
    };
    this._radioUnisonSiblings = {}, this._checkboxGroups = {}, this.init = function() {
        const e = document.getElementById("FDFXFA_FormType");
        e && (app.isAcroForm = "FDF" === e.textContent || "AcroForm" === e.textContent);
        const t = document.getElementById("FDFXFA_Processing");
        if (t && (t.style.display = "none"), idrscript.documentscript) try {
            window.eval(atob(idrscript.documentscript))
        } catch (e) {
            console.log(e)
        }
        idrscript.pagescript && idrform.exec(idrscript.pagescript);
        const o = document.querySelectorAll("input, select, textarea");
        for (const e of o) {
            const t = e.getAttribute("type"),
                o = e.getAttribute("id"),
                n = ["button", "radio", "checkbox"].includes(e.type);
            for (const [t, i] of Object.entries(AVAIL_SCRIPTS)) {
                const a = o + "_" + t;
                a in idrscript && (n ? i.length > 0 && e.addEventListener(i, (e => {
                    idrform.exec(idrscript[a], e)
                })) : "F" === t ? e.addEventListener("onblur", (e => {
                    idrform.exec(idrscript[a], e)
                })) : "C" === t ? AVAIL_CALCULATES[o] = atob(idrscript[a]) : "V" === t && (AVAIL_VALIDATES[o] = atob(idrscript[a])))
            }
            if ("button" !== t && e.addEventListener("change", (e => {
                    idrform.doc.calculateNow()
                })), "radio" === t) {
                if (e.dataset.hide && e.addEventListener("click", this._hideEvent), e.dataset.show && e.addEventListener("click", this._showEvent), e.dataset.flagRadiosinunison) {
                    let t = this._radioUnisonSiblings[e.dataset.fieldName];
                    t || (t = {}, this._radioUnisonSiblings[e.dataset.fieldName] = t);
                    let o = t[e.value];
                    o || (o = [], t[e.value] = o), o.push(e), e.addEventListener("change", (e => {
                        this._doRadioUnison(e.currentTarget)
                    }))
                }
            } else if ("checkbox" === t) {
                let t = this._checkboxGroups[e.dataset.fieldName];
                t || (t = {}, this._checkboxGroups[e.dataset.fieldName] = t);
                let o = t[e.value];
                o || (o = [], t[e.value] = o), o.push(e), e.addEventListener("change", (e => {
                    this._doCheckboxGroup(e.currentTarget)
                }))
            }
        }
        doc.calculateNow()
    }, this.exec = function(e, t) {
        this.doc.exec(atob(e), t), this.doc.calculateNow()
    }, this.execMenuItem = function(e) {
        this.app.execMenuItem(e)
    }, this.submitForm = function(e) {
        this.doc.submitForm(e)
    }, this._hideEvent = function(e) {
        if (e.target && e.target.dataset && e.target.dataset.hide)
            for (var t = e.target.dataset.hide.split(" "), o = 0; o < t.length; o++) idrform.doc.getField(t[o]).display = display.hidden
    }, this._showEvent = function(e) {
        if (e.target && e.target.dataset && e.target.dataset.show)
            for (var t = e.target.dataset.show.split(" "), o = 0; o < t.length; o++) idrform.doc.getField(t[o]).display = display.visible
    }, this._doRadioUnison = function(e) {
        this._updateRadioUnisonSiblings(e);
        for (const [t, o] of Object.entries(this._radioUnisonSiblings[e.dataset.fieldName])) t !== e.value && this._updateRadioUnisonSiblings(o[0])
    }, this._updateRadioUnisonSiblings = function(e) {
        const t = undefined;
        this._radioUnisonSiblings[e.dataset.fieldName][e.value].forEach((t => {
            t.checked = e.checked, "refreshApImage" in window && refreshApImage(parseInt(t.dataset.imageIndex))
        }))
    }, this._doCheckboxGroup = function(e) {
        const t = this._checkboxGroups[e.dataset.fieldName],
            o = e.checked;
        for (const [n, i] of Object.entries(t))
            for (const t of i) t.checked = n === e.value && o, "refreshApImage" in window && refreshApImage(parseInt(t.dataset.imageIndex))
    }, this.getCheckboxGroup = function(e) {
        return this._checkboxGroups[e]
    }, this.getCompletedFormPDF = function() {
        return new Blob([Uint8Array.from(EcmaParser._insertFieldsToPDF("")).buffer], {
            type: "application/pdf"
        })
    };
    const AnnotationType = {
            Caret: "Caret",
            Circle: "Circle",
            FileAttachment: "FileAttachment",
            FreeText: "FreeText",
            Highlight: "Highlight",
            Ink: "Ink",
            Link: "Link",
            Line: "Line",
            Polygon: "Polygon",
            PolyLine: "PolyLine",
            Sound: "Sound",
            Square: "Square",
            Squiggly: "Squiggly",
            Stamp: "Stamp",
            StrikeOut: "StrikeOut",
            Text: "Text",
            Underline: "Underline"
        },
        border = {
            s: "solid",
            d: "dashed",
            b: "beveled",
            i: "inset",
            u: "underline"
        },
        cursor = {
            visible: 0,
            hidden: 1,
            delay: 2
        },
        display = {
            visible: 0,
            hidden: 1,
            noPrint: 2,
            noView: 3
        },
        font = {
            Times: "Times-Roman",
            TimesB: "Times-Bold",
            TimesI: "Times-Italic",
            TimesBI: "Times-BoldItalic",
            Helv: "Helvetica",
            HelvB: "Helvetica-Bold",
            HelvI: "Helvetica-Oblique",
            HelvBI: "Helvetica-BoldOblique",
            Cour: "Courier",
            CourB: "Courier-Bold",
            CourI: "Courier-Oblique",
            CourBI: "Courier-BoldOblique",
            Symbol: "Symbol",
            ZapfD: "ZapfDingbats",
            KaGo: "HeiseiKakuGo-W5-UniJIS-UCS2-H",
            KaMi: "HeiseiMin-W3-UniJIS-UCS2-H"
        },
        highlight = {
            n: "none",
            i: "invert",
            p: "push",
            o: "outline"
        },
        position = {
            textOnly: 0,
            iconOnly: 1,
            iconTextV: 2,
            textIconV: 3,
            iconTextH: 4,
            textIconH: 5,
            overlay: 6
        },
        style = {
            ch: "check",
            cr: "cross",
            di: "diamond",
            ci: "circle",
            st: "star",
            sq: "square"
        },
        trans = {
            blindsH: "BlindsHorizontal",
            blindsV: "BlindsVertical",
            boxI: "BoxIn",
            boxO: "BoxOut",
            dissolve: "Dissolve",
            glitterD: "GlitterDown",
            glitterR: "GlitterRight",
            glitterRD: "GlitterRightDown",
            random: "Random",
            replace: "Replace",
            splitHI: "SplitHorizontalIn",
            splitHO: "SplitHorizontalOut",
            splitVI: "SplitVerticalIn",
            splitVO: "SplitVerticalOut",
            wipeD: "WipeDown",
            wipeL: "WipeLeft",
            wipeR: "WipeRight",
            wipeU: "WipeUp"
        },
        zoomType = {
            none: "NoVary",
            fitP: "FitPage",
            fitW: "FitWidth",
            fitH: "fitHeight",
            fitV: "fitVisibleWidth",
            pref: "Preferred",
            refW: "ReflowWidth"
        },
        DS_GREATER_THAN = "Invalid value: must be greater than or equal to %s.",
        IDS_GT_AND_LT = "Invalid value: must be greater than or equal to %s and less than or equal to %s.",
        IDS_LESS_THAN = "Invalid value: must be less than or equal to %s.",
        IDS_INVALID_MONTH = "** Invalid **",
        IDS_INVALID_DATE2 = "should match format",
        IDS_INVALID_VALUE = "The value entered does not match the format of the field";

    function AFExecuteThisScript(e, t, o) {
        return console.log("method not defined contact - IDR SOLUTIONS"), event.rc
    }

    function AFImportAppearance(e, t, o, n) {
        return console.log("method not defined contact - IDR SOLUTIONS"), !0
    }

    function AFLayoutBorder(e, t, o, n, i) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFLayoutCreateStream(e) {
        return console.log("method not defined contact - IDR SOLUTIONS"), null
    }

    function AFLayoutDelete(e) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFLayoutNew(e, t, o) {
        return console.log("method not defined contact - IDR SOLUTIONS"), null
    }

    function AFLayoutText(e, t, o, n, i, a) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDDocEnumPDFields(e, t, o, n, i) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDDocGetPDFieldFromName(e, t) {
        return e.getField(t)
    }

    function AFPDDocLoadPDFields(e) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDFieldFromCosObj(e) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDFieldGetCosObj(e) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDFieldGetDefaultTextAppearance(e, t) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDFieldGetFlags(e, t) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDFieldGetName(e) {
        return e.name
    }

    function AFPDFieldGetValue(e) {
        return e.value
    }

    function AFPDFieldIsAnnot(e) {
        return console.log("AFPDFieldIsAnnot not defined contact - IDR SOLUTIONS"), !1
    }

    function AFPDFieldIsTerminal(e) {
        return console.log("AFPDFieldIsTerminal not defined contact - IDR SOLUTIONS"), !0
    }

    function AFPDFieldIsValid(e) {
        return console.log("AFPDFieldIsValid not defined contact - IDR SOLUTIONS"), !0
    }

    function AFPDFieldReset(e) {
        console.log("AFPDFieldReset not defined contact - IDR SOLUTIONS")
    }

    function AFPDFieldSetDefaultTextAppearance(e, t) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDFieldSetFlags(e, t, o) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDFieldSetOptions(e, t) {
        return console.log("method not defined contact - IDR SOLUTIONS"), "Good"
    }

    function AFPDFieldSetValue(e, t) {
        e.value = t
    }

    function AFPDFormFromPage(e, t) {
        return console.log("method not defined contact - IDR SOLUTIONS"), null
    }

    function AFPDWidgetGetAreaColors(e, t, o) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDWidgetGetBorder(e, t) {
        return console.log("method not defined contact - IDR SOLUTIONS"), !0
    }

    function AFPDWidgetGetRotation(e) {
        return console.log("method not defined contact - IDR SOLUTIONS"), null
    }

    function AFPDWidgetSetAreaColors(e, t, o) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPDWidgetSetBorder(e, t) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFSimple_Calculate(e, t) {
        let o = 0;
        switch (e) {
            case "AVG":
                let e = 0;
                for (const n of t) {
                    const t = doc.getField(n);
                    null != t && null != t.value && (e++, o += Number(t.value))
                }
                o /= e;
                break;
            case "MIN":
                o = doc.getField(t[0]).value;
                for (const e of t) {
                    const t = doc.getField(e);
                    null != t && null != t.value && (o = Math.min(o, t.value))
                }
                break;
            case "MAX":
                o = doc.getField(t[0]).value;
                for (const e of t) {
                    const t = doc.getField(e);
                    null != t && null != t.value && (o = Math.max(o, t.value))
                }
                break;
            case "PRD":
                o = 1;
                for (const e of t) {
                    const t = doc.getField(e);
                    null != t && null != t.value && (o *= t.value)
                }
                break;
            case "SUM":
                for (const e of t) {
                    const t = doc.getField(e);
                    null != t && null != t.value && (o += Number(t.value))
                }
                break
        }
        return o
    }

    function AFDate_KeystrokeEx(e) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFDate_Format(e) {
        var t = e,
            o = event.value,
            n, i;
        if (null != o && ("" + o).length > 0 && null == util.scand(t, o)) {
            var a = "Invalid date/time: please ensure that the date/time exists. Field [" + event.target.name + "] should match the format " + t;
            alert(a), event.value = null
        }
    }

    function AFDate_FormatEx(e) {
        AFDate_Format(e)
    }

    function AFTime_Keystroke(e) {
        AFTime_Format(e)
    }

    function AFTime_Format(e) {
        var t = cFormat,
            o = event.value,
            n;
        if (null == util.scand(t, o)) {
            var i = "Invalid date/time: please ensure that the date/time exists. Field [" + event.target.name + "] should match the format " + t;
            alert(i), event.value = null
        }
    }

    function AFPercent_Keystroke(e, t) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFPercent_Format(e, t) {
        if ("number" == typeof e && "number" == typeof t) {
            if (e < 0 && (alert("Invalid nDec value in AFPercent_Format"), event.value = null), e > 512) return event.value = "%", void 0;
            e = Math.floor(e), t = Math.min(Math.max(0, Math.floor(t)), 4);
            var o = AFMakeNumber(event.value);
            if (null === o) return event.value = "%", void 0;
            event.value = 100 * o + "%"
        }
    }

    function AFSpecial_Keystroke(e) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AFSpecial_Format(e) {
        var t;
        switch (e = AFMakeNumber(e)) {
            case 0:
                t = "99999";
                break;
            case 1:
                t = "99999-9999";
                break;
            case 2:
                var o = "" + event.value;
                t = o.length > 8 || o.startsWith("(") ? "(999) 999-9999" : "999-9999";
                break;
            case 3:
                t = "999-99-9999";
                break;
            default:
                return alert("Invalid psf in AFSpecial_Keystroke"), void 0
        }
        event.value = util.printx(t, event.value)
    }

    function AFMakeNumber(e) {
        if ("number" == typeof e) return e;
        if ("string" != typeof e) return null;
        e = e.trim().replace(",", ".");
        const t = parseFloat(e);
        return isNaN(t) || !isFinite(t) ? null : t
    }

    function AFNumber_Format(e, t, o, n, i, a) {
        var r = event.value;
        null != (r = AFMakeNumber(r)) && (event.value = r)
    }

    function AFNumber_Keystroke(e, t, o, n, i, a) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function AssembleFormAndImportFDF(e, t, o) {
        return console.log("method not defined contact - IDR SOLUTIONS"), doc
    }

    function ExportAsFDF(e, t, o, n, i, a, r) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function ExportAsFDFEx(e, t, o, n, i, a, r, s) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function ExportAsFDFWithParams(e) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function ExportAsHtml(e, t, o, n, i) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function ExportAsHtmlEx(e, t, o, n, i, a) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function ImportAnFDF(e, t) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function IsPDDocAcroForm(e) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function ResetForm(e, t, o) {
        console.log("method not defined contact - IDR SOLUTIONS")
    }

    function App() {
        this.isAcroForm = !0, this.activeDocs = [doc], this.calculate = !0, this.contstants = null, this.focusRect = !0, this.formsVersion = 6, this.fromPDFConverters = new Array, this.fs = new FullScreen, this.fullScreen = !1, this.language = "ENU", this.media = new Media, this.monitors = {}, this.numPlugins = 0, this.openInPlace = !1, this.platform = "WIN", this.plugins = new Array, this.printColorProfiles = new Array, this.printNames = new Array, this.runtimeHighlight = !1, this.runtimeHightlightColor = new Array, this.thermometer = new Thermometer, this.toolBar = !1, this.toolBarHorizontal = !1, this.toolBarVertical = !1, this.viewerType = "Exchange-Pro", this.viewerVariation = "Full", this.viewerVersion = 6, this.addMenuItem = function() {
            console.log("addMenuItem method not defined contact - IDR SOLUTIONS")
        }, this.addSubMenu = function() {
            console.log("addSubMenu method not defined contact - IDR SOLUTIONS")
        }, this.addToolButton = function() {
            console.log("addToolButton method not defined contact - IDR SOLUTIONS")
        }, this.alert = function(e, t, o, n, i, a) {
            var r = {
                cMsg: e,
                nIcon: 0,
                nType: 0,
                cTitle: "Adobe Acrobat",
                oDoc: null,
                oCheckBox: null
            };
            if (e instanceof Object)
                for (var s in e) r[s] = e[s];
            switch (void 0 !== o && (r.nType = o), r.nType) {
                case 0:
                    return window.alert(r.cMsg), void 0;
                case 1:
                case 2:
                case 3:
                    return window.confirm(r.cMsg)
            }
        }, this.beep = function() {
            var e;
            new Audio("data:audio/wav;base64,//uQRAAAAWMSLwUIYAAsYkXgoQwAEaYLWfkWgAI0wWs/ItAAAGDgYtAgAyN+QWaAAihwMWm4G8QQRDiMcCBcH3Cc+CDv/7xA4Tvh9Rz/y8QADBwMWgQAZG/ILNAARQ4GLTcDeIIIhxGOBAuD7hOfBB3/94gcJ3w+o5/5eIAIAAAVwWgQAVQ2ORaIQwEMAJiDg95G4nQL7mQVWI6GwRcfsZAcsKkJvxgxEjzFUgfHoSQ9Qq7KNwqHwuB13MA4a1q/DmBrHgPcmjiGoh//EwC5nGPEmS4RcfkVKOhJf+WOgoxJclFz3kgn//dBA+ya1GhurNn8zb//9NNutNuhz31f////9vt///z+IdAEAAAK4LQIAKobHItEIYCGAExBwe8jcToF9zIKrEdDYIuP2MgOWFSE34wYiR5iqQPj0JIeoVdlG4VD4XA67mAcNa1fhzA1jwHuTRxDUQ//iYBczjHiTJcIuPyKlHQkv/LHQUYkuSi57yQT//uggfZNajQ3Vmz+Zt//+mm3Wm3Q576v////+32///5/EOgAAADVghQAAAAA//uQZAUAB1WI0PZugAAAAAoQwAAAEk3nRd2qAAAAACiDgAAAAAAABCqEEQRLCgwpBGMlJkIz8jKhGvj4k6jzRnqasNKIeoh5gI7BJaC1A1AoNBjJgbyApVS4IDlZgDU5WUAxEKDNmmALHzZp0Fkz1FMTmGFl1FMEyodIavcCAUHDWrKAIA4aa2oCgILEBupZgHvAhEBcZ6joQBxS76AgccrFlczBvKLC0QI2cBoCFvfTDAo7eoOQInqDPBtvrDEZBNYN5xwNwxQRfw8ZQ5wQVLvO8OYU+mHvFLlDh05Mdg7BT6YrRPpCBznMB2r//xKJjyyOh+cImr2/4doscwD6neZjuZR4AgAABYAAAABy1xcdQtxYBYYZdifkUDgzzXaXn98Z0oi9ILU5mBjFANmRwlVJ3/6jYDAmxaiDG3/6xjQQCCKkRb/6kg/wW+kSJ5//rLobkLSiKmqP/0ikJuDaSaSf/6JiLYLEYnW/+kXg1WRVJL/9EmQ1YZIsv/6Qzwy5qk7/+tEU0nkls3/zIUMPKNX/6yZLf+kFgAfgGyLFAUwY//uQZAUABcd5UiNPVXAAAApAAAAAE0VZQKw9ISAAACgAAAAAVQIygIElVrFkBS+Jhi+EAuu+lKAkYUEIsmEAEoMeDmCETMvfSHTGkF5RWH7kz/ESHWPAq/kcCRhqBtMdokPdM7vil7RG98A2sc7zO6ZvTdM7pmOUAZTnJW+NXxqmd41dqJ6mLTXxrPpnV8avaIf5SvL7pndPvPpndJR9Kuu8fePvuiuhorgWjp7Mf/PRjxcFCPDkW31srioCExivv9lcwKEaHsf/7ow2Fl1T/9RkXgEhYElAoCLFtMArxwivDJJ+bR1HTKJdlEoTELCIqgEwVGSQ+hIm0NbK8WXcTEI0UPoa2NbG4y2K00JEWbZavJXkYaqo9CRHS55FcZTjKEk3NKoCYUnSQ0rWxrZbFKbKIhOKPZe1cJKzZSaQrIyULHDZmV5K4xySsDRKWOruanGtjLJXFEmwaIbDLX0hIPBUQPVFVkQkDoUNfSoDgQGKPekoxeGzA4DUvnn4bxzcZrtJyipKfPNy5w+9lnXwgqsiyHNeSVpemw4bWb9psYeq//uQZBoABQt4yMVxYAIAAAkQoAAAHvYpL5m6AAgAACXDAAAAD59jblTirQe9upFsmZbpMudy7Lz1X1DYsxOOSWpfPqNX2WqktK0DMvuGwlbNj44TleLPQ+Gsfb+GOWOKJoIrWb3cIMeeON6lz2umTqMXV8Mj30yWPpjoSa9ujK8SyeJP5y5mOW1D6hvLepeveEAEDo0mgCRClOEgANv3B9a6fikgUSu/DmAMATrGx7nng5p5iimPNZsfQLYB2sDLIkzRKZOHGAaUyDcpFBSLG9MCQALgAIgQs2YunOszLSAyQYPVC2YdGGeHD2dTdJk1pAHGAWDjnkcLKFymS3RQZTInzySoBwMG0QueC3gMsCEYxUqlrcxK6k1LQQcsmyYeQPdC2YfuGPASCBkcVMQQqpVJshui1tkXQJQV0OXGAZMXSOEEBRirXbVRQW7ugq7IM7rPWSZyDlM3IuNEkxzCOJ0ny2ThNkyRai1b6ev//3dzNGzNb//4uAvHT5sURcZCFcuKLhOFs8mLAAEAt4UWAAIABAAAAAB4qbHo0tIjVkUU//uQZAwABfSFz3ZqQAAAAAngwAAAE1HjMp2qAAAAACZDgAAAD5UkTE1UgZEUExqYynN1qZvqIOREEFmBcJQkwdxiFtw0qEOkGYfRDifBui9MQg4QAHAqWtAWHoCxu1Yf4VfWLPIM2mHDFsbQEVGwyqQoQcwnfHeIkNt9YnkiaS1oizycqJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=").play()
        }, this.beginPriv = function() {
            console.log("beginPriv method not defined contact - IDR SOLUTIONS")
        }, this.browseForDoc = function() {
            console.log("browseForDoc method not defined contact - IDR SOLUTIONS")
        }, this.clearInterval = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.clearTimeOut = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.endPriv = function() {
            console.log("endPriv method not defined contact - IDR SOLUTIONS")
        }, this.execDialog = function() {
            console.log("execDialog method not defined contact - IDR SOLUTIONS")
        }, this.execMenuItem = function(e) {
            var t = document.getElementsByClassName("pageArea").length,
                o = e.toUpperCase();
            if ("SAVEAS" === o)
                if (this.isAcroForm) {
                    var n = document.getElementById("FDFXFA_PDFName").textContent;
                    EcmaParser.saveFormToPDF(n)
                } else createXFAPDF();
            else "PRINT" === o ? this.activeDocs[0].print() : "FIRSTPAGE" === o ? this.activeDocs[0].pageNum = 0 : "PREVPAGE" === o ? this.activeDocs[0].pageNum-- : "NEXTPAGE" === o ? this.activeDocs[0].pageNum++ : "LASTPAGE" === o && (this.activeDocs[0].pageNum = t - 1)
        }, this.getNthPluginName = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.getPath = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.goBack = function() {
            this.activeDocs[0].pageNum--
        }, this.goForward = function() {
            this.activeDocs[0].pageNum++
        }, this.hideMenuItem = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.hideToolbarButton = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.launchURL = function(e, t) {
            app.activeDocs[0].getURL(e)
        }, this.listMenuItems = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.listToolbarButtons = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.mailGetAddrs = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.mailMsg = function(e, t, o, n, i, a) {
            var r = "mailto:";
            r += t.split(";").join(",");
            var s = !1;
            o && (s = !0, r += "?cc=", r += o.split(";").join(",")), n && (s ? r += "&" : (s = !0, r += "?"), r += n.split(";").join(",")), i && (s ? r += "&" : (s = !0, r += "?"), r += i.split(" ").join("%20")), a && (s ? r += "&" : (s = !0, r += "?"), r += a.split(" ").join("%20")), window.location.href = r
        }, this.mailGetAddrs = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.newDoc = function() {
            return new Doc
        }, this.newFDF = function() {
            return new FDF
        }, this.openDoc = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.openFDF = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.popUpMenu = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.popUpMenuEx = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.removeToolButton = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.response = function(e, t, o, n) {
            var i;
            return i = t ? window.prompt(e, t) : window.prompt(e)
        }, this.setInterval = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.setTimeOut = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.trustedFunction = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.trustPropagatorFunction = function() {
            console.log("method not defined contact - IDR SOLUTIONS")
        }
    }

    function Doc() {
        this.pages = [], this.alternatePresentations = {}, this.author = "", this.baseURL = "", this.bookmarkRoot = {}, this.calculate = !1, this.creationDate = new Date, this.creator = "", this.dataObjects = [], this.delay = !1, this.dirty = !1, this.disclosed = !1, this.docID = [], this.documentFileName = "", this.dynamicXFAForm = !1, this.external = !0, this.fileSize = 0, this.hidden = !1, this.hostContainer = {}, this.icons = [], this.info = {}, this.innerAppWindowRect = [], this.innerDocWindowRect = [], this.isModal = !1, this.keywords = {}, this.layout = "", this.media = {}, this.metadata = "", this.modDate = new Date, this.mouseX = 0, this.mouseY = 0, this.noautoComplete = !1, this.nocache = !1, this.numPages = 0, this.numTemplates = 0, this.path = "", this.outerAppWindowRect = [], this.outerDocWindowRect = [], this.pageNum = 0, this.pageWindowRect = [], this.permStatusReady = !1, this.producer = "PDFWriter", this.requiresFullSave = !1, this.securityHandler = "", this.selectedAnnots = [], this.sounds = [], this.spellDictionaryOrder = [], this.spellLanguageOrder = [], this.subject = "", this.templates = [], this.title = "", this.URL = "", this.viewState = {}, this.xfa = {}, this.XFAForeground = !1, this.zoom = 100, this.zoomType = "novary", this.exec = function(scr, htmlEvent) {
            try {
                console.log(htmlEvent), event = new Event(htmlEvent, null), eval(scr), event = void 0
            } catch (e) {
                console.log(e)
            }
        }
    }

    function Events() {
        this.add = function() {
            console.log("add method not defined contact - IDR SOLUTIONS")
        }, this.dispatch = function() {
            console.log("dispatch method not defined contact - IDR SOLUTIONS")
        }, this.remove = function() {
            console.log("remove method not defined contact - IDR SOLUTIONS")
        }
    }

    function EventListener() {
        this.afterBlur = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterClose = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterDestroy = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterDone = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterError = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterEscape = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterEveryEvent = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterFocus = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterPause = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterPlay = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterReady = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterScript = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterSeek = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterStatus = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.afterStop = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onBlur = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onClose = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onDestroy = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onDone = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onError = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onEscape = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onEveryEvent = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onFocus = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onGetRect = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onPause = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onPlay = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onReady = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onScript = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onSeek = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onStatus = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }, this.onStrop = function(e) {
            console.log("method not defined contact - IDR SOLUTIONS")
        }
    }

    function hexToRgbCss(e) {
        var t = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
        e = e.replace(t, (function(e, t, o, n) {
            return t + t + o + o + n + n
        }));
        var o = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e),
            n, i, a;
        return "rgb(" + parseInt(o[1], 16) + "," + parseInt(o[2], 16) + "," + parseInt(o[3], 16) + ")"
    }

    function rgbToHexCss(e, t, o) {
        return "#" + ((1 << 24) + (e << 16) + (t << 8) + o).toString(16).slice(1)
    }

    function rgbCssToArr(e) {
        return e.replace(/[^\d,]/g, "").split(",")
    }
    console.println = function(e) {
        console.log(e)
    }, Object.defineProperty(Doc.prototype, "addAnnot", {
        value: function(e) {
            return console.log("addAnnot method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "addField", {
        value: function(e, t, o, n) {
            var i = document.getElementsByClassName("pageArea"),
                a;
            switch (t) {
                case "text":
                    (a = document.createElement("input")).setAttribute("type", "text");
                    break;
                case "button":
                    a = document.createElement("button");
                    break;
                case "combobox":
                    a = document.createElement("select");
                    break;
                case "listbox":
                    a = document.createElement("select");
                    break;
                case "checkbox":
                    (a = document.createElement("input")).setAttribute("type", "checkbox");
                    break;
                case "radiobutton":
                    (a = document.createElement("input")).setAttribute("type", "radio");
                    break;
                default:
                    a = document.createElement("div")
            }
            return a.setAttribute("data-field-name", e), a.style.position = "absolute", a.style.left = n[0], a.style.top = n[1], i[o].appendChild(a), new Field(a)
        }
    }), Object.defineProperty(Doc.prototype, "addIcon", {
        value: function(e, t) {
            return this.icons.push(t), null
        }
    }), Object.defineProperty(Doc.prototype, "addLink", {
        value: function(e, t) {
            var o = document.getElementsByClassName("pageArea"),
                n = document.createElement("a");
            return n.style.position = "absolute", n.style.left = t[0], n.style.top = t[1], o[e].appendChild(n), new Link(n)
        }
    }), Object.defineProperty(Doc.prototype, "addRecipientListCryptFilter", {
        value: function(e, t) {
            return console.log("addRecipientListCryptFilter method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "addRequirement", {
        value: function(e, t) {
            return console.log("addRequirement method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "addScript", {
        value: function(e, t) {
            return console.log("addScript method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "addThumbnails", {
        value: function(e, t) {
            return console.log("addThumbnails method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "addWatermarkFromFile", {
        value: function(e) {
            return console.log("addWatermarkFromFile method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "addWatermarkFromText", {
        value: function(e) {
            return console.log("addWatermarkFromText method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "addWeblinks", {
        value: function(e, t) {
            return console.log("addWeblinks method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "bringToFront", {
        value: function() {
            return console.log("bringToFront method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "calculateNow", {
        value: function() {
            for (const [fieldId, script] of Object.entries(AVAIL_CALCULATES)) {
                const target = document.getElementById(fieldId);
                if (target) {
                    event = new Event(null, target);
                    const res = eval(script);
                    null != res && (target.value = res)
                }
            }
            return event = void 0, 1
        }
    }), Object.defineProperty(Doc.prototype, "closeDoc", {
        value: function(e) {
            window.close()
        }
    }), Object.defineProperty(Doc.prototype, "colorConvertPage", {
        value: function(e, t, o) {
            return console.log("colorConvertPage method not defined contact - IDR SOLUTIONS"), !0
        }
    }), Object.defineProperty(Doc.prototype, "createDataObject", {
        value: function(e, t, o, n) {
            console.log("createDataObject method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "createTemplate", {
        value: function(e, t) {
            console.log("createTemplate method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "deletePages", {
        value: function(e, t) {
            console.log("deletePages method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "embedDocAsDataObject", {
        value: function(e, t, o, n) {
            console.log("embedDocAsDataObject method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "embedOutputIntent", {
        value: function(e) {
            console.log("embedOutputIntent method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "encryptForRecipients", {
        value: function(e, t, o) {
            return console.log("encryptForRecipients method not defined contact - IDR SOLUTIONS"), !1
        }
    }), Object.defineProperty(Doc.prototype, "encryptUsingPolicy", {
        value: function(e, t, o, n) {
            return console.log("encryptUsingPolicy method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "exportAsFDF", {
        value: function() {
            console.log("exportAsFDF method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "exportAsText", {
        value: function() {
            console.log("exportAsFDF method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "exportAsXFDF", {
        value: function() {
            console.log("exportAsXFDF method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "exportAsXFDFStr", {
        value: function() {
            console.log("exportAsXFDF method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "exportDataObject", {
        value: function() {
            console.log("exportDataObject method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "exportXFAData", {
        value: function() {
            console.log("exportXFAData method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "extractPages", {
        value: function(e, t, o) {
            console.log("extractPages method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "flattenPages", {
        value: function(e, t, o) {
            console.log("flattenPages method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "getAnnot", {
        value: function(e, t) {
            return console.log("getAnnot method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "getAnnot3D", {
        value: function(e, t) {
            return console.log("getAnnot3D method not defined contact - IDR SOLUTIONS"), null
        }
    }), Object.defineProperty(Doc.prototype, "getAnnots", {
        value: function(e, t, o) {
            return console.log("getAnnots method not defined contact - IDR SOLUTIONS"), []
        }
    }), Object.defineProperty(Doc.prototype, "getAnnots3D", {
        value: function(e, t, o) {
            return console.log("getAnnots3D method not defined contact - IDR SOLUTIONS"), []
        }
    }), Object.defineProperty(Doc.prototype, "getColorConvertAction", {
        value: function() {
            return console.log("getColorConvertAction method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getDataObject", {
        value: function(e) {
            return console.log("getDataObject method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getDataObjectContents", {
        value: function(e, t) {
            return console.log("getDataObjectContents method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getField", {
        value: function(e) {
            var t = document.querySelectorAll('[data-field-name="' + e + '"]'),
                o = t[0];
            if (t.length > 1 && "radio" == o.getAttribute("type"))
                for (var n = 0, i = t.length; n < i; n++)
                    if (t[n].checked) return new Field(t[n]);
            return new Field(o)
        }
    }), Object.defineProperty(Doc.prototype, "getIcon", {
        value: function(e) {
            for (var t = 0, o = this.icons.length; t < o; t++)
                if (this.icons[t].name === e) return this.icons[t];
            return new Icon
        }
    }), Object.defineProperty(Doc.prototype, "getLegalWarnings", {
        value: function(e) {
            return console.log("getLegalWarnings method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getLinks", {
        value: function(e, t) {
            return console.log("getLinks method not defined contact - IDR SOLUTIONS"), []
        }
    }), Object.defineProperty(Doc.prototype, "getNthFieldName", {
        value: function(e) {
            var t, o = document.querySelectorAll("[data-field-name]")[e];
            return o ? o.getAttribute("data-field-name") : ""
        }
    }), Object.defineProperty(Doc.prototype, "getNthTemplate", {
        value: function(e) {
            return console.log("getNthTemplate method not defined contact - IDR SOLUTIONS"), ""
        }
    }), Object.defineProperty(Doc.prototype, "getOCGs", {
        value: function(e) {
            return console.log("getOCGs method not defined contact - IDR SOLUTIONS"), []
        }
    }), Object.defineProperty(Doc.prototype, "getOCGOrder", {
        value: function() {
            return console.log("getOCGOrder method not defined contact - IDR SOLUTIONS"), []
        }
    }), Object.defineProperty(Doc.prototype, "getPageBox", {
        value: function(e, t) {
            return console.log("getPageBox method not defined contact - IDR SOLUTIONS"), []
        }
    }), Object.defineProperty(Doc.prototype, "getPageLabel", {
        value: function(e) {
            return console.log("getPageLabel method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getPageNthWord", {
        value: function(e, t, o) {
            return console.log("getPageNthWord method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getPageNthWordQuads", {
        value: function(e, t) {
            return console.log("getPageNthWordQuards method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getPageNumWords", {
        value: function(e) {
            return console.log("getPageNumWords method not defined contact - IDR SOLUTIONS"), 0
        }
    }), Object.defineProperty(Doc.prototype, "getPageRotation", {
        value: function(e) {
            return console.log("getPageRotation method not defined contact - IDR SOLUTIONS"), 0
        }
    }), Object.defineProperty(Doc.prototype, "getPageTransition", {
        value: function(e) {
            return console.log("getPageTransition method not defined contact - IDR SOLUTIONS"), []
        }
    }), Object.defineProperty(Doc.prototype, "getPrintParams", {
        value: function() {
            return console.log("getPrintParams method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getSound", {
        value: function(e) {
            return console.log("getSound method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getTemplate", {
        value: function(e) {
            return console.log("getTemplate method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(Doc.prototype, "getURL", {
        value: function(e, t) {
            console.log("getURL method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "gotoNamedDest", {
        value: function(e) {
            console.log("gotoNamedDest method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "importAnFDF", {
        value: function(e) {
            console.log("importAnFDF method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "importDataObject", {
        value: function(e, t) {
            console.log("importDataObject method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "importIcon", {
        value: function(e, t) {
            console.log("importIcon method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "importSound", {
        value: function(e) {
            console.log("importSound method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "importTextData", {
        value: function(e, t) {
            return console.log("importTextData method not defined contact - IDR SOLUTIONS"), 0
        }
    }), Object.defineProperty(Doc.prototype, "importXFAData", {
        value: function(e) {
            console.log("importXFAData method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "insertPages", {
        value: function(e, t, o, n) {
            console.log("insertPages method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "mailDoc", {
        value: function() {
            console.log("mailDoc method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "mailForm", {
        value: function() {
            console.log("mailForm method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "movePage", {
        value: function(e, t) {
            console.log("movePage method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "newPage", {
        value: function(e, t, o) {
            console.log("newPage method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "numFields", {
        get: function() {
            var e;
            return document.querySelectorAll("[data-field-name]").length
        }
    }), Object.defineProperty(Doc.prototype, "openDataObject", {
        value: function(e) {
            return console.log("openDataObject method not defined contact - IDR SOLUTIONS"), this
        }
    }), Object.defineProperty(Doc.prototype, "print", {
        value: function() {
            window.print()
        }
    }), Object.defineProperty(Doc.prototype, "removeDataObject", {
        value: function(e) {
            console.log("removeDataObject method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "removeField", {
        value: function(e) {
            var t;
            document.querySelector('[data-field-name="' + e + '"]').remove()
        }
    }), Object.defineProperty(Doc.prototype, "removeIcon", {
        value: function(e) {
            console.log("removeIcon method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "removeLinks", {
        value: function(e, t) {
            console.log("removeLinks method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "removeRequirement", {
        value: function(e) {
            console.log("removeRequirement method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "removeScript", {
        value: function(e) {
            console.log("removeScript method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "removeTemplate", {
        value: function(e) {
            console.log("removeTemplate method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "removeThumbnails", {
        value: function(e, t) {
            console.log("removeThumbnails method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "removeWeblinks", {
        value: function(e, t) {
            console.log("removeWeblinks method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "replacePages", {
        value: function(e, t, o, n) {
            console.log("replacePages method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "resetForm", {
        value: function(e) {
            if (e);
            else {
                for (var t = document.getElementsByTagName("form")[0], o = t.elements, n = 0; n < o.length; n++) {
                    var i;
                    if (o[n].dataset && o[n].dataset.fieldName && o[n].dataset.defaultDisplay) idrform.doc.getField(o[n].dataset.fieldName).display = Number(o[n].dataset.defaultDisplay)
                }
                t.reset()
            }
        }
    }), Object.defineProperty(Doc.prototype, "saveAs", {
        value: function(e, t, o, n, i) {
            var a;
            if (this._checkRequired()) return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"), void 0;
            console.log("saveAs method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "scroll", {
        value: function(e, t) {
            console.log("scroll method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "selectPageNthWord", {
        value: function(e, t, o) {
            console.log("selectPageNthWord method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "setAction", {
        value: function(e, t) {
            console.log("setAction method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "setDataObjectContents", {
        value: function(e, t, o) {
            console.log("setDataObjectContents method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "setOCGOrder", {
        value: function(e) {
            console.log("setOCGOrder method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "setPageAction", {
        value: function(e, t) {
            console.log("setPageAction method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "setPageBoxes", {
        value: function(e, t, o, n) {
            console.log("setPageBoxes method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "setPageLabels", {
        value: function(e, t) {
            console.log("setPageLabels method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "setPageTabOrder", {
        value: function(e, t) {
            console.log("setPageTabOrder method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "setPageTransitions", {
        value: function(e, t, o) {
            console.log("setPageTransitions method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "spawnPageFromTemplate", {
        value: function(e, t, o, n, i) {
            console.log("spawnPageFromTemplate method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Doc.prototype, "_getFieldsHTML", {
        value: function(e) {
            for (var t = new Array, o = 0, n = e.length; o < n; o++)
                for (var i = document.getElementsByTagName(e[o]), a = 0, r = i.length; a < r; a++) t.push(i[a]);
            return t
        }
    }), Object.defineProperty(Doc.prototype, "_checkRequired", {
        value: function() {
            for (var e = !1, t = this._getFieldsHTML(["input", "textarea", "select"]), o = 0, n = t.length; o < n; o++) {
                var i = t[o];
                i.hasAttribute("required") && (null !== i.value && "" !== i.value || (i.style.border = "1px solid red", e = !0))
            }
            return e
        }
    }), Object.defineProperty(Doc.prototype, "_submitFormAsXML", {
        value: function(e) {
            var t;
            if (this._checkRequired()) return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"), void 0;
            for (var o = "<fields>", n = this._getFieldsHTML(["input", "textarea", "select"]), i, a, r = 0, s = n.length; r < s; r++)
                if (i = (a = n[r]).getAttribute("data-field-name")) switch (a.type) {
                    case "radio":
                    case "checkbox":
                        a.checked && null != a.value && (o += "<" + i + ">" + a.value + "</" + i + ">");
                        break;
                    default:
                        null != a.value && (o += "<" + i + ">" + a.value + "</" + i + ">");
                        break
                }
            o += "</fields>";
            var c = document.createElement("form");
            c.setAttribute("method", "post"), document.body.appendChild(c), c.setAttribute("action", url);
            var l = document.createElement("textarea");
            l.setAttribute("name", "xmldata"), l.value = btoa(o), c.appendChild(l), c.submit()
        }
    }), Object.defineProperty(Doc.prototype, "_submitFormAsJSON", {
        value: function(e) {
            var t;
            if (this._checkRequired()) return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"), void 0;
            for (var o = '{"fields":[\n', n = this._getFieldsHTML(["input", "textarea", "select"]), i, a, r = 0, s = n.length; r < s; r++)
                if (i = (a = n[r]).getAttribute("data-field-name")) switch (a.type) {
                    case "radio":
                    case "checkbox":
                        a.checked && null != a.value && (o += '"' + i + '":"' + a.value + '",\n');
                        break;
                    default:
                        null != a.value && (o += '"' + i + '":"' + a.value + '",\n');
                        break
                }
            o += "]}";
            var c = document.createElement("form");
            c.setAttribute("method", "post"), document.body.appendChild(c), c.setAttribute("action", url);
            var l = document.createElement("textarea");
            l.setAttribute("name", "jsondata"), l.value = btoa(o), c.appendChild(l), c.submit()
        }
    }), Object.defineProperty(Doc.prototype, "_submitFormAsPDF", {
        value: function(e) {
            var t;
            if (this._checkRequired()) return window.alert("At least one required field was empty on export. Please fill in required fields (highlighted) before continuing"), void 0;
            var o = document.getElementById("FDFXFA_Processing");
            o && (o.style.display = "block");
            var n = EcmaParser._insertFieldsToPDF(""),
                i = EcmaFilter.encodeBase64(n),
                a = document.createElement("form");
            a.setAttribute("method", "post"), e || (e = window.prompt("Please Enter URL to Submit Form; \n[ Please use 'pdfdata' as named parameter for accessing filled pdf as base64 ] \n[ Please refer to FormVu documentation for defining submit URL ]")), a.setAttribute("action", e), document.body.appendChild(a);
            var r = document.createElement("textarea");
            r.setAttribute("name", "pdfdata"), r.value = i, a.appendChild(r), a.submit(), o && (o.style.display = "none")
        }
    }), Object.defineProperty(Doc.prototype, "submitForm", {
        value: function(e, t, o, n, i, a, r) {
            if (app.isAcroForm) this._submitFormAsPDF(e);
            else {
                var s = new PdfDocument,
                    c = new PdfPage;
                s.addPage(c);
                var l = new PdfText(70, 70, "Helvetica", 20, "Please wait...");
                c.addText(l), l = new PdfText(70, 110, "Helvetica", 11, "If this message is not eventually replaced by proper contents of the document, your PDF"), c.addText(l), l = new PdfText(70, 124, "Helvetica", 11, "viewer may not be able to display this type of document."), c.addText(l), l = new PdfText(70, 150, "Helvetica", 11, "You can upgrade to the latest version of Adobe Reader for Windows, Mac, or Linux by"), c.addText(l), l = new PdfText(70, 164, "Helvetica", 11, "visiting http://www.adobe.com/go/reader_download."), c.addText(l), l = new PdfText(70, 190, "Helvetica", 11, "For more assistance with Adobe Reader visit http://www.adobe.com/go/acrreader."), c.addText(l), l = new PdfText(70, 220, "Helvetica", 7.5, "Windows is either a registered trademark or a trademark of Microsoft Corporation in the United States and/or other countries. Mac is a trademark "), c.addText(l), l = new PdfText(70, 229, "Helvetica", 7.5, "of Apple Inc., registered in the United States and other countries. Linux is the registered trademark of Linus Torvalds in the U.S. and other "), c.addText(l), l = new PdfText(70, 238, "Helvetica", 7.5, "countries."), c.addText(l);
                var d = generateXDP(),
                    u = s.createPdfString(d),
                    h = EcmaPDF.encode64(u),
                    f = document.createElement("form");
                f.setAttribute("method", "post"), e || (e = window.prompt("Please Enter URL to Submit Form; \n[ Please use 'pdfdata' as named parameter for accessing filled pdf as base64 ] \n[ Please refer to FormVu documentation for defining submit URL ]")), f.setAttribute("action", e), document.body.appendChild(f);
                var m = document.createElement("textarea");
                m.setAttribute("name", "pdfdata"), m.value = h, f.appendChild(m), f.submit()
            }
        }
    }), Object.defineProperty(Doc.prototype, "syncAnnotScan", {
        value: function() {
            console.log("syncAnnotScan method not defined contact - IDR SOLUTIONS")
        }
    });
    var color = {
        transparent: ["T"],
        black: ["G", 0],
        white: ["G", 1],
        red: ["RGB", 1, 0, 0],
        green: ["RGB", 0, 1, 0],
        blue: ["RGB", 0, 0, 1],
        cyan: ["CMYK", 1, 0, 0, 0],
        magenta: ["CMYK", 0, 1, 0, 0],
        yellow: ["CMYK", 0, 0, 1, 0],
        dkGray: ["G", .25],
        gray: ["G", .5],
        ltGray: ["G", .75],
        convert: function(e, t) {
            var o = e;
            switch (t) {
                case "G":
                    "RGB" === e[0] ? o = new Array("G", .3 * e[1] + .59 * e[2] + .11 * e[3]) : "CMYK" === e[0] && (o = new Array("G", 1 - Math.min(1, .3 * e[1] + .59 * e[2] + .11 * e[3] + e[4])));
                    break;
                case "RGB":
                    "G" === e[0] ? o = new Array("RGB", e[1], e[1], e[1]) : "CMYK" === e[0] && (o = new Array("RGB", 1 - Math.min(1, e[1] + e[4]), 1 - Math.min(1, e[2] + e[4]), 1 - Math.min(1, e[3] + e[4])));
                    break;
                case "CMYK":
                    "G" === e[0] ? o = new Array("CMYK", 0, 0, 0, 1 - e[1]) : "RGB" === e[0] && (o = new Array("CMYK", 1 - e[1], 1 - e[2], 1 - e[3], 0));
                    break
            }
            return o
        },
        equal: function(e, t) {
            if ("G" === e[0] ? e = this.convert(e, t[0]) : t = this.convert(t, e[0]), e[0] !== t[0]) return !1;
            for (var o = e[0].length, n = 1; n <= o; n++)
                if (e[n] !== t[n]) return !1;
            return !0
        },
        htmlColorToPDF: function(e) {
            e.hasOwnProperty("indexof") && -1 !== e.indexof("#") && (e = hexToRgbCss(e));
            var t = rgbCssToArr(e);
            return ["RGB", t[0] / 255, t[1] / 255, t[2] / 255]
        },
        pdfColorToHTML: function(e) {
            var t = color.convert(e, "RGB");
            return rgbToHexCss(parseInt(255 * t[1]), parseInt(255 * t[2]), parseInt(255 * t[3]))
        }
    };

    function Field(e) {
        this.input = e, this.buttonAlignX = 0, this.buttonAlignY = 0, this.buttonFitBounds = !1, this.buttonPosition = 0, this.buttonScaleHoq = 0, this.buttonScaleWhen = 0, this.calcOrderIndex = 0, this.comb = !1, this.commitOnSelChange = !0, this.currentValueIndices = [], this.defaultStyle = {}, this.defaultValue = "", this.doNotScroll = !1, this.doNotSpellCheck = !1, this.delay = !1, this.doc = doc, this.exportValues = [], this.fileSelect = !1, this.highlight = "none", this.multiline = !1, this.multipleSelection = !1, this.page = 0, this.password = !1, this.print = !0, this.radiosInUnison = !1, this.rect = [], this.richText = !1, this.richValue = [], this.rotation = 0, this.style = "", this.submitName = "", this.textFont = null, this.userName = ""
    }

    function FDF() {
        this.deleteOption = 0, this.isSigned = !1, this.numEmbeddedFiles = 0
    }

    function FullScreen() {}
    Object.defineProperty(Field.prototype, "alignment", {
        get: function() {
            return this.input.style.textAlign ? this.input.style.textAlign : "left"
        },
        set: function(e) {
            this.input.style.textAlign = e
        }
    }), Object.defineProperty(Field.prototype, "borderStyle", {
        get: function() {
            switch (this.input.style.borderStyle) {
                case "solid":
                    return border.s;
                case "dashed":
                    return border.d;
                case "beveled":
                    return border.b;
                case "inset":
                    return border.i;
                case "underline":
                    return border.u
            }
            return "none"
        },
        set: function(e) {
            this.input.style.borderStyle = e
        }
    }), Object.defineProperty(Field.prototype, "charLimit", {
        get: function() {
            return this.input.maxLength
        },
        set: function(e) {
            this.input.maxLength = e
        }
    }), Object.defineProperty(Field.prototype, "display", {
        get: function() {
            return this.input && ("none" === this.input.style.display || this.input.classList.contains("idr-hidden")) ? display.hidden : display.visible
        },
        set: function(e) {
            switch (this.input && (this.input.dataset.defaultDisplay = this.input.dataset.defaultDisplay ?? this.display), e) {
                case display.visible:
                    this.input.classList.contains("idr-hidden") && this.input.classList.remove("idr-hidden"), this.input.style.display = "initial";
                    break;
                case display.hidden:
                case display.noView:
                    this.input.style.display = "none";
                    break
            }
        }
    }), Object.defineProperty(Field.prototype, "editable", {
        get: function() {
            return this.input.disabled
        },
        set: function(e) {
            this.input.style.disabled = e
        }
    }), Object.defineProperty(Field.prototype, "fillColor", {
        get: function() {
            if (!this.input) return "";
            var e = window.getComputedStyle(this.input);
            return color.htmlColorToPDF(e.backgroundColor)
        },
        set: function(e) {
            this.input.style.backgroundColor = color.pdfColorToHTML(e)
        }
    }), Object.defineProperty(Field.prototype, "hidden", {
        get: function() {
            return this.input.hidden
        },
        set: function(e) {
            this.input.hidden = e
        }
    }), Object.defineProperty(Field.prototype, "lineWidth", {
        get: function() {
            return parseInt(this.style.borderWidth)
        },
        set: function(e) {
            this.input.style.borderWidth = e + "px"
        }
    }), Object.defineProperty(Field.prototype, "name", {
        get: function() {
            return this.input.getAttribute("data-field-name")
        },
        set: function(e) {
            this.input.setAttribute("data-field-name", e)
        }
    }), Object.defineProperty(Field.prototype, "numItems", {
        get: function() {
            return this.input.options.length
        }
    }), Object.defineProperty(Field.prototype, "readOnly", {
        get: function() {
            return this.input.readOnly
        },
        set: function(e) {
            this.input.readOnly = e
        }
    }), Object.defineProperty(Field.prototype, "required", {
        get: function() {
            return this.input.required
        },
        set: function(e) {
            this.input.required = e
        }
    }), Object.defineProperty(Field.prototype, "textSize", {
        get: function() {
            return parseInt(this.input.style.fontSize)
        },
        set: function(e) {
            this.input.style.fontSize = parseInt(e) + "px"
        }
    }), Object.defineProperty(Field.prototype, "strokeColor", {
        get: function() {
            return color.htmlColorToPDF(this.input.style.borderColor)
        },
        set: function(e) {
            this.input.style.borderColor = color.pdfColorToHTML(e)
        }
    }), Object.defineProperty(Field.prototype, "textColor", {
        get: function() {
            return color.htmlColorToPDF(this.input.style.color)
        },
        set: function(e) {
            this.input.style.color = color.pdfColorToHTML(e)
        }
    }), Object.defineProperty(Field.prototype, "type", {
        get: function() {
            var e = this.input.tagName;
            return "INPUT" === e ? this.getAttribute("type") : "SELECT" === e ? "listbox" : "BUTTON" === e ? "button" : "text"
        }
    }), Object.defineProperty(Field.prototype, "value", {
        get: function() {
            if (this.input) {
                var e = this.input.value,
                    t;
                switch (this.input.getAttribute("type")) {
                    case "checkbox":
                        if (!this.input.checked) return !1;
                        break;
                    case "radio":
                        if (null != e) return EcmaFormField.hexDecodeName(e);
                        break;
                    case "text":
                        if ("" === e) return e;
                        break
                }
                return isNaN(e) ? e : 1 * e
            }
        },
        set: function(e) {
            "radio" == this.input.getAttribute("type") ? this.input.value = EcmaFormField.hexEncodeName(e) : this.input.value = e
        }
    }), Object.defineProperty(Field.prototype, "valueAsString", {
        get: function() {
            return "" + this.input.value
        },
        set: function(e) {
            this.input.value = "" + e
        }
    }), Object.defineProperty(Field.prototype, "browseForFileToSubmit", {
        value: function() {
            console.log("browseForFileToSubmit is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "buttonGetCaption", {
        value: function() {
            return this.input.innerHTML
        }
    }), Object.defineProperty(Field.prototype, "buttonGetIcon", {
        value: function() {
            console.log("buttonGetIcon is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "buttonImportIcon", {
        value: function() {
            console.log("buttonImportIcon is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "buttonSetCaption", {
        value: function(e) {
            this.input.innerHTML = e
        }
    }), Object.defineProperty(Field.prototype, "buttonSetIcon", {
        value: function() {
            console.log("buttonSetIcon is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "checkThisBox", {
        value: function(e, t) {
            this.input.checked = !0
        }
    }), Object.defineProperty(Field.prototype, "clearItems", {
        value: function() {
            var e, t;
            for (e = this.input.options.length - 1; e >= 0; e--) this.input.remove(e)
        }
    }), Object.defineProperty(Field.prototype, "defaultsChecked", {
        value: function() {
            return this.input.checked
        }
    }), Object.defineProperty(Field.prototype, "deleteItemAt", {
        value: function(e) {
            if (-1 === e) {
                var t = this.input.options.length - 1;
                this.input.remove(t)
            } else this.input.remove(e)
        }
    }), Object.defineProperty(Field.prototype, "getArray", {
        value: function() {
            console.log("getArray is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "getItemAt", {
        value: function(e, t) {
            return this.input.options[e]
        }
    }), Object.defineProperty(Field.prototype, "getLock", {
        value: function() {
            console.log("getLock is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "insertItemAt", {
        value: function(e, t, o) {
            var n = document.createElement("option");
            n.text = e, this.input.add(n, o)
        }
    }), Object.defineProperty(Field.prototype, "isBoxChecked", {
        value: function(e) {
            return this.input.checked
        }
    }), Object.defineProperty(Field.prototype, "isDefaultChecked", {
        value: function(e) {
            console.log("isDefaultChecked is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "setAction", {
        value: function(e, t) {
            switch (e) {
                case "MouseUp":
                    this.input.addEventListener("mouseup", new Function(t));
                    break;
                case "MouseDown":
                    this.input.addEventListener("mousedown", new Function(t));
                    break;
                case "MouseEnter":
                    this.input.addEventListener("mouseenter", new Function(t));
                    break;
                case "MouseExit":
                    this.input.addEventListener("mouseexit", new Function(t));
                    break;
                case "OnFocus":
                    this.input.addEventListener("focus", new Function(t));
                    break;
                case "OnBlur":
                    this.input.addEventListener("blur", new Function(t));
                    break;
                case "Keystroke":
                    this.input.addEventListener("keydown", new Function(t));
                    break;
                case "Validate":
                    break;
                case "Calculate":
                    break;
                case "Format":
                    break
            }
        }
    }), Object.defineProperty(Field.prototype, "setFocus", {
        value: function() {
            this.input.focus()
        }
    }), Object.defineProperty(Field.prototype, "setItems", {
        value: function(e) {
            for (var t = 0; t < e.length; t++) {
                var o = document.createElement("option");
                o.text = e[t], this.input.add(o)
            }
        }
    }), Object.defineProperty(Field.prototype, "setLock", {
        value: function(e) {
            console.log("setLock is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "signatureGetModifications", {
        value: function() {
            console.log("signatureGetModifications is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "signatureGetSeedValue", {
        value: function() {
            console.log("signatureGetSeedValue is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "signatureInfo", {
        value: function() {
            console.log("signatureInfo is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "signauteSetSeedValue", {
        value: function() {
            console.log("signauteSetSeedValue is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "signatureSign", {
        value: function() {
            console.log("signatureSign is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(Field.prototype, "signatureValidate", {
        value: function() {
            console.log("signatureValidate is method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(FDF.prototype, "addContact", {
        value: function(e) {
            console.log("addContact method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(FDF.prototype, "addEmbeddedFile", {
        value: function(e, t) {
            console.log("addEmbeddedFile method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(FDF.prototype, "addRequest", {
        value: function(e, t, o) {
            console.log("addRequest method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(FDF.prototype, "close", {
        value: function() {
            console.log("close method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(FDF.prototype, "mail", {
        value: function() {
            console.log("mail method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(FDF.prototype, "save", {
        value: function() {
            console.log("save method not defined contact - IDR SOLUTIONS")
        }
    }), Object.defineProperty(FDF.prototype, "signatureClear", {
        value: function() {
            return console.log("signatureClear method not defined contact - IDR SOLUTIONS"), !1
        }
    }), Object.defineProperty(FDF.prototype, "signatureSign", {
        value: function() {
            return console.log("signatureSign method not defined contact - IDR SOLUTIONS"), !1
        }
    }), Object.defineProperty(FDF.prototype, "signatureValidate", {
        value: function(e, t) {
            return console.log("signatureSign method not defined contact - IDR SOLUTIONS"), {}
        }
    }), Object.defineProperty(FullScreen.prototype, "isFullscreen", {
        get: function() {
            return this.isinFullscreen
        },
        set: function(e) {
            var t, o;
            e ? (document.body.requestFullscreen || document.body.msRequestFullscreen || document.body.mozRequestFullScreen || document.body.webkitRequestFullscreen).call(document.body) : (document.exitFullscreen || document.msExitFullscreen || document.mozCancelFullScreen || document.webkitCancelFullScreen).call(document)
        },
        configurable: !0,
        enumerable: !0
    }), Object.defineProperty(FullScreen.prototype, "isFullscreenEnabled", {
        value: function() {
            return document.fullscreenEnabled || document.msFullscreenEnabled || document.mozFullScreenEnabled || document.webkitFullscreenEnabled
        }
    }), Object.defineProperty(FullScreen.prototype, "isinFullscreen", {
        value: function() {
            return !!(document.fullscreenElement || document.msFullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement)
        }
    }), Object.defineProperty(FullScreen.prototype, "toggleFullscreen", {
        value: function() {
            var e, t;
            this.isinFullscreen() ? (document.exitFullscreen || document.msExitFullscreen || document.mozCancelFullScreen || document.webkitCancelFullScreen).call(document) : (document.body.requestFullscreen || document.body.msRequestFullscreen || document.body.mozRequestFullScreen || document.body.webkitRequestFullscreen).call(document.body)
        }
    });
    var ADBC = {
        SQLT_BIGINT: 0,
        SQLT_BINARY: 1,
        SQLT_BIT: 2,
        SQLT_CHAR: 3,
        SQLT_DATE: 4,
        SQLT_DECIMAL: 5,
        SQLT_DOUBLE: 6,
        SQLT_FLOAT: 7,
        SQLT_INTEGER: 8,
        SQLT_LONGVARBINARY: 9,
        SQLT_LONGVARCHAR: 10,
        SQLT_NUMERIC: 11,
        SQLT_REAL: 12,
        SQLT_SMALLINT: 13,
        SQLT_TIME: 14,
        SQLT_TIMESTAMP: 15,
        SQLT_TINYINT: 16,
        SQLT_VARBINARY: 17,
        SQLT_VARCHAR: 18,
        SQLT_NCHAR: 19,
        SQLT_NVARCHAR: 20,
        SQLT_NTEXT: 21,
        Numeric: 0,
        String: 1,
        Binary: 2,
        Boolean: 3,
        Time: 4,
        Date: 5,
        TimeStamp: 6,
        getDataSourceList: function() {
            return console.log("ADBC.getDataSourceList() method not defined contact - IDR SOLUTIONS"), new Array
        },
        newConnnection: function() {
            var e = {};
            if (arguments[0] instanceof Object) e = arguments[0];
            else switch (e.cDSN = arguments[0], arguments.length) {
                case 2:
                    e.cUID = arguments[1];
                    break;
                case 3:
                    e.cUID = arguments[1], e.cPWD = arguments[2];
                    break
            }
            return console.log("ADBC.newConnection method not defined contact - IDR SOLUTIONS"), null
        }
    };

    function Alerter() {
        this.dispathc = function() {
            console.log("dispatch method not defined contact - IDR SOLUTIONS")
        }
    }

    function Alert() {
        this.type = "", this.doc = null, this.fromUser = !1, this.error = {
            message: ""
        }, this.errorText = "", this.fileName = "", this.selection = null
    }

    function AlternatePresentation() {
        this.active = !1, this.type = "", this.start = function() {
            console.log("start method not defined contact - IDR SOLUTIONS")
        }, this.stop = function() {
            console.log("stop method not defined contact - IDR SOLUTIONS")
        }
    }

    function Annotation() {
        this.type = "Text", this.rect = [], this.page = 0, this.alignment = 0, this.AP = "Approved", this.arrowBegin = "None", this.arrowEnd = "None", this.attachIcon = "PushPin", this.author = "", this.borderEffectIntensity = "", this.callout = [], this.caretSymbol = "", this.contents = "", this.creationDate = new Date, this.dash = [], this.delay = !1, this.doc = null, this.doCaption = !1, this.fillColor = [], this.gestures = [], this.hidden = !1, this.inReplyTo = "", this.intent = "", this.leaderExtend = 0, this.leaderLength = 0, this.lineEnding = "none", this.lock = !1, this.modDate = new Date, this.name = "", this.noteIcon = "Note", this.noView = !1, this.opacity = 1, this.open = !1, this.point = [], this.points = [], this.popupOpen = !0, this.popupRect = [], this.print = !1, this.quads = [], this.readOnly = !1, this.refType = "", this.richContents = [], this.richDefaults = null, this.rotate = 0, this.seqNum = 0, this.soundIcon = "", this.state = "", this.stateModel = "", this.strokeColor = [], this.style = "", this.subject = "", this.textFont = "", this.textSize = 10, this.toggleNoView = !1, this.vertices = null, this.width = 1, this.URI = "", this.GoTo = ""
    }

    function Bookmark() {
        this.children = null, this.color = ["RGB", 1, 0, 0], this.name = "", this.open = !0, this.parent = null, this.style = 0, this.createChild = function(e, t, o) {
            console.log("createChild method not defined contact - IDR SOLUTIONS")
        }, this.execute = function() {
            console.log("execute method not defined contact - IDR SOLUTIONS")
        }, this.insertChild = function(e, t) {
            console.log("insertChild method not defined contact - IDR SOLUTIONS")
        }, this.remove = function() {
            console.log("remove method not defined contact - IDR SOLUTIONS")
        }, this.setAction = function(e) {
            console.log("setAction method not defined contact - IDR SOLUTIONS")
        }
    }

    function Catalog() {
        this.isIdle = !1, this.jobs = new Array, this.getIndex = function(e) {
            console.log("getIndex method not defined contact - IDR SOLUTIONS")
        }, this.remove = function(e) {
            console.log("remove method not defined contact - IDR SOLUTIONS")
        }
    }

    function CatalogJob() {
        this.path = "", this.type = "", this.status = ""
    }

    function Certificate() {
        this.binary = "", this.issuerDN = {}, this.keyUsage = new Array, this.MD5Hash = "", this.privateKeyValidityEnd = {}, this.privateKeyValidityStart = {}, this.SHA1Hash = "", this.serialNumber = "", this.subjectCN = "", this.subjectDN = "", this.ubRights = {}, this.usage = {}, this.validityEnd = {}, this.validityStart = {}
    }

    function Rights() {
        this.mode = "", this.rights = new Array
    }

    function Usage() {
        this.endUserSigning = !1, this.endUserEncryption = !1
    }
    Object.defineProperty(Annotation.prototype, "getDictionaryString", {
        value: function() {
            for (var e = "<</Type /Annot /Subtype /" + this.type + " /Rect [ ", t = 0, o = this.rect.length; t < o; t++) e += this.rect[t] + " ";
            if (e += "]", this.type === AnnotationType.Highlight) {
                e += "/QuadPoints [ ";
                for (var t = 0, o = this.quads.length; t < o; t++) e += this.quads[t] + " ";
                e += "]"
            } else if (this.type === AnnotationType.Text) this.contents.length > 0 && (e += "/Contents (" + this.contents + ")"), this.open && (e += "/Open true");
            else if (this.type === AnnotationType.Link) {
                if (this.URI.length > 0 ? e += "/A <</Type /Action /S /URI /URI (" + this.URI + ")>>" : this.GoTo.length > 0 && (e += "/Dest [" + this.GoTo + " /Fit]>>"), this.quads.length > 0) {
                    e += "/QuadPoints [ ";
                    for (var t = 0, o = this.quads.length; t < o; t++) e += this.quads[t] + " ";
                    e += "]"
                }
            } else if (this.type === AnnotationType.Line) e += "/L [" + this.points[0] + " " + this.points[1] + " " + this.points[2] + " " + this.points[3] + "]";
            else if (this.type === AnnotationType.Polygon || this.type === AnnotationType.PolyLine) {
                e += "/Vertices [";
                for (var t = 0, o = this.vertices.length; t < o; t++) e += this.vertices[t] + " ";
                e += "]"
            } else if (this.type === AnnotationType.Ink) {
                e += "/InkList [";
                for (var n = this.gestures, t = 0, o = n.length; t < o; t++) {
                    var i = n[t];
                    e += " [";
                    for (var a = 0, r = i.length; a < r; a++) e += i[a] + " ";
                    e += "] "
                }
                e += "]"
            } else if (this.type === AnnotationType.FreeText) {
                for (var s = "", t = 0, o = this.richContents.length; t < o; t++) {
                    var c = this.richContents[t];
                    s += "<span style='font-size:" + c.textSize + ";color:" + c.textColor + "'>" + c.text + "</span>"
                }
                e += "/DA (/Arial " + this.textSize + " Tf)/RC (<body><p>" + s + "</p></body>)"
            }
            if (this.type === AnnotationType.Line || this.type === AnnotationType.Highlight || this.type === AnnotationType.FreeText || this.type === AnnotationType.Link || this.type === AnnotationType.Square || this.type === AnnotationType.Circle || this.type === AnnotationType.Polygon || this.type === AnnotationType.PolyLine || this.type === AnnotationType.Ink) {
                if (this.opacity < 1 && (e += "/CA " + this.opacity), 1 !== this.width && (e += "/BS <</Type /Border /W " + this.width + ">>"), this.fillColor.length > 0) {
                    e += "/IC [";
                    for (var t = 0, o = this.fillColor.length; t < o; t++) e += this.fillColor[t] + " ";
                    e += "]"
                }
                if (this.strokeColor.length > 0) {
                    e += "/C [";
                    for (var t = 0, o = this.strokeColor.length; t < o; t++) e += this.strokeColor[t] + " ";
                    e += "]"
                }
            }
            return e += ">>"
        }
    }), Object.defineProperty(Annotation.prototype, "destroy", {
        value: function() {
            return console.log("destroy method not defined contact - IDR SOLUTIONS"), !0
        }
    }), Object.defineProperty(Annotation.prototype, "getProps", {
        value: function() {
            return console.log("getProps method not defined contact - IDR SOLUTIONS"), !0
        }
    }), Object.defineProperty(Annotation.prototype, "getStateInModel", {
        value: function() {
            return console.log("getStateInModel method not defined contact - IDR SOLUTIONS"), !0
        }
    }), Object.defineProperty(Annotation.prototype, "setProps", {
        value: function(e) {
            for (var t in e) t in this && (this[t] = e[t]);
            return !0
        }
    }), Object.defineProperty(Annotation.prototype, "transitionToState", {
        value: function(e) {
            console.log("transitionToState method not defined contact - IDR SOLUTIONS")
        }
    });
    var Collab = {
        addStateModel: function(e, t, o, n, i, a) {
            console.log("addStateModel not implemented")
        },
        documentToStream: function(e) {
            console.log("documentToStream not implemented")
        },
        removeStateModel: function(e) {
            console.log("removeStateModel not implemented")
        }
    };

    function States() {
        this.cUIName = "", this.oIcon = {}
    }

    function ColorConvertAction() {
        this.action = {}, this.alias = "", this.colorantName = "", this.convertIntent = 0, this.convertProfile = "", this.embed = !1, this.isProcessColor = !1, this.matchAttributesAll = {}, this.matchAttributesAny = 0, this.matchIntent = {}, this.matchSpaceTypeAll = {}, this.matchSpaceTypeAny = 0, this.preserveBlack = !1, this.useBlackPointCompensation = !1
    }

    function Column() {
        this.columnNum - 0, this.name = "", this.type = 0, this.typeName = "", this.value = ""
    }

    function ColumnInfo() {
        this.name = "", this.description = "", this.type = "", this.typeName = ""
    }

    function Connection() {
        this.close = function() {
            console.log("close method not defined contact - IDR SOLUTIONS")
        }, this.getColumnList = function(e) {
            console.log("getColumnList method not defined contact - IDR SOLUTIONS")
        }, this.getTableList = function() {
            console.log("getTableList method not defined contact - IDR SOLUTIONS")
        }, this.newStatement = function() {
            console.log("newStatement method not defined contact - IDR SOLUTIONS")
        }
    }

    function Data() {
        this.creationDate = {}, this.description = "", this.MIMEType = "", this.modDate = {}, this.name = "", this.path = "", this.size = 0
    }

    function DataSourceInfo() {
        this.name = "", this.description = ""
    }

    function dbg() {
        this.bps = new Array, this.c = new function() {
            console.log("c method not defined contact - IDR SOLUTIONS")
        }, this.cb = function(e, t) {
            console.log("cb method not defined contact - IDR SOLUTIONS")
        }, this.q = function() {
            console.log("q method not defined contact - IDR SOLUTIONS")
        }, this.sb = function(e, t, o) {
            console.log("sb method not defined contact - IDR SOLUTIONS")
        }, this.si = function() {
            console.log("si method not defined contact - IDR SOLUTIONS")
        }, this.sn = function() {
            console.log("sn method not defined contact - IDR SOLUTIONS")
        }, this.so = function() {
            console.log("so method not defined contact - IDR SOLUTIONS")
        }, this.sv = function() {
            console.log("sv method not defined contact - IDR SOLUTIONS")
        }
    }

    function Dialog() {
        this.enable = function(e) {
            console.log("enable method not defined contact - IDR SOLUTIONS")
        }, this.end = function(e) {
            console.log("end method not defined contact - IDR SOLUTIONS")
        }, this.load = function(e) {
            console.log("load method not defined contact - IDR SOLUTIONS")
        }, this.store = function(e) {
            console.log("store method not defined contact - IDR SOLUTIONS")
        }
    }

    function DirConnection() {
        this.canList = !1, this.canDoCustomSearch = !1, this.canDoCustomUISearch = !1, this.canDoStandardSearch = !1, this.groups = new Array, this.name = "", this.uiName = ""
    }

    function Directory() {
        this.info = {}, this.connect = function(e, t) {
            return console.log("connect method not defined contact - IDR SOLUTIONS"), null
        }
    }

    function DirectoryInformation() {
        this.dirStdEntryID = "", this.dirStdEntryName = "", this.dirStdEntryPrefDirHandlerID = "", this.dirStdEntryDirType = "", this.dirStdEntryDirVersion = "", this.server = "", this.port = 0, this.searchBase = "", this.maxNumEntries = 0, this.timeout = 0
    }

    function Icon() {
        this.name = ""
    }

    function IconStream() {
        this.width = 0, this.height = 0
    }

    function Identity() {
        this.corporation = "", this.email = "", this.loginName = "", this.name = ""
    }

    function Index() {
        this.available = !1, this.name = "", this.path = "", this.selected = !1, this.build = function() {
            console.log("build is method not defined contact - IDR SOLUTIONS")
        }, this.parameters = function() {
            console.log("parameters is method not defined contact - IDR SOLUTIONS")
        }
    }

    function Link(e) {
        this.ele = e, this.borderColor = [], this.borderWidth = 0, this.highlightMode = "invert", this.rect = [], this.setAction = function() {
            console.log("setAction is method not defined contact - IDR SOLUTIONS")
        }
    }

    function Marker() {
        this.frame = 0, this.index = 0, this.name = "", this.time = 0
    }

    function Markers() {
        this.player = {}, this.get = function(e) {
            console.log("get is method not defined contact - IDR SOLUTIONS")
        }
    }

    function Media() {
        this.align = {
            topLeft: 0,
            topCenter: 1,
            topRight: 2,
            centerLeft: 3,
            center: 4,
            centerRight: 5,
            bottomLeft: 6,
            bottomCenter: 7,
            bottomRight: 8
        }, this.canResize = {
            no: 0,
            keepRatio: 1,
            yes: 2
        }, this.closeReason = {
            general: 0,
            error: 1,
            done: 2,
            stop: 3,
            play: 4,
            uiGeneral: 5,
            uiScreen: 6,
            uiEdit: 7,
            docClose: 8,
            docSave: 9,
            docChange: 10
        }, this.defaultVisible = !0, this.ifOffScreen = {
            allow: 0,
            forseOnScreen: 1,
            cancel: 2
        }, this.layout = {
            meet: 0,
            slice: 1,
            fill: 2,
            scroll: 3,
            hidden: 4,
            standard: 5
        }, this.monitorType = {
            document: 0,
            nonDocument: 1,
            primary: 3,
            bestColor: 4,
            largest: 5,
            tallest: 6,
            widest: 7
        }, this.openCode = {
            success: 0,
            failGeneral: 1,
            failSecurityWindow: 2,
            failPlayerMixed: 3,
            failPlayerSecurityPrompt: 4,
            failPlayerNotFound: 5,
            failPlayerMimeType: 6,
            failPlayerSecurity: 7,
            failPlayerData: 8
        }, this.over = {
            pageWindow: 0,
            appWindow: 1,
            desktop: 2,
            monitor: 3
        }, this.pageEventNames = {
            Open: 0,
            Close: 1,
            InView: 2,
            OutView: 3
        }, this.raiseCode = {
            fileNotFound: 0,
            fileOpenFailed: 1
        }, this.raiseSystem = {
            fileError: 0
        }, this.renditionType = {
            unknown: 0,
            media: 1,
            selector: 2
        }, this.status = {
            clear: 0,
            message: 1,
            contacting: 2,
            buffering: 3,
            init: 4,
            seeking: 5
        }, this.trace = !1, this.version = 7, this.windowType = {
            docked: 0,
            floating: 1,
            fullScreen: 2
        }, this.addStockEvents = function(e, t) {
            console.log("addStockEvents method not defined contact - IDR SOLUTIONS")
        }, this.alertFileNotFound = function(e, t, o) {
            console.log("alertFileNotFound method not defined contact - IDR SOLUTIONS")
        }, this.alertSelectFailed = function(e, t, o, n) {
            console.log("alertFileNotFound method not defined contact - IDR SOLUTIONS")
        }, this.argsDWIM = function(e) {
            console.log("argsDWIM method not defined contact - IDR SOLUTIONS")
        }, this.canPlayOrAlert = function(e) {
            console.log("canPlayOrAlert method not defined contact - IDR SOLUTIONS")
        }, this.computeFloatWinRect = function(e, t, o, n) {
            console.log("computeFloatWinRect method not defined contact - IDR SOLUTIONS")
        }, this.constrainRectToScreen = function(e, t) {
            console.log("constrainRectToScreen method not defined contact - IDR SOLUTIONS")
        }, this.createPlayer = function(e) {
            console.log("createPlayer method not defined contact - IDR SOLUTIONS")
        }, this.getAltTextData = function(e) {
            console.log("getAltTextData method not defined contact - IDR SOLUTIONS")
        }, this.getAltTextSettings = function() {
            console.log("getAltTextSettings method not defined contact - IDR SOLUTIONS")
        }, this.getAnnotStockEvents = function() {
            console.log("getAnnotStockEvents method not defined contact - IDR SOLUTIONS")
        }, this.getAnnotTraceEvents = function() {
            console.log("getAnnotTraceEvents method not defined contact - IDR SOLUTIONS")
        }, this.getPlayers = function() {
            console.log("getPlayers method not defined contact - IDR SOLUTIONS")
        }, this.getPlayerStockEvents = function() {
            console.log("getPlayerStockEvents method not defined contact - IDR SOLUTIONS")
        }, this.getPlayerTraceEvents = function() {
            console.log("getPlayerTraceEvents method not defined contact - IDR SOLUTIONS")
        }, this.getRenditionSettings = function() {
            console.log("getRenditionSettings method not defined contact - IDR SOLUTIONS")
        }, this.getURLData = function() {
            console.log("getURLData method not defined contact - IDR SOLUTIONS")
        }, this.getURLSettings = function() {
            console.log("getURLSettings method not defined contact - IDR SOLUTIONS")
        }, this.getWindowBorderSize = function() {
            console.log("getWindowBorderSize method not defined contact - IDR SOLUTIONS")
        }, this.openPlayer = function() {
            console.log("openPlayer method not defined contact - IDR SOLUTIONS")
        }, this.removeStockEvents = function() {
            console.log("removeStockEvents method not defined contact - IDR SOLUTIONS")
        }, this.startPlayer = function() {
            console.log("startPlayer method not defined contact - IDR SOLUTIONS")
        }
    }

    function MediaOffset() {
        this.frame = 0, this.marker = "", this.time = 0
    }

    function MediaPlayer() {
        this.annot = {}, this.defaultSize = {
            width: 0,
            height: 0
        }, this.doc = {}, this.events = {}, this.hasFocus = !1, this.id = 0, this.innerRect = [], this.isOpen = !1, this.isPlaying = !1, this.outerRect = [], this.page = 0, this.settings = {}, this.uiSize = [], this.visible = !1, this.close = function() {
            console.log("close is not implemented")
        }, this.open = function() {
            console.log("open is not implemented")
        }, this.pause = function() {
            console.log("pause is not implemented")
        }, this.play = function() {
            console.log("play is not implemented")
        }, this.seek = function() {
            console.log("seek is not implemented")
        }, this.setFocus = function() {
            console.log("setFocus is not implemented")
        }, this.stop = function() {
            console.log("stop is not implemented")
        }, this.triggerGetRect = function() {
            console.log("triggerGetRect is not implemented")
        }
    }

    function MediaReject() {
        this.rendition = {}
    }

    function MediaSelection() {
        this.selectContext = {}, this.players = [], this.rejects = [], this.rendtion = {}
    }

    function MediaSettings() {
        this.autoPlay = !1, this.baseURL = "", this.bgColor = [], this.bgOpacity = 1, this.data = {}, this.duration = 0, this.endAt = 0, this.floating = {}, this.layout = 0, this.monitor = {}, this.monitorType = 0, this.page = 0, this.palindrome = !1, this.players = {}, this.rate = 0, this.repeat = 0, this.showUI = !1, this.startAt = {}, this.visible = !1, this.volume = 0, this.windowType = 0
    }

    function Monitor() {
        this.colorDepth = 0, this.isPrimary = !1, this.rect = [], this.workRect = []
    }

    function Monitors() {
        this.bestColor = function() {
            console.log("bestColor is not implemented")
        }, this.bestFit = function() {
            console.log("bestFit is not implemented")
        }, this.desktop = function() {
            console.log("desktop is not implemented")
        }, this.document = function() {
            console.log("document is not implemented")
        }, this.filter = function() {
            console.log("filter is not implemented")
        }, this.largest = function() {
            console.log("largest is not implemented")
        }, this.leastOverlap = function() {
            console.log("leastOverlap is not implemented")
        }, this.mostOverlap = function() {
            console.log("mostOverlap is not implemented")
        }, this.nonDocument = function() {
            console.log("nonDocument is not implemented")
        }, this.primary = function() {
            console.log("primary is not implemented")
        }, this.secondary = function() {
            console.log("secondary is not implemented")
        }, this.select = function() {
            console.log("select is not implemented")
        }, this.tallest = function() {
            console.log("tallest is not implemented")
        }, this.widest = function() {
            console.log("widest is not implemented")
        }
    }

    function Net() {
        this.SOAP = {}, this.Discovery = {}, this.HTTP = {}, this.streamDecode = function() {
            console.log("streamDecode is not implemented")
        }, this.streamDigest = function() {
            console.log("streamDigest is not implemented")
        }, this.streamEncode = function() {
            console.log("streamEncode is not implemented")
        }
    }

    function OCG() {
        this.constants = {}, this.initState = !1, this.locked = !1, this.name = "", this.state = !1, this.getIntent = function() {
            console.log("getIntent is not implemented")
        }, this.setAction = function() {
            console.log("setAction is not implemented")
        }, this.setIntent = function() {
            console.log("setIntent is not implemented")
        }
    }

    function PlayerInfo() {
        this.id = "", this.mimeTypes = [], this.name = "", this.version = "", this.canPlay = function() {
            console.log("canPlay is not implemented")
        }, this.canUseData = function() {
            console.log("canUseData is not implemented")
        }, this.honors = function() {
            console.log("honors is not implemented")
        }
    }

    function PlayerInfoList() {
        this.select = function() {
            console.log("select is not implemented")
        }
    }

    function Plugin() {
        this.certified = !1, this.loaded = !1, this.name = "", this.path = "", this.version = 0
    }

    function Booklet() {
        this.binding = 0, this.duplexMode = 0, this.subsetForm = 0, this.subsetTo = 0
    }

    function PrintParams() {
        this.binaryOK = !0, this.bitmapDPI = 0, this.booklet = new Booklet, this.colorOverride = 0, this.colorProfile = "", this.constants = {}, this.downloadFarEastFonts = !1, this.fileName = "", this.firstPage = 0, this.flags = 0, this.fontPolicy = 0, this.gradientDPI = 0, this.interactive = 0, this.lastPage = 0, this.nUpAutoRotate = !1, this.nUpNumPagesH = 0, this.nUpNumPagesV = 0, this.nUpPageBorder = !1, this.nUpPageOrder = 0, this.pageHandling = 0, this.pageSubset = 0, this.printAsImage = !1, this.printContent = 0, this.printName = "", this.psLevel = 0, this.rasterFlags = 0, this.reversePages = !1, this.tileLabel = !1, this.tileMark = 0, this.tileOverlap = 0, this.tileScale = 0, this.transparencyLevel = 0, this.usePrinterCRD = 0, this.useT1Conversion = 0
    }

    function Span() {
        this.alignement = 0, this.fontFamily = ["serif", "sans-serif", "monospace"], this.fontStretch = "normal", this.fontStyle = "normal", this.fontWeight = 400, this.strikeThrough = !1, this.subscript = !1, this.superscript = !1, this.text = "", this.textColor = color.black, this.textSize = 12, this.underline = !1
    }

    function Thermometer() {
        this.cancelled = !1, this.duration = 0, this.text = "", this.value = 0, this.begin = function() {
            console.log("begin method not defined contact - IDR SOLUTIONS")
        }, this.end = function() {
            console.log("end method not defined contact - IDR SOLUTIONS")
        }
    }
    var util = {
            crackURL: function(e) {
                return console.log("crackURL method not defined contact - IDR SOLUTIONS"), {}
            },
            iconStreamFromIcon: function() {
                return console.log("iconStreamFromIcon method not defined contact - IDR SOLUTIONS"), {}
            },
            printd: function(e, t, o) {
                var n = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"],
                    i = ["SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"];
                switch (e) {
                    case 0:
                        return this.printd("D:yyyymmddHHMMss", t);
                    case 1:
                        return this.printd("yyyy.mm.dd HH:MM:ss", t);
                    case 2:
                        return this.printd("m/d/yy h:MM:ss tt", t)
                }
                var a = {
                        year: t.getFullYear(),
                        month: t.getMonth(),
                        day: t.getDate(),
                        dayOfWeek: t.getDay(),
                        hours: t.getHours(),
                        minutes: t.getMinutes(),
                        seconds: t.getSeconds()
                    },
                    r = /(mmmm|mmm|mm|m|dddd|ddd|dd|d|yyyy|yy|HH|H|hh|h|MM|M|ss|s|tt|t|\\.)/g;
                return e.replace(r, (function(e, t) {
                    switch (t) {
                        case "mmmm":
                            return n[a.month];
                        case "mmm":
                            return n[a.month].substring(0, 3);
                        case "mm":
                            return (a.month + 1).toString().padStart(2, "0");
                        case "m":
                            return (a.month + 1).toString();
                        case "dddd":
                            return i[a.dayOfWeek];
                        case "ddd":
                            return i[a.dayOfWeek].substring(0, 3);
                        case "dd":
                            return a.day.toString().padStart(2, "0");
                        case "d":
                            return a.day.toString();
                        case "yyyy":
                            return a.year.toString();
                        case "yy":
                            return (a.year % 100).toString().padStart(2, "0");
                        case "HH":
                            return a.hours.toString().padStart(2, "0");
                        case "H":
                            return a.hours.toString();
                        case "hh":
                            return (1 + (a.hours + 11) % 12).toString().padStart(2, "0");
                        case "h":
                            return (1 + (a.hours + 11) % 12).toString();
                        case "MM":
                            return a.minutes.toString().padStart(2, "0");
                        case "M":
                            return a.minutes.toString();
                        case "ss":
                            return a.seconds.toString().padStart(2, "0");
                        case "s":
                            return a.seconds.toString();
                        case "tt":
                            return a.hours < 12 ? "am" : "pm";
                        case "t":
                            return a.hours < 12 ? "a" : "p"
                    }
                    return t.charCodeAt(1)
                }))
            },
            printf: function(e, arguments) {
                var t = e.indexOf("%");
                if (-1 === t) return e + " " + arguments;
                var o = e[t + 1],
                    n = e.indexOf("."),
                    i = e[n + 1],
                    a = arguments.toFixed(i);
                return t > 0 && (a = e.substring(0, t) + a), a
            },
            printx: function(e, t) {
                var o = [e => e, e => e.toUpperCase(), e => e.toLowerCase()],
                    n = [],
                    i = 0,
                    a = t.length,
                    r = o[0],
                    s = !1;
                for (var c of e)
                    if (s) n.push(c), s = !1;
                    else {
                        if (i >= a) break;
                        switch (c) {
                            case "?":
                                n.push(r(t.charAt(i++)));
                                break;
                            case "X":
                                for (; i < a;) {
                                    var l;
                                    if ("a" <= (l = t.charAt(i++)) && l <= "z" || "A" <= l && l <= "Z" || "0" <= l && l <= "9") {
                                        n.push(r(l));
                                        break
                                    }
                                }
                                break;
                            case "A":
                                for (; i < a;) {
                                    var l;
                                    if ("a" <= (l = t.charAt(i++)) && l <= "z" || "A" <= l && l <= "Z") {
                                        n.push(r(l));
                                        break
                                    }
                                }
                                break;
                            case "9":
                                for (; i < a;) {
                                    var l;
                                    if ("0" <= (l = t.charAt(i++)) && l <= "9") {
                                        n.push(l);
                                        break
                                    }
                                }
                                break;
                            case "*":
                                for (; i < a;) n.push(r(t.charAt(i++)));
                                break;
                            case "\\":
                                s = !0;
                                break;
                            case ">":
                                r = o[1];
                                break;
                            case "<":
                                r = o[2];
                                break;
                            case "=":
                                r = o[0];
                                break;
                            default:
                                n.push(c)
                        }
                    } return n.join("")
            },
            scand: function(e, t) {
                var o = e.split(/[ \-:\/\.]/),
                    n = t.split(/[ \-:\/\.]/);
                if (o.length != n.length) return null;
                for (var i = new Date, a = 0; a < o.length; a++) {
                    var r;
                    switch (r = (r = n[a]).toUpperCase(), o[a]) {
                        case "d":
                        case "dd":
                            if (isNaN(r)) return null;
                            i.setDate(parseInt(r));
                            break;
                        case "m":
                        case "mm":
                            if (isNaN(r)) return null;
                            var r;
                            if (0 == (r = parseInt(r)) || r > 12) return null;
                            i.setMonth(r);
                            break;
                        case "mmm":
                        case "mmmm":
                            if (isNaN(r)) {
                                for (var s = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"], c = -1, l = 0, d = s.length; l < d; l++)
                                    if (-1 !== s[l].indexOf(r)) {
                                        c = l;
                                        break
                                    } if (-1 === c) return null;
                                i.setMonth(c)
                            } else i.setMonth(parseInt(r) - 1);
                            break;
                        case "y":
                        case "yy":
                            if (isNaN(r)) return null;
                            i.setFullYear(parseInt(r));
                            break;
                        case "yyy":
                        case "yyyy":
                            if (isNaN(r) || r.length != o[a].length) return null;
                            i.setFullYear(parseInt(r));
                            break;
                        case "H":
                        case "HH":
                            if (isNaN(r)) return null;
                            i.setHours(parseInt(r));
                            break;
                        case "M":
                        case "MM":
                            if (isNaN(r)) return null;
                            i.setMinutes(parseInt(r));
                        case "s":
                        case "ss":
                            if (isNaN(r)) return null;
                            i.setSeconds(parseInt(r))
                    }
                }
                return i
            },
            spansToXML: function(e) {
                console.log("method not defined contact - IDR SOLUTIONS")
            },
            streamFromString: function(e, t) {
                console.log("method not defined contact - IDR SOLUTIONS")
            },
            stringFromStream: function(e, t) {
                console.log("method not defined contact - IDR SOLUTIONS")
            },
            xmlToSpans: function(e) {
                console.log("method not defined contact - IDR SOLUTIONS")
            }
        },
        JSRESERVED = ["break", "delete", "function", "return", "typeof", "case", "do", "if", "switch", "var", "catch", "else", "in", "this", "void", "continue", "false", "instanceof", "throw", "while", "debugger", "finally", "new", "true", "with", "default", "for", "null", "try", "class", "const", "enum", "export", "extends", "import", "super", "implements", "let", "private", "public", "yield", "interface", "package", "protected", "static", "abstract", "double", "goto", "native", "static", "boolean", "enum", "implements", "package", "super", "byte", "export", "import", "private", "synchronized", "char", "extends", "int", "protected", "throws", "class", "final", "interface", "public", "transient", "const", "float", "long", "short", "volatile", "arguments", "encodeURI", "Infinity", "Number", "RegExp", "Array", "encodeURIComponent", "isFinite", "Object", "String", "Boolean", "Error", "isNaN", "parseFloat", "SyntaxError", "Date", "eval", "JSON", "parseInt", "TypeError", "decodeURI", "EvalError", "Math", "RangeError", "undefined", "decodeURIComponent", "Function", "NaN", "ReferenceError", "URIError"],
        EcmaFilter = {
            decode: function(e, t) {
                if ("FlateDecode" === e) {
                    for (var o = new EcmaFlate, n = [], i = 0, a = 2, r = t.length; a < r; a++) n[i++] = t[a];
                    return o.decode(n)
                }
                var s, c, l;
                return "ASCII85Decode" === e ? (new EcmaAscii85).decode(t) : "ASCIIHexDecode" === e ? (new EcmaAsciiHex).decode(t) : "RunLengthDecode" === e ? (new EcmaRunLength).decode() : (console.log("This type of decoding is not supported yet : " + e), t)
            },
            applyPredictor: function(e, t, o, n, i, a, r) {
                if (1 === t) return e;
                for (var s, c = e.length, l = new EcmaBuffer(e), d = n * i + 7 >> 3, u = (a * n * i + 7 >> 3) + d, h = this.createByteBuffer(u), f = this.createByteBuffer(u), m, p = 0, g = 0; !(c <= g);) {
                    var y = 0,
                        S = d;
                    if ((s = t) >= 10) {
                        if (-1 === (m = l.getByte())) break;
                        m += 10
                    } else m = s;
                    for (; S < u && -1 !== (y = l.readTo(h, S, u - S));) S += y, g += y;
                    if (-1 === y) break;
                    switch (m) {
                        case 2:
                            for (var O = d; O < u; O++) {
                                var E = 255 & h[O],
                                    A = 255 & h[O - d];
                                h[O] = E + A & 255, o && (o[p] = h[O]), p++
                            }
                            break;
                        case 10:
                            for (var O = d; O < u; O++) o && (o[p] = 255 & h[O]), p++;
                            break;
                        case 11:
                            for (var O = d; O < u; O++) {
                                var E = 255 & h[O],
                                    A = 255 & h[O - d];
                                h[O] = E + A, o && (o[p] = 255 & h[O]), p++
                            }
                            break;
                        case 12:
                            for (var O = d; O < u; O++) {
                                var E = (255 & f[O]) + (255 & h[O]);
                                h[O] = E, o && (o[p] = 255 & h[O]), p++
                            }
                            break;
                        case 13:
                            for (var O = d; O < u; O++) {
                                var I = 255 & h[O],
                                    v = (255 & h[O - d]) + (255 & f[O]) >> 1;
                                h[O] = I + v, o && (o[p] = 255 & h[O]), p++
                            }
                            break;
                        case 14:
                            for (var O = d; O < u; O++) {
                                var D = 255 & h[O - d],
                                    b = 255 & f[O],
                                    T = 255 & f[O - d],
                                    F = D + b - T,
                                    R = F - D,
                                    L = F - b,
                                    P = F - T;
                                R = R < 0 ? -R : R, L = L < 0 ? -L : L, P = P < 0 ? -P : P, h[O] = R <= L && R <= P ? h[O] + D : L <= P ? h[O] + b : h[O] + T, o && (o[p] = 255 & h[O]), p++
                            }
                            break;
                        case 15:
                            break
                    }
                    for (var y = 0; y < u; y++) f[y] = h[y]
                }
                return p
            },
            createByteBuffer: function(e) {
                for (var t = [], o = 0; o < e; o++) t.push(0);
                return t
            },
            decodeBase64: function(e) {
                for (var t = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=", o, n, i, a, r = [], s = e.replace(/[^A-Za-z0-9\+\/\=]/g, ""), c = s.length, l = 0; l < c;) o = t.indexOf(s.charAt(l++)), n = t.indexOf(s.charAt(l++)), i = t.indexOf(s.charAt(l++)), a = t.indexOf(s.charAt(l++)), r.push(o << 2 | n >> 4), 64 !== i && r.push((15 & n) << 4 | i >> 2), 64 !== a && r.push((3 & i) << 6 | a);
                return r
            },
            encodeBase64: function(e) {
                for (var t = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=", o = "", n, i, a, r, s, c, l, d = 0, u = e.length; d < u;) r = (n = e[d++]) >> 2, s = (3 & n) << 4 | (i = e[d++]) >> 4, c = (15 & i) << 2 | (a = e[d++]) >> 6, l = 63 & a, isNaN(i) ? c = l = 64 : isNaN(a) && (l = 64), o += t.charAt(r) + t.charAt(s) + t.charAt(c) + t.charAt(l);
                return o
            }
        };

    function EcmaFlate() {
        this.decode = function(e) {
            var t, o, n, i, a = 1024;
            for (p = 0, h = 0, f = 0, l = -1, m = !1, E = A = 0, D = null, d = e, u = 0, o = new Array(a), t = [];
                (n = j(o, 0, a)) > 0;)
                for (i = 0; i < n; i++) t.push(o[i]);
            return d = null, t
        };
        var e = [0, 1, 3, 7, 15, 31, 63, 127, 255, 511, 1023, 2047, 4095, 8191, 16383, 32767, 65535],
            t = [3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 15, 17, 19, 23, 27, 31, 35, 43, 51, 59, 67, 83, 99, 115, 131, 163, 195, 227, 258, 0, 0],
            o = [1, 2, 3, 4, 5, 7, 9, 13, 17, 25, 33, 49, 65, 97, 129, 193, 257, 385, 513, 769, 1025, 1537, 2049, 3073, 4097, 6145, 8193, 12289, 16385, 24577],
            n = [16, 17, 18, 0, 8, 7, 9, 6, 10, 5, 11, 4, 12, 3, 13, 2, 14, 1, 15],
            i = [0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 0, 99, 99],
            a = [0, 0, 0, 0, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10, 11, 11, 12, 12, 13, 13],
            r = 32768,
            s = 0,
            c = new Array(r << 1),
            l, d, u, h, f, m, p, g = null,
            y, S, O, E, A, I = 9,
            v = 6,
            D, b, T, F;

        function R() {
            return d.length === u ? -1 : 255 & d[u++]
        }

        function L(t) {
            return h & e[t]
        }

        function P() {
            this.next = null, this.list = null
        }

        function N() {
            this.e = 0, this.b = 0, this.n = 0, this.t = null
        }

        function C(e, t, o, n, i, a) {
            this.BMAX = 16, this.N_MAX = 288, this.status = 0, this.root = null, this.m = 0;
            var r, s = new Array(this.BMAX + 1),
                c, l, d, u, h, f, m, p = new Array(this.BMAX + 1),
                g, y, S, O = new N,
                E = new Array(this.BMAX),
                A = new Array(this.N_MAX),
                I = new Array(this.BMAX + 1),
                v, D, b, T, F, R;
            for (R = this.root = null, h = 0; h < s.length; h++) s[h] = 0;
            for (h = 0; h < p.length; h++) p[h] = 0;
            for (h = 0; h < E.length; h++) E[h] = null;
            for (h = 0; h < A.length; h++) A[h] = 0;
            for (h = 0; h < I.length; h++) I[h] = 0;
            c = t > 256 ? e[256] : this.BMAX, g = e, y = 0, h = t;
            do {
                s[g[y]]++, y++
            } while (--h > 0);
            if (s[0] === t) return this.root = null, this.m = 0, this.status = 0, void 0;
            for (f = 1; f <= this.BMAX && 0 === s[f]; f++);
            for (m = f, a < f && (a = f), h = this.BMAX; 0 !== h && 0 === s[h]; h--);
            for (d = h, a > h && (a = h), b = 1 << f; f < h; f++, b <<= 1)
                if ((b -= s[f]) < 0) return this.status = 2, this.m = a, void 0;
            if ((b -= s[h]) < 0) return this.status = 2, this.m = a, void 0;
            for (s[h] += b, I[1] = f = 0, g = s, y = 1, D = 2; --h > 0;) I[D++] = f += g[y++];
            g = e, y = 0, h = 0;
            do {
                0 !== (f = g[y++]) && (A[I[f]++] = h)
            } while (++h < t);
            for (t = I[d], I[0] = h = 0, g = A, y = 0, u = -1, v = p[0] = 0, S = null, T = 0; m <= d; m++)
                for (r = s[m]; r-- > 0;) {
                    for (; m > v + p[1 + u];) {
                        if (v += p[1 + u], u++, T = (T = d - v) > a ? a : T, (l = 1 << (f = m - v)) > r + 1)
                            for (l -= r + 1, D = m; ++f < T && !((l <<= 1) <= s[++D]);) l -= s[D];
                        for (v + f > c && v < c && (f = c - v), T = 1 << f, p[1 + u] = f, S = new Array(T), F = 0; F < T; F++) S[F] = new N;
                        (R = R ? R.next = new P : this.root = new P).next = null, R.list = S, E[u] = S, u > 0 && (I[u] = h, O.b = p[u], O.e = 16 + f, O.t = S, f = (h & (1 << v) - 1) >> v - p[u], E[u - 1][f].e = O.e, E[u - 1][f].b = O.b, E[u - 1][f].n = O.n, E[u - 1][f].t = O.t)
                    }
                    for (O.b = m - v, y >= t ? O.e = 99 : g[y] < o ? (O.e = g[y] < 256 ? 16 : 15, O.n = g[y++]) : (O.e = i[g[y] - o], O.n = n[g[y++] - o]), l = 1 << m - v, f = h >> v; f < T; f += l) S[f].e = O.e, S[f].b = O.b, S[f].n = O.n, S[f].t = O.t;
                    for (f = 1 << m - 1; 0 != (h & f); f >>= 1) h ^= f;
                    for (h ^= f;
                        (h & (1 << v) - 1) !== I[u];) v -= p[u], u--
                }
            this.m = p[1], this.status = 0 !== b && 1 !== d ? 1 : 0
        }

        function k(e) {
            for (; f < e;) h |= R() << f, f += 8
        }

        function B(e) {
            h >>= e, f -= e
        }

        function U(e, t, o) {
            if (0 === o) return 0;
            for (var n, i, a = 0;;) {
                for (k(T), n = (i = D.list[L(T)]).e; n > 16;) {
                    if (99 === n) return -1;
                    B(i.b), k(n -= 16), n = (i = i.t[L(n)]).e
                }
                if (B(i.b), 16 !== n) {
                    if (15 === n) break;
                    for (k(n), E = i.n + L(n), B(n), k(F), n = (i = b.list[L(F)]).e; n > 16;) {
                        if (99 === n) return -1;
                        B(i.b), k(n -= 16), n = (i = i.t[L(n)]).e
                    }
                    for (B(i.b), k(n), A = p - i.n - L(n), B(n); E > 0 && a < o;) E--, A &= r - 1, p &= r - 1, e[t + a++] = c[p++] = c[A++];
                    if (a === o) return o
                } else if (p &= r - 1, e[t + a++] = c[p++] = i.n, a === o) return o
            }
            return l = -1, a
        }

        function w(e, t, o) {
            var n;
            if (B(n = 7 & f), k(16), n = L(16), B(16), k(16), n !== (65535 & ~h)) return -1;
            for (B(16), E = n, n = 0; E > 0 && n < o;) E--, p &= r - 1, k(8), e[t + n++] = c[p++] = L(8), B(8);
            return 0 === E && (l = -1), n
        }

        function x(e, n, r) {
            if (null === g) {
                var s, c, l = new Array(288);
                for (s = 0; s < 144; s++) l[s] = 8;
                for (; s < 256; s++) l[s] = 9;
                for (; s < 280; s++) l[s] = 7;
                for (; s < 288; s++) l[s] = 8;
                if (0 !== (c = new C(l, 288, 257, t, i, S = 7)).status) {
                    throw "EcmaFlateDecodeError : Huffman Status " + c.status;
                    return -1
                }
                for (g = c.root, S = c.m, s = 0; s < 30; s++) l[s] = 5;
                if ((c = new C(l, 30, 0, o, a, O = 5)).status > 1) {
                    throw g = null, "EcmaFlateDecodeError : Huffman Status" + c.status;
                    return -1
                }
                y = c.root, O = c.m
            }
            return D = g, b = y, T = S, F = O, U(e, n, r)
        }

        function M(e, r, s) {
            var c, l, d, u, h, f, m, p, g, y = new Array(316);
            for (c = 0; c < y.length; c++) y[c] = 0;
            if (k(5), m = 257 + L(5), B(5), k(5), p = 1 + L(5), B(5), k(4), f = 4 + L(4), B(4), m > 286 || p > 30) return -1;
            for (l = 0; l < f; l++) k(3), y[n[l]] = L(3), B(3);
            for (; l < 19; l++) y[n[l]] = 0;
            if (0 !== (g = new C(y, 19, 19, null, null, T = 7)).status) return -1;
            for (D = g.root, T = g.m, u = m + p, c = d = 0; c < u;)
                if (k(T), B(l = (h = D.list[L(T)]).b), (l = h.n) < 16) y[c++] = d = l;
                else if (16 === l) {
                if (k(2), l = 3 + L(2), B(2), c + l > u) return -1;
                for (; l-- > 0;) y[c++] = d
            } else if (17 === l) {
                if (k(3), l = 3 + L(3), B(3), c + l > u) return -1;
                for (; l-- > 0;) y[c++] = 0;
                d = 0
            } else {
                if (k(7), l = 11 + L(7), B(7), c + l > u) return -1;
                for (; l-- > 0;) y[c++] = 0;
                d = 0
            }
            if (g = new C(y, m, 257, t, i, T = I), 0 === T && (g.status = 1), 0 !== g.status) return -1;
            for (D = g.root, T = g.m, c = 0; c < p; c++) y[c] = y[c + m];
            return g = new C(y, p, 0, o, a, F = v), b = g.root, 0 === (F = g.m) && m > 257 || 0 !== g.status ? -1 : U(e, r, s)
        }

        function j(e, t, o) {
            for (var n = 0, i; n < o;) {
                if (m && -1 === l) return n;
                if (E > 0) {
                    if (l !== s)
                        for (; E > 0 && n < o;) E--, A &= r - 1, p &= r - 1, e[t + n++] = c[p++] = c[A++];
                    else {
                        for (; E > 0 && n < o;) E--, p &= r - 1, k(8), e[t + n++] = c[p++] = L(8), B(8);
                        0 === E && (l = -1)
                    }
                    if (n === o) return n
                }
                if (-1 === l) {
                    if (m) break;
                    k(1), 0 !== L(1) && (m = !0), B(1), k(2), l = L(2), B(2), D = null, E = 0
                }
                switch (l) {
                    case 0:
                        i = w(e, t + n, o - n);
                        break;
                    case 1:
                        i = D ? U(e, t + n, o - n) : x(e, t + n, o - n);
                        break;
                    case 2:
                        i = D ? U(e, t + n, o - n) : M(e, t + n, o - n);
                        break;
                    default:
                        i = -1;
                        break
                }
                if (-1 === i) return m ? 0 : -1;
                n += i
            }
            return n
        }
    }

    function EcmaAsciiHex() {
        this.decode = function(e) {
            for (var t = [], o = -1, n = 0, i, a, r = !1, s = 0, c = e.length; s < c; s++) {
                if ((i = e[s]) >= 48 && i <= 57) a = 15 & i;
                else {
                    if (!(i >= 65 && i <= 70 || i >= 97 && i <= 102)) {
                        if (62 === i) {
                            r = !0;
                            break
                        }
                        continue
                    }
                    a = 9 + (15 & i)
                }
                o < 0 ? o = a : (t[n++] = o << 4 | a, o = -1)
            }
            return o >= 0 && r && (t[n++] = o << 4, o = -1), t
        }
    }

    function EcmaAscii85() {
        this.decode = function(e) {
            for (var t = e.length, o = [], n = [0, 0, 0, 0, 0], i, a, r, s, c, l = 0; l < t; ++l)
                if (122 !== e[l]) {
                    for (i = 0; i < 5; ++i) n[i] = e[l + i] - 33;
                    if ((c = t - l) < 5) {
                        for (i = c; i < 4; n[++i] = 0);
                        n[c] = 85
                    }
                    for (r = 255 & (a = 85 * (85 * (85 * (85 * n[0] + n[1]) + n[2]) + n[3]) + n[4]), s = 255 & (a >>>= 8), a >>>= 8, o.push(a >>> 8, 255 & a, s, r), i = c; i < 5; ++i, o.pop());
                    l += 4
                } else o.push(0, 0, 0, 0);
            return o
        }
    }

    function EcmaRunLength() {
        this.decode = function(e) {
            for (var t, o, n = e.length, i = 0, a = [], r = 0; r < n; r++)
                if ((t = e[r]) < 0 && (t = 256 + t), 128 === t) r = n;
                else if (t > 128) {
                t = 257 - t, o = e[++r];
                for (var s = 0; s < t; s++) a[i++] = o
            } else {
                r++, t++;
                for (var s = 0; s < t; s++) a[i++] = e[r + s];
                r = r + t - 1
            }
            return a
        }
    }
    var EcmaKEY = {
            A: "A",
            AA: "AA",
            AC: "AC",
            AcroForm: "AcroForm",
            ActualText: "ActualText",
            AIS: "AIS",
            Alternate: "Alternate",
            AlternateSpace: "AlternateSpace",
            Annot: "Annot",
            Annots: "Annots",
            AntiAlias: "AntiAlias",
            AP: "AP",
            Array: "Array",
            ArtBox: "ArtBox",
            AS: "AS",
            Asset: "Asset",
            Assets: "Assets",
            Ascent: "Ascent",
            Author: "Author",
            AvgWidth: "AvgWidth",
            B: "B",
            BlackPoint: "BlackPoint",
            Background: "Background",
            Base: "Base",
            BaseEncoding: "BaseEncoding",
            BaseFont: "BaseFont",
            BaseState: "BaseState",
            BBox: "BBox",
            BC: "BC",
            BDC: "BDC",
            BG: "BG",
            BI: "BI",
            BitsPerComponent: "BitsPerComponent",
            BitsPerCoordinate: "BitsPerCoordinate",
            BitsPerFlag: "BitsPerFlag",
            BitsPerSample: "BitsPerSample",
            BlackIs1: "BlackIs1",
            BleedBox: "BleedBox",
            Blend: "Blend",
            Bounds: "Bounds",
            Border: "Border",
            BM: "BM",
            BPC: "BPC",
            BS: "BS",
            Btn: "Btn",
            ByteRange: "ByteRange",
            C: "C",
            C0: "C0",
            C1: "C1",
            C2: "C2",
            CA: "CA",
            ca: "ca",
            Calculate: "Calculate",
            CapHeight: "CapHeight",
            Caret: "Caret",
            Category: "Category",
            Catalog: "Catalog",
            Cert: "Cert",
            CF: "CF",
            CFM: "CFM",
            Ch: "Ch",
            CIDSet: "CIDSet",
            CIDSystemInfo: "CIDSystemInfo",
            CharProcs: "CharProcs",
            CharSet: "CharSet",
            CheckSum: "CheckSum",
            CIDFontType0C: "CIDFontType0C",
            CIDToGIDMap: "CIDToGIDMap",
            Circle: "Circle",
            ClassMap: "ClassMap",
            CMap: "CMap",
            CMapName: "CMapName",
            CMYK: "CMYK",
            CO: "CO",
            Color: "Color",
            Colors: "Colors",
            ColorBurn: "ColorBurn",
            ColorDodge: "ColorDodge",
            ColorSpace: "ColorSpace",
            ColorTransform: "ColorTransform",
            Columns: "Columns",
            Components: "Components",
            CompressedObject: "CompressedObject",
            Compatible: "Compatible",
            Configurations: "Configurations",
            Configs: "Configs",
            ContactInfo: "ContactInfo",
            Contents: "Contents",
            Coords: "Coords",
            Count: "Count",
            CreationDate: "CreationDate",
            Creator: "Creator",
            CropBox: "CropBox",
            CS: "CS",
            CVMRC: "CVMRC",
            D: "D",
            DA: "DA",
            DamageRowsBeforeError: "DamageRowsBeforeError",
            Darken: "Darken",
            DC: "DC",
            DCT: "DCT",
            Decode: "Decode",
            DecodeParms: "DecodeParms",
            Desc: "Desc",
            DescendantFonts: "DescendantFonts",
            Descent: "Descent",
            Dest: "Dest",
            Dests: "Dests",
            Difference: "Difference",
            Differences: "Differences",
            Domain: "Domain",
            DP: "DP",
            DR: "DR",
            DS: "DS",
            DV: "DV",
            DW: "DW",
            DW2: "DW2",
            E: "E",
            EarlyChange: "EarlyChange",
            EF: "EF",
            EFF: "EFF",
            EmbeddedFiles: "EmbeddedFiles",
            EOPROPtype: "EOPROPtype",
            Encode: "Encode",
            EncodeByteAlign: "EncodeByteAlign",
            Encoding: "Encoding",
            Encrypt: "Encrypt",
            EncryptMetadata: "EncryptMetadata",
            EndOfBlock: "EndOfBlock",
            EndOfLine: "EndOfLine",
            Exclusion: "Exclusion",
            Export: "Export",
            Extend: "Extend",
            Extends: "Extends",
            ExtGState: "ExtGState",
            Event: "Event",
            F: "F",
            FDF: "FDF",
            Ff: "Ff",
            Fields: "Fields",
            FIleAccess: "FIleAccess",
            FileAttachment: "FileAttachment",
            Filespec: "Filespec",
            Filter: "Filter",
            First: "First",
            FirstChar: "FirstChar",
            FIrstPage: "FIrstPage",
            Fit: "Fit",
            FItB: "FItB",
            FitBH: "FitBH",
            FItBV: "FItBV",
            FitH: "FitH",
            FItHeight: "FItHeight",
            FitR: "FitR",
            FitV: "FitV",
            FitWidth: "FitWidth",
            Flags: "Flags",
            Fo: "Fo",
            Font: "Font",
            FontBBox: "FontBBox",
            FontDescriptor: "FontDescriptor",
            FontFamily: "FontFamily",
            FontFile: "FontFile",
            FontFIle2: "FontFIle2",
            FontFile3: "FontFile3",
            FontMatrix: "FontMatrix",
            FontName: "FontName",
            FontStretch: "FontStretch",
            FontWeight: "FontWeight",
            Form: "Form",
            Format: "Format",
            FormType: "FormType",
            FreeText: "FreeText",
            FS: "FS",
            FT: "FT",
            FullScreen: "FullScreen",
            Function: "Function",
            Functions: "Functions",
            FunctionType: "FunctionType",
            G: "G",
            Gamma: "Gamma",
            GoBack: "GoBack",
            GoTo: "GoTo",
            GoToR: "GoToR",
            Group: "Group",
            H: "H",
            HardLight: "HardLight",
            Height: "Height",
            Hide: "Hide",
            Highlight: "Highlight",
            Hue: "Hue",
            Hival: "Hival",
            I: "I",
            ID: "ID",
            Identity: "Identity",
            Identity_H: "Identity_H",
            Identity_V: "Identity_V",
            IDTree: "IDTree",
            IM: "IM",
            Image: "Image",
            ImageMask: "ImageMask",
            Index: "Index",
            Indexed: "Indexed",
            Info: "Info",
            Ink: "Ink",
            InkList: "InkList",
            Instances: "Instances",
            Intent: "Intent",
            InvisibleRect: "InvisibleRect",
            IRT: "IRT",
            IT: "IT",
            ItalicAngle: "ItalicAngle",
            JavaScript: "JavaScript",
            JS: "JS",
            JT: "JT",
            JBIG2Globals: "JBIG2Globals",
            K: "K",
            Keywords: "Keywords",
            Keystroke: "Keystroke",
            Kids: "Kids",
            L: "L",
            Lang: "Lang",
            Last: "Last",
            LastChar: "LastChar",
            LastModified: "LastModified",
            LastPage: "LastPage",
            Launch: "Launch",
            Layer: "Layer",
            Leading: "Leading",
            Length: "Length",
            Length1: "Length1",
            Length2: "Length2",
            Length3: "Length3",
            Lighten: "Lighten",
            Limits: "Limits",
            Line: "Line",
            Linearized: "Linearized",
            LinearizedReader: "LinearizedReader",
            Link: "Link",
            ListMode: "ListMode",
            Location: "Location",
            Lock: "Lock",
            Locked: "Locked",
            Lookup: "Lookup",
            Luminosity: "Luminosity",
            LW: "LW",
            M: "M",
            MacExpertEncoding: "MacExpertEncoding",
            MacRomanEncoding: "MacRomanEncoding",
            Margin: "Margin",
            MarkInfo: "MarkInfo",
            Mask: "Mask",
            Matrix: "Matrix",
            Matte: "Matte",
            max: "max",
            MaxLen: "MaxLen",
            MaxWidth: "MaxWidth",
            MCID: "MCID",
            MediaBox: "MediaBox",
            Metadata: "Metadata",
            min: "min",
            MissingWidth: "MissingWidth",
            MK: "MK",
            ModDate: "ModDate",
            MouseDown: "MouseDown",
            MouseEnter: "MouseEnter",
            MouseExit: "MouseExit",
            MouseUp: "MouseUp",
            Movie: "Movie",
            Multiply: "Multiply",
            N: "N",
            Name: "Name",
            Named: "Named",
            Names: "Names",
            NeedAppearances: "NeedAppearances",
            Next: "Next",
            NextPage: "NextPage",
            NM: "NM",
            None: "None",
            Normal: "Normal",
            Nums: "Nums",
            O: "O",
            ObjStm: "ObjStm",
            OC: "OC",
            OCGs: "OCGs",
            OCProperties: "OCProperties",
            OE: "OE",
            OFF: "OFF",
            off: "off",
            ON: "ON",
            On: "On",
            OnBlur: "OnBlur",
            OnFocus: "OnFocus",
            OP: "OP",
            op: "op",
            Open: "Open",
            OpenAction: "OpenAction",
            OPI: "OPI",
            OPM: "OPM",
            Opt: "Opt",
            Order: "Order",
            Ordering: "Ordering",
            Outlines: "Outlines",
            Overlay: "Overlay",
            P: "P",
            PaintType: "PaintType",
            Page: "Page",
            PageLabels: "PageLabels",
            PageMode: "PageMode",
            Pages: "Pages",
            Params: "Params",
            Parent: "Parent",
            ParentTree: "ParentTree",
            Pattern: "Pattern",
            PatternType: "PatternType",
            PC: "PC",
            PDFDocEncoding: "PDFDocEncoding",
            Perms: "Perms",
            Pg: "Pg",
            PI: "PI",
            PieceInfo: "PieceInfo",
            PO: "PO",
            Polygon: "Polygon",
            PolyLine: "PolyLine",
            Popup: "Popup",
            Predictor: "Predictor",
            Prev: "Prev",
            PrevPage: "PrevPage",
            Print: "Print",
            PrinterMark: "PrinterMark",
            PrintState: "PrintState",
            Process: "Process",
            ProcSet: "ProcSet",
            Producer: "Producer",
            Projection: "Projection",
            Properties: "Properties",
            PV: "PV",
            Q: "Q",
            Qfactor: "Qfactor",
            QuadPoints: "QuadPoints",
            R: "R",
            Range: "Range",
            RBGroups: "RBGroups",
            RC: "RC",
            Reason: "Reason",
            Recipients: "Recipients",
            Rect: "Rect",
            Reference: "Reference",
            Registry: "Registry",
            ResetForm: "ResetForm",
            Resources: "Resources",
            RGB: "RGB",
            RichMedia: "RichMedia",
            RichMediaContent: "RichMediaContent",
            RD: "RD",
            RoleMap: "RoleMap",
            Root: "Root",
            Rotate: "Rotate",
            Rows: "Rows",
            RT: "RT",
            RV: "RV",
            S: "S",
            SA: "SA",
            Saturation: "Saturation",
            SaveAs: "SaveAs",
            Screen: "Screen",
            SetOCGState: "SetOCGState",
            Shading: "Shading",
            ShadingType: "ShadingType",
            Sig: "Sig",
            SigFlags: "SigFlags",
            Signed: "Signed",
            Size: "Size",
            SM: "SM",
            SMask: "SMask",
            SoftLight: "SoftLight",
            Sound: "Sound",
            Square: "Square",
            Squiggly: "Squiggly",
            Stamp: "Stamp",
            Standard: "Standard",
            StandardEncoding: "StandardEncoding",
            State: "State",
            StemH: "StemH",
            StemV: "StemV",
            StmF: "StmF",
            StrF: "StrF",
            StrikeOut: "StrikeOut",
            StructElem: "StructElem",
            StructParent: "StructParent",
            StructParents: "StructParents",
            StructTreeRoot: "StructTreeRoot",
            Style: "Style",
            SubFilter: "SubFilter",
            Subj: "Subj",
            Subject: "Subject",
            SubmitForm: "SubmitForm",
            Subtype: "Subtype",
            Supplement: "Supplement",
            T: "T",
            Tabs: "Tabs",
            TagSuspect: "TagSuspect",
            Text: "Text",
            TI: "TI",
            TilingType: "TilingType",
            tintTransform: "tintTransform",
            Title: "Title",
            TM: "TM",
            Toggle: "Toggle",
            ToUnicode: "ToUnicode",
            TP: "TP",
            TR: "TR",
            TrapNet: "TrapNet",
            Trapped: "Trapped",
            TrimBox: "TrimBox",
            Tx: "Tx",
            TxFontSize: "TxFontSize",
            TxOutline: "TxOutline",
            TU: "TU",
            Type: "Type",
            U: "U",
            UE: "UE",
            UF: "UF",
            Uncompressed: "Uncompressed",
            Unsigned: "Unsigned",
            Usage: "Usage",
            V: "V",
            Validate: "Validate",
            VerticesPerRow: "VerticesPerRow",
            View: "View",
            VIewState: "VIewState",
            VP: "VP",
            W: "W",
            W2: "W2",
            Watermark: "Watermark",
            WhitePoint: "WhitePoint",
            Widget: "Widget",
            Win: "Win",
            WinAnsiEncoding: "WinAnsiEncoding",
            Width: "Width",
            Widths: "Widths",
            WP: "WP",
            WS: "WS",
            X: "X",
            XFA: "XFA",
            XFAImages: "XFAImages",
            XHeight: "XHeight",
            XObject: "XObject",
            XRef: "XRef",
            XRefStm: "XRefStm",
            XStep: "XStep",
            XYZ: "XYZ",
            YStep: "YStep",
            Zoom: "Zoom",
            ZoomTo: "ZoomTo",
            Unchanged: "Unchanged",
            Underline: "Underline"
        },
        EcmaLEX = {
            CHAR256: [1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 2, 0, 0, 2, 2, 0, 0, 0, 0, 0, 2, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            STRPDF: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 728, 711, 710, 729, 733, 731, 730, 732, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8226, 8224, 8225, 8230, 8212, 8211, 402, 8260, 8249, 8250, 8722, 8240, 8222, 8220, 8221, 8216, 8217, 8218, 8482, 64257, 64258, 321, 338, 352, 376, 381, 305, 322, 339, 353, 382, 0, 8364],
            isWhiteSpace: function(e) {
                return 1 === this.CHAR256[e]
            },
            isEOL: function(e) {
                return 10 === e || 13 === e
            },
            isDelimiter: function(e) {
                return 2 === this.CHAR256[e]
            },
            isComment: function(e) {
                return 37 === e
            },
            isBacklash: function(e) {
                return 92 === e
            },
            isEscSeq: function(e, t) {
                if (252 === e) switch (t) {
                    case 40:
                    case 41:
                    case 98:
                    case 102:
                    case 110:
                    case 114:
                    case 116:
                    case 92:
                    case 12:
                    case 13:
                        return !0;
                    default:
                        return !1
                }
                return !1
            },
            isDigit: function(e) {
                return 4 === this.CHAR256[e]
            },
            isBoolean: function(e) {
                return "boolean" == typeof e
            },
            isNull: function(e) {
                return null === typeof e
            },
            isNumber: function(e) {
                return "number" == typeof e
            },
            isString: function(e) {
                return "string" == typeof e
            },
            isHexString: function(e) {
                return e instanceof EcmaHEX
            },
            isArray: function(e) {
                return e instanceof Array
            },
            isName: function(e) {
                return e instanceof EcmaNAME
            },
            isDict: function(e) {
                return e instanceof EcmaDICT
            },
            isRef: function(e) {
                return e instanceof EcmaOREF
            },
            isStreamDict: function(e) {
                return EcmaKEY.Length in e.keys
            },
            getDA: function(e) {
                for (var t = {
                        fontSize: 10,
                        fontName: "Arial",
                        fontColor: "0 g"
                    }, o = e.length, n = 0, i = "", a = new Array; n < o;) {
                    var r = e.charCodeAt(n++);
                    EcmaLEX.isWhiteSpace(r) || EcmaLEX.isEOL(r) ? (i.length > 0 && a.push(i), i = "") : i += String.fromCharCode(r)
                }
                i.length > 0 && a.push(i);
                for (var n = 0, o = a.length; n < o; n++) "/" === a[n].charAt(0) ? (t.fontName = a[n].substring(1), a[n + 1] && (t.fontSize = parseInt(a[n + 1]))) : n > 3 && "rg" === a[n] && (t.fontColor = a[n - 3] + " " + a[n - 2] + " " + a[n - 1] + " rg");
                return t
            },
            getRefFromString: function(e) {
                var t = e.trim().split(" ");
                return new EcmaOREF(parseInt(t[0]), parseInt(t[1]))
            },
            getZeroLead: function(e) {
                for (var t = "" + e, o = 10 - t.length, n = 0; n < o; n++) t = "0" + t;
                return t
            },
            toPDFString: function(e) {
                var t = e.length,
                    o = [],
                    n;
                if ("þ" === e[0] && "ÿ" === e[1])
                    for (var i = 2; i < t; i += 2) n = e.charCodeAt(i) << 8 | e.charCodeAt(i + 1), o.push(String.fromCharCode(n));
                else
                    for (var i = 0; i < t; ++i) {
                        var a = this.STRPDF[e.charCodeAt(i)];
                        o.push(a ? String.fromCharCode(a) : e.charAt(i))
                    }
                return o.join("")
            },
            toPDFHex16String: function(e) {
                var t = e.length,
                    o = [],
                    n;
                o.push("fe"), o.push("ff");
                for (var i = 0; i < t; ++i) {
                    n = e.charCodeAt(i);
                    for (var a = Number(n >> 8).toString(16); a.length < 2;) a = "0" + a;
                    for (var r = Number(255 & n).toString(16); r.length < 2;) r = "0" + r;
                    o.push(a), o.push(r)
                }
                return o.join("")
            },
            toBytes32: function(e) {
                return [(4278190080 & e) >> 24, (16711680 & e) >> 16, (65280 & e) >> 8, 255 & e]
            },
            textToBytes: function(e) {
                for (var t = [], o, n = 0, i = e.length; n < i; n++)(o = e.charCodeAt(n)) < 256 ? t.push(o) : (t.push(o >> 8), t.push(255 & o));
                return t
            },
            bytesToText: function(e, t, o) {
                for (var n = "", i = t; i < o; i++) n += String.fromCharCode(e[t + i]);
                return n
            },
            pushBytesToBuffer: function(e, t) {
                for (var o = 0, n = e.length; o < n; o++) t.push(e[o])
            },
            objectToText: function(e) {
                if (this.isDict(e)) {
                    var t = "<<";
                    for (var o in e.keys) t += "/" + o + " " + this.objectToText(e.keys[o]) + " ";
                    return t += ">>"
                }
                if (this.isArray(e)) {
                    for (var t = "[", n = 0, i = e.length; n < i; n++) t += " " + this.objectToText(e[n]);
                    return t += "]"
                }
                return this.isRef(e) ? e.ref : this.isName(e) ? "/" + e.name : this.isNumber(e) ? "" + e : this.isString(e) ? "(" + EcmaLEX.toPDFString(e) + ")" : this.isHexString(e) ? e.str : this.isBoolean(e) ? e ? "true" : "false" : "null"
            }
        },
        EcmaFontWidths = {
            Arial: [750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 750, 278, 278, 355, 556, 556, 889, 667, 191, 333, 333, 389, 584, 278, 333, 278, 278, 556, 556, 556, 556, 556, 556, 556, 556, 556, 556, 278, 278, 584, 584, 584, 556, 1015, 667, 667, 722, 722, 667, 611, 778, 722, 278, 500, 667, 556, 833, 722, 778, 667, 778, 722, 667, 611, 722, 667, 944, 667, 667, 611, 278, 278, 278, 469, 556, 333, 556, 556, 500, 556, 556, 278, 556, 556, 222, 222, 500, 222, 833, 556, 556, 556, 556, 333, 500, 278, 556, 500, 722, 500, 500, 500, 334, 260, 334, 584, 350, 556, 350, 222, 556, 333, 1e3, 556, 556, 333, 1e3, 667, 333, 1e3, 350, 611, 350, 350, 222, 222, 333, 333, 350, 556, 1e3, 333, 1e3, 500, 333, 944, 350, 500, 667, 278, 333, 556, 556, 556, 556, 260, 556, 333, 737, 370, 556, 584, 333, 737, 552, 400, 549, 333, 333, 333, 576, 537, 333, 333, 333, 365, 556, 834, 834, 834, 611, 667, 667, 667, 667, 667, 667, 1e3, 722, 667, 667, 667, 667, 278, 278, 278, 278, 722, 722, 778, 778, 778, 778, 778, 584, 778, 722, 722, 722, 722, 667, 667, 611, 556, 556, 556, 556, 556, 556, 889, 500, 556, 556, 556, 556, 278, 278, 278, 278, 556, 556, 556, 556, 556, 556, 556, 549, 611, 556, 556, 556, 556, 500, 556, 500]
        },
        EcmaFormField = {
            READONLY_ID: 1,
            REQUIRED_ID: 2,
            NOEXPORT_ID: 3,
            MULTILINE_ID: 13,
            PASSWORD_ID: 14,
            NOTOGGLETOOFF_ID: 15,
            RADIO_ID: 16,
            PUSHBUTTON_ID: 17,
            COMBO_ID: 18,
            EDIT_ID: 19,
            SORT_ID: 20,
            FILESELECT_ID: 21,
            MULTISELECT_ID: 22,
            DONOTSPELLCHECK_ID: 23,
            DONOTSCROLL_ID: 24,
            COMB_ID: 25,
            RICHTEXT_ID: 26,
            RADIOINUNISON_ID: 26,
            COMMITONSELCHANGE_ID: 27,
            handleDisplayChange: function(e, t, o) {
                var n = this.flagToBooleans(o);
                switch (t.display) {
                    case display.hidden:
                        n[2] = !0, n[3] = !0, n[6] = !1;
                        break;
                    case display.noPrint:
                        n[2] = !1, n[3] = !1, n[6] = !1;
                        break;
                    case display.noView:
                        n[2] = !1, n[3] = !0, n[6] = !0;
                    case display.visible:
                        n[2] = !1, n[3] = !0, n[6] = !1;
                        break
                }
                e.keys[EcmaKEY.F] = this.booleansToFlag(n)
            },
            editTextField: function(e, t, o, n, i, a) {
                var r = !1,
                    s = !1,
                    c = i,
                    l = n.keys[EcmaKEY.Ff];
                if (l) {
                    var d = this.flagToBooleans(l);
                    if (d[1] = !0, r = d[this.PASSWORD_ID]) {
                        for (var u = "", h = 0, f = c.length; h < f; h++) u += "*";
                        c = u
                    }
                    s = d[this.MULTILINE_ID]
                }
                if (n.keys[EcmaKEY.V] = i, n.keys[EcmaKEY.AP] = new EcmaDICT, n.keys[EcmaKEY.TU]) {
                    var m = n.keys[EcmaKEY.TU];
                    EcmaLEX.isHexString(m) || (m = m.replace(/[{()}]/g, "_"), n.keys[EcmaKEY.TU] = m)
                }
                var p = 0;
                n.keys[EcmaKEY.Q] && (p = n.keys[EcmaKEY.Q]);
                var g = n.keys[EcmaKEY.Rect],
                    y = g[2] - g[0];
                y = Math.round(100 * y) / 100;
                var S = g[3] - g[1];
                S = Math.round(100 * S) / 100;
                var O = 10,
                    E = n.keys.DA,
                    A = n.keys[EcmaKEY.Parent];
                if (EcmaLEX.isRef(A)) {
                    var u, I = (u = new EcmaBuffer).getIndirectObject(A);
                    EcmaLEX.isDict(I) && (I.keys[EcmaKEY.V] = i, t.push(I), o.push(A))
                }
                var v = "0 g",
                    D = "Arial";
                if (E) {
                    var b = EcmaLEX.getDA(E);
                    O = 0 === (O = b.fontSize) ? 10 : O, v = b.fontColor, D = b.fontName
                }
                var T = new EcmaDICT,
                    F = new EcmaOREF(a, 0),
                    R = n.keys[EcmaKEY.AP].keys.N;
                if (R) var T = e.getObjectValue(R);
                n.keys[EcmaKEY.AP].keys.N = F, T.keys[EcmaKEY.BBox] = [0, 0, y, S], T.keys[EcmaKEY.Matrix] = [1, 0, 0, 1, 0, 0], T.keys[EcmaKEY.Subtype] = new EcmaNAME(EcmaKEY.Form);
                var L = new EcmaDICT,
                    P = new EcmaDICT;
                P.keys[EcmaKEY.Name] = new EcmaNAME("Helv"), P.keys[EcmaKEY.Type] = new EcmaNAME("Font"), P.keys[EcmaKEY.Subtype] = new EcmaNAME("Type1"), P.keys[EcmaKEY.BaseFont] = new EcmaNAME("Helvetica"), P.keys[EcmaKEY.Encoding] = new EcmaNAME("PDFDocEncoding");
                var N = new EcmaDICT;
                N.keys.Helv = P, L.keys[EcmaKEY.Font] = N, T.keys[EcmaKEY.Resources] = L, T.keys[EcmaKEY.FormType] = 1, T.keys[EcmaKEY.Type] = new EcmaNAME(EcmaKEY.XObject);
                var C = "";
                if (s) {
                    for (var u, k = 0, B = "", U = "", w = "", h = 0, f = c.length; h < f; h++) {
                        var x = c.charCodeAt(h),
                            M = String.fromCharCode(x),
                            j = this.findCodeWidth(x, O);
                        k + j > y && (U === w ? (B += U + "\n", U = "", w = "", k = 0) : (B += "\n", k = this.findStringWidth(U, O), w = U)), k += j, 10 === x ? (B += U + "\n", U = "", w = "", k = 0) : EcmaLEX.isWhiteSpace(x) ? (B += U + " ", U = "", w += " ") : (U += M, w += M)
                    }
                    U.length > 0 && (B += U);
                    var X = B.split("\n"),
                        K = 1.2 * O;
                    K = Math.round(100 * K) / 100;
                    var V = X.length * K,
                        Y = S - V + V - O;
                    (Y = Y < 0 ? 0 : Y) > 0 && (Y = Math.round(100 * Y) / 100), C += "/Tx BMC\nBT\n" + v + "\n/Helv " + O + " Tf\n", C += "2 " + Y + " Td\n(" + X[0] + ") Tj\n";
                    for (var h = 1, f = X.length; h < f; h++) C += "0 " + -K + " Td\n(" + X[h] + ") Tj\n";
                    C += "ET\nEMC";
                    var W = EcmaLEX.textToBytes(C);
                    T.keys[EcmaKEY.Length] = W.length, T.rawStream = W, T.stream = W, t.push(T), o.push(F)
                } else {
                    var _ = O - .2 * O,
                        H = S - _ > 0 ? (S - _) / 2 : 0,
                        G = 2;
                    if (p > 0) {
                        var x, M, Q = 0;
                        G = 0;
                        for (var h = 0, f = c.length; h < f; h++) x = c.charCodeAt(h), M = String.fromCharCode(x), Q += this.findCodeWidth(x, O);
                        Q < y && (G = 1 === p ? (y - Q) / 2 : y - Q)
                    }
                    for (var W = [], q = "/Tx BMC\nBT\n" + v + "\n" + G + " " + H + " Td\n/Helv " + O + " Tf\n(", z = ") Tj\nET\nEMC", u, h = 0, f = (u = EcmaLEX.textToBytes(q)).length; h < f; h++) W.push(u[h]);
                    for (var h = 0, f = (u = EcmaLEX.textToBytes(c)).length; h < f; h++) W.push(u[h]);
                    for (var h = 0, f = (u = EcmaLEX.textToBytes(z)).length; h < f; h++) W.push(u[h]);
                    T.keys[EcmaKEY.Length] = W.length, T.rawStream = W, T.stream = W, t.push(T), o.push(F)
                }
            },
            selectCheckBox: function(e, t) {
                var o = "Yes",
                    n = "Off",
                    i = t.keys[EcmaKEY.AP];
                if (i) {
                    var a = (i = (new EcmaBuffer).getObjectValue(i)).keys[EcmaKEY.D];
                    if (a)
                        for (var r in (a = (new EcmaBuffer).getObjectValue(a)).keys) {
                            var s;
                            "off" !== r.toLowerCase() && (o = r)
                        }
                    e ? (t.keys[EcmaKEY.AS] = new EcmaNAME(o), t.keys[EcmaKEY.V] = new EcmaNAME(o)) : (t.keys[EcmaKEY.AS] = new EcmaNAME(n), t.keys[EcmaKEY.V] = new EcmaNAME(n))
                }
            },
            selectRadioChild: function(e, t) {
                var o = t.keys[EcmaKEY.AP];
                if (o) {
                    var n = "Yes",
                        i = "Off",
                        a = (o = (new EcmaBuffer).getObjectValue(o)).keys[EcmaKEY.D];
                    if (a)
                        for (var r in (a = (new EcmaBuffer).getObjectValue(a)).keys) "off" !== r.toLowerCase() && (e.value != r ? (n = e.value, this.handleAPNameChange(o, e.value)) : n = r);
                    e.checked ? t.keys[EcmaKEY.AS] = new EcmaNAME(n) : t.keys[EcmaKEY.AS] = new EcmaNAME(i)
                }
            },
            handleAPNameChange: function(e, t) {
                var o = e.keys[EcmaKEY.D];
                if (o)
                    for (var n in (o = (new EcmaBuffer).getObjectValue(o)).keys) "off" !== n.toLowerCase() && t != n && (o.keys[t] = o.keys[n], delete o.keys[n]);
                var i = e.keys[EcmaKEY.N];
                if (i)
                    for (var a in (i = (new EcmaBuffer).getObjectValue(i)).keys) "off" !== a.toLowerCase() && t != a && (i.keys[t] = i.keys[a], delete i.keys[a]);
                var r = e.keys[EcmaKEY.R];
                if (r)
                    for (var s in (r = (new EcmaBuffer).getObjectValue(r)).keys) "off" !== s.toLowerCase() && t != s && (r.keys[t] = r.keys[s], delete r.keys[s])
            },
            selectChoice: function(e, t, o, n, i) {
                var a = o.keys[EcmaKEY.Opt],
                    r = n;
                if (o.keys[EcmaKEY.V] = n, a)
                    for (var s = 0, c = a.length; s < c; s++) {
                        var l = a[s];
                        if (EcmaLEX.isArray(l)) {
                            if (l[0] === n) {
                                r = l[1], o.keys[EcmaKEY.I] = [s];
                                break
                            }
                        } else if (l === n) {
                            r = l, o.keys[EcmaKEY.I] = [s];
                            break
                        }
                    }
                o.keys[EcmaKEY.AP] = new EcmaDICT;
                var d = o.keys[EcmaKEY.Rect],
                    u = d[2] - d[0],
                    h = d[3] - d[1],
                    f = 10,
                    m = o.keys.DA;
                if (m) {
                    var p = m.indexOf("/");
                    p >= 0 && (m = m.substring(p).split(" "), f = parseInt(m[1])), o.keys.DA = "/Arial " + f + " Tf"
                }
                var g = new EcmaDICT,
                    y = new EcmaOREF(i, 0);
                o.keys[EcmaKEY.AP].keys.N = y, g.keys[EcmaKEY.BBox] = [0, 0, u, h], g.keys[EcmaKEY.Matrix] = [1, 0, 0, 1, 0, 0], g.keys[EcmaKEY.Subtype] = new EcmaNAME(EcmaKEY.Form), g.keys[EcmaKEY.Resources] = new EcmaDICT, g.keys[EcmaKEY.FormType] = 1, g.keys[EcmaKEY.Type] = new EcmaNAME(EcmaKEY.XObject);
                var S = f - .2 * f,
                    O, E = "/Tx BMC\nBT\n/Arial " + f + " Tf\n0 g\n2 " + (h - S > 0 ? (h - S) / 2 : 0) + " Td\n(" + r + ") Tj\nET\nEMC",
                    A = EcmaLEX.textToBytes(E);
                g.keys[EcmaKEY.Length] = A.length, g.rawStream = A, g.stream = A, e.push(g), t.push(y)
            },
            findStringWidth: function(e, t) {
                for (var o = 0, n = 0, i = e.length; n < i; n++) {
                    var a = e.charCodeAt(n);
                    o += a < 256 ? EcmaFontWidths.Arial[a] / 1e3 * t : t
                }
                return o
            },
            findCodeWidth: function(e, t) {
                return e < 256 ? EcmaFontWidths.Arial[e] / 1e3 * t : t
            },
            flagToBooleans: function(e) {
                for (var t = [!1], o = 0; o < 32; o++) t[o + 1] = (e & 1 << o) == 1 << o;
                return t
            },
            booleansToFlag: function(e) {
                for (var t = 0, o = 0; o < 32; o++) t = e[32 - o] ? t << 1 | 1 : t <<= 1;
                return t
            },
            hexEncodeName: function(e) {
                for (var t = "", o = 0; o < e.length; o++) {
                    var n = e.charCodeAt(o);
                    n < 33 || n > 126 || '"' === e[o] || "#" === e[o] || "/" === e[o] ? t += n.toString(16) : t += e[o]
                }
                return t
            },
            hexDecodeName: function(e) {
                for (var t = "", o = 0; o < e.length; o++) {
                    var n = e.charCodeAt(o);
                    if ("#" === e[o] && o + 2 < e.length) {
                        var i = parseInt(e[o + 1] + e[o + 2], 16);
                        t += String.fromCharCode(i), o += 2
                    } else(n >= 33 || n <= 126) && (t += e[o])
                }
                return t
            }
        },
        EcmaNAMES = {},
        EcmaOBJECTOFFSETS = {},
        EcmaPageOffsets = [],
        EcmaFieldOffsets = [],
        EcmaMainCatalog = null,
        EcmaMainData = [],
        EcmaXRefType = 0;

    function showEcmaParserError(e) {
        alert(e)
    }

    function EcmaOBJOFF(e, t, o) {
        this.data = t, this.offset = e, this.isStream = o
    }

    function EcmaDICT() {
        this.keys = {}, this.stream = null, this.rawStream = null
    }

    function EcmaNAME(e) {
        this.name = e, this.value = null
    }

    function EcmaOREF(e, t) {
        this.num = e, this.gen = t, this.ref = e + " " + t + " R"
    }

    function EcmaHEX(e) {
        this.str = e
    }

    function EcmaBuffer(e) {
        this.data = e, this.pos = 0, this.markPos = 0, this.length = 0, e && (this.length = e.length)
    }
    EcmaBuffer.prototype.getByte = function() {
        return this.pos >= this.length ? -1 : this.data[this.pos++]
    }, EcmaBuffer.prototype.mark = function() {
        this.markPos = this.pos
    }, EcmaBuffer.prototype.reset = function() {
        this.pos = this.markPos
    }, EcmaBuffer.prototype.movePos = function(e) {
        this.pos = e
    }, EcmaBuffer.prototype.readTo = function(e) {
        for (var t = this.length - this.pos, o = Math.min(e.length, t), n = 0; n < o; n++) e[n] = this.getByte()
    }, EcmaBuffer.prototype.readTo = function(e, t, o) {
        if (this.pos < this.length) {
            for (var n = 0, i = this.length - this.pos, a = Math.min(o, i), r = 0; r < a; r++) e[t + r] = this.getByte(), n++;
            return n
        }
        return -1
    }, EcmaBuffer.prototype.lookNext = function() {
        return this.pos >= this.length ? -1 : this.data[this.pos]
    }, EcmaBuffer.prototype.lookNextNext = function() {
        return this.pos >= this.length ? -1 : this.data[this.pos + 1]
    }, EcmaBuffer.prototype.getNextLine = function() {
        for (var e = "", t = this.getByte();;)
            if (13 === t) {
                if (e.endsWith(" ")) break;
                if (10 === (t = this.getByte())) break
            } else {
                if (10 === t) break;
                e += String.fromCharCode(t), t = this.getByte()
            } return e
    }, EcmaBuffer.prototype.skipLine = function() {
        for (var e = this.getByte(); - 1 !== e;) {
            if (13 === e) {
                if (10 === (e = this.lookNext())) {
                    this.getByte();
                    break
                }
                break
            }
            if (10 === e) break;
            e = this.getByte()
        }
    }, EcmaBuffer.prototype.getNumberValue = function() {
        var e = this.getByte(),
            t = 1,
            o = !1;
        if (43 === e ? e = this.getByte() : 45 === e && (t = -1, e = this.getByte()), 46 === e && (o = !0, e = this.getByte()), e < 48 || e > 57) return 0;
        for (var n = "" + String.fromCharCode(e);;) {
            var i = this.lookNext();
            if (46 !== i && !EcmaLEX.isDigit(i)) break;
            e = this.getByte(), n += "" + String.fromCharCode(e)
        }
        return o ? t * parseFloat("0." + n) : -1 !== n.indexOf(".") ? t * parseFloat(n) : t * parseInt(n)
    }, EcmaBuffer.prototype.getNameValue = function() {
        var e = "",
            t;
        for (this.getByte();
            (t = this.lookNext()) >= 0 && !EcmaLEX.isDelimiter(t) && !EcmaLEX.isWhiteSpace(t);) e += String.fromCharCode(this.getByte());
        return e
    }, EcmaBuffer.prototype.getNormalString = function() {
        var e = [];
        this.getByte();
        for (var t = 1, o = this.getByte(), n = !1;;) {
            var i = !1;
            switch (o) {
                case -1:
                    n = !0;
                    break;
                case 40:
                    e.push("("), t++;
                    break;
                case 41:
                    --t ? e.push(")") : n = !0;
                    break;
                case 92:
                    switch (o = this.getByte()) {
                        case -1:
                            n = !0;
                            break;
                        case 40:
                        case 41:
                        case 92:
                            e.push(String.fromCharCode(o));
                            break;
                        case 110:
                            e.push("\n");
                            break;
                        case 114:
                            e.push("\r");
                            break;
                        case 116:
                            e.push("\t");
                            break;
                        case 98:
                            e.push("\b");
                            break;
                        case 102:
                            e.push("\f");
                            break;
                        case 48:
                        case 49:
                        case 50:
                        case 51:
                        case 52:
                        case 53:
                        case 54:
                        case 55:
                            var a = 15 & o;
                            i = !0, (o = this.getByte()) >= 48 && o <= 55 && (a = (a << 3) + (15 & o), (o = this.getByte()) >= 48 && o <= 55 && (i = !1, a = (a << 3) + (15 & o))), e.push(String.fromCharCode(a));
                            break;
                        case 13:
                            10 === this.lookNext() && this.getByte();
                            break;
                        case 10:
                            break;
                        default:
                            e.push(String.fromCharCode(o));
                            break
                    }
                    break;
                default:
                    e.push(String.fromCharCode(o))
            }
            if (n) break;
            i || (o = this.getByte())
        }
        return e.join("")
    }, EcmaBuffer.prototype.getHexString = function() {
        this.getByte();
        for (var e = this.getByte(), t = "<";;) {
            if (e < 0 || 62 === e) {
                t += ">";
                break
            }
            EcmaLEX.isWhiteSpace(e) ? e = this.getByte() : (t += String.fromCharCode(e), e = this.getByte())
        }
        return new EcmaHEX(t)
    }, EcmaBuffer.prototype.getDictionary = function() {
        var e = new EcmaDICT;
        this.getByte(), this.getByte();
        for (var t = [], o = !0; o;) {
            var n;
            switch (this.lookNext()) {
                case -1:
                    return e;
                case 48:
                case 49:
                case 50:
                case 51:
                case 52:
                case 53:
                case 54:
                case 55:
                case 56:
                case 57:
                case 43:
                case 45:
                case 46:
                    var i = this.getNumberValue(),
                        a = this.lookNext(),
                        r = this.lookNextNext();
                    if (t.length > 0) {
                        var s, c = (s = t.pop()).name;
                        EcmaLEX.isWhiteSpace(a) && EcmaLEX.isDigit(r) ? (this.getByte(), r = this.getNumberValue(), this.getByte(), this.getByte(), e.keys[c] = new EcmaOREF(i, r)) : e.keys[c] = i
                    }
                    break;
                case 47:
                    var l = this.getNameValue(),
                        d;
                    if (EcmaNAMES[l] ? d = EcmaNAMES[l] : (d = new EcmaNAME(l), EcmaNAMES[l] = d), 0 === t.length) t.push(d);
                    else {
                        var s, c = (s = t.pop()).name;
                        e.keys[c] = d
                    }
                    break;
                case 40:
                    var u = this.getNormalString();
                    if (0 !== t.length) {
                        var s, c = (s = t.pop()).name;
                        e.keys[c] = u
                    }
                    break;
                case 60:
                    if (60 === this.lookNextNext()) {
                        var h = this.getDictionary();
                        if (0 !== t.length) {
                            var s, c = (s = t.pop()).name;
                            e.keys[c] = h
                        }
                    } else {
                        var f = this.getHexString();
                        if (0 !== t.length) {
                            var s, c = (s = t.pop()).name;
                            e.keys[c] = f
                        }
                    }
                    break;
                case 91:
                    var m = this.getArray();
                    if (0 !== t.length) {
                        var s, c = (s = t.pop()).name;
                        e.keys[c] = m
                    }
                    break;
                case 116:
                    if (114 === this.data[this.pos + 1] && 117 === this.data[this.pos + 2] && 101 === this.data[this.pos + 3]) {
                        for (var p = 0; p < 4; p++) this.getByte();
                        if (t.length > 0) {
                            var s, c = (s = t.pop()).name;
                            e.keys[c] = !0
                        }
                    } else this.getByte();
                    break;
                case 102:
                    if (97 === this.data[this.pos + 1] && 108 === this.data[this.pos + 2] && 115 === this.data[this.pos + 3] && 101 === this.data[this.pos + 4]) {
                        for (var p = 0; p < 5; p++) this.getByte();
                        if (t.length > 0) {
                            var s, c = (s = t.pop()).name;
                            e.keys[c] = !1
                        }
                    } else this.getByte();
                    break;
                case 110:
                    if (117 === this.data[this.pos + 1] && 108 === this.data[this.pos + 2] && 108 === this.data[this.pos + 3]) {
                        for (var p = 0; p < 4; p++) this.getByte();
                        if (t.length > 0) {
                            var s, c = (s = t.pop()).name;
                            e.keys[c] = null
                        }
                    } else this.getByte();
                    break;
                case 62:
                    this.getByte(), 62 === this.lookNext() && (this.getByte(), o = !1);
                    break;
                default:
                    this.getByte();
                    break
            }
        }
        return EcmaLEX.isStreamDict(e) && !e.stream && (e.rawStream = this.getRawStream(e)), e
    }, EcmaBuffer.prototype.getArray = function() {
        this.getByte();
        for (var e = [];;) {
            var t;
            switch (this.lookNext()) {
                case -1:
                    return e;
                case 48:
                case 49:
                case 50:
                case 51:
                case 52:
                case 53:
                case 54:
                case 55:
                case 56:
                case 57:
                case 43:
                case 45:
                case 46:
                    var o = this.getNumberValue(),
                        n = this.data[this.pos],
                        i = this.data[this.pos + 1];
                    if (EcmaLEX.isWhiteSpace(n) && EcmaLEX.isDigit(i)) {
                        this.mark(), this.getByte(), i = this.getNumberValue(), this.getByte();
                        var a = this.getByte(),
                            r = this.lookNext();
                        82 === a && (EcmaLEX.isWhiteSpace(r) || EcmaLEX.isDelimiter(r)) ? e.push(new EcmaOREF(o, i)) : (e.push(o), this.reset())
                    } else e.push(o);
                    break;
                case 47:
                    var s = this.getNameValue();
                    EcmaNAMES[s] || (EcmaNAMES[s] = new EcmaNAME(s)), e.push(EcmaNAMES[s]);
                    break;
                case 40:
                    e.push(this.getNormalString());
                    break;
                case 60:
                    if (60 === this.lookNextNext()) {
                        var c = this.getDictionary();
                        e.push(c)
                    } else e.push(this.getHexString());
                    break;
                case 91:
                    e.push(this.getArray());
                    break;
                case 93:
                    return this.getByte(), e;
                case 116:
                    if (114 === this.data[this.pos + 1] && 117 === this.data[this.pos + 2] && 101 === this.data[this.pos + 3]) {
                        e.push(!0);
                        for (var l = 0; l < 4; l++) this.getByte()
                    } else this.getByte();
                    break;
                case 102:
                    if (97 === this.data[this.pos + 1] && 108 === this.data[this.pos + 2] && 115 === this.data[this.pos + 3] && 101 === this.data[this.pos + 4]) {
                        e.push(!1);
                        for (var l = 0; l < 5; l++) this.getByte()
                    } else this.getByte();
                    break;
                case 110:
                    if (117 === this.data[this.pos + 1] && 108 === this.data[this.pos + 2] && 108 === this.data[this.pos + 3]) {
                        e.push(null);
                        for (var l = 0; l < 4; l++) this.getByte()
                    } else this.getByte();
                default:
                    this.getByte();
                    break
            }
        }
    }, EcmaBuffer.prototype.getRawStream = function(e) {
        for (;;) {
            var t;
            if (115 === (t = this.lookNext()) && 116 === this.data[this.pos + 1] && 114 === this.data[this.pos + 2] && 101 === this.data[this.pos + 3] && 97 === this.data[this.pos + 4] && 109 === this.data[this.pos + 5]) {
                for (var o = 0; o < 6; o++) this.getByte();
                break
            }
            if (-1 === t) return null;
            this.getByte()
        }
        this.skipLine();
        for (var n = this.getObjectValue(e.keys[EcmaKEY.Length]), i = new Array(n), o = 0; o < n; o++) i[o] = 255 & this.getByte();
        for (;;) {
            var t;
            if (-1 === (t = this.lookNext())) break;
            if (101 === t && 110 === this.data[this.pos + 1] && 100 === this.data[this.pos + 2] && 115 === this.data[this.pos + 3] && 116 === this.data[this.pos + 4] && 114 === this.data[this.pos + 5] && 101 === this.data[this.pos + 6] && 97 === this.data[this.pos + 7] && 109 === this.data[this.pos + 8]) {
                for (var o = 0; o < 9; o++) this.getByte();
                break
            }
            this.getByte()
        }
        return i
    }, EcmaBuffer.prototype.getStream = function(e) {
        if (e.stream) return e.stream;
        var t = e.rawStream,
            o = e.keys[EcmaKEY.Filter];
        if (o)
            if (o instanceof Array)
                for (var n = 0, i = o.length; n < i; n++) t = EcmaFilter.decode(o[n].name, t);
            else t = EcmaFilter.decode(o.name, t);
        var a = e.keys[EcmaKEY.DecodeParms];
        if (a) {
            var r = 1,
                s = 1,
                c = 8,
                l = 1,
                d = 1,
                u, h;
            if (a instanceof Array)
                for (var n = 0, i = a.length; n < i; n++) {
                    var u, h;
                    (h = (u = this.getObjectValue(a[n])).keys[EcmaKEY.Predictor]) && (r = h), (h = u.keys[EcmaKEY.Colors]) && (s = h), (h = u.keys[EcmaKEY.BitsPerComponent]) && (c = h), (h = u.keys[EcmaKEY.Columns]) && (l = h), (h = u.keys[EcmaKEY.EarlyChange]) && (d = h)
                } else(h = (u = this.getObjectValue(a)).keys[EcmaKEY.Predictor]) && (r = h), (h = u.keys[EcmaKEY.Colors]) && (s = h), (h = u.keys[EcmaKEY.BitsPerComponent]) && (c = h), (h = u.keys[EcmaKEY.Columns]) && (l = h), (h = u.keys[EcmaKEY.EarlyChange]) && (d = h);
            if (1 !== r) {
                var f = EcmaFilter.applyPredictor(t, r, null, s, c, l, d),
                    m = EcmaFilter.createByteBuffer(f);
                EcmaFilter.applyPredictor(t, r, m, s, c, l, d)
            }
            t = m
        }
        return e.stream = t, t
    }, EcmaBuffer.prototype.getObjectValue = function(e) {
        if (EcmaLEX.isName(e)) return e.name;
        if (EcmaLEX.isDict(e)) return e;
        if (EcmaLEX.isRef(e)) {
            var t = this.getIndirectObject(e, this.data, !1);
            return this.getObjectValue(t)
        }
        return e
    }, EcmaBuffer.prototype.getIndirectObject = function(e) {
        for (var t in EcmaOBJECTOFFSETS)
            if (t === e.ref) {
                var o = EcmaOBJECTOFFSETS[t],
                    n = o.offset,
                    i = new EcmaBuffer(o.data),
                    a;
                if (o.isStream) return o.data ? (i.movePos(n), i.getObj()) : null;
                for (i.movePos(n);;) {
                    var r = i.lookNext();
                    if (-1 === r) return null;
                    if (111 === r && 98 === i.data[i.pos + 1] && 106 === i.data[i.pos + 2]) {
                        for (var s = 0; s < 3; s++) i.getByte();
                        break
                    }
                    i.getByte()
                }
                return i.getObj()
            } return null
    }, EcmaBuffer.prototype.getObj = function() {
        for (;;) {
            var e;
            switch (this.lookNext()) {
                case -1:
                    return null;
                case 48:
                case 49:
                case 50:
                case 51:
                case 52:
                case 53:
                case 54:
                case 55:
                case 56:
                case 57:
                case 43:
                case 45:
                case 46:
                    var t = this.getNumberValue(),
                        o = this.lookNext(),
                        n = this.lookNextNext(),
                        i = this.data[this.pos + 2],
                        a = this.data[this.pos + 3];
                    return EcmaLEX.isWhiteSpace(o) && EcmaLEX.isDigit(n) && EcmaLEX.isWhiteSpace(i) && 82 === a ? (this.getByte(), n = this.getNumberValue(), this.getByte(), this.getByte(), new EcmaOREF(t, n)) : t;
                case 47:
                    return this.getNameValue();
                case 40:
                    return this.getNormalString();
                case 60:
                    return 60 === this.lookNextNext() ? this.getDictionary() : this.getHexString();
                case 91:
                    return this.getArray();
                case 116:
                    if (114 === this.data[this.pos + 1] && 117 === this.data[this.pos + 2] && 101 === this.data[this.pos + 3]) {
                        for (var r = 0; r < 4; r++) this.getByte();
                        return !0
                    }
                    this.getByte();
                    break;
                case 102:
                    if (97 === this.data[this.pos + 1] && 108 === this.data[this.pos + 2] && 115 === this.data[this.pos + 3] && 101 === this.data[this.pos + 4]) {
                        for (var r = 0; r < 5; r++) this.getByte();
                        return !1
                    }
                    this.getByte();
                case 110:
                    if (117 === this.data[this.pos + 1] && 108 === this.data[this.pos + 2] && 108 === this.data[this.pos + 3]) {
                        for (var r = 0; r < 4; r++) this.getByte();
                        return null
                    }
                    this.getByte();
                default:
                    this.getByte();
                    break
            }
        }
        return null
    }, EcmaBuffer.prototype.readSimpleXREF = function() {
        var e = this.lookNext();
        if (EcmaLEX.isDigit(e)) return this.readStreamXREF(), void 0;
        this.skipLine();
        for (var t = null;;) {
            var o = this.lookNext();
            if (-1 === o) break;
            if (EcmaLEX.isEOL(o)) this.skipLine();
            else {
                if (116 === o && 114 === this.data[this.pos + 1] && 97 === this.data[this.pos + 2] && 105 === this.data[this.pos + 3] && 108 === this.data[this.pos + 4] && 101 === this.data[this.pos + 5] && 114 === this.data[this.pos + 6]) {
                    t = this.getObj();
                    break
                }
                var n = this.getObj();
                this.getByte();
                var i = this.getObj();
                this.skipLine();
                for (var a = 0; a < i; a++) {
                    var r = this.getObj(),
                        s = this.getObj(),
                        c = this.getNextLine(),
                        l = n + a + " " + s + " R";
                    "n" !== (c = c.trim()) || EcmaOBJECTOFFSETS[l] || (EcmaOBJECTOFFSETS[l] = new EcmaOBJOFF(r, this.data, !1))
                }
            }
        }
        if (t) {
            EcmaMainCatalog || (EcmaMainCatalog = t.keys.Root);
            var d = t.keys[EcmaKEY.Prev];
            if (d) {
                var u = this.getObjectValue(d);
                this.movePos(u), this.readSimpleXREF()
            }
        } else showEcmaParserError("Trailer not found")
    }, EcmaBuffer.prototype.readStreamXREF = function() {
        EcmaXRefType = 1, this.getObj(), this.getObj();
        var e = this.getObj(),
            t = this.getStream(e),
            o = e.keys[EcmaKEY.W],
            n = e.keys[EcmaKEY.Index];
        n || (n = [0, e.keys[EcmaKEY.Size]]);
        for (var i = o[0], a = o[1], r = o[2], s = n.length, c = 0, l = new EcmaBuffer(t); s > c;)
            for (var d = n[c++], u = d + n[c++], h = d; h < u; h++) {
                var f = 0,
                    m = 0,
                    p = 0;
                if (0 === i) f = 1;
                else
                    for (var g = 0; g < i; g++) f = f << 8 | l.getByte();
                for (var g = 0; g < a; g++) m = m << 8 | l.getByte();
                for (var g = 0; g < r; g++) p = p << 8 | l.getByte();
                var y = h + " " + p + " R";
                if (!EcmaOBJECTOFFSETS[y]) switch (f) {
                    case 0:
                        break;
                    case 1:
                        EcmaOBJECTOFFSETS[y] = new EcmaOBJOFF(m, EcmaMainData, !1);
                        break;
                    case 2:
                        EcmaOBJECTOFFSETS[y] = new EcmaOBJOFF(m, null, !0);
                        break
                }
            }
        EcmaMainCatalog || (EcmaMainCatalog = e.keys.Root);
        var S = e.keys[EcmaKEY.Prev];
        if (S) {
            var O = this.getObjectValue(S);
            this.movePos(O), this.readSimpleXREF()
        }
    }, EcmaBuffer.prototype.findFirstXREFOffset = function() {
        for (var e = this.data.length - 10; e > 0;) {
            var t, o;
            if (115 === this.data[e] && 116 === this.data[e + 1] && 97 === this.data[e + 2] && 114 === this.data[e + 3] && 116 === this.data[e + 4] && 120 === this.data[e + 5] && 114 === this.data[e + 6] && 101 === this.data[e + 7] && 102 === this.data[e + 8]) return this.movePos(e), this.skipLine(), this.getObj();
            e--
        }
        return -1
    }, EcmaBuffer.prototype.updateAllObjStm = function() {
        for (var e in EcmaOBJECTOFFSETS) {
            var t = e.split(" "),
                o = new EcmaOREF(t[0], t[1]),
                n = this.getIndirectObject(o);
            if (n instanceof EcmaDICT && n.keys[EcmaKEY.Type] && n.keys[EcmaKEY.Type].name === EcmaKEY.ObjStm)
                for (var i = n.keys[EcmaKEY.N], a = n.keys[EcmaKEY.First], r = new EcmaBuffer(this.getStream(n)), s = 0; s < i; s++) {
                    var c = r.getNumberValue();
                    r.getByte();
                    var l = r.getNumberValue();
                    r.getByte();
                    var d = c + " 0 R",
                        u = new EcmaOBJOFF(a + l, this.getStream(n), !0);
                    d in EcmaOBJECTOFFSETS ? EcmaOBJECTOFFSETS[d].isStream && !EcmaOBJECTOFFSETS[d].data && (EcmaOBJECTOFFSETS[d] = u) : EcmaOBJECTOFFSETS[d] = u
                }
        }
    }, EcmaBuffer.prototype.updatePageOffsets = function() {
        var e, t = this.getObjectValue(EcmaMainCatalog).keys[EcmaKEY.Pages];
        t && (t = this.getObjectValue(t), this.getPagesFromPageTree(t))
    }, EcmaBuffer.prototype.getPagesFromPageTree = function(e) {
        for (var t = e.keys[EcmaKEY.Kids], o = 0, n = (t = this.getObjectValue(t)).length; o < n; o++) {
            var i = t[o],
                a = this.getObjectValue(i),
                r = a.keys[EcmaKEY.Type];
            r.name === EcmaKEY.Pages ? this.getPagesFromPageTree(a) : r.name === EcmaKEY.Page && EcmaPageOffsets.push(i)
        }
    };
    var EcmaParser = {
            saveFormToPDF: function(e) {
                var t = this._insertFieldsToPDF(e);
                this._openURL(e, t)
            },
            _insertFieldsToPDF: function(e) {
                this._updateFileInfo(e);
                var t = new EcmaBuffer(EcmaMainData),
                    o = t.findFirstXREFOffset();
                o && (t.movePos(o), t.readSimpleXREF()), t.updateAllObjStm(), t.updatePageOffsets();
                var n = 1;
                for (var i in EcmaOBJECTOFFSETS) {
                    var a = i.split(" ");
                    n = Math.max(parseInt(a[0]), n)
                }
                n++;
                var r = [],
                    s = [],
                    c, l = t.getObjectValue(EcmaMainCatalog).keys[EcmaKEY.AcroForm],
                    d = t.getObjectValue(l);
                delete d.keys[EcmaKEY.XFA], r.push(d), s.push(l);
                for (var u = document.getElementsByTagName("input"), h = document.getElementsByTagName("textarea"), f = document.getElementsByTagName("select"), m = [], p = [], g = [], y = [], S = [], O = 0, E = u.length; O < E; O++) {
                    var A, I;
                    if ((I = (A = u[O]).getAttribute("data-objref")) && I.length > 0) {
                        var v = A.type.toUpperCase();
                        "TEXT" === v || "PASSWORD" === v ? m.push(A) : "CHECKBOX" === v ? p.push(A) : "RADIO" === v ? g.push(A) : "BUTTON" === v && S.push(A)
                    }
                }
                for (var O = 0, E = h.length; O < E; O++) {
                    var A, I;
                    (I = (A = h[O]).getAttribute("data-objref")) && I.length > 0 && m.push(A)
                }
                for (var O = 0, E = f.length; O < E; O++) {
                    var A, I;
                    (I = (A = f[O]).getAttribute("data-objref")) && I.length > 0 && y.push(A)
                }
                for (var O = 0, E = m.length; O < E; O++) {
                    var D = m[O].value,
                        b = m[O].getAttribute("data-objref"),
                        T = EcmaLEX.getRefFromString(b),
                        F = t.getObjectValue(T);
                    r.push(F), s.push(T), EcmaFormField.editTextField(t, r, s, F, D, n), n++
                }
                for (var O = 0, E = S.length; O < E; O++) {
                    var b = S[O].getAttribute("data-objref"),
                        T = EcmaLEX.getRefFromString(b),
                        F, R = (F = t.getObjectValue(T)).keys[EcmaKEY.F],
                        L = S[O].getAttribute("data-field-name"),
                        P = idrform.doc.getField(L);
                    S[O].dataset && S[O].dataset.defaultDisplay && P.display !== Number(S[O].dataset.defaultDisplay) && (r.push(F), s.push(T), EcmaFormField.handleDisplayChange(F, P, R))
                }
                for (var O = 0, E = p.length; O < E; O++) {
                    var N = p[O].checked,
                        b = p[O].getAttribute("data-objref"),
                        T = EcmaLEX.getRefFromString(b),
                        F = t.getObjectValue(T);
                    r.push(F), s.push(T), EcmaFormField.selectCheckBox(N, F)
                }
                for (var O = 0, E = y.length; O < E; O++) {
                    var C = y[O].value,
                        b = y[O].getAttribute("data-objref"),
                        T = EcmaLEX.getRefFromString(b),
                        F = t.getObjectValue(T);
                    r.push(F), s.push(T), EcmaFormField.selectChoice(r, s, F, C, n), n++
                }
                for (var k = {}, O = 0, E = g.length; O < E; O++) {
                    var B = g[O],
                        b = B.getAttribute("data-objref"),
                        T = EcmaLEX.getRefFromString(b),
                        F, U = (F = t.getObjectValue(T)).keys[EcmaKEY.Parent].ref,
                        w = B.checked,
                        x = B.value;
                    U ? U in k ? k[U].push({
                        radioRef: b,
                        parentRef: U,
                        checked: w,
                        value: x
                    }) : k[U] = [{
                        radioRef: b,
                        parentRef: U,
                        checked: w,
                        value: x
                    }] : k[b] = [{
                        radioRef: b,
                        parentRef: null,
                        checked: w,
                        value: x
                    }]
                }
                for (var M in k) {
                    var j = k[M],
                        U;
                    if (U = j[0].parentRef) {
                        var X = EcmaLEX.getRefFromString(U),
                            K = t.getObjectValue(X);
                        s.push(X), r.push(K);
                        for (var V = !1, Y = null, O = 0, E = j.length; O < E; O++)
                            if (j[O].checked) {
                                Y = j[O].value, V = !0;
                                break
                            } V ? K.keys[EcmaKEY.V] = new EcmaNAME(Y) : delete K.keys[EcmaKEY.V];
                        for (var O = 0, E = j.length; O < E; O++) {
                            var W = EcmaLEX.getRefFromString(j[O].radioRef),
                                _ = t.getObjectValue(W);
                            s.push(W), r.push(_), EcmaFormField.selectRadioChild(j[O], _)
                        }
                    } else {
                        var W = EcmaLEX.getRefFromString(j[O].radioRef),
                            _ = t.getObjectValue(W);
                        s.push(W), r.push(_), EcmaFormField.selectRadioChild(j[O], _)
                    }
                }
                return this._saveFieldObjects(o, n, s, r), EcmaMainData
            },
            _saveFieldObjects: function(e, t, o, n) {
                for (var i = EcmaMainData.length, a = [], r = 0, s = o.length; r < s; r++) {
                    var c = o[r].num,
                        l = n[r];
                    a.push({
                        ref: c,
                        offset: i
                    });
                    var d = [];
                    if (l.keys[EcmaKEY.Length]) {
                        var u = EcmaLEX.textToBytes(c + " 0 obj\n"),
                            h = EcmaLEX.textToBytes(EcmaLEX.objectToText(n[r]) + "stream\n"),
                            f = n[r].rawStream,
                            m = EcmaLEX.textToBytes("\nendstream\nendobj\n");
                        EcmaLEX.pushBytesToBuffer(u, d), EcmaLEX.pushBytesToBuffer(h, d), EcmaLEX.pushBytesToBuffer(f, d), EcmaLEX.pushBytesToBuffer(m, d), EcmaLEX.pushBytesToBuffer(d, EcmaMainData)
                    } else {
                        var p = c + " 0 obj\n" + EcmaLEX.objectToText(n[r]) + "\nendobj\n",
                            d = EcmaLEX.textToBytes(p);
                        EcmaLEX.pushBytesToBuffer(d, EcmaMainData)
                    }
                    i += d.length
                }
                var g = EcmaMainData.length;
                if (EcmaXRefType) {
                    for (var y = "[", S = [], r = 0, s = a.length; r < s; r++) {
                        var O = a[r].ref,
                            E = a[r].offset;
                        S.push(1), EcmaLEX.pushBytesToBuffer(EcmaLEX.toBytes32(E), S), S.push(0), y += O + " 1 "
                    }
                    y += "]";
                    var A, I = (A = t) + " 0 obj\n<</Type /XRef /Root " + EcmaMainCatalog.ref + " /Prev " + e + " /Index " + y + " /W [1 4 1] /Size " + A + "/Length " + S.length + ">>stream\n";
                    EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(I), EcmaMainData), EcmaLEX.pushBytesToBuffer(S, EcmaMainData), I = "\nendstream\nendobj\nstartxref\n" + g + "\n%%EOF", EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(I), EcmaMainData)
                } else {
                    EcmaLEX.pushBytesToBuffer([120, 114, 101, 102, 10], EcmaMainData);
                    for (var v = "", r = 0, s = a.length; r < s; r++) {
                        var c = a[r].ref,
                            D = a[r].offset;
                        v += c + " 1\n" + EcmaLEX.getZeroLead(D) + " 00000 n \n"
                    }
                    var A;
                    v += "trailer\n<</Size " + (A = t) + " /Root " + EcmaMainCatalog.ref + " /Prev " + e + ">>\n", v += "startxref\n" + g + "\n%%EOF", EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(v), EcmaMainData)
                }
            },
            saveAnnotationToPDF: function(e, t) {
                this._updateFileInfo(e);
                var o = new EcmaBuffer(EcmaMainData),
                    n = o.findFirstXREFOffset();
                n && (o.movePos(n), o.readSimpleXREF()), o.updateAllObjStm(), o.updatePageOffsets();
                var i = 1;
                for (var a in EcmaOBJECTOFFSETS) {
                    var r = a.split(" ");
                    i = Math.max(parseInt(r[0]), i)
                }
                i++, this._saveAnnotObjects(e, n, i, t)
            },
            _updateFileInfo: function(e) {
                EcmaNAMES = {}, EcmaOBJECTOFFSETS = {}, EcmaPageOffsets = [], EcmaMainCatalog = null, EcmaXRefType = 0;
                var t = document.getElementById("FDFXFA_PDFDump");
                if (t) EcmaMainData = EcmaFilter.decodeBase64(t.textContent);
                else {
                    var o = new XMLHttpRequest;
                    o.onreadystatechange = function() {
                        if (EcmaMainData = [], 4 !== o.readyState || 200 !== o.status);
                        else
                            for (var e = o.responseText, t = 0, n = e.length; t < n; t++) EcmaMainData.push(255 & e.charCodeAt(t))
                    }, o.open("GET", e, !1), o.overrideMimeType("text/plain; charset=x-user-defined"), o.send()
                }
            },
            _saveAnnotObjects: function(e, t, o, n) {
                for (var i = o, a = EcmaMainData.length, r = [], s = {}, c = {}, l = new EcmaBuffer(EcmaMainData), d = 0, u = n.length; d < u; d++) {
                    var h = n[d].page,
                        f = "" + h,
                        m = EcmaPageOffsets[h],
                        p;
                    f in c ? p = c[f] : (p = l.getObjectValue(m), c[f] = p);
                    var g = p.keys[EcmaKEY.Annots];
                    s[f] = m.num, r.push({
                        ref: i,
                        offset: a
                    });
                    var y = i + " 0 obj\n" + n[d].getDictionaryString() + "\nendobj\n",
                        S = EcmaLEX.textToBytes(y);
                    if (EcmaLEX.pushBytesToBuffer(S, EcmaMainData), g)
                        if (EcmaLEX.isRef(g)) {
                            var O = l.getObjectValue(g);
                            if (EcmaLEX.isArray(O)) {
                                p.keys[EcmaKEY.Annots] = [];
                                for (var E = 0, A = O.length; E < A; E++) p.keys[EcmaKEY.Annots].push(O[E]);
                                p.keys[EcmaKEY.Annots].push(new EcmaOREF(i, 0))
                            } else p.keys[EcmaKEY.Annots] = [g], p.keys[EcmaKEY.Annots].push(new EcmaOREF(i, 0))
                        } else EcmaLEX.isArray(g) ? g.push(new EcmaOREF(i, 0)) : p.keys[EcmaKEY.Annots] = [new EcmaOREF(i, 0)];
                    else p.keys[EcmaKEY.Annots] = [new EcmaOREF(i, 0)];
                    a += S.length, i++
                }
                var I = EcmaMainData.length;
                for (var v in s) {
                    var D = s[v];
                    s[v] = {
                        ref: D,
                        offset: I
                    };
                    var p = c[v],
                        b = D + " 0 obj\n" + EcmaLEX.objectToText(p) + "\nendobj\n",
                        S = EcmaLEX.textToBytes(b);
                    EcmaLEX.pushBytesToBuffer(S, EcmaMainData), I = EcmaMainData.length
                }
                var T = EcmaMainData.length;
                EcmaXRefType ? this._generateStreamXREF(t, T, o, r, s) : this._generateSimpleXREF(t, T, o, r, s), this._openURL(e)
            },
            _generateSimpleXREF: function(e, t, o, n, i) {
                EcmaLEX.pushBytesToBuffer([120, 114, 101, 102, 10], EcmaMainData);
                var a = "";
                for (var r in i) {
                    var s = i[r].ref,
                        c = i[r].offset;
                    a += s + " 1\n" + EcmaLEX.getZeroLead(c) + " 00000 n \n"
                }
                var l = n.length,
                    d;
                if (l) {
                    a += o + " " + l + "\n";
                    for (var u = 0, h = l; u < h; u++) a += EcmaLEX.getZeroLead(n[u].offset) + " 00000 n \n"
                }
                a += "trailer\n<</Size " + (o + l) + " /Root " + EcmaMainCatalog.ref + " /Prev " + e + ">>\n", a += "startxref\n" + t + "\n%%EOF", EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(a), EcmaMainData)
            },
            _generateStreamXREF: function(e, t, o, n, i) {
                var a = n.length,
                    r = "[",
                    s = [];
                for (var c in i) {
                    var l = i[c].ref,
                        d = i[c].offset;
                    s.push(1), EcmaLEX.pushBytesToBuffer(EcmaLEX.toBytes32(d), s), s.push(0), r += l + " 1 "
                }
                r += o + " " + a + "]";
                for (var u = 0; u < a; u++) {
                    var d = n[u].offset;
                    s.push(1), EcmaLEX.pushBytesToBuffer(EcmaLEX.toBytes32(d), s), s.push(0)
                }
                var h = o + a + 1,
                    f = h + " 0 obj\n<</Type /XRef /Root " + EcmaMainCatalog.ref + " /Prev " + e + " /Index " + r + " /W [1 4 1] /Size " + h + "/Length " + s.length + ">>stream\n";
                EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(f), EcmaMainData), EcmaLEX.pushBytesToBuffer(s, EcmaMainData), f = "\nendstream\nendobj\nstartxref\n" + t + "\n%%EOF", EcmaLEX.pushBytesToBuffer(EcmaLEX.textToBytes(f), EcmaMainData)
            },
            _openURL: function(e, t) {
                var o, n = "data:application/octet-stream;base64," + EcmaFilter.encodeBase64(t),
                    i = e,
                    a = "" + navigator.userAgent;
                if (-1 !== a.indexOf("Edge") || -1 !== a.indexOf("MSIE ")) {
                    for (var r = new ArrayBuffer(t.length), s = new Uint8Array(r), c = 0, l = t.length; c < l; c++) s[c] = 255 & t[c];
                    var d = new Blob([r], {
                        type: "application/octet-stream"
                    });
                    return window.navigator.msSaveBlob(d, i), void 0
                }
                var u = document.createElement("a");
                if (u.setAttribute("download", i), u.setAttribute("href", n), document.body.appendChild(u), "click" in u) u.click();
                else {
                    var h = document.createEvent("MouseEvent");
                    h.initEvent("click", !0, !0), u.dispatchEvent(h)
                }
                u.setAttribute("href", "")
            }
        },
        FONTNAMES = {
            ARIAL: "Arial",
            HELVETICA: "Helvetica",
            COURIER: "Courier"
        },
        EcmaPDF = {
            hashKey: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
            getDictionaryString: function(e, t) {
                for (var o = t, n = e.length; o < n && 60 !== e[o];) o++;
                var i = [1],
                    a = "<<";
                for (o += 2; 0 !== i.length && o < n;) {
                    var r = e[o],
                        s = e[o + 1];
                    60 === r && s && 60 === s ? (i.push(1), o += 2, a += "<<") : 62 === r && s && 62 === s ? (i.pop(), o += 2, a += ">>") : (a += String.fromCharCode(r), o++)
                }
                return a
            },
            byteToString: function(e) {
                return String.fromCharCode(e)
            },
            bytesToString: function(e) {
                for (var t = "", o = 0; o < e.length; o++) t += String.fromCharCode(parseInt(e[o]));
                return t
            },
            writeBytes: function(e, t) {
                for (var o = 0; o < e.length; o++) {
                    var n = e.charCodeAt(o);
                    n < 128 ? t.push(n) : n < 2048 ? t.push(192 | n >> 6, 128 | 63 & n) : n < 55296 || n >= 57344 ? t.push(224 | n >> 12, 128 | n >> 6 & 63, 128 | 63 & n) : (o++, n = 65536 + ((1023 & n) << 10 | 1023 & e.charCodeAt(o)), t.push(240 | n >> 18, 128 | n >> 12 & 63, 128 | n >> 6 & 63, 128 | 63 & n))
                }
            },
            encode64: function(e) {
                var t = "",
                    o, n, i, a, r, s, c, l = 0;
                for (e = this.encodeUTF8(e); l < e.length;) a = (o = e.charCodeAt(l++)) >> 2, r = (3 & o) << 4 | (n = e.charCodeAt(l++)) >> 4, s = (15 & n) << 2 | (i = e.charCodeAt(l++)) >> 6, c = 63 & i, isNaN(n) ? s = c = 64 : isNaN(i) && (c = 64), t += this.hashKey.charAt(a) + this.hashKey.charAt(r) + this.hashKey.charAt(s) + this.hashKey.charAt(c);
                return t
            },
            decode64: function(e) {
                for (var t = "", o, n, i, a, r, s, c, l = 0, d = (e = e.replace(/[^A-Za-z0-9\+\/\=]/g, "")).length; l < d;) o = (a = this.hashKey.indexOf(e.charAt(l++))) << 2 | (r = this.hashKey.indexOf(e.charAt(l++))) >> 4, n = (15 & r) << 4 | (s = this.hashKey.indexOf(e.charAt(l++))) >> 2, i = (3 & s) << 6 | (c = this.hashKey.indexOf(e.charAt(l++))), t += String.fromCharCode(o), 64 !== s && (t += String.fromCharCode(n)), 64 !== c && (t += String.fromCharCode(i));
                return t = this.decodeUTF8(t)
            },
            encodeUTF8: function(e) {
                for (var t = "", o = 0, n = (e = e.replace(/\r\n/g, "\n")).length; o < n; o++) {
                    var i = e.charCodeAt(o);
                    i < 128 ? t += String.fromCharCode(i) : i > 127 && i < 2048 ? (t += String.fromCharCode(i >> 6 | 192), t += String.fromCharCode(63 & i | 128)) : (t += String.fromCharCode(i >> 12 | 224), t += String.fromCharCode(i >> 6 & 63 | 128), t += String.fromCharCode(63 & i | 128))
                }
                return t
            },
            decodeUTF8: function(e) {
                for (var t = "", o = 0, n = 0, i, a, r = e.length; o < r;)(n = e.charCodeAt(o)) < 128 ? (t += String.fromCharCode(n), o++) : n > 191 && n < 224 ? (i = e.charCodeAt(o + 1), t += String.fromCharCode((31 & n) << 6 | 63 & i), o += 2) : (i = e.charCodeAt(o + 1), a = e.charCodeAt(o + 2), t += String.fromCharCode((15 & n) << 12 | (63 & i) << 6 | 63 & a), o += 3);
                return t
            }
        };

    function PdfDocument() {
        for (var e in this._pages = new Array, this._xfaStreams = new Array, this._fontResources = new Array, FONTNAMES) {
            var t = "<</Type /Font /Subtype /Type1 /BaseFont /" + FONTNAMES[e] + ">>",
                o = new PdfResource(FONTNAMES[e], t);
            this._fontResources.push(o)
        }
    }

    function PdfPage() {
        this._width = 612, this._height = 792, this._rotation = 0, this._texts = new Array, this._images = new Array
    }

    function PdfText(e, t, o, n, i) {
        this._x = e, this._y = t, this._fontName;
        var a = o.toUpperCase();
        this._fontName = a in FONTNAMES ? FONTNAMES[a] : FONTNAMES.ARIAL, this._fontSize = n, this._fontText = i
    }

    function PdfImage(e, t, o) {
        this._x = e, this._y = t, this._imageData = o
    }

    function PdfResource(e, t) {
        this._name = e, this._stream = t
    }

    function XFAStream(e, t) {
        this._name = e, this._data = t
    }

    function getObjStart(e) {
        return e + " 0 obj"
    }

    function getObjRef(e) {
        return e + " 0 R"
    }

    function getCatalogString(e) {
        return getObjStart(e) + " <</Type /Catalog /Pages " + getObjRef(e + 1) + ">>\nendobj\n"
    }

    function getStructTreeString(e) {
        return getObjStart(e) + " <</Type /StructTreeRoot>>\nendobj\n"
    }

    function getXFACatalogString(e, t, o) {
        return getObjStart(e) + " <</NeedsRendering true/AcroForm " + getObjRef(t) + "/Extensions<</ADBE<</BaseVersion/1.7/ExtensionLevel 5>>>>/MarkInfo<</Marked true>>/Type /Catalog /Pages " + getObjRef(e + 1) + ">>\nendobj\n"
    }

    function getPageTreeString(e, t) {
        for (var o = getObjStart(e) + " <</Type /Pages /Kids [ ", n = e + 1, i = 0; i < t; i++) o += getObjRef(i + n) + " ";
        return o += "] /Count " + t + ">>\nendobj\n"
    }

    function getPageString(e, t, o, n, i) {
        return getObjStart(e) + " <</Type /Page /Parent " + getObjRef(t) + " /Resources " + getObjRef(o) + " /Contents " + getObjRef(n) + " /MediaBox [0 0 " + i._width + " " + i._height + "] /Rotate " + i._rotation + ">>\nendobj\n"
    }

    function getContentString(e, t) {
        for (var o = "", n = t._texts.length, i = 0; i < n; i++) {
            var a = t._texts[i];
            o += "BT /" + a._fontName + " " + a._fontSize + " Tf " + a._x + " " + a._y + " Td (" + a._fontText + ")Tj ET\n"
        }
        var r = new Array;
        return EcmaPDF.writeBytes(o, r), getObjStart(e) + " <</Length " + r.length + ">>\nstream\n" + o + "\nendstream\nendobj\n"
    }

    function getResourceString(e, t, o) {
        for (var n = getObjStart(e) + " <</Font <<", i = 0; i < t; i++) {
            var a;
            n += "/" + o._fontResources[i]._name + " " + getObjRef(e + 1 + i) + " "
        }
        return n += ">> >>\nendObj\n"
    }

    function getFontDefString(e, t) {
        return getObjStart(e) + t._stream + "\nendobj\n"
    }

    function getZeroLead(e) {
        for (var t = "" + e, o = 10 - t.length, n = 0; n < o; n++) t = "0" + t;
        return t
    }

    function getXrefString(e) {
        for (var t = e.length, o = "xref\n0 " + (t + 1) + "\n0000000000 65535 f \n", n = 0; n < t; n++) o += getZeroLead(e[n]) + " 00000 n \n";
        return o
    }

    function getXFADefinitionString(e, t) {
        return getObjStart(e) + "\n<</XFA " + getObjRef(t) + "/Fields[]>>\nendobj\n"
    }

    function getXFATemplateString(e, t, o) {
        return getObjStart(e) + "\n<</Length " + t + ">>stream\n" + o + "\nendstream\nendobj\n"
    }
    PdfDocument.prototype.addPage = function(e) {
        this._pages.push(e)
    }, PdfDocument.prototype.addXFAStream = function(e) {
        this._xfaStreams.push(e)
    }, PdfPage.prototype.setWidth = function(e) {
        this._width = e
    }, PdfPage.prototype.setHeight = function(e) {
        this._height = e
    }, PdfPage.prototype.addText = function(e) {
        e._y = this._height - e._y - e._fontSize, this._texts.push(e)
    }, PdfPage.prototype.setRotation = function(e) {
        this._rotation = e
    }, PdfPage.prototype.addImage = function(e) {
        this._images.push(e)
    }, PdfDocument.prototype.createPdfString = function(e) {
        var t = new Array,
            o = new Array,
            n = this._pages.length,
            i = 1,
            a = 2,
            r = 3,
            s = 3 + n,
            c = s + n,
            l = c + 1,
            d = this._fontResources.length,
            u = l + d,
            h = u;
        EcmaPDF.writeBytes("%PDF-1.7\n", o);
        var f = null;
        f = e ? getXFACatalogString(1, h, u) : getCatalogString(1), t.push(o.length), EcmaPDF.writeBytes(f, o), f = getPageTreeString(2, n), t.push(o.length), EcmaPDF.writeBytes(f, o);
        for (var m = 0; m < n; m++) {
            var p, g, y;
            f = getPageString(3 + m, 2, c, y = s + m, p = this._pages[m]), t.push(o.length), EcmaPDF.writeBytes(f, o)
        }
        for (var m = 0; m < n; m++) {
            var p, y;
            f = getContentString(y = s + m, p = this._pages[m]), t.push(o.length), EcmaPDF.writeBytes(f, o)
        }
        f = getResourceString(c, d, this), t.push(o.length), EcmaPDF.writeBytes(f, o);
        for (var m = 0; m < d; m++) f = getFontDefString(l + m, this._fontResources[m]), t.push(o.length), EcmaPDF.writeBytes(f, o);
        if (e) {
            var S = h + 1;
            f = getXFADefinitionString(h, S), t.push(o.length), EcmaPDF.writeBytes(f, o);
            var O = new Array;
            EcmaPDF.writeBytes(e, O), f = getXFATemplateString(S, O.length, e), t.push(o.length), EcmaPDF.writeBytes(f, o)
        }
        var E = o.length;
        return f = getXrefString(t), EcmaPDF.writeBytes(f, o), f = "trailer <</Size " + (t.length + 1) + " /Root 1 0 R>>\nstartxref\n" + E + "\n%%EOF", EcmaPDF.writeBytes(f, o), EcmaPDF.bytesToString(o)
    }
}
var app = idrform.app;

</script>


 
</body>
</html>


</script>


 
</body>
</html>