function setting()
{
    var name=document.getElementById("name").value;
    var url="index.php/UserController/setting";
    $.ajax({
            type: "post",
            url: url,
            data: {"name":name},
            dataType: "text",
            async:false,
            success: function (data) {
                var toUrl="index.php/StatisticController/userStatistic/";
                window.location.href=toUrl; 
            },
            error: function (msg) {
                alert("修改失败");
            }
        });

}