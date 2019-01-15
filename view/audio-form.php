<?php
include('header.php');
?>

    <div class="container">
        <h1>Форма аудио</h1>
        <form method="post" action="/load" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Картинка альбома</label>
                <input type="file" class="form-control-file" name="image" aria-describedby="emailHelp" >
                <?php if(isset($data['audio']->image)):?>
                    <div>
                        <img class="audio-img" src="/img/<?php echo $data['audio']->image?>" width="200">
                    </div>
                <?php endif;?>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Название альбома</label>
                <input type="text" class="form-control" value="<?php echo isset($data['audio']->album)?$data['audio']->album:''?>" name="album" aria-describedby="emailHelp" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Артист</label>
                <input type="text" class="form-control" value="<?php echo isset($data['audio']->artist)?$data['audio']->artist:''?>" name="artist" aria-describedby="emailHelp" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Год выпуска</label>
                <input type="number" class="form-control" value="<?php echo isset($data['audio']->year)?$data['audio']->year:''?>" name="year" aria-describedby="emailHelp" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Длительность</label>
                <input type="number" class="form-control" value="<?php echo isset($data['audio']->duration)?$data['audio']->duration:''?>" name="duration" aria-describedby="emailHelp" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Дата</label>
                <input type="date" name="date" max="3000-12-31" value="<?php echo isset($data['audio']->date)?$data['audio']->date:''?>" min="1000-01-01" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Цена</label>
                <input type="number" class="form-control" name="cost" value="<?php echo isset($data['audio']->cost)?$data['audio']->cost:''?>" aria-describedby="emailHelp" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Код</label>
                <input type="text" class="form-control" data-inputmask="'mask': '99:99:99'" id="code" name="code" value="<?php echo isset($data['audio']->code)?$data['audio']->code:''?>" aria-describedby="emailHelp" >
            </div>

            <input type="hidden" name="id" value="<?php echo isset($data['audio']->id)?$data['audio']->id:''?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




<?php
include('footer.php');