$(document).ready(function() {
    var files = [],
        timeout

    $('script, link').each(function(i,e){
        var _this = $(e),
        src = _this.attr('src') || _this.attr('href');
        if(src && src.match(location.protocol+'\/\/'+location.hostname)){
            files.push({
                "src": src,
                "mod": 0
            });
        }
    });

    symReload();

    function symReload(){
        active = true;
        $.post("/symphony/extension/symreload/", { files: files },
          function(data){
              if(data.files){
                 files = data.files;
 
                 if(data.reload) {
                 	location.reload();
                 }
                 timeout = setTimeout(symReload, 1000);
              }
        }, "json");
    }
});
