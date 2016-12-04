onload = function () {
            function removeActiveClass(node) {
                node.className = '';
            }
 
            document.querySelector('ul[id=typelist]').onclick = function (e) {
                Array.prototype.forEach.call(document.querySelectorAll('ul[id=typelist] > li'), removeActiveClass);
                var target = e.target.parentNode.parentNode;
                target.className = 'active';
                
            }
        }
function change(dom)
{
    dom.parentNode.style.backgroundColor="white";
}

    $(function (){
    $("#datetimepicker1").on("click",function(e){
        e.stopPropagation();
        $(this).lqdatetimepicker({
            css : 'datetime-day',
            dateType : 'D',
            selectback : function(){

            }
        });

    });
     $("#datetimepicker2").on("click",function(e){
        e.stopPropagation();
        $(this).lqdatetimepicker({
            css : 'datetime-day',
            dateType : 'D',
            selectback : function(){

            }
        });

    });
});

                function addFriend(friendId)
            {
                var userId=<?php echo $_SESSION['id'];?>;
                var url="index.php/UserController/addFriend";
                $.ajax({
                    type: "post",
                    url: url,
                    data: {"userId":userId,'friendId':friendId},
                    dataType: "text",
                    async:false,
                    success: function (data) {
                        var x=document.getElementById(friendId);
                        x.innerHTML="";
                    },
                    error: function (msg) {
                    alert("修改失败");
                    }
                });

            }