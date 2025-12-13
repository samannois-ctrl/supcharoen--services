<script>
    function Gologin(){
        var username = $('#username').val();
        var pass = $('#pass').val();
        if(username==''){
            alert('กรุณาใส่ username');
            return false;
        }else  if(pass==''){
            alert('กรุณาใส่ password');
            return false;
        }else{
            $.post('<?php echo base_url('login/checkLogin')?>',{ username:username,pass:pass},function(data){
               // var obj = jQuery.parseJSON(data);
                //console.log(data);
                //alert(data)
                if(data=='notLogin'){
                   $('#showErrorLogin').css("display","block");
                   $('#showErrorLogin').fadeOut(10000, function () {
                        $('#showErrorLogin').css({display:"none"});
                    });

                }else{
                    window.location.href='<?php echo base_url('insurance_car/')?>';
                }
            })
        }
    }

   
</script>    
