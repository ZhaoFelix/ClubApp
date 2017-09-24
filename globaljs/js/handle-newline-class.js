$(document).ready(function() { 
    var elements = $('.handle-newline-class');
    elements.each(function (index, element) {
        var $element = $(element);
        var temp =  $element.text().replace(/\r\n/g, '<br/>');
        var temp =  temp.replace(/\n/g, '<br/>');
        $element.html(temp);
    });
});
