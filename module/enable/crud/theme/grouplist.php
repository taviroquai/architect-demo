<div class="btn-group" data-toggle="buttons-checkbox">
    <?php foreach ($groups as $group) { ?>
    <button type="button" data-id="<?=$group->id?>"
            class="btn<?=in_array($group->id, $selected)?' active':''?>">
            <?=$group->name?>
    </button>
    <?php } ?>
</div>