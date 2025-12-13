<script>
    function DoupdatePass(){
       
        var Pass =$('#Pass').val();
        var rePass =$('#rePass').val();
        
        if(Pass==''){
            alert('กรุณาระบุรหัสผ่านใหม่');
            return false;
        }else if(rePass==''){
            alert('กรุณาระบุรหัสผ่านใหม่อีกครั้ง');
            return false;
        }else if(Pass!=rePass){
            alert('กรุณาระบุรหัสผ่านให้ตรงกันทั้งสองช่อง');
            return false;
       }else{
            $.post('<?php echo base_url('setting/DoupdatePass')?>', { Pass:Pass},function(data){
                var obj = JSON.parse(data);
                if(obj.Doupdate=='1'){
                    alert('เปลียนรหัสผ่านเรียบร้อย');
                    $('#Pass').val('');
                    $('#rePass').val('');
                }else{
                    alert('ไม่สามารถเปลียนรหัสผ่าน');
                }
            })
       }
    }
</script>    