<?php $this->titre = "Mon Blog"; ?>
file: Vues/Accueil/index.php
<?php foreach ($reports as $report):
    ?>

<?php var_dump($report);?>

    <?php/*
    <article>
        <header>
            <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">
                <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
            </a>
            <time><?= $this->nettoyer($billet['date']) ?></time>
        </header>
        <p><?= $this->nettoyer($billet['contenu']) ?></p>
    </article>
    <hr />
    */
    ?>
<?php endforeach; ?>
