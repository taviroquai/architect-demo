<table class="table" style="max-width: 240px">
    <thead>
        <tr>
            <th><i class="icon-user"></i></th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($users as $item) { ?>
    <tr>
        <td><?=$item->id?></td>
        <td><?=$item->email?></td>
        <td>
            <a href="#">
                <i class="icon-edit" data-ui="user/<?=$item->id?>"></i>
            </a>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>