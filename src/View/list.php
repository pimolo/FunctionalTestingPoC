<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste</title>
</head>
<body>
<?php if (isset($error)) : ?>
    <p><?php echo $error ?></p>
<?php endif; ?>

    <ul>
        <li>Faire les courses</li>
        <?php foreach ($tasks as $task) : ?>
            <li><span><?php echo $task['name'] ?></span><span style="margin-left:5px"><a href="?action=remove&taskId=<?php echo $task['id'] ?>" >Remove</a></span><span></li>
        <?php endforeach; ?>
        <li><a href="?action=add">Ajouter une tâche</a></li>
    </ul>
</body>
</html>
