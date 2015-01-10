<?php $p = self::nettoyer($_GET['p']); ?>
<div>

<div id="partial-target">

    <div class="input-group">
        <span class="input-group-addon"><?php echo $title; ?></span>
        <div class="form-control col-md-3 hello" id="">
            <div class="select-parent">
                <select type="text" class="form-control relation-select" data-query="?p=<?php echo $p; ?>&action=<?php echo $nextAction ?>&controleur=graph&min=1" name="">
                    <option value="">-</option>
   <?php foreach ($topics as $topic): ?>
                    <option value="<?php echo $topic['id']; ?>">
   <?php echo $topic["name"]." (".$topic["alias"].")";
         if ($topic["description"] != "" && $topic["description"] != NULL) { echo " - ".$topic["description"]; }
   ?>
                    </option>
   <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

</div>

</div>