function isPc(d, c){
    
    var userAgentInfo = navigator.userAgent;  
    var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");    
    var flag = true;    
    for (var v = 0; v < Agents.length; v++) {    
        if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }    
    }
    
    var id = d;
    var clas = c;
    if(flag == false){
        if(id != 0){
            $("#"+id).attr("type", "date");
        }
        if(clas != 0){
            $("."+clas).attr("type", "date");
        }
    }else{
        if(id != 0){
            $("#"+id).attr("type", "text");
            if(lang == "cn"){
                $.datetimepicker.setLocale('zh');
                $("#"+id).datetimepicker({
                    timepicker: false,
                    format: 'Y-m-d',
                    scrollInput: false
                });
            }else{
                $("#"+id).datetimepicker({
                    timepicker: false,
                    format: 'M d, Y',
                    scrollInput: false
                });
            }
        }
        if(clas != 0){
            $("."+clas).attr("type", "text");
            if(lang == "cn"){
                $.datetimepicker.setLocale('zh');
                $("."+clas).datetimepicker({
                    timepicker: false,
                    format: 'Y-m-d',
                    scrollInput: false
                });
            }else{
                $("."+clas).datetimepicker({
                    timepicker: false,
                    format: 'M d, Y',
                    scrollInput: false
                });
            }
        }
    }
    
    return flag;
}