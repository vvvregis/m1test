<?php include('header.php');?>
<div class="container">
    <div class="col-12 py-md-3">
        <h1>Список аудио</h1>
        <div class="add-audio">
        <a href="/add">Добавить аудио</a>
        </div>
<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th><a href="<?php echo \model\Router::createSortUrl('album')?>">Альбом</a></th>
        <th><a href="<?php echo \model\Router::createSortUrl('artist')?>">Артист</a></th>
        <th><a href="<?php echo \model\Router::createSortUrl('year')?>">Год</a></th>
        <th><a href="<?php echo \model\Router::createSortUrl('duration')?>">Длительность</a></th>
        <th><a href="<?php echo \model\Router::createSortUrl('date')?>">Дата</a></th>
        <th><a href="<?php echo \model\Router::createSortUrl('cost')?>">Цена</a></th>
        <th><a href="<?php echo \model\Router::createSortUrl('code')?>">Код</a></th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php if($data['audioList']):?>
        <?php foreach($data['audioList'] as $audio):?>
            <tr>
                <td><a href="<?php echo \model\Router::createSearchUrl('album', $audio->album)?>"><?php echo $audio->album?></a></td>
                <td><a href="<?php echo \model\Router::createSearchUrl('artist', $audio->artist)?>"><?php echo $audio->artist?></a></td>
                <td><a href="<?php echo \model\Router::createSearchUrl('year', $audio->year)?>"><?php echo $audio->year?></a></td>
                <td><a href="<?php echo \model\Router::createSearchUrl('duration', $audio->duration)?>"><?php echo $audio->duration?></a></td>
                <td><a href="<?php echo \model\Router::createSearchUrl('date', $audio->date)?>"><?php echo $audio->date?></a></td>
                <td><a href="<?php echo \model\Router::createSearchUrl('cost', $audio->cost)?>"><?php echo $audio->cost?></a></td>
                <td><a href="<?php echo \model\Router::createSearchUrl('code', $audio->code)?>"><?php echo $audio->code?></a></td>
                <td><a href="/edit?id=<?php echo $audio->id?>">Редактировать</a> <a href="/delete?id=<?php echo $audio->id?>">Удалить</a></td>
            </tr>
         <?php endforeach;?>
    <?php endif;?>
    </tbody>
</table>
    </div>
</div>
<?php include('footer.php');?>
