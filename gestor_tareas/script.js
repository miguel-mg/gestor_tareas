window.onload = function() {

    // callback when task is deleted
    function deleteTask(js){
        if(js["error"] != null){
            infoMSG(js["error"])
        }
        else if(js["ok"] != null){
            doAjax("list.php",showTasks);
            infoMSG(js["ok"])
        }
    }

    // callback when we get tasks list
    function showTasks(js){
        var s="";
        for(var i = 0 in js){
            s+="<tr class='"+(i%2==0 ? "odd" : "even")+"'>";
            s+="<td>"+js[i]["tit"]+"</td>";

            var s_=""
            if(js[i]["cate"] != null){
                var cate=js[i]["cate"].split(',');
                for(var j = 0 in cate){
                    s_+="<span class='tag-cat'>"+cate[j]+"</span>";
                }
            }
            s+="<td class='text-center'>"+s_+"</td>";
            s+="<td class='text-center'><span class='btn-delete' id-task='"+js[i]["id"]+"'>❌</span></td>";
            s+="</tr>";
        }
        $("#results").html(s);
        $('.btn-delete').click(function(){
            doAjax("delete.php",deleteTask,{"id":$(this).attr('id-task')});
         });
    }

    // callback when task is added
    function addTask(js){
        if(js["error"] != null){
            infoMSG(js["error"]);
        }
        else if(js["ok"] != null){
            doAjax("list.php",showTasks);
            infoMSG(js["ok"]);
            $("#in-title").val("");
        }
    }

    // add new task
    $("#btn-add").click(function(){
        var tit=$("#in-title").val();
        if(tit){
            var cat = [];
            if($("#ch-php").prop('checked')) cat.push("PHP");
            if($("#ch-js").prop('checked')) cat.push("Javascript");
            if($("#ch-css").prop('checked')) cat.push("CSS");
            var js={"tit":tit,"cat":cat};
            doAjax("add.php",addTask,js);
        }
        else{
            infoMSG("Debe escribir un título para la tarea");
        }
    });

    // generic function for ajax calls
    function doAjax(file,doFunc,js={}){
        $.ajax({
            type: "POST",
            url: '/gestor_tareas/'+file,
            dataType: 'json',
            data: js,
            success: function (obj) {
                doFunc(obj);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("XMLHttpRequest: " + XMLHttpRequest);
                console.log("Status: " + textStatus);
                console.log("Error: " + errorThrown);
            }
        });
    }

    // info messages
    var timeout_handle=null;
    function infoMSG(msg){
        $('#info-msg').html(msg);
        if($('#info').hasClass('hide'))
            $('#info').removeClass('hide');

        if(timeout_handle) // cancel current timeout
            clearTimeout(timeout_handle);

        timeout_handle = setTimeout(function(){ // hide again in 3 sec
            if(!$('#info').hasClass('hide'))
                $('#info').addClass('hide');
            timeout_handle=null;
        }, 3000);
    }

    // get task list when enter the page
    doAjax("list.php",showTasks);
}