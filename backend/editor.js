
var linkHighlight = '';
function saveChanges(sectionInp){
    $('.text-img').resizable('destroy');
    var titleHtml =$('#editor_title').html();
    var blockquoteHtml =$('#editor_block').html();
    var block1Html = $('#editor_1').html();
    var block2Html = $('#editor_2').html();

    $.post('edit_content.php',{section: sectionInp, title: titleHtml, blockquote: blockquoteHtml, block1: block1Html, block2: block2Html}).done(function( data ) {
        alert( "Data Loaded: " + data );
    });

};
function getSelectionText() {
    var text = "";
    if (window.getSelection) {
        text = window.getSelection().toString();
    } else if (document.selection && document.selection.type != "Control") {
        text = document.selection.createRange().text;
    }
    return text;
}

document.onmouseup = document.onkeyup = document.onselectionchange = function() {
    //console.log(getSelectionText());
  //document.getElementById("sel").value = getSelectionText();
};
function cleanText(dirtyText){
    var cleanText = dirtyText.replace('<h1></h1>', '')
    .replace('<h1> </h1>', '')
    .replace('<h2></h2>', '')
    .replace('<h2> </h2>', '')
    .replace('<h3></h3>', '')
    .replace('<h3> </h3>', '')
    .replace('<blockquote></blockquote>', '')
    .replace('<blockquote> </blockquote>', '')
    .replace('<p><br></p>', '<br>')
    .replace('<b></b>', '')
    .replace('<b> </b>', '')
    .replace('<i></i>', '')
    .replace('<i> </i>', '')
    .replace('<u></u>', '')
    .replace('<u> </u>', '');

    return cleanText;
}

function surroundSelection() {
    var span = document.createElement("span");
    span.setAttribute("class", "temp-span red-text");
    
    if (window.getSelection) {
        var sel = window.getSelection();
        if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(span);
            sel.removeAllRanges();
            sel.addRange(range);
        }
    }
}
/*
function replaceSelectedText(replacementText) {
    var sel, range;
    if (window.getSelection) {
        sel = window.getSelection();
        if (sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            range.insertNode(document.createTextNode(replacementText));
        }
    } else if (document.selection && document.selection.createRange) {
        range = document.selection.createRange();
        range.text = replacementText;
    }
    console.log($('.editor.active').html().toString());
    //console.log($.parseHTML($('.editor.active').html().toString()));
    $('.editor.active').html($.parseHTML($('.editor.active').html().toString()));
}

function getSelectionHtml() {
    var html = "";
    if (typeof window.getSelection != "undefined") {
        var sel = window.getSelection();
        if (sel.rangeCount) {
            var container = document.createElement("div");
            for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                container.appendChild(sel.getRangeAt(i).cloneContents());
            }
            html = container.innerHTML;
        }
    } else if (typeof document.selection != "undefined") {
        if (document.selection.type == "Text") {
            html = document.selection.createRange().htmlText;
        }
    }
    alert(html);
}*/

function changeTextDo(oldText, newText){
    console.log(oldText);
    console.log(newText);
    var text = $('.editor.active').html().toString();
    var dirtyText = text.replace(oldText, newText);
    //console.log('DIRTY: '+dirtyText);
    console.log('CLEAN: '+cleanText(dirtyText));
    $('.editor.active').html(cleanText(dirtyText));
}

function changeText(textType){
    var highlight = window.getSelection();
    var div = highlight.anchorNode.parentNode;
    var parentType = $(div).prop("tagName").toLowerCase();
    if(parentType != textType){
        if(parentType == 'p'){
            var spn = '</p><'+textType+'>' + highlight + '</'+textType+'><p>';
            changeTextDo(highlight, spn);
        }else{
            if(textType == 'p'){
                if($(div).prev().prop("tagName") == 'P' && $(div).next().prop("tagName") == 'P'){
                    $(div).prev().append($(div).text());
                    $(div).prev().append($(div).next().text());
                    $(div).next().remove();
                    $(div).remove();
                    console.log('both = p');
                }else if($(div).prev().prop("tagName") == 'P'){
                    $(div).prev().append($(div).text());
                    $(div).remove();
                    console.log('prev = p');
                }else if($(div).next().prop("tagName") == 'P'){
                    console.log('next = p');
                    $(div).next().prepend($(div).text());
                    $(div).remove();
                }else{
                    console.log('none = p');
                    highlight = '<'+parentType+'>' + $(div).html() + '</'+parentType+'>';
                    var spn = '<'+textType+'>' + $(div).html() + '</'+textType+'>';
                    changeTextDo(highlight, spn);
                }
            }else{
                console.log('textType != p');
                highlight = '<'+parentType+'>' + $(div).html() + '</'+parentType+'>';
                var spn = '<'+textType+'>' + $(div).html() + '</'+textType+'>';
                changeTextDo(highlight, spn);
            }
        }
    }

    
}
function addLinkFunction(){

    var text = $('#linkTextInput').val();
    var link = $('#linkInput').val();
    //var parentString = $('.temp-span').parent().html().toString();
    var anchorText ='<a href="'+link+'">'+text+'</a>';
    $('.temp-span').replaceWith(anchorText);
    
    //changeTextDo(linkHighlight, anchorText);
    linkHighlight = '';
    $('#link-set-popup').slideUp();
}

function changeTextToggle(textType){

    var highlight = window.getSelection();
    var div = highlight.anchorNode.parentNode;
    var parentType = $(div).prop("tagName").toLowerCase();
    if($(div).prop("tagName").toLowerCase() == textType){
        console.log(window.getSelection().toString().length);
        console.log($(div).html().toString().length);
        if(window.getSelection().toString().length == $(div).html().toString().length){
            console.log('one word = all');
            var spn = '<'+textType+'>' + highlight + '</'+textType+'>';
            var text = $('.editor.active').html().toString();
            var dirtyText = text.replace(spn, highlight);
            //console.log('DIRTY: '+dirtyText);
            console.log('CLEAN: '+cleanText(dirtyText));
            $('.editor.active').html(cleanText(dirtyText));
        }else{
            var spn = '</'+textType+'>' + highlight + '<'+textType+'>';
            var text = $('.editor.active').html().toString();
            var dirtyText = text.replace(highlight, spn);
            //console.log('DIRTY: '+dirtyText);
            console.log('CLEAN: '+cleanText(dirtyText));
            $('.editor.active').html(cleanText(dirtyText));
        }
    }else{
        var spn = '<'+textType+'>' + highlight + '</'+textType+'>';
        var text = $('.editor.active').html().toString();
        var dirtyText = text.replace(highlight, spn);
        //console.log('DIRTY: '+dirtyText);
        console.log('CLEAN: '+cleanText(dirtyText));
        $('.editor.active').html(cleanText(dirtyText));
    }
}
$(document).ready(function(){
    $(".text-img").resizable({
        containment: "parent"
    });
    var currTextType = 'p';
    var currEditor = '';
    $('.editor').click(function(){
        $('.editor').removeClass('active');
        $(this).addClass('active');
    });
    $('#headingSelect').change(function(){
        if(window.getSelection().toString().length > 0){
            console.log('SELECTION:TRUE');
            changeText($(this).val());
        }else{
            console.log('SELECTION:FALSE');
        }
    });

    $('#boldText').click(function(){
        if(window.getSelection().toString().length > 0){
            console.log('SELECTION:TRUE');
            changeTextToggle('b');
        }else{
            console.log('SELECTION:FALSE');
        }
    });
    $('#cursiveText').click(function(){
        if(window.getSelection().toString().length > 0){
            console.log('SELECTION:TRUE');
            changeTextToggle('i');
        }else{
            console.log('SELECTION:FALSE');
        }
    });
    $('#addLink').click(function(){
        if(window.getSelection().toString().length > 0){
            var highlight = window.getSelection();
            /*//getSelectionHtml();
            //replaceSelectedText('<a>LINK</a>');
            
            console.log(window.getSelection().toString());
            var div = highlight.anchorNode.parentNode;
           // console.log($(div).html().toString());
           // console.log($(div).text());

            //var firstStop = highlight.anchorOffset + ()
            var beforeHtml = $(div).html().toString().substring(0,highlight.anchorOffset).length;
            var beforeText = $(div).text().substring(0,highlight.anchorOffset).length;

            console.log('html: '+beforeHtml+', text: '+beforeText);
            
            var beforeString = $(div).html().toString().substring(0,highlight.anchorOffset);
            var middleString = $(div).html().toString().substring(highlight.anchorOffset, highlight.anchorOffset + highlight.toString().length);
            var afterString = $(div).html().toString().substring(highlight.anchorOffset + highlight.toString().length, $(div).html().toString().length);

            //console.log(beforeString);
            //console.log(middleString);
            //console.log(afterString);

            $(div).html(beforeString + "<span class='red-text temp-span'>" + middleString + "</span>" + afterString);*/
            surroundSelection();
            console.log('SELECTION:TRUE');
            $('#linkTextInput').val(highlight.toString());
            $('#link-set-popup').slideDown();
            //linkHighlight = window.getSelection().toString();
            
        }else{
            console.log('SELECTION:FALSE');
        }
    });

    

    $('p[contenteditable=true]').keydown(function(e) {
        // trap the return key being pressed
        cleanText($(this).html().toString());
        if (e.keyCode == 13) {
            console.log('dddwdwdwdwdw');
        // insert 2 br tags (if only one br tag is inserted the cursor won't go to the second line)
        document.execCommand('insertHTML', false, '<br><br>');
        // prevent the default behaviour of return key pressed
        return false;
        }
    });
   $(".editor").bind("cut copy paste", function(e){
       e.preventDefault();
   });
   /* $("#editor").on("keydown keyup", function(e){
        if (e.keyCode == 32){
            var text = $(this).text().replace(/[\s]+/g, " ").trim();
            var word = text.split(" ");
            var newHTML = "";

            $.each(word, function(index, value){
                switch(value.toUpperCase()){
                    case "SELECT":
                    case "FROM":
                    case "WHERE":
                    case "LIKE":
                    case "BETWEEN":
                    case "NOT LIKE":
                    case "FALSE":
                    case "NULL":
                    case "FROM":
                    case "TRUE":
                    case "NOT IN":
                        newHTML += "<span class='statement'>" + value + "&nbsp;</span>";
                        break;
                    default: 
                        newHTML += "<span class='other'>" + value + "&nbsp;</span>";
                }
            });
            $(this).html(newHTML);
            
            //// Set cursor postion to end of text
            var child = $(this).children();
            var range = document.createRange();
            var sel = window.getSelection();
            range.setStart(child[child.length - 1], 1);
            range.collapse(true);
            sel.removeAllRanges();
            sel.addRange(range);
            $(this)[0].focus(); 
        }
});*/
});