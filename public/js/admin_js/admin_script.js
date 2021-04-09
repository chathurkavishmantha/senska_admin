$(document).ready(function(){

    $("#currunt_password").keyup(function(){
        var currunt_password = $("#currunt_password").val();
        // alert(currunt_password);
        $.ajax({
            type:'post',
            url:'/admin/check-currunt_password',
            data:{currunt_password:currunt_password},
            success:function(resp){
                // alert(resp);
                if(resp == "false"){
                    $("#checkCurruntpwd").html("<font color=red>Currunt Password is incorrect</font>");
                }else if(resp == "true"){
                    $("#checkCurruntpwd").html("<font color=green>Currunt Password is Correct</font>");

                }
            },error:function(){
                alert("Error");
            }
        })
    })
})