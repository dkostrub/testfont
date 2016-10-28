<?
if (isset ($err)) {
    echo "<div class='err'>$err</div>";
}
?>
<div class="form">
    <p style="font-size: 24px; font-weight: bold; text-align: center;">Форма загрузки шрифтов для теста</p>
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="fileform">
            <div id="fileformlabel"></div>
            <div class="selectbutton">Обзор</div>
            <input type="file" name="filename[]" id="File" multiple="true" onchange="getName(this.value);" />
        </div>
        <input type="hidden" name="update" value="OK" />
        <input type="submit" value="Загрузить" class="add add-send" />
    </form>
</div>

<script>
    function getName (str){
        if(str.lastIndexOf('\\')){
            var i = str.lastIndexOf('\\')+1;
        }else{
            var i = str.lastIndexOf('/')+1;
        }
        var filename = str.slice(i);
        var uploaded = document.getElementById("fileformlabel");
        uploaded.innerHTML = filename;
    }
</script>