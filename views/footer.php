</div>
</div>
<footer class="main-footer">
    <div class="container">
        <p class="pull-right">vklepper - 2016</p>
    </div>
</footer>
</div>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="<?= $this->base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    window.onload = function(){
        setInterval(function(){
            $.post("<?= $this->base_url()?>welcome/notification", {}, function(data){
                if (data == 1)
                {
                    $('#notif_icon').removeClass('hidden');
                    $('#notif_icon2').removeClass('hidden');
                }
            });
        },1000);}
</script>
</body>
</html>