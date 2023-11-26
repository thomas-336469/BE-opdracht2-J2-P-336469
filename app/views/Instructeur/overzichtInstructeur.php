<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" />
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Overzicht Instructeurs</title>
</head>

<body>
    <a href="<?= URLROOT . "/Homepage/" ?>" class="button back">Back</a>
    <div class="column center w-12 h-12">
        <u><?= $data['title']; ?></u>
        <p>Aantal instructeurs <?= $data['amount'] ?></p>
        <table>
            <thead>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>Mobiel</th>
                <th>Datum in dienst</th>
                <th>Aantal sterren</th>
                <th>Voertuigen</th>
                <th id='status-icon-placeholder'>Ziekte/Verlof</th>

            </thead>
            <tbody>
                <?= $data['rows']; ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($result) && $result) : ?>
        <?php foreach ($result as $instructeur) : ?>
            <a href="#" class="toggle-icon" data-instructeur-id="<?= $instructeur->Id ?>">
                <span class='material-symbols-outlined' id="status-icon-<?= $instructeur->Id ?>">
                    directions_car
                </span>
            </a>
            <!-- ... (other details related to instructeur) ... -->
        <?php endforeach; ?>
    <?php else : ?>
        <p>No instructeurs found.</p>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleIcons = document.querySelectorAll('.toggle-icon');

            toggleIcons.forEach(function(icon) {
                icon.addEventListener('click', function(event) {
                    event.preventDefault();

                    var instructeurId = this.getAttribute('data-instructeur-id');
                    var iconElement = document.getElementById('status-icon-' + instructeurId);

                    if (iconElement.innerText === 'directions_car') {
                        iconElement.innerText = 'thumb_down';
                        // Add notification logic using Toastr.js
                        toastr.success('Status updated successfully!');
                    } else if (iconElement.innerText === 'thumb_down') {
                        iconElement.innerText = 'thumb_up';
                        // Add notification logic using Toastr.js
                        toastr.info('Status updated successfully!');
                    } else {
                        iconElement.innerText = 'directions_car';
                        // Add notification logic using Toastr.js
                        toastr.info('Status reverted successfully!');
                    }
                });
            });
        });
    </script>
</body>

</html>