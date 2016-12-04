        var type=1;
    function change(dom)
    {

    document.getElementById("type1").style.backgroundColor="#e74c3c";
    document.getElementById("type2").style.backgroundColor="#d64637";
    document.getElementById("type3").style.backgroundColor="#c74134";
    document.getElementById("type4").style.backgroundColor="#c74134";
    switch(dom.parentNode.id)
    {
        case"type1":
            type=1;
            break;
        case"type2":
            type=2;
            break;
        case"type3":
            type=3;
            break;
        case"type4":
            type=4;
            break;
        default:
            type=1;
            break;
    }
    dom.parentNode.style.backgroundColor="white";
}
function create()
{
    var startime=document.getElementById("datetimepicker1").value;
    var endtime=document.getElementById("datetimepicker2").value;
    var reward=document.getElementById("reward").value;
    var name=document.getElementById("name").value;
    var url="index.php/ActivityController/createNewActivity";
    $.ajax({
            type: "post",
            url: url,
            data: {"type":type,"startime":startime,"endtime":endtime,"reward":reward,"name":name},
            dataType: "text",
            async:false,
            success: function (data) {
                var toUrl="index.php/ActivityController/activity/"+type;
                 window.location.href=toUrl; 
            },
            error: function (msg) {
                alert("添加失败");
            }
        });

}